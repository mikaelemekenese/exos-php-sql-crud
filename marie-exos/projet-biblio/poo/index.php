<?php
    include 'functions_custom.php';

    $db = pdo_connect_mysql();
?>

<?php echo template_header_main('Index'); ?>

<div class="container">
	<br><h1 style="padding-top:5px;text-align:center;color:grey;">Accueil</h1><br>

	<br><div class="home-buttons">
		<div class="home-livre">
			<i class="fas fa-book fa-2x"><br><h3>Catalogue</h3></i><br><br>
			<a type="button" class="btn btn-info" href="Livre/index.php"><h5>Consulter la liste des livres</h5></a><br>
			<a type="button" class="btn btn-success" href="#"><h5>Ajouter un livre</h5></a>
		</div>
		<div class="home-adh">
			<i class="fas fa-address-book fa-2x"><br><h3>Adhérents</h3></i><br><br>
			<a type="button" class="btn btn-info" href="Adherent/index.php"><h5>Je recherche un adhérent</h5></a><br>
			<a type="button" class="btn btn-success" href="#"><h5>Ajouter un nouvel adhérent</h5></a>
		</div>
		<div class="home-empr">
			<i class="fas fa-book-reader fa-2x"><br><h3>Emprunts</h3></i><br><br>
			<a type="button" class="btn btn-info" href="Emprunt/index.php"><h5>Consulter les emprunts</h5></a><br>
			<a type="button" class="btn btn-success" href="#"><h5>Emprunter</h5></a>
		</div>
		<div class="home-rayon">
			<i class="fas fa-database fa-2x"><br><h3>Rayons</h3></i><br><br>
			<a type="button" class="btn btn-info" href="Rayon/index.php"><h5>Les rayons de la Bibliothèque</h5></a><br>
			<a type="button" class="btn btn-success" href="#"><h5>Ajouter un nouveau rayon</h5></a>
		</div>
	</div>
</div>

<?php echo template_footer(); ?>