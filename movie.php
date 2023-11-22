<?php
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cast = $_POST['cast'];
    $producer = $_POST['producer'];
    $date = $_POST['date'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $poster = $_POST['poster'];
    $trailer = $_POST['trailer'];
    $kidticket = $_POST['kidticket'];
    $adultticket = $_POST['adultticket'];

    $host = "localhost";
    $database = "movies";
    $username = "root";
    $password = "";

    //Test Connection
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    } 

    $sql = "INSERT INTO moviecreation (title, description, cast, producer, date, genre, rating, poster, trailer, kidticket, adultticket)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sssssssssdd", $title, $description, $cast, $producer, $date, $genre, $rating, $poster, $trailer, $kidticket, $adultticket);

    mysqli_stmt_execute($stmt);

    header("Location: Main.php");
?>
