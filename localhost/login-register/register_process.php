<?php
// Start a session
session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Include the database connection file
	require_once 'config.php';
	
	// Get the user's registration information
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$email = $_POST['email'];
	
	// Check if the username is already taken
	$query = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		$_SESSION['error'] = 'Sorry, that username is already taken.';
		header('Location: register.php');
		exit();
	}
	
	// Check if the email is already in use
	$query = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		$_SESSION['error'] = 'Sorry, that email is already in use.';
		header('Location: register.php');
		exit();
	}
	
	// Check if the passwords match
	if ($password !== $confirm_password) {
		$_SESSION['error'] = 'Sorry, your passwords do not match.';
		header('Location: register.php');
		exit();
	}
	
	// Hash the password
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	console.log($hashed_password);
	// Insert the user's information into the database
	$query = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email');";
	mysqli_query($conn, $query);
	
	// Set a success message
	$_SESSION['success'] = 'Your account has been created!';
	
	// Redirect the user to the login page
	header('Location: login.php');
	exit();
	
} else {
	// Redirect the user back to the register page
	header('Location: register.php');
	exit();
}
