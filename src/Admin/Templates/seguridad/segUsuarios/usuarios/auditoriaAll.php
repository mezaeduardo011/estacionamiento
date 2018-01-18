<?php $breadcrumb=(object)array('actual'=>'Usuarios','titulo'=>'Vista de integrada de gestion de Usuarios','ruta'=>'Usuarios')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>
<?php $this->push('addCss')?>

<?php $this->end()?>
<?php $this->push('title') ?>
 Gestionar de la vista Usuarios
<?php $this->end()?>

<div class="row">
<!-- left column -->
    <div class="col-md-4">
        <?php $this->insert('view::seguridad/segUsuarios/usuarios/showEstadistica') ?>
    </div>
    <div class="col-md-8">
        <?php $this->insert('view::seguridad/segUsuarios/usuarios/logSession') ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php $this->insert('view::seguridad/segUsuarios/usuarios/logAcciones') ?>
    </div>
</div>
<?php $this->push('addJs') ?>
<script>
    Core.Menu.main();
    var userId=0;
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
        { "id":"created_at", "type":"ro", "align":"center", "sort":"str" , "value":"Fecha", "widths":"*"}

    ];

    Config.show1 = {
        'vista':'UsuariosSegloglogin',
        'tableTitle':'Listado de Registros.',
        'autoWidth':true,
        'multiSelect':false,
        'pageSize':50,
        'pagesInGrp':10
    };


    Core.VistaGrid.main(Config.show1.vista,Config.colums1,Config.show1,'','');




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

    Core.VistaGrid.main(Config.show2.vista,Config.colums2,Config.show2,'','');

    $(function () {
        Core.VistaAuditoria.showMetricas();
        setInterval(function(){
            Core.VistaAuditoria.showMetricas();
        }, 3000);
    })
</script>
<?php $this->end() ?>
