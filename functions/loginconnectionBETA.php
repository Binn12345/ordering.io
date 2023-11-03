<?php
   session_start();

   include 'dbconnection.php';
   
   $documentRoot = $_SERVER['DOCUMENT_ROOT'];
//    echo '<pre>', print_r($_GET['access_denied_error'], true) ?: 'undefined index', '</pre>';die;
   include($documentRoot . '/checker/session_checker.php');
   
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $username = $_POST['username'];
       $password = $_POST['password'];
   
       $query = "SELECT * FROM users 
                    JOIN personal_data
                        on
                        personal_data.ukey = users.idkey
                    WHERE username=? 
                    AND password=?
                    AND isActive='1'";
       $stmt = $conn->prepare($query);
       $stmt->bind_param("ss", $username, $password);
   
       if ($stmt->execute()) {
           $result = $stmt->get_result();
   
           if ($result->num_rows === 1) { 
            
            //    // Play the login success sound
            //    echo '<script>
            //         function playLoginSound() {
            //             var audio = new Audio("../path/sound/granted.mp3"); // Replace with the actual path to your sound file
            //             audio.play();
            //         }
            //         window.onload = playLoginSound;
            //     </script>';
               $user_data = $result->fetch_assoc(); // Fetch data from the result set
               $_SESSION['user_authenticated'] = true;
               $_SESSION['guest'] = 1;
               $_SESSION['userdata'] = $user_data;
   
            //    echo '<pre>', print_r($user_data, true) ?: 'undefined index', '</pre>';
   
               $transkey = password_hash('accessgranted', PASSWORD_BCRYPT);
               header("Location: ../access/?token=$transkey");
               exit;
           } else {
           
               $key = password_hash(1, PASSWORD_BCRYPT);
               header("Location: ../?access_denied+error=$key");
               exit;
           }
       }
   }


    
    

