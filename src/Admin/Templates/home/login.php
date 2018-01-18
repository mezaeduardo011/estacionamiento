<?php $this->layout('base2')?>

<?php $this->push('title') ?>
login del sistema
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
            <p class="login-box-msg">Accede para comenzar tu sesión</p>

            <form action="/loginPost" method="post">
                <?php JPH\Core\Http\SegCSRF::getTokenField()?>
                <div class="form-group has-feedback">
                    <input class="form-control" id="usuario" name="login" type="text" class="dato" placeholder="Usuario" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input class="form-control" id="contra" name="contra" type="password" class="dato" placeholder="Contraseña" required >
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="/recuperarClave">Olvidé mi contraseña</a><br>
            <!--a href="register.html" class="text-center">Register a new membership</a-->

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
                //JPH\Core\Store\Cache::rm('msjError');
            }
            if(!empty($msjSuccess)){
                echo "alertar('$msjSuccess');";
                // Permite eliminar el mensaje luego de efectuar el mensaje
                //JPH\Core\Store\Cache::rm('msjSuccess');
            }
            ?>

        });
    </script>
<?php $this->end() ?>