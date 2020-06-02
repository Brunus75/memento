# MEMENTO DART

## RESSOURCES

* Dart doc : https://dart.dev/guides
* Dart Cheatsheet : https://dart.dev/guides/language/language-tour  https://dart.dev/codelabs/dart-cheatsheet
* Dart Pad : https://dartpad.dev/
* dart:core library : https://api.dart.dev/stable/2.8.3/dart-core/dart-core-library.html
* Guidelines(DO and DON'T) : https://dart.dev/guides/language/effective-dart/design
* Guidelines Types : https://dart.dev/guides/language/effective-dart/design#types

## SOMMAIRE

* [DART](#dart)
* [VARIABLES ET TYPES](#variables-et-types)
* [LES CONDITIONS](#les-conditions)
* [LES BOUCLES](#les-boucles)
* [OPERATEURS](#operateurs)
* [LES FONCTIONS](#les-fonctions)

## DART

* Lancé en 2011 par Google pour remplacer JavaScript
* Langage Front ET Back (serveur)
* Taillé pour la performance et les gros projets
* Mélange JAVA (orienté objet, typage), JavaScript (variables dynamiques, const, var, commentaires, String interpolation) et Python (print(), _fonction_privee)
* Typage optionnel (langage dynamique)
* Tout est objet sur Dart !
* Adresse en mémoire ? Pointeurs ?
```
It's not possible to access raw memory of Dart objects. Dart is a garbage collected language which means that Dart objects are not guaranteed to live at a particular memory address as the garbage collector can (and certainly will) move these objects to different memory locations during a garbage collection. Within the Dart virtual machine Dart objects are almost exclusively accessed and passed around via handles and not raw pointers for this very reason.
```

## VARIABLES ET TYPES

### VARIABLES
```java
var name = "Pablo"; // name sera définitivement un String
print(name); // Pablo
name = "Georges";
print(name); // Georges
name = 33; /* error : A value of type 'int' can't be assigned to a variable 
of type 'String' - line 7 */

String nom = "Calembour"; // préciser le type

int lineCount; // null

// final and constant variable : inchangeable
const lieuNaissance = "Marseille";
const int annee = 1998;
final parents = 2;
final String passion = "Dérober des banques";

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
// + simple = les $
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
```
### NUMBERS
* https://dart.dev/guides/language/language-tour#numbers
```java
int entier = 33;
double decimal = 33.3;
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
* https://dart.dev/guides/language/language-tour#lists
* Details and examples of using collection if and for : https://github.com/dart-lang/language/blob/master/accepted/2.3/control-flow-collections/feature-specification.md
* Generics : https://dart.dev/guides/language/language-tour#generics
* Collections: https://dart.dev/guides/libraries/library-tour#collections
```java
var maListe = ["Pierre", "Paul", "Jacques"];
// Dart assume alors que c'est une liste de String
// et de String seulement => List<String> maListe = ...
// version explicite :
List<String> maListe2 = ["Pierre", "Paul", "Jacques"];

print(maListe.length); // 3
print(maListe[0]); // Pierre

// ajouter un élément
maListe.add("Georges"); // c'est un String, c'est OK
print(maListe); // [Pierre, Paul, Jacques, Georges]
maListe.add(1); // Error: The argument type 'int' can't be assigned to the parameter type 'String'

// supprimer un élément
maListe.add("Pierre"); // [Pierre, Paul, Jacques, Georges, Pierre]
maListe.remove("Pierre"); // supprimer la PREMIERE occurence
print(maListe); // [Paul, Jacques, Georges, Pierre]
// sur l'index :
maListe.removeAt(0);
print(maListe); // [Jacques, Georges, Pierre]

// vider une liste
maListe.clear();

// spread operator (...) [Dart 2.3]
// use the spread operator (...) to insert all the elements of a    list into another list:
var list1 = [1, 2, 3];
var list2 = [0, ...list1];
print(list2); // [0, 1, 2, 3]

// null-aware spread operator (...?) [Dart 2.3]
// If the expression to the right of the spread operator might be null, you can avoid exceptions by using a null-aware spread operator (...?):
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

// As of Dart 2.3, maps support spread operators (... and ...?) and collection if and for, just like lists do
```
### SETS
* https://dart.dev/guides/language/language-tour#sets
* Liste **désordonnée** d'éléments **uniques**
* spread operator proposal : https://github.com/dart-lang/language/blob/master/accepted/2.3/spread-collections/feature-specification.md
* control flow collections proposal : https://github.com/dart-lang/language/blob/master/accepted/2.3/control-flow-collections/feature-specification.md
* Generics : https://dart.dev/guides/language/language-tour#generics
* Sets : https://dart.dev/guides/libraries/library-tour#sets
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

### LES CONDITIONS
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
### LES SWITCH
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
### CASCADE NOTATION (..)
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
*  functions are objects and have a type, Function
* functions can be assigned to variables or passed as arguments to other functions
* Effective Dart recommends type annotations for public APIs
### LES FONCTIONS DE BASE
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
```