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

	$result = pg_query_params($conn, "SELECT * FROM users WHERE username = $1 and password= $2", [$username, $password]);
	$user = pg_fetch_assoc($result);

	if ($user) {
		// if ($user && password_verify($password, $user['password'])) {
		$_SESSION['success'] = "Login successful!";
	} else {
		$_SESSION['error'] = "Invalid username or password.";
	}
}
// if request is for registration

if (isset($_POST['register'])) {
	// echo "hi";
	// die;
	$username = $_POST['data']['username'];
	$password = $_POST['data']['password'];

	// Hash the password
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	// Insert user
	$result = pg_query_params(
		$conn,
		"INSERT INTO users (id, username, password) VALUES (2,$1, $2)",
		[$username, $hashedPassword]
	);

	if ($result) {
		echo "User registered successfully.";
		$_SESSION['success'] = "User registered successfully." . print_r($result, true);
	} else {
		echo "Error: Failed to register user. User may already exist." . pg_last_error($con);
		$_SESSION['error'] = "Error: Failed to register user. User may already exist." . pg_last_error($con);
	}
}

// header("location:index.php?login=1");
header("location:index.php");
