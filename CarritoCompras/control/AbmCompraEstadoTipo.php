<?php
class AbmCompraEstadoTipo
{
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden 
     * con los nombres de las variables instancias del objeto
     * @param array $param
     * @return CompraEstadoTipo
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (
            array_key_exists('idcompraestadotipo', $param) and array_key_exists('cetdescripcion', $param)
            and array_key_exists('cetdetalle', $param)
        ) {
            $obj = new CompraEstadoTipo();
            $obj->setear($param['idcompraestadotipo'], $param['cetdescripcion'], $param['cetdetalle']);
        }
        return $obj;
    }

    /*---------------- CARGAR SOLO CON LA CLAVE ----------------*/
    /**
     * Espera como parametro un arreglo asociativo donde las claves 
     * coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return CompraEstadoTipo
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param['idcompraestadotipo'])) {
            $obj = new CompraEstadoTipo();
            $obj->setear($param['idcompraestadotipo'], null, null);
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
        if (isset($param['idcompraestadotipo']))
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

        $elObjtCompraEstadoTipo = $this->cargarObjeto($param);

        if ($elObjtCompraEstadoTipo != null and $elObjtCompraEstadoTipo->insertar()) {
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
            $elObjtCompraEstadoTipo = $this->cargarObjetoConClave($param);
            if ($elObjtCompraEstadoTipo != null and $elObjtCompraEstadoTipo->eliminar()) {
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
            $elObjtCompraEstadoTipo = $this->cargarObjeto($param);
            if ($elObjtCompraEstadoTipo != null and $elObjtCompraEstadoTipo->modificar()) {
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
            if (isset($param['idcompraestadotipo']))
                $where .= " and idcompraestadotipo =" . $param['idcompraestadotipo'];
            if (isset($param['cetdescripcion']))
                $where .= " and cetdescripcion =" . $param['cetdescripcion'];
            if (isset($param['cetdetalle']))
                $where .= " and cetdetalle ='" . $param['cetdetalle'] . "'";
        }
        $arreglo = CompraEstadoTipo::listar($where);
        return $arreglo;
    }
}
