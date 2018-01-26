<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de Legajos (Parientes)</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" class="Legajosparientes" id="sendLegajosparientesProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label for="Número Legajo">Número Legajo</label>
    <input type="text" name="legajo_numero" class="form-control contar correo requerido" id="legajo_numero" placeholder=""  maxlength="10" data-item="10">
    <i class="help" id="help-legajo_numero"></i>
</div>
<div class="form-group">
    <label for="Número Documento">Número Documento</label>
    <input type="text" name="documento_numero" class="form-control contar correo requerido" id="documento_numero" placeholder=""  maxlength="10" data-item="10">
    <i class="help" id="help-documento_numero"></i>
</div>
<div class="form-group">
    <label for="Nombres">Nombres</label>
    <input type="text" name="nombres" class="form-control contar correo requerido" id="nombres" placeholder=""  maxlength="150" data-item="150">
    <i class="help" id="help-nombres"></i>
</div>
<div class="form-group">
    <label for="Apellidos">Apellidos</label>
    <input type="text" name="apellidos" class="form-control contar correo requerido" id="apellidos" placeholder=""  maxlength="150" data-item="150">
    <i class="help" id="help-apellidos"></i>
</div>
<div class="form-group">
    <label for="Sueldo Bruto">Sueldo Bruto</label>
    <input type="text" name="sueldo_bruto" class="form-control contar idni requerido" id="sueldo_bruto" placeholder=""  maxlength="10" data-item="10">
    <i class="help" id="help-sueldo_bruto"></i>
</div>
<div class="form-group">
    <label for="Convenio">Convenio</label>
    <select name="convenio_id" class="form-control idni requerido convenio--listadeconvenios--id " id="convenio_id"  placeholder=""><option value="">Seleccionar</option></select>
    <i class="help" id="help-convenio_id"></i>
</div>
<div class="form-group">
    <label for="Fecha de Ingreso">Fecha de Ingreso</label>
    <input type="text" name="fecha_ingreso" class="form-control contar dfecha requerido" id="fecha_ingreso" placeholder=""  maxlength="10" data-item="10">
    <i class="help" id="help-fecha_ingreso"></i>
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
