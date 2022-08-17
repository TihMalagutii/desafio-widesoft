<?php

session_start();
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'nao') {
        header('Location: ../../home.php');
        die();
    }
    
    include('../../system/connection.php');

    $newUrl = $_POST['newUrl'];
    $id = $_POST['id'];

    $sql_code = "UPDATE urls SET url='$newUrl', status=NULL, body=NULL, date=NULL WHERE id='$id'";
    $result = $mysqli->query($sql_code);