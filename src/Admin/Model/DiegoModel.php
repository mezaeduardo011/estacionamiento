<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\All;
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 03/10/2017
 * @version: 1.0
 */ 

class DiegoModel extends Main
{
   public function __construct()
   {
       $this->tabla = 'diego';
       $this->campoid = array('id');
       $this->campos = array('nombres','correo');
       parent::__construct();
   }

    /**
    * Extraer todos los registros de Diego
    * @return array $tablas
    */ 
   public function getDiegoListar()
   {
     $tablas=$this->leerTodos();
     return $tablas;
   }

    /**
    * Crear registros nuevos de Diego
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setDiegoCreate($datos)
   {
     $this->fijarValores($datos);
     $this->guardar();
     $val = $this->lastId();
     return $val;
   }

    /**
    * Extraer un registros de Diego
    * @param: String $id
    * @return array $tablas
    */ 
   public function getDiegoShow($data)
   {
     $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$data->data;
     $tmp=$this->executeQuery($sql);
     $tablas['datos'] = $tmp[0];
     $tablas['error'] = 0;
     return $tablas;
   }

    /**
    * Eliminar registros de Diego
    * @param: string $id
    * @return array $tablas
    */ 
   public function remDiegoDelete($datos)
   {
      $valor=base64_decode($datos->obj);
      $this->fijarValor('id',$valor);
      $val = $this->borrar();
      return $val;
   }

    /**
    * Actualizar registros de Diego
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setDiegoUpdate($datos)
   {
     $this->fijarValores($datos);
     $val = $this->guardar();
     return $val;
   }
}
?>
