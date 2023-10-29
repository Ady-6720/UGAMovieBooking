<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Password</title>

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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Movies
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels-fill" viewBox="0 0 16 16">
                                    <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M9 6a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                    <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7z"/>
                                </svg> New Movies
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels-fill" viewBox="0 0 16 16">
                                    <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M9 6a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                    <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7z"/>
                                </svg> Up-coming Releases
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels-fill" viewBox="0 0 16 16">
                                    <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M9 6a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                    <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7z"/>
                                </svg> International Movies
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels-fill" viewBox="0 0 16 16">
                                    <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M9 6a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                    <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7z"/>
                                </svg> Kids Movies
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="nav navbar-nav navbar-right">
                <a href="EditProfilePanel.php" class="btn navbar-btn btn-light" style="text-decoration:none; margin-right: 20px">Edit Profile</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a href="logout.php" class="btn navbar-btn btn-light" style="text-decoration:none;">Logout</a>
            </div>
        </div>
    </nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Edit Password</h1>
            <form action="UpdatePassword.php" method="post">
                <div class="mb-3">
                    <label for="firstName" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword" name="currentpassword" placeholder="Your current password..." required>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Your new password..." required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                    <small class="form-text text-muted">Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.</small>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmnewpassword" placeholder="Repeat your new password..." required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                </div>
                <button type="submit" class="btn btn-primary" onclick=validatePassword()>Update Password</button>
            </form>
        </div>
    </div>
</div>
<script>
        // JavaScript code for password validation
        function validatePassword() {
            let password = document.getElementById("newpassword");
            let confirmpassword = document.getElementById("confirmnewpassword");
            if (password.value != confirmpassword.value) {
                confirmpassword.setCustomValidity("The passwords do not match.");
            } else {
                confirmpassword.setCustomValidity("");
            }
            password.onchange = validatePassword;
            confirmpassword.onkeyup = validatePassword;
        }
</script>
</body>
</html>