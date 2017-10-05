<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\All;
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 04/10/2017
 * @version: 1.0
 */ 

class RaumarysModel extends Main
{
   public function __construct()
   {
       $this->tabla = 'raumarys';
       $this->campoid = array('id');
       $this->campos = array('nombres','apellidos','cedula');
       parent::__construct();
   }

    /**
    * Extraer todos los registros de Raumarys
    * @return array $tablas
    */ 
   public function getRaumarysListar()
   {
     $tablas=$this->leerTodos();
     return $tablas;
   }

    /**
    * Crear registros nuevos de Raumarys
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setRaumarysCreate($datos)
   {
     $this->fijarValores($datos);
     $this->guardar();
     $val = $this->lastId();
     return $val;
   }

    /**
    * Extraer un registros de Raumarys
    * @param: String $id
    * @return array $tablas
    */ 
   public function getRaumarysShow($data)
   {
     $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$data->data;
     $tmp=$this->executeQuery($sql);
     $tablas['datos'] = $tmp[0];
     $tablas['error'] = 0;
     return $tablas;
   }

    /**
    * Eliminar registros de Raumarys
    * @param: string $id
    * @return array $tablas
    */ 
   public function remRaumarysDelete($datos)
   {
      $valor=base64_decode($datos->obj);
      $this->fijarValor('id',$valor);
      $val = $this->borrar();
      return $val;
   }

    /**
    * Actualizar registros de Raumarys
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setRaumarysUpdate($datos)
   {
     $this->fijarValores($datos);
     $val = $this->guardar();
     return $val;
   }
}
?>
