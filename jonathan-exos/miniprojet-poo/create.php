<?php require './partials/header.php'; ?>

<?php 
    if (isset($_POST['titre']) && isset($_POST['auteur'])) {
        $book = new Book([
            'titre' => $_POST['title'],
            'auteur' => $_POST['content'],
            'id_rayon' => '1',
        ]);

        var_dump($post);
        die();
    }
?>

<form method="POST">
    <input type="text" name="titre" placeholder="Titre">
    <input name="auteur" placeholder="Auteur"></textarea>
    <input type="submit" value="Créer">
</form>

<?php require './partials/footer.php'; ?>