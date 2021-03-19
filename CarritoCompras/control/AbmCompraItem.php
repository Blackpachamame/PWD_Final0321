<?php
class AbmCompraItem
{
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden 
     * con los nombres de las variables instancias del objeto
     * Devuelve un objeto
     * @param array $param
     * @return CompraItem
     */
    private function cargarObjeto($param)
    {
        //print_r ($param);
        $obj = null;
        if (
            array_key_exists('idcompraitem', $param) and array_key_exists('idproducto', $param)
            and array_key_exists('idcompra', $param) and array_key_exists('cicantidad', $param)
        ) {

            //creo objeto estadotipos
            $objProducto = new Producto();
            $objProducto->setIdProducto($param['idproducto']);
            $objProducto->cargar();

            //creo objeto usuario
            $objCompra = new Compra();
            $objCompra->setIdCompra($param['idcompra']);
            $objCompra->cargar();

            //agregarle los otros objetos
            $obj = new CompraItem();
            $obj->setear($param['idcompraitem'], $objProducto, $objCompra, $param['cicantidad']);
        }
        return $obj;
    }

    /*---------------- CARGAR SOLO CON LA CLAVE ----------------*/
    /**
     * Espera como parametro un arreglo asociativo donde las claves 
     * coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return CompraItem
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idcompraitem'])) {
            $obj = new CompraItem();
            $obj->setear($param['idcompraitem'], null, null, null);
        }
        return $obj;
    }

    /*---------------- CHEQUEO CLAVES SETEADAS ----------------*/
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idcompraitem']))
            $resp = true;
        return $resp;
    }

    /*---------------- INSERTAR EN BASE DE DATOS ----------------*/
    /**
     * Carga un objeto con los datos pasados por parámetro y lo 
     * Inserta en la base de datos
     * @param array $param
     * @return boolean
     */
    public function alta($param)
    {
        $resp = false;
        $param['idcompraitem'] = null;
        $elObjtArchivoE = $this->cargarObjeto($param);
        //print_r($elObjtArchivoE);
        if ($elObjtArchivoE != null and $elObjtArchivoE->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    /*---------------- ELIMINA OBJETO DE BASE DE DATOS ----------------*/
    /**
     * Por lo general no se usa ya que se utiliza borrado lógico ( es decir pasar de activo a inactivo)
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    /* public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtArchivoE = $this->cargarObjetoConClave($param);
            if ($elObjtArchivoE!=null and $elObjtArchivoE->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    } */

    /*---------------- MODIFICA EN BASE DE DATOS ----------------*/
    /**
     * Carga un obj con los datos pasados por parámetro y lo modifica en base de datos (update)
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtArchivoE = $this->cargarObjeto($param);
            if ($elObjtArchivoE != null and $elObjtArchivoE->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /*---------------- BUSCAR OBJ EN BASE DE DATOS ----------------*/
    /**
     * Puede traer un obj específico o toda la lista si el parámetro es null
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idcompraitem']))
                $where .= " and idcompraitem =" . $param['idcompraitem'];
            if (isset($param['idproducto']))
                $where .= " and idproducto =" . $param['idproducto'];
            if (isset($param['idcompra']))
                $where .= " and idcompra ='" . $param['idcompra'] . "'";
            if (isset($param['cicantidad']))
                $where .= " and cicantidad ='" . $param['cicantidad'] . "'";
        }
        $arreglo = CompraItem::listar($where);
        return $arreglo;
    }
}
