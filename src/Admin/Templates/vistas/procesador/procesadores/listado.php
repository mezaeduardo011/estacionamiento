<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Procesadores</h3>
    </div>
    <div id="Procesadores" class="listFiltros">
    <input type="text" class="search" id="search_modelos" placeholder="Modelos" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Procesadores')">
    <input type="text" class="search" id="search_parte" placeholder="Parte" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Procesadores')">
    <input type="text" class="search" id="search_fabricado" placeholder="Fabricado" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Procesadores')">
        <button onClick="Core.VistaGrid.reloadGrid('Procesadores')" id="submitButtonProcesadores" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHProcesadores" class="listGrid"></div>
        <div id='pagingAreaProcesadores'></div>
        <div id='recfoundProcesadores'></div>
    </div>
</div>
