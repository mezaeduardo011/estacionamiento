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
            //print_r( $datos->etiqueta[$a]);
            $this->fijarValor('conexiones_id',$data->conexiones_id);
            $this->fijarValor('entidad',$data->tabla);
            $this->fijarValor('nombre',$data->name);
            $this->fijarValor('field',$data->field[$a]);
            $this->fijarValor('type',$data->type[$a]);
            $this->fijarValor('dimension',$data->dimension[$a]);
            $this->fijarValor('mascara',$data->mascara[$a]);
            $this->fijarValor('label',$data->etiqueta[$a]);
            $this->fijarValor('restrincion',$data->restrincion[$a]);
            $this->guardar();
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
        $sql = "SELECT * FROM ".$this->tabla." WHERE conexiones_id=".$data['connect']." AND  entidad='".$data['tabla']."'";
        $temp = $this->executeQuery($sql);
        return $temp;
    }

    public function extraerDetalleEntidadeListado($data)
    {
        // Proceso la entidad que llega en un string separado por ,
        $data['entidad']=explode(',',$data['tabla']);
        $val = array();
        for ($a=0;$a<count($data['tabla']);$a++) {
            $sql = "SELECT * FROM ".$this->tabla." WHERE conexiones_id=".$data['connect']." AND  entidad='".$data['entidad'][$a]."'";
            $val[$data['entidad'][$a]] = $this->executeQuery($sql);
        }
        return $val;
    }


}
?>
