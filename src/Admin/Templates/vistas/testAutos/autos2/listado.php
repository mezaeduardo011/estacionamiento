<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Listado de Registros.</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<div class="box-body">
    <table id="dataJPH" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>codigo</th>
            <th>marca</th>
            <th>modelo</th>
            <th>año</th>
        </tr>
        </thead>
        <tbody>
<?php foreach ($listado AS $key => $value){ ?>
       <tr>
      <td><?php echo @$value->id?></td>
      <td><?php echo @$value->id_persona?></td>
      <td><?php echo @$value->marca?></td>
      <td><?php echo @$value->modelo?></td>
      <td><?php echo @$value->anio?></td>
        </tr> 
<?php } ?>
        </tbody><tr>
            <th>id</th>
            <th>codigo</th>
            <th>marca</th>
            <th>modelo</th>
            <th>año</th>
       </tr>
       </tfoot>
   </table>
</div>
</div>
