<?php

require_once "../controller/usuarioController.php";
require_once "../controller/categoriaController.php";

$usuarioController = new UsuarioController();
$usuarios = $usuarioController->listarUsuarios();

$categoriaController = new CategoriaController();
$categorias = $categoriaController->listarCategorias();

header('Content-Type: application/json');
echo json_encode([
    "categorias" => $categorias,
    "autores" => $usuarios
]);

?>