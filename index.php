<?php
require_once "autoload.php";
$gestor = new GestorPDO();
$controller = new Controller($gestor);
$accion = $_GET['accion'] ?? 'listar';

switch ($accion) { 
    case 'listar':
        $controller->listar();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;
    case 'agregar':
        $controller->agregar();
        break;
}