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

class SegRolesModel extends Base
{
   public function __construct()
   {
       $this->tabla = 'seg_roles';
       $this->campoid = array('id');
       $this->campos = array('detalle');
       parent::__construct();
       $this->segPerfilRolesModel = new SegPerfilRolesModel();
   }

    /**
    * Extraer todos los registros de SegRoles
    * @return array $tablas
    */ 
   public function getSegRolesListar($request,$result)
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
    * Crear registros nuevos de SegRoles
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setSegRolesCreate($datos)
   {
     $this->fijarValores($datos);
     $this->guardar();
     $val = $this->lastId();
     return $val;
   }

    /**
    * Extraer un registros de SegRoles
    * @param: String $id
    * @return array $tablas
    */ 
   public function getSegRolesShow($data)
   {
     $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$data->data;
     $tmp=$this->executeQuery($sql);
     $tablas['datos'] = $tmp[0];
     $tablas['error'] = 0;
     return $tablas;
   }

    /**
    * Eliminar registros de SegRoles
    * @param: string $id
    * @return array $tablas
    */ 
   public function remSegRolesDelete($datos)
   {
      $valor=base64_decode($datos->obj);
      $this->fijarValor('id',$valor);
      $val = $this->borrar();
      return $val;
   }

    /**
    * Actualizar registros de SegRoles
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setSegRolesUpdate($datos)
   {
        $this->fijarValor('id',$datos->id);
        $this->fijarValor('detalle',strtoupper($datos->detalle).' - '.strtoupper($datos->permisos));
        $val = $this->guardar();
        return $val;
   }

    /**
     * Asociar registros de SegRoles a la vista generada del generador
     * @param: arreglo $obj
     * @return array $tablas
     */
    public function setSegRolesGeneradorVistaAcceso($app,$tabla,$vista)
    {
        $accesos=array('ALTA','BAJA','CONSULTAS','MODIFICACION','CONTROL TOTAL');
        for ($a=0;$a<count($accesos);$a++){

            $detalle = $app.' - '.$tabla.' - '.$vista.' - '.$accesos[$a];
            $dato=self::getSegRolesExiste($detalle);
            if($dato->existe=='NO') {
                $this->fijarValor('detalle', strtoupper($detalle));
                $this->guardar();
                // Retorna el numero del rol registrado
                $seg_roles_id = $this->lastId();
                $seg_perfil_id = 1;
                // Asociar al perfil 1 => ROOT
                $val = $this->segPerfilRolesModel->getSegPerfilRolesAsociarVistaCreate($seg_perfil_id, $seg_roles_id);
            }
        }
        return true;
    }

    /**
     * verificar la eistencia de un rol para que no se repita
     * @param: String $id
     * @return array $tablas
     */
    public function getSegRolesExiste($detalle)
    {
        $sql = "SELECT CASE WHEN COUNT(id)>0 THEN 'SI' ELSE 'NO' END AS existe FROM ".$this->tabla." WHERE detalle='$detalle'";
        $tmp=$this->executeQuery($sql);
        return $tmp[0];

    }
}
?>
