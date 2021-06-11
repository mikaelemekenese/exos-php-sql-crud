<?php
	include 'functions_custom.php';

	$pdo = pdo_connect_mysql();

	if (isset($_GET['id'])) {

		$pdo_stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
		$pdo_stmt->execute([$_GET['id']]);
		$student = $pdo_stmt->fetch(PDO::FETCH_ASSOC);

		if (isset($_GET['confirm'])) {
			if ($_GET['confirm'] == 'yes') {
				$pdo_stmt = $pdo->prepare('DELETE FROM students WHERE id = ?');
				$pdo_stmt->execute([$_GET['id']]);
				header('Location: read.php');
			} else {
				header('Location: read.php');
				exit;
			}
		}
	}
?>

<?php echo template_header('Delete')?>

	<div class="container">
		<br><h2>Remove Student #<?php echo $student['id'] ?></h2><br>

		<p>Do you want to remove Student #<?php echo $student['id'] ?> (<?php echo $student['first_name'] ?> <?php echo $student['last_name'] ?>) from the list ?</p><br>

		<a href="delete.php?id=<?php echo $student['id'] ?>&confirm=yes" class="btn btn-success">Yes</a>
		<a href="delete.php?id=<?php echo $student['id'] ?>&confirm=no" class="btn btn-danger">No</a>
	</div>

<?php echo template_footer()?>