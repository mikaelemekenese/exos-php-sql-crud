<?php

try {
    $bdd = new PDO("mysql:host=localhost;dbname=bibliotheque",'root','');
} 

catch (Exception $e) {
    die("Erreur : ".$e->getMessage());
}

require "Adherent.php";

// On admet que $db est un objet PDO
$request = $bdd->query('SELECT id, nom, prenom, nbr_livresempr FROM adherent');

echo "  <table class='table'>
            <thead>
                <tr>
                    <td>#</td>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Nombre de livres empruntés</td>
                    <td></td>
                </tr>
            </thead>";

while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {

    $adherent = new Adherent($donnees);

    echo "  <tbody>
                <tr>
                    <td><?php echo " .$adherent->id()." ?></td>
                    <td><?php echo " .$adherent->nom()." ?></td>
                    <td><?php echo " .$adherent->prenom()." ?></td>
                </tr>
            </tbody>
        </table>";
}