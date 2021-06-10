<?php
include 'functions_custom.php';

$pdo = pdo_connect_mysql();

$pdo_stmt = $pdo->prepare('DELETE * FROM students WHERE id = ?');
$pdo_stmt->execute();

$students = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php echo template_header('Delete'); ?>

<div class="content delete">
	<h2>Delete Student #<?php echo $student["id"] ?> ?</h2>
</div>

<?php echo template_footer(); ?>