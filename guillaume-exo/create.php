<?php
	include 'functions_custom.php';

	$pdo = pdo_connect_mysql();

	if (!empty($_POST)) {

		$id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

		$first_name = isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : '';
		$last_name = isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : '';
		$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
		$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
		$age = isset($_POST['age']) ? htmlspecialchars($_POST['age']) : '';

		$pdo_stmt = $pdo->prepare('	INSERT INTO students
									VALUES 	(?, ?, ?, ?, ?, ?)');
									
		$pdo_stmt->execute([$id, $first_name, $last_name, $email, $phone, $age]);
	}
?>

<?php echo template_header('Create'); ?>

	<div class="content create">
        <h2>Add a new student :</h2>

        <form action="create.php" method="POST">
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name">
            </div>
            <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" name="phone" id="phone">
            </div>
            <div class="form-group">
                <label for="title">Age</label>
                <input type="text" class="form-control" name="age" id="age">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Add new entry">
            </div>
        </form>
    </div>

<?php echo template_footer(); ?>