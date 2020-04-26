# MEMENTO REACT

* REACT avec Lior CHAMLA => https://www.youtube.com/watch?v=no82oluCZag
```
Message : ./src/App.js Module not found: Can't resolve 'lodash.shuffle'
App.js remplacer from 'lodash.shuffle' par '/lodash.suffle' 
sauvegarder puis revenir en arrière et sauvegarder
```

## SOMMAIRE
* REACT avec OC :
* [PRESENTATION](#presentation)
* [DEMARRER AVEC CREATE-REACT-APP](#create-react-app)
* [Adapter le code à ES2015 (ES6)](#es6)
* [Ecrire des fonctions pures](#fonctions-pures)
* [Décrivez un composant avec JSX](#jsx)
* [Réagir aux événements](#react-events)
* [Affichage conditionnel](#affichage-conditionnel)
* [Listes et clés](#liste-cles)
* [Configurez vos composants avec les props](#props)
* [Définissez formellement vos props avec PropTypes](#proptypes)
* [Gérez la complexité avec les classes ES2015](#gerer-es6)
* [Définissez des méthodes métier](#methodes-metiers)
* [Faire référence au bon « this » dans les fonctions](#bon-this)
* [Mettre en place un état local](#local-state)
* [Mettez à jour l'état local avec setState](#set-state)
* [Simplifiez votre gestion des valeurs et événements](#simplify-events)
* [Validez et formatez à la volée avec les champs contrôlés](#validate-forms)
* [Déléguez des traitements avec les champs non contrôlés](#delegate-events)
* [LES TEST AUTOMATISÉS](#automatic-tests)
* [Premier test avec Jest](#jest)
* [(OPTIONNEL) Gagnez en expressivité avec Chai](#chai)
* [Facilitez-vous l'écriture des tests avec Enzyme](#enzyme)
* [Simulez des événements](#simulate-events)
* [Mettre en place un filet de sécurité avec les Snapshots](#snapshots)
* [Auditez la couverture de vos tests](#audit-tests)
* [Explorez la documentation pour aller plus loin](#doc)



## PRESENTATION

* React = bibliothèque JavaScript;
* Rassemble dans un même fichier structure (HTML), aspect (CSS) et comportement (JS);
* Avantages = compréhension plus rapide, tests plus faciles à réaliser;
* Pense donc en terme de composant autonome, cohérent et complet;
* React a son DOM virtuel, qui se calque ensuite sur le DOM du navigateur;
* Avantages = performance, utiliser React dans d'autres contextes : mobile, serveur;


## <a name="create-react-app"></a> DEMARRER AVEC CREATE-REACT-APP 
```jsx
• Create-React-App est un outil pour faciliter le développement d’applications web fondées sur React;
• Gestion de JavaScript moderne(ES2015 +), bundling de notre application(avec Webpack), serveur de développement, 
génération de fichiers de production optimisés, etc.;

◘ Installation

• Node.js = `environnement d'exécution JavaScript installable partout, qui permet d'écrire
n'importe quel type de programme en JavaScript`;
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
Le plus simple, et qui est recommandé, est de l''installer comme une commande globale, 
ensuite utilisable de n''importe où.
Pour cela, ouvrez si besoin un terminal et tapez la commande :
npm install --global create-react-app

◘ Créer notre premier squelette d''application 

• MAJ + Clic-droit sur l''emplacement choisi => Invite de commande => create-react-app nom-de-l-application;
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

• Lancer ensuite la commande  npm start  au sein d''une ligne de commande,
depuis le répertoire dans lequel a été créé l''application.;
ex. cd memory 
npm start 

(!) Notez que notre application de base a dû s''ouvrir automatiquement dans notre navigateur
(si ce n''est pas le cas, saisissez l''URL indiquée par la commande dans le terminal,
normalement http://localhost:3000/);
```

## <a name="es6"></a> Adapter le code à ES2015 (ES6)
```jsx
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

Avec les fonctions fléchées, this ne se reporte pas à la fonction mais à l''objet principal

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
```

## <a name="fonctions-pures"></a> Ecrire des fonctions pures 
```jsx
React permet de définir des composants à l’aide d’une simple fonction.
On estime que pour la majorité des applications, 
environ 90 % des composants seront réalisés de cette façon.

function CoolComponent() {
    return React.createElement('p', {}, 'Youpi So Cool !')
    // createElement(nom composant, attributs, contenu)
}

Pour afficher un DOM virtuel React dans une page web, on utilise ReactDOM.render(…)
ReactDOM.render(
    React.createElement(CoolComponent),
    document.getElementById('root')
)

◘ Un aperçu de JSX

React est généralement utilisé avec la syntaxe JSX, 
une extension à JavaScript qui ressemble un peu à du XML au sein de JavaScript
Notre code deviendrait alors:
function CoolComponent() {
    return <p>Youpi So Cool !</p>
}

ReactDOM.render(
    <CoolComponent />,
    document.getElementById('root')
)

◘ Premières props

On peut fournir à un composant des « attributs », appelés props
Ces props sont définies par un ensemble de clés / valeurs, 
définies dans un objet, qui est passé en argument à la fonction du composant

function CoolComponent({ adjective = 'Cool' }) {
    return <p>Youpi So {adjective} !</p>
}

ReactDOM.render(
    <div>
        <CoolComponent adjective="awesome" /> {/* <p>Youpi so awesome</p> */}
        <CoolComponent /> {/* <p>Youpi so Cool !</p> */}
    </div>,
    document.getElementById('root')
)
```

## <a name="jsx"></a> Décrivez un composant avec JSX
```jsx
◘ Ni du HTML, ni du XML

Parmi les points communs avec XML, on citera notamment:
- la sensibilité à la casse 
- l''exigence de fermeture d''éléments (<span><p>Good</p></span>)

On découple le JSX en plusieurs lignes pour une meilleure lisibilité.
Par la même occasion, nous recommandons également de le mettre entre parenthèses
afin d’éviter les pièges d’insertion de point-virgule automatique :
const element = (
    <h1>
        Bonjour, {formatName(user)} !
    </h1>
);

• JSX empêche les attaques d’injection :
Vous ne risquez rien en utilisant une saisie utilisateur dans JSX:
const title = response.potentiallyMaliciousInput;
// Ceci est sans risque :
const element = <h1>{title}</h1>;

◘ Les composants

Les composants sont comme des fonctions JavaScript.
Ils acceptent des entrées quelconques(appelées « props ») 
et renvoient des éléments React décrivant ce qui doit apparaître à l’écran.

◘ Valeurs des props

En JSX, on ne parle pas d’attributs (comme en XML ou HTML), mais de props (propriétés).

function Welcome(props) {
    return <h1>Bonjour, {props.name}</h1>;
}

Vous pouvez également utiliser une classe ES6 pour définir un composant:
class Welcome extends React.Component {
    render() {
        return <h1>Bonjour, {this.props.name}</h1>;
    }
}

Lorsque React rencontre un élément représentant un composant défini par l’utilisateur, 
il transmet les attributs JSX à ce composant sous la forme d’un objet unique.
Nous appelons cet objet « props ».
Par exemple, ce code affiche « Bonjour, Sara » sur la page:
function Welcome(props) {
    return <h1>Bonjour, {props.name}</h1>;
}

const element = <Welcome name="Sara" />; {/* Welcome est un composant car
il commence par une Majuscule */}
ReactDOM.render(
    element,
    document.getElementById('root')
);

Si une partie de votre "interface utilisateur" est utilisée plusieurs fois 
(Button, Panel, Avatar) ou si elle est suffisamment complexe en elle-même
(App, FeedStory, Comment), c’est un bon candidat pour un composant réutilisable.
(scinder les parties du composants)



• String ou {}, raccourci pour true
Une prop peut avoir n’importe quelle valeur possible en JavaScript, mais 2 possibilités :
"string" ou {JSX}
<input
    type="email" {/* type string */}
    name="email"
    maxlength={42} {/* type JSX */}
    readonly={false}
    onChange={this.handleFieldChange}
    value={this.state.value}
    autofocus {/* valeur true, on se contente de l'affichage du nom de la prop */}
    required
/>

• Mots réservés 
Mêmes ajustements que dans les interfaces du DOM, 
=> écrire "className" au lieu de "class" et "htmlFor" au lieu de "for"
(attribut for d''une balise label).

• L''importance de la casse
Pour les noms d’éléments :
dans une grappe JSX, si un élément démarre par une minuscule,
le moteur considère qu’il s’agit d’un élément natif fourni par la plate-forme 
(le navigateur, par exemple), alors que si l’élément démarre par une Majuscule,
on estime qu’il s’agit d’un composant React.
[
    <CoolComponent /> ,
    <coolComponent /> ,
]
// donne :
[
    React.createElement(CoolComponent, null),
    React.createElement('coolComponent', null),
]

◘ Mise en Application 

src/Card.js 
import React from 'react'
import './Card.css'

const HIDDEN_SYMBOL = '❓'

const Card = ({ card, feedback }) => ( {/* Card = fonction fléchée (par1, par2) */}
    <div className={`card ${feedback}`}> {/* intégration dynamique du prop feedback,
    qui est amené à changer ex. className="card hidden" */}
        <span classname="symbol">
            {feedback === 'hidden' ? HIDDEN_SYMBOL : card}
        </span>
    </div>
) {/* renvoie du HTML simple, d'où l'abscence d'accolades et return */}

export default Card

Le composant < GuessCount /> est très simple: c’est un compteur de tentatives.
src/GuessCount.js 
const GuessCount = ({ guesses }) => <div className="guesses">{guesses}</div>

App : composant principal
src/App.js
import React from 'react';
import Card from './Card'
import GuessCount from './GuessCount'
class App extends React.Component {
    render() {
        {/* La méthode render sera appelée à chaque fois qu’une MAJ aura lieu*/ }
        return (
            <div className="memory">
                <GuessCount guesses={0} /> {/* composant GuessCount */}
                <Card card="😀" feedback="hidden" /> {/* composant Card */}
                <Card card="🎉" feedback="justMatched" />
                <Card card="💖" feedback="justMismatched" />
                <Card card="🎩" feedback="visible" />
                <Card card="🐶" feedback="hidden" />
                <Card card="🐱" feedback="justMatched" />
            </div>
        )
    }
}
```
## <a name="react-events"></a> Réagir aux événements
```jsx
◘ Exemples

const Greeter = ({ whom }) => (
    <button onClick={() => console.log(`Bonjour ${whom} !`)}>
        Vas-y, clique !
    </button>
)

ReactDOM.render(<Greeter whom="Roberto" />, document.getElementById('root'));
// Cliquer sur le bouton obtenu affichera un « Bonjour Roberto ! » dans la console du navigateur

class LogEntry extends Component {
    // …
    render() {
        const className = `log entry ${this.isOpen() ? 'open' : 'closed'}`
        return (
            <li className={className} onClick={this.toggle}>
                …
      </li>
        )
    }
}

Performance => React ne définit qu’un seul gestionnaire d’événement pour tous les clics, 
à la racine de la grappe applicative (react root)

◘ Mise en application 

L’application devra réagir lorsque l''on clique sur une carte
• Commençons par une méthode métier sur le composant applicatif :
/App.js
handleCardClick(card) {
    console.log(card, 'clicked')
}

• Supposons ensuite un événement onClick sur les composants < Card />, 
et connectons les cartes présentées au gestionnaire :
/App.js
<Card card="😀" feedback="hidden" onClick={this.handleCardClick} />
<Card card="🎉" feedback="justMatched" onClick={this.handleCardClick} />
<Card card="💖" feedback="justMismatched" onClick={this.handleCardClick} />
<Card card="🎩" feedback="visible" onClick={this.handleCardClick} />
<Card card="🐶" feedback="hidden" onClick={this.handleCardClick} />
<Card card="🐱" feedback="justMatched" onClick={this.handleCardClick} />

• Il ne nous reste "qu'à" implémenter la prop onClick dans le composant <Card /> :

const Card = ({ card, feedback, onClick }) => (
    <div className={`card ${feedback}`} onClick={() => onClick(card)}>
      ...
    </div>
    {/* onClick est suivi d'une fonction fléchée, qui ne sera appelée
    que si l'on clique sur la div */}
)

Dans React, comme dans la plupart des bibliothèques (ex. jQuery) 
et des frameworks (ex. Vue, Ember…), les événements natifs sont enrobés 
dans un "type" spécifique, garanti conforme au W3C.
```

## Affichage conditionnel
```jsx
JSX produit une expression JavaScript et non une instruction
L’astuce consiste à remplacer nos instructions classiques de 
branchement conditionnel par des expressions utilisant les opérateurs logiques 
(typiquement, &&, || et l’opérateur ternaire ? : )

• « Si… Alors… »
<p>{42 > 43 && document.nonExistingMethod()}</p>{/* paragraphe vide */}
<p>{user.admin && <a href="/admin">Faire des trucs de VIP</a>}</p>

Les meilleures pratiques en vigueur dans l’univers React nous recommandent 
d’enrober et d’indenter les contenus conditionnels non triviaux, comme ceci :
<p>{user.admin && (
    <a href="/admin">Faire des trucs de VIP</a>
)}</p>

{/* si 42 > 43 = true, alors document... */}
{/* <any boolean statement> && <Component-to-be-displayed /> */}
if + AND 
{/* (!this.state.isHidden &&  var1 === var2) && <Component-to-be-displayed /> */}
or
{/* {(<any boolean statement>) ?
 <Component-to-be-displayed-if-true />
  :
 <Component-to-be-displayed-if-false />
} */}

• « Si… Alors… Sinon… »
Pour l’équivalent d’un if…else…, nous utiliserons plutôt l’opérateur ternaire ?…:
<p>{user.loggedIn ? <WelcomeLabel /> : <LoginLink />}</p>

<p>{user.admin ? (
  <a href="/admin">Faire des trucs de VIP</a>
) : (
  <a href="/request-admin">Demander à devenir VIP</a>
)}</p>

◘ Quand découper notre JSX ?

• Cas "1" : réutilisation au sein du render
Imaginons qu’un même bouton soit présent plusieurs fois dans l’"interface" :
render() {
  return (
    <Card>
      <CardTitle>
        Oh le joli titre
        <button onClick={this.logOut}>
          <LogoutIcon />
          Déconnexion
        </button>
      </CardTitle>
      …
      <Footer>
        © 2017 Des Gens Bien™ •
        <button onClick={this.logOut}>
          <LogoutIcon />
          Déconnexion
        </button>
      </Footer>
    </Card>
  )
}
Cette répétition est fâcheuse, voire nuisible. 
JSX reste du JavaScript, au final, donc toutes les techniques de code habituelles, 
et notamment le recours à des variables, restent utilisables. 
Voici une version plus « propre » :
render() {
  const logoutButton = (
    <button onClick={this.logOut}>
      <LogoutIcon />
      Déconnexion
    </button>
  )

  return (
    <Card>
      <CardTitle>
        Oh le joli titre
        {logoutButton}
      </CardTitle>
      …
      <Footer>
        © 2017 Des Gens Bien™ •
        {logoutButton}
      </Footer>
    </Card>
  )
}

• Cas 2 : grappe à "l'intérieur d'une" prop
La valeur "d'une" prop peut être n’importe quelle expression JavaScript… 
Y compris une autre expression JSX. 
C’est assez fréquent pour les props contenant des icônes, 
par exemple, lorsque celles-ci sont elles-mêmes fournies 
en tant que composants React :
<ListItem text="Blah blah" rightSideIcon={<MoreVertIcon />} />
<RaisedButton icon={<SettingsIcon />} label="Paramètres" secondary />

Si ce "type" d’utilisation reste lisible, 
les choses se compliquent quand la prop contient une grappe, même petite :
<ListItem
  primaryText="Vous êtes connecté·e en tant que"
  rightSideIcon={
    <IconButton onClick={this.logOut}>
      <LogoutIcon />
    </IconButton>
  }
  secondaryText={currentUser.email}
/>

La lisibilité dégringole rapidement… Dans ces cas-là,
on préfèrera définir la grappe de prop en amont et stocker la référence, comme ceci :
const logoutButton = (
  <IconButton onClick={this.logOut}>
    <LogoutIcon />
  </IconButton>
)
…
return (
  …
  <ListItem
    primaryText="Vous êtes connecté·e en tant que"
    rightSideIcon={logoutButton}
    secondaryText={currentUser.email}
  />
  …
)

• Cas 3 : le JSX est trop massif (mais…)
Si votre grappe JSX commence à être définie par plusieurs dizaines de lignes, 
vous aurez sans doute tendance à vouloir la découper en sous-parties nommées, 
recombinées à la fin lors de votre return.
Toutefois, gardez à l’esprit que bien souvent, 
une grappe JSX démesurée est plutôt un indice clair que votre composant essaie « d’en faire trop », 
et qu’il serait sans doute pertinent de le découper en sous-composants plus spécifiques.

◘ Mise en application

But = afficher un texte « GAGNÉ ! » en bas du plateau uniquement quand… 
le nombre de secondes de l’heure courante est paire. 
Ajustons le render() de App.js comme ceci :
render() {
  const won = new Date().getSeconds() % 2 === 0
  return (
    …
    {won && <p>GAGNÉ !</p>}
  )
}
```

## <a name="liste-cles"></a> Listes et clés
```js
Nous cherchons à transformer une liste de données en une liste de composants : 
pour chaque donnée, nous voulons produire le composant aux réglages correspondants.
On utilise la méthode { map()
Pour prendre un tableau de nombres et produire un tableau de leur double :
const numbers = [1, 2, 3, 4]
const doubles = numbers.map(x => x * 2) // [2, 4, 6, 8]
}
De la même façon, on peut utiliser map() pour produire une grappe JSX 
associée à chaque élément d’une liste. 
const users = [
  { id: 1, name: 'Alice' },
  { id: 2, name: 'Bob' },
  { id: 3, name: 'Claire' },
  { id: 4, name: 'David' },
]
Pour produire une liste de liens avec les noms des utilisateurs, on écrirait ceci :
render () {
  return (
    <div className="userList">
      {this.props.users.map((user) => (
        <a href={`/users/${user.id}`}>{user.name}</a>
      ))}
    </div>
  )
}
Ou en déstructurant l’élément reçu dans la fonction de rappel :
render () {
  return (
    <div className="userList">
      {this.props.users.map(({ id, name }) => (
        <a href={`/users/${id}`}>{name}</a>
      ))}
    </div>
  )
}

• La clé du succés : key 

React exige que tout élément présent au sein d’un tableau 
dans une grappe JSX soit doté d’une prop technique nommée key, unique et stable dans le temps. 
Ainsi, la version 100% correcte de la liste vue précédemment est la suivante :
render () {
  return (
    <div className="userList">
      {this.props.users.map(({ id, name }) => (
        <a href={`/users/${id}`} key={id}>{name}</a>
      ))}
    </div>
  )
}

◘ Mise en application

"/App.js"
---------

+ import HallOfFame, {FAKE_HOF} from './HallOfFame'
{/*(import du composant et liste d'entrées)*/}

render() {
    const won = new Date().getSeconds() % 2 === 0
    return (
      <div className="memory">
        <GuessCount guesses={0} />
        {/* map() donne l'index en 2° argument */}
        {this.cards.map((card, index) => (
          <Card card={card} feedback="visible" key={index} onClick={this.handleCardClick} />
        ))}
        {won && <HallOfFame entries={ FAKE_HOF } />}
      </div>
    )
  }
```

## <a name="props"></a> Configurez vos composants avec les props
```jsx
◘ Composants parents et enfants

composant enfant = tout composant défini dans le render() du composant parent
le composant qui fournit le render() est le parent, 
tout composant figurant dans ce render() est un enfant

◘ Props « techniques »

• key 
• children
Dans le JSX suivant :
return (
  <FileList>
    <UploadCreator />
    <StatusBar />
  </FileList>
)
La prop children du composant <FileList />  
est un tableau contenant <UploadCreator /> et <StatusBar />
• dangerouslySetInnerHTML
Cette prop ne doit être utilisée qu’en tout dernier recours, 
lorsque vous souhaitez injecter du balisage manuel au sein d’une grappe React
En sécurité supplémentaire, elle requiert comme valeur non pas une String 
mais un objet doté d’une propriété __html 
dont la valeur est le balisage voulu. Voici ce que cela donnerait :
function createMarkup() {
  return { __html: 'First &middot; Second' }
}

function MyComponent() {
  return <div dangerouslySetInnerHTML={createMarkup()} />
}

◘ Valeurs par défaut

syntaxe ES2015 de valeurs par défaut :
function MyCoolComponent({ l10n = true, name, required = false, value }) {
  // …
}
On aura uniquement recours à la propriété statique defaultProps. 
Par « statique », on entend une propriété qui ne diffère pas d’une instance du composant à l’autre, 
ou d’un appel de la fonction composant à l’autre,
mais qui reste la même en étant définie au niveau du « type » du composant lui-même.
Pour un composant défini par une fonction, 
il suffit de définir la propriété sur la fonction elle-même :

function MyCoolComponent({ l10n, name, required, value }) {
  // …
}

MyCoolComponent.defaultProps = {
  l10n: true,
  required: false,
}
```

## <a name="proptypes"></a> Définissez formellement vos props avec PropTypes
```jsx
Le seul moyen pour un composant parent de « configurer » notre composant, 
de lui indiquer quoi faire, c’est de lui passer les bonnes props.

◘ propTypes

React examine sur tout composant une propriété statique = propTypes 
C’est un objet dont les clés sont les noms des props attendues, 
et les valeurs des validateurs de props.
Le "module" standard prop-types fournit une série de validateurs
npm install --save prop-types
Si besoin de validateurs un peu plus travaillés,
Airbnb a publié le "module" airbnb-prop-types: https://github.com/airbnb/prop-types#readme
Les validateurs sont juste des fonctions, 
vous pouvez donc facilement écrire des validations très personnalisées : 
https://reactjs.org/docs/typechecking-with-proptypes.html

◘ Mise en application

ajouter le "module" officiel prop-types aux dépendances :
npm install --save prop-types

• Le composant Carte

+ import PropTypes from 'prop-types'

// La fonction Card ici…

Card.propTypes = {
  card: PropTypes.string.isRequired,
  feedback: PropTypes.oneOf([
    'hidden',
    'justMatched',
    'justMismatched',
    'visible',
  ]).isRequired,
  onClick: PropTypes.func.isRequired,
}

Le combinateur oneOf() fonctionne comme une énumération,
en limitant les valeurs à une série précise.

• Le composant Compteur de tentatives

import PropTypes from 'prop-types'

// La fonction GuessCount ici…

GuessCount.propTypes = {
  guesses: PropTypes.number.isRequired,
}

• Le composant Tableau d’honneur

import PropTypes from 'prop-types'

// La fonction HallOfFame ici…

HallOfFame.propTypes = {
  entries: PropTypes.arrayOf(
    PropTypes.shape({
      date: PropTypes.string.isRequired,
    guesses: PropTypes.number.isRequired,
    id: PropTypes.number.isRequired,
    player: PropTypes.string.isRequired,
  })
).isRequired,
}

On retrouve ici deux combinateurs classiques :
○ arrayOf(), qui indique que la prop sera un tableau de valeurs 
dont la définition est fournie en argument.
○ shape(), qui décrit un objet dont les clés sont connues,
en précisant les types de leurs valeurs.
```

## <a name="gerer-es6"></a> Gérez la complexité avec les classes ES2015
```jsx
La principale limite des fonctions, c’est qu’elles se restreignent au rendu
les fonctions simples restent largement suffisantes pour la grande majorité des composants, 
ceux appelés « présentationnels » ou « bêtes »

◘ Rappels sur une classe

Avec ES2015, une classe est définie comme suit :
class Person {
  constructor(first, last) {
    this.first = first
    this.last = last
  }

  fullName() {
    return `${this.first} ${this.last}`
  }
}
Lorsque la classe en spécialise une autre, on emploie alors extends pour le signaler.
On peut ensuite utiliser super() pour recourir au constructeur hérité, 
ou aux méthodes héritées dans leurs versions originales:
class CoolComponent extends Component {
  constructor(props) {
    super(props)
    this.state = { collapsed: props.initialCollapsed }
  }

  render() {
    // …
  }
}

◘ Intégrer defaultProps et propTypes

On préfèrera généralement les lister en haut du corps de classe, 
avec le mot-clé static :
class CoolComponent extends Component {
  static defaultProps = {
    initialCollapsed: false,
  }

  static propTypes = {
    initialCollapsed: PropTypes.bool.isRequired,
    items: PropTypes.arrayOf(CoolItemPropType).isRequired,
  }

  constructor(props) {
    super(props)
    this.state = { collapsed: props.initialCollapsed }
  }

  render() {
    // …
  }
}

◘ Un mot sur createClass

Dans des didacticiels plus anciens, vous trouverez encore de nombreuses références 
à l’API d’origine de création de composant avec React: React.createClass
Toutes les méthodes définies étaient auto-bound, c’est-à-dire que 
this y désignait toujours, par défaut, l’instance du composant
```

## <a name="methodes-metiers"></a> Définissez des méthodes métier
```jsx
◘ Types de méthodes métier

Dans nos composants définis par des classes, 
les méthodes sont de différentes natures:
• Calculs et construction de données, à mettre hors du render()
• Méthodes de cycle de vie
• Gestionnaires d’événements, à mettre hors du render() `s'ils dépendent
de l'événement reçu`

◘ Exemple de méthode métier de calcul

class TrackerScreen extends Component {
  // …
  overallProgress() {
    const { goals, todaysProgress } = this.props
    const [totalProgress, totalTarget] = getDayCounts(goals, todaysProgress)
    return totalTarget === 0 ? 0 : Math.floor(totalProgress * 100 / totalTarget)
  }
  {/* render()  se concentre sur son boulot : produire la « grappe » React du composant, 
  sans être « pollué » par du code de calcul */}
  render() {
    return (
      <Card>
        <CardTitle
          title={formatDate(new Date(), 'LL')}
          subtitle={<Gauge value={this.overallProgress()} />}
        />
        {/* … */}
      </Card>
    )
  }
}

◘ Le souci du this

class LoginScreen extends Component {
  logIn(event) {
    event.preventDefault()
    console.log('LOGIN', this)
  }

  render() {
    return (
      <form onSubmit={this.logIn}>
        {/* … */}
        <p>
          <button type="submit">Connexion !</button>
        </p>
      </form>
    )
  }
}
Si on clique sur le bouton pour envoyer le formulaire, la console affiche alors:
"LOGIN" undefined

• Fix "temporaire" (car problème de performance)
class LoginScreen extends Component {
  logIn(event) {
    event.preventDefault()
    console.log('LOGIN', this)
  }

  render() {
    return (
      <form onSubmit={event => this.logIn(event)}>
        {/* … */}
        <p>
          <button type="submit">Connexion !</button>
        </p>
      </form>
    )
  }
}
```

## <a name="bon-this"></a> Faire référence au bon « this » dans les fonctions
```jsx
◘ Première approche: bind dans le constructeur

class LoginScreen extends Component {
  constructor(props) {
    super(props)
    this.logIn = this.logIn.bind(this)
  }

  // …
}

◘ Deuxième approche: initialiseur de "champ" (préférée)

class LoginScreen extends Component {
  logIn = (event) => {
    // …
  }

  // …
}

Vu que les fonctions fléchées n’ont pas de contexte d’invocation, 
et notamment pas leur propre this mais celui le plus proche défini 
dans les portées englobantes(les closures), 
une telle méthode utilise bien le this en vigueur au niveau du constructeur.

◘ Troisième approche: "@autobind" (la meilleure)

repose sur les décorateurs, une syntaxe qui ne devrait 
devenir officielle "qu'en 2019, voire 2020", simulable entre-temps avec Babel :

import autobind from 'autobind-decorator'

// …

class LoginScreen extends Component {
  @autobind
  logIn(event) {
    // …
  }

  // …
}

Pour "l'instant l’approche 2" est recommandée, mais en ajoutant un commentaire 
explicitant l’intention au-dessus de l’initialisation, comme ceci:
class LoginScreen extends Component {
  // This method is declared using an arrow function initializer solely
  // to guarantee its binding, as we cannot use decorators just yet.
  logIn = (event) => {
    // …
  }

  // …
}

◘ Mise en application

handleCardClick(card) {
  console.log(card, this)
}
{/* résultat : 🍎 undefined */}

// Arrow fx for binding
handleCardClick = (card) => {
  console.log(card, this)
}
```

## <a name="local-state"></a> Mettre en place un état local
```jsx
Une fois nos composants renderés, 
ils commencent à « vivre » en interaction avec l’utilisateur ou le système.
Pour représenter ces données, qui persistent d’un render() à l’autre ou 
simplement re-déclenchent un rendu, React utilise l’état local des composants.

◘ Où est situé l’état local ?

L’état local est présent à l’intérieur d’un composant, dans sa propriété state.
On doit obligatoirement utiliser une définition de composant par classe, 
et non une simple fonction.
De manière "explicite" (solution préférée):
class Accordion extends Component {
  constructor(props) {
    super(props)
    this.state = { expandedPanels: new Set() }
  }

  // …
}
De manière implicite:
class Accordion extends Component {
  state = { expandedPanels: new Set() }

  // …
}

◘ Qui a accès à l’état local ?

Uniquement votre composant: 
les parents, tout comme les enfants, ne peuvent pas manipuler votre état local
Imaginons un accordéon avec des composants « panneau d’accordéon », 
qui gouvernent leur ouverture-fermeture, 
à ceci près que l’accordéon doit permettre de tout ouvrir ou de tout refermer. 
Il doit donc être à l’origine de cette information
function AccordionPanel({ item: { title, content }, open, onToggle }) {
  return (
    <section className="accordion-panel">
      <h1 className="accordion-header" onClick={() => onToggle(item)} />
      <div className="accordion-content">{content}</div>
    </section>
  )
}
AccordionPanel.defaultProps = {
  open: false,
}
AccordionPanel.propTypes = {
  item: ItemPropType.isRequired,
  open: PropTypes.bool,
  onToggle: PropTypes.func.isRequired,
}

Au-dessus, on aurait un composant Accordéon qui ressemblerait sans doute à ceci :
class Accordion extends Component {
  static propTypes = {
    items: PropTypes.arrayOf(ItemPropType).isRequired,
  }

  constructor(props) {
    super(props)
    this.state = { expandedPanels: new Set() }
  }

  render() {
    const { items } = this.props
    return (
      <div className="accordion">
        {items.map((item) => (
          <AccordionPanel
            key={item.id}
            item={item}
            onToggle={this.togglePanel}
            open={this.state.expandedPanels.has(item)}
          />
        ))}
      </div>
    )
  }

  // This method is declared using an arrow function initializer solely
  // to guarantee its binding, as we cannot use decorators just yet.
  togglePanel = (panel) => {
    const expandedPanels = this.state.expandedPanels
    if (expandedPanels.has(panel)) {
      expandedPanels.remove(panel)
    } else {
      expandedPanels.add(panel)
    }
    this.setState({ expandedPanels })
  }
}

◘ Mise en application

Commençons par remplacer le champ temporaire "cards" (cards = this.generateCards())
par une initialisation du champ « officiel »  state :
class App extends Component {
  state = {
    cards: this.generateCards(),
    currentPair: [] {/* paire en cours de sélection par le joueur */},
    guesses: 0 {/* nombre de tentatives de la partie en cours */},
    matchedCardIndices: [] {/* iste les positions des cartes appartenant aux paires déjà réussies, 
    et donc visibles de façon permanente */},
  }

  // …

Le début de notre méthode render() change également. 
Elle va aller chercher les infos utiles dans l’état local courant, 
et les utiliser pour nos props et pour la source de notre liste de cartes :

render() {
  const { cards, guesses, matchedCardIndices } = this.state
  const won = matchedCardIndices.length === cards.length
  return (
    <div className="memory">
      <GuessCount guesses={guesses} />
      {cards.map((card, index) => (
  // …

Nous disposons maintenant d’un état qui décrit l’avancement du jeu. 
Il faut donc arrêter d’afficher de base toutes les "cartes", 
en ajoutant la méthode "getFeedbackForCard()"
class App extends Component {
  // ...
getFeedbackForCard(index) {
  const { currentPair, matchedCardIndices } = this.state
  const indexMatched = matchedCardIndices.includes(index)

  if (currentPair.length < 2) {
    return indexMatched || index === currentPair[0] ? 'visible' : 'hidden'
  }

  if (currentPair.includes(index)) {
    return indexMatched ? 'justMatched' : 'justMismatched'
  }

  return indexMatched ? 'visible' : 'hidden'
}

Appelons-la justement depuis le "render()" :
{
  cards.map((card, index) => (
    <Card
      card={card}
      feedback={this.getFeedbackForCard(index)}
      key={index}
      onClick={this.handleCardClick}
    />
  ))
}
Vous devriez à présent voir toutes les cartes cachées, 
l’état initial n’ayant aucune position dans matchedCardIndices
l nous faut à présent faire évoluer l’état au fil des clics,
en commençant par le champ d’état currentPair, qui permet de constituer la paire actuellement tentée. 
Modifions handleCardClick() comme suit :
// Arrow fx for binding
handleCardClick = index => {
  const { currentPair } = this.state

  if (currentPair.length === 2) {
    return
  }

  if (currentPair.length === 0) {
    this.setState({ currentPair: [index] })
    return
  }

  this.handleNewPairClosedBy(index)
}
"C'est" désormais l’index de la carte, et non son "symbole" (ambigu car présent deux fois), 
qui nous intéresse. Il faut donc commencer par fournir cette information au composant  <Card/>  :
{
  cards.map((card, index) => (
    <Card
      card={card}
      feedback={this.getFeedbackForCard(index)}
      index={index}
      key={index}
      onClick={this.handleCardClick}
    />
  ))
}
Ensuite, ce composant peut la renvoyer dans la gestion de clic… 
sans oublier de la déstructurer depuis ses props et 
de déclarer la prop en question dans ses  propTypes :
const Card = ({ card, feedback, index, onClick }) => (
  <div className={`card ${feedback}`} onClick={() => onClick(index)}>
    <span className="symbol">
      {feedback === 'hidden' ? HIDDEN_SYMBOL : card}
    </span>
  </div>
)

Card.propTypes = {
  card: PropTypes.string.isRequired,
  feedback: PropTypes.oneOf([
    'hidden',
    'justMatched',
    'justMismatched',
    'visible',
  ]).isRequired,
  index: PropTypes.number.isRequired,
  onClick: PropTypes.func.isRequired,
}

À présent, si vous cliquez sur une première carte, celle-ci doit s’afficher sans effet particulier. 
En revanche, en cliquant sur une deuxième carte, 
la méthode handleNewPairClosedBy() n’étant pas encore écrite, une erreur sera générée, cliquable.
```

## <a name="set-state"></a> Mettez à jour l'état local avec setState
```jsx
◘ Appeler setState avec un objet, ça fait quoi ?

envoie une série de modifications à l’état local du composant
this.setState({ open: true }) // modifie uniquement cette propriété

// resetForm()  ne réinitialisera en fait rien du tout, 
// car ce que l'on envoie n'est autre qu'une liste vide de modifications.
class Form extends Component {
  constructor(props) {
    super(props)
    this.state = { name: '', target: 5, units: '' }
  }

  // …

  resetForm() {
    this.setState({}) // Ooops !
  }
}
// Voici une implémentation correcte :
const DEFAULT_STATE = { name: '', target: 5, units: '' }

class Form extends Component {
  constructor(props) {
    super(props)
    this.state = { ...DEFAULT_STATE }
  }

  // …

  resetForm() {
    this.setState(DEFAULT_STATE) // Mieux !
  }
}

◘ Attention, c’est asynchrone !

Il traitera donc les mises à jour plus tard, au moment le plus opportun, par lots.
doSomethingWrong() {
  // this.state.open est `false`
  this.setState({ open: true })
  console.log(this.state.open === true) // `false` : pas encore…
}

doSomethingSuperWrong() {
  // this.state.count == 0
  this.setState({ count: this.state.count + 1 })
  this.setState({ count: this.state.count + 1 })
  this.setState({ count: this.state.count + 1 })
  console.log(this.state.count) // 0
  // Et même une fois pris en compte, ce sera 1, pas 3, vu que
  // tout le long de cette méthode, `this.state.count` valait 0.
}

◘ Appeler setState() avec une fonction

L’approche la plus fiable, générique et pérenne de setState() 
consiste à l’appeler avec un seul argument qui est une fonction de rappel
Elle a deux arguments : `l’état d’avant
(qui tient compte de toute tentative de setState() exprimée auparavant)` 
et les props en vigueur du composant
Ainsi, on peut par exemple faire de l’incrémental ":"
doSomethingRight() {
  // this.state.count vaut 0
  handleClick() {
    this.setState(
      (prevState, props) => ({ count: prevState.count + props.inc })
    )
    this.setState(
      (prevState, props) => ({ count: prevState.count + props.inc })
    )
    this.setState(
      (prevState, props) => ({ count: prevState.count + props.inc })
    )
  }
}

◘ Mise en "application"

App.js 
+ const VISUAL_PAUSE_MSECS = 750

class App extends Component {
  …
  + handleNewPairClosedBy(index) {
    const { cards, currentPair, guesses, matchedCardIndices } = this.state

    const newPair = [currentPair[0], index]
    const newGuesses = guesses + 1
    const matched = cards[newPair[0]] === cards[newPair[1]]
    this.setState({ currentPair: newPair, guesses: newGuesses })
    if (matched) {
      this.setState({ matchedCardIndices: [...matchedCardIndices, ...newPair] })
    }
    setTimeout(() => this.setState({ currentPair: [] }), VISUAL_PAUSE_MSECS)
  }
  …
}

[...matchedCardIndices, ...newPair] : "spread"
const articulations = ['épaules', 'genoux'];
const corps = ['têtes', ...articulations, 'bras', 'pieds'];
// ["têtes", "épaules", "genoux", "bras", "pieds"]
const arr1 = [0, 1, 2];
const arr2 = [3, 4, 5];
arr1 = [...arr1, ...arr2]; // arr1 vaut [0, 1, 2, 3, 4, 5]


◘ Apprivoisez le cycle de vie des composants

Les composants basés sur des classes passent par toute une série d’étapes au cours de leur vie. 
React nous permet de réagir à ces étapes en implémentant dans nos classes des méthodes 
aux noms spécifiques, appelées méthodes de cycle de vie.

constructor() // invoqué en premier, reçoit les props initiales en argument. 
// bon endroit pour initialiser l’état local + éventuellement, garantir le this de certaines méthodes
//</div> à l’aide d’un .bind()
componentWillMount() // endroit adapté pour inscrire des timers (ex. setInterval()), 
// ouvrir des connexion réseau ou bases de données, etc.
render()
componentDidMount() // le composant a été retranscrit pour la première fois dans le DOM
componentWillReceiveProps()
```

## <a name="simplify-events"></a> Simplifiez votre gestion des valeurs et événements
```jsx
◘ Valeur d''un champ

En HTML, la valeur réelle d’un champ dépend largement du "type" de balise utilisée.
Avec React, on utilise simplement la prop "value=", quel que soit le "type" de composant.
Pour valeurs multiples, ex.  <select multiple> et ses enfants <option>, 
vous passerez tout simplement un tableau de valeurs à la prop
Pour une valeur par défaut, on utilise la prop "defaultValue="

◘ Détection de changement d’un champ

React normalise le comportement de changement via la prop "onChange", 
qui est certifiée comme étant immédiate "(« live »)", quel que soit le "type" de champ.
```

## <a name="validate-forms"></a> Validez et formatez à la volée avec les champs contrôlés
```jsx
◘ Pourquoi les champs contrôlés ?

- effectuer une requête API
- contrôler le plus tôt possible la validité de la valeur saisie dans les champs
- pour l’expérience "utilisateur (UX)", de formater à la volée les données saisies 
lorsque la nature du champ s’y prête "(numéro de téléphone, de carte bancaire, etc.)"

(!) les valeurs des champs sont stockées dans l’état local de notre composant

◘ Comment savoir si un champ est contrôlé ?

Un champ contrôlé est doté d’une prop "value=". 
De plus, il est généralement doté d’une prop "onChange=" 
qui amène vers un gestionnaire assurant le contrôle et le formatage de la saisie, 
puis son stockage dans l’état local.
Pour les cases à cocher et boutons radio, 
le fait de définir "checked=" place également le champ en mode contrôlé, 
même en l’absence de "value="

◘ Deux exemples classiques

• Numéro de téléphone français "(5 × 2 chiffres)"

  class FrenchPhoneField extends Component {
    static defaultProps = {
      name: 'tel',
      placeholder: '0x xx xx xx xx',
      required: false,
    }

    static propTypes = {
      name: PropTypes.string.isRequired,
      placeholder: PropTypes.string,
      required: PropTypes.bool,
    }

    constructor(props) {
      super(props)
      this.state = { value: '' }
    }

    // This method is declared using an arrow function initializer solely
    // to guarantee its binding, as we cannot use decorators just yet.
    handleChange = ({ target: { value } }) => {
      value = value
        // Remove all non-digits, turn initial 33 into nothing
        .replace(/\D+/, '')
        .replace(/^330?/, '0')
        // Stick to first 10, ignore later digits
        .slice(0, 10)
        // Add a space after any 2-digit group followed by more digits
        .replace(/(\d{2})(?=\d)/g, '$1 ')
      this.setState({ value })
    }

    render() {
      const { name, placeholder, required } = this.props
      return (
        <input
          autocomplete="tel"
          name={name}
          onChange={this.handleChange}
          placeholder={placeholder}
          required={required}
          type="tel"
          value={this.state.value}
        />
      )
    }
  }

• Numéro de carte "bancaire (4 × 4 chiffres)"

  class CreditCardField extends Component {
    static defaultProps = {
      name: 'cc-number',
      placeholder: 'xxxx xxxx xxxx xxxx',
      required: false,
    }

    static propTypes = {
      name: PropTypes.string.isRequired,
      placeholder: PropTypes.string,
      required: PropTypes.bool,
    }

    constructor(props) {
      super(props)
      this.state = { value: '' }
    }

    // This method is declared using an arrow function initializer solely
    // to guarantee its binding, as we cannot use decorators just yet.
    handleChange = ({ target: { value } }) => {
      value = value
        // Remove all non-digits
        .replace(/\D+/, '')
        // Stick to first 16, ignore later digits
        .slice(0, 16)
        // Add a space after any 4-digit group followed by more digits
        .replace(/(\d{4})(?=\d)/g, '$1 ')
      this.setState({ value })
    }

    render() {
      const { name, placeholder, required } = this.props
      return (
        <input
          autocomplete="cc-number"
          name={name}
          onChange={this.handleChange}
          placeholder={placeholder}
          required={required}
          type="text"
          value={this.state.value}
        />
      )
    }
  }

◘ Mise en application

• Mettre au point la saisie du nom

Afin de ne pas avoir à gagner une partie à chaque fois qu’on recharge la page 
pour mettre au point le composant, modifions le render() de  App.js comme suit :
<HighScoreInput guesses={guesses} />
{won && <HallOfFame entries={FAKE_HOF} />}

HighScoreInput.js
Commençons par doter <HighScoreInput /> 
d’un état local pour la valeur de nom saisie ":"
class HighScoreInput extends Component {
  state = { winner: '' };

  render() {
    return (
      // …
      <input autoComplete="given-name" type="text" value={this.state.winner} />
      // …
    )
  }
}
À ce stade, le champ est en lecture seule. 
Ajoutons un gestionnaire de saisie qui va le rendre éditable. 
L’idée ici est de forcer une saisie majuscule
// Arrow fx for binding
handleWinnerUpdate = (event) => {
  this.setState({ winner: event.target.value.toUpperCase() })
}

render() {
  return (
    // …
    <input
      autoComplete="given-name"
      type="text"
      onChange={this.handleWinnerUpdate}
      value={this.state.winner}
    />
    // …
  )
}

• Intercepter l’envoi du formulaire

HighScoreInput.js 
render() {
  return (
    <form className="highScoreInput" onSubmit={this.persistWinner}>
    //
    </form>…
  )
}

puis, un peu plus haut dans la classe ":"
class HighScoreInput extends Component {
// ...
// Arrow fx for binding
persistWinner = (event) => {
  event.preventDefault()
  const newEntry = { guesses: this.props.guesses, player: this.state.winner }
  saveHOFEntry(newEntry, this.props.onStored)
}
// ...
}

La fonction saveHOFEntry() est fournie par le  HallOfFame.js 
Elle attend une fonction de rappel en second argument, 
qu’elle appellera avec le tableau d’honneur à jour une fois celui-ci ajusté 
et persisté dans le navigateur. 
Ce n’est pas le rôle de la saisie de score de réagir à ça. 
Nous allons donc déclarer une prop onStored de type fonction, 
que <App /> nous fournira ":"
HighScoreInput.propTypes = {
  guesses: PropTypes.number.isRequired,
  onStored: PropTypes.func.isRequired,
}
(à mettre en bas du fichier)

• Afficher intelligemment la saisie et le tableau d’honneur

App.js 
Commençons par ajuster l’initialisation de l’état en haut de classe ":"
state = {
  cards: this.generateCards(),
  currentPair: [],
  guesses: 0,
  hallOfFame: null,
  matchedCardIndices: [],
}

Ajoutons ensuite une méthode qui va recevoir un tableau d’honneur 
et qui en ajustera l’état avec ":" {
// Arrow fx for binding
displayHallOfFame = (hallOfFame) => {
  this.setState({ hallOfFame })
}
}

Au début du render(), 
allons chercher hallOfFame, également présent dans l’état ":" {
render() {
  const { cards, guesses, hallOfFame, matchedCardIndices } = this.state
  // …
}

Enfin, revoyons complètement la fin de grappe JSX, 
en remplaçant le champ de saisie et la condition simple basée sur won par ceci :
{
  won &&
    (hallOfFame ? (
      <HallOfFame entries={hallOfFame} />
    ) : (
      <HighScoreInput guesses={guesses} onStored={this.displayHallOfFame} />
    ))
}

Pour tester ça rapidement, vous pouvez ajuster temporairement la définition de won, 
pour limiter à quelques paires réussies par exemple :
{
  // TEMPORAIRE
  const won = matchedCardIndices.length === 4 // cards.length
}
```

## <a name="delegate-events"></a> Déléguez des traitements avec les champs non contrôlés
```jsx
pratiques lorsque l’on souhaite récupérer une valeur de champ 
sans contraindre sa saisie ni son formatage

◘ Valeur par défaut

on peut pour cela recourir à la prop "defaultValue="  plutôt que  "value=".
Pour les cases à cocher et les boutons radio, on a dans le même esprit
"defaultChecked="  pour l’état coché ou non.

◘ Utiliser une ref

Le moyen le plus fiable pour récupérer une référence sur le champ 
dont on veut obtenir la valeur le moment venu, 
consiste à utiliser une prop "ref=" sur le champ ":"
class NameForm extends React.Component {
  constructor(props) {
    super(props);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.input = React.createRef(); // React 16.3
  }

  handleSubmit(event) {
    alert('Un nom a été envoyé : ' + this.input.current.value);
    event.preventDefault();
  }

  render() {
    return (
      <form onSubmit={this.handleSubmit}>
        <label>
          Nom :
          <input type="text" ref={this.input} />
        </label>
        <input type="submit" value="Envoyer" />
      </form>
    );
  }
}

APPRONDIR LES FORMULAIRES :
{
  "forms": https://fr.reactjs.org/docs/forms.html,
  "uncontrolled-forms": https://fr.reactjs.org/docs/uncontrolled-components.html,
  "Awesome React": {
    "forms": https://github.com/enaqx/awesome-react#forms,
    "saisies auto-complétées": https://github.com/enaqx/awesome-react#autocomplete
  },
  "Awesome React Components": https://github.com/brillout/awesome-react-components#form-components
} 
```

## <a name="automatic-tests"></a> LES TEST AUTOMATISÉS
```jsx
◘ `Test-first (TDD) ou Test-after ?`

On aura donc tendance à limiter le "test-first" au code métier 
(les fonctions qui font évoluer l’état applicatif et les fonctions utilitaires), 
et on écrira plutôt les tests de composants immédiatement 
après avoir finalisé l’aspect de ceux-ci "(test-after)", 
pour éviter de ré-écrire ces tests un paquet de fois.

◘ Les briques d’un outillage de test

• Assertions : brique élémentaire de nos tests 
morceau de code qui vérifie qu’une condition est bien remplie
function assertWeRunOnMondays() {
  const todaysWeekDay = new Date().getDay()
  if (todaysWeekDay !== 1) {
    throw new AssertionError('We are supposed to only run on Mondays')
  }
}

• Tests et suites
test = petit bloc de code qui pose une question précise et en vérifie la réponse
it('should use an empty array for its default state', () => {
  const initialState = undefined
  const expectedState = []

  expect(reducer(initialState, {})).to.deep.equal(expectedState)
})

Les tests sont généralement regroupés en suites de tests, 
généralement une suite par fichier. 
Ces fichiers contiennent en général au moins un bloc describe() 
qui définit le contexte de la suite ; 
on peut imbriquer les  describe() pour affiner le contexte
describe('The entries controller', () => {
  describe('when unauthenticated', () => {
    it('should redirect any access to the homepage', { … })
  })

  describe('when authenticated', () => {
    it('should allow the listing of entries', { … })

    it('should let users filter the listing', { … })

    it('should allow the creation of a new entry', { … })

    // …
  })
})

• Harnais = programme chef d’orchestre des tests
Il permet de trouver les fichiers de test, fournir un rapport, etc. 
les plus populaires = Mocha, Jest et Jasmine. Create React App utilise Jest

• `Intégration continue`
va réagir à tout envoi de code sur votre serveur de versions
Travis CI, Jenkins, GitLab
```

## <a name="jest"></a> Premier test avec Jest 
```jsx
Jest est intégré de base avec les applications générées par Create React App
Le fichier src/App.test.js contient une suite de test basique, 
ce qu’on appelle un smoke test, 
qui vérifie simplement que notre composant <App/> arrive à réaliser son rendu sans problème. 
import React from 'react'
import ReactDOM from 'react-dom'
import App from './App'

it('renders without crashing', () => {
  const div = document.createElement('div')
  ReactDOM.render(<App />, div)
})
Puis, dans le terminal : `npm test 
=> le code est désormais suivi en temps réel`
il surveille vos fichiers et relance les tests appropriés si besoin. 
Pour arrêter Jest => appuyer sur q (quitter) ou taper Ctrl+C.

Jest "(de React)" cherche dans le dossier "src/" à la recherche de fichiers 
se terminant par spec.js ou test.js "(+ .mjs et .jsx)", précédé d’un trait d’union (-) 
ou d’un point (.)

Jest fournit une fonction expect() qui propose toute une série d’assertions
=>  https://jestjs.io/docs/en/expect.html#content
```

## <a name="chai"></a> (OPTIONNEL) Gagnez en expressivité avec Chai
```jsx
◘ Utiliser les assertions de Chai

au lieu d’utiliser le  expect()  fourni de base par Jest, 
on va simplement chercher celui de Chai en début de fichier de test :
import { expect } from 'chai'

◘ Comparaison rapide des syntaxes

Jest : expect(x).toContain(42),
expect(f).toHaveBeenCalledWith('yo'),
expect(obj).toHaveProperty('items')
expect(obj.items).toHaveLength(42)
Chai : expect(x).to.contain(42),
expect(f).to.have.been.calledWith('yo'),
expect(obj).to.have.property('items').with.length(42)

◘ Installation 

`npm i --save-dev chai dirty-chai`
`npm i dirty-chai sur le site off`

◘ Attention aux « dirty checks »

expect(obj.name).to.exit // Oops, il manque le "s" : pas d'erreur dans terminal
expect(obj.state).to.be.Null // Oops, N majuscule : pas d'erreur dans terminal
Solution : dirty chai
npm install --save-dev dirty-chai

src/setupTests.js
const chai = require('chai');
const dirtyChai = require('dirty-chai');

chai.use(dirtyChai);

◘ Récupérer les jolis diffs de Jest en cas d''inégalité structurelle

npm install --save-dev chai-jest-diff
`npm i chai-jest-diff sur le site off`

src/setupTests.js
const chai = require('chai');
const dirtyChai = require('dirty-chai');
const chaiJestDiff = require('chai-jest-diff');

chai.use(dirtyChai);
chai.use(chaiJestDiff.default());
```

## <a name="enzyme"></a> Facilitez-vous l'écriture des tests avec Enzyme
```jsx
Le renderer de test de React est très inférieur à l’outil Enzyme de Airbnb, 
lequel est d’ailleurs officiellement recommandé par Create React App

◘ Mise en application

npm install --save-dev enzyme enzyme-adapter-react-16 react-test-renderer chai-enzyme
setupTests.js 
-------------
import Adapter from 'enzyme-adapter-react-16';
import { configure as configureEnzyme } from 'enzyme';
import createChaiEnzyme from 'chai-enzyme';
const chai = require('chai');
const dirtyChai = require('dirty-chai');
const chaiJestDiff = require('chai-jest-diff');

chai.use(dirtyChai);
chai.use(chaiJestDiff.default());
chai.use(createChaiEnzyme());

configureEnzyme({ adapter: new Adapter() });

• Reformuler notre smoke test
App.test.js 
import { expect } from 'chai'
import React from 'react'
import { shallow } from 'enzyme' // remplace le renderer React-DOM

import App from './App'

describe('<App />', () => {
  it('renders without crashing', () => {
    const wrapper = shallow(<App />)
  })
})
On recourt ici au shallow renderer d’Enzyme, 
qui utilise le render() du composant, 
mais sans descendre dans les render() de ses composants fils : 
c’est une approche idéale pour les tests unitaires, et de loin la plus populaire.

• Ajouter un test de présence de composant dans le render()
Ex: détecter la présence, quelque part dans la grappe, 
d’un autre composant doté de props spécifiques, grâce à contain() :
import GuessCount from './GuessCount' // ++ for testing GuessCount component
…
describe('<App />', () => {
  …
  it('contains a zero-guess counter', () => { // ++
    const wrapper = shallow(<App />)

    expect(wrapper).to.contain(<GuessCount guesses={0} />)
  })
})

• Encore un exemple
On peut aussi aller « chercher » des parties de la grappe pour leur poser des questions spécifiques, 
ou simplement compter les occurrences. 
Par exemple, notre plateau est censé comporter 36 cartes, 6 × 6 :
it('has 36 cards', () => {
  const wrapper = shallow(<App />)
  expect(wrapper.find('Card')).to.have.length(36)
})

La doc : https://airbnb.io/enzyme/docs/api/shallow.html
des assertions comme prop() ou text() sont extrêmement utiles
```

## <a name="simulate-events"></a> Simulez des événements
```jsx
Rappel à tester : Notre composant <Card /> propose une prop onClick 
qu’il est effectivement censé appeler, 
avec sa position dans le tableau (sa prop index) en argument, 
lorsqu’on clique sur son contenu. 

◘ Avec Jest directement 

Jest propose de base des spies, 
des fonctions simulées qui enregistrent le détail de tous les appels 
qui leurs sont faits, avec jest.fn(). 
Il fournit aussi, sur son expect() natif, 
des assertions de type toHaveBeenCalledWith()
----
Card.test.js 
----
import React from 'react'
import { shallow } from 'enzyme'

describe('<Card/>', () => {
  it('should trigger its `onClick` prop when clicked', () => {
    const onClick = jest.fn()
    const wrapper = shallow(
      <Card card="😁" feedback="hidden" index={0} onClick={onClick} />
    )

    wrapper.simulate('click') // simule un clic
    expect(onClick).toHaveBeenCalledWith(0)
  })
})

◘ Avec Sinon

Son API est plus riche et plus vaste que celle de Jest,
notamment l’isolation de code (spies, stubs, mocks, simulation du temps ou du réseau)
Installation, avec son plugin pour Chai :
npm install --save-dev sinon sinon-chai
-----
setupTest.js
-----
import sinonChai from 'sinon-chai' // ++

chai.use(sinonChai); // ++

-----
Card.test.js 
-----
import { expect } from 'chai'
import React from 'react'
import { shallow } from 'enzyme'
import sinon from 'sinon' // ++

import Card from './Card'

describe('<Card/>', () => {
  it('should trigger its `onClick` prop when clicked', () => {
    const onClick = sinon.spy() // ++
    const wrapper = shallow(
      <Card card="😁" feedback="hidden" index={0} onClick={onClick} />
    )

    wrapper.simulate('click')
    expect(onClick).to.have.been.calledWith(0) // ++
  })
})
```

## <a name="snapshots"></a> Mettre en place un filet de sécurité avec les Snapshots
```jsx
snapshots = « photo » intégrale du résultat d’un morceau de code, 
en partant du principe que ce code marche correctement à ce moment-là, 
pour ensuite, lors des prochaines passes de test, 
reprendre une photo et comparer à celle de référence.
snapshots = filet de secours
snapshots = marchent avec du contenu JSON

◘ Configuration

Si nous utilisions le expect() natif de Jest, 
il nous suffirait de faire quelque chose du genre expect(wrapper).toMatchSnapshot()
Mais nos enrobages sont issus d’Enzyme, 
dont il va donc falloir configurer la sérialisation ; 
et d’autre part, nous utilisons le expect() de Chai.
npm install --save-dev chai-jest-snapshot enzyme-to-json
-----
src/setupTests.js
-----
import chaiJestSnapshot from 'chai-jest-snapshot' // ++
import enzymeToJSON from 'enzyme-to-json/serializer' // ++

…

chai
    .use(dirtyChai)
    .use(chaiJestDiff.default())
    .use(chaiJestSnapshot) // ++
    .use(createChaiEnzyme())
    .use(sinonChai);

expect.addSnapshotSerializer(enzymeToJSON) // ++

◘ Un premier snapshot

Card.test.js 
------------
it('should match its reference snapshot', () => {
  const onClick = sinon.spy()
  const wrapper = shallow(
    <Card card="😁" feedback="hidden" index={0} onClick={onClick} />
  )

  expect(wrapper).to.matchSnapshot()
})

réponse Console :
un snapshot a été écrit sur disque + un snapshot a été ajouté. 
le principe repose sur l’idée qu’au premier snapshot, 
le sujet testé fonctionne et fait référence.

◘ Aspect du snapshot

créés dans un sous-dossier __snapshots__ de celui contenant la suite de test concernée
src/__snapshots__/Card.test.js.snap
// Jest Snapshot v1, https://goo.gl/fbAQLP = 1ère version, celle de base

◘ Un deuxième snapshot… et un souci

Dans App.test.js, ajoutons le bloc suivant :
it('should match its reference snapshot', () => {
  const wrapper = shallow(<App />)

  expect(wrapper).to.matchSnapshot()
})
À la sauvegarde, Jest va produire un nouveau snapshot.
Toutefois, si on relance les tests (par exemple avec Entrée), 
il semble que toutes les cartes aient changé de symbole (logique). 

• Solution : s’assurer d’une liste stable de cartes

Pendant le snapshot, nous allons remplacer l’implémentation de generateCards() 
dans le composant <App /> par la nôtre, 
qui renverra toujours la même chose. 
Ainsi, pas de soucis pour la cohérence des `snapshots !`
On va pour cela recourir à Sinon.js et la méthode sinon.stub(). 
Comme le rendu par shallow() et les assertions sont synchrones, 
un simple try…finally… suffira à s’assurer de restaurer le comportement normal de generateCards()  
en temps et en heure :
------
App.js 
------
export const SYMBOLS = '😀🎉💖🎩🐶🐱🦄🐬🌍🌛🌞💫🍎🍌🍓🍐🍟🍿' // ++ export 
------
App.test.js
import sinon from 'sinon'

import App, { SYMBOLS } from './App'

…

it('should match its reference snapshot', () => {
  const mock = sinon
    .stub(App.prototype, 'generateCards')
    .returns([...SYMBOLS.repeat(2)])
  try {
    const wrapper = shallow(<App />)

    expect(wrapper).to.matchSnapshot()
  } finally {
    mock.restore()
  }
})

(!) Lorsqu’on va relancer les tests en sauvant le fichier, 
on va à nouveau avoir un snapshot incohérent, 
puisque celui qui fait référence était aléatoire ; 
on va donc entériner le nouveau snapshot en tapant u (update)
```

## <a name="audit-tests"></a> Auditez la couverture de vos tests
```jsx
npm test -- --coverage
// --  seul pour indiquer que le reste de la ligne de commande n’est pas à considérer 
// comme des options pour la commande principale (npm, donc), mais à passer tels quels
Ouvrir coverage/lcov-report/index.html : tableau interactif et très détaillé de couverture
```

## <a name="doc"></a> Explorez la documentation pour aller plus loin
```jsx
{
  Jest: 'https://jestjs.io/',
  Chai: 'https://www.chaijs.com/',
  Enzyme: 'https://airbnb.io/enzyme/',
  'Chai-Enzyme': 'https://github.com/producthunt/chai-enzyme#readme',
  Sinon: 'https://sinonjs.org/',
  'Sinon-Chai': 'https://github.com/domenic/sinon-chai#readme'
}
```