//######
//## This work is licensed under the Creative Commons Attribution-Share Alike 3.0
//## United States License. To view a copy of this license,
//## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter
//## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
//## Desarrollado por JPH - Ing. - Gregorio Jose Bolivar
//######
/**
 * Esto es un namespace que hace parte de otro. Esta vista enta encargada de procesar un conjunto de funcionalidades
 * encargadas del funcionamiento de la vista de procesar los datos generales del los ABM.
 *
 * @namespace Vista
 * @memberOf Core
 */
Core.Vista = {};
Core.Vista = {
    /**
     * Esto es una variable global definida para el path de las vistas
     * @memberof Core.Vista.pathR
     */
    pathR: '',
    /**
     * Esto es una variable global donde se define las columnas a usar
     * @memberof Core.Vista.columns
     */
    columns: '',
    /**
     * Esto es una variable global que se define para ser usada para controlar
     * @memberof Core.Vista.currentRequest
     */
    currentRequest: '',
    /**
     * Esto es una función que permite ejecutar el constructor del namespace vista
     * @param string path, Ruta temporal de donde se procesaran los datos, ejemplo: Vista
     * @param object show, Objetos definidos en la vista del cliente valores de configuracion dea vista, Ejemplo:  Config.show = {'vista':'Tipo','tableTitle':'Listado de Registros.','autoWidth':true,'multiSelect':false,'pageSize':50,'pagesInGrp':10}
     * @memberof Core.Vista.run
     */
    main: function (path,Config) {
        this.__pathR__ = path;
        this.__columns__ = Config.colums;
        this.listado(Config);
        this.procesar(Config.show);
    },
    listado : function (Config) {
        var urlVistaTmp = this.__pathR__;
        var rows = this.__columns__;
        localStorage.setItem('urlVistaTmp-'+Config.show.vista,urlVistaTmp);

        if(Config.relacionPadre.id === undefined){
            // Permite instanciar las funcionalidades de la Grid
            Core.VistaGrid.main(urlVistaTmp,rows,Config.show);
        }else{
            // Permite instanciar las funcionalidades de la Grid
            var filter = Config.relacionPadre.field+'='+Config.relacionPadre.id;
            Core.VistaGrid.main(urlVistaTmp,rows,Config.show,'',filter);
        }



        // Configuracion personalizada local de la vista
        Core.Vista.Util.priListaLoad();

        localStorage.removeItem('id');

    },
    /**
     * Esto es una función que permite hacer la busqueda de un elemento cuando seleccionas un item del datatable
     * @param string id, Es el valor que capturo en la grud para pasar al formulario
     * @param string vista, Ruta temporal de donde se procesaran los datos, ejemplo: Vista
     * @memberof Core.Vista.run
     */
    doOnRowSelected: function (id, vista) {
        // Proceso mediante el cual permite cancelar peticiones enviadas y le da prioridad a las nuevas
        var send = '';
        if(Core.Vista.currentRequest){
            Core.Vista.currentRequest.abort();
        }
        // Asignar la peticion ajax a una variable
        Core.Vista.currentRequest = $.ajax({
                    url : '/'+vista.toLowerCase()+'Show',
                    type: "POST",
                    headers: {
                        'X-Auth-Token' : $('#csrf_token').val()
                    },
                    dataType: 'JSON',
                    data: {'data':id},
                    success : function(dataJson) {
                        if(dataJson.error==0) {
                            $.each(dataJson.datos, function (key, valor) {
                                $("."+vista+" #" + key).val(valor).keyup();
                                if (key == 'id') {
                                    localStorage.setItem('id', valor);
                                } else if (key == 'clave') {
                                    var item = $("#" + key + ",#re" + key);
                                    $("#" + key + ",#re" + key).val('').removeClass('requerido').siblings('label').children('div#campoRequerido').remove();
                                }
                            });
                            send = 'form#send' + vista + 'Procesar';

                            $(send).addClass('update');
                            $(send).data('id', localStorage.getItem('id'))
                            $(send+" button#submit").html('Actualizar Datos').fadeIn(909);
                            $("#divDelete").html('<a id="sacarRegistroSeleccionado" data-registro="' + localStorage.getItem('id') + '" class="btn btn-danger">Eliminar registro</a>');
                            Core.Vista.sacarRegistro(vista);
                            Core.Vista.Util.priListaClick(dataJson);
                        }else{
                            mostrarError(dataJson.msj);
                        }

                    }

        });
        /*Core.Vista.currentRequest = $.post('/'+vista.toLowerCase()+'Show',{'data':id},function (dataJson) {

        },'JSON');*/
    },
    procesar: function (show) {
        var temp = show.vista;

        var send = 'form#send'+temp+'Procesar';
        var tockeUpdate='6a5e98e08119d6bbc375cfdb928fe2bd';
        var tockeCreate='7ab22370bd8c9ca09537fd388778ee13';
        var token = false;
        var ruta = false;

        $(send+' #submit').click(function (event) {
            if ($(send).hasClass('update')) {
                ruta = temp.toLowerCase() + 'Update';
                token = tockeUpdate;
            } else {
                ruta = temp.toLowerCase() + 'Create';
                token = tockeCreate;
            }
            // Permite instanciar funcionalidad en la vista local
            Core.Vista.Util.priClickProcesarForm(send);
            // Permite validar elementos de la mascaras
            var validate = Core.Vista.Util.validateMascaras(send);
            // Permite verificar que los dos elementos sean exitoso para procesar los form
            if (Core.valCamposObligatoriosCompletos(send) && validate) {

                var campos = new FormData();

                $(send).find('input, select, textarea').each(function() {
                    var elemento= this;
                    //alert("elemento.id="+ elemento.name + ", elemento.value=" + elemento.value);
                    if((elemento.id=='id' && elemento.value!='') || elemento.value!='') {
                        //alert("elemento.id="+ elemento.name + ", elemento.value=" + elemento.value);
                        campos.append(elemento.name, $('.'+show.vista+' #'+elemento.id).val());
                    }
                });

                campos.append("token", token);
                $.ajax({
                    url: '/' + ruta,
                    type: "POST",
                    headers: {
                        'X-Auth-Token' : $('#csrf_token').val()
                    },
                    data: campos,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,   // tell jQuery not to set contentType
                    dataType: 'JSON',
                    success : function(dataJson) {
                        if (dataJson.error == 0) {
                            alertar(dataJson.msj);
                            setTimeout( location.reload(),500);
                            //Config.listado.table.ajax.reload();
                        } else {
                            mostrarError(dataJson.msj);
                        }
                    }
                });
            }
            return false;
            event.preventDefault();
        } );
    },
    sacarRegistro: function (vista) {
        $('a#sacarRegistroSeleccionado').click(function () {
            var ruta = vista.toLowerCase() + 'Delete';
            var valor = window.btoa($(this).data('registro'));

                $.ajax({
                    url: '/' + ruta,
                    type: "POST",
                    headers: {
                        'X-Auth-Token' : $('#csrf_token').val()
                    },
                    data: {"obj" : valor },
                    dataType: 'JSON',
                    success : function(dataJson) {
                        if (dataJson.error == 0) {
                            alertar(dataJson.msj);
                            setTimeout( location.reload(),500);
                        } else {
                            mostrarError(dataJson.msj);
                        }
                    }
                });
        });
    }
};


