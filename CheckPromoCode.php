<?php session_start(); ?>
<?php

$promocode = $_POST['promocode'];

$host = "localhost";
$database = "movies";
$username = "root";
$password = "";

//Test Connection
$conn = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
} 
 
$sql = "SELECT code, discount FROM promotions WHERE code = '$promocode'";
$result = mysqli_query($conn, $sql); 
$code = mysqli_fetch_assoc($result);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $discount = $code['discount'];
        $_SESSION['promotion'] = $discount;
        header("Location: Cart.php");
    }
} else {
    header("Location: Cart.php");
}

?>