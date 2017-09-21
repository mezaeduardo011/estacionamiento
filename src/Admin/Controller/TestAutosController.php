<?php
namespace APP\Admin\Controller;
use JPH\Core\Commun\Security;
use APP\Admin\Model AS Model;

/**
 * Generador de codigo de Controller de Hornero 1.0
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 21/09/2017
 * @version: 1.0
 */ 

class TestAutosController extends Controller
{
   use Security;
   public $model;
   public $session;
   public function __construct()
   {
       parent::__construct();
       $this->session = $this->authenticated();
       $this->hoTestAutosModel = new Model\TestAutosModel();
   }

    /**
    * Listar registros de TestAutos
    * @param: GET $resquest
    */ 
   public function runTestAutosIndex($request)
   {
     $this->tpl->addIni();
     $listado = $this->hoTestAutosModel->getTestAutosListar($request);
     $this->tpl->add('listado', $listado);;
     $this->tpl->add('usuario', $this->getSession('usuario'));
     $this->tpl->renders('view::vistas/testAutos/'.$this->pathVista().'/index');
   }

    /**
    * Listar registros de TestAutos
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTestAutosListar($request)
   {
      $result = $this->hoTestAutosModel->getTestAutosListar($request);
      $this->json($result);
   }

    /**
    * Crear registros de TestAutos
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTestAutosCreate($request)
   {
      $result = $this->hoTestAutosModel->setTestAutosCreate($request);
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
    * Ver registros de TestAutos
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTestAutosShow($request)
   {
      $result = $this->hoTestAutosModel->getTestAutosShow($request);
      $this->json($result[0]);
   }

    /**
    * Eliminar registros de TestAutos
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTestAutosDelete($request)
   {
      $result = $this->hoTestAutosModel->remTestAutosDelete($request);
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
    * Actualizar registros de TestAutos
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTestAutosUpdate($request)
   {
      $result = $this->hoTestAutosModel->setTestAutosUpdate($request);
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
