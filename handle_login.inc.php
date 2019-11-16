<?php
    include 'sql.php';
    include 'recaptchalib.php';

    /* Example sql to get stuff 
        $sql = 'SELECT ......';
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll();
    */
    /* Example sql to send stuff and email
        if($dataIsGood) {
            try {
                $sql = 'INSERT INTO tblGleaningData (fldEmail, fldFirstName, fldLastName, fldMonday, fldWednesday, fldFriday, fldTime, fldJob, fldComment) VALUES (?,?,?,?,?,?,?,?,?)';
                $statement = $pdo->prepare($sql);
                $params = [$email, $first_name, $last_name, $monday, $wednesday, $friday, $time, $job, $comment];
                $statement->execute($params);
                print '<p>Data has been assimilated, you are next!</p>';
            } catch (PDOException $e) {
                print '<p>Hmm... Houston we have a problem. Contact this page\'s administrator and ignore the email!</p>';
            }
        }
                }

                if ($dataIsGood) {
                    $to = $email;
                    $from = 'CS008A Student <jared.discipio@uvm.edu>';
                    $subject = 'CS008A Lab 8 Record Email';
                    $mailMessage = '<p style="font: 16pt serif; color: green;">Thank you... your data has been added to Big Brothers Little Black Book</p>';
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=utf-8\r\n";
                    $headers .= "From: " . $from . "\r\n";

                    $mailedSent = mail($to, $subject, $mailMessage, $headers);

                    if($mailedSent) {
                        print 'Mail sent successfully';
                    }
                    print '<h2 class="content-heading"> Thank you, your information has been recieved.</h2>';

                    die();
                }
    */
    
    // Get and sanitize data from a field
    function getData($field) {
        if(!isset($_POST['btnSubmit'])) {
            $data = "";
        } else {
            $data = trim($_POST($field));
            $data = htmlspecialchars($data);
        }

        return $data;
    }

    // Keep track of data validity
    $dataIsGood = false;

    // Check if the form was submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Getting all of the data from the form
        $email = getData('txtEmail');
        $txtPassword = getData('txtPassword');
        $reCaptchaResponseString = getData('g-recaptcha-response');


        // Hash the user's inputted password 
        $hashedPassword = hash('sha256', $txtPassword);


        // Check if email is valid
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Email is good
        } else {
            // Email is bad
            $dataIsGood = false;
            
            // Show the user an alert
            print '<p class="alert alert-warning ml-auto mr-auto">Email is not valid... Please enter a valid email. See <a class="alert-link" href="https://isemail.info/about" target="_blank">rules for a valid email</a>.</p>';
        }

        // Check if the user interacted with the reCaptcha
        if($_POST['g-recaptcha-response']) {
            $response = $reCaptcha->verifyResponse(
                $_SERVER['REMOTE_ADDR'],
                $_POST['g-recaptcha-response']
            );

            if($response == null || !$response->success) {
                // Either the user did not do reCaptcha or it failed
                print '<p class="alert alert-warning ml-auto mr-auto">reCaptcha has failed... please try again and be sure to complete reCaptcha</p>';
                
                $dataIsGood = false;
            }

        } else {
            // User did not complete reCaptcha
            print '<p class="alert alert-warning ml-auto mr-auto">Please complete reCaptcha</p>';

            $dataIsGood = false;
        }
    }
?>
    