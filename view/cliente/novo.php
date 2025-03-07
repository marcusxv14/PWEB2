<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="../home/homepage.php">Novo Cliente</a>
    </nav>

    <div class="alinhamento">
        <form action="../../index.php?classe=Cliente&metodo=store" method="post">
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" class="form-control" name="nome" id="nome" maxlength="100" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" maxlength="11" required>
            </div>
            <div class="form-group">
                <label for="dt_nasc">Data de Nascimento</label>
                <input type="date" class="form-control" name="dt_nasc" id="dt_nasc" required>
            </div>
            <div class="form-group">
                <label for="whatsapp">Whatsapp</label>
                <input type="text" class="form-control" name="whatsapp" id="whatsapp" maxlength="11" required>
            </div>
            <div class="form-group">
                <label for="logradouro">Logradouro</label>
                <input type="text" class="form-control" name="logradouro" id="logradouro" maxlength="100" required>
            </div>
            <div class="form-group">
                <label for="num">Número</label>
                <input type="number" class="form-control" name="num" id="num" required>
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" name="bairro" id="bairro" maxlength="100" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>