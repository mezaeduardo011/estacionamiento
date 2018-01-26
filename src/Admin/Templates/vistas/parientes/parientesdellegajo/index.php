<?php
$breadcrumb=(object)array('actual'=>'Parientes del Legajo','titulo'=>'Vista de integrada de gestion de Parientes del Legajo','ruta'=>'Parientes del Legajo')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista ParientesDelLegajo
<?php $this->end()?>
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/parientes/parientesdellegajo/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/parientes/parientesdellegajo/form') ?>
    </div>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    <?php $this->insert('view::vistas/parientes/parientesdellegajo/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
            // Configurar de los campos parentesco--listadeparentescos--id ';
            var html5 = '<option>Seleccionar</option>';
              $.ajax({
                url: '/getEntidadComun',
                type: "POST",
                headers: {
                        'X-Auth-Token' : $('#csrf_token').val()
                },
                data: {"tipo":"combo","tabla_vista":"parentesco--listadeparentescos--id","vista_campo":"0","cart_separacion":" "},
                dataType: 'JSON',
                success : function(dataJson) {
                    $.each(dataJson.datos,function(key,value){
                    html5 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                    });
                    $(".parentesco--listadeparentescos--id").html(html5)
                }
            });
            // Configurar de los campos 0 ';
            var html6 = '<option>Seleccionar</option>';
              $.ajax({
                url: '/getEntidadComun',
                type: "POST",
                headers: {
                        'X-Auth-Token' : $('#csrf_token').val()
                },
                data: {"tipo":"combo","tabla_vista":"0","vista_campo":"0","cart_separacion":" "},
                dataType: 'JSON',
                success : function(dataJson) {
                    $.each(dataJson.datos,function(key,value){
                    html6 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                    });
                    $(".0").html(html6)
                }
            });
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
