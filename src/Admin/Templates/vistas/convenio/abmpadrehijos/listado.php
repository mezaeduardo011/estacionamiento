<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Abmpadrehijos</h3>
    </div>
    <div id="Abmpadrehijos" class="listFiltros">
    <input type="text" class="search" id="search_codigo" placeholder="Codigo" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmpadrehijos')">
    <input type="text" class="search" id="search_nombre" placeholder="Nombre" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmpadrehijos')">
        <button onClick="Core.VistaGrid.reloadGrid('Abmpadrehijos')" id="submitButtonAbmpadrehijos" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHAbmpadrehijos" class="listGrid"></div>
        <div id='pagingAreaAbmpadrehijos'></div>
        <div id='recfoundAbmpadrehijos'></div>
    </div>
</div>
