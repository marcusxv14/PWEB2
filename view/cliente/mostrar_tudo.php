<?php

include_once __DIR__ . '/../../model/Cliente.php';

session_start();

$clientes = $_SESSION['clientes'];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
     
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
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
    <a class="btn btn-primary alinha" href="../../index.php?classe=Cliente&metodo=create" role="button">Novo</a>
    <div class="conteiner ">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>WhatsApp</th>
                    <th>Logradouro</th>
                    <th>Número</th>
                    <th>Bairro</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($clientes as $cliente) {
                echo '<tr>';
                echo '<td>' . $cliente->getId() . '</td>';
                echo '<td>' . $cliente->getNome() . '</td>';
                echo '<td>' . $cliente->getCpf() . '</td>';
                $date = new DateTimeImmutable($cliente->getDt_nasc());
                echo '<td>' . $date->format('d-m-Y') . '</td>';
                echo '<td>' . $cliente->getWhatsapp() . '</td>';
                echo '<td>' . $cliente->getLogradouro() . '</td>';
                echo '<td>' . $cliente->getNum() . '</td>';
                echo '<td>' . $cliente->getBairro() . '</td>';
                echo '<td>';
                echo '<div class="alinhamento-link">';
                echo '<a class="btn btn-primary" href="../../index.php?classe=Cliente&metodo=edit&id=' . $cliente->getId() . '">Editar</a>';
                echo '<a class="btn btn-primary" href="../../index.php?classe=Cliente&metodo=delete&id=' . $cliente->getId() . '">Deletar</a>';
                echo '<a class="btn btn-primary" href="../../index.php?classe=Cliente&metodo=show&id=' . $cliente->getId() . '">Mostrar</a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>