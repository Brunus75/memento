// ---------- MEMENTO REACT ---------- //

// REACT avec Lior CHAMLA //
// https://www.youtube.com/watch?v=no82oluCZag

// REACT avec OC

I) PRESENTATION

React = bibliothèque JavaScript;
Rassemble dans un même fichier structure (HTML), aspect (CSS) et comportement (JS);
Avantages = compréhension plus rapide, tests plus faciles à réaliser;
Pense donc en terme de composant autonome, cohérent et complet;
React a son DOM virtuel, qui se calque ensuite sur le DOM du navigateur;
Avantages = performance, utiliser React dans d'autres contextes : mobile, serveur;


II) DEMARRER AVEC CREATE-REACT-APP 

• Create-React-App est un outil pour faciliter le développement d’applications web fondées sur React;
• Gestion de JavaScript moderne(ES2015 +), bundling de notre application(avec Webpack), serveur de développement, 
génération de fichiers de production optimisés, etc.;

◘ Installation

• Node.js = environnement d'exécution JavaScript installable partout, qui permet d'écrire
n'importe quel type de programme en JavaScript;
• Installer Node.js = https://nodejs.org/fr/download/
https://openclassrooms.com/fr/courses/1056721-des-applications-ultra-rapides-avec-node-js/1056956-installer-node-js
• npm = gestionnaire de modules de Node
• Installer npm = une fois Node installé, exécutez la commande le terminal:
npm install--global npm

(!) Conseil terminal = Windows ne propose que deux terminaux, pas très avancés au demeurant: 
Invite de Commande(Command Prompt), fourni par le programme  cmd.exe, et PowerShell, fourni par  powershell.exe.
À partir de la version 10, vous pouvez installer le Windows Subsystem for Linux(WSL), 
et bénéficier ainsi de toutes les lignes de commandes Linux, notamment Bash et zsh

• Create-React-App
Le plus simple, et qui est recommandé, est de l'installer comme une commande globale, 
ensuite utilisable de n'importe où.
Pour cela, ouvrez si besoin un terminal et tapez la commande :
npm install --global create-react-app

◘ Créer notre premier squelette d'application 

• MAJ + Clic-droit sur l'emplacement choisi => Invite de commande => create-react-app nom-de-l-application;
ex. create-react-app memory

├── README.md
├── package.json
├── public
│   ├── favicon.ico
│   ├── index.html
│   └── manifest.json
├── src
│   ├── App.css
│   ├── App.js
│   ├── App.test.js
│   ├── index.css
│   ├── index.js
│   ├── logo.svg
│   └── registerServiceWorker.js
└── yarn.lock

(!) L’ensemble des fichiers sources (JS, CSS, etc.) que nous créerons devront être dans  "src/", 
sans quoi le Webpack utilisé en interne ne les verra pas.;

• Lancer ensuite la commande  npm start  au sein d'une ligne de commande,
depuis le répertoire dans lequel a été créé l'application.;
ex. cd memory 
npm start 

(!) Notez que notre application de base a dû s'ouvrir automatiquement dans notre navigateur
(si ce n'est pas le cas, saisissez l'URL indiquée par la commande dans le terminal,
normalement http://localhost:3000/);


III) Adapter le code à ES2015 (ES6)

◘ Les Classes 

class Screen extends Component { // héritage avec extends
  constructor (props) {
    super(props) // permet d’appeler le constructeur hérité, 
      // ce qui est d’ailleurs obligatoire si la classe en spécialise une autre avec extends 
      // (et doit impérativement précéder toute manipulation de this)
      // arrive en premier dans le code en cas d'héritage, avant de manipuler this
    this.state = { loginState: 'logged-out' }
  }

  // les éléments (constructeur, méthodes, etc.) n’ont pas besoin d’être séparés par des virgules

  render () { // Nomfonction (paramètres)
    // …
  }
}

◘ Fonctions fléchées

• concision + pas besoin de return ;

people.map(function (person) {
    return person.firstName
});

devient 

people.map((person) => person.firstName);

• la question de "this"

const obj = {
    name: 'Intérieur',
    runGreet() {
        // Ici, this.name est bien "Intérieur"
        setTimeout(function () {
            // Ici, this est soit l’objet global (mode laxiste de JS),
            // soit null (mode strict de JS)
        }, 0)
    }
}

Avec les fonctions fléchées, this ne se reporte pas à la fonction mais à l'objet principal

const obj = {
    name: 'Intérieur',
    runGreet() {
        // Ici, this.name est bien "Intérieur"
        setTimeout(() => {
            // Ici, this n’est pas redéfini par la fonction,
            // car c’est une fonction fléchée : comme n’importe
            // quel identifiant, il est donc recherché dans les
            // portées englobantes, et trouvé au niveau de
            // runGreet, c’est donc aussi "Intérieur".
        }, 0)
    }
}

◘ Déstructuration

• Permet d’aller rapidement chercher plusieurs propriétés au sein d’un objet, 
ou plusieurs cellules au sein de n’importe quel objet itérable (comme un tableau)
sans avoir à multiplier les déclarations ou affectations;

// À l'ancienne
const firstName = this.props.firstName
const lastName = this.props.lastName
const onClick = this.props.onClick
// Avec une déstructuration basée sur les noms
const { firstName, lastName, onClick } = this.props

Imaginons maintenant qu’on découpe un texte « prénom nom » en deux, 
et qu’on veuille affecter les parties à deux identifiants.
// À l'ancienne
const names = fullName.split(' ')
const firstName = names[0]
const lastName = names[1]
// Avec une déstructuration basée sur les positions
const [firstName, lastName] = fullName.split(' ')

// Exercice
J’ai deux variables lower et upper (dont je peux réaffecter les références) que je souhaite inverser.
Quelle est la meilleure manière de procéder ?

    [lower, upper] = [upper, lower]; // Les variables existent déjà dans la portée, 
    // on ne peut donc pas les redéclarer, que ce soit en const ou let
    // const [lower, upper] = [upper, lower] OU let [lower, upper] = [upper, lower] sont donc invalides

◘ Modules natifs, imports et exports

• Nous découperons notre application en modules, qui sont autant de fichiers sources séparés.
Pour cela, nous aurons recours à la syntaxe officielle des ES Modules.
Nous rendrons visibles les parties de nos modules que nous souhaitons à l’aide d’export et
nous irons chercher les parties qui nous intéressent dans d’autres modules à l’aide d’import

Voici un exemple de deux modules, le second utilisant le premier
(ce sont deux fichiers différents, rassemblés ci-dessous pour plus de concision) :

// Au sein du fichier textUtils.js

export function countWords(text) {
    return text.split(/\W+/u).filter(Boolean).length
}

export function normalizeSpacing(text) {
    return text.replace(/\s+/u, ' ').trim()
}

// Au sein d’un fichier main.js, dans le même répertoire :

import { countWords } from './textUtils'

console.log(countWords('Hello world, this is nice!'))

Il est également possible de déclarer un export « par défaut ».
Dans ce cas nous pouvons l’importer sous le nom que l’on veut, sans avoir à recourir aux accolades :

// Dans le module exportateur, SuperComponent.js :

export default class SuperComponent {
    // …
}

// Dans le module importateur, dans le même répertoire :

import GreatComponent from './SuperComponent'

