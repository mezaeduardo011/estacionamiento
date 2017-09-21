<?php
namespace APP\admin\Controller;
namespace APP\Admin\Controller;
use JPH\Core\Commun\Security;
use APP\Admin\Model AS Model;
use JPH\Core\Console\{AppCrudVista};
use JPH\Core\Load\Configuration;
use APP\Admin\Model\{HoEntidadesModel,HoConexionesModel,HoVistasModel};
/**
 * Generador de codigo de Controller de Hornero 1.0
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 16/09/2017
 * @version: 1.0
 */ 
class GestionarController extends Controller
{
    public $model;
    public $session;
    public $result;
    public $pathActivo;
    use Security;
   public function __construct()
   {
       parent::__construct();
       $this->session = $this->authenticated();
       $this->model = new Model\HomeModel();
       $this->hoConexionesModel = new Model\HoConexionesModel();
       $this->hoEntidadesModel = new model\HoEntidadesModel();
       $this->hoVistasModel = new model\HoVistasModel();
       $this->pathActivo = 'Admin';
   }

   public function runInformarProceso($resquest){
       $data['msj']='Procesando la Vista:'.$this->cache->get('proceso');
       $data['proceso']=$this->cache->get('proceso');
       $data['alter'] = $this->cache->get('alter');
       $this->json($data);
   }
   public function runProcesarCrudVistas($request)
   {
       $schema = $this->hoVistasModel->extraerDetalleEntidadListado((array)$request);

       foreach ($schema AS $entidad => $views){
           $columnsReal = NULL;
           $columnsReal = $views['columnas'];
           unset($views['columnas']);
            //print_r($columnsReal);die();
           // sleep(20);
           foreach ($views AS $nombreVista => $campos) {
               if (count($campos) > 0) {
                   $aplicativo = $this->pathActivo;
                   $crudVista = new AppCrudVista();
                   $crudVista -> createStructuraFileCRUD($aplicativo,$nombreVista,$entidad,$campos,$columnsReal);
                   $this->hoVistasModel->updateStatusVista($campos[0]->conexiones_id, $entidad,$nombreVista);
               }

           }

       }

       $result=true;

       if(is_null($result)){
           $dataJson['error']='1';
           $dataJson['msj']='Error en generar el sistema';
       }else{
           $dataJson['error']='0';
           $dataJson['msj'] = 'Todo fue procesado exitosamente';
       }
       $this->json($dataJson);

   }
}
?>
