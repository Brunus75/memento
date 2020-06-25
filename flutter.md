# MEMENTO FLUTTER


## RESSOURCES

**DART & FLUTTER**
* Doc Dart : https://dart.dev/
* DartPad : https://dartpad.dev/dart
* Doc Flutter : https://flutter.dev/docs/get-started/install
* Page YT Flutter :  https://www.youtube.com/channel/UCwXdFgeE9KYzlDdR7TG9cMw/videos
* Palette des couleurs : https://api.flutter.dev/flutter/material/Colors-class.html
* Liste des icônes : https://material.io/resources/icons/?style=baseline
* Icônes : https://www.fluttericon.com/
* Material Palette (créer une palette, voir les nuances des couleurs et chercher une icone) : https://www.materialpalette.com/
* Une communauté francophone Flutter : http://fr.flutterdev.net/
* Widget catalog : https://flutter.dev/docs/development/ui/widgets
* Top Flutter packages : https://pub.dev/flutter/packages
* https://www.reddit.com/r/FlutterDev/
* https://github.com/flutter/flutter
* Catalogue d’applications Flutter développées par la communauté : https://github.com/flutter/samples/blob/master/INDEX.md
* Making Dart a Better Language for UI : https://medium.com/dartlang/making-dart-a-better-language-for-ui-f1ccaf9f546c
* What is unit of measurement in flutter : https://stackoverflow.com/questions/50596099/what-is-unit-of-measurement-in-flutter
* ~ A Guide to Using Futures in Flutter for Beginners : https://medium.com/flutter-community/a-guide-to-using-futures-in-flutter-for-beginners-ebeddfbfb967
* ~ Flutter: Push, Pop, Push : https://medium.com/flutter-community/flutter-push-pop-push-1bb718b13c31

**TUTOS**
* https://www.udemy.com/course/flutter-bootcamp-with-dart/
* https://www.udemy.com/course/flutter-dart-creez-des-applications-pour-ios-et-android/
* #1 Fluter: Télécharger, Installer et Configurer Flutter SDK sur Windows : https://www.youtube.com/watch?v=P4Ua8cK_TeA&

**DOCS**
* Tomek's Flutter Layout Cheat Sheet : https://medium.com/flutter-community/flutter-layout-cheat-sheet-5363348d037e
* Flutter-Course-Resources : https://github.com/londonappbrewery/Flutter-Course-Resources
* Comment J’apprends Flutter ? : https://medium.com/@q.cornu/comment-japprends-flutter-412add79848c
list=PLjA66rpnHbWnTTzp3QYykoAHkCriViEDo  
* Roadmap des élements à connaître : https://www.ambient-it.net/wp-content/uploads/pdf/Annexe-1-Fiche-descriptive-formation-flutter-dart.pdf
* “A month of Flutter” : https://bendyworks.com/blog/a-month-of-flutter
* https://www.facebook.com/pg/CodaBeeOfficial/posts/?ref=page_internal
* Codabee Flutter: le forum d'entraide : https://www.facebook.com/groups/225660591356238
* Dart Async Library : https://api.flutter.dev/flutter/dart-async/dart-async-library.html
* https://www.didierboelens.com/fr/

**ANDROID STUDIO**
* Android Studio 4.0 s'accompagne d'une interface pour l'édition de mouvement, propose la validation de la mise en page : https://android.developpez.com/actu/304550/Android-Studio-4-0-s-accompagne-d-une-interface-pour-l-edition-de-mouvement-propose-la-validation-de-la-mise-en-page-et-apporte-la-prise-en-charge-de-Clangd-pour-le-developpement-Cplusplus/

**ASSETS**
* https://www.canva.com/fr_fr/
* https://icons8.com/
* https://fr.vecteezy.com/

**AWESOME PROJECTS**
* https://github.com/2d-inc/HistoryOfEverything

**JSON**
* Instantly parse JSON in any language : https://app.quicktype.io/#l=dart, exemple : https://app.quicktype.io/?share=4Ik8Upww0mN33e2CBVmq


## SOMMAIRE

* [RESSOURCES](#ressources)
* [FLUTTER](#flutter)   
   * [GLOSSAIRE](#glossaire)
   * [CONSEILS](#conseils)
   * [ASTUCES](#astuces)
   * [STRUCTURE](#structure)
* [INSTALLATION](#installation)
* [LANCER FLUTTER SUR LE MOBILE](#flutter-sur-mobile)
* [ANDROID STUDIO](#android-studio)   
   * [RACCOURCIS](#raccourcis)
* [PACKAGES](#packages)
* [MAIN.DART](#main-dart)
* [WIDGETS](#widgets)   
   * [WIDGETS DE BASE (1)](#widgets-de-base)
   * [POP-UP ET NAVIGATOR (2)](#pop-up-et-navigator)
   * [WIDGETS INTERACTIFS (3)](#widgets-interactifs)
   * [WIDGETS SCROLLABLES (4)](#widgets-scrollables)
* [EX. D'APPLI (1) : CODAMUSIC](#codamusic)
* [EX. D'APPLI (2) : JEU DE QUIZZ](#coda-jeu-de-quizz)
* [EX. D'APPLI (3) : CALCUL DE CALORIES](#coda-calcul-calories)
* [EX. D'APPLI (4) : FLUX RSS](#coda-news)
* [EX D'APPLI (5) : Drawer, SharedPreferences, JSON et API](#coda-meteo)
* [EX D'APPLI (6) : SQFLITE](#coda-sqflite)


## FLUTTER

* SDK (kit de développement) de Google, fondé sur le principe des widgets (flexibilité, simplicité et rapidité d'utilisation), sorti en 2018
* Permet de créer des applications Android ET IOS
* Construit autour du langage "fullstack" Dart
* Illustré par le Material Design d'Android ou IOS
* Material Design crée des composants adaptés aux règles de l'appareil souhaité
* Le design s'adpate à chaque appareil (Android ou IOS)
* Accès facile à la batterie, géolocalisation, appareil photo, ect.
* Les bases à connaître sur les widgets : https://flutter.dev/docs/development/ui/widgets/basics
* Créer une app avec Flutter = créer une construction avec des legos ; les widgets s'empilent les uns sous les autres
* Comme tout est objet sur Dart, tout est objet sur Flutter
* Les widgets = des constructeurs(param1, param2, ect.)
* Un widget est par nature “immutable”, son contenu ne peut être modifié sans reconstruire ce dernier
* Les propriétés d’un Widget qu’il soit avec ou sans état, doivent être immutables
* Architecture :
```
Scaffold (structure)
    AppBar (nav bar)
    Container (main section)
        Column
            Row
                Text
                Icon
    Texte, Image, ect.
```
* A chaque fois que setState() est appelé, la méthode build() du widget est appelée et entraîne la reconstruction du widget tout en gardant le « state »
* The majority of widgets in Flutter are simply combinations of other simpler widgets. For example, the Container.padding property causes the container to build a Padding widget and the Container.decoration property causes the container to build a DecoratedBox widget.

### GLOSSAIRE
* Container = grosso modo une ```<div></div>```
* SizedBox = container qui ne changera pas de taille, quelle que soit la taille de son enfant (équivaut à box-sizing : border-box)
```java
SizedBox(
  width: 200.0,
  height: 300.0,
  // la Card fera 200 x 300, dû aux contraintes imposées par la sized box
  child: const Card(child: Text('Hello World!')),
)
```
* Stateless Widgets = widget qui ne changera pas d'état => widget descriptif et non interactif (les variables, fonctions, valeurs, evenements compris dans la classe du widget ne changeront pas) => le widget ne sera jamais rechargé durant l'utilisation de l'application => **statique**
```java
class MyApp extends StatelessWidget {
  @override 
  Widget build(BuildContext context) { // ne sera appelée qu'une seule fois
    return MaterialApp(
      title: 'Flutter Demo',
      // ...
    );
  }
}
```
* Stateful Widgets = widget qui possède un état (capacité à se modifier selon les évènements de l'application) et qui sera rechargé ou non durant l'application => **dynamique**
```java
class MyHomePage extends StatefulWidget { // création d'un Stateful Widget

  // This widget is the home page of your application. It is stateful, meaning
  // that it has a State object (defined below) that contains fields that affect
  // how it looks.

  @override // de createState()
  _MyHomePageState createState() => _MyHomePageState(); // création de l'état de la classe
}

class _MyHomePageState extends State<MyHomePage> { // l'état de la classe
  @override // de build()
  Widget build(BuildContext context) { // implémentation du build
    return OneOrMoreWidgets; // qui retourne l'ensemble des widgets de l'appli
  }
}
```
* Material Design = langage visuel développé par Google qui reprend les principes d'un design de qualité, responsive et multi-plateforme
* MaterialApp : Widget englobant des fonctionnalités requises pour les applications implémentant le material design
* Scaffold = template (équivalent du head + body en html)
* context = localisation du widget dans l'architecture de l'application
* slivers = parties d'une zone scrollable
### CONSEILS
* Toujours finir les éléments d'un objet, même le dernier, par une virgule
```java
MaterialApp(
  title: 'Flutter Demo',
  theme: ThemeData(
    primarySwatch: Colors.green,
    visualDensity: VisualDensity.adaptivePlatformDensity,
  ),
  home: MyHomePage(title: 'Flutter Demo Home Page'),
);
```
* Tous les nombres (liés aux éléments de Flutter) sont des double
```java
int _counter = 0, // variable perso
fontSize: 20.0, // variable Flutter
// exceptions :
maxLines: 2,
```
* String en single quotes (convention Dart)
```java
String exemple = 'Je suis un string';
```
* Toujours préférer le pourcentage aux proportions précises
```java
height: MediaQuery.of(context).size.height / 2,
textScaleFactor: 2.0, // fontSize 2 * plus grande
```
* Pas besoin d'importer async de Dart depuis sa version 2.1
```
After 2.1 the Future class was exported by dart core so you don't need to import async anymore
```
* Pour donner une width précise à un widget qui ne peut en avoir (ex. Card), lui donner un Container() comme enfant
```java
Card(
  elevation: 7.5,
  child: Container( // pour que Card ait une width
    width: MediaQuery.of(context).size.width / 2.5,
    child: Image.network(item.enclosure.url, fit: BoxFit.fill,),
  ),
)

// même solution pour un texte qui déborde
Container(
  width: MediaQuery.of(context).size.width / 2.5,
  child: TexteCodabee(item.title),
)
```
* Découper en fonctions les widgets qui se répètent
```java
child: Column(
  children: <Widget>[
    padding(),
    Row(
      mainAxisSize: MainAxisSize.max,
      mainAxisAlignment: MainAxisAlignment.spaceBetween,
      children: <Widget>[
        TexteCodabee(item.author),
        TexteCodabee(new DateConvertisseur().convertirDate(item.pubDate), color: Colors.red,)
      ],
    ),
    padding(),
    // ....

Padding padding() {
  return Padding(padding: EdgeInsets.only(top: 10.0));
}
```
* Toujours spécifier la ```^version``` de ses dépendances (ne pas les laisser vides)
### ASTUCES
* infinity (100%)
```java
Container(
  width: double.infinity,
)
```
* Ajout de padding, margin, autrement que via les propriétés
* https://api.flutter.dev/flutter/widgets/Padding-class.html
* https://api.flutter.dev/flutter/widgets/SizedBox-class.html
```java
// Column ou Container = sizedBox
Column(
  children: <Widget>[
    Text(),
    // ↓ sorte de margin
    SizedBox(
      height: 20.0,
    )
    Card(),
    Container()
  ]
)

// Card n'a pas de propriété padding
// on utilise le widget padding comme child
// qui entoure le child de la Card
Card(
  child: Padding(
    padding: EdgeInsets.all(16.0),
    child: Text('Hello World!'),
  ),
)

// de même si seulement le texte a besoin de padding :
Padding(
  padding: EdgeInsets.all(16.0),
  child: Text('Hello World!'),
)
```
* Ajouter une ligne
```java
SizedBox( // pour un padding
  height: 20.0,
  width: 150.0, // la ligne prendra cette longueur
  child: Divider( // ligne
    color: Colors.red,
  ),
)
```
* Ajouter un widget qui remplit l'espace disponible de la largeur de son parent
* https://api.flutter.dev/flutter/widgets/Expanded-class.html
```java
Container(
  Expanded(
    child: Image() // l'image prendra toute la largeur du Container
  )
)

Container(
  Expanded(
    flex: 2,
    child: Image() // l'image prendra 66% de la largeur du Container
  ),
    Expanded(
    flex: 1,
    child: Image() // l'image prendra 33% de la largeur du Container
  )
)
```
* Trouver les propriétés d'un widget => panneau Flutter Inspector
* Ajouter des commentaires TO DO et les retrouver
```java
//TO DO: commentaire
// le TO DO est retrouvable dans l'onglet TODO (bas gauche d'AS)
```
* Voir et sélectionner les modifications de notre code (historique) > Onglet VCS (Version Control) > Local History > Show History > Revert
* Factory : Use the factory ```keyword``` when implementing a constructor that doesn’t always create a new instance of its class
```java
factory Logger(String name) {
  return _cache.putIfAbsent(
      name, () => Logger._internal(name));
}
```
### STRUCTURE
* Structure :
```py
project_name/
  images/
  fonts/
  models/
  lib/
    main.dart
  widgets/
pubspec.yaml
```
### COMMANDES
```java
flutter packages get // the package gets re-installed fresh
flutter clean // clear Build Cache

package défecteux = flutter packages + flutter clean
```


## INSTALLATION

### FLUTTER
* https://flutter.dev/docs/get-started/install
* https://flutter.dev/docs/get-started/install/windows
* Extraire le .zip vers C:\src\flutter (pas dans Program Files)
* Double clic sur flutter_console.bat
```
flutter --version
```
* Créer une variable d'environnement : chercher "env" => "Modifier les variables d'environnement pour votre compte" => Variables utilisateur => sélectionner Path => Modifier => ajouter à la fin : ";"C:\src\flutter\bin" (Nouveau sur W10) (clic+Maj sur /bin + copier le chemin d'accès)
* Vérifier si le processus s'est bien déroulé => ouvrir une console, puis taper :
```
flutter --version
```
* Taper flutter doctor pour voir ce qu'il manque :
```
flutter doctor
```
### ANDROID STUDIO
* https://developer.android.com/studio
* Une fois installé, suivre le ‘Android Studio Setup Wizard’
* Ouverture d'Android Studio => Configure => Settings => Plugins => Browser repo => "Flutter" + install => approuver tous les pop-up (installe Dart en même temps)
### ANDROID EMULATOR
* Start a new Flutter project => "testing_app", "C:\src\flutter", "D:\Documents\DEV\FLUTTER" => OK => Finish
* Cliquer sur AVD Manager (haut à droite de l'écran)
* Create New Virtual Device => choisir Nexus 6 (meilleures performances)
* Choisir le premier Operating System
* Changer Emulated Performance à Hardware accelerated (l'émulateur sera plus rapide qu'en automatique)
### PREFERENCES
* Appearances => change background
* Editor => change Font size
* Editor => Code completion => Show the documentation popup
* Preferences/Settings => Languages & Frameworks => cocher "Perform Hot reload on save" + "Format code on save"
* Keymap pour changer les raccourcis clavier
### TROUBLESHOOTING
* https://www.udemy.com/course/flutter-bootcamp-with-dart/learn/lecture/17119662#bookmarks
### NOUVEAU PROJET FLUTTER
* package name = pour se différencier sur Play Store / Apple Store
* Décocher Include Kotlin + Include Swift
### RECUPERER UN PROJET FLUTTER
* New > Project from Version Control (lien GitHub) 
* Clone in your directory
* Checkout > No
* Ouvrir un projet > ouvrir le projet cloné

## FLUTTER SUR MOBILE
* Paramètres > A propos du téléphone > Informations sur le logiciel > Taper 7 fois sur le Numéro de version
* *Mode developpeur activé*
* Paramètres > Options de développement > Débogage USB => true
* *Connecter le téléphone avec le cable usb*
* *Accepter les pop-up*
* *Lancer l'appli depuis Android Studio*

## ANDROID STUDIO
* Fonctionnalités : https://www.udemy.com/course/flutter-bootcamp-with-dart/learn/lecture/14481906#questions
* AVD Manager : lieu où l'on stocke tous nos appareils virtuels (différents téléphones)
* Problème de Black Screen au démarrage du Nexus 6 > Wipe Data > Lancer Nexus 6
* Enlever le bandeau Debug => Flutter Inspector => More action => Hide Debug Mode Banner
* Problème de rotation => effectuer la rotation => appuyer sur le bouton rotation qui s'affiche quelques secondes sur le bas du téléphone OU activer la rotation sur le téléphone (comme un vrai téléphone)
### RACCOURCIS
* Alt+Insérer (Code => Generate) in the editor => generate the getter and setter methods for any fields of your class
* Clic-droit => Reformat
* Rester sur le widget => cliquer sur l'ampoule => Wrap with..., delete, ect. (intention actions)
* Alt + Enter pour faire aussi apparaître les intention actions
* Sélectionner les occurences => Edit => Find => Select All occurences (Ctrl+Maj+Alt+J)
* CTRL + / ==> To comment/uncomment a line .
* CTRL + Shift + / ==> To comment/uncomment block of code. */
* CTRL + Y ==> To delete a line
* stless => Stateless Widget
* stful => Stateful Widget
* cliquer sur l'élément + Ctrl + Q = quick documentation
* Envelopper un widget par un Center(), Column(), Row(), ect. => cliquer sur le widget => ouvrir le panneau droite Flutter Outline, cliquer sur l'un des boutons en haut du panneau OU depuis le même panneau, clic-droit sur l'élément à envelopper$
* Ctrl + clic sur la classe pour voir son fichier

## PACKAGES
* https://flutter.dev/docs/development/packages-and-plugins/using-packages
* Cheatsheet :
```yaml
dependencies:
  url_launcher: ^5.4.0    # Good, any 5.4.x version where x >= 0 works.
  image_picker: '5.4.3'   # Not so good, only version 5.4.3 works.
  url_launcher: '>=5.4.0 <6.0.0' # range versions
  plugin: # dernière version stable
```


## MAIN DART
```java
import 'package:flutter/material.dart'; // import des packages de material dart

void main() { // fonction principale
  runApp(MyApp()); // lance l'application
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override // on ré-écrit la méthode de la classe mère
  Widget build(BuildContext context) { 
  // ↑ méthode qui sera appelée à chaque chargement de l'appli
  // + à chaque nouvelle version des widgets compris dans le widget
  // + à chaque fois que setState() sera appelée
    return MaterialApp( // widget de base = squelette de l'application
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue, // couleur principale de l'appli
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: MyHomePage(title: 'Flutter Demo Home Page'), // page principale
    );
  }
}

class MyHomePage extends StatefulWidget { // page principale
  MyHomePage({Key key, this.title}) : super(key: key); // constructeur

  final String title; // propriété

  @override
  _MyHomePageState createState() => _MyHomePageState(); // état de la classe
}

class _MyHomePageState extends State<MyHomePage> {
  int _counter = 0;

  void _incrementCounter() { // action sur le compteur
    setState(() { // setState = une variable va être modifiée
    // et donc tous les widgets associées à cette variable
    // vont être modifiés en conséquence
      _counter++;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold( // structure principale, conteneur de tous les éléments
      appBar: AppBar( // nav vbar
        title: Text(widget.title),
      ),
      body: Center( // widget qui centre un autre widget, son child (ici, Column)
        child: Column( // widget colonne
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[ // a des enfants de type Widget
            Text(
              'You have pushed the button this many times:',
            ),
            Text(
              '$_counter', // variable _counter
              style: Theme.of(context).textTheme.headline4, // style = celui du thème
            ),
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton( // le bouton
        onPressed: _incrementCounter, // l'évènement, associé à la méthode
        tooltip: 'Increment', // à quoi sert notre bouton ? (pense-bête)
        child: Icon(Icons.add),
      ), // This trailing comma makes auto-formatting nicer for build methods.
    );
  }
}
```

### MODIFICATION DE CODE
```java
import 'package:flutter/material.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.green,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: MyHomePage(title: 'Flutter Demo Home Page'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key key, this.title}) : super(key: key);
  final String title;
  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  String name = ''; // ++
  int _counter = 0;

  void _incrementCounter() {
    setState(() {
      _counter++;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly, // précédemment .center
          // répartie de façon égale les éléments sur la longueur de l'écran
          children: <Widget>[
            Text(
              'Salut $name, vous avez appuyé tant de fois sur le bouton :', // ++
              textAlign: TextAlign.center, // ++
              style: TextStyle( // ajout d'un style ++ (plus besoin de new pour instancier un objet)
                color: Colors.red,
                fontSize: 20.0,
              ),
            ),
            Text(
              '$_counter',
              style: Theme.of(context).textTheme.headline4,
            ),
            TextField( // création d'un input text
              onChanged: (String string) { // quand le texte change ++
                setState(() { // change tous les widgets associés à la variable
                  this.name = string; // le texte renseigné => var name
                });
              },
              onSubmitted: (String string) { // quand le texte est envoyé
                setState(() {
                  this.name = string; // le texte renseigné => var name
                });
              },
              decoration: InputDecoration(
                labelText: "Entrez votre prénom : "
              ),
            )
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: _incrementCounter,
        tooltip: 'Increment',
        child: Icon(Icons.add),
      ),
    );
  }
}
```

## WIDGETS

* https://flutter.dev/docs/development/ui/widgets

### WIDGETS DE BASE

* https://flutter.dev/docs/development/ui/widgets/basics

#### MATERIAL APP
* Structure de l'application, basée sur le Material Design
* https://api.flutter.dev/flutter/material/MaterialApp-class.html
```java
import 'package:flutter/material.dart'; // obligatoire

void main() {
  runApp(MyApp()); // lance l'appli
}

class MyApp extends StatelessWidget { // l'appli

  @override // obligatoire
  Widget build(BuildContext context) {
    return MaterialApp( // ce qui est à renvoyer
      // regarder MaterialApp sur la doc pour implémenter le constructeur
      title: "Les widgets basiques",
      theme: ThemeData(
        primarySwatch: Colors.red, // couleur de base
      ),
      debugShowCheckedModeBanner: false, // true dans le constructeur de la doc
      home: // à implémenter, page principale de l'appli
    );
  }
}
```
#### SCAFFOLD
* Equivalent du template
```java
import 'package:flutter/material.dart'; // obligatoire

void main() {
  runApp(MyApp()); // lance l'appli
}

class MyApp extends StatelessWidget { // l'appli

  @override // obligatoire
  Widget build(BuildContext context) {
    return MaterialApp( // ce qui est à renvoyer
      // regarder MaterialApp sur la doc pour implémenter le constructeur
      title: "Les widgets basiques",
      theme: ThemeData(
        primarySwatch: Colors.red, // couleur de base
      ),
      debugShowCheckedModeBanner: false, // true dans le constructeur de la doc
      home: Home(), // ++
    );
  }
}

class Home extends StatefulWidget { // page principale
  @override
  State<StatefulWidget> createState() { // création de son état
    return _Home();
  }
}

class _Home extends State<Home> { // convention pour indiquer qu'il s'agit du state de Home
  // hérite du state de Home 
  // (generic type = le <Home> est un paramètre de la classe générique State)

  @override
  Widget build(BuildContext context) {
    return Scaffold( // notre template
      // on y renseigne tous les widgets que l'on ajouter à notre template
      backgroundColor: Colors.teal,
    );
  }
}
```
#### APPBAR
* Equivalent d'une nav bar
```java
class _Home extends State<Home> { 
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar( // widget AppBar
        title: Text("Mon menu de navigation"),
        leading: Icon(Icons.account_circle), // extrémité gauche de la nav bar
        actions: <Widget>[ // liste d'actions, extrémité droite de la nav bar
          Icon(Icons.navigation),
          Icon(Icons.menu),
        ],
        elevation: 10.0, // effet de profondeur, demandé double dans la doc
        centerTitle: true,
      ),
      backgroundColor: Colors.teal,
    );
  }
}
```
#### CONTAINER
* Un conteneur qui ne peut contenir qu'un enfant (widget)
* But : pouvoir ajouter background-color, décorations, padding et margin au widget
```java
class _Home extends State<Home> { 
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      // ...
      body: Container( // ++ body du template
        // color: Colors.blue,
        // height: 30.0,
        // height divisée par 2 :
        height: MediaQuery.of(context).size.height / 2,
        margin: EdgeInsets.all(10.0), // équivalent de margin = 10
        padding: EdgeInsets.only(top: 15.0, bottom: 5.0), // padding-top = 15
        decoration: BoxDecoration( // ajouter des bordures, un box-shadow, ect.
          color: Colors.blue, // remplace color du container
          border: Border.all(
            color: Colors.white,
            width: 2.0,
          ),
          borderRadius: BorderRadius.all(Radius.circular(20.0)),
        ),
        child:
          // élément contenu dans le container
      ),
    );
  }

}
```
#### CENTER
* Container qui centre l'enfant qu'il contient
```java
class _Home extends State<Home> { @override
  Widget build(BuildContext context) {
    return Scaffold(
      // ...
      body: Container( // body du template
        // color: Colors.blue,
        // height: 30.0,
        // height divisée par 2 :
        height: MediaQuery.of(context).size.height / 2,
        margin: EdgeInsets.all(10.0), // équivalent de margin = 10
        padding: EdgeInsets.only(top: 15.0, bottom: 5.0), // padding-top = 15
        decoration: BoxDecoration( // ajouter des bordures, un box-shadow, ect.
          color: Colors.blue, // remplace color du container
          border: Border.all(
            color: Colors.white,
            width: 2.0,
          ),
          borderRadius: BorderRadius.all(Radius.circular(20.0)),
        ),
        child: // élément contenu dans le container
          Center(
            child: Container(
              color: Colors.red,
              width: 20.0,
              height: 20.0,
            )
          )
      ),
    );
  }
}
```
#### CARD
* Container avec des bords arrondis et une ombre
```java
class _Home extends State<Home> { 
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container( 
        child: // élément contenu dans le container
          Center(
            child: Card( // ++
              elevation: 5.0,
              color: Colors.teal,
              child: Container(
                width: MediaQuery.of(context).size.width / 2,
                height: 250.0,
              ),
            )
          )
      ),
    );
  }
}
```
#### IMAGE.NETWORK
* Récupérer une image sur le web
```java
class _Home extends State<Home> { 
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container( 
        child: // élément contenu dans le container
          Center(
            child: Card(
              elevation: 5.0,
              color: Colors.teal,
              child: Container(
                width: MediaQuery.of(context).size.width / 2,
                height: 250.0,
                // accepte liens http également ↓
                child: Image.network("https://flutter.dev/assets/flutter-lockup-c13da9c9303e26b8d5fc208d2a1fa20c1ef47eb021ecadf27046dea04c0cebf6.png",
                fit: BoxFit.cover)
              ),
            )
          )
      ),
    );
  }
}
```
#### IMAGE.ASSETS
* Utiliser une image en local
* Sur AS, clic-droit sur le projet (ici "basic_widgets") => New directory => images
* Copier-coller l'image dans le dossier créé sur AS
* pubspec.yaml
```yaml
# To add assets to your application, add an assets section, like this:
assets:
  - images/computer.jpg # Copy Path => Path from content root
  - images/ # plus simple et à privilégier, récupère toutes les images
```
en haut du fichier => pub get
* main.dart
```java
class _Home extends State<Home> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        child: // élément contenu dans le container
          Center(
            child: Card(
              elevation: 5.0,
              color: Colors.teal,
              child: Container(
                width: MediaQuery.of(context).size.width / 2,
                height: 250.0,
                child: Image.asset("images/computer.jpg", // ++
                fit: BoxFit.cover),
              ),
            )
          )
      ),
    );
  }
}
```
#### TEXT
```java
class _Home extends State<Home> { 
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        // élément contenu dans le container ↓
        child: Center(
          child: Text(
            "Apprentissage de Flutter : si j'utilise plusieurs lignes, le text-align fait son effet",
            textAlign: TextAlign.end, // la deuxième ligne est collée à gauche
            textAlign: TextAlign.center,
            textScaleFactor: 2.0, // fontSize 2 * plus grande
            style: TextStyle(
              color: Colors.white,
              fontSize: 20.0,
              fontStyle: FontStyle.italic,
            ),
            maxLines: 2, // nombre de lignes maximum diffusées
          ),
        )
        // autre possibilité : un texte non centré :
        child: Text(
          "Aprentissage de Flutter", // le container s'adapte à la taille de son enfant
        ),
      ),
    );
  }

}
```
#### COLUMN
* widget qui affiche ses enfants en colonne
* éléments ordonnés en colonne, verticalement
* reprend les principes du flexbox column
* Problème d'espace : utiliser ListView à la place
```java
class _Home extends State<Home> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        body: Center(
          child: Column(
            crossAxisAlignment: // flexbox vertical
            mainAxisAlignment: MainAxisAlignment.center, // principe du flexbox
            // .end = tout à la fin, .start = tout au début
            // .spaceEvenly = éléments espacés harmonieusement
            // .spaceBetween = éléments au début, au centre, à la fin
            // .spaceAround = spaceEvenly (distribués harmonieusement)
            children: <Widget>[
              Text(
                "Apprentissage du widget Column",
                textAlign: TextAlign.center,
                style: TextStyle(
                  color: Colors.deepOrange[100], // cf palette de couleurs Flutter
                  fontSize: 30.0,
                  fontStyle: FontStyle.italic,
                ),
              ),
              // ↓ sorte de margin
              SizedBox(
                height: 20.0,
              )
              Card(
                elevation: 10.0,
                child: Container(
                  width: 250.0,
                  height: 250.0,
                  child: Image.asset(
                      "images/computer.jpg",
                      fit: BoxFit.cover,
                  ),
                ),
              ),
              Container(
                color: Colors.red[800],
                height: 100.0, // la largeur prend tout l'écran
              )
            ],
          ),
        ));
  }
}
```
#### ROW
* widget qui affiche ses enfants en rangée
* éléments ordonnés en rangée, horizontalement
* reprend les principes du flexbox row
* Problème d'espace : utiliser ListView à la place
```java
class _Home extends State<Home> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      // ....
        body: Center(
          child: Column(
            // ...
              Container(
                color: Colors.red[800],
                height: 100.0, // la largeur prend tout l'écran
                margin: EdgeInsets.only(left: 20.0, right: 20.0),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                  children: <Widget>[
                    Container(
                      height: 65.0,
                      width: 65.0,
                      color: Colors.amber
                    ),
                    Container(
                        height: 65.0,
                        width: 65.0,
                        color: Colors.blue
                    ),
                    Container(
                        height: 65.0,
                        width: 65.0,
                        color: Colors.lightGreenAccent
                    ),
                    Container(
                        height: 65.0,
                        width: 65.0,
                        color: Colors.deepPurple
                    ),
                  ],
                ),
              ),
            ],
          ),
        ));
  }
}

// problème : si l'on rajoute des container dans la row, cela déborde
// avec une erreur à l'écran
// solution : les pourcentages
// 1) on récupère la largeur de l'écran (haut du code)

class _Home extends State<Home> {
  @override
  Widget build(BuildContext context) {

    var appWidth = MediaQuery.of(context).size.width; // ++ récupère la largeur de l'app
    
    return Scaffold(
      // ...
        body: Center(
          child: Column(
            // ...
              Container(
                color: Colors.red[800],
                height: appWidth / 5, // ++ hauteur malléable
                margin: EdgeInsets.only(left: 20.0, right: 20.0),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                  children: <Widget>[
                    Container(
                      height: appWidth / 8,
                      width: appWidth / 8, // divisé par 8
                        // car 6 containers
                        // mais il faut aussi compter les margins
                        // plus d'erreur, les 6 rentrent sur une ligne
                      color: Colors.amber
                    ),
                    Container(
                        height: appWidth / 8,
                        width: appWidth / 8,
                        color: Colors.blue
                    ),
                    Container(
                        height: appWidth / 8,
                        width: appWidth / 8,
                        color: Colors.lightGreenAccent
                    ),
                    Container(
                        height: appWidth / 8,
                        width: appWidth / 8,
                        color: Colors.deepPurple
                    ),
                    Container(
                        height: appWidth / 8,
                        width: appWidth / 8,
                        color: Colors.lightGreenAccent
                    ),
                    Container(
                        height: appWidth / 8,
                        width: appWidth / 8,
                        color: Colors.deepPurple
                    ),
                  ],
                ),
              ),
            ],
          ),
        ));
  }
}
```
#### ICON
```java
class _Home extends State<Home> {@override
  Widget build(BuildContext context) {
    var appWidth = MediaQuery.of(context).size.width; // récupère la largeur de l'app
    return Scaffold(
        body: Center(
          // ...
              Container(
                color: Colors.red[800],
                height: appWidth / 5, // ++ hauteur malléable
                margin: EdgeInsets.only(left: 20.0, right: 20.0),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                  children: <Widget>[
                    Icon(
                      Icons.airport_shuttle,
                      color: Colors.white,
                      size: appWidth / 10,
                      semanticLabel: "Un camion roulant vers la droite",
                    ),
                    Icon(
                      Icons.timeline,
                      color: Colors.white,
                      size: appWidth / 10,
                      semanticLabel: "Une ligne marquée de jalons",
                    ),
                    Icon(
                      Icons.thumb_up,
                      color: Colors.white,
                      size: appWidth / 10,
                      semanticLabel: "Un pouce levé vers le haut",
                    ),
                    Icon(
                      Icons.flag,
                      color: Colors.white,
                      size: appWidth / 10,
                      semanticLabel: "Un drapeau flottant",
                    ),
                  ],
                ),
              ),
            ],
          ),
        ));
  }
}
```
#### ICON BUTTON
* Icone cliquable
```java
class _Home extends State<Home> {
  // convention pour indiquer qu'il s'agit du state de Home
  // hérite du state de Home (generic type = le <Home> est un paramètre de la classe générique State)
  
  bool changedToWhite = false; // ++
  
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        body: Center(
          child: Column(
            children: <Widget>[
              IconButton(
                  icon: Icon( // ++
                    Icons.calendar_today,
                    color: Colors.amberAccent,
                    size: 50.0,
                  ),
                  onPressed: () {
                    print("J'ai appuyé sur le bouton !");
                    // on avertit tous les widgets
                    // du changement interne de l'application
                    setState(() {
                      changedToWhite = !changedToWhite; // alterne les couleurs
                    });
                  }
              ),
              // ...
                  ],
                ),
              ),
            ],
          ),
        ));
  }
```
#### FLOATING ACTION BUTTON
* Bouton circulaire qui flotte au-dessus du body
```java
class _Home extends State<Home> {

  bool changedToWhite = false; // ++

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      // ...
      floatingActionButton: FloatingActionButton(
        onPressed: pressButton, // ajout de la méthode
        elevation: 8.0,
        tooltip: "Change text color of main text",
        child: Icon(
            Icons.autorenew
        ),
      ),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerFloat,
    );
  }

  void pressButton() {
    print("J'ai appuyé sur le bouton !");
    setState(() {
      changedToWhite = !changedToWhite;
    });
  }
}
```
#### FLAT BUTTON
* Bouton plat, sans relief
```java
class _Home extends State<Home> {
  bool changedToWhite = false; // ++
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: <Widget>[
            FlatButton( // ++
              onPressed: pressButton,
              child: Text("Appuyez-moi !"),
              color: Colors.cyanAccent,
            )
                ],
              ),
            ),
          ],
        ),
    );
  }

  void pressButton() {
    print("J'ai appuyé sur le bouton !");
    setState(() {
      changedToWhite = !changedToWhite;
    });
  }

}
```
#### RAISED BUTTON
* Bouton avec effet de profondeur
```java
class _Home extends State<Home> {
  bool changedToWhite = false; // ++
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: <Widget>[
            FlatButton(
              onPressed: pressButton,
              child: Text("Appuyez-moi !"),
              color: Colors.cyanAccent,
            ),
            RaisedButton( // ++
              onPressed: pressButton,
              child: Text("Je suis un RaisedButton !"),
              elevation: 10.5, // différence avec le Flat Button
              color: Colors.lightGreen,
              textColor: Colors.teal[900],
            ),
            Tooltip( // affiche un message quand le widget est appuyé longtemps
              message: "Bouton pour changer la couleur du texte principal",
              child: RaisedButton(
                onPressed: pressButton,
                child: Text("Je suis un RaisedButton !"),
                elevation: 10.5, // différence avec le Flat Button
                color: Colors.lightGreen,
                textColor: Colors.teal[900],
              ),
            ),
          ],
        ),
      ),
    ),
  }

  void pressButton() {
    print("J'ai appuyé sur le bouton !");
    setState(() {
      changedToWhite = !changedToWhite;
    });
  }

}
```
### POP-UP ET NAVIGATOR

#### AJOUT D UN BODY EXTERNE
* body.dart (autre façon d'ajouter un body)
```java
import 'package:flutter/material.dart';

class Body extends StatefulWidget {
  @override
  _BodyState createState() => _BodyState();
}

// état de notre classe, qui contient tous les champs
class _BodyState extends State<Body> {
  @override
  Widget build(BuildContext context) {
    return Center(
      child: RaisedButton(
        onPressed: pressButton,
        child: Text(
          "Je suis un bouton",
          style: TextStyle(
            color: Colors.white,
            fontSize: 20.0,
          ),
        ),
        color: Colors.red,
        elevation: 10.0,
      ),
    );
  }

  void pressButton() {
    print("Bouton appuyé !");
  }
}
```
* main.dart
```java
import 'package:flutter/material.dart';
import 'body.dart'; // on importe notre classe Body

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: MyHomePage(title: 'Flutter Demo Home Page'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key key, this.title}) : super(key: key);

  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Body(), // on ajoute notre classe body
    );
  }
}
```
#### SNACKBAR
* Barre informative et éphémère qui remonte du footer puis disparaît
```java
import 'package:flutter/material.dart';

class Body extends StatefulWidget {
  @override
  _BodyState createState() => _BodyState();
}

// état de notre classe, qui contient tous les champs
class _BodyState extends State<Body> {
  @override
  Widget build(BuildContext context) {
    return Center(
      child: RaisedButton(
        onPressed: callSnack, // ++ on appelle la snackbar
        child: Text(
          "Je suis un bouton",
          style: TextStyle(
            color: Colors.white,
            fontSize: 20.0,
          ),
        ),
        color: Colors.red,
        elevation: 10.0,
      ),
    );
  }

  // il faut créer un widget hors du Scaffold
  // pour récupérer son contexte
  void callSnack() {
    SnackBar snackbar = SnackBar(
      // ↓ The primary content of the snack bar
        content: Text(
          "Je suis une SnackBar !",
          textScaleFactor: 2.5,
          textAlign: TextAlign.center,
        ),
      duration: Duration(seconds: 5),
    );
    // doc : To display a snack bar, call Scaffold.of(context).showSnackBar(),
    // passing an instance of SnackBar that describes the message
    Scaffold.of(context).showSnackBar(snackbar);
  }
}
```
#### ALERTDIALOG
* Modale d'alerte
* Renvoie une Future (promesse) => programmation asynchrone
```java
import 'package:flutter/material.dart';

class Body extends StatefulWidget {
  @override
  _BodyState createState() => _BodyState();
}

// état de notre classe, qui contient tous les champs
class _BodyState extends State<Body> {
  @override
  Widget build(BuildContext context) {
    return Center(
      child: RaisedButton(
        onPressed: callAlert, // ++ on appelle l'alerte
        child: Text(
          "Je suis un bouton",
          style: TextStyle(
            color: Colors.white,
            fontSize: 20.0,
          ),
        ),
        color: Colors.red,
        elevation: 10.0,
      ),
    );
  }

  // méthode asynchrone
  // ici marche sans l'import de async
  Future<Null> callAlert() async {
    // contexte (emplacement) de notre widget
    return showDialog(
      context: context,
      barrierDismissible: false, // obligation d'appuyer sur un bouton
      // ↑ si true, un appui n'importe où ferme la fenêtre
      builder: (BuildContext context) {
        return AlertDialog(
          title: Text(
            "Ceci est une alerte !",
            textScaleFactor: 1.5,
          ),
          content: Text("Nous avons un problème avec l'application."
              "Souhaitez-vous continuer ?"), // """ pour les string sur plusieurs lignes """
          contentPadding: EdgeInsets.all(5.0),
          actions: <Widget>[
            FlatButton(
              onPressed: () {
                print("Refusé !");
                // ↓ on referme et on revient en arrière
                Navigator.pop(context);
              },
              child: Text(
                "Annuler",
                style: TextStyle(
                  color: Colors.red,
                ),
              )
            ),
            FlatButton(
                onPressed: () {
                  print("Accepté !");
                  // ↓ on referme et on revient en arrière
                  Navigator.pop(context);
                },
                  child: Text(
                  "Continuer",
                  style: TextStyle(
                    color: Colors.green,
                  ),
                ),
            )
          ],
        );
      }
    );
  }
}
```
#### SIMPLEDIALOG
* Un modal qui renseigne sur plusieurs choix
* Renvoie une Future (promesse) => programmation asynchrone
```java
import 'package:flutter/material.dart';

class Body extends StatefulWidget {
  @override
  _BodyState createState() => _BodyState();
}

// état de notre classe, qui contient tous les champs
class _BodyState extends State<Body> {
  @override
  Widget build(BuildContext context) {
    return Center(
      child: RaisedButton(
        // ↓ pour éviter l'erreur de type 'Future<Null>' can't be assigned to the parameter type 'void Function()'
        // on le transforme en fonction fléchée
        onPressed: () => callSimple("Ceci est le titre", "Ceci est la description"), // ++
        child: Text(
          "Je suis un bouton",
          style: TextStyle(
            color: Colors.white,
            fontSize: 20.0,
          ),
        ),
        color: Colors.red,
        elevation: 10.0,
      ),
    );
  }

  Future<Null> callSimple(String title, String description) async {
    return showDialog(
      context: context,
      barrierDismissible: true, // true par défaut
      builder: (BuildContext context) {
        return SimpleDialog(
          title: Text(title, textScaleFactor: 1.4,),
          children: <Widget>[
            Text(description),
            // ↓ pour créer un espace
            Container(height: 20.0),
            RaisedButton(
              color: Colors.teal,
              textColor: Colors.white,
              child: Text("OK"),
              onPressed: () {
                print("Appuyé !");
                Navigator.pop(context);
              }
            )
          ],
        );
      }
    );
  }

// un Simple Dialog avec des options :
Future<void> _askedToLead() async {
  switch (await showDialog<Department>(
    context: context,
    builder: (BuildContext context) {
      return SimpleDialog(
        title: const Text('Select assignment'),
        children: <Widget>[
          SimpleDialogOption(
            onPressed: () { Navigator.pop(context, Department.treasury); },
            child: const Text('Treasury department'),
          ),
          SimpleDialogOption(
            onPressed: () { Navigator.pop(context, Department.state); },
            child: const Text('State department'),
          ),
        ],
      );
    }
  )) {
    case Department.treasury:
      // Let's go.
      // ...
    break;
    case Department.state:
      // ...
    break;
  }
}
```
#### NAVIGUER VERS UN SECOND SCAFFOLD
* https://api.flutter.dev/flutter/widgets/Navigator-class.html
* https://api.flutter.dev/flutter/widgets/Navigator/pop.html
* nouvelle_page.dart
```java
import 'package:flutter/material.dart';

class NouvellePage extends StatelessWidget {
  String title;

  NouvellePage(this.title);

  @override
  Widget build(BuildContext context) {
    // pas besoin de StatefulWidget si les éléments sont statiques
    return Scaffold(
      appBar: AppBar(
        title: Text(title), // title dynamique
      ),
      body: Center(
        child: Text(
          "Je suis une nouvelle page !",
          textScaleFactor: 2.0,
          textAlign: TextAlign.center,
          style: TextStyle(
            color: Colors.teal,
            fontStyle: FontStyle.italic,
          )
        ),
      ),
    );
  }
}
```
* body.dart
```java
import 'package:flutter/material.dart';
import 'nouvelle_page.dart'; // ++

class Body extends StatefulWidget {
  @override
  _BodyState createState() => _BodyState();
}

// état de notre classe, qui contient tous les champs
class _BodyState extends State<Body> {
  @override
  Widget build(BuildContext context) {
    return Center(
      child: RaisedButton(
        onPressed: toNouvellePage, // ++
        child: Text(
          "Je suis un bouton",
          style: TextStyle(
            color: Colors.white,
            fontSize: 20.0,
          ),
        ),
        color: Colors.red,
        elevation: 10.0,
      ),
    );
  }
  
  void toNouvellePage() {
    Navigator.push(context, MaterialPageRoute(
        builder: (BuildContext context) {
          return NouvellePage("Je suis la nouvelle page !");
        }
    ));
  }
```
### WIDGETS INTERACTIFS

#### TEXTFIELD
```java
class _MyHomePageState extends State<MyHomePage> {

  String changed;
  String submitted;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            TextField(
              // ↓ apparence du clavier
              // .number pour juste des nombres
              keyboardType: TextInputType.text,
              onChanged: (String value) {
                setState(() {
                  // ↓ changement à la volée
                  changed = value;
                });
              },
              onSubmitted: (String value) {
                setState(() {
                  // ↓ changement à la soumission du formulaire
                  submitted = value;
                });
              },
              decoration: InputDecoration(
                labelText: "Entrez votre nom",
              ),
            ),
            Text(changed ?? ""),
            Text(submitted ?? ""),
          ],
        )
      ),
    );
  }
}

// (!) number avec IOS
class _MyHomePageState extends State<MyHomePage> {

  String changed;
  String submitted;

  @override
  Widget build(BuildContext context) {
    // ↓ palier l'abscence de submit pour les numbers chez IOS
    // rentre le clavier quand l'utilisateur touche l'écran
    // (sinon il ne peut pas quitter le clavier)
    return GestureDetector( // A widget that detects gestures
      onTap: () {
        Focus.of(context).requestFocus(FocusNode());
      },
      child: Scaffold(
        appBar: AppBar(
          title: Text(widget.title),
        ),
        body: Center(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: <Widget>[
                TextField(
                  // ↓ apparence du clavier
                  // .number pour juste des nombres
                  keyboardType: TextInputType.number,
                  onChanged: (String value) {
                    setState(() {
                      // ↓ changement à la volée
                      changed = value;
                    });
                  },
                  onSubmitted: (String value) {
                    setState(() {
                      // ↓ changement à la soumission du formulaire
                      submitted = value;
                    });
                  },
                  decoration: InputDecoration(
                    labelText: "Entrez votre nom",
                  ),
                ),
                Text(changed ?? ""),
                Text(submitted ?? ""),
              ],
            )
        ),
      ),
    );
  }
}
```
#### CHECKBOX
```java
class _MyHomePageState extends State<MyHomePage> {

  Map check = {
    'Carottes': false,
    'Bananes': false,
    'Yaourt': false,
    'Pain': false,
  };

  // méthode qui crée nos widgets <row>checkbox</row>
  List<Widget> checkList() {
    // ajouter = [] pour palier l'erreur de type
    // The method 'add' was called on null
    List<Widget> myList = [];
    check.forEach((key, value) {
      Row row = Row(
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          Text(key,
          style: TextStyle(
            // change l'apparence du texte à la volée
            color: value ? Colors.blue : Colors.red,
          )),
          Checkbox(
              value: value,
              onChanged: (bool answer) {
                setState(() {
                  check[key] = answer;
                });
              }
          )
        ],
      );
      myList.add(row);
    });
    return myList;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: checkList(),
        )
      ),
    );
  }
}
```
#### RADIO
* https://api.flutter.dev/flutter/material/Radio-class.html
* Exemple : ListTile = https://api.flutter.dev/flutter/material/ListTile-class.html
* ListTile permet de faire des row homogènes avec 3 éléments
```java
class _MyHomePageState extends State<MyHomePage> {

  int itemSelected;

  List<Widget> radios() {
    List<Widget> myList = [];
    for (int i = 0; i < 4; i++) {
      Row row = Row(
        children: <Widget>[
          Text("Choix numéro ${i + 1}"),
          Radio(
            value: i,
            groupValue: itemSelected, // valeur choisie
            onChanged: (int answer) {
              setState(() {
                itemSelected = answer;
              });
          })
        ],
      );
      myList.add(row);
    }
    return myList;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: radios(), // ++
        )
      ),
    );
  }
}

// ↓ avec ListTile
enum SingingCharacter { lafayette, jefferson }

// ...
// ↓ les ListTile possède le même groupValue
SingingCharacter _character = SingingCharacter.lafayette;

Widget build(BuildContext context) {
  return Column(
    children: <Widget>[
      ListTile( // première row avec checkbox
        title: const Text('Lafayette'),
        leading: Radio(
          value: SingingCharacter.lafayette,
          groupValue: _character,
          onChanged: (SingingCharacter value) {
            setState(() { _character = value; });
          },
        ),
      ),
      ListTile( // deuxième row avec checkbox
        title: const Text('Thomas Jefferson'),
        leading: Radio(
          value: SingingCharacter.jefferson,
          groupValue: _character,
          onChanged: (SingingCharacter value) {
            setState(() { _character = value; });
          },
        ),
      ),
    ],
  );
}
```
#### SWITCH
* Choix True/False
* Equivalent de Toggle Switch de Bootstrap
```java
class _MyHomePageState extends State<MyHomePage> {

  bool interrupteur = false;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Text("Aimez-vous le gras ?",
              style: TextStyle(
                // ↓ change le texte selon la réponse du switch
                color: interrupteur ? Colors.green : Colors.red,
              )
            ),
            Switch(
              value: interrupteur,
              // ↓ interrupteur = false
              inactiveTrackColor: Colors.red,
              // ↓ interrupteur = true
              activeColor: Colors.green,
              onChanged: (bool answer) {
                setState(() {
                  interrupteur = answer;
                });
              }
            )
          ],
        )
      ),
    );
  }
}
```
#### SLIDER
* Principe = curseur coulissant sur une ligne
* But = sélectionner une rangée de valeurs
```java
class _MyHomePageState extends State<MyHomePage> {

  double numSlider = 0.0;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Text("Valeur du slider : $numSlider",
              style: TextStyle(
                color: interrupteur ? Colors.green : Colors.red,
              )
            ),
            Slider(
              value: numSlider,
              min: 0.0,
              max: 10.0,
              // ↓ partie devant le curseur (inexplorée)
              inactiveColor: Colors.black,
              // ↓ partie derrière le curseur (explorée)
              activeColor: Colors.pinkAccent,
              // ↓ points d'arrêts
              divisions: 5,
              onChanged: (double mouse) {
                setState(() {
                  numSlider = mouse;
                });
              }
            )
          ],
        )
      ),
    );
  }
}
```
#### DATE TIME PICKERS
```java
import 'package:flutter/material.dart';
import 'package:flutter_localizations/flutter_localizations.dart'; // supporter les locales

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      localizationsDelegates: [ // ++
        GlobalMaterialLocalizations.delegate,
        GlobalWidgetsLocalizations.delegate,
      ],
      supportedLocales: [ // ++
        const Locale('en', 'US'),
        const Locale('ru', 'RU'),
        const Locale('fr', 'FR'),
      ],
      theme: ThemeData(
        primarySwatch: Colors.blue,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: MyHomePage(title: 'Flutter Demo Home Page'),
    );
  }
}

class _MyHomePageState extends State<MyHomePage> {

  DateTime myDate; // ++
  TimeOfDay myTime; // ++

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            FlatButton(
              onPressed: () {
                showCalendar();
              },
              child: Text((myDate == null) ? 'Choisir une date' : myDate.toString())
            ),
            FlatButton(
              onPressed: () {
                showHour();
              },
              child: Text((myTime == null) ? 'Choisir une heure' : myTime.toString())
            ),
          ],
        )
      ),
    );
  }

  Future<void> showCalendar() async {
    // ↓ affichage d'un calendrier
    DateTime choice = await showDatePicker(
        context: context,
        // ↓ choix de l'année PUIS choix du mois/jour
        initialDatePickerMode: DatePickerMode.year,
        initialDate: DateTime.now(), // date à l'ouverture du calendrier
        firstDate: DateTime(2018), // début du calendrier
        lastDate: DateTime(2022), // fin du calendrier
        locale: const Locale('fr', 'FR'), // nomination fr
    );

    if (choice != null) {
      setState(() {
        myDate = choice;
      });
    }
  }

  Future<void> showHour() async {
    // ↓ affichage d'une horloge
    TimeOfDay hour = await showTimePicker(
      context: context,
      initialTime: TimeOfDay.now()
    );

    if (hour != null) {
      setState(() {
        myTime = hour;
      });
    }
  }
}
```
* pubspec.yaml :
```yaml
dependencies:
  flutter:
    sdk: flutter
  flutter_localizations: # ++
    sdk: flutter
```
### WIDGETS SCROLLABLES

#### SINGLECHILDSCROLLVIEW
* Permet de rendre son contenu scrollable
* Design trop grand pour l'écran, mais pas une liste
* https://api.flutter.dev/flutter/widgets/SingleChildScrollView-class.html
```java
class _MyHomePageState extends State<MyHomePage> {

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      // ↓ avant Center() mais message d'erreur si trop d'éléments
      body: SingleChildScrollView(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Container(height: 100.0, color: Colors.red,),
            Container(height: 100.0, color: Colors.blue,),
            Container(height: 100.0, color: Colors.yellow,),
            Container(height: 100.0, color: Colors.green,),
            Container(height: 100.0, color: Colors.red,),
            Container(height: 100.0, color: Colors.blue,),
            Container(height: 100.0, color: Colors.yellow,),
            Container(height: 100.0, color: Colors.green,),
          ],
        ),
      ),// This trailing comma makes auto-formatting nicer for build methods.
    );
  }
}
```
#### LISTVIEW ET LISTTILE
* Création d'une liste scrollable
```java
class _MyHomePageState extends State<MyHomePage> {

  List<Activite> activites = [
    Activite("Vélo", Icons.directions_bike),
    Activite("Peinture", Icons.palette),
    Activite("Golf", Icons.golf_course),
    Activite("Arcade", Icons.gamepad),
    Activite("Bricolage", Icons.build),
    // en ajouter pour pouvoir scroller
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: ListView.builder(
          itemCount: activites.length, // nombre d'éléments dans la liste
          // ↓ créateur de la liste (boucle)
          itemBuilder: (context, index) {
            return ListTile(
              leading: Icon(Icons.add, color: Colors.blue), // gauche de la liste
              title: Text('Activité ${activites[index].nom}'), // centre de la liste
              trailing: Icon(activites[index].icone), // droite de la liste
            );
          }
        ),
      ),// This trailing comma makes auto-formatting nicer for build methods.
    );
  }
}

class Activite {
  String nom;
  IconData icone;

  Activite(this.nom, this.icone);
}
```
#### DISMISSIBLE
* Supprimer une tile en la coulissant (swipe)
```java
class _MyHomePageState extends State<MyHomePage> {

  List<Activite> activites = [
    Activite("Vélo", Icons.directions_bike),
    Activite("Peinture", Icons.palette),
    Activite("Golf", Icons.golf_course),
    Activite("Arcade", Icons.gamepad),
    Activite("Bricolage", Icons.build),
    // en ajouter pour pouvoir scroller
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: ListView.builder(
          itemCount: activites.length, // nombre d'éléments dans la liste
          // ↓ créateur de la liste (boucle)
          itemBuilder: (context, index) {
            Activite activite = activites[index];
            String key = activite.nom;
            return Dismissible(
              key: Key(key),
              child: ListTile(
                leading: Icon(Icons.add, color: Colors.blue), // gauche de la liste
                title: Text('Activité ${activite.nom}'), // centre de la liste
                trailing: Icon(activite.icone), // droite de la liste
              ),
              background: Container(
                color: Colors.red, // couleur quand on fait coulisser l'élément
                padding: EdgeInsets.only(right: 20.0),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.end,
                  children: <Widget>[
                    Text("Supprimer", style: TextStyle(color: Colors.white)),
                    Icon(Icons.delete, color: Colors.white,)
                  ],
                ),
              ),
              // action à faire lors du swipe
              onDismissed: (direction) {
                setState(() {
                  print(activite.nom);
                  activites.removeAt(index); // suppression de la liste
                });
              },
            );
          }
        ),
      ),// This trailing comma makes auto-formatting nicer for build methods.
    );
  }
}
```
#### CUSTOMTILE
* Créer une tile personnalisée
```java
class _MyHomePageState extends State<MyHomePage> {

  List<Activite> activites = [
    Activite("Vélo", Icons.directions_bike),
    Activite("Peinture", Icons.palette),
    Activite("Golf", Icons.golf_course),
    Activite("Arcade", Icons.gamepad),
    Activite("Bricolage", Icons.build),
    // en ajouter pour pouvoir scroller
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: ListView.builder(
          itemCount: activites.length, // nombre d'éléments dans la liste
          // ↓ créateur de la liste (boucle)
          itemBuilder: (context, index) {
            Activite activite = activites[index];
            String key = activite.nom;
            return Dismissible(
              key: Key(key),
              // ↓ Custom Tile
              child: Container(
                padding: EdgeInsets.all(5.0),
                height: 125.0,
                child: Card(
                  elevation: 7.5,
                  child: Container(
                    child: Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: <Widget>[
                        // sur la gauche : grosse icone de l'activite
                        Icon(activite.icone, color: Colors.blue, size: 75.0,),
                        // sur la droite :
                        // <h3>Activite<h3>
                        // <h2>nom de l'activite<h2>
                        Column(
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: <Widget>[
                            Text("Activité",
                              style: TextStyle(
                                  color: Colors.blue,
                                  fontSize: 20.0,
                                  fontWeight: FontWeight.bold
                              ),
                            ),
                            Text(activite.nom,
                            style : TextStyle(
                              color: Colors.blue[800],
                              fontSize: 30.0,
                            )),
                          ],
                        )
                      ],
                    ),
                  ),
                ),
              ),
              background: Container(
                color: Colors.red, // couleur quand on fait coulisser l'élément
                padding: EdgeInsets.only(right: 20.0),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.end,
                  children: <Widget>[
                    Text("Supprimer", style: TextStyle(color: Colors.white)),
                    Icon(Icons.delete, color: Colors.white,)
                  ],
                ),
              ),
              onDismissed: (direction) {
                setState(() {
                  print(activite.nom);
                  activites.removeAt(index);
                });
              },
            );
          }
        ),
      ),
    );
  }
}
```
#### INKWELL
* Un container qui répond au toucher
* https://api.flutter.dev/flutter/material/InkWell-class.html
```java
class _MyHomePageState extends State<MyHomePage> {

  List<Activite> activites = [
    Activite("Vélo", Icons.directions_bike),
    Activite("Peinture", Icons.palette),
    Activite("Golf", Icons.golf_course),
    Activite("Arcade", Icons.gamepad),
    Activite("Bricolage", Icons.build),
    // en ajouter pour pouvoir scroller
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: ListView.builder(
          itemCount: activites.length, // nombre d'éléments dans la liste
          // ↓ créateur de la liste (boucle)
          itemBuilder: (context, index) {
            Activite activite = activites[index];
            String key = activite.nom;
            return Dismissible(
              key: Key(key),
              // ↓ Custom Tile
              child: Container(
                padding: EdgeInsets.all(5.0),
                height: 125.0,
                child: Card(
                  elevation: 7.5,
                  // ↓ le Card devient cliquable
                  child: InkWell(
                    onTap: () => print("${activite.nom} tapped"),
                    onLongPress: () => print("${activite.nom} pressed"),
                    child: Container(
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                        children: <Widget>[
                          Icon(activite.icone, color: Colors.blue, size: 75.0,),
                          Column(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: <Widget>[
                              Text("Activité",
                                style: TextStyle(
                                    color: Colors.blue,
                                    fontSize: 20.0,
                                    fontWeight: FontWeight.bold
                                ),
                              ),
                              Text(activite.nom,
                                  style : TextStyle(
                                    color: Colors.blue[800],
                                    fontSize: 30.0,
                                  )),
                            ],
                          )
                        ],
                      ),
                    ),
                  ),
                ),
              ),
              background: Container(
                color: Colors.red, // couleur quand on fait coulisser l'élément
                padding: EdgeInsets.only(right: 20.0),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.end,
                  children: <Widget>[
                    Text("Supprimer", style: TextStyle(color: Colors.white)),
                    Icon(Icons.delete, color: Colors.white,)
                  ],
                ),
              ),
              onDismissed: (direction) {
                setState(() {
                  print(activite.nom);
                  activites.removeAt(index);
                });
              },
            );
          }
        ),
      ),
    );
  }
}
```
#### VERIFIER ORIENTATION DEVICE
```java
class _MyHomePageState extends State<MyHomePage> {

  @override
  Widget build(BuildContext context) {
    // ↓ orientation de l'appareil
    Orientation orientation = MediaQuery.of(context).orientation;
    print(orientation); // Orientation.portrait
    // autre choix = Orientation.landscape
```
#### CHOISIR ORIENTATION DEVICE
```java
import 'package:flutter/material.dart';
import 'package:flutter/services.dart'; // ++

void main() {
  SystemChrome.setPreferredOrientations([
    DeviceOrientation.portraitUp, // force le mode portrait
    // DeviceOrientation.landscapeLeft,
    // DeviceOrientation.landscapeRight,
    // DeviceOrientation.portraitDown
  ]);
  runApp(MyApp());
}
```
#### GRIDVIEW
* Création d'une grille de contenu qui s'adapte à l'orientation de l'appareil
```java
class _MyHomePageState extends State<MyHomePage> {

  List<Activite> activites = [
    Activite("Vélo", Icons.directions_bike),
    Activite("Peinture", Icons.palette),
    Activite("Golf", Icons.golf_course),
    Activite("Arcade", Icons.gamepad),
    Activite("Bricolage", Icons.build),
    // en ajouter pour pouvoir scroller
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        // ↓ container de notre grille
        // s'adapate à l'orientation de l'appareil
        child: GridView.builder(
          // autre possiblité : SliverGridDelegateWithMaxCrossAxisExtent
          // 3 items par ligne
          gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(crossAxisCount: 3),
          itemCount: activites.length,
          // ↓ constructeur de notre grille
          itemBuilder: (context, index) {
            return Container(
              margin: EdgeInsets.all(2.5),
              child: Card(
                elevation: 10.0,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                  children: <Widget>[
                    Text("Activité", style: TextStyle(color: Colors.teal, fontSize: 15.0),),
                    Text(activites[index].nom, style: TextStyle(color: Colors.teal[600],
                        fontSize: 20.0, fontWeight: FontWeight.bold), ),
                    Icon(activites[index].icone, color: Colors.teal, size: 45.0,)
                  ],
                ),
              ),
            );
          }
        ),
      ),
    );
  }
```
#### LISTE OU GRILLE SELON ORIENTATION
```java
class _MyHomePageState extends State<MyHomePage> {

  List<Activite> activites = [
    Activite("Vélo", Icons.directions_bike),
    Activite("Peinture", Icons.palette),
    Activite("Golf", Icons.golf_course),
    Activite("Arcade", Icons.gamepad),
    Activite("Bricolage", Icons.build),
    // en ajouter pour pouvoir scroller
  ];

  @override
  Widget build(BuildContext context) {
    // ↓ orientation de l'appareil
    Orientation orientation = MediaQuery.of(context).orientation;
    print(orientation); // Orientation.portrait
    // autre choix = Orientation.landscape

    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        // ↓ un ternaire selon l'orientation
        child: (orientation == Orientation.portrait) ? liste() : grille(),
      ),
    );
  }

  Widget grille() {
    return GridView.builder(
      // autre possiblité : SliverGridDelegateWithMaxCrossAxisExtent
      // 3 items par ligne
        gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(crossAxisCount: 4),
        itemCount: activites.length,
        // ↓ constructeur de notre grille
        itemBuilder: (context, index) {
          return Container(
            margin: EdgeInsets.all(2.5),
            child: Card(
              elevation: 10.0,
              // ↓ ajout du InkWell
              child: InkWell(
                onTap: () => print("Grid tapped !"),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                  children: <Widget>[
                    Text("Activité", style: TextStyle(color: Colors.teal, fontSize: 15.0),),
                    Text(activites[index].nom, style: TextStyle(color: Colors.teal[600],
                        fontSize: 20.0, fontWeight: FontWeight.bold), ),
                    Icon(activites[index].icone, color: Colors.teal, size: 45.0,)
                  ],
                ),
              ),
            ),
          );
        }
    );
  }

  Widget liste() {
    return ListView.builder(
        itemCount: activites.length, // nombre d'éléments dans la liste
        // ↓ créateur de la liste (boucle)
        itemBuilder: (context, index) {
          Activite activite = activites[index];
          String key = activite.nom;
          return Dismissible(
            key: Key(key),
            // ↓ Custom Tile
            child: Container(
              padding: EdgeInsets.all(5.0),
              height: 125.0,
              child: Card(
                elevation: 7.5,
                child: InkWell(
                  onTap: () => print("${activite.nom} tapped"),
                  onLongPress: () => print("${activite.nom} pressed"),
                  child: Container(
                    child: Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: <Widget>[
                        Icon(activite.icone, color: Colors.blue, size: 75.0,),
                        Column(
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: <Widget>[
                            Text("Activité",
                              style: TextStyle(
                                  color: Colors.blue,
                                  fontSize: 20.0,
                                  fontWeight: FontWeight.bold
                              ),
                            ),
                            Text(activite.nom,
                                style : TextStyle(
                                  color: Colors.blue[800],
                                  fontSize: 30.0,
                                )),
                          ],
                        )
                      ],
                    ),
                  ),
                ),
              ),
            ),
            background: Container(
              color: Colors.red, // couleur quand on fait coulisser l'élément
              padding: EdgeInsets.only(right: 20.0),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.end,
                children: <Widget>[
                  Text("Supprimer", style: TextStyle(color: Colors.white)),
                  Icon(Icons.delete, color: Colors.white,)
                ],
              ),
            ),
            onDismissed: (direction) {
              setState(() {
                print(activite.nom);
                activites.removeAt(index);
              });
            },
          );
        }
    );
  }
}
```


## PERSONNALISATION

### ICONE DE L'APPLI
* Aller sur appicon.co, sélectionner Iphone et Android
* https://www.udemy.com/course/flutter-bootcamp-with-dart/learn/lecture/14482060#bookmarks


## CODAMUSIC
* Objectif = créer une application de musique qui affiche les chansons à l'écoute
* Trouver le player de musique => "audioplayer Flutter sur Google" => https://pub.dev/packages/audioplayer => onglet Installing
* pubspec.yaml
```yaml
name: coda_music
description: A new Flutter application.

dependencies:
  flutter:
    sdk: flutter
  audioplayer: ^0.8.1 # ajout de notre plugin audioplayer
  # pub get pour l'intégrer au projet
  cupertino_icons: ^0.1.2

dev_dependencies:
  flutter_test:
    sdk: flutter

flutter:
  uses-material-design: true
  assets:
    - assets/ # pub get pour sauvegarder
  #  - assets/deux.jpg
  #  - assets/un.jpg
```
* main.dart
```java
import 'dart:async'; // permet de faire de l'asynchrone

import 'package:flutter/material.dart';
import 'musique.dart'; // classe Musique créée dans notre lib/
import 'package:audioplayer/audioplayer.dart';

void main() => runApp(new MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Coda Music',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: MyHomePage(title: 'Coda Music'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key key, this.title}) : super(key: key);

  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  List<Musique> maListeDeMusiques = [
    // création de mes musiques
    Musique('Theme Swift', 'Codabee', 'assets/un.jpg',
        'https://codabee.com/wp-content/uploads/2018/06/un.mp3'),
    Musique('Theme Flutter', 'Codabee', 'assets/deux.jpg',
        'https://codabee.com/wp-content/uploads/2018/06/deux.mp3'),
  ];

  AudioPlayer audioPlayer;
  StreamSubscription positionSub;
  StreamSubscription stateSubscription;
  Musique maMusiqueActuelle;
  Duration position = Duration(seconds: 0);
  Duration duree = Duration(seconds: 10);
  PlayerState statut = PlayerState.stopped;
  int index = 0;

  @override
  void initState() {
    // quand l'état de la page d'accueil s'initialise
    super.initState();
    maMusiqueActuelle = maListeDeMusiques[index];
    // on diffuse une musique de la liste (la première par défaut)
    configurationAudioPlayer();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        centerTitle: true,
        backgroundColor: Colors.grey[900],
        title: Text(widget.title), // variable title de notre widget
      ),
      backgroundColor: Colors.grey[800],
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: <Widget>[
            Card(
              elevation: 9.0,
              child: Container(
                width: MediaQuery.of(context).size.height / 2.5,
                child: Image.asset(maMusiqueActuelle.imagePath),
                // attention : le hot reload peut présenter des erreurs avec le initState()
                // solution : relancer l'appli
              ),
            ),
            // ajoute le texte (personnalisé) de l'appli, grâce à la méthode texteAvecStyle()
            texteAvecStyle(maMusiqueActuelle.titre, 1.5),
            texteAvecStyle(maMusiqueActuelle.artiste, 1.0),
            // ↓ rangée des boutons
            Row(
              mainAxisAlignment: MainAxisAlignment.center, // alignés au centre
              children: <Widget>[
                bouton(Icons.fast_rewind, 30.0, ActionMusic.rewind),
                // ↓ logique ternaire pour changer de bouton
                bouton((statut == PlayerState.playing) ? Icons.pause : Icons.play_arrow,
                    45.0,
                    (statut == PlayerState.playing) ? ActionMusic.pause : ActionMusic.play),
                bouton(Icons.fast_forward, 30.0, ActionMusic.forward)
              ],
            ),
            // ↓ rangée de la progression de la musique [00:00 - 00:22]
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: <Widget>[
                texteAvecStyle(fromDuration(position), 0.8),
                texteAvecStyle(fromDuration(duree), 0.8)
              ],
            ),
            // ↓ slider (progression de la musique sur une ligne)
            Slider(
                value: position.inSeconds.toDouble(),
                min: 0.0,
                max: 30.0,
                inactiveColor: Colors.white,
                activeColor: Colors.red,
                onChanged: (double d) {
                  setState(() {
                    audioPlayer.seek(d);
                  });
                })
          ],
        ),
      ),
    );
  }

  // fonction qui renvoie les boutons de l'appli
  // ActionMusic est un enum (choix = play, pause, ect.)
  IconButton bouton(IconData icone, double taille, ActionMusic action) {
    return IconButton(
      iconSize: taille,
      color: Colors.white,
      icon: Icon(icone),
      onPressed: () {
        switch (action) {
          case ActionMusic.play:
            play();
            break;
          case ActionMusic.pause:
            pause();
            break;
          case ActionMusic.forward:
            forward();
            break;
          case ActionMusic.rewind:
            rewind();
            break;
        }
      },
    );
  }

  // fonction pour ajouter le texte de l'application
  Text texteAvecStyle(String data, double scale) {
    return Text(
      data,
      textScaleFactor: scale,
      textAlign: TextAlign.center,
      style: TextStyle(
          color: Colors.white, fontSize: 20.0, fontStyle: FontStyle.italic),
    );
  }

  void configurationAudioPlayer() {
    audioPlayer = AudioPlayer();
    positionSub = audioPlayer.onAudioPositionChanged
        .listen((pos) => setState(() => position = pos));
    stateSubscription = audioPlayer.onPlayerStateChanged.listen((state) {
      if (state == AudioPlayerState.PLAYING) {
        setState(() {
          duree = audioPlayer.duration;
        });
      } else if (state == AudioPlayerState.STOPPED) {
        setState(() {
          statut = PlayerState.stopped;
        });
      }
    }, onError: (message) {
      print('erreur: $message');
      setState(() {
        statut = PlayerState.stopped;
        duree = Duration(seconds: 0);
        position = Duration(seconds: 0);
      });
    });
  }

  Future play() async {
    // attend la réponse de la promesse (Future)
    await audioPlayer.play(maMusiqueActuelle.urlSong);
    // quand la promesse est résolue on lance ↓
    setState(() {
      statut = PlayerState.playing;
    });
  }

  Future pause() async {
    await audioPlayer.pause();
    setState(() {
      statut = PlayerState.paused;
    });
  }

  void forward() {
    // si on est au dernier élément de la liste
    if (index == maListeDeMusiques.length - 1) {
      index = 0;
    } else {
      index++;
    }
    maMusiqueActuelle = maListeDeMusiques[index];
    audioPlayer.stop();
    configurationAudioPlayer();
    play();
  }

  String fromDuration(Duration duree) {
    print(duree);
    return duree.toString().split('.').first;
  }

  void rewind() {
    // si la musique est lancée depuis plus de 3 secondes
    if (position > Duration(seconds: 3)) {
      audioPlayer.seek(0.0);
    } else {
      if (index == 0) {
        index = maListeDeMusiques.length - 1;
      } else {
        index--;
      }
      maMusiqueActuelle = maListeDeMusiques[index];
      audioPlayer.stop();
      configurationAudioPlayer();
      play();
    }
  }
}

enum ActionMusic { play, pause, rewind, forward }

enum PlayerState { playing, stopped, paused }
```
* musique.dart
```java
// lib/musique.dart
class Musique {

  String titre;
  String artiste;
  String imagePath;
  String urlSong;

  Musique(this.titre, this.artiste, this.imagePath, this.urlSong);
  // constructeur simplifié
}
```


## CODA JEU DE QUIZZ
* Création d'une application de Quizz
* Structure :
```py
quizz/
  lib/
    # ↓ nos objets
    models/ # lib => package => models
      questions.dart
    widgets/ # tous les Stateful Widgets
      custom_text.dart
      home.dart
      my_app.dart
      page_quizz.dart
    main.dart
quizz assets/
```
* pubspec.yaml
```yaml
# ...
  # To add assets to your application, add an assets section, like this:
  assets:
    - quizz assets/
```
* main.dart
```java
import 'package:flutter/material.dart';
import 'package:quizz/widgets/my_app.dart';
// ↑ chercher des fichiers hors package

void main() => runApp(MyApp());
```
* widgets/my_app.dart
```java
import 'package:flutter/material.dart';
import 'package:quizz/widgets/home.dart';

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: MyHomePage(title: 'Quizz vrai ou faux'),
    );
  }
}
```
* widgets/home.dart
```java
import 'package:flutter/material.dart';
import 'package:quizz/widgets/custom_text.dart';
import 'page_quizz.dart';

class MyHomePage extends StatefulWidget {

  MyHomePage({Key key, this.title}) : super(key: key);

  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: <Widget>[
            Card(
              elevation: 10.0,
              child: Container(
                height: MediaQuery.of(context).size.width * 0.8,
                width: MediaQuery.of(context).size.width * 0.8,
                child: Image.asset("quizz assets/cover.jpg",
                  fit: BoxFit.cover,
                ),
              ),
            ),
            RaisedButton(
              color: Colors.blue,
                onPressed: () {
                  Navigator.push(context, MaterialPageRoute(builder: (BuildContext context) {
                    return PageQuizz();
                  }));
                },
              // ↓ notre widget texte personnalisé
              child: CustomText("Commencer le quizz", factor: 1.5),
            )
          ],
        ),
      ), // This trailing comma makes auto-formatting nicer for build methods.
    );
  }
}
```
* widgets/page_quizz.dart
```java
import 'dart:async';

import 'package:flutter/material.dart';
import 'custom_text.dart'; // pas de package: on est dans le même package
import 'package:quizz/models/question.dart';

class PageQuizz extends StatefulWidget {

  @override
  _PageQuizzState createState() => _PageQuizzState();
  
}

class _PageQuizzState extends State<PageQuizz> {

  Question question;

  List<Question> listeQuestions = [
    Question('La devise de la Belgique est l\'union fait la force', true, '', 'belgique.JPG'),
    Question('La lune va finir par tomber sur terre à cause de la gravité', false, 'Au contraire la lune s\'éloigne', 'lune.jpg'),
    Question('La Russie est plus grande en superficie que Pluton', true, '', 'russie.jpg'),
    Question('Nyctalope est une race naine d\'antilope', false, 'C’est une aptitude à voir dans le noir', 'nyctalope.jpg'),
    Question('Le Commodore 64 est l\’oridnateur de bureau le plus vendu', true, '', 'commodore.jpg'),
    Question('Le nom du drapeau des pirates es black skull', false, 'Il est appelé Jolly Roger', 'pirate.png'),
    Question('Haddock est le nom du chien Tintin', false, 'C\'est Milou', 'tintin.jpg'),
    Question('La barbe des pharaons était fausse', true, 'A l\'époque déjà ils utilisaient des postiches', 'pharaon.jpg'),
    Question('Au Québec tire toi une bûche veut dire viens viens t\'asseoir', true, 'La bûche, fameuse chaise de bucheron', 'buche.jpg'),
    Question('Le module lunaire Eagle de possédait de 4Ko de Ram', true, 'Dire que je me plains avec mes 8GO de ram sur mon mac', 'eagle.jpg'),
  ];

  int index = 0;
  int score = 0;

  // à l'initialisation du widget
  @override
  void initState() {
    super.initState();
    question = listeQuestions[index];
  }
  
  @override
  Widget build(BuildContext context) {
    double taille = MediaQuery.of(context).size.width * 0.75;
    return Scaffold(
      appBar: AppBar(
        title: CustomText('Le Quizz'),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: <Widget>[
            CustomText("Question numéro ${index + 1}", color: Colors.grey[900],),
            CustomText("Score: $score / $index", color: Colors.grey[900],),
            Card(
              elevation: 10.0,
              child: Container(
                height: taille,
                width: taille,
                child: Image.asset(
                    "quizz assets/${question.imagePath}",
                  fit: BoxFit.cover,
                ),
              ),
            ),
            CustomText(question.question, color: Colors.grey[900], factor: 1.3,),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: <Widget>[
                boutonBool(true),
                boutonBool(false)
              ],
            )
          ],
        ),

      ),
    );
  }
  
  RaisedButton boutonBool (bool b) {
    return RaisedButton(
      elevation: 10.0,
      onPressed: (() => dialogue(b)),
      color: Colors.blue,
      child: CustomText((b) ? "Vrai": "Faux", factor: 1.25,),
    );
  }
  
  Future<Null> dialogue(bool b) async {
    bool bonneReponse = (b == question.reponse);
    String vrai = "quizz assets/vrai.jpg";
    String faux = "quizz assets/faux.jpg";
    if (bonneReponse) {
      score++;
    }

    return showDialog(
        context: context,
      barrierDismissible: false,
      builder: (BuildContext context) {
          return SimpleDialog(
            title: CustomText((bonneReponse) ? "C'est gagné!" : "Oups! perdu...",
              factor: 1.4, color: (bonneReponse) ? Colors.green : Colors.red,),
            contentPadding: EdgeInsets.all(20.0),
            children: <Widget>[
              Image.asset((bonneReponse)? vrai: faux, fit: BoxFit.cover,),
              Container(height: 25.0,),
              CustomText(question.explication, factor: 1.25, color: Colors.grey[900],),
              Container(height: 25.0,),
              RaisedButton(onPressed: () {
                Navigator.pop(context);
                questionSuivante();
              },
              child: CustomText("Au suivant", factor: 1.25,),
              color: Colors.blue,
                ),
            ],
          );
      }
    );
  }

  Future<void> alerte() async {
    return showDialog<void>(context: context,
      barrierDismissible: false,
      // ↓ buildContext = contexte (identifiant) du pop-up
      builder: (BuildContext buildContext) {
        return AlertDialog(
          title: CustomText("C'est fini", color: Colors.blue, factor: 1.25,),
          contentPadding: EdgeInsets.all(10.0),
          content: CustomText("Votre score: $score / $index", color: Colors.grey[900],),
          actions: <Widget>[
            FlatButton(
                onPressed: (() {
                  // ↓ on ferme l'identifiant du pop-up
                  // on revient en arrière sur la page
                  Navigator.pop(buildContext);
                  // ↓ on ferme l'identifiant de la page
                  // on revient sur la page précédent
                  Navigator.pop(context);
                }),
                child: CustomText("OK", factor: 1.25, color: Colors.blue,))
          ],
        );
      }
    );
  }

  void questionSuivante() {
    if (index < listeQuestions.length - 1) {
      index++;
      setState(() {
        question = listeQuestions[index];
      });
    } else {
      alerte();
    }
  }
  
}
```
* widgets/custom_text.dart
```java
import 'package:flutter/material.dart';

// widget Text personnalisé
class CustomText extends Text {
                            // choix par défaut
  CustomText(String data, {color: Colors.white, textAlign: TextAlign.center, factor: 1.0}):
      super(data,
          textAlign: textAlign,
          textScaleFactor: factor,
          style: TextStyle(color: color)
      );
}
```
* models/question.dart
```java
class Question {
  String question;
  bool reponse;
  String explication;
  String imagePath;

  Question(this.question, this.reponse, this.explication, this.imagePath);
}
```

## CODA CALCUL CALORIES
* Calcule le besoin en calories selon le sexe, âge, ect.
* pubspec.yaml
```yaml
dependencies:
  flutter:
    sdk: flutter
  flutter_localizations: # ++
    sdk: flutter
```
* main.dart
```java
import 'package:flutter/material.dart';
import 'package:flutter_localizations/flutter_localizations.dart'; // supporter les locales

void main() => runApp(new MyApp());

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      localizationsDelegates: [ // ++
        GlobalMaterialLocalizations.delegate,
        GlobalWidgetsLocalizations.delegate,
      ],
      supportedLocales: [ // ++
        const Locale('en', 'US'),
        const Locale('ru', 'RU'),
        const Locale('fr', 'FR'),
      ],
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: MyHomePage(title: 'Flutter Demo Home Page'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key key, this.title}) : super(key: key);
  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {

  int calorieBase;
  int calorieAvecActivite;
  int radioSelectionnee;
  double poids;
  double age;
  bool genre = false;
  double taille = 170.0;
  Map mapActivite = {
    0: "Faible",
    1: "Modérée",
    2: "Forte"
  };

  @override
  Widget build(BuildContext context) {
    // ↓ pallier l'abscence de submit pour les numbers sur IOS
    return GestureDetector(
      onTap: (() => FocusScope.of(context).requestFocus(new FocusNode())),
      // ↓ le GestureDetector prend la taille du Scaffold
      child: Scaffold(
        appBar: AppBar(
          title: Text(widget.title),
          backgroundColor: setColor(),
        ),
        // ↓ avant : Center() mais erreur d'espace dès que l'on activait le clavier
        // ↓ élément déroulable qui s'adapte à la hauteur de l'écran
        // ↓ problème (résolu avec le widget Padding()), tout est fixé en haut
        body: SingleChildScrollView(
          padding: EdgeInsets.all(15.0),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.spaceEvenly,
            children: <Widget>[
              padding(),
              texteAvecStyle("Remplissez tous les champs pour obtenir votre besoin journalier en calories."),
              padding(),
              Card(
                elevation: 10.0,
                child: Column(
                  children: <Widget>[
                    padding(),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: <Widget>[
                        texteAvecStyle("Femme", color: Colors.pink),
                        Switch(
                            value: genre,
                            inactiveTrackColor: Colors.pink,
                            activeTrackColor: Colors.blue,
                            onChanged: (bool choice) {
                              setState(() {
                                genre = choice;
                              });
                            }),
                        texteAvecStyle("Homme", color: Colors.blue)
                      ],
                    ),
                    padding(),
                    RaisedButton(
                      color: setColor(),
                      child: texteAvecStyle((age == null) ? "Appuyez pour entrer votre age" :
                        "Votre age est de : ${age.toInt()}",
                        color: Colors.white
                      ),
                        onPressed: (() => montrerPicker())
                    ),
                    padding(),
                    texteAvecStyle("Votre taille est de: ${taille.toInt()} cm.", color: setColor()),
                    padding(),
                    Slider(
                        value: taille,
                        activeColor: setColor(),
                        onChanged: (double cursor) {
                          setState(() {
                            taille = cursor;
                          });
                        },
                      max: 215.0,
                      min: 100.0,
                    ),
                    padding(),
                    TextField(
                      keyboardType: TextInputType.number,
                      onChanged: (String string) {
                        setState(() {
                          poids = double.tryParse(string); // string => double
                        });
                      },
                      decoration: InputDecoration(
                        labelText: "Entrez votre poids en kilos."
                      ),
                    ),
                    padding(),
                    texteAvecStyle("Quelle est votre activité sportive?", color: setColor()),
                    padding(),
                    rowRadio(),
                    padding()
                  ],
                ),
              ),
              padding(),
              RaisedButton(
                color: setColor(),
                child: texteAvecStyle("Calculer", color: Colors.white),
                  onPressed: calculerNombreDeCalories,
              )
            ],
          ),
        ),
      ),
    );
  }


  Padding padding() {
    return Padding(padding: EdgeInsets.only(top: 20.0));
  }

  Future<void> montrerPicker() async {
    DateTime choix = await showDatePicker(
        context: context,
        initialDate: DateTime.now(),
        firstDate: DateTime(1900),
        lastDate: DateTime.now(),
        initialDatePickerMode: DatePickerMode.year,
        locale: const Locale('fr', 'FR'), // nomination fr
    );
    if (choix != null) {
      // ↓ temps écoulé entre today et la date choisie
      var difference = DateTime.now().difference(choix);
      var jours = difference.inDays;
      var ans = (jours / 365);
      setState(() {
        age = ans;
      });
    }
  }

  // change la couleur de l'appli selon le genre choisi
  Color setColor() {
    if (genre) {
      return Colors.blue;
    }
    return Colors.pink;
  }
  
  Text texteAvecStyle(String data, {color: Colors.black, fontSize: 15.0}) {
    return Text(
      data,
      textAlign: TextAlign.center,
      style: TextStyle(
        color: color,
        fontSize: fontSize
      )
    );
  }
  
  Row rowRadio() {
    List<Widget> listRadios = [];
    mapActivite.forEach((key, value) {
      Column colonne = Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          Radio(
            activeColor: setColor(),
            value: key,
            groupValue: radioSelectionnee,
            onChanged: (Object i) {
            setState(() {
              radioSelectionnee = i;
            });
          }),
          texteAvecStyle(value, color: setColor())
        ],
      );
      listRadios.add(colonne);
    });
    return Row(
      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
      children: listRadios,
    );
  }

  void calculerNombreDeCalories() {
    if (age != null && poids != null && radioSelectionnee != null) {
      //Calculer
      if (genre) {
        calorieBase = (66.4730 + (13.7516 * poids) + (5.0033 * taille) - (6.7550 * age)).toInt();
      } else {
        calorieBase = (655.0955 + (9.5634 * poids) + (1.8496 * taille) - (4.6756 * age)).toInt();
      }
      switch(radioSelectionnee) {
        case 0:
          calorieAvecActivite = (calorieBase * 1.2).toInt();
          break;
        case 1:
          calorieAvecActivite = (calorieBase * 1.5).toInt();
          break;
        case 2:
          calorieAvecActivite = (calorieBase * 1.8).toInt();
          break;
        default:
          calorieAvecActivite = calorieBase;
          break;
      }

      setState(() {
        resultat();
      });

    } else {
      alerte();
    }
  }

  Future<void> resultat() async {
    return showDialog(
        context: context,
        barrierDismissible: false,
        builder: (BuildContext buildContext) {
          return SimpleDialog(
            title: texteAvecStyle("Votre besoin en calories", color: setColor()),
            contentPadding: EdgeInsets.all(15.0),
            children: <Widget>[
              padding(),
              texteAvecStyle("Votre besoin de base est de: $calorieBase"),
              padding(),
              texteAvecStyle("Votre besoin avec activité sportive est de : $calorieAvecActivite"),
              RaisedButton(onPressed: () {
                Navigator.pop(buildContext);
              },
              child: texteAvecStyle("OK", color: Colors.white),
                color: setColor(),
              )
            ],
          );
        }
    );
  }

  Future<void> alerte() async {
    return showDialog(
      context: context,
      barrierDismissible: false, // l'utilisateur doit appuyer sur le bouton !
      // ↓ buildcontext = #identifiant du pop-up
      builder: (BuildContext buildContext) {
          return AlertDialog(
            title: texteAvecStyle("Erreur"),
            content: texteAvecStyle("Tous les champs ne sont pas remplis"),
            actions: <Widget>[
              FlatButton(
                  onPressed: () {
                    Navigator.pop(buildContext); // on sort du pop-up
                  },
                  child: texteAvecStyle("OK", color: Colors.red))
            ],
          );
      }
    );
  }
}
```

## CODA NEWS

* Application de Flux RSS, malléable selon l'orientation de l'appareil et qui donne accès à une page détaillée de l'information cliquée
* https://pub.dev/packages/webfeed
* https://codabee.com/convertir-string-date-swift/
* Structure :
```py
coda_news/
  lib/
    # ↓ nos objets
    models/ # lib => package => models
      date_convertisseur.dart
      parser.dart
    widgets/ # tous les Stateful Widgets
      chargement.dart
      grille.dart
      home.dart
      liste.dart
      my_app.dart
      page_detail.dart
      texte_codabee.dart
    main.dart
pubspec.yaml
```
* pubspec.yaml
```yaml
name: coda_news
description: A new Flutter application.

dependencies:
  flutter:
    sdk: flutter
  webfeed: # dépendances sans contraintes de versions
  html: # permet de parser un document du web
  intl: # permet de formater une date
  http:

  # The following adds the Cupertino Icons font to your application.
  # Use with the CupertinoIcons class for iOS style icons.
  cupertino_icons: ^0.1.2

dev_dependencies:
  flutter_test:
    sdk: flutter

# For information on the generic Dart part of this file, see the
# following page: https://www.dartlang.org/tools/pub/pubspec

# The following section is specific to Flutter.
flutter:

  # The following line ensures that the Material Icons font is
  # included with your application, so that you can use the icons in
  # the material Icons class.
  uses-material-design: true
```
* main.dart
```java
import 'package:flutter/material.dart';
import 'package:coda_news/widgets/my_app.dart';

void main() => runApp(MyApp());
```
* my_app.dart
```java
import 'package:flutter/material.dart';
import 'home.dart';

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.indigo,
      ),
      home: Home(title: 'Coda News'),
    );
  }
}
```
* home.dart
```java
import 'package:flutter/material.dart';
import 'dart:async';
import 'package:coda_news/models/parser.dart';
import 'package:webfeed/webfeed.dart';
import 'chargement.dart';
import 'liste.dart';
import 'grille.dart';

class Home extends StatefulWidget {
  Home({Key key, this.title}) : super(key: key);
  final String title;

  @override
  _HomeState createState() => _HomeState();
}

class _HomeState extends State<Home> {

  RssFeed feed;

  @override
  void initState() {
    super.initState();
    parse(); // appelle le flux RSS au démarrage de l'appli
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        centerTitle: true,
        title: Text(widget.title),
        actions: <Widget>[
          // ↓ bouton pour rafraîchir la page
          IconButton(
              icon: Icon(Icons.refresh),
              onPressed: () {
                setState(() {
                  feed = null; // supprime les infos
                  parse(); // récupère les nouvelles données
                });
              })
        ],
      ),
      body: choixDuBody(),
    );
  }

  Widget choixDuBody() {
    if (feed == null) {
      // ↓ renvoie un message de chargement
      return Chargement();
    } else {
      Orientation orientation = MediaQuery.of(context).orientation;
      if (orientation == Orientation.portrait) {
        // affichage d'une Liste
        return Liste(feed);
      } else {
        // afiichage d'une Grille
        return Grille(feed);
      }
    }
  }

  Future<void> parse() async {
    RssFeed recu = await Parser().chargerRSS();
    if (recu != null) {
      setState(() {
        feed = recu; // notre feed devient le fil RSS chargé
        print(feed.items.length);
        feed.items.forEach((feedItem) {
          RssItem item = feedItem;
          print(item.title);
          print(item.description);
          print(item.pubDate);
          print(item.enclosure.url);
        });
      });
    }
  }
}
```
* chargement.dart
```java
import 'package:flutter/material.dart';
import 'texte_codabee.dart';

// Stateless car pas besoin de le rendre dynamique
class Chargement extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    return Center(
      child: TexteCodabee("Chargement en cours...",
        fontStyle: FontStyle.italic,
        fontSize: 30.0,
      ),
    );
  }

}
```
* texte_codabee.dart
```java
import 'package:flutter/material.dart';

class TexteCodabee extends Text {

  TexteCodabee(String data,
      {textAlign: TextAlign.center,
      color: Colors.indigo,
      fontSize: 15.0,
      fontStyle: FontStyle.normal})
      : super(data ?? "",
            // si data est vide, on le remplace par un string vide
            // prévient des erreurs potentielles
            textAlign: textAlign,
            style: TextStyle(
                color: color, fontSize: fontSize, fontStyle: fontStyle));
}
```
* grille.dart
```java
import 'package:flutter/material.dart';
import 'texte_codabee.dart';
import 'package:coda_news/models/date_convertisseur.dart';
import 'package:webfeed/webfeed.dart';
import 'page_detail.dart';

class Grille extends StatefulWidget {
  RssFeed feed;

  Grille(this.feed);

  @override
  _GrilleState createState() => _GrilleState();
}

class _GrilleState extends State<Grille> {

  @override
  Widget build(BuildContext context) {
    return GridView.builder(
        itemCount: widget.feed.items.length,
        // slivers = parties d'une zone scrollable
        gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(crossAxisCount: 2),
        itemBuilder: (context, i) {
          RssItem item = widget.feed.items[i];
          return InkWell(
              // navigation vers le détail de l'article
              onTap: () {
                Navigator.push(context, MaterialPageRoute(builder: (BuildContext context) {
                  return PageDetail(item);
                }));
              },
              child: Card(
                elevation: 10.0,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                  children: <Widget>[
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      // ↓ How much space should be occupied in the main axis
                      // After allocating space to children,
                      // there might be some remaining free space
                      mainAxisSize: MainAxisSize.max,
                      children: <Widget>[
                        TexteCodabee(item.author),
                        TexteCodabee(DateConvertisseur().convertirDate(item.pubDate), color: Colors.red,)
                      ],
                    ),
                    TexteCodabee(item.title),
                    Card(
                      elevation: 7.5,
                      child: Container(
                        width: MediaQuery.of(context).size.width / 2.5,
                        child: Image.network(item.enclosure.url, fit:  BoxFit.fill,),
                      ),
                    )

                  ],
                ),
              )
          );

        });
  }
}
```
* liste.dart
```java
import 'package:flutter/material.dart';
import 'package:webfeed/webfeed.dart';
import 'texte_codabee.dart';
import 'package:coda_news/models/date_convertisseur.dart';
import 'page_detail.dart';

class Liste extends StatefulWidget {
  RssFeed feed;

  Liste(this.feed);

  @override
  _ListeState createState() => _ListeState();
}

class _ListeState extends State<Liste> {

  @override
  Widget build(BuildContext context) {
    final taille = MediaQuery.of(context).size.width / 2.5;
    return ListView.builder(
        // widget représente la classe Liste
        itemCount: widget.feed.items.length,
        itemBuilder: (context, i) {
          RssItem item = widget.feed.items[i];
          return Container(
            child: Card(
                elevation: 10.0,
                child: InkWell(
                  // navigation vers le détail de l'article
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (BuildContext context) {
                      return PageDetail(item);
                    }));
                  },
                  child: Column(
                    children: <Widget>[
                      padding(),
                      Row(
                        mainAxisSize: MainAxisSize.max,
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: <Widget>[
                          TexteCodabee(item.author),
                          TexteCodabee(DateConvertisseur().convertirDate(item.pubDate), color: Colors.red,)
                        ],
                      ),
                      padding(),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: <Widget>[
                          Card(
                            elevation: 7.5,
                            child: Container( // pour que Card ait une width
                              width: taille,
                              child: Image.network(item.enclosure.url, fit: BoxFit.fill,),
                            ),
                          ),
                          Container(
                            width: taille,
                            child: TexteCodabee(item.title),
                          )
                        ],

                      ),
                      padding(),
                    ],
                  ),
                )


            ),
            padding: EdgeInsets.only(right: 7.5, left: 7.5),
          );
        });
  }

  Padding padding() {
    return Padding(padding: EdgeInsets.only(top: 10.0));
  }
}
```
* page_detail.dart
```java
import 'package:flutter/material.dart';
import 'package:webfeed/webfeed.dart';
import 'texte_codabee.dart';
import 'package:coda_news/models/date_convertisseur.dart';

// pas d'éléments cliquables => StatelessWidget
// pas de classe State
class PageDetail extends StatelessWidget {
  RssItem item;

  PageDetail(this.item);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Détail de l'article"),
      ),
      // ↓ avant : Center() | permet le scroll sur la page
      body: SingleChildScrollView(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: <Widget>[
            padding(),
            TexteCodabee(item.title, fontSize: 25.0, fontStyle: FontStyle.italic,),
            padding(),
            Card(
              elevation: 7.5,
              child: Container(
                width: MediaQuery.of(context).size.width / 1.5,
                child: Image.network(item.enclosure.url, fit: BoxFit.fill,),
              ),
            ),
            padding(),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: <Widget>[
                TexteCodabee(item.author),
                TexteCodabee(DateConvertisseur().convertirDate(item.pubDate), color: Colors.red,),
              ],
            ),
            padding(),
            TexteCodabee(item.description),
            padding(),
          ],
        ),
      ),
    );
  }

  Padding padding() {
    return Padding(padding: EdgeInsets.only(top: 20.0));
  }

}
```
* parser.dart
```java
import 'package:webfeed/webfeed.dart'; // package webfeed
// librairie Dart qui parse des flux RSS
import 'package:http/http.dart'; // http package ++
import 'dart:async'; // plus obligatoire

class Parser {

  // url de notre feed RSS
  final url = "http://www.france24.com/fr/actualites/rss";

  Future chargerRSS() async {
    // tente de charger l'url
    final reponse = await get(url);
    // si tout est OK
    if (reponse.statusCode == 200) {
      // parse le résultat
      final feed = RssFeed.parse(reponse.body);
      // renvoie le résultat parsé
      return feed;
    } else {
      print("erreur: ${reponse.statusCode}");
    }
  }
}
```
* date_convertisseur.dart
```java
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

class DateConvertisseur {

  String convertirDate(String string) {
    String il = "il y a";
    String format = "EEE, dd MMM yyyy HH:mm:ss Z";
    var formatter = DateFormat(format);
    DateTime dateTime = formatter.parse(string);
    if (dateTime == null) {
      return "Date inconnue";
    } else {
      var difference = new DateTime.now().difference(dateTime);
      var jours = difference.inDays;
      var heures = difference.inHours;
      var minutes = difference.inMinutes;

      if (jours > 1) {
        return "$il $jours jours";
      } else if (jours == 1) {
        return "$il 1 jour";
      } else if (heures > 1) {
        return "$il $heures heures";
      } else if (heures == 1) {
        return "$il 1 heure";
      } else if (minutes > 1) {
        return "$il $minutes minutes";
      } else if (minutes == 1) {
        return "$il 1 minute";
      } else {
        return "A l'instant";
      }
    }

  }

}
```

## CODA METEO
* Application qui donne les paramètres métérologiques d'une ville donnée
* https://pub.dev/packages/shared_preferences
* https://medium.com/flutterdevs/using-sharedpreferences-in-flutter-251755f07127
* https://medium.com/flutter-community/shared-preferences-how-to-save-flutter-application-settings-and-user-preferences-for-later-554d08671ae9
* https://codesource.io/getting-started-with-shared-preferences-in-flutter/
* Shared preferences :
```js
var preferences = await SharedPreferences.getInstance(); // Save a value
preferences.setString('value_key', 'hello preferences'); // Retrieve value later
var savedValue = preferences.getString('value_key');
```
* https://pub.dev/packages/location
* https://pub.dev/packages/geocoder
* https://openweathermap.org/
* https://pub.dev/packages/http
* Structure :
```py
weather_2020/
  assets/
    01.png
    02.png
    # ect.
  flutter-icons/
    fonts/
      MyFlutterApp.ttf # font des icones téléchargées
    config.json # liste des icones téléchargées
    # my_flutter_app_icons.dart a été déplacé dans le lib/
  lib/
    main.dart
    my_flutter_app_icons.dart # classe qui permet d'importer les images
    temps.dart
.flutter-plugins
.flutter-plugins-dependencies
pubspec.yaml
```
* pubspec.yaml
```yaml
name: weather2020
description: A new Flutter application.

# The following line prevents the package from being accidentally published to
# pub.dev using `pub publish`. This is preferred for private packages.
publish_to: 'none' # Remove this line if you wish to publish to pub.dev

# The following defines the version and build number for your application.
# A version number is three numbers separated by dots, like 1.2.43
# followed by an optional build number separated by a +.
# Both the version and the builder number may be overridden in flutter
# build by specifying --build-name and --build-number, respectively.
# In Android, build-name is used as versionName while build-number used as versionCode.
# Read more about Android versioning at https://developer.android.com/studio/publish/versioning
# In iOS, build-name is used as CFBundleShortVersionString while build-number used as CFBundleVersion.
# Read more about iOS versioning at
# https://developer.apple.com/library/archive/documentation/General/Reference/InfoPlistKeyReference/Articles/CoreFoundationKeys.html
version: 1.0.0+1

environment:
  sdk: ">=2.7.0 <3.0.0"

dependencies:
  flutter:
    sdk: flutter
  shared_preferences: # permet d'enregister en XML des données simples (int, string, ect.)
  location:
  geocoder: # transforme noms de ville en position(lat, long)
  http: # pour les requêtes HTTP (API)


  # The following adds the Cupertino Icons font to your application.
  # Use with the CupertinoIcons class for iOS style icons.
  cupertino_icons: ^0.1.3

dev_dependencies:
  flutter_test:
    sdk: flutter

# For information on the generic Dart part of this file, see the
# following page: https://dart.dev/tools/pub/pubspec

# The following section is specific to Flutter.
flutter:

  # The following line ensures that the Material Icons font is
  # included with your application, so that you can use the icons in
  # the material Icons class.
  uses-material-design: true

  # ajout des icônes fonts :
  fonts:
    - family: MyFlutterApp # retrouvable dans la classe my_flutter_app_icons
      fonts:
        - asset: flutter-icons/fonts/MyFlutterApp.ttf

  # To add assets to your application, add an assets section, like this:
  assets:
    - assets/
```
* main.dart
```java
import 'package:flutter/material.dart';
import 'dart:async'; // plus obligatoire
import 'package:shared_preferences/shared_preferences.dart';
// ↑ import des shared preferences pour stocker des données simples
import 'package:flutter/services.dart';
import 'package:location/location.dart';
import 'package:geocoder/geocoder.dart';
import 'package:http/http.dart' as http;
// ↑ alias, permet d'être utilisé directement dans le code
import 'temps.dart';
import 'dart:convert'; // convertit le JSON
import 'my_flutter_app_icons.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  // package Location ↑ s'assurer que tout est initialisé
  SystemChrome.setPreferredOrientations([DeviceOrientation.portraitUp]);
  // ↓ initialisation du package Location suite :
  Location location = Location();
  LocationData position; // objet reçu vis-à-vis de notre localisation
  try {
    position = (await location.getLocation());
    print(position);
  } on PlatformException catch (e) {
    print("Erreur: $e");
  }
  if (position != null) {
    final latitude = position.latitude;
    final longitude = position.longitude;
    final Coordinates coordinates = Coordinates(latitude, longitude);
    final ville = await Geocoder.local.findAddressesFromCoordinates(coordinates);
    if (ville != null) {
      print(ville.first.locality);
      runApp(new MyApp(ville.first.locality));
    }

  }
}

class MyApp extends StatelessWidget {
  MyApp(String ville) {
    this.ville = ville;
  }

  String ville;

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: MyHomePage(ville, title: 'Coda Météo'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage(String ville, {Key key, this.title}) : super(key: key) {
    this.villeDeLutilisateur = ville;
  }

  String villeDeLutilisateur;
  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  String key = "villes";
  List<String> villes = [];
  String villeChoisie;
  Temps tempsActuel;

  @override
  void initState() {
    super.initState();
    obtenir(); // obtenir shared preferences
    appelApi();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        centerTitle: true,
        title: Text(widget.title),
      ),
      // ↓ notre drawer, menu coulissant
      drawer: Drawer(
        child: Container(
          child: ListView.builder(
              itemCount: villes.length + 2, // car ajout d'un header + ville actuelle
              // qui seront compris dans la liste
              itemBuilder: (context, i) {
                if (i == 0) { // 1er élément de la liste => header du Drawer
                  return DrawerHeader(
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: <Widget>[
                        texteAvecStyle("Mes Villes", fontSize: 22.0),
                        RaisedButton(
                            color: Colors.white,
                            elevation: 8.0,
                            child: texteAvecStyle("Ajouter une ville", color: Colors.blue),
                            onPressed: ajoutVille
                        )
                      ],
                    ),
                  );
                } else if (i == 1) { // => 2ème élèment de la liste => ville actuelle
                  return ListTile(
                    title: texteAvecStyle(widget.villeDeLutilisateur),
                    onTap: () {
                      setState(() {
                        villeChoisie = null;
                        appelApi();
                        Navigator.pop(context);
                      });
                    },
                  );
                } else { // autres éléments de la liste = les villes repertoriées
                  String ville = villes[i - 2];
                  return ListTile(
                    title: texteAvecStyle(ville),
                    trailing: IconButton(
                        icon: Icon(Icons.delete, color: Colors.white,),
                        onPressed: (() => supprimer(ville))),
                    onTap: () {
                      setState(() {
                        villeChoisie = ville;
                        appelApi();
                        Navigator.pop(context);
                      });
                    },
                  );
                }
              }),
          color: Colors.blue,
        ),
      ),
      body: (tempsActuel == null)
          ? Center(
        child: Text((villeChoisie == null)? widget.villeDeLutilisateur: villeChoisie),
      )
          : Container(
        width: MediaQuery.of(context).size.width, // width auto
        height: MediaQuery.of(context).size.height, // height auto
        // ↓ permet l'image de fond
        decoration: BoxDecoration(
          image: DecorationImage(
              image: AssetImage(getBackground()),
              fit: BoxFit.cover
          ),
        ),
        padding: EdgeInsets.all(20.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: <Widget>[
            texteAvecStyle(tempsActuel.name, fontSize: 30.0),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: <Widget>[
                texteAvecStyle("${tempsActuel.temp.toInt()}°C", fontSize: 60.0),
                // pour récupérer sur le web (et non en local) :
                // Image.network(http://openweathermap.org/img/wn/${tempsActuel.icon}.png)
                Image.asset(getIconImage())
              ],
            ),
            texteAvecStyle(tempsActuel.main, fontSize: 30.0),
            texteAvecStyle(tempsActuel.description, fontSize: 25.0),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: <Widget>[
                Column(
                  children: <Widget>[
                    // appel de la classe MyFlutterApp
                    // et de ses constantes qui représentent des icônes
                    Icon(MyFlutterApp.temperature, color: Colors.white, size: 30.0,),
                    texteAvecStyle("${tempsActuel.pressure}", fontSize: 20.0)
                  ],
                ),
                Column(
                  children: <Widget>[
                    Icon(MyFlutterApp.droplet, color: Colors.white, size: 30.0,),
                    texteAvecStyle("${tempsActuel.humidity}", fontSize: 20.0)
                  ],
                ),
                Column(
                  children: <Widget>[
                    Icon(MyFlutterApp.arrow_upward, color: Colors.white, size: 30.0,),
                    texteAvecStyle("${tempsActuel.temp_max}", fontSize: 20.0)
                  ],
                ),
                Column(
                  children: <Widget>[
                    Icon(MyFlutterApp.arrow_downward, color: Colors.white, size: 30.0,),
                    texteAvecStyle("${tempsActuel.temp_min}", fontSize: 20.0)
                  ],
                ),
              ],
            )
          ],
        ),
      ), // This trailing comma makes auto-formatting nicer for build methods.
    );
  }

  // ↓ choix des images de fond selon les icônes récupérées de l'API
  String getBackground() {
    print(tempsActuel.icon);
    // ↓ si c'est un night icon (ex. 01n.png)
    if (tempsActuel.icon.contains("n")) {
      return "assets/n.jpg"; // image de nuit stockée en local
    } else if (tempsActuel.icon.contains("01") || tempsActuel.icon.contains("02") || tempsActuel.icon.contains("03")) {
      return "assets/d1.jpg"; // image beau temps
    } else {
      return "assets/d2.jpg"; // image pluie
    }
  }

  // remplace le string de l'icone API (01d.png, 01n.png, ect.)
  // par une image correspondante stockée en local (01.png)
  String getIconImage() {
    return "assets/${tempsActuel.icon.replaceAll("d", "").replaceAll("n", "")}.png";
  }

  String monAssetName() { // ma proposition (remplacée plus haut)
    // je le laisse pour l'exemple de contains + regex
    // les images 01.png, 02.png et 03.png représentent le beau temps
    if (tempsActuel.icon.contains("01") || tempsActuel.icon.contains("02") || tempsActuel.icon.contains("03")) {
      return "assets/d1.jpg";
    // regex avec contains
    // on va chercher les fichiers 04.png, 09.png, 10.png, 13.png, 50.png, ect.
    // qui représentent la pluie
    } else if (tempsActuel.icon.contains(new RegExp(r'\b(0[5-9]|[12][0-9]|50)\b'))) {
      return "assets/d2.jpg";
    // si aucun icônes, alors il fait nuit
    } else {
      return "assets/n.jpg";
    }
  }

  Text texteAvecStyle(String data, {color: Colors.white, fontSize: 18.0, fontStyle: FontStyle.italic, textAlign: TextAlign.center}) {
    return Text(
      data,
      textAlign: textAlign,
      style: TextStyle(
          color: color,
          fontStyle: fontStyle,
          fontSize: fontSize
      ),
    );
  }

  // simple dialog d'ajout d'une ville
  Future<void> ajoutVille() async {
    return showDialog(
        barrierDismissible: true,
        builder: (BuildContext buildcontext) {
          return SimpleDialog(
            contentPadding: EdgeInsets.all(20.0),
            title: texteAvecStyle("Ajoutez une ville", fontSize: 22.0, color: Colors.blue),
            children: <Widget>[
              TextField(
                decoration: InputDecoration(labelText: "ville: "),
                onSubmitted: (String str) {
                  ajouter(str); // ajout ville au shared preferences
                  Navigator.pop(buildcontext);
                },
              )
            ],

          );
        },
        context: context);
  }

  // obtenir mes shared preferences
  // la sauvegarde s'effectue par le couplage clé-valeur
  // en asynchrone car pas obtenu automatiquement
  void obtenir() async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    // ↑ sauvegarde une valeur
    List<String> liste = await sharedPreferences.getStringList(key);
    // ↑ key = key de la valeur sauvegardé
    // la key de la List<String> sauvegardée est la variable key (= "villes")
    if (liste != null) {
      setState(() {
        villes = liste;
      });
    }
  }

  // ajout d'une ville à notre shared preferences
  void ajouter(String str) async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    villes.add(str); // augmente notre liste
    // ↓ remplace la liste sauvegardée par la liste augmentée
    await sharedPreferences.setStringList(key, villes);
    obtenir(); // rappelle la liste sauvegardée
  }

  // supprimer une ville du shared preferences
  void supprimer(String str) async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    villes.remove(str); // réduit notre liste
    // ↓ remplace la liste sauvegardée par notre liste réduite
    await sharedPreferences.setStringList(key, villes);
    obtenir(); // rappelle la liste sauvegardée
  }

  void appelApi() async {
    String str;
    if (villeChoisie == null) {
      str = widget.villeDeLutilisateur;
    } else {
      str = villeChoisie;
    }
    List<Address> coord = await Geocoder.local.findAddressesFromQuery(str);
    if (coord != null) {
      final lat = coord.first.coordinates.latitude;
      final lon = coord.first.coordinates.longitude;
      // ↓ code langue de l'application
      String lang = Localizations.localeOf(context).languageCode;
      print("La langue utilisée est $lang");
      // ↑ La langue utilisée est en
      // ↓ clé de l'API
      final key = "636bf265ae916d48a0c7e6d872fa1fd6";
      // ↓ url personnalisée de l'API
      String urlApi = "http://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=metric&lang=$lang&APPID=$key";
      // ↓ réponse de l'API, avec l'alias http (objet Http)
      final reponse = await http.get(urlApi);
      if (reponse.statusCode == 200) {
        Temps temps = Temps();
        // ↓ on convertit le JSON avec convert
        Map map = json.decode(reponse.body);
        temps.fromJSON(map);
        // ↑ on stocke les données de la réponse convertie
        // dans un objet Temps
        setState(() {
          tempsActuel = temps;
        });
      }
    }
  }
}
```
* temps.dart
```java
class Temps {

  String name;
  String main;
  String description;
  String icon;
  var temp;
  var pressure;
  var humidity;
  var temp_min;
  var temp_max;

  Temps();

  // ↓ la réponse API est une Map, que l'on nomme map
  void fromJSON(Map map) {
    this.name = map["name"];

    List weather = map["weather"];
    Map mapWeather = weather[0];
    this.main = mapWeather["main"];
    this.description = mapWeather["description"];
    // ↓ représentation string de l'icône dans la réponse JSON
    // https://openweathermap.org/weather-conditions
    String monIcone = mapWeather["icon"];
    this.icon = monIcone;

    Map main = map["main"];
    this.temp = main["temp"];
    this.pressure = main["pressure"];
    this.humidity = main["humidity"];
    this.temp_min = main["temp_min"];
    this.temp_max = main["temp_max"];
  }
}
```
* my_flutter_app_icons.dart
```java
/// Flutter icons MyFlutterApp
/// Copyright (C) 2018 by original authors @ fluttericon.com, fontello.com
/// This font was generated by FlutterIcon.com, which is derived from Fontello.
///
/// To use this font, place it in your fonts/ directory and include the
/// following in your pubspec.yaml
///
/// flutter:
///   fonts:
///    - family:  MyFlutterApp
///      fonts:
///       - asset: fonts/MyFlutterApp.ttf
///
///
/// * Typicons, (c) Stephen Hutchings 2012
///         Author:    Stephen Hutchings
///         License:   SIL (http://scripts.sil.org/OFL)
///         Homepage:  http://typicons.com/
/// * Entypo, Copyright (C) 2012 by Daniel Bruce
///         Author:    Daniel Bruce
///         License:   SIL (http://scripts.sil.org/OFL)
///         Homepage:  http://www.entypo.com
/// * Material Design Icons, Copyright (C) Google, Inc
///         Author:    Google
///         License:   Apache 2.0 (https://www.apache.org/licenses/LICENSE-2.0)
///         Homepage:  https://design.google.com/icons/
///
import 'package:flutter/widgets.dart';

class MyFlutterApp {
  MyFlutterApp._();

  static const _kFontFam = 'MyFlutterApp';
  // family: 'MyFlutterApp' dans yaml

  static const IconData temperature = const IconData(0xe800, fontFamily: _kFontFam);
  static const IconData droplet = const IconData(0xe801, fontFamily: _kFontFam);
  static const IconData arrow_upward = const IconData(0xe802, fontFamily: _kFontFam);
  static const IconData arrow_downward = const IconData(0xe803, fontFamily: _kFontFam);
}
```

## CODE SQFLITE
* Application de listing d'articles, selon des thèmes
* https://medium.com/flutter-community/using-sqlite-in-flutter-187c1a82e8b
* Instantly parse JSON in any language : https://app.quicktype.io/#l=dart, exemple : https://app.quicktype.io/?share=4Ik8Upww0mN33e2CBVmq
* Problème Image Picker = flutter packages get + flutter clean = https://github.com/flutter/flutter/issues/24859
* * Structure :
```py
je_veux/
  images/
    no_image.png
  lib/
    model/
      article.dart
      databaseClient.dart
      item.dart
    widget/
      ajout_article.dart
      donnees_vides.dart
      home_controller.dart
      item_detail.dart
    main.dart
pubspec.yaml
```
* pubspec.yaml
```yaml
name: je_veux
description: A new Flutter application.

publish_to: 'none' # Remove this line if you wish to publish to pub.dev

version: 1.0.0+1

environment:
  sdk: ">=2.7.0 <3.0.0"

dependencies:
  flutter:
    sdk: flutter
  sqflite: # sqlite
  path_provider: # accéder à des chemins dans mon appli
  image_picker: ^0.6.0+9 # accéder aux images du téléphone

  cupertino_icons: ^0.1.3

dev_dependencies:
  flutter_test:
    sdk: flutter

# The following section is specific to Flutter.
flutter:
  uses-material-design: true

  # To add assets to your application, add an assets section, like this:
  assets:
    - images/no_image.jpg
```
* main.dart
```java
import 'package:je_veux/widget/home_controller.dart';

void main() => runApp(new MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return new MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Flutter Demo',
      theme: new ThemeData(
        primarySwatch: Colors.red,
      ),
      home: new HomeController(title: 'Je veux...'),
    );
  }
}
```
* home_controller.dart
```java
import 'package:flutter/material.dart';
import 'dart:async';
import 'package:je_veux/model/item.dart';
import 'package:je_veux/widget/donnees_vides.dart';
import 'package:je_veux/model/databaseClient.dart';
import 'item_detail.dart';

class HomeController extends StatefulWidget {
  HomeController({Key key, this.title}) : super(key: key);
  final String title;

  @override
  _HomeControllerState createState() => _HomeControllerState();
}

class _HomeControllerState extends State<HomeController> {

  // ↓ catégorie d'une liste, qui comprendra plusieurs articles
  // (ex. Jeux, Chaussures, etc.)
  String newItem;
  List<Item> items; // toutes les catégories

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    recuperer();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text(widget.title),
          actions: <Widget>[
            FlatButton(
                onPressed: (() => ajouter(null)), 
                child: Text("Ajouter", style: TextStyle(color: Colors.white),)
            ),
          ],
        ),
        body: (items == null||items.length == 0)
            ? DonneesVides()
            : ListView.builder(
            itemCount: items.length,
            itemBuilder: (context, i) {
              Item item = items[i];
              return ListTile(
                title: Text(item.nom),
                trailing: IconButton(
                    icon: Icon(Icons.delete),
                    onPressed: () {
                      DatabaseClient().delete(item.id, 'item').then((int) {
                        recuperer();
                      });
                    }),
                leading: IconButton(icon: Icon(Icons.edit), onPressed: (() => ajouter(item))),
                // ↓ appui sur le ListTile de l'item => ouvre sa page en détails
                onTap: () {
                  Navigator.push(context, MaterialPageRoute(builder: (BuildContext buildContext) {
                    return ItemDetail(item);
                  }));
                },
              );
            }
        )

    );
  }

  Future<Null> ajouter(Item item) async {
    await showDialog(
        context: context,
        barrierDismissible: false,
        builder: (BuildContext buildContext) {
          return AlertDialog(
            title: Text('Ajouter une liste de souhaits'),
            content: TextField(
              decoration: InputDecoration(
                labelText: "liste:",
                // ↓ sorte de placeholder
                hintText: (item == null)? "ex: mes prochains jeux vidéos": item.nom,
              ),
              // ↓ réponse de l'utilisateur
              onChanged: (String answer) {
                newItem = answer;
              },
            ),
            actions: <Widget>[
              // ↓ BOUTON ANNULER
              FlatButton(onPressed: (() => Navigator.pop(buildContext)), child: Text('Annuler')),
              // ↓ BOUTON VALIDER
              FlatButton(onPressed: () {
                // Ajouter le code pour pouvoir ajouter à la BDD
                if (newItem != null) {
                  // ↓ simple ajout
                  if (item == null) {
                    item = Item();
                    Map<String, dynamic> map = {'nom': newItem};
                    item.fromMap(map);
                  } else {
                    item.nom = newItem;
                  }
                  // ↓ UPDATE le nom de l'item sauvegardé en base
                  DatabaseClient().upsertItem(item).then((i) => recuperer());
                  newItem = null;
                }
                Navigator.pop(buildContext);
              }, child: Text('Valider', style: TextStyle(color: Colors.blue),))
            ],
          );
        }
    );
  }

  void recuperer() {
    DatabaseClient().allItem().then((items) {
      setState(() {
        this.items = items;
      });
    });
  }
}
```
* donnees_vides.dart
```java
import 'package:flutter/material.dart';

class DonneesVides extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return new Center(
      child: new Text("Aucune donnée n'est présente",
        textScaleFactor: 2.5,
        textAlign: TextAlign.center,
        style: new TextStyle(
            color: Colors.red,
            fontStyle: FontStyle.italic
        ),
      ),
    );
  }
}
```
* item_detail.dart
```java
import 'package:flutter/material.dart';
import 'package:je_veux/model/item.dart';
import 'package:je_veux/model/article.dart';
import 'donnees_vides.dart';
import 'ajout_article.dart';
import 'package:je_veux/model/databaseClient.dart';
import 'dart:io';

class ItemDetail extends StatefulWidget {
  Item item;

  ItemDetail(this.item);

  @override
  _ItemDetailState createState() => _ItemDetailState();

}

class _ItemDetailState extends State<ItemDetail> {
  List<Article> articles;

  @override
  void initState() {
    super.initState();
    // ↓ récupère la liste d'articles enregistrés en BDD
    // en renseignant l'id de l'item renseigné dans le StatefulWidget
    DatabaseClient().allArticles(widget.item.id).then((liste) {
      setState(() {
        articles = liste;
      });
    });
  }

  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return Scaffold(
        appBar: AppBar(
          title: Text(widget.item.nom),
          actions: <Widget>[
            FlatButton(
              child: Text('ajouter', style: TextStyle(color: Colors.white),),
              onPressed: () {
              Navigator.push(context, MaterialPageRoute(builder: (BuildContext context) {
                // ↓ id de l'item sélectionné
                // renvoie vers la page d'ajout d'un article associé à l'item
                return Ajout(widget.item.id);
                // push = fonction asynchrone par définition
                // les changements sont donc pris en compte, mais plus tard
                // solution = then((value)) { affichage du résultat }
              })).then((value) {
                print('On est de retour, avec les articles mis à jour');
                DatabaseClient().allArticles(widget.item.id).then((liste) {
                  setState(() {
                    articles = liste;
                  });
                });
              });
              },
            )
          ],
        ),
        body: (articles == null || articles.length == 0)
            ? DonneesVides()
            : GridView.builder(
            itemCount: articles.length,
            gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(crossAxisCount: 1),
            itemBuilder: (context, i) {
              Article article = articles[i];
              return Card(
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                  children: <Widget>[
                    Text(article.nom, textScaleFactor: 1.4,),
                    Container(
                      height: MediaQuery.of(context).size.height / 2.5,
                      // ↓ affichage conditionnel de l'image de l'article
                      child: (article.image == null)
                          ? Image.asset('images/no_image.jpg')
                          : Image.file(File(article.image)),
                    ),

                    Text((article.prix == null)? 'Aucun prix renseigné': "Prix: ${article.prix}"),
                    Text((article.magasin == null)? 'Aucun magasin renseigné': "Magasin: ${article.magasin}")
                  ],
                ),
              );
            })
    );
  }

}
```
* ajout_article.dart
```java
import 'dart:async';

import 'package:flutter/material.dart';
import 'dart:io';
import 'package:je_veux/model/article.dart';
import 'package:je_veux/model/databaseClient.dart';
import 'package:image_picker/image_picker.dart';

class Ajout extends StatefulWidget {

  int id;

  Ajout(this.id);

  @override
  _AjoutState createState() => _AjoutState();

}

class _AjoutState extends State<Ajout> {

  String image;
  String nom;
  String magasin;
  String prix;

  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return Scaffold(
      appBar: AppBar(
        // ↓ BOUTON AJOUT du formulaire
        title: Text('Ajouter'),
        actions: <Widget>[
          // ajouter() gère la logique du form
          FlatButton(onPressed: ajouter, child: Text('Valider', style: TextStyle(color: Colors.white),))
        ],
      ),
      body: SingleChildScrollView(
        padding: EdgeInsets.all(20.0),
        child: Column(
            children: <Widget>[
              Text('Article à ajouter', textScaleFactor: 1.4, style: TextStyle(color: Colors.red, fontStyle: FontStyle.italic),),
              Card(
                elevation: 10.0,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                  children: <Widget>[
                    (image == null)
                        ? Image.asset('images/no_image.jpg')
                        : Image.file(new File(image)),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: <Widget>[
                        IconButton(icon: Icon(Icons.camera_enhance),
                            // ↓ ImageSource = renseigne la source de la photo à récupérer
                            onPressed: (() => getImage(ImageSource.camera))
                            // ↑ .camera => ouvre la camera
                        ),
                        IconButton(icon: Icon(Icons.photo_library),
                            // ↓ ImageSource = renseigne la source de la photo à récupérer
                            onPressed: (() => getImage(ImageSource.gallery))
                            // ↑ .gallery => ouvre la gallerie de l'utilisateur
                        )
                      ],
                    ),
                    textField(TypeTextField.nom, 'Nom de l\'article'),
                    textField(TypeTextField.prix, 'Prix'),
                    textField(TypeTextField.magasin, 'Magasin')
                  ],
                ),
              )
            ]

        ),
      ),
    );
  }

  TextField textField(TypeTextField type, String label) {
    return TextField(
      decoration: InputDecoration(labelText: label),
      onChanged: (String string) {
        switch (type) {
          case TypeTextField.nom:
            nom = string;
            break;
          case TypeTextField.prix:
            prix = string;
            break;
          case TypeTextField.magasin:
            magasin = string;
            break;
        }
      },
    );
  }

  void ajouter() {
    print('Ajouter un article');
    if (nom != null) {
      Map<String, dynamic> map = {'nom': nom, 'item': widget.id};
      if (magasin != null) {
        map['magasin'] = magasin;
      }
      if (prix != null) {
        map['prix'] = prix;
      }
      if (image != null) {
        map['image'] = image;
      }
      Article article = Article();
      article.fromMap(map); // on crée notre objet à partir d'une map
      // on envoie notre objet sur la BDD
      DatabaseClient().upsertArticle(article).then((value) {
        // dès que le processus renvoie une valeur
        // on efface toutes les propriétés enregistrées
        image = null;
        nom = null;
        magasin = null;
        prix = null;
        Navigator.pop(context);
      });
    }
  }

  // get image with image picker
  Future getImage(ImageSource source) async {
    var nouvelleIMage = await ImagePicker.pickImage(source: source);
    setState(() {
      image = nouvelleIMage.path;
    });
  }

}

enum TypeTextField {nom, prix, magasin}
```
* article.dart
```java
class Article {

  int id;
  String nom;
  int item;
  var prix;
  String magasin;
  String image;

  Article();

  // ↓ on récupère de la BDD
  void fromMap(Map<String, dynamic> map) {
    this.id = map['id'];
    this.nom = map['nom'];
    this.item = map['item'];
    this.prix = map['prix'];
    this.magasin = map['magasin'];
    this.image = map['image'];
  }

  // ↓ convertit l'objet Article en map pour l'envoyer en BDD
  Map<String, dynamic> toMap() {
    Map<String, dynamic> map = {
      'nom': this.nom,
      'item': this.item,
      'magasin': this.magasin,
      'prix': this.prix,
      'image': this.image
    };

    // si l'article a déjà été persisté dans la BDD
    if (id != null) {
      map['id'] = this.id;
    }
    return map;
  }
}
```
* item.dart
```java
class Item {

  int id;
  String nom;

  Item();

  // ↓ on récupère de la BDD
  void fromMap(Map<String, dynamic> map) {
    this.id = map['id'];
    this.nom = map['nom'];
  }

  // ↓ convertit l'objet Item en map pour l'envoyer en BDD
  Map<String, dynamic> toMap() {
    Map<String, dynamic> map = {
      'nom': this.nom
    };
    // si on a un id
    if (id != null) {
      map['id'] = this.id;
    }
    return map;
  }

}
```
* databaseClient.dart
```java
// classe de la BDD
import 'dart:async';
import 'dart:io';
import 'package:je_veux/model/item.dart';
import 'package:sqflite/sqflite.dart'; // SQLITE
import 'package:path/path.dart'; // récupérer nos chemins
import 'package:path_provider/path_provider.dart';
import 'article.dart';

class DatabaseClient {

  Database _database;

  // Getter de _database
  Future<Database> get database async {
    if (_database != null) {
      return _database;
    } else {
      print("LA BDD n'a pas été crée");
      // ↓ Création de la BDD
      _database = await create();
      return _database;
    }
  }

  // création de la BDD
  Future create() async {
    // ↓ chemin du dossier de mes documents
    Directory directory = await getApplicationDocumentsDirectory();
    // ↓ création d'un chemin pour la BDD
    String database_directory = join(directory.path, 'database.db');
    // ↓ opening a database
    var bdd = await openDatabase(database_directory, version: 1, onCreate: _onCreate);
    return bdd;
  }

  // création de la table item et article pour la BDD
  Future _onCreate(Database db, int version) async {
    // création table item
    await db.execute('''
    CREATE TABLE item (
    id INTEGER PRIMARY KEY, 
    nom TEXT NOT NULL )
    '''
    );

    // création table article
    await db.execute('''
     CREATE TABLE article (
     id INTEGER PRIMARY KEY,
     nom TEXT NOT NULL,
     item INTEGER,
     prix TEXT,
     magasin TEXT,
     image TEXT )
     '''
    );
  }

  /* ECRITURE DES DONNEES */

  // INSERT INTO
  Future<Item> ajoutItem(Item item) async {
    // ↓ appelle le getter de _database
    Database maDatabase = await database;
    // INSERT INTO TABLE item
    // insert renvoie un Future<int>
    item.id = await maDatabase.insert('item', item.toMap());
    return item;
  }

  // UPDATE
  Future<int> updateItem(Item item) async {
    Database maDatabase = await database;
    return maDatabase.update('item', item.toMap(), where: 'id = ?', whereArgs: [item.id]);
  }

  // UPDATE OR INSERT
  Future<Item> upsertItem(Item item) async {
    Database maDatabase = await database;
    if (item.id == null) {
      item.id = await maDatabase.insert('item', item.toMap());
    } else {
      await maDatabase.update('item', item.toMap(), where: 'id = ?', whereArgs: [item.id]);
    }
    return item;
  }

  Future<Article> upsertArticle(Article article) async {
    Database maDatabase = await database;
    // si l'article n'a pas d'id, il n'a jamais été persisté en BDD
    (article.id == null)
        // INSERT INTO renvoie un id
        // toMap pour le transformer en map pour l'envoyer en BDD
        ? article.id = await maDatabase.insert('article', article.toMap())
        // sinon, UPDATE
        : await maDatabase.update('article', article.toMap(), where: 'id = ?', whereArgs: [article.id]);
    return article;
  }

  // DELETE
  Future<int> delete(int id, String table) async {
    Database maDatabase = await database;
    // ↓ supprime l'ensemble des articles liés à une item
    await maDatabase.delete('article', where: 'item = ?', whereArgs: [id]);
    // ↓ puis supprime l'item (DELETE ON CASCADE sans contrainte ON DELETE CASCADE)
    return await maDatabase.delete(table, where: 'id = ?', whereArgs: [id]);
  }


/* LECTURE DES DONNEES */

  // SELECT *
  Future<List<Item>> allItem() async {
    Database maDatabase = await database;
    // ↓ QUERY
    List<Map<String, dynamic>> resultat = await maDatabase.rawQuery('SELECT * FROM item');
    List<Item> items =[];
    resultat.forEach((map) {
      Item item = new Item();
      // ↓ enregistre l'objet grace aux infos de la BDD
      item.fromMap(map);
      items.add(item);
    });
    return items;
  }

  // SELECT * WHERE ITEM = int
  Future<List<Article>> allArticles(int item) async {
    // appel BDD
    Database maDatabase = await database;
    // récupération des éléments de la query
    List<Map<String, dynamic>> resultat = await maDatabase.query(
        'article',
        where: 'item = ?',
        whereArgs: [item]
    );
    // création d'un liste d'articles
    List<Article> articles = [];
    // remplissage de la liste d'articles
    resultat.forEach((map) {
      Article article = Article();
      article.fromMap(map);
      articles.add(article);
    });
    return articles;
  }

}
```
