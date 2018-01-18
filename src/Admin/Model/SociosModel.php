<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Base;
use JPH\Core\Commun\{All,Security};
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 4
 * @autor: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 04/12/2017
 * @version: 1.0
 */ 

class SociosModel extends Base
{
   use Security;
   public function __construct()
   {
       $this->tabla = 'socios';
       $this->campoid = array('id');
       $this->campos = array('tipo_documento','documento','nombres','apellidos','fecha_nacimiento','created_usuario_id','updated_usuario_id','created_at','updated_at');
       parent::__construct();
       // Clase de registro de auditoria de las acciones
       $this->segLogAccionesModel = new SegLogAccionesModel();
   }

    /**
    * Extraer todos los registros de Socios
    * @return array $tablas
    */ 
   public function getSociosListarCombo($request,$result)
   {
     $tablas=$this->leerTodos($datos);
     return $tablas;
   }

    /**
    * Extraer todos los registros de Socios
    * @return array $tablas
    */ 
   public function getSociosListar($request,$result)
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
    * Crear registros nuevos de Socios
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setSociosCreate($datos)
   {
     $user = $this->getSession('usuario');
     $this->fijarValores($datos);
     $this->fijarValor('created_usuario_id',$user->id);
     $this->fijarValor('created_at',All::now());
     $this->guardar();
     $val = $this->lastId();

    // Registra log de auditoria de registro de acciones
     //$this->segLogAccionesModel->cargaAcciones($this->tabla, $val, serialize($datos),'', $user->id, parent::LOG_ALTA);
     return $val;
   }

    /**
    * Extraer un registros de Socios
    * @param: String $id
    * @return array $tablas
    */ 
   public function getSociosShow($data)
   {
     $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$data->data;
     $tmp=$this->executeQuery($sql);
     $tablas['datos'] = $tmp[0];
     $tablas['error'] = 0;
     // Registro de Auditoria
     $user = $this->getSession('usuario');
     $this->segLogAccionesModel->cargaAcciones($this->tabla, $data->data, '','', $user->id, parent::LOG_CONS);
     return $tablas;
   }

    /**
    * Eliminar registros de Socios
    * @param: string $id
    * @return array $tablas
    */ 
   public function remSociosDelete($datos)
   {
      $valor=base64_decode($datos->obj);
      $this->fijarValor('id',$valor);
      $val = $this->borrar();
      // Registro de Auditoria
      $user = $this->getSession('usuario');
      $this->segLogAccionesModel->cargaAcciones($this->tabla, $valor,'','', $user->id, parent::LOG_BAJA);
      return $val;
   }

    /**
    * Actualizar registros de Socios
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setSociosUpdate($datos)
   {
     $this->fijarValores($datos);
     $this->fijarValor('updated_usuario_id',$user->id);
     $this->fijarValor('updated_at',All::now());
     $val = $this->guardar();
     // Setear log de registro de acciones
      $user = $this->getSession('usuario');
     $this->segLogAccionesModel->cargaAcciones($this->tabla, $datos->id,'', json_encode($datos), $user->id, parent::LOG_MODI);
     return $val;
   }
}
?>
