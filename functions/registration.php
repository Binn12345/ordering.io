<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include 'dbconnectionBETA.php';
    require '../PHPMailer/PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/PHPMailer/src/SMTP.php';
    require '../PHPMailer/PHPMailer/src/Exception.php';
    
    
    // echo '<pre>', print_r(get_defined_vars(), true) ?: 'undefined index', '</pre>';die;

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // echo '<pre>', print_r(get_defined_vars(), true) ?: 'undefined index', '</pre>';die;

        // Function to sanitize user input
        function sanitizeInput($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }

        // Assuming you have received user input, e.g., from a form
        $userInputName = sanitizeInput($_POST['rfname']);
        $userInputUsername = sanitizeInput($_POST['rusername']);
        $userInputEmail = sanitizeInput($_POST['remail']);
        $userInputPassword = sanitizeInput($_POST['rpassword']);
        $isTerm = isset($_POST['terms']) ?: "0";

        $constid = 4;
        // Generate a unique ID
        // $uniqueID = uniqid(); // Generate a unique ID
        // $uniqueID = substr($uniqueID, 0, 2); // Extract the first two characters
        // $uniqueID = '00' . intval(md5(uniqid(mt_rand(), true))); // Prepend "00" to the extracted characters

        $uniqueID = uniqid();
        // Get the current year
        $currentYear = date("Y");

        // Create a combined ID (year + uniqueID )
        $combinedID = (int) $currentYear . $uniqueID;
        $combinedID = intval($combinedID);  
        $isActive = '1';
 

        // Prepare and bind the statement
        $stmt = $conn->prepare("INSERT INTO users (idkey,fullname,username,email,password,userkey) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss",$combinedID,$userInputName,$userInputUsername,$userInputEmail,$userInputPassword,$constid);

        $stmt2 = $conn->prepare("INSERT INTO personal_data (ukey,isActive,isTerm) VALUES (?,?,?)");
        $stmt2->bind_param("sss",$combinedID,$isActive,$isTerm);
    
        if ($stmt->execute() && $stmt2->execute()) {
            $to = $userInputEmail;
            $passwordsss = 'TEPTEPLANGMALAKAS';
            $subject = "Account Created Successfully";
            $message = "Your account has been created successfully.";
    
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                // $mail->Username = 'your_gmail_username@gmail.com'; // Your Gmail username
                $mail->Username = $userInputEmail; // Your Gmail username
                $mail->Password = $passwordsss; // Your Gmail password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
    
                //Recipient
                $mail->setFrom($userInputEmail, 'TEPTEP'); // Replace with your name
                $mail->addAddress($to);
    
                //Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;

                //  // Enable debugging to see the SMTP conversation
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
                $mail->send();
                // echo '<pre>', print_r($mail, true) ?: 'undefined index', '</pre>';die;
                echo "Data inserted successfully, and an email notification has been sent to your Gmail account.";
            } catch (Exception $e) {
                echo "Data inserted successfully, but there was an error sending the email: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and the database connection
        $stmt->close();
        $stmt2->close();
        $conn->close();
    }


