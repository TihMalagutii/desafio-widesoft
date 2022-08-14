<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'sim'){
        die();
    }
    
    include('conexao.php');

    $url = $_POST['url'];

    $sql_code = "INSERT INTO urls (url, status) VALUES ('$url', '200')";
    $result = $mysqli->query($sql_code);