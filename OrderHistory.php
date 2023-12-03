<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MovieTickets!</title>
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
        .container {
    max-width: 1200px; /* Increase the max-width for a wider container */
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}


        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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

        .center {
            position: justify-center;
            margin: auto;
        }

        .form-control {
            width: 500px;
        }

        i img {
            width: 25px;
            height: 25px;
        }

        #myCarousel {
            margin-top: 20px;
        }

        .movie-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin: 5px;
            padding: 5px;
            text-align: center;
            max-width: 200px;
        }

        .movie-image {
            max-width: 100%;
            height: auto;
        }

        .movie-title {
            font-size: 14px;
            margin: 8px 0;
        }

        .movie-rating {
            font-size: 12px;
            margin-bottom: 8px;
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

        .movie-add-container {
            background-color: #F7F7F7;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin: 10px;
            padding: 15px;
        }
        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand active" style="color:white; font-family: 'Lato', sans-serif; font-family: 'Lilita One', cursive;" href="Main.php">
            <i><img src="https://i.ibb.co/jy62Srz/36a17f9402f64b66ba11ad785ec9ff3e.png"></i> UGAMovieFinder
        </a>
		      <a class="nav-link" href="Cart.php" style="text-decoration:none; margin-right: 50px; margin-top: 5px">
          <i class="fa fa-shopping-cart" style="color:white"></i></a>
        
        <div class="collapse navbar-collapse" id="navbarScroll">
        </div>
        <div class="nav navbar-nav navbar-right">
                <a href="EditProfilePanel.php" class="btn navbar-btn btn-light" style="text-decoration:none; margin-right: 20px">Edit Profile</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a href="logout.php" class="btn navbar-btn btn-light" style="text-decoration:none;">Logout</a>
            </div>
    </div>
</nav>
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

    $idsql = "SELECT `userid` FROM `user` WHERE `email` LIKE '$email'";
    $idresult = mysqli_query($conn, $idsql);
    $idcheck = mysqli_fetch_assoc($idresult);
    $id = $idcheck['userid'];

    $bookingsql = "SELECT booking from userbookings WHERE userId = '$id'";
    $result = mysqli_query($conn, $bookingsql);
    
    if ($result && mysqli_num_rows($result) > 0) {
    ?>

<div class="container signup-container" style="text-align: center;">
<h1>Order History</h1>
<div class="card">
<div class="card-body">
        <?php
        while ($order = mysqli_fetch_assoc($result)) {
            ?>
            <p><?= $order['booking']; ?></p>
            <?php
        }
        ?>
</div>
</div>
</div>
<?php
    } else {
    ?>
        <div>
            <p style="text-align: center; font-size: 24px; margin-top: 50px;">You have not made any purchases.</p>
        </div>  
    <?php
    }
    ?>
    </body>
</html>