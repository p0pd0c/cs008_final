<?php 
    include 'auth_config.php';
    // Check for a remember cookie
    // By setting its expiration to a prior date, the cookie gets removed
    $expiration_date = time() - (86400*2);
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
    header("Location: /cs008/cs008_final/");
    exit;
?>