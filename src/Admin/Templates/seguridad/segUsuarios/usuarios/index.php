    <?php
$breadcrumb=(object)array('actual'=>'Usuarios','titulo'=>'Vista de integrada de gestion de Usuarios','ruta'=>'Usuarios')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>

<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Usuarios
<?php $this->end()?>
<div class="row">
<!-- left column -->
<div class="col-md-7">
    <!-- general form elements -->
    <?php $this->insert('view::seguridad/segUsuarios/usuarios/listado') ?>
</div>
<div class="col-md-5">
   <?php $this->insert('view::seguridad/segUsuarios/usuarios/form',['roles'=>$roles]) ?>
</div>
<?php $this->push('addJs') ?>

<script>

     // Variable de configuracion
    var Config = {};
    // Columnas para el grilla
     <?php $this->insert('view::seguridad/segUsuarios/usuarios/assent') ?>

    Core.Vista.Util = {
        priListaLoad: function () {
        },
        priListaClick: function (dataJson) {
            /* Funcionalidad adicional para la vista en la parte del perfil*/
            if(typeof dataJson.perfiles != "undefined"){
                var perfil = dataJson.perfiles.length;
                $("#roles option").prop("selected",false);
                if(perfil > 0){
                    $.each(dataJson.perfiles,function (key, valor) {
                        $("#roles option[value='"+valor.seg_perfil_id+"']").prop("selected",true);
                    });
                }else{
                    $("#roles option").prop("selected",false);
                }
            }

            // Proceso encargado para procesar datos del panel
            $("#divAuditoria").html('<a id="mostrarAuditoriaDelPerfil" data-registro="'+window.btoa(dataJson.datos.id+'|'+dataJson.datos.usuario+'|'+dataJson.datos.correo)+'" class="btn btn-default">Ver Seguimiento</a>');
            this.modalAuditoria();
        },
        priClickProcesarForm:function () {

        },
        validateMascaras: function () {
            var item = true;
            return item;
        },
        modalAuditoria:function () {
            $('#mostrarAuditoriaDelPerfil').on('click',function(){
                var itemSelect = $(this).data('registro');
                //alert(itemSelect);
                sessionStorage.setItem('usuarioId',itemSelect);
                window.location.href = '/usuariosAuditoria';
            })
        }
    };
    $(function () {
        Core.main();
        Core.Vista.main(Config.show.module,Config);
    })

</script>
<?php $this->end() ?> 
