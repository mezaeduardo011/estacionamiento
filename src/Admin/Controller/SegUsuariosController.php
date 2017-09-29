<?php
namespace APP\Admin\Controller;
use JPH\Core\Commun\Security;
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
     $roles = $this->hoSegPerfilsModel->getSegPerfilListar();
     $this->tpl->add('usuario', $this->getSession('usuario'));
     $this->tpl->add('roles', $roles);
     $this->tpl->renders('view::seguridad/segUsuarios/'.$this->pathVista().'/index');
   }

    /**
    * Listar registros de SegUsuarios
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runSegUsuariosListar($request)
   {
      $result = $this->hoSegUsuariosModel->getSegUsuariosListar($request);
      $this->json($result);
   }

    /**
    * Crear registros de SegUsuarios
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runSegUsuariosCreate($request)
   {
      //$this->hoSegPerfilsModel->getSegPerfilRelacionUser($request->roles);
      $result = $this->hoSegUsuariosModel->setSegUsuariosCreate($request);
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
}
?>
