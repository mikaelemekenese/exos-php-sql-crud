<?php

try {
    $bdd = new PDO("mysql:host=localhost;dbname=init_poo",'root','');
} 

catch (exception $e) {
    die("Erreur : ".$e->getMessage());
}

// On admet que $db est un objet PDO
$request = $bdd->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages');
    
while ($perso = $request->fetch(PDO::FETCH_ASSOC)) { // Chaque entrée sera récupérée et placée dans un array.
    echo $perso['nom'], ' a ', $perso['forcePerso'], ' de force, ', $perso['degats'], ' de dégâts, ', $perso['experience'];
    echo ' d\'expérience et est au niveau ', $perso['niveau'];
    echo '<br>';
}

/* ------------------------------------------------------------------------------------------------------------------------------------- */


require "Personnage.php";

try {
    $bdd = new PDO("mysql:host=localhost;dbname=init_poo",'root','');
} 

catch (Exception $e) {
    die("Erreur : ".$e->getMessage());
}

// On admet que $db est un objet PDO
$request = $bdd->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages');
    
while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) { // Chaque entrée sera récupérée et placée dans un array.

    // On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
    // On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.
    $perso = new Personnage($donnees);

    echo $perso->nom()." a ".$perso->forcePerso()." de force, ".$perso->degats()." de dégâts, ".$perso->experience();
    echo " d'expérience et est au niveau ".$perso->niveau();
    echo "<br>";
}

/* ------------------------------------------------------------------------------------------------------------------------------------- */


function chargerClasse($classname) {
    require $classname.'.php';
}

spl_autoload_register('chargerClasse');

try {
    $db = new PDO('mysql:host=localhost;dbname=init_poo', 'root', '');
}
catch (Exception $e) {
    die("Erreur ! ".$e->getMessage());
}

$manager = new PersonnagesManager($db);

$persos = $manager->getList();

foreach($persos as $unPerso) {
    echo $unPerso->nom()." a ".$unPerso->forcePerso()." de force, ".$unPerso->degats()." de dégâts, ".$unPerso->experience();
    echo " d'expérience et est au niveau ".$unPerso->niveau();
    echo "<br>";
}