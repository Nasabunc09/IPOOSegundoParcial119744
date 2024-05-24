<?php
class Partido{
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
            $this->idpartido = $idpartido;
            $this->fecha = $fecha;
            $this->objEquipo1 =$objEquipo1;
            $this->cantGolesE1 = $cantGolesE1;
            $this->objEquipo2 = $objEquipo2;
            $this->cantGolesE2 = $cantGolesE2;
            $this->coefBase = 0.5;


    }

    //OBSERVADORES
    public function setidpartido($idpartido){
         $this->idpartido= $idpartido;
    }

    public function getIdpartido(){
        return $this->idpartido;
    }

    public function setFecha($fecha){
        $this->fecha= $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }


 public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1= $cantGolesE1;
    }

    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
 public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2= $cantGolesE2;
    }

    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }



 public function setObjEquipo1($objEquipo1){
        $this->objEquipo1= $objEquipo1;
    }
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }


 public function setObjEquipo2($objEquipo2){
        $this->objEquipo2= $objEquipo2;
    }
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }

     public function setCoefBase($coefBase){
         $this->coefBase = $coefBase;
    }
      public function getCoefBase(){
        return $this->coefBase;
    }



public function __toString(){
        //string $cadena
        $cadena = "idpartido: ".$this->getIdpartido()."\n";
        $cadena = $cadena. "Fecha: ".$this->getFecha()."\n";
        $cadena = $cadena."\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 1> "."\n".$this->getObjEquipo1()."\n";
        $cadena = $cadena. "Cantidad Goles E1: ".$this->getCantGolesE1()."\n";
          $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
         $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 2> "."\n".$this->getObjEquipo2()."\n";
        $cadena = $cadena. "Cantidad Goles E2: ".$this->getCantGolesE2()."\n";
         $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        return $cadena;
    }

    public function darEquipoGanador (){

          $golesEquipo1  = $this->getCantGolesE1();
          $golesEquipo2  = $this->getCantGolesE2();

        if ($golesEquipo1 > $golesEquipo2){

            $ganador = $this->getObjEquipo1();

        }else{
           
            if($golesEquipo1 < $golesEquipo2){

                $ganador = $this->getObjEquipo2();

            }else{

                if($golesEquipo1 = $golesEquipo2){

                    $ganador = $this->getObjEquipo1() ."\n". $this->getObjEquipo2(); 
                }
            }
        }

        return $ganador;
    }

    /**En cada partido se gestiona un coeficiente base cuyo valor por defecto es 0.5 y es aplicado a la cantidad de
goles y a la cantidad de jugadores de cada equipo. Es decir:
coef = 0,5 * cantGoles * cantJugadores donde cantGoles : es la cantidad de goles; cantJugadores : es la
cantidad de jugadores.
Si se trata de un partido de fútbol, se deben gestionar el valor de 3 coeficientes que serán aplicados según la
categoría del partido (coef_Menores,coef_juveniles,coef_Mayores) . A continuación se presenta una tabla en la
que se detalla los valores por defecto de cada coeficiente aplicado a una categoría de un partido fútbol */

    public function coeficientePartido(){
        
        $coeficiente_base_partido = 0;
        $coefBase = $this->getCoefBase();
        $golesEquipo1 = $this->getCantGolesE1();
        $golesEquipo2 = $this->getCantGolesE2();
        $cantJugadores1 = $this->getObjEquipo1()->getCantJugadores();
        $cantJugadores2 = $this->getObjEquipo2()->getCantJugadores();
        

        
        $coeficiente_base_partido = ($coefBase * ($golesEquipo1 + $golesEquipo2)  *  ($cantJugadores1 + $cantJugadores2));
        
        return $coeficiente_base_partido;



    }

    public function calcularPremioPartido($objPartido){

        $coef_partido = $this->coeficientePartido();

        $ImportePremio = $objPartido->getImportePremio();

        $premioPartido = $coef_partido * $ImportePremio;

        $arrayAsociativo = array ($premioPartido,$ImportePremio);


        return $arrayAsociativo;

    }

    
}


?>