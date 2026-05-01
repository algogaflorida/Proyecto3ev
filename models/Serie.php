<?php
abstract class Serie {
    protected $id;
    protected $estreno;
    protected $titulo;
    protected $genero;
    protected $nota;

    public function __construct($est, $tit, $gen, $id = 0) { 
        $this->estreno = $est;
        $this->titulo = $tit;
        $this->genero = $gen;
        $this->id = $id;
        $this->nota = 0; 
    }

    abstract public function getTipoClase();
    public function setEstreno($est){
        $this->estreno = $est;
    }

    public function setGenero($gen){
        $this->genero = $gen;
    }

    public function setTitulo($tit){
        $this->titulo = $tit;
    }
    
    public function setNota($nota){
        $this->nota = $nota;
    }

    public function getEstreno(){
        return $this->estreno;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getNota(){
        return $this->nota;
    }

    public function getId(){
        return $this->id;
    }
}