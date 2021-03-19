<?php

class Rol
{
    private $idrol;
    private $rodescripcion;
    private $mensajeoperacion;


    public function __construct()
    {

        $this->idrol = "";
        $this->rodescripcion = "";
        $this->mensajeoperacion = "";
    }

    public function setear($idrol, $rodescripcion)
    {
        $this->setIdrol($idrol);
        $this->setRodescripcion($rodescripcion);
    }


    public function getIdrol()
    {
        return $this->idrol;
    }
    public function setIdrol($idrol)
    {
        $this->idrol = $idrol;
    }

    public function getRodescripcion()
    {
        return $this->rodescripcion;
    }
    public function setRodescripcion($rodescripcion)
    {
        $this->rodescripcion = $rodescripcion;
    }

    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }


    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM rol WHERE idrol = " . $this->getIdrol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idrol'], $row['rodescripcion']);
                    $resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("Rol->listar: " . $base->getError());
        }
        return $resp;
    }


    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO rol (rodescripcion) VALUES ('" . $this->getRodescripcion() . "')";
        if ($base->Iniciar()) {
            if ($base = $base->Ejecutar($sql)) {
                $this->setIdrol($base);
                $resp = true;
            } else {

                $this->setmensajeoperacion("Rol->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Rol->insertar: " . $base->getError());
        }
        return $resp;
    }


    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE rol SET rodescripcion='" . $this->getRodescripcion() . "' WHERE idrol='" . $this->getIdrol() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {

                $this->setmensajeoperacion("Rol->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Rol->modificar: " . $base->getError());
        }
        return $resp;
    }


    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM rol WHERE idrol=" . $this->getIdrol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Rol->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Rol->eliminar: " . $base->getError());
        }
        return $resp;
    }


    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $consultasql = "SELECT * FROM rol ";
        if ($parametro != "") {
            $consultasql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($consultasql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new Rol();

                    $obj->setear($row['idrol'], $row['rodescripcion']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("Rol->listar: " . $base->getError());
        }

        return $arreglo;
    }
}
