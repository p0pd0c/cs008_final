<?php 
    include 'auth_config.php';

    $uid = access_control();
    print "Hello $uid, you are currently logged in";
?>