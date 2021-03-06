# LEXIQUE WEB 

* :electric_plug: **INTRANET** : réseau informatique privé utilisé par les employés d’une entreprise : réseau interne d’une organisation

* :computer_mouse: **EXTRANET** : utilisation du réseau Internet pour assurer sa communication avec des partenaires extérieurs au réseau interne

* :door: **PORT** : porte par laquelle va circuler des informations. Lorsqu'une application qui a besoin de communiquer en réseau se lance, elle ouvre sa propre porte (qui porte toujours le même numéro). Lorsqu'elle enverra des informations, elle spécifiera qu'elle les envoie sur la porte numéro X de l'ordinateur distant.

* :house: **ADRESSE IP** : numéro unique permettant d'identifier un ordinateur ou périphérique connecté à un réseau utilisant le protocole IP

* :floppy_disk: **MODELE DE DONNEES** : représente la structure logique d’une application (modèle relationnel, modèle de base de données orientée objet, modèle réseau)

* :keyboard: **SI** : Système d’information : Outil qui permet de traiter de l’information

* :arrows_counterclockwise: **Récursivité** : un programme, une fonction s’appelle lui-même, créant une boucle. La récursivité consiste à remplacer une boucle par un appel à la fonction elle-même.

* :triangular_flag_on_post: **Recettes** : réunions formelles qui ont pour but de valider et d’accepter le produit réalisé

* :smiling_imp: **demon/daemon** : n'importe quel processus fonctionnant en arrière-plan

* :capital_abcd: **ASCII** ([askiː]) : norme informatique de codage de caractères apparue dans les années 1960.
ASCII suffit pour représenter les textes en anglais, mais il est trop limité pour les autres langues, dont le français et ses lettres accentuées
 !"#$%&'()*+,-./
0123456789:;<=>?
@ABCDEFGHIJKLMNO
PQRSTUVWXYZ[\]^_
`abcdefghijklmno
pqrstuvwxyz{|}~

* :symbols: **UNICODE** : standard informatique qui permet des échanges de textes dans différentes langues.
Il est constitué d'un répertoire de 137 929 caractères, couvrant une centaine d’écritures

* :clipboard: **Base de Données Relationnelle** : base de données où l'information est organisée dans des tableaux à deux dimensions appelés des relations (les tables). Selon ce modèle relationnel, une base de données consiste en une ou plusieurs relations. Les lignes de ces relations sont appelées des nuplets ou enregistrements. Les colonnes sont appelées des attributs.

* :card_file_box: **SGBDR** : logiciels qui permettent de créer, utiliser et maintenir des bases de données relationnelles (Systèmes de Gestion de Base de Données Relationnels)

* :dizzy: **HTTP** : protocole qui sert à transmettre la communication entre le navigateur et le serveur web : langage commun pour faire transiter les informations ; ces informations sont transparentes, brutes, non cryptées

* :dizzy: :white_flag: **HTTPS** : même principe, en plus sécurisé : les données qui transitent sont chiffrées ; il est impossible de les déchiffrer en les interceptant => les données qui circulent restent privées et invisibles

* :computer: **Requête HTTP** : requête formulée par un client (tout logiciel dans la capacité de forger une requête) 

* :clipboard: **Contenu d'une requête HTTP** : la méthode HTTP (GET, POST, PUT, PATCH, DELETE, OPTIONS, CONNECT, HEAD ou TRACE), l'URI, cad ce qu'il y a après le nom de domaine (exemple : /users/1), la version du protocole (exemple : HTTP/1.1), les entêtes (headers), le contenu de la requête (body)
```http
POST /users HTTP/1.1
User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36
Content-Type: application/x-www-form-urlencoded
Content-Length: 28

name=Sarah Khalil&job=auteur
```

* :back: **Réponse HTTP** : réponse du serveur à une requête du client

* :clipboard: **Contenu d'une réponse HTTP** : la version du protocole utilisée, le code status, l'équivalent textuel du code status, les entêtes (headers), le contenu de la requête (body)
```http
HTTP/1.1 200 OK
Date:Tue, 31 Jan 2017 13:18:38 GMT
Content-Type: application/json

{
    "current status" : "Everything is ok!"
}
```

* :vertical_traffic_light: Les différents **codes status**
```py
{
    '1XX': 'les informations',
    '2XX': 'les succès',
    '3XX': 'les redirections',
    '304': 'le contenu n\'a pas changé, dans un contexte de cache'
    '4XX': 'les erreurs clients',
    '5XX': 'les erreurs serveur'
}

```

* :dizzy: :closed_lock_with_key: **SSH** : Secure Shell : protocole + programme l’utilisant : protocole qui permet de faire des connexions sécurisées (i.e. cryptées) entre un serveur et un client, permet d’administrer à distance un serveur ou d’accéder à un ordinateur

* :open_file_folder: **FTP** : protocole qui permet d’échanger (entre client et serveur) des fichiers.

* :e-mail: **SMTP** : protocole qui permet d’envoyer (entre client et serveur) des e-mails.

* :heavy_check_mark: **NPM** : node package manager : gestionnaire de dépendances javascript

* :man_technologist: **Partie cliente** : côté navigateur 

* :gear: **Partie métier** : côté serveur

* :electric_plug: **Pilote informatique** : programme informatique destiné à permettre à un autre programme (souvent un système d'exploitation) d'interagir avec un périphérique

* :car: :truck: :tractor: **Polymorphisme** : représente l'abilité d'un objet à copier le comportement d'un autre objet. Un même objet peut revêtir différentes formes, différents types (classe parent, classe objet, classe interface) : forme d’héritage : on utilise le polymorphisme pour éviter la duplication de code, car l’objet peut revêtir sa forme la plus générale (sa classe parent) et on l’affine pour des besoins plus précis. Les formes sont interchangeables à tout moment. C’est aussi un concept qui indique que l’on peut utiliser les méthodes de la classe mère de la même façon chez les classes filles => la méthode peut donc avoir différentes entités. 

* :question: **Pattern** : exprime une solution générale à un problème de conception commun

* :family_man_boy: **Métaclasse** : classe dont les instances sont des classes. Autrement dit, une métaclasse est la classe d'une classe.

* :globe_with_meridians: **DNS** (Domain Name System) : traduit les noms de domaine en adresse IP, fait la correspondance entre les deux   
demande adresse utilisateur => récupération par le DNS récursif (FAI, OpenDNS, ect.) => interroge plein de serveurs => DNS récursif récupère l'adresse IP du site => utilisateur

* :books: **ORM** : librairie qui regroupe tout le code pour manipuler les données, ce qui fait qu’on est plus obligé de passer par SQL pour manipuler les données ; tout se fait via des classes, en orienté objet. On ne pense plus en termes de tables, mais en termes de classes. Tout est centralisé. Gain de temps, de flexibilité (le langage est unique car plus besoin de SQL) mais il faut apprendre comment ça marche (complexe par moments)

* :european_castle: **Architecture MVC** : façon d’organiser les fichiers, qui sont séparés selon le rôle qu’ils jouent. On a la partie graphique, le HTML (le view de V de MVC), on a la partie du code dynamique, décideur (le Controller de C de MVC) et la partie des objets qui sont utilisés (Model de MVC)

* :gear: **Serveur** : machine qui écoute les requêtes faites par les clients et essaie de donner la réponse appropriée

* :framed_picture: **Framework** : application qui a déjà une architecture, des fichiers et des fonctions prêtes à l’emploi et conçue pour les développeurs et pour faciliter le développement d’un projet web

* :joystick: **API** : interface qui permet de communiquer avec un service distant depuis notre appli

* :dart: **Méthode AGILE** : priorité au client avec qui on a une communication régulière et qui valide ou ajuste toutes les opérations, étapes par étapes, objectifs à court terme pour accepter les changements et imprévus, flexibilité

* :hammer_and_wrench: **DevOps** : développeur et administrateur système et qui peut assurer ses productions en continu

* :round_pushpin: **DOM** : représentation du HTML en orienté objet ; chaque élément du HTML est un objet

* :see_no_evil: Principe d'**encapsulation** : regrouper des données et faire qu’elles ne soient accessibles que grâce à des méthodes spécifiques, ce qui fait que les données sont protégées, on peut pas s’en servir n’importe comment, elles ont une protection

* :1234: **Sérialisation** : processus de conversion d'un objet en un flux d'octets pour stocker l'objet ou le transmettre à la mémoire, à une base de données, ou dans un fichier. La sérialisation de données est le concept de conversion de données structurées dans un format qui lui permet d’être partagé ou stocké de manière à ce que sa structure d’origine puisse être récupérée.

* :arrows_clockwise: **AJAX** : Asynchronous JavaScript and XML : ensemble de technologies destinées à réaliser de rapides mises à jour du contenu d'une page Web, sans qu'elles nécessitent le moindre rechargement de la page Web. L'AJAX est un moyen de charger des données sans recharger la page, en utilisant le JavaScript.

* :world_map: **Pointeur** : variable qui contient l’adresse d’une donnée contenue en mémoire

* :notebook: **Prototypage** : réalisation du prototype, du brouillon d'un produit final

* :card_index_dividers: **Registre (ou base de registre)** : fichier où sont stockés les paramètres d'un ordinateur Windows, sous-divisé en dossiers appelés "clé" qui contiennent les informations du registre. Chacune des clés est dédiée à un domaine de Windows et peut contenir des sous-clés afin d'affiner le rangement

* :dark_sunglasses: **Dark patterns** : User interface elements that have been carefully crafted to trick users into doing things they might not otherwise do, often utilizing psychological manipulation

* :house: **URI** : Uniform Resource Identifier. URLs (uniform resource locators) are a common kind of URI.
* :people_holding_hands: **Loi Demeter** : « Ne parlez qu'à vos amis immédiats ». Un objet ne doit interagir qu'avec celui avec qui il a une relation
```
- La classe A possède une relation avec la classe B
- La classe B possède une relation avec la classe C
* La loi de Demeter dit que A ne peut pas connaître l'existence de C
* A ne peut pas utiliser B pour accéder aux services de C
* B pourrait être modifié si nécessaire pour que A puisse faire la requête directement à B, 
et B propagera la requête au composant ou sous-composant approprié
(Par conséquent, le chaînage de méthodes est une mauvaise pratique)
* Rend le logiciel résultat plus maintenable, plus adaptable et minimise le risque d'erreurs
https://fr.wikipedia.org/wiki/Loi_de_D%C3%A9m%C3%A9ter
```
* :robot: **Bytecode** : code intermédiaire entre le code source et les instructions machines, écrit en code binaire (011000111), qui ne peut être interprété que par une machine virtuelle

* :key: **JSON** : format d'échanges de données, qui est une représentation en texte d'un objet JavaScript (ressemble à une Map, avec une association clé:valeur) et qui peut être interprété par tous les langages de programmation

* :bricks: **DTO** (data transfer object) : objet de transfert de données = objet simple (aucune logique dans son code), léger (pas de méthodes, hormis mutateurs et accesseurs) et dont le rôle se limite SEULEMENT à contenir des données

* :capital_abcd: **Système hexadécimal** :
```java
// système décimal (base 10)
// on multiple par 10^n le chiffre suivant en allant de droite à gauche
// n commence à 0
13 = 1 * 10 + 3; // 13 = 1 * 10^1 + 3 * 10^0
113 = 1 * 10 * 10 + 1 * 10 + 3; // 113 = 1* 10^2 + 1 * 10^1 + 3 * 10^0

// système hexadécimal (base 16)
// on multiple par 16^n le chiffre suivant en allant de droite à gauche
// n commence à 0
// 0 1 2 3 4 5 6 7 8 9 A(10) B(11) C(12) D(13) E(14) F(15)
4C = 4 * 16 + 12 = 76; // 4 * 16^1 + 12 * 16^0
FF = 15 * 16 + 15 = 255;
CC9 = (12 * 16 * 16) + (12 * 16) + 9;
```
* :ramen: **Encoding** et **Serialization** = transformer une structure de données en un String (ex. Map en JSON)

* :jigsaw: **Decoding** et **Deserialization** = transformer un String en une structure de données (ex. JSON en Map)

* :family_man_woman_girl_boy: **Dépendance transitive** = lorsqu'il y a 2 niveaux (voire plus) de dépendance (ex. un module dépend d'une librairie, qui dépend elle-même d'une librairie)

* :heavy_check_mark: **front-office** : interface publique dédiée aux utilisateurs

* :x: **back-office** : interface privée dédiée aux administrateurs du site

* :books: **Pile d'exécution** : structure de données qui enregistre les informations (adresses de retour, variables locales, paramètres) des fonctions actives dans un programme informatique

* :open_umbrella: **Programmation fonctionnelle** : la logique du code et les variables sont placées dans des fonctions pures (cad que leur input (paramètres) et leur output (valeur de retour) sont explicitement renseignées)

* :rainbow: Logiciel **agnostique** : qui peut s’adapter aux composants avec lesquels il interagit ; qui est indépendant du langage, qui n'a pas besoin de connaître les langages informatiques
```
Un protocole agnostique !

Comme le hub de Mercure est une application à part entière, on peut l'appeler depuis une application
PHP, mais aussi depuis une app Java, Node, Ruby ou Python, peu importe, il suffit de lui envoyer une
requête HTTP pour lui passer des infos !
```
https://www.it-swarm.dev/fr/programming-languages/quest-ce-que-lagnosticisme-linguistique-et-pourquoi-est-il-appele-ainsi/l958401352/

* :ambulance: **Garbage collector** (ramasse-miettes) : sous-système informatique qui libère la mémoire inutilisée

* :books: Différence **Librairie** et **Framework** : une libraire, c'est du code qu'on appelle (on a le contrôle de l'implémentation), alors qu'avec un framework, c'est le code qui vous appelle (l'implémentation doit suivre des règles imposées)

* :outbox_tray: **Compilation anticipée** (compilation AOT *ahead-of-time*) : compilation avant l'exécution d'un programme

* :inbox_tray: **Compilation à la volée** : compilation lors de l'exécution d'un programme

* :office: **Référence** : adresse en mémoire d'une variable

* :closed_lock_with_key: **SSL** : Secure Sockets Layer = un moyen (protocole) qui permet d'établir une connexion sécurisée (cryptée) entre deux ordinateurs (très utilisé pour établir une connexion entre un serveur Web qui héberge un site et un utilisateur Internet, qui se connecte ou utilise ce site)

* :scroll: L'utilisation de ce protocole requiert la génération d'un **Certificat SSL** = une "signature" qui permet d'établir ce lien sécurisé et unique. Garantissant aussi bien l'identité du serveur vers lequel la connexion se fait que la protection des données qui circulent entre le serveur et l'équipement qui s'y connecte via Internet.

* :test_tube: **test unitaire** = vérifie le fonctionnement d'une fonction, une méthode, une classe

* :alembic: **test d'intégration** = vérifie le fonctionnement de l'application ou une large partie de l'application

* :office_worker: **référence** = nom qui fait référence à un objet stocké en mémoire, comme un nom fait référence à une personne (une variable est la référence d'un objet en mémoire)