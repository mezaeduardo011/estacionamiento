<?php
$breadcrumb=(object)array('actual'=>'Autos23','titulo'=>'Vista de integrada de gestion de Autos23','ruta'=>'Autos23')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<link href="<?=JPH\Core\Store\Cache::get('srcCss')?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Autos23
<?php $this->end()?>
<div class="row">
<!-- left column -->
<div class="col-md-7">
    <!-- general form elements -->
    <?php $this->insert('view::vistas/testAutos/autos23/listado') ?>
</div>
<div class="col-md-5">
   <?php $this->insert('view::vistas/testAutos/autos23/form') ?>
</div>
<?php $this->push('addJs') ?>
<script src="/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    var rows = [
{ "data": "id" },
{ "data": "id_persona" },
{ "data": "marca" },
{ "data": "modelo" },
{ "data": "anio" },
    ];
    $(function () {
        Core.main();
        Vista.main('Autos23',rows);
    })

</script>
<?php $this->end() ?> 
