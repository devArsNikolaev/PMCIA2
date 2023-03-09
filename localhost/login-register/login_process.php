<?php
// Start a session
session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Include the database connection file
	require_once 'config.php';
	
	// Get the user's login information
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Check if the username exists in the database
	$query = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		
		// Verify the password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row['password'])) {
			
			// Set session variables for the user
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			
			// Redirect the user to the home page
			header('Location: index.php');
			exit();
		}
	}
	
	// Set an error message if the login was unsuccessful
	$_SESSION['error'] = 'Sorry, your login was unsuccessful. Please try again.';
	
	// Redirect the user back to the login page
	header('Location: login.php');
	exit();
	
} else {
	// Redirect the user back to the login page
	header('Location: login.php');
	exit();
}
