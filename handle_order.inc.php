<?php
// Keep track of data validity
    $dataIsGood = false;

    // Check if the form was submitted
    if(isset($_POST['btnOrderSubmit'])) {
        // Data is good unless it is invalid
        $dataIsGood = true;

        // Getting all of the data from the form
        $txtFirstName = getData('txtFirstName');
        $txtLastName = getData('txtLastName');
        $txtEmail = getData('txtEmail');
        $txtAddress = getData('txtAddress');
        $txtAddress2 = getData('txtAddress');

        $selCountry = getData("selCountry");
        $selState = getData('selState');

        $txtZip = getData('txtZip');

        $selCard = getData('selCard');

        $txtCredit = getData('txtCredit');
        $txtFullName = getData('txtFullName');
        $txtExpiration = getData('txtExpiration');
        $txtCVV = getData('txtCVV');

        // Validate data
        
        // Validate Name
        $pregName = "/[^0-9\.\,\"\?\!\;\:\#\$\%\&\(\)\*\+\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+/";
        if(!preg_match($pregName, $txtFirstName)) {
            // User has invalid chars in name
            print '<p role="alert" class="alert alert-warning ml-auto mr-auto">First Name must be alphabetical. The only permitted symbols are accents, hyphens, and apostrophe</p>';

            $dataIsGood = false;
        } elseif(!preg_match($pregName, $txtLastName)) {
            // User has invalid chars in name
            print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Last Name must be alphabetical. The only permitted symbols are accents, hyphens, and apostrophe</p>';

            $dataIsGood = false;
        } elseif(!preg_match($pregName, $txtFullName)) {
            print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Full name must be alphabetical. The only permitted symbols are accents, hyphens, and apostrophe</p>';
            $dataIsGood = false;
        }

        // Check if email is valid
        if(!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)) {
            // Email is bad
            // Show the user an alert
            print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Email is not valid... Please enter a valid email. See <a class="alert-link" href="https://isemail.info/about" target="_blank"> rules for a valid email</a>.</p>';

            $dataIsGood = false;
        }

        // Validate Address
        $pregName = "/^[#.0-9a-zA-Z\s,-]+$/";
        if(!preg_match($pregName, $txtAddress) || !preg_match($pregName, $txtAddress2)) {
            print '<p class="alert alert-warning ml-auto mr-auto">Address may not contain special symbols</p>';
            $dataIsGood = false;
        }

        // Validate Country
        if(!isset($_POST['selCountry']) || $selCountry != "United States") {
            print '<p class="alert alert-warning ml-auto mr-auto">Please select a valid country (US)</p>';
            $dataIsGood = false;
        }

        // Validate State
        if(!isset($_POST['selState']) || $selState != "Vermont") {
            print '<p class="alert alert-warning ml-auto mr-auto">Please select a valid state (VT)</p>';
            $dataIsGood = false;
        }

        // // Validate Zip
        // $pregName = "/^[0-9]{5}(?:-[0-9]{4})?$/";
        // if(preg_match($pregName, $txtZip)) {
        //     print '<p class="alert alert-warning ml-auto mr-auto">Please enter a valid zipcode (12345 or 12345-6789)</p>';
        //     $dataIsGood = false;
        // }

        // Validate credit / debit selection
        if($selCard != 'credit' and $selCard != 'debit') {
            print '<p class="alert alert-warning ml-auto mr-auto">You must select a valid payment method (credit or debit)</p>';
            $dataIsGood = false;
        }

        // Validate creditcard
        $pregName = "/^(?:4[0-9]{12}(?:[0-9]{3})?|(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|6(?:011|5[0-9]{2})[0-9]{12}|(?:2131|1800|35\d{3})\d{11})$/";
        if(preg_match($pregName, $txtCredit)) {
            print '<p class="alert alert-warning ml-auto mr-auto">Please enter a valid card number</p>';
            $dataIsGood = false;
        }

        // Validate Expiration
       
        if(!isset($txtExpiration) || $txtExpiration == "") {
            print '<p class="alert alert-warning ml-auto mr-auto">Expiration data is invalid</p>';
            $dataIsGood = false;
        }

        // CVV validation
        $pregName = "/^[0-9]{3,4}$/";
        if(!preg_match($pregName, $txtCVV)) {
            print '<p class="alert alert-warning ml-auto mr-auto">CVV is invalid. It must be either 3 or 4 numbers</p>';
            $dataIsGood = false;
        }
    }
    // Generate Order
    if($dataIsGood) {
        try {
            $sql = 'INSERT INTO tblOrders (fldFirstName, fldLastName, fldTxtEmail, fldTxtAddress, fldCountry, fldState, fldZip, fldPaymentMethod, fldCardNumber, fldExpiration, fldCVV) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
            $statement = $pdo->prepare($sql);
            $params = [$txtFirstName, $txtLastName, $txtEmail, $txtAddress, $selCountry, $selState, $txtZip, $selCard, $txtCredit, $txtExpiration, $txtCVV];
            $statement->execute($params);
            print '<p role="alert" class="alert alert-success ml-auto mr-auto">Order Has Been Placed</p>';
            // print_r($params);
    
            // Send an email to the user
            $to = $txtEmail;
            $from = 'Byte Bakery <jared.discipio@uvm.edu>';
            $subject = 'Thank you for placing your order';
            $mailMessage = '<h1 style="font: 16pt sans-serif; color: green;">Order will be fulfilled in 1-2 Business Days</h1>';
            $mailMessage .= '<h2>Order Receipt</h2>';
            $mailMessage .= '<ul>';
            
            // Get food names
            $sql = 'SELECT fldname, fldprice FROM tblMenuItems';
            $totalPrice = 0;
            foreach($pdo->query($sql) as $row) {
                if($_POST["chk". str_replace(' ', '', $row['fldname'])]) {
                    $totalPrice += $row['fldprice'];
                    $mailMessage .= '<li>' . $row['fldname'] . '</li>';
                }
            }

            $mailMessage .= '</ul>';
            $mailMessage .= '<p>Total: $'. $totalPrice .'</p>';
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=utf-8\r\n";
            $headers .= "From: " . $from . "\r\n";
    
            $mailSent = mail($to, $subject, $mailMessage, $headers);

            if($mailSent) {
                print '<p class="alert alert-success ml-auto mr-auto">An Email Has Been Sent Detailing The Order Contents And Total</p>';
                die();
            }

        } catch (PDOException $e) {
            print '<p role="alert" class="alert alert-danger ml-auto mr-auto">Hmm... Houston we have a problem. Contact this page\'s administrator and ignore the email!</p>';
            die();
        }
        
    }
?>