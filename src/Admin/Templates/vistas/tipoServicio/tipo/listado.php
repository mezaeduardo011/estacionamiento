<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Tipo</h3>
    </div>
    <div id="Tipo" class="listFiltros">
    <input type="text" class="search" id="search_descripcion" placeholder="Descripcion" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Tipo')">
    <button onClick="Core.VistaGrid.reloadGrid('Tipo')" id="submitButtonTipo" style="margin-left:30px;">Buscar</button>
    </div>
    <div class="box-body">
        <div id="dataJPHTipo" class="listGrid"></div>
        <div id='pagingAreaTipo'></div>
        <div id='recfoundTipo'></div>
    </div>
</div>
