    // Definicion de las variables necesarias para la grilla y validacion de mascaras
    var Config = {};
    Config.colums = [
        { 'id':'tipo_servicio_id', 'type':'ro', 'align':'left', 'sort':'server', 'value':'tipo_servicio_id', 'widths':'*' },
        { 'id':'descripcion', 'type':'ro', 'align':'left', 'sort':'server', 'value':'descripcion', 'widths':'*' },
        { 'id':'codigo', 'type':'ro', 'align':'left', 'sort':'server', 'value':'codigo', 'widths':'*' },
        { 'id':'productos_id', 'type':'ro', 'align':'left', 'sort':'server', 'value':'productos_id', 'widths':'*' },
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
