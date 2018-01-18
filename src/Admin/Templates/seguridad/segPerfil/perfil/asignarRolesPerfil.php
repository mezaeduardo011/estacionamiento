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
    // Variable de configuracionsss
    var Config = {};
    // Columnas para el grilla
    <?php $this->insert('view::seguridad/segPerfil/perfil/assent') ?>

    // Configuración personalizada del entorno privado de la vista
    Core.Vista.Util = {
        myGrid2 : '',
        asociado: [],
        priListaLoad: function () {
            Core.Vista.Util.mostrarBTN(0);
            // Funcionalidad privada del listaLoad
            <?php $this->insert('view::seguridad/segPerfil/perfil/assent2') ?>

            localStorage.setItem('urlVistaTmp-'+Config.show.vista,Config.show.vista);
            // Permite instanciar las funcionalidades de la Grid para la nueva vista Roles
            Core.VistaGrid.main(Config.show.vista,Config.colums,Config.show);

            this.priClickProcesarForm();
        },
        doOnRowSelected: function (id) {
            var cant=Core.VistaGrid.myGrid['Roles'].getSelectedId().split(',').length;
            Core.Vista.Util.displayRoles(cant);
            //Core.Vista.Util.priClickProcesarForm();

        },
        mostrarBTN: function (cant) {
            if(cant>0){
                $('#marcar').show();
                // Volver a hacer la busqueda con los campos dinamico a buscar

                // Si fue definido borrar
                Core.Vista.Util.segClickProcesarForm();
            }else{
                $('#marcar').hide();
            }
        },
        priListaClick: function (dataJson) {
            // Permite mostrar el detalles del perfil seleccionado
            $('input#detalle').val(dataJson.datos.detalle);

            // Guardar el identifidor del del perfil seleccionado
            $('input#id').val(dataJson.datos.id);

            // Funcionalidad adicional cuando haces click en el datatable principal
            var asoc = Core.Vista.Util.asociado = [];
            //var onTabla = this.onTable;
            var item = Core.VistaGrid.myGrid[Config.show.vista];
            localStorage.setItem('rolesId',dataJson.datos.id);

            // Limpiamos todo el listado de los roles disponible
            item.clearSelection();

            // Agregando funcionalidad cuando hace click en el segundo listado de las acciones
            item.attachEvent("onRowSelect", function (data) {
                Core.Vista.Util.doOnRowSelected(data);
                Core.Vista.currentRequest.abort();
            });

            item.forEachRow(function(id){
                //echo dataJson.roles[id];
                //alert(id);

            });

            // Valores de datos que tienen seleccion
            $.each(dataJson.roles, function (key, valor) {

                // Valores disponible todos lo valores en arreglos
                var rows = item.getAllItemIds().split(',');
                //alert(valor.id +'#'+ rows[key]+'#'+valor.existe);
                if(valor.existe=='SI' && rows[key]==valor.id){
                    setTimeout(function(){
                        item.setSelectedRow(valor.id,'background-color:#293A4A;color: #ffffff');
                        console.log('Item activado - '+rows[key]);
                    },500)
                    asoc.push(rows[key]);
                }/*else{
                    var index = asoc.indexOf(rows[key]);
                    asoc.splice(index, 1);
                    //item.setSelectedRow(rows[key],'');
                }*/

            });
            var cant=asoc.length;
            Core.Vista.Util.displayRoles(cant);
        },
        displayRoles: function(cant) {
            var msj = cant +' row(s) selected';
            $('#displayRoles').html('').html('<span style="text-align:center;font-size: 18px">'+msj+'</span>');
            Core.Vista.Util.mostrarBTN(cant);
        },
        priClickProcesarForm:function () {},
        segClickProcesarForm:function () {
            var asoc = Core.Vista.Util.asociado;
            var cant=Core.VistaGrid.myGrid['Roles'].getSelectedId();
            $('#marcar').click(function (e) {

                    if(localStorage.getItem('rolesId')>0) {
                        var campos = new FormData();
                        campos.append('seg_perfil_id', localStorage.getItem('rolesId'));
                        campos.append('seg_roles_id', cant);
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


            })
        },
        validateMascaras: function () {
            var item = true;
            return item;
        }
    };

    $(function () {
        Core.main();
        Core.Vista.main('Perfil',Config);
    })

</script>
<?php $this->end() ?> 
