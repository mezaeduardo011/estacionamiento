<?php
namespace APP\Admin\Controller;
use JPH\Core\Commun\Security;
use APP\Admin\Model AS Model;
use JPH\Core\Console\App;
use JPH\Core\Load\Configuration;
use APP\Admin\Model\{HoEntidadesModel,HoConexionesModel,HoVistasModel};


/**
 * Generador de codigo de Controller de Hornero 0.8
 * @propiedad: Hornero 0.8
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 04/08/2017
 * @version: 1.0
 */
class HomeController extends Controller{
     public $model;
     public $session;
     public $result;
     use Security;

     public function __construct()
     {
         parent::__construct();
         $this->session = $this->authenticated();
         $this->model = new Model\HomeModel();
         $this->hoConexionesModel = new Model\HoConexionesModel();
         $this->hoEntidadesModel = new model\HoEntidadesModel();
         $this->hoVistasModel = new model\HoVistasModel();
     }
     /**
      * Method encargado de mostrar la pantalla de inicio del sistema
      * @param request $request
      * @return html $view
      */
     public function runIndex($request)
     {
         $this->tpl->addIni();
         $this->tpl->add('usuario', $this->getSession('usuario'));
         $this->tpl->renders('view::home/home');
     }




     /**
      * Ejecuta la precunfiguracion de la base de datos donde extrae los datos del sistema y la base de datos
      * @param request $request, todo lo que se enviea por el request definido en el router
      * @return html en la vista

     public function runPreConfig($request)
     {
        $schema=$this->model->extraerTodasLasEntidades();
        $this->tpl->addIni();
        $this->tpl->add('tablas',$schema);
        $this->tpl->renders('view::home/preConfig');
     }






     public function runConfigCampos($request)
     {
         $item = array();
         $item2 = array();
         $desc = array();

         $select = $this->model->extraerEntidades();

         foreach ($select as $key => $value) {
             $tmp = $this->model->extraerDescribe($value);
             $item[$value] = $tmp;
             $temp = array();
             foreach ($tmp AS $init => $campos){
                 $temp[]=$campos->Field;
             }
             $desc[$value] = $temp;
         }

         $schema=$this->model->extraerLasEntidades();

         foreach ($schema as $keys => $values) {
            $tmp2 = $this->model->extraerDescribe($values->entidad);
            $item2[$values->entidad] = $tmp2;
         }

         $this->tpl->addIni();
         $this->tpl->add('select',$desc);
         $this->tpl->add('schema',$item2);
         $this->tpl->renders('view::fields/configCampos');
    }*/
}
?>