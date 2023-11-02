<?php



    // // Check if the user is authenticated
    // if (isset($_SESSION['user_authenticated']) || $_SESSION['user_authenticated'] === true) {
    //     // User is not authenticated; redirect to the login page
    //     header('Location: ../');
    //     exit;
    // }
    
     // Check if the user is already authenticated
    if(isset($_SESSION['user_authenticated']) && $_SESSION['user_authenticated'] === true) {
        // Redirect the user to the access page or any other page
        $transkey = password_hash('accessgranted', PASSWORD_BCRYPT);
        header("Location: ../access/?token='.$transkey.'");
        exit;
    }

    // Extend the session timeout (adjust as needed)
    // $inactiveTimeout = 600; // 10 minutes
    // $inactiveTimeout = 300000000;
    // if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactiveTimeout) {
    //     session_unset();
    //     session_destroy();
    //     header("Location: /.."); // Redirect to the login page
    //     exit();
    // }

    // // // Update the last activity timestamp
    // $_SESSION['last_activity'] = time();

    
    