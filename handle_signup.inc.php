<?php
include 'sql.php';
include 'recaptchalib.php';


// Initially false so that signup will only take place after form proper submission
$dataIsGood = false;

function getData($field) {
    if(!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }

    return $data;
}

// If the user clicked the signup button
if(isset($_POST['btnSignUpSubmit'])) {
    // data is good unless proven otherwise
    $dataIsGood = true;

    // Get data from user
    $signup_txtFirstName = getData('txtFirstName');
    $signup_txtLastName = getData('txtLastName');
    $signup_txtUsername = getData('txtUsername');
    $signup_txtEmail = getData('txtEmail');
    $signup_txtPassword = getData('txtPassword');
    $signup_txtConfirmPassword = getData('txtConfirmPassword');
    $reCaptchaResponseString = getData('g-recaptcha-response');

    // Check if the user interacted with the reCaptcha
    if($_POST['g-recaptcha-response']) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER['REMOTE_ADDR'],
            $_POST['g-recaptcha-response']
        );
        // Check the reCaptcha response for fail cases
        if($response == null || !$response->success) {
            // Either the user did not do reCaptcha or it failed
            print '<p role="alert" class="alert alert-warning ml-auto mr-auto">reCaptcha has failed... please try again and be sure to complete reCaptcha</p>';
            
            $dataIsGood = false;
        }

    } else {
        // User did not complete reCaptcha
        print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Please complete reCaptcha</p>';

        $dataIsGood = false;
    }

    // Validate Name
    $pregName = "/[^0-9\.\,\"\?\!\;\:\#\$\%\&\(\)\*\+\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+/";
    if(!preg_match($pregName, $signup_txtFirstName)) {
        // User has invalid chars in name
        print '<p role="alert" class="alert alert-warning ml-auto mr-auto">First Name must be alphabetical. The only permitted symbols are accents, hyphens, and apostrophe</p>';

        $dataIsGood = false;
    } elseif(!preg_match($pregName, $signup_txtLastName)) {
        // User has invalid chars in name
        print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Last Name must be alphabetical. The only permitted symbols are accents, hyphens, and apostrophe</p>';

        $dataIsGood = false;
    }

    // Validate Username
    $pregUsername = "/(?!.*[\.\-\_]{2,})^[a-zA-Z0-9\.\-\_]{3,24}$/";
    if(!preg_match($pregUsername, $signup_txtUsername)) {
        // Username is invalid
        print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Username must be at least 3 characters and has a maximum of 24 characters. It can only contain alphanumeric characters and some special characters: dot (.), underscore (_), and hypen (-). Special characters must not appear consecutively/ combined</p>';

        $dataIsGood = false;
    }

    // Validate Email
    // Check if email is valid
    if(!filter_var($signup_txtEmail, FILTER_VALIDATE_EMAIL)) {
        // Email is bad
        // Show the user an alert
        print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Email is not valid... Please enter a valid email. See <a class="alert-link" href="https://isemail.info/about" target="_blank"> rules for a valid email</a>.</p>';

        $dataIsGood = false;
    }

    // Validate password
    // Check if password is valid
    $pregstr = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    if(!preg_match($pregstr, $signup_txtPassword)) {
        // Password does not have a minimum of eight chars, or an uppercase letter, or a number, or a lowercase letter
        print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Password must be at least 8 characters, containing at least one uppercase and one lowercase letter, and at least one number</p>';

        $dataIsGood = false;
    } elseif(!($signup_txtPassword == $signup_txtConfirmPassword)) {
        // User gave mismatching passwords
        print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Your passwords must match</p>';

        $dataIsGood = false;
    }

    // Check if username already exists in db
    $sql = 'SELECT fldUsername FROM tblUsers WHERE fldUsername = :username';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':username', $signup_txtUsername, PDO::PARAM_STR);
    $statement->execute();
    
    if($statement->rowCount() != 0) {
        // Username is taken
        print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Username is taken... please try another</p>';

        $dataIsGood = false;
    }

    // Check if email already exists in db
    $sql = 'SELECT fldEmail FROM tblUsers WHERE fldEmail = :email';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':email', $signup_txtEmail, PDO::PARAM_STR);
    $statement->execute();

    if($statement->rowCount() == 1) {
        // Email is taken
        print '<p role="alert" class="alert alert-warning ml-auto mr-auto">Email is already being used on another account. Please use a unique email.</p>';

        $dataIsGood = false;
    } 
}

// If user entered information correctly... sign them up
if($dataIsGood) {
    // Password is valid (waiting till now for other validations so that spam is adverted), hash it
    $signup_hashedPassword = password_hash($signup_txtPassword, PASSWORD_BCRYPT);
    // Build UUK with username, password, and a random integer
    $uuk = md5($signup_txtUsername . $signup_txtPassword . rand());
    // Try and add the user to the db
    try {
        $sql = 'INSERT INTO tblUsers (fldUsername, fldEmail, fldPassword, fldFirstName, fldLastName, fldUUK) VALUES (?,?,?,?,?,?)';
        $statement = $pdo->prepare($sql);
        $params = [$signup_txtUsername, $signup_txtEmail, $signup_hashedPassword, $signup_txtFirstName, $signup_txtLastName, $uuk];
        $statement->execute($params);
        print '<p role="alert" class="alert alert-success ml-auto mr-auto">Your account has been created successfully. <a class="alert-link" href="login.php">Please Log in</a></p>';

        // Put the username into a session variable
        $_SESSION['fldUsername'] = $signup_txtUsername;

        // Check for remember me
        if(isset($_POST['chkRememberMe'])) {
            remember_me($uuk);
        }

        // Send an email to the user
        $to = $signup_txtEmail;
        $from = 'Byte Bakery <jared.discipio@uvm.edu>';
        $subject = 'Thank you for registering your Byte Bakery Account';
        $mailMessage = '<h1 style="font: 16pt sans-serif; color: green;">Thank you for signing up</h1>';
        $mailMessage .= '<p style="font: 12pt sans-serif color: red;">Your account has been created and you can now <a href="https://jdiscipi.w3.uvm.edu/cs008/cs008_final/login.php">sign in</a> with your email and password</p>';
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: " . $from . "\r\n";

        $mailSent = mail($to, $subject, $mailMessage, $headers);
        
        // Let user know that their account has been created successfully
        print '<section class="alert alert-success ml-auto mr-auto" role="alert">';
        print '<h1 class="alert-heading">Information recieved!</h4>';
        print '<p>You have successfully created a bytebakery account with the username ' . $signup_txtUsername . '</p>';
        // If mailing fails... either the user gave an invalid email, or the mail server is having issues
        if($mailSent) {
            print '<hr>';
            print '<p class="mb-0">Check your email for a little message from bytebakery</p>';
        }
        print '</section>';
        if(!$mailSent) {
            print '<p class="alert alert-danger ml-auto mr-auto">Notification email failed to send... did you give an invalid email address? Try logging in, for it is possible our mail servers are down. If you cannont log in... you must make a new account!</p>';
        }
        
        die();

    } catch (PDOException $e) {
        print '<p role="alert" class="alert alert-danger ml-auto mr-auto">Hmm... Houston we have a problem. Contact this page\'s administrator and ignore the email!</p>';
        die();
    }
}

?>