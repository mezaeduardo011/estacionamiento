<?php $breadcrumb=(object)array('actual'=>'Gestionar','titulo'=>'Permite gestionar las distintas configuraciones del Sistema','ruta'=>'')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>

<?php $this->push('title') ?>
Gestionar del Generador
<?php $this->end() ?>

<?php $this->push('addCss')?>

<?php $this->end()?>
<section class="content">
    <div class="row">
        <div class="col-md-12  ">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-list"></i>
                    <h3 class="box-title">Menu de gestión  de configuración del modulo de generador</h3>
                </div>
                <div class="box-body pad table-responsive" id="box1">
                    <div class="col-md-6" id="menuPrincipal">
                        <!-- social buttons -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"> Opciones del sistema.   </h3>
                            </div>
                            <div class="box-body">

                                <a class="btn btn-block btn-social btn-github" id="optBaseDatos">
                                    <i class="fa fa-database"></i> Configuración de conexion a Base de Datos
                                </a>
                                <a class="btn btn-block btn-social btn-github" id="optCrearModelo">
                                    <i class="fa fa-plus-circle"></i> Crear nuevo Modelo
                                </a>
                                <a class="btn btn-block btn-social btn-github" id="optEditarModelo">
                                    <i class="fa fa-edit"></i> Editar modelo Existente
                                </a>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-md-6" id="menuSegundario" style="display: none">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" id="menuSegundarioTilulo"> Cargando ... </h3>
                            </div>
                            <div class="box-body" id="menuSegundarioBody">
                                Cargando ...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body pad table-responsive" id="box2" style="display: none">
                    <div class="col-md-4" id="menuPrincipal">
                        <!-- social buttons -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" id="menuPrincipalTitulo"> Opciones del sistema.   </h3>
                            </div>
                            <div class="box-body" id="menuPrincipalBody">
                                cargando ..
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-md-8" id="menuSegundario" style="display: none">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" id="menuSegundarioTilulo"> Cargando ... </h3>
                            </div>
                            <div class="box-body" id="menuSegundarioBody">
                                Cargando ...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body pad table-responsive" id="box3" style="display: none">
                    <div class="col-md-4" id="menuPrincipal">
                        <!-- social buttons -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" id="menuPrincipalTitulo"> Opciones del sistema.   </h3>
                            </div>
                            <div class="box-body" id="menuPrincipalBody">
                                cargando ..
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-md-8" id="menuSegundario" style="display: none">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" id="menuSegundarioTilulo"> Cargando ... </h3>
                            </div>
                            <div class="box-body" id="menuSegundarioBody">
                                Cargando ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>

    </div>
</section>
<?php $this->push('addJs')?>
<script src="/admin/dist/js/config.js"></script>
<script src="/admin/dist/js/gestionTablas.js"></script>
<!-- InputMask -->
<script src="/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
    Config.main();
</script>
<?php $this->end()?>
