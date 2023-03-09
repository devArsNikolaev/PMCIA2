<?php
// Function to sanitize user inputs
function sanitize_input($input) {
	global $conn;
	$input = trim($input);
	$input = mysqli_real_escape_string($conn, $input);
	$input = htmlspecialchars($input);
	return $input;
}

// Function to check if email already exists in the database
function email_exists($email) {
	global $conn;
	$sql = "SELECT id FROM users WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		return true;
	} else {
		return false;
	}
}

// Function to register a new user
function register_user($name, $email, $password) {
	global $conn;
	$name = sanitize_input($name);
	$email = sanitize_input($email);
	$password = sanitize_input($password);
	$password = password_hash($password, PASSWORD_DEFAULT);
	$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
	if (mysqli_query($conn, $sql)) {
		return true;
        console.log("good");
	} else {
		return false;
        console.log("bad");
    }
}

// Function to login a user
function login_user($email, $password) {
	global $conn;
	$email = sanitize_input($email);
	$password = sanitize_input($password);
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row['password'])) {
			$_SESSION['user_id'] = $row['id'];
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

// Function to get user details by user ID
function get_user_details($user_id) {
	global $conn;
	$sql = "SELECT * FROM users WHERE id = '$user_id'";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);
	return $user;
}
?>
