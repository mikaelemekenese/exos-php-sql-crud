<?php
include 'connect.php';

$pdo = pdo_connect_mysql();

$pdo_stmt = $pdo->prepare('SELECT * FROM clients');
$pdo_stmt->execute();

$clients = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);

//

$pdo_stmt = $pdo->prepare('SELECT * FROM showtypes');
$pdo_stmt->execute();

$showtypes = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);

// 

$pdo_stmt = $pdo->prepare('SELECT * FROM clients LIMIT 20');
$pdo_stmt->execute();

$clients2 = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);

// 

$pdo_stmt = $pdo->prepare('SELECT * FROM clients INNER JOIN cards ON clients.cardNumber = cards.cardNumber WHERE cardTypesId = 1');
$pdo_stmt->execute();

$clients3 = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);

// 

$pdo_stmt = $pdo->prepare('SELECT lastName, firstName FROM clients WHERE lastName REGEXP "^[M].*$" ORDER BY lastName ASC');
$pdo_stmt->execute();

$clients4 = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);

//

$pdo_stmt = $pdo->prepare('SELECT title, performer, date, startTime FROM shows ORDER BY title ASC');
$pdo_stmt->execute();

$shows = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);

// 

$pdo_stmt = $pdo->prepare('SELECT * FROM clients');
$pdo_stmt->execute();

$clients5 = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
    <head>
        <title>Colyseum</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">

        <style>
            body { font-family: 'Alegreya Sans', sans-serif; }
            .table { text-align: center; width: fit-content; margin: auto; }
            h1 { color: red; }
            h3 { color: orange; }
            .table-sm td { padding-left: 40px; padding-right: 40px; }
            thead > tr > td { font-weight: bold; color: green; font-size: 1.2rem; }
            b { color: blue; }
        </style>
    </head>

    <body>
        <br><div class="container"><h1>Partie 1 - Exercices SQL/PDO</h1></div>

        <div class="container">
            <br><h3>Exercice 1 : Afficher les clients.</h3><br>

            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Nom</td>
                        <td scope="col">Prénom</td>
                        <td scope="col">Date de naissance</td>
                        <td scope="col">Carte</td>
                        <td scope="col">Numéro de carte</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?php echo $client["id"]?></td>
                        <td><?php echo $client["lastName"]?></td>
                        <td><?php echo $client["firstName"]?></td>
                        <td><?php echo $client["birthDate"]?></td>
                        <td><?php echo $client["card"]?></td>
                        <td><?php echo $client["cardNumber"]?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="container">
            <br><h3>Exercice 2 : Afficher les types de spectacles possibles.</h3><br>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Type de spectacle</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($showtypes as $showtype): ?>
                    <tr>
                        <td><?php echo $showtype["id"]?></td>
                        <td><?php echo $showtype["type"]?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="container">
            <br><h3>Exercice 3 : Afficher les 20 premiers clients.</h3><br>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Nom</td>
                        <td scope="col">Prénom</td>
                        <td scope="col">Date de naissance</td>
                        <td scope="col">Carte</td>
                        <td scope="col">Numéro de carte</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients2 as $client): ?>
                    <tr>
                        <td><?php echo $client["id"]?></td>
                        <td><?php echo $client["lastName"]?></td>
                        <td><?php echo $client["firstName"]?></td>
                        <td><?php echo $client["birthDate"]?></td>
                        <td><?php echo $client["card"]?></td>
                        <td><?php echo $client["cardNumber"]?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="container">
            <br><h3>Exercice 4 : N'afficher que les clients possédant une carte de fidélité.</h3><br>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Nom</td>
                        <td scope="col">Prénom</td>
                        <td scope="col">Date de naissance</td>
                        <td scope="col">Numéro de carte</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients3 as $client): ?>
                    <tr>
                        <td><?php echo $client["id"]?></td>
                        <td><?php echo $client["lastName"]?></td>
                        <td><?php echo $client["firstName"]?></td>
                        <td><?php echo $client["birthDate"]?></td>
                        <td><?php echo $client["cardNumber"]?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="container">
            <br><h3>Exercice 5 : Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".</h3><br>

            <div style="display:grid;grid-template-columns:1fr 1fr 1fr;">
                <?php foreach ($clients4 as $client): ?>
                    <span style="border:1px solid lightgrey;padding:10px;">
                        <p><b>Nom : </b><?php echo $client["lastName"]?></p>
                        <p><b>Prénom : </b><?php echo $client["firstName"]?></p>
                    </span>
                <?php endforeach ?>
            </div>
        </div>

        <div class="container">
            <br><h3>Exercice 6 : Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure.</h3><br>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <td scope="col">Titre</td>
                        <td scope="col">Artiste</td>
                        <td scope="col">Date</td>
                        <td scope="col">Heure</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($shows as $show): ?>
                    <tr>
                        <td><?php echo $show["title"]?></td>
                        <td><?php echo $show["performer"]?></td>
                        <td><?php echo $show["date"]?></td>
                        <td><?php echo $show["startTime"]?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="container">
            <br><h3>Exercice 7 : Afficher tous les clients comme ceci :</h3><br>

            <div style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr;">

                <?php foreach ($clients5 as $client): ?>

                <?php 
                    if(preg_match("/(2198|2377)/", $client["cardNumber"])) {
                        $card = "<b style='color:goldenrod'>OUI</b>";
                        $cardnum = $client["cardNumber"];
                    } else {
                        $card = "Non";
                        $cardnum = "&#10060";
                    }
                ?>

                <span style="border:1px solid lightgrey;padding:10px;">
                    <p><b>Nom : </b><?php echo $client["lastName"]?></p>
                    <p><b>Prénom : </b><?php echo $client["firstName"]?></p>
                    <p><b>Date de naissance : </b><?php echo $client["birthDate"]?></p>
                    <p><b>Carte de fidelité : </b><?php echo $card ?></p>
                    <p><b>Numéro de la carte : </b><?php echo $cardnum ?></p>
                </span>
                <?php endforeach ?>
            </div>
        </div><br>

        <br><div class="container"><h1>Partie 2 - Exercices SQL/PDO</h1></div><br>
    </body>
</html>