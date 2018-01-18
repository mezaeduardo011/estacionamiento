<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Gggg</h3>
    </div>
    <div id="Gggg" class="listFiltros">
        <input type="text" class="search" id="search_apellido" placeholder="Apellido" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Gggg')">
        <input type="text" class="search" id="search_nombre" placeholder="Nombre" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Gggg')">
        <button onClick="Core.VistaGrid.reloadGrid('Gggg')" id="submitButtonGggg" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField()?>
    </div>
    <div class="box-body">
        <div id="dataJPHGggg" class="listGrid"></div>
        <div id='pagingAreaGggg'></div>
        <div id='recfoundGggg'></div>
    </div>
</div>
