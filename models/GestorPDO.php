<?php
class GestorPDO {
    private $db;

    public function __construct() {
        $this->db = Connection::getInstance()->getConnection();
    }

    public function buscarUsuarioPorEmail($email) {
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        $datos = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($datos) {
            return new Usuario($datos['email'], $datos['pwd'], $datos['id']);
        }
        return null;
    }

    public function registrarUsuario(Usuario $u) {
        try {
            $sql = "INSERT INTO usuario (email, pwd) VALUES (:email, :pwd)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':email', $u->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':pwd', $u->getPassword(), PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listar() {
        $series = [];
        $sql = "SELECT * FROM series";
        $stmt = $this->db->query($sql);

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $s = null;
            if ($fila['tipo_clase'] === 'Drama') {
                $s = new Drama($fila['estreno'], $fila['titulo'], $fila['genero'], $fila['calificacion_edad'], $fila['id']);
            } elseif ($fila['tipo_clase'] === 'Documental') {
                $s = new Documental($fila['estreno'], $fila['titulo'], $fila['genero'], $fila['narrador'], $fila['id']);
            } else {
                $s = new Animada($fila['estreno'], $fila['titulo'], $fila['genero'], $fila['estilo_animacion'], $fila['id']);
            }
            if ($s !== null) {
                $s->setNota($fila['nota']); 
                $series[] = $s;
            }

        }
    
        return $series;
    }

    public function buscar($id) {
        $serie = null;
        $sql = "SELECT * FROM series where id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($fila['tipo_clase'] === 'Drama') {
                $serie = new Drama($fila['estreno'], $fila['titulo'], $fila['genero'], $fila['calificacion_edad'], $fila['id']);
            } elseif ($fila['tipo_clase'] === 'Documental') {
                $serie = new Documental($fila['estreno'], $fila['titulo'], $fila['genero'], $fila['narrador'], $fila['id']);
            } else {
                $serie = new Animada($fila['estreno'], $fila['titulo'], $fila['genero'], $fila['estilo_animacion'], $fila['id']);
            }
        }
        return $serie;
    }

    public function eliminar($id) {
        $sql = "DELETE FROM series WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        }

    public function crear(Serie $s) {
        $sql = "INSERT INTO series (estreno, titulo, genero, tipo_clase, calificacion_edad, narrador, estilo_animacion) 
                VALUES (:estreno, :titulo, :genero, :tipo, :calificacion_edad, :narrador, :estilo_animacion)";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(':estreno', $s->getEstreno());
        $stmt->bindValue(':titulo', $s->getTitulo());
        $stmt->bindValue(':genero', $s->getGenero());
        $stmt->bindValue(':tipo', $s->getTipoClase());

        $stmt->bindValue(':calificacion_edad', ($s instanceof Drama) ? $s->getCalificacion() : null);
        $stmt->bindValue(':narrador', ($s instanceof Documental) ? $s->getNarrador() : null);
        $stmt->bindValue(':estilo_animacion', ($s instanceof Animada) ? $s->getEstilo() : null);

        $stmt->execute();
    }

    public function editar(Serie $s) {
        $sql = "UPDATE series SET 
                    estreno = :estreno, 
                    titulo = :titulo, 
                    genero = :genero, 
                    tipo_clase = :tipo, 
                    calificacion_edad = :calificacion_edad, 
                    narrador = :narrador, 
                    estilo_animacion = :estilo_animacion 
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(':id', $s->getId());
        $stmt->bindValue(':estreno', $s->getEstreno());
        $stmt->bindValue(':titulo', $s->getTitulo());
        $stmt->bindValue(':genero', $s->getGenero());
        $stmt->bindValue(':tipo', $s->getTipoClase());

        $stmt->bindValue(':calificacion_edad', ($s instanceof Drama) ? $s->getCalificacion() : null);
        $stmt->bindValue(':narrador', ($s instanceof Documental) ? $s->getNarrador() : null);
        $stmt->bindValue(':estilo_animacion', ($s instanceof Animada) ? $s->getEstilo() : null);

        $stmt->execute();
    }

    public function actualizarNota($id, $nota) {
        $sql = "UPDATE series SET nota = :nota WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nota', $nota);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}