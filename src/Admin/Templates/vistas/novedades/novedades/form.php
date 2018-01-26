<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de Novedades</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" class="Novedades" id="sendNovedadesProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label for="Licencia">Licencia</label>
    <select name="licencia_id" class="form-control idni requerido licencia--listadelicencias--id " id="licencia_id"  placeholder=""><option value="">Seleccionar</option></select>
    <i class="help" id="help-licencia_id"></i>
</div>
<div class="form-group">
    <label for="Fecha de Inicio">Fecha de Inicio</label>
    <input type="text" name="fecha_inicio" class="form-control contar dfecha requerido" id="fecha_inicio" placeholder=""  maxlength="10" data-item="10">
    <i class="help" id="help-fecha_inicio"></i>
</div>
<div class="form-group">
    <label for="Fecha de Fin">Fecha de Fin</label>
    <input type="text" name="fecha_fin" class="form-control contar dfecha requerido" id="fecha_fin" placeholder=""  maxlength="10" data-item="10">
    <i class="help" id="help-fecha_fin"></i>
</div>
<div class="form-group">
    <label for="Dial a Liquidar">Dial a Liquidar</label>
    <input type="text" name="dias_a_liquidar" class="form-control contar idni requerido" id="dias_a_liquidar" placeholder=""  maxlength="10" data-item="10">
    <i class="help" id="help-dias_a_liquidar"></i>
</div>
<div class="form-group">
    <label for="Legajo">Legajo</label>
    <select name="legajo_id" class="form-control int requerido legajo--legajosnovedades--id " id="legajo_id"  placeholder=""><option value="">Seleccionar</option></select>
    <i class="help" id="help-legajo_id"></i>
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
