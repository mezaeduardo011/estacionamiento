    // Definicion de las variables necesarias para la grilla y validacion de mascaras
    var Config = {};
    Config.colums = [
        { 'id':'convenios_id', 'type':'ro', 'align':'left', 'sort':'server', 'value':'convenios_id', 'widths':'*' },
        { 'id':'nombres', 'type':'ro', 'align':'left', 'sort':'server', 'value':'nombres', 'widths':'*' },
        { 'id':'apellidos', 'type':'ro', 'align':'left', 'sort':'server', 'value':'apellidos', 'widths':'*' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'vista':'Abmlejan',
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

    Abmlejan = {}
    Abmlejan = {
        loadListaMenu: function (){ 
            // Configurar de los campos convenio--abmconvenios--id ';

            var html1 = '<option value=" ">Seleccionar</option>';
            $.ajax({
              url: '/getEntidadComun',
              type: "POST",
              headers: {
                       'X-Auth-Token' : $('#csrf_token').val()
              },
              data: {"tipo":"combo","tabla_vista":"convenio--abmconvenios--id","vista_campo":"codigo|nombre","cart_separacion":"-"},
              dataType: 'JSON',
              success : function(dataJson) {
                 $.each(dataJson.datos,function(key,value){
                        html1 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                 });
                 var data = sessionStorage.getItem(".convenio--abmconvenios--id");
                 var cant = $(".convenio--abmconvenios--id option").length;
                 if(data == typeof null){
                     sessionStorage.setItem(".convenio--abmconvenios--id",window.btoa(html4));
                     $(".convenio--abmconvenios--id").html(html1);
                 }else if(cant < 2 ){
                     $(".convenio--abmconvenios--id").html(html1);
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
    Abmlejan.loadListaMenu();
