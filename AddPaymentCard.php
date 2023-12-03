<?php session_start(); ?>
<?php
    $paymentcard = $_POST['cardnumber'];
    $type = $_POST['cardtype'];
    $email = $_SESSION['email'];
    
    $host = "localhost";
    $database = "movies";
    $username = "root";
    $password = "";

    $condition = $_SESSION['redirect'];

    //Test Connection
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    } 
        $idsql = "SELECT `userid` FROM `user` WHERE `email` LIKE '$email'";
        $idresult = mysqli_query($conn, $idsql);
        $idcheck = mysqli_fetch_assoc($idresult);
        $id = $idcheck['userid'];
        $cardsql = "INSERT INTO cards (userId, cardNumber, type)
        VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $cardsql);
        mysqli_stmt_bind_param($stmt, "iss", $id, $paymentcard, $type);
        mysqli_stmt_execute($stmt);
        if ($condition) {
            unset($condition);
            unset($_SESSION['redirect']);
            header("Location: Cart.php");
        } else {
            header("Location: EditPaymentCards.php");
        }
?>