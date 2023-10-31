<?php session_start(); ?>
<?php
    $cardid = $_POST['cardid'];
    
    $host = "localhost";
    $database = "movies";
    $username = "root";
    $password = "";

    //Test Connection
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    } 
        $cardsql = "DELETE FROM cards WHERE id = '$cardid'";
        mysqli_query($conn, $cardsql);
        header("Location: EditPaymentCards.php");
?>