<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Gabriela</h3>
    </div>
    <div id="Gabriela" class="listFiltros">
    <input type="text" class="search" id="search_cedula" placeholder="Cedula" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Gabriela')">
    <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Gabriela')">
        <button onClick="Core.VistaGrid.reloadGrid('Gabriela')" id="submitButtonGabriela" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHGabriela" class="listGrid"></div>
        <div id='pagingAreaGabriela'></div>
        <div id='recfoundGabriela'></div>
    </div>
</div>
