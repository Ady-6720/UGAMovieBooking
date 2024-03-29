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
    max-width: 1400px; /* Increase the max-width for a wider container */
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    align-items: center;
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
            color: white;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    
	<a class="navbar-brand active" style="color:white; font-family: 'Lato', sans-serif; font-family: 'Lilita One', cursive;" href="Main.php"> <i><img src="https://i.ibb.co/jy62Srz/36a17f9402f64b66ba11ad785ec9ff3e.png"></i> UGAMovieFinder</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;"> 
        
      <?php
      if (isset( $_SESSION['email'])) {
        if ($_SESSION['email'] != 'admin@cinemaebooking.com') {
          ?>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal" style="color:white" href="#"></a>
          </li>	
		      <a class="nav-link" href="Cart.html" style="text-decoration:none; margin-right: 50px; margin-top: 5px">
          <i class="fa fa-shopping-cart" style="color:white"></i></a>
          </li>
      <li>
        <?php
        }
      }
      ?>
          <?php
           if (isset( $_SESSION['email'])) {
            ?>
              <p style="margin-left: 5px; margin-top: 13px; color:white"> Welcome <?= $_SESSION['email']?></p>
            <?php
           }
           ?>
        </li>
      </ul>
      <form class="d-flex center" action="searchmovie.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search by Title or Release Status (Coming Soon/Current Movies)" aria-label="Search" name="search">
        <button class="btn btn-outline-primary" type="submit"> <a class="nav-link" href="#" style="text-decoration:none">
          <i class="fa fa-search" style="color:white"></i></a></button>
      </form>
      <?php
        if (session_status() == PHP_SESSION_NONE) {
        ?>
            <div class="nav navbar-nav navbar-right">
                <a href="Login.html" class="btn navbar-btn btn-light" style="text-decoration:none;">Login</a>
            </div>
        <?php
        } else {
            if (isset( $_SESSION['email'])) {
              if ($_SESSION['email'] != 'admin@cinemaebooking.com') {
            ?>
            <div class="nav navbar-nav navbar-right">
                <a href="EditProfilePanel.php" class="btn navbar-btn btn-light" style="text-decoration:none; margin-right: 20px">Edit Profile</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a href="logout.php" class="btn navbar-btn btn-light" style="text-decoration:none;">Logout</a>
            </div>
              <?php
            } else {
              ?>
              <div class="nav navbar-nav navbar-right">
                <a href="AdminControlPanel.php" class="btn navbar-btn btn-light" style="text-decoration:none; margin-right: 25px">Control Panel</a>
              </div>
              <div class="nav navbar-nav navbar-right">
                <a href="logout.php" class="btn navbar-btn btn-light" style="text-decoration:none;">Logout</a>
              </div>
            <?php
            }
            } else {
              ?>
              <div class="nav navbar-nav navbar-right">
                <a href="Login.html" class="btn navbar-btn btn-light" style="text-decoration:none; margin-right: 20px">Login</a>
              </div>
              <div class="nav navbar-nav navbar-right">
                <a href="SignUp.html" class="btn navbar-btn btn-light" style="text-decoration:none;">Sign Up</a>
              </div>
              <?php
            }
            ?>
        <?php    
        }
        ?>
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

    if (strtolower("$search") != "coming soon" && strtolower("$search") != "current movies") {
        $sql = "SELECT * FROM moviecreation WHERE title = '$search'";
        $result = mysqli_query($conn, $sql);
        $movie = mysqli_fetch_assoc($result);
        if ($result) {
                if(mysqli_num_rows($result) > 0) {
                    ?>
                    <tr>
                        <iframe width="100%" height="720" src=<?= $movie['trailer']; ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="<?php echo $movie['poster']; ?>" alt="Movie" class="movie-image">
                                <div class="movie-card-container">
                                    <p style ="font-size: 25px;"><b><?= $movie['title']; ?></b></p>
                                    <p style ="font-size: 20px;"><b>Release Date: </b><?= $movie['date']; ?></p>
                                    <p style ="font-size: 20px; overflow-wrap: break-word;"><b>Description: </b><?= $movie['description']; ?></p>
                                    <p style ="font-size: 15px;"><b>Producer: </b><?= $movie['producer']; ?></p>
                                    <p style ="font-size: 15px;"><b>Cast: </b><?= $movie['cast']; ?></p>
                                    <p style="font-size: 15px;"><b>Rated: </b><?= $movie['rating']; ?></p>
                                    <p style="font-size: 15px;"><b>Genre: </b><?= $movie['genre']; ?></p>
                                    <?php
                                    if (strtotime($movie['date']) < strtotime('now')) {
                                        ?>
                                        <form action="SelectShowtime.php" method="post">
                                            <input type="hidden" id="title" name="title" value="<?= $movie['title']; ?>">
                                            <input type="submit" class="btn btn-primary" value="Get Tickets">
                                        </form>
                                        <?php
                                    }
                                    ?>
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
    } else if (strtolower($search) == "coming soon") {
        $sql = "SELECT date, poster, title from moviecreation";
        $result = mysqli_query($conn, $sql);
        ?>
        <h1 style="text-align: center; margin-top: 50px">Coming Soon</h1>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            if (strtotime($row['date']) > strtotime('now')) {
                ?>
                <div class="movie-card d-inline-block" style="margin-left: 50px">
                    <img src="<?php echo $row['poster']; ?>" alt="Movie" class="movie-image">
                    <p style="font-size: 12px;"><b>Releasing on <?= $row['date']; ?></b></p>
                    <form action="searchmovie.php" method="get">               
                    <input type="hidden" id="search" name="search" value="<?= $row['title']; ?>">
                    <input type="submit" class="btn btn-primary" value="Learn More">
                    </form>
                 </div>
                 <?php
            }
        }
    } else if (strtolower($search) == "current movies") {
        $sql = "SELECT date, poster, title from moviecreation";
        $result = mysqli_query($conn, $sql);
        ?>
        <h1 style="text-align: center; margin-top: 50px">Current Movies</h1>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            if (strtotime($row['date']) < strtotime('now')) {
                ?>
                <div class="movie-card d-inline-block" style="margin-left: 50px">
                    <img src="<?php echo $row['poster']; ?>" alt="Movie" class="movie-image">
                    <p style="font-size: 12px;"><b>Released on <?= $row['date']; ?></b></p>
                    <form action="searchmovie.php" method="get">
                    <a href="SeatBook.html" class="btn btn-primary">Get Tickets</a>                     
                    <input type="hidden" id="search" name="search" value="<?= $row['title']; ?>">
                    <input type="submit" class="btn btn-primary" value="Learn More">
                    </form>
                </div>
                 <?php
            }
        }
    }
    ?>
</tbody>        
</body>
</html>
