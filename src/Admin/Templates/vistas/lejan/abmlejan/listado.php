<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Abmlejan</h3>
    </div>
    <div id="Abmlejan" class="listFiltros">
    <input type="text" class="search" id="search_convenios_id" placeholder="ConveniosId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmlejan')">
    <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmlejan')">
    <input type="text" class="search" id="search_apellidos" placeholder="Apellidos" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmlejan')">
        <button onClick="Core.VistaGrid.reloadGrid('Abmlejan')" id="submitButtonAbmlejan" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHAbmlejan" class="listGrid"></div>
        <div id='pagingAreaAbmlejan'></div>
        <div id='recfoundAbmlejan'></div>
    </div>
</div>
