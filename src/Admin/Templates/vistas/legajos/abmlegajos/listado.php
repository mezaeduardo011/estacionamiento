<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Abmlegajos</h3>
    </div>
    <div id="Abmlegajos" class="listFiltros">
    <input type="text" class="search" id="search_convenio_id" placeholder="ConvenioId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmlegajos')">
    <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmlegajos')">
    <input type="text" class="search" id="search_apelidos" placeholder="Apelidos" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmlegajos')">
    <input type="text" class="search" id="search_legajo" placeholder="Legajo" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmlegajos')">
    <input type="text" class="search" id="search_sueldo" placeholder="Sueldo" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmlegajos')">
    <input type="text" class="search" id="search_apellidos" placeholder="Apellidos" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Abmlegajos')">
        <button onClick="Core.VistaGrid.reloadGrid('Abmlegajos')" id="submitButtonAbmlegajos" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHAbmlegajos" class="listGrid"></div>
        <div id='pagingAreaAbmlegajos'></div>
        <div id='recfoundAbmlegajos'></div>
    </div>
</div>
