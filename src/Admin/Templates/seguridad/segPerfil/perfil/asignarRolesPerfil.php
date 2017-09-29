<?php
$breadcrumb=(object)array('actual'=>'Perfil','titulo'=>'Vista de integrada de gestion de Perfil','ruta'=>'Perfil')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>

<?php $this->push('title') ?>
 Gestionar de la vista Perfil
<?php $this->end()?>
<div class="row">
<!-- left column -->
    <div class="col-md-3">
        <!-- general form elements -->
        <?php $this->insert('view::seguridad/segPerfil/perfil/listado') ?>
    </div>
    <div class="col-md-6">
        <!-- general form elements -->
        <?php $this->insert('view::seguridad/segPerfil/perfil/listadoRoles') ?>
    </div>
    <div class="col-md-3">
       <?php $this->insert('view::seguridad/segPerfil/perfil/formAsociarRoles') ?>
    </div>
<?php $this->push('addJs') ?>

<script>
    // Variable de configuracion
    var Config = {};
    // Columnas para el dataTable de Perfile
    Config.colums = [
        { "data": "id" },
        { "data": "detalle" },
    ];
    // Configuracion de visualizacion del Datatable de Perfiles
    Config.show = {
        'display':10,
        'search':false,
        'pagina':false,
        'rowid': "id"
    }
    // Configuración personalizada del entorno privado de la vista
    Core.Vista.Util = {
        onTable: $('#dataJPHRoles').DataTable({
            "ajax": {
                "url": '/rolesListar',
                "dataSrc": ""
            },
            "rowId": 'id',
            "iDisplayLength": 100,
            "searching": true,
            "paging": true,
            "columns": Config.colums,
            "sServerMethod": "POST",
            "language": {
                "url": "/admin/dist/js/Spanish.json"
            },
            "bDestory": true
        }),
        asociado: [],
        priListaLoad: function () {
            localStorage.setItem('rolesId',0);
            // Funcionalidad privada del listaLoad
            var asoc = this.asociado;
            var onTabla = this.onTable;
            $('#dataJPHRoles tbody').on( 'click', 'tr', function () {
                var data = onTabla.row($(this)).data();
                if($(this).hasClass('selected')){
                    $(this).removeClass('selected');
                    var index = asoc    .indexOf(data.id);
                    asoc.splice(index, 1);
                }else{
                    $(this).addClass('selected');
                    asoc.push(data.id);
                }

            } );
            this.priClickProcesarForm();
        },
        priListaClick: function (dataJson) {
            // Funcionalidad adicional cuando haces click en el datatable principal
            var asoc = this.asociado;
            var onTabla = this.onTable;
            var item = onTabla.rows().data()
            localStorage.setItem('rolesId',dataJson.datos.id)
            //$.each(item, function (item, rows) {
                $.each(dataJson.roles, function (key, valor) {

                    if(valor.existe=='SI' && item[key].id==valor.id){
                        $('#rolesDetalles #'+item[key].id).addClass('selected')
                        console.log(item[key].id);
                        asoc.push(valor.id);
                    }else{
                        var index = asoc.indexOf(valor.id);
                        asoc.splice(index, 1);
                        $('#rolesDetalles #'+item[key].id).removeClass('selected')
                    }
                })

            $('#displayRoles').html('').html('<span style="text-align:center;font-size: 18px">'+asoc.length+'  row(s) selected</span>');

            $('#dataJPHRoles').click( function () {
                //alert(asoc);
                //alert( onTabla.rows('.selected').data().length +' row(s) selected' );
                var msj = onTabla.rows('.selected').data().length +' row(s) selected';
                $('#displayRoles').html('').html('<span style="text-align:center;font-size: 18px">'+msj+'</span>');
            } );

        },
        priClickProcesarForm:function () {
            var asoc = this.asociado;

                $('#marcar').click(function (e) {
                    if(asoc.length>0 && localStorage.getItem('rolesId')>0) {
                        var campos = new FormData();
                        campos.append('seg_perfil_id', localStorage.getItem('rolesId'));
                        campos.append('seg_roles_id', asoc);
                        $.ajax({
                            url: '/setAsociarRolesPerfil',
                            type: "POST",
                            data: campos,
                            processData: false,  // tell jQuery not to process the data
                            contentType: false,   // tell jQuery not to set contentType
                            dataType: 'JSON',
                            success: function (dataJson) {
                                if (dataJson.error == 0) {
                                    alertar(dataJson.msj);
                                    setTimeout(location.reload(), 1000);
                                } else {
                                    mostrarError(dataJson.msj)
                                }
                            }
                        });
                    }else{
                        mostrarError('Uff!, Debe seleccionar un Perfil y luego seleccionar los roles que sean necesarios asociar al perfil.')
                    }
                    return false;
                })

        }
    };

    $(function () {
        Core.main();
        Core.Vista.main('Perfil',Config);
    })

</script>
<?php $this->end() ?> 
