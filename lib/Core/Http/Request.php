<?php
namespace JPH\Core\Http;
use JPH\Core\Commun\{All,Logs};

/**
 * Permite contener un cunjunto de funcionalidades del protocolo http
 * @Author: Ing. Gregorio Bolívar <elalconxvii@gmail.com>
 * @Author: Blog: <http://gbbolivar.wordpress.com>
 * @created Date: 30/11/2017
 * @updated Date: 30/11/2017
 * @version: 0.1
 */

class Request
{
    use Logs;
    public $dataPost;
    public $dataGet;
    public function __construct()
    {
        $this->dataPost;
        $this->dataGet;
        return $this;
    }
    /**
     * Permite capturar peticiones del protocolo http del proceso GET
     * @param String $index, indece para buscar dentro del objeto $_GET
     * @return \http\get $dataGet
     */
    public function getParameter($index='')
    {
        $obj = self::complementsRequest($index,All::METHOD_GET);
        return $obj;
    }

    /**
     * Permite capturar peticiones del protocolo http del proceso POST
     * @param String $index, indece para buscar dentro del objeto $_POST
     * @return \http\post $dataGet
     */
    public function postParameter($index='')
    {
        $obj = self::complementsRequest($index,All::METHOD_POST);
        return $obj;

    }

    /**
     * Permite unir todos los funcionamientos de captura de ddatos por POST,GET
     * @param String $index, Permite identificar el valor de entrada del indece asociado solicitado
     * @param String $method, Method recibido
     * @return Strinf $data
     */
    private function complementsRequest($index,$method){
        // Verificaoms si la solicitud esta vacio y le envia el objeto del proceso
        try {
            if (empty($index) AND $method == 'GET') {
                return (object)$_GET;
            } elseif (empty($index) AND $method == 'POST') {
                return (object)$_POST;
            } elseif (!empty($index)) {
                $data = [];
                $tmp = explode(',', $index);
                foreach ($tmp AS $key) {
                    if ($method == 'GET') {
                        if(isset($_GET[$key])){
                            $data[$key] = $_GET[$key];
                        }else{
                            $obj = array('idx' => $key);
                            $msj = All::getMsjException('Core', 'get-val-no-existe',$obj);
                            $this->logError($msj);
                            throw new \TypeError($msj);
                        }
                    } else {
                        if(isset($_POST[$key])){
                            $data[$key] = $_POST[$key];
                        }else{
                            $obj = array('idx' => $key);
                            $msj = All::getMsjException('Core', 'post-val-no-existe',$obj);
                            $this->logError($msj);
                            throw new \TypeError($msj);
                        }
                    }
                }
                // Validar si es un solo item o varios
                if (count($tmp) < 2) {
                    $temp = array_values($data);
                    return $temp[0];
                } else {
                    return (object)$data;
                }
            }
        }catch (\TypeError $t){
            All::statusHttp(400);
            die($t->getMessage());
        }

    }

}