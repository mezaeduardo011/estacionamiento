<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\{All,Security};
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 23/10/2017
 * @version: 1.0
 */ 

class PruebaModel extends Main
{
   use Security;
   public function __construct()
   {
       $this->tabla = 'prueba';
       $this->campoid = array('id');
       $this->campos = array('nombre');
       parent::__construct();
   }

    /**
    * Extraer todos los registros de Prueba
    * @return array $tablas
    */ 
   public function getPruebaListar($datos)
   {
     $tablas=$this->leerTodos($datos);
     return $tablas;
   }

    /**
    * Crear registros nuevos de Prueba
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setPruebaCreate($datos)
   {
     $this->fijarValores($datos);
     $this->guardar();
     $val = $this->lastId();
     return $val;
   }

    /**
    * Extraer un registros de Prueba
    * @param: String $id
    * @return array $tablas
    */ 
   public function getPruebaShow($data)
   {
     $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$data->data;
     $tmp=$this->executeQuery($sql);
     $tablas['datos'] = $tmp[0];
     $tablas['error'] = 0;
     return $tablas;
   }

    /**
    * Eliminar registros de Prueba
    * @param: string $id
    * @return array $tablas
    */ 
   public function remPruebaDelete($datos)
   {
      $valor=base64_decode($datos->obj);
      $this->fijarValor('id',$valor);
      $val = $this->borrar();
      return $val;
   }

    /**
    * Actualizar registros de Prueba
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setPruebaUpdate($datos)
   {
     $this->fijarValores($datos);
     $val = $this->guardar();
     return $val;
   }
}
?>
