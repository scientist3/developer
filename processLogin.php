<?php
session_start();
include('./db_connect.php');
// echo "Hello";
$post = $_REQUEST['data'];
print_r($post);
// var_dump($con);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $post['username'];
	$password = $post['password'];

	$result = pg_query_params($conn, "SELECT * FROM users WHERE username = $1", [$username]);
	$user = pg_fetch_assoc($result);

	if ($user && password_verify($password, $user['password'])) {
		echo "Login successful!";
	} else {
		echo "Invalid username or password.";
	}
}

// header("location:index.php");
