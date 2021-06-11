<?php
include 'connect.php';

$pdo = pdo_connect_mysql();

$pdo_stmt = $pdo->prepare('SELECT * FROM patients');
$pdo_stmt->execute();

$patients = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
    <head>
        <title>Hospitale2N</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">

        <style>
            h1 { color: red; }
            h3 { color: green; }
        </style>
    </head>

    <body>
        <div class="container">
            <br><div class="container"><h1>Partie 2 - Exercices SQL/PDO</h1></div><br>

            <br><div style="display:flex; justify-content:space-between; align-items: center;"><h3>Liste des patients</h3> 
            <button href="ajout-patient.php" type="button" class="btn btn-primary">Ajouter un patient</button></div><br>
        </div>

        <div class="container">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Last Name</td>  
                        <td scope="col">First Name</td>
                        <td scope="col">Birthdate</td>
                        <td scope="col">Phone Number</td>
                        <td scope="col">Email</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient): ?>
                    <tr>
                        <td><?php echo $patient["id"]?></td>
                        <td><?php echo $patient["lastname"]?></td>
                        <td><?php echo $patient["firstname"]?></td>
                        <td><?php echo $patient["birthdate"]?></td>
                        <td><?php echo $patient["phone"]?></td>
                        <td><?php echo $patient["mail"]?></td>
                        <td class="actions">
                            <a href="update.php?id=<?php echo $patient["id"]?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                            <a href="delete.php?id=<?php echo $patient["id"]?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </body>
</html>