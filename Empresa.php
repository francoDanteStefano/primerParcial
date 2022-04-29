<?php

class Empresa2{
    private $identificacion;
    private $nombre;
    private $arrayObjViajes;

    /**************************************/
    /**************** GET *****************/
    /**************************************/

    /**
     * Obtiene el valor de identificacion
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
     * Establece el valor de identificacion
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
     * Metodo construct, tiene por parámetros los valores de cada atributo de la clase
     * @param int $identificacion
     * @param string $nombre
     * @param array $arrayObjViajes
     */
    public function __construct($identificacion, $nombre, $arrayObjViajes){
       $this->identificacion = $identificacion; 
       $this->nombre = $nombre; 
       $this->arrayObjViajes = $arrayObjViajes; 
    }

    /**
     * Método que recibe por parámetros, un destino y una cantidad de asientos.
     * Retorna un array con todos los viajes disponibles a ese destino.
     * @param string $elDestino
     * @param int $cantAsientos
     * @return array
     */
    public function darViajeADestino($elDestino, $cantAsientos){
        $coleccionViajes = $this->getArrayObjViajes();
        foreach ($coleccionViajes as $viaje){
            $asientosDisp = $viaje->getCantAsientosDisp();
            $destinoViaje = $viaje->getDestino();
            if (($elDestino == $destinoViaje) && ($cantAsientos <= $asientosDisp)){
                $viajesADestino = [];
                array_push($viajesADestino, $viaje);
            }
        }
        return $viajesADestino;
    }

    /**
     * Método que recibe por parámetro un viaje, verifica que no se encuentre registrado con los mismos datos.
     * El método retorna true si se incorporó a la coleccion, false en caso contrario.
     * @param object $objViaje
     * @return boolean
     */
    public function incorporarViaje ($objViaje){
        $coleccionViajes = $this->getArrayObjViajes();
        foreach ($coleccionViajes as $viaje){
            //Datos de los viajes en el array
            $destinoViaje = $viaje->getDestino();
            $fechaViaje = $viaje->getFecha();
            $horarioPartida = $viaje->getHoraPartida();
            //Datos viaje a cargar
            $destinoObj = $objViaje->getDestino();
            $fechaObjViaje = $objViaje->getFecha();
            $hpObjViaje = $objViaje->getHoraPartida();
            if (($destinoViaje != $destinoObj) && ($fechaViaje != $fechaObjViaje) && ($horarioPartida != $hpObjViaje)){
                $nuevaColViajes = array_push ($coleccionViajes, $objViaje);
                $this->setArrayObjViajes($nuevaColViajes);
                $incorporacion = true;
            }else{
                $incorporacion = false;
            }
        }
        return $incorporacion;
    }

    /**
     * Método que recibe por parámetros, la cantidad de asientos y el destino. De ser posible se registra 
     * la asignacion del viaje. Retorna la instancia del viaje asignado o null en caso contrario.
     * @param int $cantAsientos
     * @param string $destino
     * @return object
     */
    public function venderViajeADestino($cantAsientos, $destino, $fechaViaje){
        $coleccionViajes = $this->getArrayObjViajes();
        $cantViajes = count($coleccionViajes);
        $seguirBuscando = true;
        $objViaje = null;
        $i = 0;
        do {
            $viaje = $coleccionViajes[$i];
            $destinoViaje = $viaje->getDestino();
            $fecha = $viaje->getFecha();
            if (($destino == $destinoViaje) && ($fecha == $fechaViaje )){
                if($viaje->asignarAsientosDisponibles($cantAsientos)){
                    $objViaje = $viaje;
                    $seguirBuscando = false;
                }
            }else{
            $i++;
            }
        }while ($seguirBuscando && $i<$cantViajes);    
        return $objViaje;
    }

    /**
     * Método que retorna el monto recaudado por la Empresa.
     * @return int
     */
    public function montoRecaudado(){
        $coleccionViajes = $this->getArrayObjViajes();
        $montoR = 0;
        foreach ($coleccionViajes as $viaje){
            $importeAsientoViaje = $viaje->getImporte();
            $asientosOcupados = $viaje->getCantAsientosTot() - $viaje->getCantAsientosDisp();
            $importeViaje = $importeAsientoViaje * $asientosOcupados;
            $montoR = $montoR + $importeViaje;
        }
        return $montoR;
    }

    /**
     * Método que retorna los atributos de la clase en una cadena de caracteres
     */
    public function __toString(){
        return "**************************************************************"."\n".
               "Identificación: ".$this->getIdentificacion()."\n".
               "Nombre: ".$this->getNombre()."\n".
               "Viajes: "."\n".$this->viajesToString();
    }

    /**************************************/
    /********* FUNCIONES PRIVADAS *********/
    /**************************************/

    private function viajesToString(){
        $coleccion = $this->getArrayObjViajes();
        $string = "";
        foreach ($coleccion as $viaje){
            $string .= $viaje;
        }
        return $string; 
    }
}
?>