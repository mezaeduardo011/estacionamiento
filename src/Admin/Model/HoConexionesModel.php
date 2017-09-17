<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\All;
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 14/09/2017
 * @version: 1.0
 */ 
class HoConexionesModel extends Main
{
   public function __construct()
   {
       $this->tabla = 'ho_conexiones';
       $this->campoid = array('id');
       $this->campos = array('label', 'driver', 'host', 'db', 'usuario', 'clave');
       parent::__construct();
   }

    /**
     *  Encargado de registrar todas las conexiona a base de datos que sean necesarias
     * @param Object $data
     * @return Boolean $val
     */
    public function setDataBase($data)
    {
        $this->fijarValores($data);
        $this->guardar();
        $val = $this->lastId();
        return $val;
    }

    /**
     * Permite extraer las conexiones existententes
     * @param Integer $data,identificador de las conexioes
     * @param Object $val
     */
    public function getExtraerConexiones($data='NULL')
    {
        if($data=='NULL'){
            $where = '';
        }else{
            $where = ' WHERE id='.(int)$data;
        }
        $sql = "SELECT * FROM ho_conexiones".$where;
        $val = $this->executeQuery($sql);
        return $val;
    }

    /**
     * Permite Verificar si una conexion existe en base de datos
     * @param Sting $label, etiqueta de conexion o token
     * @param String $val, SI o NO
     */
    public function getExtraerConexionesToken($label)
    {
        $sql = "SELECT (CASE count(id) WHEN 0 THEN 'NO' ELSE 'SI' END) AS existe  FROM ho_conexiones WHERE label='$label'";
        $val = $this->executeQuery($sql);
        return $val[0];
    }

    /**
     * Permite extraer todas las entidades(Tablas) correspondiente a la conexion descartando las tablas necesarias del sistema
     * @param objeto $data,identificador de la conexion para poder consultar la entidades relacionadas
     * @return Objeto $tablas;
     */
    public function getAllUniverso($data)
    {
        $sql = "SELECT * FROM ho_conexiones WHERE id=".$data->db;
        $val = $this->executeQuery($sql);
        // Permite extraer las entidades de la conexion actual desde la informacion schema
        //$sql = "SELECT * FROM ".$val[0]->db.".INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME not like 'ho_%' AND TABLE_TYPE='BASE TABLE' AND TABLE_NAME not like 'seg%'";
        $sql = "SELECT a.*, (SELECT COUNT(b.TABLE_NAME) from ".$val[0]->db.".INFORMATION_SCHEMA.COLUMNS AS b WHERE b.TABLE_NAME = a.TABLE_NAME) AS TABLE_COLUMNS, (SELECT (CASE count(*) WHEN 0 THEN 'NO' ELSE 'SI' END)   FROM ho_entidades AS c WHERE c.entidad = a.TABLE_NAME  ) AS TABLE_REGISTRADA ";
        $sql .= "FROM ".$val[0]->db.".INFORMATION_SCHEMA.TABLES AS a ";
        $sql .= "WHERE a.TABLE_NAME not like 'ho_%' AND a.TABLE_TYPE='BASE TABLE' AND a.TABLE_NAME not like 'seg%'";
        $tablas=$this->executeQuery($sql);
        return $tablas;
    }
}

?>
