<?php
namespace APP\Admin\Model;
use JPH\Complements\Database\Base;
use JPH\Core\Commun\All;
use JPH\Core\Commun\Security;
use JPH\Core\Store\Cache;

/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Hornero 4
 * @autor: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 21/12/2017
 * @version: 2.0
 */
class SegCambioClaveModel extends Base
{
    use Security;
    public function __construct()
    {
        $this->tabla = 'seg_cambio_clave';
        $this->campoid = array('id');
        $this->campos = array('token','estatus','created_usuario_id','created_at','updated_at');

        // Clase de registro de auditoria de las acciones
        $this->segLogAccionesModel = new SegLogAccionesModel();
        parent::__construct('admin');
        return $this;

    }


    /**
     * Crear registros nuevos de Prueba
     * @param: Array $datos
     * @return array $tablas
     */
    public function setSegCambioClaveCreate($userId, $datos)
    {
        $this->fijarValor('token',$datos);
        $this->fijarValor('created_usuario_id',$userId);
        $this->fijarValor('estatus',0);
        $this->fijarValor('created_at',All::now());
        $this->guardar();
        $val = $this->lastId();
        // Registra log de auditoria de registro de acciones
        $this->segLogAccionesModel->cargaAcciones($this->tabla, $val, serialize($datos),'', $userId, parent::LOG_ALTA);
        return $val;
    }

    /**
     * Crear registros nuevos de Prueba
     * @param: Array $datos
     * @return array $tablas
     */
    public function setSegCambioClaveUpdate($id,$userId)
    {
        $this->fijarValor('id',$id);
        $this->fijarValor('estatus',1);
        $this->fijarValor('updated_at',All::now());
        $this->guardar();
        // Registra log de auditoria de registro de acciones
        $this->segLogAccionesModel->cargaAcciones($this->tabla, $id, '','', $userId, parent::LOG_MODI);
        return $val;
    }

    public function getSegCambioClave($datos)
    {
        $sql = "SELECT * FROM ". $this->tabla." WHERE token='$datos'";
        $val = $this->executeQuery($sql);
        return $val;
    }

}
?>
