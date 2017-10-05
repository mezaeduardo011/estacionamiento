<?php
$breadcrumb=(object)array('actual'=>'Raumarys20','titulo'=>'Vista de integrada de gestion de Raumarys20','ruta'=>'Raumarys20')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Raumarys20
<?php $this->end()?>
<div class="row">
<!-- left column -->
<div class="col-md-7">
    <!-- general form elements -->
    <?php $this->insert('view::vistas/raumarys/raumarys20/listado') ?>
</div>
<div class="col-md-5">
   <?php $this->insert('view::vistas/raumarys/raumarys20/form') ?>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    Config.colums = [
        { "data": "id" },
        { "data": "nombres" },
        { "data": "apellidos" },
        { "data": "cedula" },
    ];

    // Configuracion de visual del DataTable
    Config.show = {
        "display":10,
        "search":true,
        "pagina":true,
        "rowid": "id"
    }

    Core.Vista.Util = {
        priListaLoad: function () { },
        priListaClick: function (dataJson){ }, 
        priClickProcesarForm: function(){ } 
    };
    $(function () {
        Core.main();
        Core.Vista.main('Raumarys20',Config);
    })

</script>
<?php $this->end() ?> 
