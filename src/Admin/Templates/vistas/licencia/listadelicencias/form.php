<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de Lista de Licencias</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" class="Listadelicencias" id="sendListadelicenciasProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label for="Código">Código</label>
    <input type="text" name="codigo" class="form-control contar varchar requerido" id="codigo" placeholder="Ingrese Código"  maxlength="10" data-item="10">
    <i class="help" id="help-codigo"></i>
</div>
<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control contar varchar requerido" id="nombre" placeholder="Ingrese Nombre"  maxlength="100" data-item="100">
    <i class="help" id="help-nombre"></i>
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
