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
<input type="text" name="nombres" class="form-control texto requerido " id="nombres" placeholder="Por favor ingresar el/los nombres">
</div>
<div class="form-group">
<label for="apellidos">apellidos</label>
<input type="text" name="apellidos" class="form-control texto requerido " id="apellidos" placeholder="Por favor ingresar el/los apellidos">
</div>
<div class="form-group">
<label for="dni">dni</label>
<input type="text" name="dni" class="form-control integer requerido " id="dni" placeholder="Por favor ingresar el/los dni">
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
