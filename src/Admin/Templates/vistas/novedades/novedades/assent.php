    // Definicion de las variables necesarias para la grilla y validacion de mascaras
    var Config = {};
    Config.colums = [
        { 'id':'licencia_id', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Licencia', 'widths':'*' },
        { 'id':'fecha_inicio', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Fecha de Inicio', 'widths':'*' },
        { 'id':'fecha_fin', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Fecha de Fin', 'widths':'*' },
        { 'id':'dias_a_liquidar', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Dial a Liquidar', 'widths':'*' },
        { 'id':'legajo_id', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Legajo', 'widths':'*' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'vista':'Novedades',
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

    Novedades = {}
    Novedades = {
        loadListaMenu: function (){ 
            // Configurar de los campos licencia--listadelicencias--id ';

            var html1 = '<option value=" ">Seleccionar</option>';
            $.ajax({
              url: '/getEntidadComun',
              type: "POST",
              headers: {
                       'X-Auth-Token' : $('#csrf_token').val()
              },
              data: {"tipo":"combo","tabla_vista":"licencia--listadelicencias--id","vista_campo":"nombre","cart_separacion":" "},
              dataType: 'JSON',
              success : function(dataJson) {
                 $.each(dataJson.datos,function(key,value){
                        html1 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                 });
                 var data = sessionStorage.getItem(".licencia--listadelicencias--id");
                 var cant = $(".licencia--listadelicencias--id option").length;
                 if(data == typeof null){
                     sessionStorage.setItem(".licencia--listadelicencias--id",window.btoa(html4));
                     $(".licencia--listadelicencias--id").html(html1);
                 }else if(cant < 2 ){
                     $(".licencia--listadelicencias--id").html(html1);
                 }
              }
            });
            // Configurar de los campos legajo--legajosnovedades--id ';

            var html5 = '<option value=" ">Seleccionar</option>';
            $.ajax({
              url: '/getEntidadComun',
              type: "POST",
              headers: {
                       'X-Auth-Token' : $('#csrf_token').val()
              },
              data: {"tipo":"combo","tabla_vista":"legajo--legajosnovedades--id","vista_campo":"nombres|apellidos","cart_separacion":" "},
              dataType: 'JSON',
              success : function(dataJson) {
                 $.each(dataJson.datos,function(key,value){
                        html5 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                 });
                 var data = sessionStorage.getItem(".legajo--legajosnovedades--id");
                 var cant = $(".legajo--legajosnovedades--id option").length;
                 if(data == typeof null){
                     sessionStorage.setItem(".legajo--legajosnovedades--id",window.btoa(html4));
                     $(".legajo--legajosnovedades--id").html(html5);
                 }else if(cant < 2 ){
                     $(".legajo--legajosnovedades--id").html(html5);
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
    Novedades.loadListaMenu();
