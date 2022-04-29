<?php

class Viaje{
    private $destino;
    private $horaPartida;
    private $horaLlegada;
    private $numero;
    private $importe;
    private $fecha;
    private $cantAsientosTot;
    private $cantAsientosDisp;
    private $objResponsable;
    
    /**************************************/
    /**************** GET *****************/
    /**************************************/

    /**
     * Obtiene el valor de destino
     */ 
    public function getDestino(){
        return $this->destino;
    }

    /**
     * Obtiene el valor de horaPartida
     */ 
    public function getHoraPartida(){
        return $this->horaPartida;
    }

    /**
     * Obtiene el valor de horaLlegada
     */ 
    public function getHoraLlegada(){
        return $this->horaLlegada;
    }

    /**
     * Obtiene el valor de numero
     */ 
    public function getNumero(){
        return $this->numero;
    }

    /**
     * Obtiene el valor de importe
     */ 
    public function getImporte(){
        return $this->importe;
    }

    /**
     * Obtiene el valor de fecha
     */ 
    public function getFecha(){
        return $this->fecha;
    }

    /**
     * Obtiene el valor de cantAsientosTot
     */ 
    public function getCantAsientosTot(){
        return $this->cantAsientosTot;
    }

    /**
     * Obtiene el valor de cantAsientosDisp
     */ 
    public function getCantAsientosDisp(){
        return $this->cantAsientosDisp;
    }

    /**
     * Obtiene el valor de objResponsable
     */ 
    public function getObjResponsable(){
        return $this->objResponsable;
    }

    /**************************************/
    /**************** SET *****************/
    /**************************************/

    /**
     * Establece el valor de destino
     */ 
    public function setDestino($destino){
        $this->destino = $destino;
    }

    /**
     * Establece el valor de horaPartida
     */ 
    public function setHoraPartida($horaPartida){
        $this->horaPartida = $horaPartida;
    }

    /**
     * Establece el valor de horaLlegada
     */ 
    public function setHoraLlegada($horaLlegada){
        $this->horaLlegada = $horaLlegada;
    }

    /**
     * Establece el valor de numero
     */ 
    public function setNumero($numero){
        $this->numero = $numero;
    }

    /**
     * Establece el valor de importe
     */ 
    public function setImporte($importe){
        $this->importe = $importe;
    }

    /**
     * Establece el valor de fecha
     */ 
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    /**
     * Establece el valor de cantAsientosTot
     */ 
    public function setCantAsientosTot($cantAsientosTot){
        $this->cantAsientosTot = $cantAsientosTot;
    }

    /**
     * Establece el valor de cantAsientosDisp
     */ 
    public function setCantAsientosDisp($cantAsientosDisp){
        $this->cantAsientosDisp = $cantAsientosDisp;
    }

    /**
     * Establece el valor de objResponsable
     */ 
    public function setObjResponsable($objResponsable){
        $this->objResponsable = $objResponsable;
    }

    /**************************************/
    /************* FUNCIONES **************/
    /**************************************/

    /**
     * Metodo construct, tiene por parametros los valores de cada atributo de la clase
     * @param string $destino
     * @param int $horaPartida
     * @param int $horaLlegada
     * @param int $numero
     * @param int $importe
     * @param string $fecha
     * @param int $cantAsientosTot
     * @param int $cantAsientosDisp
     * @param object $objResponsable
     */
    public function __construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $fecha, $cantAsientosTot, $cantAsientosDisp, $objResponsable)
    {
        $this->destino = $destino;
        $this->horaPartida = $horaPartida;
        $this->horaLlegada = $horaLlegada;
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->cantAsientosTot = $cantAsientosTot;
        $this->cantAsientosTot = $cantAsientosDisp;
        $this->objResponsable = $objResponsable;
    }
    /**
     * Método que recibe por parámetro la cantidad de asientos que desean asignarse.
     * Retorna verdadero si se puede concretar, false caso contrario.
     */
    public function asignarAsientosDisponibles($cantAsientos){
        $disponible = $this->getCantAsientosDisp();
        if ($cantAsientos <= $disponible){
            $asignacion = true;
        }else{
            $asignacion = false;
        }
        return $asignacion;
    }

    public function __toString()
    {
        return "**************************************************************"."\n".
               "Destino a: ".$this->getDestino()."\n".
               "Hora de partida: ".$this->getHoraPartida()."\n".
               "Hora de llegada: ".$this->getHoraLlegada()."\n".
               "Número de viaje: ".$this->getNumero()."\n".
               "Importe: ".$this->getImporte()."\n".
               "Fecha de viaje: ".$this->getFecha()."\n".
               "Cantidad de asientos totales: ".$this->getCantAsientosTot()."\n".
               "Cantidad de asientos disponibles: ".$this->getCantAsientosDisp()."\n".
               "Responsable del viaje: ".$this->getObjResponsable()."\n";
    }
}
?>