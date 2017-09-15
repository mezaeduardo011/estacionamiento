<?php

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