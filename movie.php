<?php
    $title = $_POST['title'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $poster = $_POST['poster'];
    $trailer = $_POST['trailer']; 

    $host = "localhost";
    $database = "movies";
    $username = "root";
    $password = "";

    //Test Connection
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    } 

    $sql = "INSERT INTO moviecreation (title, description, year, genre, rating, poster, trailer)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ssissss", $title, $description, $year, $genre, $rating, $poster, $trailer);

    mysqli_stmt_execute($stmt);

    header("Location: Main.html");
?>
