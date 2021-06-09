<?php
include 'functions_custom.php';

$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
		$id = isset($_POST['id']) ? $_POST['id'] : NULL;
		$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
		$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $age = isset($_POST['age']) ? $_POST['age'] : '';

		$stmt = $pdo->prepare('UPDATE students SET id = ?, first_name = ?, last_name = ?, email = ?, phone = ?, age = ? WHERE id = ?');
        $stmt->execute([$id, $first_name, $last_name, $email, $phone, $age, $_GET['id']]);
		$msg = 'Edité avec succès !';
    }

	$stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
		exit('Pas d\'ID spécifié');
}
?>

<?php echo template_header('Read');
/**
 * ajouter le php necessaire
 */
?>

<div class="content update">
	<h2>Update Student #<?php echo $student['id'] ?></h2>

	<form action="update.php?id=<?php echo $student["id"] ?>" method="POST" style="display:block">
        <label for="name">First Name</label>
        <input type="text" name="first_name" value="<?php echo $student['first_name']?>" id="first_name">
		<label for="name">Last Name</label>
        <input type="text" name="last_name" value="<?php echo $student['last_name']?>" id="last_name">
        <label for="email">Email</label>
		<input type="text" name="email" value="<?php echo $student['email']?>" id="email">
        <label for="phone">Phone</label>
        <input type="text" name="phone" value="<?php echo $student['phone']?>" id="phone">
        <label for="title">Age</label>
		<input type="text" name="age" value="<?php echo $student['age']?>" id="age">
        <input type="submit" value="Update">
	</form>

	<?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?php echo template_footer();
/**
 * ajouter le php necessaire
 */
?>