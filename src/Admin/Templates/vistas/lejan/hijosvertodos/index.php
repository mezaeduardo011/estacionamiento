<?php
$breadcrumb=(object)array('actual'=>'Hijosvertodos','titulo'=>'Vista de integrada de gestion de Hijosvertodos','ruta'=>'Hijosvertodos')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Hijosvertodos
<?php $this->end()?>
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/lejan/hijosvertodos/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/lejan/hijosvertodos/form') ?>
    </div>
</div>
<!-- Incluir las de la vista de navegacion de ### (hijoslejan--hijosss--lejan_id) ### -->
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/hijoslejan/hijosss/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/hijoslejan/hijosss/form') ?>
    </div>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    <?php $this->insert('view::vistas/lejan/hijosvertodos/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
        },
        priListaClick: function (dataJson){
           <?php $this->insert('view::vistas/hijoslejan/hijosss/assent') ?>
            Config.relacionPadre = {
                "field":'lejan_id',
                "value": 'nombres|apellidos',
                "id": dataJson.datos.id
            };

            Core.Vista.main('Hijosss',Config);
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
