<!-- MEMO DES FONCTIONNALITÉS ET ASTUCES PHP -->
Message cannot validate de VS Studio > https://stackoverflow.com/questions/34182067/cannot-validate-the-php-file-the-php-program-was-not-found
Problèmes URL localhost WAMP : clic droit sur l'icône de WampServer > ⛭ Paramètres Wamp > Ajouter localhost dans l'URL
https://stackoverflow.com/questions/49811804/phpmyadmin-failed-to-set-session-cookie-maybe-you-are-using-http-instead-of-htt
Utiliser sendmail avec WAMP : https://www.copier-coller.com/envoyer-des-mails-en-local-avec-wamp/
https://stackoverflow.com/questions/21337859/sendmail-wamp-php
https://www.grafikart.fr/blog/mail-local-wamp
Gmail : activer validation en 2 étapes, puis créer un mot de passe pour une application (en l'occurence sendmail)
Dans sendmail.ini, remplacer auth_password=mdpgmail par auth_password=mdpappligmail

CONSIDERATIONS :
  • Préférer les "guillemets" pour les requêtes SQL
  • "UPDATE daily_count SET count = 0 WHERE user_id = $id" pour une requête sans erreur, malgré un champ qui s'appelle count
	• Page d'inscription compte le formulaire + la partie SQL (sur la même page)
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
  • SQL : moteur de stockage à préférer : InnoDB (peut accepter les FOREIGN KEYS)
  • The keyword elseif SHOULD be used instead of else if so that all control keywords look like single words.
  • if (!array_key_exists(...)) // si la clé n'existe pas (if (!true) = if (false))
  • htmlspecialchars_decode("affiche le texte protégé comme il doit s'afficher")
  • PHP orienté objet = tous les chemins cible sont selon l'emplacement de index.php
  • BDD : username plutôt que pseudo
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

VISUAL STUDIO :
	• Ctrl + D : sélectionner des groupes de mots semblables
  • Ctrl + alt + i : récupérer le namespace de la classe sélectionnée
	• PHP Getters & Setters, puis clic droit sur une variable > Get setters and getters PHP

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



-------------------------- ADOPTEZ UNE ARCHITECTURE MVC EN PHP --------------------------


I) UN CODE PROFESSIONNEL

• Un code modulaire (chaque fichier, un rôle), découplé, documenté (https://www.phpdoc.org/), anglais, clair;
• Un code réutilisable, facile d'y travailler à plusieurs, évolutif;


II) ISOLER L'AFFICHAGE DU TRAITEMENT PHP

• Séparer PHP de requête et PHP d'affichage
• Séparer en 2 fichiers : 
	- index.php (base du site, récupère les données et lance l'affichage)
	- affichageAccueil.php (affiche les données dans une page)

index.php
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

require('affichageAccueil.php');
?>

affichageAccueil.php
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
        while ($donnees = $req->fetch())
        {
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
            <br />
            <em><a href="#">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
    </body>
</html>


III) ISOLER L'ACCÈS AUX DONNÉES

Séparer en 3 fichiers :
Nous allons avoir 3 fichiers :
	○ modele.php : se connecte à la base de données et récupère les billets.
	○ affichageAccueil.php : affiche la page. Ce fichier ne va pas changer du tout.
	○ index.php : fait le lien entre le modèle et l'affichage (oui, juste ça !).
Les 3 fichiers forment la base d'une structure MVC (Modèle - Vue - Contrôleur) :
	○ Le modèle traite les données (modele.php)
	○ La vue affiche les informations (affichageAccueil.php)
	○ Le contrôleur fait le lien entre les deux (index.php)

◘ modele.php (contient une fonction getBillets() qui renvoie la liste des billets) (modèle)
<?php
function getBillets()
{
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

	return $req;
}
?>

◘ affichageAccueil.php (ne change pas) (vue)
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
        while ($donnees = $req->fetch())
        {
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
            <br />
            <em><a href="#">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
    </body>
</html>

◘ index.php (contrôleur, intermédiaire entre le modèle et la vue)
<?php
require('modele.php'); // 1) charge le fichier du modèle

$req = getBillets(); // 2) exécute le code à l'intérieur du modèle

require('affichageAccueil.php'); // 3) charge le fichier de la vue
?>


IV) SOIGNER LA COSMETIQUE

◘ Le code amélioré

index.php
<?php
require('model.php'); // noms de fichiers, variables et fonctions en anglais

$posts = getPosts();

require('indexView.php');

// supprime la balise de fermeture dans un code où il n'y a que du PHP
?> 

model.php
<?php
function getPosts()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

		// BDD en anglais
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

    return $req;
}

// balise non fermée
?>

indexView.php 
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
        while ($data = $posts->fetch())
        {
        ?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($data['title']) ?>
                    <em>le <?= $data['creation_date_fr'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br(htmlspecialchars($data['content'])) ?>
                    <br />
                    <em><a href="#">Commentaires</a></em>
                </p>
            </div>
        <?php
        }
        $posts->closeCursor();
        ?>
    </body>
</html>

BDD
posts
| id | title | content | creation_date


V) L'ARCHITECTURE MVC

Le but de MVC est de séparer la logique du code en trois parties que l'on retrouve dans des fichiers distincts :
○ Modèle : gère les données et les requêtes;
○ Vue : affichage HTML + boucles/conditions PHP;
○ Contrôleur : décisionnaire, intermédiaire entre le modèle et la vue, détermine si le visiteur a le droit de voir la page ou non (gestion des droits d'accès)

VI) Nouvelle fonctionnalité : afficher des commentaires

◘ MAJ du Modèle 

table -> comments
id, post_id, author, comment, comment_date

model.php
<?php
function getPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

    return $req;
}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

// Nouvelle fonction qui nous permet d'éviter de répéter du code
function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
// on ne ferme pas la balise
?>

◘ Création du contrôleur

post.php (affiche un post et ses commentaires)
<?php
require('model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('postView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}
// on ferme pas la balise
?>

◘ Création de la vue ( on affiche le billet (récupéré avec $post) et les commentaires (récupérés dans $comments))

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

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
        ?>
    </body>
</html>


VII) CREER UN TEMPLATE DE PAGE

◘ Inclure des blocs de page (peu flexible)

<?php require('header.php'); ?>

<h1>Mon super blog !</h1>

<p>Contenu de la page</p>
        
<?php require('footer.php'); ?>

◘ Créer un template

template.php (remplir les trous par des variables) : 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title><!-- Premier trou à remplir -->
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?= $content ?><!-- deuxième -->
    </body>
</html>


indexView.php (affiche la liste des derniers billets) :

<?php $title = 'Mon blog'; ?><!-- définit le titre de la page -->

<?php ob_start(); ?><!-- début du contenu, mémorise le code ce qui suit -->
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="post.php?id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?><!-- la variable $content récupère le contenu qui s'arrête à ob_get_clean() -->

<?php require('template.php'); ?><!-- récupère les variables et affiche la page -->


VIII) CREER UN ROUTEUR

Pour l'instant, 2 fichiers permettent d'accéder aux pages de notre site. Ce sont les 2 contrôleurs :
○ index.php : accueil du site, liste des derniers billets.
○ post.php : affichage d'un billet et de ses commentaires.
○ problème : répétitions et nombre interminable de fichiers
Le but : tout placer au même endroit

Le routeur appelle le bon contrôleur, qui récupère des informations depuis le modèle qu'il passe ensuite à la vue

◘ Nouvelle structure des fichiers

Pour faciliter la maintenance, il est plus simple de passer par un contrôleur frontal, qui va jouer le rôle de routeur. 
Son objectif va être d'appeler le bon contrôleur (on dit qu'il route les requêtes).
On va travailler ici sur 2 fichiers :
	○ index.php : ce sera le nom de notre routeur. Le routeur étant le premier fichier qu'on appelle en général sur un site, c'est normal de le faire dans index.php. Il va se charger d'appeler le bon contrôleur.
	○ controller.php : il contiendra nos contrôleurs dans des fonctions. On va y regrouper nos anciens index.php et post.php.

On va faire passer un paramètre action  dans l'URL de notre routeur index.php pour savoir quelle page on veut appeler. Par exemple :
	○ index.php?action=listPosts : va afficher la liste des billets.
	○ index.php?action=post : va afficher un billet et ses commentaires.

/!\ Pour voir monsite.com/listposts plutôt que index.php?action=listPosts => mécanisme de réécriture d'URL (URL rewriting), qui se fait dans la configuration du serveur web (Apache) /!\

◘ Création de controller.php 

<?php

require('model.php');

function listPosts() // on place nos contrôleurs dans des fonctions
{
    $posts = getPosts();

    require('listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('postView.php');
}

// on ne ferme pas la balise
?>

◘ Création du routeur index.php

<?php
require('controller.php'); // on appelle le contrôleur

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listPosts(); // ce que doit indiquer la page d'accueil du site (par défaut)
}
// on ne ferme pas la balise
?>

IX) ORGANISER EN DOSSIERS

◘ Créer les dossiers

	○ index.php, à la racine
	○ controller/ : le dossier qui contient nos contrôleurs.
	○ view/ : nos vues.
	○ model/ : notre modèle.
	○ public/ : tous nos fichiers statiques publics. On pourra y mettre à l'intérieur un dossier css/, images/, js/, etc.
	○ vendor/ : toutes les bibliothèques tierces (tout le code qui provient d'autres personnes)

◘ Regrouper par sections du site

Si sur mon site j'ai un espace "blog", un espace "forum", un espace "members", je pourrais regrouper les fonctions dans des fichiers au nom de ces sections.
Pour notre blog, je vous propose un autre découpage :
	○ frontend : tout ce qui est côté utilisateur. Affichage des billets, ajout et liste des commentaires...
	○ backend : tout ce qui est pour les administrateurs. Création de billets, modération des commentaires...

Project/
	controller/
		frontend.php
	model/
		frontend.php
	public/
		css/
		images/
		js/
	view/
		frontend/
			listPostsView.php 
			postView.php 
			template.php
	index.php


X) [NOUVELLE FONCTIONNALITE] AJOUTER DES COMMENTAIRES

	1) Ecrire le modèle (et créer au besoin des tables en base).
	2) Ecrire le contrôleur, pour récupérer les informations et les envoyer à la vue.
	3) Ecrire la vue, pour afficher les informations.
	4) Mettre à jour le routeur, pour envoyer vers le bon contrôleur.

◘ Écriture du modèle

Il suffit de rajouter une petite fonction  addComment  dans  model/frontend.php  qui ajoute un commentaire en base :
<?php

// ...

function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}
// on ferme pas la balise qui suit
?>

◘ Écriture du contrôleur

Le contrôleur controller/frontend.php récupère lui aussi les informations dont on a besoin (id du billet, auteur, commentaire) et les transmet au modèle :
<?php

// ...

function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
// pas fermer
?>

◘ Mise à jour de la vue

Il faut aussi modifier un peu la vue qui affiche un billet et ses commentaires (view/frontend/postView.php).
En effet, nous devons ajouter le formulaire pour pouvoir envoyer des commentaires !
<!-- ... -->

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<!-- ... -->

◘ Mise à jour du routeur

<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listPosts();
}
// pas fermer
?>


XI) GERER LES ERREURS

◘ Les exceptions 

<?php
// Code avant

try {
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage()); // afficher le message
}

// Code après
?>
Pour générer une erreur, il faut "jeter une exception".
Dès qu'il y a une erreur quelque part dans votre code, dans une fonction par exemple, vous utiliserez cette ligne :
<?php
throw new Exception('Message d\'erreur à transmettre');
?>

◘ Ajout de la gestion d'exceptions dans le routeur (un grand try catch)

<?php
require('controller/frontend.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
// pas fermer
?>

◘ Remonter les erreurs

Quand il se passe une erreur à l'intérieur d'une fonction située dans le bloc try , celle-ci est "remontée" jusqu'au bloc catch.
Que se passe-t-il quand il y a une erreur dans le modèle ? Pour l'instant, on fait ça :

<?php
// Fonction addComment du modèle
function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Gestion de l'erreur à l'arrache
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
// nope
?>

Voilà comment on peux mieux gérer l'erreur, en ajoutant un throw :

<?php
function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
// nope
?>

Du coup, dans la fonction  dbConnect()  de notre modèle, il n'est plus forcément nécessaire de garder un bloc try/catch.
L'erreur de connexion à la base, s'il y en a, sera remontée jusqu'au routeur :
<?php
function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
    return $db;
}
// nope
?>

◘ Améliorer la présentation de l'erreur 

Pour l'instant, notre bloc  catch  affiche une erreur avec un simple echo.
Si nous voulons faire quelque chose de plus joli, nous pouvons appeler une vue errorView.php qui affiche joliment le message d'erreur.
<?php
require('controller/frontend.php');

try {
    // ...
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
// nope
?>

XII) LA POO

○ Simplifier la réutilisation de morceaux du programme

◘ Définir une classe pour créer des objets

○ Objet = ensemble de variables et fonctions regroupées dans un même endroit (on encapsule les données)
○ Classe = plan pour créer les objets. Ex. : classe Maison => objet MaisonPablo
J'ai tendance à parler de moule qui crée des gateaux

◘ Créer une classe

<?php

class Maison
{
    // Variables membres

    private $largeur;
    private $longueur;
    private $nombreEtages;
    private $porte;
    private $temperature;


    // Fonctions membres

    public function ouvrirPorte()
    {
        // ...
    }

    public function fermerPorte()
    {
        // ...
    }

    public function modifierTemperature($temperature)
    {
        // ...
    }
}
?>

◘ Instancier des objets

<?php

// Chargement de la classe
require_once("Maison.php");

// Instanciation d'un objet
$maisonDeMathieu = new Maison();
// Instanciation d'un autre objet
$maisonDeJulie = new Maison();

$maisonDeMathieu->ouvrirPorte();
$maisonDeMathieu->fermerPorte();
$maisonDeMathieu->modifierTemperature(21); // principe d'encapsulation : on passe par des fonctions pour modifier les variables
// but : éviter les fausses ou malveillantes manipulations (on peut poser des conditions)

$maisonDeJulie->modifierTemperature(55); // 🔥😈
?>


XIII) PASSER DU MODELE EN OBJET

Histoire de bien faire les choses, on va créer 2 classes car on peut considérer qu'on a 2 types d'objets différents :
○ PostManager  : un gestionnaire de post de blog
○ CommentManager  : un gestionnaire de commentaire

On va donc avoir 2 fichiers :
○ model/PostManager.php
○ model/CommentManager.php

◘ La Classe PostManager

Le fichier qui contient la classe PostManager s'appelle model/PostManager.php.
(!) Les noms des classes commencent toujours par une majuscule. Leurs noms de fichiers aussi donc.
Nous y regroupons toutes nos fonctions qui concernent les posts :
<?php
class PostManager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }


    private function dbConnect() // fonction privée car ne doit être appelée que dans la classe
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $db;
    }
}
// nope
?>

◘ La Classe CommentManager

<?php
class CommentManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $db;
    }
}
// nope
?>

◘ Mise à jour du contrôleur

Maintenant que nous avons créé des classes, il nous faut créer des objets à partir d'elles. 
Notre contrôleur doit être adapté car il ne doit plus appeler des fonctions mais des fonctions situées à l'intérieur d'objets (des fonctions membres).

<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
// nope 
?>


XIV) TIRER PARTI DE L'HERITAGE

Vous vous souvenez de la fonction membre  dbConnect()  ? 
Nous avons dû la recopier à l'identique dans 2 classes différentes : PostManager et CommentManager. 
On a donc la même fonction dans 2 fichiers différents.
Nos deux classes ont besoin d'une fonction commune, possible avec l'héritage.

◘ Le principe de l'héritage

Une classe peut hériter d'une autre classe pour en récupérer toutes ses caractéristiques.
Le principe de l'héritage est de donner les caractéristiques d'un Logement (la classe parente) aux classes Maison et Appartement (les classes filles) :
<?php

class Logement
{
    private $porte;
    private $temperature;

    public function ouvrirPorte()
    {
        // ...
    }

    public function fermerPorte()
    {
        // ...
    }

    public function modifierTemperature($temperature)
    {
        // ...
    }
}

class Appartement extends Logement
{
    // Cette classe comporte automatiquement les variables ($porte, $temperature...) et les fonctions (ouvrirPorte...) de la classe parente
    
    private $etage; // Seuls les appartements sont situés à un étage précis. On définit donc cette variable ici.
}
//nope
?>

(!) Comment savoir si ça a du sens de faire un héritage ?
On doit pouvoir dire "ClasseA est un ClasseB". Par exemple :
○ "La Maison est un Logement" (donc Maison hérite de Logement)
○ "Le Chat est un Animal" (donc Chat hérite de Animal)


◘ Utiliser l'héritage avec le modèle

On va faire hériter nos classes PostManager et CommentManager d'une nouvelle classe nommée Manager.
Cette classe va contenir la fonction de connexion à la base de données :
<?php

class Manager
{
    protected function dbConnect() // protected = récupérable par les classes filles
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $db;
    }
}
// nope
?>

<?php
require_once("model/Manager.php"); // on appelle la Classe principale

class PostManager extends Manager
{
    // ...
}

class CommentManager extends Manager
{
    // ...
}
// nope
?>


XV) UTILISER LES NAMESPACES

◘ Le rôle des namespaces

Leur rôle ? Eviter les collisions de noms de classes.

◘ Utilisation des namespaces

Les namespaces ont cette forme : Entreprise\Projet\Section, voire Entreprise\Projet\Section\SousSection\SousSousSection
(!) Dans la pratique, en général on commence par le nom de l'entreprise qui est responsable du projet, suivi du nom du projet.
Vous pouvez mettre votre nom ou pseudonyme si vous n'avez pas d'entreprise.
Pour définir un namespace, on va le déclarer juste avant la définition de la classe :
<?php

namespace OpenClassrooms\Blog\Model; // La classe sera dans ce namespace

require_once("model/Manager.php");

class PostManager extends Manager
{
    // ...
}
// nope
?>

Cela a un impact : tous les fichiers qui font appel à cette classe doivent maintenant ajouter le namespace en préfixe.
Voilà par exemple à quoi va ressembler la fonction  post()  du contrôleur :
<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    // ...
}
// nope
?>

(X) Attention : en plaçant la classe Manager dans notre namespace, nous allons avoir un problème pour appeler PDO.
En effet, PDO est une classe qui se trouve à la racine (dans le namespace global). 
Pour régler le problème, il faudra écrire \PDO (ligne 9) :
<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $db;
    }
}
// nope
?>


◘ Éviter la répétition du préfixe

N'y a-t-il pas moyen d'éviter de répéter le namespace en préfixe à chaque fois ?
Il faut utiliser le mot-clé  use  en début d'un fichier qui fait régulièrement appel à des classes d'un même namespace :
<?php

use \OpenClassrooms\Blog\Model\PostManager;
use \OpenClassrooms\Blog\Model\CommentManager;

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    // ...
}
// non
?>
Néanmoins, cela peut aussi porter à confusion si nous abusons de cette technique.


XVI) ALLER PLUS LOIN

◘ Aller plus loin en POO

https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php

◘ Documenter le code 

En PHP on documente avec des régles : https://github.com/phpDocumentor/fig-standards/blob/master/proposed/phpdoc.md
Documentez votre code avec https://www.phpdoc.org/
Ce type de documentation peut se révéler très utile pour les développeurs qui ont besoin de comprendre comment votre code source fonctionne dans les grandes lignes.
Pour obtenir ce résultat, les variables et fonctions membres des objets sont précédés d'un commentaire qui suit une convention bien particulière :
<?php

/**
 * Executes a compiler pass.
 *
 * This method will execute the business logic associated with a given compiler pass and allow it to manipulate
 * or consumer the Object Graph using the ProjectDescriptor object.
 *
 * @param ProjectDescriptor $project Representation of the Object Graph that can be manipulated.
 *
 * @return mixed
 */
public function execute(ProjectDescriptor $project)
{
    // ...
}
//
?>
Le code est expliqué + permet de générer une documentation HTML

◘ Hydratez

Hydratation : transformer le contenu d'une base de données en objets et inversement.
Les objets font alors la passerelle entre le reste de votre code et la base de données.
<?php

class Comment extends Model
{
    private $author;
    private $content;
    
    public getAuthor() // Récupère l'auteur
    {
        // ...
    }
    
    public getContent() // Récupère le contenu
    {
        // ...
    }
    
    public setAuthor($author) // Définit l'auteur
    {
        // ...
    }
    
    public setContent($content) // Définit le contenu
    {
        // ...
    }
}
//
?>
si vous poussez le bouchon un peu loin, vous allez finir par créer ce qu'on appelle un ORM (Object-Relational Mapping).
C'est un système qui sert à transformer le contenu de votre base de données en objets et vice-versa.
L'un des ORM les plus connus en PHP s'appelle Doctrine (https://www.doctrine-project.org/). Il est d'ailleurs directement livré avec le framework Symfony (https://symfony.com/).

◘ Ne sortez pas un tank pour tuer une mouche

L'intérêt d'un code propre se voit quand vous commencez à travailler sur un gros projet.
Sur un tout petit projet, il n'est pas forcément nécessaire de sortir l'artillerie lourde...
Il faut rester équilibré entre fonctionnalité et esthétique

◘ Utilisez un framework

Les frameworks sont des super-bibliothèques qui contiennent tout le code qui vous permet d'éviter de réinventer la roue.
○ Zend Framework : le framework créé par la société qui a conçu PHP (Zend). Il a un peu moins le vent en poupe aujourd'hui même s'il reste connu.
○ Symfony : un des frameworks les plus connus, développé par des français. 🐓 Il existe un cours sur Symony sur OpenClassrooms.
○ Laravel : un autre framework PHP très connu.