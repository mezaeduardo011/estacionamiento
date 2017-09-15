<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <title>JRH+<?=$this->section('title')?></title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="ink, cookbook, recipes">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <!-- Place favicon.ico and apple-touch-icon(s) here  -->
        <link rel="shortcut icon" href="<?=\JPH\Core\Store\Cache::get('srcImg')?>favicon.ico" />
        <link rel="apple-touch-icon" href="<?=\JPH\Core\Store\Cache::get('srcImg')?>touch-icon-iphone.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?=\JPH\Core\Store\Cache::get('srcImg')?>touch-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?=\JPH\Core\Store\Cache::get('srcImg')?>touch-icon-iphone-retina.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?=\JPH\Core\Store\Cache::get('srcImg')?>touch-icon-ipad-retina.png" />
        <link rel="apple-touch-startup-image" href="<?=\JPH\Core\Store\Cache::get('srcImg')?>splash.320x460.png" media="screen and (min-device-width: 200px) and (max-device-width: 320px) and (orientation:portrait)" />
        <link rel="apple-touch-startup-image" href="<?=\JPH\Core\Store\Cache::get('srcImg')?>splash.768x1004.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
        <link rel="apple-touch-startup-image" href="<?=\JPH\Core\Store\Cache::get('srcImg')?>splash.1024x748.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />

        <!-- CSS Main-->
        <?php $this->insert('section/link') ?>

        <!-- CSS Extends-->
        <?=$this->section('addCss')?>

        <!-- NoScript Extends-->
        <?=$this->insert('section/noscript')?>

    </head>
    <body onload="Core.myFunction()">
	<div id="loader"></div>
	<div style="display:none;" id="myDiv" class="animate-bottom">
    <header>
        <div class="top-menu">
            <div id="principal" class="navigation">
                <ul class="menu horizontal black" id="menuNavegacion">
                    <!-- Menu START Menu Completo -->
                            <li class="menumodulos">
                                <div class="ink-dropdown" data-target="#my-menu-dropdown" data-dismiss-on-inside-click="true" data-dismiss-on-outside-click="true" data-dismiss-after="0.2">
                                    <button class="ink-button"><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>menu.png" /></button>
                                    <ul id="my-menu-dropdown" class="dropdown-menu">
                                        <li class="activo"><a href="#" data-complemento="1" ><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>asistencia.png" /><span>ASISTENCIA</span></a></li>
                                        <li class="inactivo"><a href="#" data-complemento="2" ><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>wine.png" /><span>ALCOHOLEMIA</span></a></li>
                                        <li class="inactivo"><a href="#" data-complemento="3" ><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>balances.png" /><span>BALANCES</span></a></li>
                                        <li class="inactivo"><a href="#" data-complemento="4" ><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>alertas.png" /><span>ALERTAS</span></a></li>
                                        <li class="inactivo"><a href="#" data-complemento="5" ><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>medicina.png" /><span>MEDICINA</span></a></li>
                                        <li class="inactivo"><a href="#" data-complemento="6" ><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>jobcosting.png" /><span>JOB COSTING</span></a></li>
                                        <li class="inactivo"><a href="#" data-complemento="7" ><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>scheduling.png" /><span>SCHEDULING</span></a></li>
                                        <li class="activo"><a href="#" data-complemento="8" ><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>comedor.png" /><span>COMEDOR</span></a></li>
                                        <li class="inactivo"><a href="#" data-complemento="9" ><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>postulaciones.png" /><span>POSTULACIONES</span></a></li>
                                        <li class="activo"><a href="#" data-complemento="10" ><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>vacaciones.png" /><span>VACACIONES</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <a href="/"><div class="logo"></div></a>
                            <button class="ink-toggle menuresponsive" data-target="#menuresponsive"><img src="<?=\JPH\Core\Store\Cache::get('srcImg')?>menuresponsive.png" />  Menu</button>
                            <div id="menuresponsive" class="hide-all">
                             <ul>
                                <li id="items" class="lightblue">
                                    <a href="dashboard.php">
                                        <i class="flaticon-medical-1"></i>
                                        <span>MONITOR</span>
                                    </a>
                                </li>
                                <li id="items" class="green">
                                    <a href="diario.php">
                                        <i class="flaticon-calendar-1"></i>
                                        <span>LIQ.DIARIA</span>
                                    </a>
                                </li>
                                <li id="items" class="orange">
                                    <a href="mensual.php">
                                        <i class="flaticon-calendar-1"></i>
                                        <span>LIQ.MENSUAL</span>
                                    </a>
                                </li>
                                <li id="items" class="">
                                    <a href="#">
                                        <i class="flaticon-television"></i>
                                        <span>OPERACIONES</span>
                                    </a>
                                    <ul id="operaciones" data-ref="OPERACIONES" class="submenu flyout links">
                                        <li><a href="legajos.php">PERSONAL</a></li>
                                        <li><a href="novedades.php">NOVEDADES</a></li>
                                        <li><a href="fichadas.php">FICHADAS</a></li>
                                        <li><a href="horarios.php">HORARIOS</a></li>
                                        <li><a href="horas.php">AUTORIZACION DE HORAS</a></li>
                                        <li><a href="procesar.php">PROCESAR</a></li>
                                    </ul>
                                </li>
                                <li id="items" class="">
                                    <a href="#">
                                        <i class="flaticon-settings"></i>
                                        <span>CONFIGURACIONES</span>
                                    </a>
                                    <ul id="configuraciones" data-ref="CONFIGURACIONES" class="submenu flyout links">
                                        <li>
                                            <a href="#">
                                                <span class="item">ORGANIGRAMA</span>
                                            </a>
                                            <ul id="organigrama" data-ref="ORGANIGRAMA" class="submenu flyout links">
                                                <li><a href="configuraciones.php">CATEGORIAS</a></li>
                                                <li><a href="configuraciones.php">CENTRODECOSTOS</a></li>
                                                <li><a href="configuraciones.php">DEPARTAMENTOS</a></li>
                                                <li><a href="configuraciones.php">GRUPOS</a></li>
                                                <li><a href="configuraciones.php">PLANTAS</a></li>
                                                <li><a href="configuraciones.php">PUESTOS</a></li>
                                                <li><a href="configuraciones.php">SECCIONES</a></li>
                                                <li><a href="configuraciones.php">SECTORES</a></li>
                                                <li><a href="configuraciones.php">EMPRESAS</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="configuraciones.php">CONVENIOS</a></li>
                                        <li><a href="configuraciones.php">FERIADOS</a></li>
                                        <li><a href="configuraciones.php">HORARIOS</a></li>
                                        <li><a href="configuraciones.php">NACIONALIDADES</a></li>
                                        <li><a href="configuraciones.php">NOVEDADES</a></li>
                                        <li><a href="configuraciones.php">PROVINCIAS</a></li>
                                        <li><a href="configuraciones.php">PREMIOS</a></li>
                                        <li><a href="configuraciones.php">ROTACIONES</a></li>
                                        <li><a href="reglas.php">REGLAS</a></li>
                                        <li><a href="jerarquias.php">JERARQUIAS</a></li>
                                        <li><a href="configuraciones.php">ETIQUETAS</a></li>
                                    </ul>
                                </li>
                                <li id="items" class="">
                                    <a href="reportes.php">
                                        <i class=""></i>
                                        <span>REPORTES</span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                            <div id="menuprincipal">
                            <ul>
                                <li id="items" class="lightblue">
                                    <a href="dashboard.php">
                                        <i class="flaticon-medical-1"></i>
                                        <span>MONITOR</span>
                                    </a>
                                </li>
                                <li id="items" class="green">
                                    <a href="diario.php">
                                        <i class="flaticon-calendar-1"></i>
                                        <span>LIQ.DIARIA</span>
                                    </a>
                                </li>
                                <li id="items" class="orange">
                                    <a href="mensual.php">
                                        <i class="flaticon-calendar-1"></i>
                                        <span>LIQ.MENSUAL</span>
                                    </a>
                                </li>
                                <li id="items" class="">
                                    <a href="#">
                                        <i class="flaticon-television"></i>
                                        <span>OPERACIONES</span>
                                    </a>
                                    <ul id="operaciones" data-ref="OPERACIONES" class="submenu flyout links">
                                        <li><a href="legajos.php">PERSONAL</a></li>
                                        <li><a href="novedades.php">NOVEDADES</a></li>
                                        <li><a href="fichadas.php">FICHADAS</a></li>
                                        <li><a href="horarios.php">HORARIOS</a></li>
                                        <li><a href="horas.php">AUTORIZACION DE HORAS</a></li>
                                        <li><a href="procesar.php">PROCESAR</a></li>
                                    </ul>
                                </li>
                                <li id="items" class="">
                                    <a href="#">
                                        <i class="flaticon-settings"></i>
                                        <span>CONFIGURACIONES</span>
                                    </a>
                                    <ul id="configuraciones" data-ref="CONFIGURACIONES" class="submenu flyout links">
                                        <li>
                                            <a href="#">
                                                <span class="item">ORGANIGRAMA</span>
                                            </a>
                                            <ul id="organigrama" data-ref="ORGANIGRAMA" class="submenu flyout links">
                                                <li><a href="configuraciones.php">CATEGORIAS</a></li>
                                                <li><a href="configuraciones.php">CENTRODECOSTOS</a></li>
                                                <li><a href="configuraciones.php">DEPARTAMENTOS</a></li>
                                                <li><a href="configuraciones.php">GRUPOS</a></li>
                                                <li><a href="configuraciones.php">PLANTAS</a></li>
                                                <li><a href="configuraciones.php">PUESTOS</a></li>
                                                <li><a href="configuraciones.php">SECCIONES</a></li>
                                                <li><a href="configuraciones.php">SECTORES</a></li>
                                                <li><a href="configuraciones.php">EMPRESAS</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="configuraciones.php">CONVENIOS</a></li>
                                        <li><a href="configuraciones.php">FERIADOS</a></li>
                                        <li><a href="configuraciones.php">HORARIOS</a></li>
                                        <li><a href="configuraciones.php">NACIONALIDADES</a></li>
                                        <li><a href="configuraciones.php">NOVEDADES</a></li>
                                        <li><a href="configuraciones.php">PROVINCIAS</a></li>
                                        <li><a href="configuraciones.php">PREMIOS</a></li>
                                        <li><a href="configuraciones.php">ROTACIONES</a></li>
                                        <li><a href="reglas.php">REGLAS</a></li>
                                        <li><a href="jerarquias.php">JERARQUIAS</a></li>
                                        <li><a href="configuraciones.php">ETIQUETAS</a></li>
                                    </ul>
                                </li>
                                <li id="items" class="">
                                    <a href="reportes.php">
                                        <i class=""></i>
                                        <span>REPORTES</span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        	
                        </ul>



                    <?php //include_once('tpl/menu.tpl');  ?>
                    <!-- Menu END Menu Completo-->
                
            </div>
            <nav id="usuario" class="ink-navigation push-right">
                <ul class="menu horizontal black">
                    <li id="iconFiltro"><a href="#"><i class="fa fa-filter ink-tooltip"  data-tip-forever="true" data-tip-where="left" data-tip-text="Filtro" data-tip-color="orange"></i></a></li>
                    <!--li><a href="#"><i class="flaticon-pie-chart"></i></a></li>
                    <li><a href="#"><i class="flaticon-warning"></i></a></li>
                    <li><a href="#"><i class="flaticon-envelope"></i></a></li-->

                    <li>
                        <a href="#"><i class="flaticon-people"><div id="usuarioLogeado" class="usuarioLogeado push-left"><?=$this->section('usuario')?></div></i></a>
                        <!-- Menu del Usuario -->
                        <ul id="config_user" class="submenu usuario flyout links">
                            <li><a href="/usuariosIndex">USUARIOS</a></li>
                            <li><a href="#" onclick="cambiarClave()">CAMBIAR CLAVE</a></li>
                            <li><a href="roles.php">ROLES</a></li>
                            <li><a href="asignacionRoles.php">ASIGNACION ROLES</a></li>
                        </ul>
                        <!-- End Menu Uauario -->
                    </li>
                    <li id="acciones" class="acciones"><a href="#"><i class="fa fa-cogs"></i></a></li>
                    <li class="salir"><a href="/logout"><i class="flaticon-power-button"></i></a></li>
                </ul>
            </nav>
        </div>
        <nav class="ink-navigation column-group titulonavegacion">
            <div class="all-70 align-left">
                <ul class="breadcrumbs grey" id="paginaActual">
                    <li><i class="fa fa-home"></i></li>
                    <li>USUARIOS</li>

                </ul>
            </div>
            <div class="all-30 align-right">
                <div class="iconomodulo"></div><h5>GENERADOR  </h5>
            </div>
        </nav>
    </header>


        <main id="contenedor" class="jph-scroll">
            <div class="column-group">
                <div id="columnaPrincipal" class="columnaPrincipal all-100 ink-grid">
                    <div class="jph-loading"></div>
                    <div class="all-100 ink-grid">
                        <div class="ink-grid">
                                <?=$this->section('content')?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="push"></div>
        </main>
        <?php $this->insert('section/footer') ?>
        <?php $this->insert('section/extraDiv') ?>
      </div>
    </body>
    <!-- javascript files -->
    <?php $this->insert('section/script') ?>

<!-- javascript extra -->
<?=$this->section('addJs')?>
</html>