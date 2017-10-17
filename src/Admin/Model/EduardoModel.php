<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\{All,Security};
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 17/10/2017
 * @version: 1.0
 */ 

class EduardoModel extends Main
{
   use Security;
   public function __construct()
   {
       $this->tabla = 'eduardo';
       $this->campoid = array('id');
       $this->campos = array('nombres','correo');
       parent::__construct();
   }

    /**
    * Extraer todos los registros de Eduardo
    * @return array $tablas
    */ 
   public function getEduardoListar($datos)
   {
     $tablas=$this->leerTodos($datos);
     return $tablas;
   }

    /**
    * Crear registros nuevos de Eduardo
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setEduardoCreate($datos)
   {
     $this->fijarValores($datos);
     $this->guardar();
     $val = $this->lastId();
     return $val;
   }

    /**
    * Extraer un registros de Eduardo
    * @param: String $id
    * @return array $tablas
    */ 
   public function getEduardoShow($data)
   {
     $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$data->data;
     $tmp=$this->executeQuery($sql);
     $tablas['datos'] = $tmp[0];
     $tablas['error'] = 0;
     return $tablas;
   }

    /**
    * Eliminar registros de Eduardo
    * @param: string $id
    * @return array $tablas
    */ 
   public function remEduardoDelete($datos)
   {
      $valor=base64_decode($datos->obj);
      $this->fijarValor('id',$valor);
      $val = $this->borrar();
      return $val;
   }

    /**
    * Actualizar registros de Eduardo
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setEduardoUpdate($datos)
   {
     $this->fijarValores($datos);
     $val = $this->guardar();
     return $val;
   }
}
?>
