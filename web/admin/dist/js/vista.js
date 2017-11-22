//######
//## This work is licensed under the Creative Commons Attribution-Share Alike 3.0
//## United States License. To view a copy of this license,
//## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter
//## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
//## Desarrollado por JPH - Ing. - Gregorio Jose Bolivar
//######
Core.Vista = {};
Core.Vista = {
    pathR: '',
    columns: '',
    myGrid: '',
    currentRequest: '',
    main: function (path,Config) {
        this.__pathR__ = path;
        this.__columns__ = Config.colums;
        this.listado(Config.show);
        this.procesar();
    },
    listado : function (show) {
        var temp = this.__pathR__;
        var rows = this.__columns__;

        /* START DE GRILLA DHTML */
        var camp = '';
        /* Procedemos a crear una cadena de texto paa enviar al procesador de la vista para enviar lo datos en json*/
        $.each(rows, function (index,value) {
            camp+='id:'+value.id+'|type:'+value.type+'|align:'+value.align+'|sort:'+value.sort+'|value:'+value.value+'#';
        });
        // Quitamos el ultimo caracter de la cadena
        var tmp = camp.substring(0,camp.length-1);

        Core.Vista.myGrid = new dhtmlXGridObject('dataJPH'+show.module);
        Core.Vista.myGrid.i18n.paging={
            results:"Resultados",
            records:"Registros de ",
            to:" a ",
            page:"Página ",
            perpage:"filas por página",
            first:"Para la primera página",
            previous:"Pagina anterior",
            found:"Registros encontrados",
            next:"Siguiente página",
            last:"Para la última página",
            of:" de ",
            notfound:"No se encontrarón archivos"
        };
        Core.Vista.myGrid.enablePaging(true,500,5,'pagingArea'+show.module,true);
        Core.Vista.myGrid.setImagePath("/admin/dhtmlxSuite/codebase/imgs/");
        // Filtro de la tabla
        Core.Vista.myGrid.attachHeader(show.filter);
        //Core.Vista.myGrid.setColSorting("server");
        // Campos id Mostrar
        Core.Vista.myGrid.setPagingSkin("modern");
        Core.Vista.myGrid.enableAutoWidth(show.autoWidth);
        //Core.Vista.myGrid.enableMultiselect(show.multiSelect);
        Core.Vista.myGrid.attachEvent("onRowSelect", Core.Vista.doOnRowSelected);
        //Core.Vista.myGrid.submitOnlyRowID(true);
        //Core.Vista.myGrid.attachEvent("onBeforeSorting",Core.Vista.sortGridOnServer);
        Core.Vista.myGrid.init();
        Core.Vista.myGrid.enableSmartRendering(true);
        var gridQString = '/'+show.module.toLowerCase()+'Listar?obj='+window.btoa(tmp)+''; // save query string to global variable (see step 5)
        localStorage.setItem('gridQString',gridQString);
        Core.Vista.myGrid.load(gridQString, 'json');

        /* END  */

        // Configuracion personalizada local de la vista
        Core.Vista.Util.priListaLoad();

        localStorage.removeItem('id');
        localStorage.setItem('temp',temp);
    },
    sortGridOnServer: function (ind,gridObj,direct) {
        alert(ind+'--'+gridObj+'--'+direct);
    },
    doOnRowSelected: function (id) {
        // Proceso mediante el cual permite cancelar peticiones enviadas y le da prioridad a las nuevas
        var send = '';
        if(Core.Vista.currentRequest){
            Core.Vista.currentRequest.abort();
        }

        Core.Vista.currentRequest = $.post('/'+localStorage.getItem('temp').toLowerCase()+'Show',{'data':id},function (dataJson) {
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
                send = 'form#send' + localStorage.getItem('temp') + 'Procesar';

                $(send).addClass('update');
                $(send).data('id', localStorage.getItem('id'))
                $(send+" button#submit").html('Actualizar Datos').fadeIn(909);
                $("#divDelete").html('<a id="sacarRegistroSeleccionado" data-registro="' + localStorage.getItem('id') + '" class="btn btn-danger">Eliminar registro</a>');
                Core.Vista.sacarRegistro();
                Core.Vista.Util.priListaClick(dataJson);
            }else{
                mostrarError(dataJson.msj);
            }
        },'JSON');
    },
    procesar: function () {
        var temp = this.__pathR__;
        var send = 'form#send'+temp+'Procesar';
        var tockeA='6a5e98e08119d6bbc375cfdb928fe2bd';
        var tockeR='7ab22370bd8c9ca09537fd388778ee13';
        var token = false;
        var ruta = false;

        $(send+' #submit').click(function (e) {
            if ($(send).hasClass('update')) {
                ruta = temp.toLowerCase() + 'Update';
                token = tockeA;
            } else {
                ruta = temp.toLowerCase() + 'Create';
                token = tockeR;
            }
            Core.Vista.Util.priClickProcesarForm(send);
            if (Core.valCamposObligatoriosCompletos(send)) {

                var campos = new FormData();

                $(send).find('input, select, textarea').each(function() {
                    var elemento= this;
                    //alert("elemento.id="+ elemento.name + ", elemento.value=" + elemento.value);
                    if(elemento.id=='id' || elemento.value!='') {
                        campos.append(elemento.name, $('#'+elemento.id).val());
                    }
                });

                campos.append("token", token);
                $.ajax({
                    url: '/' + ruta,
                    type: "POST",
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
            e.preventDefault();
        } );
    },
    sacarRegistro: function () {
        var temp = this.__pathR__;
        $('a#sacarRegistroSeleccionado').click(function () {
            var ruta = temp.toLowerCase() + 'Delete';
            var valor = $(this).data('registro');

            $.post('/'+ruta,{'obj':window.btoa(valor)},function (dataJson) {
                if (dataJson.error == 0) {
                    alertar(dataJson.msj);
                    setTimeout( location.reload(),500);
                } else {
                    mostrarError(dataJson.msj);
                }
            },'JSON');
        });
    },
    validarClave: function () {
        var d1 = $('input#clave.requerido');
        var d2 =$('input#reclave.requerido');
        if(d1.val().trim()!=d2.val().trim()){
            d2.focus();
            mostrarBug("Las claves ingresadas no coinciden debe de ser igual para continuar");
            return false;
        }else{
            return true;
        }
    }
};
document.write("<"+"script type='text/javascript' src='admin/dist/js/vistaRelacion.js'><"+"/script>")
document.write("<"+"script type='text/javascript' src='admin/dist/js/vistaAuditoria.js'><"+"/script>")

