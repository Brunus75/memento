# MEMENTO ET ASTUCES JAVASCRIPT


## SOMMAIRE

* [RESSOURCES](#ressources)
* [LEXIQUE](#lexique)
* [NOUVEAUTES](#nouveautes)
* [Installer un module avec NPM](#npm)
* [ES6](#es6)
* [SERVICE WEB](#service-web)
* [Récupérez des données d'un service web](#get-data-web)
* [Validez les données saisies par vos utilisateurs](#validate-data-user)
* [Sauvegardez des données sur le service web](#save-data)
* [PROGRAMMATION ASYNCHRONE](#programmation-asynchrone)
* [GERER DU CODE ASYNCHRONE](#gerer-asynchrone)
* [Parallélisez plusieurs requêtes HTTP](#parallele-http)
* [FONCTIONS](#fonctions)
* [ASTUCES](#astuces)


## RESSOURCES

* Compilez et exécutez votre code : https://openclassrooms.com/fr/courses/5543061-ecrivez-du-javascript-pour-le-web/5577766-compilez-et-executez-votre-code
* https://hacks.mozilla.org/2020/04/firefox-75-ambitions-for-april/


## LEXIQUE

* **DOM** : Document Object Model ("modèle d'objet de document") : interface de programmation qui est une représentation du HTML d'une page web   
Il faut voir le DOM comme un **arbre** où chaque élément peut avoir zéro ou plusieurs enfants   
C'est une représentation du HTML en orienté objet ; chaque élément du HTML est un **objet**
* **Promise** : objet qui devrait recevoir par la suite une valeur ou une erreur
* **Transpiler** : programme qui permet coder avec la dernière version de JavaScript tout en étant compatible avec tous les navigateurs (ex. : Babel)
* **Bundler** : programme qui va se charger de packager votre code pour qu'il tienne dans un seul fichier (ex. : Webpack)
* **Minifier** : programme responsable de la minification de votre code (ex. : node-minify, UglifyJS)
* **Linter** : programme qui va analyser notre code et détecter les erreurs de syntaxe, les variables non utilisées, les variables qui n'existent pas, la mauvaise organisation du code, le non-respect des bonnes pratiques d'écriture de code... (ex. : JSLint, ESLint.)
* **NPM** : un gestionnaire de paquets (package manager). C'est un programme qui vous permet d'installer très facilement des modules pour le JavaScript
* **Module** : bout de code écrit par quelqu'un et qui résout une problématique commune à beaucoup de développeurs : comme un parser XML, un générateur d'uuid (des identifiants uniques), un router, un framework de rendu HTML, etc.


## NOUVEAUTES

### public static field (Firefox)
* https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Classes/Class_fields#Public_static_fields
* useful when you want a field to exist only once per class, not on every class instance you create. This is particularly relevant for cache, fixed-configuration, or any other data you don’t need to replicate across instances
```js
class ClassWithStaticField {
  static staticField = 'static field'
}

console.log(ClassWithStaticField.staticField)
// expected output: "static field"​
```

### requestSubmit() (Firefox)
* The HTMLFormElement interface has a new method, **requestSubmit()**. Unlike the old (and still available) submit() method, requestSubmit() *acts as if a specified submit button has been clicked*, rather than just sending the form data to the recipient. Thus the submit event is delivered and the form is checked for validity prior to the data being submitted.
* The submit event is now represented by an object of type **SubmitEvent** rather than a simple Event. SubmitEvent includes a new *submitter* property, which returns the Element that was invoked to trigger the form submission. With this event, you can have a single handler for submit events that can discern which of multiple submit buttons or links was used to submit the form.

### Implicit to/from keyframes (Firefox)
* you are able to set a beginning or end state for an animation only (i.e., a single keyframe)
* The browser will then infer the other end of the animation if it is able to
```js
let rotate360 = [
  { transform: 'rotate(360deg)' }
];
// only specified the end state of the animation, and the beginning state is implied
```


## <a name="npm"></a> Installer un module avec NPM
```sh
npm install <module_name> --save-dev 
# sauvegarde cette dépendance dans le fichier package.json
# en tant que dépendance de développement
npm install <module_name> --save
# ajoute la dépendance en tant que dépendance de production
# plus utile depuis NPM 5+
# on préférera alors :
npm install <module_name>
```

## ES6

### Les classes
```js
    class Vehicule {
      constructor(couleur, nombreRoueMotrice) {
        this.couleur = couleur;    
        this.nombreRoueMotrice = nombreRoueMotrice;    
        this.moteurAllumer = false;    
      }
      demarrer() {
       this.moteurAllumer = true;
      }
      couperMoteur() {
       this.moteurAllumer = false;
      }
    }
```
### L'héritage avec extends et super
```js
class Vehicle {
  constructor(color, drivingWheel, isEngineStart = false) {
    this.color = color;
    this.drivingWheel = drivingWheel;
    this.isEngineStart = isEngineStart;
  }

  start() {
    this.isEngineStart = true;
  }

  stop() {
    this.isEngineStart = false;
  }
}

class Car extends Vehicle {
  constructor(color, drivingWheel, isEngineStart = false, seatings) {
    super(color, drivingWheel, isEngineStart);
    this.seatings = seatings;
  }
}

class Motorbike extends Vehicle {
  constructor(color, drivingWheel, isEngineStart = false, unleash) {
    super(color, drivingWheel, isEngineStart);
    this.unleash = unleash;
  }
}
```

### le mot-clé let
permet de déclarer une variable locale, dans le contexte (scope) où elle a été assignée.
```js
    var x = 1;
     
    if (x < 10) { 
      let v = 1; // variable asssignée à son scope (bloc d'instruction de if)
      v = v + 21;
      console.log(v); // v est définie 
    } 
     
    console.log(v); // v n'est pas définie, car v a été déclaré avec 'let' et non 'var'.

En général, garder un contexte global propre est vivement conseillé, 
et c'est pourquoi ce mot clé let est vraiment le bienvenu !
let a été pensé pour remplacer var
```

### Le nouveau mot-clé const
permet de déclarer des constantes
```js
const PI = 3.141592 ; 
Une déclaration de constante ne peut se faire qu'une fois, une fois définie, 
vous ne pouvez plus changer sa valeur.
Attention, le comportement est un peu différent pour une constante de tableau ou d'objet. 
Vous ne pouvez pas modifier la référence vers le tableau ou l'objet, 
mais vous pouvez continuer à modifier les valeurs à l'intérieur tableau, 
ou les propriétés de l'objet.
``` 

### Les fonctions fléchées
```js
ne définissent pas un nouveau contexte comme les fonctions traditionnelles
structure d'une fonction fléchée : (paramètre) => { corps de la fonction } 
La fonction suivante:

    bouton.onclick = function() {
      envoyerMail(this.email);
    }

Correspond donc à la fonction fléchée suivante:
bouton.onclick = () => { envoyerEmail(this.email); }

Une meilleure utilisation du mot-clé this 
// Cas n°1 : Confusion sur 'this'
class Person {
  constructor(firstName, email, button) {
    this.firstName = firstName;
    this.email = email;

    button.onclick = function () {
      sendEmail(this.email); // ce 'this' fait référence au bouton, et non à une instance de Personne.
    }
  }
}

// Cas n°2 : Utilisation d'une variable intermédiaire
class Person {
  constructor(firstName, email, button) {
    this.firstName = firstName;
    this.email = email;
    var that = this; // 'this' fait référence ici à l'instance de Personne

    button.onclick = function () {
      sendEmail(that.email); // 'that' fait référence à la même instance de Personne
    }
  }
}

// Cas n°3 : Utilisation des fonctions fléchées
bouton.onclick = () => { envoyerEmail(this.email); } 
// les arrow functions n'ont pas de contexte
// this fait référence à l'entité englobante, au contexte englobant 
// ici l'objet Person

// Exemple d'utilisation des fonctions fléchées avec des Promesses
getUser(userId)
  .then(user => getFriendsList(user))
  .then(friends => showFriends(friends));

le mot-clé return
// n'est pas nécessaire dans une fonction simple
var func = x => x * x;
// concise body syntax, implied "return"

var func = (x, y) => { return x + y; };
// with block body, explicit "return" needed

// When the only statement in an arrow function is `return`, 
// we can remove `return` and remove
// the surrounding curly brackets
var elements = [
  'Hydrogen',
  'Helium',
  'Lithium',
  'Beryllium'
];

elements.map(element => element.length); // [8, 6, 7, 9]
```

### Les paramètres de fonctions par défaut
En JavaScript ES6, on peut définir facilement des paramètres de fonctions avec une valeur par défaut.
```js
Imaginons une fonction qui multiplie deux nombres passés en paramètres, 
mais le deuxième paramètre est facultatif, et il vaut 1 par défaut: 

    function multiplier(a, b = 1) {
      return a * b;
    }
```

### Les collections 'Set' et 'Map'
```js
Map : tableau de paires clés-valeurs // sorte de dictionnaire
Set: liste de valeurs, sans clés

// Les Dictionnaires avec Map

let zlatan = { rank: 1, name: 'Zlatan' };
let players = new Map(); // Je crée une nouveau dictionnaire
players.set(zlatan.rank, zlatan.name); // J'ajoute lobjet 'zlatan' à la clé '1'

// Les listes avec Set

let players = new Set(); // Je crée une nouvelle liste
players.add(zlatan); // j'ajoute un joueur dans cette liste

// Méthodes pour Map et Set

players.size; // affiche le nombre d'éléments dans la collection
players.has(zlatan.rang); // Dictionnaire: affiche si le dictionnaire contient la clé (le rang) de Zlatan.
players.has(zlatan); // Liste: affiche si la liste contient le joueur Zlatan.
players.delete(zlatan.rang); // Dictionnaire: supprime un élément d'après une clef.
players.delete(zlatan); // Liste: supprime l'élément passé en paramètre.
```

### La syntaxe template string

On peut insérer des variables dans la chaîne de caractères avec ${variable}, comme ceci:
```js
let name = 'toto';
let email = 'toto@gmail.com';
console.info(`${name} a pour email: ${this.email}`);
// alt Gr + 7

// On peut écrire des strings sur plusieurs ligne grâce au backtick
let severalLinesString = `bla
blablalbalblalballb
balblablalabla
b
ablablablabbl`;
```

### Tous les changements: http://es6-features.org/#Constants

### Les promesses
simplifier la programmation asynchrone   
callbacks, fonctions anonymes appelées dans l'appli   
code plus efficace et plus élégant    
```js
/* Les promesses (ES5) */

// Utilisation de base
getUser(userId, function (user) {
  getFriendsList(user, function (friends) {
    showFriends(friends);
  });
});

// Utilisation avec des Promesses
getUser(userId)
  .then(function (user) {
    getFriendsList(user);
  })
  .then(function (friends) {
    showFriends(friends);
  });

// Déclarer une Promesse
let getUser = function (userId) {
  return new Promise(function (resolve, reject) {
    // new Promise(function (succes, erreur))
    // appel asynchrone au serveur pour récupérer les informations d'un utilisateur...
    // à partir de la réponse du serveur, j'extrais les données de l'utilisateur :
    let user = response.data.user;

    if (response.status === 200) {
      resolve(user); // appelle fonction de succes
    } else {
      reject('Cet utilisateur n\'existe pas.'); // appelle fonction d'erreur
    }
  })
}

// Traiter une Promesse
getUser(userId)
  .then(function (user) {
    console.log(user); // en cas de succés
  }, function (error) {
    console.log(error); // en cas d'erreur
  });
```

## SERVICE WEB

## Service web
* service web = un programme s'exécutant sur un serveur accessible depuis Internet et répondant à des demandes, appelées **requêtes**
* Les requêtes sont des données qui respectent le protocole de communication et qui sont envoyées au serveur
* Nous avons donc un protocole pour l'envoi de mail (SMTP), la réception de mail (IMAP), les requêtes liées à des ressources web (HTTP), aux transferts de fichiers (FTP), etc.
* le protocole nous permettant de communiquer avec un site Internet : le protocole HTTP

### Le Protocole HTTP
* HTTP signifie HyperText Transfer Protocol
* C'est un protocole qui permet de communiquer avec un site Internet
* Les codes HTTP permettront d'avoir plus d'informations sur le résultat renvoyé par le service web (succès, erreur...).   
   * Les codes de 100 à 199 sont des codes d'information
   * Les codes de 200 à 299 sont des codes de succès
   * Les codes de 300 à 399 sont les codes de redirection
   * Les codes de 400 à 499 sont des codes d'erreur liés à l'utilisation du service web (ressource inexistante, authentification requise, pas les bonnes permissions, requête mal construite, etc)
   * Les codes de 500 à 599 sont des codes d'erreur venant du service web (plantage du service, service ne répondant plus, manque de mémoire, etc.).
   * 200 : indique que tout s'est bien passé
   * 201 : indique que tout s'est bien passé et qu'une nouvelle ressource a bien été créée
   * 204 : indique que tout s'est bien passé mais qu'aucun résultat n'est renvoyé
   * 400 : indique qu'une requête est erronée
   * 401 : indique que l'utilisateur n'est pas authentifié, alors que c'est nécessaire
   * 403 : indique que l'utilisateur n'a pas le droit d'accéder à cette ressource
   * 404 : indique que la ressource demandée n'existe pas
   * 500 : indique que le serveur a subi une erreur interne
* Les méthodes HTTP permettent d'identifier le type de requête que vous souhaitez faire   
   * GET : permet de récupérer des ressources, comme par exemple le temps actuel sur un service de météo
   * POST : permet de créer ou modifier une ressource, comme la création d'un nouvel utilisateur sur votre application
   * PUT : permet de modifier une ressource, comme le nom de l'utilisateur que vous venez de créer avec POST
   * DELETE : Permet de supprimer une ressource, comme un commentaire dans un fil de discussion

### UNE API
* API signifie Application Programming Interface
* interface mettant à disposition des points d'accès vers les ressources de l'application
* service web qui permet de faire toute une série de requêtes couvrant les fonctionnalités mises à disposition par le site web ou l'application


## <a name="get-data-web"></a> Récupérez des données d'un service web

### AJAX
* AJAX = Asynchronous JavaScript And XML
* ensemble d'objets et de fonctions mis à disposition par le langage JavaScript, afin d'exécuter des requêtes HTTP de manière asynchrone
* AJAX va nous permettre d'exécuter des requêtes HTTP sans avoir besoin de recharger la page du navigateur

### Envoyez une première requête
```js
var request = new XMLHttpRequest(); // correspond à notre objet AJAX. C'est grâce à lui qu'on va créer et envoyer notre requête
request.open("GET", "http://url-service-web.com/api/users"); // on demande à ouvrir une connexion vers un service web. C'est ici que l'on précise quelle méthode HTTP on souhaite, ainsi que l'URL du service web
request.send(); // envoi de la requête au site web
```

### Récupérez les données au format JSON
* Un service web peut choisir le format qu'il veut pour nous renvoyer des données, mais le plus courant et le plus simple est le format JSON
* JSON signifie JavaScript Object Notation
* Il s'agit d'un format textuel se rapprochant en termes de syntaxe de celui des objets dans le langage JavaScript
* votre navigateur sait directement le lire et le transformer en objets JavaScript
* format léger, qui ne demande pas être parsé (notre application n'a pas besoin de le lire et le comprendre afin d'en faire ce qu'on veut)
* Pour récupérer le résultat des la requête, nous allons devoir utiliser la propriété  *onreadystatechange* en lui passant une fonction. Cette fonction sera appelée à chaque fois que l'état de la requête évolue.
* Voici les différents états possibles :   
   * UNSENT (code 0) : l'objet est prêt mais la méthode open() n'a pas encore été appelée
   * OPENED (code 1) : open() a été appelé
   * HEADERS_RECEIVED (code 2) : send() a été appelé, les headers et status sont disponibles au sein de l'objet
   * LOADING (code 3) : réception en cours, les données reçues sont partielles
   * DONE (code 4) : requête terminée (c'est à ce moment-là que la requête est terminée et que nous venons de recevoir le résultat du service web)
* Pour récupérer l'état actuel de la requête, la fonction que l'on passe à *onreadystatechange* contiendra un objet  *this*  directement accessible dans la fonction, et qui nous permettra d'accéder aux propriétés suivantes :   
   * readyState : qui contient l'état de la requête
   * status : qui contient le code de statut de la requête
   * responseText : qui contient la réponse du service web au format texte. Ainsi, si le texte que l'on attend est au format JSON, il va falloir le transformer en objet JavaScript avec la fonction  JSON.parse(texteJSON)
* Voici comment procéder pour récupérer la météo actuelle sur Paris avec l'API fournie par www.prevision-meteo.ch :
```js
const request = new XMLHttpRequest();
request.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
        const response = JSON.parse(this.responseText);
        console.log(response.current_condition.condition);
    }
};
request.open("GET", "https://www.prevision-meteo.ch/services/json/paris");
request.send();
```

## <a name="validate-data-user"></a> Validez les données saisies par vos utilisateurs

### Validez les données suite à des événements
* vous pouvez écouter l'événement *onChange* pour vérifier la donnée, dès que l'utilisateur a fini de l'éditer
* vous pouvez écouter l'événement *onInput* pour vérifier la donnée à chaque nouveau caractère
* vous pouvez vérifier que ce qui est saisi commence par Hello avec le code suivant :
```js
myInput.addEventListener('input', function(e) {
    var value = e.target.value;
    if (value.startsWith('Hello ')) {
        isValid = true;
    } else {
        isValid = false;
    }
});
```

### Faites une validation plus complexe avec les Regex
* si l'on veut savoir si notre texte commence par la lettre e et est suivi d'au moins 3 chiffres, on écrira la regex suivante :
```js
function isValid(value) {
    return /^e[0-9]{3,}$/.test(value);
}
```

### Les contraintes HTML5
* https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Constraint_validation
* L'attribut type pour les inputs : text, password, email, tel, URL, date et bien d'autres
* Les attributs de validation simples : en fonction du  type  de l'input , vous pouvez utiliser différents attributs pour perfectionner votre validation :   
   * min / max  : fonctionne avec des champs de type nombre ou date. Cela permet de définir une valeur minimum et une valeur maximum autorisées
   * required : fonctionne avec à peu près tous les types de champs. Cela rend obligatoire le remplissage de ce champ
   * step : fonctionne avec les dates ou les nombres. Cela permet de définir une valeur d'incrément lorsque vous changez la valeur du champ via les flèches
   * minlength / maxlength : fonctionne avec les champs textuels (text, url, tel, email...). Cela permet de définir un nombre de caractères minimum et maximum autorisé
* Les patterns imposés avec regex
```html
<input type="text" pattern="[0-9]{,3}" />
<!-- empêchera un utilisateur d'entrer autre chose que des chiffres, et limitera leur nombre à 3 chiffres -->
```

## <a name="save-data"></a> Sauvegardez des données sur le service web

* méthodes HTTP = *verbs*
* Afin d'envoyer des données à un service web avec la méthode POST via AJAX, nous allons devoir passer par la méthode **send()** en lui passant en paramètres les données à envoyer
* **headers** = en-têtes envoyés en même temps que la requête pour donner plus d'informations sur celle-ci
```js
const request = new XMLHttpRequest();
request.open("POST", "http://url-service-web.com/api/users");
request.setRequestHeader("Content-Type", "application/json"); // prévient notre service web qu'il va recevoir du JSON
request.send(JSON.stringify(jsonBody));
// la fonction JSON.stringify(json) transforme notre objet JavaScript en JSON
```


## PROGRAMMATION ASYNCHRONE

### Fonctionnement de l'asynchrone en JS
* JavaScript est **synchrone et mono-thread** = il n'y a qu'un seul fil d'exécution du code source   
* code **synchrone** = code qui s'exécute **ligne après ligne en attendant la fin de l'exécution** de la ligne précédente   
* code **asynchrone** va s'exécuter ligne après ligne, mais **la ligne suivante n'attendra pas que la ligne asynchrone ait fini son exécution**   
* lorsque l'on demande à exécuter une fonction de façon asynchrone, la fonction en question est placée dans une sorte de **file d'attente** qui va exécuter toutes les fonctions qu'elle contient les unes après les autres. C'est ce qu'on appelle l'**event loop**
* L'**event loop** = tunnel mono-thread dans lequel on va mettre en file d'attente des fonctions pour décaler leur exécution

### Exemples de fonctions asynchrones
* la fonction setTimeout
```js
setTimeout(function() {
    console.log("I'm here!") // fonction à exécuter
}, 5000); // au bout de XXX millisecondes

console.log("Where are you?"); // s'affichera avant "I'm here !"
```
* la fonction setInterval
fonctionne exactement comme setTimeout, à ceci près qu'elle exécute la fonction passée en paramètre en boucle à une fréquence déterminée par le temps en millisecondes passé en second paramètre
* la fonction setImmediate
prend en seul paramètre la fonction à exécuter de façon synchrone.  La fonction en question sera placée dans la file d'attente de l'event loop, mais va passer devant toutes les autres fonctions, sauf certaines spécifiques au Javascript : les événements, le rendu, et l'I/O.   
Il existe aussi nextTick, qui permet, là, de court-circuiter tout le monde. À utiliser avec précaution, donc...

### Le cas de l'I/O

L'I/O correspond aux événements liés à l'input (les flux d'entrée) et l'output (les flux de sortie). Cela correspond notamment à la lecture/écriture des fichiers, aux requêtes HTTP, etc.   
lorsque l'on exécute la fonction send() lors d'une requête HTTP, celle-ci ne bloquait pas l'exécution du code


## <a name="gerer-asynchrone"></a> GERER DU CODE ASYNCHRONE

### Callbacks

* Une callback est simplement une fonction que vous définissez
* Le principe de la callback est de la **passer en paramètre** d'une fonction asynchrone
* Une fois que la fonction asynchrone a fini sa tâche, elle va appeler notre fonction callback en lui passant un **résultat**
* Les événements sont un exemple typique de fonction asynchrone à laquelle on passe une fonction callback
```js
element.addEventListener('click', function(e) { // fonction de callback
    // elle est appelée plus tard, dès que l'utilisateur clique sur l'élément
    // Ça ne bloque donc pas l'exécution du code et c'est donc asynchrone
});
```
* la fonction que nous passons en paramètre à setTimeout est une callback
* Pour gérer les **erreurs** avec les callbacks, la méthode la plus utilisée est de **prendre 2 paramètres** dans notre callback
* Le 2e paramètre est notre donnée et le 1er est l'erreur
```js
fs.readFile(filePath, function(err, data) {
    if (err) {
        throw err;
    }
    // Do something with data
});
```

### Promises

* un peu plus complexes mais bien plus puissantes et faciles à lire que les callbacks
* Lorsque l'on exécute du code asynchrone, celui-ci va immédiatement nous retourner une **"promesse"** qu'un résultat nous sera envoyé prochainement
* Cette promesse est en fait un objet **Promise** qui peut être **resolve** avec un résultat, ou **reject** avec une erreur
* **Promise** : objet JavaScript qui devrait recevoir par la suite une valeur ou une erreur
* Lorsque l'on récupère une Promise, on peut utiliser sa fonction **then()** pour exécuter du code dès que la promesse est résolue, et sa fonction **catch()** pour exécuter du code dès qu'une erreur est survenue
```js
functionThatReturnsAPromise()
    .then(function(data) {
        // Do somthing with data 
    })
    .catch(function(err) {
        // Do something with error
    });
```
* Le gros avantage est que l'on peut aussi **chaîner** les Promises
* Ainsi, la valeur que l'on retourne dans la fonction que l'on passe à  then() est transformée en une nouvelle Promise résolue, que l'on peut utiliser avec une nouvelle fonction then()
* Si notre fonction retourne par contre une exception, alors une nouvelle Promise rejetée est créée et on peut l'intercepter avec la fonction catch().   
Mais si la fonction que l'on a passée à catch() retourne une nouvelle valeur, alors on a à nouveau une  Promise résolue que l'on peut utiliser avec une fonction then(), etc
```js
returnAPromiseWithNumber2()
    .then(function(data) { // Data is 2
        return data + 1;
    })
    .then(function(data) { // Data is 3
        throw new Error('error');
    })
    .then(function(data) {
        // Not executed  
    })
    .catch(function(err) {
        return 5;
    })
    .then(function(data) { // Data is 5
        // Do something
    });
```

### Async/await

* 2 nouveaux mots clés qui permettent de gérer le code asynchrone de manière beaucoup plus intuitive
* en bloquant l'exécution d'un code asynchrone jusqu'à ce qu'il retourne un résultat
```js
async function fonctionAsynchrone1() {/* code asynchrone */}
async function fonctionAsynchrone2() {/* code asynchrone */}

// Quand on utilise async et await,
// une fonction asynchrone doit avoir le mot clé async avant la fonction
async function fonctionAsynchrone3() {
 const value1 = await fonctionAsynchrone1();
 const value2 = await fonctionAsynchrone2();
 return value1 + value2;
}
```
* async / await utilisent les Promises en arrière-plan, il est donc possible d'utiliser les 2 en même temps
* async / await utilisant les Promises, la levée d'une erreur se fait aussi par une **exception**
* Pour intercepter cette erreur, par contre, il suffit d'exécuter notre code asynchrone dans un **bloc  try {} catch (e) {}**, l'erreur étant envoyée dans le catch

### Exercice

* Dans un premier temps nous allons créer une fonction asynchrone (avec async) qui s'appelle compute et qui va récupérer les résultats des 2 fonctions asynchrones getNumber1() et getNumber2() (avec await) et renvoyer la somme des 2 valeurs récupérées.   
* Maintenant nous allons appeler notre fonction compute() et utiliser sa valeur de retour comme une Promise pour finalement afficher le résultat de la promesse dans le contenu HTML de l'élément ayant pour ID result
```js

async function getNumber1() {
  return 10;
}

async function getNumber2() {
  return 4;
}

async function compute() {
  const number1 = await getNumber1();
  const number2 = await getNumber2();
  return number1 + number2
}

compute()
  .then(function(data) {
  const result = document.getElementById('result');
  result.textContent = data;
})
```

### Exercice 2
```js
async function func1() {
  return 3;
}

async function func2() {
  return 4;
}

const promiseRes = 
  Promise
    // nous exécutons 2 fonctions asynchrones en parallèle
    .all([func1(), func2()])
    .then(function(results) {
        // va appeler reduce sur la liste de résultats (3, et 4) 
        // et multiplier les valeurs entre elles avec une valeur initiale de 2, 
        // soit :  2 * 3 * 4 = 24
        return results.reduce(function(acc, res) {
            return acc * res;
        }, 2);
    })
    // Le résultat est passé à la prochaine fonction then(), 
    // qui va appeler une callback après time secondes,
    // time  correspondant ici à 24, le résultat du précédent then()
    .then(function(time) {
        // on retourne le résultat de la fonction setTimeout(),  
        // promiseRes contient donc une Promise qui sera résolue avec l'identifiant
        // de la fonction setTimeout retourné
        return setTimeout(callback, time * 1000);
    });
```


## <a name="parallele-http"></a> Parallélisez plusieurs requêtes HTTP

* Objectif : voir comment **enchaîner** les requêtes HTTP en exécutant 2 requêtes GET en même temps (en parallèle), puis 1 requête POST une fois que les 2 requêtes précédentes sont terminées (en séquence)

### Enchaînez des requêtes avec les callbacks

* But : faire nos 2 requêtes **en parallèle**, suivies d'une requête en séquence avec les callbacks
```js
// Pour cet exemple, nous partons du principe que nous avons accès à 2 fonctions (get et post) 
// qui font respectivement une requête GET et une requête POST
// quand on leur passe en paramètre l'URL de la requête, 
// et une callback à exécuter quand on a le résultat (avec une variable d'erreur en premier paramètre)
let GETRequestCount = 0;
let GETRequestResults = [];

function onGETRequestDone(err, result) {
    if (err) throw err;
    
    GETRequestCount++; // 2) on incrémente le nombre de requête dans le callback
    GETRequestResults.push(result); // 3) on conserve les réponses des requêtes GET
    
    // 4) nous voulons exécuter une requête POST 
    // une fois que les 2 requêtes GET sont terminées,
    // et pas avant !
    if (GETRequestCount == 2) {
        post(url3, function(err, result) {
            if (err) throw err;
            
            // We are done here !
        });
    }
}

// 1) Afin d'exécuter 2 requêtes GET en même temps, nous pouvons appeler 2 fois la fonction  get(). Étant donné que cette fonction est asynchrone, elle ne bloquera pas l'exécution du code. 
// Ainsi l'autre fonction get() sera aussi appelée alors que la première ne sera pas encore terminée. C'est comme ça qu'on peut avoir 2 requêtes en parallèle
get(url1, onGETRequestDone);
get(url2, onGETRequestDone);
```

### Enchaînez des requêtes avec les Promises

* Grâce à la fonction Promise.all, nous pouvons exécuter nos requêtes en parallèle et en séquence avec les Promises
```js
// Pour cet exemple, nous partons du principe que nous avons accès à 2 fonctions (get et post) 
// qui font respectivement une requête GET et une requête POST
// quand on leur passe en paramètre l'URL de la requête. 
// Ces fonctions retourneront une Promise avec le résultat de la requête.

// la fonction Promise.all prend en paramètre une liste de Promise
// et qui permet de toutes les exécuter en parallèle 
// et de retourner une nouvelle Promise qui sera résolue 
// quand toutes les Promise seront résolues
Promise.all([get(url1), get(url2)])
    // la fonction then() recevra les résultats de toutes les Promise 
    // sous forme d'un tableau
    .then(function(results) {
        // exécute notre requête POST avec les résultats des requêtes GET
        // une fois que les requêtes GET sont terminées
        return Promise.all([results, post(url3)]];
        // Promise.all considère les simples valeurs comme des Promise résolues
    })
    .then(function(allResults) {
        // We are done here !
        // récupére une liste qui contient les résultats des requêtes GET
        // et le résultat de la requête POST : 
        // allResults = [ [ getResult1, getResult2 ], postResult ] . 
    });
```

### Enchaînez des requêtes avec async/await

```js
// Pour cet exemple, nous partons du principe que nous avons accès à 2 fonctions (get et post) 
// qui font respectivement une requête GET et une requête POST
// quand on leur passe en paramètre l'URL de la requête. 
// Ces fonctions sont asynchrones (avec le mot clé async).

async function requests() {
    const getResults = await Promise.all([get(url1), get(url2)]);
    const postResult = await post(url3);
    return [getResults, postResult];
}

requests().then(function(allResults) {
    // We are done here !
});
```


## FONCTIONS

### reduce()

* applique une fonction qui est un « accumulateur » et qui traite chaque valeur d'une liste (de la gauche vers la droite) afin de la réduire à une seule valeur
* réunit toutes les valeurs grâce à une fonction qui précise l'opération pour les relier
```js
const array1 = [1, 2, 3, 4];
// si l'on veut additionner toutes les valeurs du tableau :
const reducer = (accumulator, currentValue) => accumulator + currentValue;
// si l'on veut multiplier toutes les valeurs du tableau
const reducer2 = (accumulator, currentValue) => accumulator * currentValue;

// 1 + 2 + 3 + 4
console.log(array1.reduce(reducer));
// expected output: 10

// 1 * 2 * 3 * 4
console.log(array1.reduce(reducer2));
// expected output: 24

// 5 + 1 + 2 + 3 + 4
// on ajoute 5 à l'opération
console.log(array1.reduce(reducer, 5)); 
// expected output: 15

// 5 * 1 * 2 * 3 * 4
// on ajoute 5 à l'opération
console.log(array1.reduce(reducer2, 5));
// expected output: 120
```


## ASTUCES

### Nullish coalescing operator
```js
// The nullish coalescing operator, ??, returns its right-hand side operand 
// when its left-hand side operand is null or undefined. 
// Otherwise, it returns its left-hand side operand.
let value;
value = value ?? 'default';
```

### Trouver un élément dans un tableau
```js
// la méthode find retourne la valeur du premier élément
// qui justifie la condition
// ex.
const pokemons = [
    {
        id: 1,
        name: "Bulbizarre"
    },
    {
        id: 2,
        name: "Salamèche"
    },
    {
        id: 3,
        name: "Carapuce"
    }
];

let id = 2; // le pokemon à trouver

const pokemon = pokemons.find(
    (pokemon) => { return pokemon.id === id }
    // retourne le pokemon à l'id indiqué
)

console.log(pokemon.name) // Salamèche
```

### Caster une chaine de caractères en nombre
```js
number = "8";
console.log(+number); // 8
console.log(+number + 8); // 16
```