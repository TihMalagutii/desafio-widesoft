<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'sim'){
        die();
    }
    
    include('conexao.php');

    $sql_code = 'SELECT * FROM urls';
    $result = $mysqli->query($sql_code);
    $data = $result->fetch_all(MYSQLI_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($data);