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
            display: flex;
            max-width: 800px; /* Increase the max-width for a wider container */
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    justify-content: center;
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
            color: black;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand active" style="color:white; font-family: 'Lato', sans-serif; font-family: 'Lilita One', cursive;" href="Main.php">
            <i><img src="https://i.ibb.co/jy62Srz/36a17f9402f64b66ba11ad785ec9ff3e.png"></i> UGAMovieFinder
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color:white" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Movies
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-camera-reels-fill"></i> New Movies</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-camera-reels-fill"></i> Upcoming Releases</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-camera-reels-fill"></i> International Movies</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-camera-reels-fill"></i> Kids Movies</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal" style="color:white" href="#"></a>
                </li>
            </ul>
        </div>
        <div class="nav navbar-nav navbar-right">
                <a href="EditProfilePanel.php" class="btn navbar-btn btn-light" style="text-decoration:none; margin-right: 20px">Edit Profile</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a href="logout.php" class="btn navbar-btn btn-light" style="text-decoration:none;">Logout</a>
            </div>
    </div>
</nav>

<div>
    <p style="text-align: center; margin-top: 50px; font-size: 24px;">Update User Information</p>
</div>
<div class="container" style="justify-content: space-between; gap: 10px;">
    <button style="background-color: #F4893D; width: 300px;height: 40px;border-radius: 5px;"><a href="EditAddress.php">Change Address</a></button>
    <button style="background-color: #F4893D; width: 300px;height: 40px;border-radius: 5px;"><a href="EditPaymentCards.php">Change Payment Cards</a></button>
    <button style="background-color: #F4893D; width: 300px;height: 40px;border-radius: 5px;"><a href="EditPromotionStatus.php">Change Promotion Status</a></button>