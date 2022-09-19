<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');

include "include/BaseDatos.php";
include "src/functions.php";

$cnx =  getConnection();

$headers = apache_request_headers();
//echo $headers['Authorization'];

// Crear un nuevo post
// consultar 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['codigo'])) {      
        $input = $_POST;
        $sql = "SELECT scacodigo, barrio FROM barrios_bogota_rn WHERE scacodigo = ':codigo' LIMIT 1";               
        $statement = $cnx->prepare($sql);
        $statement->bindValue(':codigo', $_POST['codigo']);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode( $statement->fetchAll());
        exit();
    }elseif(isset($_POST['barrio'])) {      
        $input = $_POST;
        $sql = "SELECT scacodigo, barrio FROM barrios_bogota_rn WHERE barrio = ':barrio' LIMIT 1;";               
        $statement = $cnx->prepare($sql);
        $statement->bindValue(':barrio', $_POST['barrio']);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode( $statement->fetchAll());
        exit();
    }
}




