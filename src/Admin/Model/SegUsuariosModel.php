<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Base;
use JPH\Core\Commun\{
    All, Constant, Security
};
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 25/09/2017
 * @version: 1.0
 */ 

class SegUsuariosModel extends Base
{
   use Security;
   public function __construct()
   {
       $this->tabla = 'seg_usuarios';
       $this->campoid = array('id');
       $this->campos = array('apellidos','nombres','fech_nacimiento','usuario','clave','correo','telefono','created_usuario_id','created_at','cuenta_bloqueada','fvence_clave','ivence_clave','cambiar_clave','login_fallidos','idioma','updated_usuario_id','removed_at','updated_at','nsesion','dactive');
       parent::__construct('admin');
       $this->segUsuariosPerfilModel = new SegUsuariosPerfilModel();
       $this->segLogAccionesModel = new SegLogAccionesModel();
   }

    /**
     * Extraer todos los registros de SegUsuarios
     * @return array $tablas
     */
    public function getSegUsuariosListarCombo()
    {
        $tablas=$this->leerTodos();
        return $tablas;
    }
    /**
    * Extraer todos los registros de SegUsuarios
     * @param Array $request los datos enviado por el navegador
     * @param Array $result inluyendo el resultado de los campos
     * @return array $tablas
     */
   public function getSegUsuariosListar($request,$result)
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
    * Crear registros nuevos de SegUsuarios
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setSegUsuariosCreate($datos)
   {
       die('llego');
       $roles = $datos->roles;
       unset($datos->roles);

       $user = $this->getSession('usuario');

       $this->fijarValores($datos);
       $this->fijarValor('created_usuario_id',$user->id);
       $this->fijarValor('created_at',All::now());
       $this->guardar();
       $val = $this->lastId();
       $this->segUsuariosPerfilModel->getSegPerfilRelacionUserCreate($roles,$val);

       // Registra log de auditoria de registro de acciones
       $user = $this->getSession('usuario');
       $this->segLogAccionesModel->cargaAcciones($this->tabla, $val,serialize($datos),'', $user->id, parent::LOG_ALTA);

       return $val;
   }

    /**
    * Extraer un registros de SegUsuarios
    * @param: String $id
    * @return array $tablas
    */ 
   public function getSegUsuariosShow($data)
   {
     $sql = "SELECT * FROM ".$this->tabla ." AS a";
     $sql .= " WHERE a.id=".$data->data;
     $tmp=$this->executeQuery($sql);
     $tablas['datos'] = $tmp[0];
     $tablas['error'] = 0;

     $sql = "SELECT a.seg_perfil_id, b.detalle AS perfil  FROM seg_usuarios_perfil AS a";
     $sql .= " LEFT JOIN seg_perfil AS b ON a.seg_perfil_id=b.id  ";
     $sql .= " WHERE a.seg_usuarios_id=".$data->data;
     $tablas['perfiles']=$this->executeQuery($sql);
     // Registro de Auditoria
     $user = $this->getSession('usuario');
     $this->segLogAccionesModel->cargaAcciones($this->tabla, $data->data,'','',$user->id,Constant::LOG_CONS);
     return $tablas;
   }

    /**
    * Eliminar registros de SegUsuarios
    * @param: string $id
    * @return array $tablas
    */ 
   public function remSegUsuariosDelete($datos)
   {
      $valor=base64_decode($datos->obj);
      $this->segUsuariosPerfilModel->remSegPerfilRelacionUserDelete($valor);
      $this->fijarValor('id',$valor);
      $val = $this->borrar();
      // Registro de Auditoria
       $user = $this->getSession('usuario');
       $this->segLogAccionesModel->cargaAcciones($this->tabla, $valor,'','', $user->id,Constant::LOG_BAJA);
       return $val;
   }

    /**
    * Actualizar registros de SegUsuarios
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setSegUsuariosUpdate($datos)
   {
        $user = $this->getSession('usuario');
        $roles = $datos->roles;
        $this->segUsuariosPerfilModel->setSegPerfilRelacionUserUpdate($roles,$datos->id);
        unset($datos->roles);
        $this->fijarValores($datos);
        $this->fijarValor('updated_usuario_id',$user->id);
        $this->fijarValor('updated_at',All::now());
        $val = $this->guardar();
        // Setear log de registro de acciones
        $this->segLogAccionesModel->cargaAcciones($this->tabla, $datos->id,'', json_encode($datos), $user->id,Constant::LOG_MODI);
        return $val;
   }

   public function reCargarRoles($id)
   {
       $query = "select  roles from view_seguridad WHERE id = ".$id;
       /*$this->db->get($query);
       $rows = $this->db->numRows();
       
       if ($rows > 0) {
           while ($row = $this->db->fetch()) {
               $this->roles[] = $row->roles;
           }
       }*/
       $roles = $this->executeQuery($query);
       return $roles;
       //return $this->roles;
   }
   
   /**
    * Permite extraer los perfiles dosponibles para los usuarios para asociar al menu
    * @return array $roles
    */
   
   public function reCargarPerfiles()
   {
       $query = "select * from seg_perfil";
       $roles = $this->executeQuery($query);
       return $roles;
   }
}
?>
