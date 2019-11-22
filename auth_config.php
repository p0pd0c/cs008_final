<?php 
    include 'sql.php';

    // For debugging REMEMBER TO DISABLE BEFORE TURNING IN PROJECT
    error_reporting(E_ALL);

    // Timezone for cookie expirations
    date_default_timezone_set('America/New_York');

    // Start session to get access to session variables
    session_start();

    // This function checks the session variables to see if the user is currently logged in/ or if we are making a test request for testing purposes
    function access_control($test = false) {
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

        // If we get to this point, we are sure that this is not a test request and the user is not logged in so we need to direct them to the login page
        header('Location: login.php');
    }

    // This is for our remember me functionality... This creates a cookie with a particular date and the a unique user key (uuk)
    function remember_me($uuk) {
        // The number of seconds we should remember the login for (currently 1 day)
        $remember = 86400; 

        $name_of_cookie = 'uuk';
        $value_of_cookie = $uuk;

        // The expiration date should be $remember seconds from the current date
        $expiration_date = time() + date('Z') + $remember;

        $path_for_cookie = '/';
        $domain_for_cookie = NULL;
        $is_secure_cookie = FALSE;
        // Our cookie should be hidden from js
        $http_cookie = TRUE;

        // Time to set the cookie (all we really did here was get the date of expiration and we are embeding the user's unique user key)
        setcookie($name_of_cookie, $value_of_cookie, $expiration_date, $path_for_cookie, $domain_for_cookie, $is_secure_cookie, $http_cookie);
    }

    // Now we should deal with extending the expiration of the remember cookie if the user is logged in
    // Check if the user is logged in by looking at the session variables
    if(!isset($_SESSION['fldUsername'])) {
        // Check if user's cookie is set due to them using remember me when loggin in
        if(isset($_COOKIE['uuk'])) {
            $uuk = htmlentities($_COOKIE['uuk']);
            $sql = 'SELECT fldUsername FROM tblUsers WHERE uuk = :uuk';
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':uuk', $uuk, PDO::PARAM_STR);
            $statement->execute();
            
            if($statment->rowCount() == 1) {
                $row = $statement->fetch();
                $_SESSION['fldUsername'] = $row['fldUsername'];

                // This is the part where we call the cookie maker to extend the expiration
                remember_me($uuk);
            }
        }
    }


?>