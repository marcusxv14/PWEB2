<?php

include_once __DIR__ . '/../../model/Agendamento.php';
include_once __DIR__ . '/../../model/Cliente.php';
include_once __DIR__ . '/../../model/Servico.php';

session_start();

$agendamentos = $_SESSION['agendamentos'];
$cliente_id = $_SESSION['cliente_id'];
$servico_id = $_SESSION['servico_id'];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Agendamento</title>
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
    <a class="btn btn-primary alinha" href="../../index.php?classe=Agendamento&metodo=create" role="button">Novo</a>
    <div class="container mt-4">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Serviço</th>
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Duração</th>
                            <th>Status</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($agendamentos as $agendamento) {
                        echo '<tr>';
                        echo '<td>' . $agendamento->getId() . '</td>';
                        foreach ($cliente_id as $cliente) {
                            if ($cliente->getId() == $agendamento->getCliente_id()) {
                                echo '<td>' . $cliente->getNome() . ' - '. $cliente->getNum() . '</td>';
                            }
                        }
                        foreach ($servico_id as $servico) {
                            if ($servico->getId() == $agendamento->getServico_id()) {
                                echo '<td>' . $servico->getNome() . ' - ' . 'R$' . $servico->getValor() . '</td>';
                            }
                        }
                        $date = new DateTimeImmutable($agendamento->getData());
                        echo '<td>' . $date->format('d-m-Y') . '</td>';
                        echo '<td>' . $agendamento->getHorario() . '</td>';
                        echo '<td>' . $agendamento->getDuracao() . '</td>';
                        echo '<td>';
                        if ($agendamento->getStatus()) {
                            echo 'Concluído';
                        } else {
                            echo 'Pendente';
                        }
                        echo'</td>';
                        echo '<td>';
                        echo '<div class="alinhamento-link">';
                        echo '<a class="btn btn-primary" href="../../index.php?classe=Agendamento&metodo=edit&id=' . $agendamento->getId() . '">Editar</a>';
                        echo '<a class="btn btn-primary" href="../../index.php?classe=Agendamento&metodo=delete&id=' . $agendamento->getId() . '">Deletar</a>';
                        echo '<a class="btn btn-primary" href="../../index.php?classe=Agendamento&metodo=show&id=' . $agendamento->getId() . '">Mostrar</a>';
                        echo '</div>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>