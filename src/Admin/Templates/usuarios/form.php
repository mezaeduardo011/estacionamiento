<div class="all-50 small-95 tiny-95 push-center" id="formulario">
    <form class="ink-form all-100 no-padding" id="myForm">
    <input type="hidden" name="__token__" id="__token__" value="GREGORIO BOLIVAR BOLIVAR">
        <div class="column-group head ">
            <div class="all-70">
                <i class="fa fa-list" aria-hidden="true"></i>
                <span>Formulario de alta</span>
            </div>
            <div class="all-30 align-right edicion">
                <?php
                //if (isset($$pagina) && in_array($$pagina->alta, $roles)) {
                    ?>
                    <i class="fa fa-file-o ink-tooltip" aria-hidden="true" data-tip-text="Nuevo" data-tip-color="green" id="btnNuevo"></i>
                    <?php
                //}
                //if (isset($$pagina) && (in_array($$pagina->alta, $roles) || in_array($$pagina->modificacion, $roles))) {
                    ?>
                    <i class="fa fa-floppy-o ink-tooltip" aria-hidden="true" data-tip-text="Grabar" data-tip-color="blue" id="btnGrabar"></i>
                    <?php
                //}
               // if (isset($$pagina) && in_array($$pagina->baja, $roles)) {
                    ?>
                    <i class="fa fa-trash ink-tooltip" aria-hidden="true" data-tip-text="Borrar" data-tip-color="red" id="btnBorrar"></i>
                    <?php
                //}
                ?>
            </div>
        </div>
        <div class="column-group gutters padding-15">
            <div class="control-group all-33 required">
                <div class="fondolabel">
                    <label>Usuario</label>
                </div>
                <div class="control">
                    <input type="text" maxlength="20" class="valor texto" id="cusuario" name="cusuario" value="">
                </div>
            </div>
            <div class="control-group all-33 required">
                <div class="fondolabel">
                    <label>Contraseña</label>
                </div>
                <div class="control">
                    <input type="password" maxlength="50" class="valor texto" id="pw" name="pw" value="">
                </div>
            </div>
            <div class="control-group all-33 required">
                <div class="fondolabel">
                    <label>Repita Contraseña</label>
                </div>
                <div class="control">
                    <input type="password" maxlength="50" class="valor texto" id="confirmPW" name="ConfirmPW" value="">
                </div>
            </div>
            <div class="control-group all-50 required">
                <div class="fondolabel">
                    <label>Apellido</label>
                </div>
                <div class="control">
                    <input type="text" maxlength="50" class="valor texto" id="apellido" name="apellido">
                </div>
            </div>
            <div class="control-group all-50 required">
                <div class="fondolabel">
                    <label>Nombre</label>
                </div>
                <div class="control">
                    <input type="text" maxlength="50" class="valor texto" id="nombre" name="nombre">
                </div>
            </div>
            <div class="control-group all-50 required" >
                <div class="fondolabel">
                    <label>Correo</label>
                </div>
                <div class="control">
                    <input type="text" maxlength="50" class="valor texto" id="correo" name="correo">
                </div>
            </div>
            <div class="control-group all-50 required">
                <div class="fondolabel">
                    <label>Telefono</label>
                </div>
                <div class="control">
                    <input type="text" maxlength="50" class="valor texto" id="telefono" name="telefono">
                </div>
            </div>
            <div class="control-group all-50">
                <ul class="control unstyled">
                    <li><input type="checkbox" class="valor texto align-left" id="bloqueada" name="bloqueada"><label for="bloqueada">Cuenta bloqueada</label></li>
                </ul>
            </div>
            <div class="control-group all-50">
                <ul class="control unstyled">
                    <li><input type="checkbox" class="valor texto align-left" id="cambiarPW" name="cambiarPW"><label for="cambiarPW">Cambiar contraseña</label></li>
                </ul>
            </div>
            <input type="hidden" id="modo" name="modo">
        </div>
    </form>
</div>