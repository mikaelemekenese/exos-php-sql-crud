<?php
include 'functions_custom.php';

?>

<?php echo template_header('Update');
/**
 * ajouter le php necessaire
 */
?>

<div class="container content update">
	<h2>Update</h2>

	<form action="read.php" method="POST" style="display:block">
		<div class="form-group">
			<label for="prenom">Prénom : </label>
			<input type="text" class="form-control" id="prenom" name="prenom" />
		</div>
		<div class="form-group">
			<label for="nom">Nom : </label>
			<input type="text" class="form-control" id="nom" name="nom" />
		</div>
		<div class="form-group">
			<label for="email">Email : </label>
			<input type="email" class="form-control" id="email" name="email" />
		</div>
		<div class="form-group">
			<label for="telephone">Téléphone : </label>
			<input type="tel" class="form-control" id="telephone" name="telephone" />
		</div>
		<div class="form-group">
			<label for="age">Age : </label>
			<input type="number" class="form-control" id="age" name="age" />
		</div><br>
		<div class="form-group">
			<input type="submit" /></input>
		</div>
	</form>
</div>

<?php echo template_footer();
/**
 * ajouter le php necessaire
 */
?>