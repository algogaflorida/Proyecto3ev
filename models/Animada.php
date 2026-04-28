<?php
class Animada extends Serie {
    private $estilo_animacion;

    public function __construct($est, $tit, $gen, $estilo, $id = 0){
        parent::__construct($est, $tit, $gen, $id);
        $this->estilo_animacion = $estilo;
    }

    public function getTipoClase(){
        return 'Animada';
    };

    public function setEstilo($estilo){
        $this->estilo_animacion = $estilo;
    }

    public function getEstilo(){
        return $this->estilo_animacion;
    }
}