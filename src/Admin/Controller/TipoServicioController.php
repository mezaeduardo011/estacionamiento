<?php
namespace APP\Admin\Controller;
use JPH\Core\Commun\Security;
use APP\Admin\Model AS Model;

/**
 * Generador de codigo de Controller de Hornero 1.0
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 15/11/2017
 * @version: 2.0
 */ 

class TipoServicioController extends Controller
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
       $this->hoTipoServicioModel = new Model\TipoServicioModel();
       $this->valSegPerfils = new Model\SegUsuariosPerfilModel();
       $this->apps = $this->pathApps(__DIR__);
       $this->entidad = $this->hoTipoServicioModel->tabla;
       $this->vista = $this->pathVista();
       $this->comps = $this->apps .' - '. $this->entidad .' - '. $this->vista;
   }

    /**
    * Listar registros de TipoServicio
    * @param: GET $resquest
    */ 
   public function runTipoServicioIndex($request)
   {
     $this->permisos = 'CONSULTA|CONTROL TOTAL';
     $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos));
     $this->tpl->addIni();
     $this->tpl->add('usuario', $this->getSession('usuario'));
     $this->tpl->renders('view::vistas/tipoServicio/'.$this->pathVista().'/index');
   }

    /**
    * Listar registros de TipoServicio
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTipoServicioListar($request)
   {
      // Validar roles de acceso;
      $this->permisos = 'CONSULTA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
      // Bloque de proceso de la grilla
      $result = $this->formatRows($request->obj);
      $rows = $this->hoTipoServicioModel->getTipoServicioListar($request,$result);
      $valor = array();
      $valor['head']=$result['campos'];
      $valor['rows']=$rows; 
      $this->json($valor);
      $this->json($result);
   }

    /**
    * Crear registros de TipoServicio
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTipoServicioCreate($request)
   {
      $this->permisos = 'ALTA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
      $result = $this->hoTipoServicioModel->setTipoServicioCreate($request);
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
    * Ver registros de TipoServicio
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTipoServicioShow($request)
   {
      $this->permisos = 'CONSULTA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
      $result = $this->hoTipoServicioModel->getTipoServicioShow($request);
      $this->json($result);
   }

    /**
    * Eliminar registros de TipoServicio
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTipoServicioDelete($request)
   {
      $this->permisos = 'BAJA|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
      $result = $this->hoTipoServicioModel->remTipoServicioDelete($request);
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
    * Actualizar registros de TipoServicio
    * @param: POST $resquest
    * @return: JSON $result
    */ 
   public function runTipoServicioUpdate($request)
   {
      $this->permisos = 'MODIFICACION|CONTROL TOTAL';
      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);
      $result = $this->hoTipoServicioModel->setTipoServicioUpdate($request);
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
