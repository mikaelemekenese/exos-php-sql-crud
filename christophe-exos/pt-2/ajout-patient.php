<?php
include 'connect.php';

    $pdo = pdo_connect_mysql();

	if (!empty($_POST)) {

		$id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

		$lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '';
		$firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '';
		$birthdate = isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate']) : '';
		$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
        $mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';

		$pdo_stmt = $pdo->prepare('	INSERT INTO patients
									VALUES 	(?, ?, ?, ?, ?, ?)');
									
		$pdo_stmt->execute([$id, $lastname, $firstname, $birthdate, $phone, $mail]);
	}

?>

<html>
    <head>
        <title>Create</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">

        <style>

        </style>
    </head>

    <body>
    <div class="container">
        <br><h2>Add a new patient :</h2><br>

        <form action="ajout-patient.php" method="POST">
            <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name">
            </div>
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name">
            </div>
            <div class="form-group">
                <label for="date">Birthdate</label>
                <input type="date" class="form-control" name="birthdate" id="birthdate">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number" class="form-control" name="phone" id="phone">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add new entry">
            </div>
        </form>
    </div>
    </body>
</html>