<?php

class Menu
{
    private $idmenu;
    private $menombre;
    private $medescripcion;
    private $idpadre;
    private $medeshabilitado;
    private $mensajeoperacion;


    public function __construct()
    {

        $this->idmenu = "";
        $this->menombre = "";
        $this->medescripcion = "";
        $this->idpadre = "";
        $this->medeshabilitado = "";
        $this->mensajeoperacion = "";
    }

    public function setear($idmenu, $menombre, $medescripcion, $idpadre, $medeshabilitado)
    {
        $this->setIdMenu($idmenu);
        $this->setMeNombre($menombre);
        $this->setMeDescripcion($medescripcion);
        $this->setIdPadre($idpadre);
        $this->setMeDeshabilitado($medeshabilitado);
    }

    public function getIdMenu()
    {
        return $this->idmenu;
    }
    public function setIdMenu($idmenu)
    {
        $this->idmenu = $idmenu;
    }

    public function getMeNombre()
    {
        return $this->menombre;
    }
    public function setMeNombre($menombre)
    {
        $this->menombre = $menombre;
    }

    public function getMeDescripcion()
    {
        return $this->medescripcion;
    }
    public function setMeDescripcion($medescripcion)
    {
        $this->medescripcion = $medescripcion;
    }
    public function getIdPadre()
    {
        return $this->idpadre;
    }
    public function setIdPadre($idpadre)
    {
        $this->idpadre = $idpadre;
    }

    public function getMeDeshabilitado()
    {
        return $this->medeshabilitado;
    }
    public function setMeDeshabilitado($medeshabilitado)
    {
        $this->medeshabilitado = $medeshabilitado;
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
        $sql = "SELECT * FROM menu WHERE idmenu = " . $this->getIdMenu();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idmenu'], $row['menombre'], $row['medescripcion'], $row['idpadre'], $row['medeshabilitado']);
                    $resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("Menu->listar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO menu (menombre, medescripcion, idpadre, medeshabilitado) VALUES ('" . $this->getMeNombre() . "','" . $this->getMeDescripcion() . "','" . $this->getIdPadre() . "','" . $this->getMeDeshabilitado() . "');";
        if ($base->Iniciar()) {
            if ($base = $base->Ejecutar($sql)) {
                $this->setIdMenu($base);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Menu->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Menu->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE menu SET idmenu='" . $this->getIdMenu() . "', menombre='" . $this->getMeNombre() . "', medescripcion='" . $this->getMeDescripcion() . "', idpadre='" . $this->getIdPadre() . "', medeshabilitado='" . $this->getMeDeshabilitado() . "' WHERE idmenu='" . $this->getIdMenu() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Menu->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Menu->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM menu WHERE idmenu=" . $this->getIdMenu();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Menu->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Menu->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM menu ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new Menu();
                    $obj->setear($row['idmenu'], $row['menombre'], $row['medescripcion'], $row['idpadre'], $row['medeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("Menu->listar: " . $base->getError());
        }

        return $arreglo;
    }
}
