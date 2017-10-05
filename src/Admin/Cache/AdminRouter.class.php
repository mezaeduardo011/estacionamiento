 <?php
 use JPH\Core\Router\RouterGenerator;
/**
 * @propiedad: PROPIETARIO DEL CODIGO
 * @Autor: Gregorio Bolivar * @email: elalconxvii@gmail.com
 * @Fecha de Creacion: 05/10/2017
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
$datos5 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/gestionar", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGestionar');
$process5 = $router->setRuta($datos5);
/** Fin del caso de /gestionar */
/** Inicio  del Bloque de instancia al proceso de /getConfiguracionConexiones  */
$datos6 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getConfiguracionConexiones", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runConfiguracionConexiones');
$process6 = $router->setRuta($datos6);
/** Fin del caso de /getConfiguracionConexiones */
/** Inicio  del Bloque de instancia al proceso de /getAllUniverso  */
$datos7 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getAllUniverso", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runAllUniverso');
$process7 = $router->setRuta($datos7);
/** Fin del caso de /getAllUniverso */
/** Inicio  del Bloque de instancia al proceso de /getListApp  */
$datos8 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getListApp", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGetListApp');
$process8 = $router->setRuta($datos8);
/** Fin del caso de /getListApp */
/** Inicio  del Bloque de instancia al proceso de /getConfiguracionVista  */
$datos9 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getConfiguracionVista", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runConfiguracionVista');
$process9 = $router->setRuta($datos9);
/** Fin del caso de /getConfiguracionVista */
/** Inicio  del Bloque de instancia al proceso de /getVistas  */
$datos10 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getVistas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runShowVista');
$process10 = $router->setRuta($datos10);
/** Fin del caso de /getVistas */
/** Inicio  del Bloque de instancia al proceso de /setDataBase  */
$datos11 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setDataBase", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runSetDataBase');
$process11 = $router->setRuta($datos11);
/** Fin del caso de /setDataBase */
/** Inicio  del Bloque de instancia al proceso de /getEntidadesSeleccionadas  */
$datos12 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getEntidadesSeleccionadas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runEntidadesSeleccionadas');
$process12 = $router->setRuta($datos12);
/** Fin del caso de /getEntidadesSeleccionadas */
/** Inicio  del Bloque de instancia al proceso de /setEntidadesProcesar  */
$datos13 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setEntidadesProcesar", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runSetEntidadesProcesar');
$process13 = $router->setRuta($datos13);
/** Fin del caso de /setEntidadesProcesar */
/** Inicio  del Bloque de instancia al proceso de /sendVistaNuevaConfigurada  */
$datos14 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sendVistaNuevaConfigurada", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runVistaNuevaConfigurada');
$process14 = $router->setRuta($datos14);
/** Fin del caso de /sendVistaNuevaConfigurada */
/** Inicio  del Bloque de instancia al proceso de /procesarCrudVistas  */
$datos15 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/procesarCrudVistas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runProcesarCrudVistas');
$process15 = $router->setRuta($datos15);
/** Fin del caso de /procesarCrudVistas */
/** Inicio  del Bloque de instancia al proceso de /informarProceso  */
$datos16 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/informarProceso", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runInformarProceso');
$process16 = $router->setRuta($datos16);
/** Fin del caso de /informarProceso */
/** Inicio  del Bloque de instancia al proceso de /createTablas  */
$datos17 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/createTablas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runCreateTablas');
$process17 = $router->setRuta($datos17);
/** Fin del caso de /createTablas */
/** Inicio  del Bloque de instancia al proceso de /autos23Index  */
$datos18 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/autos23Index", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosIndex');
$process18 = $router->setRuta($datos18);
/** Fin del caso de /autos23Index */
/** Inicio  del Bloque de instancia al proceso de /autos23Listar  */
$datos19 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/autos23Listar", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosListar');
$process19 = $router->setRuta($datos19);
/** Fin del caso de /autos23Listar */
/** Inicio  del Bloque de instancia al proceso de /autos23Create  */
$datos20 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/autos23Create", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosCreate');
$process20 = $router->setRuta($datos20);
/** Fin del caso de /autos23Create */
/** Inicio  del Bloque de instancia al proceso de /autos23Show  */
$datos21 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/autos23Show", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosShow');
$process21 = $router->setRuta($datos21);
/** Fin del caso de /autos23Show */
/** Inicio  del Bloque de instancia al proceso de /autos23Delete  */
$datos22 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/autos23Delete", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosDelete');
$process22 = $router->setRuta($datos22);
/** Fin del caso de /autos23Delete */
/** Inicio  del Bloque de instancia al proceso de /autos23Update  */
$datos23 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/autos23Update", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosUpdate');
$process23 = $router->setRuta($datos23);
/** Fin del caso de /autos23Update */
/** Inicio  del Bloque de instancia al proceso de /rolesIndex  */
$datos24 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/rolesIndex", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesIndex');
$process24 = $router->setRuta($datos24);
/** Fin del caso de /rolesIndex */
/** Inicio  del Bloque de instancia al proceso de /rolesListar  */
$datos25 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesListar", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesListar');
$process25 = $router->setRuta($datos25);
/** Fin del caso de /rolesListar */
/** Inicio  del Bloque de instancia al proceso de /rolesCreate  */
$datos26 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesCreate", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesCreate');
$process26 = $router->setRuta($datos26);
/** Fin del caso de /rolesCreate */
/** Inicio  del Bloque de instancia al proceso de /rolesShow  */
$datos27 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesShow", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesShow');
$process27 = $router->setRuta($datos27);
/** Fin del caso de /rolesShow */
/** Inicio  del Bloque de instancia al proceso de /rolesDelete  */
$datos28 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesDelete", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesDelete');
$process28 = $router->setRuta($datos28);
/** Fin del caso de /rolesDelete */
/** Inicio  del Bloque de instancia al proceso de /rolesUpdate  */
$datos29 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesUpdate", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesUpdate');
$process29 = $router->setRuta($datos29);
/** Fin del caso de /rolesUpdate */
/** Inicio  del Bloque de instancia al proceso de /perfilIndex  */
$datos30 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/perfilIndex", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilIndex');
$process30 = $router->setRuta($datos30);
/** Fin del caso de /perfilIndex */
/** Inicio  del Bloque de instancia al proceso de /asignarRolesPerfil  */
$datos31 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/asignarRolesPerfil", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegRolesAsignarRolesPerfil');
$process31 = $router->setRuta($datos31);
/** Fin del caso de /asignarRolesPerfil */
/** Inicio  del Bloque de instancia al proceso de /admin/setAsociarRolesPerfil  */
$datos32 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/admin/setAsociarRolesPerfil", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSetAsociarRolesPerfil');
$process32 = $router->setRuta($datos32);
/** Fin del caso de /admin/setAsociarRolesPerfil */
/** Inicio  del Bloque de instancia al proceso de /perfilListar  */
$datos33 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilListar", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilListar');
$process33 = $router->setRuta($datos33);
/** Fin del caso de /perfilListar */
/** Inicio  del Bloque de instancia al proceso de /perfilCreate  */
$datos34 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilCreate", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilCreate');
$process34 = $router->setRuta($datos34);
/** Fin del caso de /perfilCreate */
/** Inicio  del Bloque de instancia al proceso de /perfilShow  */
$datos35 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilShow", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilShow');
$process35 = $router->setRuta($datos35);
/** Fin del caso de /perfilShow */
/** Inicio  del Bloque de instancia al proceso de /perfilDelete  */
$datos36 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilDelete", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilDelete');
$process36 = $router->setRuta($datos36);
/** Fin del caso de /perfilDelete */
/** Inicio  del Bloque de instancia al proceso de /perfilUpdate  */
$datos37 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilUpdate", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilUpdate');
$process37 = $router->setRuta($datos37);
/** Fin del caso de /perfilUpdate */
/** Inicio  del Bloque de instancia al proceso de /usuariosIndex  */
$datos38 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosIndex", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosIndex');
$process38 = $router->setRuta($datos38);
/** Fin del caso de /usuariosIndex */
/** Inicio  del Bloque de instancia al proceso de /usuariosListar  */
$datos39 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosListar", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosListar');
$process39 = $router->setRuta($datos39);
/** Fin del caso de /usuariosListar */
/** Inicio  del Bloque de instancia al proceso de /usuariosCreate  */
$datos40 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosCreate", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosCreate');
$process40 = $router->setRuta($datos40);
/** Fin del caso de /usuariosCreate */
/** Inicio  del Bloque de instancia al proceso de /usuariosShow  */
$datos41 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosShow", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosShow');
$process41 = $router->setRuta($datos41);
/** Fin del caso de /usuariosShow */
/** Inicio  del Bloque de instancia al proceso de /usuariosDelete  */
$datos42 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosDelete", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosDelete');
$process42 = $router->setRuta($datos42);
/** Fin del caso de /usuariosDelete */
/** Inicio  del Bloque de instancia al proceso de /usuariosUpdate  */
$datos43 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosUpdate", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosUpdate');
$process43 = $router->setRuta($datos43);
/** Fin del caso de /usuariosUpdate */
/** Inicio  del Bloque de instancia al proceso de /carrosIndex  */
$datos44 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/carrosIndex", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosIndex');
$process44 = $router->setRuta($datos44);
/** Fin del caso de /carrosIndex */
/** Inicio  del Bloque de instancia al proceso de /carrosListar  */
$datos45 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/carrosListar", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosListar');
$process45 = $router->setRuta($datos45);
/** Fin del caso de /carrosListar */
/** Inicio  del Bloque de instancia al proceso de /carrosCreate  */
$datos46 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/carrosCreate", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosCreate');
$process46 = $router->setRuta($datos46);
/** Fin del caso de /carrosCreate */
/** Inicio  del Bloque de instancia al proceso de /carrosShow  */
$datos47 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/carrosShow", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosShow');
$process47 = $router->setRuta($datos47);
/** Fin del caso de /carrosShow */
/** Inicio  del Bloque de instancia al proceso de /carrosDelete  */
$datos48 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/carrosDelete", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosDelete');
$process48 = $router->setRuta($datos48);
/** Fin del caso de /carrosDelete */
/** Inicio  del Bloque de instancia al proceso de /carrosUpdate  */
$datos49 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/carrosUpdate", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosUpdate');
$process49 = $router->setRuta($datos49);
/** Fin del caso de /carrosUpdate */
/** Inicio  del Bloque de instancia al proceso de /personalIndex  */
$datos50 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/personalIndex", 'apps'=>"Admin", 'controller'=>"personal",'method'=>'runPersonalIndex');
$process50 = $router->setRuta($datos50);
/** Fin del caso de /personalIndex */
/** Inicio  del Bloque de instancia al proceso de /personalListar  */
$datos51 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/personalListar", 'apps'=>"Admin", 'controller'=>"personal",'method'=>'runPersonalListar');
$process51 = $router->setRuta($datos51);
/** Fin del caso de /personalListar */
/** Inicio  del Bloque de instancia al proceso de /personalCreate  */
$datos52 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/personalCreate", 'apps'=>"Admin", 'controller'=>"personal",'method'=>'runPersonalCreate');
$process52 = $router->setRuta($datos52);
/** Fin del caso de /personalCreate */
/** Inicio  del Bloque de instancia al proceso de /personalShow  */
$datos53 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/personalShow", 'apps'=>"Admin", 'controller'=>"personal",'method'=>'runPersonalShow');
$process53 = $router->setRuta($datos53);
/** Fin del caso de /personalShow */
/** Inicio  del Bloque de instancia al proceso de /personalDelete  */
$datos54 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/personalDelete", 'apps'=>"Admin", 'controller'=>"personal",'method'=>'runPersonalDelete');
$process54 = $router->setRuta($datos54);
/** Fin del caso de /personalDelete */
/** Inicio  del Bloque de instancia al proceso de /personalUpdate  */
$datos55 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/personalUpdate", 'apps'=>"Admin", 'controller'=>"personal",'method'=>'runPersonalUpdate');
$process55 = $router->setRuta($datos55);
/** Fin del caso de /personalUpdate */
/** Inicio  del Bloque de instancia al proceso de /diego1Index  */
$datos56 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/diego1Index", 'apps'=>"Admin", 'controller'=>"diego",'method'=>'runDiegoIndex');
$process56 = $router->setRuta($datos56);
/** Fin del caso de /diego1Index */
/** Inicio  del Bloque de instancia al proceso de /diego1Listar  */
$datos57 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/diego1Listar", 'apps'=>"Admin", 'controller'=>"diego",'method'=>'runDiegoListar');
$process57 = $router->setRuta($datos57);
/** Fin del caso de /diego1Listar */
/** Inicio  del Bloque de instancia al proceso de /diego1Create  */
$datos58 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/diego1Create", 'apps'=>"Admin", 'controller'=>"diego",'method'=>'runDiegoCreate');
$process58 = $router->setRuta($datos58);
/** Fin del caso de /diego1Create */
/** Inicio  del Bloque de instancia al proceso de /diego1Show  */
$datos59 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/diego1Show", 'apps'=>"Admin", 'controller'=>"diego",'method'=>'runDiegoShow');
$process59 = $router->setRuta($datos59);
/** Fin del caso de /diego1Show */
/** Inicio  del Bloque de instancia al proceso de /diego1Delete  */
$datos60 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/diego1Delete", 'apps'=>"Admin", 'controller'=>"diego",'method'=>'runDiegoDelete');
$process60 = $router->setRuta($datos60);
/** Fin del caso de /diego1Delete */
/** Inicio  del Bloque de instancia al proceso de /diego1Update  */
$datos61 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/diego1Update", 'apps'=>"Admin", 'controller'=>"diego",'method'=>'runDiegoUpdate');
$process61 = $router->setRuta($datos61);
/** Fin del caso de /diego1Update */
/** Inicio  del Bloque de instancia al proceso de /raumarys20Index  */
$datos62 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/raumarys20Index", 'apps'=>"Admin", 'controller'=>"raumarys",'method'=>'runRaumarysIndex');
$process62 = $router->setRuta($datos62);
/** Fin del caso de /raumarys20Index */
/** Inicio  del Bloque de instancia al proceso de /raumarys20Listar  */
$datos63 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarys20Listar", 'apps'=>"Admin", 'controller'=>"raumarys",'method'=>'runRaumarysListar');
$process63 = $router->setRuta($datos63);
/** Fin del caso de /raumarys20Listar */
/** Inicio  del Bloque de instancia al proceso de /raumarys20Create  */
$datos64 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarys20Create", 'apps'=>"Admin", 'controller'=>"raumarys",'method'=>'runRaumarysCreate');
$process64 = $router->setRuta($datos64);
/** Fin del caso de /raumarys20Create */
/** Inicio  del Bloque de instancia al proceso de /raumarys20Show  */
$datos65 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarys20Show", 'apps'=>"Admin", 'controller'=>"raumarys",'method'=>'runRaumarysShow');
$process65 = $router->setRuta($datos65);
/** Fin del caso de /raumarys20Show */
/** Inicio  del Bloque de instancia al proceso de /raumarys20Delete  */
$datos66 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarys20Delete", 'apps'=>"Admin", 'controller'=>"raumarys",'method'=>'runRaumarysDelete');
$process66 = $router->setRuta($datos66);
/** Fin del caso de /raumarys20Delete */
/** Inicio  del Bloque de instancia al proceso de /raumarys20Update  */
$datos67 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/raumarys20Update", 'apps'=>"Admin", 'controller'=>"raumarys",'method'=>'runRaumarysUpdate');
$process67 = $router->setRuta($datos67);
/** Fin del caso de /raumarys20Update */
 
?>