<?php
session_start();
include('./db_connect.php');
// echo "Hello";
$post = $_REQUEST['data'];
print_r($post);
// var_dump($con);
$_SESSION['connect'] = '';
$_SESSION['error'] = '';
$_SESSION['success'] = '';

// if request is for login
if (isset($_POST['login'])) {
	// echo "Login request received";
	$username = $post['username'];
	$password = $post['password'];

	$result = pg_query_params($conn, "SELECT * FROM users WHERE username = $1", [$username]);
	$user = pg_fetch_assoc($result);

	if ($user && password_verify($password, $user['password'])) {
		$_SESSION['success'] = "Login successful!";
	} else {
		$_SESSION['error'] = "Invalid username or password.";
	}
}
// if request is for registration

if (isset($_POST['register'])) {
	$username = $_POST['data']['username'];
	$password = $_POST['data']['password'];

	// Hash the password
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	// Insert user
	$result = pg_query_params(
		$conn,
		"INSERT INTO users (username, password) VALUES ($1, $2)",
		[$username, $hashedPassword]
	);

	if ($result) {
		$_SESSION['success'] = "User registered successfully." . print_r($result, true);
	} else {
		$_SESSION['error'] = "Error: Failed to register user. User may already exist.";
	}
}

// header("location:index.php?login=1");
header("location:index.php");
