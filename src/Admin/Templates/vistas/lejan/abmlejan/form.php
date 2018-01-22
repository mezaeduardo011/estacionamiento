<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de abmlejan</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" class="Abmlejan" id="sendAbmlejanProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label for="convenios_id">convenios_id</label>
    <select name="convenios_id" class="form-control int requerido convenio--abmconvenios--id " id="convenios_id"  placeholder="Por favor ingresar el/los convenios_id"><option value="">Seleccionar</option></select>
    <i class="help" id="help-convenios_id"></i>
</div>
<div class="form-group">
    <label for="nombres">nombres</label>
    <input type="text" name="nombres" class="form-control contar letraSpacio requerido" id="nombres" placeholder="Por favor ingresar el/los nombres"  maxlength="100" data-item="100">
    <i class="help" id="help-nombres"></i>
</div>
<div class="form-group">
    <label for="apellidos">apellidos</label>
    <input type="text" name="apellidos" class="form-control contar letraSpacio requerido" id="apellidos" placeholder="Por favor ingresar el/los apellidos"  maxlength="100" data-item="100">
    <i class="help" id="help-apellidos"></i>
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
