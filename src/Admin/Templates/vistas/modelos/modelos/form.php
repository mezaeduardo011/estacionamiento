<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de modelos</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" id="sendModelosProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
<label for="detalle">detalle</label>
<input type="text" name="detalle" class="form-control texto requerido " id="detalle" placeholder="Por favor ingresar el/los detalle">
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
