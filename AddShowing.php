<?php session_start(); ?>
<?php
    $movieid = $_POST['movie'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $showroom = $_POST['showroom'];

    $host = "localhost";
    $database = "movies";
    $username = "root";
    $password = "";

    //Test Connection
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO movieshow (movieId, showroomId, date, time)
    VALUES (?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "iiss", $movieid, $showroom, $date, $time);

    mysqli_stmt_execute($stmt);

    header("Location: AdminControlPanel.php");

?>