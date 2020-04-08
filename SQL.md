# MEMENTO SQL (via MYSQL)

## RESSOURCES

* Cours et tutoriels sur le langage SQL > https://sql.sh/

## AVERTISSEMENT

* Ce memento présente SQL avec le SGBDR MYSQL
* Quelques disparités peuvent émerger avec d'autres SGBDR (PostgreSQL, SQLite, ect.)

## FONCTIONNEMENT

* Un langage qui lui est propre : le langage SQL = Structured Query Language
* Structure d'une base de données :

   • La base, l'armoire où l'on classe les informations   
   • Une table, un tiroir qui contient des données différentes (pseudos/infos, messages, ect.)   
   • Les champs, les colonnes du tiroir   
   • Les entrées, les lignes du tiroir   

```
TABLE 1
    champ 1     champ 2                  champ 3                     champ 4
┌──────────┬───────────────┬───────────────────────────────┬───────────────────────┐
│ Numéro   │ Pseudo        │ E-mail                        │ Âge                   │ 
├──────────┼───────────────┼───────────────────────────────┼───────────────────────┤
│1         │ Kryptonic     │ kryptonic@free.fr             │ 24                    │ entrée
│2         │ Serial_Killer │ serialkiller@unitedgamers.com │ 28                    │ entrée
└──────────┴───────────────┴───────────────────────────────┴───────────────────────┘
```
* Ex. de noms de table :

   • news : stocke toutes les news qui sont affichées à l'accueil ;   
   • livre_or : stocke tous les messages postés sur le livre d'or ;   
   • forum : stocke tous les messages postés sur le forum ;   
   • newsletter : stocke les adresses e-mail de tous les visiteurs inscrits à la newsletter.   

* Les données sont stockées dans des fichiers sur le disque dur   
   /!\ NE JAMAIS OUVRIR OU MODIFIER CES FICHIERS (toujours passer par MySQL ou autre)   


## PHPMYADMIN

* /!\ BUG abscence de SQL à l'export => https://github.com/phpmyadmin/phpmyadmin/commit/95114841420af6277b0406ec7f0d32c4ff3fcf27

* Manipuler une base de données MySQL avec phpMyAdmin : https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/913893-phpmyadmin
* Pour se connecter à phpMyAdmin > éteindre VPN > http://localhost/phpmyadmin/index.php
* Les types de champs MySQL :

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

* Modifier une table    
Insérer > Valeur > Remplir les entrées (sauf ID qui s'incrémente tout seul)

* Autre opérations   
    • Afficher : affiche le contenu de la table ;   
    • Structure : présente la structure de la table (liste des champs) ;   
    • Insérer : permet d'insérer de nouvelles entrées dans la table ;   
    • SQL : taper des requêtes SQL ;   
    • Importer : envoyer un fichier de requêtes SQL (.sql) ;   
    • Exporter : récupérer la base de données sur le disque dur sous forme de fichier texte (.sql), qui dit à MySQL comment créer ma base de données. On l'utilise pour : transmettre ma base de données sur le web + faire une copie de sauvegarde de la base de données. Exporter > paramètres défauts > Transmettre    
    • Recréer ma base de données sur le web > phpMyAdmin de l'herbergeur > Importer ;   
    • Opérations : changer le nom de la table, déplacer la table vers, copier la table, optimiser (ranger de nouveau) la table ;   
    • Vider : Vide tout le contenu de la table et fait disparaitre les entrées (seule la structure et les champs resteront) /!\ IRREVERSIBLE /!\ ;   
    • Supprimer : Supprime tout /!\ IRREVERSIBLE /!\ ;


## CREER, MODIFIER, SUPPRIMER UNE TABLE

* Créer une table
```sql
CREATE TABLE nom_de_la_table
(
    colonne1 type_donnees,
    colonne2 type_donnees,
    colonne3 type_donnees,
    colonne4 type_donnees
)

CREATE TABLE utilisateur
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, -- clé primaire incrémentée automatiquement
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(255),
    date_naissance DATE,
    pays VARCHAR(255),
    ville VARCHAR(255),
    code_postal VARCHAR(5),
    nombre_achat INT
)
```
* Modifier une table
D’une manière générale, la commande s’utilise de la manière suivante:
```sql
ALTER TABLE nom_table
instruction
```
- Ajouter une colonne   
```sql
ALTER TABLE nom_table
ADD nom_colonne type_donnees
-- Exemple
-- Pour ajouter une colonne qui correspond à une rue sur une table utilisateur, il est possible d’utiliser la requête suivante:
ALTER TABLE utilisateur
ADD adresse_rue VARCHAR(255)
```
- Supprimer une colonne
Il y a 2 manières totalement équivalente pour supprimer une colonne:
```sql
ALTER TABLE nom_table
DROP nom_colonne

Ou (le résultat sera le même)

ALTER TABLE nom_table
DROP COLUMN nom_colonne
```
- Modifier une colonne
Pour modifier une colonne, comme par exemple changer le type d’une colonne, il y a différentes syntaxes selon le SGBD. 
```sql  
-- MySQL
ALTER TABLE nom_table
MODIFY nom_colonne type_donnees

-- PostgreSQL
ALTER TABLE nom_table
ALTER COLUMN nom_colonne TYPE type_donnees
-- Ici, le mot-clé “type_donnees” est à remplacer par un type de données tel que INT, VARCHAR, TEXT, DATE …
```
- Renommer une colonne
Pour renommer une colonne, il convient d’indiquer l’ancien nom de la colonne et le nouveau nom de celle-ci.
```sql
-- MySQL
-- Pour MySQL, il faut également indiquer le type de la colonne.
ALTER TABLE nom_table
CHANGE colonne_ancien_nom colonne_nouveau_nom type_donnees
-- Ici “type_donnees” peut correspondre par exemple à INT, VARCHAR, TEXT, DATE …

-- PostgreSQL (la syntaxe est plus simple et ressemble à ceci (le type n’est pas demandé)):
ALTER TABLE nom_table
RENAME COLUMN colonne_ancien_nom TO colonne_nouveau_nom
```
* Supprimer une table
```sql
DROP TABLE nom_table

DROP TABLE client_2009
```


## RECUPERER DES DONNEES

* Première requête SQL
```sql
	SELECT * FROM jeux_video
	TYPE_D_OPERATION champs_MySQL (tous les champs = *, champs noms et posesseurs = noms, possesseur) FROM nom_de_la_table
```
* Les critères de selection
* Mot-clés WHERE ; ORDER BY ; LIMIT
* WHERE : trier les données
```sql
Ex. SELECT * FROM jeux_video WHERE possesseur='Patrick'; -- lorsque le champ 'possesseur est égal à Patrick'
```
* COMBINER PLUSIEURS CONDITIONS, avec AND ou OR
```sql
SELECT * FROM jeux_video WHERE possesseur='Patrick' AND prix < 20; -- lorsque le champ possesseur égal Patrick et lorsque le prix est inférieur à 20
```
* ORDER BY : ordonner les résultats
```sql
Ex. SELECT * FROM jeux_video ORDER BY prix; -- sélectionner tous les champs de la table jeux_video et ordonner les résultats par prix croissants
```
* Par ordre décroissant : rajouter DESC à la fin;
```sql
SELECT * FROM jeux_video ORDER BY prix DESC; -- ordonner les résultats par prix décroissant
-- ORDER BY sur du texte : ordre alphabétique
```
* LIMIT : selectionner qu'une partie des résultats (par ex. les 20 premiers)
```sql
SELECT * FROM jeux_video LIMIT 0, 20; -- /!\ 0 = première entrée, 20 = 21ème entrée, etc.
-- LIMIT première entrée, nombre d'entrées à selectionner;
LIMIT 0, 20 : affiche les vingt premières entrées ;
LIMIT 5, 10 : affiche de la sixième à la quinzième entrée ;
LIMIT 10, 2 : affiche la onzième et la douzième entrée ;


SELECT nom, possesseur, console, prix FROM jeux_video WHERE console='Xbox' OR console='PS2' ORDER BY prix DESC LIMIT 0, 10;

(!) Ordre : WHERE > ORDER BY > LIMIT
```

* Construire des requêtes en fonction des variables

* La mauvaise idée : concaténer une variable dans une requête   
Ex. <?php
$reponse = $bdd->query('SELECT nom FROM jeux_video WHERE possesseur=\'' . $_GET['possesseur'] . '\'');
?> /!\ RISQUE DE HACK si $_GET vient de l'utilisateur (ne JAMAIS faire confiance à l'utilisateur)

* La solution : les requêtes préparées   
À utiliser si l'on veut adapter une reqûete en fonction d'une ou plusieurs variables

* Avec des marqueur "?"
```php
$req = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ?');
// requête sans variable, avec prepare();
$req->execute(array($_GET['possesseur']));
// requête avec execute, où le ? est remplacé par le contenu, ici la valeur du paramètre possesseur 

// S'il y a plusieurs marqueurs, il faut les appeler dans le bon ordre :
$possesseur = 'Florent';
$prix_max = 20;
$req = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ? AND prix <= ?');
$req->execute(array($possesseur, $_prix_max));

// ex.
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e) {
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
```

* Avec des marqueurs nominatifs (si la requête contient beaucoup de parties variables)
```php
$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prixmax');
$req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max']));

// :possesseur et :prixmax, puis 'possesseur' => variable, 'prixmax' => variable;
// Plus de clarté quand il y a beaucoup de paramètres;
```

* Traquer les erreurs

Lorsqu'une requête SQL « plante », bien souvent PHP vous dira qu'il y a eu une erreur à la ligne du fetch : Fatal error: Call to a member function fetch() on a non-object in C:\wamp\www\tests\index.php on line 13   
Pour afficher des détails sur l'erreur, il faut activer les erreurs lors de la connexion à la base de données via PDO :
```php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // affiche des erreurs plus précises
// TOUJOURS activer ce dernier paramètre 
```

## ECRIRE DES DONNEES

* INSERT : ajouter des données
* La requête INSERT INTO permet d'ajouter une entrée
```sql
INSERT INTO jeux_video(ID, nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES('', 'Battlefield 1942', 'Patrick', 'PC', 45, 50, '2nde guerre mondiale');
-- Les nombres n'ont pas besoin de '' pour fonctionner;
INSERT INTO table(noms des champs concernés) VALUES(valeurs à associer);
-- Champ ID : '' ou mieux, absent (la base de données gère l'auto-incrémentation);
INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES('Battlefield 1942', 'Patrick', 'PC', 45, 50, '2nde guerre mondiale')
```
* UPDATE : modifier des données
* La requête UPDATE permet de modifier une entrée
```sql
UPDATE jeux_video SET prix = 10, nbre_joueurs_max = 32 WHERE ID = 51;
UPDATE nom_table SET champAModifier1 = nouvelleValeur, champAModifier2 = nouvelleValeur WHERE entreeAModifier;
UPDATE jeux_video SET prix = '10', nbre_joueurs_max = '32' WHERE nom = 'Battlefield 1942';
-- Florent vient de racheter tous les jeux de Michel;
UPDATE jeux_video SET possesseur = 'Florent' WHERE possesseur = 'Michel';
-- Traduction : « Dans la table jeux_video, modifier toutes les entrées dont le champ possesseur est égal à Michel, et le remplacer par Florent. »
```
* DELETE : supprimer des données   
/!\ Après supression, AUCUN  moyen de récupérer les données !
```sql
DELETE FROM jeux_video WHERE nom='Battlefield 1942'; -- // ne pas mettre de * !
DELETE FROM nom_table WHERE entreeASupprimer;
```

## LES FONCTIONS SQL

* Les fonctions SQL sont classées en 2 catégories :   
	- Les fonctions scalaires : agissent sur chaque entrée (ex. transformer en majuscule chacune des entrées d'un champ);   
	- Les fonctions d'agrégat : calculs sur l'ensemble de la table pour retourner une valeur (ex. le prix moyen);   

* Les fonctions scalaires
* Utiliser une fonction scalaire SQL   
Les noms des fonctions s'écrivent en MAJUSCULES, comme SELECT, INSERT, etc.
```sql
SELECT UPPER(nom) FROM jeux_video; -- la fonction UPPER est appliquée sur le champ 'nom' > tous les noms passent en MAJUSCULES
-- La fonction UPPER modifie SEULEMENT la valeur envoyée à PHP, pas la table;
-- Cela crée un champ virtuel (un ALIAS) qui n'existe que le temps de la requête;
SELECT UPPER(nom) AS nom_maj FROM jeux_video; -- on récupère les noms en MAJ grâce au chap virtuel nom_maj

Combiné avec les autres champs :
SELECT UPPER(nom) AS nom_maj, possesseur, console, prix FROM jeux_video;
-- -> SUPER MARIO BROS | Florent | NES | 4

Quelques fonctions scalaires utiles :

UPPER : convertir en MAJUSCULES => SELECT UPPER(nom) AS nom_maj FROM jeux_video; Sonic => SONIC
LOWER : CONVERTIR EN minuscules => SELECT LOWER(nom) AS nom_maj FROM jeux_video; Sonic => sonic
LENGTH : compter le nombre de C4R4CT3R3S => SELECT LENGTH(nom) AS nom_maj FROM jeux_video; 
Sonic => 5;
ROUND : arrondir un chiffre décimal => SELECT ROUND(prix, 2) AS prix_arrondi FROM jeux_video => SELECT ROUND(nomChamp, nombreChiffresApresVirgule) AS alias FROM table; 25,86999 => 25,87
"D'autres" : Un liste des fonctions mathématiques > https://dev.mysql.com/doc/refman/8.0/en/numeric-functions.html;
"Des fonctions sur les chaînes de caractère" > https://dev.mysql.com/doc/refman/8.0/en/string-functions.html
```

* Les fonctions d'agrégat
* Utiliser une fonction d'agrégat SQL :   
Elles font des opérations sur plusieurs entrées pour retourner une valeur;   
Une fonction d'agrégat comme AVG renvoie une seule entrée : la valeur moyenne de tous les prix;   
Elle calcule la moyenne d'un champ contenant des nombres;   
```sql
SELECT AVG(prix) AS prix_moyen FROM jeux_video -- => 28.34;

Filtrer les résultats :
SELECT AVG(prix) AS prix_moyen FROM jeux_video WHERE possesseur='Patrick'; -- le prix moyen des jeux appartenant à Patrick
```
/!\ Ne pas mélanger une fonction d'agrégat avec d'autres champs :   
SQL renvoie les informations sous la forme d'un tableau;   
On ne peut pas représenter la moyenne des prix (qui tient en une seule entrée) en même temps que la liste des jeux. Si on voulait obtenir ces deux informations il faudrait faire deux requêtes.;   

* Quelques fonctions d'agrégat utiles :
```sql
AVG -- calcule la moyenne d'un champ contenant des nombres
SELECT AVG(prix) AS prix_moyen FROM jeux_video
SUM -- additionne toutes les valeurs d'un champ
SELECT SUM(prix) AS prix_total FROM jeux_video WHERE possesseur='Patrick' -- => valeur totale des jeux de Patrick;
MAX -- retourne la valeur maximale d'un champ 
SELECT MAX(prix) AS prix_max FROM jeux_video -- le jeu le plus cher
MIN -- retourne la valeur minimale d'un champ 
SELECT MIN(prix) AS prix_min FROM jeux_video => le jeu le moins cher
COUNT -- compte le nombre d'entrées => s'utilise de plusieurs façons :
SELECT COUNT(*) AS nbjeux FROM jeux_video; -- en paramètres, le plus courant
SELECT COUNT(*) AS nbjeux FROM jeux_video WHERE possesseur='Florent'; -- nombre de jeux appartenant à Florent
"Compter uniquement les entrées pour lesquelles l'un des champs n'est pas vide, c'est-à-dire qu'il ne vaut pas NULL" : SELECT COUNT(nbre_joueurs_max) AS nbjeux FROM jeux_video 
-- => SELECT COUNT(nom_champ) => nombre d'entrées remplies du champ 'nbre_joueurs_max';
"Compter le nombre de valeurs distinctes sur un champ précis" => 
SELECT COUNT(DISTINCT possesseur) AS nbpossesseurs FROM jeux_video -- => nombre exact de joueurs;
```

* GROUP BY et HAVING : le groupement de données
```sql
SELECT AVG(prix) AS prix_moyen, console FROM jeux_video est impossible 
-- on ne peut pas avoir un tableau avec un champ et une seule entrée (prix moyen) et un champ avec l'ensemble des entrées.
```
* GROUP BY : grouper des données   
Demander le prix moyen des jeux pour chaque console : GROUP BY + fonction d'agrégat;
```sql
SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console;
-- GROUP BY + fonction d'agrégat;
```

* HAVING : filtrer les données regroupées   
Equivalent de WHERE, mais agit à la fin des opérations;   
```sql
SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console HAVING prix_moyen <= 10;
```
Récupère uniquement la liste des consoles et leur prix moyen si ce prix moyen ne dépasse pas 10€;   
HAVING ne s'utilise que sur le résultat d'une fonction d'agrégat (ici prix_moyen);   
WHERE agit en premier, avant le groupement des données, tandis que HAVING agit en second, après le groupement des données. On peut d'ailleurs très bien combiner les deux :
```sql
SELECT AVG(prix) AS prix_moyen, console FROM jeux_video WHERE possesseur='Patrick' GROUP BY console HAVING prix_moyen <= 10 
-- On demande à récupérer le prix moyen par console de tous les jeux de Patrick (WHERE), à condition que le prix moyen des jeux de la console ne dépasse pas 10 euros (HAVING)
```

## LES DATES EN SQL

* Les champs de type date   
https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/915206-les-dates-en-sql#/id/r-915156

* Les différents types de dates :   
	- DATE : stocke une date au format AAAA-MM-JJ (année-mois-jour); (très utilisé)
	- TIME : stocke un moment au format HH:MM:SS (heure-minutes-secondes);
	- DATETIME : stocke la combinaison d'une date ET d'un moment précis de la journée, au format AAAA-MM-JJ HH:MM:SS; (très utilisé)
	- TIMESTAMP : stocke le nombre de secondes passées depuis le 1er janvier 1970 à 00h00min00s;
	- YEAR : stocke une année, au format AA ou AAAA;

* Dans phpMyAdmin, donner un autre nom que "date" au champ date > date_creation, date_modification, ect.

* Utilisation des champs de date en SQL :   
Les dates s'utilisent comme des 'chaines de caractères';
```sql   
SELECT pseudo, message, date FROM minichat WHERE date = '2010-04-02'; -- renvoie la liste des messages postés le 02/04/2010 (2 avril 2010)

"Si le champ est de type DATETIME, il faut aussi précisément indiquer heures, minutes, secondes :"
SELECT pseudo, message, date FROM minichat WHERE date = '2010-04-02 15:28:22';

"Obtenir la liste des messages postés APRÈS CETTE DATE :"
SELECT pseudo, message, date FROM minichat WHERE date >= '2010-04-02 15:28:22';

"Obtenir la liste des messages postés ENTRE 02/04/2010 et le 18/04/2010 :"
SELECT pseudo, message, date FROM minichat WHERE date >= '2010-04-02 00:00:00' AND date <= '2010-04-18 00:00:00';

"Avec BETWEEN (plus élégant, mais plus sujet à erreur (voir postgreSQL)) :"
SELECT pseudo, message, date FROM minichat WHERE date BETWEEN '2010-04-02 00:00:00' AND '2010-04-18 00:00:00';

"Insérer une entrée date :"
INSERT INTO minichat(pseudo, message, date) VALUES('Mateo', 'Message !', '2010-04-02 16:32:22');
```

* Les fonctions de gestion des dates   
La liste complète > https://dev.mysql.com/doc/refman/5.7/en/date-and-time-functions.html
* NOW : obtenir la date et l'heure actuelles   
Très souvent utilisée, notamment pour enregistrer la date actuelle en même temps qu'un message
```sql
INSERT INTO minichat(pseudo, message, date) VALUES('Mateo', 'Message !', NOW()); -- AAAA-MM-JJ HH:MM:SS
"Également : CURDATE() (AAAA-MM-JJ) et CURTIME() (HH:MM:SS);"
```
* DAY(), MONTH(), YEAR() : extraire le jour, le mois, l'année
```sql
SELECT pseudo, message, DAY(date) AS jour FROM minichat; -- extrait le jour dans la date
```
* HOUR(),MINUTE(),SECOND() : extraire les heures, minutes, secondes (d'un champ DATETIME ou TIME)
```sql
SELECT pseudo, message, HOUR(date) AS heure FROM minichat;
```
* DATE_FORMAT : formater une date   
Adapter la date au format voulu   
```sql
SELECT pseudo, message, DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date FROM minichat; --récupère les dates avec un champ nommé date sous la forme 11/03/2010 15h47min49s
```
Les symboles %d, %m, %Y(etc.) sont remplacés par le jour, le mois, l'année, etc. Les autres symboles et lettres sont affichés tels quels.   
La liste des symboles disponibles > https://dev.mysql.com/doc/refman/5.7/en/date-and-time-functions.html#function_date-format

* DATE_ADD et DATE_SUB : ajouter ou soustraire des dates   
Il faut envoyer 2 paramètres à la fonction() : la date concernée, le nombre à ajouter + type;   
Ex. : Afficher une date d'expiration du message. Celle-ci correspond à « la date où a été posté le message + 15 jours » :   
```sql
SELECT pseudo, message, DATE_ADD(date, INTERVAL 15 DAY) AS date_expiration FROM minichat;
```
Le champ date_expiration correspond à « la date de l'entrée + 15 jours »;    
Le mot-clé INTERVAL ne doit pas être changé ; en revanche, vous pouvez remplacer DAY par MONTH, YEAR, HOUR, MINUTE, SECOND, etc. Par conséquent, si vous souhaitez indiquer que les messages expirent dans deux mois :
```sql
SELECT pseudo, message, DATE_ADD(date, INTERVAL 2 MONTH) AS date_expiration FROM minichat;
```

## LES JOINTURES ENTRE LES TABLES

* https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/916084-les-jointures-entre-tables

* Modélisation d'une relation

But : éviter les répétitions + créer une connexion entre plusieurs tables   
Création d'une table propriétaires : ID prenom nom tel;   
Modification de la table jeux_video : ID nom ID_proprietaire console prix etc.   
ID_proprietaire = ID de la table propriétaire    
Pour que la relation soit effective > jointure des tables;    

* Une jointure

   - Les jointure internes : ne sélectionnent que les données qui ont une correspondance (un lien, une connexion) entre les deux tables;
   - Les jointures externes : sélectionnent TOUTES les données, même celles qui n'ont AUCUNE correspondance (aucun lien, aucune connexion) dans l'autre table

* Les jointures internes

Une jointure interne peut s'effectuer de 2 façons différentes :   
   - Avec le mot-clé WHERE (à éviter si on a le choix)
   - Avec le mot-clé JOIN (plus efficace, plus lisible)

* Jointure interne avec WHERE (ancienne syntaxe) :
```sql
SELECT nom, prenom FROM proprietaires, jeux_video; -- FROM table1, table2
SELECT jeux_video.nom, proprietaires.prenom FROM proprietaires, jeux_video; -- SELECT table.champ, table.champ => pour éviter toute colonne ambigüe (le champ nom apparaissait dans les 2 tables)
SELECT jeux_video.nom, proprietaires.prenom
FROM proprietaires, jeux_video
WHERE jeux_video.ID_proprietaire = proprietaires.ID; -- écriture sur plusieurs lignes autorisée connexion avec WHERE table.champ = table.champ;
```
Il est conseillé d'utiliser des ALIAS lorsque l'on fait des JOINTURES :
```sql
SELECT jeux_video.nom AS nom_jeu, proprietaires.prenom AS prenom_proprietaire
FROM proprietaires, jeux_video
WHERE jeux_video.ID_proprietaire = proprietaires.ID
```
Il est aussi recommandé de donner un ALIAS aux noms de table (requête plus courte et lisible) :
```sql
SELECT j.nom AS nom_jeu, p.prenom AS prenom_proprietaire
FROM proprietaires AS p, jeux_video AS j
WHERE j.ID_proprietaire = p.ID
```

* Jointure interne avec JOIN (nouvelle syntaxe) :
```sql
SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
FROM proprietaires p
INNER JOIN jeux_video j
ON j.ID_proprietaire = p.ID; -- les AS sont manquants, les 2 façons d'écrire sont correctes

SELECT champ1, champ2, ect.
FROM tablePrincipale
INNER JOIN tableSecondaire
ON champ.Table1 = champ.Table2
```
Filtrer la requête : à la fin de la jointure (ON) :
```sql
SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
FROM proprietaires p
INNER JOIN jeux_video j
ON j.ID_proprietaire = p.ID
WHERE j.console = 'PC'
ORDER BY prix DESC
LIMIT 0, 10
Traduction : « Récupère le nom du jeu et le prénom du propriétaire dans les tables proprietaires et jeux_video, la liaison entre les tables se fait entre les champs ID_proprietaire et ID, prends uniquement les jeux qui tournent sur PC, trie-les par prix décroissants et ne prends que les 10 premiers. »
```

* Les jointures externes

* Récupère toutes les données, même celles qui n'ont pas de correspondance.

* LEFT JOIN : récupérer toute la table de gauche
```sql
SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
FROM proprietaires p -- table de gauche
LEFT JOIN jeux_video j -- table de droite (on ajoute par la droite)
ON j.ID_proprietaire = p.ID;
"proprietaires est appelée la « table de gauche » et jeux_video la « table de droite ». 
Le LEFT JOIN demande à récupérer tout le contenu de la table de gauche, donc tous les propriétaires, même si ces derniers n'ont pas d'équivalence dans la table jeux_video
nom_jeu       prenom_proprietaire
Sonic               Patrick
NULL                Romain

FROM tableA A
LEFT JOIN tableB B => TOUTES les données de la table A + les données correspondantes de la table B"
```

* RIGHT JOIN : récupérer toute la table de droite   
Le RIGHT JOIN demande à récupérer toutes les données de la table dite « de droite », même si celle-ci n'a pas d'équivalent dans l'autre table.
```sql
SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
FROM proprietaires p -- table de gauche
RIGHT JOIN jeux_video j -- table de droite
ON j.ID_proprietaire = p.ID;
"La table de droite est « jeux_video ». On récupèrerait donc tous les jeux, même ceux qui n'ont pas de propriétaire associé.
nom_jeu       prenom_proprietaire
Sonic               Patrick
Bomberman             NULL

FROM tableA A
RIGHT JOIN tableB B => TOUTES les données de la table B + les données correspondantes de la table A"
```

* LOGIQUE LEFT / RIGHT JOIN
```sql
SELECT champs
FROM table_de_gauche -- la table principale est à gauche
LEFT JOIN table_de_droite -- la table ajoutée est à droite
-- LEFT indique que c'est la table de gauche qui a la priorité
-- RIGHT indique que c'est la table de droite qui a la priorité
ON table_de_gauche.id = table_de_droite.id
```

* https://www.codeproject.com/Articles/33052/Visual-Representation-of-SQL-Joins

* En savoir plus sur les bases de données MySQL > https://openclassrooms.com/fr/courses/1959476-administrez-vos-bases-de-donnees-avec-mysql