<?php
$breadcrumb=(object)array('actual'=>'Clientes','titulo'=>'Vista de integrada de gestion de Clientes','ruta'=>'Clientes')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Clientes
<?php $this->end()?>
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/personal/clientes/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/personal/clientes/form') ?>
    </div>
</div>
<!-- Incluir las de la vista de navegacion de ### (test_autos--autos--id_persona) ### -->
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/testAutos/autos/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/testAutos/autos/form') ?>
    </div>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    <?php $this->insert('view::vistas/personal/clientes/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
        },
        priListaClick: function (dataJson){
                    <?php $this->insert('view::vistas/testAutos/autos/assent') ?>
            Config.relacionPadre = {
                "field":'id_persona',
                "value": dataJson.datos.id
            };
            Core.VistaRelacion.main('Autos',Config);
        }, 
        priClickProcesarForm: function(){ } 
    };
    $(function () {
        Core.main();
        Core.Vista.main('Clientes',Config);
    })

</script>
<?php $this->end() ?> 
