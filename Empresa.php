<?php

class Empresa{
    private $identificacion;
    private $nombre;
    private $arrayObjViajes;

    /**************************************/
    /**************** GET *****************/
    /**************************************/

    /**
     * Obtiene el valor de informacion
     */ 
    public function getIdentificacion(){
        return $this->identificacion;
    }

    /**
     * Obtiene el valor de nombre
     */ 
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Obtiene el valor de arrayObjViajes
     */ 
    public function getArrayObjViajes(){
        return $this->arrayObjViajes;
    }

    /**************************************/
    /**************** SET *****************/
    /**************************************/

    /**
     * Establece el valor de informacion
     */ 
    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }

    /**
     * Establece el valor de nombre
     */ 
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Establece el valor de arrayObjViajes
     */ 
    public function setArrayObjViajes($arrayObjViajes){
        $this->arrayObjViajes = $arrayObjViajes;
    }

    /**************************************/
    /************* FUNCIONES **************/
    /**************************************/
    /**
     * Metodo construct, tiene por parametros los valores de cada atributo de la clase
     * @param int $identificacion
     * @param string $nombre
     * @param array $arrayObjViajes
     */
    public function __construct($identificacion, $nombre, $arrayObjViajes)
    {
       $this->identificacion = $identificacion; 
       $this->nombre = $nombre; 
       $this->arrayObjViajes = $arrayObjViajes; 
    }
}
?>