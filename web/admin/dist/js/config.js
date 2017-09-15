var Config;
Config = {
    html: null,
    main: function() {
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
                    Config.listadoUniversoTablas(table);
                    Config.activarTercerBloque();
                });
            }else{
                mostrarBug('Es necessario seleccionar una tabla para continuar', 'Uff!');
                console.warn('sendUniversoSeleccionado:Es necesario al menos seleccionar una entidad.')
            }
            return false;
        })
    },
    listadoUniversoTablas: function (table) {
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
                    Config.html += '                                <i class="fa fa-circle" aria-hidden="true"></i> <a class="cursor" data-tabla="' + key + '" data-id="1">'+valores.label+'</a>';
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
            /*
                   Config.html +='                <div class="panel panel-default">';
                   Config.html +='                    <div class="panel-heading">';
                   Config.html +='                        <h4 class="panel-title">';
                   Config.html +='                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" id="bancos-titulo">';
                   Config.html +='                             <i class="fa fa-table" aria-hidden="true"></i> &nbsp;Bancos</a>';
                   Config.html +='                        </h4>';
                   Config.html +='                    </div>';
                   Config.html +='                    <div id="collapseTwo" class="panel-collapse collapse in">';
                   Config.html +='                        <div class="panel-body">';
                   Config.html +='                            <table class="table" id="bancos">';
                   Config.html +='                                <tr>';
                   Config.html +='                                    <td>';
                   Config.html +='                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> <a class="cursor" data-tabla="bancos" data-id="0">Nueva Vista</a>';
                   Config.html +='                                    </td>';
                   Config.html +='                                </tr>';
                   Config.html +='                                <tr>';
                   Config.html +='                                    <td>';
                   Config.html +='                                        <i class="fa fa-circle" aria-hidden="true"></i> <a class="cursor" data-tabla="bancos" data-id="2">Números de Cuentas</a>';
                   Config.html +='                                    </td>';
                   Config.html +='                                </tr>';
                   Config.html +='                            </table>';
                   Config.html +='                        </div>';
                   Config.html +='                    </div>';
        Config.html +='                </div>';*/
        Config.html +='            </div>';
        Config.html +='        </div>';

        Config.html +=' <a class="btn btn-block btn-social btn-github" id="optRegresarVistaSegundaria">';
        Config.html +='     <i class="fa fa-undo"></i> Regresar a la pantalla anterior';
        Config.html +=' </a>';

        $('#box3 #menuPrincipal #menuPrincipalBody').html(' ').html(Config.html);

        Config.optRegresarVistaSegundaria();
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

            // Activar el segundo contenedor
            Config.activarSegundo('box3');
            // Enviar datos post para retornar datos
            $.post('/getConfiguracionVista',{'connect':connect, 'tabla':tabla , 'vista':id},function(dataJson ) {
                Config.html = '<form id="sendUniversoSeleccionado">';
                Config.html +=' <table class="table table-striped">';
                Config.html +='     <tr>';
                Config.html +='          <th style="width: 10px">Columna</th>';
                Config.html +='          <th style="width: 10px">Tipo</th>';
                Config.html +='          <th style="width: 10px" title="Dimension">D</th>';
                Config.html +='          <th style="width: 10px">Etiqueta</th>';
                Config.html +='          <th style="width: 10px">Mascara</th>';
                Config.html +='          <th style="width: 10px" title="Navega en otra Vista">NOV</th>';
                Config.html +='          <th style="width: 10px">CUAL</th>';
                Config.html +='     </tr>';
                // Recorrer datos principal
                $.each(dataJson , function( key, value ) {
                    var tmp = $('#box3 #'+tabla+'-titulo').text().trim();
                    var titulo =   '<b>'+tmp + '</b>'+ ' / ' + select ;
                    $('#box3 #menuSegundarioTilulo').html(' ').html(titulo);
                    Config.html +='     <tr>';
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
                        //alert(item+valor.tipo);
                        Config.html +='     <tr>';
                        var pk = valor.restrincion=='PRI' ? '<s>'+valor.name+'</s>' : valor.name;
                        Config.html +='          <td>'+pk+'</td>';
                        Config.html +='          <td>'+valor.tipo+'</td>';
                        Config.html +='          <td><span class="badge bg-blue">'+valor.dimension+'</span></td>';
                        //alert(valor.restrincion);
                        var req = valor.required=='YES' ? 'required' : '';
                        Config.html +='          <td><input type="text" size="20" '+req+'></td>';
                        Config.html +='          <td><select>';
                        Config.html +='          <option value="texto">Texo</option>';
                        Config.html +='          <option value="string">String</option>';
                        Config.html +='          <option value="numero">Numero</option>';
                        Config.html +='          <option value="correo">Correo</option>';
                        Config.html +='          <option value="ip">IP</option>';
                        Config.html +='          <option value="telefono">Telefono</option>';
                        Config.html +='          <option value="movil">Móvil</option>';
                        Config.html +='          </select></td>';
                        Config.html +='          <td></td>';
                        Config.html +='          <td></td>';
                        Config.html +='     </tr>';

                    });
                    Config.html +='</table>';
                    Config.html +=' <div class="box-footer">';
                    Config.html +='  <button type="submit" class="btn btn-info pull-right" id="enviarUniversoTablas">Enviar tablas seleccionadas</button>';
                    Config.html +=' </div>';
                    Config.html +='</form>';
                    var mostrarUniversoTablabody = $('#box3 #menuSegundarioBody').html(' ').html(Config.html);
                });
            },'JSON');


        })
    }

};
