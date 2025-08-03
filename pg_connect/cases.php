<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('./db_connect.php');
// Check if the user is logged in

// $result = pg_query_params($con, "SELECT * FROM cases_tbl",[]); use when we have a paremeterized query
$result = pg_query($con, "SELECT * FROM cases_tbl");
if (!$result) {
	$_SESSION['error'] = "Error fetching cases: " . pg_last_error($con);
	// header("location:index.php");
	exit();
}
$cases = pg_fetch_all($result);
if (!$cases) {
	$_SESSION['error'] = "No cases found.";
	// header("location:index.php");
	exit();
}

// display cases in table
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cases</title>
	<link rel="stylesheet" href="./styles.css">
</head>

<body>
	<div>
		<table class="cases-table">
			<thead>
				<tr>
					<th>Case ID</th>
					<th>Case Type</th>
					<th>First Party</th>
					<th>Second Party</th>
					<th>Date</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($cases as $case) { ?>
					<tr>
						<td><?php echo htmlspecialchars($case['id']); ?></td>
						<td><?php echo htmlspecialchars($case['case_type']); ?></td>
						<td><?php echo htmlspecialchars($case['first_party']); ?></td>
						<td><?php echo htmlspecialchars($case['second_party']); ?></td>
						<td><?php echo htmlspecialchars($case['date']); ?></td>
						<td><?php echo htmlspecialchars($case['status']); ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

</html>