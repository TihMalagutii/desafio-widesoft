<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'sim'){
        die();
    }
    
    include('../../system/connection.php');

    $id = $_POST['id'];

    $sql_code = "DELETE FROM urls WHERE urls.id = $id";
    $result = $mysqli->query($sql_code);