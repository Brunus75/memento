# MEMENTO DART

## RESSOURCES

* Dart doc : https://dart.dev/guides
* Dart Cheatsheet : https://dart.dev/guides/language/language-tour  https://dart.dev/codelabs/dart-cheatsheet
* Dart language specification : https://dart.dev/guides/language/spec
* Dart Pad : https://dartpad.dev/
* dart:core library : https://api.dart.dev/stable/2.8.3/dart-core/dart-core-library.html
* Guidelines(DO and DON'T) : https://dart.dev/guides/language/effective-dart/design
* Guidelines Types : https://dart.dev/guides/language/effective-dart/design#types
* https://www.reddit.com/r/dartlang/
* Dart/Python : https://www.reddit.com/r/dartlang/comments/gs4hlu/dart_is_now_7_on_the_most_loved_and_now_moved/fs3954s/
* ~ Making Dart a Better Language for UI : https://medium.com/dartlang/making-dart-a-better-language-for-ui-f1ccaf9f546c

## SOMMAIRE

* [DART](#dart)
* [VARIABLES ET TYPES](#variables-et-types)
* [LES CONDITIONS](#les-conditions)
* [LES BOUCLES](#les-boucles)
* [OPERATEURS](#operateurs)
* [LES FONCTIONS](#les-fonctions)
* [PROGRAMMATION ORIENTEE OBJET](#programmation-orientee-objet)

## DART

* Lancé en 2011 par Google pour remplacer JavaScript
* Langage Front ET Back (serveur)
* Taillé pour la performance et les gros projets
* Mélange JAVA (orienté objet, typage), JavaScript (variables dynamiques, const, var, commentaires, String interpolation) et Python (print(), _fonction_privee)
* Typage optionnel (langage dynamique)
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
* Functions are objects and have a type, Function
* Functions can be assigned to variables or passed as arguments to other functions
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

// rappel : 
// For functions that contain just one expression, you can use a shorthand syntax:
bool isNoble(int atomicNumber) => _nobleGases[atomicNumber] != null;
// The => expr syntax is a shorthand for { return expr; }. 
// The => notation is sometimes referred to as arrow syntax
```
### OPTIONNAL PARAMETERS
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
### THE MAIN() FUNCTION
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

### OBJET & CLASSE
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
  
  // (!) Constructors aren’t inherited !
  // Subclasses don’t inherit constructors from their superclass
  // A subclass that declares no constructors has only the default (no argument, no name) constructor

  // constructeur (ancienne méthode)
  Voiture(String marque, int annees) {
    this.marque = marque; // this = l'instance
    this.annees = annees;
  }
  
  // Dart ajoute du sucre syntaxique pour déclarer un constructeur:
  Voiture(this.marque, this.annees);

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
### RECUPERER LE TYPE D'UN OBJET
```java
// use Object’s runtimeType property, which returns a Type object.
print('The type of a is ${a.runtimeType}');
```
### GETTERS & SETTERS
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

// an example with both default constructor and named constructor:
class Foo {
  Foo(int a, int b) {
    //Code of constructor
  }

  Foo.named(int c, int d) {
    //Code of named constructor
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


// Redirecting constructors
// A redirecting constructor’s body is empty, with the constructor call appearing after a colon (:).
class Point {
  double x, y;

  // The main constructor for this class.
  Point(this.x, this.y);

  // Delegates to the main constructor.
  Point.alongXAxis(double x) : this(x, 0);
}
}
```
### POLYMORPHISME
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
### NOSUCHMETHOD()
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
### MIXINS (AJOUTER DES FONCTIONNALITES A UNE CLASSE)
* a way of reusing a class’s code in multiple class hierarchies
* To use a mixin, use the with keyword followed by one or more mixin names
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
### CLASS VARIABLES & METHODS
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