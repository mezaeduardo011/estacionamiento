    // Definicion de las variables necesarias para la grilla y validacion de mascaras
    var Config = {};
    Config.colums = [
        { 'id':'legajo_numero', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Numero Legajo', 'widths':'*' },
        { 'id':'documento_numero', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Numero Documento', 'widths':'*' },
        { 'id':'nombres', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Nombres', 'widths':'*' },
        { 'id':'apellidos', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Apellidos', 'widths':'*' },
        { 'id':'sueldo_bruto', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Sueldo Bruto', 'widths':'*' },
        { 'id':'convenio_id', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Convenio', 'widths':'*' },
        { 'id':'fecha_ingreso', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Fecha de Ingreso', 'widths':'*' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'vista':'Legajosnovedades',
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

    Legajosnovedades = {}
    Legajosnovedades = {
        loadListaMenu: function (){ 
            // Configurar de los campos convenio--listadeconvenios--id ';

            var html6 = '<option value=" ">Seleccionar</option>';
            $.ajax({
              url: '/getEntidadComun',
              type: "POST",
              headers: {
                       'X-Auth-Token' : $('#csrf_token').val()
              },
              data: {"tipo":"combo","tabla_vista":"convenio--listadeconvenios--id","vista_campo":"codigo|nombre","cart_separacion":" "},
              dataType: 'JSON',
              success : function(dataJson) {
                 $.each(dataJson.datos,function(key,value){
                        html6 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                 });
                 var data = sessionStorage.getItem(".convenio--listadeconvenios--id");
                 var cant = $(".convenio--listadeconvenios--id option").length;
                 if(data == typeof null){
                     sessionStorage.setItem(".convenio--listadeconvenios--id",window.btoa(html4));
                     $(".convenio--listadeconvenios--id").html(html6);
                 }else if(cant < 2 ){
                     $(".convenio--listadeconvenios--id").html(html6);
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
    Legajosnovedades.loadListaMenu();
