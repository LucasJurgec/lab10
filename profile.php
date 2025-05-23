<?php
session_start();
require_once('settings.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$query = "SELECT * FROM user WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<h2>Welcome, <?php echo $username; ?>!</h2>
<p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>

<h3>Edit Profile</h3>
<form action="update_profile.php" method="post">
    New Email: <input type="email" name="new_email" required>
    <input type="submit" value="Update Email">
</form>