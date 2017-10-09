<?php
$breadcrumb=(object)array('actual'=>'Autos','titulo'=>'Vista de integrada de gestion de Autos','ruta'=>'Autos')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Autos
<?php $this->end()?>
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
    <?php $this->insert('view::vistas/testAutos/autos/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
            var html = '<option>Seelccionar</option>';
            $.post("/getEntidadComun",{"tipo":"combo","tabla_vista":"personal--clientes--id","vista_campo":"nombres"},function(dataJson){
                $.each(dataJson.datos,function(key,value){
                html += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                });
                $(".personal--clientes--id").html(html)
            });
        },
        priListaClick: function (dataJson){
        }, 
        priClickProcesarForm: function(){ } 
    };
    $(function () {
        Core.main();
        Core.Vista.main('Autos',Config);
    })

</script>
<?php $this->end() ?> 
