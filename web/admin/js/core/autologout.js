//######
//## This work is licensed under the Creative Commons Attribution-Share Alike 3.0
//## United States License. To view a copy of this license,
//## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter
//## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
//## Desarrollado por JPH - Ing. - Gregorio Jose Bolivar
//######
/**
 * Esto es un namespace que hace parte de otro. Encargado de controlar las funcionalidades
 * del cerrado de session automatica es necesario para el funcionamiento la siguiente libreria
 * @url https://github.com/marcojetson/jquery-away.git
 *
 * @namespace Autologout
 * @memberOf Core
 */
Core.Autologout = {};
Core.Autologout = {
    /* Cjequeo si esta activo en 5 Minutos*/
    'timeCheck':60*7,
    /* Cierra Session en 7 Minutos */
    'timeLogout':60*10,
    /**
     * Esto es una función constructora del spacio de nombre Autologout
     * @memberof Core.Autologout.main
     */
    main: function () {
        this.start();
        this.wolcome();
        this.checking();
        this.logout();
    },
    /**
     * Esto es una función constructora del spacio de nombre Autologout
     * @memberof Core.Autologout.start
     */
    start: function () {
        setInterval(function() {
            //console.log('idle time: ' + $.idle());
        }, 2000);
    },
    /**
     * Esto es una función constructora del spacio de nombre Autologout
     * @memberof Core.Autologout.wolcome
     */
    wolcome: function () {
        $.idle(0, function() {
            if ($.isAway()) {
                //console.log('welcome back');
                $.away();
            }
        });
    },
    /**
     * Esto es una función constructora del spacio de nombre Autologout
     * @memberof Core.Autologout.checking
     */
    checking: function () {
        $.idle(Core.Autologout.timeCheck, function() {
            //console.log('¿estás ahí??');
            $.alert('Estas ausente');
        });
    },
    /**
     * Esto es una función constructora del spacio de nombre Autologout
     * @memberof Core.Autologout.logout
     */
    logout: function () {
        $.idle(Core.Autologout.timeLogout, function() {
            //console.log('va a desaparecer :)');
            $.away('autoaway');
        });
    },
    /**
     * Esto es una función que permite mostrar mensaje de cerrado
     * @memberof Core.Autologout.modalMsjClose
     */
    modalMsjClose: function (msj) {
        $.confirm({
            title: 'Logout?'+msj,
            content: 'Su tiempo se agota, se cerrará automáticamente en 10 segundos.',
            autoClose: 'logoutUser|10000',
            buttons: {
                logoutUser: {
                    text: 'logout myself',
                    action: function () {
                        window.location.href = '/logout'
                        $.alert('The user was logged out');
                    }
                },
                cancel: function () {
                    $.idle()
                    $.alert('canceled');
                }
            }
        });
    }
}