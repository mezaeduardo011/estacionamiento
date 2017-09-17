<?php
namespace APP\Admin\Controller;
use JPH\Core\Commun\Security;
use APP\Admin\Model AS Model;

/**
 * Generador de codigo de Controller de Hornero 1.0
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 17/09/2017
 * @version: 1.0
 */ 

class TestAbmController extends Controller
{
   use Security;
   public $model;
   public $session;
   public function __construct()
   {
       parent::__construct();
       $this->session = $this->authenticated();
       $this->hoTestAbmModel = new Model\TestAbmModel();
   }

    /**
    * Listar registros de TestAbm
    * @param: GET $resquest
    */ 
   public function runTestAbmIndex($request)
   {
     $this->tpl->addIni();
     $this->tpl->add('usuario', $this->getSession('usuario'));
     $this->tpl->renders('view::vistas/testAbm/raumarys/index');
   }

    /**
    * Listar registros de TestAbm
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTestAbmListar($request)
   {
      $result = $this->hoTestAbmModel->getTestAbmListar($request);
      $this->json($result);
   }

    /**
    * Crear registros de TestAbm
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTestAbmCreate($request)
   {
      $result = $this->hoTestAbmModel->setTestAbmCreate($request);
      $this->json($result);
   }

    /**
    * Ver registros de TestAbm
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTestAbmShow($request)
   {
      $result = $this->hoTestAbmModel->getTestAbmShow($request);
      $this->json($result);
   }

    /**
    * Eliminar registros de TestAbm
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTestAbmDelete($request)
   {
      $result = $this->hoTestAbmModel->remTestAbmDelete($request);
      $this->json($result);
   }

    /**
    * Actualizar registros de TestAbm
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTestAbmUpdate($request)
   {
      $result = $this->hoTestAbmModel->setTestAbmUpdate($request);
      $this->json($result);
   }
}
?>
