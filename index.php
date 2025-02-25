<?php

include_once __DIR__ . '/controller/AgendamentoController.php';
include_once __DIR__ . '/controller/ClienteController.php';
include_once __DIR__ . '/controller/CompraController.php';
include_once __DIR__ . '/controller/ProdutoController.php';
include_once __DIR__ . '/controller/ServicoController.php';
include_once __DIR__ . '/controller/HomeController.php';

$classe = isset($_GET['classe']) ? $_GET['classe'] : null;
$metodo = isset($_GET['metodo']) ? $_GET['metodo'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$classe || !$metodo) {
    $controller = new HomeController();
    $controller->index();
    exit;
}

$classe .= 'Controller';

if (class_exists($classe)) {
    $controller = new $classe();
    if (method_exists($controller, $metodo)) {
        if ($id === null) {
            $controller->$metodo();
        } else {
            $controller->$metodo($id);
        }
    } else {
        echo "Método não encontrado.";
    }
} else {
    echo "Classe não encontrada.";
}
?>