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

    $checkshowingssql = "SELECT showroomId, date, time from movieshow";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $checkshowingssql)) {
        die(mysqli_error($conn));
    }

    $result = mysqli_query($conn, $checkshowingssql);

    $duplicateshowing = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['showroomId'] == $showroom && $row['date'] == $date && $row['time'] == $time) {
            $duplicateshowing = 1;
        }
    }

    if ($duplicateshowing == 0) {
        $insertsql = "INSERT INTO movieshow (movieId, showroomId, date, time)
        VALUES (?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $insertsql)) {
            die(mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "iiss", $movieid, $showroom, $date, $time);

        mysqli_stmt_execute($stmt);

        header("Location: AdminControlPanel.php");
    } else {
        header("Location: ScheduleMovie.php");
    }
?>