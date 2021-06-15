<?php
    include 'functions_custom.php';

    $pdo = pdo_connect_mysql();
    $msg = '';

    if (isset($_GET['id'])) {
        if (!empty($_POST)) {
            
            $id = $_GET['id'];
            $nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
		    $prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '';
		    $livres_empr = isset($_POST['nbr_livresempr']) ? htmlspecialchars($_POST['nbr_livresempr']) : '';

            $pdo_stmt = $pdo->prepare('UPDATE adherent SET id = ?, nom = ?, prenom = ?, nbr_livresempr = ? WHERE id = ?');
            $pdo_stmt->execute([$id, $nom, $prenom, $livres_empr, $id]);
            $msg = 'Edité avec succès !';

            header('Location: adh-read.php');
            exit();
        }

        $pdo_stmt = $pdo->prepare('SELECT * FROM adherent WHERE id = ?');
        $pdo_stmt->execute([$_GET['id']]);
        $adherent = $pdo_stmt->fetch(PDO::FETCH_ASSOC);

        if (!$adherent) {
            exit('Aucun adhérent n\'existe avec cet ID !');
        }

    } else {
            exit('Pas d\'ID spécifié');
    }
?>

<?php echo template_header('Update'); ?>

    <div class="content update">
        <h2>Modifier les informations de l'adhérent #<?php echo $adherent['id'] ?> (<?php echo $adherent['prenom']?> <?php echo $adherent['nom']?>) :</h2>

        <form action="adh-update.php?id=<?php echo $adherent["id"] ?>" method="POST" style="display:block">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="nom" value="<?php echo $adherent['nom']?>" id="nom">
            </div>
            <div class="form-group">
                <label for="name">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="<?php echo $adherent['prenom']?>" id="prenom">
            </div>
            <div class="form-group">
                <label for="livres_empr">Nombre de livres empruntés</label>
                <input type="text" class="form-control" name="livres_empr" value="<?php echo $adherent['nbr_livresempr']?>" id="livres_empr">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>

        <?php if ($msg): ?>
        <p><?=$msg?></p>
        <?php endif; ?>
    </div>

<?php echo template_footer(); ?>