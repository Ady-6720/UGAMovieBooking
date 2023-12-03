<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Include Bootstrap CSS -->
    <link rel="icon" href="https://i.ibb.co/jy62Srz/36a17f9402f64b66ba11ad785ec9ff3e.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,700;1,300;1,900&family=Lilita+One&display=swap" rel="stylesheet">
    <style>
        
        .navbar {
            background-color: #F4893D;
        }
        .navbar-brand {
            font-family: 'fantasy';
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .signup-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
        }

        i img {
            width: 25px; /* Adjust the width and height as needed */
            height: 25px;
        }

        /* Custom style for the signup button */
        .custom-signup-button {
            background-color: #F4893D; /* Set button color to #F4893D */
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 350px;
        }

        .custom-signup-button:hover {
            background-color: #FFA653; /* Change button color on hover */
        }

        .navbar {
            position: sticky;
            top: 0;
            background-color: #F4893D;
            z-index: 1000;
        }

        .navbar-brand {
            font-family: 'fantasy';
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
        }

        i img {
            width: 25px; /* Adjust the width and height as needed */
            height: 25px;
        }

        /* Custom style for the login button */
        .custom-login-button {
            background-color: #F4893D; /* Set button color to #F4893D */
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 350px;
        }

        .custom-login-button:hover {
            background-color: #FFA653; /* Change button color on hover */
        }

        .orderbox {
            display: grid;
            width: 1000px;
            height: 700px;
            background-color: #F4893D;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10px;
            margin-top: 100px;
            grid-template-columns: 1fr 1fr;
            text-align: center;
            align-items: center;
            justify-content: center;
            padding: 50px;
        }

        .orderdetails {
            padding-top: 20px;
            background-color: white;
            height: 500px;
            width: 400px;
            margin-bottom: 300px;
            border-radius: 10px;
        }

        .orderbox p {
            font-size: 14pt;
        }

        .paymentmethodsgrid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-left: 15px;
        }
        
        .paymentmethod {
            width: 200px;
            height: 110px;
            background-color: white;
            margin-top: 30px;
            border-radius: 10px;
            text-align: center;
        }

        .paymentmethod p {
            font-size: 14pt;
            margin-top: 40px;
        }

        input[type=text] {
            width: 420px;
            box-sizing: border-box;
            border-radius: 10px;
        }

        .rightbox {
            display: grid;
            grid-template-rows: 1fr 1fr 1fr;
            justify-content: center;
        }

        .rightbox label {
            padding: 20px;
        }

        .confirmcancelbuttons{
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-left: 50px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .btn {
            padding: 6px 12px;
            font-size: 12px;
            background-color: #0078d4;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #005cbf;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
        <a class="navbar-brand active" style="color:white; font-family: 'Lato', sans-serif; font-family: 'Lilita One', cursive;" href="Main.php">
            <i><img src="https://i.ibb.co/jy62Srz/36a17f9402f64b66ba11ad785ec9ff3e.png"></i> UGAMovieFinder
        </a>
		      <a class="nav navbar-nav navbar-left" href="Cart.php" style="text-decoration:none; margin-right: 2400px; margin-top: 5px">
          <i class="fa fa-shopping-cart" style="color:white"></i></a>
        
        </div>
        <div class="nav navbar-nav navbar-right">
                <a href="EditProfilePanel.php" class="btn navbar-btn btn-light" style="text-decoration:none; margin-right: 20px; width: 85px">Edit Profile</a>
            </div>
            <div class="nav navbar-nav navbar-right" style="margin-right: 20px">
                <a href="logout.php" class="btn navbar-btn btn-light" style="text-decoration:none;">Logout</a>
            </div>
        </div>
    </nav>

    <?php
        date_default_timezone_set('America/New_York');
        $currentDate = date('m-d-y h:i');
        
        $cart = $_SESSION['cart'];
        $total = $_SESSION['total'];
        $email = $_SESSION['email'];
        $tax = $total * 0.07;

        if (isset($_SESSION['promotion'])) {
            $total = $total + $tax - $_SESSION['promotion'];
        } else {
            $total = $total + $tax;
        }

        $host = "localhost";
        $database = "movies";
        $username = "root";
        $password = "";
                        
        //Test Connection
        $conn = mysqli_connect($host, $username, $password, $database);
        if (mysqli_connect_errno()) {
            die("Connection error: " . mysqli_connect_error());
        } 

        $idsql = "SELECT `userid` FROM `user` WHERE `email` LIKE '$email'";
        $idresult = mysqli_query($conn, $idsql);
        $idcheck = mysqli_fetch_assoc($idresult);
        $id = $idcheck['userid'];

        
        $cart .= "Total = $$total
";

        if (isset($_SESSION['promotion'])) {
            $cart .= "Using a promotion, you saved $";
            $cart .=  $_SESSION['promotion'];
            $cart .= "
";
        }

        $cart.= "Order placed on $currentDate.
        ";



        $bookingsql = "INSERT INTO userbookings (userId, booking)
        VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $bookingsql);
        mysqli_stmt_bind_param($stmt, "is", $id, $cart);
        mysqli_stmt_execute($stmt);

        $subject = 'Order confirmation';
        $header = 'From: ugacinemaebooking@gmail.com';

        mail($email, $subject, $cart, $header);

        unset($_SESSION['cart']);
        unset($_SESSION['total']);
        unset($_SESSION['tax']);
        unset($_SESSION['promotion']);
        ?>
        <div>
            <p style="text-align: center; font-size: 24px; margin-top: 50px;">Your order has been successfully processed!</p>
            <p style="text-align: center; font-size: 16px; margin-top: 25px;">Check your email for a copy of your order.</p>
        </div>
</body>
</html>