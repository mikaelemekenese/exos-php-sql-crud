<?php require './partials/header.php'; ?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['titre']) && isset($_POST['auteur'])) {
            $book = new Book([
                'titre' => $_POST['titre'],
                'auteur' => $_POST['auteur'],
                'disponible' -> $_POST['disponible'],
                'id_rayon' => $_POST['id_rayon'],
            ]);

            header('Location: ./index.php');
            exit();
        } else {
            echo 'Les champs sont obligatoires !';
        }
    }
?>

<form method="POST">
    <input type="text" name="titre" placeholder="Titre">
    <input type="text" name="auteur" placeholder="Auteur">
    <input type="number" name="disponible" placeholder="Disponible">
    <input type="number" name="id_rayon" placeholder="IDRayon">
    <input type="submit" value="Créer">
</form>

<?php require './partials/footer.php'; ?>