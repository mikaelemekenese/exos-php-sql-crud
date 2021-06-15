<?php
	include 'functions_custom.php';

	$pdo = pdo_connect_mysql();
	$msg = '';

	if (isset($_GET['id'])) {

		$pdo_stmt = $pdo->prepare('SELECT * FROM livre WHERE id = ?');
		$pdo_stmt->execute([$_GET['id']]);
		$livre = $pdo_stmt->fetch(PDO::FETCH_ASSOC);

		if (!$livre) {
			exit('Aucun livre n\'existe avec cet ID!');
		}

		if (isset($_GET['confirm'])) {
			if ($_GET['confirm'] == 'yes') {
				$pdo_stmt = $pdo->prepare('DELETE FROM livre WHERE id = ?');
				$pdo_stmt->execute([$_GET['id']]);
				$msg = 'Ouvrage supprimé !';
			} else {
				header('Location: livre-read.php');
				exit;
			}
		}
	}
?>

<?php echo template_header('Delete')?>

	<div class="container">
		<br><h2>Supprimer le livre #<?php echo $livre['id'] ?></h2><br>

		<?php if ($msg): ?>
		<p><?=$msg?></p>
		<?php else: ?>

		<p>Souhaitez-vous vraiment supprimer le livre #<?php echo $livre['id'] ?> ("<?php echo $livre['titre'] ?>" de <?php echo $livre['auteur'] ?>) ?</p><br>

		<a href="livre-delete.php?id=<?php echo $livre['id'] ?>&confirm=yes" class="btn btn-success">Oui</a>
		<a href="livre-delete.php?id=<?php echo $livre['id'] ?>&confirm=no" class="btn btn-danger">Non</a>

		<?php endif; ?>
	</div>

<?php echo template_footer()?>