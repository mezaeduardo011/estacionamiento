<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Base;
use JPH\Core\Commun\All;
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 08/11/2017
 * @version: 1.0
 */

class SegLogAccionesModel extends Base
{
    public function __construct()
    {
        $this->tabla = 'seg_log_eventos';
        $this->campoid = array('id');
        $this->campos = array('host','base_datos','entidad','entidad_id','new_value','old_value','usuario_id','proceso','created_at');
        parent::__construct('admin');
        return $this;
    }

    /**
     * Extraer todos los registros de SegUsuarios
     * @param Request $request los datos enviado por el navegador
     * @param Array $result inluyendo el resultado de los campos
     * @return array $tablas
     */
    public function getSegLogUsuariosAccionesListar($request,$result)
    {

        //print_r($request->filter); die();
// Variables definidas para del paginador
        $limit = 100;
        if(isset($request->posStart)){
            $posStart = $request->posStart;
        }else{
            $posStart = 0;
        }

        if(isset($request->count)){
            $count = $request->posStart+$limit;
        }else{
            $count = $limit;
        }

        // Permite identificar hay una definicion de busqueda de algun campo mediante el search
        $search= '';
        foreach ($request AS $key=>$value){
            if(\preg_match('/search_\w/',$key) AND !empty($value)){
                $campo = str_replace('search_','', $key);
                $search.= " AND $campo like '%$value%'";
            }
        }

        // Variables definidas para el ordenamiento DESC y ASC
        $order = '';
        $by = '';
        if(!empty($request->orderBy) AND $request->orderBy!='undefined'){
            $tmp = $this->campos[$request->orderBy];
            if (!isset($request->direction) || $request->direction=="asc") {
                $by = 'ASC';
                $order = " ORDER BY $tmp ".$by;
            }else {
                $by = 'DESC';
                $order = " ORDER BY $tmp ".$by;
            }
        }

        // Elemento cuando hay relacion
        $relation = All::formatRelacio(@$request->relacion);
        if(!empty($relation[0])) {
            foreach ($relation AS $option) {
                $search .= "  AND $option";
            }
        }


        // Primero extraer la cantidad de registros
        $sqlCount = "Select count(*) as items FROM ".$this->tabla.' WHERE 0=0 '.$search ;
        $resCount = $this->executeQuery($sqlCount);
        //create query to products table
        $sql = implode(',', $result['select']).", ".$this->campoid[0]." FROM ".$this->tabla.' WHERE 0=0 '.$search ;
        //if this is the first query - get total number of records in the query result
        $sqlCount = "SELECT * FROM (SELECT ROW_NUMBER() OVER( ORDER BY ".$this->campoid[0]." ".$by." ) AS row, ".$resCount[0]->items." AS cnt, $sql ) AS sub";
        $resQuery = $this->get($sqlCount);
        $rowCount =  $this->fetch();
        $totalCount = (empty($rowCount->cnt))?0:$rowCount->cnt;
        //add limits to query to get only rows necessary for the output
        $sqlCount.= " WHERE row>=".$posStart." AND row<=".$count;
        $sqlCount.= $order;

        // Definir las variables para el uso para el XML
        $items = array();
        $items['data'] = $this->executeQuery($sqlCount);
        $items['totalCount'] = (isset($request->posStart))?'':$totalCount;
        $items['posStart'] = $posStart;

        return $items;
    }

    public function showAcciones(Int $id)
    {
        $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$id;
        $tmp=$this->executeQuery($sql);
        $tablas['datos'] = $tmp[0];
        return $tablas;
    }


    /**
     * Permite cargar las acciones de auditoria de las acciones que haga el usuario en el sistema
     * @param string $entidad, Tabla en la cual se hacer el proceso
     * @param integer $entidad_id, Identificador del registro que se esta trabajando
     * @param string $new_value, Datos cuando es nuevo
     * @param string $old_value, Datos cuando es old
     * @param integer $usuario_id, usuario que hace el proceso
     * @param string $proceso, que proceso se esta haciendo, UPDATE, CREATE, SELECT, DELETE
     * @return bool true o false;
     */
    public function cargaAcciones(String $entidad, Int $entidad_id=0, String $new_value='NULL', String $old_value='NULL', Int $usuario_id=0, String $proceso)
    {
        $host = $_SERVER['REMOTE_ADDR'];
        $name_db=$this->database;
        $this->segLogCreateLogin($host,$name_db,$entidad,$entidad_id,$new_value,$old_value,$usuario_id,$proceso);
        return true;
    }

    /**
     * Permite registrar las acciones de auditoria de las acciones que haga el usuario en el sistema
     * @param string $host, Direccion ip del cliente
     * @param string $entidad, Nombre de la base de datos que se esta procesando
     * @param string $entidad, Tabla en la cual se hacer el proceso
     * @param Int $entidad_id, Identificador del registro que se esta trabajando
     * @param string $new_value, Datos cuando es nuevo
     * @param string $old_value, Datos cuando es old
     * @param Int $usuario_id, usuario que hace el proceso
     * @param string $proceso, que proceso se esta haciendo, UPDATE, CREATE, SELECT, DELETE
     * @return bool true o false;
     */

    private function segLogCreateLogin(String $host, String $name_db, String $entidad,Int $entidad_id,String $new_value,String $old_value, Int $usuario_id,String $proceso)
    {
        $query = "INSERT INTO seg_log_eventos(host,base_datos,entidad,entidad_id,new_value,old_value,usuario_id,proceso,created_at) VALUES('$host','$name_db','$entidad','$entidad_id','$new_value','$old_value','$usuario_id','$proceso','".All::now()."')";
        $this->execute($query);
        return true;
    }
}
?>