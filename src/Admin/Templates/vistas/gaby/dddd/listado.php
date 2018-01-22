<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Dddd</h3>
    </div>
    <div id="Dddd" class="listFiltros">
    <input type="text" class="search" id="search_cedula" placeholder="Cedula" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Dddd')">
    <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Dddd')">
        <button onClick="Core.VistaGrid.reloadGrid('Dddd')" id="submitButtonDddd" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHDddd" class="listGrid"></div>
        <div id='pagingAreaDddd'></div>
        <div id='recfoundDddd'></div>
    </div>
</div>
