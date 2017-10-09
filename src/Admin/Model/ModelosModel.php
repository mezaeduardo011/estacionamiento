<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\{All,Security};
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 07/10/2017
 * @version: 1.0
 */ 

class ModelosModel extends Main
{
   use Security;
   public function __construct()
   {
       $this->tabla = 'modelos';
       $this->campoid = array('id');
       $this->campos = array('detalle');
       parent::__construct();
   }

    /**
    * Extraer todos los registros de Modelos
    * @return array $tablas
    */ 
   public function getModelosListar()
   {
     $tablas=$this->leerTodos();
     return $tablas;
   }

    /**
    * Crear registros nuevos de Modelos
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setModelosCreate($datos)
   {
     $this->fijarValores($datos);
     $this->guardar();
     $val = $this->lastId();
     return $val;
   }

    /**
    * Extraer un registros de Modelos
    * @param: String $id
    * @return array $tablas
    */ 
   public function getModelosShow($data)
   {
     $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$data->data;
     $tmp=$this->executeQuery($sql);
     $tablas['datos'] = $tmp[0];
     $tablas['error'] = 0;
     return $tablas;
   }

    /**
    * Eliminar registros de Modelos
    * @param: string $id
    * @return array $tablas
    */ 
   public function remModelosDelete($datos)
   {
      $valor=base64_decode($datos->obj);
      $this->fijarValor('id',$valor);
      $val = $this->borrar();
      return $val;
   }

    /**
    * Actualizar registros de Modelos
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setModelosUpdate($datos)
   {
     $this->fijarValores($datos);
     $val = $this->guardar();
     return $val;
   }
}
?>
