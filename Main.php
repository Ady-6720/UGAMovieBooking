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
    
	<a class="navbar-brand active" style="color:white; font-family: 'Lato', sans-serif; font-family: 'Lilita One', cursive;" href="#"> <i><img src="https://i.ibb.co/jy62Srz/36a17f9402f64b66ba11ad785ec9ff3e.png"></i> UGAMovieFinder</a>
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
            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels-fill" viewBox="0 0 16 16">
              <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path d="M9 6a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7z"/>
            </svg> New Movies</a></li>
            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels-fill" viewBox="0 0 16 16">
              <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path d="M9 6a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7z"/>
            </svg> Up-coming Releases</a></li>
			      <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels-fill" viewBox="0 0 16 16">
              <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path d="M9 6a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7z"/>
            </svg> International Movies</a></li>
            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels-fill" viewBox="0 0 16 16">
              <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path d="M9 6a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7z"/>
            </svg> Kids Movies </a></li>
          </ul>
        </li>
        
		<li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal" style="color:white" href="#"></a>
        </li>	
		  <a class="nav-link" href="Cart.html" style="text-decoration:none">
          <i class="fa fa-shopping-cart" style="color:white"></i></a>
        </li>
        <li>
          <?php
           if (isset( $_SESSION['email'])) {
            ?>
              <p style="margin-left: 50px; margin-top: 7px; color:white"> Welcome <?= $_SESSION['email']?></p>
            <?php
           }
           ?>
        </li>
      </ul>
      <form class="d-flex center" action="searchmovie.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search by Title" aria-label="Search" name="search">
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
              <!-- Coming Soon Movie Card 1 -->
              <div class="movie-card d-inline-block">
                  <img src="https://i.pinimg.com/564x/11/d7/9a/11d79ad32ffb8d67b745c2464d972c17.jpg" alt="Coming Soon Movie 1" class="movie-image">
                  <p style="font-size: 12px;">Releasing on <b>October 6, 2023</b></p>
                 
              </div>

              <!-- Coming Soon Movie Card 2 -->
              <div class="movie-card d-inline-block">
                  <img src="https://i.pinimg.com/564x/7c/f8/a2/7cf8a28b568765726bd3880aed812a0d.jpg" alt="Coming Soon Movie 2" class="movie-image">
                  <p style="font-size: 12px;">Releasing on <b>October 20, 2023</b></p>
              </div>

              <!-- Coming Soon Movie Card 3 -->
              <div class="movie-card d-inline-block">
                  <img src="https://i.pinimg.com/564x/f3/5b/5d/f35b5d4fc6c0d32c3fe8117cf6e727e7.jpg" alt="Coming Soon Movie 3" class="movie-image">
                  <p style="font-size: 12px;">Releasing on <b>November 3, 2023</b></p>
              </div>

              <!-- Coming Soon Movie Card 4 -->
              <div class="movie-card d-inline-block">
                  <img src="https://i.pinimg.com/564x/42/9d/f9/429df9ef3ee916ae42882534483d131d.jpg" alt="Coming Soon Movie 4" class="movie-image">
                  <p style="font-size: 12px;">Releasing on <b>November 22, 2023</b></p>
              </div>

              <!-- Coming Soon Movie Card 5 -->
              <div class="movie-card d-inline-block">
                  <img src="https://i.pinimg.com/564x/55/d1/59/55d15963c40b54e3c60d911ad58013e3.jpg" alt="Coming Soon Movie 5" class="movie-image">
                  <p style="font-size:12px;">Releasing on <b>November 10, 2023</b></p>
              </div>

              <!-- Add more coming soon movie cards as needed -->
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
                <!-- Movie Card 1 -->
                <div class="movie-card d-inline-block">
                    <img src="https://i.pinimg.com/736x/e8/28/ec/e828ec80b3ea34071251978227711996.jpg" alt="Movie 1"
                         class="movie-image">
                    <p style="font-size: 12px;">Released on <b>November 22, 2023</b></p>
                    <a href="SeatBook.html" class="btn btn-primary">Get Tickets</a>
                    <a href="#" class="btn btn-secondary">Learn More</a>
                </div>

                <!-- Movie Card 2 -->
                <div class="movie-card d-inline-block">
                    <img src="https://i.pinimg.com/474x/03/7b/f1/037bf168f045bdc9439f0a80c19f2d8e.jpg" alt="Movie 2"
                         class="movie-image">
                    <p style="font-size: 12px;">Released on <b>November 22, 2023</b></p>
                         <a href=SeatBook.html class="btn btn-primary">Get Tickets</a>
                    <a href="#" class="btn btn-secondary">Learn More</a>
                </div>

                <!-- Add 8 more movie cards as needed -->
                <!-- Movie Card 3 -->
                <div class="movie-card d-inline-block">
                    <img src="https://i.pinimg.com/564x/c4/4f/32/c44f326f3680ba7ae881f58505b6c467.jpg" alt="Movie 3" class="movie-image">
                    <p style="font-size: 12px;">Released on <b>November 22, 2023</b></p>
                    <a href="SeatBook.html" class="btn btn-primary">Get Tickets</a>
                    <a href="#" class="btn btn-secondary">Learn More</a>
                </div>

                <!-- Movie Card 4 -->
                <div class="movie-card d-inline-block">
                    <img src="https://i.pinimg.com/564x/4f/ca/a1/4fcaa180f1d3a521d11911c4f267351d.jpg" alt="Movie 4" class="movie-image">
                    <p style="font-size: 12px;">Released on <b>November 22, 2023</b></p>
                    <a href="SeatBook.html" class="btn btn-primary">Get Tickets</a>
                    <a href="#" class="btn btn-secondary">Learn More</a>
                </div>

                <!-- Movie Card 5 -->
                <div class="movie-card d-inline-block">
                    <img src="https://i.pinimg.com/564x/c1/43/af/c143afa8d927349d5b66854a9ed08f14.jpg" alt="Movie 5" class="movie-image">
                    <p style="font-size: 12px;">Released on <b>November 22, 2023</b></p>
                    <a href="SeatBook.html" class="btn btn-primary">Get Tickets</a>
                    <a href="#" class="btn btn-secondary">Learn More</a>
                </div>

                <!-- Movie Card 6 -->
                <div class="movie-card d-inline-block">
                    <img src="https://i.pinimg.com/564x/e7/ac/f3/e7acf3d4b8edae2153fc40815cc47631.jpg" alt="Movie 6" class="movie-image">
                    <p style="font-size: 12px;">Released on <b>November 22, 2023</b></p>
                    <a href="SeatBook.html" class="btn btn-primary">Get Tickets</a>
                    <a href="#" class="btn btn-secondary">Learn More</a>
                </div>

                <!-- Movie Card 7 -->
                <div class="movie-card d-inline-block">
                    <img src="https://i.pinimg.com/564x/89/c6/38/89c638a7bba10db0704c5dd32f0c48d3.jpg" alt="Movie 7" class="movie-image">
                    <p style="font-size: 12px;">Released on <b>November 22, 2023</b></p>
                    <a href="SeatBook.html" class="btn btn-primary">Get Tickets</a>
                    <a href="#" class="btn btn-secondary">Learn More</a>
                </div>

                <!-- Movie Card 8 -->
                <div class="movie-card d-inline-block">
                    <img src="https://i.pinimg.com/564x/bb/3f/53/bb3f5381e3ff20a900031e9d3e03d549.jpg" alt="Movie 8" class="movie-image">
                    <p style="font-size: 12px;">Released on <b>November 22, 2023</b></p>
                    <a href="SeatBook.html" class="btn btn-primary">Get Tickets</a>
                    <a href="#" class="btn btn-secondary">Learn More</a>
                </div>
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