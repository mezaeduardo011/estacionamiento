<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Lista de Convenios</h3>
    </div>
    <div id="Listadeconvenios" class="listFiltros">
    <input type="text" class="search" id="search_codigo" placeholder="Codigo" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Listadeconvenios')">
    <input type="text" class="search" id="search_nombre" placeholder="Nombre" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Listadeconvenios')">
        <button onClick="Core.VistaGrid.reloadGrid('Listadeconvenios')" id="submitButtonListadeconvenios" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHListadeconvenios" class="listGrid"></div>
        <div id='pagingAreaListadeconvenios'></div>
        <div id='recfoundListadeconvenios'></div>
    </div>
</div>
