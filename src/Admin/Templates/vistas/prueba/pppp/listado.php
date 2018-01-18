<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Pppp</h3>
    </div>
    <div id="Pppp" class="listFiltros">
        <input type="text" class="search" id="search_apellido" placeholder="Apellido" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Pppp')">
        <input type="text" class="search" id="search_nombre" placeholder="Nombre" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Pppp')">
        <button onClick="Core.VistaGrid.reloadGrid('Pppp')" id="submitButtonPppp" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHPppp" class="listGrid"></div>
        <div id='pagingAreaPppp'></div>
        <div id='recfoundPppp'></div>
    </div>
</div>
