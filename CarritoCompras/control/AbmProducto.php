<?php
class AbmProducto
{
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden 
     * con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Producto
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (
            array_key_exists('idproducto', $param) and array_key_exists('pronombre', $param) and array_key_exists('prodetalle', $param)
            and array_key_exists('procantstock', $param)
        ) {
            $obj = new Producto();
            $obj->setear($param['idproducto'], $param['pronombre'], $param['prodetalle'], $param['procantstock']);
        }
        return $obj;
    }

    /*---------------- CARGAR SOLO CON LA CLAVE ----------------*/
    /**
     * Espera como parametro un arreglo asociativo donde las claves 
     * coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Producto
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param['idproducto'])) {
            $obj = new Producto();
            $obj->setear($param['idproducto'], null, null, null);
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
        if (isset($param['idproducto']))
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

        $elObjtProducto = $this->cargarObjeto($param);

        if ($elObjtProducto != null and $elObjtProducto->insertar()) {
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
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtProducto = $this->cargarObjetoConClave($param);
            if ($elObjtProducto != null and $elObjtProducto->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

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
            $elObjtProducto = $this->cargarObjeto($param);
            if ($elObjtProducto != null and $elObjtProducto->modificar()) {
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
            if (isset($param['idproducto']))
                $where .= " and idproducto =" . $param['idproducto'];
            if (isset($param['pronombre']))
                $where .= " and pronombre =" . $param['pronombre'];
            if (isset($param['prodetalle']))
                $where .= " and prodetalle ='" . $param['prodetalle'] . "'";
            if (isset($param['procantstock']))
                $where .= " and procantstock ='" . $param['procantstock'] . "'";
        }
        $arreglo = Producto::listar($where);
        return $arreglo;
    }
}
