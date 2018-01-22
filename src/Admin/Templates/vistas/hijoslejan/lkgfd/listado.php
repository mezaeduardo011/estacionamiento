<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Lkgfd</h3>
    </div>
    <div id="Lkgfd" class="listFiltros">
    <input type="text" class="search" id="search_lejan_id" placeholder="LejanId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Lkgfd')">
    <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Lkgfd')">
    <input type="text" class="search" id="search_apellidos" placeholder="Apellidos" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Lkgfd')">
        <button onClick="Core.VistaGrid.reloadGrid('Lkgfd')" id="submitButtonLkgfd" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHLkgfd" class="listGrid"></div>
        <div id='pagingAreaLkgfd'></div>
        <div id='recfoundLkgfd'></div>
    </div>
</div>
