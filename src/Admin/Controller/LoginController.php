<?php

/**
 * Generador de codigo de Controller de Hornero 1.0
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 28/08/2017
 * @version: 1.0
 */

namespace APP\Admin\Controller;
use APP\Admin\Model;
use JPH\Core\Commun\Security;
use JPH\Core\Store\Cache;

class LoginController extends Controller
{
    public $model;
    public $segLogin;
    public $segUsuarioPerfil;
    public $segCambioClave;
    use Security;

    public function __construct()
    {
        $this->model = new Model\LoginModel();
        $this->segLogin = new Model\SegLogAutenticacionModel();
        $this->segUsuarioPerfil = new Model\SegUsuariosPerfilModel();
        $this->segCambioClave = new Model\SegCambioClaveModel();
        parent::__construct();
    }

    /**
     * Permite mostrar el formulario de ingreso de session del usuario
     * @return Template $html
     */
    public function runIndex()
   {
       if(!isset($_SESSION['usuario'])) {
           $this->tpl->addIni();
           $this->tpl->add('msjError', $this->cache->get('msjError'));
           $this->tpl->add('msjSuccess', $this->cache->get('msjSuccess'));
           $this->tpl->renders('view::home/login');
       }else{
           $this->redirect($this->cache->get('urlWebs'));
       }
   }

    /**
     * Permite mostrar el formulario de ingreso de session del usuario
     * @return Template $html
     */
   public function runRecuperarClave()
   {
        $this->tpl->addIni();
        $this->tpl->add('msjError', $this->cache->get('msjError'));
        $this->tpl->renders('view::home/recuperar');
   }

   public function runRecuperarClavePostNew($request)
   {
        $datos = $request->postParameter();
        if($datos->clave1===$datos->clave2){
            $this->model->fijarValor('id',$this->getSession('usuarioTokenId'));
            $this->model->fijarValor('password',$datos->clave1);
            $this->model->cambiarClave();
            $this->cache->set('msjSuccess', 'El cambio de contraseña fue procesado exitosamente.');
            $this->cargaAuditoria($this->getSession('usuarioTokenId'),'CAMBIAR LA CLAVE CAMBIADA EXITOSAENTE');
            $this->segCambioClave->setSegCambioClaveUpdate($this->getSession('cambiarClaveId'),$this->getSession('usuarioTokenId'));
            $this->redirect('/login');
        }else{
            $this->cache->set('msjError', 'Error, la verificación de las clave no son iguales.');
            $this->tpl->renders('view::home/recuperarClaveNew');
        }

   }

   public function runRecuperarClavePost($request)
   {
        $usuario = $request->postParameter('usuario');
        $correo = $request->postParameter('correo');
        $uId = $this->model->obtenerUserRenovar($usuario,$correo);
        if($uId->cuenta_bloqueada=='S'){
            $this->cache->set('msjError', 'Usuario se encuentra bloqueado no puede recuperar clave, pongase en contacto con el administrador del sistema.');
            $this->redirect('/recuperarClave');
        }else{
            if(!is_null($uId)) {
                $token = base64_encode($uId->id.'#'.md5($uId->id .'|'.$uId->correo.'|'.$uId->nombres.'|'.$uId->apellidos).'#'.$this->now());
                $this->segCambioClave->setSegCambioClaveCreate($uId->id, $token);
                $this->cargaAuditoria($uId->id,'SOLICITUD DE CAMBIO DE CLAVE');
                $this->mailStart();
                $this->setMailTitle('Recuperar Clave de acceso');
                $this->setMailAddressPRI($uId->correo, $uId->nombres.' '.$uId->apellidos);

                $this->tpl->addIni();
                $this->tpl->add('usuario', $uId->nombres.' '.$uId->apellidos);
                $this->tpl->add('tokenRew', $token);
                // Permite extraer los datos del html del correo
                ob_start();
                    $this->tpl->renders('view::home/tplRecuperarClave');
                    $html = ob_get_contents();
                ob_end_clean();

                $this->setMailBody($html);
                $this->mailSend();
                $valores = $request->postParameter();
                $this->cache->set('msjSuccess', 'Correo Enviado para proceder al cambio de clave');
                $this->redirect('/login');
            }else{
                $this->cache->set('msjError', 'Algo salio mal no se puede recuperar la clave, datos ingresados incorrectos.');
                $this->redirect('/recuperarClave');
            }
        }

   }

   /**
    * Method encargado de recibir el link con el token para cambiar la clave de acceso al sistema
    * @param Resuest $request
    * @request Template $html
    */
   public function runRecuperarRecibirToken($request)
   {
         $tmp = $request->getParameter();
         $base = $this->segCambioClave->getSegCambioClave($tmp->t);

         $baseLista = base64_decode($base[0]->token);
         $temp = explode("#",$baseLista);
         $horaActual = str_replace(array(':','-',' '),array('','',''),$this->now());
         $horaToken = str_replace(array(':','-',' '),array('','',''),$temp[2]);

         $tiempo = $horaActual - $horaToken;

        $this->model->fijarValor('id', $base[0]->created_usuario_id);
        $tmp = $this->model->obtenerUser();

        // Verificar que no exeda de 10 minuto
        $timeValidarToken = 60000000;

         if($tiempo<$timeValidarToken AND $base[0]->estatus==0) {
             $this->setSession('usuarioTokenId', $tmp->id);
             $this->setSession('cambiarClaveId', $base[0]->id);

             $this->tpl->addIni();
             $this->tpl->add('usuario', $tmp->usuario);
             $this->cargaAuditoria($tmp->id, 'LINK USADO PARA CAMBIAR LA CLAVE');

             $this->tpl->renders('view::home/recuperarClaveNew');
         }elseif($tiempo<$timeValidarToken AND $base[0]->estatus==1) {
             $this->cache->set('msjError', 'Algo salio mal no se puede recuperar la clave, token vencido proceso incorrecto.');
             $this->cargaAuditoria($tmp->id,'CAMBIO DE CLAVE CON LINK YA PROCESADO');
             $this->redirect('/recuperarClave');
         }else{
             $this->cache->set('msjError', 'Algo salio mal no se puede recuperar la clave, token vencido proceso incorrecto.');
             $this->cargaAuditoria($tmp->id,'CAMBIO DE CLAVE TOKEN CADUCADO');
             $this->redirect('/recuperarClave');
         }

   }



   /**
    * Permite cerrar session del usuario
    */
   public function runLogout()
   {
       $tmp = $this->getSession('usuario');
       $this->cargaAuditoria($tmp->id,'CERRAR SESSION');
       $this->delSessionAll();
   }

    public function runLockscreen()
    {
        $this->setSession('lockscreen','SI');
        $this->tpl->addIni();
        $tmp = $this->getSession('usuario');
        $this->cargaAuditoria($tmp->id, 'BLOQUEAR PANTALLA');
        $this->tpl->add('usuario', $tmp);
        $this->tpl->add('msjError',$this->cache->get('msjError'));
        $this->tpl->renders('view::home/lockscreen');
    }

    /**
     * @param Request $request
     */
    public function runIndexPost($request)
    {
        $tmp = $request->postParameter('login');
        if(isset($tmp))
        {
            $this->model->usuario = $request->postParameter('login');
            $this->model->password = $request->postParameter('contra');
            if ($this->model->validarUsuario() == true)
            {
                $this->cache->rm('msjError');
                $tmp = $this->model->obtenerUser();
                $perfil = $this->segUsuarioPerfil->getPerfilesAsociados($tmp->id);
                $this->setSession('usuario',$tmp);
                $this->setSession('usuarioPerfil',$perfil);
                $this->cargaAuditoria($tmp->id,'INICIAR SESSION');
                $this->setSession('path',getcwd());
                $this->setSession('autenticado','SI');
                self::runLoadRoles();
                $this->delSession('lockscreen');
                $this->redirect($this->cache->get('urlWebs'));
            }else{
                $uId = $this->model->obtenerUserLogin($request->postParameter('login'));
                $this->cargaAuditoria($uId->id, 'INTENTO FALLIDO INICIAR SESSION');
                $this->cache->set('msjError',$this->model->msjError);
                $this->redirect($this->cache->get('urlAute'));
            }
        }else{
            $this->redirect($this->cache->get('urlAute'));
            $this->cache->rm('msjError');
        }

    }

    public function runLoadRoles(){
        $this->setSession('roles', $this->model->roles);
    }

    public function runLocksPost($request)
    {
        $usuario=$this->getSession('usuario');
        $this->model->usuario = $usuario->usuario;
        $this->model->password = $request->postParameter('contra');
        if ($this->model->validarUsuario() == true)
        {
            $this->cache->rm('msjError');
            $tmp = $this->model->obtenerUser();
            $perfil = $this->segUsuarioPerfil->getPerfilesAsociados($tmp->id);
            $this->setSession('usuario',$tmp);
            $this->setSession('usuarioPerfil',$perfil);
            $this->cargaAuditoria($tmp->id,'DESBLOQUEO DE PANTALLA');
            $this->setSession('path',getcwd());
            $this->setSession('autenticado','SI');
            self::runLoadRoles();
            $this->delSession('lockscreen');
            $this->redirect($this->cache->get('urlWebs'));
        }else{
            $this->cache->set('msjError',$this->model->msjError);
            $uId = $this->model->obtenerUserLogin($request->postParameter('login'));
            $this->cargaAuditoria($uId->id, 'INTENTO FALLIDO DESBLOQUEO DE PANTALLA');
            $this->redirect($this->cache->get('urlLock'));
        }
    }
    public function cargaAuditoria($usuario_id,$accion)
    {
        $nav = $this->detect();
        $ip = $_SERVER['REMOTE_ADDR'];
        $bw = $nav['browser'].' '.$nav['version'].' '.$nav['os'];
        $sistema =  parent::FW;
        $this->segLogin->segLogCreateLogin($ip,$bw,$accion,$sistema,$usuario_id);
    }

}
?>