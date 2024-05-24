<?php

class PartidoBasquet extends Partido{


   
    private $infracciones;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$infracciones){

        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        
        $this->infracciones = $infracciones;

    }

   

    public function getInfracciones(){

        return $this->infracciones;
    }

    public function setInfracciones($infracciones){
        $this->infracciones = $infracciones;
    }

    public function __toString(){

        $cadena = parent::__toString();
        $cadena .=  "\n Infracciones: ".$this->getInfracciones();

        return $cadena;
        
    }
}