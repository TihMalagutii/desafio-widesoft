<?php

    include('conexao.php');

    session_start();

    $usuario_autenticado = false;

    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $result = $mysqli->query($sql_code);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row["email"] == $_POST['email'] && $row["password"] == $_POST['password']){
                $usuario_autenticado = true;
             }
          }
    } else {
        $usuario_autenticado = false;
    }

    if($usuario_autenticado) {
        $_SESSION['autenticado'] = 'sim';
        header('Location: ../home.php');
    } else {
        $_SESSION['autenticado'] = 'nao';
        header('Location: ../index.php?login=errorlogin');
    }

    $mysqli->close();

?>