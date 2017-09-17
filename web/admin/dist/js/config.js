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
            $.post('/getConfiguracionConexiones',{'conexion':opt}, function(dataJson){
                if(dataJson.items>0) {
                    Config.html = '<div class="panel panel-default">';
                    Config.html += '     <div class="panel-leftheading">';
                    Config.html += '         <h4 class="panel-lefttitle"> &nbsp;&nbsp; ' + dataJson.data[0].label + ' </h4>';
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
                    $('#box2 #menuPrincipal #menuPrincipalBody #showConexionDataBaseSelect').html(' ').html(Config.html).show();
                    Config.mostrarUniversoTablaSegunConexion(dataJson.data[0].label,opt);
                }else{
                    $('#box2 #menuPrincipal #menuPrincipalBody #showConexionDataBaseSelect').html(' ').html(Config.html).hide();
                    Config.desactivarSegundo('box2');
                }

            })
        })
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
            Config.html += '          <th style="width: 10px">Tablas</th>';
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
            Config.sendUniversoSeleccionado()
        },'JSON')


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
        //alert(table);
        $('#box3 #menuPrincipalTitulo').html(' ').html('Listado de Tablas Seleccionadas');
        $.post('/getEntidadesSeleccionadas',{'entidad':table},function (dataJson) {

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
                    Config.html += '                                <i class="fa fa-circle" aria-hidden="true"></i> <a class="cursor" data-tabla="' + key + '" data-id="1-'+valores.nombre+'">'+valores.nombre+'</a>';
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

        Config.optRegresarVistaSegundaria();
        Config.optProcesarCodigoVistas();
        Config.selecionarItemTabla();
        },'JSON')
    },
    optRegresarVistaSegundaria: function () {
        var optRegresarVistaSegundaria = $('#box3 #menuPrincipalBody #optRegresarVistaSegundaria');
        optRegresarVistaSegundaria.click(function () {
            Config.activarSegundoBloque();
            informar('Regresar a la vista Segundaria', 'informar')
        })
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
        })
    },
    getConfiguracionVista: function (connect, tabla, id, select) {
        // Enviar datos post para retornar datos
        $.post('/getConfiguracionVista',{'connect':connect, 'tabla':tabla , 'vista':id },function(dataJson ) {
        Config.html = '<form method="post" id="sendVistaActiva"><input type="hidden" name="conexiones_id" value="'+connect+'">';
        Config.html += '<input type="hidden" id="tabla" name="tabla" value="'+tabla+'">';
        Config.html +=' <table class="table table-striped">';
        Config.html +='     <tr>';
        Config.html +='          <th style="width: 10px;">Columna</th>';
        Config.html +='          <th style="width: 10px;">Tipo</th>';
        Config.html +='          <th style="width: 5px;" title="Dimension de la tabla original">D</th>';
        Config.html +='          <th style="width: 20px;">Etiqueta</th>';
        Config.html +='          <th style="width: 10px;">Mascara</th>';
        Config.html +='          <th style="width: 5px;"title="Navega en otra Vista">NOV</th>';
        Config.html +='          <th style="width: 13px;"title="Cual vista navega del listado">CUAL</th>';
        Config.html +='          <th style="width: 13px;"title="Cual campo es el que necesita">Campo</th>';
        Config.html +='          <th style="width: 14px;"title="De cual Forma">Forma</th>';
        Config.html +='     </tr>';
        // Recorrer datos principal
        $.each(dataJson , function( key, value ) {
            var tmp = $('#box3 #'+tabla+'-titulo').text().trim();
            var titulo =   '<b>'+tmp + '</b>'+ ' / <input placeholder="Nombre de la vista" name="nombre" id="nameVista" value="' + select +'" style="border: none" maxlength="50" required>';
            $('#box3 #menuSegundarioTilulo').html(' ').html(titulo);
            Config.html +='     <tr>';
            Config.html +='          <td></td>';
            Config.html +='          <td></td>';
            Config.html +='          <td></td>';
            Config.html +='          <td></td>';
            Config.html +='          <td></td>';
            Config.html +='          <td></td>';
            Config.html +='          <td></td>';
            Config.html +='          <td></td>';
            Config.html +='          <td></td>';
            Config.html +='     </tr>';
            // Recorrer campos principal
            $.each(value.columns , function( item, valor ) {
                Config.html +='     <tr>';
                var pk = valor.restrincion=='PRI' ? '<u><b title="Primary Key de la entidad">'+valor.name+'</b></u>' : valor.name;
                Config.html +='          <td><input type="hidden" name="restrincion[]" value="'+valor.restrincion+'"><input type="hidden" name="field[]" value="'+valor.name+'">'+pk+'</td>';
                Config.html +='          <td><input type="hidden" name="type[]" value="'+valor.tipo+'">'+valor.tipo+'</td>';
                Config.html +='          <td><input type="hidden" name="dimension[]" value="'+valor.dimension+'"><span class="badge bg-blue">'+valor.dimension+'</span></td>';
                //alert(valor.restrincion);
                var req = valor.required=='YES' ? 'required' : '';
                var imp = valor.restrincion=='PRI' ? '<input type="hidden" name="etiqueta[]" size="20" value="'+valor.name+'" required><span title="Primary Key de la entidad">'+valor.name +'</span>' : '<div style="position: absolute; float: left; margin-top: -1px; font-size: 12px; z-index: 100; color:red;" title="Campo Requerido">*</div><input class="form-control etiqueta" name="etiqueta[]" value="'+valor.label+'" data-item="etiqueta-'+item+'" type="text" size="20" maxlength="20" '+req+'><div id="etiqueta-'+item+'" data-item="'+item+'" style="position: absolute; float: inherit; margin-top: -12px; font-size: 10px; z-index: 100;" title="Maxima cantidad de caracteres">20</div>';
                Config.html +='          <td>'+imp+'</td>';

                Config.html +='          <td><select class="form-control" name="mascara[]">';
                if(valor.restrincion=='PRI' || valor.tipo=='int'){
                    Config.html +='          <option value="integer" selected>Integer</option>';
                }else{
                    Config.html +='          <option value="texto">Texo</option>';
                    Config.html +='          <option value="integer">Integer</option>';
                    Config.html +='          <option value="string">String</option>';
                    Config.html +='          <option value="correo">Correo</option>';
                    Config.html +='          <option value="ip">IP</option>';
                    Config.html +='          <option value="telefono">Telefono</option>';
                    Config.html +='          <option value="movil">Móvil</option>';
                }
                Config.html +='          </select></td>';
                Config.html +='          <td class="text-center"><input type="checkbox" name="relacionado[]"></td>';
                Config.html +='          <td><select class="form-control" name="vista_campo[]"></select></td>';
                Config.html +='          <td><select class="form-control"></select></td>';
                Config.html +='          <td><select class="form-control"></select></td>';
                Config.html +='     </tr>';

            });
            Config.html +='</table>';
            Config.html +=' <div class="box-footer">';
            Config.html +='  <button type="submit" class="btn btn-info pull-right" id="enviarUniversoTablas">Procesar datos</button>';
            Config.html +=' </div>';
            Config.html +='</form>';
            var mostrarUniversoTablabody = $('#box3 #menuSegundarioBody').html(' ').html(Config.html);
        });
        Config.sendVistaNuevaConfigurada();
    },'JSON');
    },

    sendVistaNuevaConfigurada: function () {

        $('#box3 #menuSegundarioBody .etiqueta').keyup(function() {
            var id = $(this).data('item');
            var max_chars = $(this).attr('maxlength');
            var chars = $(this ).val().length;
            var diff = max_chars - chars;
            $('#'+id ).html(diff);
        });

        $('#box3 #menuSegundarioBody form#sendVistaActiva').submit(function(){
            var name = $('#box3 #nameVista');
            var item = $('#box3 #tabla');
            if(name.val()=='Nueva Vista'){
                mostrarError('Debe cambiar el nombre de la vista para poder procesar el registro: '+name.val());
                name.focus();
                return false;
            }
            var procesada = $("#box3 #tabla").val();

            $.post('/sendVistaNuevaConfigurada',$(this).serialize()+'&name='+name.val(), function (dataJson) {
                if(dataJson.error==0) {
                    alertar(dataJson.msj);
                    // append
                    Config.desactivarSegundo('box3');
                    Config.listadoUniversoTablas(); //collapsed
                    //$('table.table#'+item.val()).append('<tr><td><i class="fa fa-circle" aria-hidden="true"></i> <a class="cursor" data-tabla="'+item.val()+'" data-id="1">'+name.val()+'</a></td></tr>').fadeIn(1000)
                    //Config.selecionarItemTabla();
                    setTimeout(function(){ $('#box3 #accordionTablas #'+procesada+'-titulo').click(); }, 1000);
                }
            })
            return false;
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
                success: function(data){
                    // on success use return data here
                },
                error: function(xhr, type, exception) {
                    // if ajax fails display error alert
                    alert("ajax error response type "+type);
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
