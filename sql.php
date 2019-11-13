<?php
    $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
    $path_parts = pathinfo($phpSelf);
    
    $databaseName = 'JDISCIPI_cs008-final';
    $dsn = 'mysql:host=webdb.uvm.edu;dbname='.$databaseName;
    $dbUserName = 'jdiscipi_writer';
    $dbPassword ='IdqAW776vZv0bUk8';
    
    $pdo = new PDO($dsn, $dbUserName, $dbPassword);
?>