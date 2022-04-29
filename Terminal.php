<?php

class Terminal{
    private $denominacion;
    private $direccion;
    private $arrayObjEmpresas;
    
    /**************************************/
    /**************** GET *****************/
    /**************************************/

    /**
     * Obtiene el valor de denominacion
     */ 
    public function getDenominacion(){
        return $this->denominacion;
    }

    /**
     * Obtiene el valor de direccion
     */ 
    public function getDireccion(){
        return $this->direccion;
    }

    /**
     * Obtiene el valor de arrayObjEmpresas
     */ 
    public function getArrayObjEmpresas(){
        return $this->arrayObjEmpresas;
    }

    /**************************************/
    /**************** SET *****************/
    /**************************************/

    /**
     * Establece el valor de denominacion
     */ 
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }

    /**
     * Establece el valor de direccion
     */ 
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    /**
     * Establece el valor de arrayObjEmpresas
     */ 
    public function setArrayObjEmpresas($arrayObjEmpresas){
        $this->arrayObjEmpresas = $arrayObjEmpresas;
    }

    /**************************************/
    /************* FUNCIONES **************/
    /**************************************/
    
    /**
     * Metodo construct, tiene por parámetros los valores de cada atributo de la clase
     * @param string $denominacion
     * @param string $direccion
     * @param array $arrayObjEmpresas
     */
    public function __construct($denominacion, $direccion, $arrayObjEmpresas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->arrayObjEmpresas = $arrayObjEmpresas;
    }

    /**
     * Método que recibe por parámetro la cantidad de asientos requeridos, la fecha y el destino y la 
     * empresa con la que desean viajar. 
     * @param int $cantAsientos
     * @param string $fecha
     * @param string $destino
     * @param object $objEmpresa
     */
    public function ventaAutomatica($cantAsientos, $fecha, $destino, $idEmpresa){
        $coleccionEmpresas = $this->getArrayObjEmpresas();
        $i = 0;
        $noEncontro = true;
        do{
            if($coleccionEmpresas[$i]->getIdentificacion() == $idEmpresa){
                $viaje = $coleccionEmpresas[$i]->venderViajeADestino($cantAsientos, $destino, $fecha);
                if ($viaje != null){
                    $noEncontro = false;
                }
            }else{
                $i++;
            }
        }while ($noEncontro && ($i < count($coleccionEmpresas)));
        return $viaje;
    }

    /**
     * Método que retorna un objeto de la clase empresa que se corresponde con la de mayor recaudación.
     * @return object
     */
    public function empresaMayorRecaudacion(){
        $coleccionEmpresas = $this->getArrayObjEmpresas();
        $mayorRecaudacion = 0;
        foreach ($coleccionEmpresas as $empresa){
            if($empresa->montoRecaudado()>$mayorRecaudacion){
            $mayorRecaudacion = $empresa->montoRecaudado();
            $empresaMayor = $empresa;
            }
        }
        return $empresaMayor;
    }

    /**
     * Método que recibe por parámetro un numero de viaje y retorna al responsable del viaje.
     * @param int $numViaje
     * @return object
     */
    public function responsableViaje($numViaje){
        $coleccionEmpresas = $this->getArrayObjEmpresas();
        for($i=0; $i<count($coleccionEmpresas); $i++){
            $viajes = $coleccionEmpresas[$i]->getArrayObjViajes();
            for($e = 0; $e<count($viajes); $e++){
                if ($numViaje == $viajes[$e]->getNumero()){
                    $responsable = $viajes[$e]->getObjResponsable();
                }else{
                    $responsable = null;
                }
            }
        }
        return $responsable;
    }

    public function __toString()
    {
        return "Denominación: ".$this->getDenominacion()."\n".
               "Dirección: ".$this->getDenominacion()."\n".
               "Empresas: "."\n".$this->empresasToString()."\n";
    }

    
    /**************************************/
    /********* FUNCIONES PRIVADAS *********/
    /**************************************/

    private function empresasToString(){
        $coleccion = $this->getArrayObjEmpresas();
        $string = "";
        foreach ($coleccion as $viaje){
            $string .= $viaje;
        }
        return $string; 
    }
}
?>