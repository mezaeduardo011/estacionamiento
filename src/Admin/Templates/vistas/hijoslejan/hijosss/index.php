<?php
$breadcrumb=(object)array('actual'=>'Hijosss','titulo'=>'Vista de integrada de gestion de Hijosss','ruta'=>'Hijosss')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Hijosss
<?php $this->end()?>
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
    <?php $this->insert('view::vistas/hijoslejan/hijosss/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
            // Configurar de los campos lejan--abmlejan--id ';
            var html1 = '<option>Seleccionar</option>';
              $.ajax({
                url: '/getEntidadComun',
                type: "POST",
                headers: {
                        'X-Auth-Token' : $('#csrf_token').val()
                },
                data: {"tipo":"combo","tabla_vista":"lejan--abmlejan--id","vista_campo":"nombres","cart_separacion":" "},
                dataType: 'JSON',
                success : function(dataJson) {
                    $.each(dataJson.datos,function(key,value){
                    html1 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                    });
                    $(".lejan--abmlejan--id").html(html1)
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
