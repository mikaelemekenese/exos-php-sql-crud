<?php

    include 'functions_custom.php';

    try {
        $db = new PDO("mysql:host=localhost;dbname=bibliotheque",'root','');
    } 

    catch (Exception $e) {
        die("Erreur : ".$e->getMessage());
    }
?>

<?php echo template_header('Read'); ?>

<?php

    require "Adherent.php";

    // On admet que $db est un objet PDO
    $request = $db->query('SELECT id, nom, prenom, nbr_livresempr FROM adherent');

    echo  "

    <div class='content read'>
        <div><h2>Liste des adhérents de la bibliotheque</h2> 
        <span><a href='adh-create.php' class='add'><i class='fas fa-plus-square fa-xs'></i></a></span></div>
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Nombre de livres empruntés</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>";

    while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {

        $adherent = new Adherent($donnees);

        echo        "<tr>
                        <td>" .$adherent->id(). "</td>
                        <td>" .$adherent->nom(). "</td>
                        <td>" .$adherent->prenom(). "</td>
                        <td>" .$adherent->nbr_livresempr(). "</td>
                        <td class='actions'>
                            <a href='adh-update.php?id=" .$adherent->id(). "' class='edit'><i class='fas fa-pen fa-xs'></i></a>
                            <a href='adh-delete.php?id=" .$adherent->id(). "' class='trash'><i class='fas fa-trash fa-xs'></i></a>
                        </td>     
                    </tr>";
    }

    echo "      </tbody>
            </table>
    </div>"; 
?>


<?php echo template_footer(); ?>