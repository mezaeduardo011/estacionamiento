<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Usuarios</h3>
    </div>
    <div id="Usuarios" class="listFiltros">
        <input type="text" class="search" id="search_nombres" placeholder="Nombres" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Usuarios')">
        <input type="text" class="search" id="search_apellidos" placeholder="Apellidos" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Usuarios')">
        <input type="text" class="search date" id="search_fech_nacimiento" placeholder="fecha de nacimiento" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Usuarios')">
        <input type="text" class="search" id="search_usuario" placeholder="Login" onKeyDown="Core.VistaGrid.doSearch(arguments[0]||event,'Usuarios')">
        <button onClick="Core.VistaGrid.reloadGrid('Usuarios')" id="submitButtonProductoss" style="margin-left:30px;">Buscar</button>
        <?php JPH\Core\Http\SegCSRF::getTokenField()?>
    </div>
    <div class="box-body">
        <div id="dataJPHUsuarios" style="width:100%; height:450px;"></div>
        <div id='pagingAreaUsuarios'></div>
        <div id='recfoundUsuarios'></div>

    </div>
</div>
