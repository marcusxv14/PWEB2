<?php

include_once __DIR__ . '/../../model/Agendamento.php';
include_once __DIR__ . '/../../model/Cliente.php';
include_once __DIR__ . '/../../model/Servico.php';

session_start();

$agendamento = $_SESSION['agendamento'];
$cliente_id = $_SESSION['cliente_id'];
$servico_id = $_SESSION['servico_id'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar agendamento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="../home/homepage.php">Editar Agendamento</a>
    </nav>

    <div class="alinhamento">
        <form action="../../index.php?classe=Agendamento&metodo=update&id=<?php echo $agendamento->getId(); ?>" method="post">
            <div class="form-group">
                <label for="cliente_id">Clientes</label>
                <select class="form-control" name="cliente_id" id="cliente_id" required>
                    <option value="" selected disabled>Selecione</option>
                    <?php
                    foreach ($cliente_id as $cliente) {
                        echo "<option value='" . $cliente->getId() . "'";
                        echo $cliente->getId() == $agendamento->getCliente_id() ? 'selected' : '';
                        echo ">" . $cliente->getNome() . ' - ' . $cliente->getNum() . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="servico_id">Serviços</label>
                <select class="form-control" name="servico_id" id="servico_id" required>
                    <option value="" selected disabled>Selecione</option>
                    <?php
                    foreach ($servico_id as $servico) {
                        echo "<option value='" . $servico->getId() . "'";
                        echo $servico->getId() == $agendamento->getServico_id() ? 'selected' : '';
                        echo ">" . $servico->getNome() . ' - R$' . $servico->getValor() . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="data">Data: </label>
                <input type="date" class="form-control" name="data" id="data" value="<?php echo $agendamento->getData(); ?>" required>
            </div>
            <div class="form-group">
                <label for="horario">horário</label>
                <input type="time" class="form-control" name="horario" id="horario" value="<?php echo $agendamento->getHorario(); ?>" required>
            </div>
            <div class="form-group">
                <label for="duracao">Duração</label>
                <input type="time" class="form-control" name="duracao" id="duracao" value="<?php echo $agendamento->getDuracao(); ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="" selected disabled>Selecione</option>
                    <option value="0" <?php echo !$agendamento->getStatus() ? 'selected' : ''; ?>>Pendente</option>
                    <option value="1" <?php echo $agendamento->getStatus() ? 'selected' : ''; ?>>Concluído</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>
