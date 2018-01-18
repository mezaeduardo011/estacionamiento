<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Base;
use JPH\Core\Commun\All;
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 25/09/2017
 * @version: 1.0
 */ 

class SegPerfilModel extends Base
{
   public function __construct()
   {
       $this->tabla = 'seg_perfil';
       $this->campoid = array('id');
       $this->campos = array('detalle');
       parent::__construct('admin');
       $this->segPerfilRolesModel = new SegPerfilRolesModel();
   }

    /**
     * Extraer todos los registros de SegUsuarios
     * @return array $tablas
     */
    public function getSegPerfilListarCombo()
    {
        $tablas=$this->leerTodos();
        return $tablas;
    }
    /**
    * Extraer todos los registros de SegPerfil
    * @return array $tablas
    */ 
   public function getSegPerfilListar($request,$result)
   {
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
       if(!empty($relation[2])){
           $search.="  AND $relation[1]=$relation[2]";
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

    /**
    * Crear registros nuevos de SegPerfil
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setSegPerfilCreate($datos)
   {
     $this->fijarValores($datos);
     $this->guardar();
     $val = $this->lastId();
     return $val;
   }

    /**
    * Extraer un registros de SegPerfil
    * @param: String $id
    * @return array $tablas
    */ 
   public function getSegPerfilShow($data)
   {
      $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$data->data;
      $tmp=$this->executeQuery($sql);
      $tablas['datos'] = $tmp[0];
      $tablas['roles'] = $this->segPerfilRolesModel->getSegPerfilRolesShow($data->data);
      $tablas['error'] = 0;
      return $tablas;
   }

    /**
    * Eliminar registros de SegPerfil
    * @param: string $id
    * @return array $tablas
    */ 
   public function remSegPerfilDelete($datos)
   {
      $valor=base64_decode($datos->obj);
      $this->fijarValor('id',$valor);
      $val = $this->borrar();
      return $val;
   }

    /**
    * Actualizar registros de SegPerfil
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setSegPerfilUpdate($datos)
   {
     $this->fijarValores($datos);
     $val = $this->guardar();
     return $val;
   }


    /**
     * Extraer el perfil relacionado a la vista dada
     * @param: String $id
     * @return array $tablas
     */
    public function getSegPerfilAction($apps,$table,$vista,$action)
    {
        // datos apps
        // datos table
        // datos vista
        // datos action
        $sql = "SELECT CASE WHEN COUNT(id)>0 THEN 'SI' ELSE 'NO' END AS existe FROM ".$this->tabla." WHERE id=".$data->data;
        $tmp=$this->executeQuery($sql);
        $tablas['datos'] = $tmp[0];
        $tablas['roles'] = $this->segPerfilRolesModel->getSegPerfilRolesShow($data->data);
        return $tablas;
    }

}
?>
