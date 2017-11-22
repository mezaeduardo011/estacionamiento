 <?php
 use JPH\Core\Router\RouterGenerator;
/**
 * @propiedad: PROPIETARIO DEL CODIGO
 * @Autor: Gregorio Bolivar * @email: elalconxvii@gmail.com
 * @Fecha de Creacion: 22/11/2017
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
/** Inicio  del Bloque de instancia al proceso de /showMenu  */
$datos1 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/showMenu", 'apps'=>"Admin", 'controller'=>"menu",'method'=>'runIndex');
$process1 = $router->setRuta($datos1);
/** Fin del caso de /showMenu */
/** Inicio  del Bloque de instancia al proceso de /refreshMenu  */
$datos2 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/refreshMenu", 'apps'=>"Admin", 'controller'=>"menu",'method'=>'runIndex');
$process2 = $router->setRuta($datos2);
/** Fin del caso de /refreshMenu */
/** Inicio  del Bloque de instancia al proceso de /login  */
$datos3 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/login", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runIndex');
$process3 = $router->setRuta($datos3);
/** Fin del caso de /login */
/** Inicio  del Bloque de instancia al proceso de /logout  */
$datos4 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/logout", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runLogout');
$process4 = $router->setRuta($datos4);
/** Fin del caso de /logout */
/** Inicio  del Bloque de instancia al proceso de /lockscreen  */
$datos5 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/lockscreen", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runLockscreen');
$process5 = $router->setRuta($datos5);
/** Fin del caso de /lockscreen */
/** Inicio  del Bloque de instancia al proceso de /loginPost  */
$datos6 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/loginPost", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runIndexPost');
$process6 = $router->setRuta($datos6);
/** Fin del caso de /loginPost */
/** Inicio  del Bloque de instancia al proceso de /gestionar  */
$datos7 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/gestionar", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGestionar');
$process7 = $router->setRuta($datos7);
/** Fin del caso de /gestionar */
/** Inicio  del Bloque de instancia al proceso de /getConfiguracionConexiones  */
$datos8 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getConfiguracionConexiones", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runConfiguracionConexiones');
$process8 = $router->setRuta($datos8);
/** Fin del caso de /getConfiguracionConexiones */
/** Inicio  del Bloque de instancia al proceso de /getAllUniverso  */
$datos9 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getAllUniverso", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runAllUniverso');
$process9 = $router->setRuta($datos9);
/** Fin del caso de /getAllUniverso */
/** Inicio  del Bloque de instancia al proceso de /getListApp  */
$datos10 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getListApp", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGetListApp');
$process10 = $router->setRuta($datos10);
/** Fin del caso de /getListApp */
/** Inicio  del Bloque de instancia al proceso de /getConfiguracionVista  */
$datos11 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getConfiguracionVista", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runConfiguracionVista');
$process11 = $router->setRuta($datos11);
/** Fin del caso de /getConfiguracionVista */
/** Inicio  del Bloque de instancia al proceso de /getVistas  */
$datos12 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getVistas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runShowVista');
$process12 = $router->setRuta($datos12);
/** Fin del caso de /getVistas */
/** Inicio  del Bloque de instancia al proceso de /getVistasColumns  */
$datos13 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getVistasColumns", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGetVistasColumns');
$process13 = $router->setRuta($datos13);
/** Fin del caso de /getVistasColumns */
/** Inicio  del Bloque de instancia al proceso de /setDataBase  */
$datos14 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setDataBase", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runSetDataBase');
$process14 = $router->setRuta($datos14);
/** Fin del caso de /setDataBase */
/** Inicio  del Bloque de instancia al proceso de /getEntidadesSeleccionadas  */
$datos15 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getEntidadesSeleccionadas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runEntidadesSeleccionadas');
$process15 = $router->setRuta($datos15);
/** Fin del caso de /getEntidadesSeleccionadas */
/** Inicio  del Bloque de instancia al proceso de /setEntidadesProcesar  */
$datos16 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setEntidadesProcesar", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runSetEntidadesProcesar');
$process16 = $router->setRuta($datos16);
/** Fin del caso de /setEntidadesProcesar */
/** Inicio  del Bloque de instancia al proceso de /sendVistaNuevaConfigurada  */
$datos17 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sendVistaNuevaConfigurada", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runVistaNuevaConfigurada');
$process17 = $router->setRuta($datos17);
/** Fin del caso de /sendVistaNuevaConfigurada */
/** Inicio  del Bloque de instancia al proceso de /procesarCrudVistas  */
$datos18 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/procesarCrudVistas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runProcesarCrudVistas');
$process18 = $router->setRuta($datos18);
/** Fin del caso de /procesarCrudVistas */
/** Inicio  del Bloque de instancia al proceso de /informarProceso  */
$datos19 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/informarProceso", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runInformarProceso');
$process19 = $router->setRuta($datos19);
/** Fin del caso de /informarProceso */
/** Inicio  del Bloque de instancia al proceso de /createTablas  */
$datos20 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/createTablas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runCreateTablas');
$process20 = $router->setRuta($datos20);
/** Fin del caso de /createTablas */
/** Inicio  del Bloque de instancia al proceso de /rolesIndex  */
$datos21 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/rolesIndex", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesIndex');
$process21 = $router->setRuta($datos21);
/** Fin del caso de /rolesIndex */
/** Inicio  del Bloque de instancia al proceso de /rolesListar  */
$datos22 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/rolesListar", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesListar');
$process22 = $router->setRuta($datos22);
/** Fin del caso de /rolesListar */
/** Inicio  del Bloque de instancia al proceso de /rolesCreate  */
$datos23 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesCreate", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesCreate');
$process23 = $router->setRuta($datos23);
/** Fin del caso de /rolesCreate */
/** Inicio  del Bloque de instancia al proceso de /rolesShow  */
$datos24 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesShow", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesShow');
$process24 = $router->setRuta($datos24);
/** Fin del caso de /rolesShow */
/** Inicio  del Bloque de instancia al proceso de /rolesDelete  */
$datos25 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesDelete", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesDelete');
$process25 = $router->setRuta($datos25);
/** Fin del caso de /rolesDelete */
/** Inicio  del Bloque de instancia al proceso de /rolesUpdate  */
$datos26 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesUpdate", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesUpdate');
$process26 = $router->setRuta($datos26);
/** Fin del caso de /rolesUpdate */
/** Inicio  del Bloque de instancia al proceso de /perfilIndex  */
$datos27 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/perfilIndex", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilIndex');
$process27 = $router->setRuta($datos27);
/** Fin del caso de /perfilIndex */
/** Inicio  del Bloque de instancia al proceso de /asignarRolesPerfil  */
$datos28 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/asignarRolesPerfil", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegRolesAsignarRolesPerfil');
$process28 = $router->setRuta($datos28);
/** Fin del caso de /asignarRolesPerfil */
/** Inicio  del Bloque de instancia al proceso de /setAsociarRolesPerfil  */
$datos29 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setAsociarRolesPerfil", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSetAsociarRolesPerfil');
$process29 = $router->setRuta($datos29);
/** Fin del caso de /setAsociarRolesPerfil */
/** Inicio  del Bloque de instancia al proceso de /perfilListar  */
$datos30 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/perfilListar", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilListar');
$process30 = $router->setRuta($datos30);
/** Fin del caso de /perfilListar */
/** Inicio  del Bloque de instancia al proceso de /perfilCreate  */
$datos31 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilCreate", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilCreate');
$process31 = $router->setRuta($datos31);
/** Fin del caso de /perfilCreate */
/** Inicio  del Bloque de instancia al proceso de /perfilShow  */
$datos32 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilShow", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilShow');
$process32 = $router->setRuta($datos32);
/** Fin del caso de /perfilShow */
/** Inicio  del Bloque de instancia al proceso de /perfilDelete  */
$datos33 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilDelete", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilDelete');
$process33 = $router->setRuta($datos33);
/** Fin del caso de /perfilDelete */
/** Inicio  del Bloque de instancia al proceso de /perfilUpdate  */
$datos34 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilUpdate", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilUpdate');
$process34 = $router->setRuta($datos34);
/** Fin del caso de /perfilUpdate */
/** Inicio  del Bloque de instancia al proceso de /usuariosIndex  */
$datos35 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosIndex", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosIndex');
$process35 = $router->setRuta($datos35);
/** Fin del caso de /usuariosIndex */
/** Inicio  del Bloque de instancia al proceso de /usuariosListar  */
$datos36 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosListar", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosListar');
$process36 = $router->setRuta($datos36);
/** Fin del caso de /usuariosListar */
/** Inicio  del Bloque de instancia al proceso de /usuariosSegLogLogin  */
$datos37 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosSegLogLogin", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegLogAutenticacion');
$process37 = $router->setRuta($datos37);
/** Fin del caso de /usuariosSegLogLogin */
/** Inicio  del Bloque de instancia al proceso de /usuariosCreate  */
$datos38 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosCreate", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosCreate');
$process38 = $router->setRuta($datos38);
/** Fin del caso de /usuariosCreate */
/** Inicio  del Bloque de instancia al proceso de /usuariosShow  */
$datos39 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosShow", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosShow');
$process39 = $router->setRuta($datos39);
/** Fin del caso de /usuariosShow */
/** Inicio  del Bloque de instancia al proceso de /usuariosDelete  */
$datos40 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosDelete", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosDelete');
$process40 = $router->setRuta($datos40);
/** Fin del caso de /usuariosDelete */
/** Inicio  del Bloque de instancia al proceso de /usuariosAuditoria  */
$datos41 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosAuditoria", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosAuditoria');
$process41 = $router->setRuta($datos41);
/** Fin del caso de /usuariosAuditoria */
/** Inicio  del Bloque de instancia al proceso de /usuariosShowAuditoria  */
$datos42 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosShowAuditoria", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosShowAuditoria');
$process42 = $router->setRuta($datos42);
/** Fin del caso de /usuariosShowAuditoria */
/** Inicio  del Bloque de instancia al proceso de /showAccionesAuditoria  */
$datos43 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/showAccionesAuditoria", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runShowAccionesAuditoria');
$process43 = $router->setRuta($datos43);
/** Fin del caso de /showAccionesAuditoria */
/** Inicio  del Bloque de instancia al proceso de /usuariosShowAcciones  */
$datos44 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosShowAcciones", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosShowAcciones');
$process44 = $router->setRuta($datos44);
/** Fin del caso de /usuariosShowAcciones */
/** Inicio  del Bloque de instancia al proceso de /usuariosUpdate  */
$datos45 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosUpdate", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosUpdate');
$process45 = $router->setRuta($datos45);
/** Fin del caso de /usuariosUpdate */
/** Inicio  del Bloque de instancia al proceso de /usuariosPerfil  */
$datos46 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosPerfil", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosPerfil');
$process46 = $router->setRuta($datos46);
/** Fin del caso de /usuariosPerfil */
/** Inicio  del Bloque de instancia al proceso de /getEntidadComun  */
$datos47 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getEntidadComun", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGetEntidadComun');
$process47 = $router->setRuta($datos47);
/** Fin del caso de /getEntidadComun */
/** Inicio  del Bloque de instancia al proceso de /locksPost  */
$datos48 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/locksPost", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runLocksPost');
$process48 = $router->setRuta($datos48);
/** Fin del caso de /locksPost */
/** Inicio  del Bloque de instancia al proceso de /estatusIndex  */
$datos49 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/estatusIndex", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusIndex');
$process49 = $router->setRuta($datos49);
/** Fin del caso de /estatusIndex */
/** Inicio  del Bloque de instancia al proceso de /estatusListar  */
$datos50 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/estatusListar", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusListar');
$process50 = $router->setRuta($datos50);
/** Fin del caso de /estatusListar */
/** Inicio  del Bloque de instancia al proceso de /estatusCreate  */
$datos51 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusCreate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusCreate');
$process51 = $router->setRuta($datos51);
/** Fin del caso de /estatusCreate */
/** Inicio  del Bloque de instancia al proceso de /estatusShow  */
$datos52 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusShow", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusShow');
$process52 = $router->setRuta($datos52);
/** Fin del caso de /estatusShow */
/** Inicio  del Bloque de instancia al proceso de /estatusDelete  */
$datos53 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusDelete", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusDelete');
$process53 = $router->setRuta($datos53);
/** Fin del caso de /estatusDelete */
/** Inicio  del Bloque de instancia al proceso de /estatusUpdate  */
$datos54 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusUpdate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusUpdate');
$process54 = $router->setRuta($datos54);
/** Fin del caso de /estatusUpdate */
/** Inicio  del Bloque de instancia al proceso de /tipoIndex  */
$datos55 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/tipoIndex", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioIndex');
$process55 = $router->setRuta($datos55);
/** Fin del caso de /tipoIndex */
/** Inicio  del Bloque de instancia al proceso de /tipoListar  */
$datos56 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/tipoListar", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioListar');
$process56 = $router->setRuta($datos56);
/** Fin del caso de /tipoListar */
/** Inicio  del Bloque de instancia al proceso de /tipoCreate  */
$datos57 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoCreate", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioCreate');
$process57 = $router->setRuta($datos57);
/** Fin del caso de /tipoCreate */
/** Inicio  del Bloque de instancia al proceso de /tipoShow  */
$datos58 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoShow", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioShow');
$process58 = $router->setRuta($datos58);
/** Fin del caso de /tipoShow */
/** Inicio  del Bloque de instancia al proceso de /tipoDelete  */
$datos59 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoDelete", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioDelete');
$process59 = $router->setRuta($datos59);
/** Fin del caso de /tipoDelete */
/** Inicio  del Bloque de instancia al proceso de /tipoUpdate  */
$datos60 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoUpdate", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioUpdate');
$process60 = $router->setRuta($datos60);
/** Fin del caso de /tipoUpdate */
/** Inicio  del Bloque de instancia al proceso de /productossIndex  */
$datos61 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/productossIndex", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosIndex');
$process61 = $router->setRuta($datos61);
/** Fin del caso de /productossIndex */
/** Inicio  del Bloque de instancia al proceso de /productossListar  */
$datos62 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/productossListar", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosListar');
$process62 = $router->setRuta($datos62);
/** Fin del caso de /productossListar */
/** Inicio  del Bloque de instancia al proceso de /productossCreate  */
$datos63 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossCreate", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosCreate');
$process63 = $router->setRuta($datos63);
/** Fin del caso de /productossCreate */
/** Inicio  del Bloque de instancia al proceso de /productossShow  */
$datos64 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossShow", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosShow');
$process64 = $router->setRuta($datos64);
/** Fin del caso de /productossShow */
/** Inicio  del Bloque de instancia al proceso de /productossDelete  */
$datos65 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossDelete", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosDelete');
$process65 = $router->setRuta($datos65);
/** Fin del caso de /productossDelete */
/** Inicio  del Bloque de instancia al proceso de /productossUpdate  */
$datos66 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossUpdate", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosUpdate');
$process66 = $router->setRuta($datos66);
/** Fin del caso de /productossUpdate */
/** Inicio  del Bloque de instancia al proceso de /unidaIndex  */
$datos67 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/unidaIndex", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusIndex');
$process67 = $router->setRuta($datos67);
/** Fin del caso de /unidaIndex */
/** Inicio  del Bloque de instancia al proceso de /unidaListar  */
$datos68 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/unidaListar", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusListar');
$process68 = $router->setRuta($datos68);
/** Fin del caso de /unidaListar */
/** Inicio  del Bloque de instancia al proceso de /unidaCreate  */
$datos69 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaCreate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusCreate');
$process69 = $router->setRuta($datos69);
/** Fin del caso de /unidaCreate */
/** Inicio  del Bloque de instancia al proceso de /unidaShow  */
$datos70 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaShow", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusShow');
$process70 = $router->setRuta($datos70);
/** Fin del caso de /unidaShow */
/** Inicio  del Bloque de instancia al proceso de /unidaDelete  */
$datos71 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaDelete", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusDelete');
$process71 = $router->setRuta($datos71);
/** Fin del caso de /unidaDelete */
/** Inicio  del Bloque de instancia al proceso de /unidaUpdate  */
$datos72 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaUpdate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusUpdate');
$process72 = $router->setRuta($datos72);
/** Fin del caso de /unidaUpdate */
/** Inicio  del Bloque de instancia al proceso de /pabloIndex  */
$datos73 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/pabloIndex", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaIndex');
$process73 = $router->setRuta($datos73);
/** Fin del caso de /pabloIndex */
/** Inicio  del Bloque de instancia al proceso de /pabloListar  */
$datos74 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/pabloListar", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaListar');
$process74 = $router->setRuta($datos74);
/** Fin del caso de /pabloListar */
/** Inicio  del Bloque de instancia al proceso de /pabloCreate  */
$datos75 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloCreate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaCreate');
$process75 = $router->setRuta($datos75);
/** Fin del caso de /pabloCreate */
/** Inicio  del Bloque de instancia al proceso de /pabloShow  */
$datos76 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloShow", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaShow');
$process76 = $router->setRuta($datos76);
/** Fin del caso de /pabloShow */
/** Inicio  del Bloque de instancia al proceso de /pabloDelete  */
$datos77 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloDelete", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaDelete');
$process77 = $router->setRuta($datos77);
/** Fin del caso de /pabloDelete */
/** Inicio  del Bloque de instancia al proceso de /pabloUpdate  */
$datos78 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloUpdate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaUpdate');
$process78 = $router->setRuta($datos78);
/** Fin del caso de /pabloUpdate */
/** Inicio  del Bloque de instancia al proceso de /ppppIndex  */
$datos79 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/ppppIndex", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaIndex');
$process79 = $router->setRuta($datos79);
/** Fin del caso de /ppppIndex */
/** Inicio  del Bloque de instancia al proceso de /ppppListar  */
$datos80 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/ppppListar", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaListar');
$process80 = $router->setRuta($datos80);
/** Fin del caso de /ppppListar */
/** Inicio  del Bloque de instancia al proceso de /ppppCreate  */
$datos81 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ppppCreate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaCreate');
$process81 = $router->setRuta($datos81);
/** Fin del caso de /ppppCreate */
/** Inicio  del Bloque de instancia al proceso de /ppppShow  */
$datos82 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ppppShow", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaShow');
$process82 = $router->setRuta($datos82);
/** Fin del caso de /ppppShow */
/** Inicio  del Bloque de instancia al proceso de /ppppDelete  */
$datos83 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ppppDelete", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaDelete');
$process83 = $router->setRuta($datos83);
/** Fin del caso de /ppppDelete */
/** Inicio  del Bloque de instancia al proceso de /ppppUpdate  */
$datos84 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ppppUpdate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaUpdate');
$process84 = $router->setRuta($datos84);
/** Fin del caso de /ppppUpdate */
/** Inicio  del Bloque de instancia al proceso de /ggggIndex  */
$datos85 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/ggggIndex", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaIndex');
$process85 = $router->setRuta($datos85);
/** Fin del caso de /ggggIndex */
/** Inicio  del Bloque de instancia al proceso de /ggggListar  */
$datos86 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/ggggListar", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaListar');
$process86 = $router->setRuta($datos86);
/** Fin del caso de /ggggListar */
/** Inicio  del Bloque de instancia al proceso de /ggggCreate  */
$datos87 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ggggCreate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaCreate');
$process87 = $router->setRuta($datos87);
/** Fin del caso de /ggggCreate */
/** Inicio  del Bloque de instancia al proceso de /ggggShow  */
$datos88 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ggggShow", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaShow');
$process88 = $router->setRuta($datos88);
/** Fin del caso de /ggggShow */
/** Inicio  del Bloque de instancia al proceso de /ggggDelete  */
$datos89 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ggggDelete", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaDelete');
$process89 = $router->setRuta($datos89);
/** Fin del caso de /ggggDelete */
/** Inicio  del Bloque de instancia al proceso de /ggggUpdate  */
$datos90 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ggggUpdate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaUpdate');
$process90 = $router->setRuta($datos90);
/** Fin del caso de /ggggUpdate */
 
?>