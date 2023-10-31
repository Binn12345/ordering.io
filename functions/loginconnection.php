<?php
    session_start();
    include 'dbconnection.php';
    // echo '<pre>', print_r($_POST, true) ?: 'undefined index', '</pre>';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        
        if ($stmt->execute() && $stmt->get_result()->num_rows === 1) {
            $_SESSION['user_authenticated'] = true;
            $_SESSION['data'] = array($username,$password);
            // $var['temp'] = user_details($username, $password);
            $transkey = password_hash('accessgranted', PASSWORD_BCRYPT);
            header("Location: ../access/?token='.$transkey.'");
            exit;
        } else {
            $key = password_hash(1, PASSWORD_BCRYPT);

            header("Location: ../?access_denied+error='.$key.'");
            exit;
        }
    }
    

