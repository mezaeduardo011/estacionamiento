<?php
namespace JPH\Complements\Database;
use JPH\Core\Commun\All;

trait Usuarios
{
    public $email;
    public $usuario;
    public $password;
    public $msjError;
    public $errorNum;
    public $nusuario = 0;
    public $roles = [];
    public $apellido;
    public $nombre;
    public $correo;
    public $telefono;
    public $bloqueada;
    public $cambiarPW;
    public $cantIntentosPermitos;
    public $ICuentaBloqueada;
    public $KLoginFallidos;
    public $db;

    public function start($obj)
    {
        $this->db=$obj;
        return $this;
    }

    public function validarUsuario()
    {
        $this->cantIntentosPermitos = 3;
        $this->ICuentaBloqueada = "N";
        $this->KLoginFallidos = "0";

        if ($this->usuario == "") {
            $this->msjError = "Ingrese el usuario";
        } else if ($this->password == "") {
            $this->msjError = "Ingrese la contraseña";
        } else {

            $passEncrypt = md5($this->password);

            $query = "select nusuario,ICuentaBloqueada,KLoginFallidos from SEGUSUARIOS where cusuario = '" . $this->db->escape($this->usuario) . "'";
            $this->db->get($query);

            $rows = $this->db->numRows();

            if ($rows > 0) {
                $row = $this->db->fetch();
                $this->nusuario = $row->nusuario;
                $this->ICuentaBloqueada = $row->ICuentaBloqueada;
                $this->KLoginFallidos = $row->KLoginFallidos;

                if ($this->ICuentaBloqueada == "N") {
                    $query = "select NUSUARIO from SEGUSUARIOS where cusuario = '" . $this->db->escape($this->usuario) . "' and (dpassword = '" . $passEncrypt . "' or dpassword = '" . $this->db->escape($this->password) . "')";
                    $this->db->get($query);
                    $rows = $this->db->numRows();
                    if ($rows > 0) {
                        $query = "Update SEGUSUARIOS set ICuentaBloqueada = 'N', KLoginFallidos = 0 where cusuario = '" . $this->db->escape($this->usuario) . "'";
                        $this->db->execute($query);
                        $this->cargarRoles();
                        return true;
                    } else if ($this->KLoginFallidos >= $this->cantIntentosPermitos) {

                        $query = "Update SEGUSUARIOS set ICuentaBloqueada = 'S' where cusuario = '" . $this->db->escape($this->usuario) . "'";
                        $this->db->execute($query);
                        $this->msjError = "Usuario bloqueado, intentos fallidos excedidos, revise su correo con su nueva clave";
                    } else {

                        $query = "Update SEGUSUARIOS set KLoginFallidos = KLoginFallidos + 1 where cusuario = '" . $this->db->escape($this->usuario) . "'";
                        $this->db->execute($query);
                        $this->msjError = "Contraseña incorrecta, intentos fallidos: " . ($this->KLoginFallidos + 1);
                        //$this->enviarCorreo();
                    }
                } else {
                    $this->msjError = "Usuario bloqueado";
                }
            } else {
                $this->msjError = "Usuario incorrecto.";
            }
        }

        return false;
    }

    private function cargarRoles()
    {
        $query = "select r.NROL,r.DROL from segroles r inner join SEGUSUARIOSROLES ru on ru.NROL = r.NROL where  ru.NUSUARIO = " . $this->db->escape($this->nusuario);
        $this->db->get($query);
        $rows = $this->db->numRows();

        if ($rows > 0) {
            while ($row = $this->db->fetch()) {
                $this->roles[] = $row->DROL;
            }
        }
    }

    public function tieneRol($rol)
    {
        return in_array($rol, $this->roles);
    }


    public function grabar()
    {
        $this->correo = ($this->correo == 'NULL' ? $this->correo : "'" . $this->db->escape($this->correo) . "'" );
        $this->telefono = ($this->telefono == 'NULL' ? $this->telefono : "'" . $this->db->escape($this->telefono) . "'" );

        if ($this->nusuario != 0) {
            $query = "UPDATE SEGUSUARIOS SET ";
            $query .= "CUSUARIO = '" . $this->db->escape($this->usuario) . "',";
            $query .= "DAPELLIDO = '" . $this->db->escape($this->apellido) . "',";
            $query .= "DNOMBRE = '" . $this->db->escape($this->nombre) . "',";
            $query .= "DCORREOELECTRONICO = " . $this->correo . ",";
            $query .= "DTELEFONO = " . $this->telefono . ",";
            $query .= "ICUENTABLOQUEADA = '" . $this->db->escape($this->bloqueada) . "',";
            $query .= "ICAMBIARPASSWORD = '" . $this->db->escape($this->cambiarPW) . "' ";

            if($this->password != ''){
                $query .= ", DPASSWORD = '" . $this->password . "' ";
            }

            $query .= "WHERE NUSUARIO = '" . $this->db->escape($this->nusuario) . "'";
            $this->execute($query);
        } else {
            $query = "INSERT INTO SEGUSUARIOS (NCLIENTE,NUSUARIO,CUSUARIO,DPASSWORD,DAPELLIDO,DNOMBRE,DCORREOELECTRONICO,DTELEFONO,ICUENTABLOQUEADA,ICAMBIARPASSWORD,FALTA,NUSUALTA) ";
            $query .= "VALUES (1,(SELECT max(NUSUARIO)+1 FROM segusuarios),'" . $this->db->escape($this->usuario) . "','" . trim($this->db->escape($this->password)) . "','" . $this->db->escape($this->apellido) . "','" . $this->db->escape($this->nombre) . "'," . $this->correo . ",";
            $query .= $this->telefono . ",'" . $this->db->escape($this->bloqueada) . "','" . $this->db->escape($this->cambiarPW) . "', GETDATE(),1);";
            $query .= "SELECT SCOPE_IDENTITY();";
            $this->execute($query);
            $this->nusuario = $db->lastId();
        }
        $this->errorNum = $db->errorno;
        return $this->nusuario;
    }

    public function borrar()
    {


        if ($this->nusuario != 0) {
            $query = "DELETE FROM SEGUSUARIOS WHERE nusuario = '" . $this->db->escape($this->nusuario) . "'";
            $this->db->execute($query);
        }
    }

    public function obtenerJSON()
    {
        if ($this->nusuario != 0) {
            $query = "SELECT * FROM SEGUSUARIOS WHERE NUSUARIO = '" . $this->db->escape($this->nusuario) . "'";
            $this->db->get($query);
            $row = $this->db->fetch();

            foreach ($row as $col => $val) {
                if (gettype($val) == "object" && get_class($val) == "DateTime") {
                    $row->$col = $val->format("d/m/Y");
                }
            }
            $json = json_encode($row);
            echo $json;
        }
    }

    public function obtenerUser()
    {
        if ($this->nusuario != 0) {
            $query = "SELECT * FROM SEGUSUARIOS WHERE NUSUARIO = '" . $this->db->escape($this->nusuario) . "'";
            $this->db->get($query);
            $row = $this->db->fetch();

            foreach ($row as $col => $val) {
                if (gettype($val) == "object" && get_class($val) == "DateTime") {
                    $row->$col = $val->format("d/m/Y");
                }
            }
            return $row;
        }
    }

    public function leerTodos()
    {
        $query = "select * from SegUsuarios order by Cusuario";
        $this->db->get($query);
        $cantRows = $this->db->numRows();
        $datos = [];

        if ($cantRows > 0) {
            while ($row = $this->db->fetch()) {
                $datos[] = $row;
            }
        }
        return $datos;
    }

    public function cambiarClave()
    {
        $query = "UPDATE SEGUSUARIOS SET DPASSWORD = '" . $this->password . "' WHERE NUSUARIO = " . $this->nusuario;
        $this->db->execute($query);
    }

}