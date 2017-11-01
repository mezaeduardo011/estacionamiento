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
    main: function (path,Config) {
        this.__pathR__ = path;
        this.__columns__ = Config.colums;
        // Cantidad de listado de vista
        var module = Config.show.module;
        // Si se puede ver el buscador
        var tableTitle = Config.show.tableTitle;
        // Filtros de la tabla
        var filterTable = Config.show.filter;
        this.listado(module,tableTitle,filterTable);
        this.procesar();
    },
    listado : function (module,tableTitle,filterTable) {
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

        var myLayout = new dhtmlXLayoutObject('dataJPH'+module, '1C');
        myLayout.cells("a").setText(tableTitle);
        myLayout.cells("a").attachStatusBar({
            text: "<div id='pagingArea'></div>",
            paging: true
        });

        var myGrid = myLayout.cells("a").attachGrid();
        myGrid.setImagePath("/admin/dhtmlxSuite/codebase/imgs/");
        // Filtro de la tabla
        myGrid.attachHeader(filterTable);
        // Campos id Mostrar
        //myGrid.setColumnIds("col1,col2,col3");

        myGrid.enablePaging(true, 10, 3, "pagingArea");
        myGrid.setPagingSkin("toolbar");
        myGrid.enableAutoWidth(true);
        myGrid.enableMultiselect(true);
        myGrid.attachEvent("onRowSelect", Core.Vista.doOnRowSelected);
        myGrid.init();
        myGrid.enableSmartRendering(true);
        // Evniamos los parametros de configuracion
        var gridQString = '/'+module.toLowerCase()+'Listar?obj='+window.btoa(tmp); // save query string to global variable (see step 5)
        myGrid.load(gridQString, 'json');
        /* END  */

        // Configuracion personalizada local de la vista
        Core.Vista.Util.priListaLoad();

        localStorage.removeItem('id');
        localStorage.setItem('temp',temp);
    },
    doOnRowSelected: function (id) {
        //var data = table.row($(this)).data();
        //alert("Rows with id: "+id+" was selected by user")


        var send = '';
        $('table tr').css({'background':'', 'color':''});
        $(this).css({'background':'#293A4A', 'color':'#ffffff'});
        // Enviar peticion para ver el detalles delregistro
        $.post('/'+localStorage.getItem('temp').toLowerCase()+'Show',{'data':id},function (dataJson) {
            if(dataJson.error==0) {
                $.each(dataJson.datos, function (key, valor) {
                    $("#" + key).val(valor);
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
                //alert('UPDATE SI');
            } else {
                ruta = temp.toLowerCase() + 'Create';
                token = tockeR;
                //alert('CREAR SI');
            }
            Core.Vista.Util.priClickProcesarForm(send);
            if (Core.valCamposObligatoriosCompletos(send)) {
                var campos = new FormData();

                $(send).find(':input, select, textarea').each(function() {
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
                //$.post('/' + ruta, window.btoa($(this).serialize() + '&act=' + token), function (dataJson) {
                /*$.post('/' + ruta, $(this).serialize() + '&act=' + token, function (dataJson) {

                }, 'JSON');*/
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

