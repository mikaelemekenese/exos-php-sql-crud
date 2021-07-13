<?php require './partials/header.php'; ?>

<?php $books = Book::all(); foreach($books as $book) : ?> 
    <ul style="margin-bottom:0;">
        <li><i><?php echo $book['titre']; ?></i> (<b><?php echo $book['auteur']; ?></b>) [<?php echo $book['id_rayon'] ?>]</li>
    </ul>
<?php endforeach; ?>

<?php $shelf = Shelf::findById(1); ?>
<h1>Un rayon par son ID : <?php echo $shelf['nom'] ?></h1>

<?php require './partials/footer.php'; ?>