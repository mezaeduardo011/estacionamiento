<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\All;
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 17/09/2017
 * @version: 1.0
 */ 

class TestAbmModel extends Main
{
   public function __construct()
   {
       $this->tabla = 'test_abm';
       $this->campoid = array('id');
       $this->campos = array('id','name','last_name','address','telephone');
       parent::__construct();
   }

    /**
    * Extraer todos los registros de TestAbm
    * @return array $tablas
    */ 
   public function getTestAbmListar()
   {
     $sql = "SELECT * FROM miTabla";
     $tablas=$this->executeQuery($sql);
     return $tablas;
   }

    /**
    * Crear registros nuevos de TestAbm
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setTestAbmCreate($datos)
   {
     $sql = "INERT INTO miTabla (campo1, campo) VALUES('valor1','valor2')";
     $tablas=$this->executeQuery($sql);
     return $tablas;
   }

    /**
    * Extraer un registros de TestAbm
    * @param: String $id
    * @return array $tablas
    */ 
   public function getTestAbmShow($id)
   {
     $sql = "SELECT * FROM miTabla WHERE id=$id";
     $tablas=$this->executeQuery($sql);
     return $tablas;
   }

    /**
    * Eliminar registros de TestAbm
    * @param: string $id
    * @return array $tablas
    */ 
   public function remTestAbmDelete($id)
   {
     $sql = "DELETE FROM miTabla WHERE id=$id";
     $tablas=$this->executeQuery($sql);
     return $tablas;
   }

    /**
    * Actualizar registros de TestAbm
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setTestAbmUpdate($obj)
   {
     $sql = "UPDATE SET campo=".$obj['campo']." miTabla WHERE id=".$obj['id']." ";
     $tablas=$this->executeQuery($sql);
     return $tablas;
   }
}
?>
