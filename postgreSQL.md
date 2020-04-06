# MEMENTO POSTGRESQL

## INSTALLATION

* PostgreSQL = Postgres (prononcé postgrèce)
* Télécharger => https://www.postgresql.org/download/windows/
* D:\Programmes\PostgreSQL\12\data pour l'emplacement des données
* locale: French, France

## CONSEILS

* On utilise les 'apostrophes' et non les "guillemets" pour entourer les données
```sql
-- en détail
SELECT * FROM utilisateur WHERE prenom = 'Jesse'
```
* Chaque requête du Query Tool doit être sélectionnée pour être lancée indépendamment (sinon la Query Tool lance toutes les requêtes)
* bouton "Explain Analyze" (à droite du bouton Execute ►) pour mesurer le temps et le chemin de la requête

## UTILISATION & LEXIQUE

* Depuis raccourci Windows, taper "pgadmin"
* Ajouter le mot de passe sauvegardé
* Architecture = 
```js
Databases/
    database1/
        Schemas/
            Tables/
                Table1/
Login/Group roles/
Tablespaces/
```
* Tablespace = endroit physique où est stockée la base de données
* Schema = conteneur à l'intérieur de la BDD (sac où l'on mettra tous nos objets dedans = tables, fonctions, procédures, triggers, etc.)
* Nom du schema = public par défaut (on le retrouvera très souvent dans les requêtes)
```sql
-- exemple
DROP TABLE public.ma_table
```
* :exclamation: Voir les données = bouton "View data", à gauche des onglets de Postgres

## RESSOURCES

* Utiliser PostgreSQL selon un langage/framework > https://www.enterprisedb.com/postgres-tutorials
* PostgreSQL & Django > https://www.enterprisedb.com/postgres-tutorials/how-use-postgresql-django
* Tutoriel SQL > https://www.postgresqltutorial.com/

## CREER UNE BDD

* Databases > Create > Database
* Onglet SQL = rappel de l'opération en SQL
```sql
CREATE DATABASE formation
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    CONNECTION LIMIT = -1;
```
* Changer de nom > clic-droit sur la BDD > Properties
```sql
ALTER DATABASE formation RENAME TO formation_udemy;
```

### CREER, MODIFIER, SUPPRIMER UNE TABLE

* Solution simple = formation > Schemas > Table > clic-droit > Create > Table
* Solution SQL = ouvrir la query Tool de Postgres :small_red_triangle:
* :exclamation: Query Tool se trouve à gauche des onglets de Postgres
```sql
-- Creation d'une table simple avec une colonne

-- CREATE TABLE nom_table (nom_colonne type_colonne(limitations))
CREATE TABLE ma_table (nom varchar(200)) -- + Execute ►

-- Creation d'une table simple avec deux colonnes

CREATE TABLE ma_table2 (nom varchar(200), prenom varchar(200)) -- + Execute ►
```
* Retrouver la table > formation > Schemas > Tables
* :exclamation: clic-droit + Refresh pour actualiser (dans n'importe quel endroit)
* Modifier une table > ma_table > Properties
```sql
ALTER TABLE public.ma_table
    RENAME TO ma_table_modifiee;
```
* Voir l'architecture de ma table > ma_table > Properties
* Supprimer une table = ma_table > Delete/Drop
* Supprimer une table en SQL = ma_table > onglet SQL > récupérer le script > Query Tool
```sql
DROP TABLE public.ma_table2
```

## INTERAGIR AVEC LES DONNEES

* Insérer des données avec INSERT INTO
```sql
-- création de la table
CREATE TABLE utilisateur (nom varchar (200), prenom varchar (200))
-- insertion d'une nouvelle entrée
INSERT INTO utilisateur VALUES ('Pan', 'Peter')
--  deux lignes
INSERT INTO utilisateur VALUES ('White', 'Walter'), ('Pinkman', 'Jesse')
```
* Sélectionner les données avec SELECT et WHERE
```sql
-- en détail
SELECT * FROM utilisateur WHERE prenom = 'Jesse'
-- une colonne
SELECT prenom FROM utilisateur
-- tout
SELECT * FROM utilisateur
```
* Mettre à jour avec UPDATE
```sql
-- UPDATE une colonne
UPDATE utilisateur SET prenom='Frying' WHERE nom='Pan'
-- UPDATE deux colonnes d'une entrée
UPDATE utilisateur SET prenom='Hello', nom="World" WHERE nom='Pan'
```
* Supprimer avec DELETE FROM
```sql
INSERT INTO utilisateur VALUES ('Quidam', 'Jean')
DELETE FROM utilisateur WHERE nom='Quidam'
```

## REQUETES PLUS POUSSEES

* LIMIT, concaténation et alias de colonnes
```sql
--- Creation de la table sur lequel on va travailler sur les prochaines sections 

CREATE TABLE contact (nom varchar (200), prenom varchar (200), age int, sexe char (1), date_naissance date)

INSERT INTO contact VALUES 
('Marchand','Elisabeth',18,'F','04-08-1976'),
('Truchon','Melanie',16,'F','04-08-1978'),
('Teslu','Sandrine',17,'F','02-05-1987'),
('Portail','Bruno',23,'M','06-05-1970'),
('Virenque','Michel',22,'M','02-08-1983'),
('Dutruel','Pascal',22,'M','02-08-1983'), -- meme age que Virenque michel
('Virenque','Micheline',37,'M','02-08-1975'),
('Fournillet','Alain',22,'M','01-01-1983'),
('Faurnillet','Pascal',48,'M','12-06-1960'),
('Boutin','Ludivine',47,'F','22-01-1965'),
('Delors','Valerie',28,'M','24-09-1978'),
('Thuillier','olivier',41,'M','12-08-1976'),
('Chuillier','olivier',41,'M','12-08-1976'),
('Meilhac','Amelie',34,'F','08-05-1983'),
('Boutin','Ludivine',47,'F','22-01-1965') -- deux fois la meme valeur dans la table, c'est un doublon

--- Que donne le select ? 

SELECT * FROM contact

-- selectionner juste la premiere ligne

SELECT * FROM contact LIMIT 1

--selectionner les cinq premieres lignes

SELECT * FROM contact LIMIT 5 

-- On peut aussi le combiner avec offset, et qui va faire un saut de ligne
-- Commence à la quatrième entrée, pour 10 entrées

SELECT * FROM contact LIMIT 10 offset 3

-- Et si on veut concatener deux champs par exemple nom et prenom ? 

SELECT nom || ' ' || prenom AS nom_prenom FROM contact 
```
* L'opérateur LIKE (contient)
```sql
SELECT nom FROM contact WHERE nom='Marchand'
-- même résultat :
SELECT nom FROM contact WHERE nom LIKE 'Marchand'
-- sélectionne tous les noms qui contiennent la lettre V
SELECT nom FROM contact WHERE nom LIKE '%V%'
-- sélectionne tous les contacts dont la date de naissance contient 08
-- fais une conversion pour formater les dates en texte
SELECT * FROM contact WHERE date_naissance::text LIKE '%08%'
-- qui finit par un e
SELECT prenom FROM contact WHERE prenom LIKE '%e'
-- qui ont un a en 2e position et finissent par un e
SELECT prenom FROM contact WHERE prenom LIKE '_a%e'
-- idem avec un n en 3e position
SELECT prenom FROM contact WHERE prenom LIKE '__n%e'
```
* Les opérateurs de comparaisons et le DISTINCT
```sql
SELECT * FROM contact 

-- Je veux selectionner l'age des contacts qui ont moins de 22 ans

SELECT * FROM contact WHERE age < 22

-- Je veux selectionner l'age des contacts qui ont égal ou moins de 22 ans 

SELECT * FROM contact WHERE age <= 22

-- Je veux selectionner l'age des contacts qui sont supérieurs a 34 ans

SELECT * FROM contact WHERE age > 34

-- Je veux selectionner l'age des contacts qui sont supérieurs ou egal a 34 ans

SELECT * FROM contact WHERE age >= 34

-- Je veux selectionner l'age des contacts qui sont différents de 41 ans

SELECT * FROM contact WHERE age <> 41

-- On peut le faire aussi par cet opérateur != (ancienne façon de faire)

SELECT * FROM contact WHERE age != 41

-- le DISTINCT va enlever les doublons dans la table

-- Refaisons un select de la table contact

SELECT * FROM contact

-- Si on regarde bien j'ai deux valeurs Virenque dans ma table

SELECT nom FROM contact WHERE nom ='Virenque'

-- selectionner juste la premiere ligne

SELECT DISTINCT nom FROM contact WHERE nom ='Virenque'
```
* IN, NOT IN, IS NULL, IS NOT NULL
```sql
SELECT * FROM contact

-- Je veux le nom dutruel dans ma requete : 

SELECT * FROM contact WHERE nom IN ('Dutruel')

-- Idem je ne veux que les femmes dans ma requete

SELECT * FROM contact WHERE sexe NOT IN ('M')

--- je peux meme mettre plusieurs valeurs dans le IN et le NOT IN 

-- Je veux le nom dutruel et thuillier dans ma requete : 

SELECT * FROM contact WHERE nom IN ('Dutruel','Thuillier')

-- Je ne veux pas thuillier et dutruel dans ma requete 

SELECT * FROM contact WHERE nom  NOT IN ('Dutruel','Thuillier')

-- Insertion d'une nouvelle valeur NULL dans la table contact
-- Sur SQL une valeur nulle represente Rien, cela veut que le champ n'est pas renseigné

-- On ne renseigne pas la date d'adhésion on lui met une valeur NULL
INSERT INTO contact VALUES ('Bourgeon', 'Elodie', 43, 'F', NULL)

-- Que donne le select de la table contact

SELECT * FROM contact WHERE nom ='Bourgeon'

--- on voit bien le NULL dans la colonne date de naissance

--- Si on veut les dates de naissance qui ne soient pas nuls, c'est a dire renseigné

SELECT * FROM contact WHERE date_naissance IS NOT null

--- Et a contrario si on veut les dates de naissance qui ne sont pas renseignées

SELECT * FROM contact WHERE date_naissance IS  null
```
* Création d'une table à partir d'un SELECT
```sql
SELECT * FROM contact 

-- creation de la table a partir du SELECT (copier-coller)

CREATE TABLE contact2 AS SELECT * FROM contact
SELECT * FROM contact2

--- creation de la table a partir du SELECT sans donnée

CREATE TABLE contact3 AS SELECT * FROM contact with NO DATA
SELECT * FROM contact3
```
* Récapitulatif :
```sql
-- Que donne le select sans le distinct ? 

select age from contact

--  1 / Enlevez moi les doublons dans la colonne âge.

select distinct age from contact

-- 2 / Sélectionnez moi les dates de naissance commençant par 1976, en renommant la colonne Année_1976.

select nom,prenom,sexe,date_de_naissance as Année_1976 from contact where date_de_naissance::text like '1976%'

-- 3 / Selectionnez moi les personnes qui sont nées le 1er janvier

select * from contact where date_de_naissance::text like '%01-01%'

-- 4 / Selectionnez moi les prenoms qui finissent par la lettre E

select * from contact where prenom like '%e'

-- 5 / Une requête sortant juste les femmes(de  2 façons différentes).

select * from contact where sexe not in ('M')
-- ou 
select * from contact where sexe <> ('M')

--6 / Sélectionnez moi dans la requête les personnes qui ont 17 ans et moins de 17 ans.

select * from contact where age <= 17

-- 7 / selectionnez juste les personnes qui n'ont pas 17 ans et 48 ans

select * from contact where age  not in (17,48)

--- 8 / selectionnez moi les 7 premieres lignes de la table 

select  * from contact limit 7

--- 9 / Creez moi une nouvelle table contact_portail a partir de la table contact

create table contact_portail as select * from contact 

-- Que donne le SELECT dans la nouvelle table ? 

select * from contact_portail
```

## REQUETES PLUS PLUS POUSSEES

* Les opérateurs AND et OR
```sql
-- L’opérateur AND permet de joindre plusieurs conditions dans une requête.
-- Il s’applique au filtre WHERE.
-- La Clause AND requiert que les deux conditions soient remplies pour retourner la requête.

-- La Clause OR requiert qu’une condition soit remplie pour retourner la requête.
-- Il s’applique aussi au filtre WHERE.

-- Si je veux selectionner les hommes qui ont moins de 41 ans
SELECT * FROM contact WHERE sexe='M' AND age < 41

-- Idem je veux les personnes qui sont nées au mois d'aout et qui sont agés de plus de 16 ans
SELECT * FROM contact WHERE date_naissance::text LIKE '%08%' AND age > '16'

SELECT * FROM contact WHERE date_naissance::text LIKE '%08%' OR age = 101
-- Il me sort que les personnes qui sont nées au mois d'aout!

-- Et si je prends les personnes qui sont nées au mois d'aout ou qui ont plus de 16 ans ?
SELECT * FROM contact WHERE date_naissance::text LIKE '%08%' OR age > 16

-- Si je veux le nom Dutruel et Virenque dans la même requete ? 
SELECT * FROM contact WHERE nom ='Dutruel' AND nom ='Virenque'	
-- ca ne donne rien, car le AND ne peut pas s'appliquer sur la même colonne 
-- on partira alors sur le OR 
SELECT * FROM contact WHERE nom ='Portail' OR nom ='Virenque'
```
* ORDER BY et BETWEEN
```sql
-- Cela permet de trier les lignes dans un résultat d’une requête SQL. 
-- Il est possible de trier les données sur une ou plusieurs colonnes, par ordre ascendant ou descendant.		

-- Je veux trier les ages du plus petit au plus grand 
SELECT * FROM contact ORDER BY age ASC

-- Et du plus grand au plus petit
SELECT * FROM contact ORDER BY age DESC

 -- Si je veux trier par nom ? 
SELECT * FROM contact ORDER BY nom DESC

 -- Si je veux trier juste par l'année de la date de naissance ? 
SELECT * FROM contact ORDER BY date_naissance 
 -- c'est l'ascendant qui est par defaut sur SQL

 -- Et si j'essaye de facon descendante (du plus grand au plus petit)
SELECT * FROM contact ORDER BY date_naissance DESC

-- BETWEEN 
-- L’opérateur BETWEEN est utilisé dans une requête SQL pour sélectionner un intervalle de données dans une requête utilisant WHERE.

SELECT * FROM contact WHERE age BETWEEN 16 AND 33 ORDER BY age ASC

-- cela marche avec le NOT 
SELECT * FROM contact WHERE age NOT BETWEEN 16 AND 33 ORDER BY age ASC
```
* OVERLAPS et Generate_Series
```sql
-- 2 fonctions disponibles seulement sur Postgres
-- OVERLAPS est une fonction tres utile qui permet de voir que deux dates se chevauchent 
-- Overlaps veut dire chevauchement en anglais

SELECT
	('2019-02-10'::date, '2019-02-15'::date)
OVERLAPS 
	('2019-02-16'::date, '2019-02-18'::date)
-- renvoie "false"

-- Generate series permet de generer des series a la volée :  

SELECT * FROM generate_series(2,4)
-- 2, 3, 4

-- Dans l'autre sens : 
SELECT * FROM generate_series(5,1,-2)
-- 5, 3, 1
-- -2 est le pas

-- On peut le generer aussi pour des dates :
SELECT * FROM generate_series ('2019-10-10'::timestamp,'2019-10-11'::timestamp,'1 hour')
-- pas de 1 heure, de temps1 à temps2
```
* Les agrégats MIN, MAX et AVG
```sql
SELECT * FROM contact ORDER BY age

-- Si je veux selectionner l'age minimum dans la colonne age
SELECT  MIN(age) FROM contact 

--Si je veux selectionner l'age maximum  dans la colonne age
SELECT  MAX(age) FROM contact 

--Si je veux selectionner l'age moyen  dans la colonne age
SELECT  AVG(age) FROM contact 

-- Si je veux selectionner l'age minimum des gens qui sont nés en 1976 ? 
SELECT MIN(age) FROM contact WHERE date_naissance::text LIKE '1976%'
--Verifions par nous meme :
SELECT * FROM contact WHERE date_naissance::text LIKE '1976%'

-- une demande un peu farfelue :
-- Je veux le max de l'age de toutes les personnes qui commencent par la lettre E ?
SELECT MAX(age) FROM contact WHERE prenom LIKE 'E%'
-- Verifions par nous meme :
SELECT * FROM contact WHERE prenom LIKE 'E%'

--Peut on appliquer ca a une colonne ou il y a des caracteres comme la colonne nom par exemple
SELECT MAX(nom) FROM contact
-- donne le dernier nom par ordre alphabétique

-- Et le Min ? 
SELECT MIN(nom) FROM contact 
-- Il prend la premiere lettre par ordre alphabétique donc le B
```
* Les agrégats COUNT, SUM, et GROUP BY
```sql
-- COUNT
-- compter le nombre de lignes
SELECT COUNT(*) FROM contact -- 16
SELECT COUNT(nom) FROM contact -- 16
SELECT COUNT(*) FROM contact WHERE date_naissance IS NOT null -- 15

SELECT * FROM contact ORDER BY prenom -- 16 entrées
-- on enlève les doublons
SELECT COUNT(DISTINCT prenom) FROM contact -- 13

-- SUM ne s'applique que sur des colonnes de type numérique
SELECT SUM(age) FROM contact -- 506
-- pour la première ligne
SELECT SUM(1) FROM contact -- 16
-- les 7 premières lignes
SELECT SUM(7) FROM contact -- 112
-- l'âge total des femmes
SELECT SUM(age) FROM contact WHERE sexe = 'F' -- 222

-- GROUP BY : regrouper des données
-- compter le nombre d'hommes (dans la colonne total)
SELECT COUNT(*) AS total FROM contact WHERE sexe = 'M'
-- les hommes qui sont nés en 1976
SELECT COUNT(*) AS total, sexe, date_naissance FROM contact
WHERE sexe = 'M' AND date_naissance::text LIKE '1976%'
GROUP BY sexe, date_naissance -- obligatoire pour regrouper les données
-- résultat : 2
-- vérification
SELECT * FROM contact WHERE sexe = 'M' AND date_naissance::text LIKE '1976%'
-- 2 entrées
```
* HAVING, le WHERE avec SUM
```sql
SELECT COUNT(*) AS total, sexe, age FROM contact
WHERE sexe = 'M' AND age BETWEEN 20 AND 25
GROUP BY sexe, age
-- 3 de 22 ans, 1 de 23 ans

-- si je veux les totaux supérieurs à 2
SELECT COUNT(*) AS total, sexe, age FROM contact
WHERE sexe = 'M' AND age BETWEEN 20 AND 25
GROUP BY sexe, age
HAVING COUNT(*) > 2 -- HAVING toujours après GROUP BY !
-- total 3 de 22 ans

-- avec SUM
SELECT COUNT(*) AS total, sexe, age FROM contact
WHERE sexe = 'M' AND age BETWEEN 20 AND 25
GROUP BY sexe, age
HAVING SUM(1) > 2
-- total 3 de 22 ans
```
* Le CASE WHEN
```sql
-- évalue une liste de conditions et retourne une expression de résultat parmi plusieurs possibilités

-- dans l'exemple on va dire que dans la colonne sexe les F sont des Mme 
-- et que les H sont des Mr
SELECT  *, 
	CASE WHEN sexe ='F' THEN 'Mme'
		WHEN sexe ='M' THEN 'Mr'
	END
FROM Contact
-- crée une colonne case

-- on peut mettre plusieurs CASE WHEN dans la requete et aussi rajouter un ELSE 
SELECT *,
	CASE WHEN age BETWEEN 16 AND 20 THEN 'vive la jeunesse' 
		ELSE 'on a plus 20 ans :)'
	END
FROM Contact
```
* UNION, UNION ALL, IF/ELSE
```sql
-- commande qui permet de concaténer les résultats de 2 requêtes ou plus
-- Il faut par contre que chacune des requetes a concatener retourne le meme nombre de colonnes.

-- exemple de deux tables, on va creer une autre table contact 
CREATE TABLE client_1 (nom varchar(20), prenom varchar(20), age int)
INSERT INTO client_1 VALUES 
('Marchand','Elisabeth','18'),
('Truchon','Melanie','18')

CREATE TABLE client_2 (nom varchar(20), prenom varchar(20), age int)
INSERT INTO client_2 VALUES 
('Marchand','Elisabeth','18'), -- en doublon
('Thuillier','olivier','18') 

-- UNION 
SELECT * FROM client_1
UNION 
SELECT * FROM client_2
-- Concatenation des deux requetes en enlevant le doublon de Mme Marchand

-- à l'inverse UNION ALL prend les doublons
SELECT * FROM client_1
UNION ALL
SELECT * FROM client_2


-- L' IF THEN ELSE instruction exécute une commande lorsque la condition est vraie et elle exécute une commande 
-- alternative lorsque la condition est fausse. Ce qui suit illustre la syntaxe de l' IF THEN ELSE instruction:

DO $$
DECLARE
  a integer := 10;
  b integer := 20;
BEGIN 
   IF a > b THEN 
      RAISE NOTICE 'a is greater than b';
   ELSE
      RAISE NOTICE 'a is not greater than b';
   END IF;
END $$;
```
* UPSERT
```sql
-- lorsque vous insérez une nouvelle ligne dans la table, PostgreSQL met à jour la ligne si elle existe déjà, 
-- sinon, PostgreSQL insère la nouvelle ligne. C'est pourquoi nous appelons l'action UPSERT (mise à jour ou insertion)

-- Creation d'une table 
CREATE TABLE customers (
   customer_id serial PRIMARY KEY,
   name VARCHAR UNIQUE,
   email VARCHAR NOT NULL,
   active bool NOT NULL DEFAULT TRUE
);

--Insertion de nouvelles lignes
INSERT INTO customers (NAME, email)
VALUES
   ('IBM', 'contact@ibm.com'),
   (
      'Microsoft',
      'contact@microsoft.com'
   ),
   (
      'Intel',
      'contact@intel.com'
   );
   
-- Insertion de nouvelles 
INSERT INTO customers (NAME, email)
VALUES
   (
      'Microsoft',
      'hotline@microsoft.com'
   ) 
ON CONFLICT ON CONSTRAINT customers_name_key -- Conflit de contrainte on ne fait rien
DO NOTHING;

SELECT * FROM customers
-- Pas d'insertion
   
-- Par contre on peut lui affilier un UPDATE en cas de conflit 
INSERT INTO customers (name, email)
VALUES
   (
      'Microsoft',
      'TITI@microsoft.com'
   ) 
ON CONFLICT (name) 
DO
UPDATE
     SET email = EXCLUDED.email
	 
-- Que donne le SELECT ? 
SELECT * FROM customers -- la case email de Microsoft a changé	 
   
-- On peut rajouter aussi une autre adresse email a l'interieur
INSERT INTO customers (name, email)
VALUES
   (
      'Microsoft',
      'hotline@microsoft.com'
   ) 
ON CONFLICT (name) 
DO
     UPDATE
     SET email = EXCLUDED.email || ';' || customers.email;
	 -- ajoute le nouveau mail à l'original
   
  
SELECT * FROM customers
```
* Récapitulatif :
```sql
select * from contact

-- nombre de personne dont le prénom est Ludivine

select count(*) as Total from contact where prenom = 'Ludivine'

-- somme de femmes qui sont nées en 1983

select sum(1) from contact where date_naissance::text like '1983%'

-- nombre de femmes qui ont entre 20 et 45 ans dont le nombre est supérieur à 1 en classant l'age par ordre décroissant.
  
select count(*) sexe, age from contact 
where age between 20 and 45 
group by sexe, age
having count(*) > 1 
order by age desc
-- 2 de 41 ans, 3 de 22 ans

-- comptez les lignes distinctes dans la colonne sexe

select count(distinct sexe) from contact -- 2

-- selectionnez les personnes qui n'ont pas entre 20 et 27 ans

select * from contact where age not between 20 and 27 

-- comptez les personnes qui ont la lettre A dans leur prénom, qui ont entre 18 et 40 ans, de sexe masculin et dont le total est supérieur a 1

select count(*), age, sexe from contact 
where prenom like '%a%' and age between 18 and 40 and sexe ='M'
group by age, sexe
having count (*) > 1

-- construisez une requête avec comme résultat, les personnes qui ont moins 20 ans qu’ils ont toute la vie devant eux. (CASE WHEN). 

select  *, 
	case when age < 20 then 'Vous avez toute la vie devant vous ' 
	end  
from contact
```

## LES FONCTIONS DE TYPE CHAINE DE CARACTERES

* LENGTH, REPLACE, SUBSTRING
```sql
-- Remplace toutes les occurrences d'une valeur de type chaine specifiee par une autre valeur de type chaine.

-- REPLACE (string_expression, string_pattern , string_replacement)  

-- Un exemple tout simple 
SELECT REPLACE('salut a vous', 'salut', 'Bonjour')

-- remplacer Sandrine par Tata sandrine
SELECT prenom, REPLACE(prenom, 'Sandrine', 'Tata_sandrine') FROM Contact
-- crée une colonne replace avec Tata_sandrine

-- LENGHT Retourne le nombre de caracteres de l'expression de type chaine specifiee

SELECT prenom, LENGTH(prenom) AS longueur FROM Contact
-- prenom    | longueur
-- Elisabeth | 9

-- SUBSTRING permet d'extraire une chaine de caractere a partir de la longueur specifiee
-- SUBSTRING(prenom, 2, 4) va commencer aux deux premiers caracteres et va s'arreter au 4eme caractere

-- si on juste juste les prenoms comme initiale 

SELECT SUBSTRING(prenom, 1, 1) AS initiale, prenom FROM contact

-- Et si on veut les deux premieres lettres du prenoms et les trois suivantes ? 

SELECT SUBSTRING(prenom, 2, 3) AS initiale, prenom FROM contact
-- Elisabeth => lis
```
* OVERLAY, POSITION, REVERSE
```sql
-- La fonction  OVERLAY (couvrir/recouvrir) est utilisee pour remplacer un texte ou une chaine, par un 
-- autre texte ou sous chaine 

SELECT OVERLAY('w1234567rce' PLACING 'resou' FROM 3)
-- w1resou7rce
-- On part du 3eme caractere et on le remplacer par Resou

SELECT OVERLAY('w1234567rce' PLACING 'resou' FROM 3 FOR 6)
-- On part du 3eme caractere(inclus), et on remplace  les 6 prochains caracteres par resou
-- w1resource


-- La fonction de POSITION PostgreSQL est utilisee pour trouver l'emplacement d'une sous-chaine dans une chaine specifiee

SELECT POSITION('our' in 'w3resource') -- 6

-- Et si on cherchait la position de la lettre A dans notre table ? 
SELECT prenom,
POSITION('a' IN prenom)
FROM contact
-- Elisabeth 5

-- REVERSE inverse la chaine de caractere
SELECT reverse('w3resource')
```
* TRIM, LTRIM, RTRIM, UPPER, LOWER
```sql

-- Supprime le caractère spécifié au début ou à la fin d’une chaîne
--- a gauche 
SELECT LTRIM('entreprise','e') -- ntreprise
--- a droite
SELECT RTRIM('entreprise','e') -- entrepris
--- des deux cotés
SELECT BTRIM('entreprise','e') -- ntrepris
-- Ou 
SELECT BTRIM('xyxtrimyyx', 'xy') -- trim

/*******************************************************************************
********************** UPPER LOWER      ***************************************
********************************************************************************/

-- permet de transformer un texte en minuscule et en MAJUSCULE
-- mettons la colonne nom en Majuscule : 
SELECT UPPER(nom) FROM contact
-- et en minuscule 
SELECT LOWER(nom) FROM contact
```
* SPLIT_PART, TRANSLATE, CONCAT
```sql
-- Va chercher la valeur dans le tableau proposé: 

SELECT SPLIT_PART('A,B,C', ',', 2) -- B

-- CONCAT va concatener une chaine de caractere 

SELECT concat('w', 3, 'r', 'esource', '.', 'com') -- w3resource.com

-- La fonction translate () de PostgreSQL est utilisée pour traduire n'importe quel caractère de la chaîne par un caractère dans replace_string

SELECT TRANSLATE('translate', 'rnlt', '123')
-- TRANSLATE('mot_a_traduire', 'clé1clé2clé3', 'valeur1valeur2valeur3')
-- https://w3resource.com/PostgreSQL/translate-function.php
```

## LES JOINTURES

* Cheatsheet > https://www.codeproject.com/KB/database/Visual_SQL_Joins/Visual_SQL_JOINS_orig.jpg
* INNER JOIN
```sql
-- INNER JOIN
-- jointure interne qui retourne les données quand la condition est vraie dans les 2 tables
-- synthaxe
SELECT A.IDClient FROM commande A -- A est un alias de la table commande
INNER JOIN client B -- jointure interne avec B, alias de la table client
ON A.IDClient = B.IDClient -- lien

-- creation de deux tables
CREATE TABLE commande (Numerodecommande int, IDclient int)
CREATE TABLE client (nom varchar (200), prenom varchar (200), IDclient int, adresse varchar(2000), ville varchar(200))

-- Insertion de valeur dans les tables
INSERT INTO commande(Numerodecommande, IDclient) VALUES 
('3712',1),
('4851',2),
('6712',3),
('3215',4),
('3218',5),
('3220',6),
('3221',7),
('3227',8),
('3238',9)

INSERT INTO client(nom, prenom, IDclient, adresse, ville) VALUES 
('Thuillier','Olivier',1,'7 Rue poirier','Dreux'),
('Thuillier','Luc',3,'78 avenue de paris','Paris'),
('Thuillier','Théodore',5,'15 Rue asterdam','Asterdam'),
('Thuillier','Zinédine',12,'7 Rue Prague','Prague'),
('Thuillier','Lucas',13,'7 Rue Vienne','Vienne')

SELECT* FROM commande
SELECT* FROM client

-- les clients (id) qui ont un numéro de commande
SELECT A.IDClient FROM commande A -- A est un alias de commande
INNER JOIN client B -- jointure interne avec B, alias declient
ON A.IDClient = B.IDClient -- lien
-- 1, 3, 5

-- avec le nom et prenom des personnes 
SELECT A.IDclient, B.nom, B.prenom FROM commande A
INNER JOIN client B 
ON A.IDclient = B.IDclient
 
-- le INNER Join est complétement facultatif...
SELECT A.IDclient, B.nom, B.prenom FROM commande A
JOIN client B 
ON A.IDclient = B.IDclient
```
* LEFT JOIN, RIGHT JOIN
```sql
-- LEFT JOIN
-- prend toutes les valeurs de la table de gauche, avec la valeurs correspondantes de la table droite
-- avec le filtre IS NULL, on va juste ramener les lignes de la table de gauche
-- et qui n'ont aucune correspondance avec la table de doite (flitre excluant)
-- RIGHT JOIN
-- prend toutes les valeurs de la table de droite, avec la valeurs correspondantes de la table gauche
-- avec le filtre IS NULL, on va juste ramener les lignes de la table de droite
-- et qui n'ont aucune correspondance avec la table de gauche (flitre excluant)
FROM tableA A
LEFT JOIN tableB B -- TOUTES les données de la table A + les données correspondantes de la table B

FROM tableA A
RIGHT JOIN tableB B -- TOUTES les données de la table B + les données correspondantes de la table A

SELECT * FROM commande
SELECT * FROM client

-- Quel client n'est pas rattaché a un IDCLIENT dans la table commande ? 
SELECT B.IDclient, B.nom, B.prenom FROM client B
LEFT JOIN commande A
on A.IDclient = B.IDclient
-- ne marche pas
-- avec le filtre IS NULL pour ramener que les valeurs qui ne correspondent qu'a la table de gauche 
SELECT B.IDclient, B.nom, B.prenom FROM client B
LEFT JOIN commande A
on A.IDclient = B.IDclient
WHERE A.IDclient IS NULL
-- ça fontionne

-- On voit parfois la valeur OUTER qui est facultatif (même résultat)
SELECT B.IDclient, B.nom, B.prenom FROM client B
LEFT OUTER JOIN commande A
on A.IDclient = B.IDclient
WHERE A.IDclient IS NULL

-- la meme operation avec le RIGHT JOIN en inversant les tables
SELECT B.IDclient, B.nom, B.prenom FROM commande A
RIGHT JOIN client B
ON A.IDclient = B.IDclient
WHERE A.IDclient is NULL
```
* FULL OUTER JOIN
```sql
-- but : combiner les résultats des 2 tables
-- les associer grâce à une condition
-- remplir avec NULL si la condition n'est pas respectée
-- combine tout
-- si IS NULL, ne ramène que les valeurs qui n'ont pas de correspondance

SELECT A.IDclient, B.IDclient FROM commande A
FULL OUTER JOIN client B
ON A.IDclient = B.IDclient
-- idclient | idclient
--        1 | 1
--        2 | [null]
-- 	 [null] | 12

SELECT * FROM commande
SELECT * FROM client

-- On voit qu'il y a toutes les lignes de la table commande qui sont ramenés de 1 a 9 
-- On voit les 2 NULL en bas car 12 et 13 n'est pas reference dans la table commande (valeur 12 et 13)
-- On voit qu'il y a toutes les lignes de la table client (1,3,5,12,13)
-- On voit les 5 NULL qui correspondent a la table commande (2,4,6,8,9)

-- rajouter le IS NULL pour le filtre
SELECT A.IDclient, B.IDclient FROM commande A
FULL OUTER JOIN client B
ON A.IDclient = B.IDclient
WHERE B.IDclient IS NULL
-- ramène toutes les valeurs de la table A (commande)
-- et celles de la table B (client)
-- exceptées celles qui concordent 
-- (ramène les commandes des clients non repertoriés)
-- ramène tous les idclient de la table client qui sont null
-- ex. => idclient commande 2
-- idclient commande | idclient client
--                 1 | 1
--                 2 | [null]
-- 	        [null] | 12

-- OUTER est facultatif
```
* CROSS JOIN
```sql
-- CROSS JOIN = Jointure croisée
-- pour 2 tables, cela va associer les lignes de la 1ère table à la 2ème

SELECT * FROM commande
SELECT * FROM client

-- il y a comme colonne en commum l'IDclient

SELECT * FROM commande A
CROSS JOIN client B
-- On voit qu'il y a 45 lignes, 9 lignes dans la table commande et 5 lignes dans la table client
-- donc 9*5 = 45 lignes
-- on a associé chaque client d'une commande à tous les clients
-- on voit qu'en faisant un select * de la table commande que Thuillier olivier est multiplié sur sur les 9 premieres lignes de la table client

-- Et si on change l'ordre de jointure ? 
SELECT * FROM client B
CROSS JOIN commande A
-- On voit qu'il y a 45 lignes, 9 lignes dans la table commande et 5 lignes dans la table client
-- donc 9*5 = lignes
```
* JOINTURES SUR PLUSIEURS TABLES
```sql
-- Créons un troisiéme table
CREATE TABLE carte_fidelite (fidele char(3), idclient int)

-- Et insérons quelques valeurs
INSERT INTO carte_fidelite(fidele, idclient) VALUES 
('OUI', 1),
('OUI', 2),
('NON', 3),
('OUI', 4),
('NON', 5),
('OUI', 6),
('NON', 7),
('OUI', 8),
('OUI', 9),
('NON', 10),
('OUI', 11),
('NON', 12)

-- sélectionner les clients qui ont un numéro de commande
-- mais aussi qui ont une carte de fidélité 
SELECT A.IDclient FROM commande A
INNER JOIN client B 
ON B.IDclient = A.IDclient
INNER JOIN carte_fidelite C
ON B.IDclient = C.IDCLIENT
WHERE C.fidele = 'OUI'
-- id 1
```
* LEFT JOIN VS NOT IN VS NOT EXISTS
```sql
-- Quel client n'est pas rattaché a un IDCLIENT dans la table commande? 
SELECT * FROM commande
SELECT * FROM client

SELECT B.IDclient, B.nom, B.prenom FROM client B
LEFT JOIN commande A
ON A.IDclient = B.IDclient
WHERE A.IDclient IS NULL


-- Que donne le resultat en NOT IN ? (méthode ancienne) 
SELECT idclient, nom, prenom 
FROM client 
WHERE idclient NOT IN (SELECT idclient 
					   FROM commande
					  )

-- Que donne le resultat en NOT EXISTS ? (méthode très ancienne)
SELECT B.IDclient, B.nom, B.prenom 
FROM client B
WHERE NOT EXISTS (	SELECT *
					FROM commande A 
					WHERE B.IDclient = A.IDCLIENT
				 )
```
* INTERSECT et EXECPT
```sql
----- INNER JOIN

SELECT A.numerodecommande, A.idclient, B.prenom, B.nom FROM commande A
INNER JOIN client B
ON A.idclient = B.idclient
--- idclient : 1, 3, 5

------- INTERSECT = JOINTURE INTERNE (INNER JOIN)
SELECT idclient   
FROM commande  
INTERSECT  
SELECT idclient  
FROM client
ORDER BY idclient
--- même résultat : idclient : 1, 3, 5

------- EXCEPT = LEFT JOIN
SELECT idclient   
FROM client  
EXCEPT  
SELECT idclient  
FROM commande
ORDER BY idclient

-- équivalent en NOT IN
SELECT idclient, nom, prenom  
FROM client 
WHERE idclient NOT IN (SELECT idclient FROM  commande)
```