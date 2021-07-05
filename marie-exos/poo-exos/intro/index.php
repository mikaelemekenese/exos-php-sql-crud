<?php

// CREATION DES ATTRIBUTS

/* class Personnage {
	private $_force;
    private $_experience;
    private $_degats; // Par convention, les noms d'éléments privés doivent être précédés d'un underscore

    public function frapper() {

    }

    public funciton gagnerExperience() {

    }
} */

// Exercice : A vous de jouer !

/* class Personnage {
	private $_force = 50;
    private $_experience = 1;
    private $_degats = 0;

    public function afficherExperience() {
        echo $this->_experience;
    }

    public function gagnerExperience() {
        echo $this->_experience++;
        // echo $this->_experience = $this->_experience + 1;
    }

    public function frapper(Personnage $persoAFrapper) {
        $persoAFrapper->_degats += $this->_force;
    }
}

$perso1 = new Personnage;
$perso2 = new Personnage;

    // On veut que le personnage 1 frappe le personnage 2
    $perso1 = frapper($perso2);
    // Indice : On attribue une nouvelle valeur à l'attribut $_degats du personnage à frapper de la valeur de la force du personnage en cours
*/ 

/* ----------------------------------------------------------------------------------------------------------------------------------------------------- */


// ACCEDER A UN ATTRIBUT VIA UN ACCESSEUR

/* class Personnage {
    private $_force;
    private $_experience;
    private $_degats;

    public function degats() { // Accesseur degats() : renvoie le contenu de l'attribut $_degats.
        return $this->_degats;
    }

    public function force() {
        return $this->_force;
    }

    public function experience() {
        return $this->_experience;
    }
} */


// MODIFIER LA VALEUR D'UN ATTRIBUT VIA UN MUTATEUR

class Personnage1 {
    private $_force;
    private $_experience;
    private $_degats;
  
    public function frapper(Personnage1 $persoAFrapper) {
        $persoAFrapper->_degats += $this->_force;
    }

    public function gagnerExperience(){
        $this->_experience++;
    }

    public function setForce($force) { // Mutateur chargé de modifier l'attribut $_force.
        if (!is_int($force)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }
        
        if ($force > 100) { // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
            trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return;
        }
        
        $this->_force = $force;
    }

    public function setExperience($experience) { // Mutateur chargé de modifier l'attribut $_experience.
        if (!is_int($experience)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }
        
        if ($experience > 100) { // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
        trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
        return;
        }
        
        $this->_experience = $experience;
    }

    public function degats() { // Ceci est la méthode degats() : elle se charge de renvoyer le contenu de l'attribut $_degats.
        return $this->_degats;
    }

    public function force() { // Ceci est la méthode force() : elle se charge de renvoyer le contenu de l'attribut $_force.
        return $this->_force;
    }

    public function experience() { // Ceci est la méthode experience() : elle se charge de renvoyer le contenu de l'attribut $_experience.
        return $this->_experience;
    }
}


/* Exercice : A vous de jouer !
    1. Attribuer la force et l'expérience de chaque personnage avant le combat.
    2. Afficher la force du personnage 1 et du personnage 2.
    3. Afficher l'expérience du personnage 1 et du personnage 2.
    4. Afficher les dégâts du personnage 1 et du personnage 2.
*/

$perso1 = new Personnage1;
$perso2 = new Personnage1;

$perso1->setForce(10);
$perso1->setExperience(2);

$perso2->setForce(90);
$perso2->setExperience(50);

$perso1->frapper($perso2);
$perso1->gagnerExperience();

$perso2->frapper($perso1);
$perso2->gagnerExperience();

echo "Le personnage 1 a ".$perso1->force()." de force, contrairement au personnage 2 qui a ".$perso2->force()." de force.<br/>";
echo "Le personnage 1 gagne ".$perso1->experience()." d'expérience, contrairement au personnage 2 qui gagne ".$perso2->force()." d'expérience.<br/>";
echo "Le personnage 1 reçoit ".$perso1->degats()." de dégâts, contrairement au personnage 2 qui reçoit ".$perso2->force()." de dégâts.<br/><br/>";


/* ----------------------------------------------------------------------------------------------------------------------------------------------------- */


// LE CONSTRUCTEUR

class Personnage2 {
    private $_force;
    private $_experience;
    private $_degats;

    public function __construct($force, $degats) { // Constructeur demandant 2 paramètres
        echo "Voici le constructeur !<br/><br/>"; // Message s'affichant une fois que tout objet est créé.
        $this->setForce($force); // Initialisation de la force.
        $this->setDegats($degats); // Initialisation des dégâts.
        $this->_experience = 1; // Initialisation de l'expérience à 1.
    }

    // Mutateur chargé de modifier l'attribut $_force.
    public function setForce($force) {
        if (!is_int($force)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error("La force d'un personnage doit être un nombre entier", E_USER_WARNING);
            return;
        }

        if ($force > 100) { // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
            trigger_error("La force d'un personnage ne peut dépasser 100", E_USER_WARNING);
            return;
        }

        $this->_force = $force;
    }

    // Mutateur chargé de modifier l'attribut $_degats.
    public function setDegats($degats) {
        if (!is_int($degats)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error("Le niveau de dégâts d'un personnage doit être un nombre entier", E_USER_WARNING);
            return;
        }

        $this->_degats = $degats;
    }
}

// Le constructeur demande la force et les dégâts initiaux du personnage que l'on vient de créer. 
// Il faudra donc lui spécifier ceci en paramètre :

$perso1 = new Personnage2(10, 0);
$perso2 = new Personnage2(100, 50);


/* ----------------------------------------------------------------------------------------------------------------------------------------------------- */


// CONSTANTES DE CLASSE

class Personnage {
    // Je rappelle : tous les attributs en privé !
    private $_force;
    private $_localisation;
    private $_experience;
    private $_degats;

    // Déclarations des constantes en rapport avec la force.
    const FORCE_PETITE = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE = 80;

    public function __construct($forceInitiale) { // N'oubliez pas qu'il faut assigner la valeur d'un attribut uniquement depuis son setter !
        $this->setForce($forceInitiale);
    }

    public function deplacer() {

    }

    public function frapper() {

    }

    public function gagnerExperience() {

    }

    public function setForce($force) {
    // On vérifie qu'on nous donne bien soit une « FORCE_PETITE », soit une « FORCE_MOYENNE », soit une « FORCE_GRANDE ».
        if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])) {
            $this->_force = $force;
        }
    }

    // Notez que le mot-clé static peut être placé avant la visibilité de la méthode (ici c'est public).
    public static function parler(){
        echo self::$_texteADire; // On donne le texte à dire.
    }
}

$perso1 = new Personnage(Personnage::FORCE_MOYENNE, 0);
$perso2 = new Personnage(Personnage::FORCE_MOYENNE, 10);


/* Exercice : A vous de jouer !
    Créer une classe compteur qui permet d'afficher à la fin du script le de nombre où elle a été instanciée.
    Vous aurez besoin d'un attribut appartenant à la classe ($_compteur) qui sera incrémenté dans le constructeur.
*/

class Compteur {
    // Déclaration de la variable $compteur
    private static $_compteur = 0;

    public function __construct() {
        // On instancie la variable $compteur qui appartient à la classe (donc utilisation du mot-clé self).
        self::$_compteur++;
    }

    public static function getCompteur() { // Méthode statique qui renverra la valeur du compteur.
        return self::$_compteur;
    }
}

$test1 = new Compteur;
$test2 = new Compteur;
$test3 = new Compteur;

echo Compteur::getCompteur(); // Affichera 3