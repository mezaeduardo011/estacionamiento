<?php
/**
 * Clase Controller encargado de integrar muchas funcionalidades util para el controlador
 * @Author: Gregorio Bolívar <elalconxvii@gmail.com>
 * @Author: Blog: <http://gbbolivar.wordpress.com>
 * @Creation Date: 30/08/2017
 * @version: 0.1
 */
namespace APP\Admin\Controller;
use JPH\Complements\Template\Plate;
use JPH\Core\Commun\{
    All
};
use JPH\Core\Store\Cache;

class Controller extends All
{
    public $tpl;
    public $cache;
    public function __construct()
    {
        $this->tpl = new Plate();
        $this->cache = new Cache();
        return $this;
    }
}