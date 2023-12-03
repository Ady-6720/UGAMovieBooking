<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Name</title>

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
		      <a href="Cart.php" style="text-decoration:none; margin-right: 2400px; margin-top: 5px">
          <i class="fa fa-shopping-cart" style="color:white"></i></a>
        </div>
        
        </div>
        <div class="nav navbar-nav navbar-right">
                <a href="EditProfilePanel.php" class="btn navbar-btn btn-light" style="text-decoration:none; margin-right: 20px; width: 85px">Edit Profile</a>
            </div>
            <div class="nav navbar-nav navbar-right" style="margin-right: 20px">
                <a href="logout.php" class="btn navbar-btn btn-light" style="text-decoration:none;">Logout</a>
            </div>
        </div>
    </nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Edit Name</h1>
            <form action="UpdateName.php" method="post">
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <?php
                    $email = $_SESSION['email'];

                    $host = "localhost";
                    $database = "movies";
                    $username = "root";
                    $password = "";
                
                    //Test Connection
                    $conn = mysqli_connect($host, $username, $password, $database);
                    if (mysqli_connect_errno()) {
                        die("Connection error: " . mysqli_connect_error());
                    } 
                
                    $firstsql = "SELECT firstname FROM user WHERE email = '$email'";
                    $firstresult = mysqli_query($conn, $firstsql);
                    $firstrow = mysqli_fetch_array($firstresult);
                    $firstname = $firstrow['firstname'];
                    $lastsql = "SELECT lastname FROM user WHERE email = '$email'";
                    $lastresult = mysqli_query($conn, $lastsql);
                    $lastrow = mysqli_fetch_array($lastresult);
                    $lastname = $lastrow['lastname'];
                    ?>
                    <input type="text" class="form-control" id="firstName" name="firstname" placeholder="Your first name..." required value='<?php echo $firstname; ?>'>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Your last name..." required value='<?php echo $lastname; ?>'>
                </div>
                <button type="submit" class="btn btn-primary">Update Name</button>
            </form>
        </div>
    </div>
</div>
