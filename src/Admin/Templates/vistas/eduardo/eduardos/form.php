<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de eduardos</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" id="sendEduardosProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
<label for="nombres">nombres</label>
<input type="text" name="nombres" class="form-control texto " id="nombres" placeholder="Por favor ingresar el/los nombres">
</div>
<div class="form-group">
<label for="correo">correo</label>
<input type="text" name="correo" class="form-control texto " id="correo" placeholder="Por favor ingresar el/los correo">
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
