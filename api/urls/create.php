<?php

    session_start();
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'nao') {
        header('Location: ../../home.php');
        die();
    }

    
    include('../../system/connection.php');

    
    if(isset($_POST['url']) && strlen($_POST['url']) > 0){
        $url = $mysqli->real_escape_string($_POST['url']);
        $sql_code = "INSERT INTO urls (url) VALUES ('$url')";
        $result = $mysqli->query($sql_code);
    }

    