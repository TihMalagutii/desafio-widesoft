<?php

    session_start();
    
    if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == 'sim'){
        header('Location: home.php');
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

    <!-- Css styles -->
    <link rel="stylesheet" href="style.css">

    <title>Interwebs Corp</title>
</head>
<body>

    <div class="container">

        <!-- Alerta login incorreto -->
        <?php
            if(isset($_GET['login']) && $_GET['login'] == 'errorlogin'){
        ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Email</strong> ou <strong>senha</strong> incorretos!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php } ?>

        <!-- Alerta usuario não autenticado -->
        <?php
            if(isset($_GET['login']) && $_GET['login'] == 'errorauth'){
        ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Faça login</strong> antes de acessar a pagina!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php } ?>

        <!-- Formulario de login -->
        <div class="row">
            <div class="col-md-6 offset-md-3 bg-dark text-light formLogin">
                <form action="Sistema/valida_login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Entrar</button>
                </form>
            </div>
        </div>

    </div>


    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>