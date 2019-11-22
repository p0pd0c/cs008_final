<?php 
    include 'auth_config.php';

    // Get the username / constant to say bye
    $fldUsername = (isset($_SESSION['fldUsername'])) ? ', ' . $_SESSION['fldUsername'] : ' NOW';

    // Check for a remember cookie
    $expiration_date = time() - date('Z') - $remember;

    if(isset($_COOKIE['uuk'])) {
        setcookie('uuk', '', $expiration_date, '/');
    }

    // Empty session
    $_SESSION = array();

    // Check for session in cookie
    if(isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', $expiration_date, '/');
    }

    // Destroy the session
    session_destroy();
    session_write_close();

    // Send user back to home
    header("Location: /");
    exit;


?>