<?php
namespace JPH\Complements\Database;
use JPH\Core\Commun\All;
use JPH\Core\Commun\Constant;
use JPH\Core\Store\Cache;

/**
 * Clase integradora de herencia multiple de la conexion a base de datos
 * @author: Ing Gregorio Bolivar <elalconxvii@gmail.com>
 * @author: Blog: <http://gbbolivar.wordpress.com>
 * @creation Date: 07/08/2017
 * @version: 4.1
 */

class Base extends Comun implements Constant
{
    use GenerateConexion, GenerateTablesConfigs, ConfigDatabase, Db ;
    public $idx;
    public $active;
    public $base;
    public function __construct()
    {

        try{
            // Construir las variables de conexion
            $this->constructConexion();

            $this->active = 'Core';
            // Permite instanciar la class app

            // Capturar las variables pasadas a la clase directamente por parametro
            $this->idx = func_get_args();

           // Verificar que la instancia de la clsse tenga valor definido por parametro
            $tmp = (count($this->idx)>0)?end($this->idx):'';

            // Clases donde fue instanciada
            $instan = get_class($this);
            // APP\Admin\Model\PruebaModel
            // Verificar que solo sea instanciado desde el modelo si lo hace de otra parte lanza exepcion
            if(\preg_match('/Model/',$instan)){
                if(!empty($tmp)){

                    $ext = method_exists($this,strtolower($tmp));
                    if(!$ext){
                        $obj = array('idxConexion' => $tmp);
                        $msj = All::getMsjException($this->active, 'idx-conn-no-existe',$obj);
                        throw new \TypeError($msj);
                    }
                    //$this->base = new Core($tmp);
                    // Conexion enviada por parametro
                    $indx = $tmp;
                    $datos = $this->$indx();

                }else{
                    $datos = $this->default();
                }

                if((bool)Cache::get('conecDb')) {
                    $this->connect($datos);
                    parent::__construct();
                }

            }else{
                $obj = array();
                $msj = All::getMsjException($this->active, 'error-stnd-connect',$obj);
                throw new \TypeError($msj);
            }

        }catch (\TypeError $t){
            die($t->getMessage());
        }
        return $this;
    }
}
