<?php
namespace APP\admin\Controller;
namespace APP\Admin\Controller;
use JPH\Core\Commun\Constant;
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
       $this->hoSegRolesModel = new Model\SegRolesModel();
   }

    public function runInformarProceso($resquest){
       $data['msj']='Procesando la Vista:'.$this->cache->get('proceso');
       $data['proceso']=$this->cache->get('proceso');
       $data['alter'] = $this->cache->get('alter');
       $this->json($data);
   }

    public function runGestionar($request)
    {
        $this->tpl->addIni();
        $this->tpl->add('usuario', $this->getSession('usuario'));
        $this->tpl->renders('view::home/gestionar');
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
                   $aplicativo = $campos[0]->apps; // Aplicacion
                   $crudVista = new AppCrudVista();
                   $crudVista -> createStructuraFileCRUD($aplicativo,$nombreVista,$entidad,$campos,$columnsReal);
                   $this->hoVistasModel->updateStatusVista($aplicativo,$campos[0]->conexiones_id, $entidad,$nombreVista);
                   $this->hoSegRolesModel->setSegRolesGeneradorVistaAcceso($campos[0]->apps,$campos[0]->entidad,$campos[0]->nombre);
               }
           }
           // Elemto encargado de procesar los roles automaticos de usuarios
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
            // Consulta cuando es nuevo
            $schema = $this->hoEntidadesModel->extraerDetalleEntidade((array)$request);
        }else{
            // Consulta cuando existe la vista
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

        $temp['apps'] = (isset($schema[0]->apps))?$schema[0]->apps:0;
        $temp['conexion'] = $schema[0]->conexiones_id;
        $temp['tabla'] = $schema[0]->entidad;
        $temp['columns'] = $campo;
        $dataJson[] = $temp;
        $this->json($dataJson);
    }

    public function runShowVista($request)
    {
        $dataJson = $this->hoVistasModel->getShowVista($request);
        $this->json($dataJson);
    }
    /**
     * Permite visualizar las aplicaciones que existen dentro del sistema
     */
    public function runGetListApp(){
        $list = array_diff(scandir(Constant::DIR_SRC), array('..', '.'));
        $a = 0;
        $valor=false;
        foreach ($list AS $key => $value){
            $valor[$a]=$value;
            $a++;
        }
        $dataJson['seleApps']=$valor;
        $this->json($dataJson);
    }

    public function runCreateTablas($request )
    {
        $result = $this->hoEntidadesModel->setEstructuraCreateTabla($request);
        if(is_null($result)){
            $dataJson['error']='1';
            $dataJson['msj']='¡Uff!, ya el registro se encuentra registrado';
        }else{
            $dataJson['error']='0';
            $dataJson['msj']='¡Bien!, entidad creada exitosamente';
        }
        $this->json($dataJson);
    }

}
?>
