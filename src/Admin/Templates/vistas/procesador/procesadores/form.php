<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de procesadores</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" class="Procesadores" id="sendProcesadoresProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label for="modelos">modelos</label>
    <input type="text" name="modelos" class="form-control contar letraSpacio requerido" id="modelos" placeholder="Ingresar el modelo del procesador"  maxlength="50" data-item="50">
    <i class="help" id="help-modelos"></i>
</div>
<div class="form-group">
    <label for="partes">partes</label>
    <input type="text" name="parte" class="form-control contar int requerido" id="parte" placeholder="parte del procesador"  maxlength="10" data-item="10">
    <i class="help" id="help-parte"></i>
</div>
<div class="form-group">
    <label for="creado">creado</label>
    <input type="text" name="fabricado" class="form-control contar fecha requerido" id="fabricado" placeholder="ingresar fecha de creacion"  maxlength="11" data-item="11">
    <i class="help" id="help-fabricado"></i>
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
