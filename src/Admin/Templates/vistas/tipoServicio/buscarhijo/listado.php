<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Buscarhijo</h3>
    </div>
    <div id="Buscarhijo" class="listFiltros">
    <input type="text" class="search" id="search_descripcion" placeholder="Descripcion" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Buscarhijo')">
        <button onClick="Core.VistaGrid.reloadGrid('Buscarhijo')" id="submitButtonBuscarhijo" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHBuscarhijo" class="listGrid"></div>
        <div id='pagingAreaBuscarhijo'></div>
        <div id='recfoundBuscarhijo'></div>
    </div>
</div>
