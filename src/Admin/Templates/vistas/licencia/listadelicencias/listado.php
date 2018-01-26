<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Lista de Licencias</h3>
    </div>
    <div id="Listadelicencias" class="listFiltros">
    <input type="text" class="search" id="search_codigo" placeholder="Codigo" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Listadelicencias')">
    <input type="text" class="search" id="search_nombre" placeholder="Nombre" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Listadelicencias')">
        <button onClick="Core.VistaGrid.reloadGrid('Listadelicencias')" id="submitButtonListadelicencias" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHListadelicencias" class="listGrid"></div>
        <div id='pagingAreaListadelicencias'></div>
        <div id='recfoundListadelicencias'></div>
    </div>
</div>
