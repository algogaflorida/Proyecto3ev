<?php
class Drama extends Serie {
    private $calificacionEdad;

    public function __construct($est, $tit, $gen, $calificacion, $id = 0){
        parent::__construct($est, $tit, $gen, $id);
        $this->calificacionEdad = $calificacion;
    }

    public function getTipoClase(){
        return 'Drama';
    };

    public function setCalificacion($calificacion){
        $this->calificacionEdad = $calificacion;
    }

    public function getCalificacion(){
        return $this->calificacionEdad;
    }
}