# MEMENTO ET ASTUCES JAVASCRIPT


## SOMMAIRE

* [RESSOURCES](#ressources)
* [LEXIQUE](#lexique)
* [CHEATSHEET](#cheatsheet)
* [NOUVEAUTES](#nouveautes)
* [Installer un module avec NPM](#npm)
* [ES6 (2015)](#es6)
* [ES7 (2016)](#es7)
* [ES8 (2017)](#es8)
* [ES9 (2018)](#es9)
* [ES10 (2019)](#es10)
* [SERVICE WEB](#service-web)
* [Récupérez des données d'un service web](#get-data-web)
* [Validez les données saisies par vos utilisateurs](#validate-data-user)
* [Sauvegardez des données sur le service web](#save-data)
* [PROGRAMMATION ASYNCHRONE](#programmation-asynchrone)
* [GERER DU CODE ASYNCHRONE](#gerer-asynchrone)
* [Parallélisez plusieurs requêtes HTTP](#parallele-http)
* [FETCH API](#fetch-api)
* [FONCTIONS](#fonctions)
* [JavaScript Array Functions Cheatsheet](#javascript-array-functions-cheatsheet)
* [ASTUCES](#astuces)


## RESSOURCES

* Compilez et exécutez votre code : https://openclassrooms.com/fr/courses/5543061-ecrivez-du-javascript-pour-le-web/5577766-compilez-et-executez-votre-code
* https://hacks.mozilla.org/2020/04/firefox-75-ambitions-for-april/
* https://medium.com/@remi.michel38/javascript-a-la-d%C3%A9couverte-des2020-44a0affcc9ec
* ~ Python vs JavaScript for Pythonistas : https://realpython.com/python-vs-javascript/
* JavaScript Object Functions Cheat Sheet : https://wweb.dev/resources/js-object-functions-cheatsheet
* Les 15 meilleures librairies JavaScript à essayer : https://www.codeur.com/blog/meilleures-librairies-javascript/
* Introduction to Maps in JavaScript – All You Need to Know : https://blog.alexdevero.com/maps-in-javascript 
* What Javascript Spread Operator is, How It Works and How to Use It : https://blog.alexdevero.com/javascript-spread-operator/
* Private Class Fields and Methods in JavaScript Classes : https://blog.alexdevero.com/javascript-private-class-fields-methods
* Optional Chaining in JavaScript and How It Works : https://blog.alexdevero.com/optional-chaining-javascript
* JavaScript, ES6, ES7, ES10 where are we? : https://medium.com/engineered-publicis-sapient/javascript-es6-es7-es10-where-are-we-8ac044dfd964
* Loop Over querySelectorAll Matches : https://css-tricks.com/snippets/javascript/loop-queryselectorall-matches/
* JavaScript Cheat Sheet : https://websitesetup.org/javascript-cheat-sheet/
* What WeakSet in JavaScript is and How It Works : https://blog.alexdevero.com/weakset-in-javascript
*  Features I Wish I’d Known About ES6 & ES7 : https://dev.to/pixelplex/features-i-wish-i-d-known-about-es6-es7-42ff
* Utiliser les différents tests d'égalité : https://developer.mozilla.org/fr/docs/Web/JavaScript/Les_diff%C3%A9rents_tests_d_%C3%A9galit%C3%A9

### TO READ
* ES6, ES7 & ES8, TIME to update your JavaScript / ECMAScript! : https://www.udemy.com/course/es6-es7-and-es8-its-time-to-update-your-javascript/?deal_code=EXPLORENOW0920&utm_source=email-Adhoc&utm_campaign=2020-09-26_._cn_UDEMY_BASICS_09_26_2020_._en_XPOLL_._us_AllAlltl_T1_._tg_n_.__._la_fr_._rn_2020-09-26_._&utm_medium=2020-09-26_UDEMY_BASICS_09_26_2020_XPOLL_AllAll_T1_n&utm_content=udemy.17485945&data_h=CEcSc1xWTHw%3D&utm_term=CROSS_POLL_CAT_SUBCAT_2
* https://blog.alexdevero.com/es6-es7-es8-modern-javascript-pt6/
* https://www.cronj.com/blog/javascript-es7-es8-new-features/
* https://derickbailey.com/2017/06/06/3-features-of-es7-and-beyond-that-you-should-be-using-now/
* https://www.freecodecamp.org/news/es5-to-esnext-heres-every-feature-added-to-javascript-since-2015-d0c255e13c6e/
* Understanding the Event Loop, Callbacks, Promises, and Async/Await in JavaScript : https://www.taniarascia.com/asynchronous-javascript-event-loop-callbacks-promises-async-await/

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
* **WeakSets** : Set qui ne peut contenir que des objets uniques et qui n'est pas itérable et qui n'a pas de propriété size

## CHEATSHEET

* JavaScript Cheat Sheet : https://websitesetup.org/javascript-cheat-sheet/


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
* permet de déclarer une variable locale, dans le contexte (scope) où elle a été assignée.
* block-scoped (a block is anything between { } )
```js
    var x = 1;
     
    if (x < 10) { 
      let v = 1; // variable asssignée à son scope (bloc d'instruction de if)
      v = v + 21;
      console.log(v); // v est définie 
    } 
     
    console.log(v); // v n'est pas définie, car v a été déclaré avec 'let' et non 'var'.

En général, garder un contexte global propre est vivement conseillé, 
et c''est pourquoi ce mot clé let est vraiment le bienvenu !
let a été pensé pour remplacer var
```

### Le nouveau mot-clé const
* permet de déclarer des constantes
* block-scoped (a block is anything between { } )
```js
const PI = 3.141592 ; 
Une déclaration de constante ne peut se faire qu''une fois, une fois définie, 
vous ne pouvez plus changer sa valeur.
Attention, le comportement est un peu différent pour une constante de tableau ou d''objet. 
Vous ne pouvez pas modifier la référence vers le tableau ou l''objet, 
mais vous pouvez continuer à modifier les valeurs à l''intérieur tableau, 
ou les propriétés de l''objet.
``` 

### Les fonctions fléchées
```js
ne définissent pas un nouveau contexte comme les fonctions traditionnelles
structure d''une fonction fléchée : (paramètre) => { corps de la fonction } 
La fonction suivante:

    bouton.onclick = function() {
      envoyerMail(this.email);
    }

Correspond donc à la fonction fléchée suivante:
bouton.onclick = () => { envoyerEmail(this.email); }

// exemples
const sumTwoNumbers = (num1, num2) => { return num1 + num2; }
// ↓ pas de return car instruction tient sur une ligne
const sumTwoNumbers = (num1, num2) => num1 + num2;
// ↓ In case we have only have one parameter we can remove the parentheses
const multiplyBy10 = num => num * 10;


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

// in arrow function ```this``` represents the definition context 
// while in regular function ```this``` represents the execution context

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
* En JavaScript ES6, on peut définir facilement des paramètres de fonctions avec une valeur par défaut.
```js
// Imaginons une fonction qui multiplie deux nombres passés en paramètres, 
// mais le deuxième paramètre est facultatif, et il vaut 1 par défaut: 

    function multiplier(a, b = 1) {
      return a * b;
    }
```
* (! Note) Keep in mind to keep all default parameters to the right otherwise you won’t get the proper result.
```js
// Don't do this 
function add(a = 4, b) {
    return a + b
}

add(1) // result = NaN

// the right way 
function add(a, b = 4) {
    return a + b
}
add(1) // result = 5
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

### for...of loop
* https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Instructions/for...of
```js
const array1 = ['a', 'b', 'c'];

for (const element of array1) {
  console.log(element);
}

// expected output: "a"
// expected output: "b"
// expected output: "c"
```

###  Destruction assignment
* https://dev.to/pixelplex/features-i-wish-i-d-known-about-es6-es7-42ff
```js
let colors = ['one', 'two', 'three']

let [red, blue, yellow] = colors

console.log(red);      // one
console.log(blue);     // two 
console.log(yellow);   // three

// swaping values
let a = 5;
let b = 10;

[a, b] = [b, a]

console.log(a);   // a = 10
console.log(b);   // b = 5


// object destruction:
const user = {
    id: 1,
    name: "Ali",
    age: "30"
}

// lets extract the user name only
const { name } = user

console.log(name);  // Ali


// Using destruction and default values
const user = {
    id: 1,
    name: "Ali",
}

const { name, age = 55 } = user

console.log(age);  // 55
```
### Generators
* https://dev.to/pixelplex/features-i-wish-i-d-known-about-es6-es7-42ff
```js
function* numberGenerator() {
    yield 1; // sorte de return
    yield 2;
    return 3; // return final
}

let generator = numberGenerator();

let one = generator.next();
let two = generator.next();
let last = generator.next();

console.log(one);    // { value: 1, done: false }
console.log(two);    // { value: 2, done: false }
console.log(last);   // { value: 3, done: true }
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

## ES7

### The exponentiation operator **
* https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Exponentiation
```js
// avant :
let result = Math.pow(2, 3)
console.log(result)  // 8

// maintenant :
let a = 2 ** 3
let b = 3 ** 3
console.log(a === Math.pow(2, 3)) // true
console.log(b === Math.pow(3, 3)) // true

// Basic exponentiation
2 ** 3   // 8
3 ** 2   // 9
3 ** 2.5 // 15.588457268119896
10 ** -1 // 0.1
NaN ** 2 // NaN

myNumber = 2 ** 3;
console.log(myNumber) // 8

console.log(3 ** 4);
// expected output: 81

console.log(10 ** -2);
// expected output: 0.01

console.log(2 ** 3 ** 2);
// expected output: 512

console.log((2 ** 3) ** 2);
// expected output: 64

-2 ** 2; 
// 4 in Bash, -4 in other languages. 
// This is invalid in JavaScript, as the operation is ambiguous. 

-(2 ** 2); 
// -4 in JavaScript and the author's intention is unambiguous. 
```

### Array includes
* https://dev.to/pixelplex/features-i-wish-i-d-known-about-es6-es7-42ff
```js
array.includes(myItem) // true or false

// exemple
let colors = ['red', 'white', 'black', 'blue']

// using indexOf 
console.log(colors.indexOf('red'));     // 0
console.log(colors.indexOf('purple'));  // -1

if (colors.indexOf('purple') === -1) {
    console.log("Not found");
}

// using includes 
console.log(colors.includes('red'));      // true
console.log(colors.includes('purple'));  // false

if (!colors.includes('purple')) {
    console.log("Not found");
}
```

## ES8

### Async / Await functions
```js
async MyAjaxGetCall(url) {
  return ajax.get(url)
}
const response = await MyAjaxGetCall("/getUsers");
console.log(response) // response is available without using promise.then
```

### Object.entries / Object.values (Array’s values / key equivalence for objects)

### String padding
* Remplacer le début/fin d'un String
* https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/String/padStart
* https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/String/padEnd
* str.padStart(longueurCible [, chaîneComplémentaire])
```js
const str1 = '5';

console.log(str1.padStart(2, '0'));
// expected output: "05"

const fullNumber = '2034399002125581';
const last4Digits = fullNumber.slice(-4);
const maskedNumber = last4Digits.padStart(fullNumber.length, '*');

console.log(maskedNumber);
// expected output: "************5581"

'abc'.padStart(10);         // "        abc"
'abc'.padStart(10, "toto"); // "totototabc"
'abc'.padStart(6,"123465"); // "123abc"
'abc'.padStart(8, "0");     // "00000abc"
'abc'.padStart(1);          // "abc"
```

### Trailing comma
* https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Virgules_finales
```js
function test(a,b,c, ) // notice the comma after c
```

## ES9

* Promise.finally
* Object destructuring
```js
myNewObject = {a,b,c, …object};
```

## ES10

* Array.flat
```js
[[1,2],3]).flat() // [1,2,3]
```
* Array.flatMap: equivalent of map().flat()
* String.trimStart() & String.trimEnd(): Remove extra spaces in a string
* Optional Catch binding: remove the need to add a param to the catch
```js
(Now you can do } catch {instead of } catch(e) {
```
* BigInt
```js
const theBiggestInt = 9007199254740991n

const alsoHuge = BigInt(9007199254740991)
// ↪ 9007199254740991n

const hugeString = BigInt("9007199254740991")
// ↪ 9007199254740991n

const hugeHex = BigInt("0x1fffffffffffff")
// ↪ 9007199254740991n

const hugeBin = BigInt("0b11111111111111111111111111111111111111111111111111111")
// ↪ 9007199254740991n
```
* Array.sort now retains order if keys are equal
```js
const array = [
 {key: 2, value: 'd'},
 {key: 1, value: 'a'},
 {key: 1, value: 'b'},
 {key: 1, value: 'c'},
];array.sort(...)/*
[
 {key: 1, value: 'a'},
 {key: 1, value: 'b'},
 {key: 1, value: 'c'},
 {key: 2, value: 'd'},
]
*/
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

## FETCH API

* Remplace XMLHttpRequest de JS et ajax() de Jquery
* JS moderne
* https://blog.alexdevero.com/javascript-fetch-api
* https://developer.mozilla.org/en-US/docs/Web/API/WindowOrWorkerGlobalScope/fetch
```js
// Fetch syntax
fetch(someURL, {})

// or with optional config object
fetch(someURL, {/* settings go here */})


// WITH PROMISE HANDLER FUNCTIONS
// Use fetch() method with promise handler functions
fetch(someUrl)
  .then(response => {
    // When promise gets resolved
    // log received data to console
    console.log(response)
  })
  .catch(error => {
    // If promise gets rejected
    // log the error to console
    console.log(error)
  })


// Real-world example
fetch('https://sv443.net/jokeapi/v2/joke/Programming')
  // Convert response to JSON format
  .then(response => response.json())
  // Log the response JSON
  .then(jsonData => console.log(jsonData))
  .catch(error => {
    // If promise gets rejected
    // log the error to console
    console.log(error)
  })

// Output:
// {
//   error: false,
//   category: 'Programming',
//   type: 'twopart',
//   setup: 'Programming is like sex.',
//   delivery: 'Make one mistake and you end up supporting it for the rest of your life.',
//   flags: {
//     nsfw: true,
//     religious: false,
//     political: false,
//     racist: false,
//     sexist: false
//   },
//   id: 8,
//   lang: 'en'
// }

// It is a good practice to put the then() function(s) as first and the catch() as second. 
// If you also use finally(), it is a good practice to put that one as the last

// WITH AWAIT
// Create async function
async function makeRequest() {
  // Use try...catch statement
  try {
    // Use await and make fetch request
    const responseData = await fetch('https://sv443.net/jokeapi/v2/joke/Any')
    // Convert the response to JSON format
    const responseJSON = await responseData.json()

    // Log the converted JSON
    console.log(responseJSON)
  }
  catch (error) {
    // Log any error
    console.log(error)
  }
}

// Call the makeRequest()
makeRequest()
// Output:
// {
//   error: false,
//   category: 'Miscellaneous',
//   type: 'twopart',
//   setup: "Mom asked me where I'm taking her to go out to eat for mother's day.",
//   delivery: 'I told her, "We already have food in the house".',
//   flags: {
//     nsfw: false,
//     religious: false,
//     political: false,
//     racist: false,
//     sexist: false
//   },
//   id: 89,
//   lang: 'en'
// }

// PROCESSING THE RESPONSE
// So, if you are not sure what type of response you should expect, use text(). 
// In the worst case, you will get some stringified JSON and you will know that 
// you should use json() instead. 
// If you expect other format, use corresponding method: response.formData(), response.blob()
// or response.arrayBuffer()

// Example no.1:
// Parsing response as a text
async function makeRequest() {
  // Use try...catch statement
  try {
    // Make fetch request
    const responseData = await fetch('https://sv443.net/jokeapi/v2/joke/Programming')

    // Parsing as Text happens here:
    // Parse the response as a text
    const responseText = await responseData.text()

    // Log the text
    console.log(responseText)
  }
  catch (error) {
    // Log any error
    console.log(error)
  }
}

// Call the makeRequest()
makeRequest()
// Output:
// '{
//   error: false,
//   category: 'Programming',
//   type: 'single',
//   joke: 'Programming is 10% science, 20% ingenuity, and 70% getting the ingenuity to work with the science.',
//   flags: {
//     nsfw: false,
//     religious: false,
//     political: false,
//     racist: false,
//     sexist: false
//   },
//   id: 37,
//   lang: 'en'
// }'


// Alternative:
fetch('https://sv443.net/jokeapi/v2/joke/Programming')
  .then(response => response.text())
  .then(responseText => console.log(responseText))
  .catch(err => console.log(err))


// Example no.2:
// Parsing response as a JSON
async function makeRequest() {
  // Use try...catch statement
  try {
    // Make fetch request
    const responseData = await fetch('https://sv443.net/jokeapi/v2/joke/Programming')

    // Parsing as JSON happens here:
    // Parse the response as a JSON
    const responseJSON = await responseData.json()

    // Log the JSON
    console.log(responseJSON)
  }
  catch (error) {
    // Log any error
    console.log(error)
  }
}

// Call the makeRequest()
makeRequest()
// Output:
// {
//   error: false,
//   category: 'Programming',
//   type: 'twopart',
//   setup: 'How do you generate a random string?',
//   delivery: 'Put a Windows user in front of Vim and tell him to exit.',
//   flags: {
//     nsfw: false,
//     religious: false,
//     political: false,
//     racist: false,
//     sexist: false
//   },
//   id: 129,
//   lang: 'en'
// }


// Alternative:
fetch('https://sv443.net/jokeapi/v2/joke/Programming')
  .then(response => response.json())
  .then(responseJSON => console.log(responseJSON))
  .catch(err => console.log(err))


// PROCESSING ALREADY PROCESSED RESPONSE
// After you parse the response once it will be locked. Parsing it again will lead to TypeError.
async function makeRequest() {
  // Use try...catch statement
  try {
    // Make fetch request
    const responseData = await fetch('https://sv443.net/jokeapi/v2/joke/Programming')

    // Parse the response as a text
    const responseText = await responseData.text()

    // This will not work after the first parsing
    // Try to parse the response again as a JSON
    const responseJSON = await responseData.json()

    // Log the text
    console.log(responseText)

    // Log the JSON
    console.log(responseJSON)
  }
  catch (error) {
    // Log any error
    console.log(error)
  }
}

// Call the makeRequest()
makeRequest()
// Output:
// TypeError: Failed to execute 'json' on 'Response': body stream is locked


// Making request with fetch
// The GET request
// If you use the fetch() method as it is and provide it only with URL, 
// it will automatically execute GET request.
// GET request example
async function makeGetRequest() {
  // Use try...catch statement
  try {
    // Make GET fetch request
    const responseData = await fetch('https://sv443.net/jokeapi/v2/joke/Programming')

    // Parse the response as a JSON
    const responseJSON = await responseData.json()

    // Log the JSON
    console.log(responseJSON)
  }
  catch (error) {
    // Log any error
    console.log(error)
  }
}

// Call the makeGetRequest()
makeGetRequest()
// Output:
// {
//   error: false,
//   category: 'Programming',
//   type: 'single',
//   joke: "Knock knock.
// Who's there?
// Recursion.
// Recursion who?
// Knock knock.",
//   flags: {
//     nsfw: false,
//     religious: false,
//     political: false,
//     racist: false,
//     sexist: false
//   },
//   id: 182,
//   lang: 'en'
// }


// Alternative with promise handler functions:
fetch('https://sv443.net/jokeapi/v2/joke/Programming')
  .then(response => response.json())
  .then(responseJSON => console.log(responseJSON))
  .catch(err => console.log(err))


// The POST request
// Some data to send
const userData = {
  firstName: 'Tom',
  lastName: 'Jones',
  email: 'tom@jones.ai'
}

// Make POST request
async function makePostRequest() {
  // Use try...catch statement
  try {
    // Make fetch request
    const responseData = await fetch('/users/register', {
      method: 'POST', // Change the request method
      headers: { // Change the Content-Type
        'Content-Type': 'application/json;charset=utf-8'
      },
      body: JSON.stringify(userData) // Add data you want to send
      // convert a JavaScript object into a string
    })

    // Parse the response as a JSON
    const responseJSON = await responseData.json()

    // Log the JSON
    console.log(responseJSON)
  }
  catch (error) {
    // Log any error
    console.log(error)
  }
}

// Call the makePostRequest()
makePostRequest()


// Alternative with promise handler functions:
fetch('/users/register', {
  method: 'POST', // Change the request method
  headers: { // Change the Content-Type
    'Content-Type': 'application/json;charset=utf-8'
  },
  body: JSON.stringify(userData) // Add data you want to send
})
  .then(response => response.json())
  .then(responseJSON => console.log(responseJSON))
  .catch(err => console.log(err))

// The DELETE request
// Make DELETE request
async function makeDeleteRequest() {
  // Use try...catch statement
  try {
    // Make fetch request
    const responseData = await fetch('/users/tom', {
      method: 'DELETE' // Change the request method
    })

    // Parse the response as a JSON
    const responseJSON = await responseData.json()

    // Log the JSON
    console.log(responseJSON)
  }
  catch (error) {
    // Log any error
    console.log(error)
  }
}

// Call the makeRequest()
makeDeleteRequest()


// Alternative with promise handler functions:
fetch('/users/tom', {
  method: 'DELETE', // Change the request method
})
  .then(response => response.text())
  .then(responseText => console.log(responseText))
  .catch(err => console.log(err))


// The PUT request
// The PUT type of request is most often used to update an existing data or resources
// Some data to send to update existing records
const userData = {
  firstName: 'Jack',
  lastName: 'O\'Brian',
  email: 'jack@obrian.co'
}

// Make Put request
async function makePutRequest() {
  // Use try...catch statement
  try {
    // Make fetch request
    const responseData = await fetch('/users/jack', {
      method: 'PUT', // Change the request method
      body: JSON.stringify(userData) // Add data you want to send
    })

    // Parse the response as a JSON
    const responseJSON = await responseData.json()

    // Log the JSON
    console.log(responseJSON)
  }
  catch (error) {
    // Log any error
    console.log(error)
  }
}

// Call the makePutRequest()
makePutRequest()


// Alternative with promise handler functions:
fetch('/users/jack', {
  method: 'PUT', // Change the request method
  body: JSON.stringify(userData) // Add data you want to send
})
  .then(response => response.json())
  .then(responseJSON => console.log(responseJSON))
  .catch(err => console.log(err))

// The PATCH request
// The PATCH is the last type of request you can make with fetch API we will discuss. 
// This type of request is very similar to the PUT. 
// The difference between these two is that PUT is used to update the old version with new version. 
//Meaning, you update everything. 
// With PATCH, you update only part of existing data, user email for example.

// Some data to send to update
// only a part of existing records
const userData = {
  email: 'jack@obrian.co'
}

// Make PATCH request
async function makePatchRequest() {
  // Use try...catch statement
  try {
    // Make fetch request
    const responseData = await fetch('/users/jack', {
      method: 'PATCH', // Change the request method
      body: JSON.stringify(userData) // Add data you want to send
    })

    // Parse the response as a JSON
    const responseJSON = await responseData.json()

    // Log the JSON
    console.log(responseJSON)
  }
  catch (error) {
    // Log any error
    console.log(error)
  }
}

// Call the makePatchRequest()
makePatchRequest()


// Alternative with promise handler functions:
fetch('/users/jack', {
  method: 'PATCH', // Change the request method
  body: JSON.stringify(userData) // Add data you want to send
})
  .then(response => response.json())
  .then(responseJSON => console.log(responseJSON))
  .catch(err => console.log(err))


// THE RESPONSE OBJECT
// The Response object contains a number of properties
// Some of the most useful properties are statusText, status and ok. 
// The statusText is a a string that contains HTTP status code message. 
// The status is a number that specifies the status code of the response
// The ok is a boolean that specifies if status is in the range of codes from 200 to 299
// The body property contains the data you received

// Make fetch request
fetch('https://sv443.net/jokeapi/v2/joke/Programming')
  .then(response => console.log(response)) // Log the Response object
  .catch(err => console.log(err))

// Output:
// {
//   body: (...)
//   bodyUsed: false
//   headers: Headers
//   ok: true
//   redirected: false
//   status: 200
//   statusText: ""
//   type: "cors"
//   url: "https://sv443.net/jokeapi/v2/joke/Programming"
// }
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


## JavaScript Array Functions Cheatsheet
```js
concat()
// merge two or more arrays
// example
[ 1, 2 ].concat([5], [7, 9]) // [ 1, 2, 5, 7, 9 ]
// syntax
const new_array = old_array.concat([value1[, value2[, ...[, valueN]]]])

copyWithin()
// copies part of array to another location
// example
[ 1, 2, 3, 4, 5 ].copyWithin(0,2)  // [ 3, 4, 5, 4, 5 ]
// syntax
arr.copyWithin(target[, start[, end]])

entries()
// Array Iterator with key/value pairs for each index
// example
['a', 'b', 'c']
	.entries() // Array Iterator {  }
	.next() // { value: (2) […], done: false }
	.value // Array [ 0, "a" ]
// syntax
arr.entries()

every()
// tests if all elements in the array pass the test
// example
[1, 30, 40].every(val => val > 0) // true
// syntax
arr.every(callback(element[, index[, array]])[, thisArg])

fill()
// changes elements in an array to a static value
// example
[1, 2, 3, 4].fill('x', 1, 3) // [ 1, "x", "x", 4 ]
// syntax
arr.fill(value[, start[, end]])

filter()
// creates new array with elements that pass test
// example
[1, 10, 5, 6].filter(val => val > 5) // [ 10, 6 ]
// syntax
let newArray = arr.filter(callback(element[, index, [array]])[, thisArg])

find()
// returns the value of the first element, that matches test
// example
[1, 10, 5, 6].find(val => val > 5) // 10
// syntax
arr.find(callback(element[, index[, array]])[, thisArg])

findIndex()
// returns index of the first element, that matches test
// example
[1, 4, 5, 6].findIndex(val => val > 5) // 3
// syntax
arr.findIndex(callback( element[, index[, array]] )[, thisArg])

flat()
// creates a new array with sub-array elements flattened by specified depth.
// example
[1, [2, [3, [4]]]].flat(2) // [ 1, 2, 3,  ]
// syntax
const new_array = arr.flat([depth]);

flatMap()
// creates a new array with sub-array elements flattened by specified depth.
// example
[[2], [4], [6], [8]].flatMap(val => val/2) // [ 1, 2, 3, 4 ]
// syntax
var new_array = arr.flatMap(function callback(currentValue[, index[, array]]) {
    // return element for new_array
}[, thisArg])

forEach()
// executes provided function once for each array element
// example
[ 1, 2, 3 ].forEach(val => console.log(val)) // 1 // 2 // 3
// syntax
arr.forEach(callback(currentValue [, index [, array]])[, thisArg])

includes()
// determines if array includes a certain value
// example
[ 1, 2, 3 ].includes(3) // true
// syntax
arr.includes(valueToFind[, fromIndex])

indexOf()
// returns the first index at which element can be found
// example
[ 1, 2, 3 ].indexOf(3) // 2
// syntax
arr.indexOf(searchElement[, fromIndex])

join()
// returns string by concatenating all elements in array
// example
[ "x", "y", "z" ].join(" - ") // "x - y - z"
// syntax
arr.join([separator])

keys()
// returns Array Iterator that contains keys for each index
// example
['a', 'b', 'c']
	.keys() // Array Iterator {  }
	.next() // { value: 0, done: false }
	.value // 0
// syntax
arr.keys()

lastIndexOf()
// returns last index at which given element can be found
// example
[ 1, 2, 3, 1, 0].lastIndexOf(1) // 3
// syntax
arr.lastIndexOf(searchElement[, fromIndex])

map()
// creates new array with results of provided function
// example
[ 2, 3, 4 ].map(val => val * 2) // [ 4, 6, 8 ]
// syntax
let new_array = arr.map(function callback( currentValue[, index[, array]]) {
    // return element for new_array
}[, thisArg])

pop()
// removes last element from array and returns that element
// example
const arr = [ 1, 2, 3 ]
arr.pop() // returns: 3 // arr is [ 1, 2 ]
// syntax
arr.pop()

push()
// adds one or more elements to end of array and returns new length
// example
const arr = [ 1, 2, 3 ]
arr.push(1) // returns: 4 // arr is [ 1, 2, 3, 4 ]
// syntax
arr.push(element1[, ...[, elementN]])

reduce()
// executes a reducer function, resulting in single output value
// example
[ 'a', 'b', 'c' ].reduce((acc, curr) => acc + curr, 'd') // "dabc"
// syntax
arr.reduce(callback( accumulator, currentValue[, index[, array]] )[, initialValue])

reduceRight()
// executes a reducer function from right to left, resulting in single output value
// example
[ 'a', 'b', 'c' ].reduceRight((acc, curr) => acc + curr, 'd') // "dcba"
// syntax
arr.reduceRight(callback(accumulator, currentValue[, index[, array]])[, initialValue])

reverse()
// reverses an array
// example
[ 1, 2, 3 ].reverse() // [ 3, 2, 1 ]
// syntax
arr.reverse()

shift()
// removes the first element from array and returns that element
// example
const arr = [ 1, 2, 3 ]
arr.shift() // returns: 1 // arr is [ 2, 3 ]
// syntax
arr.shift()

slice()
// returns a copy of part of array, while original array is not modified
// example
[ 1, 2, 3, 4 ].slice(1, 3) // [ 2, 3 ]
// syntax
arr.slice([begin[, end]])

some()
// tests whether at least one element in array passes the test
// example
[ 1, 2, 3, 4 ].some(val => val > 3) // true
// syntax
arr.some(callback(element[, index[, array]])[, thisArg])

sort()
// sorts the elements of array in place
// example
[ 1, 2, 3, 4 ].sort((a, b) => b - a) // [ 4, 3, 2, 1 ]
// syntax
arr.sort([compareFunction])

splice()
// changes contents of array by removing, replacing and/or adding elements
// example
const arr = [ 1, 2, 3, 4 ]
arr.splice(1, 2, 'a') // returns [ 2, 3 ] // arr is [ 1, "a", 4 ]
// syntax
let arrDeletedItems = array.splice(start[, deleteCount[, item1[, item2[, ...]]]])

toLocaleString()
// elements are converted to Strings using toLocaleString and are separated by locale-specific String (eg. “,”)
// example
[1.1, 'a', new Date()].toLocaleString('EN') // "1.1,a,5/18/2020, 7:58:57 AM"
// syntax
arr.toLocaleString([locales[, options]]);

toString()
// returns a string representing the specified array
// example
[ 'a', 2, 3 ].toString() // "a,2,3"
// syntax
arr.toString()

unshift()
// adds one or more elements to beginning of array and returns new length
// example
const arr = [ 1, 2, 3 ]
arr.unshift(0, 99) // returns 5 // arr is [ 0, 99, 1, 2, 3 ]
// syntax
arr.unshift(element1[, ...[, elementN]])

values()
// returns Array Iterator object that contains values for each index in array
// example
['a', 'b', 'c']
	.values() // Array Iterator {  }
	.next() // { value: "a", done: false }
	.value // "a"
syntax
arr.values()
```


## ASTUCES

### Nullish coalescing operator (ES2020)
```js
// The nullish coalescing operator, ??, returns its right-hand side operand 
// when its left-hand side operand is null or undefined. 
// Otherwise, it returns its left-hand side operand.
let value;
value = value ?? 'default'; // si value = null or undefined, value = 'default'

// avant
const values = {
    nullValue: null,
    falseValue: false,
}
//En utilisant ||
console.log(values.nullValue || 'defaut') // defaut
console.log(values.falseValue || 'defaut') // defaut (alors que nous voulons false)

// après
console.log(values.nullValue ?? 'defaut') // defaut
console.log(values.falseValue ?? 'defaut') // false
```

### Optional Chaining (ES2020)
```js
// avant
if (obj.d) {
    console.log(e)
}

// Avec l'opérateur
console.log(obj.d?.e)
```

### String.prototype.matchAll (ES2020)
* permet de retrouver sous forme d’itérateur, toutes les correspondances entre une chaine et une expression régulière
```js
const regexp = RegExp('foo*','g');
const str = 'table football, foosball';

for(const match of str.matchAll(regexp)){
    console.log(match)
}
```

### Promise.allSettled (ES2020)
* Nous disposions précédemment de la méthode all attachée à nos promesses permettant de faire un traitement une fois que toutes les promesses avaient été résolues
* Le problème résidait dans le fait que certaines promesses pouvaient se retrouver rejetées et donc interrompre le traitement en cours de route
```js
const p1 = Promise.resolve('OK')
const p2 = Promise.reject('KO') // promesse défectueuse
const p3 = Promise.resolve('OK')

// Avec l'opérateur all
Promise
    .all([p1, p2, p3])
    .then(
        (res) => console.log('SUCCESS =>', res),
        (err) => console.log('ERROR =>', err) // 'ERROR => KO'
        // Le block de succès ne se lèvera jamais car une promesse dans notre chaîne est rejetée
    )

// Grâce à la méthode allSettled, on obtient le résultat de chaque promesse 
// peu importe qu’elle soit dans un état résolue ou rejetée
Promise
    .allSettled([p1, p2, p3])
    .then(
        (res) => console.log('SUCCESS =>', res),
        (err) => console.log('ERROR =>', err)
    )
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

### Rendre un block cliquable
```html
<div class="block" onclick="window.location.href='https://www.google.fr/'">
  <h2>Je suis un titre</h2>
  <p>Je suis un paragraphe</p>
</div>
```