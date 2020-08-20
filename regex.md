# MEMENTO REGEX

## SOMMAIRE

* [GENERAL](#general)
* [EXEMPLES](#exemples)
* [PYTHON](#python)
* [PHP](#php)

## GENERAL

* https://regex101.com/
* https://regexr.com/
* Mémento des expressions régulières : https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/918834-memento-des-expressions-regulieres
```py
# regex : regular expression
# exemple : nombre de téléphone français valide ?
^[0]{1}[1-7]{1}(-[0-9]{2}){4}$
06-12-23-12-23
# 3 choses à savoir : 
# 1) quoi chercher
# 2) combien de fois
# 3) quelles sont les contraintes

# 1) trouver un caractère :
# .				Le point correspond à tous les caractères possibles (incluant symboles)
# [A-F]			Correspond à une liste de caractères possibles. ici de A à F
# [AF]          A ou F
# (python|c++)	L'un ou l'autre
# ^				Le contraire de ce qu'on veut.
# \d 			Uniquement des chiffres. équivalent à [0-9]
# \D 			Tout sauf des chiffres. équivalent à [^0-9]
# \s 			Un espace
# \w 			Un caractère alphanumérique. équivalent à [a-zA-Z0-9_]
# \W 			Tout sauf un caractère alphanumérique. équivalent à [^a-zA-Z0-9_]
# \ 			Comme en Python, pour échapper un caractère. (\. pour chercher un point)

# 2) compter un caractère :
# ? 		0 ou 1 fois
# *	    	0 à l'infini
# +	    	de 1 à l'infini
# {3} 		exactement 3
# {3,}  	de 3 à l'infini
# {,3}  	de 0 à 3 fois
# {3,6} 	de 3 à 6 fois
# ()        dans une séquence

# 3) contient un caractère :
# POSITIVE LOOKAHEAD (?=.*[a-z])
# après "?=", va chercher la correspondance dans le mot, sans prendre la correspondance dans le regex
# ici, va chercher un mot avec tous les caractères, 
# qui contiennent au moins une fois [a-z] une lettre minuscule
# équivalent à la contrainte "contient TOUS les caractères, AVEC AU MOINS une lettre minuscule"
```

## EXEMPLES

### GENERAUX

#### PASSWORD VALIDATION

* Minimum eight characters, at least one letter and one number:
```js
"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
```

* Minimum eight characters, at least one letter, one number and one special character:
```js
"^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"
```

* Minimum eight characters, at least one uppercase letter, one lowercase letter and one number:
```js
"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"
```

* Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character:
```js
"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
```

* Minimum eight and maximum 10 characters, at least one uppercase letter, one lowercase letter, one number and one special character:
```js
"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$"
```


### PYTHON

```py
# COMPTER LE NOMBRE DE SMILEYS DANS UN ARRAY
# -Each smiley face must contain a valid pair of eyes. Eyes can be marked as: or;
# -A smiley face can have a nose but it does not have to. Valid characters for a nose are - or ~
# -Every smiling face must have a smiling mouth that should be marked with either) or D.
# Valid smiley face examples:
# :) :D ;-D :~)
# Invalid smiley faces:
# ;( :> :} :]
# countSmileys([':)', ';(', ';}', ':-D']);       // should return 2;
# countSmileys([';D', ':-(', ':-)', ';~)']);     // should return 3;
# countSmileys([';]', ':[', ';*', ':$', ';-D']); // should return 1;

import re

def count_smileys(arr):
    smileys = []
    
    for str in arr:
        if re.match(r"^[:;]{1}[~-]?[)D]{1}$", str):
            smileys.append(str)
    
    return len(smileys)


# solution populaire
from re import findall

def count_smileys(arr):
    return len(list(findall(r"[:;][-~]?[)D]", " ".join(arr))))


# REGEX PASSWORD VALIDATION
# Un mot de passe qui doit valider des contraintes
# At least six characters long
# contains a lowercase letter
# contains an uppercase letter
# contains a number

Test.describe("Basic tests")
Test.assert_equals(bool(search(regex, 'fjd3IR9')), True)
Test.assert_equals(bool(search(regex, 'ghdfj32')), False)
Test.assert_equals(bool(search(regex, 'DSJKHD23')), False)
Test.assert_equals(bool(search(regex, 'dsF43')), False)
Test.assert_equals(bool(search(regex, '4fdg5Fj3')), True)
Test.assert_equals(bool(search(regex, 'DHSJdhjsU')), False)
Test.assert_equals(bool(search(regex, 'fjd3IR9.;')), False)
Test.assert_equals(bool(search(regex, 'fjd3  IR9')), False)
Test.assert_equals(bool(search(regex, 'djI38D55')), True)
Test.assert_equals(bool(search(regex, 'a2.d412')), False)
Test.assert_equals(bool(search(regex, 'JHD5FJ53')), False)
Test.assert_equals(bool(search(regex, '!fdjn345')), False)
Test.assert_equals(bool(search(regex, 'jfkdfj3j')), False)
Test.assert_equals(bool(search(regex, '123')), False)
Test.assert_equals(bool(search(regex, 'abc')), False)
Test.assert_equals(bool(search(regex, '123abcABC')), True)
Test.assert_equals(bool(search(regex, 'ABC123abc')), True)
Test.assert_equals(bool(search(regex, 'Password123')), True)

# my answer :
regex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$"

# réponse détaillée :
regex = (
    '^'            # start line
    '(?=.*\d)'     # must contain one digit from 0-9
    '(?=.*[a-z])'  # must contain one lowercase characters
    '(?=.*[A-Z])'  # must contain one uppercase characters
    '[a-zA-Z\d]'   # permitted characters (alphanumeric only)
    '{6,}'         # length at least 6 chars
    '$'            # end line
)
```

### JAVASCRIPT

```js
/* ---------- REPLACE A STRING ---------- */
// change string : replace capitals and punctuation (by lowercase et nothing)
Test.describe("Example tests", _ => {
  Test.assertEquals(borrow('WhAt! FiCK! DaMn CAke?'), 'whatfickdamncake');
  Test.assertEquals(borrow('THE big PeOpLE Here!!'), 'thebigpeoplehere');
  Test.assertEquals(borrow('i AM a TINY BoY!!'), 'iamatinyboy');
});

function borrow(s) {
  const word = s.replace(/[!?;:,. ]+/g, '');
  return word.toLowerCase();
}

// autre solution 
function borrow(s) {
  return s.replace(/[^\w]/g, '').toLowerCase(); // regex : not matching with word characters
}


/* ---------- Replace With Alphabet Position ---------- */
// Replace every letter with its position in the alphabet
// If anything in the text isn't a letter, ignore it and don't return it.
// alphabetPosition("The sunset sets at twelve o' clock.")
// "20 8 5 19 21 14 19 5 20 19 5 20 19 1 20 20 23 5 12 22 5 15 3 12 15 3 11"(as a string)

function alphabetPosition(text) {

  const alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];

  const letters = text.replace(/[^a-zA-Z]+/g, '').toLowerCase().split('');

  const numbers = letters.map(letter => {
    return alphabet.indexOf(letter) + 1;
  });

  return numbers.join(" ");
}

// solution populaire :
function alphabetPosition(text) {
  return text
    .toUpperCase()
    .match(/[a-z]/gi)
    .map((c) => c.charCodeAt() - 64)
    .join(' ');
}


/* ---------- DETECT PANGRAM ---------- */
// Un string, vérifier si c'est un "pangram" : contient toutes les lettres de l'alphabet
// "The quick brown fox jumps over the lazy dog" is a pangram, 
// because it uses the letters A-Z at least once (case is irrelevant)

var string = "The quick brown fox jumps over the lazy dog."
Test.assertEquals(isPangram(string), true)
var string = "This is not a pangram."
Test.assertEquals(isPangram(string), false)

function isPangram(string) {
  const alphabet = ['a', 'b', 'c', 'd', 'e', 'f','g', 'h', 'i', 'j', 'k', 'l', 'm', 
  'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

  const arr = string.replace(/^(?=.*\d)[\d ]+$/g, '').toLowerCase().split("");
  // string => remove white space and numbers, uppercase => array
  // const arrUnique = [... new Set(arr)]; enlève les lettres dupliquées

  return alphabet.every(letter => arr.includes(letter));
  // vérifie si chaque entrée du tableau alphabet est incluse dans le tableau arr
}

// solution populaire
function isPangram(string) {
  return 'abcdefghijklmnopqrstuvwxyz'
    .split('')
    .every((value) => string.toLowerCase().includes(value));
}


/* ---------- Extract the domain name from a URL ---------- */
// Un string, retourner seulement le nom de domaine
// domainName("http://github.com/carbonfive/raygun") == "github" 
// domainName("http://www.zombie-bites.com") == "zombie-bites"
// domainName("https://www.cnet.com") == "cnet"

function domainName(url) {
  // remove everything that start with http://, optionally https://, 
  // optionally https://www., or start with www., in case insensitive
  const urlRaw = url.replace(/^(https?\:\/\/(www\.)?|(www\.))/i, "");
  return urlRaw.split('.')[0]; // ex. [google, com] => google
}

// solution populaire
function domainName(url) {
  url = url.replace("https://", '');
  url = url.replace("http://", '');
  url = url.replace("www.", '');
  return url.split('.')[0];
};


/* ---------- CREER DES ESPACES DANS UNE CHAINE DE CARACTERES ---------- */
// un string en camelCase, le retourner en camel Case
// solution("camelCasing")  ==  "camel Casing"

function solution(string) {
  array = string.split(''); // [... string]

  for (let i = 0; i < array.length; i++) {
    if (array[i] == array[i].toUpperCase()) { // si le caractere est en MAJUSCULE
      array[i] = " " + array[i] // on ajoute un espace avant
    }
  }

  return array.join('')
}

// solution populaire 1 

function solution(string) {
  return (string.replace(/([A-Z])/g, ' $1'));
  // g : global search = permet de rendre le sujet itérable
  // $1 : contenu capturé par le regex
  // remplace l'occurence trouvée par le regex par ' occurence'
  
  // string.replace(/[A-Z]/g, ' $&') marche aussi
}

// solution populaire 2 avec map()

function solution(string) {
  string = string.split('').map(function (el) {
    if (el === el.toUpperCase()) {
      el = ' ' + el
    }
    return el
  })
  return string.join('')
}
```

## PYTHON

* Ressource > https://pythex.org/
```py
# - la fonction match

import re # module regex

# Pourquoi on met un 'r'
print('\tBonjour') # évalue comme une chaine de caractères : '  Bonjour' (avec le tab de \t)
print(r'\tBonjour') # évalue comme un regex : '\tBonjour'

# match = trouver une concordance en partant du DEBUT du string
# a = re.match(r'\s', 'Pierre Dupont') => non valide, car l'espace n'est pas au début
# a = None dans ce cas
a = re.match(r'.', 'Pierre Dupont')
print(a) # <re.Match object; span=(0, 1), match='P'>
print(a.group()) # P, car c'est le premier match
a = re.match(r'.+', 'Pierre Dupont')
print(a.group()) # Pierre Dupont

# récupérer les groupes
a = re.match(r'(\w+)(\s)(\w+)', 'Pierre Dupont')
#               g1   g3  g2
print(a.group(0)) # Pierre Dupont, entièreté du match
print(a.group(1)) # Pierre
print(a.group(2)) # 
print(a.group(3)) # Dupont

# définir des noms pour les groupes
# (?P<nom_groupe>regex)
a = re.match(r'(?P<prenom>\w+) (?P<nom>\w+)', 'Pierre Dupont')
# le \s est remplacé par un simple espace
print(a.group('prenom')) # Pierre
print(a.group('nom')) # Dupont

print(a.groups()) # retourne les groupes en tuple => ('Pierre', 'Dupont')
# retourne les groupes en dictionnaire => {'prenom': 'Pierre', 'nom': 'Dupont'}
# ↓
print(a.groupdict())

# exercices
import re

# Match valide : retourne 'item01'
re.match(r'[a-z]+\d{2}', 'item01')

# Match valide : retourne 'Pierre Dupont'
re.match(r'[a-zA-Z]+\s\w+', 'Pierre Dupont')

# Match invalide : on cherche un espace au début de la chaîne de caractère, 
# mais elle commence par une lettre.
re.match(r'\s+', 'pierre dupont')

# Match valide : retourne 'pierre'
re.match(r'\w+', 'pierre dupont')

# Match valide : retourne 'pierre-'
re.match(r'\w+([-+=]?)', 'pierre-dupont')

# Match valide : retourne 'pierre'
re.match(r'\w+([-+=]?)', 'pierre/dupont')

# Match invalide : le + cherche si les caractères -, 
# + ou = sont présents au moins une fois ou plus dans la chaîne de caractère.
# Aucun de ses éléments ne se retrouve dans la chaîne de caractère 
# au moins une fois et donc le match n'est pas valide.
re.match(r'\w+([-+=]+)', 'pierre/dupont')

# - chercher avec search
# contrairement à match, va chercher dans l'entiereté du string
import re

a = re.search(r'\s', 'Pierre Dupont + Paul Martin')
print(a) # retourne un match <re.Match object; span=(6, 7), match=' '>
# (même si l'espace n'est pas au début du string)

# trouver si le + est présent :
a = re.search(r' \+ ', 'Pierre Dupont + Paul Martin')
print(a) # <re.Match object; span=(13, 16), match=' + '>
# span = position du match
print(a.group()) # +

# - la fonction split
import re

# spliter facilement un string avec un regex
texte = 'item01 | item02 - item03 - item04 | item05'

a = re.split(r' \| | - ', texte)
#                | OU -
print(a) # ['item01', 'item02', 'item03', 'item04', 'item05']

# subtilité de re.split() = peut spliter les résultats de la regex
words = re.split('(\d|\W|_)', s) # split with digits, non-words and underscore
# If capture groups are used with re.split()
# then the matched text is also included in the result
# ex. ['cat', '_', '', '5', ' ', '-', etc.]

# https://note.nkmk.me/en/python-split-rsplit-splitlines-re/
# https://howtodoinjava.com/python/split-string/

# liste d'exemples de re.split :
import re

s_nums = 'one1two22three333four'
print(re.split('\d+', s_nums))
# ['one', 'two', 'three', 'four']
# The maximum number of splits can be specified in the third parameter maxsplit.
print(re.split('\d+', s_nums, 2))
# ['one', 'two', 'three333four']

## Split by multiple different delimiters

s_marks = 'one-two+three#four'
print(re.split('[-+#]', s_marks))
# ['one', 'two', 'three', 'four']

s_strs = 'oneXXXtwoYYYthreeZZZfour'
print(re.split('XXX|YYY|ZZZ', s_strs))
# ['one', 'two', 'three', 'four']

>>> import re
>>> line = 'how to; do, in,java,      dot, com'
>>> re.split(r'[;,\s]\s*', line)
# split with delimiters comma, semicolon and space 
# followed by any amount of extra whitespace.
['how', 'to', 'do', 'in', 'java', 'dot', 'com']

# When using re.split(), you need to be a bit careful should the regular expression pattern 
# involve a capture group enclosed in parentheses. 
# If capture groups are used, then the matched text is also included in the result.
>>> import re
>>> line = 'how to; do, in,java,      dot, com'
>>> re.split(r'(;|,|\s)\s*', line)
# split with delimiters comma, semicolon and space 
# followed by any amount of extra whitespace.
['how', ' ', 'to', ';', 'do', ',', 'in', ',', 'java', ',', 'dot', ',', 'com']

# Ressources : https://note.nkmk.me/en/python-split-rsplit-splitlines-re/
# https://howtodoinjava.com/python/split-string/

# ex. Vérifier la validité d'un numéro de téléphone
import re
# 0 => 1 fois
# 1 à 7 => 1 fois
# un -, 2 nombres de 0 à 9 => 4 fois 
# (une séquence)
numeros_de_telephone = ['06-71-45-34-23',
                        '02-12-33-75-12',
                        '00-23-14-52-44',
                        '514-235-0293',
                        '03-52-31-56-34']

for tel in numeros_de_telephone:
    match = re.search(r'0{1}[1-7]{1}(-[0-9]{2}){4}', tel)
    print('Le numero {} est {}'.format(tel, 'valide' if match else 'invalide'))

# ex. Vérifier la validité d'une adresse email
import re

adresses_mail = ['christian_martin@gmail.com',
                 'JaiOublieLarobasegmail.com',
                 'MarieHutchinson03523@yahoo.co.uk',
                 'UnEaDreSSeMail!38BIZarre@unSiTeBizarre.com',
                 'ceciNestPasUneDresseMail']

for mail in adresses_mail:
    adresse_valide = re.search(r'.+@[a-zA-Z0-9-]+\.[a-zA-Z-.]+', mail)
    # .+ = n'importe quel caractère, illimité
    # + = de 1 à l'infini
    print("L'adresse {} est {}".format(mail, 'valide' if adresse_valide else 'invalide'))

# ex. REGEX PASSWORD VALIDATION
# Un mot de passe qui doit valider des contraintes
# At least six characters long
# contains a lowercase letter
# contains an uppercase letter
# contains a number

# my answer :
regex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$"

# réponse détaillée :
regex = (
    '^'            # start line
    '(?=.*\d)'     # must contain one digit from 0-9
    '(?=.*[a-z])'  # must contain one lowercase characters
    '(?=.*[A-Z])'  # must contain one uppercase characters
    '[a-zA-Z\d]'   # permitted characters (alphanumeric only)
    '{6,}'         # length at least 6 chars
    '$'            # end line
)

# ex. récupérer l'extension d'un fichier
import re

def recuperer_extension(fichier):
    e = re.search(r'^.+\.(\D{3})$', fichier)
    extension = e.group(1)
    print(extension)

recuperer_extension("document.doc") # doc

# match or search ?
if you need to match at the beginning of the string, or to match the entire string use match. 
It is faster. Otherwise use search.

# exemples
>>> import re
>>> pattern = re.compile('abc')
>>> bool(pattern.match('abcde'))
True
>>> bool(pattern.match('def'))
False
>>> bool(pattern.match('ABC'))
False
>>> pattern = re.compile('abc', re.IGNORECASE)
>>> bool(pattern.match('ABC'))
True

>>> pattern = re.compile('Hi, (\w+)')
>>> match = pattern.match('Hi, Matt')
>>> match.group(1)
'Matt'

re.compile() # crée un objet regex réutilisable

prog = re.compile(pattern)
result = prog.match(string)
# is equivalent to
result = re.match(pattern, string)
# re.compile is more efficient when the expression will be used several times 
# in a single program

re.findall() # crée une liste d'élement qui valident la regex
words = re.findall('[a-zA-Z][^A-Z]*', string)
# trouve les mots commençant par une lettre, suivi de 0 ou + minuscules
# words : ['my', 'Camel', 'Has', 'Humps', 'Ex8mple']

re.sub(regex, subst, string) # créer un nouveau string grâce à une regex
re.sub(r"\s+", "-", result) # remplace les espaces par des tirets
# dans le string nommé result

# Tester ses expressions régulières avec Regex101.com
# Regarder Quick Reference pour bâtir ses regex
```

## PHP

```
Fonctionnalité Rechercher/Remplacer très poussée

• Où utiliser une regex ?

2 types d'expressions régulières : POSIX (mis en avant par PHP, plus simple mais plus lent) vs. PCRE (issues du langage Perl, plus complexes mais plus performantes)
Notre choix : PCRE

	○ Les fonctions qui nous intéressent
- preg_grep ;
- preg_split ;
- preg_quote ;
- preg_match ;
- preg_match_all ;
- preg_replace ;
- preg_replace_callback ;

- preg_match : renvoie TRUE (mot trouvé) ou FALSE (mot absent)
<?php
if (preg_match("** Votre REGEX **", "Ce dans quoi vous faites la recherche"))
{
	echo 'Le mot que vous cherchez se trouve dans la chaîne';
}
else
{
	echo 'Le mot que vous cherchez ne se trouve pas dans la chaîne';
}
?>

• Des recherches simples

○ Une regex est entourée de caractères spéciaux = délimiteurs => #regex# => #regex#Options;
<?php
if (preg_match("#guitare#", "J'aime jouer de la guitare."))
{
    echo 'VRAI';
}
else
{
    echo 'FAUX';
}
?>

○ Les regex sont sensibles à la casse => #Guitare# || #GUITARE# => FAUX;
On utilise l'OPTION i => #Guitare#i || GUITARE#i => VRAI;

○ Le symbole OU = #guitare|piano#;
J'aime jouer de la guitare. #guitare|piano# VRAI
J'aime jouer du piano. #guitare|piano# VRAI
J'aime jouer du banjo. #guitare|piano# FAUX
J'aime jouer du banjo. #guitare|piano|banjo# VRAI

○ Début et fin de chaîne
 - ^ : début de la chaîne
 - $ : fin de la chaîne
Pour qu'une chaîne commence par « Bonjour », il faudra utiliser la regex : #^Bonjour#;
De même, si on veut vérifier que la chaîne se termine par « zéro », on écrira cette regex :
#zéro$#;
Bonjour petit zéro #^Bonjour# VRAI
Bonjour petit zéro #zéro$# VRAI
Bonjour petit zéro #^zéro# FAUX
Bonjour petit zéro !!! #zéro$# FAUX

• Les [classes] de caractères

○ Des [classes] simples
#gr[io]s# => "gris" ou "gros" => [i || o];
La nuit, tous les chats sont gris #gr[aoi]s# VRAI
Berk, c'est trop gras comme nourriture #gr[aoi]s# VRAI
Berk, c'est trop gras comme nourriture #gr[aoi]s$# FAUX
Je suis un vrai zéro #[aeiouy]$# VRAI (notre regex doit se terminer par une voyelle (aeiouy))
Je suis un vrai zéro #^[aeiouy]# FAUX (la chaîne doit commencer par une voyelle (en minuscule, en plus))

○ Les intervalles de classe
[a-z], [a-e], [0-9], à la suite : [a-z0-9] (N'importe quelle lettre (minuscule) OU un chiffre);
[a-zA-Z0-9];
Cette phrase contient une lettre #[a-z]# VRAI
cette phrase ne comporte ni majuscule ni chiffre #[A-Z0-9]# FAUX
Je vis au 21e siècle #^[0-9] # FAUX
<h1>Une balise de titre HTML</h1> #<h[1-6]># VRAI

○ Exclure des caractères
#[^element]#;
#[^0-9]# : vous voulez que votre chaîne comporte au moins un caractère qui ne soit pas un chiffre.;
Cette phrase contient autre chose que des chiffres #[^0-9]# VRAI
cette phrase contient autre chose que des majuscules et des chiffres #[^A-Z0-9]# VRAI
Cette phrase ne commence pas par une minuscule #^[^a-z]# VRAI
Cette phrase ne se termine pas par une voyelle #[^aeiouy]$# FAUX
ScrrmmmblllGnngngnngnMmmmmffff #[^aeiouy]# VRAI

• Les quantificateurs

Combien de fois peuvent se répéter un caractère ou une suite de caractères.

○ Les symboles les plus courants
- ? : lettre FACULTATIVE : peut y être 0 ou 1 fois => #a?#reconnaît 0 ou 1 « a » ;
- + : lettre OBLIGATOIRE : peut y être 1 ou plusieurs fois => #a+# reconnaît « a », « aa », « aaa », « aaaa », etc. ;
- * : lettre FACULTATIVE : peut y être 0, 1 ou plusieurs fois => #a*#reconnaît « a », « aa », « aaa », « aaaa », etc. Mais s'il n'y a pas de « a », ça fonctionne aussi !;
- Ces symboles s'appliquent à la lettre se trouvant directement devant. 
On peut ainsi autoriser le mot « chien », qu'il soit au singulier comme au pluriel, avec la regex #chiens?# (fonctionnera pour « chien » et « chiens »);
bor?is# => le code reconnaîtra « boris » et « bois » !;
- Pour deux lettres ou plus qui se répétent : ();
#Ay(ay)*# => ce code reconnaîtra « Ay », « Ayay », « Ayayay », « Ayayayay », ect.
Vous pouvez utiliser le symbole « | » dans les parenthèses. La regex #Ay(ay|oy)*# renverra par exemple vrai pour « Ayayayoyayayayoyoyoyoyayoy » ! C'est le « ay » OU le « oy » répété plusieurs fois, tout simplement !
Vous pouvez mettre un quantificateur après une classe de caractères (vous savez, avec les crochets !). Ainsi #[0-9]+# permet de reconnaître n'importe quel nombre, du moment qu'il y a au moins un chiffre !
eeeee #e+# VRAI
ooo #u?# VRAI
magnifique #[0-9]+# FAUX
Yahoooooo #^Yaho+$# VRAI
Yahoooooo c'est génial ! #^Yaho+$# FAUX
Blablablablabla #^Bla(bla)*$# VRAI
La regex #^Yaho+$# signifie que la chaîne doit commencer et finir par le mot « Yaho ». Il peut y avoir un ou plusieurs « o ». Ainsi « Yaho », « Yahoo », « Yahooo », etc. marchent…;
La dernière regex autorise les mots « Bla », « Blabla », « Blablabla », etc. Je me suis servi des parenthèses pour indiquer que « bla » peut être répété 0, 1 ou plusieurs fois.

○ Être plus précis grâce aux accolades
3 façons d'utiliser les accolades :
- {3} : la lettre ou le groupe DOIT être répété 3 FOIS;
#a{3}# fonctionne seulement pour la chaîne « aaa »;
- {3, 5} : la lettre ou le groupe DOIT être répété ENTRE 3 et 5 FOIS;
#a{3,5}# fonctionne pour « aaa », « aaaa », « aaaaa »;
- {3, } : la lettre ou le groupe DOIT être répété 3 FOIS OU PLUS;
#a{3,}# fonctionne pour « aaa », « aaaa », « aaaaa », « aaaaaa », etc;
=> ? revient à écrire {0,1};
=> + revient à écrire {1,};
=> * revient à écrire {0,};
eeeee #e{2,}# VRAI
Blablablabla #^Bla(bla){4}$# FAUX
546781 #^[0-9]{6}$# VRAI

• Les métacaractères

○ Les métacaractères (caractères spéciaux) à retenir :
# ! ^ $ ( ) [ ] { } ? + * . \ |
Chercher "Quoi ?" dans une chaîne : #Quoi ?# = FALSE / #Quoi \?# = TRUE;
L'ANTISLASH indique que ce qui vient juste après n'est pas un caractère spécial (Comme 'J\'ai');
Pour utiliser un antislash = \\;
Je suis impatient ! #impatient \!# VRAI
Je suis (très) fatigué #\(très\) fatigué# VRAI
J'ai sommeil… #sommeil\.\.\.# VRAI
Le smiley :-\ #:-\\# VRAI

○ Le cas des classes
À l'intérieur de crochets, les métacaractères ne comptent plus;
#[a-z?+*{}]# signifie qu'on a le droit de mettre une lettre, un point d'interrogation, un signe +, etc.
3 cas particuliers :
1) # sert à indiquer la fin de la regex. Pour l'utiliser dans la liste des possibles caractères, vous DEVEZ mettre un antislash devant, même dans une classe de caractères;
2) ] (crochet fermant) : indique la fin de la classe ; si vous voulez vous en servir comme métacaractères il faut utiliser \l'antislash devant.;
3) - (tiret) : définit une intervalle de classe. Pour ajouter le tiret dans la liste des caractères possibles, il faut l'ajouter au débt ou à la fin de la classe. Ex. : [a-z0-9-] permet de chercher une lettre, un chiffre ou un tiret.;

• Les classes abrégées (raccourcis)

○ \d : Indique un chiffre. Ça revient exactement à taper[0-9];
○ \D : Indique ce qui n'est PAS un chiffre. Ça revient à taper[^0-9];
○ \w : Indique un caractère alphanumérique ou un tiret de soulignement. Cela correspond à [a-zA-Z0-9_];
○ \W : Indique ce qui n'est PAS un caractère alphanumérique. Si vous avez suivi, ça revient à taper[^a-zA-Z0-9_];
○ \t : Indique une tabulation (↹);
○ \n : Indique une nouvelle ligne;
○ \r : Indique un retour chariot (|<-- retour à la ligne sans sauter de ligne);
○ \s : Indique un espace blanc;
○ \S : Indique ce qui n'est PAS un espace blanc (\t \n \r);
○ . : Indique n'importe quel caractère. Il autorise donc tout, sauf les entrées (\n);
Pour faire en sorte que le point indique tout, même les entrées, vous devrez utiliser l'option « s » de PCRE. Exemple : #[0-9]-.#s

• Construire une regex complète

○ Un numéro de téléphone
- Un numéro de téléphone français comporte 10 chiffres.;
- Le premier chiffre est TOUJOURS un 0 ;
- Le second chiffre va de 1 à 6 ;
- Ensuite viennent les 8 chiffres restants ;

Numéro de téléphone sans espaces :
1) On veut qu'il y ait UNIQUEMENT le numéro de téléphone. On va donc commencer par mettre les symboles ^ et $ pour indiquer un début et une fin de chaîne : #^$# ;
2) On sait que le premier caractère est forcément un 0. On tape donc : #^0$# ;
3) Le 0 est suivi d'un nombre allant de 1 à 6, sans oublier le 8 pour les numéros spéciaux. Il faut donc utiliser la classe[1-68], qui signifie « Un nombre de 1 à 6 OU le 8 » : #^0[1-68]$# ;
4) Ensuite, viennent les 8 chiffres restants, pouvant aller de 0 à 9. Il nous suffit donc d'écrire[0-9]{8} pour indiquer que l'on veut 8 chiffres. Au final, ça nous donne cette regex :
#^0[1-68][0-9]{8}$# ;

Numéro de téléphone avec espaces, tirets, points, etc. :
1) Le 0 puis le chiffre de 1 à 6 sans oublier le 8. Ça, ça ne change pas : #^0[1-68]$# ;
2) Après ces deux premiers chiffres, il peut y avoir soit un espace, soit un tiret, soit un point, soit rien du tout (si les chiffres sont attachés). On va donc utiliser la classe [-. ] (tiret, point, espace). Pour que cette classe ne soit pas obligatoire => ?
#^0[1-68][-. ]?$# ;
3) Après le premier tiret (ou point, ou espace, ou rien), on a les deux chiffres suivants. On doit donc rajouter[0-9]{2} à notre regex. #^0[1-68][-. ]?[0-9]{2}$# ;
4) On a juste besoin de dire que « [-. ]?[0-9]{2} » doit être répété quatre fois :
#^0[1-68]([-. ]?[0-9]{2}){4}$# ;
<p>
<?php
if (isset($_POST['telephone']))
{
    $_POST['telephone'] = htmlspecialchars($_POST['telephone']); // On rend inoffensives les balises HTML que le visiteur a pu entrer

    if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']))
    {
        echo 'Le ' . $_POST['telephone'] . ' est un numéro <strong>valide</strong> !';
    }
    else
    {
        echo 'Le ' . $_POST['telephone'] . ' n\'est pas valide, recommencez !';
    }
}
?>
</p>

<form method="post">
<p>
    <label for="telephone">Votre téléphone ?</label> <input id="telephone" name="telephone" /><br />
    <input type="submit" value="Vérifier le numéro" />
</p>
</form>

○ Tester une adresse mail
- Le pseudonyme (au minimum une lettre, mais c'est plutôt rare). Il peut y avoir des lettres minuscules (pas de majuscules), des chiffres, des points, des tirets et des underscores « _ » ;
- Le @rob@ase ;
- Le nom de domaine. Pour ce nom, même règle que pour le pseudonyme : que des minuscules, des chiffres, des tirets, des points et des underscores. La seule différence – vous ne pouviez pas forcément deviner – c'est qu'il y a au moins deux caractères (par exemple, « a.com » n'existe pas, mais « aa.com » oui). ;
- L'extension (comme « .fr »). Cette extension comporte un point, suivi de deux à quatre lettres (minuscules). En effet, il y a « .es », « .de », mais aussi « .com », « .net », « .org », « .info », etc.
- Modèle : j.dupont_2@orange.fr ;

Construction de la regex :
1) On ne veut QUE l'adresse e-mail ; on va donc demander à ce que ça soit un début et une fin de chaîne : #^$# ;
2) On a des lettres, chiffres, tirets, points, underscores, au moins une fois. On utilise donc la classe [a-z0-9._-] à la suite de laquelle on rajoute le signe + pour demander à ce qu'il y en ait au moins un : #^[a-z0-9._-]+$# ;
3) Vient ensuite l'arobase (là ce n'est pas compliqué, on a juste à taper le caractère) :
#^[a-z0-9._-]+@$# ;
4) Puis encore une suite de lettres, chiffres, points, tirets, au moins deux fois. On tape donc{2,}pour dire « deux fois ou plus » : #^[a-z0-9._-]+@[a-z0-9._-]{2,}$# ;
5) Ensuite vient le point (de « .fr » par exemple). On va donc mettre un antislash devant :
#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.$# ;
6) Pour terminer, il nous faut deux à quatre lettres. Ce sont forcément des lettres minuscules, et cette fois pas de chiffre ou de tiret, etc. On écrit donc :
#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$# ;
<p>
<?php
if (isset($_POST['mail']))
{
    $_POST['mail'] = htmlspecialchars($_POST['mail']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
    {
        echo 'L\'adresse ' . $_POST['mail'] . ' est <strong>valide</strong> !';
    }
    else
    {
        echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas valide, recommencez !';
    }
}
?>
</p>

<form method="post">
<p>
    <label for="mail">Votre mail ?</label> <input id="mail" name="mail" /><br /> 
    <input type="submit" value="Vérifier le mail" />
</p>
</form>

○ Des regex avec MySQL
MySQL ne comprend que les regex en langage POSIX, et pas PCRE comme on a appris.
À retenir pour faire une regex POSIX :
- Il n'y a pas de délimiteur ni d'options. Votre regex n'est donc pas entourée de dièses ;
- Il n'y a pas de classes abrégées comme on l'a vu plus haut, donc pas de \d, etc. En revanche, vous pouvez toujours utiliser le point pour dire : « n'importe quel caractère ». ;
Ex. On a stocké les IP de vos visiteurs dans une table visiteurs et que on veut les noms des visiteurs dont l'IP commence par « 84.254 » :
SELECT nom FROM visiteurs WHERE ip REGEXP '^84\.254(\.[0-9]{1,3}){2}$' ;
Sélectionne tous les noms de la table visiteurs dont l'IP commence par « 84.254 » et se termine par deux autres nombres de un à trois chiffre(s) (ex. : 84.254.6.177). ;

• Capture et Remplacement

Cela va nous permettre par exemple de faire la chose suivante :
    1) chercher s'il y a des adresses e-mail dans un message laissé par un visiteur ;
    2) modifier automatiquement son message pour mettre un lien ;
<a href="mailto:blabla@truc.com"> devant chaque adresse, ce qui rendra les adresses e-mail cliquables !

○ Les parenthèses capturantes
Capture de chaîne avec preg_replace() et les parenthèses. ;
À chaque fois que vous utilisez des parenthèses, cela crée une « variable » contenant ce qu'elles entourent.
#\[b\](.+)\[/b\]# : Chercher dans la chaîne un [b], suivi d'un ou plusieurs caractère(s) (le point permet de dire « n'importe lesquels »), suivi(s) d'un [/b] ». ;
À chaque fois qu'il y a une parenthèse, cela crée une variable appelée $1 (pour la première parenthèse), $2 pour la seconde, etc.
On va ensuite se servir de ces variables pour modifier la chaîne (faire un remplacement).
Pour mettre en gras les mots compris entre [b] et [/b] :
<?php
$texte = preg_replace('#\[b\](.+)\[/b\]#i', '<strong>$1</strong>', $texte);
?>
$texte = preg_replace('regex($1)($2)', 'texte de remplacement', texte sur lequel on fait le remplacement);
La fonction preg_replace renvoie le résultat après avoir fait les remplacements.;
Règles :
- Pour plusieurs parenthèses, pour savoir le numéro de l'une d'elles il suffit de compter leurs ouvertures dans l'ordre de gauche à droite. Ex. : #(anti)co(nsti)(tu(tion)nelle)ment#
Il y a quatre parenthèses dans cette regex (donc $1, $2, $3 et $4). La parenthèse numéro 3 ($3) contient « tutionnelle », et la parenthèse $4 contient « tion ». ;
- On peut utiliser jusqu'à 99 parenthèses capturantes dans une regex. Ça va donc jusqu'à $99.
- Une variable $0 est toujours créée ; elle contient toute la regex. Ex. : $0 contient « anticonstitutionnellement ».;
- Pour qu'une parenthèse NE SOIT PAS capturante (pour vous faciliter les comptes, ou parce que vous avez beaucoup beaucoup de parenthèses), il faut qu'elle commence par un point d'interrogation suivi d'un deux points « : ». Ex. : #(anti)co(?:nsti)(tu(tion)nelle)ment#
La seconde parenthèse n'est pas capturante. Il ne nous reste que trois variables (quatre si on compte $0) : $0 : anticonstitutionnellement, $1 : anti, $2 : tutionnelle, $3 : tion ;

○ Créer son bbCode (réaliser un parser)
- S'entrainer avec :
[b][/b] : pour mettre du texte en gras ;
[i][/i] : pour mettre du texte en italique ;
[color=red][/color] : pour colorer le texte (il faudra laisser le choix entre plusieurs couleurs). ;
Rajouter des options au regex de [b] : i (majuscules acceptées), s (pour que le « point » fonctionne aussi pour les retours à la ligne (pour que le texte puisse être en gras sur plusieurs lignes)), U (« Ungreedy » (« pas gourmand »), permet de faire marcher plusieurs [b] dans le texte, sans qu'ils empiètent sur l'espce de l'autre.);
<?php
$texte = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $texte);
$texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte);
?>
- La balise [color = truc] :
On va laisser le choix entre plusieurs couleurs avec le symbole « | » (OU), et on va utiliser deux parenthèses capturantes :
1) la première pour récupérer le nom de la couleur qui a été choisie (en anglais, comme ça on n'aura pas besoin de le changer pour le code HTML) ;
2) la seconde pour récupérer le texte entre [color=truc] et [/color] (pareil que pour gras et italique). ;
<?php
$texte = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#isU', '<span style="color:$1">$2</span>', $texte);
?>
- Liens cliquables :
<?php
$texte = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $texte);
?>
La regex marche très bien pour http://www.siteduzero.com/images/super_image2.jpg, mais elle ne fonctionne pas s'il y a des variables en paramètres dans l'URL, comme par exemple :
http://www.siteduzero.com/index.php?page=3&skin=blue ;
Résumons maintenant notre parser bbCode au complet :

<?php
if (isset($_POST['texte']))
{
    $texte = stripslashes($_POST['texte']); // On enlève les slashs qui se seraient ajoutés automatiquement
    $texte = htmlspecialchars($texte); // On rend inoffensives les balises HTML que le visiteur a pu rentrer
    $texte = nl2br($texte); // On crée des <br /> pour conserver les retours à la ligne
    
    // On fait passer notre texte à la moulinette des regex
    $texte = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $texte);
    $texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte);
    $texte = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#isU', '<span style="color:$1">$2</span>', $texte);
    $texte = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $texte);

    // Et on affiche le résultat. Admirez !
    echo $texte . '<br /><hr />';
}
?>

<p>
    Bienvenue dans le parser du Site du Zéro !<br />
    Nous avons écrit ce parser ensemble, j'espère que vous saurez apprécier de voir que tout ce que vous avez appris va vous être très utile !
</p>

<p>Amusez-vous à utiliser du bbCode. Tapez par exemple :</p>

<blockquote style="font-size:0.8em">
<p>
    Je suis un gros [b]Zéro[/b], et pourtant j'ai [i]tout appris[/i] sur http://www.siteduzero.com<br />
    Je vous [b][color=green]recommande[/color][/b] d'aller sur ce site, vous pourrez apprendre à faire ça [i][color=purple]vous aussi[/color][/i] !
</p>
</blockquote>

<form method="post">
<p>
    <label for="texte">Votre message ?</label><br />
    <textarea id="texte" name="texte" cols="50" rows="8"></textarea><br />
    <input type="submit" value="Montre-moi toute la puissance des regex" />
</p>
</form>

- Idées de regex que à rajouter au parser :
	-  Faire que les URL cliquables fonctionnent aussi pour des URL avec des variables comme :
http://www.siteduzero.com/index.php?page=3&skin=blue ;
	- Parser les adresses e-mail en faisant un lien mailto: dessus ! ;
	- Compléter le bbCode avec[u],[img], etc. ;
	- Faire son propre bbCode : {gras}{/gras} ;
	- Écrire une fonction qui colore automatiquement le code HTML ! (Vous donnez à la fonction le code HTML, elle en fait un htmlspecialchars, puis elle rajoute des <span style="color:…"> pour colorer par exemple en bleu les noms des balises, en vert les attributs, en rouge ce qui est entre guillemets, etc.)
```