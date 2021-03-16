<?php 
class Usuariorol {
/*-----------ATRIBUTOS----------------------*/
    private $idusuario;//obj usuario
    private $idrol;//obj rol
    private $mensajeoperacion;
/*-------------CONSTRUCTOR-------------------*/   
    public function __construct(){
        
        $this->idusuario=new Usuario();
        $this->idrol=new Rol();
        $this->mensajeoperacion ="";
    }
   
/*------------------METODOS GETTERS --------------------*/
    /**
     * @return string
     */
    public function getOBJusuario()
    {
        return $this->idusuario;
    }

    /**
     * @return string
     */
    public function getOBJrol()
    {
        return $this->idrol;
    }

     /**
     * @return string
     */
    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }
/*---------------------------METODOS SETTERS--------------------------------------*/
    /**
     * @param string $patente
     */
    public function setOBJusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @param string $marca
     */
    public function setOBJrol($idrol)
    {
        $this->idrol = $idrol;
    }

    /**
     * @param string $mensajeoperacion
     */
    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }

/*-------------SETEAR CON TODOS LOS DATOS------------------*/
     public function setear($idusuario,$idrol)    {
        $this->setOBJusuario($idusuario);
        $this->setOBJrol($idrol);
       
        }
/*----------------------CARGAR -----------------------------*/
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol WHERE idusuario = ".$this->getOBJusuario()."and idrol =".$this->getOBJrol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();

                    $objUsuario= NULL;
                    if ($row['idsuario'] != null) { 
                        $objUsuario = new Usuario(); 
                        $objUsuario->setIdusuario($row['idusuario']); 
                        $objUsuario->cargar(); }
                    $objRol= NULL;
                    if ($row['idrol'] != null) { 
                        $objRol = new Rol(); 
                        $objRol->setIdrol($row['idrol']); 
                        $objRol->cargar(); }

                $this->setear( $row['idusuario'],$row['idrol']);
                }
            }  
        } else {
            $this->setmensajeoperacion("Usuariorol->listar: ".$base->getError());
        }
        return $resp;  
    }

/*------------------------INSERTAR----------------------------------------*/
    public function insertar(){
        $resp = false;
        $base=new BaseDatos(); 
        $sql="INSERT INTO usuariorol (idusuario,idrol)  VALUES ('".$this->getOBjusuario()->getIdusuario()."','".$this->getOBjrol()->getIdrol()."')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuariorol->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuariorol->insertar: ".$base->getError());
        }
        return $resp;
    }
   
//COMENTARIO: NO EXISTE FUNCION MODIFICAR PORQUE TODOS LOS DATOS SON CLAVE PRIMARIA DE OTRA TABLA
/*------------------------ELIMINAR----------------------------------------*/
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM usuariorol WHERE idusuario = ".$this->getOBjusuario()."and idrol =".$this->getOBjrol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Usuariorol->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuariorol->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
/*------------------------------LISTAR--------------------------------------------*/    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $consultasql="SELECT * FROM usuariorol ";
        if ($parametro!="") {
            $consultasql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($consultasql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $objUsuario= NULL;
                    if ($row['idusuario'] != null) { 
                        $objUsuario = new Usuario(); 
                        $objUsuario->setIdusuario($row['idusuario']); 
                        $objUsuario->cargar(); }
                    $objRol= NULL;
                    if ($row['idrol'] != null) { 
                        $objRol = new Rol(); 
                        $objRol->setIdrol($row['idrol']); 
                        $objRol->cargar(); }
                       
                        $obj= new Usuariorol();
                        $obj->setear( $objUsuario,$objRol);
                        array_push($arreglo, $obj);
                   
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("Auto->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>