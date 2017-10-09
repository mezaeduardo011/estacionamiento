//######
//## This work is licensed under the Creative Commons Attribution-Share Alike 3.0
//## United States License. To view a copy of this license,
//## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter
//## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
//## Desarrollado por JPH - Ing. - Gregorio Jose Bolivar
//######f
var Config;
Config = {
    html: null,
    progreso : null,
    main: function() {
        localStorage.removeItem('conexionId');
        localStorage.removeItem('entidadesSeleccionadas');
        // Opciones del menu
        var optBaseDatos = $('#box1 #optBaseDatos');
        var optCrearModelo = $('#box1 #optCrearModelo');
        var optEditarModelo = $('#box1 #optEditarModelo');
        console.log('Loading del Config.menu');
        // Accion del menu Base de datos
        optBaseDatos.click(function(){
            Config.html = '';
            Config.html +=' <a class="btn btn-block btn-social btn-github" id="optDbExistente">';
            Config.html +='     <i class="fa fa-list"></i> Conexiones existente';
            Config.html +=' </a>';
            Config.html +=' <div id="divDbExistente" style="display: none"></div>';
            Config.html +=' <a class="btn btn-block btn-social btn-github" id="optNuevaConexion" style="margin-top: 4px">';
            Config.html +='     <i class="fa fa-database"></i> Nueva Conexion';
            Config.html +=' </a><br/>';
            Config.html +=' <div id="divNuevaConexion" style="display: none"></div>';

            Config.agregarContenido(optBaseDatos.text(), Config.html,'box1');

            $('#box2 #menuPrincipal .btn-github').removeClass('active')
            optBaseDatos.addClass('active');
            Config.activarSegundo('box1');
            Config.activarMostrarConfigDB();
        });
        // Accion del menu Crear nuevo Modulo
        optCrearModelo.click(function(){
            $('#box2 #menuPrincipal .btn-github').removeClass('active')
            optCrearModelo.addClass('active');
            var texto = optCrearModelo.text();
            $('#box2 #menuPrincipal #menuPrincipalTitulo').html(' ').html(texto);
            Config.configurarUniversoTablas(texto);
            Config.desactivarSegundo('box2');
        });
        // Accion del menu, Editar entidad existente
        optEditarModelo.click(function(){
            Config.html = '';
            Config.html +=' <a class="btn btn-block btn-social btn-github" id="optEditarUniverso">';
            Config.html +='     <i class="fa fa-database"></i> Editar el universo de las tablas';
            Config.html +=' </a>';
            Config.html +=' <a class="btn btn-block btn-social btn-github" id="optEditarVistas">';
            Config.html +='     <i class="fa fa-plug"></i> Editar las Vistas existentes';
            Config.html +=' </a>';

            // Agregar contenido a la vista secundaria
            Config.agregarContenido(optEditarModelo.text(), Config.html,'box1');
            $('#box1 #menuPrincipal .btn-github').removeClass('active')
            optEditarModelo.addClass('active');
            Config.activarSegundo('box1');
        });
    },
    agregarContenido: function (titulo, contenido, contenedor) {
        console.log('Loading del Config.agregarContenido');
        $('#'+contenedor+' #menuSegundarioTilulo').html(' ').html(titulo);
        $('#'+contenedor+' #menuSegundarioBody').html(' ').html(contenido);
    },
    activarSegundo: function(box){
        console.log('Loading del Config.activarSegundo');
        $('#'+box+' #menuSegundario').show(900);
    },
    desactivarSegundo: function(box){
        console.log('Loading del Config.activarSegundo');
        $('#'+box+' #menuSegundario').hide(900);
    },
    activarSegundoBloque: function(){
        console.log('Loading del Config.activarSegundoBloque');
        $('#box1, #box3').hide(900);
        $('#box2, #box2 #menuPrincipal').show(900);
    },
    activarTercerBloque: function(){
        console.log('Loading del Config.activarSegundoBloque');
        $('#box1, #box2').hide(900);
        $('#box3, #box3 #menuPrincipal').show(900);
    },
    activarMostrarConfigDB: function(){
        var optDbExistente = $('#box1 #optDbExistente');
        var optNuevaConexion = $('#box1 #optNuevaConexion');
        optDbExistente.click(function(){
            if(optDbExistente.hasClass('active')){
                $('#box1 #menuSegundarioBody .btn-github').removeClass('active')
                $('#box1 #divDbExistente').html(' ').hide(900);
            }else {
               Config.loadTableConexiones()
            }
        });
        optNuevaConexion.click(function(){
            // Verificar si la vista esta activa debe cerrar
            if(optNuevaConexion.hasClass('active')){
                $('#box1 #menuSegundarioBody .btn-github').removeClass('active')
                $('#box1 #divNuevaConexion').html(' ').hide(900);
            }else{
                Config.html = '';
                Config.html +=' <form method="post" id="procesarConfigDB">';
                Config.html +=' <div class="form-group">';
                Config.html +=' <label>Datos del Server:</label>';
                Config.html +=' <div class="input-group">';
                Config.html +='  <div class="input-group-addon">';
                Config.html +='  <i class="fa fa-certificate"></i>&nbsp;';
                Config.html +='  </div>';
                Config.html +='    <input type="text" name="label" class="form-control" maxlength="20" placeholder="Ingresar la etiqueta de la conexion."  pattern="^([a-zA-Z0-9]){5,20}$" required>';
                Config.html +=' </div>';
                Config.html +=' <div class="input-group">';
                Config.html +='  <div class="input-group-addon">';
                Config.html +='  <i class="fa fa-id-card-o"></i>&nbsp;';
                Config.html +='  </div>';
                Config.html +='   <select class="form-control" name="driver" required> ';
                Config.html +='   <option selected value="sql">SQL Server</option> ';
                Config.html +='   </select> ';
                Config.html +=' </div>';
                Config.html +=' <div class="input-group">';
                Config.html +='  <div class="input-group-addon">';
                Config.html +='  <i class="fa fa-server"></i>&nbsp;';
                Config.html +='  </div>';
                Config.html +='    <input type="text" name="host" class="form-control" placeholder="Ingresar la ip del Servidor de BD" required>';
                Config.html +=' </div>';
                Config.html +=' <div class="input-group">';
                Config.html +='  <div class="input-group-addon">';
                Config.html +='  <i class="fa fa-database"></i>&nbsp;';
                Config.html +='  </div>';
                Config.html +='    <input type="text" name="db" class="form-control" placeholder="Ingresar el nombre de la BD" required>';
                Config.html +=' </div>';
                Config.html +=' <div class="input-group">';
                Config.html +='  <div class="input-group-addon">&nbsp;';
                Config.html +='  <i class="fa fa-user"></i>';
                Config.html +='  </div>';
                Config.html +='    <input type="text" name="usuario" class="form-control" placeholder="Ingresar el usuario de BD" required>';
                Config.html +=' </div>';
                Config.html +=' <div class="input-group">';
                Config.html +='  <div class="input-group-addon">';
                Config.html +='  <i class="fa fa-key"></i>&nbsp;';
                Config.html +='  </div>';
                Config.html +='    <input type="password" name="clave" class="form-control" placeholder="Ingresar la clave de base de datos" required >';
                Config.html +=' </div>';
                Config.html +=' <div class="box-footer">';
                Config.html +='  <button type="submit" class="btn btn-default">Cancelar</button>';
                Config.html +='  <button type="submit" class="btn btn-info pull-right">Crear Configuracion</button>';
                Config.html +=' </div>';
                Config.html +='</div>';
                Config.html +='</form>';
                $('#box1 #menuSegundarioBody .btn-github').removeClass('active')
                optNuevaConexion.addClass('active');
                $('#box1 #divNuevaConexion').html(' ').html(Config.html).show(900);
                Config.sendEnviarConfiguracion();
            }
        });
    },
    loadTableConexiones: function () {
        var optDbExistenteLoad = $('#box1 #optDbExistente');
        $.post('/getConfiguracionConexiones', function(dataJson) {
            Config.html = '';
            Config.html += '<table class="table table-striped text-center">';
            Config.html += ' <tr>';
            Config.html += '    <th>Etiqueta</th>';
            Config.html += '    <th>Host</th>';
            Config.html += '    <th>DB</th> ';
            Config.html += '    <th>User</th> ';
            Config.html += '    <th>opt</th> ';
            Config.html += ' </tr>';
            if(dataJson.items>0) {
                $.each(dataJson.data, function (key, value) {
                    Config.html += ' <tr>';
                    Config.html += '    <td>' + value.label + '</td>';
                    Config.html += '    <td>' + value.host + '</td>';
                    Config.html += '    <td>' + value.db + '</td>';
                    Config.html += '    <td ><span class="badge bg-green">' + value.usuario + '</span></td>';
                    Config.html += '    <td >';
                    Config.html += '        <i data-id="1" class="fa fa-check-square-o " style="cursor:pointer"></i>';
                    Config.html += '        <i data-id="1" class="fa fa-edit" style="cursor:pointer"></i>';
                    Config.html += '    </td>';
                    Config.html += '</tr>';
                });
            }else{
                Config.html += ' <tr>';
                Config.html += '    <td colspan="5" text-center><span class="badge bg-green"> NO SE HA ENCONTRADO CONEXIONES REGISTRADAS</span></td>';
                Config.html += '</tr>';
            }
            Config.html += '</table>';
            $('#box1 #divDbExistente').html(' ').html(Config.html).show(900);
            $('#box1 #menuSegundarioBody .btn-github').removeClass('active');
            optDbExistenteLoad.addClass('active');
        })
    },
    sendEnviarConfiguracion: function () {
        $('#box1  #menuSegundario #procesarConfigDB').submit(function () {
            console.info('Proceso enviando Config DataBase sendEnviarConfiguracion');
            $.post('/setDataBase',$(this).serialize(),function (dataJson) {
                if(dataJson.error==0){
                    Config.loadTableConexiones()
                    alertar(dataJson.msj);
                    $('#box1  #menuSegundario #procesarConfigDB input').val(' ');
                }else{
                    mostrarError(dataJson.msj);
                }

            },'JSON');
            return false;
        })
    },
    configurarUniversoTablas: function () {
        Config.activarSegundoBloque();
        Config.html = '';

        $.post('/getConfiguracionConexiones', function(dataJson) {
            Config.html +='<div class="form-group">';
            Config.html +='  <label>Seleccionar conexiones existente</label>';
            Config.html +='  <select class="form-control" id="selectConexionDataBaseSelect">';
            Config.html +='   <option selected>Seleccione</option>';
                $.each(dataJson.data,function (key, value) {
                    Config.html += '   <option data-label="'+value.label+'" value="'+value.id+'" class="item">'+value.label+'</option>';
                });
            Config.html +=' </select>';
            Config.html +='</div>';
            Config.html +='<div id="showConexionDataBaseSelect"></div>';
            Config.html +=' <a class="btn btn-block btn-social btn-github" id="optRegresarVitaPrincipal">';
            Config.html +='     <i class="fa fa-undo"></i> Regresar a la pantalla anterior';
            Config.html +=' </a>';
            $('#box2 #menuPrincipal #menuPrincipalBody').html(' ').html(Config.html);
            Config.showConexionDataBaseSelect();
            Config.actRegresarVitaPrincipal();
        });
        console.log('Loading del Config.configurarUniversoTablas');
    },
    actRegresarVitaPrincipal: function () {
        var optRegresarVitaPrincipal = $('#box2 #menuPrincipalBody #optRegresarVitaPrincipal');
        optRegresarVitaPrincipal.click(function () {
            Config.regresarVitaPrincipal();
            informar('regresar a la vista principal', 'informar')
        })
    },
    regresarVitaPrincipal: function(){
        console.log('Loading del Config.activarSegundoBloque');
        $('#box1').show(900);
        $('#box3, #box2, #box2 #menuPrincipal').hide(900);
    },
    regresarVitaSegundaria: function(){
        console.log('Loading del Config.regresarVitaSegundaria');
        $('#box2').show(900);
        $('#box3, #box1, #box1 #menuPrincipal').hide(900);
    },
    showConexionDataBaseSelect: function () {
        var showConexionDataBaseSelect = $('#box2 #menuPrincipalBody #selectConexionDataBaseSelect');
        showConexionDataBaseSelect.change(function () {
            var opt = $(this).val();
            localStorage.setItem('conexionId',opt);
           Config.loadConfigTablas();
        });
    },
    loadConfigTablas:function () {
        var opt = localStorage.getItem('conexionId');
        $.post('/getConfiguracionConexiones',{'conexion': opt}, function(dataJson){
            if(dataJson.items>0) {
                Config.html = '<div class="panel panel-default">';
                Config.html += '     <div class="panel-leftheading">';
                Config.html += '         <h4 class="panel-lefttitle"> &nbsp;&nbsp; ' + dataJson.data[0].label + ' </h4>';
                localStorage.setItem('baseDatosName',dataJson.data[0].db);
                localStorage.setItem('baseDatosDriver',dataJson.data[0].driver);
                Config.html += '     </div>';
                Config.html += '     <div class="panel-rightbody >';
                Config.html += '         <div class="input-group input-group-addon"">';
                $.each(dataJson.data, function (key, value) {
                    Config.html += '          <div class="input-group-addon">';
                    Config.html += '             <i class="fa fa-certificate"></i> &nbsp; Label&nbsp;:&nbsp; ' + value.label;
                    Config.html += '          </div><p></p>';
                    Config.html += '          <div class="input-group-addon">';
                    Config.html += '             <i class="fa fa-id-card-o"></i>  &nbsp;Driver&nbsp;:&nbsp;' + value.driver;
                    Config.html += '          </div><p></p>';
                    Config.html += '          <div class="input-group-addon">';
                    Config.html += '             <i class="fa fa-server"></i>  &nbsp;Base de Datos&nbsp;:&nbsp;' + value.db;
                    Config.html += '          </div><p></p>';
                    Config.html += '          <div class="input-group-addon">';
                    Config.html += '             <i class="fa fa-server"></i>  &nbsp;Host&nbsp;:&nbsp;' + value.host;
                    Config.html += '          </div><p></p>';
                    Config.html += '          <div class="input-group-addon">';
                    Config.html += '             <i class="fa fa-user"></i>  &nbsp;User&nbsp;:&nbsp;' + value.usuario;
                    Config.html += '          </div><p></p>';
                    Config.html += '          <div class="input-group-addon">';
                    Config.html += '             <i class="fa fa-key"></i>  &nbsp;Clave&nbsp;:&nbsp; ****** ';
                    Config.html += '          </div><p></p>';
                    Config.html += '         </div>';
                })
                Config.html += '     </div>';
                Config.html += '     <div class="clearfix"></div>';
                Config.html += '</div>';
                $('#box2 #menuPrincipal #menuPrincipalBody #showConexionDataBaseSelect').html(' ').html(Config.html).show(900);
                Config.mostrarUniversoTablaSegunConexion(dataJson.data[0].label,opt);
            }else{
                $('#box2 #menuPrincipal #menuPrincipalBody #showConexionDataBaseSelect').html(' ').html(Config.html).hide(900);
                Config.desactivarSegundo('box2');
            }

        });
    },
    mostrarUniversoTablaSegunConexion: function (titulo,dbId) {
        Config.activarSegundo('box2');
        $('#box2 #menuSegundarioTilulo').html(' ').html(titulo);
        $.post('/getAllUniverso',{'db':dbId},function (dataJson) {

            Config.html = '<form id="sendUniversoSeleccionado">';
            Config.html += ' <table class="table table-striped">';
            Config.html += '     <tr>';
            Config.html += '          <th style="width: 10px"><input type="checkbox" title="Todos" id="seleccionarTodoUniverso"></th>';
            Config.html += '          <th style="width: 10px">#</th>';
            Config.html += '          <th style="width: 10px">Base Dato</th>';
            Config.html += '          <th style="width: 10px">Tablas <i class="fa fa-plus-circle fa-2 cursor btn" aria-hidden="true" id="addEntidad"></i></th>';
            Config.html += '          <th style="width: 10px" class="text-center">N.Campo</th>';
            Config.html += '     </tr>';
            if(dataJson.error==0) {
                $.each(dataJson.data, function (key, value) {
                    Config.html += '  <tr>';
                    if (value.TABLE_REGISTRADA == 'SI'){
                        $chk = 'checked';
                    }else{
                        $chk = '';
                    }
                    Config.html += '        <td><input type="checkbox" class="item" data-table="' + value.TABLE_NAME + '" data-db="' + dbId + '" '+$chk+'></td>';
                    Config.html += '        <td>'+(parseInt(key)+1)+'</td>';
                    Config.html += '        <td>'+value.TABLE_CATALOG+'</td>';
                    Config.html += '        <td>'+value.TABLE_NAME+'</td>';
                    Config.html += '        <td class="text-center"><span class="badge bg-blue">'+value.TABLE_COLUMNS+'</span></td>';
                    Config.html += '  </tr>';
                })
            }else{
                Config.html += ' <tr>';
                Config.html += '    <td colspan="5" text-center><span class="badge bg-green">'+dataJson.msj+'</span></td>';
                Config.html += '</tr>';
            }

            Config.html += '</table>';
            Config.html += ' <div class="box-footer">';
            Config.html += '  <button type="submit" class="btn btn-info pull-right" id="enviarUniversoTablas">Enviar tablas seleccionadas</button>';
            Config.html += ' </div>';
            Config.html += '</form>';
            $('#box2 #menuSegundarioBody').html(' ').html(Config.html);
            Config.seleccionarTodoUniverso();
            Config.sendUniversoSeleccionado();
            // ### Otro namespace encargado de Procesar la creacion de tablas ###
            Config.gestionaTablas.main();
        },'JSON');


    },
    seleccionarTodoUniverso: function () {
       var activarSeleccionMultiple = $('#box2 #seleccionarTodoUniverso');
       var item = $('#box2 .item');
        activarSeleccionMultiple.change(function () {
            if($(this).is(':checked')){
                item.attr('checked', 'checked')
            }else{
                item.removeAttr('checked')
            }

        })
    },
    sendUniversoSeleccionado: function () {
        var sendUniversoSeleccionado = $('#box2 #menuSegundarioBody #sendUniversoSeleccionado');
        sendUniversoSeleccionado.submit(function () {
            if($('#box2 #menuSegundarioBody .item ').is(':checked')){

                // Registrar elemento
                var table = [];
                var db = '';
                $("#box2 #menuSegundarioBody input:checkbox:checked").each(function(key, value) {
                    db = $(this).data('db');
                    //alert(value.data('table'));
                    if(parseInt(db)>0 && typeof parseInt(db)!=="undefined"){
                        var item = $(this).data('table');
                        table.push(item);
                    }
                });

                $.post('/setEntidadesProcesar',{'db':db,'entidad':table},function ($dataJson) {
                    alertar('Enviar Configuracion del universo de las tablas');
                    // Cargo las entidades seleccionadas en localstore
                    localStorage.setItem('entidadesSeleccionadas',table);
                    Config.listadoUniversoTablas();
                    Config.activarTercerBloque();
                });
            }else{
                mostrarBug('Es necessario seleccionar una tabla para continuar', 'Uff!');
                console.warn('sendUniversoSeleccionado:Es necesario al menos seleccionar una entidad.')
            }
            return false;
        })
    },
    listadoUniversoTablas: function () {
        // leer las tablas seleccionadas en local store
        var table = localStorage.getItem('entidadesSeleccionadas');
        var conexion = localStorage.getItem('conexionId');
        $titulo='Listado de Tablas Seleccionadas';
        $('#box3 #menuPrincipalTitulo').html(' ').html($titulo);
        //alert(table);
        $('#optExtra').html(' ').html('<i class="fa fa-compress btn" aria-hidden="true" id="comprimirExpandir"></i>')


        $.post('/getEntidadesSeleccionadas',{'conn':conexion,'entidad':table},function (dataJson) {

        Config.html = '';
        Config.html +='<div class="col-sm-12 col-md-12 ">';
        Config.html +='            <div class="panel-group"  id="accordionTablas">';
        $a = 0;
            $.each(dataJson, function (key , values) {
            Config.html +='                <div class="panel panel-default ">';
            Config.html +='                    <div class="panel-heading">';
            Config.html +='                        <h4 class="panel-title">';
            Config.html +='                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse'+key+'" id="'+key+'-titulo">';
            Config.html +='                            <i class="fa fa-table" aria-hidden="true"></i> &nbsp;'+key+'</a>';
            Config.html +='                            <span class="label label-primary pull-right"> &nbsp;'+values.length+'</span>';
            Config.html +='                        </h4>';
            Config.html +='                    </div>';
            Config.html +='                    <div id="collapse'+key+'" class="panel-collapse collapse ">';
            Config.html +='                        <div class="panel-body">';
            Config.html +='                            <table class="table" id="'+key+'">';
            Config.html +='                                <tr>';
            Config.html +='                                    <td>';
            Config.html +='                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> <a class="cursor" data-tabla="'+key+'" data-id="0">Nueva Vista</a>';
            Config.html +='                                    </td>';
            Config.html +='                                </tr>';
            $.each(values, function (item,valores) {
                if(valores.catidad>0){
                    Config.html += '                        <tr>';
                    Config.html += '                            <td>';
                    if(parseInt(valores.procesado)==0) {
                        console.info(valores.procesado+'--0');
                        Config.html += '                         <i class="fa fa-square-o" aria-hidden="true"></i> <a class="cursor" data-tabla="' + key + '" data-id="1-' + valores.nombre + '">' + valores.nombre + '</a>';
                    }else{
                        Config.html += '                         <i class="fa fa-check-square-o" aria-hidden="true"></i> <a class="cursor" data-tabla="' + key + '" data-id="1-'+valores.nombre+'">'+valores.nombre+'</a>  <div class=" text-right" style="margin-top: -21px"><a href="/'+valores.nombre+'Index" target="_blank" class="cursor"><i class="fa fa-external-link" aria-hidden="true"></i></a></div>';
                        console.info(valores.procesado+'--1');
                    }
                    Config.html += '                            </td>';
                    Config.html += '                        </tr>';
                }
            });
            Config.html +='                            </table>';
            Config.html +='                        </div>';
            Config.html +='                    </div>';
            Config.html +='                </div>';
            $a ++;

        });

        Config.html +='            </div>';
        Config.html +='        </div>';

        Config.html +='<div class="col-sm-6 ">';
        Config.html +=' <a class="btn btn-block btn-social btn-github" id="optRegresarVistaSegundaria">';
        Config.html +='     <i class="fa fa-undo"></i> Regresar a la pantalla anterior';
        Config.html +=' </a>';
        Config.html +='</div>';
        Config.html +='<div class="col-sm-6 ">';
        Config.html +='     <a class="btn btn-block btn-social btn-facebook" id="optProcesarCodigoVistas" title="Procesar Vista">';
        Config.html +='         <i class="fa fa-cog fa-3x fa-fw"><!--Anima fa-spin --></i> Generar';
        Config.html +='     </a>';
        Config.html +='</div>';

        $('#box3 #menuPrincipal #menuPrincipalBody').html(' ').html(Config.html);
        Config.comprimirExpandir();
        Config.optRegresarVistaSegundaria();
        Config.optProcesarCodigoVistas();
        Config.selecionarItemTabla();

        },'JSON');
    },
    comprimirExpandir:function () {
        $('#comprimirExpandir').on('click',function () {
            var existe = $(this).hasClass('activado');
            if(!existe) {
                $('#box3 #menuPrincipalTitulo').hide(900);
                $('#box3 #menuPrincipalBody').hide(900).parent('div').parent('div').addClass('col-md-1').removeClass('col-md-4');
                $('#box3 #menuSegundario').addClass('col-md-11').removeClass('col-md-8');
                $(this).addClass('activado');
                $(this).addClass('fa-expand').removeClass('fa-compress');
            }else{
                $('#box3 #menuPrincipalTitulo').show(900);
                $('#box3 #menuPrincipalBody').show(900).parent('div').parent('div').addClass('col-md-4').removeClass('col-md-1');
                $('#box3 #menuSegundario').addClass('col-md-8').removeClass('col-md-11');
                $(this).removeClass('activado');
                $(this).addClass('fa-compress').removeClass('fa-expand');
            }
        });
    },
    optRegresarVistaSegundaria: function () {
        var optRegresarVistaSegundaria = $('#box3 #menuPrincipalBody #optRegresarVistaSegundaria');
        optRegresarVistaSegundaria.click(function () {
            Config.activarSegundoBloque();
            informar('Regresar a la vista Segundaria', 'informar')
        });
    },
    selecionarItemTabla: function(){
        var item = $('#accordionTablas .cursor')
        item.click(function () {
            // Item seleccionado
            var select = $(this).text();

            // Tabla del renglon
            var tabla = $(this).data('tabla');
            var id = $(this).data('id');
            var connect = localStorage.getItem('conexionId');

            Config.getConfiguracionVista(connect, tabla, id, select);
            // Activar el segundo contenedor
           Config.activarSegundo('box3');
        });
    },
    getConfiguracionVista: function (connect, tabla, id, select) {
        // Enviar datos post para retornar datos
        $.post('/getConfiguracionVista',{'connect':connect, 'tabla':tabla , 'vista':id },function(dataJson ) {
        Config.html = '<form method="post" id="sendVistaActiva"><input type="hidden" name="conexiones_id" value="'+connect+'">';
        Config.html += '<input type="hidden" id="tabla" name="tabla" value="'+tabla+'">';
        Config.html +=' <table class="table table-striped" id="defineEntity">';
        // Definicion de la tabla
        Config.html +='     <tr>';
        Config.html +='          <th style="width: 5%;">Columna</th>';
        Config.html +='          <th style="width: 5%;">Tipo</th>';
        Config.html +='          <th style="width: 2%;" title="Dimension de la tabla original">D</th>';
        Config.html +='          <th style="width: 13%;">Etiqueta &nbsp;<i id="cut" class="fa fa-files-o cursor" aria-hidden="true" title="Copiar todos los nombre de la vista real en esta fila"></i></th>';
        Config.html +='          <th style="width: 13%;">Mascara</th>';
        Config.html +='          <th style="width: 3%;"  title="Campo requerido">REQ</th>';
        Config.html +='          <th style="width: 3%;"  title="Ocultar en la Vista">HVI</th>';
        Config.html +='          <th style="width: 3%;"  title="Ocultar en el DataTable">HLI</th>';
        Config.html +='          <th style="width: 15%; text-align: center" title="Ingresar Place Holder">MSJ</th>';
        Config.html +='          <th style="width: 10%;"  title="Navega en otra Vista o es combo">NOV</th>';
        Config.html +='          <th style="width: 15%;" title="Cual vista navega del listado">CUAL</th>';
        Config.html +='          <th style="width: 15%;" title="Cual campo es el que necesita">Campo</th>';
        Config.html +='     </tr>';

        // Extraer las aplicaciones existente
        var seleApps='<select name="apps" id="apps">';
        seleApps +='<option value="0" selected><- Aplicación -></option>';
        $.post('/getListApp',function (dataJson) {
            $.each(dataJson.seleApps, function (key, value) {
                    $('#apps').append('<option value="'+value+'">'+value+'</option>');
            });
        },'JSON');
        seleApps+='</select>';

        // Recorrer datos principal
        $.each(dataJson , function( key, value ) {
            var tmp = $('#box3 #'+tabla+'-titulo').text().trim();
            var titulo =   seleApps+' / <b>'+tmp + '</b>'+ ' / <input placeholder="Nombre de la vista" name="nombre" id="nameVista" value="' + select +'" style="border: none" maxlength="50" required>';
            $('#box3 #menuSegundarioTilulo').html(' ').html(titulo);
            var BTN = 'Procesar vista';
            // Recorrer campos principal
            $.each(value.columns , function( item, valor ) {
                // ########### Ya esta registrado  mostar ############
                // Valores cuando es un update o mostrar
                var VA_0 = '';
                var VA_1 = '';
                var VA_2 = '';
                var VA_3 = '';
                var VA_4 = '';
                var VA_5 = '';

                if(id!=0 && (valor.label.length>0 || valor.place_holder.length>0 || valor.relacionado==1)) {
                    VA_0 = 'value="' + valor.label + '"';     // Valor cuando existen valor en la etiqueta
                    VA_2 = 'value="' + valor.place_holder + '"'; // Valor cuando existe registro en el place_holder
                    if (valor.relacionado!=0){ // Debe ser grilla o combo
                        VA_3 = '<option value="'+valor.relacionado+'" selected>'+valor.relacionado+'</option>'; // Valor para cuando retorna el valor relacionado y esta chequeado
                        VA_4 = '<option value="'+valor.tabla_vista+'" selected>'+valor.tabla_vista+'</option>'; // Seeccion de Tabla y Vista
                        VA_5 = '<option value="'+valor.vista_campo+'" selected>'+valor.vista_campo+'</option>'; // Seleccion de Item
                    }
                    BTN = 'Actualizar vista';
                }
                // ###########  END   ######
                // Verificar si la item es Primery Key
                var PK_0 = valor.restrincion!='PRI' ? '' : 'readonly';                                      // Solo para SELECT y INPUT
                var PK_1 = valor.restrincion=='PRI' ? 'onclick="this.checked=!this.checked" checked' : '';  // Solo para Checkbox Marcar como Ocultar y bloquea su uso
                var PK_2 = valor.restrincion=='PRI' ? 'onclick="this.checked=!this.checked"' : '';  // Solo para Checkbox
                var RE_1 = valor.nulo!='YES' ? 'onclick="this.checked=!this.checked" checked' : '';    // Solo para Checkbox Marca como requerido y no se puede quitar
                var TC_0 = ''; // Cuando es un tipo de capo reservado por el sistema es imput
                var TC_1 = ''; // Cuando es tipo Checkbox de campo reservado y es para Ocultar
                var TC_2 = ''; // Cuando es tipo Checkbox de campo reservado y es para Mostrar
                if(valor.name=='created_user_id' || valor.name=='updated_user_id' ||  valor.name=='created_at' ||  valor.name=='updated_at'){
                    TC_0 = 'value="'+valor.name+'" readonly'
                    TC_1 = 'onclick="this.checked=!this.checked" checked'
                    TC_2 = 'onclick="this.checked=!this.checked"'
                }

                var pk = valor.restrincion=='PRI' ? '<u><b title="Primary Key de la entidad">'+valor.name+'</b></u>' : valor.name;
                Config.html +='    <td><input type="hidden" name="restrincion['+item+']" value="'+valor.restrincion+'"><input type="hidden" name="field['+item+']" value="'+valor.name+'">'+pk+'</td>';
                if(id!=0){
                    Config.html +='<td><input type="hidden" name="id['+item+']" value="'+valor.id+'">';
                }else{
                    Config.html +='<td>';
                }
                Config.html +='    <input type="hidden" name="type['+item+']" value="'+valor.tipo+'">'+valor.tipo+'</td>';
                Config.html +='    <td><input type="hidden" name="dimension['+item+']" value="'+valor.dimension+'"><span class="badge bg-blue">'+valor.dimension+'</span></td>';
                //alert(valor.restrincion);
                var req = valor.nulo!='YES' ? 'nulo' : '';
                var req1 = valor.nulo!='YES' ? '<div style="position: absolute; float: left; font-size: 20px; z-index: 100; color:white; background: red; height: 18px;width: 10px;margin-left: -3px; padding-left: 2px;" title="Campo Requerido">*</div>' : '';
                var req2 = valor.nulo!='YES' ? '<div id="etiqueta-'+item+'" data-item="'+item+'" style=" float: right; margin-top: -12px; margin-right: -12px; font-size: 10px; z-index: 100;" title="Maxima cantidad de caracteres">20</div>' : '';
                var imp = valor.restrincion=='PRI' ? '<input type="hidden" name="etiqueta['+item+']" size="20" value="'+valor.name+'" required><span title="Primary Key de la entidad">'+valor.name +'</span>' : req1+'<input class="form-control etiqueta" name="etiqueta['+item+']"  data-item="etiqueta-'+item+'" type="text" size="20" maxlength="20" '+req+' '+TC_0+' '+VA_0+'>'+req2;
                Config.html +='          <td>'+imp+'</td>';

                Config.html +='          <td><select class="form-control" name="mascara['+item+']" '+PK_0+' id="mascara_'+item+'">';
                if(valor.restrincion=='PRI' || valor.tipo=='int' || valor.name=='created_user_id' || valor.name=='created_user_id' ){
                    Config.html +='          <option value="integer" selected>Integer</option>';
                }else if(valor.tipo=='bit'){
                    Config.html +='          <option value="boolean" selected>Boolean</option>';
                }else if(valor.tipo=='date'){
                    Config.html +='          <option value="boolean" selected>Fecha</option>';
                }else if(valor.tipo=='timestamp' || valor.name=='created_at' || valor.name=='updated_at'){
                    Config.html +='          <option value="timestamp" selected>Timestamp</option>';
                }else if(valor.tipo=='text' || valor.dimension>250){
                    Config.html +='          <option value="textArea" selected >TextArea</option>';
                }else{
                    Config.html +='          <option value="texto">Texo</option>';
                    Config.html +='          <option value="integer">Integer</option>';
                    Config.html +='          <option value="string">String</option>';
                    Config.html +='          <option value="datepicker">Fecha</option>';
                    Config.html +='          <option value="correo">Correo</option>';
                    Config.html +='          <option value="ip">IP</option>';
                    Config.html +='          <option value="telefono">Telefono</option>';
                    Config.html +='          <option value="movil">Móvil</option>';
                }
                Config.html +='          </select></td>';

                Config.html +='          <td class="text-center"><input type="checkbox" name="nulo['+item+']" '+RE_1+' '+TC_2+' '+VA_1+'></td>';
                Config.html +='          <td class="text-center"><input type="checkbox" name="hidden_form['+item+']" '+PK_1+' '+TC_1+' '+VA_1+'></td>';
                Config.html +='          <td class="text-center"><input type="checkbox" name="hidden_list['+item+']" '+PK_1+' '+TC_1+' '+VA_1+'></td>';
                Config.html +='          <td class="text-center"><input class="form-control place_holder" type="text" name="place_holder[]" id="place_holder_'+item+'" '+PK_0+' '+TC_0+' '+VA_2+'></td>';
                //Config.html +='          <td class="text-center"><input type="checkbox" name="relacionado['+item+']" id="relacionEntidad" '+VA_3+'></td>';
                Config.html +='          <td class="text-center"><select class="form-control" name="relacionado['+item+']" id="relacionEntidad">'+VA_3+'<option value="0">----</option><option value="combo">Combo</option><option value="grilla">Grilla</option></select></td>';
                Config.html +='          <td><select class="form-control" name="tabla_vista['+item+']" id="tabla_vista" '+TC_0+'><option value="0" selected>----</option>'+VA_4+'</select></td>';
                Config.html +='          <td><select class="form-control" name="vista_campo['+item+']" id="vista_campo" '+TC_0+'><option value="0" selected>----</option>'+VA_5+'</select></td>';
                Config.html +='     </tr>';

            });
            Config.html +='</table>';
            Config.html +=' <div class="box-footer">';
            Config.html +='  <button type="submit" class="btn btn-info pull-right" id="enviarUniversoTablas">'+BTN+'</button>';
            Config.html +=' </div>';
            Config.html +='</form>';
            var mostrarUniversoTablabody = $('#box3 #menuSegundarioBody').html(' ').html(Config.html);
        });
        // Valores de seleccion de la apps
            setTimeout(function () {
                $('#apps').val(dataJson[0].apps)
            },500);

        Config.copiarMasivo();
        Config.activarRelacionTable();
        Config.sendVistaNuevaConfigurada();
        },'JSON');
    },
    copiarMasivo: function (){
        $('#cut').click(function () {
           var ta1 = $('#box3 #defineEntity').find('tr');
            $.each(ta1 ,function(index,elemento){
                var let = $(elemento).find('td').eq(0).text();
                 $(elemento).find('td').eq(3).children('input').val(let).keyup();
                 var msjPlaceHolder = 'Por favor ingresar el/los '+let;
                 $(elemento).find('td').eq(8).children('input').val(msjPlaceHolder).attr({'title':msjPlaceHolder});
            })
            alertar('Todos los elementos copiado exitosamente.')
        });
    },
    activarRelacionTable:function () {
        var btnActivarRelacion =  $('#box3 #relacionEntidad');

        // Si activa el boton de que hay una relacion padre e hijo
        btnActivarRelacion.on('change',function (event) {
            var activo = $(this);
            if($(this).val()!=0) {
                var apps = $('#box3 #apps');
                if(apps.val()==0){
                    mostrarError('¡Uff!, debe seleccionar una aplicación para procesar las relaciones de entidades');
                    apps.focus();
                    event.preventDefault();
                }else{
                    var conex = localStorage.getItem('conexionId');
                    var opt = '<option value="0" selected>Seleccione</option>';
                    $.post('/getVistas',{'apps':apps.val(),'conexionId':conex,'tipo':activo.val()},function (dataJson) {
                        var rowss = [];
                        $.each(dataJson.datos,function (key,value) {
                            opt+='<option name="'+value.entidad+'|'+value.vista+'">'+value.entidad+'--'+value.vista+'--'+value.pk+'</option>';
                        });
                        activo.parent('td').next('td').children('select').html(opt).change(function () {
                                var v = $(this);
                                $.post('/getVistasColumns',{'apps':apps.val(),'conexionId':conex,'entidad':v.val()},function (dataJson) {
                                    Config.html = '<option value="0" selected>Seleccione</option>';
                                    $.each(dataJson.rows ,function(k,v){
                                        Config.html += '<option name="'+v.campos+'">'+v.campos+'</option>';
                                    });
                                    v.parent('td').next('td').children('select').html(' ').html(Config.html);
                                });

                        })
                    },'JSON');
                }
            } else {
                var opt = '<option value="0" selected>Seleccione</option>';
                btnActivarRelacion.parent('td').next('td').children('select').html(opt);
                btnActivarRelacion.parent('td').next('td').next('td').children('select').html(opt);
            }
        })
    },
    sendVistaNuevaConfigurada: function () {

        $('#box3 #menuSegundarioBody .etiqueta').keyup(function() {
            var id = $(this).data('item');
            var max_chars = $(this).attr('maxlength');
            var chars = $(this ).val().length;
            var diff = max_chars - chars;
            $('#'+id ).html(diff);
        });

        $('#box3 #menuSegundarioBody form#sendVistaActiva').submit(function(e){
            var apps = $('#box3 #apps');
            var name = $('#box3 #nameVista');
            var item = $('#box3 #tabla');
            // Validar que alla ingresado un valor valido en la vista
            if(name.val()=='Nueva Vista'){
                mostrarError('Debe cambiar el nombre de la vista para poder procesar el registro: '+name.val());
                name.focus();
                return false;
            }else if(name.val().length<4){
                mostrarError('Debe cambiar el nombre de la vista para poder procesar el registro, debe tener mas de 3 caracteres y diferente de null la vista: '+name.val());
                name.focus();
                return false;
            }
            // Validar que alla seleccionado una apps
            //alert(parseInt(apps.val()));
            if(parseInt(apps.val())==0){
                mostrarError('Debe seleccionar una aplicación en el cual será creada esta vista: '+name.val());
                apps.focus();
                return false;
            }
            var procesada = $("#box3 #tabla").val();
            //$('#box3 #comprimirExpandir').click();
            $.post('/sendVistaNuevaConfigurada',$(this).serialize()+'&name='+name.val()+'&apps='+apps.val(), function (dataJson) {
                if(dataJson.error==0) {

                    alertar(dataJson.msj);
                    Config.desactivarSegundo('box3');
                    Config.listadoUniversoTablas(); //collapsed
                    //$('table.table#'+item.val()).append('<tr><td><i class="fa fa-circle" aria-hidden="true"></i> <a class="cursor" data-tabla="'+item.val()+'" data-id="1">'+name.val()+'</a></td></tr>').fadeIn(1000)
                    //Config.selecionarItemTabla();
                    setTimeout(function(){ $('#box3 #accordionTablas #'+procesada+'-titulo').click(); }, 1000);
                }
            })
            e.preventDefault();
        })

    },
    optProcesarCodigoVistas: function () {
        $('#box3 #optProcesarCodigoVistas').click(function () {
            var con = localStorage.getItem('conexionId');
            var ent = localStorage.getItem('entidadesSeleccionadas');
            $(this).children('i').addClass('fa-spin');
            // Informar proceso
            //var progreso = setInterval(Config.informarProgresoVista, 500);
            $.ajax({
                async: true,
                type: 'POST',
                url: '/procesarCrudVistas',
                data: {'connect':con,'tabla':ent},
                success: function(dataJson){
                    if(dataJson.error==0){
                        alertar(dataJson.msj);
                        $('#box3 #optProcesarCodigoVistas').children('i').removeClass('fa-spin');
                        Config.listadoUniversoTablas(); //collapsed
                        //$('table.table#'+item.val()).append('<tr><td><i class="fa fa-circle" aria-hidden="true"></i> <a class="cursor" data-tabla="'+item.val()+'" data-id="1">'+name.val()+'</a></td></tr>').fadeIn(1000)
                        //Config.selecionarItemTabla();
                        //setTimeout(function(){ $('#box3 #accordionTablas #'+procesada+'-titulo').click(); }, 1000);
                        Config.desactivarSegundo('box3');
                    }else{
                        mostrarError(dataJson.msj)
                    }
                },
                error: function(xhr, type, exception) {
                    // if ajax fails display error alert
                    mostrarError("ajax error response type "+type);
                }
            });


        })
    },
    informarProgresoVista: function () {
        $.ajax({
            async: true,
            type: 'POST',
            url: '/informarProceso',
            success: function(dataJson){
                alertar(dataJson.msj+' '+dataJson.proceso+''+dataJson.alter);
                if(dataJson.proceso==100){clearInterval(Config.optProcesarCodigoVistas.progreso)}
            },
            error: function(xhr, type, exception) {
                // if ajax fails display error alert
                alert("ajax error response type "+type);
            }
        });
    }
};
