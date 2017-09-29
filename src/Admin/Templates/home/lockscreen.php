<?php $this->layout('base2')?>

<?php $this->push('title') ?>
login del sistema
<?php $this->end() ?>

<?php $this->push('option') ?>
    lockscreen
<?php $this->end() ?>

    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="../../index2.html"><b>JPH</b>Lions</a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name"><?php echo $usuario->nombres ?> <?php echo $usuario->apellidos ?></div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="/admin/dist/img/user1-128x128.jpg" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials">
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="password">

                    <div class="input-group-btn">
                        <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            Ingrese su contraseña para recuperar su sesión
        </div>
        <div class="text-center">
            <a href="/login">O inicie sesión como un usuario diferente</a>
        </div>
    </div>
    <!-- /.center -->

<?php $this->push('addJs') ?>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
<?php $this->end() ?>