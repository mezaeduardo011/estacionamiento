<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de abmlegajos</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" class="Abmlegajos" id="sendAbmlegajosProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label for="convenio">convenio</label>
    <select name="convenio_id" class="form-control int requerido convenio--abmconvenios--id " id="convenio_id"  placeholder="Por favor ingresar el/los convenio_id"><option value="">Seleccionar</option></select>
    <i class="help" id="help-convenio_id"></i>
</div>
<div class="form-group">
    <label for="nombres">nombres</label>
    <input type="text" name="nombres" class="form-control contar letraSpacio requerido" id="nombres" placeholder="Por favor ingresar el/los nombres"  maxlength="100" data-item="100">
    <i class="help" id="help-nombres"></i>
</div>
<div class="form-group">
    <label for="apellidos">apellidos</label>
    <input type="text" name="apelidos" class="form-control contar letraSpacio requerido" id="apelidos" placeholder="Por favor ingresar el/los apelidos"  maxlength="100" data-item="100">
    <i class="help" id="help-apelidos"></i>
</div>
<div class="form-group">
    <label for="legajo">legajo</label>
    <input type="text" name="legajo" class="form-control contar letrasSpacioNumeros requerido" id="legajo" placeholder="Por favor ingresar el/los legajo"  maxlength="6" data-item="6">
    <i class="help" id="help-legajo"></i>
</div>
<div class="form-group">
    <label for="sueldo">sueldo</label>
    <input type="text" name="sueldo" class="form-control contar letrasSpacioNumeros requerido" id="sueldo" placeholder="Por favor ingresar el/los sueldo"  maxlength="8" data-item="8">
    <i class="help" id="help-sueldo"></i>
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>