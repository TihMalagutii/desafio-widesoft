<?php

    session_start();
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'sim'){
        header('Location: index.php?login=errorauth');
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

    <!-- Css styles -->
    <link rel="stylesheet" href="style.css">

    <style>
        .marcador {
            border: 1px solid red;
        }
    </style>

    <title>Interwebs Corp</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark justify-content-center">
        <a href="#" class="navbar-brand">
            <h1>Interwebs Corp</h1>
        </a>
        <a class="btn btn-outline-danger ml-auto" href="Sistema/logoff.php">Sair</a>
    </nav>

    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="marcador pt-2 col-md-10 offset-md-1">
                <form class="input-group">
                    <input class="form-control" type="url" placeholder="Adicionar url" >
                    <div class="input-group-append">
                        <button type="button" class="btn btn-info">+</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>