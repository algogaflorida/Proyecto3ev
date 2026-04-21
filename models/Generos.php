<?php
class Generos {
    private $id_genero;
    private $nombre;

    public function __construct($id, $nom){
        $this->id_genero = $id;
        $this->nombre = $nom;
    }
    
    public function getIdGenero(){
        return $this->id_genero;
    }

    public function setNombre($nom){
        $this->nombre = $nom;
    }

    public function getNombre(){
        return $this->nombre;
    }
}