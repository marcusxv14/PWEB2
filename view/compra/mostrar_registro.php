<?php

include_once __DIR__ . '/../../model/Compra.php';
include_once __DIR__ . '/../../model/Cliente.php';
include_once __DIR__ . '/../../model/Produto.php';

session_start();

$compra= $_SESSION['compra'];
$cliente_id = $_SESSION['cliente_id'];
$produto_id = $_SESSION['produto_id'];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="../../index.php">BARBER4MAN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../../index.php">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../index.php?classe=Cliente&metodo=index">CLIENTES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../index.php?classe=Produto&metodo=index">PRODUTOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../index.php?classe=Servico&metodo=index">SERVIÇOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../index.php?classe=Agendamento&metodo=index">AGENDAMENTOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../index.php?classe=Compra&metodo=index">COMPRAS</a>
            </li>
            </ul>
        </div>
    </nav>
    <h2 class="alinha">Dados De Registro</h2>
        <div class="conteiner-compra"> 
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Clientes</th>
                    <th>Produtos</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Quantidade</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
            <?php
            echo '<tr>';
            echo '<td>' . $compra->getId() . '</td>';
            foreach ($cliente_id as $cliente) {
                if ($cliente->getId() == $compra->getCliente_id()) {
                    echo '<td>' . $cliente->getNome() . ' - '. $cliente->getNum() . '</td>';
                }
            }
            foreach ($produto_id as $produto) {
                if ($produto->getId() == $compra->getProduto_id()) {
                    echo '<td>' . $produto->getNome() . ' - ' . 'R$' . $produto->getValor() . '</td>';
                }
            }
            $date = new DateTimeImmutable($compra->getData());
            echo '<td>' . $date->format('d-m-Y') . '</td>';
            echo '<td>' . $compra->getHorario() . '</td>';
            echo '<td>' . $compra->getQtd() . '</td>';
            echo '<td>';
            echo '<div class="alinhamento-link">';
            echo '<a class="btn btn-primary" href="../../index.php?classe=Compra&metodo=edit&id=' . $compra->getId() . '">Editar</a>';
            echo '<a class="btn btn-primary" href="../../index.php?classe=Compra&metodo=delete&id=' . $compra->getId() . '">Deletar</a>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
                
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
