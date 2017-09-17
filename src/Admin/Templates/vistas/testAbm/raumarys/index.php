<?php
$breadcrumb=(object)array('actual'=>'Raumarys','titulo'=>'Vista de integrada de gestion de Raumarys','ruta'=>'Raumarys')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<link href="<?=JPH\Core\Store\Cache::get('srcCss')?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Raumarys
<?php $this->end()?>
<div class="row">
<!-- left column -->
<div class="col-md-7">
    <!-- general form elements -->
    <?php $this->insert('view::vistas/testAbm/raumarys/listado',['usuariosListado'=>array('','','')]) ?>
</div>
<div class="col-md-5">
   <?php $this->insert('view::vistas/testAbm/raumarys/form') ?>
</div>
<?php $this->push('addJs') ?>
<script src="/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        var table = $('#example1').DataTable();
        $('#example1 tbody').on('click', 'tr', function () {
            var data = table.row( this ).data();
            alert( 'You clicked on '+data[0]+''s row' );
        } );
    })

</script>
<?php $this->end() ?> 
