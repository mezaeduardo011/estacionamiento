//######
//## This work is licensed under the Creative Commons Attribution-Share Alike 3.0
//## United States License. To view a copy of this license,
//## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter
//## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
//## Desarrollado por JPH - Ing. - Gregorio Jose Bolivar
//######
var Vista;
Vista = {
    pathR: '',
    columns: '',
    main: function (path,rows) {
        this.__pathR__ = path;
        this.__columns__ = rows;
        this.listado();
        this.procesar();
    },
    listado : function () {
        var temp = this.__pathR__;
        var rows = this.__columns__;
        var table = $('#dataJPH').DataTable({
            "ajax": {
                "url": temp.toLowerCase()+'Listar',
                "dataSrc": ""
            },
            "columns": rows,
            /*"iDisplayLength": 25,
            "aLengthMenu": [25, 50, 75, 100],
            "sPaginationType": "full_numbers",
            "bProcessing": true,
            "bServerSide": true,
            "bJQueryUI": true,
            "bPaginate": true,

            "bSort": false,*/
            "sServerMethod": "POST",
            "language": {
                "url": "/admin/dist/js/Spanish.json"
            }

        });

        localStorage.removeItem('id');
        $('#dataJPH tbody').on('click', 'tr', function () {
            var data = table.row($(this)).data();

            var send = '';
            $('table tr').css({'background':'', 'color':''});
            $(this).css({'background':'#50374a', 'color':'#ffffff'});
            //alert( 'You clicked on '+data+'s row' );
            $.post('/'+temp.toLowerCase()+'Show',{'data':data.id},function (dataJson) {
                $.each(dataJson.datos,function (key, valor) {
                    $("#"+key).val(valor);
                    if(key=='id') {
                        localStorage.setItem('id',valor);
                    }
                });
            send = 'form#send'+temp+'Procesar';
            $(send).addClass('update');
            $(send).data('id',localStorage.getItem('id'))
            $("button#submit").html('Actualizar Datos').fadeIn(909);
            $("#divDelete").html('<a id="sacarRegistroSeleccionado" data-registro="'+localStorage.getItem('id')+'" class="btn btn-danger">Eliminar registro</a>');
            Vista.sacarRegistro();
        },'JSON');

        } );
    },
    procesar: function () {
        var temp = this.__pathR__;
        var send = 'form#send'+temp+'Procesar';
        var tockeA='6a5e98e08119d6bbc375cfdb928fe2bd';
        var tockeR='7ab22370bd8c9ca09537fd388778ee13';
        var token = false;

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
            //alert(send);
            if (Core.valCamposObligatoriosCompletos(send)) {
                var campos = new FormData();

                $(send).find(':input, select, textarea').each(function() {
                    var elemento= this;
                    //alert("elemento.id="+ elemento.id + ", elemento.value=" + elemento.value);
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
                        } else {
                            mostrarError(dataJson.msj)
                        }
                    }
                });
                //$.post('/' + ruta, window.btoa($(this).serialize() + '&act=' + token), function (dataJson) {
                /*$.post('/' + ruta, $(this).serialize() + '&act=' + token, function (dataJson) {

                }, 'JSON');*/
             }
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
                    mostrarError(dataJson.msj)
                }
            },'JSON')
        })
    }
};