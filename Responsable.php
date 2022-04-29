<?php

class Responsable{
    private $nombre;
    private $apellido;
    private $nroDocumento;
    private $direccion;
    private $mail;
    private $telefono;

    /**************************************/
    /**************** GET *****************/
    /**************************************/

    /**
     * Obtiene el valor de nombre
     */ 
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Obtiene el valor de apellido
     */ 
    public function getApellido(){
        return $this->apellido;
    }

    /**
     * Obtiene el valor de nroDocumento
     */ 
    public function getNroDocumento(){
        return $this->nroDocumento;
    }

    /**
     * Obtiene el valor de direccion
     */ 
    public function getDireccion(){
        return $this->direccion;
    }

    /**
     * Obtiene el valor de mail
     */ 
    public function getMail(){
        return $this->mail;
    }

    /**
     * Obtiene el valor de telefono
     */ 
    public function getTelefono(){
        return $this->telefono;
    }

    /**************************************/
    /**************** SET *****************/
    /**************************************/

    /**
     * Establece el valor de apellido
     */ 
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    /**
     * Establece el valor de nombre
     */ 
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Establece el valor de nroDocumento
     */ 
    public function setNroDocumento($nroDocumento){
        $this->nroDocumento = $nroDocumento;
    }

    /**
     * Establece el valor de direccion
     */ 
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    /**
     * Establece el valor de mail
     */ 
    public function setMail($mail){
        $this->mail = $mail;
    }

    /**
     * Establece el valor de telefono
     */ 
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    /**************************************/
    /************* FUNCIONES **************/
    /**************************************/

    /**
     * Metodo construct, tiene por parámetros los valores de cada atributo de la clase
     * @param string $nombre
     * @param string $apellido
     * @param int $nroDocumento
     * @param string $direccion
     * @param string $mail
     * @param int $telefono
     */
    public function __construct($nombre, $apellido, $nroDocumento, $direccion, $mail, $telefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nroDocumento = $nroDocumento;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
    }

    /**
     * Método que retorna los atributos de la clase en una cadena de caracteres
     */
    public function __toString(){
        return "Nombre: ".$this->getNombre()."\n".
               "Apellido: ".$this->getApellido()."\n".
               "Nro de documento: ".$this->getNroDocumento()."\n".
               "Direccion: ".$this->getDireccion()."\n".
               "Mail: ".$this->getMail()."\n".
               "Télefono: ".$this->getTelefono()."\n";
    }
}
?>