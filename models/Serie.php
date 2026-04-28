<?php
abstract class Serie {
    protected $id;
    protected $estreno;
    protected $titulo;
    protected $genero;

    public function __construct($est, $tipo, $tit, $gen, $id = 0){
        $this->estreno = $est;
        $this->titulo = $tit;
        $this->genero = $gen;
        $this->id = $id;
    }

    abstract public function getTipoClase();
    public function setEstreno($est){
        $this->estreno = $est;
    }

    public function setTipoClase($tc){
        $this->tipo_clase = $tc;
    }

    public function setGenero($gen){
        $this->genero = $gen;
    }

    public function setTitulo($tit){
        $this->titulo = $tit;
    }
    
    public function getEstreno(){
        return $this->estreno;
    }

    public function getTipoClase(){
        return $this->tipo_clase;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getId(){
        return $this->id;
    }
}