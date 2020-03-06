-------------------------- MEMENTO, ASTUCES & BONNES PRATIQUES PHP --------------------------

Message cannot validate de VS Studio > https://stackoverflow.com/questions/34182067/cannot-validate-the-php-file-the-php-program-was-not-found
Problèmes URL localhost WAMP : clic droit sur l'icône de WampServer > ⛭ Paramètres Wamp > Ajouter localhost dans l'URL
https://stackoverflow.com/questions/49811804/phpmyadmin-failed-to-set-session-cookie-maybe-you-are-using-http-instead-of-htt
Utiliser sendmail avec WAMP : https://www.copier-coller.com/envoyer-des-mails-en-local-avec-wamp/
https://stackoverflow.com/questions/21337859/sendmail-wamp-php
https://www.grafikart.fr/blog/mail-local-wamp
Gmail : activer validation en 2 étapes, puis créer un mot de passe pour une application (en l'occurence sendmail)
Dans sendmail.ini, remplacer auth_password=mdpgmail par auth_password=mdpappligmail
XDEBUG
https://xdebug.org/wizard => copier dans le php.ini de WAMP + copier à la fin du php.exe de la CLI
https://stackoverflow.com/questions/41755590/xdebug-is-not-running-with-wamp
les erreurs sur PHP venaient du fait que seuls le php.ini de apache était changé
PHP DEBUG pour VS STUDIO CODE
lire la notice : les 2 lignes à rajouter sur le php.ini
message erreur php debug eaddrinuse adress already in use : 9000 => changer les 9000 du launch.json en 9001
https://www.cloudways.com/blog/php-debug/#configure-xdebug
wamp => php => date/timezone => Paris

CONSIDERATIONS :

## SQL ##
• nom de table, colonne = singulier
• convention de naming = PascalCase
• exporter seulement le squelette de la BDD = exporter => structure
• Préférer les "guillemets" pour les requêtes SQL
• "UPDATE daily_count SET count = 0 WHERE user_id = $id" pour une requête sans erreur, malgré un champ qui s'appelle count
• Page d'inscription compte le formulaire + la partie SQL (sur la même page)
• SQL : moteur de stockage à préférer : InnoDB (peut accepter les FOREIGN KEYS)
• BDD : username plutôt que pseudo

## PHP ##
• !empty($_POST[element]) pour éviter les erreurs de type variable indéfinie
• Limiter le PHP dans le HTML : tout ce qui ne s'affiche pas ne vas pas dans le HTML
• Pour echo une seul message, utiliser <?= message ?>
• Utiliser var_dump($_POST); // console log de POST
// die(); arrête le code de la console
• Plusieurs variables dans le header : header('Location: update_article.php?id=' . $_SESSION['id_article'] . '&amp;$error=1');
• exit(); arrête le code suivant (vient après un header('Location') par ex.)
• Le fichier ne compte que du PHP :  on ne ferme pas la balise PHP ?>
• require(), à l'inverse de include(), fait planter le script si le fichier n'est pas trouvé
• nl2br — Insère un retour à la ligne HTML à chaque nouvelle ligne
• fetch(PDO::FETCH_ASSOC) = retrouve un tableau de valeur, avec, contrairement à fetch, SEULEMENT le NOM de la colonne et la valeur associée (et non, en plus, le NUMERO de la colonne et la valeur associée)
• The keyword elseif SHOULD be used instead of else if so that all control keywords look like single words.
if ($a === $b) {
	bar();
} elseif ($a > $b) {
	$foo->bar($arg1);
} else {
	BazClass::bar($arg2, $arg3);
}
• abstract and final MUST be declared before the visibility; static MUST be declared after the visibility
final public static function bar()
{
	// method body
}
• if (!array_key_exists(...)) // si la clé n'existe pas (if (!true) = if (false))
• htmlspecialchars_decode("affiche le texte protégé comme il doit s'afficher")
• PHP orienté objet = tous les chemins cible sont selon l'emplacement de index.php
• plusieurs scripts (penser orienté objet) :
	$script = '
		<script1 src="public/js/contact.js"></script>
		<script2></script>
	';
• mail() = charset (oui) & boundary (frontière, sépare les parties du mail)
• Dans une classe, on appelle les variables attributs (ou propriétés)
• Organisation : travailler avec UML
• Utilitaire : Laragon (englobe les principaux composants pour un projet PHP)
• Ordre d'apparition des use : ordre alphabétique (PCR1)

## VISUAL STUDIO ##
• Ctrl + D : sélectionner des groupes de mots semblables
• Ctrl + alt + i : récupérer le namespace de la classe sélectionnée
• PHP Getters & Setters, puis clic droit sur une variable > Get setters and getters PHP
• Extensions : Auto Close Tag, Beautify, canvas-snippets, HTML CSS Support,
Javascript (ES6) code snippets, jQuery Code snippets, PHP Getters & Setters,
PHP Intelephense, PHP Namespace Resolver, PowerShell,
Sublime Text Keymap and Settings Importer, Twig Language


I) Créer une variable

<?php
	$je_suis_une_variable_php = 17, 17.356, "hello", 'Je m\'appelle Henry', true, NULL;
	echo $je_suis_une_variable_php; // affiche la variable
	$age_visiteur = 17;
	echo "Le visiteur a $age_visteur ans";
	echo 'Le visiteur a ' . $age_visiteur . ' ans'; // à préférer
	// Le modulo = le reste de la division
	$nombre = 10 % 5; // 0 car la division tombe juste
	$nombre = 10 % 3; // 1 car il reste 1 après la division la plus proche
?>

I-b) Détruire une variable avec unset()

<?php 
	// détruit la variable de mauvaise connexion (en cas de rafraîchissement de page)
	unset($_SESSION['login_error']);
?>

I-c) Variables globales et locales 

<?php
$one = 1; // accessible globalement, mais pas localement

function echoOne($one) {
    echo $one; // les variables globales ne sont pas accessibles localement
    // il faut renseigner les variables en paramètres
}

echoOne($one); // si on ne renseigne pas l'argument, erreur de type variable indéfinie
?>

II) Les conditions

== ; > ; < ; >= ; <= ; != ;
Difference between == and === (same goes with != and !==) :
┌──────────┬───────────┬───────────────────────────────────────────────────────────┐
│ Example  │ Name      │ Result                                                    │
├──────────┼───────────┼───────────────────────────────────────────────────────────┤
│$a ==  $b │ Equal     │ TRUE if $a is equal to $b after type juggling.            │
│$a === $b │ Identical │ TRUE if $a is equal to $b, and they are of the same type. │
└──────────┴───────────┴───────────────────────────────────────────────────────────┘
&& or AND, || or OR ? -> && and ||
Ex:
$this_one = true, $that = false;
$truthiness = $this_one and $that; // return TRUE (not false);
$truthiness = $this_one && $that; // return FALSE (logic);
Why ? = has a higher precedence (priority) than and --> ($truthiness = $this_one) and $that;
And parentheses have higher precedence than = : $truthiness = ($this_one and $that);

 It is important to remember that the following values are considered false in PHP:
	• Boolean false;
    • Integer 0;
    • Float 0.0;
    • String '0' or "0";
    • An empty string (i.e. '' or "");
    • An empty array (i.e. [] or array());
    • null;
    • SimpleXML objects created from empty tags.


<?php
	$age = 8;
	if ($age <= 12) {
		echo 'Salut gamin ! Bienvenue sur mon site !<br />';
		$autorisation_entrer = "Oui";
	} else {
		echo 'Ceci est un site pour enfants, vous êtes trop vieux pour y accéder. Au revoir !<br />';
		$autorisation_entrer = "Non";
	}

	echo 'Avez-vous l\'autorisation d\'entrer ? La réponse est : ' . $autorisation_entrer . '';

	if ($autorisation_entrer == "Oui") {
		// instructions
	} elseif ($autorisation_entrer == "Non") { // ELSEIF IN ON WORD
		// instructions
	} else {
		echo 'Réponse inconnue, veuillez renseigner votre âge.'
	}

	if ($autorisation_entrer) { // == true
		echo "Bienvenue";
	} else {
		echo "Vous n'avez pas le droit d'accéder au site";
	}

	if (!$autorisation_entrer) { // == false
		echo "Vous n'avez pas le droit d'accéder au site";
	}

	if ($age <= 12 && $langue == "fr") { // &&
		echo "Bienvenue sur mon site !";
	} elseif ($age <= 12 && $langue == "en") {
		echo "Welcome to my website !";
	}

	if ($pays == "fr" || $pays == "bel") { // ||
		echo "Bienvenue sur notre site !";
	} else {
		echo "Désolé, notre service n'est pas disponible dans votre pays !";
	}
?>
	
	<?php // ASTUCE POUR RENTRER BEAUCOUP DE TEXTE
	$variable = 23;
	if ($variable)
	{ // ouvrir accolade, fermer la balise PHP puis mettre le texte, puis rouvrir PHP + accolade
	?>
	<strong>Bravo !</strong> Vous avez trouvé le nombre mystère ! <!-- pas besoin d'echo ni de \ -->
	<?php
	}
	?>

<?php 

// SWITCH
	$note = 10;
	switch ($note) { // on indique sur quelle variable on travaille
		case 0:
			echo "Tu n'as pas du tout compris l'exercice.";
			break;

		case 10:
			echo "Tu as tout juste la moyenne.";
			break;
		
		default:
			echo "Je n'ai pas d'appréciation à donner.";
			break;
	}

// CONDITIONS TERNAIRES. Ex : $majeur = true si + de 18 ans
	$age = 24;
	$majeur = ($age >= 18) ? true : false;
// $variable = (condition à vérifier) ? valeur1 (attribuée à $variable si condition vraie) : valeur2 (si condition fausse);
	
	$action = (empty($_POST['action'])) ? 'default' : $_POST['action'];
	// La ligne ci-dessus est identique à la condition suivante :
	if (empty($_POST['action'])) {
		$action = 'default';
	} else {
		$action = $_POST['action'];
	}

// USING THE ELVIS OPERATOR
	expr1 ?: expr2;
	// using the ternary operator
	expr1 ? expr1 : expr2;
	// using if/else
	if (expr1) {
		return expr1;
	} else {
		return expr2;
	}

	// The ternaries can be chained (i.e. it returns the first truthy value it encounters), for example:
	echo 0 ?: 1 ?: 2 ?: 3; // output: 1 (if true)


// Opérateur de fusion Null

	// Exemple #5 Assigner une valeur par défaut
	$action = $_POST['action'] ?? 'default';
	// le code ci-dessus est équivalent à cette structure if/else 
	if (isset($_POST['action'])) {
		$action = $_POST['action'];
	} else {
		$action = 'default';
	}
?>


?>

III) LES BOUCLES

<?php
	$nombre_de_lignes = 1;
	while ($nombre_de_lignes <= 100) { // je ne sais pas le nb de tours
		echo 'Ligne n°' . $nombre_de_lignes . ' : Je ne dois pas regarder les mouches quand j\'apprends le PHP.<br />';
		$nombre_de_lignes++;
	};
	for ($nombre_de_lignes = 1; $nombre_de_lignes <= 100; $nombre_de_lignes++) { // je sais le nb de tours
		// initialisation; condition; incrémentation
		echo 'Ligne n°' . $nombre_de_lignes . ' : Je ne dois pas regarder les mouches quand j\'apprends le PHP.<br />';
	}
?>

IV) LES TABLEAUX (ARRAY)

<?php
	// la fonction array permet de créer un array
	$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');
	// ou
	$prenoms[0] = 'François';
	// ect.
	echo $prenoms[0]; // François

	// Tableaux associatifs (découper une donnée en sous-éléments)
	$coordonnees = array (
		'prenom' => 'François',
		'nom' => 'Dupont',
		'adresse' => '3 rue du Paradis',
		'ville' => 'Marseille'
	);
	// ou
	$coordonnees['prenom'] = 'François';
	$coordonnees['ville'] = 'Marseille';
	// etc.
	echo $coordonnees['ville']; // Marseille
	// PARCOURIR UN TABLEAU
	for ($numero = 0; $numero < 5; $numero++) { 
		echo $prenoms[$numero] . '<br />'; // $prenoms[0], $prenoms[1], $prenoms[2], ect.
	}
	// même rendu
	foreach ($prenoms as $element) {
		echo $element . '<br />';
	}
	foreach ($coordonnees as $element) { // avantage : fait les tableaux associatifs
		echo $element . '<br />'; // François<br /> Dupont<br /> 3 rue etc.
	}
	// foreach + key
	foreach ($coordonnes as $key => $element) { // clé = clé de l'élément (prénom, nom)
		echo 'La variable' . $key . 'vaut = ' . $element . '<br />'; // La variable prénom vaut = François
	}
	// afficher rapidement un array avec print_r (debugage)
	echo '<pre>'; // texte preformaté, texte affiché tel qu'il est codé
	print_r($coordonnees);
	echo '</pre>';
	// Vérifier si un clé existe dans l'array : array_key_exists
	array_key_exists('key', $array);
	if (array_key_exists('nom', $coordonnees)) {
		echo 'La clé "nom" se trouve dans les coordonées !';
	}
	// Vérifier si une valeur existe dans l'array : in_array
	$fruits = array ('Banane', 'Pomme', 'Poire', 'Cerise', 'Fraise', 'Framboise');
	if (in_array('Banane', $fruits)) {
		echo 'La banane est un fruit !';
	}
	// Récupérer la clé d'une valeur dans l'array : array_search
	$position = array_search('Poire', $fruits); // renvoie le chiffre de la clé ou la clé correspondante
	echo 'La valeur "Poire" se trouve en ' . $position . 'ème position dans le tableau';

	// AJOUTER UNE VALEUR AU TABLEAU
	// no key
	array_push($array, $value);
	// same as:
	$array[] = $value;

	// key already known
	$array[$key] = $value;
?>

V) LES FONCTIONS

<?php
	fonctionImaginaire(17, 'Vert', 2.02, true, '= paramètres');
	$volume = calculCube(4); // récupérer la valeur de la fonction (pour plusieurs valeurs, combiner avec un array)
?>	<!-- LES FONCTIONS PRÊTES A L'EMPLOI -->
	<a href="http://fr.php.net/manual/fr/funcref.php" />
<?php
	// TRAITEMENT DES CHAINES DE CARACTERES

	//Longueur d'une chaine avec strlen
	$phrase = 'Bonjour tout le monde, je suis une phrase !';
	$longueur = strlen($phrase);
	echo 'La phrase ci-dessous comporte ' . $longueur . ' caractères.<br />' . $phrase;
	// Rechercher et remplacer avec str_replace
	$variable = str_replace('lettre ou chaine recherchée', 'chaine ou lettre que l\'on veut à la place', 'la chaine ou s\'effectue la recherche'); // ex. str_replace('b', 'p', 'bimbamboum') => echo $variable => 'pimpampoum';

	// Mélanger les lettres = str_shuffle

	// Définir une portion de lettres à afficher avec substr($variable, début, fin)
	substr(htmlspecialchars($result['comment']), 0, 50);
	
	// Ecrire en minuscule avec strtolower
	$chaine = 'JE SUIS LE MEILLEUR !';
	strtolower($chaine);

	// Ecrire en MAJUSCULES avec strtoupper

	// Récupérer la date avec date()
	H = heure; i = minutes; d = jour; m = mois; Y = année;
	$jour = date('d');
	$mois = date('m');
	$annee = date('Y');
	$heure = date('H');
	$minute = date('i');
	echo 'Bonjour nous sommes le ' . $jour . '/' . $mois . '/' . $annee . ' et il est précisément ' . $heure . 'h' . $minute;

	// Créer ses propres fonctions
	function DireBonjour($nom) { // paramètres
		echo 'Bonjour ' . $nom . ' !<br />';
	};
	DireBonjour('Sandra');
	DireBonjour('William');

	function VolumeCone($rayon, $hauteur) {
		$volume = $rayon * $rayon * 3.14 * $hauteur * (1/3);
		return $volume;
	};
	$volume = VolumeCone(3,1);
	echo 'Le volume d\'un cône de rayon 3 et de hauteur 1 est de ' . $volume;

	// FONCTIONS COMPLEXES
	
	// Modulo %
	'résultat % chiffre qui va se multiplier pour arriver au + proche du résultat = reste';
	1 % 3; // = 1
	2 % 3; // = 2
	3 % 3; // = 0
	4 % 3; // = 1
	5 % 3; // = 2
	6 % 3; // = 0
	7 % 3; // = 1
	8 % 3; // = 2
	9 % 3; // = 0
	10 % 3; // = 1
	11 % 3; // = 2
	6 % 1000; // 6 parceque pour arriver à 6, 1000 doit se multiplier par 0, puis ajouter 6;
	if (($a % 2) == 1) {
		echo "$a is odd.";
	} elseif (($a % 2) == 0) {
		echo "$a is even.";
	}

	// array_map
	// Notre fonction accepte 1 argument : le nombre actuellement traité par array_map
	$additionneur = function($nbr)
	{
	return $nbr + 5;
	};

	$listeNbr = [1, 2, 3, 4, 5];

	$listeNbr = array_map($additionneur, $listeNbr); // permet d'appeler la fonction qu'on lui passe en premier argument
	// sur chaque élément du tableau passé en deuxième argument
	// Nous obtenons alors le tableau [6, 7, 8, 9, 10]
?>

VI) LA GESTION DES ERREURS

• Erreurs courantes
	- Parse error : instruction mal formée. CAUSES : abscence de ; à la fin, guillemets mal fermés, mauvaise concatenation, accolades mal fermées, ect. Erreur peut être à la ligne précédente
	- Undefined function : fonction inconnue. CAUSES : la fonction n'existe pas ou n'est pas reconnue par PHP (extension non activée, par ex., ou pas adaptée à la version en cours)
	- Wrong parameter count : trop ou pas assez de paramètres dans la fonction
• Erreurs plus rares :
	- Headers already send by : les informations d'en-tête doivent être envoyées en tout début de code
	Ex. <?php session_start(); ?> (au tout début, sans rien avant)
		<html>
	- L'image contient des erreurs (par le navigateur) : afficher le code source de l'image
	- Maximum execution time exceeded : boucle infinie


VII) INCLURE DES PORTIONS DE PAGE

<a href="https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/4239271-inclure-des-portions-de-page" title="Inclure des portions de page" />

Inclure une même section sur toutes les pages (menu, header, ect.)

• La pratique : créer menu.php, header.php, footer.php, ect. (pas forcément besoin de php à l'intérieur)
<nav id="menu">        
    <div class="element_menu">
        <h3>Titre menu</h3>
        <ul>
            <li><a href="page1.html">Lien</a></li>
            <li><a href="page2.html">Lien</a></li>
            <li><a href="page3.html">Lien</a></li>
        </ul>
    </div>    
</nav>
Puis dans le code de la page d'accueil (ex. : index.php) => <?php include("menu.php"); ?>

VIII) CODER PROPREMENT

	• Donner des noms clairs, explicites, avec_underscore
	• Indenter le code
	• Un code correctement commenté : commenter un groupe de lignes, le sens général
	• Les Standards :
		PSR (PHP Standards Recommendations) > <a href="https://www.php-fig.org/psr/" title="liste des PSR" />
		À savoir au minimum : <a href="https://www.php-fig.org/psr/psr-1/" title="PSR-1" /> et <a href="https://www.php-fig.org/psr/psr-2/" title="PSR-2" />

IX) TRANSMETTRE DES DONNEES AVEC L'URL

Ex. http://www.monsite.com/bonjour.php?nom=Dupont&prenom=Jean&nomduparametre3=Valeurduparametre3
Dans index.php : <a href="bonjour.php?nom=Dupont&amp;prenom=Jean">Dis-moi bonjour !</a> (en HTML, & devient &amp; pour la validation W3C) => Le lien appelle la page bonjour.php en lui transmettant les deux valeurs;

• RECUPERER LES VALEURS EN PHP
La page bonjour.php créé un array associatif = $_GET; Ex. $_GET['nom'] = Dupont;
<p>Bonjour <?php echo $_GET['prenom'] . ' ' . $_GET['nom']; ?> !</p>

• NE JAMAIS FAIRE CONFIANCE AUX DONNEES RECUES
Les visiteurs peuvent changer l'url
Tester la présence d'un paramètre avec la fonction isset();
<?php
	if (isset($_GET['prenom']) && isset($_GET['nom'])) { // si les deux valeurs sont présentes
		echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' !';
	} else {
		echo 'Renseignez votre prénom et votre nom';
	}
?>
/!\ isset accepte les formulaires vides, qui contiennent des ''
Préfer !empty() qui renvoie TRUE UNIQUEMENT si la valeur est différente de null, false, 0, ou ''

• CONTROLER LA VALEUR DES PARAMETRES
bonjour.php?nom=Dupont&prenom=Jean&repeter=8 (répétitions, qui peuvent devenir malveillantes, ex. repeter=12345679)
<?php
	if (isset($_GET['prenom']) && isset($_GET['nom']) && isset($_GET['repeter'])
	{
		for ($i = 0 ; $i < $_GET['repeter'] ; $i++)
		{ 
			echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' !<br />';
		}
	}
	else 
	{
		echo 'Il faut renseigner nom, prénom et nombre de répétitions !';
	}
?>
Il faut anticiper : une valeur raisonnable, et logique
	> Vérifier que la valeur est un nombre avec (int) (transtypage)
		<?php
		$_GET['repeter'] = (int) $_GET['repeter']; // 0 si c'est une chaine
		?>
	> Limiter la valeur des répétitions
	<?php
		if (isset($_GET['prenom']) && isset($_GET['nom']) && isset($_GET['repeter']))
		{
			// 1 : On force la conversion en nombre entier
			$_GET['repeter'] = (int) $_GET['repeter'];

			// 2 : Le nombre doit être compris entre 1 et 100
			if ($_GET['repeter'] >= 1 && $_GET['repeter'] <= 100) 
			{	
				for ($i = 0 ; $i < $_GET['repeter'] ; $i++)
				{
					echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' !<br />';
				}
			}
		}
		else
		{
			echo 'Il faut renseigner un nom, un prénom et un nombre de répétitions !';
		}
	?>

X) TRANSMETTRE DES DONNEES AVEC LES FORMULAIRES

• Rappel :
formulaire.php
	<form method="post (99% des cas)" action="cible_des_donnees.php"> // reçoit un array $_POST
		<p>
			On insèrera ici les éléments de notre formulaire.
			<input type="text" name="nom de la zone de texte, ex. pseudo" value="option, valeur de base" /> // récupérable par $_POST['pseudo']
		</p>
	</form>
cible.php
	<p>Bonjour, <?php echo $_POST['pseudo']; ?> !</p>
	<p>Si tu veux changer de prénom, <a href="formulaire.php" title="formulaire">clique-ici</a> pour revenir sur le formulaire.</p>
multilignes
	<textarea name="message" rows="8" cols="45">
		Votre message ici.
	</textarea>
liste déroulante
	<select name="choix">
		<option value="choix1">Choix 1</option>
		<option value="choix2">Choix 2</option>
		<option value="choix3" selected="selected">Choix 3</option>
		<option value="choix4">Choix 4</option>
	</select>
	$_POST['choix'] contiendra le choix du client (le value correspondant, ex. 'choix3')
les cases à cocher
	<input type="checkbox" name="case" id="case" checked="checked" /> <label for="case">Ma case à cocher</label>
	$_POST['case'] contiendra le choix du client (valeur 'on' pour la case cochée), ou rien
les boutons d'option
	Aimez-vous les frites ?
	<input type="radio" name="frites" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
	<input type="radio" name="frites" value="non" id="non" /> <label for="non">Non</label>
	$_POST['frites'] = 'oui' // bien renseigner les value
les champs cachés (crée une variable invisible)
	<input type="hidden" name="pseudo" value="Mateo21" />, créé $_POST['pseudo'] = 'Mateo21'

• Ne JAMAIS faire confiance aux données reçues
	- Vérifier toutes les données attendues
	- Eviter que le client puisse inclure du html, javascript dans ces réponses : échapper le code html avec la fonction htmlspecialchars(), qui rend le texte brut
	<p>Ton pseudo est : <?php echo htmlspecialchars($_POST['pseudo']); ?> !</p>
	- Tout ce qui vient de l'utilisateur et qui est affiché sur le site (messages, pseudo, signatures) doit passer par la fonction htmlspecialchars();
	- Retirer les balises HTML avec la fonction strip_tags();

• L'envoi de fichiers
	- HTML :
	<form action="cible_envoi.php" method="post" enctype="multipart/form-data">
		<p>
				Formulaire d'envoi de fichier :<br />
				<input type="file" name="monfichier" /><br />
				<input type="submit" value="Envoyer le fichier" />
		</p>
	</form>
	- Traitement de l'envoi en PHP :
	Le visiteur est redirigé vers cible_envoi.php après l'envoi;
	Au moment où la page PHP s'execute, le fichier est stocké dans un dossier temporaire, il faut ensuite l'accepter ou non (bonne extension, taille, ect.);
	Si le fichier est bon, on l'accepte grâce à la fonction move_uploaded_file();
	Pour chaque fichier envoyé, une variable $_FILES['nom_du_champ'] est créée;
	Variables : $_FILES['nom_du_champ']['name']['type']['size', en octets, < 8Mo]['tmp_name', emplacement temporaire du fichier]['error', code d'erreur, 0 si OK]

	<?php
		// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
		if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
		{
				// Testons si le fichier n'est pas trop gros
				if ($_FILES['monfichier']['size'] <= 1000000)
				{
						// Testons si l'extension est autorisée
						$infosfichier = pathinfo($_FILES['monfichier']['name']); // renvoie un array contenant l'extension du fichier
						$extension_upload = $infosfichier['extension'];

						$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

						if (in_array($extension_upload, $extensions_autorisees))
						{
								// On peut valider le fichier et le stocker définitivement
								move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name'])); // move_uploaded_files(nom du fichier temporaire, chemin de stockage)
								// $_FILES['monfichier][name] = C:\dossier\fichier.png | basename = fichier.png
								echo "L'envoi a bien été effectué !";
						}
				}
		}
	?>
	Vérifier que le dossier "uploads" sur le serveur existe.
	Pour les droits d'écritures : FileZilla > clic droit sur le dossier Uploads > Attributs du fichier > 733 (PHP pourra placer les éléments uploadés dans ce dossier)
	Gérer les espaces, accents, les fichiers de même nom, ect.;
	Solution : choisir le nom de fichier à envoyer sur le serveur, comme un compteur qui s'incrémente : 1.png, 2.png, 3.png, etc.;
	Approfondir : <a href="https://openclassrooms.com/fr/courses/1085676-upload-de-fichiers-par-formulaire" title="Upload de fichiers par formulaire" />


XI) TP : Page protégée par un mot de passe

- Formulaire.php : 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page protégée par mot de passe</title>
    </head>
    <body>
        <p>Veuillez entrer le mot de passe pour obtenir les codes d'accès au serveur central de la NASA :</p>
        <form action="secret.php" method="post">
            <p>
            <input type="password" name="mot_de_passe" />
            <input type="submit" value="Valider" />
            </p>
        </form>
        <p>Cette page est réservée au personnel de la NASA. Si vous ne travaillez pas à la NASA, inutile d'insister vous ne trouverez jamais le mot de passe ! ;-)</p>
    </body>
</html>
- Secret.php : 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Codes d'accès au serveur central de la NASA</title>
    </head>
    <body>
    
		<?php
			if (isset($_POST['mot_de_passe']) && $_POST['mot_de_passe'] ==  "kangourou") // Si le mot de passe est bon
			{
			// On affiche les codes
		?> <!-- on laisse ouverte l'accolade puis ferme la balise PHP pour afficher du texte long -->
		
		<h1>Voici les codes d'accès :</h1>
		<p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>   
		
		<p>
		Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br />
		La NASA vous remercie de votre visite.
		</p>

		<?php
			}
			else // Sinon, on affiche un message d'erreur
			{
				echo '<p>Mot de passe incorrect</p>';
			}
		?>
    
        
    </body>
</html>

• Réaliser le TP sur une page :  l'attribut action du formulaire serait action="formulaire.php" (il s'appellerait lui-même) + la page serait construite sur un grand if :
	
<?php

// Le mot de passe n'a pas été envoyé ou n'est pas bon
if (!isset($_POST['mot_de_passe']) OR $_POST['mot_de_passe'] != "kangourou")
{
	// Afficher le formulaire de saisie du mot de passe
}
// Le mot de passe a été envoyé et il est bon
else
{
	// Afficher les codes secrets
}

?>

XII) LES VARIABLES SUPERGLOBALES

$_MAJUSCULE, sont des array automatiquement créés par PHP à chaque fois qu'une page est créée
Afficher le contenu d'une superglobale avec print_r() :
<pre>
<?php
print_r($_GET);
?>
</pre>
$_SERVER : valeurs renvoyées par le serveur. $_SERVER['REMOTE_ADDR'] = adresse IP du client
$_ENV : variables d'environnement renvoyées par le serveur
$_SESSION : variables de session, stockées le temps de la présence du client
$_COOKIE : valeurs des cookies enregistrés sur l'ordinateur du client
$_GET : données envoyées en paramètres via URL
$_POST : informations envoyées via formulaire
$_FILES : liste des fichiers envoyés via formulaire

XIII) SESSION & COOKIES

Exemple d'utilisation des sessions :
<?php
session_start(); // On démarre la session AVANT d'écrire du code HTML

// On s'amuse à créer quelques variables de session dans $_SESSION, que je pourrais utiliser sur l'ensemble du site
$_SESSION['prenom'] = 'Jean';
$_SESSION['nom'] = 'Dupont';
$_SESSION['age'] = 24;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
    <p>
        Salut <?php echo $_SESSION['prenom']; ?> !<br />
        Tu es à l'accueil de mon site (index.php). Tu veux aller sur une autre page ?
    </p>
    <p>
        <a href="mapage.php">Lien vers mapage.php</a><br />
        <a href="monscript.php">Lien vers monscript.php</a><br />
        <a href="informations.php">Lien vers informations.php</a>
    </p>
    </body>
</html>

informations.php :

<?php
session_start(); // On démarre la session AVANT toute chose
?>
 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
    <p>Re-bonjour !</p>
    <p>
        Je me souviens de toi ! Tu t'appelles <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?> !<br />
        Et ton âge hummm... Tu as <?php echo $_SESSION['age']; ?> ans, c'est ça ? :-D
    </p>
    </body>
</html>

• Utilité des sessions : login/mdp, resteindre certaines pages à des visiteurs, gérer un "panier de commande" durant une session

• LES COOKIES :
- Cookies : fichiers texte permettant de retenir des informations sur le long terme
Chaque cookie stocke UNE information à la fois, a une date d'expiration

- Pour écrire un cookie : setcookie() + nom_du_cookie + valeur_du_cookie + date-expiration (dans un an => time() + 365*24*60*60)
<?php setcookie('pseudo', 'pabloushka', time() + 365*24*60*60); ?>

/!\ Sécuriser son cookie avec l'option httpOnly (cookie devient inaccessible en JS, donc moins de risque de hack) => rajouter true en fin de code
<?php setcookie('pseudo', 'pabloushka', time() + 365*24*60*60, null, null, false, true); ?>

/!\ Comme la SESSION, créer le COOKIE AVANT LE HTML
<?php
setcookie('pseudo', 'M@teo21', time() + 365*24*3600, null, null, false, true); // On écrit un cookie
setcookie('pays', 'France', time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...
// Et SEULEMENT MAINTENANT, on peut commencer à écrire du code html
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ma super page PHP</title>
    </head>
    <body>

    etc.
	</body>
</html>

- Afficher un COOKIE avec $_COOKIE :
<p>
    Hé ! Je me souviens de toi !<br />
    Tu t'appelles <?php echo $_COOKIE['pseudo']; ?> et tu viens de <?php echo $_COOKIE['pays']; ?> c'est bien ça ?
</p>

- Modifier un cookie existant : refaire appel à setcookie en gardant le même nom
<?php setcookie('pays', 'Chine', time() + 365*24*3600, null, null, false, true); ?> + remise à 0 du temps d'expiration


XIII) LIRE ET ECRIRE DANS UN FICHIER

• Le but : stocker définitivement des objets (ex. messages de forum)

• Autoriser l'écriture de fichiers (chmod)
FileZilla > clic droit sur le fichier du serveur > CHMOD ou Permissions de fichier > Valeur numérique : 777 // Manoeuvre également possible pour un dossier (pratique pour créer des fichiers dans un dossier PHP)
<a href="https://openclassrooms.com/fr/courses/43538-reprenez-le-controle-a-laide-de-linux/39044-les-utilisateurs-et-les-droits#ss_part_5" title="En savoir plus sur les CHMOD" />

• Ouvrir et fermer un fichier
Ex. compteur.txt > FileZilla > serveur > CHMOD 777
Pas de CHMOD 777 > failed to open stream: Permission denied
Consigne : Compter le nb de fois qu'une page a été vue et enregistrer ce nombre dans ce fichier
<?php
// 1 : on ouvre le fichier
$monfichier = fopen('compteur.txt', 'r+');
// Mode "r" : Ouvre le fichier en lecture seule
// Mode "r+" : Ouvre le fichier en lecture et écriture (souvent utilisé)
// Mode "a" : Ouvre le fichier en écriture seule. Mais il y a un avantage : si le fichier n'existe pas, il est automatiquement créé.
// Mode "a+" : Ouvre le fichier en lecture et écriture. Si le fichier & n'existe pas, il est créé automatiquement. Attention : le répertoire doit avoir un CHMOD à 777 dans ce cas ! À noter que si le fichier existe déjà, le texte sera rajouté à la fin.

// 2 : on fera ici nos opérations sur le fichier...

// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($monfichier);
?>

• Lire et écrire dans un fichier
- Lire :
	caractère par caractère avec fgetc() (peu usité);
	ligne par ligne avec fgets();
<?php
// 1 : on ouvre le fichier
$monfichier = fopen('compteur.txt', 'r+');
 
// 2 : on lit la première ligne du fichier
$ligne = fgets($monfichier);
// si mon fichier fait 15 lignes, on fait une boucle
 
// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($monfichier);
?>

• Ecrire, avec fputs()
<?php fputs($monfichier, 'Texte à écrire'); ?> /!\ si on le couple à l'exemple ci-dessus (après le fgets), le curseur est à la fin de la première ligne du fichier et va écrire à la suite
Pour éviter ça, on utilise la fonction fseek() qui replace le curseur là on le souhaite
Ex. pour le mettre au début > fseek($monfichier, 0);
Pour les modes a et a+, les données seront rajoutées en fin de fichier;

Combien de fois la page a été vue ?

<?php
$monfichier = fopen('compteur.txt', 'r+');
 
$pages_vues = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
$pages_vues += 1; // On augmente de 1 ce nombre de pages vues
fseek($monfichier, 0); // On remet le curseur au début du fichier
fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues
 
fclose($monfichier);
 
echo '<p>Cette page a été vue ' . $pages_vues . ' fois !</p>';
?>

----------------------------- // LES BASES DE DONNEES // -----------------------------------

I) FONCTIONNEMENT
	- Un langage qui lui est propre : le langage SQL
	- PHP fait la jonction entre moi et MySQL
	- Structure d'une base de données :
		• La base, l'armoire où l'on classe les informations
		• Une table, un tiroir qui contient des données différentes (pseudos/infos, messages, ect.)
		• Les champs, les colonnes du tiroir
		• Les entrées, les lignes du tiroir

	TABLE 1
	   champ 1     champ 2                  champ 3                     champ 4
	┌──────────┬───────────────┬───────────────────────────────┬───────────────────────┐
	│ Numéro   │ Pseudo        │ E-mail                        │ Âge                   │ 
	├──────────┼───────────────┼───────────────────────────────┼───────────────────────┤
	│1         │ Kryptonic     │ kryptonic@free.fr             │ 24                    │ entrée
	│2         │ Serial_Killer │ serialkiller@unitedgamers.com │ 28                    │ entrée
	└──────────┴───────────────┴───────────────────────────────┴───────────────────────┘
	Ex. de noms de table :
	• news : stocke toutes les news qui sont affichées à l'accueil ;
	• livre_or : stocke tous les messages postés sur le livre d'or ;
	• forum : stocke tous les messages postés sur le forum ;
	• newsletter : stocke les adresses e-mail de tous les visiteurs inscrits à la newsletter.

	Les données sont stockées dans des fichiers sur le disque dur
	/!\ NE JAMAIS OUVRIR OU MODIFIER CES FICHIERS (toujours passer par MySQL)


II) PHPMYADMIN

/!\ BUG abscence de SQL à l'export => https://github.com/phpmyadmin/phpmyadmin/commit/95114841420af6277b0406ec7f0d32c4ff3fcf27

Manipuler une base de données MySQL avec phpMyAdmin : https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/913893-phpmyadmin
Pour se connecter à phpMyAdmin > éteindre VPN > http://localhost/phpmyadmin/index.php
Les types de champs MySQL :
	Catégories :
	• NUMERIC : nombres, petits nombres entiers (TINYINT), gros nombres (BIGINT)
	• DATE and TIME : dates et heures
	• STRING : chaines de caractères
	• SPATIAL : données spatiales (cartographie)
	Les types de données les plus courants :
	• INT : nombre entier
	• VARCHAR : texte court (1-255 caract.) /!\ TOUJOURS INDIQUER LE NOMBRE MAX DE CARACT.
	• TEXT : long texte
	• DATE : date (jour, mois, année)
	Les clés primaires :
	• Identifier de manière unique une entrée dans la table (en général le champ ID)
	• Vitale pour chaque table (meilleurs performances et évite les doublons)
	• Pour chaque table/projet > Champ ID > index PRIMARY > AUTOINCREMENT

Modifier une table
Insérer > Valeur > Remplir les entrées (sauf ID qui s'incrémente tout seul)

Autre opérations
	• Afficher : affiche le contenu de la table ;
    • Structure : présente la structure de la table (liste des champs) ;
    • Insérer : permet d'insérer de nouvelles entrées dans la table ;
	• SQL : taper des requêtes SQL ;
    • Importer : envoyer un fichier de requêtes SQL (.sql) ;
    • Exporter : récupérer la base de données sur le disque dur sous forme de fichier texte (.sql), qui dit à MySQL comment créer ma base de données. On l'utilise pour : transmettre ma base de données sur le web + faire une copie de sauvegarde de la base de données. Exporter > paramètres défauts > Transmettre
	Recréer ma base de données sur le web > phpMyAdmin de l'herbergeur > Importer ;
    • Opérations : changer le nom de la table, déplacer la table vers, copier la table, optimiser (ranger de nouveau) la table ;
    • Vider : Vide tout le contenu de la table et fait disparaitre les entrées (seule la structure et les champs resteront) /!\ IRREVERSIBLE /!\ ;
    • Supprimer : Supprime tout /!\ IRREVERSIBLE /!\ ;


III) LIRE DES DONNEES

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/914293-lisez-des-donnees

• Se connecter à la base de données en PHP

- Utilisation de l'extension PDO (universelle)

- Se connecter à MySQL avec PDO : 
	• Le nom de l'hôte : adresse de l'ordinateur où MySQL est installé (localhost si MySQL installé dans le même ordinateur que PHP, ou sql.hebergeur.com)
	• La base : nom de la base de données à laquelle on va se connecter
	• Le login : pour s'identifier (souvent le même que le ftp)
	• Mot de passe : souvent le même que le ftp

- Pour se connecter à la base de données "test" :
<?php
	// Sous WAMP (Windows)
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
?>
Objet $bdd = objet qui représente la connexion à la base de données ;
$bdd = (nom de l'hôte, base de données, login, mdp)
En ligne :
<?php
	$bdd = new PDO('mysql:host=sql.hebergeur.com;dbname=mabase;charset=utf8', 'pierre.durand', 's3cr3t');
?>

- Tester la présence d'erreurs :
Au lieu d'afficher la ligne d'erreur (avec le mdp), il vaut mieux traiter l'erreur en la capturant ;
<?php
	try // exécute les instructions
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch (Exception $e) // s'il y a erreur...
	{
			die('Erreur : ' . $e->getMessage());
	}
?>

• Récupérer des données

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/914293-lisez-des-donnees#/id/r-914147

- Faire une requête 
	$reponse = $bdd->query('Tapez votre requête SQL ici');

- Première requête SQL
	SELECT * FROM jeux_video
	TYPE_D_OPERATION champs_MySQL (tous les champs = *, champs noms et posesseurs = noms, possesseur) FROM nom_de_la_table
	<?php
	$reponse = $bdd->query('SELECT * FROM jeux_video');
	?>

- Afficher le résultat d'une requête
	Traiter $reponse, ligne par ligne avec fetch();
	<?php
	$donnees = $reponse->fetch();
	?>
	$donnees = array qui contient champ par champ les valeurs de la PREMIERE entrée;
	Pour le champ 'console' -> $donnees['console'];
	Il faut traiter les donnes dans une boucle;

	<?php
	try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
			die('Erreur : '.$e->getMessage());
	}

	// Si tout va bien, on peut continuer

	// On récupère tout le contenu de la table jeux_video
	$reponse = $bdd->query('SELECT * FROM jeux_video');

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
	?> <!-- on ferme l'accolade car le texte qui suit est long -->
		<p>
		<strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
		Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
		Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
		<?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
	</p>
	<?php
	}

	$reponse->closeCursor(); // Termine le traitement de la requête, OBLIGATOIRE

	?>

- Afficher seulement le contenu de quelques champs :
	Ex. Lister les noms des jeux : SELECT nom FROM jeux_video;
	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}

	$reponse = $bdd->query('SELECT nom FROM jeux_video');

	while ($donnees = $reponse->fetch())
	{
		echo $donnees['nom'] . '<br />';
	}

	$reponse->closeCursor();

	?>

• Les critères de selection

- Mot-clés WHERE ; ORDER BY ; LIMIT

- WHERE : trier les données
Ex. SELECT * FROM jeux_video WHERE possesseur='Patrick'; // lorsque le champ 'possesseur est égal à Patrick'
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT nom, possesseur FROM jeux_video WHERE possesseur=\'Patrick\'');

while ($donnees = $reponse->fetch())
{
	echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . '<br />';
}

$reponse->closeCursor();

?>

- COMBINER PLUSIEURS CONDITIONS, avec AND ou OR
SELECT * FROM jeux_video WHERE possesseur='Patrick' AND prix < 20; // lorsque le champ possesseur égal Patrick et lorsque le prix est inférieur à 20

- ORDER BY : ordonner les résultats
Ex. SELECT * FROM jeux_video ORDER BY prix; // sélectionner tous les champs de la table jeux_video et ordonner les résultats par prix croissants
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT nom, prix FROM jeux_video ORDER BY prix');

while ($donnees = $reponse->fetch())
{
	echo $donnees['nom'] . ' coûte ' . $donnees['prix'] . ' EUR<br />';
}

$reponse->closeCursor();

?>

Par ordre décroissant : rajouter DESC à la fin;
SELECT * FROM jeux_video ORDER BY prix DESC; // ordonner les résultats par prix décroissant
ORDER BY sur du texte : ordre alphabétique

- LIMIT : selectionner qu'une partie des résultats (par ex. les 20 premiers)
SELECT * FROM jeux_video LIMIT 0, 20; /!\ 0 = première entrée, 20 = 21ème entrée, etc.
LIMIT première entrée, nombre d'entrées à selectionner;
LIMIT 0, 20 : affiche les vingt premières entrées ;
LIMIT 5, 10 : affiche de la sixième à la quinzième entrée ;
LIMIT 10, 2 : affiche la onzième et la douzième entrée ;

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT nom FROM jeux_video LIMIT 0, 10');

echo '<p>Voici les 10 premières entrées de la table jeux_video :</p>';
while ($donnees = $reponse->fetch())
{
	echo $donnees['nom'] . '<br />';
}

$reponse->closeCursor();

?>

SELECT nom, possesseur, console, prix FROM jeux_video WHERE console='Xbox' OR console='PS2' ORDER BY prix DESC LIMIT 0, 10;
Ordre : WHERE > ORDER BY > LIMIT

• Construire des requêtes en fonction des variables

- La mauvaise idée : concaténer une variable dans une requête
Ex. <?php
$reponse = $bdd->query('SELECT nom FROM jeux_video WHERE possesseur=\'' . $_GET['possesseur'] . '\'');
?> /!\ RISQUE DE HACK si $_GET vient de l'utilisateur (ne JAMAIS faire confiance à l'utilisateur)

- La solution : les requêtes préparées
À utiliser si l'on veut adapter une reqûete en fonction d'une ou plusieurs variables

	- Avec des marqueur "?"
	<?php
	$req = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ?');
	// requête sans variable, avec prepare();
	$req->execute(array($_GET['possesseur']));
	// requête avec execute, où le ? est remplacé par le contenu, ici la valeur du paramètre possesseur 
	?>
	S'il y a plusieurs marqueurs, il faut les appeler dans le bon ordre :
	<?php
	$possesseur = 'Florent';
    $prix_max = 20;
	$req = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ? AND prix <= ?');
	$req->execute(array($possesseur, $_prix_max));
	?>
	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ?  AND prix <= ? ORDER BY prix');
	$req->execute(array($_GET['possesseur'], $_GET['prix_max']));

	echo '<ul>';
	while ($donnees = $req->fetch())
	{
		echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
	}
	echo '</ul>';

	$req->closeCursor();

	?>

	- Avec des marqueurs nominatifs (si la requête contient beaucoup de parties variables)
	<?php
	$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prixmax');
	$req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max']));
	?>
	:possesseur et :prixmax, puis 'possesseur' => variable, 'prixmax' => variable;
 	Plus de clarté quand il y a beaucoup de paramètres;

- Traquer les erreurs

Lorsqu'une requête SQL « plante », bien souvent PHP vous dira qu'il y a eu une erreur à la ligne du fetch : Fatal error: Call to a member function fetch() on a non-object in C:\wamp\www\tests\index.php on line 13
Pour afficher des détails sur l'erreur, il faut activer les erreurs lors de la connexion à la base de données via PDO :
<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // affiche des erreurs plus précises
?>
TOUJOURS activer ce dernier paramètre !


IV) ECRIRE DES DONNEES

• INSERT : ajouter des données

- La requête INSERT INTO permet d'ajouter une entrée;
INSERT INTO jeux_video(ID, nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES('', 'Battlefield 1942', 'Patrick', 'PC', 45, 50, '2nde guerre mondiale');
Les nombres n'ont pas besoin de '' pour fonctionner;
INSERT INTO table(noms des champs concernés) VALUES(valeurs à associer);
Champ ID : '' ou mieux, absent (la base de données gère l'auto-incrémentation);
INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES('Battlefield 1942', 'Patrick', 'PC', 45, 50, '2nde guerre mondiale')

- Application en PHP
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On ajoute une entrée dans la table jeux_video
$bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(\'Battlefield 1942\', \'Patrick\', \'PC\', 45, 50, \'2nde guerre mondiale\')');

echo 'Le jeu a bien été ajouté !';
?>
Requête difficile à lire + écrire;
Requête insère les même données;
Pour rendre une partie de la requête variable, il faut faire appel aux requêtes préparées;

- Insertion de données variables grâce aux données préparées
Technique recommandée pour insérer des variables;
<?php
$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
$req->execute(array( // array sur plusieurs lignes : plus lisible
	'nom' => $nom,
	'possesseur' => $possesseur,
	'console' => $console,
	'prix' => $prix,
	'nbre_joueurs_max' => $nbre_joueurs_max,
	'commentaires' => $commentaires
	));

echo 'Le jeu a bien été ajouté !';
?>

• UPDATE : modifier des données

- La requête UPDATE permet de modifier une entrée
UPDATE jeux_video SET prix = 10, nbre_joueurs_max = 32 WHERE ID = 51;
UPDATE nom_table SET champAModifier1 = nouvelleValeur, champAModifier2 = nouvelleValeur WHERE entreeAModifier;
UPDATE jeux_video SET prix = '10', nbre_joueurs_max = '32' WHERE nom = 'Battlefield 1942';
Florent vient de racheter tous les jeux de Michel;
UPDATE jeux_video SET possesseur = 'Florent' WHERE possesseur = 'Michel';
Traduction : « Dans la table jeux_video, modifier toutes les entrées dont le champ possesseur est égal à Michel, et le remplacer par Florent. »

- Application en PHP
<?php
$bdd->exec('UPDATE jeux_video SET prix = 10, nbre_joueurs_max = 32 WHERE nom = \'Battlefield 1942\'');
?>
<?php
$nb_modifs = $bdd->exec('UPDATE jeux_video SET possesseur = \'Florent\' WHERE possesseur = \'Michel\'');
echo $nb_modifs . ' entrées ont été modifiées !'; // 13 entrées ont été modifiées
?>

- Avec une requête préparée
<?php
$req = $bdd->prepare('UPDATE jeux_video SET prix = :nvprix, nbre_joueurs_max = :nv_nb_joueurs WHERE nom = :nom_jeu');
$req->execute(array(
	'nvprix' => $nvprix,
	'nv_nb_joueurs' => $nv_nb_joueurs,
	'nom_jeu' => $nom_jeu
	));
?>

• DELETE : supprimer des données

/!\ Après supression, AUCUN  moyen de récupérer les données !;
DELETE FROM jeux_video WHERE nom='Battlefield 1942'; // ne pas mettre de * !
DELETE FROM nom_table WHERE entreeASupprimer;
Avec exc() si une entrée, ou prepare();


• TRAITER LES ERREURS SQL

- Repérer l'erreur SQL en PHP
Fatal error: Call to a member function fetch() on a non-object
Cette erreur survient lorsque vous voulez afficher les résultats de votre requête, généralement dans la boucle  while ($donnees = $reponse->fetch());

- Crache le morceau !
Repérez la requête qui selon vous plante (certainement celle juste avant la boucle  while), et demandez d'afficher l'erreur s'il y en a une, comme ceci :
<?php
$reponse = $bdd->query('SELECT nom FROM jeux_video') or die(print_r($bdd->errorInfo()));
?>
En général, MySQL vous dit « You have an error in your SQL syntax near 'XXX' ». À vous de bien relire votre requête SQL ; l'erreur se trouve généralement près de l'endroit où on vous l'indique.


V) TP : MINI-CHAT

À retenir :
- La fonction header() permet d'envoyer des "en-têtes HTTP" (protocole utilisé par le serveur et le client pour échanger des pages web) > Redirection avec header('Location : XXX') (technique transparente et instantanée)

minichat.php : 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
    </body>
</html>

minichat_post.php :

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

/* Ma version, plus sécurisée =
$pseudo = htmlspecialchars($_POST['pseudo']); 
$message = htmlspecialchars($_POST['message']); 

$req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo, :message)');
$req -> execute(array(
    'pseudo' => $pseudo,
    'message' => $message
));
*/

// Redirection du visiteur vers la page du minichat
header('Location: minichat.php');
?>

Aller plus loin :
- Vérifier si les cases sont remplies, si c'est pas trop long
- Retenir le pseudo avec un cookie
- Proposer d'actualiser le mini-chat
- Afficher les anciens messages


VI) LES FONCTIONS SQL

Les fonctions SQL sont classées en 2 catégories :
	- Les fonctions scalaires : agissent sur chaque entrée (ex. transformer en majuscule chacune des entrées d'un champ);
	- Les fonctions d'agrégat : calculs sur l'ensemble de la table pour retourner une valeur (ex. le prix moyen);

• Les fonctions scalaires

- Utiliser une fonction scalaire SQL
Les noms des fonctions s'écrivent en MAJUSCULES, comme SELECT, INSERT, etc.;
SELECT UPPER(nom) FROM jeux_video; // la fonction UPPER est appliquée sur le champ 'nom' > tous les noms passent en MAJUSCULES
La fonction UPPER modifie SEULEMENT la valeur envoyée à PHP, pas la table;
Cela crée un champ virtuel (un ALIAS) qui n'existe que le temps de la requête;
SELECT UPPER(nom) AS nom_maj FROM jeux_video; // on récupère les noms en MAJ grâce au chap virtuel nom_maj
<?php
$reponse = $bdd->query('SELECT UPPER(nom) AS nom_maj FROM jeux_video');

while ($donnees = $reponse->fetch())
{
	echo $donnees['nom_maj'] . '<br />'; // SUPER MARIO BROS, SONIC, ZELDA, ect.
}

$reponse->closeCursor();

?>
Combiné avec les autres champs :
SELECT UPPER(nom) AS nom_maj, possesseur, console, prix FROM jeux_video;
-> SUPER MARIO BROS | Florent | NES | 4

- Quelques fonctions scalaires utiles :

UPPER : convertir en MAJUSCULES => SELECT UPPER(nom) AS nom_maj FROM jeux_video; Sonic => SONIC
LOWER : CONVERTIR EN minuscules => SELECT LOWER(nom) AS nom_maj FROM jeux_video; Sonic => sonic
LENGTH : compter le nombre de C4R4CT3R3S => SELECT LENGTH(nom) AS nom_maj FROM jeux_video; 
Sonic => 5;
ROUND : arrondir un chiffre décimal => SELECT ROUND(prix, 2) AS prix_arrondi FROM jeux_video => SELECT ROUND(nomChamp, nombreChiffresApresVirgule) AS alias FROM table; 25,86999 => 25,87
D'autres : Un liste des fonctions mathématiques > https://dev.mysql.com/doc/refman/8.0/en/numeric-functions.html;
Des fonctions sur les chaînes de caractère > https://dev.mysql.com/doc/refman/8.0/en/string-functions.html


• Les fonctions d'agrégat

- Utiliser une fonction d'agrégat SQL :
Elles font des opérations sur plusieurs entrées pour retourner une valeur;
Une fonction d'agrégat comme AVG renvoie une seule entrée : la valeur moyenne de tous les prix;
Elle calcule la moyenne d'un champ contenant des nombres;
SELECT AVG(prix) AS prix_moyen FROM jeux_video => 28.34;
<?php
$reponse = $bdd->query('SELECT AVG(prix) AS prix_moyen FROM jeux_video');

$donnees = $reponse->fetch(); // pas de boucle sachant qu'on ne récupère qu'UNE entrée
echo $donnees['prix_moyen'];

$reponse->closeCursor();

?>

- Filtrer les résultats :
SELECT AVG(prix) AS prix_moyen FROM jeux_video WHERE possesseur='Patrick'; // le prix moyen des jeux appartenant à Patrick

- /!\ Ne pas mélanger une fonction d'agrégat avec d'autres champs :
SQL renvoie les informations sous la forme d'un tableau;
On ne peut pas représenter la moyenne des prix (qui tient en une seule entrée) en même temps que la liste des jeux. Si on voulait obtenir ces deux informations il faudrait faire deux requêtes.;

- Quelques fonctions d'agrégat utiles :

AVG : calcule la moyenne d'un champ contenant des nombres => SELECT AVG(prix) AS prix_moyen FROM jeux_video
SUM : additionne toutes les valeurs d'un champ => SELECT SUM(prix) AS prix_total FROM jeux_video WHERE possesseur='Patrick' => valeur totale des jeux de Patrick;
MAX : retourne la valeur maximale d'un champ => SELECT MAX(prix) AS prix_max FROM jeux_video => le jeu le plus cher
MIN : retourne la valeur minimale d'un champ => SELECT MIN(prix) AS prix_min FROM jeux_video => le jeu le moins cher

COUNT : compte le nombre d'entrées => s'utilise de plusieurs façons :
SELECT COUNT(*) AS nbjeux FROM jeux_video; // * en paramètres, le plus courant
SELECT COUNT(*) AS nbjeux FROM jeux_video WHERE possesseur='Florent'; // nombre de jeux appartenant à Florent
Compter uniquement les entrées pour lesquelles l'un des champs n'est pas vide, c'est-à-dire qu'il ne vaut pas NULL => SELECT COUNT(nbre_joueurs_max) AS nbjeux FROM jeux_video => SELECT COUNT(nom_champ) => nombre d'entrées remplies du champ 'nbre_joueurs_max';
Compter le nombre de valeurs distinctes sur un champ précis => SELECT COUNT(DISTINCT possesseur) AS nbpossesseurs FROM jeux_video => nombre exact de joueurs;


• GROUP BY et HAVING : le groupement de données

SELECT AVG(prix) AS prix_moyen, console FROM jeux_video est impossible : on ne peut pas avoir un tableau avec un champ et une seule entrée (prix moyen) et un champ avec l'ensemble des entrées.

- GROUP BY : grouper des données
Demander le prix moyen des jeux pour chaque console : GROUP BY + fonction d'agrégat;
SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console;
GROUP BY + fonction d'agrégat;

- HAVING : filtrer les données regroupées
Equivalent de WHERE, mais agit à la fin des opérations;
SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console HAVING prix_moyen <= 10;
Récupère uniquement la liste des consoles et leur prix moyen si ce prix moyen ne dépasse pas 10€;
HAVING ne s'utilise que sur le résultat d'une fonction d'agrégat (ici prix_moyen);

WHERE agit en premier, avant le groupement des données, tandis que HAVING agit en second, après le groupement des données. On peut d'ailleurs très bien combiner les deux :
SELECT AVG(prix) AS prix_moyen, console FROM jeux_video WHERE possesseur='Patrick' GROUP BY console HAVING prix_moyen <= 10 => On demande à récupérer le prix moyen par console de tous les jeux de Patrick (WHERE), à condition que le prix moyen des jeux de la console ne dépasse pas 10 euros (HAVING).


VII) LES DATES EN SQL

• Les champs de type date

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/915206-les-dates-en-sql#/id/r-915156

- Les différents types de dates :
	○ DATE : stocke une date au format AAAA-MM-JJ (année-mois-jour); (très utilisé)
	○ TIME : stocke un moment au format HH:MM:SS (heure-minutes-secondes);
	○ DATETIME : stocke la combinaison d'une date ET d'un moment précis de la journée, au format AAAA-MM-JJ HH:MM:SS; (très utilisé)
	○ TIMESTAMP : stocke le nombre de secondes passées depuis le 1er janvier 1970 à 00h00min00s;
	○ YEAR : stocke une année, au format AA ou AAAA;

Dans phpMyAdmin, donner un autre nom que "date" au champ date > date_creation, date_modification, ect.

- Utilisation des champs de date en SQL :
Les dates s'utilisent comme des 'chaines de caractères';
SELECT pseudo, message, date FROM minichat WHERE date = '2010-04-02'; // renvoie la liste des messages postés le 02/04/2010 (2 avril 2010)
Si le champ est de type DATETIME, il faut aussi précisément indiquer heures, minutes, secondes :
SELECT pseudo, message, date FROM minichat WHERE date = '2010-04-02 15:28:22';

Obtenir la liste des messages postés APRÈS CETTE DATE :
SELECT pseudo, message, date FROM minichat WHERE date >= '2010-04-02 15:28:22';

Obtenir la liste des messages postés ENTRE 02/04/2010 et le 18/04/2010 : 
SELECT pseudo, message, date FROM minichat WHERE date >= '2010-04-02 00:00:00' AND date <= '2010-04-18 00:00:00';
Avec BETWEEN (plus élégant) :
SELECT pseudo, message, date FROM minichat WHERE date BETWEEN '2010-04-02 00:00:00' AND '2010-04-18 00:00:00';

Insérer une entrée date :
INSERT INTO minichat(pseudo, message, date) VALUES('Mateo', 'Message !', '2010-04-02 16:32:22');


• Les fonctions de gestion des dates

La liste complète > https://dev.mysql.com/doc/refman/5.7/en/date-and-time-functions.html

- NOW : obtenir la date et l'heure actuelles
Très souvent utilisée, notamment pour enregistrer la date actuelle en même temps qu'un message;
INSERT INTO minichat(pseudo, message, date) VALUES('Mateo', 'Message !', NOW()); // AAAA-MM-JJ HH:MM:SS
Également : CURDATE() (AAAA-MM-JJ) et CURTIME() (HH:MM:SS);

- DAY(), MONTH(), YEAR() : extraire le jour, le mois, l'année
SELECT pseudo, message, DAY(date) AS jour FROM minichat; // extrait le jour dans la date

- HOUR(),MINUTE(),SECOND() : extraire les heures, minutes, secondes (d'un champ DATETIME ou TIME)
SELECT pseudo, message, HOUR(date) AS heure FROM minichat;

- DATE_FORMAT : formater une date
Adapter la date au format voulu
SELECT pseudo, message, DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date FROM minichat; // récupère les dates avec un champ nommé date sous la forme 11/03/2010 15h47min49s
Les symboles %d, %m, %Y(etc.) sont remplacés par le jour, le mois, l'année, etc. Les autres symboles et lettres sont affichés tels quels.
La liste des symboles disponibles > https://dev.mysql.com/doc/refman/5.7/en/date-and-time-functions.html#function_date-format

- DATE_ADD et DATE_SUB : ajouter ou soustraire des dates
Il faut envoyer 2 paramètres à la fonction() : la date concernée, le nombre à ajouter + type;
Ex. : Afficher une date d'expiration du message. Celle-ci correspond à « la date où a été posté le message + 15 jours » :
SELECT pseudo, message, DATE_ADD(date, INTERVAL 15 DAY) AS date_expiration FROM minichat;
Le champ date_expiration correspond à « la date de l'entrée + 15 jours »;
Le mot-clé INTERVAL ne doit pas être changé ; en revanche, vous pouvez remplacer DAY par MONTH, YEAR, HOUR, MINUTE, SECOND, etc. Par conséquent, si vous souhaitez indiquer que les messages expirent dans deux mois :
SELECT pseudo, message, DATE_ADD(date, INTERVAL 2 MONTH) AS date_expiration FROM minichat;


VIII) TP : UN BLOG AVEC DES COMMENTAIRES

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/915379-tp-un-blog-avec-des-commentaires

nl2br() = fonction qui permet de convertir les retours à la ligne en balises HTML <br />;

index.php : la liste des derniers billets :

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>
 
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On récupère les 5 derniers billets
$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $req->fetch())
{
?> <!-- on ferme PHP APRÈS L'ACCOLADE -->
<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    <br />
    <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p>
</div>
<?php // on reprend la balise php AVANT L'ACCOLADE : FIN ET DEBUT DANS L'ACCOLADE
} // Fin de la boucle des billets
$req->closeCursor();
?>
</body>
</html>

commentaires.php : affichage d'un billet et de ses commentaires :

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>
 
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération du billet
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y à %Hh%imin%ss") AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
</body>
</html>

• Aller plus loin

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/915379-tp-un-blog-avec-des-commentaires#/id/r-2176471

- Un formulaire d'ajout de commentaires
commentaires.php > formulaire pour envoyer son commentaire
commentaires.php > formulaire rempli > commentaires_post.php > commentaires.php

- Utiliser les includes
Eviter les portions de code répétitives : le même bloc affichant un billet sur la page d'accueil puis sur la page dédiée > un seul code dans un fichier

- Vérifier si le billet existe sur la page des commentaires
Par exemple si le client essaie d'accéder à commentaires.php?billet=819202 et que le billet no 819202 n'existe pas > page blanche
Regarder si la requête qui récupère le contenu du billet renvoie des données :
Le plus simple est donc de vérifier après le fetch()si la variable $donnees est vide ou non, grâce à la fonction empty() => si oui, afficher un message d'erreur

- Paginer les billets et les commentaires
Afficher uniquement cinq commentaires par page : il faut savoir combien il y a des billets pour créer un système de pagination => SELECT COUNT(*) AS nb_billets FROM billets;
Une fois ce nombre de billets récupéré, vous pouvez trouver le nombre de pages et créer des liens vers chacune d'elles : 	Page 1 2 3 4 5
Chacun de ces nombres amènera vers la même page et ajoutera dans l'URL le numéro de la page :
<a href="index.php?page=2">2</a>
À l'aide du paramètre $_GET['page'] vous pourrez déterminer quelle page vous devez afficher. À vous d'adapter la requête SQL pour commencer uniquement à partir du billet no $x$. Par exemple, si vous demandez à afficher la page 2, vous voudrez afficher uniquement les billets nos 4 à 8 (n'oubliez pas qu'on commence à compter à partir de 0 !)
Lorsque l'on arrive la première fois > $_GET['page']n'est pas défini > Page 1

- Réaliser une interface d'administration du blog
Protéger l'accès à l'administration : Créer un sous-dossier admin qui contiendra tous les fichiers d'administration du blog (ajouter.php,modifier.php,supprimer.php…). Ce dossier admin sera entièrement protégé à l'aide des fichiers .htaccess et .htpasswd, ce qui fait que personne ne pourra charger les pages qu'il contient à moins de connaître le login et le mot de passe
https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/918580-protegez-un-dossier-avec-un-htaccess


IX) LES JOINTURES ENTRE LES TABLES

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/916084-les-jointures-entre-tables

• Modélisation d'une relation

But : éviter les répétitions + créer une connexion entre plusieurs tables
Création d'une table propriétaires : ID prenom nom tel;
Modification de la table jeux_video : ID nom ID_proprietaire console prix etc.
ID_proprietaire = ID de la table propriétaire
Pour que la relation soit effective > jointure des tables;

• Une jointure

- Les jointure internes : ne sélectionnent que les données qui ont une correspondance (un lien, une connexion) entre les deux tables;
- Les jointures externes : sélectionnent TOUTES les données, même celles qui n'ont AUCUNE correspondance (aucun lien, aucune connexion) dans l'autre table

• Les jointures internes

Une jointure interne peut s'effectuer de 2 façons différentes :
- Avec le mot-clé WHERE (à éviter si on a le choix)
- Avec le mot-clé JOIN (plus efficace, plus lisible)

○ Jointure interne avec WHERE (ancienne syntaxe) :
SELECT nom, prenom FROM proprietaires, jeux_video; // FROM table1, table2
SELECT jeux_video.nom, proprietaires.prenom FROM proprietaires, jeux_video; // SELECT table.champ, table.champ => pour éviter toute colonne ambigüe (le champ nom apparaissait dans les 2 tables)
SELECT jeux_video.nom, proprietaires.prenom
FROM proprietaires, jeux_video
WHERE jeux_video.ID_proprietaire = proprietaires.ID; // écriture sur plusieurs lignes autorisée connexion avec WHERE table.champ = table.champ;

Il est conseillé d'utiliser des ALIAS lorsque l'on fait des JOINTURES :
SELECT jeux_video.nom AS nom_jeu, proprietaires.prenom AS prenom_proprietaire
FROM proprietaires, jeux_video
WHERE jeux_video.ID_proprietaire = proprietaires.ID
Il est aussi recommandé de donner un ALIAS aux noms de table (requête plus courte et lisible) :
SELECT j.nom AS nom_jeu, p.prenom AS prenom_proprietaire
FROM proprietaires AS p, jeux_video AS j
WHERE j.ID_proprietaire = p.ID

○ Jointure interne avec JOIN (nouvelle syntaxe) :
SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
FROM proprietaires p
INNER JOIN jeux_video j
ON j.ID_proprietaire = p.ID; // les AS sont manquants, les 2 façons d'écrire sont correctes
SELECT champ1, champ2, ect.
FROM tablePrincipale
INNER JOIN tableSecondaire
ON champ.Table1 = champ.Table2

Filtrer la requête : à la fin de la jointure (ON) :
SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
FROM proprietaires p
INNER JOIN jeux_video j
ON j.ID_proprietaire = p.ID
WHERE j.console = 'PC'
ORDER BY prix DESC
LIMIT 0, 10
Traduction : « Récupère le nom du jeu et le prénom du propriétaire dans les tables proprietaires et jeux_video, la liaison entre les tables se fait entre les champs ID_proprietaire et ID, prends uniquement les jeux qui tournent sur PC, trie-les par prix décroissants et ne prends que les 10 premiers. »

• Les jointures externes

Récupère toutes les données, même celles qui n'ont pas de correspondance.

○ LEFT JOIN : récupérer toute la table de gauche
SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
FROM proprietaires p
LEFT JOIN jeux_video j
ON j.ID_proprietaire = p.ID;
proprietaires est appelée la « table de gauche » et jeux_video la « table de droite ». Le LEFT JOIN demande à récupérer tout le contenu de la table de gauche, donc tous les propriétaires, même si ces derniers n'ont pas d'équivalence dans la table jeux_video
nom_jeu       prenom_proprietaire
Sonic               Patrick
NULL                Romain

FROM tableA A
LEFT JOIN tableB B => TOUTES les données de la table A + les données correspondantes de la table B

○ RIGHT JOIN : récupérer toute la table de droite
Le RIGHT JOIN demande à récupérer toutes les données de la table dite « de droite », même si celle-ci n'a pas d'équivalent dans l'autre table.
SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
FROM proprietaires p
RIGHT JOIN jeux_video j
ON j.ID_proprietaire = p.ID;
La table de droite est « jeux_video ». On récupèrerait donc tous les jeux, même ceux qui n'ont pas de propriétaire associé.
nom_jeu       prenom_proprietaire
Sonic               Patrick
Bomberman             NULL

FROM tableA A
RIGHT JOIN tableB B => TOUTES les données de la table B + les données correspondantes de la table A

https://www.codeproject.com/Articles/33052/Visual-Representation-of-SQL-Joins

En savoir plus sur les bases de données MySQL > https://openclassrooms.com/fr/courses/1959476-administrez-vos-bases-de-donnees-avec-mysql


X) TP : UN MINI-CHAT AMELIORE

minichat.php :

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" <?php if (isset($_GET['pseudo'])) { echo ' value="' . $_GET['pseudo'] . '"'; }?> /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
    </p>
    </form>

    <?php
    // Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    // Récupération des 10 derniers messages
    $reponse = $bdd->query('SELECT pseudo, message, DAY(date_message) AS jour, MONTH(date_message) AS mois, YEAR(date_message) AS annee, HOUR(date_message) AS heure, MINUTE(date_message) AS minute, SECOND(date_message) AS seconde FROM minichat ORDER BY date_message DESC LIMIT 10');

    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $reponse->fetch())
    {
        echo '<p>[' . $donnees['jour'] . '/' . $donnees['mois'] . '/' . $donnees['annee'] . ' ' . $donnees['heure'] . 'h' . $donnees['minute'] . 'm' . $donnees['seconde'] . 's] <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
    }

    $reponse->closeCursor();

    ?>
    </body>
</html>

minichat_post.php :

<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_message) VALUES(?, ?, NOW())');
$req->execute(array($_POST['pseudo'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: minichat.php?pseudo=' . $_POST['pseudo']);
?>

MA VERSION (plus complète) :

minichat.php :

<?php
if (empty($_COOKIE['pseudo'])) { // s'il n'y a pas de cookie
    $pseudo = NULL;
}
else // si un cookie est déja installé
{
    $pseudo = $_COOKIE['pseudo'];
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Bienvenue sur mon mini-chat !</title>
    </head>
    <style>
    form, h1, p
    {
        text-align:center;
    }
    span
    {
        color: grey;
    }
    </style>
    <body>
        <h1>Bonjour <?php echo $pseudo; ?>, bienvenue sur mon mini-chat !</h1> <!-- Bonjour personnalisé -->
        <form action="minichat_post.php" method="post">
           <label for="pseudo">Pseudo : </label> <input type="text" name="pseudo" id="pseudo" value="<?php echo $pseudo; ?>" required /><br />
           <label for="message">Message : </label> <input type="text" name="message" id="message" required /><br />
           <input type="submit" value="Envoyer" />
        </form><br />
        <?php
        try // connexion à la base de données
        {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        // Récupération des 10 derniers messages
        $req = $bdd->query('SELECT UPPER(pseudo) AS pseudo_maj, message, DATE_FORMAT(date_post, "%d/%m/%Y à %Hh%imin%ss") AS date FROM minichat ORDER BY ID DESC LIMIT 0, 10');
        // affichage de chaque message dans une boucle WHILE, avec sécurité (htmlspecialchars)
        while ($donnees = $req->fetch())
        {
        ?>
            <p><strong><?php echo htmlspecialchars($donnees['pseudo_maj']); ?> : </strong><?php echo htmlspecialchars($donnees['message']); ?> <span>(posté le <?php echo htmlspecialchars($donnees['date']); ?>)</span></p>
        <?php    
        }
        $req->closeCursor(); // fin de la requête
        ?>
    </body>
</html>

minichat_post.php :

<?php 

if (!empty($_POST['pseudo']) && !empty($_POST['message'])) { // si les deux valeurs sont présentes, exécuter la suite :

    if (strlen($_POST['pseudo']) <= 255 && strlen($_POST['message']) <= 255) { // si les deux valeurs sont inférieures à 255 caractères, exécuter la suite :

        setcookie('pseudo', htmlspecialchars($_POST['pseudo']), time() + 365*24*60*60, null, null, false, true); // initialise le cookie pour le pseudo (avec sécurité)

        try // Connexion à la base de données
        {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        // INSERTION du message avec une requête préparée : pseudo, message, date de soumission
        $req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_post) VALUES(?, ?, NOW())');
        $req->execute(array($_POST['pseudo'], $_POST['message']));

        $req->closeCursor(); // fin de la requête

        // Redirection du visiteur vers la page du minichat
        header('Location: minichat.php');
    }
    else
    {
        echo 'Pseudo ou message trop long !<br /><a href="minichat.php" title="Revenir à l\'accueil">Revenir à l\'accueil</a>';
    }
}
else
{
    echo 'Pseudo ou message vide !<br /><a href="minichat.php" title="Revenir à l\'accueil">Revenir à l\'accueil</a>';
}

?>


-------------------------- // APPROFONDIR PHP // --------------------------


I) CREER DES IMAGES EN PHP

• Activer la bibliothèque GD

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/916429-creez-des-images-en-php#/id/r-916098

• Les bases de la création d'image

	○ Le header (en haut de page)
2 façons de générer un fichier : 1) script PHP renvoie une image (au lieu d'une page web)
2) on demande à PHP d'enregistrer l'image dans un fichier

1) Le header est utilisé pour dire au navigateur qu'on est en train d'envoyer une image :
<?php
header ("Content-type: image/png"); // envoi d'une image .png
// fonction à utiliser tout en HAUT DE LA PAGE !
?>

	○ Créer l'image de base
- À partir d'une image vide, avec imagecreate(largeur, hauteur)
<?php
header ("Content-type: image/png");
$image = imagecreate(200,50); // création dans une variable d'une image de 200px de larg et de 50px de haut
// $image est une ressource = contient toutes les informations d'un objet
?>

- À partir d'une image existante, avec imagecreatefromjpeg() ou imagecreatefrompng()
<?php
header ("Content-type: image/jpeg");
$image = imagecreatefromjpeg("couchersoleil.jpg");
?>

- Afficher l'image
En fonction du type de l'image en cours de création : imagejpeg() ou imagepng();
2 façon d'utiliser les images : les afficher directement après les avoir créees, ou les enregistrer sur le disque dur pour les afficher plus tard;

- Afficher directement l'image
Quand la page PHP est exécutée, elle vous affiche l'image que vous lui avez demandé de créer.
<?php
header ("Content-type: image/png"); // 1 : on indique qu'on va envoyer une image PNG
$image = imagecreate(200,50); // 2 : on crée une nouvelle image de taille 200 x 50
// 3 : on s'amuse avec notre image (on va apprendre à le faire)
imagepng($image); // 4 : on a fini de faire joujou, on demande à afficher l'image
?>
Pour pouvoir la poster dans du HTML, on considère l'image comme une page PHP (le principe des include); Si la page PHP qui accueille le code ci-dessus s'appelle « image.php », vous mettrez ce code HTML pour l'afficher depuis une autre page : <img src="image.php" />
L'avantage de cette technique : l'image affichée pourra changer à chaque fois

- Enregistrer l'image sur le disque
Si on préfére l'enregistrer sur le disque, alors il faut ajouter un paramètre à la fonction imagepng() : le nom de l'image et éventuellement son dossier. 
Dans ce cas, votre script PHP ne va plus renvoyer une image (il va juste en enregistrer une sur le disque). Vous pouvez donc supprimer la fonction header() qui ne sert plus à rien.
<?php
$image = imagecreate(200,50);
// on fait joujou avec notre image
imagepng($image, "images/monimage.png"); // on enregistre l'image dans le dossier "images"
?>
Pour l'afficher depuis une autre page web : <img src="images/monimage.png" />
Avantage : ne pas nécessiter de recalculer l'image à chaque fois (votre serveur aura moins de travail)Défaut : une fois qu'elle est enregistrée, l'image ne change plus.


• Textes et couleurs

	○ Manipuler les couleurs
Définir une couleur avec imagecolorallocate(image travaillée, quantité de rouge, quantité de vert, quantité de bleu) => couleur => $variableCouleur;
La première fois que vous faites un appel à la fonction imagecolorallocate(), cette couleur devient la couleur de fond de votre image.
Une image toute orange :
<?php
header ("Content-type: image/png");
$image = imagecreate(200,50);

$orange = imagecolorallocate($image, 255, 128, 0);
$bleu = imagecolorallocate($image, 0, 0, 255);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);

imagepng($image);
?>

	○ Écrire du texte
Écrire du texte avec la fonction imagestring(variable qui contient l'image, police de caractères 1 à 5, X sur le texte, Y sur le texte, texte à écrire, $couleur);
La fonction imagestringup() fonctionne de la même manière, sauf qu'elle écrit le texte verticalement
<?php
imagestring($image, $police, $x, $y, $texte_a_ecrire, $couleur);
?>
<?php
header ("Content-type: image/png");
$image = imagecreate(200,50);

$orange = imagecolorallocate($image, 255, 128, 0);
$bleu = imagecolorallocate($image, 0, 0, 255);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);

imagestring($image, 4, 35, 15, "Salut les Zéros !", $blanc);

imagepng($image);

/* Mets dans l'image $image, avec la police de taille 4, aux coordonnées (35, 15), le texte « Salut les Zéros ! », de couleur blanche. */
?>

/!\ The function imagestring() doesn't support UTF-8 characters. If you need support for those, you need to use imagettftext(), which supports UTF-8, but needs to be linked to a TrueType font.
Here is the documentation for the function: http://php.net/manual/en/function.imagettftext.php


• Dessiner une forme

	○ ImageSetPixel = dessiner un pixel aux coordonnées (x, y);
ImageSetPixel ($image, $x, $y, $couleur);
ImageSetPixel ($image, 100, 100, $noir);

	○ ImageLine = dessiner une ligne entre (x1, y1) et (x2, y2);
ImageLine ($image, $x1, $y1, $x2, $y2, $couleur);
ImageLine ($image, 30, 30, 120, 120, $noir);

	○ ImageEllipse au centre (x, y), de $largeur et $hauteur;
ImageEllipse ($image, $x, $y, $largeur, $hauteur, $couleur);
ImageEllipse ($image, 100, 100, 100, 50, $noir);

	○ ImageRectangle = dessine un rectangle au coin gauche(x1, y1) et en bas à gauche(x2, y2);
ImageRectangle ($image, $x1, $y1, $x2, $y2, $couleur);
ImageRectangle ($image, 30, 30, 160, 120, $noir);

	○ ImagePolygon = dessine un polygone à un nombre de points $nombrePoints et un $arrayPoints qui contient tous les points($x1, $y1, $x2, $y2, $x3, $y3, $x4, $y4…);
ImagePolygon ($image, $array_points, $nombre_de_points, $couleur);
$points = array(10, 40, 120, 50, 160, 160); ImagePolygon ($image, $points, 3, $noir);


• Des fonctions encore plus puissantes

	○ Rendre une image transparente
Seulement avec PNG, avec la fonction imagecolortransparent($image, $couleurSujet);
<?php
imagecolortransparent($image, $couleur);
?>
<?php
header ("Content-type: image/png");
$image = imagecreate(200,50);

$orange = imagecolorallocate($image, 255, 128, 0); // Le fond est orange (car c'est la première couleur)
$bleu = imagecolorallocate($image, 0, 0, 255);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);

imagestring($image, 4, 35, 15, "Salut les Zéros !", $noir);
imagecolortransparent($image, $orange); // On rend le fond orange transparent

imagepng($image);
?>

	○ Mélanger deux images

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/916429-creez-des-images-en-php#/id/r-3426482

Fusionner deux images avec imagecopymerge();
<?php
header ("Content-type: image/jpeg"); // L'image que l'on va créer est un jpeg

// On charge d'abord les images
$source = imagecreatefrompng("logo.png"); // Le logo est la source
$destination = imagecreatefromjpeg("couchersoleil.jpg"); // La photo est la destination

// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

// On veut placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo
$destination_x = $largeur_destination - $largeur_source;
$destination_y =  $hauteur_destination - $hauteur_source;

/* Si on veut mettre le logo tout en haut à gauche : pas besoin de faire de calculs, vu qu'en haut à gauche les coordonnées sont (0, 0) ! */

// On met le logo (source) dans l'image de destination (la photo)
imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);

/* imagecopymerge(image de destination, image source, abscisse où placer le logo, ordonnée où placer le logo, abscisse de la source, ordonnée de la source, largeur de la source, hauteur de la source, pourcentage de transparence) */

// On affiche l'image de destination qui a été fusionnée avec le logo
imagejpeg($destination);
?>
Concrètement, on peut se servir de ce code pour faire une page copyrighter.php. Cette page prendra un paramètre : le nom de l'image à « copyrighter ».
Par exemple, si vous voulez « copyrighter » automatiquementtropiques.jpg, vous afficherez l'image comme ceci : <img src="copyrighter.php?image=tropiques.jpg" /> puis récupérer l'image avec $_GET['image'];


	○ Redimensionner une image avec imagecopyresampled()
Permet de créer des miniatures;
Fonction puissante mais lente : Nous allons ici créer la miniature une fois pour toutes et l'enregistrer dans un fichier (mini_couchersoleil.jpg, par exemple). Cela veut dire qu'on peut déjà retirer la première ligne (le header) qui ne sert plus à rien.
Ici, la SOURCE c'est l'image originale et la DESTINATION, l'image miniature que l'on va créer.
1) Créer une image vide avec imagecreatetruecolor() (contient plus de couleurs que imagecreate());
<?php
$source = imagecreatefromjpeg("couchersoleil.jpg"); // La photo est la source
$destination = imagecreatetruecolor(200, 150); // On crée la miniature vide

// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

// On crée la miniature
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

/* imagecopyresampled(image de destination, image source, abscisse du point à laquelle vous placez la miniature sur l'image de destination, ordonnée du point à laquelle vous placez la miniature sur l'image de destination, abscisse du point de la source, ordonnée du point de la source, largeur de la miniature, hauteur de la miniature, largeur de la souce, hauteur de la source) */

// On enregistre la miniature sous le nom "mini_couchersoleil.jpg"
imagejpeg($destination, "mini_couchersoleil.jpg");
?>
Afficher en html : <img src="mini_couchersoleil.jpg" alt="Coucher de soleil" />


II) LES EXPRESSIONS REGULIERES

Fonctionnalité Rechercher/Remplacer très poussée

• Où utiliser une regex ?

2 types d'expressions régulières : POSIX (mis en avant par PHP, plus simple mais plus lent) vs. PCRE (issues du langage Perl, plus complexes mais plus performantes)
Notre choix : PCRE

	○ Les fonctions qui nous intéressent
- preg_grep ;
- preg_split ;
- preg_quote ;
- preg_match ;
- preg_match_all ;
- preg_replace ;
- preg_replace_callback ;

- preg_match : renvoie TRUE (mot trouvé) ou FALSE (mot absent)
<?php
if (preg_match("** Votre REGEX **", "Ce dans quoi vous faites la recherche"))
{
	echo 'Le mot que vous cherchez se trouve dans la chaîne';
}
else
{
	echo 'Le mot que vous cherchez ne se trouve pas dans la chaîne';
}
?>

• Des recherches simples

○ Une regex est entourée de caractères spéciaux = délimiteurs => #regex# => #regex#Options;
<?php
if (preg_match("#guitare#", "J'aime jouer de la guitare."))
{
    echo 'VRAI';
}
else
{
    echo 'FAUX';
}
?>

○ Les regex sont sensibles à la casse => #Guitare# || #GUITARE# => FAUX;
On utilise l'OPTION i => #Guitare#i || GUITARE#i => VRAI;

○ Le symbole OU = #guitare|piano#;
J'aime jouer de la guitare. #guitare|piano# VRAI
J'aime jouer du piano. #guitare|piano# VRAI
J'aime jouer du banjo. #guitare|piano# FAUX
J'aime jouer du banjo. #guitare|piano|banjo# VRAI

○ Début et fin de chaîne
 - ^ : début de la chaîne
 - $ : fin de la chaîne
Pour qu'une chaîne commence par « Bonjour », il faudra utiliser la regex : #^Bonjour#;
De même, si on veut vérifier que la chaîne se termine par « zéro », on écrira cette regex :
#zéro$#;
Bonjour petit zéro #^Bonjour# VRAI
Bonjour petit zéro #zéro$# VRAI
Bonjour petit zéro #^zéro# FAUX
Bonjour petit zéro !!! #zéro$# FAUX

• Les [classes] de caractères

○ Des [classes] simples
#gr[io]s# => "gris" ou "gros" => [i || o];
La nuit, tous les chats sont gris #gr[aoi]s# VRAI
Berk, c'est trop gras comme nourriture #gr[aoi]s# VRAI
Berk, c'est trop gras comme nourriture #gr[aoi]s$# FAUX
Je suis un vrai zéro #[aeiouy]$# VRAI (notre regex doit se terminer par une voyelle (aeiouy))
Je suis un vrai zéro #^[aeiouy]# FAUX (la chaîne doit commencer par une voyelle (en minuscule, en plus))

○ Les intervalles de classe
[a-z], [a-e], [0-9], à la suite : [a-z0-9] (N'importe quelle lettre (minuscule) OU un chiffre);
[a-zA-Z0-9];
Cette phrase contient une lettre #[a-z]# VRAI
cette phrase ne comporte ni majuscule ni chiffre #[A-Z0-9]# FAUX
Je vis au 21e siècle #^[0-9] # FAUX
<h1>Une balise de titre HTML</h1> #<h[1-6]># VRAI

○ Exclure des caractères
#[^element]#;
#[^0-9]# : vous voulez que votre chaîne comporte au moins un caractère qui ne soit pas un chiffre.;
Cette phrase contient autre chose que des chiffres #[^0-9]# VRAI
cette phrase contient autre chose que des majuscules et des chiffres #[^A-Z0-9]# VRAI
Cette phrase ne commence pas par une minuscule #^[^a-z]# VRAI
Cette phrase ne se termine pas par une voyelle #[^aeiouy]$# FAUX
ScrrmmmblllGnngngnngnMmmmmffff #[^aeiouy]# VRAI

• Les quantificateurs

Combien de fois peuvent se répéter un caractère ou une suite de caractères.

○ Les symboles les plus courants
- ? : lettre FACULTATIVE : peut y être 0 ou 1 fois => #a?#reconnaît 0 ou 1 « a » ;
- + : lettre OBLIGATOIRE : peut y être 1 ou plusieurs fois => #a+# reconnaît « a », « aa », « aaa », « aaaa », etc. ;
- * : lettre FACULTATIVE : peut y être 0, 1 ou plusieurs fois => #a*#reconnaît « a », « aa », « aaa », « aaaa », etc. Mais s'il n'y a pas de « a », ça fonctionne aussi !;
- Ces symboles s'appliquent à la lettre se trouvant directement devant. 
On peut ainsi autoriser le mot « chien », qu'il soit au singulier comme au pluriel, avec la regex #chiens?# (fonctionnera pour « chien » et « chiens »);
bor?is# => le code reconnaîtra « boris » et « bois » !;
- Pour deux lettres ou plus qui se répétent : ();
#Ay(ay)*# => ce code reconnaîtra « Ay », « Ayay », « Ayayay », « Ayayayay », ect.
Vous pouvez utiliser le symbole « | » dans les parenthèses. La regex #Ay(ay|oy)*# renverra par exemple vrai pour « Ayayayoyayayayoyoyoyoyayoy » ! C'est le « ay » OU le « oy » répété plusieurs fois, tout simplement !
Vous pouvez mettre un quantificateur après une classe de caractères (vous savez, avec les crochets !). Ainsi #[0-9]+# permet de reconnaître n'importe quel nombre, du moment qu'il y a au moins un chiffre !
eeeee #e+# VRAI
ooo #u?# VRAI
magnifique #[0-9]+# FAUX
Yahoooooo #^Yaho+$# VRAI
Yahoooooo c'est génial ! #^Yaho+$# FAUX
Blablablablabla #^Bla(bla)*$# VRAI
La regex #^Yaho+$# signifie que la chaîne doit commencer et finir par le mot « Yaho ». Il peut y avoir un ou plusieurs « o ». Ainsi « Yaho », « Yahoo », « Yahooo », etc. marchent…;
La dernière regex autorise les mots « Bla », « Blabla », « Blablabla », etc. Je me suis servi des parenthèses pour indiquer que « bla » peut être répété 0, 1 ou plusieurs fois.

○ Être plus précis grâce aux accolades
3 façons d'utiliser les accolades :
- {3} : la lettre ou le groupe DOIT être répété 3 FOIS;
#a{3}# fonctionne seulement pour la chaîne « aaa »;
- {3, 5} : la lettre ou le groupe DOIT être répété ENTRE 3 et 5 FOIS;
#a{3,5}# fonctionne pour « aaa », « aaaa », « aaaaa »;
- {3, } : la lettre ou le groupe DOIT être répété 3 FOIS OU PLUS;
#a{3,}# fonctionne pour « aaa », « aaaa », « aaaaa », « aaaaaa », etc;
=> ? revient à écrire {0,1};
=> + revient à écrire {1,};
=> * revient à écrire {0,};
eeeee #e{2,}# VRAI
Blablablabla #^Bla(bla){4}$# FAUX
546781 #^[0-9]{6}$# VRAI

• Les métacaractères

○ Les métacaractères (caractères spéciaux) à retenir :
# ! ^ $ ( ) [ ] { } ? + * . \ |
Chercher "Quoi ?" dans une chaîne : #Quoi ?# = FALSE / #Quoi \?# = TRUE;
L'ANTISLASH indique que ce qui vient juste après n'est pas un caractère spécial (Comme 'J\'ai');
Pour utiliser un antislash = \\;
Je suis impatient ! #impatient \!# VRAI
Je suis (très) fatigué #\(très\) fatigué# VRAI
J'ai sommeil… #sommeil\.\.\.# VRAI
Le smiley :-\ #:-\\# VRAI

○ Le cas des classes
À l'intérieur de crochets, les métacaractères ne comptent plus;
#[a-z?+*{}]# signifie qu'on a le droit de mettre une lettre, un point d'interrogation, un signe +, etc.
3 cas particuliers :
1) # sert à indiquer la fin de la regex. Pour l'utiliser dans la liste des possibles caractères, vous DEVEZ mettre un antislash devant, même dans une classe de caractères;
2) ] (crochet fermant) : indique la fin de la classe ; si vous voulez vous en servir comme métacaractères il faut utiliser \l'antislash devant.;
3) - (tiret) : définit une intervalle de classe. Pour ajouter le tiret dans la liste des caractères possibles, il faut l'ajouter au débt ou à la fin de la classe. Ex. : [a-z0-9-] permet de chercher une lettre, un chiffre ou un tiret.;

• Les classes abrégées (raccourcis)

○ \d : Indique un chiffre. Ça revient exactement à taper[0-9];
○ \D : Indique ce qui n'est PAS un chiffre. Ça revient à taper[^0-9];
○ \w : Indique un caractère alphanumérique ou un tiret de soulignement. Cela correspond à [a-zA-Z0-9_];
○ \W : Indique ce qui n'est PAS un caractère alphanumérique. Si vous avez suivi, ça revient à taper[^a-zA-Z0-9_];
○ \t : Indique une tabulation (↹);
○ \n : Indique une nouvelle ligne;
○ \r : Indique un retour chariot (|<-- retour à la ligne sans sauter de ligne);
○ \s : Indique un espace blanc;
○ \S : Indique ce qui n'est PAS un espace blanc (\t \n \r);
○ . : Indique n'importe quel caractère. Il autorise donc tout, sauf les entrées (\n);
Pour faire en sorte que le point indique tout, même les entrées, vous devrez utiliser l'option « s » de PCRE. Exemple : #[0-9]-.#s

• Construire une regex complète

○ Un numéro de téléphone
- Un numéro de téléphone français comporte 10 chiffres.;
- Le premier chiffre est TOUJOURS un 0 ;
- Le second chiffre va de 1 à 6 ;
- Ensuite viennent les 8 chiffres restants ;

Numéro de téléphone sans espaces :
1) On veut qu'il y ait UNIQUEMENT le numéro de téléphone. On va donc commencer par mettre les symboles ^ et $ pour indiquer un début et une fin de chaîne : #^$# ;
2) On sait que le premier caractère est forcément un 0. On tape donc : #^0$# ;
3) Le 0 est suivi d'un nombre allant de 1 à 6, sans oublier le 8 pour les numéros spéciaux. Il faut donc utiliser la classe[1-68], qui signifie « Un nombre de 1 à 6 OU le 8 » : #^0[1-68]$# ;
4) Ensuite, viennent les 8 chiffres restants, pouvant aller de 0 à 9. Il nous suffit donc d'écrire[0-9]{8} pour indiquer que l'on veut 8 chiffres. Au final, ça nous donne cette regex :
#^0[1-68][0-9]{8}$# ;

Numéro de téléphone avec espaces, tirets, points, etc. :
1) Le 0 puis le chiffre de 1 à 6 sans oublier le 8. Ça, ça ne change pas : #^0[1-68]$# ;
2) Après ces deux premiers chiffres, il peut y avoir soit un espace, soit un tiret, soit un point, soit rien du tout (si les chiffres sont attachés). On va donc utiliser la classe [-. ] (tiret, point, espace). Pour que cette classe ne soit pas obligatoire => ?
#^0[1-68][-. ]?$# ;
3) Après le premier tiret (ou point, ou espace, ou rien), on a les deux chiffres suivants. On doit donc rajouter[0-9]{2} à notre regex. #^0[1-68][-. ]?[0-9]{2}$# ;
4) On a juste besoin de dire que « [-. ]?[0-9]{2} » doit être répété quatre fois :
#^0[1-68]([-. ]?[0-9]{2}){4}$# ;
<p>
<?php
if (isset($_POST['telephone']))
{
    $_POST['telephone'] = htmlspecialchars($_POST['telephone']); // On rend inoffensives les balises HTML que le visiteur a pu entrer

    if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']))
    {
        echo 'Le ' . $_POST['telephone'] . ' est un numéro <strong>valide</strong> !';
    }
    else
    {
        echo 'Le ' . $_POST['telephone'] . ' n\'est pas valide, recommencez !';
    }
}
?>
</p>

<form method="post">
<p>
    <label for="telephone">Votre téléphone ?</label> <input id="telephone" name="telephone" /><br />
    <input type="submit" value="Vérifier le numéro" />
</p>
</form>

○ Tester une adresse mail
- Le pseudonyme (au minimum une lettre, mais c'est plutôt rare). Il peut y avoir des lettres minuscules (pas de majuscules), des chiffres, des points, des tirets et des underscores « _ » ;
- Le @rob@ase ;
- Le nom de domaine. Pour ce nom, même règle que pour le pseudonyme : que des minuscules, des chiffres, des tirets, des points et des underscores. La seule différence – vous ne pouviez pas forcément deviner – c'est qu'il y a au moins deux caractères (par exemple, « a.com » n'existe pas, mais « aa.com » oui). ;
- L'extension (comme « .fr »). Cette extension comporte un point, suivi de deux à quatre lettres (minuscules). En effet, il y a « .es », « .de », mais aussi « .com », « .net », « .org », « .info », etc.
- Modèle : j.dupont_2@orange.fr ;

Construction de la regex :
1) On ne veut QUE l'adresse e-mail ; on va donc demander à ce que ça soit un début et une fin de chaîne : #^$# ;
2) On a des lettres, chiffres, tirets, points, underscores, au moins une fois. On utilise donc la classe [a-z0-9._-] à la suite de laquelle on rajoute le signe + pour demander à ce qu'il y en ait au moins un : #^[a-z0-9._-]+$# ;
3) Vient ensuite l'arobase (là ce n'est pas compliqué, on a juste à taper le caractère) :
#^[a-z0-9._-]+@$# ;
4) Puis encore une suite de lettres, chiffres, points, tirets, au moins deux fois. On tape donc{2,}pour dire « deux fois ou plus » : #^[a-z0-9._-]+@[a-z0-9._-]{2,}$# ;
5) Ensuite vient le point (de « .fr » par exemple). On va donc mettre un antislash devant :
#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.$# ;
6) Pour terminer, il nous faut deux à quatre lettres. Ce sont forcément des lettres minuscules, et cette fois pas de chiffre ou de tiret, etc. On écrit donc :
#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$# ;
<p>
<?php
if (isset($_POST['mail']))
{
    $_POST['mail'] = htmlspecialchars($_POST['mail']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
    {
        echo 'L\'adresse ' . $_POST['mail'] . ' est <strong>valide</strong> !';
    }
    else
    {
        echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas valide, recommencez !';
    }
}
?>
</p>

<form method="post">
<p>
    <label for="mail">Votre mail ?</label> <input id="mail" name="mail" /><br /> 
    <input type="submit" value="Vérifier le mail" />
</p>
</form>

○ Des regex avec MySQL
MySQL ne comprend que les regex en langage POSIX, et pas PCRE comme on a appris.
À retenir pour faire une regex POSIX :
- Il n'y a pas de délimiteur ni d'options. Votre regex n'est donc pas entourée de dièses ;
- Il n'y a pas de classes abrégées comme on l'a vu plus haut, donc pas de \d, etc. En revanche, vous pouvez toujours utiliser le point pour dire : « n'importe quel caractère ». ;
Ex. On a stocké les IP de vos visiteurs dans une table visiteurs et que on veut les noms des visiteurs dont l'IP commence par « 84.254 » :
SELECT nom FROM visiteurs WHERE ip REGEXP '^84\.254(\.[0-9]{1,3}){2}$' ;
Sélectionne tous les noms de la table visiteurs dont l'IP commence par « 84.254 » et se termine par deux autres nombres de un à trois chiffre(s) (ex. : 84.254.6.177). ;

• Capture et Remplacement

Cela va nous permettre par exemple de faire la chose suivante :
    1) chercher s'il y a des adresses e-mail dans un message laissé par un visiteur ;
    2) modifier automatiquement son message pour mettre un lien ;
<a href="mailto:blabla@truc.com"> devant chaque adresse, ce qui rendra les adresses e-mail cliquables !

○ Les parenthèses capturantes
Capture de chaîne avec preg_replace() et les parenthèses. ;
À chaque fois que vous utilisez des parenthèses, cela crée une « variable » contenant ce qu'elles entourent.
#\[b\](.+)\[/b\]# : Chercher dans la chaîne un [b], suivi d'un ou plusieurs caractère(s) (le point permet de dire « n'importe lesquels »), suivi(s) d'un [/b] ». ;
À chaque fois qu'il y a une parenthèse, cela crée une variable appelée $1 (pour la première parenthèse), $2 pour la seconde, etc.
On va ensuite se servir de ces variables pour modifier la chaîne (faire un remplacement).
Pour mettre en gras les mots compris entre [b] et [/b] :
<?php
$texte = preg_replace('#\[b\](.+)\[/b\]#i', '<strong>$1</strong>', $texte);
?>
$texte = preg_replace('regex($1)($2)', 'texte de remplacement', texte sur lequel on fait le remplacement);
La fonction preg_replace renvoie le résultat après avoir fait les remplacements.;
Règles :
- Pour plusieurs parenthèses, pour savoir le numéro de l'une d'elles il suffit de compter leurs ouvertures dans l'ordre de gauche à droite. Ex. : #(anti)co(nsti)(tu(tion)nelle)ment#
Il y a quatre parenthèses dans cette regex (donc $1, $2, $3 et $4). La parenthèse numéro 3 ($3) contient « tutionnelle », et la parenthèse $4 contient « tion ». ;
- On peut utiliser jusqu'à 99 parenthèses capturantes dans une regex. Ça va donc jusqu'à $99.
- Une variable $0 est toujours créée ; elle contient toute la regex. Ex. : $0 contient « anticonstitutionnellement ».;
- Pour qu'une parenthèse NE SOIT PAS capturante (pour vous faciliter les comptes, ou parce que vous avez beaucoup beaucoup de parenthèses), il faut qu'elle commence par un point d'interrogation suivi d'un deux points « : ». Ex. : #(anti)co(?:nsti)(tu(tion)nelle)ment#
La seconde parenthèse n'est pas capturante. Il ne nous reste que trois variables (quatre si on compte $0) : $0 : anticonstitutionnellement, $1 : anti, $2 : tutionnelle, $3 : tion ;

○ Créer son bbCode (réaliser un parser)
- S'entrainer avec :
[b][/b] : pour mettre du texte en gras ;
[i][/i] : pour mettre du texte en italique ;
[color=red][/color] : pour colorer le texte (il faudra laisser le choix entre plusieurs couleurs). ;
Rajouter des options au regex de [b] : i (majuscules acceptées), s (pour que le « point » fonctionne aussi pour les retours à la ligne (pour que le texte puisse être en gras sur plusieurs lignes)), U (« Ungreedy » (« pas gourmand »), permet de faire marcher plusieurs [b] dans le texte, sans qu'ils empiètent sur l'espce de l'autre.);
<?php
$texte = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $texte);
$texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte);
?>
- La balise [color = truc] :
On va laisser le choix entre plusieurs couleurs avec le symbole « | » (OU), et on va utiliser deux parenthèses capturantes :
1) la première pour récupérer le nom de la couleur qui a été choisie (en anglais, comme ça on n'aura pas besoin de le changer pour le code HTML) ;
2) la seconde pour récupérer le texte entre [color=truc] et [/color] (pareil que pour gras et italique). ;
<?php
$texte = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#isU', '<span style="color:$1">$2</span>', $texte);
?>
- Liens cliquables :
<?php
$texte = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $texte);
?>
La regex marche très bien pour http://www.siteduzero.com/images/super_image2.jpg, mais elle ne fonctionne pas s'il y a des variables en paramètres dans l'URL, comme par exemple :
http://www.siteduzero.com/index.php?page=3&skin=blue ;
Résumons maintenant notre parser bbCode au complet :

<?php
if (isset($_POST['texte']))
{
    $texte = stripslashes($_POST['texte']); // On enlève les slashs qui se seraient ajoutés automatiquement
    $texte = htmlspecialchars($texte); // On rend inoffensives les balises HTML que le visiteur a pu rentrer
    $texte = nl2br($texte); // On crée des <br /> pour conserver les retours à la ligne
    
    // On fait passer notre texte à la moulinette des regex
    $texte = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $texte);
    $texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte);
    $texte = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#isU', '<span style="color:$1">$2</span>', $texte);
    $texte = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $texte);

    // Et on affiche le résultat. Admirez !
    echo $texte . '<br /><hr />';
}
?>

<p>
    Bienvenue dans le parser du Site du Zéro !<br />
    Nous avons écrit ce parser ensemble, j'espère que vous saurez apprécier de voir que tout ce que vous avez appris va vous être très utile !
</p>

<p>Amusez-vous à utiliser du bbCode. Tapez par exemple :</p>

<blockquote style="font-size:0.8em">
<p>
    Je suis un gros [b]Zéro[/b], et pourtant j'ai [i]tout appris[/i] sur http://www.siteduzero.com<br />
    Je vous [b][color=green]recommande[/color][/b] d'aller sur ce site, vous pourrez apprendre à faire ça [i][color=purple]vous aussi[/color][/i] !
</p>
</blockquote>

<form method="post">
<p>
    <label for="texte">Votre message ?</label><br />
    <textarea id="texte" name="texte" cols="50" rows="8"></textarea><br />
    <input type="submit" value="Montre-moi toute la puissance des regex" />
</p>
</form>

- Idées de regex que à rajouter au parser :
	-  Faire que les URL cliquables fonctionnent aussi pour des URL avec des variables comme :
http://www.siteduzero.com/index.php?page=3&skin=blue ;
	- Parser les adresses e-mail en faisant un lien mailto: dessus ! ;
	- Compléter le bbCode avec[u],[img], etc. ;
	- Faire son propre bbCode : {gras}{/gras} ;
	- Écrire une fonction qui colore automatiquement le code HTML ! (Vous donnez à la fonction le code HTML, elle en fait un htmlspecialchars, puis elle rajoute des <span style="color:…"> pour colorer par exemple en bleu les noms des balises, en vert les attributs, en rouge ce qui est entre guillemets, etc.)


III) TP : Créer un espace membre

• Conception de l'espace membre

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/917948-tp-creez-un-espace-membres#/id/r-2178871

un espace membres nécessite au minimum les éléments suivants :
- une page d'inscription ;
- une page de connexion ;
- une page de déconnexion ;
Pour commencer, nous allons créer la table MySQL qui stockera les membres de notre site.

○ La table des membres
Qu'est-ce qui caractérise un membre ? :
- un pseudonyme ;
- un mot de passe ;
- une adresse e-mail ;
- une date d'inscription. ;
Puis créer une table nommée membres avec les champs suivants :
- id (int, primary, auto_increment) ;
- pseudo (varchar 255) ;
- pass (varchar 255) ;
- email (varchar 255) ;
- date_inscription (date). ;
Si vous souhaitez que vos membres appartiennent à des groupes différents, il pourrait être intéressant de créer une table groupes listant tous les groupes (membre, administrateur, modérateur…). Vous ajouteriez à la table des membres un champ nommé id_groupe qui stockerait le numéro du groupe, ce qui vous permettrait de faire une jointure entre les deux tables comme nous l'avons fait avec les jeux vidéo et leurs propriétaires plus tôt dans le cours.

○ La problématique du mot de passe
Les utilisateurs ont tendance à utiliser le même mdp sur beaucoup de sites.
Obligation morale et éthique en tant que webmasters : NE PAS stocker les mots de passe de vos visiteurs dans la base.
La solution existe : elle s'appelle le hachage : fonction qui transforme le mot de passe en un nombre hexadécimal illisible ;
La bonne fonction à utiliser est password_hash, qui va choisir pour vous le meilleur algorithme.
Vous stockerez la version hachée du mot de passe, qui sera donc passé à la moulinette par la fonction password_hash. Lorsqu'un visiteur voudra se connecter, il vous enverra son mot de passe que vous hacherez à nouveau et que vous comparerez avec celui stocké dans la base de données. Si les deux mots de passe hachés sont identiques, alors cela signifie que le visiteur a rentré le même mot de passe que lors de son inscription.

• Réalisation des pages de l'espace membre

○ La page d'inscription
La page d'inscription est en général constituée de quatre champs :
- pseudonyme souhaité ;
- mot de passe ;
- confirmation du mot de passe (pour éviter les erreurs de saisie) ;
- adresse e-mail. ;

Il est recommandé de limiter autant que possible le nombre d'informations demandées. Le visiteur souhaite pouvoir s'inscrire très rapidement. Laissez-le remplir les autres champs (comme sa signature, sa messagerie instantanée et sa date de naissance) dans un second temps lorsqu'il sera inscrit.

Avant d'enregistrer l'utilisateur dans la base de données, il faudra penser à faire un certain nombre de vérifications : 
- Le pseudonyme demandé par le visiteur est-il libre ? S'il est déjà présent en base de données, il faudra demander au visiteur d'en choisir un autre.
- Les deux mots de passe saisis sont-ils identiques ? S'il y a une erreur, il faut inviter le visiteur à rentrer à nouveau le mot de passe.
- L'adresse e-mail a-t-elle une forme valide ? Vous pouvez utiliser une expression régulière pour le vérifier.

<?php 
// Vérification de la validité des informations

// Hachage du mot de passe
$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

// Insertion
$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
	'email' => $email));
//etc.
?>

De plus, je vous invite à respecter l'architecture MVC : vous utiliserez le contrôleur pour vérifier la validité des informations et pour hacher le mot de passe, tandis que le modèle se chargera simplement d'exécuter la requête.

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/917948-tp-creez-un-espace-membres#/id/r-2178959

On pourrait ajouter d'autres étapes pour renforcer la sécurité de l'inscription. En particulier, renseignez-vous sur les systèmes de Captcha qui demandent au visiteur de recopier un mot issu d'une image afin de vérifier qu'il ne s'agit pas d'un robot. D'autre part, vous pourriez demander une confirmation par e-mail afin de vérifier que l'adresse est correcte.

○ La page de connexion
Habituellement, on demande au moins le pseudonyme (ou login) et le mot de passe du membre. Pour lui faciliter la vie, on peut lui proposer une option de connexion automatique qui lui évitera d'avoir à se connecter de nouveau à chaque visite du site > https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/917948-tp-creez-un-espace-membres#/id/r-2178968
La page qui reçoit les données du formulaire de connexion doit vérifier le mot de passe en le comparant à celui stocké dans la base avec la fonction  password_verify  . Cette fonction va en fait hasher le mot de passe de l'utilisateur qui vient de se connecter et le comparer à celui qui était stocké en base de données.

S'il existe un membre qui a le même pseudonyme et le même mot de passe haché, alors on autorise la connexion et on peut créer les variables de session. Sinon, on renvoie une erreur indiquant que le pseudonyme ou le mot de passe est invalide.
<?php 

//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}
?>
S'il y a une erreur, il est préférable d'afficher un message générique comme le mien plutôt que de dire précisément "C'est un mauvais identifiant" ou "C'est un mauvais mot de passe". Si quelqu'un essaie de voler l'accès à un utilisateur, moins il en sait, mieux c'est !
Désormais, sur toutes les pages du site, on pourra indiquer au membre qu'il est connecté grâce à la présence des variables $_SESSION :
<?php 
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}
?>
Si le membre souhaite être reconnecté automatiquement, il faut créer deux cookies qui stockeront respectivement : le pseudonyme + le mot de passe HACHÉ.;

○ La page de déconnexion
Si la déconnexion est automatique au bout d'un certain temps (le fameux timeout), il faut quand même proposer un lien de déconnexion. La page de déconnexion devra supprimer le contenu de $_SESSION, mettre fin au système de sessions (en appelantsession_destroy()) et supprimer les cookies de connexion automatique s'ils existent.
<?php 
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');
?>

• Aller plus loin 

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/917948-tp-creez-un-espace-membres#/id/r-2179000

○ Proposer au membre d'envoyer un AVATAR (envoi de fichier + minimiser une image). La méthode la plus simple consiste à créer un dossier avatars et à y placer les avatars nommés en fonction des id des membres : 1.png, 2.png, 3.png, etc.
○ Une page de profil de présentation des membres. Vous pouvez y afficher toutes sortes d'informations, comme son e-mail (mais il vaut mieux lui demander son accord auparavant), son adresse de messagerie instantanée, sa date de naissance, ses passions, son travail, le nom de la ville où il habite, etc, stockées dans de nouveaux champs de la table membres.
○ Proposez au membre s'il le souhaite de changer ses identifiants : son pseudonyme et son mot de passe. Il est courant qu'un membre désire changer de pseudonyme quelque temps après s'être inscrit, mais surtout il est vital qu'il puisse changer son mot de passe à tout moment au cas où celui-là serait compromis !
○ Donnez au membre la possibilité de choisir parmi plusieurs options de navigation. Tout le monde n'utilise pas votre site web de la même manière, peut-être que certains souhaiteraient avoir un menu en haut des pages plutôt qu'un autre, peut-être que d'autres préfèreraient naviguer avec un design sombre, etc.
○ Mettre en place vos propres forums sur votre site web ! Chaque message des forums sera associé à un id de membre : il suffira de créer un champ id_membre dans la table des messages. Vous pourrez alors utiliser les jointures pour récupérer automatiquement le pseudonyme du membre et sa signature à chaque message posté !


IV) ALLER PLUS LOIN

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/4778351-comment-aller-plus-loin

https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php

https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php

https://openclassrooms.com/fr/courses/5489656-construisez-un-site-web-a-l-aide-du-framework-symfony-4


V) ENVOYER LE SITE SUR LE WEB

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/918167-envoyez-votre-site-sur-le-web

Partie PHP > https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/918167-envoyez-votre-site-sur-le-web#/id/r-4447092


VI) Utilisez la documentation PHP

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/918372-utilisez-la-documentation-php

    ○ int : cela signifie que la fonction renvoie un nombre entier. mt_rand renvoie donc un nombre entier (-8, 0, 3, 12, etc.) ;

    ○ float : la fonction renvoie un nombre décimal (comme 15.2457) ;

    ○ number : la fonction renvoie un nombre qui peut être soit un entier (int) soit un décimal (float) ;

    ○ string : la fonction renvoie une chaîne de caractères, c'est-à-dire du texte. Par exemple « Bonjour » ;

    ○ bool : la fonction renvoie un booléen, c'est-à-dire vrai ou faux (true ou false) ;

    ○ array : la fonction renvoie un array (tableau de variables). Le plus simple en général, c'est de faire unprint_r, comme je vous l'ai appris, pour voir tout ce que contient cet array ;

    ○ resource : la fonction renvoie une « ressource ». Une ressource est un type de données particulier, une sorte de super-variable. Il peut s'agir d'une image, d'un fichier, etc. Dans le chapitre sur la bibliothèque GD par exemple, on manipule une variable $image ;

    ○ void : la fonction ne renvoie rien du tout. C'est le cas des fonctions qui ne servent qu'à faire une action et qui n'ont pas besoin de renvoyer d'information ;

    ○ mixed : la fonction peut renvoyer n'importe quel type de données (unint, unstring, ça dépend…).


VII) Protégez un dossier avec un .htaccess

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/918580-protegez-un-dossier-avec-un-htaccess

• Créer le .htaccess

1) Créer sur le disque dur un fichier appelé .htaccess ;
2) Copier :
AuthName "Page d'administration protégée"
AuthType Basic
AuthUserFile "/home/site/www/admin/.htpasswd"
Require valid-user
3) Changer :
AuthName : c'est le texte qui invitera l'utilisateur à inscrire son login et son mot de passe. Vous pouvez personnaliser ce texte comme bon vous semble ;
AuthUserFile : chemin absolu vers le fichier .htpasswd (que vous mettrez dans le même répertoire que le.htaccess).
4) Trouver le chemin absolu :
 - Créez un fichier appelé chemin.php.
 - Coller : <?php echo realpath('chemin.php'); ?>;
 - Envoyer ce fichier sur votre serveur avec votre logiciel FTP, et placez-le dans le dossier que vous voulez protéger.
 - Ouvrez votre navigateur et allez voir ce fichier PHP. Il vous donne le chemin absolu, par exemple dans mon cas : /home/site/www/admin/chemin.php ;
 - Copiez ce chemin dans votre.htaccess, et remplacez le chemin.php par .htpasswd, ce qui nous donne au final par exemple : /home/site/www/admin/.htpasswd ;
 - Supprimez le fichierchemin.phpde votre serveur ;
 - Enregistrer le fichier en inscrivant le nom entre guillemets, comme ceci :".htaccess". Cela permet de forcer l'éditeur à enregistrer un fichier qui commence par un point.

• Créer le .htpasswd

1) Créez maintenant un nouveau fichier avec votre éditeur de texte. ;
2) Le.htpasswdva contenir la liste des personnes autorisées à accéder aux pages du dossier. On y inscrit une personne par ligne, sous cette forme :
mateo21:$1$MEqT//cb$hAVid.qmmSGFW/wDlIfQ81
ptipilou:$1$/lgP8dYa$sQNXcCP47KhP1sneRIZoO0
djfox:$1$lT7nqnsg$cVtoPfe0IgrjES7Ushmoy.
vincent:$1$h4oVHp3O$X7Ejpn.uuOhJRkT3qnw3i0
3) On crypte les mots de passe avec crypt() :
<?php echo crypt('kangourou'); ?>;
4) Ce code :
<?php
if (isset($_POST['login']) AND isset($_POST['pass']))
{
    $login = $_POST['login'];
    $pass_crypte = crypt($_POST['pass']); // On crypte le mot de passe

    echo '<p>Ligne à copier dans le .htpasswd :<br />' . $login . ':' . $pass_crypte . '</p>';
}

else // On n'a pas encore rempli le formulaire
{
?>

<p>Entrez votre login et votre mot de passe pour le crypter.</p>

<form method="post">
    <p>
        Login : <input type="text" name="login"><br />
        Mot de passe : <input type="text" name="pass"><br /><br />
    
        <input type="submit" value="Crypter !">
    </p>
</form>

<?php
}
?>
5) Créer cette page (qui crypte les mdp) quelque part sur votre disque dur (ou sur votre serveur, peu importe), pour que vous puissiez crypter rapidement vos mots de passe pour le .htpasswd.

/!\ Il y a certains cas dans lesquels vous ne devrez pas crypter les mots de passe. Sous WAMP ou sur les serveurs de Free.fr par exemple, vous ne DEVEZ PAS crypter vos mots de passe pour que cela fonctionne. Vous devrez donc les écrire directement. Par exemple : mateo21:kangourou ;

• Envoyer les fichiers sur le serveur

1) On a deux fichiers sur votre disque dur : .htaccess et .htpasswd. ;
2) FTP ;
3) Transférez les fichiers .htaccess et .htpasswd DANS le dossier que vous voulez protéger par un mot de passe.


VIII) Mémento des expressions régulières

https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/918834-memento-des-expressions-regulieres


// ---------- MISE A JOUR WAMP ---------- //

Avec ton ancien Wamp :
1. Tu fais une copie de ton dossier www
2. Tu fais une copie de ton php.ini (si tu l'as modifié)
3. Tu fais une copie de ton httpd.conf (si tu l'as modifié)
4. Tu fais un export de toutes tes bases SQL

Avec ton nouveau Wamp :
1. Tu remets ton dossier www
2. Tu remets ton php.ini (si tu l'as modifié)
3. Tu remets ton httpd.conf (si tu l'as modifié)
4. Tu fais un import de toutes tes bases SQL
5. Tu vérifies les mots de passe SQL etc. 