// ---------- MEMENTO ANGULAR ---------- //

// cours Udemy
// Ressources : https://awesome-angular.com/ebook/
// https://angular.io/start

RAPPELS
* nommage des éléments en PascalCase = AppComponent
* Utiliser un préfixe personnalisé pour les sélecteurs des composants et directives
  ex. 'selector: admin-user;' ou plus classique 'selector: app-root'
* déclarer les const en camelCase => const mockPokemons = ['Salamèche', 'Bulbizzare'];
* Séparez par un espace les importations des librairies tierces de celles codées
* Déclarez les propriétés avant les méthodes dans un composant, 
et les éléments privés après ceux qui sont publics, par ordre alphabétique.
* Limiter la logique d'un composant aux seules nécessités de la vue. 
Toutes les autres logiques métiers doivent être déléguées dans des services.
* La logique d'un composant pouvant être réutilisé par plusieurs composants 
doit être placée dans un service

* L'outil recommandé pour vérifier si son code respecte les bonnes pratiques de développement
Codelyzer `https://github.com/mgechev/codelyzer`
* Les snippets Angular pour VS Code `https://marketplace.visualstudio.com/items?itemName=johnpapa.Angular2`

* tsconfig.json 
renseigner outDir pour placer les fichiers JS dans un dossier à part 
'pretty' : si définit à true, cette option permet d'ajouter des couleurs aux messages 
d'erreurs du compilateur dans la console
'http://www.typescriptlang.org/docs/handbook/compiler-options.html'

* Module : ensemble de fichiers lié à une fonctionnalité de l'appli;
* Composant : section dynamique et autonome de la page web (code HTML + classe JS);
* Service : classe qui peut être utilisée partout et qui centralise des fonctionnalités communes;
* Interpolation : fait d'afficher une { propriété } d'un composant dans son template
* Directive : classe Angular qui réagit avec les éléments HTML en leur attachant un comportement
* In TypeScript, each member is public by default.
* Respecter le principe : une tâche / un fichier;
* Programmation réactive = programmation avec des flux de données asynchrones;
* Guard : mécanisme de protection
* @Input : donnée entrante
* Préferer ngOnInit au constructeur, sauf petites opérations
* Limiter les fichiers à 400 lignes, les fonctions à 75 lignes
* npm --save n'est plus utile' depuis npm 5
In addition, there are the complementary options --save-dev and --save-optional 
which save the package under devDependencies and optionalDependencies, respectively. 
This is useful when installing development-only packages, 
like grunt or your testing library.

I) PRESENTATION

Angular est orienté composant;
composant = assemblage morceau code HTML + classe JS dédiée à une tâche particulière;
composant = marche de façon autonome;
la page web est découpée selon ses rôles = barre de navigation, boite de dialogue, ect.;

◘ MAJ ES6

○ Les classes

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

○ L'héritage' avec extends et 'super'

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


○ le mot-clé let : permet de déclarer une variable locale, 
dans le contexte (scope) où elle a été assignée.

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

○ Le nouveau mot-clé const : permet de déclarer des constantes
const PI = 3.141592 ; 
Une déclaration de constante ne peut se faire qu'une fois, une fois définie, 
vous ne pouvez plus changer sa valeur.
Attention, le comportement est un peu différent pour une constante de tableau ou d'objet. 
Vous ne pouvez pas modifier la référence vers le tableau ou l'objet, 
mais vous pouvez continuer à modifier les valeurs à l'intérieur tableau, 
ou les propriétés de l'objet. 

○ Les fonctions fléchées
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

○ Les paramètres de fonctions par défaut
En JavaScript ES6, on peut définir facilement des paramètres de fonctions avec une valeur par défaut.
Imaginons une fonction qui multiplie deux nombres passés en paramètres, 
mais le deuxième paramètre est facultatif, et il vaut 1 par défaut: 

    function multiplier(a, b = 1) {
      return a * b;
    }

○ Les collections 'Set' et 'Map'
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

○ La syntaxe template string

On peut insérer des variables dans la chaîne de caractères avec ${variable}, comme ceci:

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
    
○ Tous les changements: http://es6-features.org/#Constants

○ Les promesses
simplifier la programmation asynchrone
callbacks, fonctions anonymes appelées dans l'appli'
code plus efficace et plus élégant 
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


◘ TYPESCRIPT: https://www.typescriptlang.org/docs/handbook/basic-types.html

but = améliorer et sécuriser la production de code JavaScript;
sur-ensemble de JavaScript (cad que tout code Javascript peut être utilisé avec TypeScript);
Le code TypeScript est transcompilé en JavaScript, 
pouvant ainsi être interprété par n'importe quel navigateur web ou moteur JavaScript;
nouvelle syntaxe moins verbeuse;
permet de typer nos variables, ce qui permet d'écrire du code plus robuste;
l'extension des fichiers TypeScript est .ts;

○ Le typage :
let pointDeVie: number = 100;
let surnom: string = 'Green Lantern';

○ Les fonctions :
// on retrouve le typage dans les paramètres
// et dans la valeur de retour
function creerHeros(pointDeVie: number, surnom: string): Heros {
  const heros = new Heros();
  heros.pointDeVie = pointDeVie;
  heros.surnom = surnom;
  return heros;
}

○ Les décorateurs
Les annotations TypeScript permettent d'ajouter des informations sur nos classes;
pour indiquer par exemple que telle classe est un composant de l'application, ou telle autre un service;
On utilise @ comme syntaxe:
@Component({
  selector: 'mon-composant',
  template: 'mon-template.html'
})
export class MonComposant { }

◘ Angular et les Composants Web

web components = widgets réutilisables, sections complètement autonomes au sein des pages web
Les Web Components sont composés de quatre technologies différentes, 
qui peuvent chacune être utilisées séparément :
* Les éléments personnalisés (Custom Elements) permettent de créer ses propres éléments HTML valides;
* Le DOM de l'ombre (Shadow DOM) permet d'encapsuler du code HTML, CSS et JavaScript qui n'interfère pas avec le DOM principal de la page web;
* Les templates HTML(HTML Templates) permettent de développer des morceaux de code HTML qui ne sont pas interprétés au chargement de la page;
* Les imports HTML(HTML Imports) permettent d'importer du HTML dans une autre page HTML;


II) PREMIERS PAS 

◘ Environnement de travail 

https://www.typescriptlang.org/index.html (VS Code comprend TS)

◘ Créer son application 

Avec la CLI: https://cli.angular.io/ (conseillé)
`
npm install -g @angular/cli
ng new my-first-project
cd my-first-project
ng serve
`

From scratch :
○ package.json : dépendances du projet
https://docs.npmjs.com/files/package.json
○ SystemJS : bibilothèque par défaut assemble de manière cohérente les fichiers
○ Le compilateur de TypeScript : tsconfig.json
○ Le mini-serveur lite : bs-config.json
○ Installer les dépendances : se rendre dans le fichier,
puis npm install

○ Ajouter un premier composant 
tous les fichiers sources vont dans le fichier src/app/
import { Component } from '@angular/core';
// import { nom élément } from 'nom paquet source'
// import { Component } obligatoire

@Component({
  selector: 'pokemon-app', // obligatoire : donne un nom au composant
  // correspondant à <pokemon-app></pokemon-app>
  template: `<h1>Hello {{name}}</h1>`, // obligatoire : définit le code HTML
})
export class AppComponent { name = 'Angular'; }
// le code de la classe de notre composant
// contient la logique du composant
// convention nomcomposantComponent

○ Ajouter un "module" racine au projet
"module" = regroupe les fichiers par leur rôle sur le site
// (authentification, création blog, etc.)
app/app.module.ts
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';

// permet de déclarer un nouveau module
@NgModule({
  imports: [BrowserModule],
  declarations: [AppComponent],
  bootstrap: [AppComponent] // permet d'identifier le composant racine
  // que Angular appelle au démarrage de l'application
})
export class AppModule { }

○ Créer un point "d'entrée" pour "l'application"
src/main.ts : fichier chargé de lancer l'appli

import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';
// précise que l'appli dans un navigateur web
import { AppModule } from './app/app.module';
// AppModule est le module racine

platformBrowserDynamic().bootstrapModule(AppModule).catch(err => console.log(err));

○ Créer la page HTML
SPA : une seule page HTML très dynamique
src/index.html 
<body>
    <pokemon-app>Loading AppComponent content here ...</pokemon-app>
</body>

○ Lancer "l'application"
npm start depuis VS Code (ou avec terminal)

○ Nettoyer le dossier de développement
des dossiers compilés par TS se sont ajoutés au code source
on veut les regrouper dans un fichier isolé
tsconfig.json, ajouter la ligne :
"outDir" : "dist"
systemconfig.js, remplacer la ligne 'app': 'app' par 'app': 'dist/app'
index.html, remplacer la ligne 
System.import('main.js') par System.import('dist/main.js').catch(function (err);
supprimer les fichiers .js et .js.map

○ En résumé
- SystemJS est la bibliothèque par défaut choisie par Angular pour charger les modules.
- On a besoin au minimum d'un module racine et d'un composant racine par application.
- Le 'module' racine se nomme par convention AppModule.
- Le composant racine se nomme par convention AppComponent.
- L'ordre de chargement de l'application est le suivant: 
index.html > main.ts > app.module.ts > app.component.ts.
- Le fichier package.json initial est fourni avec des commandes 
prêtes à l'emploi comme la commande npm start, 
qui nous permet de démarrer notre application web.


III) LES COMPOSANTS

○ Créer un composant avec la CLI 
`ng generate component mon-composant`

○ Un composant 
une classe qui contrôle une portion de la page web
composant = classe + vue (template);
la logique est définie dans la classe
rajouter une propriété : 
app.component.ts 
import { Pokemon } from './pokemon' // ++

export class AppComponent {
  name = 'Angular';
  // propriété privée, qui renvoit un tableau d'objet de type Pokemon
  private pokemons: Pokemon[];
}
on rajoute un nouveau fichier pour modéliser un objet Pokemon :
src/app/pokemon.ts
export class Pokemon {
  id: number;
  hp: number;
  cp: number;
  name: string;
  picture: string;
  types: Array<string>;
  created: Date;
}

○ Les cycles de vie d'un composant 
Angular nous offre la possibilité d'agir sur ces moments clefs 
(création, affichage, destruction), 
en implémentant une ou plusieurs interfaces :
* ngOnChanges: 
C'est la méthode appelée en premier lors de la création d'un composant, avant même ngOnInit, 
et à chaque fois que Angular détecte que les valeurs d'une propriété du composant sont modifiées.
La méthode reçoit en paramètre un objet représentant les valeurs actuelles 
et les valeurs précédentes disponibles pour ce composant. 
* ngOnInit: 
Cette méthode est appelée juste après le premier appel à ngOnChanges, 
et elle initialise le composant après qu’Angular a initialisé les propriétés du composant.
Démarre donc après le constructeur
* ngDoCheck: 
On peut implémenter cette "interface" pour étendre le comportement par défaut de la méthode ngOnChanges, 
afin de pouvoir détecter et agir sur des changements qu’Angular ne peut pas détecter par lui-même.
* ngAfterViewInit: 
Cette méthode est appelée juste après la mise en place de la vue d'un composant, 
et des vues de ses composants fils s'il en a.
* ngOnDestroy: 
Appelée en dernier, cette méthode est appelée avant qu’Angular ne détruise 
et ne retire du DOM le composant. 
Cela peut se produire lorsqu'un utilisateur navigue d'un composant à un autre par exemple.
Afin d'éviter les fuites de mémoire, c'est dans cette méthode 
que nous effectuerons un certain nombre d'opérations 
afin de laisser l'application "propre" (nous détacherons les gestionnaires d'événements par exemple).
* Les méthodes les plus utilisées: ngOnInit et ngOnDestroy, 
qui permettent d'initialiser un composant, et de le nettoyer proprement par la suite lorsqu'il est détruit. 

○ Interagir sur le cycle de vie d'un composant 
On préfère ngOnInit() plutôt que le constructor() pour initialiser les données,
sauf si celles-ci sont peu impactantes
garder la logique de l'appli en dehors du constructeur
app.component.ts 
import { Component } from '@angular/core';
import { OnInit } from '@angular/core'; // ++ (d'abord les angular core)

import { Pokemon } from './pokemon';
import { POKEMONS } from './mock-pokemon'; // ++

@Component({
  selector: 'pokemon-app',
  template: `<h1>Hello {{name}}</h1>`,
})
export class AppComponent implements OnInit {
  name = 'Angular';
  // propriété privée, qui renvoit un tableau d'objet de type Pokemon
  private pokemons: Pokemon[];

  ngOnInit() {
    // étape d'initiliation
    this.pokemons = POKEMONS;
  }
}

la constante est dans le fichier mock-pokemon.ts 
import { Pokemon } from './pokemon'; // nécessaire pour créer la classe Pokemon

export const POKEMONS: Pokemon[] = [ // tableau d'objet de type Pokemon
// sauvagardé dans un CONSTANTE
  {
    id: 1,
    name: "Bulbizarre",
    hp: 25,
    cp: 5,
    picture: "https://assets.pokemon.com/assets/cms2/img/pokedex/detail/001.png",
    types: ["Plante", "Poison"],
    created: new Date()
  },
  // ect.
]

○ Gérer les interactions de l'utilisateur 
import { Component } from '@angular/core';
import { OnInit } from '@angular/core';

import { Pokemon } from './pokemon';
import { POKEMONS } from './mock-pokemon'; // ++

@Component({
  selector: 'pokemon-app', // obligatoire : donne un nom au composant
  // correspondant à <pokemon-app></pokemon-app>
  // boucle avec *ngFor
  template: `<h1>Liste de pokémons</h1>
    <ul>
      <li *ngFor="let pokemon of pokemons">
        {{ pokemon.name }}
      </li>
    </ul>
    `,
})
export class AppComponent implements OnInit {
  
  private pokemons: Pokemon[];

  ngOnInit() {
    // étape d'initiliation
    this.pokemons = POKEMONS;
  }

  // rajoute l'interaction avec l'utilisateur
  selectPokemon(pokemon: Pokemon) {
    alert(`Vous avez cliqué sur ${pokemon.name}`)
  }
}

○ A retenir : 
* On utilise l'annotation @Component pour indiquer à Angular qu'une classe est un composant
* Des méthodes nous permettent d'interagir avec le cycle de vie d'un composant.
Ces méthodes sont toutes préfixées par ng.
* La méthode ngOnInit permet de définir un comportement spécifique lors de l'initialisation d'un composant
* Les méthodes de cycle de vie d'un composant que nous utiliserons le plus sont ngOnInit et ngOnDestroy


IV) LES TEMPLATES 

○ Utiliser ES6 pour déclarer les templates 
`avantage du `backtick` : écrire sur plusieurs lignes sans devoir concaténer`

○ Déclarer un template avec l'attribut templateUrl 
app.component.ts 
@Component({
  selector: 'pokemon-app', // obligatoire : donne un nom au composant
  // correspondant à <pokemon-app></pokemon-app>
  templateUrl: './app/app.component.html', // chemin relatif au template
  // par convention, template et composant sont dans le même fichier
})
app.component.html 
<h1>Liste des pokémons</h1>

<ul>
    <li>Bulbizarre</li>
    <li>Salamèche</li>
    <li>Carapuce</li>
</ul>

○ L'interpolation pour afficher une variable
app.component.ts 
export class AppComponent implements OnInit {

  private pokemons: Pokemon[];
  private title: string = "Liste des pokémons"; // ++

  ngOnInit() {
    // étape d'initiliation
    this.pokemons = POKEMONS;
  }

  selectPokemon(pokemon: Pokemon) {
    alert(`Vous avez cliqué sur ${pokemon.name}`)
  }
}

app.component.html 
<h1>{{ title }}</h1> // Liste des pokémons

○ Syntaxe de liaison des données
il existe d'autres manières de créer des liaisons entre le composant et le template
Du composant vers le template :
Nous pouvons pousser plusieurs données depuis le composant vers le template :
* La liaison sur une propriété d'élément :
<img [src]="someImageUrl" />
// les crochets pour lier la source de l'img à la propriété someImageUrl du composant
* La liaison sur une propriété d'attribut :
<label [attr.for]="someLabelId" >...</label>
// lie l'attribut for de l'élément label avec la propriété de notre composant someLabelId
* La liaison sur une propriété de la classe
<div [class.special]="isSpecial" >Special</div>
// pour attribuer ou non la classe special à l'élément div ci-dessous
* La liaison sur une propriété de style
<button [style.color]="isSpecial ? 'red' : 'green'""></button> // " en trop
// définir un style pour nos éléments de manière dynamique

○ Gérer les interactions des utilisateurs
app.component.html 
<button (click)="onClick()" >Cliquez ici !</button>
// (nomEvenement)="nomMethode"

app.component.ts 
export class AppComponent implements OnInit {
  // ...
  onClick() {
    console.log("Vous avez cliqué !")
  }
}

○ Récupérer les valeurs entrées par l'utilisateur 
app.component.html 
<input (keyup)="onKey($event)" /> // $event : objet : l'événement ciblé
<p>{{ value }}</p>

app.component.ts 
export class AppComponent implements OnInit {

  /* 
  onKey(event: any) {
    this.value = `Bonjour ${event.target.value}`;
  } 
  */

  // plus robuste
  /* 
  onKey(event: KeyboardEvent) {
    this.value = `Bonjour ${(<HTMLInputElement>event.target).value}`;
  } 
  */
}

○ Les variables référencées dans le template 
app.component.html 
<input #box (keyup)="onKey(box.value)" /> // #variableLocale
<p>{{ box.value }}</p> // variable locale du template, ce que tape l'utilsateur ex. Jean
<p>{{ value }}</p> // propriété value du composant ex. Bonjour Jean

app.component.ts 
export class AppComponent implements OnInit { 

    private value: string = '';

    onKey(value: string) {
      this.value = `Bonjour ${value}`;
    }
}

○ Détecter l'appui sur la touche entrée
// pas recommandé
app.component.html 
<input #box (keyup.enter)="values=box.value" /> // affectation directement dans le  html
// au submit toutes les values sont regroupées dans la propriété values
<p>{{ values }}</p>

app.component.js
export class AppComponent implements OnInit { 
    values = '';
}

○ Détecter la perte de focus sur un élément
app.component.html 
<input #box (keyup.enter)="values=box.value" (blur)="values=box.value" />
// le même processus est enclenché à la perte de focus

○ La directive ngIf
ngIf appelle directement les propriétés des composants,
pas besoin d'{{ accolades }}

app.component.html 
<p *ngIf="age > 18">Ceci est un message destiné aux majeurs</p>

app.component.js 
export class AppComponent implements OnInit { 
    private age: number = 20; // s'affiche
    private age: number = 20; // ne s'affiche pas
}

○ la directive ngFor 
app.component.html 
<ul>
    <li *ngFor="let pokemon of pokemons" >{{ pokemon.name }}</li>
</ul>
/* 
• Bulbizarre
• Salamèche
• Carapuce
etc.
*/

app.component.js 
export class AppComponent implements OnInit {
  
  private pokemons: Pokemon[]; // la propriété utilisée, crée à l'initialisation de l'app

  ngOnInit() {
    // étape d'initiliation
    this.pokemons = POKEMONS;
  }
}

○ Récupérer l'index' d'un tableau' avec ngFor 
app.component.html
<ul>
    <li *ngFor="let pokemon of pokemons; let i = index" [indexPokemon]="i" >
      {{ pokemon.name }}
      </li>
</ul>

app.component.js 
@Input indexPokemon: number; // ++ récupère l'index du Pokemon dans le tableau


○ Améliorer le template 
Materialize.css > https://materializecss.com/getting-started.html
app.component.html
<h1 class='center'>Pokémons</h1>
<div class='container'>
    <div class="row">
        <div *ngFor='let pokemon of pokemons' class="col s6 m4">
            <div class="card horizontal" (click)="selectPokemon(pokemon)">
                <div class="card-image">
                    <img [src]="pokemon.picture">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <p>{{ pokemon.name }}</p>
                        <p><small>{{ pokemon.created }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

○ A retenir :
Essayez d'éviter de mettre la logique de votre application dans vos templates. 
Gardez-les le plus simple possible !


V) LES DIRECTIVES

○ Une directive ?
classe Angular, proche d'un composant, sans template
réagit avec les éléments HTML en leur attachant un comportement
est activée par un sélecteur CSS
types de directives :
* composants 
* directives d'attributs
* directives structurelles (manipulent les éléments HTML, ex. ngIf et ngFor)

○ Créer une directive d'attribut 
but : changer l'apparence ou le comportement d'un élément
// ajoute une bordure en hover
// les photos de la même hauteur
src/app/border-card.directive.ts
import { Directive, ElementRef } from '@angular/core';
// ElementRef : objet du DOM sur lequel on applique la directive

@Directive({
  selector: '[pkmnBorderCard]' // nom de l'attribut qui déclenche la directive
  // crée une instance de la directive
  // il est recommandé de préfixer le nom des directives (pour éviter collisions)
  // ne pas utiliser ng
  // utiliser cameCase
})
export class BorderCardDirective {
  constructor(private el: ElementRef) {
    this.setBorder('#f5f5f5');
    this.setHeight(180);
  }

  private setBorder(color: string) {
    let border = 'solid 4px ' + color;
    this.el.nativeElement.style.border = border;
  }

  private setHeight(height: number) {
    this.el.nativeElement.style.height = height + 'px';
  }
}

○ Prendre en compte les actions de l'utilisateur
but: déclencher la directive au hover 
import { Directive, ElementRef, HostListener } from '@angular/core';
// ElementRef : objet du DOM sur lequel on applique la directive
// HostListener : lier une méthode de la directive à un event

@Directive({
  selector: '[pkmnBorderCard]'
})
export class BorderCardDirective {
  constructor(private el: ElementRef) {
    this.setBorder('#f5f5f5');
    this.setHeight(180);
  }

  // déclenché à l'evenement mouseenter
  @HostListener('mouseenter') onMouseEnter() {
    this.setBorder('#009688');
  }

  // ++
  @HostListener('mouseleave') onMouseLeave() {
    this.setBorder('#f5f5f5');
  }

  private setBorder(color: string) {
    let border = 'solid 4px ' + color;
    this.el.nativeElement.style.border = border;
  }

  private setHeight(height: number) {
    this.el.nativeElement.style.height = height + 'px';
  }
}

○ Utiliser la directive 
importer la nouvelle directive dans app.module.ts 
import { BorderCardDirective } from './border-card.directive'; // ++

@NgModule({
  imports: [BrowserModule],
  declarations: [AppComponent, BorderCardDirective], // ++
  bootstrap: [AppComponent]
})

utiliser l'attribut (et sa directive) dans app.component.html 
<div class="card horizontal" (click)="selectPokemon(pokemon)" pkmnBorderCard></div>

○ Ajouter un paramètre à la directive 
but : personnaliser la couleur de la bordure
border-card.directive.ts 
import { Directive, ElementRef, HostListener, Input } from '@angular/core';
// Input : pour préciser la propriété d'entrée

@Directive({
  selector: '[pkmnBorderCard]'
})
export class BorderCardDirective {
  constructor(private el: ElementRef) {
    this.setBorder('#f5f5f5');
    this.setHeight(180);
  }

  @Input('pkmnBorderCard') borderColor: string; // ++
  // @Input('nomDirective) alias;

  // déclenché à l'evenement mouseenter
  @HostListener('mouseenter') onMouseEnter() {
    this.setBorder(this.borderColor || '#009688'); // ++
    // 2ème choix si l'utilisateur ne choisit rien
  }

  // ...

}

app.component.html 
<div class="card horizontal" (click)="selectPokemon(pokemon)" pkmnBorderCard="red"></div>
// les bordures sont à présent rouges

○ Réorganiser le code 
border-card.directive.ts 
export class BorderCardDirective {

  private initialColor: string = '#f5f5f5'; // couleur initiale
  private defaultColor: string = '#009688'; // couleur si l'utilisateur n'a pas fait de choix
  private defaultHeight: number = 180; // hauteur par défaut

  constructor(private el: ElementRef) {
    this.setBorder(this.initialColor);
    this.setHeight(this.defaultHeight);
  }

  @Input('pkmnBorderCard') borderColor: string; // ++
  // @Input('nomDirective) alias;

  // déclenché à l'evenement mouseenter
  @HostListener('mouseenter') onMouseEnter() {
    this.setBorder(this.borderColor || this.defaultColor);
    // 2ème choix si l'utilisateur ne choisit rien
  }

  @HostListener('mouseleave') onMouseLeave() {
    this.setBorder(this.initialColor);
  }

  private setBorder(color: string) {
    let border = 'solid 4px ' + color;
    this.el.nativeElement.style.border = border;
  }

  private setHeight(height: number) {
    this.el.nativeElement.style.height = height + 'px';
  }
}

app.component.html 
<div class="card horizontal" (click)="selectPokemon(pokemon)" pkmnBorderCard="blue"></div>
// mes bordures seront bleues

○ Ajouter un autre paramètre
border-card.directive.ts 
export class BorderCardDirective {

  private initialColor: string = '#f5f5f5'; // couleur initiale
  private defaultColor: string = '#009688'; // couleur si l'utilisateur n'a pas fait de choix
  private defaultHeight: number = 180; // hauteur par défaut

  constructor(private el: ElementRef) {
    this.setBorder(this.initialColor);
    this.setHeight(this.defaultHeight);
  }

  @Input('pkmnBorderCard') borderColor: string;
  // @Input('nomDirective) alias;
  @Input() userHeight: number; // add new input ++

  // déclenché à l'evenement mouseenter
  @HostListener('mouseenter') onMouseEnter() {
    this.setBorder(this.borderColor || this.defaultColor);
    // 2ème choix si l'utilisateur ne choisit rien
    this.setHeight(this.userHeight || this.defaultHeight); // ++
  }

  @HostListener('mouseleave') onMouseLeave() {
    this.setBorder(this.initialColor);
    this.setHeight(this.defaultHeight); // ++
  }

  private setBorder(color: string) {
    let border = 'solid 4px ' + color;
    this.el.nativeElement.style.border = border;
  }

  private setHeight(height: number) {
    this.el.nativeElement.style.height = height + 'px';
  }
}

app.component.html 
<div class="card horizontal" (click)="selectPokemon(pokemon)" 
  pkmnBorderCard="orange" userHeight="200"></div>

○ A retenir 
Angular crée une nouvelle instance de notre directive à chaque fois qu'il détecte un élément HTML
avec l'attribut correspondant.
Il injecte alors dans le constructeur de la directive l'élément du DOM ElementRef


VI) LES PIPES 

sert à formater les données (ex. des dates) = un filtre (comme Twig)

○ Utiliser un pipe (le pipe date)
<p><small>{{ pokemon.created | date }}</small></p>
<div>{{ user.firstName | lowercase }}</div>

○ Les pipes Angular 
https://angular.io/guide/pipes

○ Combiner les pipes 
// de la gauche vers la droite
<p><small>{{ pokemon.created | date | uppercase }}</small></p>

○ Paramétrer les pipes 
<p><small>{{ pokemon.created | date:"dd/MM/yyyy" }}</small></p>

○ Créer un pipe personnalisé 
src/app/pokemon-type-color.pipe.ts
import { Pipe, PipeTransform } from '@angular/core';
/*
 * Affiche la couleur correspondant au type du pokémon.
 * Prend en argument le type du pokémon.
 * Exemple d'utilisation:
 *   {{ pokemon.type | pokemonTypeColor }}
*/
@Pipe({ name: 'pokemonTypeColor' }) // déclare le pipe
// implémente une interface PipeTransform
// dont la méthode transform accepte un argument
// qui correspond à la propriété sur laquelle s'applique le pipe
export class PokemonTypeColorPipe implements PipeTransform {
  transform(type: string): string { // renvoie un string (classe Materialize CSS)

    let color: string;

    switch (type) {
      case 'Feu':
        color = 'red lighten-1';
        break;
      case 'Eau':
        color = 'blue lighten-1';
        break;
      case 'Plante':
        color = 'green lighten-1';
        break;
      case 'Insecte':
        color = 'brown lighten-1';
        break;
      case 'Normal':
        color = 'grey lighten-3';
        break;
      case 'Vol':
        color = 'blue lighten-3';
        break;
      case 'Poison':
        color = 'deep-purple accent-1';
        break;
      case 'Fée':
        color = 'pink lighten-4';
        break;
      case 'Psy':
        color = 'deep-purple darken-2';
        break;
      case 'Electrik':
        color = 'lime accent-1';
        break;
      case 'Combat':
        color = 'deep-orange';
        break;
      default:
        color = 'grey';
        break;
    }

    return 'chip ' + color; // la classe Materialize

  }
}

app.module.ts 
import { PokemonTypeColorPipe } from './pokemon-type-color.pipe'; // ++

// permet de déclarer un nouveau module
@NgModule({
  // ...
  declarations: [AppComponent, BorderCardDirective, PokemonTypeColorPipe] // ++
  // ...
})

app.component.html
<span *ngFor='let type of pokemon.types' class='{{ type | pokemonTypeColor }}'>{{ type }}</span>
// boucle sur les types, le type est changé en nom de classe selon sa définition

○ A retenir 
On peut créer des pipes personnalisés pour les besoins de notre application avec l'annotation @Pipe


VII) LES ROUTES

permet de mettre en place une navigation avec un fil d'ariane
Les routes sont regroupées par fonctionnalités au sein de modules
(ex un module pokemon, un module authentification)

○ Le fonctionnement de la navigation 
Création de 2 composants :
* Un composant listePokemon : affiche tous les pokemons de l'appli 
accessible à l'url "/pokemons"
* Un composant detail-pokemon.component : affiche une page d'info spécifique
accessible à l'url "/pokemons/{{ pokemon.id }}

○ Le composant fils 
src/app/detail-pokemon.component.ts 
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router, Params } from '@angular/router';
// pour extraire l'id du pokemon à afficher
// router : redirige l'utilisateur
import { Pokemon } from './pokemon';
import { POKEMONS } from './mock-pokemons';

@Component({
  selector: 'detail-pokemon',
  templateUrl: './app/detail-pokemon.component.html'
})
export class DetailPokemonComponent implements OnInit {

  pokemons: Pokemon[] = null; // liste de tous les pokemons
  pokemon: Pokemon = null; // le pokemon à afficher

  constructor(private route: ActivatedRoute, private router: Router) { }
  // je récupère des informations depuis l'url du composant grâce à route
  // j'aurais besoin de rediriger l'utilisateur grâce à Router

  ngOnInit(): void {
    this.pokemons = POKEMONS;

    let id = +this.route.snapshot.paramMap.get('id'); // +permetDeCasterValeurEnNnombre
    // récupère l'id contenue dans l'url
    // propriété snapshot : synchrone (bloque l'éxécution du programme tant
    // que l'id n'est pas récupérée)
    for (let i = 0; i < this.pokemons.length; i++) {
      if (this.pokemons[i].id == id) {
        this.pokemon = this.pokemons[i];
      }
    }
  }

  goBack(): void {
    this.router.navigate(['/pokemons']);
    // revient à la page d'accueil
    // url dans un tableau
    // window.history.back(); // même processus, moins fiable
    // car on ne sait pas d'où il vient
  }

}

le template : src/app/detail-pokemon.component.html
<div *ngIf="pokemon" class="row">Portion de code à afficher si pokemon trouvé</div>
<h4 *ngIf='!pokemon' class="center">Aucun pokémon à afficher !</h4>
<img [src]="pokemon.picture" />
<span * ngFor="let type of pokemon.types"
class="{{ type | pokemonTypeColor }}" >{{ type }}</span>
<div class="card-action"><a (click)="goBack()" >Retour</a></div>

○ le composant parent qui liste les pokemons
src/app/list-pokemon.component.ts
reprend la logique de app.component 
import { Component } from '@angular/core';
import { OnInit } from '@angular/core';
import { Router } from '@angular/router'; // ++

import { Pokemon } from './pokemon';
import { POKEMONS } from './mock-pokemon';

@Component({
  selector: 'list-pokemon', // ++
  templateUrl: './app/list-pokemon.component.html', // ++
})
export class ListPokemonComponent implements OnInit {

  private pokemons: Pokemon[];

  constructor(private router: Router) { } // ++

  ngOnInit() {
    // étape d'initiliation
    this.pokemons = POKEMONS;
  }

  selectPokemon(pokemon: Pokemon) {
    console.log(`Vous avez cliqué sur ${pokemon.name}`);
    let link = ['/pokemon', pokemon.id]; // ++
    // [url de redirection, paramètres]
    this.router.navigate(link); // redirection
  }
}

src/app/list-pokemon.component.html
<h1 class='center'>Pokémons</h1>
<div class='container'>
    <div class="row">
        <div *ngFor='let pokemon of pokemons' class="col s6 m4">
            <div class="card horizontal" (click)="selectPokemon(pokemon)" pkmnBorderCard="orange" userHeight="180" >
                <div class="card-image" >
                    <img [src]="pokemon.picture" />
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <p>{{ pokemon.name }}</p>
                        <p><small>{{ pokemon.created | date:"dd/MM/yyyy" }}</small></p>
                        <span *ngFor='let type of pokemon.types' class='{{ type | pokemonTypeColor }}'>{{ type }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


○ Mettre en place les routes 
app.component.ts => composant parent, point d'entrée 
centralise le code commun aux deux composants fils, seul rôle d'affichage
devient le rôle père
app.component.ts
import { Component } from '@angular/core';
import { OnInit } from '@angular/core';

import { Pokemon } from './pokemon';
import { POKEMONS } from './mock-pokemon';

@Component({
  selector: 'pokemon-app', 
  templateUrl: './app/app.component.html',
})
export class AppComponent implements OnInit {
  // n'a plus de logique interne
  // rôle d'affichage seulement
}

app.component.html
// ce template est celui du composant père : tout sera transmis
// la nav sera sur toutes les pages
<nav>
    <div class="nav-wrapper teal">
        <a href="#" class="brand-logo center">Pokémons</a>
    </div>
</nav>

<router-outlet></router-outlet>
// cette balise reçoit le template parcouru et l'affiche

○ La balise <base>
index.html 
<head>
    <base href="/" /> 
    // définit l'url de base pour utiliser les urls relatives
</head>

○ Ajouter de nouvelles routes 
créer un "module" dédié aux routes : bonnes pratiques
plutôt que déclarer les routes dans une constante dans app.component
mieux découper la structure de l'appli 
src/app/app-routing.module.ts
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
// aide à déclarer les routes de l'application
import { ListPokemonComponent } from './list-pokemon.component';
import { DetailPokemonComponent } from './detail-pokemon.component';

// routes
const appRoutes: Routes = [
  { path: 'pokemons', component: ListPokemonComponent },
  { path: 'pokemon/:id', component: DetailPokemonComponent },
  { path: '', redirectTo: 'pokemons', pathMatch: 'full' } // par défaut
];

@NgModule({
  imports: [
    RouterModule.forRoot(appRoutes) // déclare les routes
  ],
  exports: [
    RouterModule // exporte les routes
  ]
})
export class AppRoutingModule { }

○ Déclarer les nouvelles routes 
app.module.ts
import { DetailPokemonComponent } from './detail-pokemon.component'; // ++
import { ListPokemonComponent } from './list-pokemon.component'; // ++

import { AppRoutingModule } from './app-routing.module'; // ++

// permet de déclarer un nouveau module
@NgModule({
  imports: [BrowserModule, AppRoutingModule], // ++
  declarations: [
    AppComponent,
    BorderCardDirective,
    PokemonTypeColorPipe,
    ListPokemonComponent, // ++
    DetailPokemonComponent // ++
  ],
    bootstrap: [AppComponent]
})
export class AppModule { }

○ Gérer les erreurs 404 
créer un composant qui affiche l'erreur personnalisée
src/app/page-not-found.component.ts 
// routerLink pour faire une redirection
import { Component } from '@angular/core';

@Component({
  selector: 'page-404',
  template: `
    <div class='center'>
      <img src="http://assets.pokemon.com/assets/cms2/img/pokedex/full/035.png"/>
      <h1>Hey, cette page n'existe pas !</h1>
      <a routerLink="/pokemons" class="waves-effect waves-teal btn-flat">
        Retourner à l' accueil
      </a>
    </div>
  `
})
export class PageNotFoundComponent { }

app-routing.module.ts 
import { PageNotFoundComponent } from './page-not-found.component'; // ++

// routes
const appRoutes: Routes = [
  { path: 'pokemons', component: ListPokemonComponent },
  { path: 'pokemon/:id', component: DetailPokemonComponent },
  { path: '', redirectTo: 'pokemons', pathMatch: 'full' }, // par défaut
  { path: '**', component: PageNotFoundComponent }
  // capture toutes les routes pas interceptées précédemment
  // a mettre en dernier dans le tableau
  // l'ordre des routes est important : routes précises, puis routes générales
];

@NgModule({
  imports: [
    RouterModule.forRoot(appRoutes) // déclare les routes
  ],
  exports: [
    RouterModule // exporte les routes
  ]
})
export class AppRoutingModule { }

app.module.ts pour déclarer le composant
import { PageNotFoundComponent } from './page-not-found.component'; // ++

// permet de déclarer un nouveau module
@NgModule({
  imports: [BrowserModule, AppRoutingModule],
  declarations: [
    AppComponent,
    BorderCardDirective,
    PokemonTypeColorPipe,
    ListPokemonComponent,
    DetailPokemonComponent,
    PageNotFoundComponent // ++
  ],
  bootstrap: [AppComponent] // permet d'identifier le composant racine
  // que Angular appelle au démarrage de l'application
})
export class AppModule { }

○ A retenir 
* On construit un système de navigation en associant une url et un composant dans un fichier à part.
* Le système de routes d'Angular interprète les routes qui sont déclarées du haut vers le bas.
* La balise <router-outlet> permet de définir où le template des composants fils sera injecté.
* L'opérateur permettant d'intercepter toutes les routes est **.
* Les routes doivent être regroupées par fonctionnalité au sein de modules.


VIII) LES MODULES 

○ Les modules 
Chaque application Angular possède son "module racine" = app.module
Pour chaque fonctionnalité, un "module" associé
"module de fonctionnalité" = ensemble de classes + éléments dédié à un domaine de l'appli 
un "module" est une classe avec le décorateur @NgModule, qui prend en paramètres
des propriétés (5) qui décrivent le "module" :
{
  declarations: les classes de vue (Composant, Directives, Pipes),
  exports: sous-ensemble de classes de vue à exporter,
  utilisables dans les templates des composants des autres modules,
  imports: classes nécessaires au fonctionnement du "module",
  providers: permet de fournir un service au "module",
  bootstrap: le composant racine lancé au démarrage
}

○ Créer un "module"
but : centraliser la gestion des pokémons 
créer un dossier qui centralise tout
++ src/app/pokemons/, ou l'on va placer tous élements relatifs au module pokemon
(composants, pipes, directives) (tout ce qui se rapporte aux pokemons)
++ src/app/pokemons/pokemons.module.ts
// fichier qui sert à articuler tous les autres éléments du module
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
// BrowserModule inclut CommonModule
// permet de démarrer l'appli dans le navigateur
// CommonModule à importer pour les sous modules (pas module racine)
import { ListPokemonComponent } from './list-pokemon.component';
import { DetailPokemonComponent } from './detail-pokemon.component';
import { BorderCardDirective } from './border-card.directive';
import { PokemonTypeColorPipe } from './pokemon-type-color.pipe';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    ListPokemonComponent,
    DetailPokemonComponent,
    BorderCardDirective,
    PokemonTypeColorPipe
  ],
  providers: [] // déclare les services
})
export class PokemonsModule { }

○ Les routes du "module"
Le "module" doit avoir ses propres routes car 
les modules regroupent des fonctionnalités indépendantes,
chaque "module" doit posséder des routes propres
++ src/app/pokemons/pokemons-routing.module.ts
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { ListPokemonComponent } from './list-pokemon.component';
import { DetailPokemonComponent } from './detail-pokemon.component';

// les routes du module Pokémon
// ne concernent que les pokemons
// pas de page d'accueil ni de page 404
const pokemonsRoutes: Routes = [
  { path: 'pokemons', component: ListPokemonComponent },
  { path: 'pokemon/:id', component: DetailPokemonComponent }
];

@NgModule({
  imports: [
    RouterModule.forChild(pokemonsRoutes)
    // forChild() pour ajouter des routes additionnelles
    // aux routes du module racine
    // forRoot() seulement pour le module racine !
    // permet de modifier les routes du module
    // sans modifier celles du module principal
  ],
  exports: [
    RouterModule
  ]
})
export class PokemonRoutingModule { }

○ Déclarer les routes
src/app/pokemons/pokemons.module.ts
import { PokemonRoutingModule } from './pokemons-routing.module'; // ++

@NgModule({
  imports: [
    CommonModule,
    PokemonRoutingModule // ++
  ]
  // ...
})

il faut MAJ le "module" racine 
src/app/app.module.ts 
supprimer les importations dont nous n'avons plus besoin
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
// import { DetailPokemonComponent } from './pokemons/detail-pokemon.component'; --
// import { ListPokemonComponent } from './pokemons/list-pokemon.component'; --

// import { BorderCardDirective } from './pokemons/border-card.directive'; --
// import { PokemonTypeColorPipe } from './pokemons/pokemon-type-color.pipe'; --
import { AppRoutingModule } from './app-routing.module';
import { PageNotFoundComponent } from './page-not-found.component';
import { PokemonsModule } from './pokemons/pokemons.module'; // ++
import { ok } from 'assert'

// permet de déclarer un nouveau module
@NgModule({
  imports: [
    BrowserModule, // ordre : modules avant les routes
    PokemonsModule, // ++
    AppRoutingModule // ordre détermine l'ordre de déclaration des routes
  ],
  declarations: [
    AppComponent,
    // BorderCardDirective, --
    // PokemonTypeColorPipe, --
    // ListPokemonComponent, --
    // DetailPokemonComponent, --
    PageNotFoundComponent
  ],
  bootstrap: [AppComponent] // permet d'identifier le composant racine
  // que Angular appelle au démarrage de l'application
})
export class AppModule { }

on doit déclarer les nouvelles routes
src/app/app-routing.module.ts
ne doit contenir que les routes générales 
const appRoutes: Routes = [
  // { path: 'pokemons', component: ListPokemonComponent }, --
  // { path: 'pokemon/:id', component: DetailPokemonComponent }, --
  { path: '', redirectTo: 'pokemons', pathMatch: 'full' }, // par défaut
  { path: '**', component: PageNotFoundComponent }
];

MAJ les url des templates (rajour du dossier pokemons/)
src/app/pokemons/list-pokemon.component.ts 
@Component({
  selector: 'list-pokemon',
  templateUrl: './app/pokemons/list-pokemon.component.html', // ++
})

src/app/pokemons/detail-pokemon.component.ts
@Component({
  selector: 'detail-pokemon',
  templateUrl: './app/pokemons/detail-pokemon.component.html' // ++
})

○ Structurer l'architecture de l'application 
but : donner une administration à l'utilisateur
qui se connecte et peut administrer ses pokemons
* espace privé géré depuis le "module" pokemons
car relative à la gestion des pokémons
* ajouter un composant login dans le "module" racine
car indépendant de la gestion des pokémons

○ A retenir 
* Il existe deux types de modules : 
le "module" racine et les modules de fonctionnalité (sous-modules)
* On déclare un "module" avec l'annotation @NgModule
* Chaque "module" regroupe tous les composants, directives, pipes, services, 
... liés au développement d'une fonctionnalité donnée, dans un dossier à part
* Chaque "module" peut disposer de ses propres routes
* On définit les routes de nos sous-modules avec forChild, 
et forRoot pour le "module" racine


IX) LES SERVICES ET LES DEPENDANCES

○ Créer un premier service 
Un service = singleton, cad une instance unique d'un objet
rôle = fournir un ensemble de tâches nécessaires au fonctionnement de votre application
classe qui peut être utilisée partout et qui centralise des fonctionnalités communes 
(ex. list et details ont besoin de faire des opérations sur le tableau de pokémons)

création d'un service qui renvoie la liste d'un pokémon + un pokémon en particulier 
objectif : créer une classe commune pour gérer les pokémons 
++ src/app/pokemons/pokemons.service.ts
import { Injectable } from '@angular/core';

import { Pokemon } from './pokemon';
import { POKEMONS } from './mock-pokemons';

@Injectable() // permet d'indiquer que ce service peut avoir des dépendances
export class PokemonsService {
  // Retourne tous les pokémons
  getPokemons(): Pokemon[] {
    return POKEMONS;
  }

  // Retourne le pokémon avec l'identifiant passé en paramètre
  getPokemon(id: number): Pokemon {
    let pokemons = this.getPokemons();

    for (let index = 0; index < pokemons.length; index++) {
      if (id === pokemons[index].id) {
        return pokemons[index];
      }
    }
  }
}

○ Utiliser un service 
src/app/pokemons/list-pokemon.component.ts
import { PokemonsService } from './pokemons.service'; // ++
// ...
export class ListPokemonComponent implements OnInit {

  private pokemons: Pokemon[];

  constructor(private router: Router, private pokemonsService: PokemonsService) {
    // instance disponible sous forme de propriété privée this.pokemonsService
    // injection de dépendance garantit que l'instance est unique dans l'appli
    // si on l'utilise dans un autre composant, ça sera la même instance
    // comme c'est unique : sert de stockage provisoire de nos données
    // NE SURTOUT PAS INSTANCIER LE SERVICE DANS LE CONSTRUCTEUR
    // Un service est une boîte noire qui n'interesse pas les composants
  }

  // ... 

}

○ Fournir un service
src/app/pokemons/list-pokemon.component.ts
@Component({
  selector: 'list-pokemon',
  templateUrl: './app/pokemons/list-pokemon.component.html',
  providers: [PokemonsService] // ++ permet d'accéder au service à l'instanciation
  // de la classe ListePokemonComponent
})

○ Consommer un Service 
src/app/pokemons/list-pokemon.component.ts
// import { POKEMONS } from './mock-pokemons'; --
export class ListPokemonComponent implements OnInit {

  // ...

  ngOnInit() {
    // étape d'initiliation
    this.pokemons = this.pokemonsService.getPokemons(); // ++
  }
}

src/app/pokemons/detail-pokemon.component.ts
// import { POKEMONS } from './mock-pokemons'; --
import { PokemonsService } from './pokemons.service'; // ++

@Component({
    selector: 'detail-pokemon',
    templateUrl: './app/pokemons/detail-pokemon.component.html',
    providers: [PokemonsService] // ++
})
export class DetailPokemonComponent implements OnInit {

    // pokemons: Pokemon[] = null; -- (plus besoin)
    pokemon: Pokemon = null; // le pokemon à afficher

    constructor(
        private route: ActivatedRoute, 
        private router: Router,
        private pokemonsService: PokemonsService) { } // ++
    // je récupère des informations depuis l'url du composant grâce à route
    // j'aurais besoin de rediriger l'utilisateur grâce à Router

    ngOnInit(): void {
        // this.pokemons = this.pokemonsService.getPokemons(); -- (plus besoin)

        let id = +this.route.snapshot.paramMap.get('id'); // +permetDeCasterValeurEnNnombre
        // récupère l'id contenue dans l'url
        // propriété snapshot : synchrone (bloque l'éxécution du programme tant
        // que l'id n'est pas récupérée)
        this.pokemon = this.pokemonsService.getPokemon(id);

        // for (let i = 0; i < this.pokemons.length; i++) { } --
    }

    // ... 

}

○ L'injection de dépendances 
on a fournit un fournisseur de service (provider) dans :
* list-pokemon
* details-pokemon
idée : rendre le processus unique, en amont depuis pokemons.module 
(plus besoin de le déclarer à chaque fois par la suite)
injection de dépendances : design pattern (modèle de développement)
une classe reçoit ses dépendances plutôt que les créer elle-même

○ Fournir un service à toute l'application 
* placer le service au niveau du dossier app (racine)
* fournir le service au "module" racine de l'application
ex. src/app/app.module.ts
import { AwesomeService } from './awesome.service'; // ++

@NgModule({
  providers: [AwesomeService] // ++
})

○ Fournir un service à un "module"
on supprime le provider de detail-pokemon et list-pokemon
@Component({
  selector: 'detail-pokemon',
  templateUrl: './app/pokemons/detail-pokemon.component.html',
  // providers: [PokemonsService] --
})

src/app/pokemons/pokemons.module.ts 
import { PokemonsService } from './pokemons.service'; // ++

@NgModule({
  // ...
  providers: [PokemonsService] // ++
})

(!) Il est recommandé d'être le + précis dans sa stratégie des providers

○ Fournir un service à un composant
import { MonService } from './mon.service';
@Component({
  // ...
  providers: [MonService]
})

○ A retenir 
  * Il faut ajouter l'annotation @Injectable sur tous nos services
  * Un service permet de factoriser et de centraliser du code qui peut être utile ailleurs dans l'appli
  * On utilise l'injection de dépendances pour rendre un service disponible dans un composant
  * L'injection de dépendance permet de garantir que l'instance de notre service 
  est unique à travers toute l'application
  * On définit un fournisseur de service pour déterminer 
  dans quelles zones de notre application notre service sera disponible
  * On peut fournir un service pour toute l'application, pour un module particulier ou pour un composant


X) LES FORMULAIRES 

○ Les formulaires 
* Forms Module = développe une partie importante du formulaire dans le template
adapté aux petits formulaires
* Reactive Forms Module = plus centré sur le développement du formulaire côté composant
* proviennent de la même libraire = '@angular/forms'

○ La directive ngForm 
active sur toutes les balises <form></form> où le "module" a été importé
permet de savoir si le formulaire est valide ou non

○ La directive ngModel 
s'applique sur chacun des champs du formulaire
Tableau des classes de la directive > https://angular.io/guide/forms#track-control-state-and-validity-with-ngmodel

○ Créer un formulaire
Pourquoi "?" Editer certaines propriétés d'un pokémon 
Combien de champs "?" Nom, Points vie, dégâts, Types 
le formulaire sera un composant 

○ Le composant du formulaire 
src/app/pokemons/pokemon-form.component.ts 
import { Component, Input, OnInit } from '@angular/core';
// Input permet d'écrire une propriété d'entrée pour un composant
import { Router } from '@angular/router';
// pour une redirection après la soumission du formulaire
import { PokemonsService } from './pokemons.service';
import { Pokemon } from './pokemon';

@Component({
  selector: 'pokemon-form',
  templateUrl: './app/pokemons/pokemon-form.component.html',
  styleUrls: ['./app/pokemons/pokemon-form.component.css']
})
export class PokemonFormComponent implements OnInit {

  @Input() pokemon: Pokemon; // propriété d'entrée du composant
  // formulaire ne peut pas marcher sans la valeur Pokemon en valeur d'entrée
  types: Array<string>; // types disponibles pour un pokémon : 'Eau', 'Feu', etc ...

  constructor(
    private pokemonsService: PokemonsService,
    private router: Router) { }

  ngOnInit() {
    // Initialisation de la propriété types
    this.types = this.pokemonsService.getPokemonTypes();
  }

  // Détermine si le type passé en paramètres appartient ou non au pokémon en cours d'édition.
  hasType(type: string): boolean {
    let index = this.pokemon.types.indexOf(type);
    if (index > -1) return true;
    return false;
  }

  // Méthode appelée lorsque l'utilisateur ajoute ou retire un type au pokémon en cours d'édition.
  selectType($event: any, type: string): void {
    let checked = $event.target.checked;
    if (checked) {
      this.pokemon.types.push(type);
    } else {
      let index = this.pokemon.types.indexOf(type);
      if (index > -1) {
        this.pokemon.types.splice(index, 1);
      }
    }
  }

  // Valide le nombre de types pour chaque pokémon
  isTypesValid(type: string): boolean {
    if (this.pokemon.types.length === 1 && this.hasType(type)) {
      return false;
    }
    if (this.pokemon.types.length >= 3 && !this.hasType(type)) {
      return false;
    }

    return true;
  }

  // La méthode appelée lorsque le formulaire est soumis.
  onSubmit(): void {
    console.log("Submit form !");
    let link = ['/pokemon', this.pokemon.id];
    this.router.navigate(link);
  }

}

src/app/pokemons/pokemons.service.ts 
export class PokemonsService {
  // ...
  getPokemonTypes(): string[] { // ++
    return ['Plante', 'Feu', 'Eau', 'Insecte', 'Normal', 'Electrik',
      'Poison', 'Fée', 'Vol'];
  }
}

○ Le template du formulaire 
src/app/pokemons/pokemon-form.component.html
<form *ngIf="pokemon" (ngSubmit)="onSubmit()" #pokemonForm="ngForm" >
// un pokémon a bien été soumis au formulaire
// attache la soumission du formulaire à la méthode onSubmit()
// #variableTemplate="ngForm"
  <div class="row">
    <div class="col s8 offset-s2">
      <div class="card-panel">

        <!-- Pokemon name -->
        <div class="form-group">
          <label for="name">Nom</label>
          <input type="text" class="form-control" id="name"
                  required
                  pattern="^[a-zA-Z0-9àéèç]{1,25}$"
                 // ngModel permet liaison bidirectionnelle composant - template
                 // combinaison [liaison de propriété] + (liaison d'évenement)
                 [(ngModel)]="pokemon.name" name="name"
                 #name="ngModel" > // on associant la directive ngModel
                 // la variable permet de déclarer le champ
                 // sur laquelle elle est rattachée

          <div [hidden]="name.valid || name.pristine"
                class="card-panel red accent-1" />
                Le nom du pokémon est requis (1-25).
          </div>
        </div>

        <!-- Pokemon hp -->
        <div class="form-group">
          <label for="hp">Point de vie</label>
          <input type="number" class="form-control" id="hp"
                  required
                  pattern="^[0-9]{1,3}$"
                 [(ngModel)]="pokemon.hp" name="hp"
                 #hp="ngModel" >
           <div [hidden]="hp.valid || hp.pristine"
                 class="card-panel red accent-1" />
                 Les points de vie du pokémon sont compris entre 0 et 999.
           </div>
        </div>

        <!-- Pokemon cp -->
        <div class="form-group">
          <label for="cp">Dégâts</label>
          <input type="number" class="form-control" id="cp"
                  required
                  pattern="^[0-9]{1,2}$"
                 [(ngModel)]="pokemon.cp" name="cp"
                 #cp="ngModel" >
           <div [hidden]="cp.valid || cp.pristine"
                 class="card-panel red accent-1" />
                 Les dégâts du pokémon sont compris entre 0 et 99.
           </div>
        </div>

        <!-- Pokemon types -->
        <form class="form-group">
          <label for="types">Types</label>
          <p *ngFor="let type of types" > // loop for 
            <label>
              <input type="checkbox"
                class="filled-in"
                id="{{ type }}" // liaison par interpolation
                // [checked]="hasType(type) permet de cocher la case
                // (change) = appele la méthode appelée à chaque changement
                [value]="type"
                [checked]="hasType(type)"
                [disabled]="!isTypesValid(type)"
                (change)="selectType($event, type)"/>
              <span [attr.for]="type" > // liaison par interpolation
                <div class="{{ type | pokemonTypeColor }}">
                  {{ type }}
                </div>
              </span>
            </label>
          </p>
        </form>

        <!-- Submit button -->
        <div class="divider"></div>
        <div class="section center">
          <button type="submit"
            class="waves-effect waves-light btn"
            // [disabled] si formulaire invalide
            [disabled]="!pokemonForm.form.valid" >
            Valider</button>
        </div>

      </div>
    </div>
  </div>
</form>
<h3 *ngIf="!pokemon" class="center">Aucun pokémon à éditer...</h3>

○ Ajouter des règles de validation
Restrictions à définir :
  * Nom: string (1 à 25 caractères);
  * PointsVie: number (0 - 999);
  * Degats: number (0 - 99);
  * Types: string[] (max 3);

Comprendre "l'attribut pattern" > https://www.w3schools.com/tags/att_input_pattern.asp
<input type="text" id="country_code" name="country_code"
  pattern="[A-Za-z]{3}" title="Three letter country code" />

// Pokemon name : string (1 à 25 caractères)
<input type="text" class="form-control" id="name" required pattern="^[a-zA-Z0-9àéèç]{1,25}$"
  [(ngModel)]="pokemon.name" name="name" #name="ngModel" />

// Pokemon hp (points de vie) : number (0 - 999)
<input type="number" class="form-control" id="hp" required pattern="^[0-9]{1,3}$"
  [(ngModel)]="pokemon.hp" name="hp" #hp="ngModel" />

// Pokemon cp (dégâts) number (0 - 99);
<input type="number" class="form-control" id="cp" required pattern="^[0-9]{1,2}$"
  [(ngModel)]="pokemon.cp" name="cp" #cp="ngModel" />

src/app/pokemons/pokemon-form.component.ts
// Valide le nombre de types pour chaque pokémon
isTypesValid(type: string): boolean {
    if (this.pokemon.types.length === 1 && this.hasType(type)) {
        return false;
    }
    if (this.pokemon.types.length >= 3 && !this.hasType(type)) {
        return false;
    }

    return true;
}

src/app/pokemons/pokemon-form.component.html
// partie sur la sélection des types
// on lie l'attribut disabled à la méthode isTypesValid
<input type="checkbox" class="filled-in" id="{{ type }}" [value]="type"
  [checked]="hasType(type)" [disabled]="!isTypesValid(type)"
  (change)="selectType($event, type)" />

○ Prévenir l'utilisateur en cas d'erreur
○ Ajouter des indicateur visuels
src/app/pokemons/pokemon-form.component.css
.ng-valid[required], .ng-valid.required {
  border-left: 5px solid #42A948; /* bordure verte si champ requis valide */
}

.ng-invalid:not(form) {
  border-left: 5px solid #a94442; /* bordure rouge sur les élements invalides */
  /* pas de type form */
}

src/app/pokemons/pokemon-form.component.ts 
@Component({
  selector: 'pokemon-form',
  templateUrl: './app/pokemons/pokemon-form.component.html',
  styleUrls: ['./app/pokemons/pokemon-form.component.css'] // ++
})

○ Afficher les messages "d'erreur"
src/app/pokemons/pokemon-form.component.html 
<div [hidden]="name.valid || name.pristine" class="card-panel red accent-1">
    Le nom du pokémon est requis (1-25).
</div>
// le message est masqué si la propriété name est valide
// ou jamais modifiée (attribut pristine)
<div [hidden]="hp.valid || hp.pristine" class="card-panel red accent-1">
  Les points de vie du pokémon sont compris entre 0 et 999.
</div>
<div [hidden]="cp.valid || cp.pristine" class="card-panel red accent-1">
  Les dégâts du pokémon sont compris entre 0 et 99.
</div>

○ Intégrer le formulaire
* Créer un composant parent qui appelle le formulaire
++ src/app/pokemons/edit-pokemon.component.ts
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import { Pokemon } from './pokemon';
import { PokemonsService } from './pokemons.service';

@Component({
  selector: 'edit-pokemon',
  // affiche le pokemon seulement s'il existe pokemon?name
  template: `
    <h2 class="header center">Editer {{ pokemon?.name }}</h2>
		<p class="center">
			<img *ngIf="pokemon" [src]="pokemon.picture"/>
		</p>
    <pokemon-form [pokemon]="pokemon"></pokemon-form>
  `,
  // <pokemon-form>Composant du formulaire 
  //  [liaison de propriété]="valeur d'entrée du composant"</pokemon-form>
})
export class EditPokemonComponent implements OnInit {

  pokemon: Pokemon = null;

  constructor(
    private route: ActivatedRoute,
    private pokemonsService: PokemonsService) {}

  ngOnInit(): void {
    let id = +this.route.snapshot.params['id'];
    this.pokemon = this.pokemonsService.getPokemon(id);
  }
}

src/app/pokemons/pokemons.module.ts
import { FormsModule } from '@angular/forms'; // ++

import { PokemonFormComponent } from './pokemon-form.component'; // ++
import { EditPokemonComponent } from './edit-pokemon.component'; // ++

@NgModule({
  imports: [
    CommonModule,
    FormsModule, // ++ (importer les modules Angular avant propres modules)
    PokemonRoutingModule
  ],
  declarations: [
    ListPokemonComponent,
    DetailPokemonComponent,
    PokemonFormComponent, // ++
    EditPokemonComponent, // ++
  ]
  // ...
})

src/app/pokemons/pokemons-routing.module.ts
import { EditPokemonComponent } from './edit-pokemon.component'; // ++

const pokemonsRoutes: Routes = [
  { path: 'pokemons', component: ListPokemonComponent },
  { path: 'pokemon/edit/:id', component: EditPokemonComponent },  // ++
  // en 2° pour éviter d'être écrasé par la requête pokemon/:id
  // ordre : du plus précis au plus général
  { path: 'pokemon/:id', component: DetailPokemonComponent },
];

src/app/pokemons/detail-pokemon.component.html
// on ajoute le bouton d'édition
<div class="card-action">
    <a (click)="goBack()" >Retour</a>
    <a (click)="goEdit(pokemon)" >Editer</a>
</div>

src/app/pokemons/detail-pokemon.component.ts
export class DetailPokemonComponent implements OnInit {
  // ... 
  goEdit(pokemon: Pokemon): void {
    let link = ['/pokemon/edit', pokemon.id]
    this.router.navigate(link);
  }
}

○ A retenir :
  * 2 modules différents pour développer des formulaires Angular: FormsModule et ReactiveFormsModule
  * Le "module" FormsModule est pratique pour développer des formulaires de petites tailles
  * Il met à disposition les directives NgForm et NgModel
  * La directive NgModel ajoute et retire certaines classes au champ sur lequel elle s'applique
  * Ces classes peuvent être utilisées pour afficher des messages d'erreurs ou de succès
  * La syntaxe à retenir pour utiliser NgModel est[()]
  * On peut utiliser les attributs HMTL5 pour gérer la validation côté client, comme required ou pattern
  * On peut utiliser des validateurs personnalisés en développant ses propres méthodes de validation
  * Il faut toujours effectuer une validation côté serveur en complément de la validation côté client


XI) LA PROGRAMMATION REACTIVE 

But = intéragir avec un serveur distant;

○ Le fonctionnement des promesses
* simplifier la programmation asynchrone 
programmation asynchrone = mode de fonctionnement dans lequel les opérations sont non bloquantes
(n'exigent pas de recharger la page ou d'avoir une réponse pour que la suite s'effectue');
* intègre un callback de succès et un callback d'erreur' 

// récupérer un user grâce à son id
let getUser = function(idUser) {
  return new Promise(function(resolve, reject) { 
    // création d'une promesse(function(callback succès, callback erreur))
    // appel asynchrone au serveur pour récupérer les infos du user
    // a partir de la reponse du serveur, on extrait les donnees du user
    let user = reponse.data.user;
    if (response.status === 200) {
      resolve(user); // callback succès
    } else {
      reject(`Cet utilisateur n'existe pas !`); // callback erreur
    }
  })
};

// fonction qui renvoie une promesse
// contenant les infos du user
getUser(idUser)
  .then(function(user) { // success
    console.log(user);
    this.user = user; // récupère la valeur de retour
  }, function(error) { // error
    console.log(error);
});

// même fonction, en ES6 avec les arrow functions
getUser(idUser)
  .then(user => { // success
  console.log(user);
  this.user = user; // récupère la valeur de retour
  }, error => console.log(error);
});

○ La programmation réactive 
façon différente de concevoir une application
idée = considérer les interactions dans l'appli comme des événements'
sur lesquels on peut effectuer des opérations (regroupement, filtrage, combinaisons)
ex. les clics deviennent des évenements asynchrones auxquels on s'abonne pour réagir'
Programmation réactive = programmation avec des flux de données asynchrones
écouteurs d'évenements = observeurs'
flux, sujet observé = observable
observer un flux = s'abonner, s'inscrire à un flux

○ Qu'est ce qu'un flux '?'
séquence d'événements en cours ordonnés dans le temps'
on peut y appliquer des opérations
site illustrant la programmation réactive: Programmation réactive = https://rxmarbles.com/
on peut définir une fonction à exécuter selon le flux
Une fonction peut traiter :
* les valeurs de la réponse 
* le cas d'erreur'
* le signal de fin

○ La librairie RxJS
bibliothèque la plus populaire
choisie par Angular

○ Les Observables
un flux d'evenements est représenté par un Objet appelé Observable'
comme un tableau contenant des valeurs qui se rajoutent dans le temps
opérations similaires à celles appliquées à un tableau
ex.la fonction take > https://rxmarbles.com/#take
récupère les n premiers éléments d'un flux et se débarasse du reste'
ex.la fonction map > https://rxmarbles.com/#map
comme sur un tableau, l'opération s'effectue sur chaque événement et retourne le résultat
ex.la fonction filter > https://rxmarbles.com/#filter
filtre les événements qui répondent positive à la condition passée en paramètre
ex.la fonction merge > https://rxmarbles.com/#merge
fusionne deux flux
ex. la fonction subscribe >
applique la fonction passée en paramètre à chaque événement reçu dans le flux
accepte une deuxieme fonction en paramètres, pour la gestion d'erreurs'
envoie un événement de terminaison (fin de vie) détectable avec une autre fonction

// ex.
Observable.fromArray([1, 2, 3, 4, 5])
  .filter(x => x > 2) // [3, 4, 5]
  .map(x => x * 2) // [6, 8, 10]
  .subscribe(x => console.log(x)); // affiche résultat

Observable : collection asynchrone dont les événements se rajoutent au cours du temps 
On peut le construire depuis une requête AJAX, event du navigation, promesse, etc. 

○ Choisir Observable ou Promesse 
utilisation des promesses = plus simple;
répondent largement aux besoins de l'application'
il est possible de transformer un Observable en Promesse,
grâce à la méthode toPromise de RxJS

import 'rxjs/add/operator/toPromise';

function giveMePromiseFromObservable() {

  return Observable.fromArray([1, 2, 3, 4, 5])
    .filter(x => x > 2) // [3, 4, 5]
    .map(x => x * 2) // [6, 8, 10]
    .toPromise()

}

○ A retenir 
  * Les promesses sont natives en JavaScript depuis l'arrivée de la norme ES6'.
  * La programmation réactive implique de gérer des flux de données asynchrones
  * Un flux est une séquence d'événements ordonnés dans le temps'
  * On peut appliquer différentes opérations sur les flux: regroupements, filtrages, troncatures, etc
  * Un flux peut émettre trois types de réponses:
  * la valeur associée à un événement, une erreur, ou un point de terminaison pour mettre fin au flux.
  * La librairie RxJS est la librairie la plus populaire pour implémenter la programmation réactive en JavaScript
  * Dans RxJS, les flux d'événements sont représentés par un objet appelé Observable'


XII) EFFECTUER DES REQUETES HTTP 

API = 'interface' de programmation, 
permet de communiquer avec un service distant depuis votre appli 

○ Mettre en place le 'module' HttpClientModule
permet de faire communiquer l'appli' avec un serveur distant via le protocole HTTP 
il faut l'importer' depuis la librairie '@angular/common/http'
src/systemjs.config.js
'@angular/common/http': 'npm:@angular/common/bundles/common-http.umd.js'
src/app/app.module.ts
import { HttpClientModule } from '@angular/common/http'; // ++

// permet de déclarer un nouveau module
@NgModule({
  imports: [
    BrowserModule, // ordre : modules avant les routes
    HttpClientModule, // ++
    PokemonsModule,
    AppRoutingModule // ordre détermine l'ordre de déclaration des routes
  ]
  // ...
})

○ Installation d'un module permettant de simuler une API Web'
npm install --save-dev angular-in-memory-web-api
(L'option --save-dev permet de sauvegarder ce paquet directement 
dans la section devDependencies de votre fichier package.json)

○ Simuler une API Web 
HttpClientInMemoryWepApiModule
++ src/app/in-memory-data.service.ts
import { InMemoryDbService } from 'angular-in-memory-web-api';
import { POKEMONS } from './pokemons/mock-pokemons';

export class InMemoryDataService implements InMemoryDbService {
  // methode qui simule une DB et une API
  createDb() {
    let pokemons = POKEMONS;
    return { pokemons };
  }
}

src/app/app.module.ts 
import { HttpClientInMemoryWebApiModule } from 'angular-in-memory-web-api'; // ++
import { InMemoryDataService } from './in-memory-data.service'; // ++ 

@NgModule({
  imports: [
    BrowserModule, // ordre : modules avant les routes
    HttpClientModule, // ++
    // intercepte les requêtes HTTP et retourne les requêtes simulées du serveur
    // dataEncapsulation précise le format des données renvoyées par l'API
    HttpClientInMemoryWebApiModule.forRoot(InMemoryDataService, { dataEncapsulation: false }),
    PokemonsModule,
    AppRoutingModule // ordre détermine l'ordre de déclaration des routes
  ]
  // ...
})

○ Mettre à jour notre service
src/app/pokemons/pokemons.service.ts 
import { Observable } from 'rxjs'; // ++
import { catchError, map, tap } from 'rxjs/operators'; // ++

@Injectable() // permet d'indiquer que ce service peut avoir des dépendances
export class PokemonsService {

  // pour créer une url vers laquelle nous allons appeler l'API ++ 
  private pokemonUrl = 'api/pokemons';

  constructor(private http: HttpClient) { } // ++

  private log(log: string) { // ++
    console.info(log);
    // centralise la gestion des logs de notre service
  }

  // retourne un Observable, qui contient un tableau de pokémons
  getPokemons(): Observable<Pokemon[]> {
    // la méthode get de la propriété retourne un Observable de type Pokemon[]
    // Observable qui envoie une requête HTTP de type GET sur la route api/pokemons
    // l'opérateur tap interagit sur le déroulement des événements générés par l'Observable
    // utilisé pour débugagge, archivage de log... 
    // l'opérateur catchError capte les erreurs
    // le module renvoie les données sous format JSON
    return this.http.get<Pokemon[]>(this.pokemonUrl).pipe(
      tap(() => this.log(`fetched pokemons`)),
      catchError(this.handleError(`getPokemons`, []))
    );
  }
  // ...
}

○ Gérer les erreurs 
src/app/pokemons/pokemons.service.ts
import { Observable, of } from 'rxjs'; // ++
// of : opérateur permet de transformer les données passées en paramètres
// en un Observable
import { catchError, map, tap } from 'rxjs/operators';

import { Pokemon } from './pokemon';
import { POKEMONS } from './mock-pokemons';

@Injectable() // permet d'indiquer que ce service peut avoir des dépendances
export class PokemonsService {

  // ....

  // <T> indique que l'on va typer un type en lui-même
  // parametre operation : nom de la méthode qui a causé l'erreur
  // operation par défaut
  // result : donnée facultative à renvoyer du résultat de l'Observable
  private handleError<T>(operation = 'operation', result?: T) {
    return (error: any): Observable<T> => {
      console.log(error);
      console.log(`${operation} failed: ${error.message}`);

      return of(result as T);
      // renvoie un résultat adapté à la méthode qui a levé l'erreur
      // renvoie le type attendu par cette méthode
      // tableau pour getPokemons
      // Pokemon pour getPokemon
      // permet de faire fonctionner l'appli même si une erreur est levée
    }
  }

  // ...

}

○ Récupérer un pokémon à partir de son identifiant
src/app/pokemons/pokemons.service.ts
export class PokemonsService {

  // pour créer une url vers laquelle nous allons appeler l'API ++ 
  private pokemonUrl = 'api/pokemons';

  // Retourne le pokémon avec l'identifiant passé en paramètre
  getPokemon(id: number): Observable<Pokemon> {
    const url = `${this.pokemonUrl}/${id}`;

    return this.http.get<Pokemon>(url).pipe(
      tap(() => this.log(`fetched pokemon with id : ${id}`)),
      catchError(this.handleError<Pokemon>(`getPokemon id=${id}`))
    );
  }
}

○ Utiliser le service mis à jour 
les méthodes renvoyant des Observables, il faut modifier tous les composants qui utilisent le service 
src/app/pokemons/list-pokemon.component.ts
// Rappel : la fonction subscribe applique la fonction passée en paramètre 
// à chaque événement reçu dans le flux
export class ListPokemonComponent implements OnInit {

  private pokemons: Pokemon[];

  ngOnInit() {
    // étape d'initiliation
    this.pokemonsService.getPokemons()
      .subscribe(pokemons => this.pokemons = pokemons); 
      // valorise la propriété pokemons avec le tableau de pokemons 
      // contenu dans l'Observable
  }
}

src/app/pokemons/detail-pokemon.component.ts
export class DetailPokemonComponent implements OnInit {

  pokemon: Pokemon = null; // le pokemon à afficherr

  ngOnInit(): void {

    let id = +this.route.snapshot.paramMap.get('id');

    this.pokemonsService.getPokemon(id)
      .subscribe(pokemon => this.pokemon = pokemon);
      // valorise la propriété pokemon avec l'objet Pokemon 
      // contenu dans l'Observable
  }
}
src/app/pokemons/edit-pokemon.component.ts
export class EditPokemonComponent implements OnInit {

  pokemon: Pokemon = null;

  ngOnInit(): void {

    let id = +this.route.snapshot.paramMap.get('id');

    this.pokemonsService.getPokemon(id)
      .subscribe(pokemon => this.pokemon = pokemon);
    // valorise la propriété pokemon avec l'objet Pokemon 
    // contenu dans l'Observable
  }
}

○ Modifier un pokémon 
Il faut à présent écrire des requêtes http pour faire persister les données

○ Ajouter une méthode de modification
écrire une méthode pour faire persister nos modifications
PUT = type de requête pour modifier une ressource
src/app/pokemons/pokemons.service.ts
export class PokemonsService {

  // pour créer une url vers laquelle nous allons appeler l'API ++ 
  private pokemonUrl = 'api/pokemons';

  updatePokemon(pokemon: Pokemon): Observable<Pokemon> {
    const HttpOptions = {
      headers: new HttpHeaders({ 'Content-Type': 'application/json' })
      // déclare une en-tête pour déclarer que la requête sera au format JSON
    };

    // put(adresse, corps, options)
    return this.http.put(this.pokemonUrl, pokemon, HttpOptions).pipe(
      tap(() => this.log(`updated pokemon with id : ${pokemon.id}`)),
      catchError(this.handleError<any>('updatePokemon'))
    );
  }
}

○ Sauvegarder les données
src/app/pokemons/pokemon-form.component.ts 
export class PokemonFormComponent implements OnInit {

  @Input() pokemon: Pokemon; // propriété d'entrée du composant
  // formulaire ne peut pas marcher sans la valeur Pokemon en valeur d'entrée

  // La méthode appelée lorsque le formulaire est soumis.
  onSubmit(): void {
    console.log("Submit form !");
    // persiste les données
    this.pokemonsService.updatePokemon(this.pokemon)
      .subscribe(() => this.goBack());
    // revient sur le profil modifié du pokemon
  }

  goBack(): void {
    let link = ['/pokemon', this.pokemon.id];
    this.router.navigate(link);
  }
}

○ Supprimer un pokémon 
src/app/pokemons/pokemons.service.ts
export class PokemonsService {

  // pour créer une url vers laquelle nous allons appeler l'API ++ 
  private pokemonUrl = 'api/pokemons';

  // création d'une méthode de suppresion dans le service
  deletePokemon(pokemon: Pokemon): Observable<Pokemon> {
    const url = `${this.pokemonUrl}/${pokemon.id}`;
    const HttpOptions = {
      headers: new HttpHeaders({ 'Content-Type': 'application/json' })
      // déclare une en-tête pour déclarer que la requête sera au format JSON
    };

    return this.http.delete<Pokemon>(url, HttpOptions).pipe(
      tap(() => this.log(`deleted pokemon with id ${pokemon.id}`)),
      catchError(this.handleError<Pokemon>('deletePokemon'))
    );
  }
}

src/app/pokemons/detail-pokemon.component.ts
export class DetailPokemonComponent implements OnInit {

  pokemon: Pokemon = null; // le pokemon à afficher

  // ajout de la méthode pour la lier à la méthode de suppresion du service
  delete(pokemon: Pokemon): void {
    this.pokemonsService.deletePokemon(pokemon)
      .subscribe(() => this.goBack());
  }

  goBack(): void {
    this.router.navigate(['/pokemons']);
    // revient à la page d'accueil
    // url dans un tableau
    // window.history.back(); // même processus, moins fiable
    // car on ne sait pas d'où il vient
  }
}

src/app/pokemons/detail-pokemon.component.html
// rajout du bouton supprimer + effet de style pour le mettre en retrait
<div class="card-action">
    <a (click)="goBack()" class="waves-effect waves-light btn">Retour</a>
    <a (click)="goEdit(pokemon)" class="waves-effect waves-light btn">Editer</a>
    <a (click)="delete(pokemon)" >Supprimer</a>
</div>

○ Construire un champ de recherche d'autocomplétion'
src/app/pokemons/pokemons.service.ts
export class PokemonsService {

  // pour créer une url vers laquelle nous allons appeler l'API ++ 
  private pokemonUrl = 'api/pokemons';

  // term : terme de la recherche rentré par l'utilisateur
  searchPokemons(term: string): Observable<Pokemon[]> {
    // terme vide renvoie tableau vide
    if (!term.trim()) {
      return of([]);
    }

    // url dynamique de l'API
    return this.http.get<Pokemon[]>(`${this.pokemonUrl}/?name=${term}`).pipe(
      tap(() => this.log(`found pokemons matching "${term}"`)),
      catchError(this.handleError<Pokemon[]>('searchPokemons', []))
    );
  }
}

○ Consommer un Observable 
idée = créer un composant search-pokemon-component
aura pour rôle d'afficher' et de gérer le champ de recherche des pokémons 
et l'autocomplétion'
src/app/pokemons/search-pokemon.component.html 
<div class="row">
  <div class="col s12 m6 offset-m3">
    <div class="card">
      <div class="card-content">
        <div class="input-field">
          la méthode de liaison keyup appelle la méthode search 
          et lui envoie la dernière lettre tapée
          <input #searchBox (keyup)="search(searchBox.value)"
            placeholder="Rechercher un pokémon"/>
        </div>

        <div class="collection">
          le pipe async permet d'afficher le résultat 
          que quand l'Observable a trouvé une réponse
          pokemon$ car un Observable, un flux
          <a *ngFor="let pokemon of pokemons$ | async"
            (click)="gotoDetail(pokemon)" class="collection-item">
            {{ pokemon.name }}
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

src/app/pokemons/search-pokemon.component.ts
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

import { debounceTime, distinctUntilChanged, switchMap } from 'rxjs/operators';
import { Observable, Subject, of } from 'rxjs';

import { PokemonsService } from './pokemons.service';
import { Pokemon } from './pokemon';

@Component({
  selector: 'pokemon-search',
  templateUrl: './app/pokemons/search-pokemon.component.html'
})
export class PokemonSearchComponent implements OnInit {

  private searchTerms = new Subject<string>(); // vient de la libraire rxjs
  // stocke les recherches dans un tableau de string
  // sous la forme d'un Observable
  pokemons$: Observable<Pokemon[]>;

  constructor(
    private pokemonsService: PokemonsService,
    private router: Router) { }

  // Ajoute un terme de recherche dans le flux de l'Observable 'searchTerms'
  search(term: string): void {
    this.searchTerms.next(term);
  }

  ngOnInit(): void {
    this.pokemons$ = this.searchTerms.pipe(
      // opérations pour réduire le flux de requêtes :
      // attendre 300ms de pause entre chaque requête
      debounceTime(300),
      // ignorer la recherche en cours si c'est la même que la précédente
      distinctUntilChanged(),
      // on retourne la liste des résultats correpsondant aux termes de la recherche
      switchMap((term: string) => this.pokemonsService.searchPokemons(term)),
    );
  }

  gotoDetail(pokemon: Pokemon): void {
    let link = ['/pokemon', pokemon.id];
    this.router.navigate(link);
  }
}

○ Afficher le champ de recherche 
src/app/pokemons/list-pokemon.component.html
// add search form
<pokemon-search></pokemon-search>

src/app/pokemons/pokemons.module.ts
// module centralise tous les fichiers du module
import { PokemonSearchComponent } from './search-pokemon.component'; // ++

@NgModule({
    declarations: [
        ListPokemonComponent,
        DetailPokemonComponent,
        PokemonFormComponent, 
        EditPokemonComponent, 
        PokemonSearchComponent, // ++
        BorderCardDirective,
        PokemonTypeColorPipe
    ]
})

○ Ajouter un icône de chargement
// disponible sur tout le site
++ src/app/loader.component.ts
import { Component } from '@angular/core';

@Component({
  selector: 'pkmn-loader',
  template: `
    <div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
  `
})
export class LoaderComponent { }

// afficher le loader sur la page de détail d'un pokemon
src/app/pokemons/detail-pokemon.component.html
<h4 *ngIf='!pokemon' class="center">Aucun pokémon à afficher !</h4>
// devient :
<h4 *ngIf='!pokemon' class="center"><pkmn-loader></pkmn-loader></h4>

src/app/pokemons/pokemon-form.component.html
<h4 *ngIf='!pokemon' class="center">Aucun pokémon à afficher !</h4>
// devient :
<h4 *ngIf='!pokemon' class="center"><pkmn-loader></pkmn-loader></h4>

// déclarer le composant loader là ou il est utilisé
src/app/pokemons/pokemon.module.html
import { LoaderComponent } from '../loader.component'; // ++

@NgModule({
  declarations: [
    ListPokemonComponent,
    DetailPokemonComponent,
    PokemonFormComponent,
    EditPokemonComponent,
    PokemonSearchComponent,
    LoaderComponent, // ++
    BorderCardDirective,
    PokemonTypeColorPipe
  ]
})

○ A retenir 
  * Il est possible de mettre en place une API web de démonstration
  * Les Observables permettent de faciliter la gestion des événements asynchrones
  * Les Observables sont adaptés pour gérer des séquences d'événements'
  * Les opérateurs RxJS ne sont pas tous disponibles dans Angular. 
  * Il faut étendre cette implémentation en important nous-même les opérateurs nécessaires


XIII) L'AUTHENTIFICATION'

○ Un Guard
mécanisme de protection
Doc > `https://angular.io/guide/router#milestone-5-route-guards`
utilisé pour tout scénario lié à la navigation = redirection, authentification 
retourne un booléen
true = le processus de navigation continue
demande des opérations asynchrones (question au user, sauvegarder changements, récupérer des données)
dans la plupart des cas, le type de retour est un Observable qui renvoie boolean ou promesse
le routeur attendra la réponse pour agir sur la navigation
peut avoir plusieurs types =
The router supports multiple guard interfaces:
  * CanActivate to mediate navigation to a route.
  // influence sur la navigation d'une route (la bloquer)
  * CanActivateChild to mediate navigation to a child route.
  // influence sur la navigation d'une route fille
  * CanDeactivate to mediate navigation away from the current route.
  // empêcher de naviguer en dehors de la route courante
  * Resolve to perform route data retrieval before route activation.
  // récuperer les données avant de naviguer
  * CanLoad to mediate navigation to a feature 'module' loaded asynchronously.
  // gérer la navigation vers un sous module chargé de manière asynchrone

○ Mettre en place un guard 
// afficher un message lorsque l'utilisateur essaie d'accéder à la page d'édition d'un pokemon
// utilisation d'un Guard de type CanActivate
++ src/app/auth-guard.service.ts
import { Injectable } from '@angular/core';
import { CanActivate } from '@angular/router';

@Injectable()
// service qui implemente l'interface CanActivate
export class AuthGuard implements CanActivate {

  canActivate(): boolean {
    console.info(`Le guard a bien été appelé !`);
    return true;
  }

}


src/app/pokemons/pokemons-routing.module.ts
import { AuthGuard } from '../auth-guard.service'; // ++

// les routes du module Pokémon
// ne concernent que les pokemons
const pokemonsRoutes: Routes = [
  { path: 'pokemons', component: ListPokemonComponent },
  { path: 'pokemon/edit/:id', component: EditPokemonComponent, canActivate: [AuthGuard] },  // ++
  // en 2° pour éviter d'être écrasé par la requête pokemon/:id
  // ordre : du plus précis au plus général
  { path: 'pokemon/:id', component: DetailPokemonComponent },
];

// reorganisation pour appliquer toutes les routes pokemons à notre Guard
// devient :
const pokemonsRoutes: Routes = [
  {
    path: 'pokemon', // définit un préfixe pour toutes les routes
    canActivate: [AuthGuard], // toutes les routes sont protégées d'un coup
    children: [
      { path: 'all', component: ListPokemonComponent },
      { path: 'edit/:id', component: EditPokemonComponent, canActivate: [AuthGuard] },  // ++
      // en 2° pour éviter d'être écrasé par la requête pokemon/:id
      // ordre : du plus précis au plus général
      { path: ':id', component: DetailPokemonComponent }
    ]
  }
];

src/app/pokemons/pokemons.module.ts
import { AuthGuard } from '../auth-guard.service'; // ++

@NgModule({
  // ...
  providers: [PokemonsService, AuthGuard] // ++ déclare les services
})

// les urls ont désormais changé
// page d'accueil : pokemon/all

src/app/page-not-found.component.ts
<a routerLink="/pokemon/all" class="waves-effect waves-teal btn-flat">
  Retourner à l' accueil
</a>

src/app/pokemons/detail-pokemon.component.ts
goBack(): void {
  this.router.navigate(['/pokemon/all']);
  // revient à la page d'accueil
  // url dans un tableau
  // window.history.back(); // même processus, moins fiable
  // car on ne sait pas d'où il vient
}

// modifier la route par défaut
src/app/app-routing.module.ts
const appRoutes: Routes = [
  { path: '', redirectTo: 'pokemon/all', pathMatch: 'full' }, // par défaut
  // ...
];

○ Un système d'authentification' plus poussé
// création d'un formulaire de connexion
// name + password
// création d'un nouveau service lié à l'authentification
// découper le Guard et le service d'authentification
// 1 fichier = 1 tâche
// authentification + redirection

++ src/app/auth.service.ts 
import { Injectable } from '@angular/core';
// RxJS 6
import { Observable, of } from 'rxjs';
import { tap, delay } from 'rxjs/operators';

@Injectable()
export class AuthService {
  isLoggedIn: boolean = false; // L'utilisateur est-il connecté ?
  redirectUrl: string; // où rediriger l'utilisateur après l'authentification ?
  // Une méthode de connexion
  // simule une connexion à un service externe
  login(name: string, password: string): Observable<boolean> {
    // Faites votre appel à un service d'authentification...
    let isLoggedIn = (name === 'pikachu' && password === 'pikachu');

    return of(true).pipe(
      delay(1000),
      tap(val => this.isLoggedIn = isLoggedIn)
    );
    // retourne un observable après un délai d'1s
  }

  // Une méthode de déconnexion
  logout(): void {
    this.isLoggedIn = false;
  }
}

src/app/auth-guard.service.ts
import { Injectable } from '@angular/core';
import { CanActivate, Router, ActivatedRouteSnapshot, RouterStateSnapshot }
  from '@angular/router';
import { AuthService } from './auth.service';

@Injectable()
export class AuthGuard implements CanActivate {

  // injecte notre service d'authentification + router
  constructor(private authService: AuthService, private router: Router) { }

  // l'objet route : la future route qui sera appelée
  // l'objet state : futur état du routeur de l'appli
  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean {
    let url: string = state.url;
    return this.checkLogin(url);
  }

  // retourne un booleen de manière synchrone
  checkLogin(url: string): boolean {
    if (this.authService.isLoggedIn) { return true; }
    this.authService.redirectUrl = url; // stocke l'url où l'authentification a échoué
    this.router.navigate(['/login']); // redirige vers la page de connexion

    return false;
  }
}

○ Créer une page de connexion
++ src/app/login.component.ts
import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from './auth.service';

@Component({
  selector: 'login',
  template: `
    <div class='row'>
    <div class="col s12 m4 offset-m4">
    <div class="card hoverable">
      <div class="card-content center">
        <span class="card-title">Page de connexion</span>
        <p><em>{{message}}</em></p>
      </div>
			<form #loginForm="ngForm">
	      <div>
					<label for="name">Name</label>
	        <input type="text" id="name" [(ngModel)]="name" name="name" required>
	      </div>
	      <div>
	        <label for="password">Password</label>
	        <input type="password" id="password" [(ngModel)]="password" name="password" required>
	      </div>
	    </form>
      <div class="card-action center">
        <a (click)="login()" class="waves-effect waves-light btn"  *ngIf="!authService.isLoggedIn">Se connecter</a>
        <a (click)="logout()" *ngIf="authService.isLoggedIn">Se déconnecter</a>
      </div>
    </div>
    </div>
    </div>
  `
})
export class LoginComponent {
  message: string = 'Vous êtes déconnecté. (pikachu/pikachu)';
  private name: string;
  private password: string;

  constructor(private authService: AuthService, private router: Router) { }

  // Informe l'utilisateur sur son authentfication.
  setMessage() {
    this.message = this.authService.isLoggedIn ?
      'Vous êtes connecté.' : 'Identifiant ou mot de passe incorrect.';
  }

  // Connecte l'utilisateur auprès du Guard
  login() {
    this.message = 'Tentative de connexion en cours ...';
    this.authService.login(this.name, this.password).subscribe(() => {
      this.setMessage();
      if (this.authService.isLoggedIn) {
        // Récupère l'URL de redirection depuis le service d'authentification
        // Si aucune redirection n'a été définis, redirige l'utilisateur vers la liste des pokemons.
        let redirect = this.authService.redirectUrl ? this.authService.redirectUrl : '/pokemon/all';
        // Redirige l'utilisateur
        this.router.navigate([redirect]);
      } else {
        this.password = '';
      }
    });
  }

  // Déconnecte l'utilisateur
  logout() {
    this.authService.logout();
    this.setMessage();
  }
}

// on utilise le module pour enregistrer la route /login
// et pour déclarer les fournisseurs de notre guard 
++ src/app/login-routing.module.ts
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { AuthService } from './auth.service';
import { LoginComponent } from './login.component';

@NgModule({
  imports: [
    RouterModule.forChild([
      { path: 'login', component: LoginComponent }
    ])
  ],
  exports: [
    RouterModule
  ],
  providers: [
    AuthService
  ]
})
export class LoginRoutingModule { }

// déclarer le module LoginComponent 
// + module loginRoutingModule dans le module racine
// + FormsModule car on ajoute un formulaire (formulaire de connexion)
// reorganisation
src/app/app.module.ts
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms'; // ++

import { PokemonsModule } from './pokemons/pokemons.module';
import { AppRoutingModule } from './app-routing.module'
import { HttpClientInMemoryWebApiModule } from 'angular-in-memory-web-api';
import { LoginRoutingModule } from './login-routing.module'; // ++

import { InMemoryDataService } from './in-memory-data.service';

import { AppComponent } from './app.component';
import { PageNotFoundComponent } from './page-not-found.component';
import { LoginComponent } from './login.component'; // ++

// permet de déclarer un nouveau module
@NgModule({
  imports: [
    BrowserModule, // ordre : modules avant les routes
    HttpClientModule,
    FormsModule, // ++
    // intercepte les requêtes HTTP et retourne les requêtes simulées du serveur
    // dataEncapsulation précise le format des données renvoyées par l'API
    HttpClientInMemoryWebApiModule.forRoot(InMemoryDataService, { dataEncapsulation: false }),
    PokemonsModule,
    LoginRoutingModule, // ++
    AppRoutingModule // ordre détermine l'ordre de déclaration des routes
  ],
  declarations: [
    AppComponent,
    LoginComponent, // ++
    PageNotFoundComponent
  ],
  bootstrap: [AppComponent] // permet d'identifier le composant racine
  // que Angular appelle au démarrage de l'application
})
export class AppModule { }

○ A retenir
  * `L'authentification nécessite la mise en place d'un système fiable: on utilise pour cela les Guards`
  * `Les Guards permettent de gérer toutes sortes de scénarios liés à la navigation: 
  * redirection, connexion, etc`
  * `Les Guards reposent sur un mécanisme simple. 
  * Ils retournent un booléen de manière synchrone ou asynchrone, 
  * qui permet d'influencer le processus de navigation`
  * `Il existe plusieurs types de Guards différents. 
  * Le type utilisé pour l'authentification est CanActivate`
  * `Il faut toujours déclarer les Guards au niveau du module racine, 
  * ainsi que les services tiers qu'ils utilisent`


XIV) MODIFIER DYNAMIQUEMENT LE TITRE DES PAGES

La balise HTML <title> est dans le document <head>, en dehors du corps, 
ce qui le rend inaccessible à la liaison de données Angular. 

○ Utiliser le service Title
`https://angular.io/api/platform-browser/Title`
simple classe, qui fournit deux méthodes pour récupérer et modifier le titre du document HTML courant
getTitle() : string // Récupère le titre du document HTML courant.
setTitle(newTitle : string) // Définit un nouveau titre pour le document HTML courant.
Pour utiliser ce service Title, il faut l'injecter le service dans le composant où 
l'on souhaite l'utiliser
Etant donné que ce service est appelé à être utilisé dans toute l'application, 
nous allons l'injecter dans le composant racine, AppComponent
src/app/app.component.ts
Ensuite on peut définir un titre à la page, grâce à la méthode setTitle()
import { Title } from '@angular/platform-browser'; // ++ 

export class AppComponent() {

  public constructor(private titleService: Title) { }
  
  public updateTitle(title: string) {
    this.titleService.setTitle(title);
  }
}

Il faut également ajouter un fournisseur pour ce service, 
dans le 'module' racine de notre application
src/app/app.module.ts
import { BrowserModule, Title } from '@angular/platform-browser'; // ++

// permet de déclarer un nouveau module
@NgModule({
  // ...
  providers: [Title], // fournit le service 'Title' à l'ensemble de l'application
})

src/app/pokemons-list-pokemon.component.ts 
import { Title } from '@angular/platform-browser'; // ++

export class ListPokemonComponent implements OnInit {

  private pokemons: Pokemon[];

  constructor(private router: Router,
    private pokemonsService: PokemonsService,
    private titleService: Title) { }

  ngOnInit() {
    // ...
    this.titleService.setTitle("La liste des Pokémons"); // add title
  }
}

// en utilisant AppComponent comme un service

import { AppComponent } from '../app.component'; // ++

export class ListPokemonComponent implements OnInit {

  constructor(private router: Router,
    private pokemonsService: PokemonsService,
    private appComponent: AppComponent) { } // ++

  ngOnInit() {
    // ...
    this.appComponent.updateTitle("La liste des Pokémons"); // add title
  }
}

Utiliser le service de façon dynamique  
`https://www.tektutorialshub.com/angular/set-page-title-using-title-service-angular-example/`
`https://blog.bitsrc.io/dynamic-page-titles-in-angular-98ce20b5c334`

