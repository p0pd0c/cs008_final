<?php 
    include 'auth_config.php';

    if($uid = access_control(TRUE)) {
        print "Welcome $uid to byte bakery";
    } else {
        print 'Hello friend, I do not think I have seen you round these parts before';
        print 'You must have an account to access this page';
        print 'You can either <a href="login.php">Log In</a> or if you do not have an account, you can <a href="signup.php>Sign Up</a>';

    }
?>