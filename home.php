<?php

    session_start();
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'sim'){
        header('Location: index.php?login=errorauth');
        die();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v4.1.3 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Css styles -->
    <link rel="stylesheet" href="system/style.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <title>Interwebs Corp</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-center">
        <a href="#" class="navbar-brand ml-2">
            <h3>Interwebs Corp</h3>
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-2">
                <a class="nav-link btn btn-outline-danger" href="system/logout.php">
                    <i class="bi bi-box-arrow-left"></i> <span>Sair</span>
                </a>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link btn btn-outline-info" id="btnAtualizar" href="#">
                    <i class="bi bi-arrow-clockwise"></i> <span>Atualizar</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Alerta -->
    <div id="alertContainer"></div>

    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="pt-2 col-md-10 offset-md-1">
                <form class="input-group">
                    <input id="inputUrl" class="form-control" type="url" placeholder="Adicionar url">
                    <div id="divBtnUrl" class="input-group-append">
                        <button id="adcUrl" type="button" class="btn btn-info">+</button>
                    </div>
                </form>
                <ul id="listaUrl" class="list-group"></ul>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="containerModal"></div>

    <!-- Scripts -->
    <script src="system/script.js"></script>

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>