<?php
$breadcrumb=(object)array('actual'=>'Novedades','titulo'=>'Vista de integrada de gestion de Novedades','ruta'=>'Novedades')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>
<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Novedades
<?php $this->end()?>
<div class="row">
    <!-- left column -->
    <div class="col-md-7">
        <!-- general form elements -->
        <?php $this->insert('view::vistas/novedades/novedades/listado') ?>
    </div>
        <div class="col-md-5">
        <?php $this->insert('view::vistas/novedades/novedades/form') ?>
    </div>
</div>
<?php $this->push('addJs') ?>
<script>
    // Definicion los campos del DataTable de esta vista
    var Config = {};
    <?php $this->insert('view::vistas/novedades/novedades/assent') ?>
    Core.Vista.Util = {}
    Core.Vista.Util = {
        priListaLoad: function (){ 
            // Configurar de los campos licencia--listadelicencias--id ';
            var html1 = '<option>Seleccionar</option>';
              $.ajax({
                url: '/getEntidadComun',
                type: "POST",
                headers: {
                        'X-Auth-Token' : $('#csrf_token').val()
                },
                data: {"tipo":"combo","tabla_vista":"licencia--listadelicencias--id","vista_campo":"nombre","cart_separacion":" "},
                dataType: 'JSON',
                success : function(dataJson) {
                    $.each(dataJson.datos,function(key,value){
                    html1 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                    });
                    $(".licencia--listadelicencias--id").html(html1)
                }
            });
            // Configurar de los campos legajo--legajosnovedades--id ';
            var html5 = '<option>Seleccionar</option>';
              $.ajax({
                url: '/getEntidadComun',
                type: "POST",
                headers: {
                        'X-Auth-Token' : $('#csrf_token').val()
                },
                data: {"tipo":"combo","tabla_vista":"legajo--legajosnovedades--id","vista_campo":"nombres|apellidos","cart_separacion":" "},
                dataType: 'JSON',
                success : function(dataJson) {
                    $.each(dataJson.datos,function(key,value){
                    html5 += '<option value="'+value.id+'">'+value.nombre+'</option>;'
                    });
                    $(".legajo--legajosnovedades--id").html(html5)
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
