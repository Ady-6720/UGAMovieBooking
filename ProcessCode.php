<?php session_start(); ?>
<?php
    $verificationcode = $_POST['verificationcode'];
    $email = $_SESSION['email'];
    $status = "active";

    $host = "localhost";
    $database = "movies";
    $username = "root";
    $password = "";

    //Test Connection
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    } 

    $sql = "SELECT verificationCode FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $verificationcheck = mysqli_fetch_assoc($result);
    $dbverificationcode = $verificationcheck['verificationCode'];

    if ($verificationcode == $dbverificationcode) {
        $statusupdatesql = "UPDATE user SET status = '$status' WHERE email = '$email'";
        mysqli_query($conn, $statusupdatesql);
        header("Location: EditProfilePanel.php");
    } else {
        echo "Verification code is incorrect.";
    }


?>