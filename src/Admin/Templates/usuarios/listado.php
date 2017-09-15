<div class="all-50 small-95 tiny-95 push-center" id="grilla">
    <div class="column-group head">
        <div class="all-70">
            <i class="fa fa-list" aria-hidden="true"></i>
            <span>Listado de usuarios</span>
        </div>
        <div class="all-30 align-right edicion">
            <i class="excel ink-tooltip" aria-hidden="true" data-tip-text="Exportar a Excel" data-tip-color="green"></i>
            <i class="pdf ink-tooltip" aria-hidden="true" data-tip-text="Exportar a PDF" data-tip-color="red"></i>
        </div>
    </div>
    <table class="ink-table alternating bordered">
        <thead>
        <tr>
            <th>Usuario<i class="fa fa-sort pull-right sortable"></i></th>
            <th>Apellido y Nombre<i class="fa fa-sort pull-right sortable"></i></th>
            <th>Correo<i class="fa fa-sort pull-right sortable"></i></th>
            <th>Telefono<i class="fa fa-sort pull-right sortable"></i></th>
        </tr>
        </thead>
        <tbody id="dgDatos">
        <?php foreach ($usuariosListado AS $campos){ ?>
            <tr data-id="<?php echo $campos->NUSUARIO?>" class="_<?php echo $campos->NUSUARIO?>">
                <td><?php echo $campos->CUSUARIO?></td>
                <td><?php echo $campos->DAPELLIDO?> <?php echo $campos->DNOMBRE?></td>
                <td><?php echo $campos->DCORREOELECTRONICO?></td>
                <td><?php echo $campos->DTELEFONO?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>