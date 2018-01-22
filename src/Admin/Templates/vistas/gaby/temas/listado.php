<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Temas</h3>
    </div>
    <div id="Temas" class="listFiltros">
    <input type="text" class="search" id="search_cedula" placeholder="Cedula" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Temas')">
    <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Temas')">
        <button onClick="Core.VistaGrid.reloadGrid('Temas')" id="submitButtonTemas" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHTemas" class="listGrid"></div>
        <div id='pagingAreaTemas'></div>
        <div id='recfoundTemas'></div>
    </div>
</div>
