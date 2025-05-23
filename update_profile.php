<?php
session_start();
require_once('settings.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_email = $_POST['new_email'];
    $username = $_SESSION['username'];

    $query = "UPDATE user SET email='$new_email' WHERE username='$username'";
    mysqli_query($conn, $query);
}

header("Location: profile.php");
exit();
?>