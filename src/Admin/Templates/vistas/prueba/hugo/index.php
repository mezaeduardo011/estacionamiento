<?php
$breadcrumb=(object)array('actual'=>'Hugo','titulo'=>'Vista de integrada de gestion de Hugo','ruta'=>'Hugo')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Hugo
<?php $this->end()?>
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/prueba/hugo/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/prueba/hugo/form') ?>
    </div>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    <?php $this->insert('view::vistas/prueba/hugo/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
        },
        priListaClick: function (dataJson){
        }, 
        priClickProcesarForm: function(){ } 
    };
    $(function () {
        Core.main();
        Core.Vista.main('Hugo',Config);
    })

</script>
<?php $this->end() ?> 
