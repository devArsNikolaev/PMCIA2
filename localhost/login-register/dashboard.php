<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
	header('location: login.php');
	exit;
}

// Include the database connection file
require_once 'config.php';

// Get user information from the database
$id = $_SESSION['id'];
$query = "SELECT username, email FROM users WHERE id = ?";
if ($stmt = mysqli_prepare($conn, $query)) {
	mysqli_stmt_bind_param($stmt, 'i', $id);
	if (mysqli_stmt_execute($stmt)) {
		mysqli_stmt_store_result($stmt);
		mysqli_stmt_bind_result($stmt, $username, $email);
		mysqli_stmt_fetch($stmt);
	} else {
		echo 'Oops! Something went wrong. Please try again later.';
	}
	mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper">
		<h1>Dashboard</h1>
		<p>Welcome back, <?php echo $username; ?>!</p>
		<p>Your email address is: <?php echo $email; ?></p>
		<p><a href="logout.php">Log out</a></p>
	</div>
</body>
</html>
