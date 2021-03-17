<?php

class MenuRol
{
    private $idmenu;
    private $idrol;
    private $mensajeoperacion;


    public function __construct()
    {
        $this->idmenu = new Menu();
        $this->idrol = new Rol();
        $this->mensajeoperacion = "";
    }

    public function setear($idmenu, $idrol)
    {
        $this->setIdMenu($idmenu);
        $this->setIdRol($idrol);
    }

    public function getIdMenu()
    {
        return $this->idmenu;
    }
    public function setIdMenu($idmenu)
    {
        $this->idmenu = $idmenu;
    }

    public function getIdRol()
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
        $sql = "SELECT * FROM menurol WHERE idmenu = " . $this->getIdMenu()->getIdMenu() . " and idrol = " . $this->getIdRol()->getIdRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();

                    $objMenu = NULL;
                    if ($row['idmenu'] != null) {
                        $objMenu = new Menu();
                        $objMenu->setIdMenu($row['idmenu']);
                        $objMenu->cargar();
                    }

                    $objRol = NULL;
                    if ($row['idrol'] != null) {
                        $objRol = new Rol();
                        $objRol->setIdRol($row['idrol']);
                        $objRol->cargar();
                    }

                    $this->setear($objMenu, $objRol);
                    $resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("MenuRol->listar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO menurol (idmenu, idrol) VALUES ('{$this->getIdMenu()->getIdMenu()}', '{$this->getIdRol()->getIdRol()}');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("MenuRol->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("MenuRol->insertar: " . $base->getError());
        }
        return $resp;
    }


    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE * FROM menurol WHERE idmenu = " . $this->getIdMenu()->getIdMenu() . " and idrol = " . $this->getIdRol()->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("MenuRol->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("MenuRol->eliminar: " . $base->getError());
        }
        return $resp;
    }


    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM menurol  ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new MenuRol();

                    $objMenu = NULL;
                    if ($row['idmenu'] != null) {
                        $objMenu = new Menu();
                        $objMenu->setIdMenu($row['idmenu']);
                        $objMenu->cargar();
                    }

                    $objRol = NULL;
                    if ($row['idrol'] != null) {
                        $objRol = new Rol();
                        $objRol->setIdRol($row['idrol']);
                        $objRol->cargar();
                    }

                    $obj->setear($objMenu, $objRol);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("MenuRol->listar: " . $base->getError());
        }

        return $arreglo;
    }
}
