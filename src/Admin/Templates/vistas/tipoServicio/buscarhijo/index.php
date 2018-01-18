<?php
$breadcrumb=(object)array('actual'=>'Buscarhijo','titulo'=>'Vista de integrada de gestion de Buscarhijo','ruta'=>'Buscarhijo')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Buscarhijo
<?php $this->end()?>
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/tipoServicio/buscarhijo/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/tipoServicio/buscarhijo/form') ?>
    </div>
</div>
<!-- Incluir las de la vista de navegacion de ### (productos--productoss--tipo_servicio_id) ### -->
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/productos/productoss/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/productos/productoss/form') ?>
    </div>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    <?php $this->insert('view::vistas/tipoServicio/buscarhijo/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
        },
        priListaClick: function (dataJson){
           <?php $this->insert('view::vistas/productos/productoss/assent') ?>
            Config.relacionPadre = {
                "field":'tipo_servicio_id',
                "value": 'descripcion',
                "id": dataJson.datos.id
            };

            Core.Vista.main('Productoss',Config);
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
