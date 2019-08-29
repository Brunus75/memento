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