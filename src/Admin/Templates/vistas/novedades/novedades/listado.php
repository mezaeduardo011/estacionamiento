<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Novedades</h3>
    </div>
    <div id="Novedades" class="listFiltros">
    <input type="text" class="search" id="search_licencia_id" placeholder="LicenciaId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Novedades')">
    <input type="text" class="search" id="search_fecha_inicio" placeholder="FechaInicio" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Novedades')">
    <input type="text" class="search" id="search_fecha_fin" placeholder="FechaFin" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Novedades')">
    <input type="text" class="search" id="search_dias_a_liquidar" placeholder="DiasALiquidar" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Novedades')">
    <input type="text" class="search" id="search_legajo_id" placeholder="LegajoId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Novedades')">
        <button onClick="Core.VistaGrid.reloadGrid('Novedades')" id="submitButtonNovedades" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHNovedades" class="listGrid"></div>
        <div id='pagingAreaNovedades'></div>
        <div id='recfoundNovedades'></div>
    </div>
</div>
