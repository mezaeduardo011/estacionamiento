<?php
namespace APP\Admin\Controller;
use JPH\Core\Commun\Security;
use APP\Admin\Model AS Model;

/**
 * Generador de codigo de Controller de Hornero 1.0
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 03/10/2017
 * @version: 2.0
 */ 

class PersonalController extends Controller
{
   use Security;
   public $model;
   public $session;

   // Variables de Seguridad asociado a los roles
   private $apps;
   private $entidad;
   private $vista;
   private $permisos;
   public $comps;

   public function __construct()
   {
       parent::__construct();
       $this->session = $this->authenticated();
       $this->hoPersonalModel = new Model\PersonalModel();
       $this->valSegPerfils = new Model\SegUsuariosPerfilModel();
       $this->apps = $this->pathApps(__DIR__);
       $this->entidad = $this->hoPersonalModel->tabla;
       $this->vista = $this->pathVista();
       $this->comps = $this->apps .' - '. $this->entidad .' - '. $this->vista;
   }

    /**
    * Listar registros de Personal
    * @param: GET $resquest
    */ 
   public function runPersonalIndex($request)
   {
     $this->permisos = 'CONSULTA|CONTROL TOTAL';
     $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos));
     $this->tpl->addIni();
     $listado = $this->hoPersonalModel->getPersonalListar($request);
     $this->tpl->add('usuario', $this->getSession('usuario'));
     $this->tpl->renders('view::vistas/personal/'.$this->pathVista().'/index');
   }

    /**
    * Listar registros de Personal
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runPersonalListar($request)
   {
      $this->permisos = 'CONSULTA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
      $result = $this->hoPersonalModel->getPersonalListar($request);
      $this->json($result);
   }

    /**
    * Crear registros de Personal
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runPersonalCreate($request)
   {
      $this->permisos = 'ALTA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
      $result = $this->hoPersonalModel->setPersonalCreate($request);
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
    * Ver registros de Personal
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runPersonalShow($request)
   {
      $this->permisos = 'CONSULTA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
      $result = $this->hoPersonalModel->getPersonalShow($request);
      $this->json($result);
   }

    /**
    * Eliminar registros de Personal
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runPersonalDelete($request)
   {
      $this->permisos = 'BAJA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
      $result = $this->hoPersonalModel->remPersonalDelete($request);
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
    * Actualizar registros de Personal
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runPersonalUpdate($request)
   {
      $this->permisos = 'MODIFICACION|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
      $result = $this->hoPersonalModel->setPersonalUpdate($request);
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
