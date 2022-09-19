<?php
include_once 'Config.php';

function getConnection() {
    try {
        $cnx = new PDO("mysql:host=". DB_HOST . ";dbname=" . DB_NAME, 
                    DB_USERNAME, DB_PASSWORD);
        // set the PDO error mode to exception
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $cnx;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
?>