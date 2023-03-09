<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: index.php');
  exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="welcome-container">
    <h1>Welcome, <?php echo $username ?>!</h1>
    <p>You are now logged in.</p>
    <a href="logout.php">Log out</a>
  </div>
</body>
</html>
