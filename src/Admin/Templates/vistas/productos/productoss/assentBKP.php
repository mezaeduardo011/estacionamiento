    // Definicion de las variables necesarias para la grilla y validacion de mascaras
    var Config = {};
    Config.colums = [
        { 'id':'tipo_servicio_id', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Tipo de Servicios', 'widths':'*' },
        { 'id':'descripcion', 'type':'ro', 'align':'left', 'sort':'server', 'value':'descripcion', 'widths':'*' },
        { 'id':'codigo', 'type':'ro', 'align':'left', 'sort':'server', 'value':'codigo', 'widths':'*' },
        { 'id':'productos_id', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Productos', 'widths':'*' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'vista':'Productoss',
        'tableTitle':'Listado de Registros.',
        'autoWidth':true,
        'multiSelect':false,
        'pageSize':50,
        'pagesInGrp':10
    }

    // Configuracion de relacion de entidad
    Config.relacionPadre = {
        "field":"",
        "value": ""
    }
    var Productoss = {};
    Productoss = {
        loadListaMenu: function (){
            // Configurar de los campos tipo_estatus--estatus--id ';
            var html1 = '<option value=" ">Seleccionar</option>';
            $.ajax({
                url: '/getEntidadComun',
                type: "POST",
                headers: {
                    'X-Auth-Token' : $('#csrf_token').val()
                },
                data: {"tipo":"combo","tabla_vista":"tipo_estatus--estatus--id","vista_campo":"color|nombre","cart_separacion":"-"},
                dataType: 'JSON',
                success : function(dataJson) {
                    $.each(dataJson.datos,function(key,value){
                        html1 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                    });

                    var data = sessionStorage.getItem('tipo_estatus--estatus--id');
                    var cant = $(".tipo_estatus--estatus--id option").length;

                    if(data == typeof null){
                        sessionStorage.setItem("tipo_estatus--estatus--id",window.btoa(html1));
                        $(".tipo_estatus--estatus--id").html(html1)
                    }else if(cant < 2){
                        $(".tipo_estatus--estatus--id").html(html1)
                    }


                }
            });

            // Configurar de los campos productos--productoss--id ';
            var html4 = '<option value=" ">Seleccionar</option>';
            $.ajax({
                url: '/getEntidadComun',
                type: "POST",
                headers: {
                    'X-Auth-Token' : $('#csrf_token').val()
                },
                data: {"tipo":"combo","tabla_vista":"productos--productoss--id","vista_campo":"descripcion","cart_separacion":" "},
                dataType: 'JSON',
                success : function(dataJson) {
                    $.each(dataJson.datos,function(key,value){
                        html4 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                    });

                    var data = sessionStorage.getItem('productos--productoss--id');
                    var cant = $(".productos--productoss--id option").length;
                    if(data == typeof null){
                        sessionStorage.setItem("productos--productoss--id",window.btoa(html4));
                        $(".productos--productoss--id").html(html4)
                    }else if(cant < 2 ){
                        $(".productos--productoss--id").html(html4)
                    }
                }
            });
        },
     }
<?php
       $fies = file_get_contents(__DIR__.'/mascaras.json');
       $dataJson = json_decode($fies);
 ?>
Core.Vista.Mascara = [
<?php
foreach ($dataJson->mascaras AS $key => $val){
    echo "{'type':'".$val->type."','mascara':'".base64_decode($val->mascaraJS)."','mensaje':'".$val->mensaje."','input':'".$val->input."','campo':'".$val->campo."'},".PHP_EOL;
}
?>
];

Productoss.loadListaMenu();
