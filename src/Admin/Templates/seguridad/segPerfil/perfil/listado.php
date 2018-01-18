<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Perfil</h3>
    </div>
    <div id="Perfil" class="listFiltros">
        <input type="text" class="search" id="search_detalle" placeholder="Detalle" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Perfil')">
        <button onClick="Core.VistaGrid.reloadGrid('Perfil')" id="submitButtonPerfil" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField()?>

    </div>
    <div class="box-body">
        <div id="dataJPHPerfil" style="width:100%; height:450px;"></div>
        <div id='pagingAreaPerfil'></div>
        <div id='recfoundPerfil'></div>

    </div>
</div>

