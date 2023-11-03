<?php
    session_start();

    include 'dbconnection.php';

    $documentRoot = $_SERVER['DOCUMENT_ROOT'];
    include($documentRoot . '/checker/session_checker.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users 
                    JOIN personal_data
                        ON personal_data.ukey = users.idkey
                    WHERE username = :username
                    AND password = :password
                    AND isActive = '1'";
        $stmt = $conn->prepare($query);

        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) === 1) {
                $user_data = $result[0];
                $_SESSION['user_authenticated'] = true;
                $_SESSION['guest'] = 1;
                $_SESSION['userdata'] = $user_data;

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