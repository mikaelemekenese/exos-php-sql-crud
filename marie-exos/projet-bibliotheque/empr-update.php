<?php
    include 'functions_custom.php';

    $pdo = pdo_connect_mysql();
    $msg = '';

    if (isset($_GET['id'])) {
        if (!empty($_POST)) {
            $id = $_GET['id'];
            $id_livre = isset($_POST['id_livre']) ? htmlspecialchars($_POST['id_livre']) : '';
            $id_adherent = isset($_POST['id_adherent']) ? htmlspecialchars($_POST['id_adherent']) : '';
            $date_emprunt = isset($_POST['date_emprunt']) ? htmlspecialchars($_POST['date_emprunt']) : date('j F Y');
            $date_retourmax = isset($_POST['date_retourmax']) ? htmlspecialchars($_POST['date_retourmax']) : date('j F Y');
            $date_retour = isset($_POST['date_retour']) ? htmlspecialchars($_POST['date_retour']) : date('j F Y');

            $pdo_stmt = $pdo->prepare(' UPDATE emprunt 
                                        SET     id = ?,
                                                id_livre = ?,
                                                id_adherent = ?,
                                                date_emprunt = ?,
                                                date_retourmax = ?,
                                                date_retour = ?
                                        WHERE   id = ?');
                                        
            $pdo_stmt->execute([$id, $id_livre, $id_adherent, $date_emprunt, $date_retourmax, $date_retour, $id]);
            $msg = 'Edité avec succès !';

            header('Location: empr-read.php');
            exit();
        }

        $pdo_stmt = $pdo->prepare('SELECT * FROM emprunt WHERE id = ?');
        $pdo_stmt->execute([$_GET['id']]);
        $emprunt = $pdo_stmt->fetch(PDO::FETCH_ASSOC);

        if (!$emprunt) {
            exit('Aucun emprunt n\'existe avec cet ID !');
        }

    } else {
            exit('Pas d\'ID spécifié');
    }
?>

<?php echo template_header('Update'); ?>

    <div class="content update">
        <h2>Modifier les informations de l'emprunt #<?php echo $emprunt['id'] ?> :</h2>

        <form action="empr-update.php?id=<?php echo $emprunt["id"] ?>" method="POST">
            <div class="form-group">
                <label for="id_livre">Livre</label>
                <input type="text" class="form-control" name="id_livre" id="id_livre" value="<?php echo $emprunt['id_livre'] ?>">
            </div>
            <div class="form-group">
                <label for="id_adherent">Adhérent</label>
                <input type="text" class="form-control" name="id_adherent" id="id_adherent" value="<?php echo $emprunt['id_adherent'] ?>">
            </div>
            <div class="form-group">
                <label for="date_emprunt">Date d'emprunt</label>
                <input type="date" class="form-control" name="date_emprunt" id="date_emprunt" value="<?php echo $emprunt['date_emprunt'] ?>">
            </div>
            <div class="form-group">
                <label for="date_retourmax">Date de retour max</label>
                <input type="date" class="form-control" name="date_retourmax" id="date_retourmax" value="<?php echo $emprunt['date_retourmax'] ?>">
            </div>
            <div class="form-group">
                <label for="date_retour">Date de retour</label>
                <input type="date" class="form-control" name="date_retour" id="date_retour" value="<?php echo $emprunt['date_retour'] ?>">
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