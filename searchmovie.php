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
    max-width: 800px; /* Increase the max-width for a wider container */
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    align-items: center;
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
        <a class="navbar-brand active" style="color:white; font-family: 'Lato', sans-serif; font-family: 'Lilita One', cursive;" href="Main.html">
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
                <li class="nav-item">
                    <a class="nav-link" href="#" style="text-decoration:none">
                        <i class="fa fa-shopping-cart" style="color:white"></i>
                    </a>
                </li>
            </ul>
            <form class="d-flex center" action="searchmovie.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search by Title" aria-label="Search" name="search">
                <button class="btn btn-outline-primary" type="submit"> <a class="nav-link" href="#" style="text-decoration:none">
                <i class="fa fa-search" style="color:white"></i></a></button>
            </form>
            <div class="nav navbar-nav navbar-right">
                <a href="Login.html" class="btn navbar-btn btn-light" style="text-decoration:none;">Login</a>
            </div>
        </div>
    </div>
</nav>

<tbody>
<?php
    $search = $_GET['search'];

    $host = "localhost";
    $database = "movies";
    $username = "root";
    $password = "";

    //Test Connection
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    } 

    $sql = "SELECT * FROM `moviecreation` WHERE `title` LIKE '$search'";
    $result = mysqli_query($conn, $sql);
    $movie = mysqli_fetch_assoc($result);
    if ($result) {
            if(mysqli_num_rows($result) > 0) {
                ?>
                <tr>
                    <iframe width="100%" height="720" src=<?= $movie['trailer']; ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="movie-card-container" style="overflow-x: auto; white-space: nowrap;">
                                <div class="movie-card d-inline-block" style="margin-left: 280px;">
                                    <img src="<?php echo $movie['poster']; ?>" alt="Movie" class="movie-image">
                                    <p style ="font-size: 10px;"><b><?= $movie['description']; ?></p>
                                    <p style="font-size: 12px;">Rated: <b><?= $movie['rating']; ?></b></p>
                                    <p style="font-size: 12px;">Released in: <b><?= $movie['year']; ?></b></p>
                                    <p style="font-size: 12px;">Genre: <b><?= $movie['genre']; ?></b></p>
                                    <a href="SeatBook.html" class="btn btn-primary">Get Tickets</a>
                                    <a href="#" class="btn btn-secondary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                <?php
            } else {
                ?>
                    <div>
                        <p style="text-align: center; font-size: 24px; margin-top: 50px;">The movie searched could not be found.</p>
                    </div>    
                <?php
            }
    }
    ?>
</tbody>        
</body>
</html>
