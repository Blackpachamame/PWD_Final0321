<?php 
class Usuario {
/*-----------------------ATRIBUTOS-----------------------------*/
    private $idusuario;
    private $usnombre;
    private $usapellido;
    private $uslogin;
    private $usclave;
    private $usactivo;
    private $mensajeoperacion;

/*-----------------------CONSTRUCTOR---------------------------*/   
    public function __construct(){
        
        $this->idusuario="";
        $this->usnombre="";
        $this->usapellido ="";
        $this->uslogin="";
        $this->usclave="";
        $this->usactivo =1;
        $this->mensajeoperacion ="";
    }
   
/*---------------------METODOS GETTERS --------------------------*/
    /**
     * @return string
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @return string
     */
    public function getUsnombre()
    {
        return $this->usnombre;
    }

    /**
     * @return string
     */
    public function getUsapellido()
    {
        return $this->usapellido;
    }

    /**
     * @return string
     */
    public function getUslogin()
    {
        return $this->uslogin;
    }

    /**
     * @return string
     */
    public function getUsclave()
    {
        return $this->usclave;
    }

    /**
     * @return string
     */
    public function getUsactivo()
    {
        return $this->usactivo;
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
     * @param string $idusuario
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @param string $usnombre
     */
    public function setUsnombre($usnombre)
    {
        $this->usnombre = $usnombre;
    }

    /**
     * @param string $usapellido
     */
    public function setUsapellido($usapellido)
    {
        $this->usapellido = $usapellido;
    }

    /**
     * @param string $uslogin
     */
    public function setUslogin($uslogin)
    {
        $this->uslogin = $uslogin;
    }

    /**
     * @param string $usclave
     */
    public function setUsclave($usclave)
    {
        $this->usclave = $usclave;
    }

    /**
     * @param string $usactivo
     */
    public function setUsactivo($usactivo)
    {
        $this->usactivo = $usactivo;
    }

    /**
     * @param string $mensajeoperacion
     */
    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }

/*-------------SETEAR CON TODOS LOS DATOS------------------*/
     public function setear($idusuario,$usnombre,$usapellido,$uslogin,$usclave,$usactivo)    {
        $this->setIdusuario($idusuario);
        $this->setUsnombre($usnombre);
        $this->setUsapellido($usapellido);
        $this->setUslogin($uslogin);
        $this->setUsclave($usclave);
        $this->setUsactivo($usactivo);
       
        }
/*----------------------CARGAR (trae de la base de datos la info y la carga en el obj)-----------------------------*/
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario WHERE idusuario = ".$this->getIdusuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idusuario'],$row['usnombre'],$row['usapellido'],$row['uslogin'],$row['usclave'],$row['usactivo']);
                }
            }  
        } else {
            $this->setmensajeoperacion("Usuario->listar: ".$base->getError());
        }
        return $resp;  
    }

/*------------------------INSERTAR (guarda la info en la base de datos)----------------------------------------*/
    public function insertar(){
        $resp = false;
        $base=new BaseDatos(); 
        $sql="INSERT INTO usuario (usnombre,usapellido,uslogin,usclave,usactivo)  VALUES ('".$this->getUsnombre()."','".$this->getUsapellido()."','".$this->getUslogin()."','".$this->getUsclave()."','".$this->getUsactivo()."')";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdusuario($elid); 
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->insertar: ".$base->getError());
        }
        return $resp;
    }
   
/*------------------------MODIFICAR----------------------------------------*/
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE usuario SET usnombre='".$this->getUsnombre()."', usapellido='".$this->getUsapellido()."', uslogin='".$this->getUslogin()."', usclave='".$this->getUsclave()."', usactivo='".$this->getUsactivo()."' WHERE idusuario='". $this->getIdusuario()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else { 
                
               
                $this->setmensajeoperacion("Usuario->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->modificar: ".$base->getError());
        }
        return $resp;
    }
 
/*------------------------ELIMINAR----------------------------------------*/
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM usuario WHERE idusuario=".$this->getIdusuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Usuario->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->eliminar: ".$base->getError());
        }
        return $resp;
    }
/*------------------------------LISTAR--------------------------------------------*/     
    public static function listar($parametro=""){
        $objetos = array();
        $base=new BaseDatos();
        $consultasql="SELECT * FROM usuario ";
        if ($parametro!="") {
            $consultasql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($consultasql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Usuario();
                    
                    $obj->setear($row['idusuario'],$row['usnombre'],$row['usapellido'],$row['uslogin'],$row['usclave'],$row['usactivo']);
                    array_push($objetos, $obj);
                   
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("Usuario->listar: ".$base->getError());
        }
 
        return $objetos;
    }
    
}


?>