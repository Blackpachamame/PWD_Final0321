<?php
class CompraItem
{
    private $idcompraitem;
    private $idproducto;
    private $idcompra;
    private $cicantidad;
    private $mensajeoperacion;


    public function __construct()
    {
        $this->idcompraitem = "";
        $this->idproducto = new Producto();
        $this->idcompra = new Compra();
        $this->cicantidad = "";
        $this->mensajeoperacion = "";
    }
    public function setear($idcompraitem, $idproducto, $idcompra, $cicantidad)
    {
        $this->setIdeCompraItem($idcompraitem);
        $this->setIdProducto($idproducto);
        $this->setIdeCompra($idcompra);
        $this->setCiCantidad($cicantidad);
    }

    public function getIdeCompraItem()
    {
        return $this->idcompraitem;
    }
    public function setIdeCompraItem($idcompraitem)
    {
        $this->idcompraitem = $idcompraitem;
    }

    public function getIdProducto()
    {
        return $this->idproducto;
    }
    public function setIdProducto($idproducto)
    {
        $this->idproducto = $idproducto;
    }

    public function getIdeCompra()
    {
        return $this->idcompra;
    }
    public function setIdeCompra($idcompra)
    {
        $this->idcompra = $idcompra;
    }
    public function getCiCantidad()
    {
        return $this->cicantidad;
    }
    public function setCiCantidad($cicantidad)
    {
        $this->cicantidad = $cicantidad;
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
        $sql = "SELECT * FROM compraitem WHERE idcompraitem = " . $this->getIdeCompraItem();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();

                    $objProducto = NULL;
                    if ($row['idproducto'] != null) {
                        $objProducto = new Producto();
                        $objProducto->setIdProducto($row['idproducto']);
                        $objProducto->cargar();
                    }
                    $objCompra = NULL;
                    if ($row['idcompra'] != null) {
                        $objCompra = new Compra();
                        $objCompra->setIdCompra($row['idcompra']);
                        $objCompra->cargar();
                    }


                    $this->setear($row['idcompraitem'], $objProducto, $objCompra, $row['cicantidad']);
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
        $sql = "INSERT INTO compraitem(idproducto, idcompra, cicantidad)  VALUES('" . $this->getIdProducto() . "','" . $this->getIdeCompra() . "','" . $this->getCiCantidad() . "');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdeCompraItem($elid);
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
        $sql = "UPDATE compraitem SET idcompraitem='" . $this->getIdeCompraItem() . "', idproducto='" . $this->getIdProducto() . "', idcompra='" . $this->getIdeCompra() . "', cicantidad='" . $this->getCiCantidad() . "' WHERE idcompraitem=" . $this->getIdeCompraItem();
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
        $sql = "DELETE FROM compraitem WHERE idcompraitem=" . $this->getIdeCompraItem();
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
        $sql = "SELECT * FROM compraitem ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new CompraItem();

                    $objProducto = NULL;
                    if ($row['idproducto'] != null) {
                        $objProducto = new Producto();
                        $objProducto->setIdProducto($row['idproducto']);
                        $objProducto->cargar();
                    }
                    $objCompra = NULL;
                    if ($row['idcompra'] != null) {
                        $objCompra = new Compra();
                        $objCompra->setIdCompra($row['idcompra']);
                        $objCompra->cargar();
                    }

                    $obj->setear($row['idcompraitem'], $objProducto, $objCompra, $row['cicantidad']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: " . $base->getError());
        }

        return $arreglo;
    }
}
