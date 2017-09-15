<?php $this->layout('base2')?>

<?php $this->push('title') ?>
login del sistema
<?php $this->end() ?>

<?php $this->push('addCss') ?>
    <link href="<?=JPH\Core\Store\Cache::get('srcCss')?>ink.min.css" rel="stylesheet" type="text/css">
    <link href="<?=JPH\Core\Store\Cache::get('srcCss')?>font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?=JPH\Core\Store\Cache::get('srcCss')?>login.css" rel="stylesheet">
<?php $this->end() ?>

    <div class="fondo"></div>
    <div class="tituloPrincipal"></div>
    <div class="contentLogin">
        <form name="form1" method="POST" class="login" action="/loginPost">
            <div class="tituloLogin">LOGIN</div>
            <div class="fila">
                <input id="usuario" name="login" type="text" class="dato" placeholder="Usuario" value="" required>
            </div>
            <div class="fila">
                <input id="contra" name="contra" type="password" class="dato" placeholder="Contraseña" value="" required>
            </div>
            <div id="lblError" class="labelError"><?php echo $msjError; ?></div>
            <input id="btnAceptar" name="btnAceptar" class="ink-button botonLogin" type="submit" value="Aceptar">
        </form>
    </div>

<?php $this->push('addJs') ?>

<?php $this->end() ?>