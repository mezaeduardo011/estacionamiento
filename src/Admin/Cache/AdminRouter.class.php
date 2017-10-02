 <?php
 use JPH\Core\Router\RouterGenerator;
/**
 * @propiedad: PROPIETARIO DEL CODIGO
 * @Autor: Gregorio Bolivar * @email: elalconxvii@gmail.com
 * @Fecha de Creacion: 02/10/2017
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
/** Inicio  del Bloque de instancia al proceso de /setDataBase  */
$datos10 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setDataBase", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runSetDataBase');
$process10 = $router->setRuta($datos10);
/** Fin del caso de /setDataBase */
/** Inicio  del Bloque de instancia al proceso de /getEntidadesSeleccionadas  */
$datos11 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getEntidadesSeleccionadas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runEntidadesSeleccionadas');
$process11 = $router->setRuta($datos11);
/** Fin del caso de /getEntidadesSeleccionadas */
/** Inicio  del Bloque de instancia al proceso de /setEntidadesProcesar  */
$datos12 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setEntidadesProcesar", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runSetEntidadesProcesar');
$process12 = $router->setRuta($datos12);
/** Fin del caso de /setEntidadesProcesar */
/** Inicio  del Bloque de instancia al proceso de /sendVistaNuevaConfigurada  */
$datos13 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sendVistaNuevaConfigurada", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runVistaNuevaConfigurada');
$process13 = $router->setRuta($datos13);
/** Fin del caso de /sendVistaNuevaConfigurada */
/** Inicio  del Bloque de instancia al proceso de /procesarCrudVistas  */
$datos14 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/procesarCrudVistas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runProcesarCrudVistas');
$process14 = $router->setRuta($datos14);
/** Fin del caso de /procesarCrudVistas */
/** Inicio  del Bloque de instancia al proceso de /informarProceso  */
$datos15 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/informarProceso", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runInformarProceso');
$process15 = $router->setRuta($datos15);
/** Fin del caso de /informarProceso */
/** Inicio  del Bloque de instancia al proceso de /createTablas  */
$datos16 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/createTablas", 'apps'=>"Admin", 'controller'=>"home",'method'=>'runCreateTablas');
$process16 = $router->setRuta($datos16);
/** Fin del caso de /createTablas */
/** Inicio  del Bloque de instancia al proceso de /autos23Index  */
$datos17 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/autos23Index", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosIndex');
$process17 = $router->setRuta($datos17);
/** Fin del caso de /autos23Index */
/** Inicio  del Bloque de instancia al proceso de /autos23Listar  */
$datos18 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/autos23Listar", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosListar');
$process18 = $router->setRuta($datos18);
/** Fin del caso de /autos23Listar */
/** Inicio  del Bloque de instancia al proceso de /autos23Create  */
$datos19 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/autos23Create", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosCreate');
$process19 = $router->setRuta($datos19);
/** Fin del caso de /autos23Create */
/** Inicio  del Bloque de instancia al proceso de /autos23Show  */
$datos20 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/autos23Show", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosShow');
$process20 = $router->setRuta($datos20);
/** Fin del caso de /autos23Show */
/** Inicio  del Bloque de instancia al proceso de /autos23Delete  */
$datos21 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/autos23Delete", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosDelete');
$process21 = $router->setRuta($datos21);
/** Fin del caso de /autos23Delete */
/** Inicio  del Bloque de instancia al proceso de /autos23Update  */
$datos22 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/autos23Update", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosUpdate');
$process22 = $router->setRuta($datos22);
/** Fin del caso de /autos23Update */
/** Inicio  del Bloque de instancia al proceso de /rolesIndex  */
$datos23 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/rolesIndex", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesIndex');
$process23 = $router->setRuta($datos23);
/** Fin del caso de /rolesIndex */
/** Inicio  del Bloque de instancia al proceso de /rolesListar  */
$datos24 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesListar", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesListar');
$process24 = $router->setRuta($datos24);
/** Fin del caso de /rolesListar */
/** Inicio  del Bloque de instancia al proceso de /rolesCreate  */
$datos25 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesCreate", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesCreate');
$process25 = $router->setRuta($datos25);
/** Fin del caso de /rolesCreate */
/** Inicio  del Bloque de instancia al proceso de /rolesShow  */
$datos26 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesShow", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesShow');
$process26 = $router->setRuta($datos26);
/** Fin del caso de /rolesShow */
/** Inicio  del Bloque de instancia al proceso de /rolesDelete  */
$datos27 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesDelete", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesDelete');
$process27 = $router->setRuta($datos27);
/** Fin del caso de /rolesDelete */
/** Inicio  del Bloque de instancia al proceso de /rolesUpdate  */
$datos28 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesUpdate", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesUpdate');
$process28 = $router->setRuta($datos28);
/** Fin del caso de /rolesUpdate */
/** Inicio  del Bloque de instancia al proceso de /perfilIndex  */
$datos29 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/perfilIndex", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilIndex');
$process29 = $router->setRuta($datos29);
/** Fin del caso de /perfilIndex */
/** Inicio  del Bloque de instancia al proceso de /asignarRolesPerfil  */
$datos30 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/asignarRolesPerfil", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegRolesAsignarRolesPerfil');
$process30 = $router->setRuta($datos30);
/** Fin del caso de /asignarRolesPerfil */
/** Inicio  del Bloque de instancia al proceso de /admin/setAsociarRolesPerfil  */
$datos31 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/admin/setAsociarRolesPerfil", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSetAsociarRolesPerfil');
$process31 = $router->setRuta($datos31);
/** Fin del caso de /admin/setAsociarRolesPerfil */
/** Inicio  del Bloque de instancia al proceso de /perfilListar  */
$datos32 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilListar", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilListar');
$process32 = $router->setRuta($datos32);
/** Fin del caso de /perfilListar */
/** Inicio  del Bloque de instancia al proceso de /perfilCreate  */
$datos33 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilCreate", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilCreate');
$process33 = $router->setRuta($datos33);
/** Fin del caso de /perfilCreate */
/** Inicio  del Bloque de instancia al proceso de /perfilShow  */
$datos34 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilShow", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilShow');
$process34 = $router->setRuta($datos34);
/** Fin del caso de /perfilShow */
/** Inicio  del Bloque de instancia al proceso de /perfilDelete  */
$datos35 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilDelete", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilDelete');
$process35 = $router->setRuta($datos35);
/** Fin del caso de /perfilDelete */
/** Inicio  del Bloque de instancia al proceso de /perfilUpdate  */
$datos36 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilUpdate", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilUpdate');
$process36 = $router->setRuta($datos36);
/** Fin del caso de /perfilUpdate */
/** Inicio  del Bloque de instancia al proceso de /usuariosIndex  */
$datos37 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosIndex", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosIndex');
$process37 = $router->setRuta($datos37);
/** Fin del caso de /usuariosIndex */
/** Inicio  del Bloque de instancia al proceso de /usuariosListar  */
$datos38 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosListar", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosListar');
$process38 = $router->setRuta($datos38);
/** Fin del caso de /usuariosListar */
/** Inicio  del Bloque de instancia al proceso de /usuariosCreate  */
$datos39 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosCreate", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosCreate');
$process39 = $router->setRuta($datos39);
/** Fin del caso de /usuariosCreate */
/** Inicio  del Bloque de instancia al proceso de /usuariosShow  */
$datos40 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosShow", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosShow');
$process40 = $router->setRuta($datos40);
/** Fin del caso de /usuariosShow */
/** Inicio  del Bloque de instancia al proceso de /usuariosDelete  */
$datos41 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosDelete", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosDelete');
$process41 = $router->setRuta($datos41);
/** Fin del caso de /usuariosDelete */
/** Inicio  del Bloque de instancia al proceso de /usuariosUpdate  */
$datos42 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosUpdate", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosUpdate');
$process42 = $router->setRuta($datos42);
/** Fin del caso de /usuariosUpdate */
/** Inicio  del Bloque de instancia al proceso de /carrosIndex  */
$datos43 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/carrosIndex", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosIndex');
$process43 = $router->setRuta($datos43);
/** Fin del caso de /carrosIndex */
/** Inicio  del Bloque de instancia al proceso de /carrosListar  */
$datos44 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/carrosListar", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosListar');
$process44 = $router->setRuta($datos44);
/** Fin del caso de /carrosListar */
/** Inicio  del Bloque de instancia al proceso de /carrosCreate  */
$datos45 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/carrosCreate", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosCreate');
$process45 = $router->setRuta($datos45);
/** Fin del caso de /carrosCreate */
/** Inicio  del Bloque de instancia al proceso de /carrosShow  */
$datos46 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/carrosShow", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosShow');
$process46 = $router->setRuta($datos46);
/** Fin del caso de /carrosShow */
/** Inicio  del Bloque de instancia al proceso de /carrosDelete  */
$datos47 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/carrosDelete", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosDelete');
$process47 = $router->setRuta($datos47);
/** Fin del caso de /carrosDelete */
/** Inicio  del Bloque de instancia al proceso de /carrosUpdate  */
$datos48 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/carrosUpdate", 'apps'=>"Admin", 'controller'=>"testAutos",'method'=>'runTestAutosUpdate');
$process48 = $router->setRuta($datos48);
/** Fin del caso de /carrosUpdate */
 
?>