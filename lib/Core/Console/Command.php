<?php
namespace JPH\Core\Console;
use JPH\Core\Commun\{All};


/**
 * Permite recibir los comandos ingresado por los usuarios del sistema
 * @Author: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @Author: Blog: <http://gbbolivar.wordpress.com>
 * @Creation Date: 22/08/2017
 * @version: 4.2
 */

class Command extends Integrate
{
	public $term;
	static $src;

	/**
     * Permite inicializar el proceso para la consola de comandos internos del sistema
	 */
	public function run()
	{	
        	$this->term = $_SERVER['argv'];
        	$obj = new Integrate();
            $obj->arguments($this->term);
	}

    /**
     * Pemite ejecutar comandos personalizados en la aplicacion indicada por parametros
     * @param String $app, Aplicacion que se desea efectuar el comando personalizado
     * @param String $command, Comando el cual deseamos ejecutar
     * @paran Sting $method, Method encargado de ejecutar que son de method estaticos sin parametro de entrada
     * @return Void
     */
     public static function runCommands($app, $comand)
    {
        $comd = All::upperCase($comand).'Commands';
        $src = All::DIR_SRC.All::upperCase($app).All::APP_COMMAND.DIRECTORY_SEPARATOR.$comd.'.php';
        try {
            if (file_exists($src)) {
                include_once($src);
                $namespaceCommand = '\APP\\' . All::upperCase($app) . '\Commands\\' . $comd . '::main';
                $namespaceCommand();
                die('Fin del procesi');
            } else {
                throw new \TypeError('No encon');
            }
        }catch (\TypeError $t){
            die($t->getMessage());
        }
    }
}