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
    <div class="col-md-4">
        <?php $this->insert('view::seguridad/segUsuarios/usuarios/showUsuario') ?>
    </div>
    <div class="col-md-8">
        <?php $this->insert('view::seguridad/segUsuarios/usuarios/logSession') ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php $this->insert('view::seguridad/segUsuarios/usuarios/logAcciones') ?>
    </div>
    <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
</div>
<?php $this->push('addJs') ?>
<script>
    Core.Menu.main();
    var userId=sessionStorage.getItem('usuarioId');
    var tmp1 = window.atob(userId);
    var tmp2 = tmp1.split('|');

    if(userId.length<2){
        window.location.href = '/usuariosIndex';
    }

    // Variable de configuracion
    var Config = {};
    // Columnas para el grilla
    Config.colums1 = [
        { "id":"host", "type":"ro", "align":"center", "sort":"str" , "value":"Host", "widths":"*"},
        { "id":"navegador", "type":"ro", "align":"center", "sort":"str" , "value":"Navegador", "widths":"*"},
        { "id":"accion", "type":"ro", "align":"center", "sort":"str" , "value":"Accion", "widths":"*"},
        { "id":"created_at", "type":"ro", "align":"center", "sort":"str" , "value":"Fecha", "widths":"*"},
    ];
    Config.show1 = {
        'vista':'UsuariosSegloglogin',
        'tableTitle':'Listado de Registros.',
        'autoWidth':true,
        'multiSelect':false,
        'pageSize':50,
        'pagesInGrp':10
    };


    Core.VistaGrid.main(Config.show1.vista,Config.colums1,Config.show1,'','usuario='+tmp2[0]);


    setInterval(function(){
        //Core.VistaGrid.reloadGrid(Config.show1.vista);
    }, 3000);


    // Variable de configuracion
    var Config = {};
    // Columnas para el grilla
    Config.colums2 = [
        { "id":"proceso", "type":"ro", "align":"center", "sort":"str" , "value":"Accion", "widths":"*"},
        { "id":"entidad", "type":"ro", "align":"center", "sort":"str" , "value":"Entidad", "widths":"*"},
        { "id":"host", "type":"ro", "align":"center", "sort":"str" , "value":"Host", "widths":"*"},
        { "id":"created_at", "type":"ro", "align":"center", "sort":"str" , "value":"Fecha", "widths":"*"},
    ];

    Config.show2 = {
        'vista':'usuariosShowAcciones',
        'tableTitle':'Listado de Registros.',
        'autoWidth':true,
        'multiSelect':false,
        'pageSize':50,
        'pagesInGrp':10
    };

    Core.VistaGrid.main(Config.show2.vista,Config.colums2,Config.show2,'','usuario_id='+tmp2[0]);

    var item = Core.VistaGrid.myGrid[Config.show2.vista];


    // Agregando funcionalidad cuando hace click en el segundo listado de las acciones
    item.attachEvent("onRowSelect", function (data) {
        doOnRowSelected(data);
        Core.Vista.currentRequest.abort();
    });


    function doOnRowSelected(item) {
            $.ajax({
                url: '/showAccionesAuditoria',
                type: "POST",
                headers: {
                    'X-Auth-Token' : $('#csrf_token').val()
                },
                data: {'item':item},
                dataType: 'JSON',
                success : function(dataJson) {
                    $('#modalCoreLabel').html('Vista del registro de auditoría');
                    var html = '<table class="table table-bordered">';
                    $.each(dataJson.datos, function (index, value) {

                        if (index == 'id' || index == 'usuario_id') {
                            return
                        }
                        if (index == 'new_value' && value == '') {
                            return
                        }
                        if (index == 'old_value' && value == '') {
                            return
                        }

                        html += '<tr>';
                        html += '    <td>' + index + '</td>';
                        valor = value;
                        if ((index == 'old_value' && value.length > 1) || (index == 'new_value' && value.length > 1)) {
                            valor = '<table>';
                            $.each(JSON.parse(value), function (index2, value2) {
                                valor += '<tr>';
                                valor += '<td>' + index2 + '</td>';
                                valor += '<td>' + value2 + '</td>';
                                valor += '</tr>';
                            })
                            valor += '</table>'
                        }
                        html += '    <td>' + valor + '</td>';
                        html += '</tr>';
                    })
                    html += '</table>';
                    $('#modalBody').html(html);
                    $('.modal-footer').remove();
                    $('.modal modal-dialog').addClass('modal-lg')
                    $('.modal').modal('show')
                }
        })
    }

    $(function () {
        Core.VistaAuditoria.main();
    })
</script>
<?php $this->end() ?>
