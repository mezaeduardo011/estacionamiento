 <?php
 use JPH\Core\Router\RouterGenerator;
/**
 * @propiedad: PROPIETARIO DEL CODIGO
 * @Autor: Gregorio Bolivar * @email: elalconxvii@gmail.com
 * @Fecha de Creacion: 15/09/2017
 * @Auditado por: Gregorio J Bolívar B
 * @Descripción: Generado por el generador de codigo de router de webStores * @package: datosClass
 * @version: 1.0
 */

$request = $_SERVER;
$router = new RouterGenerator();
/** Inicio  del Bloque de instancia al proceso de /  */
$datos0 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runIndex');
$process0 = $router->setRuta($datos0);
/** Fin del caso de / */
/** Inicio  del Bloque de instancia al proceso de /login  */
$datos1 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/login", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runIndex');
$process1 = $router->setRuta($datos1);
/** Fin del caso de /login */
/** Inicio  del Bloque de instancia al proceso de /logout  */
$datos2 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/logout", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runLogout');
$process2 = $router->setRuta($datos2);
/** Fin del caso de /logout */
/** Inicio  del Bloque de instancia al proceso de /lockscreen  */
$datos3 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/lockscreen", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runLockscreen');
$process3 = $router->setRuta($datos3);
/** Fin del caso de /lockscreen */
/** Inicio  del Bloque de instancia al proceso de /loginPost  */
$datos4 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/loginPost", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runIndexPost');
$process4 = $router->setRuta($datos4);
/** Fin del caso de /loginPost */
/** Inicio  del Bloque de instancia al proceso de /gestionar  */
$datos5 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/gestionar", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runGestionar');
$process5 = $router->setRuta($datos5);
/** Fin del caso de /gestionar */
/** Inicio  del Bloque de instancia al proceso de /getConfiguracionConexiones  */
$datos6 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getConfiguracionConexiones", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runConfiguracionConexiones');
$process6 = $router->setRuta($datos6);
/** Fin del caso de /getConfiguracionConexiones */
/** Inicio  del Bloque de instancia al proceso de /getAllUniverso  */
$datos7 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getAllUniverso", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runAllUniverso');
$process7 = $router->setRuta($datos7);
/** Fin del caso de /getAllUniverso */
/** Inicio  del Bloque de instancia al proceso de /getConfiguracionVista  */
$datos8 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getConfiguracionVista", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runConfiguracionVista');
$process8 = $router->setRuta($datos8);
/** Fin del caso de /getConfiguracionVista */
/** Inicio  del Bloque de instancia al proceso de /setDataBase  */
$datos9 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setDataBase", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runSetDataBase');
$process9 = $router->setRuta($datos9);
/** Fin del caso de /setDataBase */
/** Inicio  del Bloque de instancia al proceso de /getEntidadesSeleccionadas  */
$datos10 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getEntidadesSeleccionadas", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runEntidadesSeleccionadas');
$process10 = $router->setRuta($datos10);
/** Fin del caso de /getEntidadesSeleccionadas */
/** Inicio  del Bloque de instancia al proceso de /setEntidadesProcesar  */
$datos11 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setEntidadesProcesar", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runSetEntidadesProcesar');
$process11 = $router->setRuta($datos11);
/** Fin del caso de /setEntidadesProcesar */
/** Inicio  del Bloque de instancia al proceso de /configCampos  */
$datos12 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/configCampos", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runConfigCampos');
$process12 = $router->setRuta($datos12);
/** Fin del caso de /configCampos */
/** Inicio  del Bloque de instancia al proceso de /createTablas  */
$datos13 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/createTablas", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runCreateTablas');
$process13 = $router->setRuta($datos13);
/** Fin del caso de /createTablas */
/** Inicio  del Bloque de instancia al proceso de /procesarForms  */
$datos14 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/procesarForms", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runProcesarForms');
$process14 = $router->setRuta($datos14);
/** Fin del caso de /procesarForms */
/** Inicio  del Bloque de instancia al proceso de /usuarios  */
$datos15 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuarios", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runIndex');
$process15 = $router->setRuta($datos15);
/** Fin del caso de /usuarios */
/** Inicio  del Bloque de instancia al proceso de /usuariosIndex  */
$datos16 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosIndex", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runUsuariosIndex');
$process16 = $router->setRuta($datos16);
/** Fin del caso de /usuariosIndex */
/** Inicio  del Bloque de instancia al proceso de /usuariosCreate  */
$datos17 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosCreate", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runUsuariosCreate');
$process17 = $router->setRuta($datos17);
/** Fin del caso de /usuariosCreate */
/** Inicio  del Bloque de instancia al proceso de /usuariosShow  */
$datos18 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosShow", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runUsuariosShow');
$process18 = $router->setRuta($datos18);
/** Fin del caso de /usuariosShow */
/** Inicio  del Bloque de instancia al proceso de /usuariosDelete  */
$datos19 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosDelete", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runUsuariosDelete');
$process19 = $router->setRuta($datos19);
/** Fin del caso de /usuariosDelete */
/** Inicio  del Bloque de instancia al proceso de /usuariosUpdate  */
$datos20 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosUpdate", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runUsuariosUpdate');
$process20 = $router->setRuta($datos20);
/** Fin del caso de /usuariosUpdate */
 
?>