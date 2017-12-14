    // Definicion de las variables necesarias para la grilla y validacion de mascaras
    var Config = {};
    Config.colums = [
        { 'id':'tipo_documento', 'type':'ro', 'align':'left', 'sort':'server', 'value':'tipo_documento', 'widths':'*' },
        { 'id':'documento', 'type':'ro', 'align':'left', 'sort':'server', 'value':'documento', 'widths':'*' },
        { 'id':'nombres', 'type':'ro', 'align':'left', 'sort':'server', 'value':'nombres', 'widths':'*' },
        { 'id':'apellidos', 'type':'ro', 'align':'left', 'sort':'server', 'value':'apellidos', 'widths':'*' },
        { 'id':'fecha_nacimiento', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Nacimiento', 'widths':'*' },
        { 'id':'created_usuario_id', 'type':'ro', 'align':'left', 'sort':'server', 'value':'created_usuario_id', 'widths':'*' },
        { 'id':'updated_usuario_id', 'type':'ro', 'align':'left', 'sort':'server', 'value':'updated_usuario_id', 'widths':'*' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'vista':'Socios',
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
