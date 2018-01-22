<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Hijosvertodos</h3>
    </div>
    <div id="Hijosvertodos" class="listFiltros">
    <input type="text" class="search" id="search_convenios_id" placeholder="ConveniosId" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Hijosvertodos')">
    <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Hijosvertodos')">
    <input type="text" class="search" id="search_apellidos" placeholder="Apellidos" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Hijosvertodos')">
        <button onClick="Core.VistaGrid.reloadGrid('Hijosvertodos')" id="submitButtonHijosvertodos" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField(); ?>
    </div>
    <div class="box-body">
        <div id="dataJPHHijosvertodos" class="listGrid"></div>
        <div id='pagingAreaHijosvertodos'></div>
        <div id='recfoundHijosvertodos'></div>
    </div>
</div>
