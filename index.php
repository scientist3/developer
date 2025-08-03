<?php
session_start();
// include('./db_connect.php');
?>
<html>

<head>
	<title>Login form</title>
	<link rel="stylesheet" href="./styles.css">
</head>

<body>
	<div class="form-div messages">
		<?php isset($_SESSION['connect']) ? print('<div class="error">' . $_SESSION['connect'] . '</div>') : ''; ?>
		<?php isset($_SESSION['error']) ? print('<div class="error">' . $_SESSION['error'] . '</div>') : ''; ?>
		<?php isset($_SESSION['success']) ? print('<div class="success">' . $_SESSION['success'] . '</div>') : ''; ?>
	</div>
	<?php if (array_key_exists('login', $_GET)) { ?>
		<form name="login" method="post" action="./processLogin.php">

			<div class="form-div">
				<div class="messages">Login</div>
				<label for="username"> Username </label>
				<input class="input" type="text" name="data[username]" />
				<label for="password"> Password </label>
				<input class="input" type="password" name="data[password]" />
				<button class="submit-btn" type="submit" name="login">login</button>
			</div>
		</form>
	<?php } elseif (array_key_exists('register', $_GET)) { ?>
		<form name="register" method="post" action="./processLogin.php">
			<div class="form-div">
				<div class="messages">Register</div>
				<label for="username"> Username </label>
				<input class="input" type="text" name="data[username]" required />
				<label for="password"> Password </label>
				<input class="input" type="password" name="data[password]" required />
				<button class="submit-btn" type="submit" name="register">Register</button>
			</div>
		</form>
	<?php } else { ?>
		<div class="form-div">
			<div class="messages">Welcome to the login page!</div>
			<a href="?login=1">Login</a> | <a href="?register=1">Register</a>
		</div>
	<?php } ?>

</body>

</html>