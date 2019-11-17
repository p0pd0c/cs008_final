<?php
    $databaseName = 'JDISCIPI_cs008-final';
    $dsn = 'mysql:host=webdb.uvm.edu;dbname='.$databaseName;
    $dbUserName = 'jdiscipi_writer';
    $dbPassword ='IdqAW776vZv0bUk8';

    try {
        $pdo = new PDO($dsn, $dbUserName, $dbPassword);
    } catch (PDOException $e) {
        die('Error: Could not connect for some reason. ' . $e->getMessage());
    }
    
?>