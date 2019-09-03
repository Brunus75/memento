-------------------------- PROGRAMMER EN ORIENTE OBJET EN PHP --------------------------


I) INTRODUCTION à la POO

• Une classe = entité regroupant variables et fonctions
• Instancier une classe = s'en servir pour créer un objet 
• Dans une classe, on appelle les variables attributs (ou propriétés) et les fonctions méthodes

◘ Créer une classe 

<?php
class NomDeLaClasse // commencer par une Majuscule (notation PEAR)
{
	// déclaration des méthodes et attributs
}
?>

• Visibilité d'un attribut ou méthode

- Indique d'où on peut y avoir accès
- Public : accessible partout, même depuis l'extérieur de l'objet
- Private : accesssible SEULEMENT à l'intérieur de la classe 

• Création d'attributs 

<?php
class Personnage
{
	private $_force = 50; // force du personnage
	private $_localisation = 'Lyon'; // underscore à respecter (norme PEAR pour les éléments privés)
	private $_experience = 1; // par défaut à 1
	private $_degats = 0; // doit être une expression scalaire statique (ne peut-être issue de fonction ou autre opération)
}
?>

• Création de méthodes

<?php
class Personnage
{
	private $_force;
	private $_localisation;
	private $_experience;
	private $_degats;

	public function deplacer() // une méthode qui modifiera la localisation du personnage
	{
		// les méthodes n'ont pas besoin d'être masquées, elles sont mises en public
	}

	public function frapper() // une méthode qui frappera un personnage
	{

	}

	public function gagnerExperience() // une méthode qui augmentera l'attribut $_experience du personnage
	{

	}
}
?>


II) UTILISER UNE CLASSE

◘ Créer et manipuler un Objet

• Créer un Objet
<?php 
$perso = new Personnage; // instanciation de la classe Personnage qui produit l'objet $perso
?>

• Appeler les méthodes de l'Objet 
<?php
class Personnage
{
	private $_force;
	private $_localisation;
	private $_experience;
	private $_degats;

	public function parler()
	{
		echo 'Hey ! Je suis prêt !';
	}
}

$perso = new Personnage;
$perso->parler(); // invoque la méthode parler() de l'objet $perso 
?>

• Accéder à un élément depuis la classe 
<?php
class Personnage
{
	private $_force;
	private $_experience;
	private $_degats;
}
$perso = new Personnage;
$perso->_experience = $perso->_experience + 1; // erreur fatale car attribut privé

class Personnage
{
	private $_experience = 50;

	public function afficherExperience()
	{
		echo $this->_experience;
	}

	public function gagnerExperience()
	{
		$this->_experience = $this->_experience + 1;
	}
}
$perso = new Personnage;
$perso->afficherExperience();
$perso->gagnerExperience();
?>

• Implémenter d'autres méthodes
<?php
class Personnage 
{
	private $_degats = 0;
	private $_experience = 0;
	private $_force = 20;

	public function frapper($persoAFrapper)
	{
		$persoAFrapper->_degats += $this->_force;
	}

	public function gagnerExperience()
	{
		$this->_experience = $this->_experience +1;
	}
}

$perso1 = new Personnage;
$perso2 = new Personnage;

$perso1->frapper($perso2);
$perso1->gagnerExperience();

$perso2->frapper($perso1);
$perso2->gagnerExperience();
?>

• Exiger des objets en paramètre
<?php
class Personnage
{
	public function frapper(Personnage $persoAFrapper)
	{
		// précise le nom de la classe exigée du paramètre
	}
}
?>

◘ ACCESSEURS ET MUTATEURS

• Accéder à l'attribut avec des accesseurs

- Méthodes dont le rôle est de donner l'attribut demandé
- Portent le même nom que l'attribut dont elles renvoient la valeur 
<?php
class Personnage
{
	private $_force;
	private $_experience;
	private $_degats;

	public function frapper(Personnage $persoAFrapper)
	{
		$persoAFrapper->_degats += $this->_force;
	}

	public function gagnerExperience()
	{
		$this->_experience++; // $this->_experience += 1
	}

	public function degats()
	{
		return $this->_degats;
	}

	public function force()
	{
		return $this->_force;
	}

	public function experience()
	{
		return $this->_experience;
	}
}
?>

• Modifier la valeur d'un attribut avec les mutateurs

- Méthodes de la forme setNomDeLAttribut();
- La classe doit impérativement contrôler la valeur afin d'assurer son intégrité;
<?php 
class Personnage
{
	private $_force;
	private $_experience;
	private $_degats;

	public function frapper(Personnage $persoAFrapper)
	{
		$persoAFrapper->_degats += $this->_force;
	}

	public function gagnerExperience()
	{
		$this->_experience++; // $this->_experience += 1
	}

	public function setForce($force) // mutateur force
	{
		if (!is_int($force)) // si ce n'est pas un nombre entier
		{
			trigger_error("La force d'un personnage doit être un nombre entier", E_USER_WARNING);
			return;
		}

		if ($force > 100)
		{
			trigger_error("La force d'un personnage ne peut excéder 100", E_USER_WARNING);
			return;
		}

		$this->_force = $force;
	}

	public function setExperience($experience) // mutateur expérience
	{
		if (!is_int($experience)) // si ce n'est pas un nombre entier
		{
			trigger_error("L'expérience d'un personnage doit être un nombre entier", E_USER_WARNING);
			return;
		}

		if ($experience > 100)
		{
			trigger_error("L'experience d'un personnage ne peut excéder 100", E_USER_WARNING);
			return;
		}

		$this->_experience = $experience;
	}

	public function degats()
	{
		return $this->_degats;
	}

	public function force()
	{
		return $this->_force;
	}

	public function experience()
	{
		return $this->_experience;
	}
}
?>

• En pratique
<?php
$perso1 = new Personnage;
$perso2 = new Personnage;

$perso1->frapper($perso2);
$perso1->gagnerExperience();
$perso2->frapper($perso1);
$perso2->gagnerExperience();

echo 'Le personnage 1 a', $perso1->force(), 'de force, contrairement au personnage 2, qui a', $perso2->force(), 'de force.<br />';
echo 'Quant à l\'experience, le personnage 1 en dispose de', $perso1->experience(), 'quand le personnage en possède', $perso2->experience(), '.';
?>

• En pratique + valeurs différentes
<?php
$perso1 = new Personnage;
$perso2 = new Personnage;

$perso1->setForce(10);
$perso1->setExperience(2);

$perso2->setForce(90);
$perso2->setExperience(58);

// etc.

$perso1->frapper($perso2);
$perso1->gagnerExperience();
$perso2->frapper($perso1);
$perso2->gagnerExperience();

echo 'Le personnage 1 a', $perso1->force(), 'de force, contrairement au personnage 2, qui a', $perso2->force(), 'de force.<br />';
echo 'Quant à l\'experience, le personnage 1 en dispose de', $perso1->experience(), 'quand le personnage en possède', $perso2->experience(), '.';
?>

◘ LE CONSTRUCTEUR

- Créer/initialiser des attributs à la création de l'objet
- methode avec le nom __construct
- On l'utilise si des attributs doivent être initialisés ou qu'une connexsion à la BDD doit-être faite
- exécuté dès la création de l'objet
- toujours en public (sinon inopérable) (quelques exceptions cependant)
- appelle les mutateurs pour respecter les valeurs à rentrer 

<?php
class Personnage 
{
	private $_force;
	private $_localisation;
	private $_experience;
	private $_degats;

	public function __construct($force, $degats)
	{
		echo 'Personnage initialisé !'; // message qui s'affiche à chaque création de personnage
		$this->setForce($force); // initialisation de la force
		$this->setDegats($degats); // initialisation des dégâts
		$this->_experience = 1; // initialisation de l'expérience à 1
	}

	// Mutateur chargé de modifier l'attribut $_force.
	public function setForce($force)
	{
		if (!is_int($force)) // S'il ne s'agit pas d'un nombre entier.
		{
		trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
		return;
		}

		if ($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
		{
		trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
		return;
		}

		$this->_force = $force;
	}

	// Mutateur chargé de modifier l'attribut $_degats.
	public function setDegats($degats)
	{
		if (!is_int($degats)) // S'il ne s'agit pas d'un nombre entier.
		{
		trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
		return;
		}

    $this->_degats = $degats;
  	}
}

$perso1 = new Personnage(10, 0); // 10 de force, 10 dégâts
$perso2 = new Personnage(90, 27); // 90 de force, 27 de dégâts
?>

◘ L'AUTO-CHARGEMENT DES CLASSES

- Pour une question d'organisation, il vaut mieux créer UN fichier par CLASSE;
- Puis vous l'appelez dans votre fichier :
<?php 
require 'MaClasse.php'; // on inclut la classe

$objet = new MaClasse; // instanciation
?>
- Pour inclure plusieurs classes, on fait appel à l'auto-chargement des classes
- Créer une fonction qui chargeront le fichier déclarant la classe
- Pour charger une classe :
<?php 
function chargerClasse($classe)
{
	require $classe . '.php';
}
?>
- Instancier une classe non déclarée :
<?php 
function chargerClasse($classe)
{
	require $classe . '.php';
}

spl_autoload_register('chargerClasse'); // on enregiste la fonction en autoload pour qu'elle soit appelée dès que l'on instanciera une classe non déclarée

$perso = new Personnage;
?>
En PHP, il y a ce qu'on appelle une « pile d'autoloads ». Cette pile contient une liste de fonctions. Chacune d'entre elles sera appelée automatiquement par PHP lorsque l'on essaye d'instancier une classe non déclarée.
On peut enregistrer autant de fonctions en autoload que vous le voulez avec spl_autoload_register. Si vous en enregistrez plusieurs, elles seront appelées dans l'ordre de leur enregistrement jusqu'à ce que la classe soit chargée. Pour y parvenir, il suffit d'appeler spl_autoload_register pour chaque fonction à enregistrer.


III) L'OPERATEUR DE RESOLUTION DE PORTEE (::)

◘ Les constantes de classe

- Permettent d'éviter tout code muet (qui ne semble pas avoir de signification claire en le voyant)
- attribut de la classe qui ne change jamais
- pas de $ devant son nom !
- la constante appartient à la classe et non à l'objet 
- par conséquent, on l'appelle avec l'opérateur ::
- les noms de constante sont en MAJUSCULE (convention de dénomination)
<?php 
class Personnage 
{
	private $_force;
	private $_localisation;
	private $_experience;
	private $_degats;

	// déclaration des constantes en rapport avec la force
	const FORCE_PETITE = 20;
	const FORCE_MOYENNE = 50;
	const FORCE_GRANDE = 80;

	public function __construct($forceInitiale)
	{
		// on assigne la valeur de son attribut uniquement depuis son setter
		$this->setForce($forceInitiale);
	}

	public function setForce($force)
	{
		// on vérifie que l'on nous donne soit une force petite, moyenne ou grande
		if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE]))
		{
			$this->_force = $force;
		}
	}

	//etc.
}

// on envoie une force moyenne en guise de force initiale
$perso = new Personnage(Personnage::FORCE_MOYENNE);
?>

◘ Les attributs et méthodes statiques

• Les méthodes statiques

- Méthodes qui sont faites pour agir sur une classe (et non un objet)
- pas de $this (qui fait référence à l'objet courant)
- Il est toutefois possible de l'appeler depuis un objet ($obj->methodeStatique()), mais, même dans ce contexte, la variable $this ne sera toujours pas passée !
- Pour déclarer une méthode statique : static (après le type de visibilité) function
<?php
class Personnage
{
	private $_attribut;

	const CONSTANTE = 0;

	public function __construct()
	{

	}

	public function setForce()
	{

	}

	// le mot-clé static peut aussi être placé avant la visibilité de la méthode (ici, public)
	public static function parler()
	{
		echo 'Comment ça, à table ?';
		// jamais de $this dans cette méthode !
	}
}

// Pour appeler la méthode :
Personnage::parler();
// on peut aussi appeler la méthode sur un objet (même résultat, mais plus sujette aux erreurs et ne désigne par directement la classe qui renferme la méthode) :
$perso = new Personnage(Personnage::FORCE_GRANDE);
$perso->parler();
?>

• Les attributs statiques 

- Un attribut statique appartient à la classe (et non à l'objet)
- Cet attribut aura la même valeur pour tous les objets
- Sert à avoir des attributs indépendants de tout objet
- Si l'un des objets modifie sa valeur, tous les autres objets qui accéderont à cet attribut obtiendront la nouvelle valeur 
- La déclaration d'un attribut statique s'effectue en plaçant avant son nom le mot-clé static 
<?php 
class Personnage
{
	private $_attribut;

	const CONSTANTE = 0;

	private static $_texte = 'Comment ça, à table ?';

	public static function parler()
	{
		echo self::$texte; // on donne le texte à dire
		// self : moi-même, la classe
	}
}
?>

Ex. Une classe où l'on vérifie le nombre de fois où elle a été instanciée 
<?php
class Compteur
{
	private static $_compteur = 0; // déclaration de la variable $compteur

	public function __construct()
	{
		self::$_compteur++; // incrémentation de la variable $compteur rattachée à la classe (d'où le self)
	}

	public static function getCompteur() // méthode statique qui renvoie la valeur du compteur
	{
		return self::$_compteur;
	}
}

$test1 = new Compteur;
$test2 = new Compteur;
$test3 = new Compteur; 

echo Compteur::getCompteur();
?>

À retenir :
- $this = l'objet 
- self = la classe
- constante = valeur qui ne changera JAMAIS
- statique = valeur inhérente à la classe, mais qui peut être changée (ex. de la variable $_compteur) (elle deviendra la nouvelle valeur de la classe)
N'a pas besoin d'instanciation pour être disponible


IV) MANIPULATION DE DONNEES STOCKEES

◘ Une entité, un objet

• Travailler avec des objets

Je souhaite créer ma classe, pour créer ensuite mes objets. Je commence par où ?
Une classe est composée de parties :
- attribut (caractéristiques de l'objet)
- méthodes (fonctionnalités)
- constantes (éventuellement)
Quelles sont les caractéristiques et les fonctionnalités de mes objets ?
Ex. Créer une classe pour créer des objets Personnages
<?php
class Personnage
{
	private $_id; // correspond au champ "id" de la BDD
	private $_nom; // idem
	private $_forcePerso; // etc.
	private $_degats;
	private $_niveau;
	private $_experience;
	// puis on écrit les getters (récupérer la valeur d'un attribut) et setters (le modifier)

	// les getters
	public function id()
	{
		return $this->_id;
	}

	public function nom()
	{
		return $this->_nom;
	}
	// etc.

	// les setters
	public function setId($id)
	{
		$id = (int) $id; // convertit l'argument en nombre entier (donne un nombre ou 0)
		if ($id > 0)
		{
			$this->_id = $id;
		}
	}

	public function setNom($nom)
	{
		if (is_string($nom))
		{
			$this->_nom = $nom;
		}
	}

	public function setForcePerso($forcePerso)
	{
		$forcePerso = (int) $forcePerso;
		if ($forcePerso >= 1 && $forcePerso <= 100)
		{
			$this->_forcePerso = $forcePerso;
		}
	}

	public function setDegats($degats)
	{
		$degats = (int) $degats;
		if ($degats >= 0 && $degats <= 100)
		{
			$this->_degats = $degats;
		}
	}

	public function setNiveau($niveau)
	{
		$niveau = (int) $niveau;
		if ($niveau >= 1 && $niveau <= 100)
		{
			$this->_niveau = $niveau;
		}
	}

	public function setExperience($experience)
	{
		$experience = (int) $experience;
		if ($experience >= 1 && $experience <= 100)
		{
			$this->_experience = $experience;
		}
	}
}

// $db est un objet PDO
$request = $db->query("SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages");
while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) // chaque entrée est placée dans un array
// on passe les données stockées dans le tableau au constructeur de la classe
// le constructeur de la classe appelle chaque setter pour assigner les valeurs données en argument
$perso = new Personnage($donnees);
echo $perso->nom(), ' a ', $perso->forcePerso(), ' de force, ', $perso->degats(), ' de dégâts, ', $perso->experience(), ' d\'expérience et est au niveau ', $perso->niveau();
?>

◘ L'HYDRATATION

• Théorie et pratique

Hydrater un objet = lui apporter ce dont il a besoin pour fonctionner (lui fournir des données correspondant à ses attributs)
Il faut donc ajouter à l'objet l'action de s'hydrater
<?php
class Personnage
{
	private $_id;
	// etc.

	// un tableau de données doit être passé à la fonction
	public function hydrate(array $donnees)
	{
		// méthode peu flexible
		if (isset($donnees['id']))
		{
			$this->setId($donnees['id']);
		}

		// méthode approuvée
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key); // ex. setId (ucfirst met en MAJ la première lettre)

			if (method_exists($this, $method)) // method_exists(nom de la classe, nom de la méthode)
			{
				// on appelle le setter
				$this->$method($value);
			}
		}
	}
}
?>

Appeler une méthode dynamiquement (une méthode dont le nom n'est pas connu à l'avance)
<?php
class A
{
  public function hello()
  {
    echo 'Hello world !';
  }
}

$a = new A;
$method = 'hello';

$a->$method(); // Affiche : « Hello world ! »
?>


◘ GERER SA BDD CORRECTEMENT

• Une classe, un rôle 

Un objet instanciant une classe (comme Personnage) a pour rôle de REPRESENTER une ligne présente en BDD.
Pour gérer cette ligne, on fait appel à un autre objet dont le ROLE est de GERER cette ligne = le MANAGER

• Les caractéristiques d'un manager

De quoi a besoin un manager pour fonctionner ?
- une connexion à la BDD pour effectuer les requêtes

<?php
class PersonnagesManager
{
	private $_db;
}
?>

• Les fonctionnalités d'un manager 
- enregister une entité
- modifier une entité
- supprimer une entité
- sélectionner une entité
- un constructeur pour récupérer l'objet PDO à l'instanciation
- un setter pour modifier l'attribut $_db
<?php
class PersonnagesManager
{
	private $_db;

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function add(Personnage $perso) // objet Personnage exigé en paramètre
	{
		// preparation de la requête
		// assignation des valeurs
		// exécution de la requête
		$query = $this->_db->prepare("INSERT INTO personnages(nom, forcePerso, degats, niveau, experience) VALUES(:nom, :forcePerso, :degats, :niveau, :experience)");

		$query->bindValue(':nom', $perso->nom()); // appelle la méthode qui retourne la valeur de $_nom
		$query->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
		$query->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
		$query->bindValue(':niveau', $perso->value(), PDO::PARAM_INT);
		$query->bindValue(':experience', $perso->value(), PDO::PARAM_INT);

		$query->execute();
	}

	public function delete(Personnage $perso)
	{
		// requête DELETE
		$this->_db->exec("DELETE FROM personnages WHERE id = ". $perso->id());
	}

	public function get($id)
	{
		// requête SELECT WHERE et retourne un objet Personnage
		$id = (int) $id;

		$query = $this->_db->query("SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages WHERE id =" . $id);

		$donnees = $query->fetch(PDO::FETCH_ASSOC);

		return new Personnage($donnees);
	}

	public function getList()
	{
		// retourne la liste de tous les personnages
		$persos = [];

		$query = $this->_db->query("SELECT id, nom, forcePerso, degats, niveau, experience, FROM personnages ORDER BY nom");

		while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
		{
			$persos[] = new Personnage($donnees);
		}

		return $persos;
	}

	public function update(Personnage $perso)
	{
		// preparation requête, assignation des valeurs, exécution de la requête
		$query = $this->_db->prepare("UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id");

		$query->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
		$query->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
		$query->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
		$query->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
		$query->bindValue(':id', $perso->id(), PDO::PARAM_INT);

		$query->execute();
	}

	public function setDb(PDO $db) // objet PDO exigé en paramètre
	{
		$this->_db = $db;
	}
}

// AJOUT DE PERSONNAGE A LA BDD

$perso = new Personnage([
	'nom' => 'Victor',
	'forcePerso' => 5,
	'degats' => 0,
	'niveau' => 1,
	'experience' => 0
]);

$db = new PDO('mysql:host=localhost;dbname=tests', 'root', '');
$manager = new PersonnagesManager($db)

$manager->add($perso);

?>


V) TP : MINI-JEU DE COMBAT

◘ PITCH

• CAHIER DES CHARGES

Créer un personnage qui peut se battre avec d'autres persos;
Personnage définit selon son nom et ses dégâts (0, début de partie, 5, un coup, 100, mort et suppression de la BDD);

• Pré-conception

De quoi avons-nous besoin ?
- Une BDD pour stocker les persos
- Une table
- champs : nom, degats, identifiant
- créer la table via phpMyadmin
- ou :
<?php
CREATE TABLE IF NOT EXISTS `personnages` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `degats` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
?>

◘ Première étape : le Personnage

Caractéristiques et fonctionnalités de mon objet ?

• Les caractéristiques du personnage

Les attributs d'un objet fonctionnant avec une BDD = les champs de celle-ci
<?php
class Personnage 
{
	private $_id, 
			$_degats,
			$_nom;
}
?>

• Les fonctionnalités du personnage

Que pourra faire un personnage ?
- Frapper un autre perso
- Recevoir des degats
- renvoie une valeur avec l'utilisation des constantes
<?php
class Personnage 
{
	private $_id, 
			$_degats,
			$_nom;

	const CEST_MOI = 1;
	const PERSONNAGE_TUE = 2;
	const PERSONNAGE_FRAPPE = 3;

	public function frapper(Personnage $perso)
	{
		// vérifier que l'on se se frappe pas soi-même et le cas échéant on annule et renvoie une valeur
		// le personnage frappé reçoit des degats
	}

	public function recevoirDegats()
	{
		// +5 à chaque degat
		// si degat >= 100, le personnage meurt : on renvoie une valeur l'annonçant
		// sinon, renvoie une valeur signifiant que le perso a été frappé
	}
}
?>

• Les getters et setters

<?php
class Personnage 
{
	private $_id, 
			$_degats,
			$_nom;

	const CEST_MOI = 1;
	const PERSONNAGE_TUE = 2;
	const PERSONNAGE_FRAPPE = 3;

	public function frapper(Personnage $perso)
	{
		// vérifier que l'on se se frappe pas soi-même et le cas échéant on annule et renvoie une valeur
		// le personnage frappé reçoit des degats
	}

	public function recevoirDegats()
	{
		// +5 à chaque degat
		// si degat >= 100, le personnage meurt : on renvoie une valeur l'annonçant
		// sinon, renvoie une valeur signifiant que le perso a été frappé
	}

	public function degats()
	{
		return $this->_degats;
	}

	public function id()
	{
		return $this->_id;
	}

	public function nom()
	{
		return $this->_nom;
	}

	public function setDegats($degats)
	{
		$degats = (int) $degats;

		if ($degats >= 0 && $degats <= 100)
		{
			$this->_degats = $degats;
		}
	}

	public function setId($id)
	{
		$id = (int) $id;

		if ($id > 0)
		{
			$this->_id = $id;
		}
	}

	public function setNom($nom)
	{
		if (is_string($nom))
		{
			$this->_nom = $nom;
		}
	}
}
?>

• Hydrater ses objets

<?php
class Personnage
{
	// attributs, constantes

	// le constructeur
	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}
	
	// la méthode d'hydartation appelée par le constructeur lors de l'instanciation
	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
}
?>

• Codons le tout !

<?php
class Personnage
{
  private $_degats,
          $_id,
          $_nom;
  
  const CEST_MOI = 1; // Constante renvoyée par la méthode `frapper` si on se frappe soi-même.
  const PERSONNAGE_TUE = 2; // Constante renvoyée par la méthode `frapper` si on a tué le personnage en le frappant.
  const PERSONNAGE_FRAPPE = 3; // Constante renvoyée par la méthode `frapper` si on a bien frappé le personnage.
  
  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }
  
  public function frapper(Personnage $perso)
  {
    if ($perso->id() == $this->_id)
    {
      return self::CEST_MOI;
    }

    // On indique au personnage qu'il doit recevoir des dégâts.
    // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE
    return $perso->recevoirDegats();
  }
  
  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }
  
  public function recevoirDegats()
  {
    $this->_degats += 5;
    
    // Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
    if ($this->_degats >= 100)
    {
      return self::PERSONNAGE_TUE;
    }
    
    // Sinon, on se contente de dire que le personnage a bien été frappé.
    return self::PERSONNAGE_FRAPPE;
  }
  
  
  // GETTERS //
  

  public function degats()
  {
    return $this->_degats;
  }
  
  public function id()
  {
    return $this->_id;
  }
  
  public function nom()
  {
    return $this->_nom;
  }
  
  public function setDegats($degats)
  {
    $degats = (int) $degats;
    
    if ($degats >= 0 && $degats <= 100)
    {
      $this->_degats = $degats;
    }
  }
  
  public function setId($id)
  {
    $id = (int) $id;
    
    if ($id > 0)
    {
      $this->_id = $id;
    }
  }
  
  public function setNom($nom)
  {
    if (is_string($nom))
    {
      $this->_nom = $nom;
    }
  }
}
?>


◘ SECONDE ETAPE : STOCKAGE EN BDD

Une classe, un rôle 
class Personnage = représente un perso
class PersonnagesManager = gérer les personnages 
Quelles seront les caractéristiques et fonctionnalités du manager ?

• Les caractéristiques d'un manager 

<?php 
class PersonnagesManager
{
	private $_db;
}
?>

• Les fonctionnalités du manager 

Enregistrer, Modifier, Supprimer, Selectionner (CRUD)
+ compter le nombre de persos, en faire une liste, savoir si un perso existe
+ un constructeur qui reçoit l'objet PDO
+ un setter pour modifier l'attribut $_bdd 

<?php
class PersonnagesManager
{
	private $_db;

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function add(Personnage $perso)
	{
		// preparation requête d'insertion
		// assignation des valeurs
		// exécution de la requête
		// hydratation du personnage passé en paramètre avec assignation de son identifiant et des dégâts initiaux (0)

		$query = $this->_db->prepare("INSERT INTO personnages(nom) VALUES(:nom)");
		$query->bindValue(':nom', $perso->nom());
		$query->execute();

		$perso->hydrate([
			'id' => $this->_db->lastInsertId(),
			'degats' => 0
		])
	}

	public function count()
	{
		// requête COUNT() + renvoie le nombre de résultats retourné
		return $this->_db->query("SELECT COUNT(*) FROM personnages")->fetchColumn();
	}

	public function delete(Personnage $perso)
	{
		// requête DELETE
		$this->_db->exec("DELETE FROM personnages WHERE id =" . $perso->id());
	}

	public function exists($info)
	{
		// Si le paramètre est un entier, on a un fourni un identifiant
		// On exécute une requête COUNT() + WHERE, puis on retourne un booléen

		// Sinon, c'est qu'on a passé un nom
		// Exécution d'une requête COUNT() + WHERE + retour booléen

		if (is_int($info)) // on veut voir s'il y a correspondance avec l'id rentré
		{
			return (bool) $this->_db->query("SELECT COUNT(*) FROM personnages WHERE id =" . $info)->fetchColumn();
		}

		// sinon, c'est pour vérifier si un nom existe
		$query = $this->_db->prepare("SELECT COUNT(*) FROM personnages WHERE nom = :nom");
		$query->execute([
			':nom' => $info
		])
		return (bool) $query->fetchColumn();
	}

	public function get($info)
	{
		// Le paramètre est un entier, on veut récupérer le perso via son ID
		// requête SELECT + WHERE + retourne un objet Personnage

		// Sinon on veut récupérer le personnage avec un nom
		// requête SELECT + WHERE + retourne un objet Personnage

		if (is_int($info))
		{
			$query = $this->_db->query("SELECT id, nom, degats FROM personnages WHERE id =" . $info);
			$data = $query->fetch(PDO::FETCH_ASSOC);

			return new Personnage($data);
		}
		else 
		{
			$query = $this->_db->prepare("SELECT id, nom, degats FROM personnages WHERE nom = :nom");
			$query->execute([
				':nom' => $info
			])

			return new Personnage($query->fetch(PDO::FETCH_ASSOC));
		}
	}

	public function getList($nom)
	{
		// retourne la liste des personnages dont le nom n'est pas $nom 
		// retourne un tableau d'instances de Personnage

		$persos = [];

		$query = $this->_db->prepare("SELECT id, nom, degats FROM personnages WHERE nom <> :nom ORDER BY nom");
		$query->execute([
			':nom' => $nom
		])

		while ($data = $query->fetch(PDO::FETCH_ASSOC))
		{
			$persos[] = new Personnage($data);
		}

		return $persos;
	}

	public function update(Personnage $perso)
	{
		// preparation d'une requête UPDATE
		// assignation des valeurs
		// exécution de la requête

		$query = $this->_db->prepare("UPDATE personnages SET degats = :degats WHERE id = :id");

		$query->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
		$query->bindValue(':id', $perso->id(), PDO::PARAM_INT);

		$query->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
?>


◘ TROISIEME ETAPE : L'UTILISATION DES CLASSES

Que doit afficher notre mini-jeu lorsqu'on ouvre la page pour la première fois ? 
Un petit formulaire nous demandant le nom du personnage qu'on veut créer ou utiliser.

<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combat</title>
    <meta charset="utf-8" />
  </head>
  <body>
    <form action="" method="post">
      <p>
        Nom : <input type="text" name="nom" maxlength="50" />
        <input type="submit" value="Créer ce personnage" name="creer" />
        <input type="submit" value="Utiliser ce personnage" name="utiliser" />
      </p>
    </form>
  </body>
</html>

Vient ensuite la partie traitement. Deux cas peuvent se présenter :

○ Le joueur a cliqué sur Créer ce personnage. Le script devra créer un objet Personnage en passant au constructeur un tableau contenant une entrée (le nom du personnage). Il faudra ensuite s'assurer que le personnage ait un nom valide et qu'il n'existe pas déjà. Après ces vérifications, l'enregistrement en BDD pourra se faire.

○ Le joueur a cliqué sur Utiliser ce personnage. Le script devra vérifier si le personnage existe bien en BDD. Si c'est le cas, on le récupère de la BDD. Pour savoir si le nom du personnage est valide, il va falloir implémenter une méthode nomValide() qui retournera true ou false suivant si le nom est valide ou pas. Un nom est valide s'il n'est pas vide.
<?php
class Personnage
{
  // ...
  
  public function nomValide()
  {
    return !empty($this->_nom);
  }
  
  // ...
}
?>

Cependant, avant de faire cela, il va falloir préparer le terrain.

○ Un autoload devra être créé (bien que non indispensable puisqu'il n'y a que deux classes).
○ Une instance de PDO devra être créée.
○ Une instance de notre manager devra être créée.

Puisque notre manager a été créé, pourquoi ne pas afficher en haut de page le nombre de personnages créés ?

<?php
// on enregistre l'autoload
function chargerClasse($classname)
{
	require $classname . '.php';
}

spl_autoload_register('chargerClasse');

$db = new PDO('mysql:host=localhost;dbname=combats', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$manager = new PersonnagesManager($db);

if (isset($_POST['creer']) && isset($_POST['nom'])) // si on a voulu créer un personnage
{
	$perso = new Personnage(['nom' => $_POST['nom']]); // on crée un nouveau personnage

	if (!$perso->nomValide())
	{
		$message = 'Le nom choisi est invalide.'; // le champ est vide
		unset($perso);
	}
	elseif ($manager->exists($perso->nom()))
	{
		$message = 'Le nom du personnage est déjà pris.';
		unset($perso);
	}
	else
	{
		$manager->add($perso);
	}
}

elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) // si on a voulu utiliser un personnage
{
	if ($manager->exists($_POST['nom'])) // si celui-ci existe
	{
		$perso = $manager->get($_POST['nom']);
	}
	else
	{
		$message = "Ce personnage n'existe pas !";
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combat</title>
    <meta charset="utf-8" />
  </head>
  <body>
    <p>Nombre de personnages créés : <?= $manager->count() ?></p>
<?php
if (isset($message)) // On a un message à afficher ?
  echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
?>
    <form action="" method="post">
      <p>
        Nom : <input type="text" name="nom" maxlength="50" />
        <input type="submit" value="Créer ce personnage" name="creer" />
        <input type="submit" value="Utiliser ce personnage" name="utiliser" />
      </p>
    </form>
  </body>
</html>

Une fois que nous avons un personnage, que se passera-t-il ?
Il faut en effet cacher ce formulaire et laisser place à d'autres informations. Je vous propose d'afficher, dans un premier temps, les informations du personnage sélectionné (son nom et ses dégâts), puis, dans un second temps, la liste des autres personnages avec leurs informations.
Il devra être possible de cliquer sur le nom du personnage pour le frapper.

<?php
// On enregistre notre autoload.
function chargerClasse($classname)
{
  require $classname.'.php';
}

spl_autoload_register('chargerClasse');

$db = new PDO('mysql:host=localhost;dbname=combats', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$manager = new PersonnagesManager($db);

if (isset($_POST['creer']) && isset($_POST['nom'])) // Si on a voulu créer un personnage.
{
  $perso = new Personnage(['nom' => $_POST['nom']]); // On crée un nouveau personnage.
  
  if (!$perso->nomValide())
  {
    $message = 'Le nom choisi est invalide.';
    unset($perso);
  }
  elseif ($manager->exists($perso->nom()))
  {
    $message = 'Le nom du personnage est déjà pris.';
    unset($perso);
  }
  else
  {
    $manager->add($perso);
  }
}

elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) // Si on a voulu utiliser un personnage.
{
  if ($manager->exists($_POST['nom'])) // Si celui-ci existe.
  {
    $perso = $manager->get($_POST['nom']);
  }
  else
  {
    $message = 'Ce personnage n\'existe pas !'; // S'il n'existe pas, on affichera ce message.
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combat</title>
    
    <meta charset="utf-8" />
  </head>
  <body>
    <p>Nombre de personnages créés : <?= $manager->count() ?></p>
<?php
if (isset($message)) // On a un message à afficher ?
{
  echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
}

if (isset($perso)) // Si on utilise un personnage (nouveau ou pas).
{
?>
    <fieldset>
      <legend>Mes informations</legend>
      <p>
        Nom : <?= htmlspecialchars($perso->nom()) ?><br />
        Dégâts : <?= $perso->degats() ?>
      </p>
    </fieldset>
    
    <fieldset>
      <legend>Qui frapper ?</legend>
      <p>
<?php
$persos = $manager->getList($perso->nom());

if (empty($persos))
{
  echo 'Personne à frapper !';
}

else
{
  foreach ($persos as $unPerso)
    echo '<a href="?frapper=', $unPerso->id(), '">', htmlspecialchars($unPerso->nom()), '</a> (dégâts : ', $unPerso->degats(), ')<br />';
}
?>
      </p>
    </fieldset>
<?php
}
else
{
?>
    <form action="" method="post">
      <p>
        Nom : <input type="text" name="nom" maxlength="50" />
        <input type="submit" value="Créer ce personnage" name="creer" />
        <input type="submit" value="Utiliser ce personnage" name="utiliser" />
      </p>
    </form>
<?php
}
?>
  </body>
</html>

Maintenant, quelque chose devrait vous titiller.
En effet, si on recharge la page, on atterrira à nouveau sur le formulaire.
Nous allons donc devoir utiliser le système de sessions. La première chose à faire sera alors de démarrer la session au début du script, juste après la déclaration de l'autoload.
La session démarrée, nous pouvons aisément sauvegarder notre personnage.
Pour cela, il nous faudra enregistrer le personnage en session (admettons dans$_SESSION['perso']) tout à la fin du code. Cela nous permettra, au début du script, de récupérer le personnage sauvegardé et de continuer le jeu.

<?php
// On enregistre notre autoload.
function chargerClasse($classname)
{
  require $classname.'.php';
}

spl_autoload_register('chargerClasse');

session_start(); // On appelle session_start() APRÈS avoir enregistré l'autoload.

if (isset($_GET['deconnexion']))
{
  session_destroy();
  header('Location: .');
  exit();
}

if (isset($_SESSION['perso'])) // Si la session perso existe, on restaure l'objet.
{
  $perso = $_SESSION['perso'];
}

$db = new PDO('mysql:host=localhost;dbname=combats', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$manager = new PersonnagesManager($db);

if (isset($_POST['creer']) && isset($_POST['nom'])) // Si on a voulu créer un personnage.
{
  $perso = new Personnage(['nom' => $_POST['nom']]); // On crée un nouveau personnage.
  
  if (!$perso->nomValide())
  {
    $message = 'Le nom choisi est invalide.';
    unset($perso);
  }
  elseif ($manager->exists($perso->nom()))
  {
    $message = 'Le nom du personnage est déjà pris.';
    unset($perso);
  }
  else
  {
    $manager->add($perso);
  }
}

elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) // Si on a voulu utiliser un personnage.
{
  if ($manager->exists($_POST['nom'])) // Si celui-ci existe.
  {
    $perso = $manager->get($_POST['nom']);
  }
  else
  {
    $message = 'Ce personnage n\'existe pas !'; // S'il n'existe pas, on affichera ce message.
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combat</title>
    
    <meta charset="utf-8" />
  </head>
  <body>
    <p>Nombre de personnages créés : <?= $manager->count() ?></p>
<?php
if (isset($message)) // On a un message à afficher ?
{
  echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
}

if (isset($perso)) // Si on utilise un personnage (nouveau ou pas).
{
?>
    <p><a href="?deconnexion=1">Déconnexion</a></p>
    
    <fieldset>
      <legend>Mes informations</legend>
      <p>
        Nom : <?= htmlspecialchars($perso->nom()) ?><br />
        Dégâts : <?= $perso->degats() ?>
      </p>
    </fieldset>
    
    <fieldset>
      <legend>Qui frapper ?</legend>
      <p>
<?php
$persos = $manager->getList($perso->nom());

if (empty($persos))
{
  echo 'Personne à frapper !';
}

else
{
  foreach ($persos as $unPerso)
    echo '<a href="?frapper=', $unPerso->id(), '">', htmlspecialchars($unPerso->nom()), '</a> (dégâts : ', $unPerso->degats(), ')<br />';
}
?>
      </p>
    </fieldset>
<?php
}
else
{
?>
    <form action="" method="post">
      <p>
        Nom : <input type="text" name="nom" maxlength="50" />
        <input type="submit" value="Créer ce personnage" name="creer" />
        <input type="submit" value="Utiliser ce personnage" name="utiliser" />
      </p>
    </form>
<?php
}
?>
  </body>
</html>
<?php
if (isset($perso)) // Si on a créé un personnage, on le stocke dans une variable session afin d'économiser une requête SQL.
{
  $_SESSION['perso'] = $perso;
}
// je ferme pour continuer le memo ?>

Il reste maintenant une dernière partie à développer : celle qui s'occupera de frapper un personnage.

Comment doit se passer la phase de traitement ? Avant toute chose, il faut bien vérifier que le joueur est connecté et que la variable $perso existe, sinon nous n'irons pas bien loin. Seconde vérification : il faut demander à notre manager si le personnage que l'on veut frapper existe bien. Si ces deux conditions sont vérifiées, alors on peut lancer l'attaque.

Pour lancer l'attaque, il va falloir récupérer le personnage à frapper grâce à notre manager. Ensuite, il suffira d'invoquer la méthode permettant de frapper le personnage.

Cependant, nous n'allons pas nous arrêter là. N'oubliez pas que cette méthode peut retourner 3 valeurs différentes :
○ Personnage::CEST_MOI. Le personnage a voulu se frapper lui-même.
○ Personnage::PERSONNAGE_FRAPPE. Le personnage a bien été frappé.
○ Personnage::PERSONNAGE_TUE. Le personnage a été tué.

Il va donc falloir afficher un message en fonction de cette valeur retournée. Aussi, seuls 2 de ces cas nécessitent une mise à jour de la BDD : si le personnage a été frappé ou s'il a été tué. En effet, si on a voulu se frapper soi-même, aucun des deux personnages impliqués n'a été modifié.

<?php
// On enregistre notre autoload.
function chargerClasse($classname)
{
  require $classname.'.php';
}

spl_autoload_register('chargerClasse');

session_start(); // On appelle session_start() APRÈS avoir enregistré l'autoload.

if (isset($_GET['deconnexion']))
{
  session_destroy();
  header('Location: .');
  exit();
}

$db = new PDO('mysql:host=localhost;dbname=combats', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$manager = new PersonnagesManager($db);

if (isset($_SESSION['perso'])) // Si la session perso existe, on restaure l'objet.
{
  $perso = $_SESSION['perso'];
}

if (isset($_POST['creer']) && isset($_POST['nom'])) // Si on a voulu créer un personnage.
{
  $perso = new Personnage(['nom' => $_POST['nom']]); // On crée un nouveau personnage.
  
  if (!$perso->nomValide())
  {
    $message = 'Le nom choisi est invalide.';
    unset($perso);
  }
  elseif ($manager->exists($perso->nom()))
  {
    $message = 'Le nom du personnage est déjà pris.';
    unset($perso);
  }
  else
  {
    $manager->add($perso);
  }
}

elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) // Si on a voulu utiliser un personnage.
{
  if ($manager->exists($_POST['nom'])) // Si celui-ci existe.
  {
    $perso = $manager->get($_POST['nom']);
  }
  else
  {
    $message = 'Ce personnage n\'existe pas !'; // S'il n'existe pas, on affichera ce message.
  }
}

elseif (isset($_GET['frapper'])) // Si on a cliqué sur un personnage pour le frapper.
{
  if (!isset($perso))
  {
    $message = 'Merci de créer un personnage ou de vous identifier.';
  }
  
  else
  {
    if (!$manager->exists((int) $_GET['frapper']))
    {
      $message = 'Le personnage que vous voulez frapper n\'existe pas !';
    }
    
    else
    {
      $persoAFrapper = $manager->get((int) $_GET['frapper']);
      
      $retour = $perso->frapper($persoAFrapper); // On stocke dans $retour les éventuelles erreurs ou messages que renvoie la méthode frapper.
      
      switch ($retour)
      {
        case Personnage::CEST_MOI :
          $message = 'Mais... pourquoi voulez-vous vous frapper ???';
          break;
        
        case Personnage::PERSONNAGE_FRAPPE :
          $message = 'Le personnage a bien été frappé !';
          
          $manager->update($perso);
          $manager->update($persoAFrapper);
          
          break;
        
        case Personnage::PERSONNAGE_TUE :
          $message = 'Vous avez tué ce personnage !';
          
          $manager->update($perso);
          $manager->delete($persoAFrapper);
          
          break;
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combat</title>
    
    <meta charset="utf-8" />
  </head>
  <body>
    <p>Nombre de personnages créés : <?= $manager->count() ?></p>
<?php
if (isset($message)) // On a un message à afficher ?
{
  echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
}

if (isset($perso)) // Si on utilise un personnage (nouveau ou pas).
{
?>
    <p><a href="?deconnexion=1">Déconnexion</a></p>
    
    <fieldset>
      <legend>Mes informations</legend>
      <p>
        Nom : <?= htmlspecialchars($perso->nom()) ?><br />
        Dégâts : <?= $perso->degats() ?>
      </p>
    </fieldset>
    
    <fieldset>
      <legend>Qui frapper ?</legend>
      <p>
<?php
$persos = $manager->getList($perso->nom());

if (empty($persos))
{
  echo 'Personne à frapper !';
}

else
{
  foreach ($persos as $unPerso)
  {
    echo '<a href="?frapper=', $unPerso->id(), '">', htmlspecialchars($unPerso->nom()), '</a> (dégâts : ', $unPerso->degats(), ')<br />';
  }
}
?>
      </p>
    </fieldset>
<?php
}
else
{
?>
    <form action="" method="post">
      <p>
        Nom : <input type="text" name="nom" maxlength="50" />
        <input type="submit" value="Créer ce personnage" name="creer" />
        <input type="submit" value="Utiliser ce personnage" name="utiliser" />
      </p>
    </form>
<?php
}
?>
  </body>
</html>
<?php
if (isset($perso)) // Si on a créé un personnage, on le stocke dans une variable session afin d'économiser une requête SQL.
{
  $_SESSION['perso'] = $perso;
}
// idem ?>


◘ AMELIORATIONS POSSIBLES

• Un système de niveau. Vous pourriez très bien assigner à chaque personnage un niveau de 1 à 100. Le personnage bénéficierait aussi d'une expérience allant de 0 à 100. Lorsque l'expérience atteint 100, le personnage passe au niveau suivant.

○ Indice : le niveau et l'expérience deviendraient des caractéristiques du personnage, donc... Pas besoin de vous le dire, je suis sûr que vous savez ce que ça signifie !

• Un système de force. La force du personnage pourrait augmenter en fonction de son niveau, et les dégâts infligés à la victime seront donc plus importants.

○ Indice : de même, la force du personnage serait aussi une caractéristique du personnage.

• Un système de limitation. En effet, un personnage peut en frapper autant qu'il veut dans un laps de temps indéfini. Pourquoi ne pas le limiter à 3 coups par jour ?

○ Indice : il faudrait que vous stockiez le nombre de coups portés par le personnage, ainsi que la date du dernier coup porté. Cela ferait donc deux nouveaux champs en BDD, donc deux nouvelles caractéristiques pour le personnage !

• Un système de retrait de dégâts. Chaque jour, si l'utilisateur se connecte, il pourrait voir ses dégâts se soustraire de 10 par exemple.

○ Indice : il faudrait stocker la date de dernière connexion. À chaque connexion, vous regarderiez cette date. Si elle est inférieure à 24h, alors vous ne feriez rien. Sinon, vous retireriez 10 de dégâts au personnage puis mettriez à jour cette date de dernière connexion.


VI) L'HERITAGE

◘ Notion d'heritage

<?php
class Personnage // Création d'une classe simple.
{

}

class Magicien extends Personnage // Notre classe Magicien hérite des attributs (mais intouchables car privés) et méthodes de Personnage, et y rajoute les siens.
{
	private $_magie; // Indique la puissance du magicien sur 100, sa capacité à produire de la magie.
  
  public function lancerUnSort($perso)
  {
    $perso->recevoirDegats($this->_magie); // On va dire que la magie du magicien représente sa force.
	}
	
	// Pour réécrire les méthodes, on les appelle dans le code
	public function gagnerExperience()
  {
    // On appelle la méthode gagnerExperience() de la classe parente
    parent::gagnerExperience();
    
    if ($this->_magie < 100)
    {
      $this->_magie += 10;
    }
  }
}

// Toutes les classes suivantes hériteront de Personnage (un guerrier, par ex., est un personnage).
class Guerrier extends Personnage
{

}

class Brute extends Personnage
{

}

// Les héritages peuvent s'effectuer à l'infini !

class MagicienBlanc extends Magicien // Classe MagicienBlanc héritant de Magicien.
{
	// les classes MagicienBlanc et MagicienNoir hériteront de tous les attributs et de toutes les méthodes des classes Magicien et Personnage.
}

class MagicienNoir extends Magicien // Classe MagicienNoir héritant de Magicien.
{

}
?>

Si la méthode parente retourne une valeur, vous pouvez la récupérer comme si vous appeliez une méthode normalement. Exemple :
<?php
class A
{
  public function test()
  {
    return 'test';
  }
}

class B extends A
{
  public function test()
  {
    $retour = parent::test();
    
    echo $retour;
  }
}

$b = new B;
$b->test(); // Affiche "test"
?>
Il n'y a que les méthodes de la classe parente non réécrites qui ont accès aux éléments privés. À partir du moment où l'on réécrit une méthode de la classe parente, la méthode appartient à la classe fille et n'a donc plus accès aux éléments privés.

Si vous redéfinissez une méthode, sa visibilité doit être la même ou plus permissive que dans la classe parente ! Si tel n'est pas le cas, une erreur fatale sera levée. Par exemple, vous ne pouvez redéfinir une méthode publique en disant qu'elle est privée, mais vous pouvez redéfinir une méthode privée en disant qu'elle est privée ou publique.


◘ Un nouveau type de visibilité : Protected 

Le type de visibilité protected est en fait une petite modification du type private : il a exactement les mêmes effets que private, à l'exception que toute classe fille aura accès aux éléments protégés.

<?php
class ClasseMere
{
  protected $attributProtege; // pas d'underscore pour les variables protégées (notation PEAR)
  private $_attributPrive;
  
  public function __construct()
  {
    $this->attributProtege = 'Hello world !';
    $this->_attributPrive = 'Bonjour tout le monde !';
  }
}

class ClasseFille extends ClasseMere
{
  public function afficherAttributs()
  {
    echo $this->attributProtege; // L'attribut est protégé, on a donc accès à celui-ci.
    echo $this->_attributPrive; // L'attribut est privé, on n'a pas accès celui-ci, donc rien ne s'affichera (mis à part une notice si vous les avez activées).
  }
}

$obj = new ClasseFille;

echo $obj->attributProtege; // Erreur fatale.
echo $obj->_attributPrive; // Rien ne s'affiche (ou une notice si vous les avez activées).

$obj->afficherAttributs(); // Affiche « Hello world ! » suivi de rien du tout ou d'une notice si vous les avez activées.
?>

La portée private est, selon moi, bien trop restrictive et contraignante. Elle empêche toute classe enfant d'accéder aux attributs et méthodes privées alors que cette dernière en a souvent besoin. De manière générale, je vous conseille donc de toujours mettre protected au lieu de private, à moins que vous teniez absolument à ce que la classe enfant ne puisse y avoir accès (utile si vous comptez partager votre classe).


◘ Imposer des contraintes 

Il est possible de mettre en place des contraintes. On parlera alors d'abstraction ou de finalisation suivant la contrainte instaurée.

• Abstraction

But = empêcher quiconque d'instancier telle classe;
On ne pourra pas se servir directement de la classe. La seule façon d'exploiter ses méthodes est de créer une classe héritant de la classe abstraite.
<?php
abstract class Personnage // Notre classe Personnage est abstraite, une classe modèle.
{

}

class Magicien extends Personnage // Création d'une classe Magicien héritant de la classe Personnage.
{

}

$magicien = new Magicien; // Tout va bien, la classe Magicien n'est pas abstraite.
$perso = new Personnage; // Erreur fatale car on instancie une classe abstraite.
?>

○ Méthodes abstraites

Si vous décidez de rendre une méthode abstraite en plaçant le mot-clé abstract juste avant la visibilité de la méthode, vous forcerez toutes les classes filles à écrire cette méthode. Si tel n'est pas le cas, une erreur fatale sera levée. Puisque l'on force la classe fille à écrire la méthode, on ne doit spécifier aucune instruction dans la méthode, on déclarera juste son prototype (visibilité + function + nomDeLaMethode + parenthèses avec ou sans paramètres + point-virgule).
! La classe doit AUSSI être abstraite !

<?php
abstract class Personnage
{
  // On va forcer toute classe fille à écrire cette méthode car chaque personnage frappe différemment.
  abstract public function frapper(Personnage $perso);
  
  // Cette méthode n'aura pas besoin d'être réécrite.
  public function recevoirDegats()
  {
    // Instructions.
  }
}

class Magicien extends Personnage
{
  // On écrit la méthode « frapper » du même type de visibilité que la méthode abstraite « frapper » de la classe mère.
  public function frapper(Personnage $perso)
  {
    // Instructions.
  }
}
?>

• Finalisation

○ Classe finale
Si une classe est finale, vous ne pourrez pas créer de classe fille héritant de cette classe.
Pour ma part, je ne rends jamais mes classes finales (au même titre que, à quelques exceptions près, je mets toujours mes attributs en protected) pour me laisser la liberté d'hériter de n'importe quelle classe.
<?php
// Classe abstraite servant de modèle.

abstract class Personnage
{

}

// Classe finale, on ne pourra créer de classe héritant de Guerrier.

final class Guerrier extends Personnage
{

}

// Erreur fatale, car notre classe hérite d'une classe finale.

class GentilGuerrier extends Guerrier
{

}
?>

○ Méthodes finales

Si vous déclarez une méthode finale, toute classe fille de la classe comportant cette méthode finale héritera de cette méthode mais ne pourra la redéfinir. Si vous déclarez votre méthode recevoirDegats en tant que méthode finale, vous ne pourrez la redéfinir.
<?php
abstract class Personnage
{
  // Méthode normale.
  
  public function frapper(Personnage $perso)
  {
    // Instructions.
  }
  
  // Méthode finale.
  
  final public function recevoirDegats()
  {
    // Instructions.
  }
}

class Guerrier extends Personnage
{
  // Aucun problème.
  
  public function frapper(Personnage $perso)
  {
    // Instructions.
  }
  
  // Erreur fatale car cette méthode est finale dans la classe parente.
  
  public function recevoirDegats()
  {
    // Instructions.
  }
}
?>

◘ Résolution statique à la volée

Effectuons d'abord un petit flash-back sur self::. Vous vous souvenez à quoi il sert ? À appeler un attribut, une méthode statique ou une constante de la classe dans laquelle est contenu self::.
<?php
class Mere
{
  public static function lancerLeTest()
  {
    self::quiEstCe();
  }
  
  public static function quiEstCe()
  {
    echo 'Je suis la classe <strong>Mere</strong> !';
  }
}

class Enfant extends Mere
{
  public static function quiEstCe()
  {
    echo 'Je suis la classe <strong>Enfant</strong> !';
  }
}

Enfant::lancerLeTest(); // affiche Je suis la classe Mère (malheureusement)
?>

Explications :

    • appel de la méthode lancerLeTest de la classe Enfant ;

    • la méthode n'a pas été réécrite, on va donc « chercher » la méthode lancerLeTest de la classe mère ;

	• appel de la méthode quiEstCe de la classeMere.
	
Pourquoi c'est la méthode quiEstCe de la classe parente qui a été appelée ? Pourquoi pas celle de la classe fille puisqu'elle a été récrite ?
	
Tout simplement parce que self:: fait appel à la méthode statique de la classe dans laquelle est contenu self::, donc de la classe parente.

Et la résolution statique à la volée dans tout ça ?

Tout tourne autour de l'utilisation de static::. static:: a exactement le même effet que self::, à l'exception près que static::appelle l'élément de la classe qui est appelée pendant l'exécution. C'est-à-dire que si j'appelle la méthode lancerLeTest depuis la classe Enfant et que dans cette méthode j'utilise static:: au lieu de self::, c'est la méthode quiEstCe de la classe Enfant qui sera appelée et non de la classe Mere !

<?php
class Mere
{
  public static function lancerLeTest()
  {
    static::quiEstCe();
  }
  
  public function quiEstCe()
  {
    echo 'Je suis la classe <strong>Mere</strong> !';
  }
}

class Enfant extends Mere
{
  public static function quiEstCe()
  {
    echo 'Je suis la classe <strong>Enfant</strong> !';
  }
}

Enfant::lancerLeTest(); // affiche Je suis la classe enfant
?>

Tous les exemples ci-dessus utilisent des méthodes qui sont appelées dans un contexte statique. J'ai fait ce choix car pour ce genre de tests, il était inutile d'instancier la classe, mais sachez bien que la résolution statique à la volée a exactement le même effet quand on crée un objet puis qu'on appelle une méthode de celui-ci. Il n'est donc pas du tout obligatoire de rendre les méthodes statiques pour pouvoir y placer static::. Ainsi, si vous testez ce code, à l'écran s'affichera la même chose que précédemment :
<?php
class Mere
{
  public function lancerLeTest()
  {
    static::quiEstCe();
  }
  
  public function quiEstCe()
  {
    echo 'Je suis la classe « Mere » !';
  }
}

class Enfant extends Mere
{
  public function quiEstCe()
  {
    echo 'Je suis la classe « Enfant » !';
  }
}

$e = new Enfant;
$e->lancerLeTest();
?>

• Cas complexes 

Imaginons trois classes A, B et C qui héritent chacune d'une autre (A est la grand-mère, B la mère et C la fille).
<?php
class A
{
  public function quiEstCe()
  {
    echo 'A';
  }
}

class B extends A
{
  public static function test()
  {
    parent::quiEstCe();
  }
  
  public function quiEstCe()
  {
    echo 'B';
  }
}

class C extends B
{
  public function quiEstCe()
  {
    echo 'C';
  }
}

C::test(); // affiche 'A"
?>

Maintenant, créons une méthode dans la classe A qui sera chargée d'appeler la méthode quiEstCe avec static:: .

<?php
class A
{
  public function appelerQuiEstCe()
  {
    static::quiEstCe();
  }
  
  public function quiEstCe()
  {
    echo 'A';
  }
}

class B extends A
{
  public static function test()
  {
    parent::appelerQuiEstCe();
  }
  
  public function quiEstCe()
  {
    echo 'B';
  }
}

class C extends B
{
  public function quiEstCe()
  {
    echo 'C';
  }
}

C::test(); // affiche C
?>
Explications :

    • Appel de la méthode test de la classeC;

    • la méthode n'a pas été réécrite, on appelle donc la méthode test de la classe B ;

    • on appelle maintenant la méthode appelerQuiEstCe de la classe A (avec parent::) ;

    • résolution statique à la volée : on appelle la méthode quiEstCe de la classe qui a appelé la méthode appelerQuiEstCe ;

    • la méthode quiEstCe de la classe C est donc appelée car c'est depuis la classe C qu'on a appelé la méthode test.

Remplaçons maintenant parent:: par self:: :
<?php
class A
{
  public function appelerQuiEstCe()
  {
    static::quiEstCe();
  }
  
  public function quiEstCe()
  {
    echo 'A';
  }
}

class B extends A
{
  public static function test()
  {
    self::appelerQuiEstCe();
  }
  
  public function quiEstCe()
  {
    echo 'B';
  }
}

class C extends B
{
  public function quiEstCe()
  {
    echo 'C';
  }
}

C::test(); // affiche C
?>

Si vous cassez la chaîne en appelant une méthode depuis une instance ou statiquement du genreClasse::methode(), la méthode appelée par static:: sera celle de la classe contenant ce code ! Ainsi, le code suivant affichera « A ».
<?php
class A
{
  public static function appelerQuiEstCe()
  {
    static::quiEstCe();
  }
  
  public function quiEstCe()
  {
    echo 'A';
  }
}

class B extends A
{
  public static function test()
  {
    // On appelle « appelerQuiEstCe » de la classe « A » normalement.
    A::appelerQuiEstCe();
  }
  
  public function quiEstCe()
  {
    echo 'B';
  }
}

class C extends B
{
  public function quiEstCe()
  {
    echo 'C';
  }
}

C::test(); // affiche A
?>

• Utilisation de static:: dans un contexte non statique

L'utilisation de static:: dans un contexte non statique se fait de la même façon que dans un contexte statique.
<?php
class TestParent
{
  public function __construct()
  {
    static::qui();
  }
  
  public static function qui()
  {
    echo 'TestParent';
  }
}

class TestChild extends TestParent
{
  public function __construct()
  {
    static::qui();
  }
  
  public function test()
  {
    $o = new TestParent();
  }
  
  public static function qui()
  {
    echo 'TestChild';
  }
}

$o = new TestChild;
$o->test(); // affichera « TestChild » suivi de « TestParent »
?>

Déroulement :
	• Création d'une instance de la classe TestChild;

    • appel de la méthode qui() de la classe TestChild puisque c'est la méthode __construct() de la classe TestChild qui a été appelée ;

    • appel de la méthode test() de la classe TestChild;

    • création d'une instance de la classe TestParent;

    • appel de la méthode qui() de la classe TestParent puisque c'est la méthode __construct() de cette classe qui a été appelée.


VII) TP : DES PERSONNAGES SPECIALISES

À retenir : 
Dans toutes les méthodes d'une classe, il est possible d'accéder à son nom grâce à <?php ::class ?>. 
Pour ce qui est à placer avant ce double deux-points, cela dépend de ce que vous voulez obtenir. 
Généralement, vous aurez le choix entre <?php self ?> et <?php static ?>.
<?php
class Mere
{
    public function __construct()
	{
		echo static::class; // si self::, affiche "Mere"
	}
}

class Fille extends Mere
{

}

new Fille; // affiche "Fille"
?>

<?php
abstract class Personnage
{
  protected $atout,
            $degats,
            $id,
            $nom,
            $timeEndormi,
            $type;
  
  const CEST_MOI = 1; // Constante renvoyée par la méthode `frapper` si on se frappe soit-même.
  const PERSONNAGE_TUE = 2; // Constante renvoyée par la méthode `frapper` si on a tué le personnage en le frappant.
  const PERSONNAGE_FRAPPE = 3; // Constante renvoyée par la méthode `frapper` si on a bien frappé le personnage.
  const PERSONNAGE_ENSORCELE = 4; // Constante renvoyée par la méthode `lancerUnSort` (voir classe Magicien) si on a bien ensorcelé un personnage.
  const PAS_DE_MAGIE = 5; // Constante renvoyée par la méthode `lancerUnSort` (voir classe Magicien) si on veut jeter un sort alors que la magie du magicien est à 0.
  const PERSO_ENDORMI = 6; // Constante renvoyée par la méthode `frapper` si le personnage qui veut frapper est endormi.
  
  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
    $this->type = strtolower(static::class);
  }
  
  public function estEndormi()
  {
    return $this->timeEndormi > time();
  }
  
  public function frapper(Personnage $perso)
  {
    if ($perso->id == $this->id)
    {
      return self::CEST_MOI;
    }
    
    if ($this->estEndormi())
    {
      return self::PERSO_ENDORMI;
    }
    
    // On indique au personnage qu'il doit recevoir des dégâts.
    // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE.
    return $perso->recevoirDegats();
  }
  
  public function recevoirDegats()
  {
    $this->degats += 5;
    
    // Si on a 100 de dégâts ou plus, on supprime le personnage de la BDD.
    if ($this->degats >= 100)
    {
      return self::PERSONNAGE_TUE;
    }
    
    // Sinon, on se contente de mettre à jour les dégâts du personnage.
    return self::PERSONNAGE_FRAPPE;
  }
}
?>

Index.php (à retenir)
<?php
$db = new PDO('mysql:host=localhost;dbname=combats', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

if (isset($_POST['creer']) && isset($_POST['nom'])) // Si on a voulu créer un personnage.
{
  switch ($_POST['type']) {
    case 'magicien':
      $perso = new Magicien(['nom' => $_POST['nom']]);
      break;

    case 'guerrier':
      $perso = new Guerrier(['nom' => $_POST['nom']]);
      break;

    default:
      $message = 'Le type du personnage est invalide.';
      break;
  }

  if (isset($perso)) // Si le type du personnage est valide, on a créé un personnage.
  {
    if (!$perso->nomValide()) {
      $message = 'Le nom choisi est invalide.';
      unset($perso);
    } elseif ($manager->exists($perso->nom())) {
      $message = 'Le nom du personnage est déjà pris.';
      unset($perso);
    } else {
      $manager->add($perso);
    }
  }
} 

elseif (isset($_GET['frapper'])) // Si on a cliqué sur un personnage pour le frapper.
{
  if (!isset($perso)) {
    $message = 'Merci de créer un personnage ou de vous identifier.';
  } else {
    if (!$manager->exists((int) $_GET['frapper'])) {
      $message = 'Le personnage que vous voulez frapper n\'existe pas !';
    } else {
      $persoAFrapper = $manager->get((int) $_GET['frapper']);
      $retour = $perso->frapper($persoAFrapper); // On stocke dans $retour les éventuelles erreurs ou messages que renvoie la méthode frapper.

      switch ($retour) {
        case Personnage::CEST_MOI:
          $message = 'Mais... pourquoi voulez-vous vous frapper ???';
          break;

        case Personnage::PERSONNAGE_FRAPPE:
          $message = 'Le personnage a bien été frappé !';

          $manager->update($perso);
          $manager->update($persoAFrapper);

          break;

        case Personnage::PERSONNAGE_TUE:
          $message = 'Vous avez tué ce personnage !';

          $manager->update($perso);
          $manager->delete($persoAFrapper);

          break;

        case Personnage::PERSO_ENDORMI:
          $message = 'Vous êtes endormi, vous ne pouvez pas frapper de personnage !';
          break;
      }
    }
  }
}
?>


VIII) LES METHODES MAGIQUES

◘ Le principe

Une méthode magique est une méthode qui, si elle est présente dans votre classe,
sera appelée lors de tel ou tel évènement. Le but des méthodes magiques est d'intercepter un évènement,
dire de faire ceci ou cela et retourner une valeur utile pour l’évènement si besoin il y a.
<?php
class MaClasse
{
  public function __construct() // méthode magique qui s'éxécute lors de l'évènement création d'un objet
  {
    echo 'Construction de MaClasse';
  }
  
  public function __destruct() // destructeur
  {
    echo 'Destruction de MaClasse';
  }
}

$obj = new MaClasse;
?>

◘ La surcharge magique des attributs et méthodes 

La surcharge magique d'attributs ou méthodes consiste à créer dynamiquement des attributs et méthodes. 
Cela est possible lorsque l'on tente d'accéder à un élément qui n'existe pas ou auquel on n'a pas accès 
(s'il est privé et qu'on tente d'y accéder depuis l'extérieur de la classe par exemple).

• _set et _get 

○ _set 
Méthode appelée lorsque l'on essaye d'assigner une valeur à un attribut auquel on n'a pas accès ou qui n'existe pas.
Cette méthode prend deux paramètres : le premier est le nom de l'attribut auquel on a tenté d'assigner une valeur,
le second paramètre est la valeur que l'on a tenté d'assigner à l'attribut.
<?php
class MaClasse
{
  private $unAttributPrive;
  
  public function __set($nom, $valeur)
  {
    echo 'Ah, on a tenté d\'assigner à l\'attribut <strong>', $nom, '</strong> la valeur <strong>', $valeur, '</strong> mais c\'est pas possible !<br />';
  }
}

$obj = new MaClasse;

$obj->attribut = 'Simple test'; // Ah, on a tenté d'assigner à l'attribut attribut la valeur Simple test mais c'est pas possible !
$obj->unAttributPrive = 'Autre simple test'; // Ah, on a tenté d'assigner à l'attribut unAttributPrive la valeur Autre simple test mais c'est pas possible !
?>

Ex. : stocker dans un tableau tous les attributs (avec leurs valeurs) que nous avons essayé de modifier ou créer :
<?php
class MaClasse
{
  private $attributs = [];
  private $unAttributPrive;
  
  public function __set($nom, $valeur)
  {
    $this->attributs[$nom] = $valeur;
  }
  
  public function afficherAttributs()
  {
    echo '<pre>', print_r($this->attributs, true), '</pre>';
  }
}

$obj = new MaClasse;

$obj->attribut = 'Simple test';
$obj->unAttributPrive = 'Autre simple test';

$obj->afficherAttributs();
?>

○ _get 
Méthode appelée lorsque l'on essaye d'accéder à un attribut qui n'existe pas ou auquel on n'a pas accès. 
Elle prend un paramètre : le nom de l'attribut auquel on a essayé d'accéder.
<?php
class MaClasse
{
  private $unAttributPrive;
  
  public function __get($nom)
  {
    return 'Impossible d\'accéder à l\'attribut <strong>' . $nom . '</strong>, désolé !<br />';
  }
}

$obj = new MaClasse;

echo $obj->attribut; // Impossible d'accéder à l'attribut attribut, désolé !
echo $obj->unAttributPrive; // Impossible d'accéder à l'attribut unAttributPrive, désolé !
?>

Ex. Vérifier si l'attribut auquel on a tenté d'accéder est contenu dans le tableau de stockage d'attributs :
<?php
class MaClasse
{
  private $attributs = [];
  private $unAttributPrive;
  
  public function __get($nom)
  {
    if (isset($this->attributs[$nom]))
    {
      return $this->attributs[$nom];
    }
  }
  
  public function __set($nom, $valeur)
  {
    $this->attributs[$nom] = $valeur;
  }
  
  public function afficherAttributs()
  {
    echo '<pre>', print_r($this->attributs, true), '</pre>';
  }
}

$obj = new MaClasse;

$obj->attribut = 'Simple test';
$obj->unAttributPrive = 'Autre simple test';

echo $obj->attribut;
echo $obj->autreAtribut;
?>

• _isset et _unset

○ _isset
Méthode appelée lorsque l'on appelle la fonction isset sur un attribut qui n'existe pas ou auquel on n'a pas accès.
Étant donné que la fonction initiale isset renvoie true ou false, la méthode magique __isset doit renvoyer un booléen. 
Cette méthode prend un paramètre : le nom de l'attribut que l'on a envoyé à la fonction isset.
<?php
class MaClasse
{
  // ...
  
  public function __isset($nom)
  {
    return isset($this->attributs[$nom]);
  }
}

$obj = new MaClasse;
$obj->attribut = 'Simple test';

if (isset($obj->attribut))
{
  echo 'L\'attribut <strong>attribut</strong> existe !<br />';
}
else
{
  echo 'L\'attribut <strong>attribut</strong> n\'existe pas !<br />';
}
?>

○ _unset
Méthode appelée lorsque l'on tente d'appeler la fonction unset sur un attribut inexistant ou auquel on n'a pas accès.
Cette méthode ne doit rien retourner.
<?php
class MaClasse
{
  private $attributs = [];
  
  public function __unset($nom)
  {
    if (isset($this->attributs[$nom]))
    {
      unset($this->attributs[$nom]);
    }
  }
}

$obj = new MaClasse;
$obj->attribut = 'Simple test';
$obj->unAttributPrive = 'Autre simple test';

if (isset($obj->attribut))
{
  echo 'L\'attribut <strong>attribut</strong> existe !<br />'; // affiché
}
else
{
  echo 'L\'attribut <strong>attribut</strong> n\'existe pas !<br />';
}

unset($obj->attribut); // appelle _unset

if (isset($obj->attribut))
{
  echo 'L\'attribut <strong>attribut</strong> existe !<br />';
}
else
{
  echo 'L\'attribut <strong>attribut</strong> n\'existe pas !<br />'; // affiché
}
?>

• _call et _callStatic

Méthodes que l'on appelle alors qu'on n'y a pas accès (soit elle n'existe pas, soit elle est privée)

○ _call
Méthode appelée lorsque l'on essayera d'appeler une telle méthode.
Elle prend deux arguments : le premier est le nom de la méthode que l'on a essayé d'appeler
et le second est la liste des arguments qui lui ont été passés (sous forme de tableau)
<?php
class MaClasse
{
  public function __call($nom, $arguments)
  {
    echo 'La méthode <strong>', $nom, '</strong> a été appelée alors qu\'elle n\'existe pas !
    Ses arguments étaient les suivants : <strong>', implode($arguments, '</strong>, <strong>'), '</strong>';
  }
}

$obj = new MaClasse;

$obj->methode(123, 'test'); // La méthode methode a été appelée alors qu'elle n'existe pas !
// Ses arguments étaient les suivants : 123, test
?>

○ _callStatic
Méthode appelée lorsque vous appelez une méthode dans un contexte statique alors qu'elle n'existe pas.
La méthode magique __callStatic doit obligatoirement être static!
<?php
class MaClasse
{
  public function __call($nom, $arguments)
  {
    echo 'La méthode <strong>', $nom, '</strong> a été appelée alors qu\'elle n\'existe pas ! Ses arguments étaient les suivants : <strong>', implode ($arguments, '</strong>, <strong>'), '</strong><br />';
  }
  
  public static function __callStatic($nom, $arguments)
  {
    echo 'La méthode <strong>', $nom, '</strong> a été appelée dans un contexte statique alors qu\'elle n\'existe pas ! Ses arguments étaient les suivants : <strong>', implode ($arguments, '</strong>, <strong>'), '</strong><br />';
  }
}

$obj = new MaClasse;

$obj->methode(123, 'test');

MaClasse::methodeStatique(456, 'autre test'); // La méthode methodeStatique a été appelée dans un contexte statique alors qu'elle n'existe pas !
// Ses arguments étaient les suivants : 456, autre test
?>

◘ Linéariser ses objets

Linéariser signifie que l'on transforme une variable en chaîne de caractères selon un format bien précis.
$_SESSION['key'] va linéariser automatiquement l'objet associé.
Cette chaîne de caractères pourra, quand on le souhaitera, être transformée dans l'autre sens (c'est-à-dire qu'on va restituer son état d'origine)

• Création de l'objet ($objetConnexion = new Connexion;) ;
• transformation de l'objet en chaîne de caractères ($_SESSION['connexion'] = serialize($objetConnexion);) ;
• changement de page ;
• transformation de la chaîne de caractères en objet ($objetConnexion = unserialize($_SESSION['connexion']);)

○ serialize()
Fonction qui retourne l'objet passé en paramètre sous forme de chaîne de caractères

○ unserialize()
Fonction qui retourne la chaîne de caractères passée en paramètre sous forme d'objet

○ serialize() et unserialize()
les fonctions ne se contentent pas de transformer le paramètre qu'on leur passe en autre chose :
elles vérifient si, dans l'objet passé en paramètre (pour serialize), il y a une méthode __sleep, auquel cas elle est exécutée.
Si c'est unserialize qui est appelée, la fonction vérifie si l'objet obtenu comporte une méthode __wakeup, auquel cas elle est appelée.

• serialize() et __sleep
La méthode magique __sleep est utilisée pour nettoyer l'objet ou pour sauver des attributs.
Si la méthode magique __sleep n'existe pas, tous les attributs seront sauvés. 
Cette méthode doit renvoyer un tableau avec les noms des attributs à sauver.
<?php
class Connexion
{
  protected $pdo, $serveur, $utilisateur, $motDePasse, $dataBase;
  
  public function __construct($serveur, $utilisateur, $motDePasse, $dataBase)
  {
    $this->serveur = $serveur;
    $this->utilisateur = $utilisateur;
    $this->motDePasse = $motDePasse;
    $this->dataBase = $dataBase;
    
    $this->connexionBDD();
  }
  
  protected function connexionBDD()
  {
    $this->pdo = new PDO('mysql:host='.$this->serveur.';dbname='.$this->dataBase, $this->utilisateur, $this->motDePasse);
  }
  
  public function __sleep()
  {
    // Ici sont à placer des instructions à exécuter juste avant la linéarisation.
    // On retourne ensuite la liste des attributs qu'on veut sauver.
    return ['serveur', 'utilisateur', 'motDePasse', 'dataBase'];
  }
}
?>

Ainsi, vous pourrez faire ceci :

<?php

$connexion = new Connexion('localhost', 'root', '', 'tests');

$_SESSION['connexion'] = serialize($connexion);

?>

• unserialize() et __wakeup

Maintenant, nous allons simplement implémenter la fonction __wakeup. Qu'allons-nous mettre dedans ?
Nous allons juste appeler la méthode connexionBDD qui se chargera de nous connecter à notre base de données
puisque les identifiants, serveur et nom de la base ont été sauvegardés et ainsi restaurés à l'appel de la fonction unserialize !
<?php
class Connexion
{
  protected $pdo, $serveur, $utilisateur, $motDePasse, $dataBase;
  
  public function __construct($serveur, $utilisateur, $motDePasse, $dataBase)
  {
    $this->serveur = $serveur;
    $this->utilisateur = $utilisateur;
    $this->motDePasse = $motDePasse;
    $this->dataBase = $dataBase;
    
    $this->connexionBDD();
  }
  
  protected function connexionBDD()
  {
    $this->pdo = new PDO('mysql:host='.$this->serveur.';dbname='.$this->dataBase, $this->utilisateur, $this->motDePasse);
  }
  
  public function __sleep()
  {
    return ['serveur', 'utilisateur', 'motDePasse', 'dataBase'];
  }
  
  public function __wakeup()
  {
    $this->connexionBDD();
  }
}
?>

Maintenant que vous savez ce qui se passe quand vous enregistrez un objet dans une entrée de session,
je vous autorise à ne plus appeler serialize et unserialize.
Ainsi, ce code fonctionne parfaitement :
<?php
session_start();

if (!isset($_SESSION['connexion']))
{
  $connexion = new Connexion('localhost', 'root', '', 'tests');
  $_SESSION['connexion'] = $connexion;
  
  echo 'Actualisez la page !';
}

else
{
  echo '<pre>';
  var_dump($_SESSION['connexion']); // On affiche les infos concernant notre objet.
  echo '</pre>';
}
?>

◘ Autres méthodes magiques

• __toString

La méthode magique __toString est appelée lorsque l'objet est amené à être converti en chaîne de caractères.
Cette méthode doit retourner la chaîne de caractères souhaitée.
<?php
class MaClasse
{
  protected $texte;
  
  public function __construct($texte)
  {
    $this->texte = $texte;
  }
  
  public function __toString()
  {
    return $this->texte;
  }
}

$obj = new MaClasse('Hello world !');

// Solution 1 : le cast
$texte = (string) $obj;
var_dump($texte); // Affiche : string(13) "Hello world !".

// Solution 2 : directement dans un echo
echo $obj; // Affiche : Hello world !
?>

• __set_state

La méthode magique __set_state est appelée lorsque vous appelez la fonction var_export en passant votre objet à exporter en paramètre.
Cette fonction var_export a pour rôle d'exporter la variable passée en paramètre sous forme de code PHP (chaîne de caractères).
Si vous ne spécifiez pas de méthode __set_state dans votre classe, une erreur fatale sera levée.

Notre méthode __set_state prend un paramètre, la liste des attributs ainsi que leur valeur dans un tableau associatif (['attribut' => 'valeur']).
Notre méthode magique devra retourner l'objet à exporter.
Il faudra donc créer un nouvel objet et lui assigner les valeurs qu'on souhaite, puis le retourner.

Puisque la fonction var_export retourne du code PHP valide, on peut utiliser la fonction eval
qui exécute du code PHP sous forme de chaîne de caractères qu'on lui passe en paramètre.

Par exemple, pour retourner un objet en sauvant ses attributs, on pourrait faire :
<?php
class Export
{
  protected $chaine1, $chaine2;
  
  public function __construct($param1, $param2)
  {
    $this->chaine1 = $param1;
    $this->chaine2 = $param2;
  }
  
  public function __set_state($valeurs) // Liste des attributs de l'objet en paramètre.
  {
    $obj = new Export($valeurs['chaine1'], $valeurs['chaine2']); // On crée un objet avec les attributs de l'objet que l'on veut exporter.
    return $obj; // on retourne l'objet créé.
  }
}

$obj1 = new Export('Hello ', 'world !');

eval('$obj2 = ' . var_export($obj1, true) . ';'); // On crée un autre objet, celui-ci ayant les mêmes attributs que l'objet précédent.

echo '<pre>', print_r($obj2, true), '</pre>';
?>

• __invoke

<?php
$obj = new MaClasse;
$obj('Petit test'); // Utilisation de l'objet comme fonction.
?>
Essayez ce code et… BAM ! Une erreur fatale.
Pour résoudre ce problème, nous allons devoir utiliser la méthode magique __invoke.
Elle est appelée dès qu'on essaye d'utiliser l'objet comme fonction (comme on vient de faire).
Cette méthode comprend autant de paramètres que d'arguments passés à la fonction.

Exemple :
<?php
class MaClasse
{
  public function __invoke($argument)
  {
    echo $argument;
  }
}

$obj = new MaClasse;

$obj(5); // Affiche « 5 ».
?>

• __debugInfo

Cette méthode magique est invoquée sur notre objet lorsqu'on appelle la fonction var_dump().
Si on lui donne un objet, var_dump va afficher les détails de tous les attributs de l'objet, qu'ils soient publics, protégés ou privés.
La méthode magique __debugInfo permet de modifier ce comportement en ne sélectionnant que les attributs à afficher ainsi que ce qu'il faut afficher.
Pour ce faire, cette méthode renverra sous forme de tableau associatif la liste des attributs à afficher avec leurs valeurs.
<?php
class FileReader
{
    protected $f;

	public function __construct($path)
	{
		$this->f = fopen($path, 'c+');
	}

	public function __debugInfo()
	{
		return ['f' => fstat($this->f)];
	}
}

$f = new FileReader('fichier.txt');
var_dump($f); // Affiche les informations retournées par fstat.
?>

◘ En résumé

  • Les méthodes magiques sont des méthodes qui sont appelées automatiquement lorsqu'un certain évènement est déclenché.
  • Toutes les méthodes magiques commencent par deux underscores, évitez donc d'appeler vos méthodes suivant ce même modèle.
  • Les méthodes magiques dont vous vous servirez le plus souvent sont __construct, __set, __get et __call.
    Les autres sont plus « gadget » et vous les rencontrerez moins souvent.


IX) COMPRENDRE LES OBJETS

◘ Un objet, un identifiant

À l'instanciation d'une classe, la variable stockant l'objet ne stocke en fait pas l'objet lui-même,
mais un identifiant (unique) qui représente cet objet. $objet = new Classe = identifiant unique
Comme le champ unique "id" de la BDD, quand vous accédez à un attribut ou à une méthode de l'objet,
PHP regarde l'identifiant contenu dans la variable, va chercher l'objet correspondant et effectue le traitement nécessaire.
<?php
class MaClasse
{
  public $attribut1;
  public $attribut2;
}

$a = new MaClasse;

$b = $a; // On assigne à $b l'identifiant de $a, donc $a et $b représentent le même objet.
// $a et $b font donc référence à la même instance.

$a->attribut1 = 'Hello';
echo $b->attribut1; // Affiche Hello.

$b->attribut2 = 'Salut';
echo $a->attribut2; // Affiche Salut.
?>

Lorsqu'un objet est passé en paramètre à une fonction ou renvoyé par une autre,
on ne passe pas une copie de l'objet mais une copie de son identifiant !
Ainsi, vous n'êtes pas obligé de passer l'objet en référence,
car vous passerez une référence de l'identifiant de l'objet.

 Comment faire pour copier un objet ?
 Comment faire pour pouvoir copier tous ses attributs et valeurs dans un nouvel objet unique ?
 Pour cloner un objet, c'est assez simple. Il faut utiliser le mot-clé clone juste avant l'objet à copier.
 <?php
$copie = clone $origine; // On copie le contenu de l'objet $origine dans l'objet $copie.
// les deux objets contiennent des identifiants différents
// par conséquent, si on veut modifier l'un d'eux, on peut le faire sans qu'aucune propriété de l'autre ne soit modifiée
?>

Lorsque vous clonez un objet, la méthode __clone du nouvel objet sera appelée (du moins, si vous l'avez définie).
Vous ne pouvez pas appeler cette méthode directement. C'est la méthode __clone du nouvel objet créé qui est appelée,
pas la méthode __clone de l'objet à cloner.

Vous pouvez utiliser cette méthode pour modifier certains attributs pour le nouvel objet,
ou alors incrémenter un compteur d'instances par exemple :
<?php
class MaClasse
{
  private static $instances = 0;
  
  public function __construct()
  {
    self::$instances++;
  }
  
  public function __clone()
  {
    self::$instances++;
  }
  
  public static function getInstances()
  {
    return self::$instances;
  }
}

$a = new MaClasse;
$b = clone $a;

echo 'Nombre d\'instances de MaClasse : ', MaClasse::getInstances(); // 2
?>

◘ Comment PHP compare nos objets 

<?php
if ($objet1 == $objet2) // il faut que $objet1 et $objet2 aient les mêmes attributs et les mêmes valeurs,
// mais également que les deux objets soient des instances de la même classe
{
  echo '$objet1 et $objet2 sont identiques !';
}
else
{
  echo '$objet1 et $objet2 sont différents !';
}
?>

Les deux objets doivent provenir de la même classe :

<?php
class A
{
  public $attribut1;
  public $attribut2;
}

class B
{
  public $attribut1;
  public $attribut2;
}

$a = new A;
$a->attribut1 = 'Hello';
$a->attribut2 = 'Salut';

$b = new B;
$b->attribut1 = 'Hello';
$b->attribut2 = 'Salut';

$c = new A;
$c->attribut1 = 'Hello';
$c->attribut2 = 'Salut';

if ($a == $b)
{
  echo '$a == $b';
}
else
{
  echo '$a != $b'; // $a != $b
}

echo '<br />';

if ($a == $c)
{
  echo '$a == $c'; // $a == $c
}
else
{
  echo '$a != $c';
}
?>

• L'opérateur === (strictement identique)

Cet opérateur vérifiera si les deux objets font référence vers la même instance.
Il vérifiera donc que les deux identifiants d'objets comparés sont les mêmes.
<?php
class A
{
  public $attribut1;
  public $attribut2;
}

$a = new A;
$a->attribut1 = 'Hello';
$a->attribut2 = 'Salut';

$b = new A;
$b->attribut1 = 'Hello';
$b->attribut2 = 'Salut';

$c = $a;

if ($a === $b)
{
  echo '$a === $b';
}
else
{
  echo '$a !== $b'; // $a !== $b
}

echo '<br />';

if ($a === $c)
{
  echo '$a === $c'; // $a === $c
}
else
{
  echo '$a !== $c';
}
?>

◘ Parcourons nos objets 

Le fait de parcourir un objet consiste à lire tous les attributs visibles de l'objet.
Vous ne pourrez pas lire les attributs privés ou protégés en dehors de la classe,
mais l'inverse est tout à fait possible.

Qui dit "parcours" dit "boucle". Quelle boucle devrons-nous utiliser pour parcourir un objet ?
Et bien la même boucle que pour parcourir un tableau... J'ai nommé foreach !
Il y en a deux possibles :
  • foreach ($objet as $valeur) : $valeur sera la valeur de l'attribut actuellement lu.
  • foreach ($objet as $attribut => $valeur) : $attribut aura pour valeur le nom de l'attribut actuellement lu et $valeur sera sa valeur.
<?php
class MaClasse
{
  public $attribut1 = 'Premier attribut public';
  public $attribut2 = 'Deuxième attribut public';
  
  protected $attributProtege1 = 'Premier attribut protégé';
  protected $attributProtege2 = 'Deuxième attribut protégé';
  
  private $attributPrive1 = 'Premier attribut privé';
  private $attributPrive2 = 'Deuxième attribut privé';
  
  function listeAttributs()
  {
    foreach ($this as $attribut => $valeur)
    {
      echo '<strong>', $attribut, '</strong> => ', $valeur, '<br />';
    }
  }
}

class Enfant extends MaClasse
{
  function listeAttributs() // Redéclaration de la fonction pour que ce ne soit pas celle de la classe mère qui soit appelée.
  {
    foreach ($this as $attribut => $valeur)
    {
      echo '<strong>', $attribut, '</strong> => ', $valeur, '<br />';
    }
  }
}

$classe = new MaClasse;
$enfant = new Enfant;

echo '---- Liste les attributs depuis l\'intérieur de la classe principale ----<br />';
$classe->listeAttributs();
// $attribut1 = 'Premier attribut public';
// $attribut2 = 'Deuxième attribut public';
// $attributProtege1 = 'Premier attribut protégé';
// $attributProtege2 = 'Deuxième attribut protégé';
// $attributPrive1 = 'Premier attribut privé';
// $attributPrive2 = 'Deuxième attribut privé';

echo '<br />---- Liste les attributs depuis l\'intérieur de la classe enfant ----<br />';
$enfant->listeAttributs();
// $attribut1 = 'Premier attribut public';
// $attribut2 = 'Deuxième attribut public';
// $attributProtege1 = 'Premier attribut protégé';
// $attributProtege2 = 'Deuxième attribut protégé';

echo '<br />---- Liste les attributs depuis le script global ----<br />';
// la structure est extérieure à la classe, seuls les éléments publics seront appelés
foreach ($classe as $attribut => $valeur)
{
  echo '<strong>', $attribut, '</strong> => ', $valeur, '<br />';
  // $attribut1 = 'Premier attribut public';
  // $attribut2 = 'Deuxième attribut public';
}
?>


X) LES INTERFACES

◘ Présentation et création d'interfaces 

• Rôle d'une interface 

Une interface est une classe entièrement abstraite. Son rôle est de décrire un comportement à notre objet.
Ex. : une voiture et un personnage peuvent tous les deux se déplacer,
donc une interface représentant ce point commun pourra être créée.

• Créer une interface 

<?php
interface Movable
{
  public function move($dest); // Toutes les méthodes sont publiques
  // Pas de méthodes abstraites ou finales
  // Doit avoir un nom unique (ne peut avoir le même nom qu'une classe)
}
?>

• Implémenter une interface 

<?php
class Personnage implements Movable
{
  public function move($dest) // on implémente également la méthode
  {
    // Une interface vous oblige à écrire toutes ses méthodes
  }
}
?>

Si vous héritez une classe et que vous implémentez une interface, alors vous devez d'abord spécifier la classe
à hériter avec le mot-clé <?= extends ?> puis les interfaces à implémenter avec le mot-clé <?= implements ?>.

Vous pouvez très bien implémenter plus d'une interface par classe,
à condition que celles-ci n'aient aucune méthode portant le même nom ! Exemple :
<?php
interface iA
{
  public function test1();
}

interface iB
{
  public function test2();
}

class A implements iA, iB
{
  // Pour ne générer aucune erreur, il va falloir écrire les méthodes de iA et de iB.
  
  public function test1()
  {
  
  }
  
  public function test2()
  {
  
  }
}
?>

• Les CONSTANTES d'interface 

Les constantes d'interfaces fonctionnent exactement comme les constantes de classes.
Elles ne peuvent être écrasées par des classes qui implémentent l'interface. Exemple :
<?php
interface iInterface
{
  const MA_CONSTANTE = 'Hello !';
}

echo iInterface::MA_CONSTANTE; // Affiche Hello !

class MaClasse implements iInterface
{

}

echo MaClasse::MA_CONSTANTE; // Affiche Hello !
?>

◘ Hériter ses interfaces 

Comme pour les classes, vous pouvez hériter vos interfaces grâce à l'opérateur <?= extends ?>. 
Vous ne pouvez réécrire ni une méthode ni une constante qui a déjà été listée dans l'interface parente. 
Exemple :
<?php
interface iA
{
  public function test1();
}

interface iB extends iA
{
  public function test1 ($param1, $param2); // Erreur fatale : impossible de réécrire cette méthode.
}

interface iC extends iA
{
  public function test2();
}

class MaClasse implements iC
{
  // Pour ne générer aucune erreur, on doit écrire les méthodes de iC et aussi de iA.
  
  public function test1()
  {
  
  }
  
  public function test2()
  {
  
  }
}
?>

Contrairement aux classes, les interfaces peuvent hériter de plusieurs interfaces à la fois.
Il vous suffit de séparer leur nom par une virgule. Exemple :
<?php
interface iA
{
  public function test1();
}

interface iB
{
  public function test2();
}

interface iC extends iA, iB
{
  public function test3();
}
?>

◘ Les interfaces prédéfinies

• Un itérateur

Un itérateur est un objet capable de parcourir un autre objet.
Bien entendu, cet objet à parcourir doit pouvoir être parcouru (on dit alors qu'il doit être itératif).
Ce comportement à imposer se fera par le biais d'interfaces !
L'interface la plus basique pour rendre un objet itératif est Iterator.

• L'interface Iterator 

Cette interface comporte 5 méthodes :

  •  current: renvoie l'élément courant ;
  •  key: retourne la clé de l'élément courant ;
  •  next: déplace le pointeur sur l'élément suivant ;
  •  rewind: remet le pointeur sur le premier élément ;
  •  valid: vérifie si la position courante est valide.

En écrivant ces méthodes, on pourra renvoyer la valeur qu'on veut, et pas forcément la valeur de l'attribut actuellement lu.
Imaginons qu'on ait un attribut qui soit un tableau.
On pourrait très bien créer un petit script qui, au lieu de parcourir l'objet, parcourt le tableau !

<?php
class MaClasse implements Iterator
{
  private $position = 0;
  private $tableau = ['Premier élément', 'Deuxième élément', 'Troisième élément', 'Quatrième élément', 'Cinquième élément'];
  
  /**
   * Retourne l'élément courant du tableau.
   */
  public function current()
  {
    return $this->tableau[$this->position];
  }
  
  /**
   * Retourne la clé actuelle (c'est la même que la position dans notre cas).
   */
  public function key()
  {
    return $this->position;
  }
  
  /**
   * Déplace le curseur vers l'élément suivant.
   */
  public function next()
  {
    $this->position++;
  }
  
  /**
   * Remet la position du curseur à 0.
   */
  public function rewind()
  {
    $this->position = 0;
  }
  
  /**
   * Permet de tester si la position actuelle est valide.
   */
  public function valid()
  {
    return isset($this->tableau[$this->position]);
  }
}

$objet = new MaClasse;

foreach ($objet as $key => $value)
{
  echo $key, ' => ', $value, '<br />'; // 0 => Premier élément
  // 1 => Deuxième élément
  // etc.
}
?>

• L'interface SeekableIterator

Cette interface hérite de l'interface Iterator, on n'aura donc pas besoin d'implémenter les deux à notre classe.
Puis elle ajoute la méthode seek(). Cette méthode permet de placer le curseur interne à une position précise.
Elle demande donc un argument : la position du curseur à laquelle il faut le placer. 
<?php
class MaClasse implements SeekableIterator
{
  private $position = 0;
  private $tableau = ['Premier élément', 'Deuxième élément', 'Troisième élément', 'Quatrième élément', 'Cinquième élément'];
  
  /**
   * Retourne l'élément courant du tableau.
   */
  public function current()
  {
    return $this->tableau[$this->position];
  }
  
  /**
   * Retourne la clé actuelle (c'est la même que la position dans notre cas).
   */
  public function key()
  {
    return $this->position;
  }
  
  /**
   * Déplace le curseur vers l'élément suivant.
   */
  public function next()
  {
    $this->position++;
  }
  
  /**
   * Remet la position du curseur à 0.
   */
  public function rewind()
  {
    $this->position = 0;
  }
  
  /**
   * Déplace le curseur interne.
   */
  public function seek($position)
  {
    $anciennePosition = $this->position;
    $this->position = $position;
    
    if (!$this->valid())
    {
      trigger_error('La position spécifiée n\'est pas valide', E_USER_WARNING);
      $this->position = $anciennePosition;
    }
  }
  
  /**
   * Permet de tester si la position actuelle est valide.
   */
  public function valid()
  {
    return isset($this->tableau[$this->position]);
  }
}

$objet = new MaClasse;

foreach ($objet as $key => $value)
{
  echo $key, ' => ', $value, '<br />';
}

$objet->seek(2);
echo '<br />', $objet->current(); // Troisième élément
?>

• L'interfaceArrayAccess

Grâce à cette interface, nous allons pouvoir placer des crochets à la suite de notre objet avec la clé à laquelle accéder,
comme sur un vrai tableau !
L'interfaceArrayAccessliste quatre méthodes :

  • offsetExists: méthode qui vérifiera l'existence de la clé entre crochets lorsque l'objet est passé à la fonction isset ou empty(cette valeur entre crochet est passée à la méthode en paramètre) ;
  • offsetGet: méthode appelée lorsqu'on fait un simple $obj['clé']. La valeur 'clé' est donc passée à la méthode offsetGet;
  • offsetSet: méthode appelée lorsqu'on assigne une valeur à une entrée. Cette méthode reçoit donc deux arguments, la valeur de la clé et la valeur qu'on veut lui assigner.
  • offsetUnset: méthode appelée lorsqu'on appelle la fonction unset sur l'objet avec une valeur entre crochets. Cette méthode reçoit un argument, la valeur qui est mise entre les crochets.

<?php
class MaClasse implements SeekableIterator, ArrayAccess
{
  private $position = 0;
  private $tableau = ['Premier élément', 'Deuxième élément', 'Troisième élément', 'Quatrième élément', 'Cinquième élément'];
  
  
  /* MÉTHODES DE L'INTERFACE SeekableIterator */
  
  
  /**
   * Retourne l'élément courant du tableau.
   */
  public function current()
  {
    return $this->tableau[$this->position];
  }
  
  /**
   * Retourne la clé actuelle (c'est la même que la position dans notre cas).
   */
  public function key()
  {
    return $this->position;
  }
  
  /**
   * Déplace le curseur vers l'élément suivant.
   */
  public function next()
  {
    $this->position++;
  }
  
  /**
   * Remet la position du curseur à 0.
   */
  public function rewind()
  {
    $this->position = 0;
  }
  
  /**
   * Déplace le curseur interne.
   */
  public function seek($position)
  {
    $anciennePosition = $this->position;
    $this->position = $position;
    
    if (!$this->valid())
    {
      trigger_error('La position spécifiée n\'est pas valide', E_USER_WARNING);
      $this->position = $anciennePosition;
    }
  }
  
  /**
   * Permet de tester si la position actuelle est valide.
   */
  public function valid()
  {
    return isset($this->tableau[$this->position]);
  }
  
  
  /* MÉTHODES DE L'INTERFACE ArrayAccess */
  
  
  /**
   * Vérifie si la clé existe.
   */
  public function offsetExists($key)
  {
    return isset($this->tableau[$key]);
  }
  
  /**
   * Retourne la valeur de la clé demandée.
   * Une notice sera émise si la clé n'existe pas, comme pour les vrais tableaux.
   */
  public function offsetGet($key)
  {
    return $this->tableau[$key];
  }
  
  /**
   * Assigne une valeur à une entrée.
   */
  public function offsetSet($key, $value)
  {
    $this->tableau[$key] = $value;
  }
  
  /**
   * Supprime une entrée et émettra une erreur si elle n'existe pas, comme pour les vrais tableaux.
   */
  public function offsetUnset($key)
  {
    unset($this->tableau[$key]);
  }
}

$objet = new MaClasse;

echo 'Parcours de l\'objet...<br />';
foreach ($objet as $key => $value)
{
  echo $key, ' => ', $value, '<br />';
}

echo '<br />Remise du curseur en troisième position...<br />';
$objet->seek(2);
echo 'Élément courant : ', $objet->current(), '<br />'; // Troisième élément

echo '<br />Affichage du troisième élément : ', $objet[2], '<br />'; // Troisième élément
echo 'Modification du troisième élément... ';
$objet[2] = 'Hello world !';
echo 'Nouvelle valeur : ', $objet[2], '<br /><br />'; // Hello world !

echo 'Destruction du quatrième élément...<br />';
unset($objet[3]);

if (isset($objet[3]))
{
  echo '$objet[3] existe toujours... Bizarre...';
}
else
{
  echo 'Tout se passe bien, $objet[3] n\'existe plus !'; // Tout se passe bien, $objet[3] n'existe plus !
}
?>

• L'interface Countable

Elle contient une méthode : la méthode count. 
Celle-ci doit obligatoirement renvoyer un entier qui sera la valeur renvoyée par la fonction count appelée sur notre objet.
<?php
class MaClasse implements SeekableIterator, ArrayAccess, Countable
{
  private $position = 0;
  private $tableau = ['Premier élément', 'Deuxième élément', 'Troisième élément', 'Quatrième élément', 'Cinquième élément'];
  
  
  /* MÉTHODES DE L'INTERFACE SeekableIterator */
  
  
  /**
   * Retourne l'élément courant du tableau.
   */
  public function current()
  {
    return $this->tableau[$this->position];
  }
  
  /**
   * Retourne la clé actuelle (c'est la même que la position dans notre cas).
   */
  public function key()
  {
    return $this->position;
  }
  
  /**
   * Déplace le curseur vers l'élément suivant.
   */
  public function next()
  {
    $this->position++;
  }
  
  /**
   * Remet la position du curseur à 0.
   */
  public function rewind()
  {
    $this->position = 0;
  }
  
  /**
   * Déplace le curseur interne.
   */
  public function seek($position)
  {
    $anciennePosition = $this->position;
    $this->position = $position;
    
    if (!$this->valid())
    {
      trigger_error('La position spécifiée n\'est pas valide', E_USER_WARNING);
      $this->position = $anciennePosition;
    }
  }
  
  /**
   * Permet de tester si la position actuelle est valide.
   */
  public function valid()
  {
    return isset($this->tableau[$this->position]);
  }
  
  
  /* MÉTHODES DE L'INTERFACE ArrayAccess */
  
  
  /**
   * Vérifie si la clé existe.
   */
  public function offsetExists($key)
  {
    return isset($this->tableau[$key]);
  }
  
  /**
   * Retourne la valeur de la clé demandée.
   * Une notice sera émise si la clé n'existe pas, comme pour les vrais tableaux.
   */
  public function offsetGet($key)
  {
    return $this->tableau[$key];
  }
  
  /**
   * Assigne une valeur à une entrée.
   */
  public function offsetSet($key, $value)
  {
    $this->tableau[$key] = $value;
  }
  
  /**
   * Supprime une entrée et émettra une erreur si elle n'existe pas, comme pour les vrais tableaux.
   */
  public function offsetUnset($key)
  {
    unset($this->tableau[$key]);
  }
  
  
  /* MÉTHODES DE L'INTERFACE Countable */
  
  
  /**
   * Retourne le nombre d'entrées de notre tableau.
   */
  public function count()
  {
    return count($this->tableau);
  }
}

$objet = new MaClasse;

echo 'Parcours de l\'objet...<br />';
foreach ($objet as $key => $value)
{
  echo $key, ' => ', $value, '<br />';
}

echo '<br />Remise du curseur en troisième position...<br />';
$objet->seek(2);
echo 'Élément courant : ', $objet->current(), '<br />';

echo '<br />Affichage du troisième élément : ', $objet[2], '<br />';
echo 'Modification du troisième élément... ';
$objet[2] = 'Hello world !';
echo 'Nouvelle valeur : ', $objet[2], '<br /><br />';

echo 'Actuellement, mon tableau comporte ', count($objet), ' entrées<br /><br />';

echo 'Destruction du quatrième élément...<br />';
unset($objet[3]);

if (isset($objet[3]))
{
  echo '$objet[3] existe toujours... Bizarre...';
}
else
{
  echo 'Tout se passe bien, $objet[3] n\'existe plus !';
}

echo '<br /><br />Maintenant, il n\'en comporte plus que ', count($objet), ' !'; // 4
?>

• Bonus : la classe ArrayIterator

La classe que nous venons de créer pour pouvoir créer des « objets-tableaux » existe déjà.
En effet, PHP possède nativement une classe nommée ArrayIterator.
Comme notre précédente classe, celle-ci implémente les quatre interfaces qu'on a vues.
Elle possède les mêmes méthodes, à une différence près :
cette classe implémente un constructeur qui accepte un tableau en guise d'argument.
Comme vous l'aurez deviné, c'est ce tableau qui sera « transformé » en objet.
Ainsi, si vous faites un echo $monInstanceArrayIterator['cle'],
alors à l'écran s'affichera l'entrée qui a pour clé cle du tableau passé en paramètre.


XI) LES EXCEPTIONS

◘ Une différente gestion des erreurs

• Lancer une exception 

Quand on lance une exception, on doit, en gros, lancer une instance de la classe Exception.
Le constructeur de la classe Exception demande en paramètre le message d'erreur, son code et l'exception précédente.
Ces trois paramètres sont facultatifs.
<?php
function additionner($a, $b)
{
  if (!is_numeric($a) || !is_numeric($b))
  {
    // On lance une nouvelle exception grâce à throw et on instancie directement un objet de la classe Exception.
    throw new Exception('Les deux paramètres doivent être des nombres');
  }
  
  return $a + $b;
}

echo additionner(12, 3), '<br />';
echo additionner('azerty', 54), '<br />'; // Uncaught exception 'Exception' with message 'Les deux paramètres doivent être des nombres' in... 
echo additionner(4, 8);
?>

(!) Ne lancez jamais d'exception dans un destructeur !

• Attraper une exception 

Si une exception est lancée, alors on attrapera celle-ci afin qu'aucune erreur fatale ne soit lancée
et que de tels messages ne s'affichent plus.
Nous allons placer nos instructions dans un bloc try.
Qui dit bloc try dit aussi bloc catch car l'un ne va pas sans l'autre.

<?php
function additionner($a, $b)
{
  if (!is_numeric($a) || !is_numeric($b))
  {
    throw new Exception('Les deux paramètres doivent être des nombres');
  }
  
  return $a + $b;
}

try // Nous allons essayer d'effectuer les instructions situées dans ce bloc.
{
  echo additionner(12, 3), '<br />'; // 15 
  echo additionner('azerty', 54), '<br />'; // absent
  echo additionner(4, 8); // absent
}

catch (Exception $e) // On va attraper les exceptions "Exception" s'il y en a une qui est levée
{
  echo 'Une exception a été lancée. Message d\'erreur : ', $e->getMessage(); // getCode() pour récupérer le code
  // Une exception a été lancée. Message d'erreur : Les deux paramètres doivent être des nombres
  // interrompt la lecture du bloc (pas de troisième message)
}

echo 'Fin du script'; // Ce message s'affiche, ça prouve bien que le script est exécuté jusqu'au bout.
?>

◘ Des exceptions spécialisées 

• Hériter la classe Exception 

PHP nous offre la possibilité d'hériter la classe Exception afin de personnaliser nos exceptions.
Par exemple, nous pouvons créer une classe MonException qui réécrira des méthodes de la classe Exception
ou en créera de nouvelles qui lui seront propres.

Voici la liste des attributs et méthodes de la classe Exception tirée de la documentation (https://www.php.net/manual/fr/language.exceptions.extending.php) :
<?php
class Exception
{
  protected $message = 'exception inconnu'; // Message de l'exception.
  protected $code = 0; // Code de l'exception défini par l'utilisateur.
  protected $file; // Nom du fichier source de l'exception.
  protected $line; // Ligne de la source de l'exception.
  
  final function getMessage(); // Message de l'exception.
  final function getCode(); // Code de l'exception.
  final function getFile(); // Nom du fichier source.
  final function getLine(); // Ligne du fichier source.
  final function getTrace(); // Un tableau de backtrace().
  final function getTraceAsString(); // Chaîne formattée de trace.
  
  /* Remplacable */
  function __construct ($message = NULL, $code = 0);
  function __toString(); // Chaîne formatée pour l'affichage.
}
?>

Nous allons donc créer notre classe MonException qui, par exemple,
réécrira le constructeur en rendant obligatoire le premier argument ainsi que la méthode
__toString pour n'afficher que le message d'erreur (c'est uniquement ça qui nous intéresse).
<?php
class MonException extends Exception
{
  public function __construct($message, $code = 0)
  {
    parent::__construct($message, $code);
  }
  
  public function __toString()
  {
    return $this->message;
  }
}
?>

Maintenant nous lancerons une exception de type MonException :
<?php
class MonException extends Exception
{
  public function __construct($message, $code = 0)
  {
    parent::__construct($message, $code);
  }
  
  public function __toString()
  {
    return $this->message;
  }
}

function additionner($a, $b)
{
  if (!is_numeric($a) || !is_numeric($b))
  {
    throw new MonException('Les deux paramètres doivent être des nombres'); // On lance une exception "MonException".
  }
  
  return $a + $b;
}

try // Nous allons essayer d'effectuer les instructions situées dans ce bloc.
{
  echo additionner(12, 3), '<br />';
  echo additionner('azerty', 54), '<br />';
  echo additionner(4, 8);
}

catch (MonException $e) // Nous allons attraper les exceptions "MonException" s'il y en a une qui est levée.
{
  echo $e; // On affiche le message d'erreur grâce à la méthode __toString que l'on a écrite.
}

echo '<br />Fin du script'; // Ce message s'affiche, ça prouve bien que le script est exécuté jusqu'au bout.
?>

• Emboîter plusieurs blocs catch 

<?php
class MonException extends Exception
{
  public function __construct($message, $code = 0)
  {
    parent::__construct($message, $code);
  }
  
  public function __toString()
  {
    return $this->message;
  }
}

function additionner($a, $b)
{
  if (!is_numeric($a) || !is_numeric($b))
  {
    throw new MonException('Les deux paramètres doivent être des nombres'); // On lance une exception "MonException".
  }
  
  if (func_num_args() > 2)
  {
    throw new Exception('Pas plus de deux arguments ne doivent être passés à la fonction'); // Cette fois-ci, on lance une exception "Exception".
  }
  
  return $a + $b;
}

try // Nous allons essayer d'effectuer les instructions situées dans ce bloc.
{
  echo additionner(12, 3), '<br />';
  echo additionner(15, 54, 45), '<br />';
}

catch (MonException $e) // Nous allons attraper les exceptions "MonException" s'il y en a une qui est levée.
{
  echo '[MonException] : ', $e; // On affiche le message d'erreur grâce à la méthode __toString que l'on a écrite.
  // pas exécuté
}

catch (Exception $e) // Si l'exception n'est toujours pas attrapée, alors nous allons essayer d'attraper l'exception "Exception".
{
  echo '[Exception] : ', $e->getMessage(); // La méthode __toString() nous affiche trop d'informations, nous voulons juste le message d'erreur.
  // exécuté
}

echo '<br />Fin du script'; // Ce message s'affiche, cela prouve bien que le script est exécuté jusqu'au bout.
?>

• Exemple concret : la classe PDOException

PDO a sa classe d'exception : PDOException. Celle-ci n'hérite pas directement de la classe Exception mais de RuntimeException. 
Il s'agit juste d'une classe qui est instanciée pour émettre une exception lors de l'exécution du script.
Il existe une classe pour chaque circonstance dans laquelle l'exception est lancée : https://www.php.net/manual/fr/spl.exceptions.php
<?php
try
{
  $db = new PDO('mysql:host=localhost;dbname=tests', 'root', ''); // Tentative de connexion.
  echo 'Connexion réussie !'; // Si la connexion a réussi, alors cette instruction sera exécutée.
}

catch (PDOException $e) // On attrape les exceptions PDOException.
{
  echo 'La connexion a échoué.<br />';
  echo 'Informations : [', $e->getCode(), '] ', $e->getMessage(); // On affiche le n° de l'erreur ainsi que le message.
}
?>

• Exceptions pré-définies

https://www.php.net/manual/fr/spl.exceptions.php

Au lieu de lancer tout le temps une exception en instanciant Exception,
il est préférable d'instancier la classe adaptée à la situation.
Par exemple, reprenons le code proposé en début de chapitre :
<?php
function additionner($a, $b)
{
  if (!is_numeric($a) || !is_numeric($b))
  {
    throw new InvalidArgumentException('Les deux paramètres doivent être des nombres'); // remplace Exception
    // La classe à instancier ici est celle qui doit l'être lorsqu'un paramètre est invalide
  }
  
  return $a + $b;
}

echo additionner(12, 3), '<br />';
echo additionner('azerty', 54), '<br />';
echo additionner(4, 8);
?>

• Exécuter un code même si l'exception n'est pas attrapée

Si jamais une exception est lancée dans un bloc try mais non attrapée dans un bloc catch,
alors une erreur fatale sera levée car l'exception ne sera pas attrapée.
Il existe une façon d'exécuter du code avant de lever l'erreur fatale grâce au bloc finally. 
<?php
$db = new PDO('mysql:host=localhost;dbname=tests', 'root', '');

try
{
  // Quelques opérations sur la base de données
}
finally
{
  echo 'Action effectuée quoi qu\'il arrive';
  // fermeture d'un fichier, d'une connexion, etc.
  // permet de s'assurer que le script se terminera plus ou moins comme il faut.
}
?>


XII) LES TRAITS

◘ Le principe des traits 

• Le problème de la duplication

Soit 2 classes qui doivent formater (à chaque fois) le texte en HTML :
<?php
class Writer
{
  public function write($text)
  {
    $text = '<p>Date : '.date('d/m/Y').'</p>'."\n".
            '<p>'.nl2br($text).'</p>';
    file_put_contents('fichier.txt', $text);
  }
}

class Mailer
{
  public function send($text)
  {
    $text = '<p>Date : '.date('d/m/Y').'</p>'."\n".
            '<p>'.nl2br($text).'</p>';
    mail('login@fai.tld', 'Test avec les traits', $text);
  }
}
?>

• Résoudre le problème grâce aux traits

○ Syntaxe de base
Les traits définissent des méthodes que les classes peuvent utiliser.
les traits servent à isoler des méthodes afin de pouvoir les utiliser dans deux classes totalement indépendantes.
Un trait est une mini-classe.
<?php
trait MonTrait
{
  public function hello()
  {
    echo 'Hello world !';
  }
}

class A
{
  use MonTrait; // toutes les méthodes du trait vont être importées dans la classe
}

class B
{
  use MonTrait;
}

$a = new A;
$a->hello(); // Affiche « Hello world ! ».

$b = new b;
$b->hello(); // Affiche aussi « Hello world ! ».
?>

○ Retour sur notre formateur 
<?php
trait HTMLFormater
{
  public function format($text)
  {
    return '<p>Date : '.date('d/m/Y').'</p>'."\n".
           '<p>'.nl2br($text).'</p>';
  }
}

class Writer
{
  use HTMLFormater;
  
  public function write($text)
  {
    file_put_contents('fichier.txt', $this->format($text));
  }
}

class Mailer
{
  use HTMLFormater;
  
  public function send($text)
  {
    mail('login@fai.tld', 'Test avec les traits', $this->format($text));
  }
}

$w = new Writer;
$w->write('Hello world!');

$m = new Mailer;
$m->send('Hello world!');
?>

• Utiliser plusieurs traits 

○ Syntaxe
Pour utiliser plusieurs traits, il suffit de lister tous les traits à utiliser séparés par des virgules :
<?php
trait HTMLFormater
{
  public function formatHTML($text)
  {
    return '<p>Date : '.date('d/m/Y').'</p>'."\n".
           '<p>'.nl2br($text).'</p>';
  }
}

trait TextFormater
{
  public function formatText($text)
  {
    return 'Date : '.date('d/m/Y')."\n".$text;
  }
}

class Writer
{
  use HTMLFormater, TextFormater;
  
  public function write($text)
  {
    file_put_contents('fichier.txt', $this->formatHTML($text));
  }
}
?>

• Résolution des conflits 

Nous pouvons donner une priorité à une méthode d'un trait afin de lui permettre d'écraser
la méthode de l'autre trait si il y en a une identique.
Par exemple, si dans notre classe Writer nous voulions formater notre message en HTML, nous pourrions faire :
<?php
class Writer
{
  use HTMLFormater, TextFormater
  {
    HTMLFormater::format insteadof TextFormater; // La méthode format() du trait HTMLFormater écrasera la méthode du même nom
    // du trait TextFormater (si elle y est définie).
  }
  
  public function write($text)
  {
    file_put_contents('fichier.txt', $this->format($text));
  }
}
?>

• Méthodes de traits vs. méthodes de classes

○ La classe plus forte que le trait
Si une classe déclare une méthode et qu'elle utilise un trait possédant cette même méthode,
alors la méthode déclarée dans la classe l'emportera sur la méthode déclarée dans le trait. Exemple :
<?php
trait MonTrait
{
  public function sayHello()
  {
    echo 'Hello !';
  }
}

class MaClasse
{
  use MonTrait;
  
  public function sayHello()
  {
    echo 'Bonjour !';
  }
}

$objet = new MaClasse;
$objet->sayHello(); // Affiche « Bonjour ! ».
?>

○ Le trait plus fort que la mère
À l'inverse, si une classe utilise un trait possédant une méthode déjà implémentée dans la classe mère
de la classe utilisant le trait, alors ce sera la méthode du trait qui sera utilisée
(la méthode du trait écrasera celle de la méthode de la classe mère). Exemple :
<?php
trait MonTrait
{
  public function speak()
  {
    echo 'Je suis un trait !';
  }
}

class Mere
{
  public function speak()
  {
    echo 'Je suis une classe mère !';
  }
}

class Fille extends Mere
{
  use MonTrait;
}

$fille = new Fille;
$fille->speak(); // Affiche « Je suis un trait ! »
?>

◘ Plus loin avec les traits 

• Définition d'attributs 

○ Syntaxe
<?php
trait MonTrait
{
  protected $attr = 'Hello !';
  
  public function showAttr()
  {
    echo $this->attr;
  }
}

class MaClasse
{
  use MonTrait;
}

$fille = new MaClasse;
$fille->showAttr();
?>

○ Conflits entre attributs
Si un attribut est défini dans un trait,
alors la classe utilisant le trait ne peut pas définir d'attribut possédant le même nom.
Il est impossible, comme nous l'avons fait avec les méthodes,
de définir des attributs prioritaires. Veillez donc bien à ne pas utiliser ce genre de code :
<?php
trait MonTrait
{
  protected $attr = 'Hello !';
}

class MaClasse
{
  use MonTrait;
  
  protected $attr = 'Hello !'; // Lèvera une erreur stricte.
  protected $attr = 'Bonjour !'; // Lèvera une erreur fatale.
  private $attr = 'Hello !'; // Lèvera une erreur fatale.
}
?>

• Traits composés d'autres traits 

La façon de procéder est la même qu'avec les classes,
tout comme la gestion des conflits entre méthodes. Voici un exemple :
<?php
trait A
{
  public function saySomething()
  {
    echo 'Je suis le trait A !';
  }
}

trait B
{
  use A;
  
  public function saySomethingElse()
  {
    echo 'Je suis le trait B !';
  }
}

class MaClasse
{
  use B;
}

$o = new MaClasse;
$o->saySomething(); // Affiche « Je suis le trait A ! »
$o->saySomethingElse(); // Affiche « Je suis le trait B ! »
?>

• Changer la visibilité et le nom des méthodes

Si un trait implémente une méthode,
toute classe utilisant ce trait a la capacité de changer sa visibilité,
c'est-à-dire la passer en privé, protégé ou public.
<?php
trait A
{
  public function saySomething()
  {
    echo 'Je suis le trait A !';
  }
}

class MaClasse
{
  use A
  {
    saySomething as protected;
  }
}

$o = new MaClasse;
$o->saySomething(); // Lèvera une erreur fatale car on tente d'accéder à une méthode protégée.
?>

<?php
trait A
{
  public function saySomething()
  {
    echo 'Je suis le trait A !';
  }
}

class MaClasse
{
  use A
  {
    saySomething as sayWhoYouAre;
  }
}

$o = new MaClasse;
$o->sayWhoYouAre(); // Affichera « Je suis le trait A ! »
$o->saySomething(); // Affichera « Je suis le trait A ! »
?>

<?php
trait A
{
  public function saySomething()
  {
    echo 'Je suis le trait A !';
  }
}

class MaClasse
{
  use A
  {
    saySomething as protected sayWhoYouAre;
  }
}

$o = new MaClasse;
$o->saySomething(); // Affichera « Je suis le trait A ! ».
$o->sayWhoYouAre(); // Lèvera une erreur fatale, car l'alias créé est une méthode protégée.
?>

• Méthodes abstraites dans les traits 

On peut forcer la classe utilisant le trait à implémenter certaines méthodes au moyen de méthodes abstraites.
Ainsi, ce code lèvera une erreur fatale :
<?php
trait A
{
  abstract public function saySomething();
}

class MaClasse
{
  use A;
}
?>

Cependant, si la classe utilisant le trait déclarant une méthode abstraite est elle aussi abstraite,
alors ce sera à ses classes filles d'implémenter les méthodes abstraites du trait
(elle peut le faire, mais elle n'est pas obligée). Exemple :

<?php
trait A
{
  abstract public function saySomething();
}

abstract class Mere
{
  use A;
}

// Jusque-là, aucune erreur n'est levée.

class Fille extends Mere
{
  // Par contre, une erreur fatale est ici levée, car la méthode saySomething() n'a pas été implémentée.
}
?>
