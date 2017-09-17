<?php
namespace JPH\Core\Console;
use JPH\Core\Commun\{All,SimpleXMLExtended};

/**
 * Permite integrar un conjunto de funcionalidades de la consola pero en las aplicaciones
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
     * @param string $crud, nombre del Crud
     * @param string $tabla, nombre de la tabla
     * @campos array $campos, arrego de los campos que tiene lavista
     */
    public function createStructuraFileCRUD($app,$crud,$tabla,$campos)
    {
        foreach ($campos AS $key=>$value){
            if($key==0){
                $campos['entida'] = $value->entidad;
                $campos['vista'] = $value->nombre;
            }
            if($value->restrincion=='PRI'){
                $campos['pk'] = $value->field;
            }
            $temp[]=$value->field;
            $temp1[]=$value->label;
        }
        $campos['campos']= $temp;
        $this->app = All::upperCase($app);
        $ruta = $this->pathapp.$app.All::APP_CONTR;

        // Permite valirar si existe la app donde va el controller
        if (!file_exists($ruta)) {
            die(sprintf('The application "%s" does not exist.', $this->app));
        }else{
            $controller = All::upperCase($crud);
            $entidad = All::upperCase($tabla);
            $ruta =  $ruta.DIRECTORY_SEPARATOR.$entidad.'Controller.php';
            if (file_exists($ruta)) {
                $msj=Interprete::getMsjConsole($this->active,'app:crud-existe');

            }else{
                $ruta = $this->pathapp.$app;

                $temp = All::parseRutaAbsolut($ruta);
                $rutaPadre = $temp->scalar.All::APP_VISTA.DIRECTORY_SEPARATOR.ALL::cameCase($tabla);
                $rutaHija  = $rutaPadre.DIRECTORY_SEPARATOR.strtolower($crud);
                $rutaVista = 'vistas'.'/'.ALL::cameCase($tabla).'/'.strtolower($crud);

                self::createFileReadControllerCRUD($ruta,$app,$entidad,$campos,$rutaVista);
                self::createNewRutaXmlCRUD($ruta,$app,$controller,$entidad);
                self::createFileModelCRUD($ruta,$app,$entidad,$campos);

                self::createDirView($rutaPadre,$rutaHija);
                self::createFileViewIndex($rutaHija, $campos, $rutaVista);
                self::createFileViewForm($rutaHija, $campos);
                self::createFileViewListado($rutaHija, $campos);

                $msj=Interprete::getMsjConsole($this->active,'app:crud-creado');
            }
            $msj=All::mergeTaps($msj,array('app'=>$this->app,'controller'=>$entidad));
        }
        return $msj;
    }

    /**
     * Permote crear el direcrorio donde se almacenaran las vista de la aplicacion
     * @return boolean
     */
    private function createDirView($rutaPadre,$rutaHija)
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
    private function createFileReadControllerCRUD($ruta, $app , $controller,  $campos,  $rutaVista)
    {
        $ar = fopen($ruta.All::APP_CONTR.DIRECTORY_SEPARATOR."".$controller."Controller.php", "w+") or die("Problemas en la creaci&oacute;n del controlador del apps " . $app);
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
        fputs($ar, ' * @version: 1.0'.PHP_EOL);
        fputs($ar, ' */ '.PHP_EOL.PHP_EOL);
        fputs($ar, 'class '.$controller.'Controller extends Controller'.PHP_EOL);
        fputs($ar, "{".PHP_EOL);
        fputs($ar, '   use Security;'.PHP_EOL);
        fputs($ar, '   public $model;'.PHP_EOL);
        fputs($ar, '   public $session;'.PHP_EOL);
        fputs($ar, '   public function __construct()'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '       parent::__construct();'.PHP_EOL);
        fputs($ar, '       $this->session = $this->authenticated();'.PHP_EOL);
        fputs($ar, '       $this->ho'.$controller.'Model = new Model\\'.$controller.'Model();'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);
        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Listar registros de '.$controller.PHP_EOL);
        fputs($ar, '    * @param: GET $resquest'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function run'.$controller.'Index($request)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '     $this->tpl->addIni();'.PHP_EOL);
        fputs($ar, '     $this->tpl->add(\'usuario\', $this->getSession(\'usuario\'));'.PHP_EOL);
        fputs($ar, '     $this->tpl->renders(\'view::'.$rutaVista.'/index\');'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);
        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Listar registros de '.$controller.PHP_EOL);
        fputs($ar, '    * @param: POST $resquest'.PHP_EOL);
        fputs($ar, '    * @return: JSON $result'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function run'.$controller.'Listar($request)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
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
        fputs($ar, '      $result = $this->ho'.$controller.'Model->set'.$controller.'Create($request);'.PHP_EOL);
        fputs($ar, '      $this->json($result);'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);
        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Ver registros de '.$controller.PHP_EOL);
        fputs($ar, '    * @param: POST $resquest'.PHP_EOL);
        fputs($ar, '    * @return: JSON $result'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function run'.$controller.'Show($request)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
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
        fputs($ar, '      $result = $this->ho'.$controller.'Model->rem'.$controller.'Delete($request);'.PHP_EOL);
        fputs($ar, '      $this->json($result);'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);
        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Actualizar registros de '.$controller.PHP_EOL);
        fputs($ar, '    * @param: POST $resquest'.PHP_EOL);
        fputs($ar, '    * @return: JSON $result'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function run'.$controller.'Update($request)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '      $result = $this->ho'.$controller.'Model->set'.$controller.'Update($request);'.PHP_EOL);
        fputs($ar, '      $this->json($result);'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL);
        fputs($ar, '}'.PHP_EOL);
        fputs($ar, '?>'.PHP_EOL);
        // Cierro el archivo y la escritura
        fclose($ar);

    }

    /**
     * Method encargado de procesar rutas asociadas al al sistema
     * @param string $ruta, ruta donde se hace el proceso donde esta la apliacion
     * @param string $app, nombre de la aplicacion
     * @param string $controller, nombre del controllador
     * @param string $tabla, nombre con el cual se llama al sistema
     * @param string $method, permite identificar cual es el method que debe instanciar el clase
     * @param string $request, permite identificar si el method GET o POST
     */

    private function createNewRutaXmlCRUD(string $ruta, string $app , string $controller, string $tabla)
    {

        $archivoXML= $ruta.All::APP_ROUTE.DIRECTORY_SEPARATOR."Router.xml";
        $router = new SimpleXMLExtended($archivoXML, null, true) or die("Problemas en la creaci&oacute;n del router del apps Router.xml");
        $router->addComentario(' Bloque de configuracion de la ruta del controller '.ucfirst($controller));
        // Listar registro
        $result =$router->xpath('//'.strtolower($controller).'Index');
        var_dump($result);
        $personaje = $router->addChild('link');
        $personaje->addChild('name', '/'.strtolower($controller).'Index');
        $personaje->addChild('controller', All::cameCase($tabla));
        $personaje->addChild('method', 'run'.$tabla.'Index');
        $personaje->addChild('request', 'GET');
        //
        $personaje = $router->addChild('link');
        $personaje->addChild('name', '/'.strtolower($controller).'Listar');
        $personaje->addChild('controller', All::cameCase($tabla));
        $personaje->addChild('method', 'run'.$tabla.'Listar');
        $personaje->addChild('request', 'POST');

        $personaje = $router->addChild('link');
        $personaje->addChild('name', '/'.strtolower($controller).'Create');
        $personaje->addChild('controller', All::cameCase($tabla));
        $personaje->addChild('method', 'run'.$tabla.'Create');
        $personaje->addChild('request', 'POST');

        $personaje = $router->addChild('link');
        $personaje->addChild('name', '/'.strtolower($controller).'Show');
        $personaje->addChild('controller', All::cameCase($tabla));
        $personaje->addChild('method', 'run'.$tabla.'Show');
        $personaje->addChild('request', 'POST');

        $personaje = $router->addChild('link');
        $personaje->addChild('name', '/'.strtolower ($controller).'Delete');
        $personaje->addChild('controller', All::cameCase($tabla));
        $personaje->addChild('method', 'run'.$tabla.'Delete');
        $personaje->addChild('request', 'POST');

        $personaje = $router->addChild('link');
        $personaje->addChild('name', '/'.strtolower($controller).'Update');
        $personaje->addChild('controller', All::cameCase($tabla));
        $personaje->addChild('method', 'run'.$tabla.'Update');
        $personaje->addChild('request', 'POST');
        $router->asXML($archivoXML);
        $router->formatXml($archivoXML);
    }

    

    /**
     * Permite generar un formato del archivo modelo dentro de la aplicacion seleccionada
     * @param string $app, Nombre de la aplicacion a la cual se genera el modelo
     * @param string $modelo, Nombre del modelo a ser generado
     */
    private function createFileModelCRUD(string $ruta, string $app, string $modelo,$campos)
    {
        $app = All::upperCase($app);
        $ruta = $ruta.All::APP_MODEL.DIRECTORY_SEPARATOR.$modelo;

        $ar = fopen($ruta."Model.php", "w+") or die("Problemas en la add del model del apps". $app);
        // Inicio la escritura en el activo
        fputs($ar, '<?php'.PHP_EOL);
        fputs($ar, 'namespace APP\\'.$app.'\\Model;'.PHP_EOL);
        fputs($ar, 'use JPH\\Complements\\Database\\Main;'.PHP_EOL);
        fputs($ar, 'use JPH\\Core\\Commun\\All;'.PHP_EOL);
        fputs($ar, '/**'.PHP_EOL);
        fputs($ar, ' * Generador de codigo del Modelo de la App '.$app.PHP_EOL);
        fputs($ar, ' * @propiedad: '.All::FW.' '.All::VERSION.''.PHP_EOL);
        fputs($ar, ' * @utor: Gregorio Bolivar <elalconxvii@gmail.com>'.PHP_EOL);
        fputs($ar, ' * @created: ' .date('d/m/Y') .''.PHP_EOL);
        fputs($ar, ' * @version: 1.0'.PHP_EOL);
        fputs($ar, ' */ '.PHP_EOL.PHP_EOL);
        fputs($ar, "class ". $modelo."Model extends Main".PHP_EOL);
        fputs($ar, "{".PHP_EOL);
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
        fputs($ar, '   public function get'.$modelo.'Listar()'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '     $sql = "SELECT * FROM miTabla";'.PHP_EOL);
        fputs($ar, '     $tablas=$this->executeQuery($sql);'.PHP_EOL);
        fputs($ar, '     return $tablas;'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);
        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Crear registros nuevos de '.$modelo.PHP_EOL);
        fputs($ar, '    * @param: Array $datos'.PHP_EOL);
        fputs($ar, '    * @return array $tablas'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function set'.$modelo.'Create($datos)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '     $sql = "INERT INTO miTabla (campo1, campo) VALUES(\'valor1\',\'valor2\')";'.PHP_EOL);
        fputs($ar, '     $tablas=$this->executeQuery($sql);'.PHP_EOL);
        fputs($ar, '     return $tablas;'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);
        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Extraer un registros de '.$modelo.PHP_EOL);
        fputs($ar, '    * @param: String $id'.PHP_EOL);
        fputs($ar, '    * @return array $tablas'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function get'.$modelo.'Show($id)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '     $sql = "SELECT * FROM miTabla WHERE id=$id";'.PHP_EOL);
        fputs($ar, '     $tablas=$this->executeQuery($sql);'.PHP_EOL);
        fputs($ar, '     return $tablas;'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);
        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Eliminar registros de '.$modelo.PHP_EOL);
        fputs($ar, '    * @param: string $id'.PHP_EOL);
        fputs($ar, '    * @return array $tablas'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function rem'.$modelo.'Delete($id)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '     $sql = "DELETE FROM miTabla WHERE id=$id";'.PHP_EOL);
        fputs($ar, '     $tablas=$this->executeQuery($sql);'.PHP_EOL);
        fputs($ar, '     return $tablas;'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL.PHP_EOL);
        fputs($ar, '    /**'.PHP_EOL);
        fputs($ar, '    * Actualizar registros de '.$modelo.PHP_EOL);
        fputs($ar, '    * @param: arreglo $obj'.PHP_EOL);
        fputs($ar, '    * @return array $tablas'.PHP_EOL);
        fputs($ar, '    */ '.PHP_EOL);
        fputs($ar, '   public function set'.$modelo.'Update($obj)'.PHP_EOL);
        fputs($ar, '   {'.PHP_EOL);
        fputs($ar, '     $sql = "UPDATE SET campo=".$obj[\'campo\']." miTabla WHERE id=".$obj[\'id\']." ";'.PHP_EOL);
        fputs($ar, '     $tablas=$this->executeQuery($sql);'.PHP_EOL);
        fputs($ar, '     return $tablas;'.PHP_EOL);
        fputs($ar, '   }'.PHP_EOL);
        fputs($ar, '}'.PHP_EOL);
        fputs($ar, '?>'.PHP_EOL);
        // Cierro el archivo y la escritura
        fclose($ar);
    }
    private function createFileViewIndex($rutaHija, $campos, $rutaVista)
    {

        $ar = fopen($rutaHija.DIRECTORY_SEPARATOR."index.php", "w+") or die("Problemas en la creaci&oacute;n del view index.php");
        // Inicio la escritura en el activo
        fputs($ar, '<?php'.PHP_EOL);
        fputs($ar, '$breadcrumb=(object)array(\'actual\'=>\''.ALL::upperCase($campos['vista']).'\',\'titulo\'=>\'Vista de integrada de gestion de '.ALL::upperCase($campos['vista']).'\',\'ruta\'=>\''.ALL::upperCase($campos['vista']).'\')?>'.PHP_EOL);
        fputs($ar, '<?php $this->layout(\'base\',[\'usuario\'=>$usuario,\'breadcrumb\'=>$breadcrumb])?>'.PHP_EOL);

        fputs($ar, '<?php $this->push(\'addCss\')?>'.PHP_EOL);
        fputs($ar, '<link href="<?=JPH\Core\Store\Cache::get(\'srcCss\')?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">'.PHP_EOL);
        fputs($ar, '<?php $this->end()?>'.PHP_EOL);

        fputs($ar, '<?php $this->push(\'title\') ?>'.PHP_EOL);
        fputs($ar, ' Gestionar de la vista '.ALL::upperCase($campos['vista']).PHP_EOL);
        fputs($ar, '<?php $this->end()?>'.PHP_EOL);

        fputs($ar, '<div class="row">'.PHP_EOL);
        fputs($ar, '<!-- left column -->'.PHP_EOL);
        fputs($ar, '<div class="col-md-7">'.PHP_EOL);
        fputs($ar, '    <!-- general form elements -->'.PHP_EOL);
        fputs($ar, '    <?php $this->insert(\'view::'.$rutaVista.'/listado\',[\'usuariosListado\'=>array(\'\',\'\',\'\')]) ?>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);
        fputs($ar, '<div class="col-md-5">'.PHP_EOL);
        fputs($ar, '   <?php $this->insert(\'view::'.$rutaVista.'/form\') ?>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);

        fputs($ar, '<?php $this->push(\'addJs\') ?>'.PHP_EOL);
        fputs($ar, '<script src="/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>'.PHP_EOL);
        fputs($ar, '<script src="/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>'.PHP_EOL);
        fputs($ar, '<script>'.PHP_EOL);
        fputs($ar, '    $(function () {'.PHP_EOL);
        fputs($ar, '        var table = $(\'#example1\').DataTable();'.PHP_EOL);
        fputs($ar, '        $(\'#example1 tbody\').on(\'click\', \'tr\', function () {'.PHP_EOL);
        fputs($ar, '            var data = table.row( this ).data();'.PHP_EOL);
        fputs($ar, '            alert( \'You clicked on \'+data[0]+\'\'s row\' );'.PHP_EOL);
        fputs($ar, '        } );'.PHP_EOL);
        fputs($ar, '    })'.PHP_EOL);
        fputs($ar, ''.PHP_EOL);
        fputs($ar, '</script>'.PHP_EOL);
        fputs($ar, '<?php $this->end() ?> '.PHP_EOL);
        fclose($ar);
    }

    private function createFileViewForm($rutaHija, $campos)
    {
        $ar = fopen($rutaHija.DIRECTORY_SEPARATOR."form.php", "w+") or die("Problemas en la creaci&oacute;n del view form.php");
        // Inicio la escritura en el activo
        fputs($ar, '<div class="box box-primary">'.PHP_EOL);
        fputs($ar, '<div class="box-header with-border">'.PHP_EOL);
        fputs($ar, '<h3 class="box-title">Formulario de '.$campos['vista'].'</h3>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);
        fputs($ar, '<!-- /.box-header -->'.PHP_EOL);
        fputs($ar, '<!-- form start -->'.PHP_EOL);
        fputs($ar, '<form role="form">'.PHP_EOL);
        fputs($ar, '   <div class="box-body">'.PHP_EOL);
        $mascara = '';
        $items = $campos;
        unset($items['entida']);
        unset($items['vista']);
        unset($items['pk']);
        unset($items['campos']);
        foreach ($items AS $key=>$value){

            if($value->restrincion=='PRI'){
                fputs($ar, '<input type="hidden" name="'.$value->field.'">'.PHP_EOL);
            }else{
                switch ($value->mascara){
                    case 'integer':
                        $mascara ='integer';
                     break;
                    case 'text':
                        $mascara ='texto';
                     break;
                    default:
                        $mascara ='default';
                    break;
                }

                fputs($ar, '<div class="form-group">'.PHP_EOL);
                fputs($ar, '<label for="'.$value->label.'">'.$value->label.'</label>'.PHP_EOL);
                fputs($ar, '<input type="text" name="'.$value->field.'" class="form-control '.$mascara.'" id="'.$value->label.'" placeholder="Enter '.$value->label.'">'.PHP_EOL);
                fputs($ar, '</div>'.PHP_EOL);
            }

        }
        /*fputs($ar, '     <div class="form-group">'.PHP_EOL);
        fputs($ar, '          <label for="exampleInputEmail1">Email address</label>'.PHP_EOL);
        fputs($ar, '          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">'.PHP_EOL);
        fputs($ar, '     </div>'.PHP_EOL);
        fputs($ar, '     <div class="form-group">'.PHP_EOL);
        fputs($ar, '         <label for="exampleInputPassword1">Password</label>'.PHP_EOL);
        fputs($ar, '         <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">'.PHP_EOL);
        fputs($ar, '     </div>'.PHP_EOL);
        fputs($ar, '     <div class="form-group">'.PHP_EOL);
        fputs($ar, '         <label for="exampleInputFile">File input</label>'.PHP_EOL);
        fputs($ar, '         <input type="file" id="exampleInputFile">'.PHP_EOL);
        fputs($ar, '         <p class="help-block">Example block-level help text here.</p>'.PHP_EOL);
        fputs($ar, '    </div>'.PHP_EOL);
        fputs($ar, '    <div class="checkbox">'.PHP_EOL);
        fputs($ar, '        <label>'.PHP_EOL);
        fputs($ar, '            <input type="checkbox"> Check me out'.PHP_EOL);
        fputs($ar, '</label>'.PHP_EOL);
        fputs($ar, '      </div>'.PHP_EOL);*/
        fputs($ar, '  </div>'.PHP_EOL);
        fputs($ar, '  <!-- /.box-body -->'.PHP_EOL);
        fputs($ar, '   <div class="box-footer">'.PHP_EOL);
        fputs($ar, '       <button type="submit" class="btn btn-primary">Submit</button>'.PHP_EOL);
        fputs($ar, '   </div>'.PHP_EOL);
        fputs($ar, '</form>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);
        fclose($ar);
    }

    private function createFileViewListado($rutaHija, $campos)
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
        fputs($ar, '<h3 class="box-title">Quick Example</h3>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);
        fputs($ar, '<!-- /.box-header -->'.PHP_EOL);
        fputs($ar, '<!-- form start -->'.PHP_EOL);
        fputs($ar, '<div class="box-body">'.PHP_EOL);
        fputs($ar, '    <table id="example1" class="table table-bordered table-striped">'.PHP_EOL);
        fputs($ar, '        <thead>'.PHP_EOL);
        fputs($ar, '        <tr>'.PHP_EOL);

        foreach ($items AS $key=>$value){
            fputs($ar, '            <th>'.$value->label.'</th>'.PHP_EOL);
        }

        fputs($ar, '        </tr>'.PHP_EOL);
        fputs($ar, '        </thead>'.PHP_EOL);
        fputs($ar, '        <tbody>'.PHP_EOL);

        fputs($ar, '       <tr>'.PHP_EOL);
        foreach ($items AS $key=>$value){
            fputs($ar, '      <td>'.$value->label.'</td>'.PHP_EOL);
        }
        fputs($ar, '        </tr>'.PHP_EOL);
        /*fputs($ar, '       <tr>'.PHP_EOL);
        fputs($ar, '           <td>Trident</td>'.PHP_EOL);
        fputs($ar, '           <td>Internet'.PHP_EOL);
        fputs($ar, '               Explorer 5.0'.PHP_EOL);
        fputs($ar, '</td>'.PHP_EOL);
        fputs($ar, '           <td>Win 95+</td>'.PHP_EOL);
        fputs($ar, '           <td>5</td>'.PHP_EOL);
        fputs($ar, '           <td>C</td>'.PHP_EOL);
        fputs($ar, '       </tr>'.PHP_EOL);
        fputs($ar, '      <tr>'.PHP_EOL);
        fputs($ar, '          <td>Trident</td>'.PHP_EOL);
        fputs($ar, '          <td>Internet'.PHP_EOL);
        fputs($ar, '             Explorer 5.5'.PHP_EOL);
        fputs($ar, '</td>'.PHP_EOL);
        fputs($ar, '            <td>Win 95+</td>'.PHP_EOL);
        fputs($ar, '            <td>5.5</td>'.PHP_EOL);
        fputs($ar, '            <td>A</td>'.PHP_EOL);
        fputs($ar, '        </tr>'.PHP_EOL);*/
        fputs($ar, '        <tr>'.PHP_EOL);
        foreach ($items AS $key=>$value){
            fputs($ar, '            <th>'.$value->label.'</th>'.PHP_EOL);
        }
        fputs($ar, '       </tr>'.PHP_EOL);
        fputs($ar, '       </tfoot>'.PHP_EOL);
        fputs($ar, '   </table>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);
        fputs($ar, '</div>'.PHP_EOL);
        fclose($ar);
    }

}

