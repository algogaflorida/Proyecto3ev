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
}