<?php
$breadcrumb=(object)array('actual'=>'Legajos (Parientes)','titulo'=>'Vista de integrada de gestion de Legajos (Parientes)','ruta'=>'Legajos (Parientes)')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista LegajosParientes
<?php $this->end()?>
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/legajo/legajosparientes/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/legajo/legajosparientes/form') ?>
    </div>
</div>
<!-- Incluir las de la vista de navegacion de ### (parientes--parientesdellegajo--id_legajo) ### -->
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
    <?php $this->insert('view::vistas/legajo/legajosparientes/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
            // Configurar de los campos convenio--listadeconvenios--id ';
            var html6 = '<option>Seleccionar</option>';
              $.ajax({
                url: '/getEntidadComun',
                type: "POST",
                headers: {
                        'X-Auth-Token' : $('#csrf_token').val()
                },
                data: {"tipo":"combo","tabla_vista":"convenio--listadeconvenios--id","vista_campo":"0","cart_separacion":" "},
                dataType: 'JSON',
                success : function(dataJson) {
                    $.each(dataJson.datos,function(key,value){
                    html6 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                    });
                    $(".convenio--listadeconvenios--id").html(html6)
                }
            });
        },
        priListaClick: function (dataJson){
           <?php $this->insert('view::vistas/parientes/parientesdellegajo/assent') ?>
            Config.relacionPadre = {
                "field":'id_legajo',
                "value": 'apellidos',
                "id": dataJson.datos.id
            };

            Core.Vista.main('Parientesdellegajo',Config);
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
