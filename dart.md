# MEMENTO DART

## RESSOURCES

**Dart**

* Dart doc : https://dart.dev/guides
* Dart Cheatsheet : https://dart.dev/guides/language/language-tour  https://dart.dev/codelabs/dart-cheatsheet
* A Tour of the Dart Libraries : https://dart.dev/guides/libraries/library-tour
* Effective Dart : https://dart.dev/guides/language/effective-dart
* Dart language specification : https://dart.dev/guides/language/spec
* Dart Pad : https://dartpad.dev/
* dart:core library : https://api.dart.dev/stable/2.8.3/dart-core/dart-core-library.html
* Guidelines (DO and DON'T) : https://dart.dev/guides/language/effective-dart/design
* Guidelines Types : https://dart.dev/guides/language/effective-dart/design#types
* https://www.reddit.com/r/dartlang/
* Dart/Python : https://www.reddit.com/r/dartlang/comments/gs4hlu/dart_is_now_7_on_the_most_loved_and_now_moved/fs3954s/
* Fluttering Dart : https://medium.com/tag/fluttering-dart/archive
* Making Dart a Better Language for UI : https://medium.com/dartlang/making-dart-a-better-language-for-ui-f1ccaf9f546c

**JSON**
* Instantly parse JSON in any language : https://app.quicktype.io/#l=dart, exemple : https://app.quicktype.io/?share=4Ik8Upww0mN33e2CBVmq


## SOMMAIRE

* [DART](#dart)
* [BONNES PRATIQUES](#bonnes-pratiques)
* [VARIABLES ET TYPES](#variables-et-types)   
   * [VARIABLES](#variables)
   * [STRING](#string)
   * [NUMBERS](#numbers)
   * [BOOLEANS](#booleans)
   * [LISTS](#lists)
   * [MAPS](#maps)
   * [SETS](#sets)
* [LES CONDITIONS](#les-conditions)   
   * [IF ELSE TERNAIRE](#if-else-ternaire)
   * [SWITCH](#switch)
* [LES BOUCLES](#les-boucles)   
   * [BOUCLE FOR](#boucle-for)
   * [BOUCLE WHILE](#boucle-while)
   * [ASSERT](#assert)
* [OPERATEURS](#operateurs)   
   * [ARITHMETIQUES](#arithmetiques)
   * [TYPE TEST OPERATORS](#type-test-operators)
   * [ASSIGNMENT OPERATORS](#assignment-operators)
   * [LOGICAL OPERATORS](#logical-operators)
   * [CASCADE NOTATION](#cascade-notation)
* [LES FONCTIONS](#les-fonctions)   
   * [FONCTIONS DE BASE](#fonctions-de-base)
   * [FONCTIONS AVEC PARAMETRES](#fonctions-avec-parametres)
   * [FONCTIONS AVEC RETOUR](#fonctions-avec-retour)
   * [OPTIONAL PARAMETERS](#optional-parameters)
   * [MAIN FUNCTION](#main-function)
   * [FUNCTION AS PARAMETER](#function-as-parameter)
   * [ANONYMOUS FUNCTIONS](#anonymous-functions)
   * [LEXICAL SCOPE](#lexical-scope)
   * [LEXICAL CLOSURES](#lexical-closures)
   * [TESTING FUNCTIONS FOR EQUALITY](#testing-functions-for-equality)
   * [RETURN VALUES](#return-values)
* [PROGRAMMATION ORIENTEE OBJET](#programmation-orientee-objet)   
   * [OBJET ET CLASSE](#objet-et-classe)
   * [RECUPERER LE TYPE D'UN OBJET](#recuperer-le-type-d-un-objet)
   * [GETTERS AND SETTERS](#getters-and-setters)
   * [HERITAGE](#heritage)
   * [POLYMORPHISME](#polymorphisme)
   * [LES ENUM](#les-enum)
   * [IMPLICIT INTERFACES](#implicit-interfaces)
   * [CLASSES ABSTRAITES](#classes-abstraites)
   * [METHODES ABSTRAITES](#methodes-abstraites)
   * [NOSUCHMETHOD](#nosuchmethod)
   * [EXTENSION METHODS](#extension-methods)
   * [MIXINS](#mixins)
   * [CLASS VARIABLES AND METHODS](#class-variables-and-methods)
* [EXCEPTIONS](#exceptions)   
   * [THROW](#throw)
   * [CATCH](#catch)
   * [FINALLY](#finally)
* [GENERICS](#generics)   
   * [EXEMPLES](#exemples)
   * [COLLECTION LITERALS](#collection-literals)
   * [PARAMETERIZED TYPES WITH CONSTRUCTORS](#parameterized-types-with-constructors)
   * [FIND TYPES](#find-types)
   * [RESTRICTING PARAMETERIZED TYPE](#restricting-parameterized-type)
   * [GENERIC METHODS](#generic-methods)
* [LIBRAIRIES ET VISIBILITE](#librairies-et-visibilite)   
   * [LIBRARIES](#libraries)
   * [LIBRARY PREFIX](#library-prefix)
   * [IMPORT A PART](#import-a-part)
   * [PRIVACY](#privacy)
   * [LAZY LOADING](#lazy-loading)
   * [CREATE LIBRARY](#create-library)
   * [SOME LIBRAIRIES](#some-library)   
      * [MATH LIBRARY](#math-library)
* [GENERATORS](#generators)
* [CALLABLE CLASS](#callable-class)
* [TYPEDEFS](#typedefs)
* [METADATA](#metadata)
* [COMMENTS](#comments)


## DART

* Lancé en 2011 par Google pour remplacer JavaScript
* Langage Front ET Back (serveur)
* Taillé pour la performance et les gros projets
* Mélange JAVA (orienté objet, typage), JavaScript (variables dynamiques, const, var, commentaires, String interpolation) et Python (print(), _fonction_privee)
* Typage optionnel (langage dynamique), mais peut imposer un typage fort (avec les generics)
* Dart est par défaut typé de façon statique (le contenu de la variable définira son type immuable) mais peut aussi, à l'instar de JavaScript être typé de façon dynamique (avec le mot clé ```dynamic```)
* Tout est objet sur Dart !
* Adresse en mémoire ? Pointeurs ?
```
It's not possible to access raw memory of Dart objects. 
Dart is a garbage collected language which means that Dart objects are not guaranteed to live at a
particular memory address as the garbage collector can (and certainly will) move these objects to
different memory locations during a garbage collection. 
Within the Dart virtual machine Dart objects are almost exclusively accessed and passed around via
handles and not raw pointers for this very reason.
```
* Instance variables are sometimes known as fields or properties.
* Dart supports generic types, like List```<int>``` (a list of integers) or List```<dynamic>``` (a list of objects of any type)
* Unlike Java, Dart doesn’t have the keywords public, protected, and private. If an identifier starts with an underscore (_), it’s private to its library.

## BONNES PRATIQUES
* Préférer un typage défini (```String, int, bool, ect```) à ```var``` ou ```dynamic```, sauf pour une utilisation spécifique (pour des raisons de sécurité et d'erreurs)

## VARIABLES ET TYPES

### VARIABLES
* When you want to explicitly say that no type is expected, use the special type ```dynamic```
```java
var name = "Pablo"; // name sera définitivement un String
print(name); // Pablo
name = "Georges";
print(name); // Georges
name = 33; /* error : A value of type 'int' can't be assigned to a variable 
of type 'String' - line 7 */

String nom = "Calembour"; // préciser le type
dynamic name = 'Bob'; // un objet sans restriction de type
int lineCount; // null

// final and constant variable : inchangeable
const lieuNaissance = "Marseille"; // const variables are implicitly final
const int annee = 1998; // a const variable is a compile-time constant
final parents = 2; // ne peut être assigné QU'UNE SEULE FOIS
final String passion = "Dérober des banques";

// compile time constant = a constant value that is known at compile time
private final int x = 10;
// the compiler will replace every occurrence of x in the code with literal 10

// You can change the value of a non-final, non-const variable, 
// even if it used to have a const value
var foo = const [];
foo = [1, 2, 3]; // OK. Was const []
```
### STRING
* https://dart.dev/guides/language/language-tour#strings
* https://api.dart.dev/stable/2.8.3/dart-core/String-class.html
* https://www.tutorialspoint.com/dart_programming/dart_programming_string.htm
```java
// String = immuable
var exemple = 'Dart is fun';
exemple = 'Dart is lame'; // OK, mais créé un nouvel objet en mémoire
var newExemple = exemple.substring(0, 5);

String citation = 'Jean-Mi a dit : "Il fait beau !"';
print(citation); // Jean-Mi a dit : "Il fait beau !"

String sentence = "C'est la vie";

String multiline = '''A
                      multiline
                      string'''; 
// marche avec les triples guillemets

// concaténation
'Dart ' + 'is ' + 'fun!'; // 'Dart is fun!'
'Dart ' 'is ' 'fun!';    // 'Dart is fun!'
// + simple = les $ (String interpolation)
// $variableName (or ${expression})
var language = 'dartlang';
'$language has ${language.length} letters'; // 'dartlang has 8 letters

// MAJUSCULE et minuscule
'alphabet'.toUpperCase(); // 'ALPHABET'
'ALPHABET'.toLowerCase(); // 'alphabet'

// ajout
var prenom = "Matthieu";
prenom += "x";
print(prenom); // Matthieux

// index
'DBABAB'[0]; // 'D'

// You can create a “raw” string by prefixing it with r:
var s = r'In a raw string, not even \n gets special treatment.';

// propriétés
"word".codeUnits // Returns an unmodifiable list of the UTF-16 code units of this string.
"word".isEmpty // Returns true if this string is empty.
"word".Length //Returns the length of the string including space, tab and newline characters

// autres méthodes
trim() // Returns the string without any leading and trailing whitespace.
compareTo() // Compares this object to another.
replaceAll() // Replaces all substrings that match the specified pattern with a given value.
split() // Splits the string at matches of the specified delimiter and returns a list of substrings.
substring() // Returns the substring of this string that extends from startIndex, inclusive, to endIndex, exclusive.
toString() // Returns a string representation of this object.
codeUnitAt() // Returns the 16-bit UTF-16 code unit at the given index.

// contains method
// Returns true if this string contains a match of other:
var string = 'Dart strings';
string.contains('D');                     // true
string.contains(new RegExp(r'[A-Z]'));    // true

// If startIndex is provided, this method matches only at or after that index:
string.contains('X', 1);                  // false
string.contains(new RegExp(r'[A-Z]'), 1); // false

// single quotes or double quotes ?
'single quotes' // selon Angela Yu (convention)
```
### NUMBERS
* https://dart.dev/guides/language/language-tour#numbers
* https://sites.google.com/site/dartlangexamples/api/dart-core/interfaces/comparable-hashable/num/double
```java
int entier = 33;
double decimal = 33.3; // nombre à virgule
var sansType = 24;

// Dart 2.1, integer literals are automatically converted to doubles when necessary:
double z = 1; // Equivalent to double z = 1.0.

// The num type includes basic operators such as
number + number 
number - number 
number / number
number ~/ number // division qui donne un entier
number * number
// abs(), ceil(), and floor(), among other methods
assert(2 + 3 == 5);
assert(2 - 3 == -1);
assert(2 * 3 == 6);
assert(5 / 2 == 2.5); // Result is a double
assert(5 ~/ 2 == 2); // Result is an int
assert(5 % 2 == 1); // Remainder
assert('5/2 = ${5 ~/ 2} r ${5 % 2}' == '5/2 = 2 r 1');

print(entier += 7); // 40

int nombre1 = 3;
int nombre2 = 4;

// subtitilités des divisions
print(nombre1 / nombre2); // 0.75
int resultInt = nombre1 ~/ nombre2; // 0
int resultFloor = (nombre1 / nombre2).floor(); // valeur plancher = 0
int resultCeil = (nombre1 / nombre2).ceil(); // valeur plafond = 1
var resultAbs = (nombre1 / nombre2).abs(); // valeur absolue (positive) = 0.75

// modulo (restant d'une division euclidienne)
print(nombre1 % nombre2); // 3

// String into number
// String -> int
var one = int.parse('1');
// String -> double
var onePointOne = double.parse('1.1');
// int -> String
String oneAsString = 1.toString();
// double -> String
String piAsString = 3.14159.toStringAsFixed(2);
assert(piAsString == '3.14');
```
### BOOLEANS
* https://dart.dev/guides/language/language-tour#booleans
* Avec Dart, on ne PEUT PAS utiliser 0 et 1 pour exprimer true/false
* The only value that is true is the boolean value true
* Unlike JavaScript, other values such as 1 or non-null object are not treated as true.
* In a boolean context, everything that is not true is converted to false.
* JavaScript has six other falsey values such as empty string, zero, null object, undefined, or NaN.
* In Dart, if an object is not the boolean value true, it is evaluated as false.
* http://blog.sethladd.com/2012/02/booleans-in-dart.html
* http://shailen.github.io/blog/2012/11/16/booleans-in-dart/
```java
bool DartIsCool = true;

// Check for an empty string.
var fullName = '';
assert(fullName.isEmpty);

// Check for zero.
var hitPoints = 0;
assert(hitPoints <= 0);

// Check for null.
var unicorn;
assert(unicorn == null);

// Check for NaN.
var iMeantToDoThis = 0 / 0;
assert(iMeantToDoThis.isNaN);
```
### LISTS
* Top 10 Array utility methods you should know : https://codeburst.io/top-10-array-utility-methods-you-should-know-dart-feb2648ee3a2
* https://dart.dev/guides/language/language-tour#lists
* Details and examples of using collection if and for : https://github.com/dart-lang/language/blob/master/accepted/2.3/control-flow-collections/feature-specification.md
* Generics : https://dart.dev/guides/language/language-tour#generics
* Collections: https://dart.dev/guides/libraries/library-tour#collections
```java
// initialiser une liste
var maListe = []; // préférable
var maListe = List();

var maListe = ["Pierre", "Paul", "Jacques"];
// Dart assume alors que c'est une liste de String
// et de String seulement => List<String> maListe = ...
// version explicite :
List<String> maListe2 = ["Pierre", "Paul", "Jacques"];

// propriétés d'une liste
print(maListe.length); // 3
print(maListe[0]); // Pierre
// first et last :
print(maListe.first); // Pierre
print(maListe.last); // Jacques
// indexOf
print(maListe.indexOf('Pierre')); // 0

// ajouter un élément
maListe.add("Georges"); // c'est un String, c'est OK
print(maListe); // [Pierre, Paul, Jacques, Georges]
maListe.add(1); // Error: The argument type 'int' can't be assigned to the parameter type 'String'
// préciser l'index d'insertion
maListe.insert(2, 'Jean') // [Pierre, Paul, Jean, Jacques]

// supprimer un élément
maListe.add("Pierre"); // [Pierre, Paul, Jacques, Georges, Pierre]
maListe.remove("Pierre"); // supprimer la PREMIERE occurence
print(maListe); // [Paul, Jacques, Georges, Pierre]
// sur l'index :
maListe.removeAt(0);
print(maListe); // [Jacques, Georges, Pierre]

// vider une liste
maListe.clear();

// une liste dynamique (sans restriction de type)
var maListe = []; // revient à List<dynamic> maListe = []
maListe.add("Georges");
maListe.add(1);
print(maListe); // [Georges, 1]

// spread operator (...) [Dart 2.3]
// use the spread operator (...) to insert all the elements of a list into another list:
var list1 = [1, 2, 3];
var list2 = [0, ...list1];
print(list2); // [0, 1, 2, 3]

// null-aware spread operator (...?) [Dart 2.3]
// If the expression to the right of the spread operator might be null, 
// you can avoid exceptions by using a null-aware spread operator (...?):
var list3;
var list4 = [0, ...?list3]; // pas d'erreurs
print(list4); // [0]

// collection if [Dart 2.3]
// to create a list with three or four items in it:
var promoActive = true;
var nav = [
  'Home',
  'Furniture',
  'Plants',
  if (promoActive) 'Outlet'
];
print(nav); // [Home, Furniture, Plants, Outlet]

// collection for [Dart 2.3]
// to manipulate the items of a list before adding them to another list:
var listOfInts = [1, 2, 3];
var listOfStrings = [
  '#0',
  for (var i in listOfInts) '#$i'
];
print(listOfStrings); // [#0, #1, #2, #3]

// List comprehension, like Python ?
//Where in Python you'd do:
numbers = [1, 2, 3, 4, 5, 6]
even_squares = [i * i for i in numbers if i % 2 == 0]

// In Dart, you can now do:
var numbers = [1, 2, 3, 4, 5, 6];
var evenSquares = [for (var i in numbers) if (i.isEven) i * i];
// and :
var chapters = [
  "introduction",
  for (var chapter in part1) chapter,
  for (var chapter in part2)
    if (chapter.isTranslated) chapter.translation,
  ...backMatter,
};

// Using for and if in an empty collection literal gives you a syntax not too far 
// from the special "list comprehension" syntax supported by some other languages like Python:
[for (var i = 1; i <= 5; i++) if (i.isOdd) i * i] // [1, 9, 25].

// You can even nest for:
[for (var x in hor) for (var y in vert) Point(x, y)]
```
### MAPS
* https://dart.dev/guides/language/language-tour#maps
* Équivalent des dictionnaires
* Dictionnaire de **clés** et **valeurs**
* spread operator proposal : https://github.com/dart-lang/language/blob/master/accepted/2.3/spread-collections/feature-specification.md
* control flow collections proposal : https://github.com/dart-lang/language/blob/master/accepted/2.3/control-flow-collections/feature-specification.md
* Generics : https://dart.dev/guides/language/language-tour#generics
* Maps : https://dart.dev/guides/libraries/library-tour#maps
```java
var maMap = {
  // clé: valeur,
  "Pierre": 21,
  "Paul": 23,
  "Jacques": 183,
};
// Dart déduit qu'il s'agit de Map<String, int> maMap

print(maMap.length); // 3

// initaliser un map
var gifts = Map();
gifts['first'] = 'partridge';
gifts['second'] = 'turtledoves';
gifts['fifth'] = 'golden rings';
print(gifts); // {first: partridge, second: turtledoves, fifth: golden rings}

var nobleGases = Map();
nobleGases[2] = 'helium';
nobleGases[10] = 'neon';
nobleGases[18] = 'argon';
print(nobleGases); // {2: helium, 10: neon, 18: argon}

// ajouter un élément (similaire à JS)
maMap["Georges"] = 1248;
print(maMap); // {Pierre: 21, Paul: 23, Jacques: 183, Georges: 1248}

// récupérer un élément (similaire à JS)
var agePierre = maMap["Pierre"];
print(agePierre); // 21
// (!) If you look for a key that isn’t in a map, 
// you get a null in return

// enlever un élément
maMap.remove("Pierre"); // remove(clé)
print(maMap); // {Paul: 23, Jacques: 183, Georges: 1248}

// tout supprimer
maMap.clear();
print(maMap); // {}

// As of Dart 2.3, maps support spread operators (... and ...?) and collection if and for, 
// just like lists do
Map<String, WidgetBuilder>.fromIterable(
  allGalleryDemos.where((demo) => demo.exists),
  key: (demo) => '${demo.routeName}',
  value: (demo) => demo.buildRoute,
);
// Can be rewritten as:
{
  for (var demo in allGalleryDemos)
    if (demo.exists) '${demo.routeName}': demo.buildRoute,
};
```
### SETS
* https://dart.dev/guides/language/language-tour#sets
* Liste **désordonnée** d'éléments **uniques**
* spread operator proposal : https://github.com/dart-lang/language/blob/master/accepted/2.3/spread-collections/feature-specification.md
* control flow collections proposal : https://github.com/dart-lang/language/blob/master/accepted/2.3/control-flow-collections/feature-specification.md
* Generics : https://dart.dev/guides/language/language-tour#generics
* Sets : https://dart.dev/guides/libraries/library-tour#sets
* If you forget the type annotation on {} or the variable it’s assigned to, then Dart creates an object of type Map```<dynamic, dynamic>```
```java
var halogens = {'fluorine', 'chlorine', 'bromine', 'iodine', 'astatine'};

// éléments uniques
var ingredients = Set();
ingredients.addAll(['gold', 'titanium', 'xenon']);
ingredients.length // 3
// Adding a duplicate item has no effect.
ingredients.add('gold');
ingredients.length // 3

// To create an empty set, use {} preceded by a type argument, 
// or assign {} to a variable of type Set:
var names = <String>{};
// Set<String> names = {}; // This works, too.
// var names = {}; // Creates a map, not a set.

// ajouter des éléments
var elements = <String>{};
elements.add('fluorine');
elements.addAll(halogens);

elements.length // 5

// Use contains() and containsAll() to check whether one or more objects are in a set:
var ingredients = Set();
ingredients.addAll(['gold', 'titanium', 'xenon']);

// Check whether an item is in the set.
assert(ingredients.contains('titanium'));

// Check whether all the items are in the set.
assert(ingredients.containsAll(['titanium', 'xenon']));

// As of Dart 2.3, sets support spread operators (... and ...?) and collection ifs and fors, just like lists do
```

## LES CONDITIONS

### IF ELSE TERNAIRE
```java
// opérateurs
// ==, !=, >, <, >=, <=
  
var age = 18;

if (age >= 18) {
  print("Tu es majeur");
} else {
  print("Tu es mineur");
};

// vérifier le contraire
var storm = false;
if (!storm) { // !variable
  print("Go !");
} else {
  print("Jesus Fuckin' Christ don't go !");
}

// opération ternaire
// condition ? expr1 : expr2
var isPublic = false;
var visibility = isPublic ? 'public' : 'private';
print(visibility); // private

// opération ternaire sur un null potentiel
// expr1 ?? expr2
// If expr1 is non-null, returns its value; otherwise, evaluates and returns the value of expr2
String playerName(String name) => name ?? 'Guest';
// renvoie 'Guest' si name est null
// équivalent à : 
// String playerName(String name) => name != null ? name : 'Guest';
```
### SWITCH
```java
var command = 'OPEN';
switch (command) {
  case 'CLOSED':
    executeClosed();
    break; // obligatoire, erreur levée si non appliqué
  case 'PENDING':
    executePending();
    break;
  case 'APPROVED':
    executeApproved();
    break;
  case 'DENIED':
    executeDenied();
    break;
  case 'OPEN':
    executeOpen();
    break;
  default: // exécuté si aucun match
    executeUnknown();
}

// Dart does support empty case clauses, allowing a form of fall-through:
var command = 'CLOSED';
switch (command) {
  case 'CLOSED': // Empty case falls through.
  case 'NOW_CLOSED':
    // Runs for both CLOSED and NOW_CLOSED.
    executeNowClosed();
    break;
}

// If you really want fall-through, you can use a continue statement and a label:
var command = 'CLOSED';
switch (command) {
  case 'CLOSED':
    executeClosed();
    continue nowClosed;
  // Continues executing at the nowClosed label.
  nowClosed:
  case 'NOW_CLOSED':
    // Runs for both CLOSED and NOW_CLOSED.
    executeNowClosed();
    break;
}
```

## LES BOUCLES

### BOUCLE FOR
```java
// FizzBuzz
for (var i = 1; i <= 100; i++) {
  if (i % 15 == 0) {
    print("FizzBuzz");
  } else if (i % 3 == 0) {
    print("Fizz");
  } else if (i % 5 == 0) {
    print("Buzz");
  } else {
    print(i);
  }
}

for (var i = 0; i < 10; i++) {
  print("Salut ${i + 1} fois");
};

// for.. in sur un itérable
var collection = [0, 1, 2];
for (var x in collection) {
  print(x); // 0 1 2
}

// forEach
var candidats = ["Pierre", "Paul", "Jean-Framboisier"];
candidats.forEach((candidat) => print(candidat));
// candidats.forEach((candidat) {
//   print(candidat)
// )};

// sur une map
var badGuys = {
  1: "Dark Vador",
  2: "The hunter in Bambi",
  3: "My neighbor",
};

badGuys.forEach((key, value) => print("Le bad guy numéro ${key} est ${value}"));
// Le bad guy numéro 1 est Dark Vador

// dernier exemple :
Map etudiants = {
  "Jo": false,
  "Giselle": true,
  "Yo": false,
  "Clémentine": true,
  "Quentin": false,
  "Miriam": true,
};

// forEach
etudiants.forEach((etudiant, estFille) {
  if (estFille) {
    print("${etudiant} est une fille !");
  }
});

// forEach ternaire
etudiants.forEach((etudiant, estFille) => estFille ? print("${etudiant} est une fille !") : null);
```
### BOUCLE WHILE
```java
// while = tant que condition => faire quelquechose
// vérification en premier
var goals = 0;
while (goals < 3) {
  print("Tranquille, on a pris que ${goals} buts..");
  goals++;
}

// do while = faire quelquechose, tant que condition
// action faite avant la vérification
do {
  print("Tranquille, on a pris que ${goals} buts..");
  goals++;
} while (goals < 3);
```
### BREAK & CONTINUE
```java
// Use break to stop looping:
while (true) {
  if (shutDownRequested()) break;
  processIncomingRequests();
}

// Use continue to skip to the next loop iteration:
for (int i = 0; i < candidates.length; i++) {
  var candidate = candidates[i];
  if (candidate.yearsExperience < 5) {
    continue;
  }
  candidate.interview();
}
```
### ASSERT
```java
// use an assert statement — assert(condition, optionalMessage); 
// — to disrupt normal execution if a boolean condition is false

// Make sure the variable has a non-null value.
assert(text != null);

// Make sure the value is less than 100.
assert(number < 100);

// Make sure this is an https URL.
assert(urlString.startsWith('https'));

// To attach a message to an assertion, add a string as the second argument to assert.
assert(urlString.startsWith('https'),
    'URL ($urlString) should start with "https".');

// If the expression’s value is true, the assertion succeeds and execution continues. 
// If it’s false, the assertion fails and an exception (an AssertionError) is thrown

// Flutter enables assertions in debug mode.
// In production code, assertions are ignored, and the arguments to assert aren’t evaluated
```

## OPERATEURS

### ARITHMETIQUES
* [Opérateurs arithmétiques](#numbers)
### TYPE TEST OPERATORS
* as
```java
// Use the as operator to cast an object to a particular type 
// if and only if you are sure that the object is of that type. Example:
(emp as Person).firstName = 'Bob'; // throw error if false
```
* is
```java
// If you aren’t sure that the object is of type T, 
// then use is T to check the type before using the object.
if (emp is Person) {
  // Type check
  emp.firstName = 'Bob'; // no error if false
}
```
### ASSIGNMENT OPERATORS
```java
// Assign value to a
a = value;
// Assign value to b if b is null; otherwise, b stays the same
b ??= value;

// Compound assignment operators such as += combine an operation with an assignment.
= 	  –=  	/= 	  %= 	  >>= 	^=
+= 	  *=  	~/= 	<<= 	&= 	  |=

// explications
// For an operator op: 	a op= b => a = a op b
a += b =>	a = a + b
```
### LOGICAL OPERATORS
```java
!expr // inverts the following expression (changes false to true, and vice versa)
|| 	// logical OR
&& 	// logical AND

// exemple
if (!done && (col == 0 || col == 3)) {
  // ...Do something...
}
```
### CASCADE NOTATION
```java
// allow you to make a sequence of operations on the same object
//  In addition to function calls, you can also access fields on that same object

querySelector('#confirm') // Get an object.
  ..text = 'Confirm' // Use its members.
  ..classes.add('important')
  ..onClick.listen((e) => window.alert('Confirmed!'));

// vaut :
var button = querySelector('#confirm');
button.text = 'Confirm';
button.classes.add('important');
button.onClick.listen((e) => window.alert('Confirmed!'));

// You can also nest your cascades. For example:
final addressBook = (AddressBookBuilder()
      ..name = 'jenny'
      ..email = 'jenny@example.com'
      ..phone = (PhoneNumberBuilder()
            ..number = '415-555-0100'
            ..label = 'home')
          .build())
    .build();
```

## LES FONCTIONS
* Functions are objects and have a type, Function
* Functions can be assigned to variables or passed as arguments to other functions
* Effective Dart recommends type annotations for public APIs
### FONCTIONS DE BASE
```java
  // ici indiquer void est optionnel
  // mais recommandé
  void fonctionQuiRenvoieRien() {
    print("Bah OK");
  };
  
  fonctionQuiRenvoieRien(); // Bah OK
```
### FONCTIONS AVEC PARAMETRES
```java
void saluer(String prenom) {
  print("Salut ${prenom}");
}

saluer("Pablo"); // Salut Pablo
```
### FONCTIONS AVEC RETOUR
```java
String avisTouriste(String ville) {
  if (ville == "Bordeaux") {
    return "bien";
  } else {
    return "naze";
  }
};

var avisAuxerre = avisTouriste("Auxerre");
print("Auxerre, c'est ${avisAuxerre}"); // Auxerre, c'est naze

int aire(int long, int larg) {
  return long * larg;
}
print(aire(4, 2)); // 8

// avec les fonctions fléchées
int aireSimplifie(int lon, int lar) => lon * lar;
print(aireSimplifie(4, 2)); // 8

// rappel : 
// For functions that contain just one expression, you can use a shorthand syntax:
bool isNoble(int atomicNumber) => _nobleGases[atomicNumber] != null;
// The => expr syntax is a shorthand for { return expr; }. 
// The => notation is sometimes referred to as arrow syntax
```
### OPTIONAL PARAMETERS
```java
// ◘ NAMED PARAMETERS (kwargs (key arguments) : parameters in map)

// When defining a function, use {param1, param2, …} to specify named parameters:
void enableFlags({bool bold, bool hidden}) {...}
// When calling a function, you can specify named parameters using paramName: value.
enableFlags(bold: true, hidden: false);
// Although named parameters are a kind of optional parameter, 
// you can annotate them with @required to indicate that the parameter is mandatory
const Scrollbar({Key key, @required Widget child})
// To use the @required annotation, depend on the meta package and import package:meta/meta.dart


// ◘ POSITIONAL PARAMETERS

// Wrapping a set of function parameters in [] marks them as optional positional parameters:
String say(String from, String msg, [String device]) {
  var result = '$from says $msg';
  if (device != null) {
    result = '$result with a $device';
  }
  return result;
}

assert(say('Bob', 'Howdy') == 'Bob says Howdy'); // without the optional parameter
assert(say('Bob', 'Howdy', 'smoke signal') ==
    'Bob says Howdy with a smoke signal');


// ◘ DEFAULT PARAMETER VALUE

/// Sets the [bold] and [hidden] flags ...
void enableFlags({bool bold = false, bool hidden = false}) {...}
// bold will be true; hidden will be false.
enableFlags(bold: true);
// If no default value is provided, the default value is null

// The next example shows how to set default values for positional parameters:
String say(String from, String msg,
    [String device = 'carrier pigeon', String mood]) {
  var result = '$from says $msg';
  if (device != null) {
    result = '$result with a $device';
  }
  if (mood != null) {
    result = '$result (in a $mood mood)';
  }
  return result;
}

assert(say('Bob', 'Howdy') ==
    'Bob says Howdy with a carrier pigeon');

// You can also pass lists or maps as default values:
void doStuff(
    {List<int> list = const [1, 2, 3],
    Map<String, String> gifts = const {
      'first': 'paper',
      'second': 'cotton',
      'third': 'leather'
    }}) {
  print('list:  $list');
  print('gifts: $gifts');
}
```
### MAIN FUNCTION
* Point d'entrée de l'application
* Retourne void()
* Has an optional List<String> parameter for arguments
* You can use the args library to define and parse command-line arguments : https://pub.dev/packages/args
```java
// Here’s an example of the main() function for a web app:
void main() {
  querySelector('#sample_text_id')
    ..text = 'Click me!'
    ..onClick.listen(reverseText);
}

// Here’s an example of the main() function for a command-line app 
// that takes arguments:
// Run the app like this: dart args.dart 1 test
void main(List<String> arguments) {
  print(arguments);

  assert(arguments.length == 2);
  assert(int.parse(arguments[0]) == 1);
  assert(arguments[1] == 'test');
}
```
### FUNCTION AS PARAMETER
```java
// You can pass a function as a parameter to another function :

void printElement(int element) {
  print(element);
}

var list = [1, 2, 3];
// Pass printElement as a parameter.
list.forEach(printElement);

// You can also assign a function to a variable, such as:
var loudify = (msg) => '!!! ${msg.toUpperCase()} !!!'; // anonymous function
assert(loudify('hello') == '!!! HELLO !!!');
```
### ANONYMOUS FUNCTIONS
* A nameless function is called an **anonymous function**, or sometimes a **lambda** or **closure**
```java
// The code block that follows contains the function’s body:
([[Type] param1[, …]]) {
  codeBlock;
}; 

// an anonymous function with an untyped parameter, item
// The function, invoked for each item in the list, 
// prints a string that includes the value at the specified index
var list = ['apples', 'bananas', 'oranges'];
list.forEach((item) {
  print('${list.indexOf(item)}: $item'); // forEach method call every round the anonymous function
});
// 0: apples
// 1: bananas
// 2: oranges

// If the function contains only one statement, you can shorten it using arrow notation :
list.forEach(
    (item) => print('${list.indexOf(item)}: $item'));
```
### LEXICAL SCOPE
```java
bool topLevel = true;

void main() {
  var insideMain = true;

  void myFunction() {
    var insideFunction = true;

    void nestedFunction() {
      var insideNestedFunction = true;

      assert(topLevel); // nestedFunction() can use variables from every level
      assert(insideMain); // all the way up to the top level
      assert(insideFunction);
      assert(insideNestedFunction);
    }
  }
}

// variables locales et globales (comme Python)
// les variables définies dans la fonction appartiennent uniquement à la fonction
// depuis une fonction, on a accès aux variables globales
// espace global = code du fichier
void main() {
  
  var a = 5;
  var c = 12;

  void fonction() {
    a = 10; // espace local => création d'une variable locale
    var b = 5;
    print(a); // affiche 10, car variable dans le même espace
    print(c); // affiche 12, car variable dans l'espace global
  };
    

  print(a); // 5, correspond à la variable a de l'espace global
  print(b); // erreur, b n'existe que dans l'espace local
  fonction(); // 10, 12
}
```
### LEXICAL CLOSURES
* Fonction qui garde en mémoire des variables comme paramètres
```java
/// Returns a function that adds [addBy] to the
/// function's argument.
Function makeAdder(int addBy) {
  return (int i) => addBy + i;
}

void main() {
  // Create a function that adds 2.
  var add2 = makeAdder(2);

  // Create a function that adds 4.
  var add4 = makeAdder(4);

  assert(add2(3) == 5);
  assert(add4(3) == 7);
}
```
### TESTING FUNCTIONS FOR EQUALITY
```java
// Here’s an example of testing top-level functions, static methods, 
// and instance methods for equality:

void foo() {} // A top-level function

class A {
  static void bar() {} // A static method
  void baz() {} // An instance method
}

void main() {
  var x;

  // Comparing top-level functions.
  x = foo;
  assert(foo == x);

  // Comparing static methods.
  x = A.bar;
  assert(A.bar == x);

  // Comparing instance methods.
  var v = A(); // Instance #1 of A
  var w = A(); // Instance #2 of A
  var y = w;
  x = w.baz;

  // These closures refer to the same instance (#2),
  // so they're equal.
  assert(y.baz == x);

  // These closures refer to different instances,
  // so they're unequal.
  assert(v.baz != w.baz);
}
```
### RETURN VALUES
* All functions return a value
* If no return value is specified, the statement return null
```java
foo() {}

assert(foo() == null);
```

## PROGRAMMATION ORIENTEE OBJET

### OBJET ET CLASSE
* Rappel : avec Dart, tout est objet (comme Python)
```java
void main() {
  var punto = Voiture("Fiat", 2011); // le new est optionnel depuis Dart 2
  print(punto.marque); // Fiat
  punto.rouler(); // Vroum vroum !
  
  var clio = Voiture("Renault", 2007);
}

class Voiture {
  
  String marque; // null par défaut
  String modele;
  int kilometrage;
  int annees;
  String couleur;

  // If you don’t declare a constructor, a default constructor is provided for you
  Voiture() {}
  // The default constructor has no arguments and invokes the no-argument constructor in the superclass
  // if you declare a constructor there will be no default constructor
  
  // (!) Constructors aren’t inherited !
  // Subclasses don’t inherit constructors from their superclass
  // A subclass that declares no constructors has only the default (no argument, no name) constructor

  // constructeur (ancienne méthode)
  Voiture(String marque, int annees) {
    this.marque = marque; // this = l'instance
    this.annees = annees;
  }
  
  // (!) Dart ajoute du sucre syntaxique pour déclarer un constructeur:
  Voiture(this.marque, this.annees);

  // paramètres nommés
  Voiture({String marque, int annees}) {
    this.marque = marque; // this = l'instance
    this.annees = annees;
  }

  // (!) nouvelle méthode pour les paramètres nommés:
  Voiture({this.marque, this.annees});

  // voiture = Voiture(marque: 'Whatever', annees: 2000);

  // Named constructor
  // to implement multiple constructors for a class or to provide extra clarity
  // not inherited by a subclass, like all constructors
  Voiture.origin() {
    marque = "X";
    annees = 0;
  }
  
  // méthode
  void rouler() {
    print("Vroum vroum !");
  }
}
```
### RECUPERER LE TYPE D UN OBJET
```java
// use Object’s runtimeType property, which returns a Type object.
print('The type of a is ${a.runtimeType}');
```
### ENCAPSULATION
```java
class QuizBrain {
  int _questionNumber = 0;

  // propriété privée, inaccessible depuis l'extérieur
  List<Question> _questionBank = [
    Question('Some cats are actually allergic to humans', true),
    Question('You can lead a cow down stairs but not up stairs.', false),
    // ... 
  ];

  // méthode qui interagit avec une propriété privée
  void nextQuestion() {
    if (_questionNumber < _questionBank.length - 1) {
      _questionNumber++;
    }
  }

  // getter 1
  // appel : quizBrain.getQuestionText();
  String getQuestionText() {
    return _questionBank[_questionNumber].questionText;
  }

  // getter 2
  // appel : quizBrain.getQuestionAnswer();
  bool getCorrectAnswer() {
    return _questionBank[_questionNumber].questionAnswer;
  }
}
```
### GETTERS AND SETTERS
* Each instance variable has an implicit getter, plus a setter if appropriate
* You can create additional properties by implementing getters and setters, using the get and set keywords:
```java
class Rectangle {
  double left, top, width, height; // (1)

  Rectangle(this.left, this.top, this.width, this.height);

  // Define two calculated properties: right and bottom.
  double get right => left + width;
  set right(double value) => left = value - width; // (2)
  double get bottom => top + height;
  set bottom(double value) => top = value - height;
}

void main() {
  var rect = Rectangle(3, 4, 20, 15);
  assert(rect.left == 3); // appel du setter par défaut (1)
  rect.right = 12; // appel du setter rajouté (2)
  assert(rect.left == -8);
}
```
### HERITAGE
* There’s no final class in Dart, so a class can always be extended
* https://stackoverflow.com/questions/13272035/how-do-i-call-a-super-constructor-in-dart
* https://www.reddit.com/r/dartlang/comments/5r02tm/supercall_must_be_last_in_initializer_list/
```java
void main() {
  var cabriolet = Cabriolet("Peugeot", 2000, 200);
  print(cabriolet.vitesseMax); // 200
  cabriolet.ouvrirToit(); // Ouverture du toit...
  cabriolet.rouler(); // Vroum vroum !
}

class Voiture {
  
  String marque;
  String modele;
  int kilometrage;
  int annees;
  String couleur;
  
  Voiture(this.marque, this.annees);
  
  // méthode
  void rouler() {
    print("Vroum vroum !");
  }
}

class Cabriolet extends Voiture {
  
  int ouvertureToit = 3;
  int vitesseMax;
  
  // chaque classe fille doit réécrire son constructeur
  // super = la classe mère
  Cabriolet(String marque, int annees, int vitesseMax) : super(marque, annees) {
    this.vitesseMax = vitesseMax;
  }

  // façon privilégiée si le constructeur fille a des variables à initialiser :
  Cabriolet(String marque, int annees, int vitesseMax) : 
    this.vitesseMax = vitesseMax,
    super(marque, annees);
  
  void ouvrirToit() {
    print("Ouverture du toit...");
  }
}

// Named conbstructors
class Cat {
  DateTime birthday;  
  
  // named
  Cat.baby() {
    birthday = DateTime.now();
  }
}

// an example with both default constructor and named constructor:
class Foo {
  Foo(int a, int b) {
    // Code of constructor
  }

  Foo.named(int c, int d) {
    // Code of named constructor
  }
}

class Bar extends Foo {
  Bar(int a, int b) : super(a, b);
}

class Baz extends Foo {
  Baz(int c, int d) : super.named(c, d);  
}


// autre exemple, plus complexe, avec des paramètres nommés :
class A {
  String title;
  String content;
  IconData iconData;
  Function onTab;
  A({this.title, this.content, this.iconData, this.onTab}); // constructor A
}

class B extends A {
  bool read; // new variable
  B({title, content, iconData, onTab, this.read}) : super(title: title, content: content, iconData: iconData, onTab: onTab);
}

// If you want to initialize instance variables in the subclass, 
// the super() call must be last in an initializer list :
class CBar extends Foo {
  int c;

  CBar(int a, int b, int cParam) :
    c = cParam,
    super(a, b);
}

// Redirecting constructors
// A redirecting constructor’s body is empty, 
// with the constructor call appearing after a colon (:)
class Cat {
  DateTime birthday;
 
  // main cosntructor
  Cat(this.birthday); 
  
  // delegating to main constructor
  Cat.withBirthday(DateTime birthday) : this(birthday);
}
```
### POLYMORPHISME
* Représente l'abilité d'un objet à copier le comportement d'un autre objet
* Désigne le fait de pouvoir appeler la même méthode dans des objets différents
* Et donc d'effectuer la même action, dans des objets différents
* Idée : remplir le même contrat, même si l'objet est différent
* Exemple : appeler la fonction donnerRayon() chez les classes Forme, Rectangle, Carre, ect.
* Le résultat est donc en adéquation avec l'objet : il est malléable, flexible
```java
void main() {
  
  var tri = Triangle(2, 4);
  print(tri.computeArea());
  // Calcul de l'aire en cours...
  // 4
  
  var carre = Square(2, 4);
  print(carre.computeArea());
  // Calcul de l'aire en cours...
  // 8
}

class Form {
  
  double width;
  double height;
  
  Form(this.width, this.height);
  
  // contrat par défaut
  double computeArea() {
    print("Calcul de l'aire en cours...");
  }
}

class Square extends Form {
  
  Square(double width, double height) : super(width, height);
  
  // étendre la méthode mère
  @override
  double computeArea() {
    super.computeArea(); // appeler la méthode mère
    return width * height;
  }
}

class Triangle extends Form {
  
  Triangle(double width, double height) : super(width, height);
  
  @override
  double computeArea() {
    super.computeArea();
    return width * height / 2;
  }
}
```
### LES ENUM
* Comme les types énumérés en Java
* Classe qui renferme un nombre déterminés de constantes
* But = restreindre les valeurs possibles d'une variable à une gamme prédéterminée
* You can’t subclass, mix in, or implement an enum
* You can’t explicitly instantiate an enum
```java
void main() {
  
  var appareil = Flash.auto; // état du flash de l'appareil
  
  switch (appareil){
    case Flash.auto:
      print("L'appareil est en mode [FLASH AUTO]");
      break;
    case Flash.off:
      print("L'appareil est en mode [FLASH OFF]");
      break;
    case Flash.on:
      print("L'appareil est en mode [FLASH ON]");
      break;
      // pas besoin de défaut
      // enum veille à ce que tous les cas soient représentés
  }
}

enum Flash {
  auto,
  off,
  on,
}

// En détails (doc officielle) :
enum Color { red, green, blue }

// Each value in an enum has an index getter, 
// which returns the zero-based position of the value in the enum declaration
assert(Color.red.index == 0);
assert(Color.green.index == 1);
assert(Color.blue.index == 2);

// To get a list of all of the values in the enum, use the enum’s values constant.
List<Color> colors = Color.values;
assert(colors[2] == Color.blue);

// ou can use enums in switch statements, 
// and you’ll get a warning if you don’t handle all of the enum’s values:
var aColor = Color.blue;

switch (aColor) {
  case Color.red:
    print('Red as roses!');
    break;
  case Color.green:
    print('Green as grass!');
    break;
  default: // Without this, you see a WARNING.
    print(aColor); // 'Color.blue'
}
```
### IMPLICIT INTERFACES
* Unlike other traditional programming languages like C# and JAVA, Dart does not have explicit interface types
* Each class, by default, defines its own interface composed of public fields and methods (except constructors)
* So, every class can act as an interface in Dart
* Chaque classe peut jouer le rôle d'interface
* On implémente une interface avec le mot-clé "implements"
* Une classe peut implémenter plusieurs interfaces
* Elle doit obligatoirement réécrire les méthodes/attributs de l'interface
```java
void main() {
  // call function
  String greetBob(Person person) => person.greet('Bob');
  
  print(greetBob(Person('Kathy'))); // Hello, Bob. I am Kathy.
  print(greetBob(Impostor())); // Hi Bob. Do you know who I am?

  var imposteur = Impostor();
  print(imposteur._name); // Imposteur
  var jean = Person("Jean");
  print(jean._name); // Jean
}

// A person. The implicit interface contains greet().
class Person {
  // In the interface, but visible only in this library.
  final _name;

  // Not in the interface, since this is a constructor.
  Person(this._name);

  // In the interface.
  String greet(String who) => 'Hello, $who. I am $_name.';
}

// An implementation of the Person interface.
class Impostor implements Person {
  // mandatory : getter of the interface _name field
  get _name => 'Imposteur';

  // rewrite the method of the Person interface
  String greet(String who) => 'Hi $who. Do you know who I am?';
}

// specifying that a class implements multiple interfaces:
class Point implements Comparable, Location {...}
```

### CLASSES ABSTRAITES
* Ne peuvent être instancialisées
* But = définir des interfaces, établir un brouillon, un concept
* Peuvent avoir des méthodes abstraites
```java
// This class is declared abstract and thus
// can't be instantiated.
abstract class AbstractContainer {
  // Define constructors, fields, methods...

  void updateChildren(); // Abstract method.
}
```
### METHODES ABSTRAITES
* Elle sont justes initialisées et demandent à être implémentées (ré-écrites) dans chacune de ses instances
* Elle sont vides
* Seulement présentes dans les classes abstraites
```java
abstract class Doer {
  // Define instance variables and methods...

  void doSomething(); // Define an abstract method.
}

class EffectiveDoer extends Doer {

  void doSomething() {
    // Provide an implementation, so the method is not abstract here...
  }
}
```
### NOSUCHMETHOD
* But = réagir quand le code appelle une méthode inconnue
* https://github.com/dart-lang/sdk/blob/master/docs/language/informal/nosuchmethod-forwarding.md
```java
class A {
  // Unless you override noSuchMethod, using a
  // non-existent member results in a NoSuchMethodError.
  @override
  void noSuchMethod(Invocation invocation) {
    print('You tried to use a non-existent member: ' +
        '${invocation.memberName}');
  }
}
```
### EXTENSION METHODS
* Depuis Dart 2.7
* Fonctions provenant de modules, comme Python
* Utilisable directement après importation, sans préfixe
```java
// extension method on String named parseInt() that’s defined in string_apis.dart:
import 'string_apis.dart';
...
print('42'.padLeft(5)); // Use a String method.
print('42'.parseInt()); // Use an extension method.

```
### MIXINS
* But = ajouter des fonctionnalités à une classe
* A class that contains methods for use by other classes
* Unlike the interface and inheritance approach, a mixin doesn’t have to be the parent class of those other classes
* A way of reusing a class’s code in multiple class hierarchies
* Another way to add functionalities to your class because in Dart multi extends doesn't exist 
* One usually put common functions inside a mixin
* To use a mixin, use the "with" keyword followed by one or more mixin names
```java
class Musician extends Performer with Musical {
  // ···
}

class Maestro extends Person
    with Musical, Aggressive, Demented {
  Maestro(String maestroName) {
    name = maestroName;
    canConduct = true;
  }
}

// To implement a mixin, create a class that extends Object and declares no constructors
// use the mixin keyword instead of class
mixin Musical {
  bool canPlayPiano = false;
  bool canCompose = false;
  bool canConduct = false;

  void entertainMe() {
    if (canPlayPiano) {
      print('Playing piano');
    } else if (canConduct) {
      print('Waving hands');
    } else {
      print('Humming to self');
    }
  }
}

// To specify that only certain types can use the mixin — for example, 
// so your mixin can invoke a method that it doesn’t define — 
// use on to specify the required superclass:
mixin MusicalPerformer on Musician {
  // ···
}
```
### CLASS VARIABLES AND METHODS
* Mot-clé "static"
* Variables et méthodes attachées à la classe
* Elle ne peuvent être appelées que sur leur classe
```java
// ◘ Static variables

// Static variables (class variables) are useful for class-wide state and constants:
class Queue {
  static const initialCapacity = 16;
  // ···
}

void main() {
  assert(Queue.initialCapacity == 16);
}

// ◘ Static methods
// Static methods (class methods) do not operate on an instance, 
// and thus do not have access to this
import 'dart:math';

class Point {
  double x, y;
  Point(this.x, this.y);

  static double distanceBetween(Point a, Point b) {
    var dx = a.x - b.x;
    var dy = a.y - b.y;
    return sqrt(dx * dx + dy * dy);
  }
}

void main() {
  var a = Point(2, 2);
  var b = Point(4, 4);
  var distance = Point.distanceBetween(a, b);
  assert(2.8 < distance && distance < 2.9);
  print(distance);
}
```

## EXCEPTIONS
* In contrast to Java, all of Dart’s exceptions are unchecked exceptions
* Methods do not declare which exceptions they might throw, and you are not required to catch any exceptions
* Dart provides Exception and Error types, as well as numerous predefined subtypes
* Dart programs can throw any non-null object—not just Exception and Error objects—as an exception
* You can define your own exceptions

### THROW
```java
// Here’s an example of throwing, or raising, an exception:
throw FormatException('Expected at least 1 section');
```
### CATCH
* To handle code that can throw more than one type of exception, you can specify multiple catch clauses
* The first catch clause that matches the thrown object’s type handles the exception
* If the catch clause does not specify a type, that clause can handle any type of thrown object
```java
try {
  breedMoreLlamas();
} on OutOfLlamasException {
  // A specific exception
  buyMoreLlamas();
} on Exception catch (e) {
  // Anything else that is an exception
  print('Unknown exception: $e');
} catch (e) {
  // No specified type, handles all
  print('Something really unknown: $e');
}

// (!) One can use either on or catch or both. 
// Use "on" when you need to specify the exception type. 
// Use "catch" when your exception handler needs the exception object.


// You can specify one or two parameters to catch()
// The first is the exception that was thrown, and the second is the stack trace 
// (a StackTrace object)
try {
  // ···
} on Exception catch (e) {
  print('Exception details:\n $e');
} catch (e, s) {
  print('Exception details:\n $e');
  print('Stack trace:\n $s');
}

// To partially handle an exception, while allowing it to propagate, 
// use the "rethrow" keyword :
void main() {
  try {
    misbehave(); // faulty function
  } catch (e) { // retrieve faulty function error
    print('main() finished handling ${e.runtimeType}.');
  }
  
  // console :
  // misbehave() partially handled JsNoSuchMethodError.
  // main() finished handling JsNoSuchMethodError.
}

void misbehave() {
  try {
    dynamic foo = true;
    print(foo++); // Runtime error
  } catch (e) {
    print('misbehave() partially handled ${e.runtimeType}.');
    rethrow; // Allow callers to see the exception.
  }
}
```
### FINALLY
* To ensure that some code runs whether or not an exception is thrown, use a finally clause
* If no catch clause matches the exception, the exception is propagated after the finally clause runs
```java
try {
  breedMoreLlamas();
} finally {
  // Always clean up, even if an exception is thrown.
  cleanLlamaStalls();
}

// The finally clause runs after any matching catch clauses:
try {
  breedMoreLlamas();
} catch (e) {
  print('Error: $e'); // Handle the exception first.
} finally {
  cleanLlamaStalls(); // Then clean up.
}
```

## GENERICS

* Generics = type avec un type de paramètres prédéterminé
* Ex. : List```<E>```
* Le <…> indique que la liste est un "generic"; un type (List) dont le type des paramètres est prédéterminé (E)
* But :   
   * Type safety
   * better generated code
   * reduce code duplication

### EXEMPLES
```java
// a list that contains only strings
var names = List<String>();
names.addAll(['Seth', 'Kathy', 'Lars']);
names.add(42); // Error

// reduce code duplication
// you create an interface for caching an object:
abstract class ObjectCache {
  Object getByKey(String key);
  void setByKey(String key, Object value);
}
// You discover that you want a string-specific version of this interface, 
// so you create another interface:
abstract class StringCache {
  String getByKey(String key);
  void setByKey(String key, String value);
}
// Generic types can save you the trouble of creating all these interfaces. 
// Instead, you can create a single interface that takes a type parameter:
abstract class Cache<T> {
  T getByKey(String key);
  void setByKey(String key, T value);
}
```
### COLLECTION LITERALS
* List, set, and map literals can be parameterized
* One add <type> (for lists and sets) or <keyType, valueType> (for maps) before the opening bracket
```java
var names = <String>['Seth', 'Kathy', 'Lars'];
var uniqueNames = <String>{'Seth', 'Kathy', 'Lars'};
var pages = <String, String>{
  'index.html': 'Homepage',
  'robots.txt': 'Hints for web robots',
  'humans.txt': 'We are people, not machines'
};
```
### PARAMETERIZED TYPES WITH CONSTRUCTORS
* To specify one or more types when using a constructor, put the types in angle brackets (<...>) just after the class name
```java
var nameSet = Set<String>.from(names);

// The following code creates a map that has integer keys and values of type View:
var views = Map<int, View>();
```
### FIND TYPES
* Dart generic types are reified, which means that they carry their type information around at runtime
```java
// test the type of a collection :
var names = List<String>();
names.addAll(['Seth', 'Kathy', 'Lars']);
print(names is List<String>); // true
```
### RESTRICTING PARAMETERIZED TYPE
* Goal = limit the types of its parameters
* How = using extends
```java
class Foo<T extends SomeBaseClass> {
  // Implementation goes here...
  String toString() => "Instance of 'Foo<$T>'";
}

class Extender extends SomeBaseClass {...}

var someBaseClassFoo = Foo<SomeBaseClass>(); // OK
var extenderFoo = Foo<Extender>(); // OK, grâce à l'héritage

var foo = Foo(); // OK, pas besoin d'arguments
print(foo); // Instance of 'Foo<SomeBaseClass>'

var foo = Foo<Object>(); // Error, Object is not SomeBaseClass
```
### GENERIC METHODS
* Using Generic Methods : https://github.com/dart-lang/sdk/blob/master/pkg/dev_compiler/doc/GENERIC_METHODS.md
```java
T first<T>(List<T> ts) {
  // Do some initial work or error checking, then...
  T tmp = ts[0];
  // Do some additional checking or processing...
  return tmp;
}

// Here the generic type parameter on first (<T>) allows you to use 
// the type argument T in several places:
// • In the function’s return type (T).
// • In the type of an argument (List<T>).
// • In the type of a local variable (T tmp).
```

## LIBRAIRIES ET VISIBILITE

* Every Dart app is a library
* identifiers that start with an underscore (_) are visible only inside the library
* Libraries can be distributed using packages

### LIBRARIES
* (!) URI stands for uniform resource identifier. URLs (uniform resource locators) are a common kind of URI
```java
// Dart web apps generally use the dart:html library, which they can import like this:
import 'dart:html';
// For built-in libraries, the URI has the special dart: scheme. 
// For other libraries, you can use a file system path or the package: scheme. 
// The package: scheme specifies libraries provided by a package manager such as the pub tool. 
// For example:
import 'package:test/test.dart';
```
### LIBRARY PREFIX
* But = éviter les conflits de noms
```java
import 'package:lib1/lib1.dart';
import 'package:lib2/lib2.dart' as lib2;

// Uses Element from lib1.
Element element1 = Element();

// Uses Element from lib2.
lib2.Element element2 = lib2.Element();
```
### IMPORT A PART
* But = importer une partie de la librairie
```java
// Import only foo.
import 'package:lib1/lib1.dart' show foo;

// Import all names EXCEPT foo.
import 'package:lib2/lib2.dart' hide foo;
```
### PRIVACY
* Privacy and Encapsulation in Dart exists at the library, rather than the class level
* Any identifer that starts with an underscore _ is private to its library
* Une variable privée est accessible SEULEMENT dans sa librairie (fichier où elle apparait)
* Au sein de son fichier, elle n'est pas privée (par exemple, on peut y accéder depuis l'extérieur de sa classe, voir dernier exemple)
* Si on importe la variable privée et sa librairie dans un fichier A, elle sera inaccessible dans le fichier A
```java
// If you were to put class A into a separate library file (eg, other.dart), such as:
library other;

class A {
  int _private = 0;

  testA() {
    print('int value: $_private');  // 0
    _private = 5;
    print('int value: $_private'); // 5
  }
}

// and then import it into your main app, such as:
import 'other.dart';

void main() {
  var b = new B();
  b.testB();    
}

class B extends A {
  String _private;

  testB() {
    _private = 'Hello';
    print('String value: $_private'); // Hello
    testA();
    print('String value: $_private'); // Hello
  }
}

// You get the expected output:
String value: Hello
int value: 0
int value: 5
String value: Hello


// another exemple :

// File: cake.dart
library cake;

class MainCake{
  // non-private property : list of strings
  List<String> randomPieceOfCakes = ['cake3', 'cake4', 'cake5', 'cake6'];

  String _pieceOfCake1 = "cake1"; // private property
  String pieceOfCake2 = "cake2";
}

// File: main.dart
import 'cake.dart';

void main() {
  MainCake newCake = new MainCake();
  // non-private property -  randomPieceOfCakes
  print(newCake.randomPieceOfCakes);

  // private property - piece of cake
  print(newCake._pieceOfCake1); // private property error

  // non-private property - piece of cake
  print(newCake.pieceOfCake2);
}


// derniere illustration :

class Software {
  double version = 2.0; // public
  int _password = 8888; // privé
}

void main() {
  var logiciel = Software();
  print(logiciel.version); // 2 (valeur publique)
  print(logiciel._password); // 8888 (valeur privée)
  // non privé au niveau des classes
  // est accessible depuis l'extérieur d'une classe
  // car elle est privée seulement pour sa libraire
  // cad le fichier où la valeur privée se trouve
}
```
### LAZY LOADING
* But = autoriser une application à charger une librairie que si celle-ci est demandée
* Gain de temps au démarrage, gain de performance
* **(!)** Only dart2js supports deferred loading. **Flutter**, the Dart VM, and dartdevc don’t support deferred loading
```java
// To lazily load a library, you must first import it using deferred as.
import 'package:greetings/hello.dart' deferred as hello;

// When you need the library, invoke loadLibrary() using the library’s identifier.
Future greet() async {
  await hello.loadLibrary();
  hello.printGreeting();
}
// You can invoke loadLibrary() multiple times on a library without problems. 
// The library is loaded only once.
```
### CREATE LIBRARY
* Create Library Packages : https://dart.dev/guides/libraries/create-library-packages
### SOME LIBRAIRIES
#### MATH LIBRARY
* https://api.dart.dev/stable/2.8.4/dart-math/dart-math-library.html
```java
import 'dart:math';
// utilisation de la classe Random
// https://api.dartlang.org/stable/2.2.0/dart-math/Random-class.html
numberBetweenZeroAndFive = Random().nextInt(6);
numberBetweenOneAndSix = Random().nextInt(6) + 1;
```


## ASYNCHRONE

* On utilise les mots-clés "async" et "await" pour faire de la programmation asynchrone (comme JavaScript moderne)
* La programmation asynchrone permet au script de ne pas attendre que l'opération demandée soit complétée (l'opération est non bloquante : elle est exécutée dans l'ordre des instructions, comme du code synchrone, mais on n'attend pas sa réponse pour passer à la ligne suivante)
* Les librairies Dart asynchrones renvoient des objets **Future** ou **Stream**
* Future = une Promesse
* Stream = un flot de Promesses
* await ne peut être utilisé que dans une async fonction

### FUTURES

* Return a Future object
* This Future object indicates a promise to return an object
* When you need the result of a completed Future, you have two options :   
   * Use async and await.
   * Use the Future API, as described in the library tour : https://dart.dev/guides/libraries/library-tour#future
```java
// some code that uses await to wait for the result of an asynchronous function:
await lookUpVersion(); // return Future object

// To use await, code must be in an async function — a function marked as async:
Future checkVersion() async {
  var version = await lookUpVersion();
  // Do something with version
}

// Use try, catch, and finally to handle errors and cleanup in code that uses await:
try {
  version = await lookUpVersion();
} catch (e) {
  // React to inability to look up the version
}

// You can use await multiple times in an async function. 
//For example, the following code waits three times for the results of functions:
var entrypoint = await findEntrypoint();
var exitCode = await runExecutable(entrypoint, args);
await flushThenExit(exitCode);

// If you get a compile-time error when using await, make sure await is in an async function. 
// For example, to use await in your app’s main() function, 
// the body of main() must be marked as async:
Future main() async {
  checkVersion();
  print('In main: version is ${await lookUpVersion()}');
}
```
### DECLARE ASYNC FUNCTIONS
* Adding the async keyword to a function makes it return a Future
* For an interactive introduction to using futures, async, and await, see the asynchronous programming codelab : https://dart.dev/codelabs/async-await
```java
// consider this synchronous function, which returns a String:
String lookUpVersion() => '1.0.0';

// If you change it to be an async function—for example, 
// because a future implementation will be time consuming—the returned value is a Future:
Future<String> lookUpVersion() async => '1.0.0';
// (!) If your function doesn’t return a useful value, make its return type Future<void>

// An async function runs synchronously until the first await keyword. 
// This means that within an async function body, 
// all synchronous code before the first await keyword executes immediately
```
### STREAMS
* When you need to get values from a Stream, you have two options:   
   * Use async and an asynchronous for loop (await for).
   * Use the Stream API, as described in the library tour : https://dart.dev/guides/libraries/library-tour#stream
```java
// an asynchronous for loop has the following form:
await for (varOrType identifier in expression) {
  // Executes each time the stream emits a value.
}
```
* The value of expression must have type Stream. Execution proceeds as follows:
   1. Wait until the stream emits a value.
   2. Execute the body of the for loop, with the variable set to that emitted value.
   3. Repeat 1 and 2 until the stream is closed.
   4. To stop listening to the stream, you can use a **break** or **return** statement, which breaks out of the for loop and unsubscribes from the stream
* If you get a compile-time error when implementing an asynchronous for loop, make sure the await for is in an async function
```java
// For example, to use an asynchronous for loop in your app’s main() function, 
// the body of main() must be marked as async:
Future main() async {
  // ...
  await for (var request in requestServer) {
    handleRequest(request);
  }
  // ...
}
```
* For more information about asynchronous programming, in general, see the dart:async section of the library tour : https://dart.dev/guides/libraries/library-tour#dartasync---asynchronous-programming

## GENERATORS

* Rappel : générateur = itérateur simplifié (à préférer pour la simplicité du code)
* Synchronous generator: Returns an Iterable object.
* Asynchronous generator: Returns a Stream object.
```java
// To implement a synchronous generator function, 
// mark the function body as sync*, and use yield statements to deliver values:
Iterable<int> naturalsTo(int n) sync* {
  for (int k = 0; k <= n; k++) {
    yield k;
  }
}
  
// exemple d'utilisation :
var naturals = naturalsTo(10);
for (var natural in naturals) {
  print(natural); // 0 1 2 ... 10
}

// To implement an asynchronous generator function, 
// mark the function body as async*, and use yield statements to deliver values:
Stream<int> asynchronousNaturalsTo(int n) async* {
  int k = 0;
  while (k < n) yield k++;
}

// If your generator is recursive, you can improve its performance by using yield*:
Iterable<int> naturalsDownFrom(int n) sync* {
  if (n > 0) {
    yield n;
    yield* naturalsDownFrom(n - 1);
  }
}
```

## CALLABLE CLASS

* To allow an instance of your Dart class to be called like a function, implement the call() method.
* Se rapproche de l'idéee du def ```__str__``` en Python
* Classe qui peut êre appelée comme une fonction
```java
class WannabeFunction {
  String call(String a, String b, String c) => '$a $b $c!';
}

var wf = WannabeFunction();
var out = wf('Hi', 'there,', 'gang');

main() => print(out); // Hi there, gang!


// autre exemple
class Cat {
  DateTime birthday;

  Cat(this.birthday);  
  
  String call() {
    print('Meow!');
  }
}

void main() {
  var cat = Cat(DateTime.now());
  cat(); // prints Meow!
}
```

## TYPEDEFS

* In Dart, functions are objects, just like strings and numbers are objects
* Typedefs = alias
* Donne au type de la fonction un nom, un alias, utilisé pour déclarer les propriétés et méthodes
```java
// the following code doesn’t use a typedef:
class SortedCollection {
  Function compare;

  SortedCollection(int f(Object a, Object b)) {
    compare = f;
  }
}

// Initial, broken implementation.
int sort(Object a, Object b) => 0;

void main() {
  SortedCollection coll = SortedCollection(sort);

  // All we know is that compare is a function,
  // but what type of function?
  assert(coll.compare is Function);
}

// If we change the code to use explicit names and retain type information, 
//both developers and tools can use that information.
typedef Compare = int Function(Object a, Object b); // gives typedef to Function()

class SortedCollection {
  Compare compare; // compare property is type Compare

  SortedCollection(this.compare);
}

// Initial, broken implementation.
int sort(Object a, Object b) => 0;

void main() {
  SortedCollection coll = SortedCollection(sort);
  assert(coll.compare is Function);
  assert(coll.compare is Compare);
}

// Because typedefs are simply aliases, they offer a way to check the type of any function:
typedef Compare<T> = int Function(T a, T b);

int sort(int a, int b) => a - b;

void main() {
  assert(sort is Compare<int>); // True!
}
```

## METADATA

* But = rajouter de l'information sur le code
* Two annotations are available to all Dart code: @deprecated and @override
* Metadata can appear before a library, class, typedef, type parameter, constructor, factory, function, field, parameter, or variable declaration and before an import or export directive. You can retrieve metadata at runtime using reflection.
```java
class Television {
  /// _Deprecated: Use [turnOn] instead._
  @deprecated
  void activate() {
    turnOn();
  }

  /// Turns the TV's power on.
  void turnOn() {...}
}
```
* You can define your own metadata annotations
```java
// Here’s an example of defining a @todo annotation that takes two arguments:
library todo;

class Todo {
  final String who;
  final String what;

  const Todo(this.who, this.what);
}

// And here’s an example of using that @todo annotation:
import 'todo.dart';

@Todo('seth', 'make this do something')
void doSomething() {
  print('do something');
}
```

## COMMENTS
* Single-line comments
```java
void main() {
  // TODO: refactor into an AbstractLlamaGreetingFactory?
  print('Welcome to my Llama farm!');
}
```
* Multi-line comments (can nest)
```java
void main() {
  /*
   * This is a lot of work. Consider raising chickens.

  Llama larry = Llama();
  larry.feed();
  larry.exercise();
  larry.clean();
   */
}
```
### Documentation comments
* multi-line or single-line comments that begin with /// or /**
* Inside a documentation comment, the Dart compiler ignores all text unless it is enclosed in brackets
* Using brackets, you can refer to classes, methods, fields, top-level variables, functions, and parameters
```java
// Here is an example of documentation comments with references to other classes and arguments:

/// A domesticated South American camelid (Lama glama).
///
/// Andean cultures have used llamas as meat and pack
/// animals since pre-Hispanic times.
class Llama {
  String name;

  /// Feeds your llama [Food].
  ///
  /// The typical llama eats one bale of hay per week.
  void feed(Food food) {
    // ...
  }

  /// Exercises your llama with an [activity] for
  /// [timeLimit] minutes.
  void exercise(Activity activity, int timeLimit) {
    // ...
  }
}
```
* In the generated documentation, [Food] becomes a link to the API docs for the Food class
* To parse Dart code and generate HTML documentation, you can use the SDK’s documentation generation tool : https://github.com/dart-lang/dartdoc#dartdoc
* For an example of generated documentation, see the Dart API documentation : https://api.dart.dev/stable
* For advice on how to structure your comments, see Guidelines for Dart Doc Comments : https://dart.dev/guides/language/effective-dart/documentation