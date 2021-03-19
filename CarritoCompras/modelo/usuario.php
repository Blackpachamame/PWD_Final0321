<?php

class Usuario
{
    private $idusuario;
    private $usnombre;
    private $uspass;
    private $usmail;
    private $usdeshabilitado;
    private $mensajeoperacion;


    public function __construct()
    {
        $this->idusuario = "";
        $this->usnombre = "";
        $this->uspass = "";
        $this->usmail = "";
        $this->usdeshabilitado = "";
        $this->mensajeoperacion = "";
    }

    public function setear($idUsuario, $usNombre, $uspass, $usMail, $usDeshabilitado)
    {
        $this->setIdUsuario($idUsuario);
        $this->setUsNombre($usNombre);
        $this->setUsPass($uspass);
        $this->setUsMail($usMail);
        $this->setUsDeshabilitado($usDeshabilitado);
    }

    public function getIdUsuario()
    {
        return $this->idusuario;
    }
    public function setIdUsuario($idUsuario)
    {
        $this->idusuario = $idUsuario;
    }

    public function getUsNombre()
    {
        return $this->usnombre;
    }
    public function setUsNombre($usNombre)
    {
        $this->usnombre = $usNombre;
    }

    public function getUsPass()
    {
        return $this->uspass;
    }
    public function setUsPass($uspass)
    {
        $this->uspass = $uspass;
    }
    public function getUsMail()
    {
        return $this->usmail;
    }
    public function setUsMail($usMail)
    {
        $this->usmail = $usMail;
    }

    public function getUsDeshabilitado()
    {
        return $this->usdeshabilitado;
    }
    public function setUsDeshabilitado($usdeshabilitado)
    {
        $this->usdeshabilitado = $usdeshabilitado;
    }

    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    public function setmensajeoperacion($msj)
    {
        $this->mensajeoperacion = $msj;
    }


    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario WHERE idusuario = " . $this->getIdUsuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    $resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("Usuario->listar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO usuario (usnombre, uspass, usmail, usdeshabilitado) VALUES ('" . $this->getUsNombre() . "','" . $this->getUsPass() . "','" . $this->getUsMail() . "','" . $this->getUsDeshabilitado() . "');";
        if ($base->Iniciar()) {
            if ($base = $base->Ejecutar($sql)) {
                $this->setIdUsuario($base);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE usuario SET idusuario='" . $this->getIdUsuario() . "', usnombre='" . $this->getUsNombre() . "', uspass='" . $this->getUsPass() . "', usmail='" . $this->getUsMail() . "', usdeshabilitado='" . $this->getUsDeshabilitado() . "' WHERE idusuario='" . $this->getIdusuario() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM usuario WHERE idusuario=" . $this->getIdUsuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Usuario->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new Usuario();
                    $obj->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("Usuario->listar: " . $base->getError());
        }

        return $arreglo;
    }
}
