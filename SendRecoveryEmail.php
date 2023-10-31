<?php
    $email = $_POST['email'];

    $host = "localhost";
    $database = "movies";
    $username = "root";
    $password = "";
    
    // Test Connection
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    } 

    $string = rand();
    $temporarypassword = md5($string);
    $sql = "UPDATE user SET password = '$temporarypassword' WHERE email = '$email'";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_execute($stmt);

    $subject = 'Password recovery';
    $message = 'Your temporary password is: ';
    $message .= $temporarypassword;
    $header = 'From: ugacinemaebooking@gmail.com';

    mail($email, $subject, $message, $header);

    $temporarypassword = password_hash($temporarypassword, PASSWORD_DEFAULT);
    $sql = "UPDATE user SET password = '$temporarypassword' WHERE email = '$email'";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_execute($stmt);

    header("Location: Login.html");

?>