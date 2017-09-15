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
class HoEntidadesModel extends Main
{
   public function __construct()
   {
       $this->tabla = 'ho_entidades';
       $this->campoid = array('id');
       $this->campos = array('conexiones_id','tabla','field','type','restrincion');
       parent::__construct();
   }
    /**
     * Permite Agregar entidades nueva a la tabla de configuracion
     * @param Integer $db, Identificador de la base de datos
     * @param String $table, entidad encargada de procesar los datos
     */
    public function registrarEntidadesConfig($db,$table )
    {

        $sql = "DELETE FROM ho_entidades WHERE conexiones_id=$db";
        $this->execute($sql);
        for ($a=0;$a<count($table);$a++) {
            $t = $this->showColumns($table[$a]);
            $sql = "";
            foreach ($t AS $key => $value) {
                $da = explode('(', $value->Type);
                $dim = str_replace(')', ' ', $da[1]);
                $sql = "INSERT INTO ho_entidades (conexiones_id,tabla,field,type,required,dimension,restrincion) VALUES($db,'" . $table[$a] . "','" . $value->Field . "','" . $da[0] . "','" . $value->Null . "',$dim,'" . $value->Key . "');";
                $return = $this->execute($sql);
            }
        }
        return true;
    }

    /**
     * Permite extraer etidades y detalles de las vistas relacionadas a una conexion seleccionada
     * @return array $tmp, informacion de los diferentes entidades
     */
    public function extraerTodasLasEntidades($tabla)
    {

        $val = array();
        for ($a=0;$a<count($tabla['entidad']);$a++) {
            $sql = "SELECT a.tabla, count(b.label) AS catidad, b.label FROM ho_entidades AS a
                    LEFT JOIN ho_vistas AS b ON a.tabla=b.entidades_tabla
                    WHERE tabla='".$tabla['entidad'][$a]."'
                    GROUP BY a.tabla, label;";
            $val[$tabla['entidad'][$a]] = $this->executeQuery($sql);
        }
        return $val;
    }

    /**
     * Permite extraer el detalle completo de la entidad que ya esta registrada
     * @return array $tmp, informacion de los diferentes entidades
     */
    public function extraerDetalleEntidade($tabla)
    {
        $sql = "SELECT * FROM ".$this->tabla." WHERE conexiones_id=".$tabla['connect']." AND  tabla='".$tabla['tabla']."'";
        $temp = $this->executeQuery($sql);
        return $temp;
    }
}
?>
