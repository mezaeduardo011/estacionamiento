<?php
$breadcrumb=(object)array('actual'=>'Autos2','titulo'=>'Vista de integrada de gestion de Autos2','ruta'=>'Autos2')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<link href="<?=JPH\Core\Store\Cache::get('srcCss')?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Autos2
<?php $this->end()?>
<div class="row">
<!-- left column -->
<div class="col-md-7">
    <!-- general form elements -->
    <?php $this->insert('view::vistas/testAutos/autos2/listado',['listado'=>$listado]) ?>
</div>
<div class="col-md-5">
   <?php $this->insert('view::vistas/testAutos/autos2/form') ?>
</div>
<?php $this->push('addJs') ?>
<script src="/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        Core.main();
        Vista.main('Autos2');
    })

</script>
<?php $this->end() ?> 
