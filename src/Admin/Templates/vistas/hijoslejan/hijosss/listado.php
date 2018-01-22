<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Hijosss</h3>
    </div>
    <div id="Hijosss" class="listFiltros">
    <input type="text" class="search" id="search_lejan_id" placeholder="LejanId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Hijosss')">
    <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Hijosss')">
    <input type="text" class="search" id="search_apellidos" placeholder="Apellidos" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Hijosss')">
        <button onClick="Core.VistaGrid.reloadGrid('Hijosss')" id="submitButtonHijosss" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHHijosss" class="listGrid"></div>
        <div id='pagingAreaHijosss'></div>
        <div id='recfoundHijosss'></div>
    </div>
</div>
