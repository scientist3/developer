<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db_connect.php';

// Handle Create
if (isset($_POST['create'])) {
	$stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
	$stmt->execute([$_POST['name'], $_POST['email']]);
}

// Handle Delete
if (isset($_GET['delete'])) {
	$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
	$stmt->execute([$_GET['delete']]);
}

// Handle Edit request
$editUser = null;
if (isset($_GET['edit'])) {
	$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
	$stmt->execute([$_GET['edit']]);
	$editUser = $stmt->fetch();
}

// Handle Update
if (isset($_POST['update'])) {
	$stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
	$stmt->execute([$_POST['name'], $_POST['email'], $_POST['id']]);
}

// Fetch all users
$users = $pdo->query("SELECT * FROM users ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Simple CRUD with PHP & MySQL</title>
</head>

<body>
	<h2><?= $editUser ? 'Edit User' : 'Add New User' ?></h2>
	<form method="post">
		<input type="hidden" name="id" value="<?= $editUser['id'] ?? '' ?>">
		<input type="text" name="name" placeholder="Name" value="<?= $editUser['name'] ?? '' ?>" required>
		<input type="email" name="email" placeholder="Email" value="<?= $editUser['email'] ?? '' ?>" required>
		<button type="submit" name="<?= $editUser ? 'update' : 'create' ?>">
			<?= $editUser ? 'Update' : 'Create' ?>
		</button>
	</form>

	<h2>Users List</h2>
	<table border="1" cellpadding="8">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?= htmlspecialchars($user['id']) ?></td>
				<td><?= htmlspecialchars($user['name']) ?></td>
				<td><?= htmlspecialchars($user['email']) ?></td>
				<td>
					<a href="?edit=<?= $user['id'] ?>">Edit</a>
					<a href="?delete=<?= $user['id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>

</html>