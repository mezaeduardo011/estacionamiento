<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de personal</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" id="sendPersonalProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
<label for="nombres">nombres</label>
<input type="text" name="nombres" class="form-control default requerido " id="nombres" placeholder="Enter nombres">
</div>
<div class="form-group">
<label for="apellidos">apellidos</label>
<input type="text" name="apellidos" class="form-control default requerido " id="apellidos" placeholder="Enter apellidos">
</div>
<div class="form-group">
<label for="correo">correo</label>
<input type="text" name="correo" class="form-control default requerido " id="correo" placeholder="Enter correo">
</div>
<div class="form-group">
<label for="estatus">estatus</label>
<input type="text" name="estatus" class="form-control default requerido " id="estatus" placeholder="Enter estatus">
</div>
<div class="form-group">
<label for="created_at">created_at</label>
<input type="text" name="created_at" class="form-control default requerido " id="created_at" placeholder="Enter created_at">
</div>
<div class="form-group">
<label for="updated_at">updated_at</label>
<input type="text" name="updated_at" class="form-control default " id="updated_at" placeholder="Enter updated_at">
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
