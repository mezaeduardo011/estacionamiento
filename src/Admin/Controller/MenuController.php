<?php
namespace APP\admin\Controller;
 use JPH\Core\Commun\Security;
 use APP\Admin\Model AS Model;
 use JPH\Core\Commun\All;
/**
 * Generador de codigo de Controller de Hornero 1.0
 * @propiedad: Hornero 1.0
 * @autor: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 15/11/2017
 * @version: 1.0
 */ 
class MenuController extends Controller
{
    use Security;
    public $model;
    public $session;
   public function __construct()
   {
        parent::__construct();
        $this->authenticated();
       $this->hoSegUsuariosModel = new Model\SegUsuariosModel();
   }
   public function runIndex($request)
   {
       $user=$this->getSession('usuario');
       $data = $this->hoSegUsuariosModel->reCargarRoles($user->id);
       $this->setSession('roles', $data);
       $dataJson=All::extrerMenu();
       $this->json($dataJson);
   }
}
?>
