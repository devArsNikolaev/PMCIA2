<?php
session_start();

if (isset($_SESSION['username'])) {
  header('Location: welcome.php');
  exit();
}

require_once 'db.php';

$message = '';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
  $stmt->execute([$username]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $username;
    header('Location: welcome.php');
    exit();
  } else {
    $message = 'Invalid username or password.';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="form-container">
    <h1>Login Form</h1>
    <?php if ($message) { ?>
      <p class="message"><?php echo $message ?></p>
    <?php } ?>
    <form action="login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
      <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>
</html>
