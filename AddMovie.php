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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            </ul>
        </div>
    </div>
    <div class="nav navbar-nav navbar-right">
                <a href="AdminControlPanel.php" class="btn navbar-btn btn-light" style="text-decoration:none; margin-right: 25px; width: 100px;">Control Panel</a>
              </div>
              <div class="nav navbar-nav navbar-right" style="margin-right: 25px;">
                <a href="logout.php" class="btn navbar-btn btn-light" style="text-decoration:none;">Logout</a>
              </div>
    </div>
</nav>

    <div class="container">
        <h2>Add Movie</h2>
        <form id="addMovieForm" action="movie.php" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required style="width: 100%;"></textarea>
            </div>
            <div class="form-group">
                <label for="cast">Cast:</label>
                <textarea id="cast" name="cast" rows="4" required style="width: 100%;"></textarea>
            </div>
            <div class="form-group">
                <label for="director">Producer:</label>
                <input type="text" id="producer" name="producer" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required min="2023-01-01">
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" required>
            </div>
            <div class="form-group">
                <label for="rating">MPAA-US Rating:</label>
                <select class="form-select" id="rating" name="rating">
                        <option value="G">G</option>
                        <option value="PG">PG</option>
                        <option value="PG-13">PG-13</option>
                        <option value="R">R</option>
                </select>
            </div>
            <div class="form-group">
                <label for="poster">Poster URL:</label>
                <input type="text" id="poster" name="poster" required>
            </div>
            <div class="form-group">
                <label for="trailer">Trailer Link:</label>
                <input type="text" id="trailer" name="trailer" required>
            </div>
            <div class="form-group">
                <label for="kidticket">Kid Ticket Price:</label>
                <input type="number" id="kidticket" name="kidticket" required min="3.00" step="0.25">
            </div>
            <div class="form-group">
                <label for="kidticket">Adult Ticket Price:</label>
                <input type="number" id="adultticket" name="adultticket" required min="5.00" step="0.25">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Movie</button>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
