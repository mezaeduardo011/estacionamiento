<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Productoss</h3>
    </div>
    <div id="Productoss" class="listFiltros">
    <input type="text" class="search" id="search_tipo_servicio_id" placeholder="TipoServicioId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Productoss')">
    <input type="text" class="search" id="search_descripcion" placeholder="Descripcion" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Productoss')">
    <input type="text" class="search" id="search_codigo" placeholder="Codigo" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Productoss')">
    <input type="text" class="search" id="search_productos_id" placeholder="ProductosId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Productoss')">
    <button onClick="Core.VistaGrid.reloadGrid('Productoss')" id="submitButtonProductoss" style="margin-left:30px;">Buscar</button>
    </div>
    <div class="box-body">
        <div id="dataJPHProductoss" class="listGrid"></div>
        <div id='pagingAreaProductoss'></div>
        <div id='recfoundProductoss'></div>
    </div>
</div>
