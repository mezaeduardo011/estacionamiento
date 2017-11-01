<?php
$breadcrumb=(object)array('actual'=>'Legajo','titulo'=>'Vista de integrada de gestion de Legajo','ruta'=>'Legajo')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Legajo
<?php $this->end()?>
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/legajos/legajo/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/legajos/legajo/form') ?>
    </div>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    <?php $this->insert('view::vistas/legajos/legajo/assent') ?>
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
        Core.Vista.main('Legajo',Config);
    })

</script>
<?php $this->end() ?> 
