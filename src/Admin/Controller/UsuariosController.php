<?php
namespace APP\admin\Controller;
use JPH\Core\Commun\Security;
use APP\Admin\Model AS Model;

/**
 * Generador de codigo de Controller de Hornero 1.0
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 01/09/2017
 * @version: 1.0
 */ 

class UsuariosController extends Controller
{
   use Security;
   public $model;
   public $session;
   public $response;
   public function __construct()
   {
       parent::__construct();
       $this->session = $this->authenticated();
       $this->model = new Model\UsuariosModel();
   }

    /**
    * Listar registros de Usuarios
    * @param: GET $resquest
    */ 
   public function runUsuariosIndex($request)
   {

       $this->tpl->addIni();
       $this->tpl->add('usuario', $this->getSession('usuario'));
       $this->tpl->add('usuariosListado', $this->model->getUsuariosIndex());
       $this->tpl->renders('view::usuarios/index');
   }

    /**
    * Crear registros de Usuarios
    * @param: POST $resquest
    */ 
   public function runUsuariosCreate($request)
   {
       $response=$this->model->setUsuariosCreate($request);
       $response['numError']=0;
     $this->json($response);
   }

    /**
    * Ver registros de Usuarios
    * @param: POST $resquest
    */ 
   public function runUsuariosShow($request)
   {
       $response=$this->model->setUsuariosCreate($request);
       $this->json($response);
   }

    /**
    * Eliminar registros de Usuarios
    * @param: POST $resquest
    */ 
   public function runUsuariosDelete($request)
   {
       $response=$this->model->setUsuariosCreate($request);
       $this->json($response);
   }

    /**
    * Actualizar registros de Usuarios
    * @param: POST $resquest
    */ 
   public function runUsuariosUpdate($request)
   {
       $response=$this->model->setUsuariosCreate($request);
       $this->json($response);
   }
}
?>
