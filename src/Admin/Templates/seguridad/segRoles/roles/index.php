<?php
$breadcrumb=(object)array('actual'=>'Roles','titulo'=>'Vista de integrada de gestion de Roles','ruta'=>'Roles')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>

<?php $this->push('title') ?>
 Gestionar de la vista Roles
<?php $this->end()?>
<div class="row">
<!-- left column -->
<div class="col-md-6">
    <!-- general form elements -->
    <?php $this->insert('view::seguridad/segRoles/roles/listado') ?>
</div>
<div class="col-md-6">
   <?php $this->insert('view::seguridad/segRoles/roles/form') ?>
</div>
<?php $this->push('addJs') ?>

<script>
    var Config = {};
    // Columnas para el grilla
    <?php $this->insert('view::seguridad/segRoles/roles/assent') ?>

    Core.Vista.Util = {
        priListaLoad: function () {  },
        priListaClick: function (dataJson) {
            var temp = dataJson.datos.detalle.split('-');
            var temp2 = temp.length
            var temp3 = '';
            for (a = 0; a < (temp2-1); a++){
                temp3 += temp[a]+'-';
            }

            $('#sendRolesProcesar #detalle').val(temp3.substring(0,temp3.length-1));
            $('#sendRolesProcesar #permisos').val(temp[temp2-1].trim())

        },
        priClickProcesarForm:function () {},
        validateMascaras: function () {
            var item = true;
            return item;
        }
    };
    $(function () {
        Core.main();
        Core.Vista.main('Roles',Config);
    })

</script>
<?php $this->end() ?> 
