<?php session_start(); ?>
<?php
    $code = $_POST['code'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $discount = $_POST['discount'];
    $description = $_POST['description'];
    
    $host = "localhost";
    $database = "movies";
    $username = "root";
    $password = "";

    //Test Connection
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO promotions (code, startDate, endDate, discount)
    VALUES (?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sssd", $code, $startdate, $enddate, $discount);

    mysqli_stmt_execute($stmt);
    
    $promosql = "SELECT email FROM user WHERE promoStatus = 'Yes'";
    $result = mysqli_query($conn, $promosql);

    $subject = 'New promotion';
    $message = 'A new promotion code has been added to the Cinema E-booking System!
    
    Promo code: ';
    $message .= $code;
    $message .= "
    
    Promo code description: ";
    $message .= $description;
    $header = 'From: ugacinemaebooking@gmail.com';


    while ($row = mysqli_fetch_assoc($result)) {
        mail($row['email'], $subject, $message, $header);
    }

    header("Location: AdminControlPanel.php");