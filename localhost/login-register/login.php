<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Авторизация</h1>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">На главную</a></li>
			<li><a href="register.php">Регистрация</a></li>
		</ul>
	</nav>
	<main>
		<form method="POST" action="login_process.php">
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" required>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required>
			<button type="submit">Login</button>
		</form>
	</main>
	<footer>
	</footer>
</body>
</html>
