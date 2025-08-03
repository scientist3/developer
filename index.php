<?php
session_start();
// include('./db_connect.php');
?>
<html>

<head>
	<title>Login form</title>
	<style>
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		.form-div {
			width: 300px;
			margin: 30px auto;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			background-color: #f9f9f9;
		}

		.messages {
			margin-bottom: 10px;
			padding: 10px;
			border-radius: 5px;
			background-color: #f0f0f0;
		}

		.submit-btn {
			width: 100%;
			padding: 10px;
			background-color: #28a745;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		.input {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}
	</style>
</head>

<body>
	<?php if (array_key_exists('login', $_GET)) { ?>
		<form name="login" method="post" action="./processLogin.php">
			<!-- <?php var_dump($_SESSION); ?> -->
			<div class="form-div messages">
				<?php isset($_SESSION['errors']) ? print('<div class="error">' . $_SESSION['errors'] . '</div>') : ''; ?>
				<?php isset($_SESSION['success']) ? print('<div class="success">' . $_SESSION['success'] . '</div>') : ''; ?>
			</div>
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