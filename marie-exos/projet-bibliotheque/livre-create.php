<?php
	include 'functions_custom.php';

	$pdo = pdo_connect_mysql();
    $msg = '';

	if (!empty($_POST)) {

        $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

		$titre = isset($_POST['titre']) ? htmlspecialchars($_POST['titre']) : '';
		$auteur = isset($_POST['auteur']) ? htmlspecialchars($_POST['auteur']) : '';
		$disponible = isset($_POST['disponible']) ? htmlspecialchars($_POST['disponible']) : '';
		$id_rayon = isset($_POST['id_rayon']) ? htmlspecialchars($_POST['id_rayon']) : '';

		$pdo_stmt = $pdo->prepare('	INSERT INTO livre
									VALUES 	(:id, :titre, :auteur, :disponible, :id_rayon)');
									
		$pdo_stmt->execute([$id, $titre, $auteur, $disponible, $id_rayon]);

        $msg = 'Ajouté avec succès !';

        header('Location: livre-read.php');
        exit();
	}
?>

<?php echo template_header('Create'); ?>

	<div class="content create">
        <h2>Ajouter un nouvel ouvrage :</h2>

        <form action="livre-create.php" method="POST">
            <div class="form-group">
                <label for="name">Titre</label>
                <input type="text" class="form-control" name="titre" id="titre">
            </div>
            <div class="form-group">
                <label for="name">Auteur</label>
                <input type="text" class="form-control" name="auteur" id="auteur">
            </div>
            <div class="form-group">
                <label for="email">Disponible</label>
                <input type="text" class="form-control" name="disponible" id="disponible">
            </div>
            <div class="form-group">
                <label for="phone">Rayon</label>
                <input type="text" class="form-control" name="id_rayon" id="id_rayon">
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-info" value="Ajouter">
            </div>
        </form>

        <?php if ($msg): ?>
        <p><?=$msg?></p>
        <?php endif; ?>

    </div>

<?php echo template_footer(); ?>