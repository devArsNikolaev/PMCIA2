<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Регистрация</h1>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">На главную</a></li>
			<li><a href="login.php">Авторизация</a></li>
		</ul>
	</nav>
	<main>
		<form method="POST" action="register_process.php">
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" required>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required>
			<label for="confirm_password">Confirm Password:</label>
			<input type="password" name="confirm_password" id="confirm_password" required>
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" required>
			<button type="submit">Register</button>
		</form>
	</main>
	<footer>
	</footer>
</body>
</html>
