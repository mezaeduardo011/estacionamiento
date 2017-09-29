<div class="box box-primary">
<div class="box-header with-border">
    <h3 class="box-title">Formulario de usuarios</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" id="sendUsuariosProcesar" enctype="multipart/form-data">
    <div class="box-body">
        <input type="hidden" id="id" name="id">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="apellidos">apellidos</label>
                <input type="text" name="apellidos" class="form-control default requerido " id="apellidos" placeholder="Enter apellidos">
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombres">nombres</label>
                <input type="text" name="nombres" class="form-control default requerido " id="nombres" placeholder="Enter nombres">
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="fech_nacimiento">fech_nacimiento</label>
                <input type="text" name="fech_nacimiento" class="form-control default datepicker" id="fech_nacimiento" placeholder="Enter fech_nacimiento">
            </div>
        </div>


        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="correo">correo</label>
                <input type="text" name="correo" class="form-control default requerido " id="correo" placeholder="Enter correo">
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="telefono">telefono</label>
                <input type="text" name="telefono" class="form-control default " id="telefono" placeholder="Enter telefono">
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="usuario">usuario</label>
                <input type="text" name="usuario" class="form-control default requerido " id="usuario" placeholder="Enter usuario">
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="clave">clave</label>
                <input type="text" name="clave" class="form-control default requerido " id="clave" placeholder="Enter clave">
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="reclave">Repetir clave</label>
                <input type="text" name="reclave" class="form-control default requerido " id="reclave" placeholder="Repetir la clave">
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="cuenta_bloqueada">cuenta_bloqueada</label>
                <select name="cuenta_bloqueada" class="form-control default requerido " id="cuenta_bloqueada">
                    <option value="N">NO</option>
                    <option value="S">SI</option>
                </select>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="fech_nacimiento">Perfil</label>
                <select name="roles" id="roles" class="form-control requerido" multiple="multiple"><?php foreach ( $roles AS $item => $valor){  echo "<option value='".$valor->id."'>".$valor->detalle."</option>";}?></select>
            </div>
        </div>
  </div>
  <!-- /.box-body -->
   <div class="box-footer">
       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>
       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>
   </div>
</form>
</div>
