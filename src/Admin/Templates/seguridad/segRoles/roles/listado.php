<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Roles</h3>
    </div>
    <div id="Roles" class="listFiltros">
        <input type="text" class="search" id="search_detalle" placeholder="Detalles" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Roles')">
        <button onClick="Core.VistaGrid.reloadGrid('Roles')" id="submitButtonRoles" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField()?>

    </div>
    <div class="box-body">
        <div id="dataJPHRoles" style="width:100%; height:450px;"></div>
        <div id='pagingAreaRoles'></div>
        <div id='recfoundRoles'></div>
    </div>
</div>
