<?php
    include '../functions_custom.php';

    $db = pdo_connect_mysql();
    
?>

<?php echo template_header('Livre'); ?> 

<?php
    require "Livre.php";

    // On admet que $db est un objet PDO
    $request = $db->query('SELECT id, titre, auteur, disponible, id_rayon FROM livre');

    echo  "

    <div class='content read'>
        <div><h2>Liste des livres de la bibliotheque</h2> 
        <span><a href='adh-create.php' class='add'><i class='fas fa-plus-square fa-xs'></i></a></span></div>
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Auteur</td>
                        <td>Auteur</td>
                        <td>Disponible</td>
                        <td>ID Rayon</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>";

    while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {

        $livre = new Livre($donnees);

        echo        "<tr>
                        <td>" .$livre->id(). "</td>
                        <td>" .$livre->titre(). "</td>
                        <td>" .$livre->auteur(). "</td>
                        <td>" .$livre->disponible(). "</td>
                        <td>" .$livre->id_rayon(). "</td>
                        <td class='actions'>
                            <a href='adh-update.php?id=" .$livre->id(). "' class='edit'><i class='fas fa-pen fa-xs'></i></a>
                            <a href='adh-delete.php?id=" .$livre->id(). "' class='trash'><i class='fas fa-trash fa-xs'></i></a>
                        </td>     
                    </tr>";
    }

    echo "      </tbody>
            </table>
    </div>"; 
?>

<?php echo template_footer(); ?>