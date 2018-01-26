    // Definicion de las variables necesarias para la grilla y validacion de mascaras
    var Config = {};
    Config.colums = [
        { 'id':'documento_numero', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Número de Documento', 'widths':'*' },
        { 'id':'nombres', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Nombre', 'widths':'*' },
        { 'id':'apellidos', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Apellido', 'widths':'*' },
        { 'id':'fecha_nacimiento', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Fecha de Nacimiento', 'widths':'*' },
        { 'id':'id_parentesco', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Parentesco', 'widths':'*' },
        { 'id':'id_legajo', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Legajo', 'widths':'*' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'vista':'Parientesdellegajo',
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

    Parientesdellegajo = {}
    Parientesdellegajo = {
        loadListaMenu: function (){ 
            // Configurar de los campos parentesco--listadeparentescos--id ';

            var html5 = '<option value=" ">Seleccionar</option>';
            $.ajax({
              url: '/getEntidadComun',
              type: "POST",
              headers: {
                       'X-Auth-Token' : $('#csrf_token').val()
              },
              data: {"tipo":"combo","tabla_vista":"parentesco--listadeparentescos--id","vista_campo":"0","cart_separacion":" "},
              dataType: 'JSON',
              success : function(dataJson) {
                 $.each(dataJson.datos,function(key,value){
                        html5 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                 });
                 var data = sessionStorage.getItem(".parentesco--listadeparentescos--id");
                 var cant = $(".parentesco--listadeparentescos--id option").length;
                 if(data == typeof null){
                     sessionStorage.setItem(".parentesco--listadeparentescos--id",window.btoa(html4));
                     $(".parentesco--listadeparentescos--id").html(html5);
                 }else if(cant < 2 ){
                     $(".parentesco--listadeparentescos--id").html(html5);
                 }
              }
            });
            // Configurar de los campos 0 ';

            var html6 = '<option value=" ">Seleccionar</option>';
            $.ajax({
              url: '/getEntidadComun',
              type: "POST",
              headers: {
                       'X-Auth-Token' : $('#csrf_token').val()
              },
              data: {"tipo":"combo","tabla_vista":"0","vista_campo":"0","cart_separacion":" "},
              dataType: 'JSON',
              success : function(dataJson) {
                 $.each(dataJson.datos,function(key,value){
                        html6 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                 });
                 var data = sessionStorage.getItem(".0");
                 var cant = $(".0 option").length;
                 if(data == typeof null){
                     sessionStorage.setItem(".0",window.btoa(html4));
                     $(".0").html(html6);
                 }else if(cant < 2 ){
                     $(".0").html(html6);
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
    Parientesdellegajo.loadListaMenu();
