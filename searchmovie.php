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
    if ($result) {
            if(mysqli_num_rows($result) > 0) {
                $movie = mysqli_fetch_assoc($result);
                echo 'The movie is in the database.';
            } else {
                echo 'The movie is NOT in the database.';
            }
    }
    
?>    