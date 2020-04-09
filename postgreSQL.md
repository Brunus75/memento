# MEMENTO POSTGRESQL

## INSTALLATION

* PostgreSQL = Postgres (prononcé postgrèce)
* Télécharger => https://www.postgresql.org/download/windows/
* D:\Programmes\PostgreSQL\12\data pour l'emplacement des données
* locale: French, France

## SQL

* Différence DELETE / TRUNCATE
```
DROP and TRUNCATE are DDL commands, whereas DELETE is a DML command. Therefore DELETE operations can be rolled back (undone), while DROP and TRUNCATE operations cannot be rolled back. TRUNCATE can be rolled back if wrapped in a transaction

+----------------------------------------+----------------------------------------------+
|                Truncate                |                    Delete                    |
+----------------------------------------+----------------------------------------------+
| We can't Rollback after performing     | We can Rollback after delete.                |
| Truncate.                              |                                              |
|                                        |                                              |
| Example:                               | Example:                                     |
| BEGIN TRAN                             | BEGIN TRAN                                   |
| TRUNCATE TABLE tranTest                | DELETE FROM tranTest                         |
| SELECT * FROM tranTest                 | SELECT * FROM tranTest                       |
| ROLLBACK                               | ROLLBACK                                     |
| SELECT * FROM tranTest                 | SELECT * FROM tranTest                       |
+----------------------------------------+----------------------------------------------+
| Truncate reset identity of table.      | Delete does not reset identity of table.     |
+----------------------------------------+----------------------------------------------+
| It locks the entire table.             | It locks the table row.                      |
+----------------------------------------+----------------------------------------------+
| Its DDL(Data Definition Language)      | Its DML(Data Manipulation Language)          |
| command.                               | command.                                     |
+----------------------------------------+----------------------------------------------+
| We can't use WHERE clause with it.     | We can use WHERE to filter data to delete.   |
+----------------------------------------+----------------------------------------------+
| Trigger is not fired while truncate.   | Trigger is fired.                            |
+----------------------------------------+----------------------------------------------+
| Syntax :                               | Syntax :                                     |
| 1) TRUNCATE TABLE table_name           | 1) DELETE FROM table_name                    |
|                                        | 2) DELETE FROM table_name WHERE              |
|                                        |    example_column_id IN (1,2,3)              |
+----------------------------------------+----------------------------------------------+
```

## CONSEILS

* Ouvrir la page pgAdmin n'importe où = clic-droit sur l'icône pgAdmin > Copy server URL
* Database Superuser = postgres (équivalent de root sur MySQL)
* SQL = Structured Query Language
* On utilise les 'apostrophes' et non les "guillemets" pour entourer les données
```sql
-- en détail
SELECT * FROM utilisateur WHERE prenom = 'Jesse'
```
* VARCHAR = Character Varying (varchar est l'alias)
```sql
            "Name"           |           "Alias"
character varying [ (n) ] 	         varchar [ (n) ]
```
* 'fait référence à un string' (apostrophe, single quote)
* 'permet d''écrire un apostrophe dans un string'
* "fait référence à un nom dans la base de donnée (base de donnée, table, colonne)" (quotation marks, double quote) - permet aussi d'utiliser des noms réservés, et de mettre des majuscules dans les noms de tables et de colonnes
* Exemple : 
```sql
INSERT INTO exemple ("name", "email") VALUES ('Mary Brown', 'mary@brown.com')
INSERT INTO exemple ("name", "email") VALUES ('Vana''ima', 'vaima@brown.com')
-- Vana'ima

SELECT index -- invalid, reserved name
FROM YourTable -- invalid, capital letters

-- And this is valid:
SELECT "index"
FROM "YourTable"
```
* Les types de données de Postgres > https://www.postgresql.org/docs/9.5/datatype.html
* Chaque requête du Query Tool doit être sélectionnée pour être lancée indépendamment (sinon la Query Tool lance toutes les requêtes)
* bouton "Explain Analyze" (à droite du bouton Execute ►) pour mesurer le temps et le chemin de la requête
* DON'T DO THIS > https://wiki.postgresql.org/wiki/Don%27t_Do_This
```
- Don't use NOT IN
- Don't use UPPER CASE table or column names
(Don't use NamesLikeThis, use names_like_this)
PostgreSQL folds all names - of tables, columns, functions and everything else - to lower case unless they're "double quoted"
- Don't use BETWEEN (especially with timestamps)
BETWEEN is safe for discrete quantities like integers or dates, as long as you remember that both ends of the range are included in the result. But it's a bad habit to get into
SELECT * FROM blah WHERE timestampcol BETWEEN '2018-06-01' AND '2018-06-08'
Instead, do:
SELECT * FROM blah WHERE timestampcol >= '2018-06-01' AND timestampcol < '2018-06-08'
- Don't use timestamp (without time zone) (use timestamptz (also known as timestamp with time zone) instead)
- Don't use timestamp (without time zone) to store UTC times (Use timestamp with time zone instead)
- Don't use the timetz type. You probably want timestamptz instead
- Don't use timestamp(0) or timestamptz(0). Use date_trunc('second', blah) instead.
- Don't use the type char(n). You probably want text.
- Don't use char(n) even for fixed-length identifiers. Use text, or a domain over text, with CHECK(length(VALUE)=3) or CHECK(VALUE ~ '^[[:alpha:]]{3}$') or similar. char(n) doesn't reject values that are too short, it just silently pads them with spaces
(!) There is no performance benefit whatsoever to using char(n) over varchar(n)
- Don't use the type varchar(n) by default. Consider varchar (without the length limit) or text instead
- Don't use money. Numeric, or (rarely) integer may be better.
- Don't use serial. For new applications, identity columns should be used instead (Bizarrement, Postgres utilise SERIAL, donc à constraster)
- Don't use trust authentication over TCP/IP (host, hostssl)   
```
* Best practices > http://www.jancarloviray.com/blog/postgres-quick-start-and-best-practices/
```sql
-- Text
'Use' TEXT 'and avoid' VARCHAR 'or' CHAR 'and especially' VARCHAR(n) 'unless you specifically want to have a hard limit. Read this. Performance wise, TEXT is faster'.
-- Numbers
INT 'is a typical choice for integers. There are more choices here if needed for your use case.'
```

## UTILISATION & LEXIQUE

* En ligne de commande, avec SQL Shell
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
* Intro To PostgreSQL Databases With PgAdmin For Beginners > https://www.youtube.com/watch?v=Dd2ej-QKrWY
* How to Insert Data Into A PostgreSQL Table > https://kb.objectrocket.com/postgresql/how-to-insert-data-into-a-postgresql-table-746

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

## IMPORT/EXPORT DE LA BDD

* Import = créer une BDD > clic-droit > Restore
* Export = clic-droit sur la table > Backup
* https://www.windows8facile.fr/postgresql-importer-exporter-base-pgadmin/

### CREER, MODIFIER, SUPPRIMER UNE TABLE

* Solution simple = formation > Schemas > Table > clic-droit > Create > Table
```sql
-- exemple
Name      |        Data Type     |     Length/Precision      | Scale | Not NULL ? | Primary Key ?
id                   serial                                               Yes           Yes
name      character varying (Postgres VARCHAR)

CREATE TABLE public.exemple
(
    id serial NOT NULL,
    PRIMARY KEY (id)
);

ALTER TABLE public.exemple
    OWNER to postgres;
```
* Voir le contenu de la table = formation > Schemas > Tables > ma_table > clic-droit > View/Edit Data > All Rows
* Créer une colonne = formation > Schemas > Tables > ma_table > Columns > clic-droit > Create > Column
```sql
Name      |        Data Type     |     Length/Precision      | Scale | Not NULL ? | Primary Key ?
name           character varying             255

ALTER TABLE public.exemple
    ADD COLUMN name character varying(255);
```
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

* Insérer des données à la main : ma_table > Edit/View > remplir les cases > Save Data Changes (haut à droite de la Query Tool)
* Insérer des données avec INSERT INTO
```sql
-- création de la table
CREATE TABLE utilisateur (nom varchar (200), prenom varchar (200))
-- insertion d'une nouvelle entrée
INSERT INTO exemple ("name", "email") VALUES ('Mary Brown', 'mary@brown.com') -- champs précisés
INSERT INTO utilisateur VALUES ('Pan', 'Peter') -- tous les champs
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
-- avec un pseudo
SELECT name "customer names" FROM exemple -- la colonne name est renommée "customer names" 
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
SELECT nom FROM contact WHERE nom='Marchand' -- contient exactement
-- même résultat :
SELECT nom FROM contact WHERE nom LIKE 'Marchand'
-- sélectionne tous les noms qui contiennent la lettre V
SELECT nom FROM contact WHERE nom LIKE '%V%' -- contient au moins
-- sélectionne tous les contacts dont la date de naissance contient 08
-- fais une conversion pour formater les dates en texte
-- % veut dire "tout"
-- % est sensible à la casse
-- %mot% va chercher tout + le mot + tout
SELECT * FROM exemple WHERE email LIKE '%@%' -- renvoie tout, car tous les emails ont un @
SELECT * FROM contact WHERE date_naissance::text LIKE '%08%'
-- qui finit par un e
SELECT prenom FROM contact WHERE prenom LIKE '%e'
-- qui commence par un e
SELECT prenom FROM contact WHERE prenom LIKE 'e%'
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

## LES FONCTIONS DE PARTITIONNEMENT

* Les fonctions de fenêtrage
* Une fonction de fenêtrage fonctionne sur un ensemble de lignes, qui a toujours la clause OVER
* La clause OVER = un ensemble de lignes spécifié par l'utilisateur dans un jeu de résultats de requête
* OVER (sélection ordonnée) = par-dessus la sélection ordonnée
* OVER se fait sur une liste ordonnée par un ORDER BY
* Les fonctions de fenêtrage apparaissent dans le SELECT et ORDER BY
* Elles n'apparaissent pas dans FROM, WHERE, GROUP BY, HAVING
* La clause OVER et PARTITION BY
```sql
SELECT * FROM contact -- 3 personnes ont 22, 2 ont 41, 2 ont 47
-- comment les numéroter ?
SELECT * , ROW_NUMBER () OVER (ORDER BY AGE) AS rownumber FROM contact
-- ORDER BY définit sur quoi le classement se base pour classer
-- on attribut un classement par age
-- compte les lignes sur la colonne age triée
-- on peut inverser le tri avec DESC
SELECT * , ROW_NUMBER () OVER (ORDER BY AGE DESC) AS rownumber FROM contact

--  avec le PARTITION BY
SELECT * , ROW_NUMBER () OVER (PARTITION BY age ORDER BY age) FROM contact
-- partitionne la requête sur la colonne age
-- résultat : 1, 2, 3, pour utilisateur de 22 ans (1), utilisateur de 22 ans (2), 
-- utilisateur de 22 ans (3)
-- pour les valeurs uniques => on attribue 1
-- pour les valeurs multiples (n fois) => on attribue 1, 2, n
-- partitionner : diviser la table en groupes distinct,
-- avec les critères de sélecton à l'intérieur de chaque groupe

-- avec plusieurs colonnes :
SELECT * , 
	ROW_NUMBER () OVER (PARTITION BY age, date_naissance ORDER BY age)
FROM contact
-- partitionne les utilisateurs qui ont en commun age ET date de naissance
```
* RANK, DENSE RAN, NTILE
```sql
-- creation d'une table
CREATE TABLE ranks (
   c VARCHAR(10)
);

-- Insertion de valeurs
INSERT INTO ranks(c)
VALUES('A'),('A'),('B'),('B'),('B'),('C'),('E');

-- Essayons le RANK 
SELECT c,
	RANK () OVER (ORDER BY c) rank_number 
FROM ranks
-- A, A => rank_number de 1 (1ère place et même valeur)
-- B, B, B => rank_number de 3 (car la lettre B démarre à la troisième place)
-- C => rank_number de 6 (il arrive à la sixième place, derrière les A et les B)

-- DENSE_RANK : 
SELECT c,
	DENSE_RANK () OVER (ORDER BY c) as dense_number
FROM ranks
-- DENSE RANK ne compte pas le nombre de références
-- A, A => rank_number de 1 (1ère place et même valeur)
-- B, B, B => rank_number de 2 (car la lettre B est à la 2ème place)
-- C => rank_number de 3 (3ème place)

-- NTILE DECOUPE EN X GROUPES LES RESULTATS
SELECT c,
	NTILE (4) OVER (ORDER BY c) as NTILES
FROM ranks
-- ici découpe le résultat en 4
-- 7 résultats découpés en 4
-- A, A => 1
-- B, B => 2
-- B, C => 3
-- D => 4
```
* ROWS RANGE UNBOUNDED PRECEDING, FIRST VALUES, LAST VALUES
```sql
-- UNBOUNDED PRECEDING, toutes les lignes avant la ligne actuelle
-- UNBOUNDED FOLLOWING, toutes les lignes apres la ligne actuelle
-- x PRECEDING les lignes avant la ligne actuelle
-- y FOLLOWING les lignes apres les lignes actuelles

CREATE TABLE salaire (group_id int, salaire int);

INSERT INTO salaire VALUES 
(1,126),
(2,63),
(3,43),
(4,9),
(4,24),
(4,30),
(7,33),
(8,33),
(9,50),
(10,41),
(11,41),
(11,42)

-- chaque salaire appartient à un group_id numéroté
SELECT group_id, salaire,
	SUM(salaire) OVER (ORDER BY group_id ROWS UNBOUNDED PRECEDING) AS CumulativeSumByRows,
	-- cumule les salaires de la ligne précédente
	SUM(salaire) OVER (ORDER BY group_id RANGE UNBOUNDED PRECEDING) AS CumulativeSumByRange
	-- cumule les salaires du groupe précédent (cumul des salaires des group_id)
FROM salaire

/*******************************************************************************
***********************     FIRST et LASTE VALUES      ************************
********************************************************************************/

-- FIRST_VALUES : Retourne la premiere valeur dans un jeu de valeurs ordonnee
-- LAST_VALUES : Retourne la derniere valeur dans un jeu de valeurs ordonnee

SELECT group_id, salaire,
	FIRST_VALUE(salaire) OVER (PARTITION BY group_id ORDER BY group_id) AS FirstOrderTotal,
	-- retourne le premier salaire du group_id
	LAST_VALUE(salaire) OVER (PARTITION BY group_id ORDER BY group_id) AS LastOrderTotal
	-- retourne le dernier salaire du group_id
FROM salaire 
```
* LAG, LEAD, NTHVALUE
```sql
-- LAG : accede aux donnees d'une ligne precedente dans le meme jeu de resultats 
-- LEAD : accede aux donnees a partir d'une ligne ulterieure dans le meme jeu de resultats

SELECT * FROM products

-- Commencons par le LAG :
SELECT product_id, product_name, price, 
	LAG(price, 1, 0) OVER (ORDER BY product_id) AS resultat_precedent 
FROM products
-- LAG(colonne, ligne_depart, nombre_départ)
-- affiche la valeur precedente dans la colonne resultat_precedent



-- Et le LEAD
SELECT product_id, product_name, price, 
	LEAD(price, 1, 0) OVER (ORDER BY product_id) AS resultat_precedent 
FROM products
-- LEAD(colonne, ligne_depart, nombre_départ)
-- affiche la valeur suivante dans la colonne resultat_precedent


/*******************************************************************************
*************               NTH _VALUE    ************************************
********************************************************************************/

-- NTH_VALUE permet de récupérer une valeur selon sa place dans une liste ordonnée

CREATE TABLE produit (product_id INTEGER, product_name VARCHAR (250), price INT)

INSERT INTO produit VALUES 
(1,'Microsoftlumia',200), -- doublon
(1,'Microsoftlumia',400),
(1,'Microsoftlumia',800),
(2,'HTC ONE',400),
(3,'Nexus',500),
(4,'iphone',900),
(5,'HPElite',1200),
(6,'Lenovo Thinkpad',700),
(7,'Sony VAIO',700),
(8,'Dell Vostro',800),
(9,'Ipad',700),
(10,'Kindle fire',150),
(10,'Kindle fire',300),
(10,'Kindle fire',600),
(11,'Samsung galaxy Tab',200)

SELECT * FROM produit

-- Comment je fais pour avoir une colonne avec le 2eme prix le plus cher ?
SELECT 
    product_id,
    product_name,
    price,
    NTH_VALUE(product_name, 2) 
    OVER (ORDER BY price DESC RANGE BETWEEN UNBOUNDED PRECEDING AND UNBOUNDED FOLLOWING)
FROM produit
-- RANGE obligatoire pour éviter un débordement
-- la colonne nth_value renvoie le produit voulu : iphone
-- La clause RANGE definit le debut du cadre a la ligne de debut 
-- et la fin a la ligne de fin de l'ensemble de resultats.
```
* L'agregation avec les fonctions de partitionnement
```sql
-- Creation d'une simple table :

CREATE TABLE produit (product_id INTEGER,product_name VARCHAR (250), price INT)

INSERT INTO produit VALUES 
(1,'Microsoftlumia',200), -- doublon
(1,'Microsoftlumia',400),
(1,'Microsoftlumia',800),
(2,'HTC ONE',400),
(3,'Nexus',500),
(4,'iphone',900),
(5,'HPElite',1200),
(6,'Lenovo Thinkpad',700),
(7,'Sony VAIO',700),
(8,'Dell Vostro',800),
(9,'Ipad',700),
(10,'Kindle fire',150),
(10,'Kindle fire',300),
(10,'Kindle fire',600),
(11,'Samsung galaxy Tab',200)

SELECT * FROM produit

-- sélectionner les produits Microsoftlumia
SELECT product_name, price FROM produit 
WHERE product_name = 'Microsoftlumia'
GROUP BY product_name, price

-- afficher le nombre de produits communs dans une colonne nb_produit
-- Microsoftlumia > nb_produit : 3
-- Kindle fire > nb_produit : 3
SELECT product_id, product_name, price, 
COUNT (*) OVER (PARTITION BY product_name ORDER BY product_id) AS nb_produit
FROM produit 

-- afficher la moyenne des prix des produits 
SELECT product_id, product_name, price, 
	AVG(price) OVER(PARTITION BY product_name ORDER BY product_id) AS prix_moyen_produit
FROM produit
-- Kindle fire (300, 150, 600 en prix) => 350 en moyenne
```

## VUES, PROCEDURES STOCKEES, TRIGGERS & FONCTIONS

* Vue = table virtuelle
* Vue = contient le résultat d'une requête SQL (définie lors de la création de la vue)
* Le résultat est dynamique = tout changement dans la table se repercute dans la vue
* On enregistre donc une structure de requête (et non le résultat)
* Vue = s'utilise comme une table
```sql
-- SYNTAXE :
CREATE VIEW simple_vue
AS
SELECT ma_selection

-- J'ai la requete ci dessous : 
SELECT COUNT(*) AS total, sexe, date_naissance FROM contact
WHERE date_naissance::text LIKE '%1976%' AND sexe LIKE 'M'
GROUP BY sexe, date_naissance

-- Le probleme c'est que je dois a chaque soit sauvegarder la requete 
-- ou soit la retaper a la main, c'est un peu fastidieux n'est ce pas ? 
-- Pour solutionner ce probleme = creer une vue

CREATE VIEW simple_vue
AS
SELECT COUNT(*) AS total, sexe, date_naissance FROM contact
WHERE date_naissance::text LIKE '%1976%' AND sexe LIKE 'M'
GROUP BY sexe, date_naissance
-- crée une vue sur sur Pgadmin

-- pour retrouver le résultat de la requête, il faut juste faire un select de la vue 
SELECT * FROM simple_vue

-- je peux aussi mettre des filtres dans ma vue 
-- et je peux appeler juste une colonne
SELECT total FROM simple_vue 
-- Plus besoin de retaper la requete elle est maintenant enregistrée par une vue.

-- Cas pratique : 
-- Je veux que par exemple Sebastien ne voit que les personnes qui ont moins de 30 ans
-- par contre je veux que par exemple Bruno voit les personnes qui ont plus de 30 ans

-- creation de la vue pour sebastien
CREATE VIEW vue_sebastien
AS
SELECT * FROM contact WHERE age < 30 
-- Que donne le select de la vue pour Sebastien ? 
SELECT * FROM vue_sebastien
-- Sebastien ne voit bien que les personnes qui ont moins de 30 ans

-- creation de la vue pour Bruno
CREATE VIEW vue_bruno
AS
SELECT * FROM contact WHERE age > 30 
-- Que donne le select de la vue pour Bruno ? 
SELECT * FROM vue_bruno
-- Bruno ne voit bien que les personnes qui ont plus de 30 ans

-- mettre un UPDATE dans une Vue = impossible
create view test_update 
as 
update contact set nom ='marchand_2' where nom ='marchand'

-- mettre un DELETE dans une Vue = impossible
create view test_delete
as 
delete contact where nom ='marchand'

-- mettre un INSERT dans une Vue = impossible
create view test_delete
as 
insert into  contact values ('test','test',250,'2070-2-15')


-- changer un morceau de ma requete dans ma vue = impossible
-- par ex. changer le sexe dans ma requête
-- impossible sur Postgres (possible sur SQL server)
-- il faut supprimer la vue et la recreer
ALTER VIEW simple_vue
AS
SELECT COUNT(*) AS total, sexe, date_naissance FROM contact
WHERE date_naissance::text LIKE '%1976%' AND sexe LIKE 'M'
GROUP BY sexe, date_naissance

-- renommer ma vue = ALTER VIEW
ALTER VIEW simple_vue RENAME TO simple_vue2
-- La vue a été renommée en simple_vue2

-- Suppression de la vue par la commande DROP VIEW :
DROP VIEW simple_vue2
```
* Les procédures stockées
```sql
-- Postgresql ne supporte les procedures stockees que depuis postgresSQL 11
-- procedure stockee = ensemble d'instructions compilées dans la BDD
-- peut contenir les instructions DELETE, UPDATE et INSERT (contrairement à la vue)
-- simplification du code SQL

SELECT * FROM contact

-- Cas pratique : Je n'ai pas envie de taper tous les jours un script d'insert de 3 lignes ?
-- et si je l'integrais a une procedure stockee ? 

-- creation de la procedure avec un INSERT : 

CREATE OR REPLACE PROCEDURE Ps_insert_data(_nom text, _prenom text, _age integer,
                          _sexe text, _date_naissance date) -- _variable
LANGUAGE SQL -- Langage utilise SQL ou PLpsSQL
AS $$ -- on peut l'appeler TOTO aussi
INSERT INTO contact(nom, prenom, age, sexe, date_naissance)
VALUES(_nom, _prenom, _age, _sexe, _date_naissance);
$$; --Fin de la procedure
-- une procédure ps_insert_data a été crée dans le Schema

-- Lancons la PS par un CALL: 
CALL Ps_insert_data ('Bouchon', 'damien', 25, 'M', '1983-05-06')

--Que donne le SELECT ? 
SELECT * FROM contact -- l'utilisateur a été ajouté

-- creation de la procedure avec un UPDATE :
CREATE OR REPLACE PROCEDURE Ps_update_data(_nom text, _prenom text)                     
LANGUAGE SQL 
as $$ 
UPDATE contact set nom = _nom WHERE prenom= _prenom
$$;

CALL Ps_update_data ('Bouchon_2', 'damien')
select * from contact -- changement pris en compte

-- creation de la procedure avec un DELETE  :
CREATE OR REPLACE PROCEDURE Ps_delete_data(_nom text)                    
LANGUAGE SQL 
as $$ 
DELETE FROM contact WHERE nom = _nom
$$;

CALL Ps_delete_data ('Bouchon_2')
SELECT * FROM contact -- utilisateur supprimé
```
* Le Block Structure
```sql
-- Qu'est ce que le Block structure ? 
-- Chaque Bloc a deux sections : declaration et corps
-- La Section declaration est facultative, la section de corps est obligatoire

DO $$ 
<<TOTO>> -- Debut du block 
DECLARE
  counter integer = 0; -- Compteur à 0 
BEGIN -- debut
   counter := counter + 1;-- + 1 
   RAISE NOTICE 'La valeur courante est  %', counter; -- gestion des erreurs,  comme print en SQL 
END TOTO $$; -- Fin du bloc 

-- Le bloc se termine par un ;
-- Le double $$ est un delimiteur que l'on utilise pour indiquer 
-- ou commence et se termine la definition de la Transaction


-- Allons plus loin,on peut meme creer des sous blocs : 
DO $$ 
<<Premier_bloc>>
DECLARE -- 1er bloc
  counter integer := 0;
BEGIN 
   counter := counter + 1;
   RAISE NOTICE 'La valeur courante est %', counter; -- 1
 
   DECLARE -- Sous bloc
       counter integer := 0;
   BEGIN 
       counter := counter + 10;
       RAISE NOTICE 'La valeur courante du sous bloc est %', counter; -- 10
       RAISE NOTICE 'La valeur courante du premier bloc est %', Premier_bloc.counter; -- 1
   END;
 
   RAISE NOTICE 'La valeur courante du premier bloc est %', counter; -- 1
   
END Premier_bloc $$;

-- NOTICE:  La valeur courante est 1
-- NOTICE:  La valeur courante du sous bloc est 10
-- NOTICE:  La valeur courante du premier bloc est 1
-- NOTICE:  La valeur courante du premier bloc est 1
-- DO
```
* TRIGGER
```sql
-- Un déclencheur (trigger) PostgreSQL est une fonction invoquée automatiquement
-- chaque fois qu'un événement associé à une table se produit. 
-- Un événement peut être l'un des suivants: INSERT , UPDATE , DELETE ou TRUNCATE .

-- Un déclencheur est une fonction spéciale définie par l'utilisateur associée à une table.

-- Pour créer un nouveau déclencheur, vous devez d'abord définir une fonction de déclencheur, 
-- puis lier cette fonction de déclencheur à une table.

-- Tout d'abord, créez une fonction de déclenchement à l'aide de CREATE FUNCTION
-- Ensuite liez la fonction au trigger

-- Creation de deux tables : 
-- Creation de la table employé ; 
CREATE TABLE employees(
   id SERIAL PRIMARY KEY,
   first_name VARCHAR(40) NOT NULL,
   last_name VARCHAR(40) NOT NULL
);

-- Creation de la table des audits des employés (avec une colonne en date):
CREATE TABLE employee_audits (
   id SERIAL PRIMARY KEY,
   employee_id INT NOT NULL,
   last_name VARCHAR(40) NOT NULL,
   changed_on TIMESTAMP(6) NOT NULL
)

-- Creation de la fonction : 
-- CREATE OR REPLACE FUNCTION nom_fonction RETURNS TRIGGER AS ALIAS
-- idée : enregister l'ancien nom et la date de modifcation
-- lorsqu'un employé change de nom
CREATE or REPLACE FUNCTION log_last_name_changes() RETURNS trigger AS $emp_stamp$
   BEGIN
   IF NEW.last_name <> OLD.last_name THEN -- si last_name a été modifié
       INSERT INTO employee_audits(employee_id, last_name, changed_on) -- insertion dans la table d'audit des variables
       VALUES(OLD.id, OLD.last_name, NOW()); 
	   -- avec comme valeurs l'ancienne valeur de la colonne ID, le nouveau last name et la date du jour 
   END IF; -- Fin du IF
        RETURN NEW;
    END;
$emp_stamp$ LANGUAGE plpgsql;

-- Creation du trigger : 
CREATE TRIGGER last_name_changes
  BEFORE UPDATE -- avant la MAJ => sera exécuté à chaque UPDATE
  ON employees -- sur la table employé
  FOR EACH ROW -- pour chaque ligne 
  EXECUTE PROCEDURE log_last_name_changes(); -- Execute la fonction 
 
 -- Insertion de deux valeurs : 
INSERT INTO employees (first_name, last_name)
VALUES ('John', 'Doe');
INSERT INTO employees (first_name, last_name)
VALUES ('Lily', 'Brown');

-- que donne le SELECT : 
SELECT * FROM employees

-- Lily Brown se marie et change son nom de famille en Lily Bush. 
-- Nous pouvons mettre à jour son nom de famille comme indiqué dans la requête suivante:
UPDATE employees
SET last_name = 'Brown'
WHERE ID = 2;

-- que donne le SELECT : 
SELECT * FROM employees
-- le nom de famille de Lily a été mis à jour. 
-- Vérifions le contenu du employee_audits tableau:
SELECT * FROM employee_audits
-- le tableau a une nouvelle ligne avec l'ancien nom de Lily
-- à chaque changement de nom, une nouvelle ligne sera ajoutée
-- avec le nom précédent
-- le trigger a été rajouté à la table employees
-- + à l'onglet Trigger Functions du Schema
```

## CONTRAINTES ET CLÉS

* Contrainte CHECK et UNIQUE
```sql
-- CHECK : contrainte de valeur

--- Creation d'une table classique 
CREATE TABLE Personne (
    Nom varchar(255) NOT NULL,
    Prenom varchar(255),
    Age int,
    CHECK (Age < 5) -- Contrainte CHECK
)

INSERT INTO Personne VALUES ('Thuillier', 'Olivier', 4) -- OK
INSERT INTO Personne VALUES ('Thuillier', 'Olivier', 5) 
-- ERROR:  ERREUR:  la nouvelle ligne de la relation « personne » viole la contrainte 
-- de vérification « personne_check »
-- DETAIL:  La ligne en échec contient (Thuillier, Olivier, 5) 
INSERT INTO Personne VALUES ('Thuillier', 'Olivier', NULL) -- OK  

-- Supression de la contrainte 
ALTER TABLE Personne DROP CONSTRAINT personne_age_check

-- rajouter la contrainte sur une table existante ? 
ALTER TABLE Personne ADD CHECK (Age  < 10)

-- Supprimons la table
DROP TABLE Personne

-- ajouter une contrainte pour une valeur donnée 
CREATE TABLE valeur_donnee (valeur varchar (200), CHECK (valeur in ('TOTO','TITI')))

-- Insertion de valeurs 
INSERT INTO valeur_donnee values ('TITI') -- OK
INSERT INTO valeur_donnee values ('TUTU')
-- ERROR:  ERREUR:  la nouvelle ligne de la relation « valeur_donnee » viole la contrainte de vérification « valeur_donnee_valeur_check »
-- DETAIL:  La ligne en échec contient (TUTU)

-- une contrainte CHECK sur plusieurs colonnes 
CREATE TABLE Personne (
    Nom varchar(255) NOT NULL,
    Prenom varchar(255),
    Age int,
    CHECK (Age BETWEEN 5 AND 10 AND Nom = 'THUILLIER' ) -- Contrainte CHECK sur deux colonnes
)
-- Insertion de valeurs
INSERT INTO Personne VALUES ('THUILLIER', 'Olivier', 5) -- OK
INSERT INTO Personne VALUES ('THUILLIERZ', 'Olivier', 5)
-- ERROR:  ERREUR:  la nouvelle ligne de la relation « personne » viole la contrainte 
-- de vérification « personne_check »
-- DETAIL:  La ligne en échec contient (THUILLIERZ, Olivier, 5)
INSERT INTO Personne VALUES ('THUILLIER', 'Olivier', 11) -- même message d'erreur

-- UNIQUE : imposer l'unicité d'une valeur

CREATE TABLE nom_unique (nom varchar (200) NULL UNIQUE, prenom varchar (200))

INSERT INTO nom_unique VALUES ('Thuillier', 'Olivier') -- OK
INSERT INTO nom_unique VALUES ('Thuillier', 'Bruno')
-- ERROR:  ERREUR:  la valeur d'une clé dupliquée rompt la contrainte unique « nom_unique_nom_key »
-- DETAIL:  La clé « (nom)=(Thuillier) » existe déjà
INSERT INTO nom_unique VALUES (NULL, 'Bruno') -- OK

-- créer plusieurs contraintes par table
-- Peut on creer une table avec une colonne UNIQUE et un DEFAULT ? 
CREATE TABLE unique_default (
Nom varchar (200) NULL UNIQUE ,
prenom varchar (200) DEFAULT 'TOTO' 
)

INSERT INTO UNIQUE_DEFAULT values ('olivier', DEFAULT)
-- olivier TOTO

-- creer plusieurs colonnes UNIQUE dans une table 
CREATE TABLE UNIQUE_2 (
Nom varchar (200) NULL UNIQUE ,
prenom varchar (200) UNIQUE
)
	
-- La contrainte UNIQUE ne cree pas d'index non clustered par defaut (comme sur SQL Server)
```
* La contrainte DEFAULT
```sql
-- DEFAULT: créer une valeur par défaut

--- Creation de la table avec la valeur DEFAULT
CREATE TABLE test_default (test varchar(200) DEFAULT 'TOTO', email varchar (200))

INSERT INTO test_default VALUES ('olivier', 'defaut@defaut.com')
INSERT INTO test_default VALUES (DEFAULT, 'defaut@defaut.com')

-- Ajout d'un defaut sur une table existante
ALTER TABLE test_default ALTER COLUMN email SET DEFAULT 'aucune adresse email'

INSERT INTO test_default VALUES (DEFAULT, DEFAULT)
-- TOTO | aucune adresse email
```
* La contrainte PRIMARY KEY
```sql
-- La Primary Key est recommandée sur chaque table, elle la représente
-- La PK n’accepte pas les doublons ni les NULL
-- (contrairement a UNIQUE qui accepte les NULL, mais non les doublons)
-- Une table ne peut contenir qu’une seule PK

--- Creation d'une table classique avec la PK
CREATE TABLE table_ex
(  
   nom varchar (200) PRIMARY KEY, -- ajout dans les contraintes ►◄ de la table
   personne varchar (200)
)

INSERT INTO table_ex VALUES (NULL,'TOTO')
-- ERROR:  ERREUR:  une valeur NULL viole la contrainte NOT NULL de la colonne « nom »
-- DETAIL:  La ligne en échec contient (null, TOTO)
INSERT INTO table_ex VALUES ('Thuillier', 'Olivier')
INSERT INTO table_ex VALUES ('Thuillier', 'Olivier')
-- ERROR:  ERREUR:  la valeur d'une clé dupliquée rompt la contrainte unique « table_ex_pkey »
-- DETAIL:  La clé « (nom)=(Thuillier) » existe déjà
 
DROP TABLE table_ex

-- ajouter une contrainte unique à primary key
CREATE TABLE table_ex
(  
   Nom varchar (200) UNIQUE PRIMARY KEY -- possible (intérêt ?)  
)


DROP TABLE table_ex

--- ajout de la contrainte CHECK sur une PK 
CREATE TABLE table_ex
(  
   nom varchar (200) PRIMARY KEY CHECK (nom in ('THUILLIER')) 
 )

INSERT INTO table_ex VALUES ('OLIVIER')
-- ERROR:  ERREUR:  la nouvelle ligne de la relation « table_ex » viole la contrainte de vérification « table_ex_nom_check »
-- DETAIL:  La ligne en échec contient (OLIVIER)

DROP TABLE table_ex

--- ajout de la contrainte DEFAULT sur une PK
CREATE TABLE table_ex
(  
   nom varchar (200) DEFAULT 'TOTO' PRIMARY KEY -- Rajout de la contrainte DEFAULT
)

INSERT INTO table_ex VALUES (DEFAULT) -- TOTO
```
* La contrainte FOREIGN KEY
```sql
-- FOREIGN KEY : garantit l'intégrité référentielle entre 2 tables
-- les tables sont liées par la relation PK/FK
-- on parle d'une relation parent/enfant

--- Creation d'une table classique avec la PK
CREATE TABLE Parent
(  
   nom varchar (200) PRIMARY KEY,  
   prenom varchar (200),
   adresse varchar (200)
)

-- Inserons des valeurs dans cette table 
INSERT INTO parent VALUES ('Martin', 'Jean', '7 rue des Coquelicots')

-- Creation d'une table classique avec la FK
CREATE TABLE Enfant
(  
   prenom varchar (200),
   nom varchar (200),  
	FOREIGN KEY (nom) REFERENCES parent(Nom) -- référence la table Parent
   -- ajout de la contrainte dans la table
)

-- Inserons des valeurs dans cette table 
INSERT INTO enfant VALUES ('Liam','Martin')
INSERT INTO enfant VALUES ('Liam', 'Martine') -- nom NON Present dans la table Parent
-- ERROR:  ERREUR:  une instruction insert ou update sur la table « enfant » 
-- viole la contrainte de clé étrangère « enfant_nom_fkey »
-- DETAIL:  La clé (nom)=(Martine) n'est pas présente dans la table « parent »

-- Que se passe t il si je modifie la valeur dans la PK 
UPDATE parent SET nom = 'Saucisse' WHERE nom ='Martin'
-- ERROR:  ERREUR:  UPDATE ou DELETE sur la table « parent » viole la contrainte de clé étrangère « enfant_nom_fkey » de la table « enfant »
-- DETAIL: La clé (nom)=(Martin) est toujours référencée à partir de la table « enfant »
-- On ne peut pas modifier la table parent, par le simple fait qu'elle a une relation enfant

-- et si je modifiais la table enfant ? 
UPDATE enfant SET nom = 'Saucisse' WHERE nom ='Martin'
-- ERROR:  ERREUR:  une instruction insert ou update sur la table « enfant » viole la contrainte de clé
-- étrangère « enfant_nom_fkey »
-- DETAIL:  La clé (nom)=(Saucisse) n'est pas présente dans la table « parent »
-- On ne peut pas modifier la table enfant, par le simple fait qu'elle a une relation parent

-- Mais alors comment sortir de cette impasse ? 
-- il faut desactiver la contrainte sur la FK, pour pouvoir modifier la table soit parent soit enfant
ALTER TABLE enfant DISABLE TRIGGER ALL -- désactive toutes les contraintes
UPDATE enfant SET nom = 'Saucisse' WHERE nom ='Martin' -- OK
UPDATE parent SET nom = 'Saucisse' WHERE nom ='Martin'

-- Pour reactiver la contrainte 
ALTER TABLE enfant ENABLE TRIGGER ALL

-- et si je reessaye un UPDATE ? 
UPDATE enfant SET nom = 'Poireau' WHERE nom ='Saucisse'
-- ERROR:  ERREUR:  une instruction insert ou update sur la table « enfant » viole la contrainte de clé
-- étrangère « enfant_nom_fkey »
-- DETAIL:  La clé (nom)=(Poireau) n'est pas présente dans la table « parent »

-- supression : ORDRE important
DROP TABLE enfant -- PK
DROP TABLE parent -- FK
```
* La cascade d'integrite referentielle
```sql
--- Creation de deux tables
CREATE TABLE test1 (
    id SERIAL PRIMARY KEY, -- AUTO_INCREMENT
    nom varchar(200) NOT NULL,
    prenom varchar(200)
)

CREATE TABLE test2 (
    id SERIAL PRIMARY KEY, -- AUTO_INCREMENT
    nom varchar(200) NOT NULL,
    prenom varchar(200)
)

-- insertion d'un simple ligne classique sur les deux tables
INSERT INTO test1(prenom, nom) VALUES ('Jean', 'Bon')
INSERT INTO test2(prenom, nom) VALUES ('Jean', 'Bon')

-- rajout des FK
ALTER TABLE test2 ADD CONSTRAINT test2 FOREIGN KEY (id) REFERENCES test1(id)

DELETE FROM test1 WHERE id = 1
-- ERROR:  ERREUR:  UPDATE ou DELETE sur la table « test1 » viole la contrainte de clé étrangère « test2 » de la table « test2 »
-- DETAIL:  La clé (id)=(1) est toujours référencée à partir de la table « test2 »
-- UPDATE : même erreur

-- Suppresion de  la contrainte 
ALTER TABLE test2 DROP CONSTRAINT test2

-- rajout des FK avec le DELETE CASCADE : 
ALTER TABLE test2 ADD CONSTRAINT test2 FOREIGN KEY (id) REFERENCES test1(id) ON DELETE CASCADE
-- applique un effet cascade > DELETE Parent > DELETE Enfant

BEGIN TRANSACTION -- crée une requête ouverte

DELETE FROM test1 WHERE id = 1 -- OK
SELECT * FROM test1 -- vide
SELECT * FROM test2 -- vide

ROLLBACK -- reviens en arriere
-- COMMIT -- sauvegarde la transaction

UPDATE test1 SET id = 2 WHERE id = 1 -- ERREUR

-- Suppresion de la contrainte 
ALTER TABLE test2 DROP CONSTRAINT test2

-- On vide les tables 
TRUNCATE TABLE test1
TRUNCATE TABLE test2
truncate table Test_on_cascade_2

-- insertion d'un simple ligne classique sur les deux tables
INSERT INTO test1(prenom, nom) VALUES ('Jean', 'Bon')
INSERT INTO test2(prenom, nom) VALUES ('Jean', 'Bon')

-- ajout de la contrainte UPDATE et DELETE 
ALTER TABLE test2 ADD CONSTRAINT test2 FOREIGN KEY (id) REFERENCES test1(id) 
ON UPDATE CASCADE ON DELETE CASCADE

UPDATE test1 SET id = 3 -- OK
-- id test1 = 3
-- id test2 = 3

-- supprimer les tables : respecter l'ordre
DROP TABLE test2 -- d'abord table enfant
DROP TABLE test1 -- puis table parent
-- ou
DROP TABLE test1 CASCADE -- supprime table 1
```

## LA SEQUENCE & L'IDENTITY

* L'IDENTITY sur les tables
```sql
-- nouvelle fonctionnalité Postgres 10
-- appelée GENERATED ALWAYS AS IDENTITY
-- contrainte qui permet d'attribuer automatiquement une valeur unique à une colonne
-- types : SMALLINT, INT, BIGINT

CREATE TABLE color (
	id INT GENERATED ALWAYS AS IDENTITY, -- sera toujours généré par Postgres
	name VARCHAR NOT NULL
)

INSERT INTO color (name) VALUES ('rouge')
-- id = 1
-- il est IMPOSSIBLE du coup d'imposer son id

-- pour surcharger
INSERT INTO color (id, name)
OVERRIDING SYSTEM VALUE
VALUES (2, 'vert')

DROP TABLE color

CREATE TABLE color (
	id INT GENERATED BY DEFAULT AS IDENTITY, -- généré par défaut par Postgres
	name VARCHAR NOT NULL
)

INSERT INTO color (name) VALUES ('rouge') -- OK
INSERT INTO color (id, name) VALUES (3, 'vert') -- OK

DROP TABLE color

CREATE TABLE color (
	id INT GENERATED BY DEFAULT AS IDENTITY
	(START WITH 10 INCREMENT BY 10),
	name VARCHAR NOT NULL
)

INSERT INTO color (name) VALUES ('rouge')
-- id = 10
INSERT INTO color (name) VALUES ('hugfstsrebene')
-- id = 20
```
* Une SEQUENCE
```sql
-- prolongation de l'identity
-- sur deux tables distinctes, ça va incrémenter indépendemment les numéros
-- sequence = liste ordonnee d'entiers. Les ordres de nombres dans la sequence sont importants. 
-- Par exemple, {1,2,3,4,5} et {5,4,3,2,1} sont des sequences entiÃ¨rement differentes.

-- Une sequence dans PostgreSQL est un objet lie au schema defini par l'utilisateur qui genere une sequence d'entiers basee sur une specification specifiee.

-- Une sequence est une sorte de table particuliere qui permet de generer un nombre proprement.
-- Les nombres generes proviennent d'une suite que l'on aura au prealable parametree dans la sequence.

--- creation d'une sequence simple, avec un increment de 5 et qui demarre a 100
CREATE SEQUENCE masequence -- à retrouver dans le Schema
INCREMENT 5 
START 100

-- pour voir la prochaine valeur de la sequence
SELECT NEXTVAL('masequence') -- 100

-- Creation d'une autre sequence 
CREATE SEQUENCE three
INCREMENT -1
MINVALUE 1 
MAXVALUE 3
START 3
CYCLE

SELECT NEXTVAL('three') -- 3

-- attacher une sequence a une table
CREATE TABLE order_details(
    order_id SERIAL,
    item_id INT NOT NULL,
    product_id VARCHAR(200) NOT NULL,
    price DEC(10,2) NOT NULL,
    PRIMARY KEY(order_id, item_id)
)

-- Et rattacher cette sequence a la table : 
CREATE SEQUENCE order_item_id
START 10 -- Debut de l'increment
INCREMENT 10 -- Par saut de 10
MINVALUE 10 -- Valeur minimum
OWNED BY order_details.item_id;

INSERT INTO 
    order_details(order_id, item_id, product_id, price)
VALUES
    (100, nextval('order_item_id'),'DVD Player',100), -- item_id = 10
    (100, nextval('order_item_id'),'Android TV',550), -- 20
    (100, nextval('order_item_id'),'Speaker',250); -- 30


-- On peut le creer aussi sur une autre table
CREATE TABLE order_details_2 (
    order_id SERIAL,
    item_id INT NOT NULL,
    product_id VARCHAR(200) NOT NULL,
    price DEC(10,2) NOT NULL,
    PRIMARY KEY(order_id, item_id)
)

INSERT INTO 
    order_details_2(order_id, item_id, product_id, price)
VALUES
    (100, nextval('order_item_id'),'DVD Player',100), -- item_id = 40
    (100, nextval('order_item_id'),'Android TV',550), -- 50
    (100, nextval('order_item_id'),'Speaker',250); -- 60
	
-- Il a pris les valeurs suivantes 40, 50, 60

-- Quelle sera sa prochaine valeur ?
SELECT nextval('order_item_id') -- 70

-- une Sequence peut etre modifiee 
ALTER SEQUENCE order_item_id
INCREMENT BY 10 -- + 10

SELECT nextval('order_item_id') -- 80

-- Et si je veux repartir a 10 ?
ALTER SEQUENCE order_item_id
restart 10

SELECT nextval('order_item_id') --40

-- On peut aussi lui affilier une valeur MAX :
CREATE SEQUENCE order_max
START 1 -- Debut de l'increment
INCREMENT 1 -- Par saut de 10
MaxVALUE 2 -- Valeur minimum
OWNED BY order_details.item_id;

TRUNCATE TABLE order_details


INSERT INTO 
    order_details(order_id, item_id, product_id, price)
VALUES
    (100, nextval('order_max'),'DVD Player',100),
    (100, nextval('order_max'),'Android TV',550),
    (100, nextval('order_max'),'Speaker',250);

-- ERROR:  ERREUR:  nextval : valeur maximale de la sÃ©quence Â« order_max Â» (2) atteinte
```
