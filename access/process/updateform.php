<?php
    session_start();
   include '../../functions/dbconnection.php';
//    echo '<pre>', print_r(get_defined_vars(), true) ?: 'undefined index', '</pre>';die;
//    echo '<pre>', print_r($_SESSION['userdata']['ukey'], true) ?: 'undefined index', '</pre>';die;
//   echo '<pre>' ,var_dump(get_defined_vars(),$_POST);die;
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the form
    $user_id = $_SESSION['userdata']['ukey'];
    $isAgree= $_POST['isAgree'] ?? 0;
    // $username = $_POST['username'];
    // $email = $_POST['email'];

    // Update the user data in the database
    $query = "UPDATE personal_data SET isTerm = ? WHERE ukey = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$isAgree,$user_id]);

    if ($stmt->rowCount() > 0) {
        // Data updated successfully
        header("Location: ../");
        // echo "User data updated successfully.";
    } else {
        // An error occurred
        echo "Failed to update user data.";
    }
}


    