<?php
$host = 'localhost';
$db   = 'test_db';
$user = 'postgres';
$pass = 'secret';

try {
	$pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die("Connection failed: " . $e->getMessage());
}
