# MEMENTO FLUTTER


## RESSOURCES

**DART & FLUTTER**
* Doc Dart : https://dart.dev/
* DartPad : https://dartpad.dev/dart
* Doc Flutter : https://flutter.dev/docs/get-started/install
* Une communauté francophone Flutter : http://fr.flutterdev.net/
* Widget catalog : https://flutter.dev/docs/development/ui/widgets
* Top Flutter packages : https://pub.dev/flutter/packages
* https://www.reddit.com/r/FlutterDev/
* https://github.com/flutter/flutter
* Catalogue d’applications Flutter développées par la communauté : https://github.com/flutter/samples/blob/master/INDEX.md
* Making Dart a Better Language for UI : https://medium.com/dartlang/making-dart-a-better-language-for-ui-f1ccaf9f546c

**TUTOS**
* https://www.udemy.com/course/flutter-bootcamp-with-dart/
* https://www.udemy.com/course/flutter-dart-creez-des-applications-pour-ios-et-android/
* #1 Fluter: Télécharger, Installer et Configurer Flutter SDK sur Windows : https://www.youtube.com/watch?v=P4Ua8cK_TeA&

**DOCS**
* Flutter-Course-Resources : https://github.com/londonappbrewery/Flutter-Course-Resources
* Comment J’apprends Flutter ? : https://medium.com/@q.cornu/comment-japprends-flutter-412add79848c
list=PLjA66rpnHbWnTTzp3QYykoAHkCriViEDo  
* Roadmap des élements à connaître : https://www.ambient-it.net/wp-content/uploads/pdf/Annexe-1-Fiche-descriptive-formation-flutter-dart.pdf
* “A month of Flutter” : https://bendyworks.com/blog/a-month-of-flutter
* https://www.facebook.com/pg/CodaBeeOfficial/posts/?ref=page_internal
* Codabee Flutter: le forum d'entraide : https://www.facebook.com/groups/225660591356238

**ANDROID STUDIO**
* Android Studio 4.0 s'accompagne d'une interface pour l'édition de mouvement, propose la validation de la mise en page : https://android.developpez.com/actu/304550/Android-Studio-4-0-s-accompagne-d-une-interface-pour-l-edition-de-mouvement-propose-la-validation-de-la-mise-en-page-et-apporte-la-prise-en-charge-de-Clangd-pour-le-developpement-Cplusplus/

## SOMMAIRE

* [FLUTTER](#flutter)
* [INSTALLATION](#installation)
* [ANDROID STUDIO](#android-studio)
* [MAIN.DART](#main-dart)
* [WIDGETS](#widgets)   
   * [WIDGETS DE BASE](#widgets-de-base)



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
### GLOSSAIRE
* Stateless Widgets = widget qui ne changera pas d'état => widget descriptif et non interactif (les variables, fonctions, valeurs, evenements compris dans la classe du widget ne changeront pas) => le widget ne sera jamais rechargé durant l'utilisation de l'application
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
* Stateful Widgets = widget qui possède un état (capacité à se modifier selon les évènements de l'application) et qui sera rechargé ou non durant l'application
```java
class MyHomePage extends StatefulWidget { // création d'un Stateful Widget
  @override // de createState()
  _MyHomePageState createState() => _MyHomePageState(); // création de l'état de la classe
}

class _MyHomePageState extends State<MyHomePage> {
  @override // de build()
  Widget build(BuildContext context) { // implémentation du build
    return OneOrMoreWidgets; // qui retourne l'ensemble des widgets de l'appli
  }
}
```
* Material Design = langage visuel développé par Google qui reprend les principes d'un design de qualité, responsive et multi-plateforme
* Scaffold = template (équivalent du head + body en html)
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
* Preferences/Settings => Languages & Frameworks => cocher "Perform Hot reload on save" + "Format code on save"
* Keymap pour changer les raccourcis clavier
### TROUBLESHOOTING
* https://www.udemy.com/course/flutter-bootcamp-with-dart/learn/lecture/17119662#bookmarks
### NOUVEAU PROJET FLUTTER
* package name = pour se différencier sur Play Store / Apple Store
* Décocher Include Kotlin + Include Swift

## ANDROID STUDIO
* Fonctionnalités : https://www.udemy.com/course/flutter-bootcamp-with-dart/learn/lecture/14481906#questions
* AVD Manager : lieu où l'on stocke tous nos appareils virtuels (différents téléphones)
* Problème de Black Screen au démarrage du Nexus 6 > Wipe Data > Lancer Nexus 6

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
#### LE CONTAINER
* But : pouvoir ajouter background-color, décorations, padding et margin au widget
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
#### LE CENTER
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
#### LE CARD
* Container avec des bords arrondis et une ombre
```java


```