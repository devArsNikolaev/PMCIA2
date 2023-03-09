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

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $pdo->prepare('SELECT * FROM users WHERE login = ?');
  $stmt->execute([$username]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $user['username'];
    header('Location: welcome.php');
    exit();
  } else {
    $message = 'Invalid username or password';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login &amp; Registration Form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="form-container">
    <h1>Login &amp; Registration Form</h1>
    <?php if ($message) { ?>
      <p class="message"><?php echo $message ?></p>
    <?php } ?>
    <form action="index.php" method="post">
      <h2>Login</h2>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
      <button type="submit" name="login">Login</button>
    </form>
    <form action="index.php" method="post">
      <h2>Register</h2>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
      <button type="submit" name="register">Register</button>
    </form>
  </div>
</body>
</html>
