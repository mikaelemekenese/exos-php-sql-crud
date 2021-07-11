<?php
    include '../functions_custom.php';

    $db = pdo_connect_mysql();
    
?>

<?php echo template_header('Emprunt'); ?> 

<?php
    require "Emprunt.php";

    // On admet que $db est un objet PDO
    $request = $db->query('SELECT id, id_livre, id_adherent, date_emprunt, date_retourmax, date_retour FROM emprunt ORDER BY date_emprunt DESC');

    echo  "

    <div class='content read'>
        <div><h2>Liste des emprunts de la bibliotheque</h2> 
        <span><a href='adh-create.php' class='add'><i class='fas fa-plus-square fa-xs'></i></a></span></div>
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>ID Livre</td>
                        <td>ID Adherent</td>
                        <td>Date d'emprunt</td>
                        <td>Date de retour max</td>
                        <td>Date de retour</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>";

    while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {

        $emprunt = new Emprunt($donnees);

        echo        "<tr>
                        <td>" .$emprunt->id(). "</td>
                        <td>" .$emprunt->id_livre(). "</td>
                        <td>" .$emprunt->id_adherent(). "</td>
                        <td>" .$emprunt->date_emprunt(). "</td>
                        <td>" .$emprunt->date_retourmax(). "</td>
                        <td>" .$emprunt->date_retour(). "</td>
                        <td class='actions'>
                            <a href='adh-update.php?id=" .$emprunt->id(). "' class='edit'><i class='fas fa-pen fa-xs'></i></a>
                            <a href='adh-delete.php?id=" .$emprunt->id(). "' class='trash'><i class='fas fa-trash fa-xs'></i></a>
                        </td>     
                    </tr>";
    }

    echo "      </tbody>
            </table>
    </div>"; 
?>

<?php echo template_footer(); ?>