<?php
namespace APP\Admin\Controller;
use JPH\Core\Commun\Security;
use APP\Admin\Model AS Model;

/**
 * Generador de codigo de Controller de Hornero 4
 * @propiedad: Hornero 4
 * @autor: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 04/12/2017
 * @version: 2.0
 */ 

class SociosController extends Controller
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
       $this->hoSociosModel = new Model\SociosModel();
       $this->valSegPerfils = new Model\SegUsuariosPerfilModel();
       $this->apps = $this->pathApps(__DIR__);
       $this->entidad = $this->hoSociosModel->tabla;
       $this->vista = $this->pathVista();
       $this->comps = $this->apps .' - '. $this->entidad .' - '. $this->vista;
   }

    /**
    * Listar registros de Socios
    * @param: GET $resquest
    */ 
   public function runSociosIndex($request)
   {
     $this->permisos = 'CONSULTA|CONTROL TOTAL';
     $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos));

     $this->tpl->addIni();
     $this->tpl->add('usuario', $this->getSession('usuario'));
     $this->tpl->renders('view::vistas/socios/'.$this->pathVista().'/index');
   }

    /**
    * Listar registros de Socios
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runSociosListar($request)
   {
      // Validar roles de acceso;
      /*$this->permisos = 'CONSULTA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);

      // Bloque de proceso de la grilla
      $result = $this->formatRows($request->getParameter('obj'));
      $rows = $this->hoSociosModel->getSociosListar($request->getParameter(),$result);
      $valor = array();
      $valor['head']=$result['campos'];
      $valor['rows']=$rows; 
      $this->json($valor);*/

       // Validar roles de acceso;
       $this->permisos = 'CONSULTA|CONTROL TOTAL';
       $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);

       // Bloque de proceso de la grilla
       $result = $this->formatRows($request->getParameter('obj'));

       // Procesar los datos del modelo para el paginado
       $rows = $this->hoSociosModel->getSociosListar($request->getParameter(),$result);

       // Exportar el resultado en xml para mostrar los datos
       $this->xmlGridList($rows);
   }

    /**
    * Crear registros de Socios
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runSociosCreate($request)
   {
      $this->permisos = 'ALTA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);

      $result = $this->hoSociosModel->setSociosCreate($request->postParameter());
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
    * Ver registros de Socios
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runSociosShow($request)
   {
      $this->permisos = 'CONSULTA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);

      $result = $this->hoSociosModel->getSociosShow($request->postParameter());
      $this->json($result);
   }

    /**
    * Eliminar registros de Socios
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runSociosDelete($request)
   {
      $this->permisos = 'BAJA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);

      $result = $this->hoSociosModel->remSociosDelete($request->postParameter());
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
    * Actualizar registros de Socios
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runSociosUpdate($request)
   {
      $this->permisos = 'MODIFICACION|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);

      $result = $this->hoSociosModel->setSociosUpdate($request->postParameter());
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
