<?php
$breadcrumb=(object)array('actual'=>'Abmpadrehijos','titulo'=>'Vista de integrada de gestion de Abmpadrehijos','ruta'=>'Abmpadrehijos')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Abmpadrehijos
<?php $this->end()?>
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/convenio/abmpadrehijos/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/convenio/abmpadrehijos/form') ?>
    </div>
</div>
<!-- Incluir las de la vista de navegacion de ### (lejan--abmlejan--id) ### -->
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/lejan/abmlejan/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/lejan/abmlejan/form') ?>
    </div>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    <?php $this->insert('view::vistas/convenio/abmpadrehijos/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
        },
        priListaClick: function (dataJson){
           <?php $this->insert('view::vistas/lejan/abmlejan/assent') ?>
            Config.relacionPadre = {
                "field":'id',
                "value": 'convenios_id',
                "id": dataJson.datos.id
            };

            Core.Vista.main('Abmlejan',Config);
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
