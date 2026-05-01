<?php
class Documental extends Serie {
    private $narrador;

    public function __construct($est, $tit, $gen, $narr, $id = 0){
        parent::__construct($est, $tit, $gen, $id);
        $this->narrador = $narr;
    }

    public function getTipoClase(){
        return 'Documental';
    }

    public function setNarrador($narrador){
        $this->narrador = $narrador;
    }

    public function getNarrador(){
        return $this->narrador;
    }
}