<?php
namespace APP\Admin\Controller;
use JPH\Core\Commun\Constant;
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
   /* Variables de Seguridad */
   private $apps;
   private $entidad;
   private $vista;
   private $permisos;
   public $comps;
   /* Fin de Variables de Seguridad */
   public function __construct()
   {
       parent::__construct();
       $this->session = $this->authenticated();
       $this->hoTestAutosModel = new Model\TestAutosModel();
       $this->valSegPerfils = new Model\SegUsuariosPerfilModel();

       $this->apps = $this->pathApps(__DIR__);
       $this->entidad = $this->hoTestAutosModel->tabla;
       $this->vista = $this->pathVista();

       $this->comps = $this->apps .' - '. $this->entidad .' - '. $this->vista;
   }

    /**
    * Listar registros de TestAutos
    * @param: GET $resquest
    */
   public function runTestAutosIndex($request)
   {
     $this->permisos = 'CONSULTA|CONTROL TOTAL';
     $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos));
     $this->tpl->addIni();
     $listado = $this->hoTestAutosModel->getTestAutosListar($request);
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
      $this->permisos = 'CONSULTA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
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
      $this->permisos = 'ALTA|CONTROL TOTAL';
       $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
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
      $this->permisos = 'CONSULTA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
      $result = $this->hoTestAutosModel->getTestAutosShow($request);
      $this->json($result);
   }

    /**
    * Eliminar registros de TestAutos
    * @param: POST $resquest
    * @return: JSON $result
    */
   public function runTestAutosDelete($request)
   {
       $this->permisos = 'BAJA|CONTROL TOTAL';
       $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
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
       $this->permisos = 'MODIFICACION|CONTROL TOTAL';
       $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
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
