<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\All;
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 25/09/2017
 * @version: 1.0
 */ 

class SegPerfilModel extends Main
{
   public function __construct()
   {
       $this->tabla = 'seg_perfil';
       $this->campoid = array('id');
       $this->campos = array('detalle');
       parent::__construct();
       $this->segPerfilRolesModel = new SegPerfilRolesModel();
   }

    /**
    * Extraer todos los registros de SegPerfil
    * @return array $tablas
    */ 
   public function getSegPerfilListar()
   {
     $tablas=$this->leerTodos();
     return $tablas;
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
