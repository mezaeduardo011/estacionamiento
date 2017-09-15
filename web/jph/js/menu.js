window.addEvent('domready', function () {

    $$('#menuNavegacion .menumodulos li a').each(function (a) {
        $(a).addEvent('click', function (e) {
            $this = this;
            e.stop();

            if (!this.hasClass('inactivo')) {

                $$('.complementoSel').removeClass('complementoSel');
                this.addClass('complementoSel');

                new Request.HTML({
                    "url": "menu.php?complemento=" + $(this).getProperty('data-complemento'),
                    evalScripts: false,
                    onSuccess: function (a, b, c, d) {
                        $('menuNavegacion').setProperty('html', c);
                        $('complemento').value = $this.getProperty('text');
                        abrirPagina('dashboard.php', {});
                        eval(d);
                    }
                }).send();
            }
        });
    });

    $$('#principal ul li a, #usuario .submenu li a').each(function (a) {
        $(a).addEvent('click', function (e) {
            e.stop();
            if (this.getProperty('href') && this.getProperty('href') != "#") {
                var ruta;
                var nombre = this.getProperty('text').toLowerCase().trim();
                var pagina = this.getProperty('href').trim();

                if (this.getParent('.submenu') && !this.getParent('.submenu').hasClass('usuario')) {
                    if (this.getParent('.submenu').getParent('.submenu')) {
                        ruta = this.getParent('.submenu').getParent('.submenu').getProperty('data-ref') + ' - ' + this.getParent('.submenu').getProperty('data-ref') + ' - ' + this.getProperty('text');
                    } else {
                        ruta = this.getParent('.submenu').getProperty('data-ref') + ' - ' + this.getProperty('text');
                    }

                    $$('.submenu').removeClass('visible');
                    $$('.submenu').setStyle('display', null);
                } else {
                    ruta = nombre.toUpperCase();
                    ;
                }

                var datos = {};
                datos.nombre = nombre;

                $('botonActivo').setProperty('value', nombre);
                $('botonActivo').setProperty('data-pag', pagina);
                $('botonActivo').setProperty('data-ruta', ruta);

                $$('.botonActivo').removeClass('botonActivo');
                $$('li.activo').removeClass('activo');
                this.addClass('botonActivo');
                $(this).getParent().addClass('activo');
                abrirPagina(pagina, datos);
            }
        });
    });

    /*     $$('.menu')[0].getChildren('li').each(function(li) {
     li.addEvent('mouseover',function(){
     if(li.getElement('.submenu')) {
     if (!li.getElement('.submenu').hasClass('visible')) {
     $$('.menu')[0].getElements('.visible').removeClass('visible');
     $$('.menu')[0].getElements('.submenu').setStyle('display', null);
     $$('.menu')[0].getElements('.botonActivo').removeClass('botonActivo');
     }
     }
     });
     }); */

    $('menuprincipal').getElements('ul').each(function (ul) {
        var li = ul.getParent('li');
        li.addEvent('mousedown', function (e) {
            if (li.getElement('.submenu')) {
                if (!li.getElement('.submenu').hasClass('visible')) {

                    if (!li.getParent('.submenu')) {
                        $$('.submenu').removeClass('visible');
                        $$('.submenu').setStyle('display', null);
                    }

                    li.getElement('.submenu').addClass('visible');
                    li.getElement('.submenu').setStyle('display', 'block');
                } else {
                    if (!e.target.getParent('.submenu')) {
                        $$('.submenu').removeClass('visible');
                        $$('.submenu').setStyle('display', null);
                    }
                }
            }
        });
    });

    Ink.Autoload.run();
});