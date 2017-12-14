<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Pablo</h3>
    </div>
    <div id="Pablo" class="listFiltros">
    <input type="text" class="search" id="search_apellido" placeholder="Apellido" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Pablo')">
    <input type="text" class="search" id="search_nombre" placeholder="Nombre" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Pablo')">
    <button onClick="Core.VistaGrid.reloadGrid('Pablo')" id="submitButtonPablo" style="margin-left:30px;">Buscar</button>
    </div>
    <div class="box-body">
        <div id="dataJPHPablo" class="listGrid"></div>
        <div id='pagingAreaPablo'></div>
        <div id='recfoundPablo'></div>
    </div>
</div>
