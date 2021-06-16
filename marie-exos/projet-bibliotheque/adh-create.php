<?php
	include 'functions_custom.php';

	$pdo = pdo_connect_mysql();
    $msg = '';

	if (!empty($_POST)) {

        $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

		$nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
		$prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '';
		$livres_empr = isset($_POST['nbr_livresempr']) ? htmlspecialchars($_POST['nbr_livresempr']) : '';

		$pdo_stmt = $pdo->prepare('	INSERT INTO adherent VALUES (?, ?, ?, ?)');
									
		$pdo_stmt->execute([$id, $nom, $prenom, $livres_empr]);
        $msg = 'Ajouté avec succès !';

        header('Location: adh-read.php');
        exit();
	}
?>

<?php echo template_header('Create'); ?>

	<div class="content create">
        <h2>Ajouter un nouvel adhérent :</h2>

        <form action="adh-create.php" method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom">
            </div>
            <div class="form-group">
                <label for="livres_empr">Nombre de livres empruntés</label>
                <input type="text" class="form-control" name="livres_empr" id="livres_empr">
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