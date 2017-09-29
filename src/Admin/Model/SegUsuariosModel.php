<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\{All,Security};
use APP\Admin\Model\SegUsuariosPerfilModel;
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 25/09/2017
 * @version: 1.0
 */ 

class SegUsuariosModel extends Main
{
   use Security;
   public function __construct()
   {
       $this->tabla = 'seg_usuarios';
       $this->campoid = array('id');
       $this->campos = array('apellidos','nombres','fech_nacimiento','usuario','clave','correo','telefono','created_usuario_id','created_at','cuenta_bloqueada','fvence_clave','ivence_clave','cambiar_clave','login_fallidos','idioma','updated_usuario_id','removed_at','updated_at','nsesion','dactive');
       parent::__construct();
       $this->segUsuariosPerfilModel = new SegUsuariosPerfilModel();
   }

    /**
    * Extraer todos los registros de SegUsuarios
    * @return array $tablas
    */ 
   public function getSegUsuariosListar()
   {
     $tablas=$this->leerTodos();
     return $tablas;
   }

    /**
    * Crear registros nuevos de SegUsuarios
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setSegUsuariosCreate($datos)
   {
       //print_r();
       $roles = $datos->roles;
       unset($datos->roles);

       $user = $this->getSession('usuario');

       $this->fijarValores($datos);
       $this->fijarValor('created_usuario_id',$user->id);
       $this->fijarValor('created_at',All::now());
       $this->guardar();
       $val = $this->lastId();
       $this->segUsuariosPerfilModel->getSegPerfilRelacionUserCreate($roles,$val);
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

     $sql = "SELECT a.seg_perfil_id, b.detalle AS perfil  FROM seg_usuarios_perfil AS a";
     $sql .= " LEFT JOIN seg_perfil AS b ON a.seg_perfil_id=b.id  ";
     $sql .= " WHERE a.seg_usuarios_id=".$data->data;
     $tablas['perfiles']=$this->executeQuery($sql);
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
      return $val;
   }

    /**
    * Actualizar registros de SegUsuarios
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setSegUsuariosUpdate($datos)
   {
     $roles = $datos->roles;
     $this->segUsuariosPerfilModel->setSegPerfilRelacionUserUpdate($roles,$datos->id);
     unset($datos->roles);
     $this->fijarValores($datos);
     $val = $this->guardar();
     return $val;
   }
}
?>
