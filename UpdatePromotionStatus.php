<?php session_start(); ?>
<?php 

$promostatus = $_POST['promostatus'];
$email = $_SESSION['email'];

$host = "localhost";
$database = "movies";
$username = "root";
$password = "";

//Test Connection
$conn = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
   die("Connection error: " . mysqli_connect_error());
} 

$sql = "UPDATE user SET promoStatus = '$promostatus' WHERE email = '$email'";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_execute($stmt);

header("Location: EditPromotionStatus.php");

?>