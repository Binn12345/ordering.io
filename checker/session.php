<?php

// echo '<pre>', print_r($_SESSION, true) ?: 'undefined index', '</pre>';die;
    // Check if the user is logged in (you can adjust this condition)
    if (!isset($_SESSION['user_authenticated'])) {
        header("Location: /.."); // Redirect to the login page
        exit();
    }

    // Extend the session timeout (adjust as needed)
    $inactiveTimeout = 300000; // 10 minutes

    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactiveTimeout) {
        session_unset();
        session_destroy();
        header("Location: /.."); // Redirect to the login page
        exit();
    }

    // Update the last activity timestamp
    $_SESSION['last_activity'] = time();

