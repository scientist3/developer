<?php
$host   = 'localhost';
$dbname = 'postgres';
$user   = 'postgres';
$pass   = '22647852';

try {
	// $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	// $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
	$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass); // for PostgreSQL
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die("Connection failed: " . $e->getMessage());
}


// <?php
// $host = 'localhost';
// $db   = 'your_database';
// $user = 'your_username';
// $pass = 'your_password';
// $dsn = "pgsql:host=$host;dbname=$db";

// try {
//     $pdo = new PDO($dsn, $user, $pass, [
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//     ]);
// } catch (PDOException $e) {
//     die("DB Connection failed: " . $e->getMessage());
// }
// 
