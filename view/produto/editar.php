<?php

include_once __DIR__ . '/../../model/Produto.php';

session_start();

$produto = $_SESSION['produto'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="../home/homepage.php">Editar Produto</a>
    </nav>

    <div class="alinhamento">
        <form action="../../index.php?classe=Produto&metodo=update&id=<?php echo $produto->getId(); ?>" method="post">
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" class="form-control" name="nome" id="nome" maxlength="100" value="<?php echo $produto->getNome(); ?>" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" step="0.01" name="valor" id="valor" value="<?php echo $produto->getValor(); ?>" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" name="marca" id="marca" maxlength="100" value="<?php echo $produto->getMarca(); ?>" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" class="form-control" name="categoria" id="categoria" maxlength="100" value="<?php echo $produto->getCategoria(); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>