<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Legajos (Novedades)</h3>
    </div>
    <div id="Legajosnovedades" class="listFiltros">
    <input type="text" class="search" id="search_legajo_numero" placeholder="LegajoNumero" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Legajosnovedades')">
    <input type="text" class="search" id="search_documento_numero" placeholder="DocumentoNumero" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Legajosnovedades')">
    <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Legajosnovedades')">
    <input type="text" class="search" id="search_apellidos" placeholder="Apellidos" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Legajosnovedades')">
    <input type="text" class="search" id="search_sueldo_bruto" placeholder="SueldoBruto" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Legajosnovedades')">
    <input type="text" class="search" id="search_convenio_id" placeholder="ConvenioId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Legajosnovedades')">
    <input type="text" class="search" id="search_fecha_ingreso" placeholder="FechaIngreso" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Legajosnovedades')">
        <button onClick="Core.VistaGrid.reloadGrid('Legajosnovedades')" id="submitButtonLegajosnovedades" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHLegajosnovedades" class="listGrid"></div>
        <div id='pagingAreaLegajosnovedades'></div>
        <div id='recfoundLegajosnovedades'></div>
    </div>
</div>