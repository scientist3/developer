<?php
$host = 'localhost';
$db   = 'postgres';
$user = 'postgres';
$pass = '22647852';
$port = '5432'; // default PostgreSQL port

$_SESSION['connect'] = '';
// phpinfo();
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
// var_dump($con);
// $_SESSION['con'] = $con;
if (!$con) {
	$_SESSION['connect'] = "Connection failed: " . pg_last_error();
} else {
	// $_SESSION['connect'] = "Connected successfully!";
}

// try {
// 	$pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 	echo "Connected successfully with PDO!";
// } catch (PDOException $e) {
// 	echo "Connection failed: " . $e->getMessage();
// }

// die();
