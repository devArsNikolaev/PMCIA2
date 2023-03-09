<?php
session_start();

if (isset($_SESSION['username'])) {
  header('Location: welcome.php');
  exit();
}

require_once 'db.php';

$message = '';

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
  $stmt->execute([$username, $password]);

  $message = 'Registration successful. Please log in.';
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="form-container">
    <h1>Registration Form</h1>
    <?php if ($message) { ?>
      <p class="message"><?php echo $message ?></p>
    <?php } ?>
    <form action="register.php" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
      <button type="submit" name="register">Register</button>
    </form>
  </div>
</body>
</html>
