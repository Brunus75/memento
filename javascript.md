# MEMENTO ET ASTUCES JAVASCRIPT


## SOMMAIRE

* [RESSOURCES](#ressources)
* [LEXIQUE](#lexique)
* [ES6](#es6)
* [PROGRAMMATION ASYNCHRONE](#programmation-asynchrone)
* [GERER DU CODE ASYNCHRONE](#gerer-asynchrone)
* [Parallélisez plusieurs requêtes HTTP](#parallele-http)
* [FONCTIONS](#fonctions)
* [ASTUCES](#astuces)


## RESSOURCES

* Compilez et exécutez votre code : https://openclassrooms.com/fr/courses/5543061-ecrivez-du-javascript-pour-le-web/5577766-compilez-et-executez-votre-code


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


## Installer un module avec NPM
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