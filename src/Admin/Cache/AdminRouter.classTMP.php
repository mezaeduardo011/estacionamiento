 <?php
 use JPH\Core\Router\RouterGenerator;
/**
 * @propiedad: PROPIETARIO DEL CODIGO
 * @Autor: Gregorio Bolivar * @email: elalconxvii@gmail.com
 * @Fecha de Creacion: 18/01/2018
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
/** Inicio  del Bloque de instancia al proceso de /refreshMenu  */
$datos1 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/refreshMenu", 'apps'=>"Admin", 'controller'=>"menu",'method'=>'runRefreshMenu');
$process1 = $router->setRuta($datos1);
/** Fin del caso de /refreshMenu */
/** Inicio  del Bloque de instancia al proceso de /setProcesarPrincipalMenu  */
$datos2 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setProcesarPrincipalMenu", 'apps'=>"Admin", 'controller'=>"menu",'method'=>'runSetProcesarPrincipalMenu');
$process2 = $router->setRuta($datos2);
/** Fin del caso de /setProcesarPrincipalMenu */
/** Inicio  del Bloque de instancia al proceso de /sendProcesarPrincipalMenu  */
$datos3 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sendProcesarPrincipalMenu", 'apps'=>"Admin", 'controller'=>"menu",'method'=>'runSendProcesarPrincipalMenu');
$process3 = $router->setRuta($datos3);
/** Fin del caso de /sendProcesarPrincipalMenu */
/** Inicio  del Bloque de instancia al proceso de /sendProcesarSubMenu  */
$datos4 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sendProcesarSubMenu", 'apps'=>"Admin", 'controller'=>"menu",'method'=>'runSetProcesarSubMenu');
$process4 = $router->setRuta($datos4);
/** Fin del caso de /sendProcesarSubMenu */
/** Inicio  del Bloque de instancia al proceso de /sendGestionMenu  */
$datos5 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sendGestionMenu", 'apps'=>"Admin", 'controller'=>"menu",'method'=>'runSetGestionMenu');
$process5 = $router->setRuta($datos5);
/** Fin del caso de /sendGestionMenu */
/** Inicio  del Bloque de instancia al proceso de /mascarasListar  */
$datos6 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/mascarasListar", 'apps'=>"Admin", 'controller'=>"mascara",'method'=>'runMascaraListar');
$process6 = $router->setRuta($datos6);
/** Fin del caso de /mascarasListar */
/** Inicio  del Bloque de instancia al proceso de /mascaraCreate  */
$datos7 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/mascaraCreate", 'apps'=>"Admin", 'controller'=>"mascara",'method'=>'runMascaraCreate');
$process7 = $router->setRuta($datos7);
/** Fin del caso de /mascaraCreate */
/** Inicio  del Bloque de instancia al proceso de /mascaraShow  */
$datos8 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/mascaraShow", 'apps'=>"Admin", 'controller'=>"mascara",'method'=>'runMascaraShow');
$process8 = $router->setRuta($datos8);
/** Fin del caso de /mascaraShow */
/** Inicio  del Bloque de instancia al proceso de /tipoDatosListar  */
$datos9 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoDatosListar", 'apps'=>"Admin", 'controller'=>"tipoDatos",'method'=>'runTipoDatosListar');
$process9 = $router->setRuta($datos9);
/** Fin del caso de /tipoDatosListar */
/** Inicio  del Bloque de instancia al proceso de /login  */
$datos10 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/login", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runIndex');
$process10 = $router->setRuta($datos10);
/** Fin del caso de /login */
/** Inicio  del Bloque de instancia al proceso de /logout  */
$datos11 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/logout", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runLogout');
$process11 = $router->setRuta($datos11);
/** Fin del caso de /logout */
/** Inicio  del Bloque de instancia al proceso de /lockscreen  */
$datos12 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/lockscreen", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runLockscreen');
$process12 = $router->setRuta($datos12);
/** Fin del caso de /lockscreen */
/** Inicio  del Bloque de instancia al proceso de /loginPost  */
$datos13 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/loginPost", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runIndexPost');
$process13 = $router->setRuta($datos13);
/** Fin del caso de /loginPost */
/** Inicio  del Bloque de instancia al proceso de /recuperarClave  */
$datos14 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/recuperarClave", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runRecuperarClave');
$process14 = $router->setRuta($datos14);
/** Fin del caso de /recuperarClave */
/** Inicio  del Bloque de instancia al proceso de /recuperarPost  */
$datos15 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/recuperarPost", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runRecuperarClavePost');
$process15 = $router->setRuta($datos15);
/** Fin del caso de /recuperarPost */
/** Inicio  del Bloque de instancia al proceso de /recuperarPostNew  */
$datos16 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/recuperarPostNew", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runRecuperarClavePostNew');
$process16 = $router->setRuta($datos16);
/** Fin del caso de /recuperarPostNew */
/** Inicio  del Bloque de instancia al proceso de /recuperarClaveToken  */
$datos17 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/recuperarClaveToken", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runRecuperarRecibirToken');
$process17 = $router->setRuta($datos17);
/** Fin del caso de /recuperarClaveToken */
/** Inicio  del Bloque de instancia al proceso de /gestionar  */
$datos18 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/gestionar", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGestionar');
$process18 = $router->setRuta($datos18);
/** Fin del caso de /gestionar */
/** Inicio  del Bloque de instancia al proceso de /getConfiguracionConexiones  */
$datos19 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getConfiguracionConexiones", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runConfiguracionConexiones');
$process19 = $router->setRuta($datos19);
/** Fin del caso de /getConfiguracionConexiones */
/** Inicio  del Bloque de instancia al proceso de /getAllUniverso  */
$datos20 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getAllUniverso", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runAllUniverso');
$process20 = $router->setRuta($datos20);
/** Fin del caso de /getAllUniverso */
/** Inicio  del Bloque de instancia al proceso de /getListApp  */
$datos21 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/getListApp", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGetListApp');
$process21 = $router->setRuta($datos21);
/** Fin del caso de /getListApp */
/** Inicio  del Bloque de instancia al proceso de /getConfiguracionVista  */
$datos22 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getConfiguracionVista", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runConfiguracionVista');
$process22 = $router->setRuta($datos22);
/** Fin del caso de /getConfiguracionVista */
/** Inicio  del Bloque de instancia al proceso de /getVistas  */
$datos23 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getVistas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runShowVista');
$process23 = $router->setRuta($datos23);
/** Fin del caso de /getVistas */
/** Inicio  del Bloque de instancia al proceso de /getVistasColumns  */
$datos24 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getVistasColumns", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGetVistasColumns');
$process24 = $router->setRuta($datos24);
/** Fin del caso de /getVistasColumns */
/** Inicio  del Bloque de instancia al proceso de /setDataBase  */
$datos25 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setDataBase", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runSetDataBase');
$process25 = $router->setRuta($datos25);
/** Fin del caso de /setDataBase */
/** Inicio  del Bloque de instancia al proceso de /getEntidadesSeleccionadas  */
$datos26 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getEntidadesSeleccionadas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runEntidadesSeleccionadas');
$process26 = $router->setRuta($datos26);
/** Fin del caso de /getEntidadesSeleccionadas */
/** Inicio  del Bloque de instancia al proceso de /setEntidadesProcesar  */
$datos27 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setEntidadesProcesar", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runSetEntidadesProcesar');
$process27 = $router->setRuta($datos27);
/** Fin del caso de /setEntidadesProcesar */
/** Inicio  del Bloque de instancia al proceso de /sendVistaNuevaConfigurada  */
$datos28 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sendVistaNuevaConfigurada", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runVistaNuevaConfigurada');
$process28 = $router->setRuta($datos28);
/** Fin del caso de /sendVistaNuevaConfigurada */
/** Inicio  del Bloque de instancia al proceso de /procesarCrudVistas  */
$datos29 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/procesarCrudVistas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runProcesarCrudVistas');
$process29 = $router->setRuta($datos29);
/** Fin del caso de /procesarCrudVistas */
/** Inicio  del Bloque de instancia al proceso de /informarProceso  */
$datos30 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/informarProceso", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runInformarProceso');
$process30 = $router->setRuta($datos30);
/** Fin del caso de /informarProceso */
/** Inicio  del Bloque de instancia al proceso de /createTablas  */
$datos31 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/createTablas", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runCreateTablas');
$process31 = $router->setRuta($datos31);
/** Fin del caso de /createTablas */
/** Inicio  del Bloque de instancia al proceso de /rolesIndex  */
$datos32 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/rolesIndex", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesIndex');
$process32 = $router->setRuta($datos32);
/** Fin del caso de /rolesIndex */
/** Inicio  del Bloque de instancia al proceso de /rolesListar  */
$datos33 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/rolesListar", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesListar');
$process33 = $router->setRuta($datos33);
/** Fin del caso de /rolesListar */
/** Inicio  del Bloque de instancia al proceso de /rolesCreate  */
$datos34 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesCreate", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesCreate');
$process34 = $router->setRuta($datos34);
/** Fin del caso de /rolesCreate */
/** Inicio  del Bloque de instancia al proceso de /rolesShow  */
$datos35 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesShow", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesShow');
$process35 = $router->setRuta($datos35);
/** Fin del caso de /rolesShow */
/** Inicio  del Bloque de instancia al proceso de /rolesDelete  */
$datos36 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesDelete", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesDelete');
$process36 = $router->setRuta($datos36);
/** Fin del caso de /rolesDelete */
/** Inicio  del Bloque de instancia al proceso de /rolesUpdate  */
$datos37 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/rolesUpdate", 'apps'=>"Admin", 'controller'=>"segRoles",'method'=>'runSegRolesUpdate');
$process37 = $router->setRuta($datos37);
/** Fin del caso de /rolesUpdate */
/** Inicio  del Bloque de instancia al proceso de /perfilIndex  */
$datos38 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/perfilIndex", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilIndex');
$process38 = $router->setRuta($datos38);
/** Fin del caso de /perfilIndex */
/** Inicio  del Bloque de instancia al proceso de /asignarRolesPerfil  */
$datos39 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/asignarRolesPerfil", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegRolesAsignarRolesPerfil');
$process39 = $router->setRuta($datos39);
/** Fin del caso de /asignarRolesPerfil */
/** Inicio  del Bloque de instancia al proceso de /setAsociarRolesPerfil  */
$datos40 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/setAsociarRolesPerfil", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSetAsociarRolesPerfil');
$process40 = $router->setRuta($datos40);
/** Fin del caso de /setAsociarRolesPerfil */
/** Inicio  del Bloque de instancia al proceso de /perfilListar  */
$datos41 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/perfilListar", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilListar');
$process41 = $router->setRuta($datos41);
/** Fin del caso de /perfilListar */
/** Inicio  del Bloque de instancia al proceso de /perfilCreate  */
$datos42 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilCreate", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilCreate');
$process42 = $router->setRuta($datos42);
/** Fin del caso de /perfilCreate */
/** Inicio  del Bloque de instancia al proceso de /perfilShow  */
$datos43 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilShow", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilShow');
$process43 = $router->setRuta($datos43);
/** Fin del caso de /perfilShow */
/** Inicio  del Bloque de instancia al proceso de /perfilDelete  */
$datos44 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilDelete", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilDelete');
$process44 = $router->setRuta($datos44);
/** Fin del caso de /perfilDelete */
/** Inicio  del Bloque de instancia al proceso de /perfilUpdate  */
$datos45 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/perfilUpdate", 'apps'=>"Admin", 'controller'=>"segPerfil",'method'=>'runSegPerfilUpdate');
$process45 = $router->setRuta($datos45);
/** Fin del caso de /perfilUpdate */
/** Inicio  del Bloque de instancia al proceso de /usuariosIndex  */
$datos46 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosIndex", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosIndex');
$process46 = $router->setRuta($datos46);
/** Fin del caso de /usuariosIndex */
/** Inicio  del Bloque de instancia al proceso de /usuariosListar  */
$datos47 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosListar", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosListar');
$process47 = $router->setRuta($datos47);
/** Fin del caso de /usuariosListar */
/** Inicio  del Bloque de instancia al proceso de /usuariosseglogloginListar  */
$datos48 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosseglogloginListar", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegLogAutenticacion');
$process48 = $router->setRuta($datos48);
/** Fin del caso de /usuariosseglogloginListar */
/** Inicio  del Bloque de instancia al proceso de /usuariosCreate  */
$datos49 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosCreate", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosCreate');
$process49 = $router->setRuta($datos49);
/** Fin del caso de /usuariosCreate */
/** Inicio  del Bloque de instancia al proceso de /usuariosShow  */
$datos50 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosShow", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosShow');
$process50 = $router->setRuta($datos50);
/** Fin del caso de /usuariosShow */
/** Inicio  del Bloque de instancia al proceso de /usuariosDelete  */
$datos51 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosDelete", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosDelete');
$process51 = $router->setRuta($datos51);
/** Fin del caso de /usuariosDelete */
/** Inicio  del Bloque de instancia al proceso de /usuariosAuditoria  */
$datos52 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosAuditoria", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosAuditoria');
$process52 = $router->setRuta($datos52);
/** Fin del caso de /usuariosAuditoria */
/** Inicio  del Bloque de instancia al proceso de /usuariosShowAuditoria  */
$datos53 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosShowAuditoria", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosShowAuditoria');
$process53 = $router->setRuta($datos53);
/** Fin del caso de /usuariosShowAuditoria */
/** Inicio  del Bloque de instancia al proceso de /showAuditoria  */
$datos54 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/showAuditoria", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegShowAuditoria');
$process54 = $router->setRuta($datos54);
/** Fin del caso de /showAuditoria */
/** Inicio  del Bloque de instancia al proceso de /getMetricaLog  */
$datos55 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getMetricaLog", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runLogMetrica');
$process55 = $router->setRuta($datos55);
/** Fin del caso de /getMetricaLog */
/** Inicio  del Bloque de instancia al proceso de /showAccionesAuditoria  */
$datos56 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/showAccionesAuditoria", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runShowAccionesAuditoria');
$process56 = $router->setRuta($datos56);
/** Fin del caso de /showAccionesAuditoria */
/** Inicio  del Bloque de instancia al proceso de /usuariosshowaccionesListar  */
$datos57 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosshowaccionesListar", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosShowAcciones');
$process57 = $router->setRuta($datos57);
/** Fin del caso de /usuariosshowaccionesListar */
/** Inicio  del Bloque de instancia al proceso de /usuariosUpdate  */
$datos58 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/usuariosUpdate", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosUpdate');
$process58 = $router->setRuta($datos58);
/** Fin del caso de /usuariosUpdate */
/** Inicio  del Bloque de instancia al proceso de /usuariosPerfil  */
$datos59 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/usuariosPerfil", 'apps'=>"Admin", 'controller'=>"segUsuarios",'method'=>'runSegUsuariosPerfil');
$process59 = $router->setRuta($datos59);
/** Fin del caso de /usuariosPerfil */
/** Inicio  del Bloque de instancia al proceso de /getEntidadComun  */
$datos60 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/getEntidadComun", 'apps'=>"Admin", 'controller'=>"gestionar",'method'=>'runGetEntidadComun');
$process60 = $router->setRuta($datos60);
/** Fin del caso de /getEntidadComun */
/** Inicio  del Bloque de instancia al proceso de /locksPost  */
$datos61 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/locksPost", 'apps'=>"Admin", 'controller'=>"login",'method'=>'runLocksPost');
$process61 = $router->setRuta($datos61);
/** Fin del caso de /locksPost */
/** Inicio  del Bloque de instancia al proceso de /estatusIndex  */
$datos62 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/estatusIndex", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusIndex');
$process62 = $router->setRuta($datos62);
/** Fin del caso de /estatusIndex */
/** Inicio  del Bloque de instancia al proceso de /estatusListar  */
$datos63 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/estatusListar", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusListar');
$process63 = $router->setRuta($datos63);
/** Fin del caso de /estatusListar */
/** Inicio  del Bloque de instancia al proceso de /estatusCreate  */
$datos64 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusCreate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusCreate');
$process64 = $router->setRuta($datos64);
/** Fin del caso de /estatusCreate */
/** Inicio  del Bloque de instancia al proceso de /estatusShow  */
$datos65 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusShow", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusShow');
$process65 = $router->setRuta($datos65);
/** Fin del caso de /estatusShow */
/** Inicio  del Bloque de instancia al proceso de /estatusDelete  */
$datos66 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusDelete", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusDelete');
$process66 = $router->setRuta($datos66);
/** Fin del caso de /estatusDelete */
/** Inicio  del Bloque de instancia al proceso de /estatusUpdate  */
$datos67 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/estatusUpdate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusUpdate');
$process67 = $router->setRuta($datos67);
/** Fin del caso de /estatusUpdate */
/** Inicio  del Bloque de instancia al proceso de /tipoIndex  */
$datos68 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/tipoIndex", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioIndex');
$process68 = $router->setRuta($datos68);
/** Fin del caso de /tipoIndex */
/** Inicio  del Bloque de instancia al proceso de /tipoListar  */
$datos69 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/tipoListar", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioListar');
$process69 = $router->setRuta($datos69);
/** Fin del caso de /tipoListar */
/** Inicio  del Bloque de instancia al proceso de /tipoCreate  */
$datos70 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoCreate", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioCreate');
$process70 = $router->setRuta($datos70);
/** Fin del caso de /tipoCreate */
/** Inicio  del Bloque de instancia al proceso de /tipoShow  */
$datos71 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoShow", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioShow');
$process71 = $router->setRuta($datos71);
/** Fin del caso de /tipoShow */
/** Inicio  del Bloque de instancia al proceso de /tipoDelete  */
$datos72 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoDelete", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioDelete');
$process72 = $router->setRuta($datos72);
/** Fin del caso de /tipoDelete */
/** Inicio  del Bloque de instancia al proceso de /tipoUpdate  */
$datos73 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/tipoUpdate", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioUpdate');
$process73 = $router->setRuta($datos73);
/** Fin del caso de /tipoUpdate */
/** Inicio  del Bloque de instancia al proceso de /productossIndex  */
$datos74 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/productossIndex", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosIndex');
$process74 = $router->setRuta($datos74);
/** Fin del caso de /productossIndex */
/** Inicio  del Bloque de instancia al proceso de /productossListar  */
$datos75 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/productossListar", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosListar');
$process75 = $router->setRuta($datos75);
/** Fin del caso de /productossListar */
/** Inicio  del Bloque de instancia al proceso de /productossCreate  */
$datos76 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossCreate", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosCreate');
$process76 = $router->setRuta($datos76);
/** Fin del caso de /productossCreate */
/** Inicio  del Bloque de instancia al proceso de /productossShow  */
$datos77 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossShow", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosShow');
$process77 = $router->setRuta($datos77);
/** Fin del caso de /productossShow */
/** Inicio  del Bloque de instancia al proceso de /productossDelete  */
$datos78 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossDelete", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosDelete');
$process78 = $router->setRuta($datos78);
/** Fin del caso de /productossDelete */
/** Inicio  del Bloque de instancia al proceso de /productossUpdate  */
$datos79 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/productossUpdate", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosUpdate');
$process79 = $router->setRuta($datos79);
/** Fin del caso de /productossUpdate */
/** Inicio  del Bloque de instancia al proceso de /unidaIndex  */
$datos80 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/unidaIndex", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusIndex');
$process80 = $router->setRuta($datos80);
/** Fin del caso de /unidaIndex */
/** Inicio  del Bloque de instancia al proceso de /unidaListar  */
$datos81 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/unidaListar", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusListar');
$process81 = $router->setRuta($datos81);
/** Fin del caso de /unidaListar */
/** Inicio  del Bloque de instancia al proceso de /unidaCreate  */
$datos82 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaCreate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusCreate');
$process82 = $router->setRuta($datos82);
/** Fin del caso de /unidaCreate */
/** Inicio  del Bloque de instancia al proceso de /unidaShow  */
$datos83 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaShow", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusShow');
$process83 = $router->setRuta($datos83);
/** Fin del caso de /unidaShow */
/** Inicio  del Bloque de instancia al proceso de /unidaDelete  */
$datos84 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaDelete", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusDelete');
$process84 = $router->setRuta($datos84);
/** Fin del caso de /unidaDelete */
/** Inicio  del Bloque de instancia al proceso de /unidaUpdate  */
$datos85 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/unidaUpdate", 'apps'=>"Admin", 'controller'=>"tipoEstatus",'method'=>'runTipoEstatusUpdate');
$process85 = $router->setRuta($datos85);
/** Fin del caso de /unidaUpdate */
/** Inicio  del Bloque de instancia al proceso de /pabloIndex  */
$datos86 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/pabloIndex", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaIndex');
$process86 = $router->setRuta($datos86);
/** Fin del caso de /pabloIndex */
/** Inicio  del Bloque de instancia al proceso de /pabloListar  */
$datos87 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/pabloListar", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaListar');
$process87 = $router->setRuta($datos87);
/** Fin del caso de /pabloListar */
/** Inicio  del Bloque de instancia al proceso de /pabloCreate  */
$datos88 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloCreate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaCreate');
$process88 = $router->setRuta($datos88);
/** Fin del caso de /pabloCreate */
/** Inicio  del Bloque de instancia al proceso de /pabloShow  */
$datos89 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloShow", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaShow');
$process89 = $router->setRuta($datos89);
/** Fin del caso de /pabloShow */
/** Inicio  del Bloque de instancia al proceso de /pabloDelete  */
$datos90 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloDelete", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaDelete');
$process90 = $router->setRuta($datos90);
/** Fin del caso de /pabloDelete */
/** Inicio  del Bloque de instancia al proceso de /pabloUpdate  */
$datos91 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/pabloUpdate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaUpdate');
$process91 = $router->setRuta($datos91);
/** Fin del caso de /pabloUpdate */
/** Inicio  del Bloque de instancia al proceso de /ppppIndex  */
$datos92 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/ppppIndex", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaIndex');
$process92 = $router->setRuta($datos92);
/** Fin del caso de /ppppIndex */
/** Inicio  del Bloque de instancia al proceso de /ppppListar  */
$datos93 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/ppppListar", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaListar');
$process93 = $router->setRuta($datos93);
/** Fin del caso de /ppppListar */
/** Inicio  del Bloque de instancia al proceso de /ppppCreate  */
$datos94 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ppppCreate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaCreate');
$process94 = $router->setRuta($datos94);
/** Fin del caso de /ppppCreate */
/** Inicio  del Bloque de instancia al proceso de /ppppShow  */
$datos95 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ppppShow", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaShow');
$process95 = $router->setRuta($datos95);
/** Fin del caso de /ppppShow */
/** Inicio  del Bloque de instancia al proceso de /ppppDelete  */
$datos96 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ppppDelete", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaDelete');
$process96 = $router->setRuta($datos96);
/** Fin del caso de /ppppDelete */
/** Inicio  del Bloque de instancia al proceso de /ppppUpdate  */
$datos97 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ppppUpdate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaUpdate');
$process97 = $router->setRuta($datos97);
/** Fin del caso de /ppppUpdate */
/** Inicio  del Bloque de instancia al proceso de /ggggIndex  */
$datos98 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/ggggIndex", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaIndex');
$process98 = $router->setRuta($datos98);
/** Fin del caso de /ggggIndex */
/** Inicio  del Bloque de instancia al proceso de /ggggListar  */
$datos99 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/ggggListar", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaListar');
$process99 = $router->setRuta($datos99);
/** Fin del caso de /ggggListar */
/** Inicio  del Bloque de instancia al proceso de /ggggCreate  */
$datos100 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ggggCreate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaCreate');
$process100 = $router->setRuta($datos100);
/** Fin del caso de /ggggCreate */
/** Inicio  del Bloque de instancia al proceso de /ggggShow  */
$datos101 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ggggShow", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaShow');
$process101 = $router->setRuta($datos101);
/** Fin del caso de /ggggShow */
/** Inicio  del Bloque de instancia al proceso de /ggggDelete  */
$datos102 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ggggDelete", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaDelete');
$process102 = $router->setRuta($datos102);
/** Fin del caso de /ggggDelete */
/** Inicio  del Bloque de instancia al proceso de /ggggUpdate  */
$datos103 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ggggUpdate", 'apps'=>"Admin", 'controller'=>"prueba",'method'=>'runPruebaUpdate');
$process103 = $router->setRuta($datos103);
/** Fin del caso de /ggggUpdate */
/** Inicio  del Bloque de instancia al proceso de /sociosIndex  */
$datos104 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/sociosIndex", 'apps'=>"Admin", 'controller'=>"socios",'method'=>'runSociosIndex');
$process104 = $router->setRuta($datos104);
/** Fin del caso de /sociosIndex */
/** Inicio  del Bloque de instancia al proceso de /sociosListar  */
$datos105 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/sociosListar", 'apps'=>"Admin", 'controller'=>"socios",'method'=>'runSociosListar');
$process105 = $router->setRuta($datos105);
/** Fin del caso de /sociosListar */
/** Inicio  del Bloque de instancia al proceso de /sociosCreate  */
$datos106 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sociosCreate", 'apps'=>"Admin", 'controller'=>"socios",'method'=>'runSociosCreate');
$process106 = $router->setRuta($datos106);
/** Fin del caso de /sociosCreate */
/** Inicio  del Bloque de instancia al proceso de /sociosShow  */
$datos107 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sociosShow", 'apps'=>"Admin", 'controller'=>"socios",'method'=>'runSociosShow');
$process107 = $router->setRuta($datos107);
/** Fin del caso de /sociosShow */
/** Inicio  del Bloque de instancia al proceso de /sociosDelete  */
$datos108 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sociosDelete", 'apps'=>"Admin", 'controller'=>"socios",'method'=>'runSociosDelete');
$process108 = $router->setRuta($datos108);
/** Fin del caso de /sociosDelete */
/** Inicio  del Bloque de instancia al proceso de /sociosUpdate  */
$datos109 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/sociosUpdate", 'apps'=>"Admin", 'controller'=>"socios",'method'=>'runSociosUpdate');
$process109 = $router->setRuta($datos109);
/** Fin del caso de /sociosUpdate */
/** Inicio  del Bloque de instancia al proceso de /padreehijoIndex  */
$datos110 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/padreehijoIndex", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosIndex');
$process110 = $router->setRuta($datos110);
/** Fin del caso de /padreehijoIndex */
/** Inicio  del Bloque de instancia al proceso de /padreehijoListar  */
$datos111 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/padreehijoListar", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosListar');
$process111 = $router->setRuta($datos111);
/** Fin del caso de /padreehijoListar */
/** Inicio  del Bloque de instancia al proceso de /padreehijoCreate  */
$datos112 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/padreehijoCreate", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosCreate');
$process112 = $router->setRuta($datos112);
/** Fin del caso de /padreehijoCreate */
/** Inicio  del Bloque de instancia al proceso de /padreehijoShow  */
$datos113 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/padreehijoShow", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosShow');
$process113 = $router->setRuta($datos113);
/** Fin del caso de /padreehijoShow */
/** Inicio  del Bloque de instancia al proceso de /padreehijoDelete  */
$datos114 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/padreehijoDelete", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosDelete');
$process114 = $router->setRuta($datos114);
/** Fin del caso de /padreehijoDelete */
/** Inicio  del Bloque de instancia al proceso de /padreehijoUpdate  */
$datos115 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/padreehijoUpdate", 'apps'=>"Admin", 'controller'=>"productos",'method'=>'runProductosUpdate');
$process115 = $router->setRuta($datos115);
/** Fin del caso de /padreehijoUpdate */
/** Inicio  del Bloque de instancia al proceso de /buscarhijoIndex  */
$datos116 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/buscarhijoIndex", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioIndex');
$process116 = $router->setRuta($datos116);
/** Fin del caso de /buscarhijoIndex */
/** Inicio  del Bloque de instancia al proceso de /buscarhijoListar  */
$datos117 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/buscarhijoListar", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioListar');
$process117 = $router->setRuta($datos117);
/** Fin del caso de /buscarhijoListar */
/** Inicio  del Bloque de instancia al proceso de /buscarhijoCreate  */
$datos118 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/buscarhijoCreate", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioCreate');
$process118 = $router->setRuta($datos118);
/** Fin del caso de /buscarhijoCreate */
/** Inicio  del Bloque de instancia al proceso de /buscarhijoShow  */
$datos119 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/buscarhijoShow", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioShow');
$process119 = $router->setRuta($datos119);
/** Fin del caso de /buscarhijoShow */
/** Inicio  del Bloque de instancia al proceso de /buscarhijoDelete  */
$datos120 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/buscarhijoDelete", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioDelete');
$process120 = $router->setRuta($datos120);
/** Fin del caso de /buscarhijoDelete */
/** Inicio  del Bloque de instancia al proceso de /buscarhijoUpdate  */
$datos121 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/buscarhijoUpdate", 'apps'=>"Admin", 'controller'=>"tipoServicio",'method'=>'runTipoServicioUpdate');
$process121 = $router->setRuta($datos121);
/** Fin del caso de /buscarhijoUpdate */
/** Inicio  del Bloque de instancia al proceso de /caninoIndex  */
$datos122 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/caninoIndex", 'apps'=>"Admin", 'controller'=>"perro",'method'=>'runPerroIndex');
$process122 = $router->setRuta($datos122);
/** Fin del caso de /caninoIndex */
/** Inicio  del Bloque de instancia al proceso de /caninoListar  */
$datos123 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/caninoListar", 'apps'=>"Admin", 'controller'=>"perro",'method'=>'runPerroListar');
$process123 = $router->setRuta($datos123);
/** Fin del caso de /caninoListar */
/** Inicio  del Bloque de instancia al proceso de /caninoCreate  */
$datos124 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/caninoCreate", 'apps'=>"Admin", 'controller'=>"perro",'method'=>'runPerroCreate');
$process124 = $router->setRuta($datos124);
/** Fin del caso de /caninoCreate */
/** Inicio  del Bloque de instancia al proceso de /caninoShow  */
$datos125 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/caninoShow", 'apps'=>"Admin", 'controller'=>"perro",'method'=>'runPerroShow');
$process125 = $router->setRuta($datos125);
/** Fin del caso de /caninoShow */
/** Inicio  del Bloque de instancia al proceso de /caninoDelete  */
$datos126 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/caninoDelete", 'apps'=>"Admin", 'controller'=>"perro",'method'=>'runPerroDelete');
$process126 = $router->setRuta($datos126);
/** Fin del caso de /caninoDelete */
/** Inicio  del Bloque de instancia al proceso de /caninoUpdate  */
$datos127 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/caninoUpdate", 'apps'=>"Admin", 'controller'=>"perro",'method'=>'runPerroUpdate');
$process127 = $router->setRuta($datos127);
/** Fin del caso de /caninoUpdate */
/** Inicio  del Bloque de instancia al proceso de /procesadoresIndex  */
$datos128 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/procesadoresIndex", 'apps'=>"Admin", 'controller'=>"procesador",'method'=>'runProcesadorIndex');
$process128 = $router->setRuta($datos128);
/** Fin del caso de /procesadoresIndex */
/** Inicio  del Bloque de instancia al proceso de /procesadoresListar  */
$datos129 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/procesadoresListar", 'apps'=>"Admin", 'controller'=>"procesador",'method'=>'runProcesadorListar');
$process129 = $router->setRuta($datos129);
/** Fin del caso de /procesadoresListar */
/** Inicio  del Bloque de instancia al proceso de /procesadoresCreate  */
$datos130 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/procesadoresCreate", 'apps'=>"Admin", 'controller'=>"procesador",'method'=>'runProcesadorCreate');
$process130 = $router->setRuta($datos130);
/** Fin del caso de /procesadoresCreate */
/** Inicio  del Bloque de instancia al proceso de /procesadoresShow  */
$datos131 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/procesadoresShow", 'apps'=>"Admin", 'controller'=>"procesador",'method'=>'runProcesadorShow');
$process131 = $router->setRuta($datos131);
/** Fin del caso de /procesadoresShow */
/** Inicio  del Bloque de instancia al proceso de /procesadoresDelete  */
$datos132 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/procesadoresDelete", 'apps'=>"Admin", 'controller'=>"procesador",'method'=>'runProcesadorDelete');
$process132 = $router->setRuta($datos132);
/** Fin del caso de /procesadoresDelete */
/** Inicio  del Bloque de instancia al proceso de /procesadoresUpdate  */
$datos133 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/procesadoresUpdate", 'apps'=>"Admin", 'controller'=>"procesador",'method'=>'runProcesadorUpdate');
$process133 = $router->setRuta($datos133);
/** Fin del caso de /procesadoresUpdate */
 
?>