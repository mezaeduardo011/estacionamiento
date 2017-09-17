 <?php
 use JPH\Core\Router\RouterGenerator;
/**
 * @propiedad: PROPIETARIO DEL CODIGO
 * @Autor: Gregorio Bolivar * @email: elalconxvii@gmail.com
 * @Fecha de Creacion: 17/09/2017
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
/** Inicio  del Bloque de instancia al proceso de /sendVistaNuevaConfigurada  */
$datos12 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sendVistaNuevaConfigurada", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runVistaNuevaConfigurada');
$process12 = $router->setRuta($datos12);
/** Fin del caso de /sendVistaNuevaConfigurada */
/** Inicio  del Bloque de instancia al proceso de /procesarCrudVistas  */
$datos13 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/procesarCrudVistas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runProcesarCrudVistas');
$process13 = $router->setRuta($datos13);
/** Fin del caso de /procesarCrudVistas */
/** Inicio  del Bloque de instancia al proceso de /informarProceso  */
$datos14 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/informarProceso", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runInformarProceso');
$process14 = $router->setRuta($datos14);
/** Fin del caso de /informarProceso */
/** Inicio  del Bloque de instancia al proceso de /createTablas  */
$datos15 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/createTablas", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runCreateTablas');
$process15 = $router->setRuta($datos15);
/** Fin del caso de /createTablas */
/** Inicio  del Bloque de instancia al proceso de /usuarios  */
$datos16 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuarios", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runIndex');
$process16 = $router->setRuta($datos16);
/** Fin del caso de /usuarios */
/** Inicio  del Bloque de instancia al proceso de /usuariosIndex  */
$datos17 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosIndex", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runUsuariosIndex');
$process17 = $router->setRuta($datos17);
/** Fin del caso de /usuariosIndex */
/** Inicio  del Bloque de instancia al proceso de /usuariosCreate  */
$datos18 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosCreate", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runUsuariosCreate');
$process18 = $router->setRuta($datos18);
/** Fin del caso de /usuariosCreate */
/** Inicio  del Bloque de instancia al proceso de /usuariosShow  */
$datos19 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosShow", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runUsuariosShow');
$process19 = $router->setRuta($datos19);
/** Fin del caso de /usuariosShow */
/** Inicio  del Bloque de instancia al proceso de /usuariosDelete  */
$datos20 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosDelete", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runUsuariosDelete');
$process20 = $router->setRuta($datos20);
/** Fin del caso de /usuariosDelete */
/** Inicio  del Bloque de instancia al proceso de /usuariosUpdate  */
$datos21 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosUpdate", 'apps'=>"Admin", 'controller'=>"usuarios",'method'=>'runUsuariosUpdate');
$process21 = $router->setRuta($datos21);
/** Fin del caso de /usuariosUpdate */
/** Inicio  del Bloque de instancia al proceso de /testAutoIndex  */
$datos22 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/testAutoIndex", 'apps'=>"Admin", 'controller'=>"testAbm",'method'=>'runTestAbmIndex');
$process22 = $router->setRuta($datos22);
/** Fin del caso de /testAutoIndex */
/** Inicio  del Bloque de instancia al proceso de /raumarysIndex  */
$datos23 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/raumarysIndex", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmIndex');
$process23 = $router->setRuta($datos23);
/** Fin del caso de /raumarysIndex */
/** Inicio  del Bloque de instancia al proceso de /raumarysListar  */
$datos24 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysListar", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmListar');
$process24 = $router->setRuta($datos24);
/** Fin del caso de /raumarysListar */
/** Inicio  del Bloque de instancia al proceso de /raumarysCreate  */
$datos25 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysCreate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmCreate');
$process25 = $router->setRuta($datos25);
/** Fin del caso de /raumarysCreate */
/** Inicio  del Bloque de instancia al proceso de /raumarysShow  */
$datos26 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysShow", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmShow');
$process26 = $router->setRuta($datos26);
/** Fin del caso de /raumarysShow */
/** Inicio  del Bloque de instancia al proceso de /raumarysDelete  */
$datos27 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysDelete", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmDelete');
$process27 = $router->setRuta($datos27);
/** Fin del caso de /raumarysDelete */
/** Inicio  del Bloque de instancia al proceso de /raumarysUpdate  */
$datos28 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysUpdate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmUpdate');
$process28 = $router->setRuta($datos28);
/** Fin del caso de /raumarysUpdate */
/** Inicio  del Bloque de instancia al proceso de /raumarysIndex  */
$datos29 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/raumarysIndex", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmIndex');
$process29 = $router->setRuta($datos29);
/** Fin del caso de /raumarysIndex */
/** Inicio  del Bloque de instancia al proceso de /raumarysListar  */
$datos30 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysListar", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmListar');
$process30 = $router->setRuta($datos30);
/** Fin del caso de /raumarysListar */
/** Inicio  del Bloque de instancia al proceso de /raumarysCreate  */
$datos31 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysCreate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmCreate');
$process31 = $router->setRuta($datos31);
/** Fin del caso de /raumarysCreate */
/** Inicio  del Bloque de instancia al proceso de /raumarysShow  */
$datos32 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysShow", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmShow');
$process32 = $router->setRuta($datos32);
/** Fin del caso de /raumarysShow */
/** Inicio  del Bloque de instancia al proceso de /raumarysDelete  */
$datos33 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysDelete", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmDelete');
$process33 = $router->setRuta($datos33);
/** Fin del caso de /raumarysDelete */
/** Inicio  del Bloque de instancia al proceso de /raumarysUpdate  */
$datos34 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysUpdate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmUpdate');
$process34 = $router->setRuta($datos34);
/** Fin del caso de /raumarysUpdate */
/** Inicio  del Bloque de instancia al proceso de /raumarysIndex  */
$datos35 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/raumarysIndex", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmIndex');
$process35 = $router->setRuta($datos35);
/** Fin del caso de /raumarysIndex */
/** Inicio  del Bloque de instancia al proceso de /raumarysListar  */
$datos36 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysListar", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmListar');
$process36 = $router->setRuta($datos36);
/** Fin del caso de /raumarysListar */
/** Inicio  del Bloque de instancia al proceso de /raumarysCreate  */
$datos37 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysCreate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmCreate');
$process37 = $router->setRuta($datos37);
/** Fin del caso de /raumarysCreate */
/** Inicio  del Bloque de instancia al proceso de /raumarysShow  */
$datos38 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysShow", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmShow');
$process38 = $router->setRuta($datos38);
/** Fin del caso de /raumarysShow */
/** Inicio  del Bloque de instancia al proceso de /raumarysDelete  */
$datos39 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysDelete", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmDelete');
$process39 = $router->setRuta($datos39);
/** Fin del caso de /raumarysDelete */
/** Inicio  del Bloque de instancia al proceso de /raumarysUpdate  */
$datos40 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysUpdate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmUpdate');
$process40 = $router->setRuta($datos40);
/** Fin del caso de /raumarysUpdate */
/** Inicio  del Bloque de instancia al proceso de /raumarysIndex  */
$datos41 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/raumarysIndex", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmIndex');
$process41 = $router->setRuta($datos41);
/** Fin del caso de /raumarysIndex */
/** Inicio  del Bloque de instancia al proceso de /raumarysListar  */
$datos42 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysListar", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmListar');
$process42 = $router->setRuta($datos42);
/** Fin del caso de /raumarysListar */
/** Inicio  del Bloque de instancia al proceso de /raumarysCreate  */
$datos43 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysCreate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmCreate');
$process43 = $router->setRuta($datos43);
/** Fin del caso de /raumarysCreate */
/** Inicio  del Bloque de instancia al proceso de /raumarysShow  */
$datos44 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysShow", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmShow');
$process44 = $router->setRuta($datos44);
/** Fin del caso de /raumarysShow */
/** Inicio  del Bloque de instancia al proceso de /raumarysDelete  */
$datos45 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysDelete", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmDelete');
$process45 = $router->setRuta($datos45);
/** Fin del caso de /raumarysDelete */
/** Inicio  del Bloque de instancia al proceso de /raumarysUpdate  */
$datos46 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysUpdate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmUpdate');
$process46 = $router->setRuta($datos46);
/** Fin del caso de /raumarysUpdate */
/** Inicio  del Bloque de instancia al proceso de /raumarysIndex  */
$datos47 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/raumarysIndex", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmIndex');
$process47 = $router->setRuta($datos47);
/** Fin del caso de /raumarysIndex */
/** Inicio  del Bloque de instancia al proceso de /raumarysListar  */
$datos48 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysListar", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmListar');
$process48 = $router->setRuta($datos48);
/** Fin del caso de /raumarysListar */
/** Inicio  del Bloque de instancia al proceso de /raumarysCreate  */
$datos49 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysCreate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmCreate');
$process49 = $router->setRuta($datos49);
/** Fin del caso de /raumarysCreate */
/** Inicio  del Bloque de instancia al proceso de /raumarysShow  */
$datos50 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysShow", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmShow');
$process50 = $router->setRuta($datos50);
/** Fin del caso de /raumarysShow */
/** Inicio  del Bloque de instancia al proceso de /raumarysDelete  */
$datos51 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysDelete", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmDelete');
$process51 = $router->setRuta($datos51);
/** Fin del caso de /raumarysDelete */
/** Inicio  del Bloque de instancia al proceso de /raumarysUpdate  */
$datos52 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysUpdate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmUpdate');
$process52 = $router->setRuta($datos52);
/** Fin del caso de /raumarysUpdate */
/** Inicio  del Bloque de instancia al proceso de /raumarysIndex  */
$datos53 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/raumarysIndex", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmIndex');
$process53 = $router->setRuta($datos53);
/** Fin del caso de /raumarysIndex */
/** Inicio  del Bloque de instancia al proceso de /raumarysListar  */
$datos54 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysListar", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmListar');
$process54 = $router->setRuta($datos54);
/** Fin del caso de /raumarysListar */
/** Inicio  del Bloque de instancia al proceso de /raumarysCreate  */
$datos55 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysCreate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmCreate');
$process55 = $router->setRuta($datos55);
/** Fin del caso de /raumarysCreate */
/** Inicio  del Bloque de instancia al proceso de /raumarysShow  */
$datos56 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysShow", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmShow');
$process56 = $router->setRuta($datos56);
/** Fin del caso de /raumarysShow */
/** Inicio  del Bloque de instancia al proceso de /raumarysDelete  */
$datos57 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysDelete", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmDelete');
$process57 = $router->setRuta($datos57);
/** Fin del caso de /raumarysDelete */
/** Inicio  del Bloque de instancia al proceso de /raumarysUpdate  */
$datos58 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysUpdate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmUpdate');
$process58 = $router->setRuta($datos58);
/** Fin del caso de /raumarysUpdate */
/** Inicio  del Bloque de instancia al proceso de /raumarysIndex  */
$datos59 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/raumarysIndex", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmIndex');
$process59 = $router->setRuta($datos59);
/** Fin del caso de /raumarysIndex */
/** Inicio  del Bloque de instancia al proceso de /raumarysListar  */
$datos60 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysListar", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmListar');
$process60 = $router->setRuta($datos60);
/** Fin del caso de /raumarysListar */
/** Inicio  del Bloque de instancia al proceso de /raumarysCreate  */
$datos61 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysCreate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmCreate');
$process61 = $router->setRuta($datos61);
/** Fin del caso de /raumarysCreate */
/** Inicio  del Bloque de instancia al proceso de /raumarysShow  */
$datos62 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysShow", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmShow');
$process62 = $router->setRuta($datos62);
/** Fin del caso de /raumarysShow */
/** Inicio  del Bloque de instancia al proceso de /raumarysDelete  */
$datos63 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysDelete", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmDelete');
$process63 = $router->setRuta($datos63);
/** Fin del caso de /raumarysDelete */
/** Inicio  del Bloque de instancia al proceso de /raumarysUpdate  */
$datos64 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarysUpdate", 'apps'=>"Admin", 'controller'=>"testabm",'method'=>'runTestAbmUpdate');
$process64 = $router->setRuta($datos64);
/** Fin del caso de /raumarysUpdate */
 
?>