<?php

include_once __DIR__ . '/../../model/Servico.php';

session_start();

$servico = $_SESSION['servico'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Serviço</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="../home/homepage.php">Editar Serviço</a>
    </nav>

    <div class="alinhamento">
        <form action="../../index.php?classe=Servico&metodo=update&id=<?php echo $servico->getId(); ?>" method="post">
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" class="form-control" name="nome" id="nome" maxlength="100" value="<?php echo $servico->getNome(); ?>" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" step="0.01" name="valor" id="valor" value="<?php echo $servico->getValor(); ?>" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição: </label>
                <textarea class="form-control" name="descricao" id="descricao" required><?php echo $servico->getDescricao(); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>