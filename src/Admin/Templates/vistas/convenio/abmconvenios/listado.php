<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Abmconvenios</h3>
    </div>
    <div id="Abmconvenios" class="listFiltros">
    <input type="text" class="search" id="search_codigo" placeholder="Codigo" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmconvenios')">
    <input type="text" class="search" id="search_nombre" placeholder="Nombre" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmconvenios')">
        <button onClick="Core.VistaGrid.reloadGrid('Abmconvenios')" id="submitButtonAbmconvenios" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHAbmconvenios" class="listGrid"></div>
        <div id='pagingAreaAbmconvenios'></div>
        <div id='recfoundAbmconvenios'></div>
    </div>
</div>
