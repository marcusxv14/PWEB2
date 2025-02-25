<?php

include_once __DIR__ . '/../../model/Compra.php';
include_once __DIR__ . '/../../model/Cliente.php';
include_once __DIR__ . '/../../model/Produto.php';

session_start();

$cliente_id = $_SESSION['cliente_id'];
$produto_id = $_SESSION['produto_id'];
$compra = $_SESSION['compra'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Compra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004494;">
        <a class="navbar-brand" href="../home/homepage.php">Editar Compra</a>
    </nav>

    <div class="alinhamento">
        <form action="../../index.php?classe=Compra&metodo=update&id=<?php echo $compra->getId() ?>" method="post">
            <div class="form-group">
                <label for="cliente_id">Clientes</label>
                <select class="form-control" name="cliente_id" id="cliente_id" required>
                    <option value="" selected disabled>Selecione</option>
                    <?php
                    foreach ($cliente_id as $cliente) {
                        echo "<option value='" . $cliente->getId() . "'";
                        echo $cliente->getId() == $compra->getCliente_id() ? 'selected' : '';
                        echo ">" . $cliente->getNome() . ' - ' . $cliente->getNum() . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="produto_id">Produtos</label>
                <select class="form-control" name="produto_id" id="produto_id" required>
                    <option value="" selected disabled>Selecione</option>
                    <?php
                    foreach ($produto_id as $produto) {
                        echo "<option value='" . $produto->getId() . "'";
                        echo $produto->getId() == $compra->getProduto_id() ? 'selected' : '';
                        echo ">" . $produto->getNome() . ' - R$' . $produto->getValor() . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="data">Data: </label>
                <input type="date" class="form-control" name="data" id="data" value="<?php echo $compra->getData() ?>" required>
            </div>
            <div class="form-group">
                <label for="horario">Horário</label>
                <input type="time" class="form-control" name="horario" id="horario" value="<?php echo $compra->getHorario() ?>" required>
            </div>
            <div class="form-group">
                <label for="qtd">Quantidade</label>
                <input type="number" class="form-control" name="qtd" id="qtd" value="<?php echo $compra->getQtd() ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>