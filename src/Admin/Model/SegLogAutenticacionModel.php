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

class SegLogAutenticacionModel extends Base
{
    public function __construct()
    {
            $this->tabla = 'seg_log_autenticacion';
        $this->campoid = array('id');
        $this->campos = array('host','navegador','accion','sistema','usuario','created_at');
        parent::__construct();
    }
    public function segLogCreateLogin($ip,$navegador,$accion,$sistema,$usuario_id)
    {
        $query = "INSERT INTO seg_log_autenticacion(host,navegador,accion,sistema,usuario,created_at) VALUES('$ip','$navegador','$accion','$sistema','$usuario_id','".All::now()."')";
        $this->execute($query);
    }

    /**
     * Extraer todos los registros de SegUsuarios
     * @param Request $request los datos enviado por el navegador
     * @param Array $result inluyendo el resultado de los campos
     * @return array $tablas
     */
    public function getSegLogUsuariosListar($request,$result)
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
        //($relation); die();
        if(!empty($relation[0])){
            $search.="  AND $relation[0]";
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

    public function segLogMetricaNavegador()
    {
        $query = "SELECT navegador, COUNT(id) AS cantidad FROM seg_log_autenticacion
                  WHERE convert(date, created_at)=convert(date, GETDATE())
                  GROUP BY navegador;";
        $tablas = $this->executeQuery($query);
        return $tablas;    }

    public function segLogMetricaHost()
    {
        $query = "SELECT host, COUNT(id) AS cantidad FROM seg_log_autenticacion
                  WHERE convert(date, created_at)=convert(date, GETDATE())
                  GROUP BY host;";
        $tablas = $this->executeQuery($query);
        return $tablas;    }

    public function segLogMetricaAccion()
    {
        $query = "SELECT accion, COUNT(id) AS cantidad from seg_log_autenticacion
                  WHERE convert(date, created_at)=convert(date, GETDATE())
                  --AND accion!='CERRAR SESSION'
                  GROUP BY accion;";
        $tablas = $this->executeQuery($query);
        return $tablas;
    }
}
?>