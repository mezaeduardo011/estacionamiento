<?php $this->layout('base2')?>

<?php $this->push('title') ?>
Recuperar clave del sistema
<?php $this->end() ?>

<?php $this->push('option') ?>
    login-page
<?php $this->end() ?>

    <div class="login-box">
        <div class="login-logo" >
            <a href="/"><b>JPH</b>Lions</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Permite recuperar contrase&ntilde;a</p>

            <form action="/recuperarPost" method="post">
                <?php JPH\Core\Http\SegCSRF::getTokenField()?>
                <div class="form-group has-feedback">
                    <input class="form-control" id="correo" name="correo" type="text" class="dato" placeholder="Correo del Usuario" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input class="form-control" id="usuario" name="usuario" type="text" class="dato" placeholder="Usuario del Sistema" required >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <!--label>
                                <input type="checkbox"> Recuérdame
                            </label-->
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Renovar</button>
                    </div>
                    <!-- /.col -->
                </div>
                <a href="/login">Regresar</a><br>
            </form>


        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

<?php $this->push('addJs') ?>
    <script>
        $(function () {
            <?php
            if(!empty($msjError)){
                echo "mostrarError('$msjError');";
                // Permite eliminar el mensaje luego de efectuar el mensaje
                JPH\Core\Store\Cache::rm('msjError');
            }
            ?>

        });
    </script>
<?php $this->end() ?>