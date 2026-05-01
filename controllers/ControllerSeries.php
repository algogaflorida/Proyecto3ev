<?php
class ControllerSeries {
    private $gestor;

    public function __construct($gest){
        $this->gestor = $gest;
    }

    public function listar(){
        $series = $this->gestor->listar();
        include "views/listar.php";
    }

    public function editar(){
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?accion=login");
            exit;
        }
        
        $id = $_GET['id'] ?? null;
        
        $serie = $this->gestor->buscar($id);
        if (!$serie) {
            header("Location: index.php?accion=listar");
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $serie->setEstreno($_POST['estreno']);
            $serie->setTitulo($_POST['titulo']);
            $serie->setGenero($_POST['genero']);
            if ($serie instanceof Drama){
                $serie->setCalificacion($_POST['calificacion_edad']);
            } elseif ($serie instanceof Documental) {
                $serie->setNarrador($_POST['narrador']);
            } else {
                $serie->setEstilo($_POST['estilo']);
            }
            $this->gestor->editar($serie);
            header('Location: index.php');
            exit;
        }
        include "views/editar.php";
    }

    public function crear(){
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?accion=login");
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $estreno = $_POST['estreno'];
            $titulo = $_POST['titulo'];
            $genero = $_POST['genero'];
            $tipo = $_POST['tipo_clase'];
            if ($tipo == "Drama"){
                $distintivo = $_POST['calificacion_edad'];
                $nuevaSerie = new Drama($estreno, $titulo, $genero, $distintivo);
            } elseif ($tipo == "Documental") {
                $distintivo = $_POST['narrador'];
                $nuevaSerie = new Documental($estreno, $titulo, $genero, $distintivo);
            } else {
                $distintivo = $_POST['estilo'];
                $nuevaSerie = new Animada($estreno, $titulo, $genero, $distintivo);
            }
            $this->gestor->crear($nuevaSerie);

            header('Location: index.php');
            exit;
        }
        include "views/crear.php";
    }

    public function eliminar(){
        if (!isset($_SESSION['usuario_id'])) {
        header("Location: index.php?accion=login");
        exit;
        }

        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->gestor->eliminar($id);
        }

        header('Location: index.php?accion=listar');
        exit;
    }
}