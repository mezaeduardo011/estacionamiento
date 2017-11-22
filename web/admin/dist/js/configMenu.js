/*
######
## This work is licensed under the Creative Commons Attribution-Share Alike 3.0
## United States License. To view a copy of this license,
## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter
## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
## Desarrollado por JPH - Ing. - Gregorio Jose Bolivar
######
 Encargado de controlar las funcionalidades de Gestion de Menu de la vista box4
*/
Config.GestionMenu = {
    selectApp:'',
    contaM1:0,
    contaM2:0,
    main: function () {
        this.contaM1=0;
        var optGestionMenu = $('#box1 #optGestionMenu');

        // Accion del menu, Editar entidad existente
        optGestionMenu.click(function(){
            Config.html = '';
            Config.html +=' <a class="btn btn-block btn-social btn-github" id="optCrearMenu">';
            Config.html +='     <i class="fa fa-plus-square"></i> Crear menu';
            Config.html +=' </a>';
            Config.html +=' <a class="btn btn-block btn-social btn-github" id="optVerMenu">';
            Config.html +='     <i class="fa fa fa-bars"></i> Ver menu';
            Config.html +=' </a>';

            // Agregar contenido a la vista secundaria
            Config.agregarContenido(optGestionMenu.text(), Config.html,'box1');
            $('#box1 #menuPrincipal .btn-github').removeClass('active')
            optGestionMenu.addClass('active');
            Config.activarSegundo('box1');
            Config.GestionMenu.optCrearMenu();
            Config.GestionMenu.optVerMenu();
        });
    },
    activarCuartoBloque: function(){
        console.log('Loading del Config.GestionMenu.activarCuartoBloque');
        $('#box1, #box2, #box4').hide(900);
        $('#box4, #box4 #menuPrincipal').show(900);
    },
    /* Permite crear el menu estilo tree en el bloque principal */
    optCrearMenu: function () {
        var optCrearMenu = $('#box1 #optCrearMenu');
        optCrearMenu.click(function () {
            Config.html = ''
            Config.GestionMenu.activarCuartoBloque();
            // Permite extraer todas las Aplicaciones, Tablas y vistas disponibles para el sistema
            $.post('/showMenu',function (dataJson) {
                Config.html = '<div id="menuDisponible">';
                Config.html = '<ul id="treeview">';
                $.each(dataJson, function (indx, valu) {
                    // Aplicacion disponible
                    Config.GestionMenu.selectApp +='<option>'+indx+'</option>';
                    Config.html += '<li><a href="#">'+indx+'</a>';
                    Config.html += '<ul>';
                    $.each(valu, function (indx2, valu2) {
                        Config.html += '<li>'+indx2;
                        Config.html += '    <ul ondragstart="drag(event)" width="336" height="69">';
                        $.each(valu2, function (indx3, valu3) {
                            Config.html += ' <li id="'+valu3+'" draggable="true">'+valu3+'</li>';
                        });
                        Config.html += '    </ul>';
                        Config.html += '</li>';
                    });
                    Config.html += '</ul>';
                    Config.html += '</li>';
                });
                localStorage.setItem('appDisponibles',Config.GestionMenu.selectApp);
                Config.html += '</ul>';
                Config.html += '</div>';
                Config.html +=' <hr>';
                Config.html +=' <a class="btn btn-block btn-social btn-github" id="optRegresarVitaPrincipal">';
                Config.html +='     <i class="fa fa-undo"></i> Regresar a la pantalla anterior';
                Config.html +=' </a>';

                $('#box4 #menuPrincipal #menuPrincipalBody').html(' ').html(Config.html);
                $('#treeview').treed();
                // Regresar a la pantalla principal
                Config.actRegresarVitaPrincipal();
            },'JSON');
            // Se encarga de activar el contenedor dos de la vite de gestion de menu y darle accion
            Config.GestionMenu.optGestorConfigMenu();

        })
    },
    optVerMenu: function () {
        var optVerMenu = $('#box1 #optVerMenu');
        optVerMenu.click(function () {
            Config.GestionMenu.activarCuartoBloque();
        });
    },
    optGestorConfigMenu: function () {
        Config.html = '';
        Config.html = Config.GestionMenu.contenidoBloqueDragablePri();
        Config.agregarContenido('Configuración de Menu', Config.html, 'box4');
        Config.activarSegundo('box4');

        var addItemPrincipal = $('#box4 #addItem');
        addItemPrincipal.click(function () {
            Config.GestionMenu.addItemPrimerMenu();
            Config.GestionMenu.contaM1++;
            setTimeout(function() {
                Config.GestionMenu.deleteRowsMenuP()
                Config.GestionMenu.addItemMenu();
                console.log('Cargando acciones del submenu en 4000 milisegundos');
            }, 2000);
        });

    },

    /* Mostrar el contenido dragable */
    contenidoBloqueDragablePri:function () {
        Config.html = '';
        // Cabecera del nuevo formulario de creacion de entidades
        Config.html = '<form id="sendCreacionEntidad"  class="form-horizontal col-lg-12"" >';
        Config.html += ' <table class="table table-striped text-center">';
        Config.html += '       <tr>';
        Config.html += '           <td colspan="2"><div class="input-group col-lg-7"><span class="input-group-addon"><i class="fa fa-asterisk fa-3" aria-hidden="true"> &nbsp;&nbsp; <b><select>'+localStorage.getItem('appDisponibles')+'</select> / </b> </i></span><input type="text" name="entidad" maxlength="40" class="form-control" placeholder="Ingresar el nombre de tabla" pattern="^[a-z]([a-z_]){1,29}$" autofocus required></div></td>';
        Config.html += '      </tr>';
        Config.html += '     <!--  Compos del item del menu primer item  --->';
        Config.html += '     <tbody id="primerMenu">';
        Config.html += '     </tbody>';
        Config.html += '        <tr>';
        Config.html += '            <th colspan="2" style="text-align: right"><!--input type="submit" class="btn btn-primary"--><i class="fa fa-plus-circle fa-2 cursor btn" aria-hidden="true" id="addItem" title="Agregar Campos"> </th>';
        Config.html += '        </tr>';
        Config.html += '     </tfoot>';
        Config.html += '  </table>';
        Config.html += '</form>';
        Config.html += '<div>';
        //Config.html += '<div id="menuFinal" ondrop="drop(event)" ondragover="allowDrop(event)" style="border: 1px solid red"> &nbsp;</div>';
        Config.html += '</div>';
        return Config.html;
    },

    addItemPrimerMenu: function (opt) {
        Config.html = '';
        // Definicion del item que se va agregar nuevo item del menu principal
        Config.html = '<tr colspan="3" class="menuP'+Config.GestionMenu.contaM1+'">';
        Config.html += '    <td><input class="requerido form-control" name="primerNivel[]" id="primerNivel" placeholder="Primer Nivel" maxlength="60" size="20" pattern="^[a-z]([a-z_]){1,29}$" required></td>';
        var btn = '<i class="fa fa-arrows-v fa-2 cursor" aria-hidden="true" title="Mover Item" ></i><i class="fa fa-minus-circle fa-2 cursor btn" aria-hidden="true" id="delItem" title="Remover item del menu principal" data-menu="'+Config.GestionMenu.contaM1+'"></i>';
        Config.html += '    <td class="optionAction" id="moveItem">'+btn+'</td>';
        Config.html += '</tr>';
        Config.html += ' <td colspan="3" class="menuP'+Config.GestionMenu.contaM1+'">';
        Config.html += '    <table width="100%">';
        Config.html += '        <tbody id="menuFinal'+Config.GestionMenu.contaM1+'"></tbody>';
        Config.html += '    </table>'
        Config.html += '    <i class="fa fa-plus fa-2 cursor btn boxItemSubMenu addItemMenu" aria-hidden="true" data-menu="'+Config.GestionMenu.contaM1+'" title="Agregar Campos">';
        Config.html += ' </td>';

        // Imprime el html en el nuevo elemento creado en la tabla
        $('#box4 #primerMenu').append(Config.html);
    },

    addItemMenu: function () {
        var itemMenu = $('#box4 .addItemMenu');
        itemMenu.click(function (event) {
            var menup = $(this).data('menu');
            // Definicion del item que se va agregar nueva
            Config.html = '';
            Config.html = '<tr id="subItem'+Config.GestionMenu.contaM2+'">';
            Config.html += '    <td><input class="requerido form-control" name="baseUrl[]" id="baseUrl" placeholder="Ruta real del enlace" maxlength="60" size="20" pattern="^[a-z]([a-z_]){1,29}$" required></td>';
            Config.html += '    <td><input class="requerido form-control" name="nombreUrl[]" id="nombreUrl" placeholder="Nombre de enlace" maxlength="60" size="20" pattern="^[a-z]([a-z_]){1,29}$" required></td>';
            Config.html += '    <td><select name="targetUrl[]" class="requerido form-control" id="targetUrl"><option value="SI">SI</option><option value="NO">NO</option></select></td>';
                var btn = '<i class="fa fa-arrows-v fa-2 cursor" aria-hidden="true" title="Mover Item" ></i><i class="fa fa-minus-circle fa-2 cursor btn" aria-hidden="true" id="delItemDos" title="eliminar sub item" data-submenu="'+Config.GestionMenu.contaM2+'"></i>';
            Config.html += '    <td class="optionAction" id="moveItem">' + btn + '</td>';
            Config.html += '</tr>';
                // Imprime el html en el nuevo elemento creado en la tabla
            $('#menuFinal' + menup).append(Config.html);

            Config.GestionMenu.contaM2++;
            Config.GestionMenu.deleteRowsMenuS();
        })
    },
    // Permite eliminar el item principal del menu
    deleteRowsMenuP:function () {
        $('#box4 #delItem').click(function(){
            var valor = $(this).data('menu');
            $('.menuP'+valor).hide(900).remove();
            Config.GestionMenu.contaM1--;
        });

    },
    deleteRowsMenuS:function () {
        $('#box4 #delItemDos').click(function(){
            var valor = $(this).data('submenu');
            $('#subItem'+valor).hide(900).remove();
            Config.GestionMenu.contaM2--;
        });

    },
    dragable: function () {
        $("tbody").sortable({
            items: "> tr:not(:first)",
            appendTo: "parent",
            helper: "clone"
        }).disableSelection();

        $("#tabs ul li a").droppable({
            hoverClass: "drophover",
            tolerance: "pointer",
            drop: function(e, ui) {
                var tabdiv = $(this).attr("href");
                $(tabdiv + " table tr:last").after("<tr>" + ui.draggable.html() + "</tr>");
                ui.draggable.remove();
            }
        });
    }
}

/** funciones de drageble */
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    //alert(ev.target.id);
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    //ev.target.appendChild(tmp);
}

function dragend(ev) {
    alert('ññ');

}

/** Libreria necesaria para mostrar el tree */
$.fn.extend({
    treed: function (o) {

        var openedClass = 'glyphicon-minus-sign';
        var closedClass = 'glyphicon-plus-sign';

        if (typeof o != 'undefined'){
            if (typeof o.openedClass != 'undefined'){
                openedClass = o.openedClass;
            }
            if (typeof o.closedClass != 'undefined'){
                closedClass = o.closedClass;
            }
        };

        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
        tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('div').click();
                e.preventDefault();
            });
        });
    }
});