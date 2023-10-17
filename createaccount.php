<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $userpassword = $_POST['password'];
    $userpassword = password_hash($userpassword, PASSWORD_DEFAULT);

    $host = "localhost";
    $database = "movies";
    $username = "root";
    $password = "";

    //Test Connection
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
       die("Connection error: " . mysqli_connect_error());
    } 

    $sql = "INSERT INTO user (firstname, lastname, email, password, verificationCode, status)
    VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    // Verification code generation
    $verificationcode = random_int(0, 999999);
    $verificationcode = str_pad($verificationcode, 6, 0, STR_PAD_LEFT);
    
    $status = 'inactive';

    mysqli_stmt_bind_param($stmt, "ssssis", $firstname, $lastname, $email, $userpassword, $verificationcode, $status);

    mysqli_stmt_execute($stmt);

    header("Location: Main.html");

?>