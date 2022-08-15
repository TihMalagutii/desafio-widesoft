<?php
    
    require '../vendor/autoload.php';
    include('connection.php');
    date_default_timezone_set('America/Sao_Paulo');

    $sql_code = 'SELECT id, url FROM urls WHERE status IS NULL';
    $result = $mysqli->query($sql_code);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $client = new \GuzzleHttp\Client();

    foreach($rows as $row){
        try{
            $response = $client->request('GET', $row['url'], ['allow_redirects' => false]);
            $status = $response->getStatusCode();
            $body = $mysqli->real_escape_string((string) $response->getBody());
            $body = substr($body, 0, 65534);
            $date = date('d/m/Y H:i:s');
            $sql_code = "UPDATE urls SET status = '$status', body = '$body', date = '$date' WHERE id = '{$row['id']}'";
            $mysqli->query($sql_code);
        } catch (Exception $e) {}
    }