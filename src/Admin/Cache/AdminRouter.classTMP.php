 <?php
 use JPH\Core\Router\RouterGenerator;
/**
 * @propiedad: PROPIETARIO DEL CODIGO
 * @Autor: Gregorio Bolivar * @email: elalconxvii@gmail.com
 * @Fecha de Creacion: 22/01/2018
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
/** Inicio  del Bloque de instancia al proceso de /abmlegajosIndex  */
$datos62 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/abmlegajosIndex", 'apps'=>"Admin", 'controller'=>"legajos",'method'=>'runLegajosIndex');
$process62 = $router->setRuta($datos62);
/** Fin del caso de /abmlegajosIndex */
/** Inicio  del Bloque de instancia al proceso de /abmlegajosListar  */
$datos63 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/abmlegajosListar", 'apps'=>"Admin", 'controller'=>"legajos",'method'=>'runLegajosListar');
$process63 = $router->setRuta($datos63);
/** Fin del caso de /abmlegajosListar */
/** Inicio  del Bloque de instancia al proceso de /abmlegajosCreate  */
$datos64 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmlegajosCreate", 'apps'=>"Admin", 'controller'=>"legajos",'method'=>'runLegajosCreate');
$process64 = $router->setRuta($datos64);
/** Fin del caso de /abmlegajosCreate */
/** Inicio  del Bloque de instancia al proceso de /abmlegajosShow  */
$datos65 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmlegajosShow", 'apps'=>"Admin", 'controller'=>"legajos",'method'=>'runLegajosShow');
$process65 = $router->setRuta($datos65);
/** Fin del caso de /abmlegajosShow */
/** Inicio  del Bloque de instancia al proceso de /abmlegajosDelete  */
$datos66 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmlegajosDelete", 'apps'=>"Admin", 'controller'=>"legajos",'method'=>'runLegajosDelete');
$process66 = $router->setRuta($datos66);
/** Fin del caso de /abmlegajosDelete */
/** Inicio  del Bloque de instancia al proceso de /abmlegajosUpdate  */
$datos67 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmlegajosUpdate", 'apps'=>"Admin", 'controller'=>"legajos",'method'=>'runLegajosUpdate');
$process67 = $router->setRuta($datos67);
/** Fin del caso de /abmlegajosUpdate */
/** Inicio  del Bloque de instancia al proceso de /abmconveniosIndex  */
$datos68 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/abmconveniosIndex", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioIndex');
$process68 = $router->setRuta($datos68);
/** Fin del caso de /abmconveniosIndex */
/** Inicio  del Bloque de instancia al proceso de /abmconveniosListar  */
$datos69 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/abmconveniosListar", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioListar');
$process69 = $router->setRuta($datos69);
/** Fin del caso de /abmconveniosListar */
/** Inicio  del Bloque de instancia al proceso de /abmconveniosCreate  */
$datos70 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmconveniosCreate", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioCreate');
$process70 = $router->setRuta($datos70);
/** Fin del caso de /abmconveniosCreate */
/** Inicio  del Bloque de instancia al proceso de /abmconveniosShow  */
$datos71 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmconveniosShow", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioShow');
$process71 = $router->setRuta($datos71);
/** Fin del caso de /abmconveniosShow */
/** Inicio  del Bloque de instancia al proceso de /abmconveniosDelete  */
$datos72 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmconveniosDelete", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioDelete');
$process72 = $router->setRuta($datos72);
/** Fin del caso de /abmconveniosDelete */
/** Inicio  del Bloque de instancia al proceso de /abmconveniosUpdate  */
$datos73 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmconveniosUpdate", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioUpdate');
$process73 = $router->setRuta($datos73);
/** Fin del caso de /abmconveniosUpdate */
/** Inicio  del Bloque de instancia al proceso de /abmlejanIndex  */
$datos74 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/abmlejanIndex", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanIndex');
$process74 = $router->setRuta($datos74);
/** Fin del caso de /abmlejanIndex */
/** Inicio  del Bloque de instancia al proceso de /abmlejanListar  */
$datos75 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/abmlejanListar", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanListar');
$process75 = $router->setRuta($datos75);
/** Fin del caso de /abmlejanListar */
/** Inicio  del Bloque de instancia al proceso de /abmlejanCreate  */
$datos76 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmlejanCreate", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanCreate');
$process76 = $router->setRuta($datos76);
/** Fin del caso de /abmlejanCreate */
/** Inicio  del Bloque de instancia al proceso de /abmlejanShow  */
$datos77 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmlejanShow", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanShow');
$process77 = $router->setRuta($datos77);
/** Fin del caso de /abmlejanShow */
/** Inicio  del Bloque de instancia al proceso de /abmlejanDelete  */
$datos78 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmlejanDelete", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanDelete');
$process78 = $router->setRuta($datos78);
/** Fin del caso de /abmlejanDelete */
/** Inicio  del Bloque de instancia al proceso de /abmlejanUpdate  */
$datos79 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmlejanUpdate", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanUpdate');
$process79 = $router->setRuta($datos79);
/** Fin del caso de /abmlejanUpdate */
/** Inicio  del Bloque de instancia al proceso de /abmpadrehijosIndex  */
$datos80 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/abmpadrehijosIndex", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioIndex');
$process80 = $router->setRuta($datos80);
/** Fin del caso de /abmpadrehijosIndex */
/** Inicio  del Bloque de instancia al proceso de /abmpadrehijosListar  */
$datos81 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/abmpadrehijosListar", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioListar');
$process81 = $router->setRuta($datos81);
/** Fin del caso de /abmpadrehijosListar */
/** Inicio  del Bloque de instancia al proceso de /abmpadrehijosCreate  */
$datos82 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmpadrehijosCreate", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioCreate');
$process82 = $router->setRuta($datos82);
/** Fin del caso de /abmpadrehijosCreate */
/** Inicio  del Bloque de instancia al proceso de /abmpadrehijosShow  */
$datos83 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmpadrehijosShow", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioShow');
$process83 = $router->setRuta($datos83);
/** Fin del caso de /abmpadrehijosShow */
/** Inicio  del Bloque de instancia al proceso de /abmpadrehijosDelete  */
$datos84 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmpadrehijosDelete", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioDelete');
$process84 = $router->setRuta($datos84);
/** Fin del caso de /abmpadrehijosDelete */
/** Inicio  del Bloque de instancia al proceso de /abmpadrehijosUpdate  */
$datos85 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/abmpadrehijosUpdate", 'apps'=>"Admin", 'controller'=>"convenio",'method'=>'runConvenioUpdate');
$process85 = $router->setRuta($datos85);
/** Fin del caso de /abmpadrehijosUpdate */
/** Inicio  del Bloque de instancia al proceso de /hijosssIndex  */
$datos86 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/hijosssIndex", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanIndex');
$process86 = $router->setRuta($datos86);
/** Fin del caso de /hijosssIndex */
/** Inicio  del Bloque de instancia al proceso de /hijosssListar  */
$datos87 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/hijosssListar", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanListar');
$process87 = $router->setRuta($datos87);
/** Fin del caso de /hijosssListar */
/** Inicio  del Bloque de instancia al proceso de /hijosssCreate  */
$datos88 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/hijosssCreate", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanCreate');
$process88 = $router->setRuta($datos88);
/** Fin del caso de /hijosssCreate */
/** Inicio  del Bloque de instancia al proceso de /hijosssShow  */
$datos89 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/hijosssShow", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanShow');
$process89 = $router->setRuta($datos89);
/** Fin del caso de /hijosssShow */
/** Inicio  del Bloque de instancia al proceso de /hijosssDelete  */
$datos90 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/hijosssDelete", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanDelete');
$process90 = $router->setRuta($datos90);
/** Fin del caso de /hijosssDelete */
/** Inicio  del Bloque de instancia al proceso de /hijosssUpdate  */
$datos91 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/hijosssUpdate", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanUpdate');
$process91 = $router->setRuta($datos91);
/** Fin del caso de /hijosssUpdate */
/** Inicio  del Bloque de instancia al proceso de /hijosvertodosIndex  */
$datos92 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/hijosvertodosIndex", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanIndex');
$process92 = $router->setRuta($datos92);
/** Fin del caso de /hijosvertodosIndex */
/** Inicio  del Bloque de instancia al proceso de /hijosvertodosListar  */
$datos93 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/hijosvertodosListar", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanListar');
$process93 = $router->setRuta($datos93);
/** Fin del caso de /hijosvertodosListar */
/** Inicio  del Bloque de instancia al proceso de /hijosvertodosCreate  */
$datos94 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/hijosvertodosCreate", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanCreate');
$process94 = $router->setRuta($datos94);
/** Fin del caso de /hijosvertodosCreate */
/** Inicio  del Bloque de instancia al proceso de /hijosvertodosShow  */
$datos95 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/hijosvertodosShow", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanShow');
$process95 = $router->setRuta($datos95);
/** Fin del caso de /hijosvertodosShow */
/** Inicio  del Bloque de instancia al proceso de /hijosvertodosDelete  */
$datos96 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/hijosvertodosDelete", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanDelete');
$process96 = $router->setRuta($datos96);
/** Fin del caso de /hijosvertodosDelete */
/** Inicio  del Bloque de instancia al proceso de /hijosvertodosUpdate  */
$datos97 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/hijosvertodosUpdate", 'apps'=>"Admin", 'controller'=>"lejan",'method'=>'runLejanUpdate');
$process97 = $router->setRuta($datos97);
/** Fin del caso de /hijosvertodosUpdate */
/** Inicio  del Bloque de instancia al proceso de /gabrielaIndex  */
$datos98 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/gabrielaIndex", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyIndex');
$process98 = $router->setRuta($datos98);
/** Fin del caso de /gabrielaIndex */
/** Inicio  del Bloque de instancia al proceso de /gabrielaListar  */
$datos99 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/gabrielaListar", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyListar');
$process99 = $router->setRuta($datos99);
/** Fin del caso de /gabrielaListar */
/** Inicio  del Bloque de instancia al proceso de /gabrielaCreate  */
$datos100 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/gabrielaCreate", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyCreate');
$process100 = $router->setRuta($datos100);
/** Fin del caso de /gabrielaCreate */
/** Inicio  del Bloque de instancia al proceso de /gabrielaShow  */
$datos101 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/gabrielaShow", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyShow');
$process101 = $router->setRuta($datos101);
/** Fin del caso de /gabrielaShow */
/** Inicio  del Bloque de instancia al proceso de /gabrielaDelete  */
$datos102 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/gabrielaDelete", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyDelete');
$process102 = $router->setRuta($datos102);
/** Fin del caso de /gabrielaDelete */
/** Inicio  del Bloque de instancia al proceso de /gabrielaUpdate  */
$datos103 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/gabrielaUpdate", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyUpdate');
$process103 = $router->setRuta($datos103);
/** Fin del caso de /gabrielaUpdate */
/** Inicio  del Bloque de instancia al proceso de /ddddIndex  */
$datos104 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/ddddIndex", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyIndex');
$process104 = $router->setRuta($datos104);
/** Fin del caso de /ddddIndex */
/** Inicio  del Bloque de instancia al proceso de /ddddListar  */
$datos105 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/ddddListar", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyListar');
$process105 = $router->setRuta($datos105);
/** Fin del caso de /ddddListar */
/** Inicio  del Bloque de instancia al proceso de /ddddCreate  */
$datos106 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ddddCreate", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyCreate');
$process106 = $router->setRuta($datos106);
/** Fin del caso de /ddddCreate */
/** Inicio  del Bloque de instancia al proceso de /ddddShow  */
$datos107 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ddddShow", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyShow');
$process107 = $router->setRuta($datos107);
/** Fin del caso de /ddddShow */
/** Inicio  del Bloque de instancia al proceso de /ddddDelete  */
$datos108 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ddddDelete", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyDelete');
$process108 = $router->setRuta($datos108);
/** Fin del caso de /ddddDelete */
/** Inicio  del Bloque de instancia al proceso de /ddddUpdate  */
$datos109 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/ddddUpdate", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyUpdate');
$process109 = $router->setRuta($datos109);
/** Fin del caso de /ddddUpdate */
/** Inicio  del Bloque de instancia al proceso de /temasIndex  */
$datos110 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/temasIndex", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyIndex');
$process110 = $router->setRuta($datos110);
/** Fin del caso de /temasIndex */
/** Inicio  del Bloque de instancia al proceso de /temasListar  */
$datos111 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/temasListar", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyListar');
$process111 = $router->setRuta($datos111);
/** Fin del caso de /temasListar */
/** Inicio  del Bloque de instancia al proceso de /temasCreate  */
$datos112 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/temasCreate", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyCreate');
$process112 = $router->setRuta($datos112);
/** Fin del caso de /temasCreate */
/** Inicio  del Bloque de instancia al proceso de /temasShow  */
$datos113 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/temasShow", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyShow');
$process113 = $router->setRuta($datos113);
/** Fin del caso de /temasShow */
/** Inicio  del Bloque de instancia al proceso de /temasDelete  */
$datos114 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/temasDelete", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyDelete');
$process114 = $router->setRuta($datos114);
/** Fin del caso de /temasDelete */
/** Inicio  del Bloque de instancia al proceso de /temasUpdate  */
$datos115 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/temasUpdate", 'apps'=>"Admin", 'controller'=>"gaby",'method'=>'runGabyUpdate');
$process115 = $router->setRuta($datos115);
/** Fin del caso de /temasUpdate */
/** Inicio  del Bloque de instancia al proceso de /lkgfdIndex  */
$datos116 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/lkgfdIndex", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanIndex');
$process116 = $router->setRuta($datos116);
/** Fin del caso de /lkgfdIndex */
/** Inicio  del Bloque de instancia al proceso de /lkgfdListar  */
$datos117 = array('petition'=>"GET", 'request'=>$request, 'name'=>"/lkgfdListar", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanListar');
$process117 = $router->setRuta($datos117);
/** Fin del caso de /lkgfdListar */
/** Inicio  del Bloque de instancia al proceso de /lkgfdCreate  */
$datos118 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/lkgfdCreate", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanCreate');
$process118 = $router->setRuta($datos118);
/** Fin del caso de /lkgfdCreate */
/** Inicio  del Bloque de instancia al proceso de /lkgfdShow  */
$datos119 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/lkgfdShow", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanShow');
$process119 = $router->setRuta($datos119);
/** Fin del caso de /lkgfdShow */
/** Inicio  del Bloque de instancia al proceso de /lkgfdDelete  */
$datos120 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/lkgfdDelete", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanDelete');
$process120 = $router->setRuta($datos120);
/** Fin del caso de /lkgfdDelete */
/** Inicio  del Bloque de instancia al proceso de /lkgfdUpdate  */
$datos121 = array('petition'=>"POST", 'request'=>$request, 'name'=>"/lkgfdUpdate", 'apps'=>"Admin", 'controller'=>"hijoslejan",'method'=>'runHijoslejanUpdate');
$process121 = $router->setRuta($datos121);
/** Fin del caso de /lkgfdUpdate */
 
?>