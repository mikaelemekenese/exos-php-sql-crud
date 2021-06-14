<?php
include 'functions_custom.php';

$pdo = pdo_connect_mysql();

$pdo_stmt = $pdo->prepare('SELECT * FROM livre');
$pdo_stmt->execute();

$livres = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php echo template_header('Read'); ?>

<div class="content read">

	<div><h2>Liste des ouvrages de la bibliotheque</h2> 
    <span><a href="create.php" class="add"><i class="fas fa-plus-square fa-xs"></i></a></span></div>

	<table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Titre</td>
                <td>Auteur</td>
                <td>Disponible</td>
                <td>Rayon</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livres as $livre) : ?>
            <tr>
                <td><?php echo $livre["id"] ?></td>
                <td><?php echo $livre["titre"] ?></td>
                <td><?php echo $livre["auteur"] ?></td>
                <td>
                    <?php 
                        if ($livre["disponible"] == 1) : echo "Oui";
                        else : echo "Non";
                        endif;
                    ?>
                </td>
                <td>
                    <?php 
                        switch ($livre["id_rayon"]) {
                            case 1 : echo "Fantastique"; break;
                            case 2 : echo "Horreur"; break;
                            case 3 : echo "Histoire"; break;
                            case 4 : echo "Sciences"; break;
                            case 5 : echo "Sport"; break;
                            case 6 : echo "Voyage"; break;
                            case 7 : echo "Manga"; break;
                            default : echo "Non classé"; 
                        };
                    ?>
                </td>
                <td class="actions">
                    <a href="update.php?id=<?php echo $livre["id"] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?php echo $livre["id"] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>

<?php echo template_footer(); ?>