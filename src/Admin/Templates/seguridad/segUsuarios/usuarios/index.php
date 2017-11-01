    <?php
$breadcrumb=(object)array('actual'=>'Usuarios','titulo'=>'Vista de integrada de gestion de Usuarios','ruta'=>'Usuarios')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>

<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Usuarios
<?php $this->end()?>
<div class="row">
<!-- left column -->
<div class="col-md-7">
    <!-- general form elements -->
    <?php $this->insert('view::seguridad/segUsuarios/usuarios/listado') ?>
</div>
<div class="col-md-5">
   <?php $this->insert('view::seguridad/segUsuarios/usuarios/form',['roles'=>$roles]) ?>
</div>
<?php $this->push('addJs') ?>


<script>

     // Variable de configuracion
    var Config = {};
    // Columnas para el grilla
    Config.colums = [
        { "id":"nombres", "type":"ed", "align":"center", "sort":"str" , "value":"Nombres"},
        { "id":"apellidos", "type":"ed", "align":"center", "sort":"str" , "value":"Apellidos"},
        { "id":"fech_nacimiento", "type":"ed", "align":"center", "sort":"str" , "value":"Nacimiento"},
        { "id":"correo", "type":"ed", "align":"center", "sort":"str" , "value":"Correo"},
        { "id":"usuario", "type":"ed", "align":"center", "sort":"str" , "value":"Login"},
        { "id":"clave", "type":"ed", "align":"center", "sort":"str" , "value":"Clave"},
        { "id":"telefono", "type":"ed", "align":"center", "sort":"str" , "value":"telefono"},
    ];


    // Configuracion de visualizacion del grilla
    Config.show = {
        'module':'Usuarios',
        'tableTitle':'Listado de Registros.',
        'filter':'#text_filter,#text_filter,&nbsp;,&nbsp;,#text_filter,#text_filter'
    }

    Core.Vista.Util = {
        priListaLoad: function () {

        },
        priListaClick: function (dataJson) {
            /* Funcionalidad adicional para la vista en la parte de listar*/
            if(typeof dataJson.perfiles != "undefined"){
                var perfil = dataJson.perfiles.length;
                if(perfil > 0){
                    $.each(dataJson.perfiles,function (key, valor) {
                        $("#roles option[value='"+valor.seg_perfil_id+"']").prop("selected",true);
                    });
                }else{
                    $("#roles option").prop("selected",false);
                }
            }
        },
        priClickProcesarForm:function () {

        }

    };
    $(function () {
        Core.main();
        Core.Vista.main(Config.show.module,Config);
    })

</script>
<?php $this->end() ?> 
