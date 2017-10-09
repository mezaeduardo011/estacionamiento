<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\{All,Security};
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 05/10/2017
 * @version: 1.0
 */ 

class PersonalModel extends Main
{
   use Security;
   public function __construct()
   {
       $this->tabla = 'personal';
       $this->campoid = array('id');
       $this->campos = array('nombres','apellidos','correo','estatus','created_at','updated_at');
       parent::__construct();
   }

    /**
    * Extraer todos los registros de Personal
    * @return array $tablas
    */ 
   public function getPersonalListar($datos)
   {
     $tablas=$this->leerTodos($datos);
     return $tablas;
   }

    /**
    * Crear registros nuevos de Personal
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setPersonalCreate($datos)
   {
     $this->fijarValores($datos);
     $this->fijarValor('created_at',All::now());
     $this->guardar();
     $val = $this->lastId();
     return $val;
   }

    /**
    * Extraer un registros de Personal
    * @param: String $id
    * @return array $tablas
    */ 
   public function getPersonalShow($data)
   {
     $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$data->data;
     $tmp=$this->executeQuery($sql);
     $tablas['datos'] = $tmp[0];
     $tablas['error'] = 0;
     return $tablas;
   }

    /**
    * Eliminar registros de Personal
    * @param: string $id
    * @return array $tablas
    */ 
   public function remPersonalDelete($datos)
   {
      $valor=base64_decode($datos->obj);
      $this->fijarValor('id',$valor);
      $val = $this->borrar();
      return $val;
   }

    /**
    * Actualizar registros de Personal
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setPersonalUpdate($datos)
   {
     $this->fijarValores($datos);
     $this->fijarValor('updated_at',All::now());
     $val = $this->guardar();
     return $val;
   }
}
?>
