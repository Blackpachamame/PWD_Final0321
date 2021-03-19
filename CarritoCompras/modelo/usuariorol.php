<?php

class UsuarioRol
{
    private $idusuario;
    private $idrol;
    private $mensajeoperacion;


    public function __construct()
    {
        $this->idusuario = new Usuario();
        $this->idrol = new Rol();
        $this->mensajeoperacion = "";
    }

    public function setear($idusuario, $idrol)
    {
        $this->setIdUsuario($idusuario);
        $this->setIdRol($idrol);
    }

    public function getIdUsuario()
    {
        return $this->idusuario;
    }
    public function setIdUsuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    public function getIdrol()
    {
        return $this->idrol;
    }
    public function setIdRol($idrol)
    {
        $this->idrol = $idrol;
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
        $sql = "SELECT * FROM usuariorol WHERE idusuario = " . $this->getIdUsuario()->getIdUsuario() . " and idrol = " . $this->getIdrol()->getIdrol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();

                    $objUsuario = NULL;
                    if ($row['idusuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setIdusuario($row['idusuario']);
                        $objUsuario->cargar();
                    }

                    $objRol = NULL;
                    if ($row['idrol'] != null) {
                        $objRol = new Rol();
                        $objRol->setIdRol($row['idrol']);
                        $objRol->cargar();
                    }

                    $this->setear($objUsuario, $objRol);
                    $resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("Usuariorol->listar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO usuariorol (idusuario, idrol) VALUES ('{$this->getIdUsuario()->getIdUsuario()}', '{$this->getIdrol()->getIdrol()}');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuariorol->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuariorol->insertar: " . $base->getError());
        }
        return $resp;
    }


    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE * FROM usuariorol WHERE idusuario = " . $this->getIdUsuario()->getIdUsuario() . " and idrol = " . $this->getIdrol()->getIdrol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Usuariorol->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuariorol->eliminar: " . $base->getError());
        }
        return $resp;
    }


    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuariorol  ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new UsuarioRol();

                    $objUsuario = NULL;
                    if ($row['idusuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setIdusuario($row['idusuario']);
                        $objUsuario->cargar();
                    }

                    $objRol = NULL;
                    if ($row['idrol'] != null) {
                        $objRol = new Rol();
                        $objRol->setIdRol($row['idrol']);
                        $objRol->cargar();
                    }

                    $obj->setear($objUsuario, $objRol);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("Usuariorol->listar: " . $base->getError());
        }

        return $arreglo;
    }
}
