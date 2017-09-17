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
       $schema = $this->hoVistasModel->extraerDetalleEntidadeListado((array)$request);
       foreach ($schema AS $key => $value){
         // sleep(20);
            echo $key;
            $this->pp($schema);
           if(count($value)>0){
               $aplicativo = $this->pathActivo;
               $nombreVista = $value[0]->nombre;
               $entidad = $key;
               $campos = $value;
               $crudVista = new AppCrudVista();
               echo $crudVista -> createStructuraFileCRUD($aplicativo,$nombreVista,$entidad,$campos);
               continue;
           }
           //$this->cache->set('tabla',$key);
           //$this->cache->set('proceso',100);
           //$this->cache->set('alter','modificando file 3'.$a);
       }
      /* $campo = array();
       $temp = array();
       foreach ($schema AS $key => $value){
           $campo[] = array(
               'id' =>$value->id ,
               'name' =>$value->field ,
               'tipo' =>$value->type,
               'required' => $value->required,
               'dimension' => $value->dimension,
               'restrincion' => $value->restrincion,
               'nombre' => (empty($value->nombre))?'':@$value->nombre,
               'label' => (empty($value->label))?'':@$value->label,
               'mascara' => (empty($value->mascara))?'':@$value->mascara,
               'place_holder' => (empty($value->place_holder))?'':@$value->place_holder,
               'vista_campo' => (empty($value->vista_campo))?'':@$value->vista_campo,
               'orden' => (empty($value->orden))?'':@$value->orden,
               'hidden_form' => (empty($value->hidden_form))?'':@$value->hidden_form,
               'hidden_list' => (empty($value->hidden_list))?'':@$value->hidden_list
           );
       }

       $temp['conexion'] = $schema[0]->conexiones_id;
       $temp['tabla'] = $schema[0]->tabla;
       $temp['columns'] = $campo;
       $dataJson[] = $temp;*/

   }
}
?>
