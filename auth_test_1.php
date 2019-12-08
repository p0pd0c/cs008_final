<?php 
    session_start();
    include 'auth_config.php';

    $uid = access_control(FALSE, $pdo);
    print "Hello $uid, you are currently logged in";
?>