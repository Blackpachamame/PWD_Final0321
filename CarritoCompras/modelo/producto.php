<?php
class Producto
{
    private $idproducto;
    private $pronombre;
    private $prodetalle;
    private $procantstock;
    private $mensajeoperacion;


    public function __construct()
    {

        $this->idproducto = "";
        $this->pronombre = "";
        $this->prodetalle = "";
        $this->procantstock = "";
        $this->mensajeoperacion = "";
    }
    public function setear($idproducto, $pronombre, $prodetalle, $procantstock)
    {
        $this->setIdProducto($idproducto);
        $this->setProNombre($pronombre);
        $this->setProDetalle($prodetalle);
        $this->setProStock($procantstock);
    }

    public function getIdProducto()
    {
        return $this->idproducto;
    }
    public function setIdProducto($idproducto)
    {
        $this->idproducto = $idproducto;
    }

    public function getProNombre()
    {
        return $this->pronombre;
    }
    public function setProNombre($pronombre)
    {
        $this->pronombre = $pronombre;
    }

    public function getProDetalle()
    {
        return $this->prodetalle;
    }
    public function setProDetalle($prodetalle)
    {
        $this->prodetalle = $prodetalle;
    }
    public function getProStock()
    {
        return $this->procantstock;
    }
    public function setProStock($procantstock)
    {
        $this->procantstock = $procantstock;
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
        $sql = "SELECT * FROM producto WHERE idproducto = " . $this->getIdProducto();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock']);
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO producto(pronombre, prodetalle, procantstock)  VALUES('" . $this->getProNombre() . "','" . $this->getProDetalle() . "','" . $this->getProStock() . "');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdProducto($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE producto SET idproducto='" . $this->getIdProducto() . "', pronombre='" . $this->getProNombre() . "', prodetalle='" . $this->getProDetalle() . "', procantstock='" . $this->getProStock() . "' WHERE idproducto=" . $this->getIdProducto();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM producto WHERE idproducto=" . $this->getIdProducto();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM producto ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new Producto();
                    $obj->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: " . $base->getError());
        }

        return $arreglo;
    }
}
