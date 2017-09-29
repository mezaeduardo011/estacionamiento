<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de autos23</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" id="sendAutos23Procesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
<label for="codigo">codigo</label>
<input type="text" name="id_persona" class="form-control integer requerido " id="id_persona" placeholder="Enter codigo">
</div>
<div class="form-group">
<label for="marca">marca</label>
<input type="text" name="marca" class="form-control default requerido " id="marca" placeholder="Enter marca">
</div>
<div class="form-group">
<label for="modelo">modelo</label>
<input type="text" name="modelo" class="form-control default requerido " id="modelo" placeholder="Enter modelo">
</div>
<div class="form-group">
<label for="año">año</label>
<input type="text" name="anio" class="form-control integer requerido " id="anio" placeholder="Enter año">
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
