<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\All;
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 21/09/2017
 * @version: 1.0
 */ 

class TestAutosModel extends Main
{
   public function __construct()
   {
       $this->tabla = 'test_autos';
       $this->campoid = array('id');
       $this->campos = array('id_persona','marca','modelo','anio');
       parent::__construct();
   }

    /**
    * Extraer todos los registros de TestAutos
    * @return array $tablas
    */ 
   public function getTestAutosListar($request)
   {

     $tablas=$this->leerTodos();
     return $tablas;
   }

    /**
    * Crear registros nuevos de TestAutos
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setTestAutosCreate($datos)
   {
     $this->fijarValores($datos);
     $this->guardar();
     $val = $this->lastId();
     return $val;
   }

    /**
    * Extraer un registros de TestAutos
    * @param: String $id
    * @return array $tablas
    */ 
   public function getTestAutosShow($data)
   {
     $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$data->data;
     $tmp=$this->executeQuery($sql);
     $tablas['datos'] = $tmp[0];
     $tablas['error'] = 0;
     return $tablas;
   }

    /**
    * Eliminar registros de TestAutos
    * @param: string $id
    * @return array $tablas
    */ 
   public function remTestAutosDelete($datos)
   {
      $valor=base64_decode($datos->obj);
      $this->fijarValor('id',$valor);
      $val = $this->borrar();
      return $val;
   }

    /**
    * Actualizar registros de TestAutos
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setTestAutosUpdate($datos)
   {
     $this->fijarValores($datos);
     $val = $this->guardar();
     return $val;
   }
}
?>
