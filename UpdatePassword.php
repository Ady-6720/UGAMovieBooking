<?php session_start(); ?>
<?php

$currentpassword = $_POST['currentpassword'];
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

$sql = "SELECT password FROM user WHERE email = '$email'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $dbpassword = $row['password'];
    if (password_verify($currentpassword, $dbpassword)) {
        $updatedpassword = $_POST['newpassword'];
        $updatedpassword = password_hash($updatedpassword, PASSWORD_DEFAULT);
        $updatesql = "UPDATE user SET password = '$updatedpassword' WHERE email = '$email'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $updatesql)) {
            die(mysqli_error($conn));
        }    
        mysqli_stmt_execute($stmt); 
        $subject = 'Password updated';
        $message = 'Your password has been updated.';
        $header = 'From: ugacinemaebooking@gmail.com';
        mail($email, $subject, $message, $header);
        header("Location: EditProfilePanel.php");
    } else { // if current password does not match database password
        echo "Password is incorrect.";
    }

}





?>