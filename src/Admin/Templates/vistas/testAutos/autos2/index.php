<?php
$breadcrumb=(object)array('actual'=>'Autos2','titulo'=>'Vista de integrada de gestion de Autos2','ruta'=>'Autos2')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Autos2
<?php $this->end()?>
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/testAutos/autos2/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/testAutos/autos2/form') ?>
    </div>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    <?php $this->insert('view::vistas/testAutos/autos2/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
            // Configurar de los campos personal--clientes--id ';
            var html = '<option>Seelccionar</option>';
            $.post("/getEntidadComun",{"tipo":"combo","tabla_vista":"personal--clientes--id","vista_campo":"nombres|apellidos|correo","cart_separacion":"-"},function(dataJson){
                $.each(dataJson.datos,function(key,value){
                html += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                });
                $(".personal--clientes--id").html(html)
            });
            // Configurar de los campos modelos--modelos--id ';
            var html = '<option>Seelccionar</option>';
            $.post("/getEntidadComun",{"tipo":"combo","tabla_vista":"modelos--modelos--id","vista_campo":"detalle","cart_separacion":" "},function(dataJson){
                $.each(dataJson.datos,function(key,value){
                html += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                });
                $(".modelos--modelos--id").html(html)
            });
        },
        priListaClick: function (dataJson){
        }, 
        priClickProcesarForm: function(){ } 
    };
    $(function () {
        Core.main();
        Core.Vista.main('Autos2',Config);
    })

</script>
<?php $this->end() ?> 
