    // Definicion de las variables necesarias para la grilla y validacion de mascaras
    var Config = {};
    Config.colums = [
        { 'id':'cedula', 'type':'ro', 'align':'left', 'sort':'server', 'value':'cedula', 'widths':'*' },
        { 'id':'nombres', 'type':'ro', 'align':'left', 'sort':'server', 'value':'nombres', 'widths':'*' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'vista':'Gabriela',
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

    Gabriela = {}
    Gabriela = {
        loadListaMenu: function (){ 
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
