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
  
  form {
    display:inline;
    margin:0;
    padding:0;
  }
  
  .navbar {
            position: sticky;
            top: 0;
            background-color: #F4893D;
            z-index: 1000;
        }
  .navbar-brand{
  font-family:'fantasy'
  }
  .center {
  position: justify-center;
  margin: auto;  
}
.search-hover 
{
  border: 1px solid #ccc;
  outline: none;
  background-size: 22px;
  background-position: 13px;
  border-radius: 10px;
  width: 150px;
  height: 40px;
  padding: 15px;
  transition: all 1.5s;
}
.search-hover:hover {
  width: 500px;
  padding-left: 50px;
}
.form-control
{
  width:500px;
}
i img 
{
    width: 25px; /* Adjust the width and height as needed */
    height: 25px;
}
#myCarousel 
{
     margin-top: 20px; /* Adjust the value as needed */
}
.movie-card {
    border: 1px solid #ccc;
    border-radius: 10px; /* Increase border radius for more rounded corners */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    margin: 5px;
    padding: 5px; /* Reduce padding to make it thinner */
    text-align: center;
    max-width: 200px; /* Set a maximum width for the card */
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
    padding: 6px 12px; /* Reduce button padding */
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
		      <a class="nav-link" href="Cart.php" style="text-decoration:none; margin-top: 5px">
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
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
      <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
      <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
  </ol>

  <!-- Slides -->
  <div class="carousel-inner">
      <div class="carousel-item active">
        <iframe width="100%" height="360" src="https://www.youtube.com/embed/DhlaBO-SwVE?si=XixlpLhOmjnLSe7Z" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
      <div class="carousel-item">
        <iframe width="100%" height="360" src="https://www.youtube.com/embed/uYPbbksJxIg?si=dfMY5iVFUJ-0Be7O" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
      <div class="carousel-item">
        <iframe width="100%" height="360" src="https://www.youtube.com/embed/pBk4NYhWNMM?si=sAqABQrqpoM-elpm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
  </div>

  <!-- Controls -->
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
  </a>
</div>


<div class="container my-5">
  <div class="row justify-content-center">
      <div class="col-md-8 text-center">
          <h2 style="font-family: 'Lato', sans-serif;">Coming Soon....</h2>
          <div class="coming-soon-card-container" style="overflow-x: auto; white-space: nowrap;">
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
                 
                 $sql = "SELECT date, poster, title from moviecreation";
                 $result = mysqli_query($conn, $sql);
                 while ($row = mysqli_fetch_assoc($result)) {
                  if (strtotime($row['date']) > strtotime('now')) {
                  ?>
                  <div class="movie-card d-inline-block">
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
                 ?>
          </div>
      </div>
  </div>
</div>

  <!-- Space and Hero Section -->
  <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 style="font-family: 'Lato', sans-serif;">Movies in Theatres</h2>
            <!-- You can add more content or styling to the hero section here -->
        </div>
    </div>
  </div>
  <!-- Inside the Cards Section in your HTML -->
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="movie-card-container" style="overflow-x: auto; white-space: nowrap;">
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
                 
                 $sql = "SELECT date, poster, title from moviecreation";
                 $result = mysqli_query($conn, $sql);
                 while ($row = mysqli_fetch_assoc($result)) {
                  if (strtotime($row['date']) < strtotime('now')) {
                  ?>
                  <div class="movie-card d-inline-block">
                    <img src="<?php echo $row['poster']; ?>" alt="Movie" class="movie-image">
                    <p style="font-size: 12px;"><b>Released on <?= $row['date']; ?></b></p>
                    <form action="SelectShowtime.php" method="post">
                      <input type="hidden" id="title" name="title" value="<?= $row['title']; ?>">
                      <?php $_SESSION['title'] = $row['title']; ?>
                      <input type="submit" class="btn btn-primary" value="Get Tickets">
                    </form>
                    <form action="searchmovie.php" method="get">                    
                      <input type="hidden" id="search" name="search" value="<?= $row['title']; ?>">
                      <input type="submit" class="btn btn-primary" value="Learn More">
                    </form>
                 </div>
                    <?php
                  }
                 }
                 ?>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white mt-5">
  <div class="container py-4">
      <div class="row">
          <div class="col-md-6">
              <h4>Contact Us</h4>
              <p>Email: contact@ugamoviefinder.com</p>
              <p>Phone: (123) 456-7890</p>
              <p>Address: UGA, Athens, Georgia</p>
          </div>
          <div class="col-md-6">
              <h4>Follow Us:</h4>
              <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
              <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
              <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
              <!-- Add more social media links as needed -->
          </div>
      </div>
  </div>
</footer>

  </body>
  </html>