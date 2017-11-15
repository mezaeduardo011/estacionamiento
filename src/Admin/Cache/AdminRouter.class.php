 <?php
 use JPH\Core\Router\RouterGenerator;
/**
 * @propiedad: PROPIETARIO DEL CODIGO
 * @Autor: Gregorio Bolivar * @email: elalconxvii@gmail.com
 * @Fecha de Creacion: 15/11/2017
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
/** Inicio  del Bloque de instancia al proceso de /getVistasColumns  */
$datos11 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getVistasColumns", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGetVistasColumns');
$process11 = $router->setRuta($datos11);
/** Fin del caso de /getVistasColumns */
/** Inicio  del Bloque de instancia al proceso de /setDataBase  */
$datos12 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setDataBase", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runSetDataBase');
$process12 = $router->setRuta($datos12);
/** Fin del caso de /setDataBase */
/** Inicio  del Bloque de instancia al proceso de /getEntidadesSeleccionadas  */
$datos13 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getEntidadesSeleccionadas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runEntidadesSeleccionadas');
$process13 = $router->setRuta($datos13);
/** Fin del caso de /getEntidadesSeleccionadas */
/** Inicio  del Bloque de instancia al proceso de /setEntidadesProcesar  */
$datos14 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setEntidadesProcesar", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runSetEntidadesProcesar');
$process14 = $router->setRuta($datos14);
/** Fin del caso de /setEntidadesProcesar */
/** Inicio  del Bloque de instancia al proceso de /sendVistaNuevaConfigurada  */
$datos15 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sendVistaNuevaConfigurada", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runVistaNuevaConfigurada');
$process15 = $router->setRuta($datos15);
/** Fin del caso de /sendVistaNuevaConfigurada */
/** Inicio  del Bloque de instancia al proceso de /procesarCrudVistas  */
$datos16 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/procesarCrudVistas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runProcesarCrudVistas');
$process16 = $router->setRuta($datos16);
/** Fin del caso de /procesarCrudVistas */
/** Inicio  del Bloque de instancia al proceso de /informarProceso  */
$datos17 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/informarProceso", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runInformarProceso');
$process17 = $router->setRuta($datos17);
/** Fin del caso de /informarProceso */
/** Inicio  del Bloque de instancia al proceso de /createTablas  */
$datos18 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/createTablas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runCreateTablas');
$process18 = $router->setRuta($datos18);
/** Fin del caso de /createTablas */
/** Inicio  del Bloque de instancia al proceso de /rolesIndex  */
$datos19 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/rolesIndex", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesIndex');
$process19 = $router->setRuta($datos19);
/** Fin del caso de /rolesIndex */
/** Inicio  del Bloque de instancia al proceso de /rolesListar  */
$datos20 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/rolesListar", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesListar');
$process20 = $router->setRuta($datos20);
/** Fin del caso de /rolesListar */
/** Inicio  del Bloque de instancia al proceso de /rolesCreate  */
$datos21 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesCreate", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesCreate');
$process21 = $router->setRuta($datos21);
/** Fin del caso de /rolesCreate */
/** Inicio  del Bloque de instancia al proceso de /rolesShow  */
$datos22 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesShow", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesShow');
$process22 = $router->setRuta($datos22);
/** Fin del caso de /rolesShow */
/** Inicio  del Bloque de instancia al proceso de /rolesDelete  */
$datos23 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesDelete", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesDelete');
$process23 = $router->setRuta($datos23);
/** Fin del caso de /rolesDelete */
/** Inicio  del Bloque de instancia al proceso de /rolesUpdate  */
$datos24 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesUpdate", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesUpdate');
$process24 = $router->setRuta($datos24);
/** Fin del caso de /rolesUpdate */
/** Inicio  del Bloque de instancia al proceso de /perfilIndex  */
$datos25 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/perfilIndex", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilIndex');
$process25 = $router->setRuta($datos25);
/** Fin del caso de /perfilIndex */
/** Inicio  del Bloque de instancia al proceso de /asignarRolesPerfil  */
$datos26 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/asignarRolesPerfil", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegRolesAsignarRolesPerfil');
$process26 = $router->setRuta($datos26);
/** Fin del caso de /asignarRolesPerfil */
/** Inicio  del Bloque de instancia al proceso de /setAsociarRolesPerfil  */
$datos27 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setAsociarRolesPerfil", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSetAsociarRolesPerfil');
$process27 = $router->setRuta($datos27);
/** Fin del caso de /setAsociarRolesPerfil */
/** Inicio  del Bloque de instancia al proceso de /perfilListar  */
$datos28 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/perfilListar", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilListar');
$process28 = $router->setRuta($datos28);
/** Fin del caso de /perfilListar */
/** Inicio  del Bloque de instancia al proceso de /perfilCreate  */
$datos29 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilCreate", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilCreate');
$process29 = $router->setRuta($datos29);
/** Fin del caso de /perfilCreate */
/** Inicio  del Bloque de instancia al proceso de /perfilShow  */
$datos30 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilShow", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilShow');
$process30 = $router->setRuta($datos30);
/** Fin del caso de /perfilShow */
/** Inicio  del Bloque de instancia al proceso de /perfilDelete  */
$datos31 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilDelete", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilDelete');
$process31 = $router->setRuta($datos31);
/** Fin del caso de /perfilDelete */
/** Inicio  del Bloque de instancia al proceso de /perfilUpdate  */
$datos32 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilUpdate", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilUpdate');
$process32 = $router->setRuta($datos32);
/** Fin del caso de /perfilUpdate */
/** Inicio  del Bloque de instancia al proceso de /usuariosIndex  */
$datos33 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosIndex", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosIndex');
$process33 = $router->setRuta($datos33);
/** Fin del caso de /usuariosIndex */
/** Inicio  del Bloque de instancia al proceso de /usuariosListar  */
$datos34 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosListar", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosListar');
$process34 = $router->setRuta($datos34);
/** Fin del caso de /usuariosListar */
/** Inicio  del Bloque de instancia al proceso de /usuariosSegLogLogin  */
$datos35 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosSegLogLogin", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegLogAutenticacion');
$process35 = $router->setRuta($datos35);
/** Fin del caso de /usuariosSegLogLogin */
/** Inicio  del Bloque de instancia al proceso de /usuariosCreate  */
$datos36 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosCreate", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosCreate');
$process36 = $router->setRuta($datos36);
/** Fin del caso de /usuariosCreate */
/** Inicio  del Bloque de instancia al proceso de /usuariosShow  */
$datos37 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosShow", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosShow');
$process37 = $router->setRuta($datos37);
/** Fin del caso de /usuariosShow */
/** Inicio  del Bloque de instancia al proceso de /usuariosDelete  */
$datos38 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosDelete", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosDelete');
$process38 = $router->setRuta($datos38);
/** Fin del caso de /usuariosDelete */
/** Inicio  del Bloque de instancia al proceso de /usuariosAuditoria  */
$datos39 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosAuditoria", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosAuditoria');
$process39 = $router->setRuta($datos39);
/** Fin del caso de /usuariosAuditoria */
/** Inicio  del Bloque de instancia al proceso de /usuariosShowAuditoria  */
$datos40 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosShowAuditoria", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosShowAuditoria');
$process40 = $router->setRuta($datos40);
/** Fin del caso de /usuariosShowAuditoria */
/** Inicio  del Bloque de instancia al proceso de /showAccionesAuditoria  */
$datos41 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/showAccionesAuditoria", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runShowAccionesAuditoria');
$process41 = $router->setRuta($datos41);
/** Fin del caso de /showAccionesAuditoria */
/** Inicio  del Bloque de instancia al proceso de /usuariosShowAcciones  */
$datos42 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosShowAcciones", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosShowAcciones');
$process42 = $router->setRuta($datos42);
/** Fin del caso de /usuariosShowAcciones */
/** Inicio  del Bloque de instancia al proceso de /usuariosUpdate  */
$datos43 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosUpdate", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosUpdate');
$process43 = $router->setRuta($datos43);
/** Fin del caso de /usuariosUpdate */
/** Inicio  del Bloque de instancia al proceso de /usuariosPerfil  */
$datos44 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosPerfil", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosPerfil');
$process44 = $router->setRuta($datos44);
/** Fin del caso de /usuariosPerfil */
/** Inicio  del Bloque de instancia al proceso de /getEntidadComun  */
$datos45 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getEntidadComun", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGetEntidadComun');
$process45 = $router->setRuta($datos45);
/** Fin del caso de /getEntidadComun */
/** Inicio  del Bloque de instancia al proceso de /locksPost  */
$datos46 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/locksPost", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runLocksPost');
$process46 = $router->setRuta($datos46);
/** Fin del caso de /locksPost */
/** Inicio  del Bloque de instancia al proceso de /estatusIndex  */
$datos47 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/estatusIndex", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusIndex');
$process47 = $router->setRuta($datos47);
/** Fin del caso de /estatusIndex */
/** Inicio  del Bloque de instancia al proceso de /estatusListar  */
$datos48 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/estatusListar", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusListar');
$process48 = $router->setRuta($datos48);
/** Fin del caso de /estatusListar */
/** Inicio  del Bloque de instancia al proceso de /estatusCreate  */
$datos49 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusCreate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusCreate');
$process49 = $router->setRuta($datos49);
/** Fin del caso de /estatusCreate */
/** Inicio  del Bloque de instancia al proceso de /estatusShow  */
$datos50 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusShow", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusShow');
$process50 = $router->setRuta($datos50);
/** Fin del caso de /estatusShow */
/** Inicio  del Bloque de instancia al proceso de /estatusDelete  */
$datos51 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusDelete", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusDelete');
$process51 = $router->setRuta($datos51);
/** Fin del caso de /estatusDelete */
/** Inicio  del Bloque de instancia al proceso de /estatusUpdate  */
$datos52 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusUpdate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusUpdate');
$process52 = $router->setRuta($datos52);
/** Fin del caso de /estatusUpdate */
/** Inicio  del Bloque de instancia al proceso de /tipoIndex  */
$datos53 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/tipoIndex", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioIndex');
$process53 = $router->setRuta($datos53);
/** Fin del caso de /tipoIndex */
/** Inicio  del Bloque de instancia al proceso de /tipoListar  */
$datos54 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/tipoListar", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioListar');
$process54 = $router->setRuta($datos54);
/** Fin del caso de /tipoListar */
/** Inicio  del Bloque de instancia al proceso de /tipoCreate  */
$datos55 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoCreate", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioCreate');
$process55 = $router->setRuta($datos55);
/** Fin del caso de /tipoCreate */
/** Inicio  del Bloque de instancia al proceso de /tipoShow  */
$datos56 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoShow", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioShow');
$process56 = $router->setRuta($datos56);
/** Fin del caso de /tipoShow */
/** Inicio  del Bloque de instancia al proceso de /tipoDelete  */
$datos57 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoDelete", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioDelete');
$process57 = $router->setRuta($datos57);
/** Fin del caso de /tipoDelete */
/** Inicio  del Bloque de instancia al proceso de /tipoUpdate  */
$datos58 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoUpdate", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioUpdate');
$process58 = $router->setRuta($datos58);
/** Fin del caso de /tipoUpdate */
/** Inicio  del Bloque de instancia al proceso de /productossIndex  */
$datos59 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/productossIndex", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosIndex');
$process59 = $router->setRuta($datos59);
/** Fin del caso de /productossIndex */
/** Inicio  del Bloque de instancia al proceso de /productossListar  */
$datos60 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/productossListar", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosListar');
$process60 = $router->setRuta($datos60);
/** Fin del caso de /productossListar */
/** Inicio  del Bloque de instancia al proceso de /productossCreate  */
$datos61 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossCreate", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosCreate');
$process61 = $router->setRuta($datos61);
/** Fin del caso de /productossCreate */
/** Inicio  del Bloque de instancia al proceso de /productossShow  */
$datos62 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossShow", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosShow');
$process62 = $router->setRuta($datos62);
/** Fin del caso de /productossShow */
/** Inicio  del Bloque de instancia al proceso de /productossDelete  */
$datos63 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossDelete", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosDelete');
$process63 = $router->setRuta($datos63);
/** Fin del caso de /productossDelete */
/** Inicio  del Bloque de instancia al proceso de /productossUpdate  */
$datos64 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossUpdate", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosUpdate');
$process64 = $router->setRuta($datos64);
/** Fin del caso de /productossUpdate */
/** Inicio  del Bloque de instancia al proceso de /unidaIndex  */
$datos65 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/unidaIndex", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusIndex');
$process65 = $router->setRuta($datos65);
/** Fin del caso de /unidaIndex */
/** Inicio  del Bloque de instancia al proceso de /unidaListar  */
$datos66 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/unidaListar", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusListar');
$process66 = $router->setRuta($datos66);
/** Fin del caso de /unidaListar */
/** Inicio  del Bloque de instancia al proceso de /unidaCreate  */
$datos67 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaCreate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusCreate');
$process67 = $router->setRuta($datos67);
/** Fin del caso de /unidaCreate */
/** Inicio  del Bloque de instancia al proceso de /unidaShow  */
$datos68 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaShow", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusShow');
$process68 = $router->setRuta($datos68);
/** Fin del caso de /unidaShow */
/** Inicio  del Bloque de instancia al proceso de /unidaDelete  */
$datos69 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaDelete", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusDelete');
$process69 = $router->setRuta($datos69);
/** Fin del caso de /unidaDelete */
/** Inicio  del Bloque de instancia al proceso de /unidaUpdate  */
$datos70 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaUpdate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusUpdate');
$process70 = $router->setRuta($datos70);
/** Fin del caso de /unidaUpdate */
/** Inicio  del Bloque de instancia al proceso de /pabloIndex  */
$datos71 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/pabloIndex", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaIndex');
$process71 = $router->setRuta($datos71);
/** Fin del caso de /pabloIndex */
/** Inicio  del Bloque de instancia al proceso de /pabloListar  */
$datos72 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/pabloListar", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaListar');
$process72 = $router->setRuta($datos72);
/** Fin del caso de /pabloListar */
/** Inicio  del Bloque de instancia al proceso de /pabloCreate  */
$datos73 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloCreate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaCreate');
$process73 = $router->setRuta($datos73);
/** Fin del caso de /pabloCreate */
/** Inicio  del Bloque de instancia al proceso de /pabloShow  */
$datos74 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloShow", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaShow');
$process74 = $router->setRuta($datos74);
/** Fin del caso de /pabloShow */
/** Inicio  del Bloque de instancia al proceso de /pabloDelete  */
$datos75 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloDelete", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaDelete');
$process75 = $router->setRuta($datos75);
/** Fin del caso de /pabloDelete */
/** Inicio  del Bloque de instancia al proceso de /pabloUpdate  */
$datos76 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloUpdate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaUpdate');
$process76 = $router->setRuta($datos76);
/** Fin del caso de /pabloUpdate */
 
?>