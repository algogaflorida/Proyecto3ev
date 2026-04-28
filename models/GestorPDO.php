<?php
class GestorPDO{
    private $db;

    public function __construct() {
        $this->db = Connection::getInstance()->getConnection();
    }

    public function buscarUsuarioPorEmail($email){
        $sql = "SELECT * FROM usuario where email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        $datos = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($datos){
            return new Usuario ($datos['email'], $datos['pwd'], $datos['id']);
        } else {
            return null;
        }
    }

    public function registrarUsuario(Usuario $u){
        try {
            $sql = "INSERT INTO usuario (email, pwd) VALUES (:email, :pwd)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([':email' = $u->getEmail(), 'pwd' = $u->getPassword()]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listar(){
        $series = [];

        $sql = "SELECT * FROM series";
        $stmt = $this->db->query($sql);

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
            if ($fila['tipo_clase'] === 'Drama'){
                $series[] = new Drama ($fila['estreno'], $fila['titulo'], $fila['genero'], $fila['calificacion_edad'], $fila['id']);
            } elseif ($fila['tipo_clase'] === 'Documental') {
                $series[] = new Documental ($fila['estreno'], $fila['titulo'], $fila['genero'], $fila['narrador'], $fila['id']);
            } else {
                $series[] = new Animada ($fila['estreno'], $fila['titulo'], $fila['genero'], $fila['estilo_animacion'], $fila['id']);
            }
        }
        return $series;
    }

    public function eliminar($id){
        $sql = "DELETE FROM series WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);

        header('Location: index.php?accion=listar');
        exit;
    }

    public function crear(Serie $s){
        $sql = "INSERT INTO serie (estreno, titulo, genero, calificacion_edad, narrador, estilo_animacion) VALUES (:estreno, :titulo, :genero, :calificacion_edad, :narrador, :estilo_animacion)";
        $stmt = $this->db->prepare($sql);
        $params = [ ':titulo'  => $s->getTitulo(), ':estreno' => $s->getEstreno(), ':genero'  => $s->getGenero(), ':tipo' => $s->getTipoClase(), ':calificacion_edad' => null, 
        ':estilo_animacion' => null, ':narrador'=> null ];

    // Rellenamos solo lo que toque según el tipo de objeto
    if ($s instanceof Drama) $params['calificacion_edad'] = $s->getCalificacionEdad();
    if ($s instanceof Animada) $params['estilo_animacion'] = $s->getEstiloAnimacion();
    if ($s instanceof Documental) $params['narrador'] = $s->getNarrador();
    }
}