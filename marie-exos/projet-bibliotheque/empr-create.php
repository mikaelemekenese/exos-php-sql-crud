<?php
	include 'functions_custom.php';

	$pdo = pdo_connect_mysql();
    $msg = '';

	if (!empty($_POST)) {

        $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

		$id_livre = isset($_POST['id_livre']) ? htmlspecialchars($_POST['id_livre']) : '';
		$id_adherent = isset($_POST['id_adherent']) ? htmlspecialchars($_POST['id_adherent']) : '';
		$date_emprunt = isset($_POST['date_emprunt']) ? htmlspecialchars($_POST['date_emprunt']) : date('j F Y');
		$date_retourmax = isset($_POST['date_retourmax']) ? htmlspecialchars($_POST['date_retourmax']) : date('j F Y');
        $date_retour = isset($_POST['date_retour']) ? htmlspecialchars($_POST['date_retour']) : date('j F Y');

		$pdo_stmt = $pdo->prepare('INSERT INTO emprunt VALUES (?, ?, ?, ?, ?, ?)');
									
		$pdo_stmt->execute([$id, $id_livre, $id_adherent, $date_emprunt, $date_retourmax, $date_retour]);

        $msg = 'Ajouté avec succès !';

        header('Location: empr-read.php');
        exit();
	}
?>

<?php echo template_header('Create'); ?>

	<div class="content create">
        <h2>Ajouter un nouvel ouvrage :</h2>

        <form action="empr-create.php" method="POST">
            <div class="form-group">
                <label for="id_livre">Livre</label>
                <input type="text" class="form-control" name="id_livre" id="id_livre">
            </div>
            <div class="form-group">
                <label for="id_adherent">Adhérent</label>
                <input type="text" class="form-control" name="id_adherent" id="id_adherent">
            </div>
            <div class="form-group">
                <label for="date_emprunt">Date d'emprunt</label>
                <input type="date" class="form-control" name="date_emprunt" id="date_emprunt">
            </div>
            <div class="form-group">
                <label for="date_retourmax">Date de retour max</label>
                <input type="date" class="form-control" name="date_retourmax" id="date_retourmax">
            </div>
            <div class="form-group">
                <label for="date_retour">Date de retour</label>
                <input type="date" class="form-control" name="date_retour" id="date_retour">
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