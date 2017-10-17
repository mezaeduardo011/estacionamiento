//######
//## This work is licensed under the Creative Commons Attribution-Share Alike 3.0
//## United States License. To view a copy of this license,
//## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter
//## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
//## Desarrollado por JPH - Ing. - Gregorio Jose Bolivar
//######
Config.gestionaTablas = {
    html: null,
    progreso : null,
    main: function() {
        this.createTable();
    },
    createTable:function () {
        var addEntidad = $('#box2 #addEntidad');

        // Cabecera del nuevo formulario de creacion de entidades
        Config.html = '<form id="sendCreacionEntidad"  class="form-horizontal" >';
        Config.html += ' <table class="table table-striped text-center">';
        Config.html += '        <tr>';
        Config.html += '            <td colspan="6"><div class="input-group col-lg-8"><span class="input-group-addon"><i class="fa fa-database fa-3" aria-hidden="true"> &nbsp;&nbsp; <b>'+localStorage.getItem('baseDatosName')+' / </b> </i></span><input type="text" name="entidad" maxlength="40" class="form-control" placeholder="Ingresar el nombre de tabla" pattern="^[a-z]([a-z_]){1,29}$" autofocus required></div></td>';
        Config.html += '        </tr>';
        Config.html += '        <tr class="border:1px">';
        Config.html += '          <th style="width:23%">Nombre</th>';
        Config.html += '          <th style="width:16%">Tipo</th>';
        Config.html += '          <th style="width:12%">Null</th>';
        Config.html += '          <th style="width:20%">Index</th>';
        Config.html += '          <th style="width:20%;">Extra</th>';
        Config.html += '          <th style="width:4%;">Act</th>';
        Config.html += '        </tr>';
        Config.html += '     <tbody id="camposEntidad">';
        Config.html += '     </tbody>';
        Config.html += '        <tr>';
        Config.html += '            <th colspan="6" style="text-align: right"><input type="hidden" name="baseDatosDriver" value="'+localStorage.getItem('baseDatosDriver')+'"><input type="hidden" name="conexionId" value="'+localStorage.getItem('conexionId')+'"><input type="hidden" name="databaseName" value="'+localStorage.getItem('baseDatosName')+'"><input type="submit" class="btn btn-primary"><i class="fa fa-plus-circle fa-2 cursor btn" aria-hidden="true" id="addItem"></th>';
        Config.html += '        </tr>';
        Config.html += '     </tfoot>';
        Config.html += '  </table>';
        Config.html += '</form>';

        // Acciones de la tabla dinamica que se instancia desde el config.js line 344 Config.gestionaTablas.main();
        addEntidad.click(function () {
            //Carga la tabla dinamica a cabecera
            $('#box2 #menuSegundarioBody').html(' ').html(Config.html);

            // Agregar item cuando es primera vez
            Config.gestionaTablas.addItemTabla('PRI');

            // Accion cuando hace click en la opciones de la tabla dinamica
            $('#box2 #addItem').click(function(){
                    // Agregar item cuando es la segunda vez
                    Config.gestionaTablas.addItemTabla('SEG');
                    // Accion cuando quiere eliminar un elemento de la tabla dinamica
                    $('#box2 #delItem').click(function(){
                        $(this).parent('td').parent('tr').hide(900).remove();
                    });
                    // Acccion para cuando es varchar
                    $('#box2 #tipos').change(function () {
                        var toque = $(this);
                        if(toque.val()=='varchar'){
                            $(this).siblings().show(900).focus().change(function(){
                                // Valor ingresao del varchar
                                var valorItem = $(this).val();
                                // Valor del nuevo varchar
                                var redefinirVarchar = toque.val()+'('+valorItem+')';
                                //alert(redefinirVarchar);
                                //if(redefinirVarchar!=' '){ $(toque).val(redefinirVarchar);}

                            });
                        }else{
                            $(this).siblings().hide(900);
                        }
                    });
            });
            Config.gestionaTablas.sendCreacionData();
      });
    },
    sendCreacionData: function () {
        var sendCreacion = $('#box2 form#sendCreacionEntidad');
        sendCreacion.submit(function(){
           $.post('/createTablas',$(this).serialize(),function (dataJson) {
               if(dataJson.error==0){
                   alertar(dataJson.msj);
                   setTimeout(function () {
                       Config.Box2.loadConfigTablas();
                   },'500');
               }else{
                   mostrarError(dataJson.msj);
               }
           },'JSON');
           return false;
        });
    },
    addItemTabla: function (opt) {
        // Variable encargada de contener la configuracion de los tipos de datos soportados
        var tipo = '<select name="tipos[]" class="requerido form-control" id="tipos" required>';
        tipo += '<option value="0"><-Seleccione-></option>';
        tipo += '<option value="int">Integer</option>';
        tipo += '<option value="varchar">Varchar</option>';
        tipo += '<option value="text">text</option>';
        tipo += '<option value="intbig">Intbig</option>';
        tipo += '<option value="bit">boolean</option>';
        tipo += '<option value="date">date</option>';
        tipo += '<option value="datetime">datetime</option>';
        tipo += '</select>';
        tipo += '<input id="item" name="varcharValor[]" type="text" size="2" maxlength="3" style="float:rigth; position:absolute;margin-top:-30px; z-index: 100; display: none"/>';

        // Variable encargada de contener los index de las variables
        var index = '<select name="index[]" class="form-control" id="index">';
        index += '<option value="0"><-Seleccione-></option>';
        index += '<option value="PRIMARY KEY">PRIMARY KEY</option>';
        index += '<option value="UNIQUE">UNIQUE</option>';
        index += '</select>';

        // Variable encargada de contener las funcionaes extras del selector
        var extra = '<select name="extra[]" class="form-control" id="extra">';
        extra += '<option value="0"><-Seleccione-></option>';
        extra += '<option value="AUTO INCREMENTO">AUTO INCREMENTO</option>';
        extra += '</select>';

        // Definicion del item que se va agregar nueva
        Config.html = '<tr>';
        Config.html += '    <td><input class="requerido form-control" name="campos[]" id="campos" placeholder="Nombre del campo" maxlength="60" size="20" pattern="^[a-z]([a-z_]){1,29}$" required></td>';
        Config.html += '    <td>'+tipo+'</td>';
        Config.html += '    <td><select name="requerido[]" class="requerido form-control" id="requerido"><option value="NULL">SI</option><option value="NOT NULL">NO</option></select></td>';
        Config.html += '    <td>'+index+'</td>';
        Config.html += '    <td>'+extra+'</td>';
        Config.html += '    <td><i class="fa fa-minus-circle fa-2 cursor btn" aria-hidden="true" id="delItem"></i></td>';
        Config.html += '</tr>';

        // Imprime el html en el nuevo elemento creado en la tabla
        $('#box2 #camposEntidad').append(Config.html).show('slow');

        // Funcionalidad nueva cuando es primera vez
        if(opt=='PRI'){
            $('#campos').val('id');
            $('#tipos').val('int');
            $('#requerido').val('NOT NULL');
            $('#index').val('PRIMARY KEY');
            $('#extra').val('AUTO INCREMENTO');
            // Cuando es primera vez no esta este evento de elemininarssssss
            $('#box2 #delItem').click(function(){
                $(this).parent('td').parent('tr').hide(900).remove();
            });
        }
    }
};
