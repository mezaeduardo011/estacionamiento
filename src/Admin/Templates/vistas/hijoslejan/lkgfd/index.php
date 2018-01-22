<?php
$breadcrumb=(object)array('actual'=>'Lkgfd','titulo'=>'Vista de integrada de gestion de Lkgfd','ruta'=>'Lkgfd')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Lkgfd
<?php $this->end()?>
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/hijoslejan/lkgfd/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/hijoslejan/lkgfd/form') ?>
    </div>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    <?php $this->insert('view::vistas/hijoslejan/lkgfd/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
        },
        priListaClick: function (dataJson){
        }, 
        priClickProcesarForm: function(){ }, 
        validateMascaras: function (send) {
            return Core.VistaMascara.main(send);
        }
    };
    $(function () {
        Core.main();
        Core.Vista.main(Config.show.vista,Config);
    })

</script>
<?php $this->end() ?> 
