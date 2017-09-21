<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Main;
use JPH\Core\Commun\All;
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 15/09/2017
 * @version: 1.0
 */ 
class HoVistasModel extends Main
{
   public function __construct()
   {
       $this->tabla = 'ho_vistas';
       $this->campoid = array('id');
       $this->campos = array('conexiones_id','entidad','nombre','field','type','dimension', 'restrincion', 'label','mascara','required','place_holder','relacionado','vista_campo','orden','hidden_form','hidden_list');
       parent::__construct();
   }

   public function setConfiguracionVistaNew($data)
   {
       //All::pp($datos);
        $temp = array();
        for ($a=0;$a<count($data->field);$a++){
            if(!empty(trim($data->etiqueta[$a]))) {
                $this->fijarValor('conexiones_id', $data->conexiones_id);
                $this->fijarValor('entidad', $data->tabla);
                $this->fijarValor('nombre', $data->name);
                $this->fijarValor('field', $data->field[$a]);
                $this->fijarValor('type', $data->type[$a]);
                $this->fijarValor('dimension', $data->dimension[$a]);
                $this->fijarValor('mascara', $data->mascara[$a]);
                $this->fijarValor('label', $data->etiqueta[$a]);
                $this->fijarValor('restrincion', $data->restrincion[$a]);
                $this->fijarValor('required', $data->required[$a]);
                $this->guardar();
            }
        }
       //$this->fijarValores($datos);
       $val = $this->lastId();
       return $val;
   }

    /**
     * Permite extraer el detalle completo de la entidad que ya esta registrada
     * @return array $tmp, informacion de los diferentes entidades
     */
    public function extraerDetalleEntidade($data)
    {
        $vista = explode('-',$data['vista']);
        $sql = "SELECT * FROM ".$this->tabla." WHERE conexiones_id=".$data['connect']." AND  entidad='".$data['tabla']."' AND nombre='".$vista[1]."'";
        $temp = $this->executeQuery($sql);
        return $temp;
    }

    public function extraerDetalleEntidadListado($data)
    {
        $registro = array();
        // Recibimos todas las entidades seleccionadas dependiendo de la conexion enviada y la pasamos a un arreglo
        $data['entidad']=explode(',',$data['tabla']);
        // Recorremos las entidades y verificamos las las vistas existentes
        for ($a=0;$a<count($data['entidad']);$a++) {
            // Hacemos las consultas para identificar cuales vistas tiene
            $sql = "SELECT * FROM view_list_vist_gene WHERE conexiones_id=" . $data['connect'] . " AND entidad='" . $data['entidad'][$a] . "'";
            $val[$data['entidad'][$a]] = $this->executeQuery($sql);

            $sql = "SELECT * FROM ho_entidades WHERE conexiones_id=" . $data['connect'] . " AND entidad='" . $data['entidad'][$a] . "'";
            $registro[$data['entidad'][$a]]['columnas'] = $this->executeQuery($sql);

            foreach ($val AS $key => $value){
                foreach ($value AS $key => $value2) {
                    $sql = "SELECT * FROM ho_vistas WHERE conexiones_id=" . $value2->conexiones_id . " AND entidad='" . $value2->entidad . "' AND nombre='" . $value2->nombre . "'";
                    $obj = $this->executeQuery($sql);
                    $registro[$value2->entidad][$value2->nombre] = $obj;
                }
            }
        }
        return $registro;
    }

    /**
     * Permite actualizar que fue procesada la vista
     */
    public function updateStatusVista($conn, $entidad,$vita)
    {
        $sql = "UPDATE ho_vistas SET procesado=1  WHERE conexiones_id=".$conn." AND  entidad='".$entidad."' AND nombre='".$vita."'";
        $temp = $this->execute($sql);
        return $temp;
    }


}
?>
