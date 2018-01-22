<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Formulario de abmpadrehijos</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" class="Abmpadrehijos" id="sendAbmpadrehijosProcesar" enctype="multipart/form-data">
   <div class="box-body">
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label for="codigo">codigo</label>
    <input type="text" name="codigo" class="form-control contar letrasSpacioNumeros requerido" id="codigo" placeholder="Por favor ingresar el/los codigo"  maxlength="6" data-item="6">
    <i class="help" id="help-codigo"></i>
</div>
<div class="form-group">
    <label for="nombre">nombre</label>
    <input type="text" name="nombre" class="form-control contar letrasSpacioNumeros requerido" id="nombre" placeholder="Por favor ingresar el/los nombre"  maxlength="40" data-item="40">
    <i class="help" id="help-nombre"></i>
</div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
