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

    public function runGestionar($request)
    {
        $this->tpl->addIni();
        $this->tpl->add('usuario', $this->getSession('usuario'));
        $this->tpl->renders('view::home/gestionar');
    }


    public function runConfiguracionConexiones($request)
    {
        $this->verificarConfiguracionDataBase();
        if(empty($request->conexion)) {
            $dataJson['data'] = $schema=$this->hoConexionesModel->getExtraerConexiones();
            $dataJson['items'] = count($schema);
            $this->json($dataJson);
        }else{
            $dataJson['data'] = $schema=$this->hoConexionesModel->getExtraerConexiones($request->conexion);
            $dataJson['items'] = count($schema);
            $this->json($dataJson);
        }

    }

    /**
     * Verifica el archivo de configuracion de las conexiones a base de datos y si no tiene relacion con la
     * base de datos la registra para que pueda ser usada
     */
    private function verificarConfiguracionDataBase()
    {
        $conf = array();
        $temp = Configuration::fileConfigApp();
        $temp = $this->parseRutaAbsolut($temp);
        $itemsDB = parse_ini_file($temp->db,true);
        foreach ($itemsDB AS $key => $value){
            $condicion = $this->hoConexionesModel->getExtraerConexionesToken($key);
            if($condicion->existe=='NO'){
                $conf['label'] = $key;
                $conf['driver'] = $value['motor'];
                $conf['host'] = $value['host'];
                $conf['db'] = $value['db'];
                $conf['usuario'] = $value['user'];
                $conf['clave'] = $value['pass'];
                $request = (object)$conf;
                $result=$this->hoConexionesModel->setDataBase($request);
            }
        }
    }

    /**
     * Permite agregar configuraciones nuevas de base de datos nuevas
     * @param Request $request, Proceso request enviado por el cliente
     * @return Json $dataJson
     */
    public function runSetDataBase($request){
        $conf = array();
        $fil = Configuration::fileConfigApp();
        $temp = $this->parseRutaAbsolut($fil);
        $result=$this->hoConexionesModel->setDataBase($request);
        if(is_null($result)){
            $dataJson['error']='1';
            $dataJson['msj']='¡Uff!, ya el registro se encuentra registrado';
        }else{

            $itemsDB = parse_ini_file($temp->db,true);
            foreach ($itemsDB AS $key => $value){
                $conf[]=$key;
            }
            if (!in_array($request->label, $conf)) {
                App::createNewConexionItemApp($request->label,  $request->driver,  $request->host,  $request->db,  $request->usuario,  $request->clave);
            }

            $dataJson['error']='0';
            $dataJson['msj']='¡Bien!, Registro efectuado exitosamente';
        }
        $this->json($dataJson);
    }

    /**
     * Permite extraer el universo de entidades asociada a una conexion de base de dato
     */
    public function runAllUniverso($request){
        $result=$this->hoConexionesModel->getAllUniverso($request);
        if(is_null($result)){
            $dataJson['error']='2';
            $dataJson['msj']='No existen registros relacionados';
        }else{
            $dataJson['error']='0';
            $dataJson['data'] = $result;
        }
        $this->json($dataJson);
    }

  /**
   * Permite registrar las entidades seleccionadas dependiendo de la conexion
   * @param $request $request
   * @param json $return
   */
    public function runSetEntidadesProcesar($request)
    {

        $result = $this->hoEntidadesModel->registrarEntidadesConfig($request->db, $request->entidad);
        $this->json($result);
    }

    /**
     * Ejecuta la todas las entidades deacuerdo a la conexion seleccionada
     * @param request $request, todo lo que se enviea por el request definido en el router
     * @return json $schema
     */
    public function runEntidadesSeleccionadas($request)
    {
        $schema=$this->hoEntidadesModel->extraerTodasLasEntidades((array)$request);
        $this->json($schema);
    }




    public function runConfiguracionVista($request)
    {
        // stdClass Object(    [connect] => 1    [tabla] => test_abm    [vista] => 0)
        if($request->vista==0) {
            $schema = $this->hoEntidadesModel->extraerDetalleEntidade((array)$request);
        }else{
            $schema = $this->hoVistasModel->extraerDetalleEntidade((array)$request);
        }

       /*Array(    [0] => stdClass Object
       (
           [id] => 273
           [conexiones_id] => 1
           [tabla] => test_autos
           [field] => id
           [type] => int(-1)
           [required] => NO
           [dimension] => -1
           [restrincion] => PRI
        )
        */
        $campo = array();
        $temp = array();
        foreach ($schema AS $key => $value){
            $campo[] = array(
                'id' =>$value->id ,
                'name' =>$value->field ,
                'tipo' =>$value->type,
                'required' => $value->required,
                'dimension' => $value->dimension,
                'restrincion' => $value->restrincion,
                'nombre' => (empty($value->nombre))?'':$value->nombre,
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
        $temp['tabla'] = $schema[0]->entidad;
        $temp['columns'] = $campo;
        $dataJson[] = $temp;
        $this->json($dataJson);
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
*/



     public function runVistaNuevaConfigurada($request)
     {
         $result=$this->hoVistasModel->setConfiguracionVistaNew($request);
         if(is_null($result)){
             $dataJson['error']='1';
             $dataJson['msj']='¡Uff!, ya el registro se encuentra registrado';
         }else{
             $dataJson['error']='0';
             $dataJson['msj']='¡Bien!, Registro efectuado exitosamente';
         }
         $this->json($dataJson);
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
    }
}
?>