<?php
namespace APP\Admin\Controller;
use JPH\Core\Commun\{All,Security};
use APP\Admin\Model AS Model;

/**
 * Generador de codigo de Controller de Hornero 1.0
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 25/09/2017
 * @version: 1.0
 */ 

class SegUsuariosController extends Controller
{
   use Security;
   public $model;
   public $session;
   public function __construct()
   {
       parent::__construct();
       $this->session = $this->authenticated();
       $this->hoSegUsuariosModel = new Model\SegUsuariosModel();
       $this->hoSegLogUsuariosModel = new Model\SegLogAutenticacionModel();
       $this->hoSegLogAccionesModel = new Model\SegLogAccionesModel();
       $this->hoSegPerfilsModel = new Model\SegPerfilModel();
   }

    /**
    * Listar registros de SegUsuarios
    * @param: GET $resquest
    */
   public function runSegUsuariosIndex($request)
   {
     $this->tpl->addIni();
     //$listado = $this->hoSegUsuariosModel->getSegUsuariosListar($request);
     $roles = $this->hoSegPerfilsModel->getSegPerfilListarCombo();
     $this->tpl->add('usuario', $this->getSession('usuario'));
     $this->tpl->add('roles', $roles);
     $this->tpl->renders('view::seguridad/segUsuarios/'.$this->pathVista().'/index');
   }

    /**
     * Perfil del SegUsuarios
     * @param: GET $resquest
     */
    public function runSegUsuariosPerfil($request)
    {
        $this->tpl->addIni();
        //$listado = $this->hoSegUsuariosModel->getSegUsuariosListar($request);
        $roles = $this->hoSegPerfilsModel->getSegPerfilListarCombo();
        $this->tpl->add('usuario', $this->getSession('usuario'));
        $this->tpl->add('roles', $roles);
        $this->tpl->renders('view::seguridad/segUsuarios/usuarios/perfil');
    }

    /**
    * Listar registros de SegUsuarios
    * @param: POST $resquest
    * @return: JSON $result
    */
   public function runSegUsuariosListar($request)
   {
       $result = $this->formatRows($request->obj);
       $rows = $this->hoSegUsuariosModel->getSegUsuariosListar($request,$result);
       $valor = array();
       $valor['head']=$result['campos'];
       $valor['rows']=$rows; // return del modelo
       $this->json($valor);
   }

    /**
     * Listar log de registro autenticacion
     * @param: POST $resquest
     * @return: JSON $result
     */
    public function runSegLogAutenticacion($request)
    {
        $result = $this->formatRows($request->obj);
        $rows = $this->hoSegLogUsuariosModel->getSegLogUsuariosListar($request,$result);
        $valor = array();
        $valor['head']=$result['campos'];
        $valor['rows']=$rows; // return del modelo
        $this->json($valor);
    }

    /**
     * Listar log de registro autenticacion
     * @param: POST $resquest
     * @return: JSON $result
     */
    public function runSegUsuariosShowAcciones($request)
    {
        $result = $this->formatRows($request->obj);
        $rows = $this->hoSegLogAccionesModel->getSegLogUsuariosAccionesListar($request,$result);
        $valor = array();
        $valor['head']=$result['campos'];
        $valor['rows']=$rows; // return del modelo
        $this->json($valor);
    }

    /**
    * Crear registros de SegUsuarios
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runSegUsuariosCreate($request)
   {
      //$this->hoSegPerfilsModel->getSegPerfilRelacionUser($request->roles);
      $result = $this->hoSegUsuariosModel->setSegUsuariosCrsegLogCreateLogineate($request);
      if(is_null($result)){
        $dataJson['error']='1';
        $dataJson['msj']='Error en procesar el registro';
      }else{;
        $dataJson['error']='0';
        $dataJson['msj'] = 'Registro efectuado exitosamente';
      }
      $this->json($dataJson);
   }

    /**
    * Ver registros de SegUsuarios
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runSegUsuariosShow($request)
   {
      $result = $this->hoSegUsuariosModel->getSegUsuariosShow($request);
      $this->json($result);
   }

    /**
     * Ver registro
     * @param: POST $resquest
     * @return: JSON $result
     */
   public function runShowAccionesAuditoria($request)
   {
       $id = $this->validateRows('NUM', $request->item);
       if($id) {
           $result = $this->hoSegLogAccionesModel->showAcciones($request->item);
           $this->json($result);
       }else{
           // Non-Authoritative Information
           $dataJson['error']='1';
           $dataJson['msj'] = 'Error en procesar la actualizacion';
           $this->json($dataJson,203);
       }

   }

    /**
    * Eliminar registros de SegUsuarios
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runSegUsuariosDelete($request)
   {
      $result = $this->hoSegUsuariosModel->remSegUsuariosDelete($request);
      if(is_null($result)){
        $dataJson['error']='0';
        $dataJson['msj']='Registro eliminado exitosamente';
      }else{
        $dataJson['error']='1';
        $dataJson['msj'] = 'Error en procesar la actualizacion';
      }
      $this->json($dataJson);
   }

    /**
    * Actualizar registros de SegUsuarios
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runSegUsuariosUpdate($request)
   {
      $result = $this->hoSegUsuariosModel->setSegUsuariosUpdate($request);
      if(is_null($result)){
        $dataJson['error']='0';
        $dataJson['msj']='Actualizacion efectuado exitosamente';
      }else{
        $dataJson['error']='1';
        $dataJson['msj'] = 'Error en procesar la actualizacion';
      }
        $this->json($dataJson);
   }

   public function runSegUsuariosAuditoria()
   {
       $this->tpl->addIni();
       //$listado = $this->hoSegUsuariosModel->getSegUsuariosListar($request);
       $roles = $this->hoSegPerfilsModel->getSegPerfilListarCombo();
       $this->tpl->add('usuario', $this->getSession('usuario'));
       $this->tpl->add('roles', $roles);
       $this->tpl->renders('view::seguridad/segUsuarios/usuarios/auditoria');
   }

    /**
     * Ver registros de SegUsuarios
     * @param: POST $resquest
     * @return: JSON $result
     */
    public function runSegUsuariosShowAuditoria($request)
    {
       $datos=explode('|',base64_decode($request->getItemShow));
       $valor['data']=$datos[0];
       $result = $this->hoSegUsuariosModel->getSegUsuariosShow((object)$valor);
       $this->json($result);
    }
}
?>
