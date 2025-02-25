<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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

    <div class="jumbotron text-center">
        <h1 class="display-4">Bem-vindo ao Barber4Men!</h1>
        <p class="lead">Seu sistema de gerenciamento de barbearia.</p>
        <hr class="my-4">
        <p>Gerencie seus clientes, produtos, serviços, agendamentos e compras de forma fácil e eficiente.</p>
        <a class="btn btn-primary btn-lg" href="../../index.php?classe=Cliente&metodo=index" role="button">Comece agora</a>
    </div>
</body>
</html>