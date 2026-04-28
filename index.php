<?php
require_once "autoload.php";


$gestor = new GestorPDO();
$controller = new Controller($gestor);
$usuarioController = new UsuarioController($gestor);

$accion = $_GET['accion'] ?? 'listar';

switch ($accion) { 
    case 'login':
        $usuarioController->login();
        break;
    case 'registro':
        $usuarioController->registro();
        break;
    case 'logout':
        $usuarioController->logout();
        break;
    case 'crear':
    case 'eliminar':
    case 'editar':
        if (!isset($_SESSION['usuarioId'])){
            header('Location: index.php?accion=login');
            break;
        }
        if ($accion === 'crear'){
            $controller->crear();
            break;
        }
        if ($accion === 'eliminar'){
            $controller->eliminar();
            break;
        }
        if ($accion === 'editar'){
            $controller->editar();
            break;
        }
        break;
    default:
        $controller->listar();
        break;
}