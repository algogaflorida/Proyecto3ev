<?php
class Drama extends Serie {
    private $calificacion_edad;

    public function __construct($est, $tit, $gen, $calificacion, $id = 0){
        parent::__construct($est, $tit, $gen, $id);
        $this->calificacion_edad = $calificacion;
    }

    public function getTipoClase(){
        return 'Drama';
    };

    public function setCalificacion($calificacion){
        $this->calificacion_edad = $calificacion;
    }

    public function getCalificacion(){
        return $this->calificacion_edad;
    }
}