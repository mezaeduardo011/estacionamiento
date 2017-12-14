<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Estatus</h3>
    </div>
    <div id="Estatus" class="listFiltros">
    <input type="text" class="search" id="search_nombre" placeholder="Nombre" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Estatus')">
    <input type="text" class="search" id="search_color" placeholder="Color" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Estatus')">
    <button onClick="Core.VistaGrid.reloadGrid('Estatus')" id="submitButtonEstatus" style="margin-left:30px;">Buscar</button>
    </div>
    <div class="box-body">
        <div id="dataJPHEstatus" class="listGrid"></div>
        <div id='pagingAreaEstatus'></div>
        <div id='recfoundEstatus'></div>
    </div>
</div>
