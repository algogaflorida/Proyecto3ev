<?php
class Serie {
    private $id_serie;
    private $estado;
    private $fecha_estreno;
    private $puntuacion_media;
    private $sinopsis;
    private $titulo;

    public function __construct($est, $fecha, $punt, $sino, $tit, $id = 0){
        $this->estado = $est;
        $this->fecha_estreno = $fecha;
        $this->puntuacion_media = $punt;
        $this->sinopsis = $sino;
        $this->titulo = $tit;
        $this->id_serie = $id;
    }

    public function setEstado($est){
        $this->estado = $est;
    }

    public function setFechaEstreno($fecha){
        $this->fecha_estreno = $fecha;
    }

    public function setPuntuacion($punt){
        $this->puntuacion_media = $punt;
    }

    public function setSinopsis($sino){
        $this->sinopsis = $sino;
    }

    public function setTitulo($tit){
        $this->titulo = $tit;
    }

    public function getEstado(){
        return $this->estado;
    }
    
    public function getFechaEstreno(){
        return $this->fecha_estreno;
    }

    public function getPuntuacion(){
        return $this->puntuacion_media;
    }

    public function getSinopsis(){
        return $this->sinopsis;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getId(){
        return $this->id_serie;
    }
}