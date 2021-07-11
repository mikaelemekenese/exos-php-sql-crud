<?php
    include '../functions_custom.php';

    $db = pdo_connect_mysql();
    
?>

<?php echo template_header('rayon'); ?> 

<?php
    require "Rayon.php";

    // On admet que $db est un objet PDO
    $request = $db->query('SELECT id, nom, reference FROM rayon');

    echo  "

    <div class='content read'>
        <div><h2>Liste des rayons de la bibliotheque</h2> 
        <span><a href='adh-create.php' class='add'><i class='fas fa-plus-square fa-xs'></i></a></span></div>
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nom</td>
                        <td>Référence</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>";

    while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {

        $rayon = new Emprunt($donnees);

        echo        "<tr>
                        <td>" .$rayon->id(). "</td>
                        <td>" .$rayon->nom(). "</td>
                        <td>" .$rayon->reference(). "</td>
                        <td class='actions'>
                            <a href='adh-update.php?id=" .$rayon->id(). "' class='edit'><i class='fas fa-pen fa-xs'></i></a>
                            <a href='adh-delete.php?id=" .$rayon->id(). "' class='trash'><i class='fas fa-trash fa-xs'></i></a>
                        </td>     
                    </tr>";
    }

    echo "      </tbody>
            </table>
    </div>"; 
?>

<?php echo template_footer(); ?>