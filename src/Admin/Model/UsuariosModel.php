<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\{Main,Usuarios};
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 01/09/2017
 * @version: 1.0
 */ 

class UsuariosModel extends Main
{  
   use Usuarios;
   public function __construct()
   {    
       $this->tabla = 'segusuarios';
       // $this->campoid = array('nameId');
       // $this->campos = array('campos');
       $obj=parent::__construct();
       $this->start($obj);
       return $this;
   }

    /**
    * Extraer todos los registros de Usuarios
    * @return array $tablas
    */ 
   public function getUsuariosIndex()
   {
     $sql = "select * from SegUsuarios order by Cusuario";
     $tablas=$this->executeQuery($sql);
     return $tablas;
   }

    /**
    * Crear registros nuevos de Usuarios
    * @param: Array $datos
    * @return array $tablas
    */ 
   public function setUsuariosCreate($datos)
   {
       if ($datos->accion == "C") {
           $this->nusuario = $datos->id;
           $this->obtenerJSON();
       } else if ($datos->accion == "B") {
           $this->nusuario = $datos->id;
           $this->borrar();
       } else if ($datos->accion == "cambioClave") {
           $this->nusuario = $_SESSION["usuario"]->nusuario;
           $this->password = md5($datos->nuevaClave);
           $this->cambiarClave();
       } else {
           $this->nusuario = NULL;
           $this->usuario = $datos->cusuario;
           
           if($datos->pw != ''){
               $this->password = md5($datos->pw);
           }else{
               $this->password = $datos->pw;
           }
           
           $this->apellido = $datos->apellido;
           $this->nombre = $datos->nombre;
           $this->correo = $datos->correo;
           $this->telefono = $datos->telefono;
           $this->bloqueada = $datos->bloqueada;
           $this->cambiarPW = $datos->cambiarPW;
           $id = $this->grabar();
           return $id;
       }
   }

    /**
    * Extraer un registros de Usuarios
    * @param: String $id
    * @return array $tablas
    */ 
   public function getUsuariosShow($id)
   {
     $sql = "SELECT * FROM miTabla WHERE id=$id";
     $tablas=$this->executeQuery($sql);
     return $tablas;
   }

    /**
    * Eliminar registros de Usuarios
    * @param: string $id
    * @return array $tablas
    */ 
   public function remUsuariosDelete($id)
   {
     $sql = "DELETE FROM miTabla WHERE id=$id";
     $tablas=$this->executeQuery($sql);
     return $tablas;
   }

    /**
    * Actualizar registros de Usuarios
    * @param: arreglo $obj
    * @return array $tablas
    */ 
   public function setUsuariosUpdate($obj)
   {
     $sql = "UPDATE SET campo=".$obj['campo']." miTabla WHERE id=".$obj['id']." ";
     $tablas=$this->executeQuery($sql);
     return $tablas;
   }
}
?>
