<?php
    include 'sql.php';

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