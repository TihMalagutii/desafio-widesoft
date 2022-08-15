<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'sim'){
        die();
    }
    
    include('../../system/connection.php');

    $url = $_POST['url'];

    $sql_code = "INSERT INTO urls (url) VALUES ('$url')";
    $result = $mysqli->query($sql_code);