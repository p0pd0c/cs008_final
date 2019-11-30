<?php 
    // Start session to get access to session variables
    session_start();

    include 'sql.php';

    // This function checks the session variables to see if the user is currently logged in/ or if we are making a test request for testing purposes
    function access_control($test = FALSE) {
        // Keep track of where the user came from
        $_SESSION['ENTRY_URI'] = $_SERVER['REQUEST_URI'];

        // Check if the uid is set... it it is, then the user is currently logged in
        if(isset($_SESSION['fldUsername'])) {
            return $_SESSION['fldUsername'];
        } 

        // Test requests can be made, check if the request is a test
        if($test) {
            return FALSE;
        }

        
        // Now we should deal with extending the expiration of the remember cookie if the user is logged in
        // Check if the user is logged in by looking at the session variables
        if(!isset($_SESSION['fldUsername'])) {
            
            // Check if user's cookie is set due to them using remember me when logging in
            if(isset($_COOKIE['uuk'])) {
                $uuk = htmlspecialchars($_COOKIE['uuk']);
                $sql = 'SELECT fldUsername FROM tblUsers WHERE uuk = :uuk';
                $statement = $pdo->prepare($sql);
                $statement->bindParam(':uuk', $uuk, PDO::PARAM_STR);
                $statement->execute();
                
                if($statement->rowCount() == 1) {
                    $row = $statement->fetch();
                    $_SESSION['fldUsername'] = $row['fldUsername'];

                    // This is the part where we call the cookie maker to extend the expiration
                    remember_me($uuk);

                    return $_SESSION['fldUsername'];
                }
            }
        }
        //

        // If we get to this point, we are sure that this is not a test request and the user is not logged in so we need to direct them to the login page
        // The header function allows a browser redirect
        header('Location: login.php');
        exit;
    }

    // This is for our remember me functionality... This creates a cookie with a particular date and the unique user key (uuk)
    function remember_me($uuk) {
        $cookie_name = 'uuk';
        $cookie_value = $uuk;

        // Create a cookie with the name uuk and the value of uuk, set it to expire after 2 days (86400 seconds * 2)
        setcookie($cookie_name, $cookie_value, time() + (86400*2), '/');
    }
?>