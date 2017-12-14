<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Socios</h3>
    </div>
    <div id="Socios" class="listFiltros">
    <input type="text" class="search" id="search_tipo_documento" placeholder="TipoDocumento" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Socios')">
    <input type="text" class="search" id="search_documento" placeholder="Documento" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Socios')">
    <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Socios')">
    <input type="text" class="search" id="search_apellidos" placeholder="Apellidos" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Socios')">
    <input type="text" class="search" id="search_fecha_nacimiento" placeholder="FechaNacimiento" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Socios')">
    <input type="text" class="search" id="search_created_usuario_id" placeholder="CreatedUsuarioId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Socios')">
    <input type="text" class="search" id="search_updated_usuario_id" placeholder="UpdatedUsuarioId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Socios')">
    <input type="text" class="search" id="search_created_at" placeholder="CreatedAt" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Socios')">
    <input type="text" class="search" id="search_updated_at" placeholder="UpdatedAt" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Socios')">
    <button onClick="Core.VistaGrid.reloadGrid('Socios')" id="submitButtonSocios" style="margin-left:30px;">Buscar</button>
    </div>
    <div class="box-body">
        <div id="dataJPHSocios" class="listGrid"></div>
        <div id='pagingAreaSocios'></div>
        <div id='recfoundSocios'></div>
    </div>
</div>
