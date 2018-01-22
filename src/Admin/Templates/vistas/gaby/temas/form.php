<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de temas</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" class="Temas" id="sendTemasProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label for="cedula">cedula</label>
    <input type="text" name="cedula" class="form-control contar letraSpacio requerido" id="cedula" placeholder="Por favor ingresar el/los cedula"  maxlength="10" data-item="10">
    <i class="help" id="help-cedula"></i>
</div>
<div class="form-group">
    <label for="nombres">nombres</label>
    <input type="text" name="nombres" class="form-control contar letraSpacio requerido" id="nombres" placeholder="Por favor ingresar el/los nombres"  maxlength="20" data-item="20">
    <i class="help" id="help-nombres"></i>
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
