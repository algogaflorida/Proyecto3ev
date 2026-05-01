<?php
session_start();
if (!isset($_SESSION['usuario_id']) && isset($_COOKIE['recordar'])) {
    $_SESSION['usuario_id'] = $_COOKIE['recordar'];
}
require_once "autoload.php";


$gestor = new GestorPDO();
$controllerSeries = new ControllerSeries($gestor);
$usuarioController = new ControllerUsuario($gestor);

$accion = $_GET['accion'] ?? 'listar';

switch ($accion) { 
    case 'login':
        $usuarioController->iniciarSesion();
        break;
    case 'registro':
        $usuarioController->registro();
        break;
    case 'logout':
        $usuarioController->logOut();
        break;
    case 'crear':
    case 'eliminar':
    case 'editar':
    case 'votar':
        if (!isset($_SESSION['usuario_id'])){
            header('Location: index.php?accion=login');
            exit;
        }
        $controllerSeries->$accion();
        break;
    default:
        $controllerSeries->listar();
        break;
}