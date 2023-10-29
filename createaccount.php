<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $userpassword = $_POST['password'];
    $userpassword = password_hash($userpassword, PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $paymentcard = $_POST['paymentcard'];
    $promostatus = $_POST['promostatus'];

    $host = "localhost";
    $database = "movies";
    $username = "root";
    $password = "";

    //Test Connection
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
       die("Connection error: " . mysqli_connect_error());
    } 

    $sql = "INSERT INTO user (firstname, lastname, email, password, verificationCode, status, address, promoStatus)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    // Verification code generation
    $verificationcode = random_int(0, 999999);
    $verificationcode = str_pad($verificationcode, 6, 0, STR_PAD_LEFT);
    
    $status = 'inactive';

    mysqli_stmt_bind_param($stmt, "ssssisss", $firstname, $lastname, $email, $userpassword, $verificationcode, $status, $address, $promostatus);

    mysqli_stmt_execute($stmt);

    if ($paymentcard != "") {
        $idsql = "SELECT `userid` FROM `user` WHERE `email` LIKE '$email'";
        $idresult = mysqli_query($conn, $idsql);
        $idcheck = mysqli_fetch_assoc($idresult);
        $id = $idcheck['userid'];
        $cardsql = "INSERT INTO cards (userId, cardNumber, type)
        VALUES (?, ?, ?)";
        $type = "debit";
        $paymentcard = password_hash($userpassword, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($conn, $cardsql);
        mysqli_stmt_bind_param($stmt, "iss", $id, $paymentcard, $type);
        mysqli_stmt_execute($stmt);
    }

    header("Location: Main.php");

?>