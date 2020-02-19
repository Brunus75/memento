// ---------- MEMENTO ANGULAR ---------- //

// cours Udemy
// Ressources : https://awesome-angular.com/ebook/
// https://angular.io/start

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

○ le mot-clé let : permet de déclarer une variable locale, 
dans le contexte (scope) où elle a été assignée.

    var x = 1;
     
    if (x < 10) { 
      let v = 1; 
      v = v + 21;
      console.log(v);
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

○ Les paramètres de fonctions par défaut
En JavaScript ES6, on peut définir facilement des paramètres de fonctions avec une valeur par défaut.
Imaginons une fonction qui multiplie deux nombres passés en paramètres, 
mais le deuxième paramètre est facultatif, et il vaut 1 par défaut: 

    function multiplier(a, b = 1) {
      return a * b;
    }


○ La syntaxe template string

On peut insérer des variables dans la chaîne de caractères avec ${variable}, comme ceci:

    let name = 'toto';
    let email = 'toto@gmail.com';
    console.info(`${name} a pour email: ${email}`);
    // alt Gr + 7
    
○ Tous les changements: http://es6-features.org/#Constants

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
- Le module racine se nomme par convention AppModule.
- Le composant racine se nomme par convention AppComponent.
- L'ordre de chargement de l'application est le suivant: 
index.html > main.ts > app.module.ts > app.component.ts.
- Le fichier package.json initial est fourni avec des commandes 
prêtes à l'emploi comme la commande npm start, 
qui nous permet de démarrer notre application web.


III) LES COMPOSANTS

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
on rajoute un nouveu fichier pour modéliser un objet Pokemon :
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


