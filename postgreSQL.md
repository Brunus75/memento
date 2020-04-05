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