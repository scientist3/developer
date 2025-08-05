<?php
$host = 'localhost';
$dbname = 'postgres';
$user = 'postgres';
$pass = '22647852';

try {
	$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
	// Enable error mode
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die("Connection failed: " . $e->getMessage());
}
