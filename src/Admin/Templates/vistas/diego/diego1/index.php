<?php
$breadcrumb=(object)array('actual'=>'Diego1','titulo'=>'Vista de integrada de gestion de Diego1','ruta'=>'Diego1')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Diego1
<?php $this->end()?>
<div class="row">
<!-- left column -->
<div class="col-md-7">
    <!-- general form elements -->
    <?php $this->insert('view::vistas/diego/diego1/listado') ?>
</div>
<div class="col-md-5">
   <?php $this->insert('view::vistas/diego/diego1/form') ?>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    Config.colums = [
        { "data": "id" },
        { "data": "nombres" },
        { "data": "correo" },
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
        Core.Vista.main('Diego1',Config);
    })

</script>
<?php $this->end() ?> 
