<?php
$breadcrumb=(object)array('actual'=>'Personal','titulo'=>'Vista de integrada de gestion de Personal','ruta'=>'Personal')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Personal
<?php $this->end()?>
<div class="row">
<!-- left column -->
<div class="col-md-7">
    <!-- general form elements -->
    <?php $this->insert('view::vistas/personal/personal/listado') ?>
</div>
<div class="col-md-5">
   <?php $this->insert('view::vistas/personal/personal/form') ?>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    Config.colums = [
        { "data": "id" },
        { "data": "nombres" },
        { "data": "apellidos" },
        { "data": "correo" },
        { "data": "estatus" },
        { "data": "created_at" },
        { "data": "updated_at" },
    ];

    // Configuracion de visual del DataTable
    Config.show = {
        "display":10,
        "search":true,
        "pagina":true,
        "rowid": "id"
    }

    Core.Vista.Util = {
        priListaLoad: function () { },
        priListaClick: function (dataJson){ }, 
        priClickProcesarForm: function(){ } 
    };
    $(function () {
        Core.main();
        Core.Vista.main('Personal',Config);
    })

</script>
<?php $this->end() ?> 
