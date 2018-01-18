<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Unida</h3>
    </div>
    <div id="Unida" class="listFiltros">
        <input type="text" class="search" id="search_nombre" placeholder="Nombre" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Unida')">
        <input type="text" class="search color" id="search_color" placeholder="Color" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Unida')">
        <button onClick="Core.VistaGrid.reloadGrid('Unida')" id="submitButtonUnida" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField()?>
    </div>
    <div class="box-body">
        <div id="dataJPHUnida" class="listGrid"></div>
        <div id='pagingAreaUnida'></div>
        <div id='recfoundUnida'></div>
    </div>
</div>
