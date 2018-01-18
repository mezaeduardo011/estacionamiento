//######
//## This work is licensed under the Creative Commons Attribution-Share Alike 3.0
//## United States License. To view a copy of this license,
//## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter
//## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
//## Desarrollado por JPH - Ing. - Gregorio Jose Bolivar
//######
/**
 * Esto es un namespace que hace parte de otro. Encargado de controlar las funcionalidades
 * de la vista cuando existe relaciones entre padre e hijos de vistas
 *
 * @namespace Box2
 * @memberOf Config
 */
Core.VistaRelacion = {};
Core.VistaRelacion = {
    pathR: '',
    columns: '',
    currentRequest: '',
    main: function (path,Config) {
        this.__pathR__ = path;
        this.__columns__ = Config.colums;
        this.listado(Config.show);
        this.procesar(Config.show);
    },
    listado : function (show) {
        var urlVistaTmp = this.__pathR__;
        var rows = this.__columns__;
        localStorage.setItem('urlVistaTmp-'+show.vista,urlVistaTmp);

        // Permite instanciar las funcionalidades de la Grid
        Core.VistaGrid.main(urlVistaTmp,rows,show);

        // Configuracion personalizada local de la vista
        Core.Vista.Util.priListaLoad();

        localStorage.removeItem('id');

    },
    doOnRowSelected: function (id, vista) {
        // Proceso mediante el cual permite cancelar peticiones enviadas y le da prioridad a las nuevas
        var send = '';
        if(Core.VistaRelacion.currentRequest){
            Core.VistaRelacion.currentRequest.abort();
        }
        Core.VistaRelacion.currentRequest = $.ajax({
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
                        $("#" + key).val(valor).keyup();
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
                    Core.VistaRelacion.sacarRegistro(vista);
                    Core.VistaRelacion.Util.priListaClick(dataJson);
                }else{
                    mostrarError(dataJson.msj);
                }

            }

        });
        /*Core.VistaRelacion.currentRequest = $.post('/'+vista.toLowerCase()+'Show',{'data':id},function (dataJson) {

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
            var validate = Core.Vista.Util.validateMascaras();
            // Permite verificar que los dos elementos sean exitoso para procesar los form
            if (Core.valCamposObligatoriosCompletos(send) && validate) {

                var campos = new FormData();

                $(send).find('input, select, textarea').each(function() {
                    var elemento= this;
                    //alert("elemento.id="+ elemento.name + ", elemento.value=" + elemento.value);
                    if(elemento.id=='id' || elemento.value!='') {
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


