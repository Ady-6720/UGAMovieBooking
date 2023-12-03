<?php session_start(); ?>
<?php

$showroom = $_POST['showroom'];
$showtime = $_POST['showtime'];
$childtickets = $_POST['childtickets'];
$adulttickets = $_POST['adulttickets'];

$title = $_SESSION['title'];

$host = "localhost";
$database = "movies";
$username = "root";
$password = "";
        
//Test Connection
$conn = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$ticketcount = 0;
for ($i = 1; $i <= 20; $i++) {
    $seat = 'seat' . $i;
    if (isset($_POST[$seat])) {
        $ticketcount++;
    }
}

if ($ticketcount !== $childtickets + $adulttickets) {
    header("Location: SelectShowtime.php"); // find solution...
} else {
    for ($i = 1; $i <= 20; $i++) {
        $seat = 'seat' . $i;
        $seatStatus = isset($_POST[$seat]) ? '1' : '0';
        if (strcmp($seatStatus, '0')) {
            $sql = "UPDATE movieshow SET $seat = '$seatStatus' WHERE showroomId = '$showroom' AND CONCAT(date, ' ', time) = '$showtime'";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                die(mysqli_error($conn));
            }
            mysqli_stmt_execute($stmt);
        }
    }
    
    $message = "";
    $childtotal;
    $adulttotal;
    $total = 0;

    if ($childtickets > 0) {
        $message .= "$childtickets Child Tickets - for ";
        $message .= $title;
        $showingsql = "SELECT kidTicket from moviecreation WHERE title = '$title'";
        $showresult = mysqli_query($conn, $showingsql);
        $row = mysqli_fetch_array($showresult);
        $kidticketprice = $row['kidTicket'];
        $childtotal = $kidticketprice * $childtickets;
        $message .= ": $$childtotal" . "
";
        $total += $childtotal;
    }
    
    if ($adulttickets > 0) {
        $message .= "$adulttickets Adult Tickets - for ";
        $message .= $title;
        $showingsql = "SELECT adultTicket from moviecreation WHERE title = '$title'";
        $showresult = mysqli_query($conn, $showingsql);
        $row = mysqli_fetch_array($showresult);
        $adultticketprice = $row['adultTicket'];
        $adulttotal = $adultticketprice * $adulttickets;
        $message .= ": $$adulttotal" . "
";
        $total += $adulttotal;
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = $message;
    } else {
        $_SESSION['cart'] .= $message;
    }

    if (!isset($_SESSION['total'])) {
        $_SESSION['total'] = $total;
    } else {
        $_SESSION['total'] += $total;
    }

    header("Location: Main.php");   
}


?>