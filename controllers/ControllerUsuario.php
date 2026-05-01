<?php
class ControllerUsuario {
    private $gestor;

    public function __construct($gest){
        $this->gestor = $gest;
    }

    public function registro(){
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $email = $_POST['email'];
            $pwdPlana = $_POST['pwd'];

            $pwdHasheada = password_hash($pwdPlana, PASSWORD_DEFAULT);

            $nuevoUser = new Usuario($email, $pwdHasheada);

            $this->gestor->registrarUsuario($nuevoUser);

            header("Location: index.php?accion=login");
            exit;
        }
        include "views/registro.php";
    }

    public function iniciarSesion(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];

            $usuario = $this->gestor->buscarUsuarioPorEmail($email);

            if ($usuario && password_verify($pwd, $usuario->getPassword())){

                $_SESSION['usuario_id'] = $usuario->getId();
                $_SESSION['usuario_email'] = $usuario->getEmail(); 

                if (isset($_POST['recordar'])) {
                    setcookie("recordar", $usuario->getId(), time() + (86400 * 30), "/");
                }

                header('Location: index.php');
                exit;
            }
        }
        include "views/login.php";
    }

    public function logOut(){
        $_SESSION = [];
        
        session_destroy();
        
        if (isset($_COOKIE['recordar'])) {
        setcookie("recordar", "", time() - 3600, "/");
        }
        header("Location: index.php");
        exit;
    }
}