<?php
namespace JPH\Core\Console;
use JPH\Core\Commun\{All,SimpleXMLExtended};

/**
 * Permite integrar un conjunto de funcionalidades que permite generar CRUD de forma automatica
 * @Author: Gregorio Bolívar <elalconxvii@gmail.com>
 * @Author: Blog: <http://gbbolivar.wordpress.com>
 * @created Date: 09/08/2017
 * @updated Date: 16/09/2017
 * @version: 5.0.4
 */


class AppCrudVista extends App
{
    /**
     * AppCrud constructor.
     */

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Instanciador de eventos para generar las vistas
     * @param string $app, Nombre de la apicacion
     * @param string $crud, nombre del la Vista
     * @param string $tabla, nombre de la tabla
     * @param array $campos, arrego de los campos que tiene la la vista
     * @param array $columnsReal, arrego de los campos que tiene la vista
     * @return bool true
     */
    public function createStructuraFileCRUD($app,$crud,$tabla,$campos,$columnsReal)
    {

       // echo 'App:'.$app.'--,Crud:'.$crud.'--,tabla:'.$tabla; //die();
        foreach ($campos AS $key=>$value)
        {
            if($key==0){
                $campos['entida'] = $value->entidad;
                $campos['vista'] = $value->nombre;
            }
            if($value->restrincion=='PRI'){
                $campos['pk'] = $value->field;
            }
            $temp[]=$value->field;
            $temp1[]=$value->label;
            //   [hidden_form] => 1 | [hidden_list] => 1 | [relacionado] 1 | [tabla_vista] personal--personalD1 | [vista_campo] id
            $hidden_f=(empty($value->hidden_form))?0:$value->hidden_form;
            $hidden_l=(empty($value->hidden_list))?0:$value->hidden_list;
            $relacion=(empty($value->relacionado))?0:$value->relacionado;
            $vista=(empty($value->tabla_vista))?0:$value->tabla_vista;
            $campo=(empty($value->vista_campo))?0:$value->vista_campo;
            $temp2[$value->field]=$hidden_f.'|'.$hidden_l.'|'.$relacion.'|'.$vista.'|'.$campo;
        }
        $requerido = $temp2;
        $campos['campos']= $temp;
        $campRealEnti = array();

        foreach ($columnsReal AS $key=>$value)
        {
            if($key==0){
                $campRealEnti['entida'] = $value->entidad;
                //$columnsReal['vista'] = $value->nombre;
            }
            if($value->restrincion=='PRI'){
                $campRealEnti['pk'] = $value->field;
            }else{
                $temp[]=$value->field;
            }

            //$temp1[]=$value->label;
        }
        // Permite quitar los indices repetidos
        $campRealEnti['campos'] = array_unique($temp);

        //print_r($campRealEnti); die();

        $this->app = All::upperCase($app);
        $ruta = $this->pathapp.$app.All::APP_CONTR;

        // Permite valirar si existe la app donde va el controller
        if (!file_exists($ruta)) {
            die(sprintf('The application "%s" does not exist.', $this->app));
        }else{
            // Variables necesarias para enviar generar las Vistas
            $controller = All::upperCase($crud);
            $entidad = All::upperCase($tabla);
            $rutaApp = $this->pathapp.$app;
            $temp = All::parseRutaAbsolut($rutaApp);
            $rutaPadre = $temp->scalar.All::APP_VISTA.DIRECTORY_SEPARATOR.ALL::cameCase($tabla);
            $rutaHija  = $rutaPadre.DIRECTORY_SEPARATOR.strtolower($crud);
            $rutaVista = 'vistas'.'/'.ALL::cameCase($tabla).'/'.strtolower($crud);
            $rutaVistaD = 'vistas'.'/'.ALL::cameCase($tabla).'/';

            // Verificar si existe controllador
            $archivoController = $rutaApp.All::APP_CONTR.DIRECTORY_SEPARATOR."".$entidad."Controller.php";
            if (file_exists($archivoController)) {
                $msj=Interprete::getMsjConsole($this->active,'app:crud-existe');
            }else{
                self::createFileReadControllerCRUD($archivoController,$this->app,$entidad,$campos,$rutaVistaD);
            }
            // Verificar si existe modelo $ruta."Model.php"
            $archivoModel = $rutaApp.All::APP_MODEL.DIRECTORY_SEPARATOR."".$entidad."Model.php";
            if (file_exists($archivoModel)) {
                $msj=Interprete::getMsjConsole($this->active,'app:crud-existe');

            }else{
               self::createFileModelCRUD($archivoModel,$this->app,$entidad,$campRealEnti);
            }
            // Verificar si existe el Router.xml
            $archivoRoute = $rutaApp.All::APP_ROUTE.DIRECTORY_SEPARATOR."Router.xml";
            $existe = self::existsRuta($archivoRoute,$crud);
            if ($existe) {
                $msj=Interprete::getMsjConsole($this->active,'app:crud-existe');
            }else{ ///'.strtolower($controller).'
                self::createNewRutaXmlCRUD($archivoRoute,$controller,$tabla);
            }
            // Permite crear la carpeta donde estará el proyecto
            self::createDirViews($rutaPadre,$rutaHija);
            // Permite crear los archivos de la vista
            self::createFileViewIndex($rutaHija, $campos, $rutaVista,$requerido);
            self::createFileViewAssent($rutaHija, $campos, $rutaVista,$requerido);
            self::createFileViewForm($rutaHija, $campos,$requerido);
            self::createFileViewListado($rutaHija, $campos,$requerido);

            $msj=Interprete::getMsjConsole($this->active,'app:crud-creado');

        }
        $msj=All::mergeTaps($msj,array('app'=>$this->app,'controller'=>$entidad));
        return true;
    }

    /**
     * Permote crear el direcrorio donde se almacenaran las vista de la aplicacion
     * @return boolean
     */
    private function createDirViews($rutaPadre,$rutaHija)
    {
        if (!file_exists($rutaPadre)) {
            All::mkddir($rutaPadre);
        }
        if (!file_exists($rutaHija)) {
            All::mkddir($rutaHija);
        }

    }

    /**
     * Permite crear una plantilla archivo encargado de procesar el controller simple
     * @param string $ruta, ruta donde esta el xml
     * @param string $app, aplicacion que levanta los datos
     * @param string $controller, controller que se creara en el momento
     * @param string $campos, ruta de la vista dinamica que segenera
     * @param string $rutaVista, ruta de la vista dinamica que segenera
     */
    private function createFileReadControllerCRUD($archivoController, $app , $controller,  $campos,  $rutaVista)
    {
        $ar = fopen($archivoController, "w+") or die("Problemas en la creaci&oacute;n del controlador del apps " . $app);
        // Inicio la escritura en el activo
        fputs($ar, '<?php'.PHP_EOL);
        fputs($ar, 'namespace APP\\'.$app.'\\Controller;'.PHP_EOL);
        fputs($ar, 'use JPH\\Core\\Commun\\Security;'.PHP_EOL);
        fputs($ar, 'use APP\\Admin\\Model AS Model;'.PHP_EOL.PHP_EOL);

        fputs($ar, '/**'.PHP_EOL);
        fputs($ar, ' * Generador de codigo de Controller de '.All::FW.' '.All::VERSION.''.PHP_EOL);
        fputs($ar, ' * @propiedad: '.All::FW.' '.All::VERSION.''.PHP_EOL);
        fputs($ar, ' * @utor: Gregorio Bolivar <elalconxvii@gmail.com>'.PHP_EOL);
        fputs($ar, ' * @created: ' .date('d/m/Y') .''.PHP_EOL);
        fputs($ar, ' * @version: 2.0'.PHP_EOL);
        fputs($ar, ' */ '.PHP_EOL.PHP_EOL);

        fputs($ar, 'class '.$controller.'Controller extends Controller'.PHP_EOL);
        fputs($ar, "{".PHP_EOL);
        fputs($ar, '   use Security;'.PHP_EOL);
        fputs($ar, '   public $model;'.PHP_EOL);
        fputs($ar, '   public $session;'.PHP_EOL.PHP_EOL);
        fputs($ar, '   // Variables de Seguridad asociado a los roles'.PHP_EOL);
        fputs($ar, '   private $apps;'.PHP_EOL);
        fputs($ar, '   private $entidad;'.PHP_EOL);
        fputs($ar, '   private $vista;'.PHP_EOL);
        fputs($ar, '   private $permisos;'.PHP_EOL);
        fputs($ar, '   public $comps;'.PHP_EOL.PHP_EOL);

        fputs($ar, '   public function __construct()'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '       parent::__construct();'.PHP_EOL);
        fputs($ar, '       $this->session = $this->authenticated();'.PHP_EOL);
        fputs($ar, '       $this->ho'.$controller.'Model = new Model\\'.$controller.'Model();'.PHP_EOL);
        fputs($ar, '       $this->valSegPerfils = new Model\SegUsuariosPerfilModel();'.PHP_EOL);
        fputs($ar, '       $this->apps = $this->pathApps(__DIR__);'.PHP_EOL);
        fputs($ar, '       $this->entidad = $this->ho'.$controller.'Model->tabla;'.PHP_EOL);
        fputs($ar, '       $this->vista = $this->pathVista();'.PHP_EOL);
        fputs($ar, '       $this->comps = $this->apps .\' - \'. $this->entidad .\' - \'. $this->vista;'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);

        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Listar registros de '.$controller.PHP_EOL);
        fputs($ar, '    * @param: GET $resquest'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function run'.$controller.'Index($request)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '     $this->permisos = \'CONSULTA|CONTROL TOTAL\';'.PHP_EOL);
        fputs($ar, '     $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos));'.PHP_EOL);
        fputs($ar, '     $this->tpl->addIni();'.PHP_EOL);
        fputs($ar, '     $listado = $this->ho'.$controller.'Model->get'.$controller.'Listar($request);'.PHP_EOL);
        //fputs($ar, '     $this->tpl->add(\'listado\', $listado);;'.PHP_EOL);
        fputs($ar, '     $this->tpl->add(\'usuario\', $this->getSession(\'usuario\'));'.PHP_EOL);//
        fputs($ar, '     $this->tpl->renders(\'view::'.$rutaVista.'\'.$this->pathVista().\'/index\');'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);

        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Listar registros de '.$controller.PHP_EOL);
        fputs($ar, '    * @param: POST $resquest'.PHP_EOL);
        fputs($ar, '    * @return: JSON $result'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function run'.$controller.'Listar($request)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '      $this->permisos = \'CONSULTA|CONTROL TOTAL\';'.PHP_EOL);
        fputs($ar, '      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);'.PHP_EOL);
        fputs($ar, '      $result = $this->ho'.$controller.'Model->get'.$controller.'Listar($request);'.PHP_EOL);
        fputs($ar, '      $this->json($result);'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);

        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Crear registros de '.$controller.PHP_EOL);
        fputs($ar, '    * @param: POST $resquest'.PHP_EOL);
        fputs($ar, '    * @return: JSON $result'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function run'.$controller.'Create($request)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '      $this->permisos = \'ALTA|CONTROL TOTAL\';'.PHP_EOL);
        fputs($ar, '      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);'.PHP_EOL);
        fputs($ar, '      $result = $this->ho'.$controller.'Model->set'.$controller.'Create($request);'.PHP_EOL);
        fputs($ar, '      if(is_null($result)){'.PHP_EOL);
        fputs($ar, '        $dataJson[\'error\']=\'1\';'.PHP_EOL);
        fputs($ar, '        $dataJson[\'msj\']=\'Error en procesar el registro\';'.PHP_EOL);
        fputs($ar, '      }else{;'.PHP_EOL);
        fputs($ar, '        $dataJson[\'error\']=\'0\';'.PHP_EOL);
        fputs($ar, '        $dataJson[\'msj\'] = \'Registro efectuado exitosamente\';'.PHP_EOL);
        fputs($ar, '      }'.PHP_EOL);
        fputs($ar, '      $this->json($dataJson);'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);

        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Ver registros de '.$controller.PHP_EOL);
        fputs($ar, '    * @param: POST $resquest'.PHP_EOL);
        fputs($ar, '    * @return: JSON $result'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function run'.$controller.'Show($request)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '      $this->permisos = \'CONSULTA|CONTROL TOTAL\';'.PHP_EOL);
        fputs($ar, '      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);'.PHP_EOL);
        fputs($ar, '      $result = $this->ho'.$controller.'Model->get'.$controller.'Show($request);'.PHP_EOL);
        fputs($ar, '      $this->json($result);'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);

        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Eliminar registros de '.$controller.PHP_EOL);
        fputs($ar, '    * @param: POST $resquest'.PHP_EOL);
        fputs($ar, '    * @return: JSON $result'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function run'.$controller.'Delete($request)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '      $this->permisos = \'BAJA|CONTROL TOTAL\';'.PHP_EOL);
        fputs($ar, '      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);'.PHP_EOL);
        fputs($ar, '      $result = $this->ho'.$controller.'Model->rem'.$controller.'Delete($request);'.PHP_EOL);
        fputs($ar, '      if(is_null($result)){'.PHP_EOL);
        fputs($ar, '        $dataJson[\'error\']=\'0\';'.PHP_EOL);
        fputs($ar, '        $dataJson[\'msj\']=\'Registro eliminado exitosamente\';'.PHP_EOL);
        fputs($ar, '      }else{'.PHP_EOL);
        fputs($ar, '        $dataJson[\'error\']=\'1\';'.PHP_EOL);
        fputs($ar, '        $dataJson[\'msj\'] = \'Error en procesar la actualizacion\';'.PHP_EOL);
        fputs($ar, '      }'.PHP_EOL);
        fputs($ar, '      $this->json($dataJson);'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);

        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Actualizar registros de '.$controller.PHP_EOL);
        fputs($ar, '    * @param: POST $resquest'.PHP_EOL);
        fputs($ar, '    * @return: JSON $result'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function run'.$controller.'Update($request)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '      $this->permisos = \'MODIFICACION|CONTROL TOTAL\';'.PHP_EOL);
        fputs($ar, '      $this->validatePermisos($this->valSegPerfils->valSegPerfilRelacionUser($this->comps,$this->permisos),true);'.PHP_EOL);
        fputs($ar, '      $result = $this->ho'.$controller.'Model->set'.$controller.'Update($request);'.PHP_EOL);
        fputs($ar, '      if(is_null($result)){'.PHP_EOL);
        fputs($ar, '        $dataJson[\'error\']=\'0\';'.PHP_EOL);
        fputs($ar, '        $dataJson[\'msj\']=\'Actualizacion efectuado exitosamente\';'.PHP_EOL);
        fputs($ar, '      }else{'.PHP_EOL);
        fputs($ar, '        $dataJson[\'error\']=\'1\';'.PHP_EOL);
        fputs($ar, '        $dataJson[\'msj\'] = \'Error en procesar la actualizacion\';'.PHP_EOL);
        fputs($ar, '      }'.PHP_EOL);
        fputs($ar, '        $this->json($dataJson);'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL);
        fputs($ar, '}'.PHP_EOL);
        fputs($ar, '?>'.PHP_EOL);
        // Cierro el archivo y la escritura
        fclose($ar);

    }


    /**
     * Permite generar un formato del archivo modelo dentro de la aplicacion seleccionada
     * @param string $app, Nombre de la aplicacion a la cual se genera el modelo
     * @param string $modelo, Nombre del modelo a ser generado
     */
    private function createFileModelCRUD(string $archivoModel, string $app, string $modelo , $campos)
    {

        unset($campos['campos'][0]);
        $app = All::upperCase($app);

        $ar = fopen($archivoModel, "w+") or die("Problemas en la add del model del apps". $app);
        $camposCompleto = $campos['campos'];
        // Inicio la escritura en el activo
        fputs($ar, '<?php'.PHP_EOL);
        fputs($ar, 'namespace APP\\'.$app.'\\Model;'.PHP_EOL);
        fputs($ar, 'use JPH\\Complements\\Database\\Main;'.PHP_EOL);
        fputs($ar, 'use JPH\\Core\\Commun\\{All,Security};'.PHP_EOL);
        fputs($ar, '/**'.PHP_EOL);
        fputs($ar, ' * Generador de codigo del Modelo de la App '.$app.PHP_EOL);
        fputs($ar, ' * @propiedad: '.All::FW.' '.All::VERSION.''.PHP_EOL);
        fputs($ar, ' * @utor: Gregorio Bolivar <elalconxvii@gmail.com>'.PHP_EOL);
        fputs($ar, ' * @created: ' .date('d/m/Y') .''.PHP_EOL);
        fputs($ar, ' * @version: 1.0'.PHP_EOL);
        fputs($ar, ' */ '.PHP_EOL.PHP_EOL);
        fputs($ar, "class ". $modelo."Model extends Main".PHP_EOL);
        fputs($ar, "{".PHP_EOL);
        fputs($ar, "   use Security;".PHP_EOL);
        fputs($ar, '   public function __construct()'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '       $this->tabla = \''.$campos['entida'].'\';'.PHP_EOL);
        fputs($ar, '       $this->campoid = array(\''.$campos['pk'].'\');'.PHP_EOL);
        fputs($ar, '       $this->campos = array(\''.implode("','",$campos['campos']).'\');'.PHP_EOL);
        fputs($ar, '       parent::__construct();'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);

        // Permite extraer las entidades de la conexion actual desde la informacion schema
        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Extraer todos los registros de '.$modelo.PHP_EOL);
        fputs($ar, '    * @return array $tablas'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function get'.$modelo.'Listar($datos)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '     $tablas=$this->leerTodos($datos);'.PHP_EOL);
        fputs($ar, '     return $tablas;'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);

        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Crear registros nuevos de '.$modelo.PHP_EOL);
        fputs($ar, '    * @param: Array $datos'.PHP_EOL);
        fputs($ar, '    * @return array $tablas'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function set'.$modelo.'Create($datos)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '     $this->fijarValores($datos);'.PHP_EOL);
        // Valores reservados del Sistema
        if (in_array("created_usuario_id", $camposCompleto)) {
            fputs($ar, '     $this->fijarValor(\'created_usuario_id\',$user->id);'.PHP_EOL);
        }
        if (in_array("created_at", $camposCompleto)) {
            fputs($ar, '     $this->fijarValor(\'created_at\',All::now());'.PHP_EOL);
        }
        // Fin de seteo de valores reservado del sistema
        fputs($ar, '     $this->guardar();'.PHP_EOL);
        fputs($ar, '     $val = $this->lastId();'.PHP_EOL);
        fputs($ar, '     return $val;'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);

        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Extraer un registros de '.$modelo.PHP_EOL);
        fputs($ar, '    * @param: String $id'.PHP_EOL);
        fputs($ar, '    * @return array $tablas'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function get'.$modelo.'Show($data)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '     $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$data->data;'.PHP_EOL);
        fputs($ar, '     $tmp=$this->executeQuery($sql);'.PHP_EOL);
        fputs($ar, '     $tablas[\'datos\'] = $tmp[0];'.PHP_EOL);
        fputs($ar, '     $tablas[\'error\'] = 0;'.PHP_EOL);
        fputs($ar, '     return $tablas;'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);

        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Eliminar registros de '.$modelo.PHP_EOL);
        fputs($ar, '    * @param: string $id'.PHP_EOL);
        fputs($ar, '    * @return array $tablas'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function rem'.$modelo.'Delete($datos)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '      $valor=base64_decode($datos->obj);'.PHP_EOL);
        fputs($ar, '      $this->fijarValor(\'id\',$valor);'.PHP_EOL);
        fputs($ar, '      $val = $this->borrar();'.PHP_EOL);
        fputs($ar, '      return $val;'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);

        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Actualizar registros de '.$modelo.PHP_EOL);
        fputs($ar, '    * @param: arreglo $obj'.PHP_EOL);
        fputs($ar, '    * @return array $tablas'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function set'.$modelo.'Update($datos)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '     $this->fijarValores($datos);'.PHP_EOL);
        // Valores reservados del Sistema
        if (in_array("updated_usuario_id", $camposCompleto)) {
            fputs($ar, '     $this->fijarValor(\'updated_usuario_id\',$user->id);'.PHP_EOL);
        }
        if (in_array("updated_at", $camposCompleto)) {
            fputs($ar, '     $this->fijarValor(\'updated_at\',All::now());'.PHP_EOL);
        }
        // Fin de seteo de valores reservado del sistema
        fputs($ar, '     $val = $this->guardar();'.PHP_EOL);
        fputs($ar, '     return $val;'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL);
        fputs($ar, '}'.PHP_EOL);
        fputs($ar, '?>'.PHP_EOL);
        // Cierro el archivo y la escritura
        fclose($ar);
    }


    /**
     * Method encargado de procesar rutas asociadas al al sistema
     * @param string $archivoRoute, ruta donde se hace el proceso donde esta la apliacion
     * @param string $controller, nombre del controllador
     * @param string $tabla, nombre con el cual se llama al sistema
     * @param string $method, permite identificar cual es el method que debe instanciar el clase
     * @param string $request, permite identificar si el method GET o POST
     */

    private function createNewRutaXmlCRUD(string $archivoRoute, string $controller, string $tabla)
{
    $router = new SimpleXMLExtended($archivoRoute, null, true) or die("Problemas en la creaci&oacute;n del router del apps Router.xml");
    $router->addComentario(' Bloque de configuracion de la ruta del controller '.ucfirst($controller));
    // Listar registro
    $personaje = $router->addChild('link');
    $personaje->addChild('name', '/'.strtolower($controller).'Index');
    $personaje->addChild('controller', All::cameCase($tabla));
    $personaje->addChild('method', 'run'.All::upperCase($tabla).'Index');
    $personaje->addChild('request', 'GET');
    //
    $personaje = $router->addChild('link');
    $personaje->addChild('name', '/'.strtolower($controller).'Listar');
    $personaje->addChild('controller', All::cameCase($tabla));
    $personaje->addChild('method', 'run'.All::upperCase($tabla).'Listar');
    $personaje->addChild('request', 'POST');

    $personaje = $router->addChild('link');
    $personaje->addChild('name', '/'.strtolower($controller).'Create');
    $personaje->addChild('controller', All::cameCase($tabla));
    $personaje->addChild('method', 'run'.All::upperCase($tabla).'Create');
    $personaje->addChild('request', 'POST');

    $personaje = $router->addChild('link');
    $personaje->addChild('name', '/'.strtolower($controller).'Show');
    $personaje->addChild('controller', All::cameCase($tabla));
    $personaje->addChild('method', 'run'.All::upperCase($tabla).'Show');
    $personaje->addChild('request', 'POST');

    $personaje = $router->addChild('link');
    $personaje->addChild('name', '/'.strtolower ($controller).'Delete');
    $personaje->addChild('controller', All::cameCase($tabla));
    $personaje->addChild('method', 'run'.All::upperCase($tabla).'Delete');
    $personaje->addChild('request', 'POST');

    $personaje = $router->addChild('link');
    $personaje->addChild('name', '/'.strtolower($controller).'Update');
    $personaje->addChild('controller', All::cameCase($tabla));
    $personaje->addChild('method', 'run'.All::upperCase($tabla).'Update');
    $personaje->addChild('request', 'POST');
    $router->asXML($archivoRoute);
    $router->formatXml($archivoRoute);
}

    private function createFileViewIndex($rutaHija, $campos, $rutaVista, $requerido)
    {
    $ar = fopen($rutaHija . DIRECTORY_SEPARATOR . "index.php", "w+") or die("Problemas en la creaci&oacute;n del view index.php");
    // Inicio la escritura en el activo
    fputs($ar, '<?php' . PHP_EOL);
    fputs($ar, '$breadcrumb=(object)array(\'actual\'=>\'' . ALL::upperCase($campos['vista']) . '\',\'titulo\'=>\'Vista de integrada de gestion de ' . ALL::upperCase($campos['vista']) . '\',\'ruta\'=>\'' . ALL::upperCase($campos['vista']) . '\')?>' . PHP_EOL);
    fputs($ar, '<?php $this->layout(\'base\',[\'usuario\'=>$usuario,\'breadcrumb\'=>$breadcrumb])?>' . PHP_EOL);

    fputs($ar, '<?php $this->push(\'addCss\')?>' . PHP_EOL);
    fputs($ar, '<?php $this->end()?>' . PHP_EOL);

    fputs($ar, '<?php $this->push(\'title\') ?>' . PHP_EOL);
    fputs($ar, ' Gestionar de la vista ' . ALL::upperCase($campos['vista']) . PHP_EOL);
    fputs($ar, '<?php $this->end()?>' . PHP_EOL);

    fputs($ar, '<div class="row">' . PHP_EOL);
    fputs($ar, '    <!-- left column -->' . PHP_EOL);
    fputs($ar, '    <div class="col-md-7">' . PHP_EOL);
    fputs($ar, '        <!-- general form elements -->' . PHP_EOL);
    fputs($ar, '        <?php $this->insert(\'view::' . $rutaVista . '/listado\') ?>' . PHP_EOL);
    fputs($ar, '    </div>' . PHP_EOL);
    fputs($ar, '        <div class="col-md-5">' . PHP_EOL);
    fputs($ar, '        <?php $this->insert(\'view::' . $rutaVista . '/form\') ?>' . PHP_EOL);
    fputs($ar, '    </div>' . PHP_EOL);
    fputs($ar, '</div>' . PHP_EOL);

    /** Vista con hijos */
    foreach ($campos['campos'] AS $key => $value){
        $mostrar = explode('|',$requerido[$value]);
        //   [0][hidden_form] => 1 | [1][hidden_list] => 1 | [2][relacionado] (grilla|combo) | [3][tabla_vista] personal--personalD1 | [4][vista_campo] id

        $valores=explode('--',$mostrar[3]);
        if($mostrar[2] =='grilla' AND count($valores) > 0 ) {
            fputs($ar, '<!-- Incluir las de la vista de navegacion de ### ('.$mostrar[3].') ### -->' . PHP_EOL);
            fputs($ar, '<div class="row">' . PHP_EOL);
            fputs($ar, '    <!-- left column -->' . PHP_EOL);
            fputs($ar, '    <div class="col-md-7">' . PHP_EOL);
            fputs($ar, '        <!-- general form elements -->' . PHP_EOL);
            fputs($ar, '        <?php $this->insert(\'view::vistas/'.All::cameCase($valores[0]).'/'.$valores[1].'/listado\') ?>' . PHP_EOL);
            fputs($ar, '    </div>' . PHP_EOL);
            fputs($ar, '        <div class="col-md-5">' . PHP_EOL);
            fputs($ar, '        <?php $this->insert(\'view::vistas/'.All::cameCase($valores[0]).'/'.$valores[1].'/form\') ?>' . PHP_EOL);
            fputs($ar, '    </div>' . PHP_EOL);
            fputs($ar, '</div>' . PHP_EOL);
        }
    }
    fputs($ar, '<?php $this->push(\'addJs\') ?>' . PHP_EOL);
    fputs($ar, '<script>' . PHP_EOL);
    fputs($ar, '    // Definicion los campos del DataTable de esta vista' . PHP_EOL);
    fputs($ar, '    var Config = {};' . PHP_EOL);

    fputs($ar, '    <?php $this->insert(\'view::' . $rutaVista . '/assent\') ?>' . PHP_EOL);

    fputs($ar, '    Core.Vista.Util = {}' . PHP_EOL);
    fputs($ar, '    Core.Vista.Util = {' . PHP_EOL);
    // Fragmento de codigo que permite hacer los combos dinamicos
    fputs($ar, '        priListaLoad: function (){ ' . PHP_EOL);
    foreach ($campos['campos'] AS $key => $value){
        $mostrar = explode('|',$requerido[$value]);
        //   [0][hidden_form] => 1 | [1][hidden_list] => 1 | [2][relacionado] (grilla|combo) | [3][tabla_vista] personal--personalD1 | [4][vista_campo] id
        $valores=explode('--',$mostrar[3]);
        if($mostrar[0]==0 AND $mostrar[2]=='combo' AND count($valores)>0) {
            fputs($ar, '            var html = \'<option>Seelccionar</option>\';' . PHP_EOL);
            fputs($ar, '            $.post("/getEntidadComun",{"tipo":"combo","tabla_vista":"'.$mostrar[3].'","vista_campo":"'.$mostrar[4].'"},function(dataJson){' . PHP_EOL);
            fputs($ar, '                $.each(dataJson.datos,function(key,value){' . PHP_EOL);
            fputs($ar, '                html += \'<option value="\'+value.id+\'">\'+value.nombre+\'</option>;\'' . PHP_EOL);
            fputs($ar, '                });' . PHP_EOL);
            fputs($ar, '                $(".'.$mostrar[3].'").html(html)' . PHP_EOL);
            fputs($ar, '            });' . PHP_EOL);
        }
    }

    fputs($ar, '        },' . PHP_EOL);
    // Fin de combo dinamicos
    // Fragmento de codigo para mostrar los datos del hijo seleccionando el padre
    fputs($ar, '        priListaClick: function (dataJson){'.PHP_EOL);
    foreach ($campos['campos'] AS $key => $value){
        $mostrar = explode('|',$requerido[$value]);
        //   [0][hidden_form] => 1 | [1][hidden_list] => 1 | [2][relacionado] (grilla|combo) | [3] tabla_vista--personal--personalD1 | [4][vista_campo] id
        $valores=explode('--',$mostrar[3]);
        if($mostrar[2]=='grilla' AND count($valores)>0) {
           /* fputs($ar, '            var html = \'<option>Seelccionar</option>\';' . PHP_EOL);
            fputs($ar, '            $.post("/getEntidadComun",{"tipo":"grilla","tabla_vista":"'.$mostrar[3].'","vista_campo":"'.$mostrar[4].'"},function(dataJson){' . PHP_EOL);
            fputs($ar, '                $.each(dataJson.datos,function(key,value){' . PHP_EOL);
            fputs($ar, '                html += \'<option value="\'+value.id+\'">\'+value.nombre+\'</option>;\'' . PHP_EOL);
            fputs($ar, '                });' . PHP_EOL);
            fputs($ar, '                $(".'.$mostrar[3].'").html(html)' . PHP_EOL);
            fputs($ar, '            });' . PHP_EOL);*/
            fputs($ar, '                    <?php $this->insert(\'view::vistas/'.All::cameCase($valores[0]).'/'.$valores[1].'/assent\') ?>' . PHP_EOL);
            fputs($ar, '            Config.relacionPadre = {' . PHP_EOL);
            fputs($ar, '                "field":\''.$valores[2].'\',' . PHP_EOL);
            fputs($ar, '                "value": dataJson.datos.'.$mostrar[4]. PHP_EOL);
            fputs($ar, '            };' . PHP_EOL);
            fputs($ar, '            Core.VistaRelacion.main(\''.All::upperCase($valores[1]).'\',Config);' . PHP_EOL);
        }

    }
    fputs($ar, '        }, ' . PHP_EOL);
    // Fing de Fragento de codigo para extraer los datos del click del padre
    fputs($ar, '        priClickProcesarForm: function(){ } ' . PHP_EOL);
    fputs($ar, '    };' . PHP_EOL);

    fputs($ar, '    $(function () {' . PHP_EOL);
    fputs($ar, '        Core.main();' . PHP_EOL);
    fputs($ar, '        Core.Vista.main(\''.ALL::upperCase($campos['vista']).'\',Config);' . PHP_EOL);
    fputs($ar, '    })' . PHP_EOL);
    fputs($ar, '' . PHP_EOL);
    fputs($ar, '</script>' . PHP_EOL);
    fputs($ar, '<?php $this->end() ?> ' . PHP_EOL);
    fclose($ar);
    }

    private function createFileViewAssent($rutaHija, $campos, $rutaVista, $requerido)
    {
        $ar = fopen($rutaHija . DIRECTORY_SEPARATOR . "assent.php", "w+") or die("Problemas en la creaci&oacute;n del view index.php");
        // Inicio la escritura en el activo
        fputs($ar, '    // Definicion los campos del DataTable de esta vista' . PHP_EOL);
        fputs($ar, '    var Config = {};' . PHP_EOL);
        fputs($ar, '    Config.colums = [' . PHP_EOL);
            foreach ($campos['campos'] AS $key => $value){
                $mostrar = explode('|',$requerido[$value]);
                //   [0][hidden_form] => 1 | [1][hidden_list] => 1 | [2][relacionado] (grilla|combo) | [3][tabla_vista] personal--personalD1 | [4][vista_campo] id
                if((int)$mostrar[1]!=1) {
                    fputs($ar, '        { "data": "' . $value . '" },' . PHP_EOL);
                }
            }
        fputs($ar, '    ];' . PHP_EOL. PHP_EOL);
        fputs($ar, '    // Configuracion de visual del DataTable' . PHP_EOL);
        fputs($ar, '    Config.show = {' . PHP_EOL);
        fputs($ar, '        "display":10,' . PHP_EOL);
        fputs($ar, '        "search":true,' . PHP_EOL);
        fputs($ar, '        "pagina":true,' . PHP_EOL);
        fputs($ar, '        "rowid": "id"' . PHP_EOL);
        fputs($ar, '    }' . PHP_EOL. PHP_EOL);

        fputs($ar, '    // Configuracion de relacion de entidad' . PHP_EOL);
        fputs($ar, '    Config.relacionPadre = {' . PHP_EOL);
        fputs($ar, '        "field":"",' . PHP_EOL);
        fputs($ar, '        "value": ""' . PHP_EOL);
        fputs($ar, '    }' . PHP_EOL. PHP_EOL);
        // Fin de combo dinamicos
        fclose($ar);
    }

    private function createFileViewForm($rutaHija, $campos, $requerido)
    {
        $ar = fopen($rutaHija.DIRECTORY_SEPARATOR."form.php", "w+") or die("Problemas en la creaci&oacute;n del view form.php");
        // Inicio la escritura en el activo
        fputs($ar, '<div class="box box-primary">'.PHP_EOL);
        fputs($ar, '<div class="box-header with-border">'.PHP_EOL);
        fputs($ar, '<h3 class="box-title">Formulario de '.$campos['vista'].'</h3>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);
        fputs($ar, '<!-- /.box-header -->'.PHP_EOL);
        fputs($ar, '<!-- form start -->'.PHP_EOL);
        fputs($ar, '<form role="form" method="post" id="send'.All::upperCase($campos['vista']).'Procesar" enctype="multipart/form-data">'.PHP_EOL);
        fputs($ar, '   <div class="box-body">'.PHP_EOL);
        $mascara = '';
        $items = $campos;
        unset($items['entida']);
        unset($items['vista']);
        unset($items['pk']);
        unset($items['campos']);
        foreach ($items AS $key=>$value){

            if($value->restrincion=='PRI'){
                fputs($ar, '<input type="hidden" id="id" name="'.$value->field.'">'.PHP_EOL);
            }else{
                $classes = '';
                switch ($value->mascara){
                    case 'integer':
                        $classes ='integer';
                     break;
                    case 'text':
                        $classes ='texto';
                     break;
                    default:
                        $classes =$value->mascara;
                    break;
                }
                $classes .= ($value->nulo!='YES')?' requerido':'';
                $mostrar = explode('|',$requerido[$value->field]);
                //All::pp($mostrar);
                //   [0][hidden_form] => 1 | [1][hidden_list] => 1 | [2][relacionado] (grilla|combo) | [3][tabla_vista] personal--personalD1 | [4][vista_campo] id

                if($mostrar[0]==0 AND $mostrar[2]==0 AND $mostrar[2]!='combo' AND $mostrar[2]!='grilla') { // mostrar Si y no es relacionado
                    fputs($ar, '<div class="form-group">'.PHP_EOL);
                    fputs($ar, '<label for="'.$value->label.'">'.$value->label.'</label>'.PHP_EOL);
                    fputs($ar, '<input type="text" name="'.$value->field.'" class="form-control '.$classes.' " id="'.$value->field.'" placeholder="'.$value->place_holder.'">'.PHP_EOL);
                    fputs($ar, '</div>'.PHP_EOL);
                }elseif ($mostrar[0]==0 AND $mostrar[2]=='combo'){ // mostrar Si y es relacionado
                    //print_r($mostrar[0].'-'.$mostrar[2].' \n');
                    fputs($ar, '<div class="form-group">'.PHP_EOL);
                    fputs($ar, '<label for="'.$value->label.'">'.$value->label.'</label>'.PHP_EOL);
                    fputs($ar, '<select  name="'.$value->field.'" class="form-control '.$classes.' '.$mostrar[3].' " id="'.$value->field.'"  placeholder="'.$value->place_holder.'"><option value="0">Seleccionar</option></select>'.PHP_EOL);
                    fputs($ar, '</div>'.PHP_EOL);
                }
            }
        }
        fputs($ar, '  </div>'.PHP_EOL);
        fputs($ar, '  <!-- /.box-body -->'.PHP_EOL);
        fputs($ar, '   <div class="box-footer">'.PHP_EOL);
        fputs($ar, '       <div class="col-md-4 col-sm-6 col-xs-12 pull-left" id="divDelete"></div>'.PHP_EOL);
        fputs($ar, '       <div class="col-md-4 col-sm-6 col-xs-12 pull-right"><button id="submit" class="btn btn-primary" value="Procesar">Procesar registro.</button></div>'.PHP_EOL);
        fputs($ar, '   </div>'.PHP_EOL);
        fputs($ar, '</form>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);
        fclose($ar);
    }


    private function createFileViewListado($rutaHija, $campos, $requerido)
    {
        $ar = fopen($rutaHija.DIRECTORY_SEPARATOR."listado.php", "w+") or die("Problemas en la creaci&oacute;n del view listado.php");
        // Inicio la escritura en el activo
        $items = $campos;
        unset($items['entida']);
        unset($items['vista']);
        unset($items['pk']);
        unset($items['campos']);

        fputs($ar, '<div class="box box-primary">'.PHP_EOL);
        fputs($ar, '<div class="box-header with-border">'.PHP_EOL);
        fputs($ar, '<h3 class="box-title">Listado de '.$campos['vista'].'</h3>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);
        fputs($ar, '<!-- /.box-header -->'.PHP_EOL);
        fputs($ar, '<!-- form start -->'.PHP_EOL);
        fputs($ar, '<div class="box-body">'.PHP_EOL);
        fputs($ar, '    <table id="dataJPH'.ALL::upperCase($campos['vista']).'" class="table table-bordered table-striped">'.PHP_EOL);
        // Listado de cabecera
        fputs($ar, '       <thead>'.PHP_EOL);
        fputs($ar, '        <tr>'.PHP_EOL);
        foreach ($items AS $key=>$value){
            $mostrar = explode('|',$requerido[$value->field]);
            //   [0][hidden_form] => 1 | [1][hidden_list] => 1 | [2][relacionado] (grilla|combo) | [3][tabla_vista] personal--personalD1 | [4][vista_campo] id
            if($mostrar[1]!=1) {
                fputs($ar, '            <th>' . $value->label . '</th>' . PHP_EOL);
            }
        }
        fputs($ar, '        </tr>'.PHP_EOL);
        fputs($ar, '       </thead>'.PHP_EOL);

        //Listado footer
        fputs($ar, '       <tfoot>'.PHP_EOL);
        fputs($ar, '        <tr>'.PHP_EOL);
        foreach ($items AS $key=>$value){
            $mostrar = explode('|',$requerido[$value->field]);
            //   [0][hidden_form] => 1 | [1][hidden_list] => 1 | [2][relacionado] (grilla|combo) | [3][tabla_vista] personal--personalD1 | [4][vista_campo] id
            if($mostrar[1]!=1) {
                fputs($ar, '            <th>' . $value->label . '</th>' . PHP_EOL);
            }
        }
        fputs($ar, '       </tr>'.PHP_EOL);
        fputs($ar, '       </tfoot>'.PHP_EOL);

        // Listado de contenido
       /* fputs($ar, '       <tbody>'.PHP_EOL);
        fputs($ar, '<?php foreach ($listado AS $key => $value){ ?>'.PHP_EOL);
        fputs($ar, '       <tr>'.PHP_EOL);
        foreach ($items AS $key=>$value){
            fputs($ar, '      <td><?php echo @$value->'.$value->field.'?></td>'.PHP_EOL);
        }
        fputs($ar, '        </tr> '.PHP_EOL);
        fputs($ar, '<?php } ?>'.PHP_EOL);
        fputs($ar, '        </tbody><tr>'.PHP_EOL);*/


        fputs($ar, '   </table>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);
        fclose($ar);
    }
    private function existsRuta($archivoRoute,$controller)
    {
        $config = simplexml_load_file($archivoRoute);
        foreach($config->link AS $key=>$value){
            //echo 'corrida:'.$value->name.'-- Comparar:'.'/'.All::cameCase($controller).'Index'.'<br>';
            //die('/'.All::cameCase($controller).'Index');
            if($value->name=='/'.All::cameCase($controller).'Index'){
                return true;
            }
        }
        return false;
    }

}

