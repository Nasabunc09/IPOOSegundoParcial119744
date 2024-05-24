<?php


class Torneo{

    private $colPartidos;
    private $importePremio;

    public function __construct($importePremio){

        $this->colPartidos = [];
        $this->importePremio = $importePremio;
    }

    public function getColPartidos(){
        return $this->colPartidos;
    }

    public function getImportePremio(){
        return $this->importePremio;
    }

    public function setColPartidos($colPartidos){
        $this->colPartidos = $colPartidos;
    }

    public function setImportePremio($importePremio){
        $this->importePremio = $importePremio;
    }

    private function obtenerValoresCol($col){

        $cadena = "";
        foreach($col as $elemento){
            $cadena = $cadena."".$elemento."\n";

        }

        $cadena;
    }

    public function __toString(){

        $cadena .= "Coleccion Partido: ".$this->obtenerValoresCol($this->getColPartidos())."\n".
        $cadena  = "Importe Premio: ".$this->getImportePremio()."\n";

        return $cadena;
        
    }

    /**Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la  clase Torneo 
     * el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido 
     * y si se trata de un partido de futbol o basquetbol . 
     * El método debe crear y retornar la instancia de la clase Partido 
     * que corresponda y almacenarla en la colección de partidos del Torneo. 
     * Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de 
     * jugadores, caso contrario no podrá ser registrado ese partido en el torneo. */
     //$idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$infracciones Basquet
     //$idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2 futbol

    public function ingresarPartido($objEquipo1,$objEquipo2,$fecha,$tipoPartido){

        
        $idpartido = 0;
        $cantGolesE1 = 0;
        $cantGolesE2 = 0;

        if (($objEquipo1->getidcategoria() == $objEquipo2->getidcategoria()) && ($objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores())){

        
             if($tipoPartido instanceof PartidoBasquet){

                $infracciones = 0;

                $nuevoPartido = new PartidoBasquet($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$infracciones);

             }else{

                $nuevoPartido = new Partido ($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
            }

        }

        return $nuevoPartido;

    }

    /**Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si
     *  se trata de un partido de fútbol o de básquetbol y en  base  
     * al parámetro busca entre esos partidos los equipos ganadores
     *  ( equipo con mayor cantidad de goles).
     *  El método retorna una colección con los objetos de los equipos encontrados.
 */

    public function darGanadores($deporte){

        $colPartidos = $this->colPartidos;
        $colGanadores = [];

        if($deporte instanceof Partido){

        
           foreach($colPartidos as $partido){
                   
              $ganador = $partido->darEquipoGanador();
              $colGanadores = $ganador;
            
            }
        }

        return $colGanadores;


    }

    





}