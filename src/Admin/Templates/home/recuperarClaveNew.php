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
            <p class="login-box-msg">Recuperar contrase&ntilde;a <b><?php echo $usuario?></b></p>

            <form action="/recuperarPostNew" method="post">
                <?php JPH\Core\Http\SegCSRF::getTokenField()?>
                <div class="form-group has-feedback">
                    <input class="form-control" id="clave1" name="clave1" type="password" class="dato" placeholder="Nueva contrase&ntilde;a" required>
                    <i class="fa fa-key form-control-feedback"  aria-hidden="true"></i>
                    </div>
                <div class="form-group has-feedback">
                    <input class="form-control" id="clave2" name="clave2" type="password" class="dato" placeholder="Confirmar contrase&ntilde;a" required >
                    <i class="fa fa-key form-control-feedback"  aria-hidden="true"></i>
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
            </form>
            <!--<a href="/recuperarClave">Olvidé mi contraseña</a><br>
            a href="register.html" class="text-center">Register a new membership</a-->

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