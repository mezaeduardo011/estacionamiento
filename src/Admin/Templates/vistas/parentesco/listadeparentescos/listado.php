<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Lista de Parentescos</h3>
    </div>
    <div id="Listadeparentescos" class="listFiltros">
    <input type="text" class="search" id="search_codigo" placeholder="Codigo" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Listadeparentescos')">
    <input type="text" class="search" id="search_nombre" placeholder="Nombre" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Listadeparentescos')">
        <button onClick="Core.VistaGrid.reloadGrid('Listadeparentescos')" id="submitButtonListadeparentescos" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHListadeparentescos" class="listGrid"></div>
        <div id='pagingAreaListadeparentescos'></div>
        <div id='recfoundListadeparentescos'></div>
    </div>
</div>
