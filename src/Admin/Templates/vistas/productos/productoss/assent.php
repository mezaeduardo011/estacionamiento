    // Definicion los campos del DataTable de esta vista
    var Config = {};
    Config.colums = [
        { 'id':'tipo_servicio_id', 'type':'ed', 'align':'left', 'sort':'str', 'value':'tipo_servicio_id' },
        { 'id':'descripcion', 'type':'ed', 'align':'left', 'sort':'str', 'value':'descripcion' },
        { 'id':'codigo', 'type':'ed', 'align':'left', 'sort':'str', 'value':'codigo' },
        { 'id':'productos_id', 'type':'ed', 'align':'left', 'sort':'str', 'value':'productos_id' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'module':'Productoss',
        'tableTitle':'Listado de Registros.',
        'filter':'&nbsp;,#text_filter,#text_filter,&nbsp;',
        'autoWidth':true,
        'multiSelect':false
    }

    // Configuracion de relacion de entidad
    Config.relacionPadre = {
        "field":"",
        "value": ""
    }

    Core.Vista.Select = {
        priListaLoad: function (){ 
            // Configurar de los campos tipo_estatus--estatus--id ';
            var html1 = '<option>Seleccionar</option>';
            $.post("/getEntidadComun",{"tipo":"combo","tabla_vista":"tipo_estatus--estatus--id","vista_campo":"color|nombre","cart_separacion":"-"},function(dataJson){
                $.each(dataJson.datos,function(key,value){
                html1 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                });
                $(".tipo_estatus--estatus--id").html(html1)
            });
            // Configurar de los campos productos--productoss--id ';
            var html4 = '<option>Seleccionar</option>';
            $.post("/getEntidadComun",{"tipo":"combo","tabla_vista":"productos--productoss--id","vista_campo":"descripcion","cart_separacion":" "},function(dataJson){
                $.each(dataJson.datos,function(key,value){
                html4 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                });
                $(".productos--productoss--id").html(html4)
            });
        },
     }
