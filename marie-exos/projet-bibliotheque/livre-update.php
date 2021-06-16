<?php
    include 'functions_custom.php';

    $pdo = pdo_connect_mysql();
    $msg = '';

    if (isset($_GET['id'])) {
        if (!empty($_POST)) {
            $id = $_GET['id'];
            $titre = isset($_POST['titre']) ? htmlspecialchars($_POST['titre']) : '';
			$auteur = isset($_POST['auteur']) ? htmlspecialchars($_POST['auteur']) : '';
			$disponible = isset($_POST['disponible']) ? htmlspecialchars($_POST['disponible']) : '';
			$id_rayon = isset($_POST['id_rayon']) ? htmlspecialchars($_POST['id_rayon']) : '';

            $pdo_stmt = $pdo->prepare('UPDATE livre SET id = ?, titre = ?, auteur = ?, disponible = ?, id_rayon = ? WHERE id = ?');
            $pdo_stmt->execute([$id, $titre, $auteur, $disponible, $id_rayon, $id]);
            $msg = 'Edité avec succès !';

            header('Location: livre-read.php');
            exit();
        }

        $pdo_stmt = $pdo->prepare('SELECT * FROM livre WHERE id = ?');
        $pdo_stmt->execute([$_GET['id']]);
        $livre = $pdo_stmt->fetch(PDO::FETCH_ASSOC);

        if (!$livre) {
            exit('Aucun livre n\'existe avec cet ID !');
        }

    } else {
            exit('Pas d\'ID spécifié');
    }
?>

<?php echo template_header('Livre/Update'); ?>

    <div class="content update">
        <h2>Modifier les informations du livre #<?php echo $livre['id'] ?> ("<?php echo $livre['titre'] ?>" de <?php echo $livre['auteur']?>) :</h2>

        <form action="livre-update.php?id=<?php echo $livre["id"] ?>" method="POST" style="display:block">
            <div class="form-group">
                <label for="name">Titre</label>
                <input type="text" class="form-control" name="titre" value="<?php echo $livre['titre'] ?>" id="titre">
            </div>
            <div class="form-group">
                <label for="name">Auteur</label>
                <input type="text" class="form-control" name="auteur" value="<?php echo $livre['auteur'] ?>" id="auteur">
            </div>
            <div class="form-group">
                <label for="email">Disponible</label>
                <input type="text" class="form-control" name="disponible" value="<?php echo $livre['disponible'] ?>" id="disponible">
            </div>
            <div class="form-group">
                <label for="phone">Rayon</label>
                <input type="text" class="form-control" name="id_rayon" value="<?php echo $livre['id_rayon'] ?>" id="id_rayon">
                <!-- <select class="custom-select" name="rayon" style="width:400px;display:block;">
                    <?php
                        $sql = "SELECT rayon.id, rayon.nom FROM rayon";
                        if ($pdo_stmt = $pdo->query($sql)) {
                            while ($rayons = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC)) {
                                foreach ($rayons as $rayon) :
                                    echo "<option class=\"form-control\" value=\"".$livre['id_rayon']."\">".$rayon['id']." - ".$rayon['nom']."</option>";
                                endforeach;
                            }
                        }
                    ?>
                </select> -->
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