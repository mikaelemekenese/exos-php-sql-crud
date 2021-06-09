<?php
include 'functions_custom.php';

$pdo = pdo_connect_mysql();

$pdo_stmt = $pdo->prepare('SELECT * FROM students');
$pdo_stmt->execute();

$students = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php echo template_header('Read'); ?>

<div class="content read">
	<h2>Liste des Etudiants</h2>
	<a href="create.php" class="create-contact">Ajouter</a>
	<table>

        <thead>
            <tr>
                <td>#</td>
                <td>Prénom</td>
                <td>Nom</td>
                <td>Email</td>
                <td>Téléphone</td>
                <td>Age</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?=$student["id"]?></td>
                <td><?=$student["first_name"]?></td>
                <td><?=$student["last_name"]?></td>
                <td><?=$student["email"]?></td>
                <td><?=chunk_split($student["phone"],2,"&nbsp;");?></td>
                <td><?=$student["age"]?></td>
                <td class="actions">
                    <a href="update.php?id=1" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=2" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</div>

<?php echo template_footer(); ?>