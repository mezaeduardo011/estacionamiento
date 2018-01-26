<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Parientes del Legajo</h3>
    </div>
    <div id="Parientesdellegajo" class="listFiltros">
    <input type="text" class="search" id="search_documento_numero" placeholder="DocumentoNumero" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Parientesdellegajo')">
    <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Parientesdellegajo')">
    <input type="text" class="search" id="search_apellidos" placeholder="Apellidos" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Parientesdellegajo')">
    <input type="text" class="search" id="search_fecha_nacimiento" placeholder="FechaNacimiento" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Parientesdellegajo')">
    <input type="text" class="search" id="search_id_parentesco" placeholder="IdParentesco" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Parientesdellegajo')">
    <input type="text" class="search" id="search_id_legajo" placeholder="IdLegajo" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Parientesdellegajo')">
        <button onClick="Core.VistaGrid.reloadGrid('Parientesdellegajo')" id="submitButtonParientesdellegajo" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHParientesdellegajo" class="listGrid"></div>
        <div id='pagingAreaParientesdellegajo'></div>
        <div id='recfoundParientesdellegajo'></div>
    </div>
</div>
