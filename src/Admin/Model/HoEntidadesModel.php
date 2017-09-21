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
       $this->campos = array('conexiones_id','entidad','field','type','restrincion');
       parent::__construct();
   }
    /**
     * Permite Agregar entidades nueva a la tabla de configuracion
     * @param Integer $db, Identificador de la base de datos
     * @param String $data, entidad encargada de procesar los datos
     */
    public function registrarEntidadesConfig($db,$data )
    {
        $sql = "SELECT * FROM ho_conexiones WHERE id=".$db;
        $conect = $this->executeQuery($sql);
        $sql = "DELETE FROM ho_entidades WHERE conexiones_id=$db";
        $this->execute($sql);
        for ($a=0;$a<count($data);$a++) {

            $t = $this->showColumns($data[$a],$conect[0]->db);
            $sql = "";
            foreach ($t AS $key => $value) {
                $da = explode('(', $value->Type);
                $dim = str_replace(')', ' ', $da[1]);
                $sql = "INSERT INTO ho_entidades (conexiones_id,entidad,field,type,required,dimension,restrincion) VALUES($db,'" . $data[$a] . "','" . $value->Field . "','" . $da[0] . "','" . $value->Null . "',$dim,'" . $value->Key . "');";
                $return = $this->execute($sql);
            }
        }
        return true;
    }

    /**
     * Permite extraer etidades y detalles de las vistas relacionadas a una conexion seleccionada
     * @return array $tmp, informacion de los diferentes entidades
     */
    public function extraerTodasLasEntidades($data)
    {
        // Proceso la entidad que llega en un string separado por ,
        $data['entidad']=explode(',',$data['entidad']);
        $val = array();
        for ($a=0;$a<count($data['entidad']);$a++) {
           $sql = "SELECT * FROM view_list_enti_regi AS a
                    WHERE a.entidad='".$data['entidad'][$a]."' AND conexiones_id=".$data['conn'];
            $val[$data['entidad'][$a]] = $this->executeQuery($sql);
        }
        return $val;
    }

    /**
     * Permite extraer el detalle completo de la entidad que ya esta registrada
     * @return array $tmp, informacion de los diferentes entidades
     */
    public function extraerDetalleEntidade($data)
    {


        $sql = "SELECT * FROM ".$this->tabla." WHERE conexiones_id=".$data['connect']." AND  entidad='".$data['tabla']."'";
        $temp = $this->executeQuery($sql);
        return $temp;
    }


}
?>
