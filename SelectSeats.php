<?php session_start(); ?>
<?php
    $showroom = $_POST['showroom'];
    $showtime = $_POST['showtime'];
    $childtickets = $_POST['childtickets'];
    $adulttickets = $_POST['adulttickets'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Seats</title>

    <!-- Add Bootstrap CSS and JS CDN links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        input[type="checkbox"] {
            zoom: 3;
            margin-right: 5px;
            outline: 1px solid orange;
        }

        input[type="checkbox"]:disabled {
            zoom: 3;
            margin-right: 5px;
            outline: 1px solid red;
        }

        .seat {
            display: inline-block;
        }

        .seat-container {
            max-width: 450px;
            margin: 0 auto;
            margin-top: 50px;
            text-align: center;
            justify-content: center;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
        <a class="navbar-brand active" style="color:white; font-family: 'Lato', sans-serif; font-family: 'Lilita One', cursive;" href="Main.php">
            <i><img src="https://i.ibb.co/jy62Srz/36a17f9402f64b66ba11ad785ec9ff3e.png"></i> UGAMovieFinder
        </a>
		      <a class="nav navbar-nav navbar-left" href="Cart.php" style="text-decoration:none; margin-right: 50px; margin-top: 5px">
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

<form action="UpdateSeats.php" method="post">
        <?php
            $host = "localhost";
            $database = "movies";
            $username = "root";
            $password = "";
        
            //Test Connection
            $conn = mysqli_connect($host, $username, $password, $database);
            if (mysqli_connect_errno()) {
                die("Connection error: " . mysqli_connect_error());
            }
            ?>
        <div class="seat-container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Choose Seats</h5>
                        <div class="seat" style="margin-top: 30px; margin-left: 5px;">
                            <?php
                            for ($i = 1; $i <= 20; $i++) {
                                $seatColumn = "seat" . $i;    
                                $sql = "SELECT $seatColumn FROM movieshow WHERE showroomId = '$showroom' AND CONCAT(date, ' ', time) = '$showtime'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);
                                $seatStatus = $row[$seatColumn];

                                if (strcmp($seatStatus, '0') == 0) {
                                    ?>
                                    <div>
                                        <input type="checkbox" name="<?= $seatColumn ?>">
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div>
                                        <input type="checkbox" name="<?= $seatColumn ?>" disabled>
                                    </div>
                                    <?php
                                }
        
                                if ($i % 5 === 0 && $i !== 20) {
                                    ?>
                                    </div>
                                    <div class="seat">
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    <div>
                        <small class="form-text text-muted">Showroom <?= $showroom ?> <?= $showtime ?></small>
                        <input type="hidden" id="showroom" name="showroom" value="<?= $showroom ?>">
                        <input type="hidden" id="showtime" name="showtime" value="<?= $showtime ?>">
                        <input type="hidden" id="childtickets" name="childtickets" value="<?= $childtickets ?>">
                        <input type="hidden" id="adulttickets" name="adulttickets" value="<?= $adulttickets ?>">
                    </div> 
                    <div>
                        <small class="form-text text-muted">Orange - Seat Available</small>
                    </div>
                    <div>
                        <small class="form-text text-muted">Red - Seat Booked</small>
                    </div>
                    <div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px; margin-right: 10px">Confirm Seats</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>