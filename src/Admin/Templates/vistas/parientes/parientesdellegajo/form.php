<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de Parientes del Legajo</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" class="Parientesdellegajo" id="sendParientesdellegajoProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label for="Número de Documento">Número de Documento</label>
    <input type="text" name="documento_numero" class="form-control contar cdni requerido" id="documento_numero" placeholder=""  maxlength="10" data-item="10">
    <i class="help" id="help-documento_numero"></i>
</div>
<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" name="nombres" class="form-control contar varchar requerido" id="nombres" placeholder=""  maxlength="150" data-item="150">
    <i class="help" id="help-nombres"></i>
</div>
<div class="form-group">
    <label for="Apellido">Apellido</label>
    <input type="text" name="apellidos" class="form-control contar varchar requerido" id="apellidos" placeholder=""  maxlength="150" data-item="150">
    <i class="help" id="help-apellidos"></i>
</div>
<div class="form-group">
    <label for="Fecha de Nacimiento">Fecha de Nacimiento</label>
    <input type="text" name="fecha_nacimiento" class="form-control contar dfecha requerido" id="fecha_nacimiento" placeholder=""  maxlength="10" data-item="10">
    <i class="help" id="help-fecha_nacimiento"></i>
</div>
<div class="form-group">
    <label for="Parentesco">Parentesco</label>
    <select name="id_parentesco" class="form-control int requerido parentesco--listadeparentescos--id " id="id_parentesco"  placeholder=""><option value="">Seleccionar</option></select>
    <i class="help" id="help-id_parentesco"></i>
</div>
<div class="form-group">
    <label for="Legajo">Legajo</label>
    <select name="id_legajo" class="form-control int requerido 0 " id="id_legajo"  placeholder=""><option value="">Seleccionar</option></select>
    <i class="help" id="help-id_legajo"></i>
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
