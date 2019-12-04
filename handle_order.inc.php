<?php
// Keep track of data validity
    $dataIsGood = false;

    // Check if the form was submitted
    if(isset($_POST['btnOrderSubmit'])) {
        // Data is good unless it is invalid
        $dataIsGood = true;

        // Getting all of the data from the form
        $cardNumber = getData('txtCardNumber');
        $csv = getData('txtCsv');
        $txtFirstName = getData('txtFirstName');
        $txtLastName = getData('txtLastName');
        $txtAddress = getData("txtAddress");
        $txtAddress2 = getData("txtAddress2");
        $selCountry = getData("selCountry");
        $selState = getData("selState");
        $txtZip = getData("txtZip");
        
        if(isset($_POST['chkSavePaymentInfo'])) {
            
        }
        
        

        // Check if email is valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Email is bad
            $dataIsGood = false;
            
            // Show the user an alert
            print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Email is not valid... Please enter a valid email. See <a class="alert-link" href="https://isemail.info/about" target="_blank"> rules for a valid email</a>.</p>';
        }

        
    }
    // Generate Order
    if($dataIsGood) {
        $sql = 'SELECT fldPassword, fldUsername, fldUUK FROM tblUsers WHERE fldEmail = :email';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch();

        // Check that a user exists
        if($statement->rowCount() == 1) {
            if(password_verify($txtPassword, $row['fldPassword'])) {
                // Password Is Correct
                print '<p class="alert alert-success ml-auto mr-auto">Login Successful</p>';

                // User is authenticated so we can store their username in the session
                $_SESSION['fldUsername'] = $row['fldUsername'];

                if(isset($_POST['chkRememberMe'])) {
                    remember_me($row['fldUUK']);
                }
                
                if(isset($_SESSION['ENTRY_URI'])) {
                    header("Location: {$_SESSION['ENTRY_URI']}");
                    exit;
                } else {
                    header("Location: /cs008/cs008_final/");
                    exit;
                }
            } else {
                // Password Is Incorrect
                print '<p class="alert alert-warning ml-auto mr-auto">Email or password is incorrect</p>';
            }
        } else {
            // User does not exist
            print '<p class="alert alert-danger ml-auto mr-auto">User does not exist</p>';
        }        
    }
?>