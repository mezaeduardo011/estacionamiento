<?php
namespace JPH\Core\Console;
use JPH\Core\Commun\All;
use JPH\Complements\Database\Base;


class System extends Base
{
    public $pathapp;
    public $msj;
    public $active;

    // Constante de la clase
    const SUBITEM = __CLASS__;
    public function __construct(){
        $this->pathapp = All::DIR_SRC;
        $this->active = All::onlyClassActive(App::SUBITEM);
        // Constructor del Base para base de datos
        parent::__construct();
    }

    /**
     * Permite limpiar toda la base de datos y dejarla como como por primera vez
     */
    public function cleanSystemRefresh() : void
    {
         // Verificar el environment antes de procesar
         $elemento = self::getTablasSystem();

         // Todo el esquema de la conexion
         $elementoGeneral = $this->informationschema();
         foreach ($elementoGeneral AS $item=>$value){
             if($value->TABLE_TYPE=='BASE TABLE'){
                 foreach ($elemento AS $item2=>$value2){
                     if($value->TABLE_NAME == $value2['tabla']){
                         echo ($value2['tabla']).PHP_EOL;
                         // Permite verificar si la tabla se le hace truncate
                         if($value2['truncar']=='SI'){
                             echo " truncar SI ";
                            $sql = "TRUNCATE TABLE ".$value2['tabla'].";";
                            //$this->executeQuery($sql);
                         }else{
                             echo " truncar NO ";
                         }
                     }
                     /*else{
                         // Eliminar tabla debido que no es el sistema
                         $sql = "DROP TABLE ".$value2['tabla'].";";
                         //$this->executeQuery($sql);
                     }*/
                 }
             }
         }

        //All::pp();
        die('llego'.$this->active);

    }


    private static function getTablasSystem()
    {
       $tconfig = array(
            array('tabla'=>'ho_conexiones','truncar'=>'SI'),
            array('tabla'=>'ho_entidades','truncar'=>'SI'),
            array('tabla'=>'ho_vistas','truncar'=>'SI'),
            array('tabla'=>'ho_keyboard','truncar'=>'SI'),
            array('tabla'=>'ho_mascaras','truncar'=>'NO'),
            array('tabla'=>'ho_menu','truncar'=>'SI'),
            array('tabla'=>'ho_tipo_dato','truncar'=>'NO'),
            array('tabla'=>'seg_cambio_clave','truncar'=>'SI'),
            array('tabla'=>'seg_log_autenticacion','truncar'=>'SI'),
            array('tabla'=>'seg_log_eventos','truncar'=>'SI'),
            array('tabla'=>'seg_perfil','truncar'=>'NO'),
            array('tabla'=>'seg_perfil_roles','truncar'=>'SI'),
            array('tabla'=>'seg_roles','truncar'=>'SI'),
            array('tabla'=>'seg_usuarios','truncar'=>'NO'),
            array('tabla'=>'seg_usuarios_perfil','truncar'=>'NO')
        );
        return $tconfig;

    }

    /**
     * Permite inicializar las tablas principales del sistema y hacer la instalacion base
     */
    public function cleanSystemInitialize() : void
    {
        $ini = self::getTablasStaticSystem();
        foreach ($ini AS $item => $tablas){
            $this->getAll($tablas['date']);
        }
        die();
    }


    /**
     * Permite procesar los datos que se van a setear los valores
     */
    private static function getTablasStaticSystem(){
        $config = array(
             array('table'=>'ho_conexiones',
             'date'=>'CREATE TABLE ho_conexiones (
                        id int Identity(1,1) NOT NULL,
                        label varchar(20) NOT NULL,
                        driver varchar(30) NOT NULL,
                        host varchar(20) NOT NULL,
                        db varchar(30) NOT NULL,
                        usuario varchar(15) NOT NULL,
                        clave varchar(50) NOT NULL,
                        CONSTRAINT pk_ho_conexiones PRIMARY KEY(id)
                      );
                      ALTER TABLE ho_conexiones
                      ADD UNIQUE (label,driver,host);'),
             array('table'=>'ho_entidades',
             'date'=>'CREATE TABLE ho_entidades (
                        id BIGINT Identity(1,1) NOT NULL,
                        conexiones_id int NOT NULL,
                        entidad varchar(64) NOT NULL,
                        field varchar(100) NOT NULL,
                        type varchar(20) NOT NULL,
                        nulo varchar(10) NOT NULL,
                        dimension int,
                        fijo varchar(60) NULL,
                        restrincion varchar(10),
                        CONSTRAINT pk_ho_entidades PRIMARY KEY(id)
                      );
                      ALTER TABLE ho_entidades
                        ADD UNIQUE (conexiones_id,tabla,field);'),
            array('table'=>'ho_vistas',
                'date'=>'CREATE TABLE ho_vistas (
                    id BIGINT Identity(1,1),
                    apps varchar(50) NOT NULL,
                    conexiones_id int NOT NULL,
                    entidad varchar(64) NOT NULL,
                    nombre varchar(64) NOT NULL,
                    field varchar(64) NOT NULL,
                    type varchar(20) NOT NULL,
                    dimension int,
                    fijo varchar(60) NULL,
                    restrincion varchar(10),
                    label varchar(50) NOT NULL,
                    mascara varchar(50) NOT NULL,
                    nulo varchar(3) NOT NULL,
                    place_holder varchar(14),
                    relacionado varchar(10),
                    tabla_vista varchar(50) NULL,
                    vista_campo varchar(50),
                    orden int,
                    hidden_form bit ,
                    hidden_list bit ,
                    procesado bit,
                    CONSTRAINT pk_ho_vistas PRIMARY KEY(id)
                  );
                  ALTER TABLE ho_vistas
                   ADD UNIQUE  (conexiones_id, entidades_tabla,nombre,field,label,mascara);')
        );
        return $config;
    }

}