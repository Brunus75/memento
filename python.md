# MEMENTO PYTHON


## SOMMAIRE

* [INSTALLATION](#installation)
* [FORMATTING](#formatting)
* [RACCOURCIS VS CODE](#raccourcis-code)
* [EXTENSIONS VS CODE](#extensions-code)
* [OUTILS](#outils)
* [SPECIFICITES PYTHON](#specificites-python)
* [BONNES PRATIQUES](#bonnes-pratiques)
* [LEXIQUE](#lexique)
* [LE TERMINAL](#le-terminal)
* [PREMIER SCRIPT](#premier-script)
* [PYTHON et VISUAL CODE](#python-vs-code)
* [LES BASES](#les-bases)
* [LES OPERATEURS](#les-operateurs)
* [LES STRUCTURES CONDITIONNELLES](#structures-cond)
* [MODULES ET FONCTIONS](#modules-et-fonctions)
* [LES LISTES](#les-listes)
* [LES SETS](#les-sets)
* [METHODES ET FONCTIONS UTILES](#methodes-utiles)
* [LES BOUCLES](#les-boucles)
* [LES FICHIERS](#les-fichiers)
* [LES DICTIONNAIRES](#les-dictionnaires)
* [LES FONCTIONS](#les-fonctions)
* [LES MODULES](#les-modules)
* [PACKAGES](#packages)
* [DOCUMENTER SON CODE](#documenter-son-code)
* [TESTER SON CODE AVEC PDB](#pdb)
* [LA GESTION D'ERREURS AVEC LES EXCEPTIONS](#exceptions)
* [LE LOGGING](#le-logging)
* [INSTALLER DES PACKAGES SUPPLEMENTAIRES AVEC PIP](#pip)
* [TROUVER LE BON PACKAGE](#trouver-le-bon-package)
* [LES ENVIRONNEMENTS VIRTUELS](#virtuel-env)
* [L'ORIENTÉ OBJET (partie 1)](#objet-part1)
* [L'ORIENTÉ OBJET (partie 2)](#objet-part2)
* [LES METACLASSES](#les-metaclasses)
* [LES DECORATEURS](#les-decorateurs)
* [LES BASES DE DONNEES](#bdd)
* [ARCHITECTURE](#architecture)
* [CREER UNE APP](#creer-une-app)
* [GERER LES DEPENDANCES D'UNE APP](#dependances-app)
* [PROJET CONVERTISSEUR DE DEVISES avec PYSIDE](#projet-devises-pyside)
* [PROJET CINE CLUB avec PYSIDE et JSON (part.1 : en API)](#projet-cine-pyside-1)
* [PROJET CINE CLUB avec PYSIDE et JSON (part.2 : avec l'interface graphique Pyside)](#projet-cine-pyside-2)
* [PYTHON AVANCÉ](#python-avancé)   
   * [OBJETS MUABLES & IMMUABLES](#muables-immuables)
   * [LES FONCTIONS ANONYMES](#fonctions-anonymes)
   * [LA FONCTION ENUMERATE](#la-fonction-enumerate)
   * [FORMATTING](#formatting)
   * [LES COMPREHENSIONS DE LISTE](#list-comprehension)
   * [LES ITERATEURS](#les-iterateurs)
   * [LES GENERATEURS](#les-generateurs)
   * [EXPRESSIONS GENERATRICES](#expressions-generatrices)
   * [OPERATEURS TERNAIRES](#operateurs-ternaires)
   * [LA FONCTION ZIP](#la-fonction-zip)
   * [L'INTROSPECTION](#introspection)
   * [LES FONCTIONS ANY & ALL](#any-et-all)
   * [ARGS & KWARGS](#args-kwargs)
   * [EXPRESSIONS REGULIERES](#expressions-regulieres)
* [10 ERREURS DU DEBUTANT](#erreurs-debutant)
* [ASTUCES](#astuces)
* [MES ASTUCES](#mes-astuces)
* [LIBRAIRIES](#librairies)
* [PYTHON & HTML](#python-html)


## RESSOURCES

* Article à la une : https://www.docstring.fr/blog/
* Clean Code concepts adapted for Python : https://github.com/zedr/clean-code-python
* The Python Standard Library : https://docs.python.org/3/library/index.html
* Les fonctions de Python : https://docs.python.org/3/library/functions.html
* Real Python: Python 3 Cheat Sheet : https://static.realpython.com/python-cheat-sheet.pdf
* Top 10 Python Tools To Make a Developer’s Life Easier : https://www.activestate.com/blog/top-10-python-tools-to-make-your-life-easier
* https://www.udemy.com/course/formation-complete-python/
* https://www.udemy.com/course/cours-python-avance/
* https://realpython.com/pointers-in-python/
* https://openclassrooms.com/fr/courses/4302126-decouvrez-la-programmation-orientee-objet-avec-python
* https://openclassrooms.com/fr/courses/4425111-perfectionnez-vous-en-python
* https://openclassrooms.com/fr/courses/235344-apprenez-a-programmer-en-python/235263-de-bonnes-pratiques
* https://openclassrooms.com/fr/courses/4425066-concevez-un-site-avec-flask/4526533-testez-le-parcours-utilisateur-avec-les-tests-fonctionnels 
* https://github.com/trending/python
* New Features in Python 3.9 You Should Know About : https://medium.com/@martin.heinz/new-features-in-python-3-9-you-should-know-about-14f3c647c2b4
* Python DateTime, TimeDelta, Strftime(Format) with Examples : https://www.guru99.com/date-time-and-datetime-classes-in-python.html
* Development Environment in Python : https://www.pythonforbeginners.com/development/development-environment-in-python
* https://dbader.org/
* Python Developers Survey 2019 Results : https://www.jetbrains.com/lp/python-developers-survey-2019/
* Finding secrets by decompiling Python bytecode in public repositories : https://blog.jse.li/posts/pyc/
* Python String Methods : https://www.programiz.com/python-programming/methods/string/capitalize
* 5 ressources pour débuter en Python ! : https://medium.com/@camille.clarret/5-ressources-pour-d%C3%A9buter-en-python-ec524289ea86
* Fastest Way to Flatten a List in Python : https://chrisconlan.com/fastest-way-to-flatten-a-list-in-python/
* Comprendre Python en 5 minutes : https://www.jesuisundev.com/comprendre-python-en-5-minutes/
* ~ https://realpython.com/python3-object-oriented-programming/ 
* ~ https://realpython.com/primer-on-python-decorators/
* ~ https://realpython.com/tutorials/django/
* ~ https://openclassrooms.com/fr/courses/4425126-testez-votre-projet-avec-python
* ~ https://openclassrooms.com/fr/courses/235344-apprenez-a-programmer-en-python 
* ~ https://www.geeksforgeeks.org/access-modifiers-in-python-public-private-and-protected/
* ~ https://wiki.python.org/moin/PythonDecoratorLibrary
* ~ https://diveintopython3.net/special-method-names.html
* ~ https://code.visualstudio.com/docs/python/linting
* ~ https://docs.python-guide.org/
* ~ http://www.blog.pythonlibrary.org/
* ~ https://treyhunner.com/2015/12/python-list-comprehensions-now-in-color/ 
* ~ https://www.toptal.com/python/python-class-attributes-an-overly-thorough-guide
* ~ https://www.tutorialsteacher.com/python/database-crud-operation-in-python
* ~ https://realpython.com/oop-in-python-vs-java/
* ~ https://docs.python.org/3/tutorial/classes.html
* ~ what kind of goals/benchmarks can I set for myself along the way? https://old.reddit.com/r/learnpython/comments/g7rpwu/ok_so_im_committed_to_1_year_of_coding_in_python/
* ~ https://realpython.com/python-application-layouts/
* ~ Effective Python Testing With Pytest : https://realpython.com/pytest-python-testing/
* ~ Python Coding Interviews: Tips & Best Practices : https://realpython.com/courses/python-coding-interviews-tips-best-practices
* ~ https://realpython.com/preview/python-eval-function
* ~ Regular Expressions: Regexes in Python, Part 1 : https://realpython.com/regex-python/
* ~ The Hitchhiker's Guide to CLIs in Python : https://vinayak.io/2020/05/04/the-hitchhikers-guide-to-clis-in-python/
* ~ Datetime Module (Dates and Times) || Python Tutorial || Learn Python Programming : https://www.youtube.com/watch?v=RjMbCUpvIgw
* ~ How Python Can Create Better Content Briefs and Improve SEO : https://www.semrush.com/blog/python-content-briefs-seo/
* ~ Your Guide to the Python print() Function : https://realpython.com/python-print/
* ~ FunctionTrace : a graphical Python profiler that provides a clear view of your application's execution while being both low-overhead and easy to use : https://functiontrace.com/
* ~ Python Engineer - Free Python and Machine Learning Tutorials : https://www.python-engineer.com/
* ~  A Pythonic Guide to SOLID Design Principles : https://dev.to/ezzy1337/a-pythonic-guide-to-solid-design-principles-4c8i
* ~ Generating color palettes from movies with Python : https://www.youtube.com/watch?v=F5FxuJBHdvo
* ~ Ultimate Guide to Python Debugging : https://martinheinz.dev/blog/24
* ~ How To Send Mail With Python : https://www.youtube.com/watch?v=tsutigPVnaY&feature=youtu.be
* ~ Python vs JavaScript for Pythonistas : https://realpython.com/python-vs-javascript/
* ~ Creating a Discord Bot in Python : https://realpython.com/courses/discord-bot-python
* https://calmcode.io/
* https://www.docstring.fr/blog/le-formatage-des-chaines-de-caracteres-avec-python/   


## INSTALLATION

* https://www.python.org/downloads/
* https://www.python.org/downloads/windows/
* Windows x86-64 executable installer
* Installation avec options, 
* install for all users, associate files, create shortcuts, 
* add Python to environment variables, precompile
* version 3.7.3 pour le cours Udemy
* python -i (interactif) sur Git Bash
* Télécharger cmder (émulateur de terminal)
* https://cmder.net/
* pour éviter tout probleme, NE PAS placer le dossier extrait dans C:\Programmes
* le placer à la racine ex. C:\cmder
* utiliser l'interface de Bash
* lancer python : python
* lancer python en mode interactive : python -i
* lancer une version précise de python : py -3.7
* exit() pour en sortir

## FORMATTING
* Auto formatters for Python : https://www.kevinpeters.net/auto-formatters-for-python
* Editing Python in Visual Studio Code : https://code.visualstudio.com/docs/python/editing#_formatting

## PYCHARM
* IDE Python
* Version gratuite "Community" accessible : https://www.jetbrains.com/fr-fr/pycharm/features/editions_comparison_matrix.html


## <a name="raccourcis-code"></a> RACCOURCIS VS CODE
* Ctrl + : => commente une ligne/plusieurs lignes
* Ctrl + Shift + : => commente plusieurs lignes
* Ctrl + Shift + P : => montre les commandes disponibles (SQLite, par ex.)
* Shift + Alt + F => formate le fichier selon le formatter choisi

## <a name="extensions-code"></a> EXTENSIONS VS CODE
* Python
* autoDocstring
* SQLite
* Formatter = "Black"


## OUTILS
* GitBash
* Cmder
* DB Browser


## SPECIFICITES PYTHON

* Avec Python3, input renvoie systematiquement une "chaine de caractères"
* Le point-virgule n'est JAMAIS utilisé en Python'
* None # équivalent de Null
* Un package peut parfois consister en une seul fichier (on parle donc dans ce cas de module), 
et le terme librairie quant à lui est souvent utilisé pour parler de packages
* Rien n'est privé en Python, tout est public
* In Python you don't strictly need getters and setters because you can access the attributes 
of the object directly (e.g. you could just print(kitchen. description))
* Les méthodes privées sont pensées pour une utilisation en interne (réservé à l'intérieur de la classe)
* Il y a une convention pour les _méthodes privées
```py
class Classe:
    def _methode_privee(self): # techniquement elle est protégée
        # ce qui dit à l'utilisateur : n'y touche pas
        # tu peux seulement l'utiliser à l'intérieur de la classe Mère
        # ou à l'intérieur de l'une de ses instances
        # mais pas depuis l'extérieur !
        # (principe de la boîte noire)
        # on ne parle pas de privé, mais de non public
        print("Je suis une méthode privée !")
```
* les_noms_minuscules_avec_underscore_sont_vivement_encourages
* Tout est objet en Python
* With Python, you don’t assign variables. Instead, you bind names to references (Python objects)
En Python, une variable est un nom identifiant, pointant vers une référence d'un objet Python
Ce qui explique ceci :
```py
>>> x = 1000
>>> y = 1000
>>> x is y
True
```
* 'single quote' est équivalent à "double quote"
```py
"""
    Generally, double quotes are used for string representation 
    and single quotes are used for regular expressions, dict keys or SQL. 
    Hence both single quote and double quotes depict string in python 
    but it's sometimes our need to use one type over the other.
    Pick a rule and stick to it.
    When a string contains single or double quote characters, however, 
    use the other one to avoid backslashes in the string.
"""
```
"J'écris une phrase en guillemets", 'clé', 'valeur'


## BONNES PRATIQUES

* La PEP 8 a pour objectif de définir des règles de développement communes entre développeurs
>>> http://pep8.org/
* Une ligne doit contenir 80 caractères maximum.
* L'indentation doit être de 4 espaces.
* Ajoutez deux lignes vides entre deux éléments de haut niveau, des classes par exemple, 
pour des questions d'ergonomie.
* Séparez chaque fonction par une ligne vide.
* Les noms (variable, fonction, classe, ...) ne doivent pas contenir d'accent. 
Que des lettres ou des chiffres !
* Selon la PEP 8, chaque partie de votre code devrait contenir une Doctring :   
   - tous les modules publics
   - toutes les fonctions
   - toutes les classes
   - toutes les méthodes de ces classes
* Les imports sont à placer au début d'un script.
* Ils précèdent les Docstrings.
* Une ligne par librairie. 
Exemple : import os
* Une ligne peut néanmoins inclure plusieurs composantes. 
Exemple : from subprocess import Popen, PIPE
* L'import doit suivre l'ordre suivant : 
Bibliothèques standard, Bibliothèques tierces et imports locaux. 
Sautez une ligne entre chacun de ces blocs.
* Dans vos directives d'importation, utilisez des chemins absolus plutôt que relatifs. 
Autrement dit:
```py
from paquet.souspaquet import module
# Est préférable à
from . import module
```
* Pas d'espace avant":" mais un après. 
Exemple: {oeufs: 2}
* Aucun espace avant et après un signe = lorsque vous assignez la valeur 
par défaut du paramètre d'une fonction. 
Exemple: 
```py 
def elephant(trompe=True, pattes=4)
```
* commentaires : ne décrivez pas le code, expliquez plutôt à quoi il sert.
Il doit être en anglais.
* Modules : nom court, tout en minuscules, tiret du bas si nécessaire. great_module
* paquets : nom court, tout en minuscules, tirets du bas très déconseillés. paquet
* classes : lettres majuscules en début de mot. MyGreatClass
* exceptions : similaire aux classes mais avec un Error à la fin. MyGreatError
* fonctions : minuscules et tiret du bas : my_function()
* méthodes : minuscules, tiret du bas et self en premier paramètre : my_method(self)
* arguments des méthodes et fonctions : identique aux fonctions. my_function(param=False)
* variables : identique aux fonctions.
* constantes : tout en majuscules avec des tirets si nécessaire. I_WILL_NEVER_CHANGE
* privé : précédé de deux tirets du bas : __i_am_private
* protégé : précédé d'un tiret du bas : _i_am_protected
* il est mieux d'utiliser is ou is not lors d'une comparaison avec None. 
Par exemple:
```py
if datafile is None:
    print("I'm pythonic")
```
* Si vous devez découper une ligne trop longue, faites la césure après l'opérateur, pas avant.
```py
# Oui
un_long_calcul = variable + \
    taux * 100
# Non
un_long_calcul = variable \
    + taux * 100
```
* à partir de Python 3.0, il est conseillé d'utiliser, dans du code comportant des accents, 
l'encodage Utf-8
* Les 19 aphorismes de la PEP20:
```py
"""
Beautiful is better than ugly.
Explicit is better than implicit.
Simple is better than complex.
Complex is better than complicated.
Flat is better than nested.
Sparse is better than dense.
Readability counts.
Special cases aren't special enough to break the rules.
Although practicality beats purity.
Errors should never pass silently.
Unless explicitly silenced.
In the face of ambiguity, refuse the temptation to guess.
There should be one-- and preferably only one --obvious way to do it.
Although that way may not be obvious at first unless you're Dutch.
Now is better than never.
Although never is often better than *right* now.
If the implementation is hard to explain, it's a bad idea.
If the implementation is easy to explain, it may be a good idea.
Namespaces are one honking great idea -- let's do more of those!
"""
```
Exemple > https://gist.github.com/evandrix/2030615


## LEXIQUE

### *args et **kwargs
```py
*args = faire passer une variable indéfinie, sans clé, dans une fonction

def test_var_args(f_arg, *argv):
    print("first normal arg:", f_arg)
    for arg in argv:
        print("another arg through *argv:", arg)

test_var_args('yasoob', 'python', 'eggs', 'test')
# first normal arg: yasoob
# another arg through *argv: python
# another arg through *argv: eggs
# another arg through *argv: test

**kwargs = faire passer une variable indéfinie, associée à une clé

def greet_me(**kwargs):
    for key, value in kwargs.items():
        print("{0} = {1}".format(key, value))

>>> greet_me(name="yasoob")
name = yasoob
```

### Context manager
```py
a context manager (like with) is some code that implements an __enter__ and __exit__ method
Python let’s you create your own context managers. 
Check out contextlib for more info

>>> from contextlib import contextmanager
>>> @contextmanager
... def praise():
...     print('You can do it.')
...     yield
...     print('You made it.')
...
>>> with praise():
...     print('I am trying to code.')
...
You can do it.
I am trying to code.
You made it.
```


## LE TERMINAL
```py
~ # dossier utilisateur ex. /c/Users/pablo

# ls pour une vue en liste
ls # liste les fichiers présents
ls -a # pour les fichiers cachés
ls -l # vue en liste

# #pwd pour savoir où l'on est
pwd # print walking directory

# cd pour changer de dossier
cd dossierSuivant/
cd .. # remonte dans le dossier parent
cd ../.. # remonte de deux dossiers
cd ~ # revient à la racine, au dossier utilisateur ex. /c/Users/pablo

# clear pour nettoyer le terminal (remet le curseur en haut)

# mkdir pour créer un dossier
mkdir dossier_test # crée le dossier dans le dossier courant
cd dossier_test 
mkdir ../dossier_test # crée le dossier dans le niveau supérieur

# rm pour supprimer un dossier
rm fichierASupprimer.txt
rm -r dossierASupprimer/

# touch pour créer un fichier
touch monfichier.py
```

## PREMIER SCRIPT
Cmder > print("Hello World !");

## <a name="python-vs-code"></a> PYTHON et VISUAL CODE
```py
Ouvrir 'VS Code' depuis le terminal => code;
code monDossierAOuvrir;
code monFichierAOuvrir;
code . # ouvre le dossier dans lequel je me trouve
# Extensions à installer :
* Python
# faire marcher Python dans le terminal de VS Code
clic-droit + 'Run Python File in Terminal'
ou clic sur la flèche à droite de 'VS Code'
# exécuter ce code depuis un terminal
cd dossierScript/
python3 test.py 
/usr/local/bin/python3 test.py
# sur VS Code, pour exécuter un terminal sur un fichier précis
clic-droit sur le fichier ou dossier => Run in Terminal
```

## LES BASES
```py
prenom = "Pierre"
prenom = "Jean"
print(prenom); # Jean
age = 30
taille = 1.72
# convention = tout en minuscule, séparé de l'underscore
nom_de_famille # plutôt que nomDeFamille et nomdefamille
# affectation parallèle
a, b = 5, 8 # a = 5, b = 8
a, b = b, a # inverse les valeurs des variables
# affectation multiple
a = b = c = 5
# récupérer l'input de l'utilisateur
nombre = input("Entrez un nombre : ")
print(nombre)
# exemple
prenom = input("Comment vous appelez-vous ? ")
ville_naissance = input("Quelle est votre ville de naissance ? ")
age = input("Quel est votre âge ? ")

print(prenom)
print(ville_naissance)
print(age)
# Python : langage dynamique et fortement typé
# pas besoin de renseigner le type d'une variable, qui peut être changée à tout moment
variable = 5
variable = "Fraises"
# fortement typé
50 + "50" # lève une erreur, contrairement au faiblement typé de JS
# les fonctions de conversion
a = "5"
a = int(a) # a = 5
# exemple
a = 10
b = input("Entrez un nombre : ")
resultat = a + int(b)
print("Le résultat de l'opération est " + str(resultat))
# afficher le type d'une variable
a = "10"
print(type(a)) # 'str'

# concaténation avec les f-string (depuis Python 3.6)
prenom = "Paul"
f"Bonjour {prenom} !" # "Bonjour" + str(prenom)
a = 5
b = 10
f"La multiplication de {a} par {b} est égale à {a * b} !"

# les anciennes méthodes de concaténation
# la méthode format()
nombre = 5
"Le nombre est égal à {}".format(nombre)
"Le nombre est égal à 5"
"Les nombres sont égaux à {} et {}".format(5, 10)
"Les nombres sont égaux à 5 et 10"

# f string fonctionne aussi avec les dictionnaires
ALBUMS = {
    'eminame': 'toulouse yourself',
    'riz hannah': 'blehblehblehblehbleh',
}

print(f"Le dernier album de Eminame est : {ALBUMS['eminame']}")
# Le dernier album de Eminame est : toulouse yourself 

# Commentaire sur une ligne
"""
Commentaire
sur 
plusieurs 
lignes
"""

# Exercices
a = int(input("Entrez un premier nombre : "))
b = int(input("Entrez un deuxième nombre : "))
resultat = f"Le résultat de l'addition de {a} avec {b} est égal à {a + b}"
print(resultat)
# ex.2
print(f"J'ai une classe de {30} élèves")
print(f"{10} + {5} est égal à {15}")
print(10 + int("5"))
print(f"L'addition de {10} + {5} est égal à {10 + 5}")
# ex.2 
a = "J'ai une classe de " + str(30) + " élèves"
b = str(10) + " + " + "5" + " est égal à " + str(15)
c = 10 + int("5")
d = "L'addition de 10 + 5 est égal à " + str(10 + 5)
```

## LES OPERATEURS
```py
+ - * /
print(6 / 2) # 3.0
print("Python" * 3)  # PythonPythonPython
% # modulo, récupère le reste (positif) de la division
# représente le plus petit nombre positif possible
print(10 % 2) # 0, car 2x5 = 10 tout round
print(6 % 4) # 2, car 4x1 = 4, il reste 2 pour arriver à 6
print(-11 % 5) # 4, car le reste ne peut être que POSITIF
# 5 * (-3) + 4 = -11
print(-7 % 4) # 1 (4 x -2 = -8 | pour aller à -7 = +1)
print(7 % -4) # -1
// # division entière : récupère un nombre entier
print(10 // 3) # 3
** # puissance
print(2 ** 4) # 16 2*2*2*2

# opérateurs mathématiques avancés avec le module math
import math # import du module
racine = math.sqrt(16) # calculer la racine carrée
print(racine) # 4
# liste des fonctions les + utilisées :
math.ceil(-4.7) # entier immédiatement supérieur, donne ici - 4.
math.exp(2) # exponentielle.
math.factorial(5) # factorielle 5, donc 120 ici(fonctionne uniquement pour les entiers positifs).
math.floor(-4.7) # partie entière, donne ici - 5.
math.isinf(x) # teste si x est infini(inf) et renvoie True si c'est le cas.
math.log(2) # logarithme en base naturelle.
math.log(8, 2) # log de 8 en base 2.
math.log10(2) # logarithme en base 10.
math.pow(2, 3) # 2 puissance 3 (peut aussi s'écrire 2 ** 3).
math.sqrt(16) # racine carrée, donne ici 4.
* fonctions trigonométriques: 
# math.sin, math.cos, math.tan, math.asin, math.acos, math.atan(argument en radians).
* fonctions hyperboliques: 
# math.sinh, math.cosh, math.tanh, math.asinh, math.acosh, math.atanh.
math.degrees(x) # convertit de radians en degrés.
math.radians(x) # convertit de degrés en radians.
* Les constantes:
math.pi(3.14159...)
math.e(2.71828...)

# opérateurs d'assignation
i += 1 # i = i + 1
i -= 1
i *= 1
i /= 1
i %= 1
i //= 1
i **= 1

# opérateurs de comparaison
>, <, >=, <=, ==, !=

# opérateurs ternaires
age = 20
majeur = True if age >= 18 else False
# équivalent de majeur = age >= 18 ? true : false

# différence entre is et ==
is # vérifie si les objets sont les mêmes en mémoire
a = [1, 2, 3]
b = [1, 2, 3]
a == b # true
a is b # false, les objets sont différents en mémoire
id(a) # l'adresse en mémoire, est différente de id(b)
# les nombres entre -5 et 256 ont la même adresse mémoire
a = 5
b = 5
a is b # true

# les booléens
True, 1, "a" # true
False, 0, "", [] # false
False + 1 # 1
True + 1 # 2
# ex.
# Demander à l'utilisateur d'entrer un nombre pour tenter de deviner le nombre mystère.
# Afficher si le nombre entré par l'utilisateur est égal au nombre mystère 
# (afficher un booléen True ou False)
nombre_mystere = 7
nombre_utilisateur = input("Quel est le nombre mystère ? ")
resultat = int(nombre_utilisateur) == nombre_mystere
print(resultat)
```

## <a name="structures-cond"></a> LES STRUCTURES CONDITIONNELLES
```py
if age >= 18:
    print("Vous êtes majeur !")

# les blocs d'instructions sont définis par la mise en page
if age >= 18:
    print("Vous êtes majeur !")
    if langage == "Python":
        print("Vous pouvez rentrer")
print("Le script est terminé")

# elif = elseif
if age >= 18:
    print("Vous êtes majeur !")
elif age < 18:
    print("Vous êtes mineur !")

# else
utilisateur = "admin"
if utilisateur == "admin":
    print("Accès autorisé !")
elif utilisateur == "root":
    print("Accès autorisé !")
else:
    print("Accès refusé !")

# les operateurs logiques : and, or, not
if utilisateur == "admin" and mot_de_passe == "admin":
    print("Accès autorisé !")
5 > 2 and 5 < 10 or 5 > 15
# and plus fort, évalué en premier
# pour spécifier une priorité, on invoque les parenthèses
5 > 2 and (5 < 10 or 5 > 15)
not True # False
not False # True
if not utilisateur == "admin":
    print("Accès refusé !")
# Pour chaque ligne de code, vous devez dire si le résultat des booléens liés
# par des opérateurs logiques sera True ou False.
True or False # True
False and True # False
False and False and True # False
True or True or False and True or False # True (True or True or False) and (True or False)
True and False and False # False
(True and False) or True # True
True and (False or True) # True
# Comment vérifier la valeur du nombre entré par l'utilisateur par rapport au nombre mystère ?
nombre_essai = int(input("Devinez le nombre mystère : "))
if nombre_essai == nombre_mystere:
    print("Bravo, vous avez trouvé le nombre mystère !")
elif nombre_essai < nombre_mystere:
    print(f"Le nombre mystère est supérieur à {nombre_essai}")
else:
    print(f"Le nombre mystère est inférieur à {nombre_essai}")
```

## MODULES ET FONCTIONS
```py
module = fichier python qui contient des fonctions
module à importer : import nom_module
pour utiliser la fonction : nom_module.nom_fonction
random.randint(0, 1)

# le module random 
# fonction randint récupère un nombre aléatoire entier entre deux valeurs
random.randint(0, 1) # génère 0 ou 1 (fonction inclusive)
# fonction uniform génère un nombre décimal
random.uniform(0, 1)  # génère 0.33328, 0.99887, ect. 
# fonction randrange (exclusive) qui génère un entier entre 0 et n
random.randrange(999) # génère un entier entre 0 et 999
random.randrange(0, 100, 10) # génère, entre 0 et 101, avec un pas de 10
# 80, 40, 90, 10
# comparer 2 nombres aléatoires
import random

a = random.randint(0, 100)
b = random.randint(0, 100)

if a == b:
    print("Le nombre a et le nombre b sont égaux")
elif a > b:
    print("Le nombre a est plus grand que le nombre b")
else:
    print("Le nombre b est plus grand que le nombre a")

# le module os
# pour créer et supprimer des dossiers
import os

chemin = "D:\Documents"
dossier = os.path.join(chemin, "dossier_a_creer", "sous_dossier") 
# join gère la différence des slashs
print(dossier) # D:\Documents\dossier_a_creer\sous_dossier
# créer un dossier avec la fonction makedirs
os.makedirs(dossier)
# créer un dossier que s'il n'existe pas. solution 1
if not os.path.exists(dossier):
    os.makedirs(dossier)
# créer un dossier que s'il n'existe pas. solution 2
os.makedirs(dossier, exist_ok = True) # (name, mode:int, exist_ok: bool)
# supprimer un dossier
if os.path.exists(dossier):
    os.removedirs(dossier)
# You can remove files (os.remove), make directories (os.mkdir), 
# and take action on every file in a directory by “walking” through it (os.walk)

# chercher l'aide avec dir et help 
import random
from pprint import pprint # appelle la fonction pprint à l'intérieur du module pprint
print(dir(random)) # introspection : affiche toutes les fonctions associées au module
# fonctions privées (agrémentées d'underscore(s)) ex. '__all__' sont réservées à python
# afficher l'aide
help(random.randint)
# afficher les résultats de dir() sous forme de tableau par ordre alphabétique
pprint(dir(random))

# les objets callable
# objets appelables
os.makedirs() # objet appelable avec les parenthèses
from pprint import pprint
import os
callable() # dit si l'objet peut être appelé
print(callable(pprint)) 
# False avec import pprint, True avec from pprint import pprint
print(callable(os.name)) # False car name est un attribut
print(os.name)
# os.name checks whether certain os specific modules are available (e.g. posix, nt, ...)

# ex. Comment utiliser le module random pour générer un nombre aléatoire ?
import random
nombre_essai = int(input("Devinez le nombre mystère : "))
nombre_mystere = random.randint(0, 100)

if (nombre_essai < nombre_mystere):
    print(f"Le nombre mystère est supérieur à {nombre_essai}")
elif (nombre_essai > nombre_mystere):
    print(f"Le nombre mystère est inférieur à {nombre_essai}")
else:
    print("Bravo, vous avez trouvez le nombre mystère !")


# The Excel task
import csv

with open('financials.csv') as csvfile:
    reader = csv.DictReader(csvfile)
    for row in reader:
        print(row['profit'], row['revenue'])
# This example shows financial data added to standard Python dictionary objects. 
# The keys to the dictionary are determined by the first row of the CSV file.

import shutil
# a module that I use specifically for two functions: shutil.copytree and shutil.rmtree. 
# These two functions let you copy or delete an entire directory and all its contents

import pathlib
# newest module to shake things up in file handling
>>> from pathlib import Path
>>> p = Path('data')
>>> q = p / 'to' / 'data.csv'
>>> q
PosixPath('data/to/data.csv')

# la méthode groupby() du module itertools
from itertools import groupby

# regrouper tous les éléments qui se suivent en un élément
[k for (k, _) in groupby('AAAABBBCCDAABBB')] # --> A B C D A B
[k for k, g in groupby('AAAABBBCCDAABBB')] # --> A B C D A B

[list(g) for k, g in groupby('AAAABBBCCD')] # --> AAAA BBB CC D
```

## LES LISTES
```py
liste = []
liste2 = [1, 2, 3, 4, 5]
liste3 = [250, "Python", True]
# objet mutable : on peut le modifier
# list est un mot réservé

# tuple : liste immutable
mon_tuple = (1, 2, 3)
mon_tuple2 = (250, "Python", True)
# possible de convertir un tuple en liste et vice-versa grâce aux fonctions list et tuple:
mon_tuple = (1, 2, 3)
liste = list(mon_tuple) # [1, 2, 3]
mon_tuple = tuple(liste) # (1, 2, 3)

# ajouter et enlever des éléments de la liste
# la méthode append qui permet d'ajouter une valeur
liste.append(5)
# la méthode extend ajoute des valeurs
liste.extend([10, 25, 30])
# supprimer avec la méthode remove
liste.remove(5) # enlève la première occurence trouvée

# récupérer un élément dans une liste
# indice : position d'un élément dans la structure
liste = ["Python", "C++", "Java"]
liste[0] # récupère le premier élement de la liste, soit Python
# pour les nombres négatifs : la fin commence à -1, puis décroit
liste = ["Python", "C++", "Java"]
# -3, -2, -1

# Récupérez le premier et le dernier nombre
nombres = [1, 2, 3, 4, 5, 4, 3, 2, 1]
nombre_premier = nombres[0]
nombre_dernier = nombres[-1]

# Récupérer l'élément 'Python'
langages = ["Java", "Python", "C++"]
langage = langages[1]

# Changez la position de l'élément 'Python' dans la liste pour qu'il se retrouve à la fin de la liste
liste = ["Java", "Python", "C++"]
liste.remove("Python")
liste.append("Python")

# les slices : récupérer certains éléments d'une liste
# récupère des tranches d'une liste
# tableau[début:fin:pas]
liste = ["Utilisateur1", 
        "Utilisateur2", 
        "Utilisateur3", 
        "Utilisateur4", 
        "Utilisateur5", 
        "Utilisateur6"]
print(liste[0:1]) # récupère le 1er élément car slice est un processus exclusif
print(liste[0:2]) # ['Utilisateur1', 'Utilisateur2']
print(liste[1:2]) # ['Utilisateur2']
print(liste[:]) # ['Utilisateur1', 'Utilisateur2', 'Utilisateur3', 'Utilisateur4', 'Utilisateur5', 'Utilisateur6']
print(liste[:-1]) # comme c'est exclusif, prend tous les éléments sauf le dernier
print(liste[:-2]) # exclut les 2 derniers éléments
print(liste[1:-1]) # récupère tout sauf le premier et dernier élément
print(liste[2:]) # ['Utilisateur3', 'Utilisateur4', 'Utilisateur5', 'Utilisateur6']
print(liste[::2]) # récupère un utilisateur sur 2
# ['Utilisateur1', 'Utilisateur3', 'Utilisateur5']
print(liste[1::2]) # récupère un utilisateur sur 2, à partir du 2ème élément
# ['Utilisateur2', 'Utilisateur4', 'Utilisateur6']
print(liste[1:-2:2]) # part du 2°, s'arrête 2 éléments avant la fin
# ['Utilisateur2', 'Utilisateur4']
print(liste[::-1]) # inverse l'ordre des éléments
# ['Utilisateur6', 'Utilisateur5', ect.]

# ex.
liste = ["Maxime", "Martine", "Christopher", "Carlos", "Michael", "Eric"]
trois_premiers = liste[:3]
trois_derniers = liste[3:]
liste[-3:] # récupère toujours les trois derniers éléments de la liste
milieux = liste[1:-1] # sans premier ni dernier
premier_dernier = liste[::5] # seulement le premier et le dernier
# possiblité plus flexible :
premier_dernier = liste[::len(liste)-1]
# trouver le milieu
liste = ["Utilisateur1",
         "Utilisateur2",
         "Utilisateur3",
         "Utilisateur4",
         "Utilisateur5",
         "Utilisateur6",
         "Utilisateur7"]
middle = int(((len(liste) - 1) / 2))
print(middle) # 3
print(liste[middle:(-middle)]) # ['Utilisateur4']

# créer une liste à partir d'une liste
liste = liste_double[:] # le slice permet de créer une nouvelle liste (nouvel objet dans la mémoire)
# et l'assigner à la variable liste
# sinon liste_double et liste auront le même id (chaque changement sur l'un se répercutera sur l'autre)
# aussi possible avec list(list_double)

# la méthode index, qui renvoie l'index de l'élément
employes =["Carlos", "Max", "Martine", "Patrick", "Alex"]
print(employes.index("Max")) # 1

# la méthode count pour le nombre d'occurences dans la liste
employes = ["Carlos", "Max", "Martine", "Patrick", "Alex", "Max"]
print(employes.count("Max")) # 2

# la méthode sort qui trie la liste par ordre alphabetique
employes = ["Carlos", "Max", "Martine", "Patrick", "Alex"]
print(employes.sort()) # None car ne renvoie rien
print(employes) # ['Alex', 'Carlos', 'Martine', 'Max', 'Patrick']
employes_tries = sorted(employes) # la fonction sorted renvoie la liste triée
print(employes_tries) # ['Alex', 'Carlos', 'Martine', 'Max', 'Patrick']

# d'autres méthodes pour enlever un élément
# la méthode pop(): enlever un élément par rapport à son index
employes = ["Carlos", "Max", "Martine", "Patrick", "Alex"]
employe = employes.pop(-1) # enlève le dernier élément, renvoie la valeur enlevée
print(employe) # Alex
# la méthode clear() : supprime tous les éléments
employes = ["Carlos", "Max", "Martine", "Patrick", "Alex"]
employes.clear() # enlève le dernier élément, renvoie la valeur enlevée
print(employes) # []

# la méthode join pour joindre des éléments (chaines de caractères) d'une liste
liste = ["Python", "est", "un", "langage", "incroyable", "!"]
# liant.join(tableau)
phrase = " ".join(liste)
print(phrase) # Python est un langage incroyable !
retour_ligne = "\n".join(liste)
print(retour_ligne)
# Python
# est
# un
# langage
# incroyable
# !

# créer une liste à partir d'une chaine de caractères
# avec la méthode split()
# tableau.split(séparateur)
# split() ne modifie pas la chaine de caractères
# il faut récupère le résultat dans une variable
courses = "Riz, Pomme, Lait, Salade, Saumon, Beurre"
courses = courses.split()
print(courses) # ['Riz,', 'Pomme,', 'Lait,', 'Salade,', 'Saumon,', 'Beurre']
# par défaut split() sépare sur les espaces
courses = courses.split(", ")
print(courses)  # ['Riz', 'Pomme', 'Lait', 'Salade', 'Saumon', 'Beurre']
courses = courses.split("-") # caractère pas présent
print(courses) # ['Riz, Pomme, Lait, Salade, Saumon, Beurre']
# Specify the maximum number of split: maxsplit
print(s_comma.split(',', 2))
# ['one', 'two', 'three,four,five']
# Ressource : https://note.nkmk.me/en/python-split-rsplit-splitlines-re/

# les opérateurs d'appartenance
# vérifier si un élément ou non appartient à une structure de données
# in, not in
utilisateurs = ["Paul", "Pierre", "Marie"]
print("Paul" in utilisateurs) # True 
if "Paul" in utilisateurs:
    print("Bonjour Paul, bon retour parmi nous !")
if "Paul" in utilisateurs:
   utilisateurs.remove("Paul")
# marche aussi pour les chaines de caractères
print("Java" in "JavaScript") # True

# ex. ajouter un nombre et vérifier s'il a bien été ajouté
liste = [1, 2, 3, 4, 5]
liste.append(6)
if 6 in liste:
    print("Le nombre 6 a bien été ajouté à la liste.")

# listes imbriquées
liste = ["Python", ["Java", "C++", ["C"]], ["Ruby"]]

print(liste[1][0]) # Java
print(liste[1][2][0]) # C
print(liste[1][-1][0]) # C
# une chaine de caractères est aussi une liste
print(liste[0][0]) # P de Python
print(liste[0][0:2]) # Py de Python

# ex.
langages = [["Python", "C++"], "Java"]
nombres = [1, [4, [2, 3]], 5, [6], [[7]]]

python = langages[0][0]
deux = nombres[1][1][0]
sept = nombres[-1][0][0]

# la fonction any
any([False, False, True, False]) # renvoie True
# si UNE des valeurs est vraie, la fonction retourne True
# ex. d'utilisation
notes = [12, 14, 20, 10, 8]
any([x > 18 for x in notes])
# renvoie True si une note > 18

# la fonction all
all([False, False, True, False]) # renvoie False
# si TOUTES les valeurs sont vraies, la fonction retourne True
# utilisé avec des compréhensions de liste
# ex.d'utilisation
all([f.endswith(".jpg") for f in files])
# vérifie si tous les fichiers se finissent en .jpg
```

## LES SETS
```py
liste qui n'accepte' que des valeurs uniques
set_exemple = {'FRA', 'GER', 'AUS', 'US'}

# - Définition et syntaxe
"""
Un set = collection d'éléments mais uniques
différence avec une liste = les élements sont uniques et immuables
on ne peut ajouter que des éléments immuables dans le set (string, tuple, ect.)
le set est muable
set = {elemet1, element2, ect.}
un set n'est pas ordonné
"""
mon_set = {1, 2, 3, 3, "Julien", "Julien", (255, 0, 0), (255, 0, 0)}
print(mon_set) # {1, 2, 3, 'Julien', (255, 0, 0)}
mon_set.add(5)
print(mon_set) # {1, 2, 3, 5, (255, 0, 0), 'Julien'}
# ajouter une liste d'élément
mon_set.update(["Pierre", 6])
print(mon_set) # {1, 2, 3, 5, 6, 'Pierre', (255, 0, 0), 'Julien'}
mon_set.remove("Julien")
print(mon_set) # {1, 2, 3, 5, 6, (255, 0, 0), 'Pierre'}
mon_set.remove("Jules") # KeyError
# façon de pallier ce problème :
mon_set.discard("Julien")
mon_set.discard("Jules") 

# utilisation = filtrer les éléments doubles d'une liste
liste = [99, 1, 2, 4, 5, 6, 7, 5, 4, 1, 3, 2, 1, 1, 2, 1, 34, 20]
print(sorted(list(set(liste)))) # [1, 2, 3, 4, 5, 6, 7, 20, 34, 99]
# liste => un set => une liste => liste triée

# - Opérations sur les sets
# union = assemble tous les éléments
a = {1, 2, 3, 4}
b = {3, 4, 5, 6}
print(a.union(b)) # {1, 2, 3, 4, 5, 6}
# un set ne contient que des éléments uniques, 3 et 4 ne sont pas doublés
print(a | b) # {1, 2, 3, 4, 5, 6}

# intersection = éléments présents SEULEMENT dans a ET dans b
a = {1, 2, 3, 4}
b = {3, 4, 5, 6}
print(a.intersection(b)) # {3, 4}
print(a & b) # {3, 4}

# différence = les élements de a MOINS les éléments présents dans b
a = {1, 2, 3, 4}
b = {3, 4, 5, 6}
print(a.difference(b)) # {1, 2}
print(a - b) # {1, 2}
print(b - a) # {5, 6}

# difference symetrique = éléments présents dans une seule variable
a = {1, 2, 3, 4}
b = {3, 4, 5, 6}
print(a.symmetric_difference(b)) # {1, 2, 5, 6}
print(a ^ b) # {1, 2, 5, 6}
```

## <a name="methodes-utiles"></a> METHODES ET FONCTIONS UTILES
* Les fonctions de Python : https://docs.python.org/3/library/functions.html
```py
# méthode agit directement sur l'objet, pas besoin de lui attribuer une nouvelle variable
liste.sort() # la liste est triée, on peut l'utiliser
# la fonction fait un changement sur un élément mais ne l'enregistre pas
# il faut assigner une variable au processus pour récupérer l'élement changé
liste_triee = sorted(liste) # la liste triée est contenue dans une nouvelle variable
# pour une fonction, il faut donc enregistrer le processus
# dans une nouvelle variable, ou en écrasant la précédent
liste = sorted(liste)

# autres méthodes
"stop".upper() # STOP
"DU CALME".lower() # du calme
"ceci est une phrase".capitalize() # Ceci est une phrase
"le seigneur des anneaux".title() # Le Seigneur Des Anneaux
"JavaScript".replace("Java", "Type") # TypeScript
"JavaScript".replace("Java", "") # Java
"100".isdigit() # True si contient uniquement des chiffres
"photo.jpg".endswith("jpg") # True/False
"photo.jpg".startswith("jpg") # True/False
banana_centered_in_20 = "banana".center(20) #       banana       
# print un string de 20 caractères avec le mot banana au milieu
# si nombre > nombre caractères du mot, entoure le mot d'espaces
# pour que le milieu du mot soit le milieu du nombre donné

"XmotX".strip("X") # enlève les caractères en argument en début et fin de string
# et retourne le string altéré
# de gauche à droite (puis inverse), chaque caractère est confronté aux
# caractères en argument
# le processus s'arrête quand le caractère du string ne correspond
# à aucun caractère en argument
string = '  xoxo love xoxo   '
# Leading and trailing whitespaces are removed
print(string.strip())
>>> xoxo love xoxo
# All <whitespace>,x,o,e characters in the left
# and right of string are removed
print(string.strip(' xoe'))
>>> lov
# Argument doesn't contain space
# No characters are removed.
print(string.strip('stx'))
>>>   xoxo love xoxo   
string = 'android is awesome'
print(string.strip('an'))
>>> droid is awesome
# il existe aussi :
"Xmot".lstrip("X")
"motX".rstrip("X")

# Muable et Immuable (mutable ou immutable)
# 2 catégories d'objets :
# muable : modifiables : listes, dictionnaires, sets 
# => garde le même objet en mémoire à chaque modification
# immuable : on ne peut les modifier directement : string, nombres, booleens
# il faut créer une nouvelle variable pour récupérer l'élément changé
# => chaque modification crée un nouvel objet en mémoire

# fonctions supplémentaires
len("Python") # 6
len([1, 2, 3]) # 3

round(2.2) # 2 
round(2.7) # 3

min([1, 2, 3]) # 1
max([1, 2, 3]) # 3
min("abc") # a
max("abc") # c

sum([10, 10, 10]) # 3

range(5) # [0, 1, 2, 3, 4] (fonction exclusive)
range(2, 5) # [2, 3, 4]

# égréner les lettre de l'alphabet
for one in range(97, 110):
    print(chr(one))
# a
# b
# ...
import string
string.ascii_lowercase # 'abcdefghijklmnopqrstuvwxyz'
list(string.ascii_lowercase) # ['a', 'b', 'c', ...]

# la fonction range avec Python 3
la fonction "range" ne retourne pas directement une liste, mais un objet de "type range"
Cet objet contient plusieurs méthodes qui vous permettent d'obtenir des informations sur ce range'
interval = range(10)
interval.start # 0
interval.step # 1
interval.stop # 10
Pour récupérer l'objet range' sous la forme d'une liste, il suffit de le convertir avec la fonction list'
interval = list(interval)
print(interval) # [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
Pour Python 2, on obtient directement une liste

# ex.
# Afficher la phrase mdp_trop_court en majuscule si le mot de passe entré est égal à 0.
# Afficher la phrase mdp_trop_court avec une majuscule sur la première lettre 
# si le mot de passe entré est plus petit que 8.
# Afficher la phrase "Votre mot de passe ne contient que des nombres." 
# si le mot de passe entré ne contient que des nombres.
# Afficher la phrase "Inscription terminée." si le mot de passe est valide.
mdp = input("Entrez un mot de passe (min 8 caractères) : ")
mdp_trop_court = "votre mot de passe est trop court."

if (len(mdp) == 0):
    print(mdp_trop_court.upper())
elif (len(mdp) < 8):
    print(mdp_trop_court.capitalize())
elif (mdp.isdigit()):
    print("Votre mot de passe ne contient que des nombres.")
else:
    print("Inscription terminée.")

# Ex. Comment rajouter une condition dans notre script afin d'éviter 
# de le faire planter si l'utilisateur ne rentre pas un nombre ?
import random

nombre_mystere = random.randint(0, 10)
nombre = input("Quel est le nombre mystère ? ")

if nombre.isdigit():
    nombre = int(nombre)
    if nombre > nombre_mystere:
        print(f"Le nombre mystère est plus petit que {nombre}")
    elif nombre < nombre_mystere:
        print(f"Le nombre mystère est plus grand que {nombre}")
    else:
        print("Bravo, vous avez trouvé le nombre mystère !")
else:
    input("Votre réponse n'est pas un nombre. Retentez votre chance : ")

# solution alternative 
import random

nombre_mystere = random.randint(0, 10)
nombre = input("Quel est le nombre mystère ? ")
if not nombre.isdigit():
    print("SVP, entrez un nombre valide.")
    exit()

nombre = int(nombre)
if nombre > nombre_mystere:
    print(f"Le nombre mystère est plus petit que {nombre}")
elif nombre < nombre_mystere:
    print(f"Le nombre mystère est plus grand que {nombre}")
else:
    print("Bravo, vous avez trouvé le nombre mystère !")
```

## LES BOUCLES
```py
# la boucle for
# la liste est définie
for element in liste:
    print(element)
for lettre in "Python":
    print(lettre)
# équivalent de for (let = i; i < 100; i++)
for i in range(100):
    print(i)
# for sur un nombre de tours précis
liste = [1, 2, 3, 4, 5]
for number in range(2, len(liste)):
    print(number)
    # 2
    # 3
    # 4

# la boucle while
# la liste n'est pas définie
while condition_vraie:
    print("Bonjour")
# structure plus verbeuse
i = 0
while i < 100:
    print("Bonjour")
    i += 1
# intérêt : quand on ne sait pas le nombre d'itérations nécessaires
continuer = "o"
while continuer == "o":
    print("On continue !")
    continuer = input("Souhaitez-vous continuer ? o/n : ")
# autre intérêt : répéter une opérations toutes les X minutes
import time
# boucle infinie
while True:
    print("Sauvegarde en cours. . .")
    time.sleep(600) # doit attendre 600s pour reprendre
    # effectue l'opération toutes les 10min

# contrôler une boucle avec continue et break
liste = ["1", "2", "Paul", "3", "Marie"]
# continue : passer à l'élément suivant
for element in liste:
    if element.isdigit():
        continue # passe à l'élément suivant
    print(element) # n'affiche que les prénoms
# break : sortir de la condition
for element in liste:
    if element.isdigit():
        break  # sort de la boucle
    print(element)  # n'affiche rien

# les compréhensions de liste (List comprehension)
# itérer sur une liste et filtrer les éléments grâce à des structures conditionelles
liste = [-5, -4, -3, -2, -1, 0, 1, 2, 3, 4, 5]
# avec une boucle for :
positifs = []
for nombre in liste:
    if nombre > 0:
        positifs.append(nombre)
# avec une compréhension de liste :
positifs = [i for i in liste if i > 0] # [1, 2, 3, 4, 5]
# [ opération_sur_element boucle_sur_liste condition_sur_liste ]
# effectuer une opération 
positifs_doubles = [i * 2 for i in liste if i > 0] # [2, 4, 6, 8, 10]
# if / else
nombres_inverses = [i if i % 2 == 0 else -i for i in nombres]

# exercices : remplacer les boucles par des listes de compréhension
nombres = [1, 21, 5, 44, 4, 9, 5, 83, 29, 31, 25, 38]
"""
nombres_pairs = []
for i in nombres:
    if i % 2 == 0:
        nombres_pairs.append(i)
"""
nombres_pairs = [i for i in nombres if i % 2 == 0]
print(nombres_pairs)

# ---------------------------------------------------- #
nombres = range(-10, 10)
"""
nombres_positifs = []
for i in nombres:
    if i >= 0:
        nombres_positifs.append(i)
"""
nombres_positifs = [i for i in nombres if i >= 0]
print(nombres_positifs)

# ---------------------------------------------------- #
nombres = range(5)
"""
nombres_doubles = []
for i in nombres:
    nombres_doubles.append(i * 2)
"""
nombres_doubles = [i * 2 for i in nombres]
print(nombres_doubles)

# ---------------------------------------------------- #
nombres = range(10)
"""
nombres_inverses = []
for i in nombres:
    if i % 2 == 0:
        nombres_inverses.append(i)
    else:
        nombres_inverses.append(-i)
"""
nombres_inverses = [i if i % 2 == 0 else -i for i in nombres]
print(nombres_inverses)

# Comment afficher avec une boucle les dix utilisateurs ?
for i in range(1, 11):
    print(f"Utilisateur {i}")

# afficher les lettres du mot 'Python' dans le sens inverse
# solution 1
mot = "Python"
for lettre in reversed(mot):
    print(lettre)
# solution 2
mot = "Python"
for lettre in mot[::-1]:
    print(lettre)

# Comment peut-on permettre à l'utilisateur de sortir de la boucle 
# en modifiant les lignes de code dans la boucle while ?
continuer = "o"
while continuer == "o":
    print("On continue !")
    input("Voulez-vous continuer ? o/n ")
# solution
continuer = "o"
while continuer == "o":
    print("On continue !")
    continuer = input("Voulez-vous continuer ? o/n ")
# solution 2, plus verbeuse
continuer = "o"
while continuer == "o":
    print("On continue !")
    resultat = input("Voulez-vous continuer ? o/n ")
    if resultat != "o":
        break
# solution 3, avec Python 3.8 uniquement
while (continuer: = "o") == "o":
    print("On continue !")
    if (resultat: = input("Voulez-vous continuer ? o/n ")) != "o":
        break

# ajouter une boucle pour permettre à l'utilisateur jusqu'à 5 essais pour trouver le nombre mystère
import random

nombre_mystere = random.randint(0, 10)
nombre_essai = 0

while nombre_essai <= 5:

    if nombre_essai == 5:
        print(f"Vous avez perdu. Le nombre mystère était {nombre_mystere}")
        break

    nombre = input("Quel est le nombre mystère ? ")
    if not nombre.isdigit():
        print("Votre réponse n'est pas un nombre. Retentez votre chance.")
        continue
    
    nombre_essai += 1
    nombre = int(nombre)

    if nombre > nombre_mystere:
        print(f"Le nombre mystère est plus petit que {nombre}")
        continue
    elif nombre < nombre_mystere:
        print(f"Le nombre mystère est plus grand que {nombre}")
        continue
    else:
        print("Bravo, vous avez trouvé le nombre mystère !")
        break

# autre solution
import random

nombre_mystere = random.randint(0, 50)
nombre_essais = 5
essais = 0

while essais < nombre_essais:
    nombre = input("Quel est le nombre mystère ? ")

    if not nombre.isdigit():
        print("SVP, entrez un nombre valide.")
        continue

    nombre = int(nombre)

    if nombre > nombre_mystere:
        print(f"Le nombre mystère est plus petit que {nombre}")
    elif nombre < nombre_mystere:
        print(f"Le nombre mystère est plus grand que {nombre}")
    else:
        print("Bravo, vous avez trouvé le nombre mystère !")
        exit()
    
    essais += 1

print(f"Vous avez perdu. Le nombre mystère était {nombre_mystere}")
```

## LES FICHIERS 
```py
# copier le chemin d'accès (Windows)
shift + clic droit => copier en tant que chemin d'accès'
problème des slashs sur Windows
chemin = r"C:\Users\user\Documents\document" # enregistrer comme texte brut
chemin_valide = "C:/Users/user/Documents/document" # saisir un slah, ctrl + D, changer l'ordre
chemin_valide2 = "C:\\Users\\user\\Documents\\document"

# lire le contenu d'un fichier
chemin = r"D:\Documents\WEB DEV\PYTHON\fichier.txt"
f = open(chemin, "r")  # open(chemin, mode)
# r = read
f.close()  # fermer le fichier

# autre solution qui évite de fermer manuellement
with open(chemin, "r") as f:
    contenu = f.read()
    print(contenu)
    # Python
    # est
    # un
    # super
    # langage
    # de
    # programmation

# renvoie sa représentation en chaine de caractères
with open(chemin, "r") as f:
    contenu = repr(f.read()) # représentation de la chaine de caractères
    print(contenu) # 'Python\nest\nun\nsuper\nlangage\nde\nprogrammation'

# renvoie le résultat sous forme de liste
with open(chemin, "r") as f:
    contenu = f.readlines() # représentation sous forme de liste
    print(contenu) # ['Python\n', 'est\n', 'un\n', 'super\n', 'langage\n', 'de\n', 'programmation']

with open(chemin, "r") as f:
    contenu = f.read().splitlines() # représentation sous forme de liste
    print(contenu) # ['Python', 'est', 'un', 'super', 'langage', 'de', 'programmation']

# utiliser plusieurs fois f.read()
# read déplace le curseur de haut en bas
# pour l'utiliser de nouveau, il faut replacer le curseur en haut
f.read() # lit de haut en bas
f.seek(0) # replace le curseur en haut
f.read(10) # peut à nouveau lire de haut en bas, jusqu'au 10è caractère

# Windows : pb d'encodage pour ouvrir un fichier
solution : ajouter encoding='utf-8' lors de l'ouverture du fichier avec la fonction open :
with open("fichier_txt", "r", encoding='utf-8') as f:
    contenu = f.read()

# écrire à l'intérieur d'un fichier
chemin = r"D:\Documents\WEB DEV\PYTHON\fichier.txt"

with open(chemin, "w") as f:
    f.write("Bonjour")  # mode w => efface ce qu'il y a à l'intérieur

with open(chemin, "a") as f:
    f.write("Bonjour") # mode a => ajoute à la fin du fichier

with open(chemin, "a") as f:
    f.write("\nAu revoir")  # \n ajoute à la fin du fichier, en sautant une ligne

# Les fichiers JSON
# json : pratique pour ajouter des strings et des listes (fichier config, base de données)
# facilement modifiable
# retourne les valeurs sous leur aspect non modifiés
import json

chemin = r"D:\Documents\WEB DEV\PYTHON\fichier.json"

with open(chemin, "w") as f:
    json.dump("Bonjour", f) # ajoute "Bonjour" (en string) au fichier JSON
    json.dump(list(range(10)), f) # ajoute [0, 1, 2, ect.] au fichier
    json.dump(list(range(10)), f, indent=4) # ajoute [0, 1, 2, ect.] au fichier
    # avec un niveau d'indentation de 4

with open(chemin, "r") as f:
    liste = json.load(f)
    print(liste)

# ajouter des lettres avec caractères spéciaux ou accents
with open(chemin, "w") as f:
    json.dump("Pèche", f, ensure_ascii=False) # ajoute "Pèche" au fichier JSON

# exercices
# 1. récupérer la liste de courses depuis le fichier JSON si celui-ci existe
import os
import json

dossier_courant = os.path.dirname(__file__)
dossier_courant = os.path.normpath(dossier_courant) # pour avoir les bons slashs
chemin_liste = os.path.join(dossier_courant, "liste.json")
# ajout du fichier au dossier courant

if os.path.exists(chemin_liste):
    with open(chemin_liste, "r") as f:
        liste_de_courses = json.load(f)
else:
    liste_de_courses = []

# 2. boucler le choix des courses
import os
import json

dossier_courant = os.path.dirname(__file__)
dossier_courant = os.path.normpath(dossier_courant) # pour avoir les bons slashs
chemin_liste = os.path.join(dossier_courant, "liste.json")
# ajout du fichier au dossier courant

if os.path.exists(chemin_liste):
    with open(chemin_liste, "r") as f:
        liste_courses = json.load(f)
else:
    liste_courses = []

affichage = """
Choisissez une option:
\t1: Ajouter un élément
\t2: Enlever un élément
\t3: Afficher la liste
\t4: Vider la liste
\t5: Terminer
"""

option = "0"
while option != "5":
    option = input(affichage)

# 3. ajouter/enlever un élément de la liste
import os
import json

dossier_courant = os.path.dirname(__file__)
dossier_courant = os.path.normpath(dossier_courant) # pour avoir les bons slashs
chemin_liste = os.path.join(dossier_courant, "liste.json")
# ajout du fichier au dossier courant

if os.path.exists(chemin_liste):
    with open(chemin_liste, "r") as f:
        liste_courses = json.load(f)
else:
    liste_courses = []

affichage = """
Choisissez une option:
\t1: Ajouter un élément
\t2: Enlever un élément
\t3: Afficher la liste
\t4: Vider la liste
\t5: Terminer
"""

option = "0"
while option != "5":
    option = input(affichage)
    if option == "1":
        element_plus = input("Entrez le nom de l'élément à ajouter : ")
        liste_courses.append(element_plus)
    elif option == "2":
        element_moins = input("Entrez le nom de l'élément à enlever : ")
        if element_moins in liste_courses:
            liste_courses.remove(element_moins)

# 4. aficher/vider la liste
import os
import json

dossier_courant = os.path.dirname(__file__)
dossier_courant = os.path.normpath(dossier_courant) # pour avoir les bons slashs
chemin_liste = os.path.join(dossier_courant, "liste.json")
# ajout du fichier au dossier courant

if os.path.exists(chemin_liste):
    with open(chemin_liste, "r") as f:
        liste_courses = json.load(f)
else:
    liste_courses = []

affichage = """
Choisissez une option:
\t1: Ajouter un élément
\t2: Enlever un élément
\t3: Afficher la liste
\t4: Vider la liste
\t5: Terminer
"""

option = "0"
while option != "5":
    option = input(affichage)
    if option == "1":
        element_plus = input("Entrez le nom de l'élément à ajouter : ")
        liste_courses.append(element_plus)
    elif option == "2":
        element_moins = input("Entrez le nom de l'élément à enlever : ")
        if element_moins in liste_courses:
            liste_courses.remove(element_moins)
    elif option == "3":
        if liste_courses: # len(liste_courses) > 0
            print("\n".join(liste_courses))
        else:
            print("La liste est actuellement vide.")
    elif option == "4":
        liste_courses.clear()

# 5. sauvegarder la liste sur un fichier JSON

import os
import json

dossier_courant = os.path.dirname(__file__)
dossier_courant = os.path.normpath(dossier_courant) # pour avoir les bons slashs
chemin_liste = os.path.join(dossier_courant, "liste.json")
# ajout du fichier au dossier courant

if os.path.exists(chemin_liste):
    with open(chemin_liste, "r") as f:
        liste_courses = json.load(f)
else:
    liste_courses = []

affichage = """
Choisissez une option:
\t1: Ajouter un élément
\t2: Enlever un élément
\t3: Afficher la liste
\t4: Vider la liste
\t5: Terminer
"""

option = "0"
while option != "5":
    option = input(affichage)
    if option == "1":
        element_plus = input("Entrez le nom de l'élément à ajouter : ")
        liste_courses.append(element_plus)
    elif option == "2":
        element_moins = input("Entrez le nom de l'élément à enlever : ")
        if element_moins in liste_courses:
            liste_courses.remove(element_moins)
    elif option == "3":
        if liste_courses: # len(liste_courses) > 0
            print("\n".join(liste_courses))
        else:
            print("La liste est actuellement vide.")
    elif option == "4":
        liste_courses.clear()

with open(chemin_liste, "w") as f:
    json.dump(liste_courses, f, indent=4)
```

## LES DICTIONNAIRES 
```py
système clé: valeur
clé unique
dictionnaire = {"prénom": "Paul"}

# récupérer une valeur associée à une clé
d = {"clé": "valeur"}
d["clé"] = "valeur"
dictionnaire[0]["prénom"] # cherche la valeur associée à la clé prénom dans le 1er dico du dico
# renvoie une erreur si la clé n'existe pas
dictionnaire.get("prénom") # renvoie none si inexistante
dictionnaire.get("prénom", "la clé appelée n'existe pas") # personnalise un message d'erreur

# modifier la valeur associée à une clé
d = {
        "prenom": "Paul",
        "profession": "Ingénieur",
        "ville": "Paris"
    }

d["prenom"] = "Julie" # modification

# ajouter et supprimer une clé
d = {
        "prenom": "Paul",
        "profession": "Ingénieur",
        "ville": "Paris"
    }

d["age"] = 30 # /!\ si clé déjà présente, l'écrase !

if "age" in d:
    del d["age"] # supprime sans erreur

# boucler sur un dictionnaire
d = {
        "prenom": "Paul",
        "profession": "Ingénieur",
        "ville": "Paris"
    }

d.keys() # dict_keys(['prenom', 'profession', 'ville'])
d.values() # dict_values(['Paul', 'Ingénieur', 'Paris'])

for cle in dictionnaire:
    print(cle) # comportement par défaut
    print(dictionnaire[cle])

d.items() # renvoie un tuple
# dict_items([('prenom', 'Paul'), ('profession', 'Ingénieur'), ('ville', 'Paris')])

for cle, valeur in dictionnaire.items():
    print(cle, valeur)

# ex.
employes = {
    "id01": {"prenom": "Paul", "nom": "Dupont", "age": 32},
    "id02": {"prenom": "Julie", "nom": "Dupuit", "age": 25},
    "id03": {"prenom": "Patrick", "nom": "Ferrand", "age": 36}
}

# enlever Patrick du dictionnaire
del employes["id03"]
# Julie vient de fêter son anniversaire
employes["id02"]["age"] += 1
# on désire savoir l'âge de Paul, dans une variable age_paul
age_paul = employes["id01"]["age"]

# ex. Comment itérer sur le dictionnaire et utiliser le module os pour créer la structure de dossiers ?
import os

chemin = "/Users/thibh/dossier_test"

d = {"Films": ["Le seigneur des anneaux",
               "Harry Potter",
               "Moon",
               "Forrest Gump"],
     "Employes": ["Paul",
                  "Pierre",
                  "Marie"],
     "Exercices": ["les_variables",
                   "les_fichiers",
                   "les_boucles"]}

for key, value in d.items():
    for dossier in value:
        chemin_dossier = os.path.join(chemin, key, dossier) # pas besoin de créer le dossier parent
        # D:\Documents\WEB DEV\PYTHON\Films\Le seigneur des anneaux
        # créera le dossier parent + le sous-dossier avec join
        os.makedirs(chemin_dossier, exist_ok=True)

# ex. Comment parcourir tous les fichiers pour trouver les informations demandées ?
import json
import glob

dossier = "/Users/thibh/formation-developpeur-python/dossier_exemple/**"
files = glob.glob(dossier, recursive=True)

numero_de_compte = None
numero_securite_sociale = None

for f in files:
    if f.endswith(".json"):
        with open(f, "r") as f:
            contenu = json.load(f)
            if "Credit Mutuel" in contenu:
                numero_de_compte = contenu["Credit Mutuel"]["Numero de compte"]
    elif f.endswith(".txt"):
        with open(f, "r") as f:
            contenu = f.read()
            if "Numéro de sécurité sociale" in contenu:
                numero_securite_sociale = contenu.split(":")[-1]

print(numero_de_compte)          
print(numero_securite_sociale)

# ex. trier les fichiers en fonction de leur extension :
"""
    mp3, wav : Musique
    mp4, mov : Videos
    jpg, jpeg, png : Images
    pdf : Documents
"""
import os
import glob
import shutil

dossier = "D:\\Documents\\WEB DEV\\PYTHON\\tri_fichiers_sources\\**"
files = glob.glob(dossier, recursive=True)

dossier_images = "Images" # jpg jpeg png
dossier_videos = "Videos" # mp4 mov
dossier_musique = "Musique" # mp3 wav
dossier_documents = "Documents" # pdf

for file in files:
    if file.endswith(".jpg") or file.endswith(".jpeg") or file.endswith(".png"):
        os.makedirs(os.path.join(dossier.replace(
            "**", ""), dossier_images), exist_ok=True)
        shutil.move(file, os.path.join(dossier.replace("**", ""), dossier_images))
    elif file.endswith(".mp4") or file.endswith(".mov"):
        os.makedirs(os.path.join(dossier.replace(
            "**", ""), dossier_videos), exist_ok=True)
        shutil.move(file, os.path.join(dossier.replace("**", ""), dossier_videos))
    elif file.endswith(".mp3") or file.endswith(".wav"):
        os.makedirs(os.path.join(dossier.replace(
            "**", ""), dossier_musique), exist_ok=True)
        shutil.move(file, os.path.join(dossier.replace("**", ""), dossier_musique))
    elif file.endswith(".pdf"):
        os.makedirs(os.path.join(dossier.replace(
            "**", ""), dossier_documents), exist_ok=True)
        shutil.move(file, os.path.join(dossier.replace("**", ""), dossier_documents))

# solution 
import os
from glob import glob
import shutil

chemin = "/Users/thibh/trier_fichiers/sources"

extensions = {".mp3": "Musique",
              ".wav": "Musique",
              ".mp4": "Videos",
              ".mov": "Videos",
              ".jpeg": "Images",
              ".jpg": "Images",
              ".png": "Images",
              ".pdf": "Documents"}

fichiers = glob(os.path.join(chemin, "*"))
for fichier in fichiers:
    extension = os.path.splitext(fichier)[-1]
    # D:\Documents\WEB DEV\PYTHON\tri_fichiers_sources\data.mp3
    # split sur le point et permet de récupérer l'extension
    # récupère le ".mp3" du tuple créé
    dossier = extensions.get(extension)
    # récupère la valeur associée à la clé ".mp3" du tableau => Musique
    if dossier:
        chemin_dossier = os.path.join(chemin, dossier)
        os.makedirs(chemin_dossier, exist_ok=True)
        shutil.move(fichier, chemin_dossier)

# ex. réécrire une liste dans l'ordre
"""
    Ouvrir le fichier prenoms.txt et lire son contenu.
    Récupérer chaque prénom séparément dans une liste.
    Nettoyer les prénoms pour enlever les virgules, points ou espace.
    Écrire la liste ordonnée et nettoyée dans un nouveau fichier texte.
"""
chemin = "D:/Documents/WEB DEV/PYTHON/prenoms.txt"
chemin2 = "D:/Documents/WEB DEV/PYTHON/prenoms_tries.txt"

with open(chemin, "r") as f:
    contenu = repr(f.read())  # représentation en string
    contenu = contenu.replace(".", ",").replace("\\n", ", ")
    liste = contenu.split(",")

# supprime espaces et guillemets des valeurs de la liste
for i, prenom in enumerate(liste):
    liste[i] = prenom.strip(" '' ")
    # préférer prenoms_final = [prenom.strip(",. ") for prenom in prenoms]

# suprime les string vides + trie dans l'ordre alpha
liste = sorted(list(filter(None, liste)))

# ecrit la liste ordonée dans un fichier texte
from pprint import pprint # pour le débug, print sur plusieurs lignes

with open(chemin2, "w") as t:
    t.write("\n".join(liste))

# solution
from pprint import pprint # pour le débug, print sur plusieurs lignes

with open("/Users/thibh/Documents/prenoms.txt", "r") as f:
    lines = f.read().splitlines() # split le contenu en fonction des lignes

prenoms = []
for line in lines:
    prenoms.extend(line.split()) # ajoute des éléments progressivement à une liste
    # étend la liste

prenoms_final = [prenom.strip(",. ") for prenom in prenoms]

with open("/Users/thibh/Documents/prenoms_final.txt", "w") as f:
    f.write("\n".join(sorted(prenoms_final)))
```

## LES FONCTIONS
```py
def funcname(parameter_list):
    print("Je suis une fonction !")

funcname() # appel de la fonction

# retourner une valeur
def retourne_cinq():
    return 5 # stoppe le code suivant
    print("code inatteignable")

a = retourne_cinq()

def fichier_exist(url):
    if os.path.exists(url):
        return True
    return False # pas besoin de else
    # car le code est stoppé après return

# les paramètres et arguments
def function(paramètre): # nom variable définie dans la fonction
    print(paramètre)
function("argument") # valeur envoyée aux paramètres

def param_defaut(paramètre="Paramètre par défaut"): # parametre par défaut
    print(paramètre)
param_defaut() # affiche Paramètre par défaut
param_defaut("Bonjour !") # affiche Bonjour !

def addition(a, b):
    return a + b 
addition(10, 5)
addition(b=10, a=5) # précise les paramètres associés aux arguments

# espace global et local
# les variables définies dans la fonction appartiennent uniquement à la fonction
# espace global = code du fichier
a = 5
c = 12

def fonction():
    a = 10 # espace local => création d'une variable locale
    b = 5
    print(c) # affiche 12, car variable dans l'espace global

print(a) # 5, correspond à la variable a de l'espace global
print(b) # erreur, b n'existe que dans l'espace local

# modifier une variable globale dans une fonction
a = 5
b = 10

def addition():
    global a # annonce la valeur globale
    a += 5 # permet de modifier la valeur globale
    print(a)

addition()
print(a) # 12, la valeur globale a été modifiée !

# passage d'arguments par valeur ou référence
# cas 1 : objet immuable
a = 5

def change_a():
    a = 10 # crée une nouvelle variable a, avec une id différente
    # on ne peut pas modifier directement l'objet a dans un état local

change_a()
print(a) # 5

# cas 2 : variable muable
nombres = [10, 20, 30]

def ajoute_40():
    nombres.append(40) # une liste est muable, elle peut être modifiée depuis un état local

ajoute_40()
print(nombres) # [10, 20, 30, 40]

# cas 3 : variable muable + valeur de référence
nombres = [10, 20, 30]

def ajoute_40(liste): # passage par valeur ou référence
    liste.append(40) # liste reste donc une valeur globale
    # liste correspond à la reference de la liste nombres

ajoute_40(nombres)
print(nombres) # [10, 20, 30, 40]
```

## LES MODULES
```py
# fichier sur le disque qui contient du code Python
import random # import de module, méthode à privilégier
random.uniform(2,5) # module.function

from random import uniform # from module import function
uniform(2,5) # utilisation de la fonction seule
# problème : on peut écraser la fonction en créer une variable du même nom

# créer son propre module
++ mon_module.py 
++ script.py # les deux fichiers sont au même niveau

# Ajoutez deux lignes en haut de votre script :
#! /usr/bin/env python3
# coding: utf-8
"""
    #! /usr/bin/env python3 : ce commentaire conditionnel indique que ce script doit être exécuté 
à l'aide de Python 3. Cela permet au système d'exploitation de connaître le chemin *
d'accès vers l'interpréteur Python. 
Sans cette ligne, vous pouvez rencontrer des problèmes lors de l'exécution du script.
    #coding: utf-8 : cette ligne spécifie l'encodage du code source de notre script. 
Afin de prendre en compte les accents de notre chère langue fraaaançaise, 
nous utilisons le très commun utf-8. 
C'est souvent inutile si vous utilisez Python 3, car cette version utilise par défaut UTF 8,
mais nécessaire avec Python 2.
"""

mon_module.py
a = 5

script.py
import mon_module # VS Code reconnaît le module
mon_module.a # 5

# attention au choix du nom du module : ne pas écraser les existants !
# les préfixer : ex. app_module, app_random, ect.

# la variable __name__
# variable magique, peut être appelée n'importe où
__name__ # renvoie __main__ si on est dans le fichier propriétaire
# renvoie le nom du fichier si le code est importé dans un fichier
mon_module.py
def addition(a, b):
    return a + b 
if __name__ == "__main__": # on exécute directement notre module, on est sur le fichier propriétaire
    print(addition(4, 5)) # ne sera pas exécuté lors de l'import du module

# Le Python Path
# variable qui contient des dossiers dans lesquels Python va chercher les modules
import sys
from pprint import pprint

# pprint(sys.path)
# ['d:\\Documents\\WEB DEV\\PYTHON', // dossier courant
#  'C:\\Program Files\\Python37\\python37.zip',
#  'C:\\Program Files\\Python37\\DLLs',
#  'C:\\Program Files\\Python37\\lib',
#  'C:\\Program Files\\Python37',
#  'C:\\Users\\pablo\\AppData\\Roaming\\Python\\Python37\\site-packages',
#  'C:\\Program Files\\Python37\\lib\\site-packages']

# tous les dossiers où l'on peut créer un module
# ex.
cd 'C:\\Users\\pablo\\AppData\\Roaming\\Python\\Python37\\site-packages'
touch mon_module.py # crée le fichier
code mon_module.py # ouvre avec VS Code
# on peut désormais ajouter de n'importe où notre module, en l'important

# pour ajouter un dossier et ses modules au Path
import sys 
sys.path.append("url/du/nouveau/dossier") # ajoute un dossier au Python Path
# tout fichier dedans sera importable
touch module_test.py # url/du/nouveau/dossier/module_test.py
import module_test # on peut importer le module car il est dans le Python Path
# problème : il faut rétirer le processus (import, append, import) pour
# CHAQUE fichier qui l'utilise

# modifier le Python Path sur Windows
modifier les variables d'environnement' 
Nouvelle variable utilisateur 
Nom de la variable = PYTHONPATH
Valeur de la variable = C:\Users\user\Documents\mes_modules; C:\Users\user\Documents\dossier2
# dossier(s) que je veux ajouter au PYTHON PATH

# actualiser un module Python
# je lance un script qui importe un module
# ce module change de valeur durant le script
# comment actualiser le module directement dans le script qui l'importe ?
import importlib
importlib.reload(module_a_recharger)
# Python utilisera toujours le module qu'il a en mémoire
# si le module change, il faut donc l'actualiser
```

## PACKAGES
```py
# un dossier qui contient un ou plusieurs modules
import package.module # importe le module dans le package package
from package import module # aussi possible
package/
    __init__.py # fichier d'initialisation qui permet d'executer le code
    module1.py # contenu dans les modules à l'intérieur d'un package
    module2.py
    module3.py

# le fichier __init__
import module contenu dans le package 
# son appel va déclencher l'appel du fichier __init__
# ex.
----
fichier users
def get_users():
    print("On récupère les utilisateurs !")
----
fichier __init__
import package.users # à chaque fois qu'un fichier importera le module users,
# ce fichier est appelé
# et importe automatiquement le module
# le rendant disponible pour celui qui l'importe
----
fichier qui importe le module users
import users 
package.users.get_users() # s'exécute car l'import fait appel au fichier __init__
# qui importe à son tour la fonction demandée
----
Créer une librairie > https://python-packaging.readthedocs.io/en/latest/minimal.html 
```

## DOCUMENTER SON CODE
```py
# commentaire une ligne
"""
commentaire
plusieurs
lignes
"""
# docstring : documentation string : commentaires récupérés sous forme de documentation
# servent à documenter notre code à certains endroits spécifiques, 
# comme à l'intérieur d'une fonction ou au début d'un module.

# exemples d'utilisation
import random

print(random.__doc__) # récupère le docstring associé
print(random.randint.__doc__)
# Return random integer in range [a, b], including both end points.

# principaux formats docstring
* Epytext
* reST 
* Google

"""Docstring de style Epytext

@param param1: un premier paramètre
@param param2: un deuxième paramètre
@return: description de ce qui est retourné
"""

"""Docstring de type reST

:param param1: un premier paramètre
:param param2: un deuxième paramètre
:returns: description de ce qui est retourné
"""

"""Docstring de style Google

Args:
    param1: un premier paramètre
    param2: un deuxième paramètre

Returns: 
    Description de ce qui est retourné
"""

# configurer VS Code pour les docstring
# extensions => autoDocstring
# Edit => Preferences => Settings => Extensions
# autoDocstring => Docstring Format => Google
# utiliser autoDocstring : se placer dans la fonction
# """ + entrée
def fonction_exemple(nom, age):
    """Description de la fonction
    
    Args:
        nom (str): le nom de l'utiliateur
        age (int): l'âge de l'utilisateur
    
    Returns:
        list: liste de nombres
    """
    return [1, 2, 3]
```

## <a name="pdb"></a> TESTER SON CODE AVEC PDB
```py
import pdb # Python Debugger, librairie qui permet de déboguer

def fonction_1():
    pdb.set_trace() # va lancer une console ici
    # si l'on supprime la fonction pdb, il faut supprimer le module avec
    # on peut ainsi voir : import pdb ; pdb.set_trace()
```
Docs > https://docs.python.org/3/library/pdb.html
https://realpython.com/python-debugging-pdb/ 


## <a name="exceptions"></a> LA GESTION D'ERREURS AVEC LES EXCEPTIONS

La liste des exceptions > https://docs.python.org/3.7/library/exceptions.html 
```py
a = 5
b = 0

try:
    print(a / b) # erreur car ne peut diviser par 0
except:
    print("Division par zéro impossible !")

# préciser le type d'erreur
a = 5
b = "0"

try:
    print(a / b) # erreur car ne peut diviser par 0
except ZeroDivisionError:
    print("Division par zéro impossible !")
except TypeError: # ex. 5 / "0"
    print("Opération avec un autre type que int impossible !")

# trouver le type d'erreur :
# faire appel à l'erreur
a = 5
print(a / b) # b n'est pas définie
# NameError: name 'b' is not defined
try:
    print(a / b) # erreur car ne peut diviser par 0
except ZeroDivisionError:
    print("Division par zéro impossible !")
except TypeError: # ex. 5 / "0"
    print("Opération avec un autre type que int impossible !")
except NameError: # ++
    print("Une variable n'est pas définie.")

# spécifier une erreur
try:
    print(a / b)
except NameError as e:
    print("Erreur : ", e) # Erreur :  name 'b' is not defined

# gérer la fin du try avec else et finally
a = 5
b = 10

try:
    resultat = a / b # erreur car ne peut diviser par 0
except NameError as e:
    print("Erreur : ", e)
else: # exécuté que si le try réussit
    print(resultat) # 0.5
finally: 
    print("Je suis exécuté quelque soit le résultat !")

# ex. tenter d'ouvrir et lire un fichier, en gérant les erreurs
"""
Gérer l'erreur qui arrive quand l'utilisateur rentre un chemin 
vers un fichier qui n'existe pas sur le disque.
Gérer l'erreur qui arrive quand Python n'arrive pas à lire le contenu du fichier 
qui est passé par l'utilisateur.
"""
fichier1 = "D:/Documents/WEB DEV/PYTHON/sources/readme.txt"
fichier2 = "D:/Documents/WEB DEV/PYTHON/sources/fichier_invalide.abc"

fichier = input("Quel fichier souhaitez-vous ouvrir ? ")

try:
    f = open(fichier, "r") # le bloc à executer
    print(f.read()) # pour lever une erreur de type UnicodeDecodeErrror en amont
except FileNotFoundError as fnf:
    print("Le chemin entré est incorrect : ", fnf)
except UnicodeDecodeError as ude:
    print("Le fichier ne peut être ouvert par Python : ", ude)
else: # pas d'erreurs, on exécute ce bloc
    f.close()

En résumé, voici un bloc try très complet :
try:
    # instruction qui risque de lever une erreur
    print('Je suis une instruction problématique')
except Exception as e:
    # Instruction exécutée quand l'exception Exception est lancée
    print('Je suis déclenchée quand Exception est levée')
except:
    # Instruction exécutée dans le cas d'une autre erreur
    print('Une autre erreur est survenue')
else:
    # Instruction exécutée si l'instruction dans try est vraie
    print("Tout s'est bien passé ! Je passe donc à la suite")
finally:
    # Instruction exécutée dans tous les cas
    print("Je suis déterminé : erreur ou pas, je m'affiche dans tous les cas")

# lever une exception AVANT que le problème ne se produise :
def ajouter(self, element):
    if not isinstance(element, str):  # si élément pas de type string
        raise ValueError( # on lève une erreur
            "Vous ne pouvez ajouter que des chaînes de caractères!")

# avec un bloc try :
if __name__ == '__main__':
    args = parse_arguments()
    try:
        datafile = args.datafile
        if datafile == None:
            raise Warning('You must indicate a datafile!')
        else:
            try:
                if args.extension == 'xml':
                    x_an.launch_analysis(datafile)
                elif args.extension == 'csv':
                    c_an.launch_analysis(datafile)
            except FileNotFoundError as e:
                print("Ow :( The file was not found. Here is the original message of the exception :", e)
            finally:
                print('#################### Analysis is over ######################')
    except Warning as e:
        print(e)

(!) Bien souvent, nous utilisons raise dans un bloc except pour relancer 
l'erreur et déléguer la gestion de l'erreur à quelqu'un d'autre. 
Cela peut être utile pour, par exemple, afficher des messages complémentaires ou nettoyer des objets.
```
* Aller plus loin :   
   - écrire des tests unitaires > https://openclassrooms.com/courses/testez-un-projet-python/decouvrez-les-tests
   - coder en Test-Driven Development > https://openclassrooms.com/courses/testez-un-projet-python/decouvrez-le-test-driven-development
   - la hiérarchie des exceptions > https://docs.python.org/3.7/library/exceptions.html#exception-hierarchy 


## LE LOGGING
```py
# le module logging
# affiche les messages d'erreurs et avertissements
import logging

# équivalent d'un print qui ne s'affiche que selon l'information retournée

logging.debug("La fonction a bien été exécutée")
logging.info("Message d'information général")
logging.warning("Attention !")
logging.error("Une erreur est arrivée")
logging.critical("Erreur critique")

# on peut décider quels messages on veut afficher
# par défaut, seuls warning, error et critical s'affichent

# configurer le logger
# spéficie le niveau que l'on veut afficher

logging.basicConfig(level=logging.DEBUG) # affiche les messages depuis DEBUG
# soit tous les messages

# formater les messages affichés
# datetime du logging, niveau de debug, message
logging.basicConfig(level=logging.ERROR,
                    format='%(asctime)s : %(levelname)s : %(message)s')

# écrire dans un fichier de log
import logging

logging.basicConfig(level=logging.DEBUG,
                    filename="app.log", # ici, chemin relatif (en général, c'est un chemin complet)
                    # ex. D:/Documents/WEB DEV/PYTHON/app_exemple.log
                    filemode="w", # w pour write, a pour append et ajouter au fichier
                    format='%(asctime)s - %(levelname)s - %(message)s')

logging.debug("La fonction a bien été exécutée")
logging.info("Message d'information général")
logging.warning("Attention !")
logging.error("Une erreur est arrivée")
logging.critical("Erreur critique")
```

## <a name="pip"></a> INSTALLER DES PACKAGES SUPPLEMENTAIRES AVEC PIP
```s
# documentation : https://pip.pypa.io/en/stable/
# pip (Pip Installs Packages)
# petit utilitaire qu'on appelle 'gestionnaire de paquets' 
# et qui nous permet d'installer des 'paquets' (packages en anglais)
# On peut donc l'utiliser pour télécharger facilement en ligne de commande des packages
# qui sont hébergés sur le site http://pypi.org

Ouvrir GitBash (ou Cmder)
taper pip3.7 (c''est un alias) # sinon utiliser le chemin .../Python/Scripts/pip3.7.exe
(!) taper pip (tout seul) si une seule version de Python est installée

# indispensables
pip help

# quel pip est utilisé
which pip

# Chercher des packages sur PyPI et avec pip
https://pypi.org/search
+ chercher l''auteur, le homepage et les notes

# sur la console
pip3.7 search requête(nom du module ou description)
pip search pyside # dans le nom ou description du module

# mettre à jour pip sur Windows
# ne jamais MAJ pip, la version est associée à la version Python
pip3.7 install --upgrade --user pip # NE PAS UTILISER CETTE SYNTAXE! 
# erreur
python -m pip lescriptaxecuter
python -m pip --version
# solution
To fix the PATH run Command Prompt as administrator:
pip install --upgrade --force-reinstall --ignore-installed pip

# installer un package avec pip
pip install package
pip3.7 install requests # toujours en mode admin sur Windows
sudo pip3.7 install requests # pour Linux/Mac
pip install requests==2.1.3 # installer un package précis
pip install requests>=2,<3 # between 2.0 and 3.0
pip install requests~=2.1.3 # any 2.1.X version >= 2.1.3
# depuis github :
pip install git+https://github.com/user/repo.git@branch
# install from branch :
pip install git+https://github.com/kennethreitz/requests.git@master
# install from commit hash :
pip install git+https://github.com/kennethreitz/requests.git@2aaf6ac
# install from tag/release :
pip install git+https://github.com/kennethreitz/requests.git@v2.13.0  

# trouver les metadatas d'une dépendance (location, dependancies, ect.)
pip show package_installé

# lister les packages avec pip
pip list
pip list -o # lesquels ne sont plus à jour ? [pip list --outdated en verbose]
pip3.7 list # pip de Python 3.7

# mettre à jour un package
pip install --upgrade package

# désinstaller un package avec pip
pip uninstall package
pip3.7 uninstall nomDuPackage
# ! ne supprime pas les dépendances du packages ! (les dépendances secondaires)

# fetch website's data with requests
import requests
response = requests.get('https://www.example.com/api/')
data = response.json()
# In this example, the code fetches the data from example.com 
# and converts it into a dictionary or list that you can use in the rest of your code

One excellent tool for communicating with a database is SQLAlchemy
pip install SQLAlchemy # to get started
SQLAlchemy gives developers a Python API to make database queries. 
A snippet of code looks like:
>>> our_user = session.query(User).filter_by(name='ed').first()
>>> our_user
<User(name='ed', fullname='Ed Jones', password='edspassword')>
```

## TROUVER LE BON PACKAGE
```s
# Python Standard Library Cheat Sheet
Python 3.x: https://docs.python.org/3/py-modindex.html
Python 2.7: https://docs.python.org/2/py-modindex.html
# Curated list
https://awesome-python.com/
https://python.libhunt.com/ # liste d'awesome-python + détaillée
# ↑ recherche avancée, popularité, comparaisons, ect.
https://docs.python-guide.org/#scenario-guide-for-python-applications
# ↑ moins fourni mais packages + détaillés
https://pymotw.com/3/ # librairies de Python
https://wiki.python.org/moin/

# Les 7 étapes pour choisir un bon package
1. Trouver les candidats
* browse curated list above
* google search 2-5 relevant keywords "s3 upload Python"
* stackoverflow search "s3 upload Python" + sélectionner l''onglet "Votes" (most upvoted answers)
* Reddit search, Hacker News search (https://hn.algolia.com/), Twitter Search
* search on PyPi if no candidates
* Ask questions on Reddit or Stackoverflow
2. Vérifier la popularité des candidats
* Google/Reddit/Stack overflow recommandations
* GitHub stars (équivalent de J''aime de Twitter : appréciation + favori)
* Utiliser l''indicateur de popularité de https://python.libhunt.com/
3. Parcourir le homepage du package (sur Pypi or Awesome Python)
* est-ce utile ? maintenu ? intuituitf et réussi ?
4. Lire le README du package
* est-ce exhaustif ? comment l''installer ?
* license ? auteur(s) ? combien de personnes y participent ?
* dbader.org/blog/write-a-great-readme-for-your-github-project
* choosealicense.com/licenses/
5. Le projet est-il (activement) maintenu ?
* Parcourir l''historique des changelog/update (PyPi ou GitHub)
* Les bugs sont-ils pris en charge ?
* La date du dernier commit
6. Inspecter le code source
* Best-practices : consistent formatting, docstrings
* automated tests ?
* experience des développeurs principaux
* Serais-je assez à l''aise avec le code pour faire des changements dans le package si j''en étais obligé ? (fin de la maintenance d''un projet) (cad le code est-il aéré, intuitif, bien documenté et agréable)
7. Essayer quelques candidats
* Utiliser le venv + interpreteur
* Vérifier la facilité/propreté de l''installation + import
* Facteur d''appréciation (le package est-il agréable, intuitif et fun à utiliser)
```

## <a name="virtuel-env"></a> LES ENVIRONNEMENTS VIRTUELS
```s
# autre version de Python, qui va être isolée du python installé sur l'ordinateur
# on crée généralement un environnement virtuel par projet 

# créer un environnement virtuel
# se placer dans le dossier principal
py -3.7 -m venv venv # -m pour module
source venv/scripts/activate # activer le venv, version longue
aller dans venv/Scripts/ # version flemme, venv/bin pour les autres OS que Windows
dans le terminal : source activate
on est dans l''environnement virtuel
which pip pour vérifier si on est dans un environnement virtuel
deactivate pour en sortir
# détruire un venv
rm venv/ # à faire avec prudence (le mieux est de supprimer le venv manuellement)
# créer des alias
# ~/.bash_profile
alias ae='deactivate &> /dev/null; source ./venv/bin/activate' # deactivate + activate
alias de='deactivate'
# les utiliser
$ cd project
$ ae
(venv) $ # Work on the project...
$ de
# lien pour créer des alias avec gitbash :
https://coderwall.com/p/_-ypzq/git-bash-fixing-it-with-alias-and-functions 

# VS Code et les environnements virtuels
VS Code gère les environnements virtuels
il suffit de lancer le projet dans VS Code
se placer dans le projet + taper : code . dans git bash
ou copier-glisser le projet sur l''icône VS du bureau
```

## <a name="objet-part1"></a> L'ORIENTÉ OBJET (partie 1)
```py
# avec Python, tout est un objet
# avantages : organiser notre code, éviter les répétitions

# créer une classe
class Voiture:
    marque = "Lamborghini" # attribut de classe
    couleur = "rouge" # partagé par toutes les instances de Voiture()

print(Voiture.marque, Voiture.couleur) # Lamborghini rouge

# créer des instances
voiture_01 = Voiture()
print(voiture_01.marque) # Lamborghini

# attributs de classe et attributs d'instance
Voiture.marque = "Porsche" # modification de l'attribut de classe (se répercute sur toutes les instances)
print(Voiture.marque, voiture_01.marque) # Porsche Porsche
voiture_01.marque = "Fiat Panda" # modification de l'attribut d'instance (modification individuelle)
print(voiture_01.marque) # Fiat Panda

# avertissement sur les attributs de classe
"""
Python class attributes may be useful in different cases,
however, they must be used with caution in order to avoid unexpected behaviors
"""

# initialiser une instance
class Voiture:

    voitures_crees = 0 # attribut de classe

    def __init__(self, marque): # constructeur (self = instance | équivalent de this)
        self.marque = marque # attribut d'instance | instance.parametre = parametre
        Voiture.voitures_crees += 1 # j'accède ici à l'attribut de la classe, non celui de l'objet

voiture_01 = Voiture("Lamborghini")
voiture_02 = Voiture("Porsche")
print(voiture_01.marque, voiture_02.marque) # Lamborghini Porsche
print(Voiture.voitures_crees) # 2

# ex.
class Livre:
    def __init__(self, nom, nombre_de_pages, prix):
        self.nom = nom
        self.nombre_de_pages = nombre_de_pages
        self.prix = prix
        
livre_HP = Livre("Harry Potter", 300, 10.99)
livre_LOTR = Livre("Le Seigneur des Anneaux", 400, 13.99)

# la signification de 'self'
class Voiture:

    voitures_crees = 0

    def __init__(self, marque):
        self.marque = marque 
        Voiture.voitures_crees += 1
    
    def afficher_marque(self): # le self est à ajouter systématiquement
        print(f"La voiture est une {self.marque}")

voiture_01 = Voiture("Lamborghini")
voiture_01.afficher_marque() # La voiture est une Lamborghini
# équivalent de Voiture.afficher_marque(voiture_01) (ce que fait Python par défaut)
# il a donc besoin du self (voiture_01) pour faire marcher la méthode

# les fonctions de conversions sont des classes
a = str(a) # a est une instance de la classe str qui prend a en paramètre

# ex.
""" * Créez une classe voiture avec un attribut ‘essence’ qui est égal à 100.
    * Créez une méthode ‘afficher_reservoir’ qui affiche le nombre de litres
    d’essence restant (‘La voiture contient x litres d’essence’).
    * Créez une méthode ‘roule’ avec un paramètre km (kilomètre)
    qui va faire avancer la voiture et vider petit à petit le réservoir. 
    On considère une consommation de 5L pour 100km, l’opération mathématique 
    pour déterminer le nombre de litres d’essence nécessaire en fonction du nombre 
    de kilomètres est donc :
    (km * 5) / 100
    Si le réservoir est vide quand on essaie de rouler, afficher la phrase : 
    ‘Vous n'avez plus d'essence, faites le plein !’ et empêchez la voiture d’avancer.
    Si la jauge d’essence descend en dessous de 10L, affichez la phrase : 
    ‘Vous n'avez bientôt plus d'essence !’
    * Créez une méthode ‘faire_le_plein’ qui remet le niveau d’essence à 100L 
    et qui affiche la phrase 'Vous pouvez repartir !’
"""
class Voiture:

    def __init__(self):
        self.essence = 100
    
    def afficher_reservoir(self):
        print(f"La voiture contient {self.essence} litres d’essence.")

    def roule(self, km):
        if not self.essence:
            print("Vous n'avez plus d'essence, faites le plein !")
        else:
            self.essence -= (km * 5) / 100
            if self.essence < 0: # si le niveau d'essence < 0, il vaut 0
                self.essence = 0
            elif self.essence < 10:
                print("Vous n'avez bientôt plus d'essence !")
            self.afficher_reservoir()

    def faire_le_plein(self):
        self.essence = 100
        print("Vous pouvez repartir !")

voiture = Voiture()
print(voiture.essence) # 100
voiture.afficher_reservoir() # La voiture contient 100 litres d’essence.
voiture.roule(25) # La voiture contient 98.75 litres d’essence.
voiture.roule(1950) # Vous n'avez bientôt plus d'essence !
# La voiture contient 1.25 litres d’essence.
voiture.roule(30) # La voiture contient 0 litres d’essence.
voiture.roule(30) # Vous n'avez plus d'essence, faites le plein !
voiture.faire_le_plein() # Vous pouvez repartir !
voiture.afficher_reservoir() # La voiture contient 100 litres d’essence.

# solution
class Voiture:
    def __init__(self):
        self.essence = 100

    def afficher_reservoir(self):
        print(f"La voiture contient {self.essence}L d'essence.")

    def roule(self, km):
        if self.essence <= 0:
            print("Vous n'avez plus d'essence, faites le plein !")
            return # arrête la méthode

        self.essence -= (km * 5) / 100

        if self.essence < 10:
            print("Vous n'avez bientôt plus d'essence !")

        self.afficher_reservoir()

    def faire_le_plein(self):
        self.essence = 100
        print("Vous pouvez repartir !")
```

## REECRITURE DE LA LISTE DE COURSE EN POO
```py
++ constants.py # contient le code pour sauvegarder les listes crées
import os

CUR_DIR = os.path.dirname(os.path.abspath(__file__))
# __file__ retourne le chemin du script actuel
# abspath le transforme en chemin absolu
# dirname récupère le nom du dossier associé au chemin
DATA_DIR = os.path.join(CUR_DIR, "data")  # ajoute data au dossier actuel
# d:\Documents\WEB DEV\PYTHON\liste_course\data

# création de la classe Liste
++ lib.py 
class Liste(list): # la classe hérite de la classe list, pour utiliser ses méthodes
    def __init__(self, nom):
        self.nom = nom

if __name__ == "__main__":
    print("Hello !")

# dans le terminal :
# $ py -3.7
# from lib import Liste // import de la classe
# l = Liste("courses") // création d'un objet Liste
# l
# [] // liste vide (normal) (reprend le comportement d'une liste)
# l.nom
# 'courses'

# création des méthodes ajouter et enlever
import logging

LOGGER = logging.getLogger()

class Liste(list):
    def __init__(self, nom):
        self.nom = nom

    def ajouter(self, element):
        if not isinstance(element, str): # si élément pas de type string
            raise ValueError(
                "Vous ne pouvez ajouter que des chaînes de caractères!")

        if element in self:
            LOGGER.error(f"{element} est déjà dans la liste.")
            return False # retourne un booleen qui peut être interprété

        self.append(element) # ajoute l'élément dans ma liste
        return True

    def enlever(self, element):
        if element in self:
            self.remove(element)
            return True
        return False


if __name__ == "__main__":
    liste = Liste("courses")
    liste.ajouter(0) # ValueError: Vous ne pouvez ajouter que des chaînes de caractères!
    liste.ajouter("Pommes")
    liste.ajouter("Pommes") # Pommes est déjà dans la liste.
    liste.ajouter("Poires")
    print(liste) # ['Pommes', 'Poires']


# afficher les éléments dans la liste
import logging

LOGGER = logging.getLogger()

class Liste(list):
    def __init__(self, nom):
        self.nom = nom

    def ajouter(self, element):
        if not isinstance(element, str):
            raise ValueError(
                "Vous ne pouvez ajouter que des chaînes de caractères!")

        if element in self:
            LOGGER.error(f"{element} est déjà dans la liste.")
            return False

        self.append(element)
        return True

    def enlever(self, element):
        if element in self:
            self.remove(element)
            return True
        return False

    def afficher(self): # ++
        print(f"Ma liste de {self.nom} :")
        for element in self:
            print(f" - {element}")


if __name__ == "__main__":
    liste = Liste("taches")
    liste.ajouter("Pommes")
    liste.ajouter("Poires")
    liste.afficher()

# Ma liste de taches :
# - Pommes
# - Poires

# sauvegarder la liste
import json # ++
import logging
import os # ++
# d'abord les modules de Python

# puis, séparé d'un espace, les modules tiers

# puis, séparé d'un espace, les modules persos
from constants import DATA_DIR # ++

LOGGER = logging.getLogger()

class Liste(list):
    def __init__(self, nom):
        self.nom = nom

    def ajouter(self, element):
        if not isinstance(element, str):
            raise ValueError("Vous ne pouvez ajouter que des chaînes de caractères!")
        
        if element in self:
            LOGGER.error(f"{element} est déjà dans la liste.")
            return False

        self.append(element)
        return True

    def afficher(self):
        print(f"Ma liste de {self.nom} :")
        for element in self:
            print(f" - {element}")

    def enlever(self, element):
        if element in self:
            self.remove(element)
            return True
        return False

    def sauvegarder(self): # ++
        chemin = os.path.join(DATA_DIR, f"{self.nom}.json")
        if not os.path.exists(DATA_DIR):
            os.makedirs(DATA_DIR)

        with open(chemin, "w") as f:
            json.dump(self, f, indent=4)

        return True

if __name__ == "__main__":
    liste = Liste("courses")
    liste.ajouter("Pommes")
    liste.ajouter("Poires")
    liste.sauvegarder()
```

## <a name="objet-part2"></a> L'ORIENTÉ OBJET (partie 2)
```py
# méthodes de classe
# appartient seulement à la classe
class Voiture:
    def __init__(self, marque, vitesse, prix):
        self.marque = marque
        self.vitesse = vitesse
        self.prix = prix

    @classmethod # décorateur
    def lamborghini(cls): # cls = la classe
        return cls(marque="Lamborghini", vitesse=250, prix=200000)
        # retourne une instance de Voiture avec des paramètres prédéfinis

    @classmethod
    def porsche(cls):
        return cls(marque="Porsche", vitesse=200, prix=180000)


lambo = Voiture.lamborghini() # une instance Voiture de marque Lamborghini
porsche = Voiture.porsche() # instance créée plus facilement

# méthodes statiques
# méthode qui n'ont pas besoin de paramètres pour fonctionner
class Voiture:
    voiture_crees = 0
    def __init__(self, marque, vitesse, prix):
        Voiture.voiture_crees += 1
        self.marque = marque
        self.vitesse = vitesse
        self.prix = prix

    @classmethod
    def lamborghini(cls):
        return cls(marque="Lamborghini", vitesse=250, prix=200000)

    @classmethod
    def porsche(cls):
        return cls(marque="Porsche", vitesse=200, prix=180000)

    @staticmethod # ++
    def afficher_nombre_voitures():
        print(f"Vous avez {Voiture.voiture_crees} voitures dans votre garage.")

lambo = Voiture.lamborghini()
porsche = Voiture.porsche()
Voiture.afficher_nombre_voitures()
# Vous avez 2 voitures dans votre garage.

# le décorateur @property, qui transforme une méthode en attribut
# The @property decorator is used to customize getters and setters for class attributes
class Circle:
    def __init__(self, radius):
        self._radius = radius

    @property # équivalent de getter
    # plus besoin de () pour l'appeler : 
    # la méthode est considérée comme une propriété
    # ex. c = Circle(5)
    # c.radius => 5
    def radius(self):
        """Get value of radius"""
        return self._radius

    # However, by defining a setter method, we can do some error testing 
    # to make sure it’s not set to a nonsensical negative number
    @radius.setter
    # équivalent de setter
    # c.radius = 5
    def radius(self, value):
        """Set radius, raise error if negative"""
        if value >= 0:
            self._radius = value
        else:
            raise ValueError("Radius must be positive")

    @property
    def area(self):
        """Calculate area inside circle"""
        return self.pi() * self.radius**2

    def cylinder_volume(self, height):
        """Calculate volume of cylinder with circle as base"""
        return self.area * height

    @classmethod
    def unit_circle(cls):
        """Factory method creating a circle with radius 1"""
        return cls(1)

    @staticmethod
    def pi():
        """Value of π, could use math.pi instead though"""
        return 3.1415926535

# un autre exemple :
class AwwYeah:

    def __init__(self):
        self._bar = ''

    @property # getter
    def foo(self):
        return 'More awesome please: {}'.format(self._bar)

    @foo.setter # setter
    def foo(self, value):
        self._bar = '{} is great.'.format(value)

>>> a = AwwYeah()
>>> a.foo = 'Python' # appel du setter, sans ()
>>> a.foo # appel du getter, sans ()
'More awesome please: Python is great.'

# créer ses propres décorateurs
# un @decorator est une fonction qui prend en paramètre une fonction
# et renvoie une autre fonction, modifiant ainsi le comportement de la fonction de base

# Decorator Function
def mydecoratorfunction(some_function): # function to be decorated passed as argument
    def wrapper_function(): # wrap the some_function and extends its behaviour
        # write code to extend the behaviour of some_function()
        some_function() # call some_function
        return wrapper_function # return wrapper function

# notre décorateur
# son but =  afficher le nom de la méthode
def name(func):
    # un décorateur doit être générique, d'où les args et kwargs
    def inner(*args, **kwargs):
        print('Running this method:', func.__name__)
        return func(*args, **kwargs)
    return inner

class CoffeeMachine():
    
    water_level = 100
    
    @name   
    def _start_machine(self):
      # Start the machine
      if self.water_level > 20:
          return True
      else:
          print("Please add water!")
          return False
    
    @name
    def __boil_water(self):
        return "boiling..."
    
    @name
    def make_coffee(self):
        # Make a new coffee!
        if self._start_machine():
            self.water_level -= 20
            print(self.__boil_water())
            print("Coffee is ready!")


machine = CoffeeMachine()
for i in range(0, 5):
    machine.make_coffee()

machine.make_coffee()
machine._start_machine()
machine._CoffeeMachine__boil_water()
# Running this method: make_coffee
# Running this method: _start_machine
# Running this method: __boil_water
# boiling...
# Coffee is ready!
# Running this method: make_coffee
# etc.

# la méthode __str__
# définit l'affichage que l'on veut avoir quand on print notre instance
# ou quand on la convertit en string avec la fonction str()
class Voiture:
    def __init__(self, marque, vitesse):
        self.marque = marque
        self.vitesse = vitesse

    def __str__(self): # méthode magique
        return f"Voiture de marque {self.marque} avec vitesse maximale de {self.vitesse}."
        # pas un print, un return

porsche = Voiture("Porsche", 200)
print(porsche) # Voiture de marque Porsche avec vitesse maximale de 200.
affichage = str(porsche)
print(affichage) # Voiture de marque Porsche avec vitesse maximale de 200.

# les méthodes spéciales (ou magiques)
# comme le cas de __str__ un peu plus haut
# permet de changer le comportement d'une méthode déjà définie par Python
# les méthodes spéciales sont pensées pour être exécutées par l'interpréteur Python 
# et non par vous
# vous devez définir ces méthodes spéciales dans une classe
>>> class Hack:
...    def __len__(self): # redéfinition de la méthode len
...        print('Wow, I just hacked Python!')
...        return 5
...
>>> a = Hack()
>>> print(len(a))
Wow, I just hacked Python!
5
# Les autres méthodes spéciales :
{
    'Représentation': [__repr__, __str__, __format__, __bytes__],
    'Conversion en nombre': [__abs__, __bool__, __complex__, __int__, __float__, __hash__, __index__],
    'Collections': [__len__, __getitem__, __setitem__, __delitem__, __contains__],
    'Itérateurs': [__iter__, __reversed__, __next__],
    'Création et destruction d\'instances': [__new__, __init__, __del__],
    'Gestion des attributs': [__getattr__, __getattribute__, __setattr__, __delattr__, __dir__],
    'Comparaison': [__lt__<, __le__<=, __eq__==, __ne__!=, __gt__>=, __ge__>=],
    'Opérateurs arithmétiques': [__add__+, __sub__-, __mul__*, __truediv__/, __floordiv__//, __mod__ %, __round__]
}

# Héritage
# un enfant hérite de tous les attributs et méthode (publiques, par défaut) de la classe Parent
projets = ["pr_GameOfThrones", "HarryPotter", "pr_Avengers"]

class Utilisateur:
    def __init__(self, nom, prenom):
        self.nom = nom # paul.nom = nom
        self.prenom = prenom # paul.prenom = nom

    def __str__(self):
        return f"Utilisateur {self.nom} {self.prenom}"

    def afficher_projets(self):
        for projet in projets:
            print(projet)

class Junior(Utilisateur): # Junior hérite de Utilisateur
    def __init__(self, nom, prenom): # self = paul
        Utilisateur.__init__(self, nom, prenom)

paul = Junior("Paul", "Durand")
print(paul) # appel __str__ de la classe mère : Utilisateur Paul Durand
paul.afficher_projets()

# la fonction super()
# sert à réferer facilement la classe parente
# appelle les méthodes de la classe parente
projets = ["pr_GameOfThrones", "HarryPotter", "pr_Avengers"]
class Utilisateur:
    def __init__(self, nom, prenom):
        self.nom = nom
        self.prenom = prenom

    def __str__(self):
        return f"Utilisateur {self.nom} {self.prenom}"

    def afficher_projets(self):
        for projet in projets:
            print(projet)

class Junior(Utilisateur):
    def __init__(self, nom, prenom):
        super().__init__(nom, prenom) # plus besoin de self

paul = Junior("Paul", "Durand")
paul.afficher_projets()

# autre exemple : la classe rectangle, héritant de la classe Quadrilatère :
class quadriLateral:
    def __init__(self, a, b, c, d):
        self.side1 = a
        self.side2 = b
        self.side3 = c
        self.side4 = d

class rectangle(quadriLateral):
    def __init__(self, a, b): # elle n'a besoin que de 2 côtés (contre 4 pour la classe Parente)
        super().__init__(a, b, a, b)

# la surcharge
# on réécrit la méthode parente
# car Python fait appel à la méthode qui est le plus proche de l'Objet appelant
projets = ["pr_GameOfThrones", "HarryPotter", "pr_Avengers"]
class Utilisateur:
    def __init__(self, nom, prenom):
        self.nom = nom
        self.prenom = prenom

    def __str__(self):
        return f"Utilisateur {self.nom} {self.prenom}"

    def afficher_projets(self):
        for projet in projets:
            print(projet)

class Junior(Utilisateur):
    def __init__(self, nom, prenom):
        super().__init__(nom, prenom)

    def afficher_projets(self): # surcharge => on réécrit la méthode parente
        for projet in projets:
            if not projet.startswith("pr_"):
                print(projet)

paul = Junior("Paul", "Durand")
paul.afficher_projets() # HarryPotter, soit le seul élément non précédé d'un pr_

# polymorphisme
# concept qui indique que l'on peut utiliser des méthodes 
# de la même façon sur les objets d'une même entité
class Vehicule:
    def avance(self):
        print("Le véhicule démarre")

class Voiture(Vehicule):
    def avance(self):
        super().avance() # on augmente la méthode de la classe parente
        print("La voiture roule")

class Avion(Vehicule):
    def avance(self):
        super().avance()
        print("L'avion vole")

v = Voiture()
a = Avion()
v.avance()
a.avance()
# Le véhicule démarre
# La voiture roule
# Le véhicule démarre
# L'avion vole

# __méthodes_privées (accessibles seulement à l'INTERIEUR de la classe)
# toute modification d'un élément privé hors de la classe renverra un AttributeError
# à considérer pour éviter que les classes enfants utilisent une variable de la classe Mère
# à n'utiliser que pour le cas où l'on veut éviter que des noms de variables soient utilisés
# dans des classes héritant de la classe principale
# très peu utilisé, en dehors des frameworks et des librairies
# ex. :
class employee:
    def __init__(self, name, sal):
        self.__name = name  # private attribute 
        self.__salary = sal # private attribute

>>> e1 = employee("Bill",10000)
>>> e1.__salary
AttributeError: 'employee' object has no attribute '__salary'

# _méthodes_protegées (accessibles seulement à l'INTERIEUR de la classe et de ses enfants)
# toute modification d'un élément protégé hors de la classe ne renverra pas d'erreur
# utilisées pour dire : ceci n'est pas public et réservé aux instances
# "n'y touchez pas, sauf si vous êtes une instance de la classe principale"
# utilisée pour la logique interne, elles n'ont pas vocation à être utilisées à l'extérieur du code
# ex :
class employee:
    def __init__(self, name, sal):
        self._name = name  # protected attribute 
        self._salary = sal # protected attribute

>>> e1 = employee("Swati", 10000)
>>> e1._salary
10000
>>> e1._salary = 20000 # c'est possible, mais déconseillé ! 
>>> e1._salary # l'underscore indique que l'utilisateur ne doit pas y toucher
20000 # du moins à l'extérieur de la classe


"""Selon le principe de l'encapsulation, un objet ne présente aux autres objets du programme 
que les attributs et les méthodes nécessaires à leurs interactions. 
Certaines méthodes restent privées et ne doivent être utilisées qu'à l'intérieur d'une classe.
Les méthodes privées sont pensées pour une utilisation en interne, 
autrement dit dans une classe et non pas au niveau d'une instance. 
En Python, il n'est pas recommandé d'accéder à une méthode privée ou protégée au niveau de l'instance, 
même si le langage le permet.
"""

class CoffeeMachine():
    WATER_LEVEL = 100

    # méthode protégée
    # indique qu'elle est réservée à la classe et ses enfants
    def _start_machine(self):
        # Start the machine
        if self.WATER_LEVEL > 20:
            return True
        else:
            print("Please add water!")
            return False

    # méthode privée
    # indique qu'elle est réservée à la classe
    def __boil_water(self):
        return "boiling..."

    def make_coffee(self):
        # Make a new coffee!
        if self._start_machine():
            self.WATER_LEVEL -= 20
            print(self.__boil_water())
            print("Coffee is ready!")


machine = CoffeeMachine()
print("Make Coffee: Public", machine.make_coffee())
# méthode publique : accessible depuis l'extérieur
print("Start Machine: Protected", machine._start_machine())
# méthode protégée : idem
print("Boil Water: Private", machine.__boil_water())
# méthode privée va renevoyer une erreur
# on peut tout de même y accéder avec la syntaxe _MaClasse__methode_privee()
print("Boil Water: Private", machine._CoffeeMachine__boil_water())
# boiling...
# Coffee is ready!
# Make Coffee: Public None
# Start Machine: Protected True
# Traceback (most recent call last):
#   File "d:/Documents/WEB DEV/PYTHON/exercices.py", line 27, in <module>
#     print("Boil Water: Private", machine.__boil_water())
# AttributeError: 'CoffeeMachine' object has no attribute '__boil_water'
# Boil Water: Private boiling...

# en résumé :
class Super: 
      
    # public data member 
    var1 = None
  
    # protected data member 
    _var2 = None
       
    # private data member 
    __var3 = None
      
    # constructor 
    def __init__(self, var1, var2, var3):   
        self.var1 = var1 
        self._var2 = var2 
        self.__var3 = var3 
      
    # public member function    
    def displayPublicMembers(self): 
        # accessing public data members 
        print("Public Data Member: ", self.var1) 
        
    # protected member function    
    def _displayProtectedMembers(self): 
        # accessing protected data members 
        print("Protected Data Member: ", self._var2) 
    
    # private member function    
    def __displayPrivateMembers(self): 
        # accessing private data members 
        print("Private Data Member: ", self.__var3) 

    # public member function 
    def accessPrivateMembers(self):      
        # accessing private memeber function 
        self.__displayPrivateMembers()

## la question des getters et setters
# In Python, getters and setters are not the same as those 
# in other object-oriented programming languages
# > https://www.geeksforgeeks.org/getter-and-setter-in-python/
# on préfère les propriétés aux getters et setter

# Python program showing the use of @property 
class Geeks: 
	def __init__(self): 
		self._age = 0
	
	# using property decorator 
	# a getter function 
	@property
	def age(self): 
		print("getter method called") 
		return self._age 
	
	# a setter function
    # même nom de méthode, mais ajout de .setter au décorateur 
	@age.setter 
	def age(self, a): 
		if(a < 18): 
			raise ValueError("Sorry you age is below eligibility criteria") 
		print("setter method called") 
		self._age = a 

mark = Geeks() 
mark.age = 19
print(mark.age) 
# setter method called
# getter method called
# 19

# autre exemple d'utilisation du setter :
class OurClass:

    def __init__(self, a):
        # passe par le setter avant validation
        self.OurAtt = a

    @property
    def OurAtt(self):
        return self.__OurAtt

    @OurAtt.setter
    def OurAtt(self, val):
        print("On passe par la validation du setter")
        if val < 0:
            self.__OurAtt = 0
        elif val > 1000:
            self.__OurAtt = 1000
        else:
            self.__OurAtt = val


x = OurClass(10000)
print(x.OurAtt)
# On passe par la validation du setter
# 1000 

# la fonction issubclass
# elle vérifie si une classe est une sous-classe d'une autre classe
>>> issubclass(AgentSpecial, Personne) # AgentSpecial hérite de Personne
True
>>> issubclass(AgentSpecial, object)
True
>>> issubclass(Personne, object)
True
>>> issubclass(Personne, AgentSpecial) # Personne n'hérite pas d'AgentSpecial
False
>>> 

# la fonction isinstance
# permet de savoir si un objet est issu d'une classe ou de ses classes filles
>>> agent = AgentSpecial("Fisher", "18327-121")
>>> isinstance(agent, AgentSpecial) # Agent est une instance d'AgentSpecial
True
>>> isinstance(agent, Personne) # Agent est une instance héritée de Personne
True
>>> 

# Héritage multiple
class MaClasseHeritee(MaClasseMere1, MaClasseMere2):
    def ordre_methodes(self):
        print("La priorité des méthodes est définie par l'odre de déclaration")
        print("Une méthode ira chercher dans...")
        print("...MaClasseHeritee, puis MaClasseMere1, et enfin MaClasseMere2")
```


## LES DECORATEURS

* Les décorateurs sont des fonctions de Python dont le rôle est de **modifier le comportement par défaut** d'autres fonctions ou classes
* Les décorateurs servent surtout à modifier le comportement d'une fonction
* une fonction modifiée par un décorateur ne s'exécutera pas elle-même mais appellera le décorateur
* Le décorateur s'exécute au moment de la définition de fonction et non lors de l'appel
```py
# Exemple avec décorateur
@decorateur
def fonction(...):
    ...

# Exemple équivalent, sans décorateur
def fonction(...):
    ...

fonction = decorateur(fonction)


>>> def mon_decorateur(fonction):
...     """Premier exemple de décorateur"""
...     print("Notre décorateur est appelé avec en paramètre la fonction {0}".format(fonction))
...     return fonction
...
>>> @mon_decorateur
... def salut():
...     """Fonction modifiée par notre décorateur"""
...     print("Salut !")
...
Notre décorateur est appelé avec en paramètre la fonction <function salut at 0x00BA5198>
>>>
```
* la fonction renvoyée par le décorateur remplace la fonction définie
* Le seul moment où notre décorateur est appelé, c'est lors de la définition de notre fonction

### Modifier le comportement de notre fonction

* on va devoir créer une nouvelle fonction qui sera chargée de modifier le comportement de la fonction définie
* on va la définir directement dans le corps de notre décorateur
```py
def mon_decorateur(fonction): # fonction = salut()
    """Notre décorateur : il va afficher un message avant l'appel de la
    fonction définie"""
    
    def fonction_modifiee():
        """Fonction que l'on va renvoyer. Il s'agit en fait d'une version
        un peu modifiée de notre fonction originellement définie. On se
        contente d'afficher un avertissement avant d'exécuter notre fonction
        originellement définie"""
        
        print("Attention ! On appelle {0}".format(fonction))
        return fonction() # exécute salut()
    return fonction_modifiee

@mon_decorateur
def salut():
    print("Salut !")

>>> salut()
Attention ! On appelle <function salut at 0x00BA54F8>
Salut !
>>>

@mon_decorateur
def salut():
    ...

# revient au même, pour Python, que le code :
def salut():
    ...

salut = mon_decorateur(salut)


# Autre exemple : un décorateur chargé tout simplement d'empêcher l'exécution de la fonction. 
# Au lieu d'exécuter la fonction d'origine, on lève une exception pour avertir l'utilisateur 
# qu'il utilise une fonctionnalité obsolète.
def obsolete(fonction_origine):
    """Décorateur levant une exception pour noter que la fonction_origine
    est obsolète"""
    
    def fonction_modifiee():
        raise RuntimeError("la fonction {0} est obsolète !".format(fonction_origine))
    return fonction_modifiee
```

### Un décorateur avec des paramètres

* Exemple : coder un décorateur chargé d'exécuter une fonction en contrôlant le temps qu'elle met à s'exécuter
* Si elle met un temps supérieur à la durée passée en paramètre du décorateur, on affiche une alerte
```py
@controler_temps(2.5) # 2,5 secondes maximum pour la fonction ci-dessous
# notre fonction de décorateur prendra en paramètres non pas une fonction, 
# mais les paramètres du décorateur (ici, le temps maximum autorisé pour la fonction). 
# Elle ne renverra pas une fonction de substitution, mais un décorateur

@decorateur(parametre)
def fonction(...):
    ...

# revient à
def fonction(...):
    ...
            # renvoie decorateur(fonction)
                    #↓
fonction = decorateur(parametre)(fonction)
# on doit définir comme décorateur une fonction qui prend en arguments les paramètres du décorateur
# (ici, le temps attendu) et qui renvoie un décorateur

"""Pour gérer le temps, on importe le module time
On va utiliser surtout la fonction time() de ce module qui renvoie le nombre
de secondes écoulées depuis le premier janvier 1970 (habituellement).
On va s'en servir pour calculer le temps mis par notre fonction pour
s'exécuter"""

import time

# définit dans son corps notre décorateur decorateur
def controler_temps(nb_secs): # récupère les arguments
    """Contrôle le temps mis par une fonction pour s'exécuter.
    Si le temps d'exécution est supérieur à nb_secs, on affiche une alerte"""
    
    # définit lui-même dans son corps notre fonction modifiée fonction_modifiee
    def decorateur(fonction_a_executer):
        """Notre décorateur. C'est lui qui est appelé directement LORS
        DE LA DEFINITION de notre fonction (fonction_a_executer)"""
        
        def fonction_modifiee():
            """Fonction renvoyée par notre décorateur. Elle se charge
            de calculer le temps mis par la fonction à s'exécuter"""
            
            tps_avant = time.time() # Avant d'exécuter la fonction
            valeur_renvoyee = fonction_a_executer() # On exécute la fonction
            tps_apres = time.time()
            tps_execution = tps_apres - tps_avant
            if tps_execution >= nb_secs:
                print("La fonction {0} a mis {1} pour s'exécuter".format( \
                        fonction_a_executer, tps_execution))
            return valeur_renvoyee
        return fonction_modifiee
    return decorateur


>>> @controler_temps(4)
... def attendre():
...     input("Appuyez sur Entrée...")
...
>>> attendre() # Je vais appuyer sur Entrée presque tout de suite
Appuyez sur Entrée...
>>> attendre() # Cette fois, j'attends plus longtemps
Appuyez sur Entrée...
La fonction <function attendre at 0x00BA5810> a mis 4.14100003242 pour s'exécuter
>>>
```
### Tenir compte des paramètres de notre fonction (décorateur flexible)

* le décorateur que nous avons créé un peu plus haut devrait pouvoir s'appliquer à des fonctions ne prenant aucun paramètre, ou en prenant un, ou plusieurs…
```py
import time

# définit dans son corps notre décorateur decorateur
def controler_temps(*parametres_non_nommes, **parametres_nommes):
    """Contrôle le temps mis par une fonction pour s'exécuter.
    Si le temps d'exécution est supérieur à nb_secs, on affiche une alerte"""
    
    # définit lui-même dans son corps notre fonction modifiée fonction_modifiee
    def decorateur(fonction_a_executer):
        """Notre décorateur. C'est lui qui est appelé directement LORS
        DE LA DEFINITION de notre fonction (fonction_a_executer)"""

        def fonction_modifiee(*parametres_non_nommes, **parametres_nommes):
            """Fonction renvoyée par notre décorateur. Elle se charge
            de calculer le temps mis par la fonction à s'exécuter"""
            
            tps_avant = time.time() # avant d'exécuter la fonction
            ret = fonction_a_executer(*parametres_non_nommes, **parametres_nommes)
            tps_apres = time.time()
            tps_execution = tps_apres - tps_avant
            if tps_execution >= nb_secs:
                print("La fonction {0} a mis {1} pour s'exécuter".format( \
                        fonction_a_executer, tps_execution))
            return ret
        return fonction_modifiee
    return decorateur
```
### Des décorateurs s'appliquant aux définitions de classes

* Vous pouvez également appliquer des décorateurs aux définitions de classes
* Au lieu de recevoir en paramètre la fonction, vous allez recevoir la classe
```py
>>> def decorateur(classe):
...     print("Définition de la classe {0}".format(classe))
...     return classe
...
>>> @decorateur
... class Test:
...     pass
...
Définition de la classe <class '__main__.Test'>
```
### Chaîner nos décorateurs
```py
@decorateur1
@decorateur2
def fonction():
```
### Exemples d'applications

* Les classes singleton   
   * une classe dite singleton est une classe qui ne peut être instanciée qu'une fois
   * La première fois que vous appelez le constructeur de ce type de classe, vous obtenez le premier et l'unique objet nouvellement instancié
   * Tout appel ultérieur à ce constructeur renvoie le même objet (le premier créé)
```py
def singleton(classe_definie):
    instances = {} # Dictionnaire de nos instances singletons
    def get_instance(): # fonction interne qui va remplacer notre classe
        if classe_definie not in instances:
            # On crée notre premier objet de classe_definie
            instances[classe_definie] = classe_definie()
        return instances[classe_definie]
    return get_instance

>>> @singleton
... class Test:
...     pass
...
>>> a = Test() # Quand on crée notre premier objet (celui se trouvant dans a), notre constructeur est bien appelé
>>> b = Test() # Quand on souhaite créer un second objet, c'est celui contenu dans a qui est renvoyé
>>> a is b # Ainsi, a et b pointent vers le même objet
True
>>>
```
* Contrôler les types passés à notre fonction   
   * Dans Python, aucun contrôle n'est fait sur le type des données passées en paramètres de nos fonctions
   * Il pourrait être utile de coder un décorateur qui vérifie les types passés en paramètres à notre fonction et qui lève une exception si les types attendus ne correspondent pas à ceux reçus lors de l'appel à la fonction
   * Voici notre définition de fonction, pour vous donner une idée :
   ```py
    @controler_types(int, int)
    def intervalle(base_inf, base_sup):
   ```
```py
def controler_types(*a_args, **a_kwargs): # liste des types des paramètres attendus (int, ici)
    """On attend en paramètres du décorateur les types souhaités. On accepte
    une liste de paramètres indéterminés, étant donné que notre fonction
    définie pourra être appelée avec un nombre variable de paramètres et que
    chacun doit être contrôlé"""
    
    def decorateur(fonction_a_executer):
        """Notre décorateur. Il doit renvoyer notre fonction_modifiee"""
        def fonction_modifiee(*args, **kwargs):
            """Notre fonction modifiée. Elle se charge de contrôler
            les types qu'on lui passe en paramètres"""
            
            # La liste des paramètres attendus (a_args) doit être de même
            # Longueur que celle reçue (args)
            if len(a_args) != len(args):
                raise TypeError("le nombre d'arguments attendu n'est pas égal " \
                        "au nombre reçu")
            # On parcourt la liste des arguments reçus et non nommés
            for i, arg in enumerate(args):
                if a_args[i] is not type(args[i]):
                    raise TypeError("l'argument {0} n'est pas du type " \
                            "{1}".format(i, a_args[i]))
            
            # On parcourt à présent la liste des paramètres reçus et nommés
            for cle in kwargs:
                if cle not in a_kwargs:
                    raise TypeError("l'argument {0} n'a aucun type " \
                            "précisé".format(repr(cle)))
                if a_kwargs[cle] is not type(kwargs[cle]):
                    raise TypeError("l'argument {0} n'est pas de type" \
                            "{1}".format(repr(cle), a_kwargs[cle]))
            return fonction_a_executer(*args, **kwargs)
        return fonction_modifiee
    return decorateur

>>> @controler_types(int, int) # déclare les types attendus
... def intervalle(base_inf, base_sup):
...     print("Intervalle de {0} à {1}".format(base_inf, base_sup))
...
>>> intervalle(1, 8)
Intervalle de 1 à 8
>>> intervalle(5, "oups!")
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
  File "<stdin>", line 24, in fonction_modifiee
TypeError: l'argument 1 n'est pas du type <class 'int'>
```
* Voilà nos exemples d'applications. Il y en a bien d'autres, vous pouvez en retrouver plusieurs sur la PEP 318 consacrée aux décorateurs, ainsi que des informations supplémentaires

### En résumé :   

* Les décorateurs permettent de modifier le comportement d'une fonction
* Ce sont eux-mêmes des fonctions, prenant en paramètre une fonction et renvoyant une fonction (qui peut être la même)
* On peut déclarer une fonction comme décorée en plaçant, au-dessus de la ligne de sa définition, la ligne @nom_decorateur
* Au moment de la définition de la fonction, le décorateur est appelé et la fonction qu'il renvoie sera celle utilisée.
* Les décorateurs peuvent également prendre des paramètres pour influer sur le comportement de la fonction décorée.


## LES METACLASSES

* La méthode __init__ est là pour initialiser notre objet (en écrivant des attributs dedans, par exemple)
* La méthode qui se charge de le créer, c'est __new__
```py
ce qui se passe quand on tente de construire un objet :
1. On demande à créer un objet, en écrivant par exemple Personne("Doe", "John").
2. La méthode __new__ de notre classe (ici Personne) est appelée et se charge de construire un nouvel objet.
3. Si __new__ renvoie une instance de la classe, on appelle le constructeur __init__ en lui passant en    
paramètres cette nouvelle instance ainsi que les arguments passés lors de la création de l'objet.

class Personne:
    
    """Classe définissant une personne.
    
    Elle possède comme attributs :
    nom -- le nom de la personne
    prenom -- son prénom
    age -- son âge
    lieu_residence -- son lieu de résidence
    
    Le nom et le prénom doivent être passés au constructeur."""
    
    # première étape
    def __new__(cls, nom, prenom):
        print("Appel de la méthode __new__ de la classe {}".format(cls))
        # On laisse le travail à object
        return object.__new__(cls, nom, prenom)
    
    # deuxième étape
    def __init__(self, nom, prenom):
        """Constructeur de notre personne."""
        print("Appel de la méthode __init__")
        self.nom = nom
        self.prenom = prenom
        self.age = 23
        self.lieu_residence = "Lyon"

# création d'une instance
>>> personne = Personne("Doe", "John")
Appel de la méthode __new__ de la classe <class '__main__.Personne'>
Appel de la méthode __init__
```
* Redéfinir__new__peut permettre, par exemple, de créer une instance d'une autre classe

### Créer une classe dynamiquement

* En Python, tout est objet. Cela veut dire que les entiers, les flottants, les listes sont des objets, que les modules sont des objets, que les packages sont des objets… mais cela veut aussi dire que les classes sont des objets !
* Si les classes sont des objets, cela veut dire que les classes sont elles-mêmes modelées sur des classes
```py
>>> type(5)
<class 'int'>
>>> type("une chaîne")
<class 'str'>
>>> type([1, 2, 3])
<class 'list'>
>>> type(int)
<class 'type'> # par défaut, toutes nos classes sont modelées sur la classe type
>>> type(str)
<class 'type'>
>>> type(list)
<class 'type'>

# quand on crée une nouvelle classe (class Personne: par exemple), 
# Python appelle la méthode __new__ de la classe type;
# une fois la classe créée, on appelle le constructeur __init__ de la classe type
```
* Résumé   
   * nous savons que les objets sont modelés sur des classes    
   * nous savons que nos classes, étant elles-mêmes des objets, sont modelées sur une classe   
   * la classe sur laquelle toutes les autres sont modelées par défaut s'appelle type
* La classe type prend trois arguments pour se construire :   
   * le nom de la classe à créer   
   * un tuple contenant les classes dont notre nouvelle classe va hériter   
   * un dictionnaire contenant les attributs et méthodes de notre classe.
```py
>>> Personne = type("Personne", (), {})
>>> Personne
<class '__main__.Personne'>
>>> john = Personne()
>>> dir(john)
['__class__', '__delattr__', '__dict__', '__doc__', '__eq__', '__format__', '__g
e__', '__getattribute__', '__gt__', '__hash__', '__init__', '__le__', '__lt__',
'__module__', '__ne__', '__new__', '__reduce__', '__reduce_ex__', '__repr__', '_
_setattr__', '__sizeof__', '__str__', '__subclasshook__', '__weakref__']

# création dynamique
# 1) On commence par créer deux fonctions, creer_personne et presenter_personne. 
# Elles sont amenées à devenir les méthodes __init__ et presenter de notre future classe. 
# Étant de futures méthodes d'instance, elles doivent prendre en premier paramètre l'objet manipulé
def creer_personne(personne, nom, prenom):
    """La fonction qui jouera le rôle de constructeur pour notre classe Personne.
    
    Elle prend en paramètre, outre la personne :
    nom -- son nom
    prenom -- son prenom"""
    
    personne.nom = nom
    personne.prenom = prenom
    personne.age = 21
    personne.lieu_residence = "Lyon"

def presenter_personne(personne):
    """Fonction présentant la personne.
    
    Elle affiche son prénom et son nom"""
    
    print("{} {}".format(personne.prenom, personne.nom))

# 2) On place ces deux fonctions dans un dictionnaire. 
# En clé se trouve le nom de la future méthode et en valeur, la fonction correspondante
# Dictionnaire des méthodes
methodes = {
    "__init__": creer_personne,
    "presenter": presenter_personne,
}

# 3) Enfin, on fait appel à type en lui passant, en troisième paramètre, 
# le dictionnaire que l'on vient de constituer
# Création dynamique de la classe
# type("nom_classe", (classes_meres), méthodes_classe)
Personne = type("Personne", (), methodes)
# Si vous essayez de mettre des attributs dans ce dictionnaire passé à type, 
# il s'agira d'attributs de classe, pas d'attributs d'instance

>>> john = Personne("Doe", "John")
>>> john.nom
'Doe'
>>> john.prenom
'John'
>>> john.age
21
>>> john.presenter()
John Doe
>>>
```
### Définition d'une métaclasse

* Un métaclasse : classe d'une classe, la classe mère d'autre classes
* type est la métaclasse de toutes les classes par défaut
* Cependant, une classe peut posséder une autre métaclasse que type.
* Construire une métaclasse se fait de la même façon que construire une classe.
* Les métaclasses héritent de type
* La méthode __new__ prend 4 paramètres :    
   * la métaclasse servant de base à la création de notre nouvelle classe   
   * le nom de notre nouvelle classe
   * un tuple contenant les classes dont héritent notre classe à créer
   * le dictionnaire des attributs et méthodes de la classe à créer
```py
# méthode __new__ minimaliste
class MaMetaClasse(type):
    
    """Exemple d'une métaclasse."""
    
    def __new__(metacls, nom, bases, dict):
        """Création de notre classe."""
        print("On crée la classe {}".format(nom))
        return type.__new__(metacls, nom, bases, dict)

# Pour dire qu'une classe prend comme métaclasse autre chose que type, 
# c'est dans la ligne de la définition de la classe que cela se passe :
class MaClasse(metaclass=MaMetaClasse):
    pass
```
* La méthode __init__ prend les mêmes paramètres que __new__, sauf le premier, qui n'est plus la métaclasse servant de modèle mais la classe que l'on vient de créer

### Les métaclasses en action

* les métaclasses sont généralement utilisées pour des besoins assez complexes
```py
# Par exemple, la classe mère de tous nos widgets s'appellera Widget. 
# De cette classe hériteront les classes Bouton, CaseACocher, Menu, Cadre, etc. 
# L'utilisateur de la bibliothèque pourra par ailleurs en dériver ses propres classes.

trace_classes = {} # Notre dictionnaire vide

class MetaWidget(type):
    
    """Notre métaclasse pour nos Widgets.
    
    Elle hérite de type, puisque c'est une métaclasse.
    Elle va écrire dans le dictionnaire trace_classes à chaque fois
    qu'une classe sera créée, utilisant cette métaclasse naturellement."""
    
    def __init__(cls, nom, bases, dict):
        """Constructeur de notre métaclasse, appelé quand on crée une classe."""
        type.__init__(cls, nom, bases, dict)
        trace_classes[nom] = cls


# création de la classe Widget
class Widget(metaclass=MetaWidget):
    
    """Classe mère de tous nos widgets."""
    
    pass

>>> trace_classes
{'Widget': <class '__main__.Widget'>} # notre classe Widget a bien été ajoutée dans notre dictionnaire
>>>

# construisons une nouvelle classe héritant de Widget
class bouton(Widget):
    
    """Une classe définissant le widget bouton."""
    # Si vous affichez de nouveau le contenu du dictionnaire, vous vous rendrez compte que la classe Bouton a bien été ajoutée
    pass
```
### En résumé :

* Le processus d'instanciation d'un objet est assuré par deux méthodes, __new__ et __init__
* __new__ est chargée de la création de l'objet et prend en premier paramètre sa classe
* __init__ est chargée de l'initialisation des attributs de l'objet et prend en premier paramètre l'objet précédemment créé par __new__
* Les classes étant des objets, elles sont toutes modelées sur une classe appelée **métaclasse**
* À moins d'être explicitement modifiée, la métaclasse de toutes les classes est **type**
* On peut utiliser type pour créer des classes dynamiquement
* On peut faire hériter une classe de type pour créer une nouvelle métaclasse
* Dans le corps d'une classe, pour spécifier sa métaclasse, on exploite la syntaxe suivante :class MaClasse(metaclass=NomDeLaMetaClasse):


## <a name="bdd"></a> LES BASES DE DONNEES

### SQL
* fichiers non modifiables directement
* gestion de données complexes
### JSON
* fichiers modifiables directement
* gestion difficile de données complexes 
* utilisé pour stocker les paramètres logiciels
* utilisé pour stocker quelques valeurs
```py
# stocker des données dans un fichier JSON
import json

fichier = "d:/Documents/WEB DEV/PYTHON/settings.json"
"""
{
    "fontSize": 20
}
"""

with open(fichier, "r") as f:
    settings = json.load(f)

# accéder à la valeur
# print(settings.get("fontSize")) => 20

settings["fontSize"] = 15 # modification du dictionnaire

with open(fichier, "w") as f: # réécriture du dictionnaire
    json.dump(settings, f, indent=4)
    
"""
{
    "fontSize": 15
}
"""

## - SQLite

import sqlite3 # module de base de Python 3

# si fichier n'existe pas, Python va le créer
conn = sqlite3.connect("d:/Documents/WEB DEV/PYTHON/database.db")
conn.close()

# créer un tableau
import sqlite3

conn = sqlite3.connect("d:/Documents/WEB DEV/PYTHON/database.db")
c = conn.cursor()

c.execute("""
CREATE TABLE IF NOT EXISTS employees(
    prenom text,
    nom text
)
""") # name, type
conn.commit() # ajout
conn.close()

# ajouter des données au tableau 
import sqlite3

conn = sqlite3.connect("d:/Documents/WEB DEV/PYTHON/database.db")
c = conn.cursor()

c.execute("""
CREATE TABLE IF NOT EXISTS employees(
    prenom text,
    nom text
)
""")

d = {"prenom": "Paul", "nom": "Dupond"}
c.execute("INSERT INTO employees VALUES (:prenom, :nom)", d)

conn.commit() # ajout
conn.close()

# visualiser une BDD dans VS Code
extension SQLite
Ctrl Shift P
SQLite Open Database
SQLite explorer se rajoute en bas à gauche
Show Table => execute commande SQL pour afficher la table

# récupérer des données
import sqlite3

conn = sqlite3.connect("d:/Documents/WEB DEV/PYTHON/database.db")
c = conn.cursor()

c.execute("""
CREATE TABLE IF NOT EXISTS employees(
    prenom text,
    nom text
)
""")

c.execute("SELECT * FROM employees WHERE prenom='Paul'")
donnees = c.fetchall() # à la fin du processus, le curseur est placé à la fin du fichier
print(donnees) # liste de tuple [('Paul', 'Dupond'), ('Paul', 'Durand')]
premier = c.fetchone() # ainsi, il renvoie None, car le curseur est placé à la fin du fichier
# il faut éxécuter la requête à nouveau
# fetchone récupère le premier élément qui satisfait la requête
print(premier) # ('Paul', 'Dupond')

conn.commit() # ajout
conn.close()

# mettre à jour des données
import sqlite3

conn = sqlite3.connect("d:/Documents/WEB DEV/PYTHON/database.db")
c = conn.cursor()

c.execute("""
CREATE TABLE IF NOT EXISTS employees
(
    prenom text,
    nom text,
    salaire int
)
""")

d = {"salaire": 20000, "prenom": "Patrick", "nom": "Dupont"}

c.execute("""UPDATE employees SET salaire=:salaire
WHERE prenom=:prenom AND nom=:nom""", d)

conn.commit() # ajout
conn.close()

# supprimer des données
import sqlite3

conn = sqlite3.connect("d:/Documents/WEB DEV/PYTHON/database.db")
c = conn.cursor()

c.execute("""
CREATE TABLE IF NOT EXISTS employees
(
    prenom text,
    nom text
)
""")

c.execute("DELETE FROM employees WHERE prenom='Paul' AND nom='Durand'")
# DELETE FROM employees pour supprimer toutes les entrées

conn.commit() # ajout
conn.close()
```
Ouvrir une Base de données avec DB Browser : https://sqlitebrowser.org/

### POSTGRES

#### Ressources
https://www.youtube.com/watch?v=2PDkXviEMD0
https://www.postgresqltutorial.com/postgresql-python/
https://pynative.com/python-postgresql-tutorial/
```py
# installer psycopg2
pip install psycopg2

# - à retenir -
conn = psycopg2.connect(**params)  # connexion à la BDD
cur = conn.cursor() # création d'un agent de requête
cur.execute(requête, (value1, value2)) # ne jamais mettre les données dans la requête !
id = cur.fetchone()[0]
conn.commit() # enregistre les changements dans BDD
cur.close() # libère l'agent
conn.close() # ferme la connexion

# - basic script -
import psycopg2 # indispensable

# connect to the DB
con = psycopg2.connect(
    host="localhost",
    database="formation",
    user="postgres", # par défaut
    password="*****" # mot de passe de la BDD
)
# s'il y a une erreur, psycopg2 vous indique la ligne de l'erreur

if con:
    print("Connecté !")
else:
    print("Problème de connexion...")

# cursor : command
cur = con.cursor()

# execute query (with safety to avoid SQL injection)
cur.execute("INSERT INTO exemple(name, email) VALUES(%s, %s)",
            ('Graveyard', 'graveyard@fun.com'))

cur.execute("SELECT * FROM exemple")

rows = cur.fetchall()
for id, name, email in rows:
    print(f"id: {id}, name: {name}, email: {email}")
# id: 1, name: Smith, email: smith@smith.com
# id: 2, name: Mary Brown, email: mary@brown.com
# id: 3, name: Vana'ima, email: vaima@brown.com
# id: 5, name: Graveyard, email: graveyard@fun.com (5 car le précédent n'avais pas passé le commit)

# enregistrer les requêtes (important pour les requêtes autres que SELECT)
con.commit()

# always close the cursor when query complete
cur.close()

# always close the connection
con.close()

# - script un peu plus avancé - #
https://www.postgresqltutorial.com/postgresql-python/insert/

import psycopg2
from config import config

# insert one vendor
insert_vendor("3M Co.")

def insert_vendor(vendor_name):
    """ insert a new vendor into the vendors table """
    sql = """INSERT INTO vendors(vendor_name)
                VALUES(%s) RETURNING vendor_id;"""
    conn = None
    vendor_id = None
    try:
        # read database configuration
        params = config()
        # connect to the PostgreSQL database
        conn = psycopg2.connect(**params)
        # create a new cursor
        cur = conn.cursor()
        # execute the INSERT statement
        cur.execute(sql, (vendor_name,))
        # get the generated id back
        vendor_id = cur.fetchone()[0]
        # commit the changes to the database
        conn.commit()
        # close communication with the database
        cur.close()
    except (Exception, psycopg2.DatabaseError) as error:
        print(error)
    finally:
        if conn is not None:
            conn.close()

    return vendor_id

# insert multiple vendors
insert_vendor_list([
    ('AKM Semiconductor Inc.',),
    ('Asahi Glass Co Ltd.',),
    ('Daikin Industries Ltd.',),
    ('Dynacast International Inc.',),
    ('Foster Electric Co. Ltd.',),
    ('Murata Manufacturing Co. Ltd.',)
])

def insert_vendor_list(vendor_list):
    """ insert multiple vendors into the vendors table  """
    sql = "INSERT INTO vendors(vendor_name) VALUES(%s)"
    conn = None
    try:
        # read database configuration
        params = config()
        # connect to the PostgreSQL database
        conn = psycopg2.connect(**params) # un dictionnaire avec les paramètres
        # create a new cursor
        cur = conn.cursor()
        # execute the INSERT statement
        cur.executemany(sql,vendor_list) # vendor_list = tuple
        # noter le executemany
        # commit the changes to the database
        conn.commit()
        # close communication with the database
        cur.close()
    except (Exception, psycopg2.DatabaseError) as error:
        print(error)
    finally:
        if conn is not None:
            conn.close()

# - un dernier exemple pour la route - #
import psycopg2

try:
   connection = psycopg2.connect(user="sysadmin",
                                  password="pynative@#29",
                                  host="127.0.0.1",
                                  port="5432",
                                  database="postgres_db")
   cursor = connection.cursor()

   postgres_insert_query = """ INSERT INTO mobile (ID, MODEL, PRICE) VALUES (%s,%s,%s)"""
   record_to_insert = (5, 'One Plus 6', 950)
   cursor.execute(postgres_insert_query, record_to_insert)

   connection.commit()
   count = cursor.rowcount
   print (count, "Record inserted successfully into mobile table")

except (Exception, psycopg2.Error) as error :
    if(connection):
        print("Failed to insert record into mobile table", error)

finally:
    #closing database connection.
    if(connection):
        cursor.close()
        connection.close()
        print("PostgreSQL connection is closed")
```

## ARCHITECTURE
```py
projet/
    app/
        app.py
    env/
    README.md
```

## CREER UNE APP
```py
new Terminal in VS Code 
mkdir new_projet
cd new _projet
mkdir app
cd app/ 
touch app.py 
cd .. 
code . # lancer le dossier avec VS Code

py -3.7 -m venv env # création de l'environnement virtuel
accepter le nouvel environnement 

cd env/bin/
source activate # active l'environnement virtuel
pip3.7 list # vérifie les packages installés
pip3.7 install module_a_telecharger

+ créer un .gitignore
+ créer un requirements.txt
```

## <a name="dependances-app"></a> GERER LES DEPENDANCES D'UNE APP
```s
requirements.txt # liste des dépendances (une liste de pip install)
    requests==2.13.0
    # commentaire (expliquer une dépendance)
    schedule==0.4.2
    ipdb
    # ne pas indiquer de version précise pour des packages qui ont besoin d'être à jour
    # ex. : debugger, tests, ect.

# créer un requirements.txt
$ (venv) pip freeze > requirements.txt

# restaurer les dépendances d'un requirements.txt
$ (venv) pip install -r requirements.txt

# separer Development and Production Dependencies
requirements-dev.txt            requirements.txt
--------------------            ----------------
-r requirements.txt             requests==2.1.3
# installe les dependances      # ...
# du fichier principal
pytest==2.0.0

# best practices pour l'organisation
* utiliser la version exacte (ex.==2.2.2) la majorité du temps
* inclure les dépendances secondaires
* pas de version spéciale pour ce qui ont besoin d''être à jour : debuggers, ect.
* requirements.txt + requirements-dev.txt
# aussi : requirements.pip requirements.lock
* à la racine du projet
* # utiliser les commentaires, notamment les différences prod vs dev, explication choix, ect.
* Odre des dépendances :
# Direct dependancies, sorted alphabetically
Flask==0.12
requests==2.13.0
schedule==0.4.2
# secondary dependancies, sorted alphabetically
Jinja2==2.9.5
Werkzeug==0.12
```

## <a name="projet-devises-pyside"></a> PROJET CONVERTISSEUR DE DEVISES avec PYSIDE 
```py
from PySide2 import QtWidgets, QtGui, QtCore # a importer avec pip (dans l'env virtuel)
import currency_converter

class App(QtWidgets.QWidget): # importe la classe QWidget du module QtWidgets
    def __init__(self):
        super().__init__()
        self.c = currency_converter.CurrencyConverter() # ajoute la classe de currency_converter
        self.setWindowTitle("Convertisseur de devises")
        self.setup_ui() # appelle la méthode qui personnalise l'interface
        # premiere méthode appelée car elle crée les widgets
        self.set_default_values() # appelle la méthode qui met les valeurs par défaut
        # ordre important : on modifie les valeurs après les avoir crées avec setup_ui
        self.setup_connections() # appelle la méthode qui connecte les widgets aux méthode
        self.setup_css() # appelle la méthode pour modifier le style CSS
        self.resize(500, 50)

    # création de l'interface graphique
    def setup_ui(self):
        self.layout = QtWidgets.QHBoxLayout(self) # créé un layout horizontal (alignement boutons)
        self.cbb_devisesFrom = QtWidgets.QComboBox() # input
        self.le_montant = QtWidgets.QSpinBox()  # select
        self.cbb_devisesTo = QtWidgets.QComboBox()
        self.le_montantConverti = QtWidgets.QSpinBox()
        self.btn_inverser = QtWidgets.QPushButton("Inverser devises")
        # ajout des widgets au layout
        self.layout.addWidget(self.cbb_devisesFrom)
        self.layout.addWidget(self.le_montant)
        self.layout.addWidget(self.cbb_devisesTo)
        self.layout.addWidget(self.le_montantConverti)
        self.layout.addWidget(self.btn_inverser)
    
    # connecte les widget aux méthodes (pour réagir aux événements)
    def setup_connections(self):
        self.cbb_devisesFrom.activated.connect(self.compute)
        # lie cbb_devisesFrom à self.compute quand une autre value est choisie
        self.cbb_devisesTo.activated.connect(self.compute)
        self.le_montant.valueChanged.connect(self.compute)
        # lie le_montant à self.compute quand le montant est changé
        self.btn_inverser.clicked.connect(self.inverser_devises)
        # lie btn_inverser à self.inverser_devises quand le bouton est cliqué

    # changer le style de l'application
    def setup_css(self):
        self.setStyleSheet("""
        background-color: rgb(30, 30, 30);
        color: rgb(240, 240, 240);
        border: none;
        """)
        style = """
        QComboBox::down-arrow {
            image: none;
            border-width: 0px;
        }
        QComboBox::drop-down {
            border-width: 0px;
        } 
        """
        self.cbb_devisesFrom.setStyleSheet(style)
        self.cbb_devisesTo.setStyleSheet(style)

    # mettre les valeurs par défaut
    def set_default_values(self):
        self.cbb_devisesFrom.addItems(sorted(list(self.c.currencies))) 
        # addItems pour ajouter une liste d'éléments
        self.cbb_devisesTo.addItems(sorted(list(self.c.currencies)))
        self.cbb_devisesFrom.setCurrentText("EUR") # met EUR par défaut dans les input
        self.cbb_devisesTo.setCurrentText("EUR")
        self.le_montant.setRange(1, 1000000) # modifie l'odre de grandeur du select
        self.le_montantConverti.setRange(1, 1000000)
        self.le_montant.setValue(100) # met 100 comme valeur par défaut
        self.le_montantConverti.setValue(100)

    # réagit aux événements
    def compute(self):
        montant = self.le_montant.value() # récupère la valeur de le_montant
        deviseFrom = self.cbb_devisesFrom.currentText()
        deviseTo = self.cbb_devisesTo.currentText()
        # tente de convertir la valeur
        try:
            resultat = self.c.convert(montant, deviseFrom, deviseTo)
        except currency_converter.currency_converter.RateNotFoundError:
            print("Rate not found")
        else:
            self.le_montantConverti.setValue(resultat) # affiche le résultat de la conversion

    # créer l'action d'inverser les devises
    def inverser_devises(self):
        devise_from = self.cbb_devisesFrom.currentText() # récupère les valeurs
        devise_to = self.cbb_devisesTo.currentText()

        self.cbb_devisesFrom.setCurrentText(devise_to) # inverse les valeurs
        self.cbb_devisesTo.setCurrentText(devise_from)
        self.compute() # calcule le nouveaux résultat

app = QtWidgets.QApplication([]) # représente l'application /!\ passer une liste vide
win = App() # représente l'interface
win.show() # montre l'interface
app.exec_() # lance l'appli
```

## <a name="projet-cine-pyside-1"></a> PROJET CINE CLUB avec PYSIDE et JSON (part.1 : en API)
```py
# Création de la logique du code

structure :
cine_club/
    data/
        movies.json
    app.py 
    movie.py

# movie.py
import json
import os
import logging

CUR_DIR = os.path.dirname(__file__) # récupère le chemin du fichier avec __file___, 
# puis son dossier avec dirname
DATA_FILE = os.path.join(CUR_DIR, "data", "movies.json")

# récupère tous les films sous forme d'instance de la classe Movie
def get_movies():
    # movies_instances = [] // supprimé avec la compréhension de liste
    with open(DATA_FILE, "r") as f:
        movies = json.load(f)
        # for movie_title in movies: // supprimé avec la compréhension de liste
        #    movies_instances.append(Movie(movie_title)) // supprimé avec la compréhension de liste

        # solution simplifiée avec une compréhension de liste
        # retourne une instance pour chaque itération de boucle
        # stockée dans la variable movies_instances
        movies_instances = [Movie(movie_title) for movie_title in movies]

        return movies_instances

class Movie:
    def __init__(self, title):
        self.title = title.title() # méthode title pour enregistrer en style Title
        # harry potter => Harry Potter

    def __str__(self): # retourne le titre quand on print l'instance
        return self.title

    def _get_movies(self): # _nom_fonction car elles ne seront pas appelées depuis l'interface
        # utilisée pour de la logique interne : méthodes privées
        # dans la méthode add_to_movies
        with open(DATA_FILE, "r") as f:
            return json.load(f)

    def _write_movies(self, movies): # méthode privée
        with open(DATA_FILE, "w") as f:
            json.dump(movies, f, indent=4)

    def add_to_movies(self):
        movies = self._get_movies()

        if self.title not in movies:
            movies.append(self.title) # ajoute le titre de l'instance à la liste de films
            self._write_movies(movies) # appelle à la méthode privée
            # qui ajoute la nouvelle liste à la place de l'ancienne liste
            return True
        else:
            logging.warning(f"Le film {self.title} est déjà enregistré.")
            return False

    def remove_from_movies(self):
        movies = self._get_movies()

        if self.title in movies:
            movies.remove(self.title)
            self._write_movies(movies)

if __name__ == "__main__": # exécute le code que si l'on est sur le fichier principal
    get_movies() # récupère les films sous forme d'instances
```

## <a name="projet-cine-pyside-2"></a> PROJET CINE CLUB avec PYSIDE et JSON (part.2 : avec l'interface graphique Pyside)
```py
# Création de l'interface graphique de l'appli

# app.py
from PySide2 import QtWidgets, QtCore
from movie import Movie, get_movies # imports du module movie précédemment créé

class App(QtWidgets.QWidget): # création de l'interface
    def  __init__(self):
        super().__init__()
        self.setWindowTitle("Ciné Club") # donne un titre à la fenêtre
        self.setup_ui() # appelle la méthode pour créer l'interface 
        self.setup_connections() # appelle la méthode qui ajoute des actions aux widgets
        self.populate_movies() # appelle la méthode qui remplit la liste widget

    def setup_ui(self):
        self.main_layout = QtWidgets.QVBoxLayout(self) # création d'un layout vertical

        self.le_movieTitle = QtWidgets.QLineEdit() # le_ pour line edit (input text)
        self.btn_addMovie = QtWidgets.QPushButton("Ajouter un film")
        self.lw_movies = QtWidgets.QListWidget() # lw_ pour list widget (select)
        self.lw_movies.setSelectionMode(QtWidgets.QListWidget.ExtendedSelection)
        # ↑ permet de sélectionner plusieurs items d'un coup
        self.btn_removeMovie = QtWidgets.QPushButton("Supprimer le(s) film(s)")

        self.main_layout.addWidget(self.le_movieTitle) # ajout des widgets au layout
        self.main_layout.addWidget(self.btn_addMovie)
        self.main_layout.addWidget(self.lw_movies)
        self.main_layout.addWidget(self.btn_removeMovie)

    def setup_connections(self):
        self.btn_addMovie.clicked.connect(self.add_movie) # s'active au clic du bouton "Ajouter un film"
        # lie l'événement à la méthode add_movie
        self.le_movieTitle.returnPressed.connect(self.add_movie)
        # ↑ connecte le bouton entrée sur l'input movieTitle avec la méthode add_movie
        self.btn_removeMovie.clicked.connect(self.remove_movie)

    def populate_movies(self):
        self.lw_movies.clear()
        movies = get_movies()
        for movie in movies:
            lw_item = QtWidgets.QListWidgetItem(movie.title) # création d'un item de type list
            # (!) alternative au setData
            #     lw_item.movie = movie => créé un attribut à l'item qui contient l'instance
            lw_item.setData(QtCore.Qt.UserRole, movie) # attache un objet movie à l'item
            # lie titre de film et son instance
            self.lw_movies.addItem(lw_item) # ajoute l'item au select

    def add_movie(self):
        movie_title = self.le_movieTitle.text() # récupère la valeur text de la line edit
        if not movie_title: # si valeur vide dans le line edit
            return False

        movie = Movie(title=movie_title) # création d'une instance Movie
        result = movie.add_to_movies() # ajoute le film à la liste JSON (renvoie True | False)
        if result: # si film non présent dans la liste
            lw_item = QtWidgets.QListWidgetItem(movie.title) # création d'un liste widget item
            # (!) alternative au setData
            #     lw_item.movie = movie => créé un attribut à l'item qui contient l'instance
            lw_item.setData(QtCore.Qt.UserRole, movie) # lie l'instance Movie au liste widget item
            self.lw_movies.addItem(lw_item)
            self.le_movieTitle.setText("") # vide le line edit

    def remove_movie(self):
        for selected_item in self.lw_movies.selectedItems(): # récupère les items sélectionnés
            # ↓ équivalent à movie = Movie(selected_item.text())
            # évite de recréer une instance
            # (!) alternative au setData
            #     movie = selected_item.movie
            movie = selected_item.data(QtCore.Qt.UserRole) # récupère l'instance attachée
            # grâce au setData de QtCore
            movie.remove_from_movies()
            self.lw_movies.takeItem(self.lw_movies.row(selected_item))
            # enlève l'élément sélectionné de la liste widget
            # takeItem(index)

app = QtWidgets.QApplication([]) # création de l'application (avec le tableau vide)
win = App() # création de l'interface
win.show() # montre l'interface
app.exec_() # lance l'appli
```

## PYTHON AVANCÉ

### <a name="muables-immuables"></a> OBJETS MUABLES & IMMUABLES
```py
# Rappel : 2 catégories d'objets :
# muables : modifiables : listes, dictionnaires, sets 
# => garde le même objet en mémoire à chaque modification
# immuables : on ne peut les modifier directement : string, nombres, booleens
# il faut créer une nouvelle variable pour récupérer l'élément changé
# => chaque modification crée un nouvel objet en mémoire

# Pourquoi c'est important
import time

liste = range(999999)
a = time.time()

# 1ère solution avec un objet immuable (string)
# on crée un objet à chaque boucle !
resultat = ''
for nombre in liste:
    resultat += str(nombre)

# 2eme solution avec un objet muable (liste)
# on utilise le même objet dans la mémoire
resultat = []
for nombre in liste:
    resultat.append(str(nombre))
resultat_final = ''.join(resultat)

b = time.time()

print("Temps d'execution: {}".format(b - a))
# Solution 1 : Temps d'execution: 2.4922115802764893
# Solution 2 : Temps d'execution: 0.46729564666748047
```

### <a name="fonctions-anonymes"></a> LES FONCTIONS ANONYMES
```py
fonction_anonyme = "une fonction jetable, qui n'a pas de nom"
but = "alléger le code et le rendre plus lisible"

def multiplication(a, b):
	return a * b

multiplication = lambda a, b: a * b # déclarée sur une ligne
# possible de l'assigner à une variable
resultat = multiplication(5, 10) # puis l'utiliser comme une fonction
print(resultat)


def print_bonjour():
	print('Bonjour')

print_bonjour() # Bonjour

# Fonctionne uniquement avec Python 3.x !
print_bonjour = lambda: print('Bonjour')
print_bonjour()

print_mot = lambda m: print(m) # assignée à une fonction
print_mot('Udemy') # Udemy

# Exemples concrets
import os
fichiers = ['/H/Projets/fichier1.py',
		    '/H/Projets/fichier2.pptx',
		    'Y/Dossiers/fichier3.txt']

get_fichier = lambda f: os.path.split(f)[-1] # fichier.py
get_ext = lambda f: os.path.splitext(f)[-1] # .py
del_point = lambda f: f.replace('.', '') # py
process = lambda f: del_point(get_ext(get_fichier(f)))

# sans lambda
fichiers_extensions = [os.path.splitext(os.path.split(f)[-1])[-1].replace('.', '') for f in fichiers]
# avec lambda
fichiers_extensions = [process(f) for f in fichiers]

print(fichiers_extensions)

# autre exemple on le lambda s'impose
utilisateurs = [('User1', 'Etienne'),
                ('User4', 'Arnaud'),
                ('User3', 'Camille'),
                ('User5', 'Bernard'),
                ('User2', 'Didier')]
# fonction jetable : on ne l'utilise qu'une fois
utilisateurs.sort(key=lambda x: x[1]) # sort(key=comment_trier)
# la fonction anonyme va s'appliquer sur chaque tuple, va trier sur le deuxième élément
print(utilisateurs) # renvoie par ordre alphabétique

# autres exemples
button.clicked.connect(lambda: self.afficher_mot('Bonjour'))
```

### LA FONCTION ENUMERATE 
```py
# sans enumerate
liste = ['Bonjour', 'tout', 'le', 'monde']
for i in range(len(liste)):
	if i > 0:
	    print(liste[i])

# avec enumerate
# retourne un objet enumerate
# la fonction enumerate assigne un index à chaque élément d'un itérable
liste = ['Bonjour', 'tout', 'le', 'monde']
for i, mot in enumerate(liste): # plus besoin de range pour récupérer le i
	if i > 0:
		print(mot)

# exemples avancé 1
liste = ['Bonjour', 'tout', 'le', 'monde']
for i, mot in enumerate(liste, 2): # enumerate(liste, valeur index de départ)
	print(i) # 2, 3, 4, etc.
	print(mot) # Bonjour, tout, le, etc.

# exemples avancé 2
dic = {
	   'Utilisateur1': 'John',
	   'Utilisateur2': 'Peter',
	   'Utilisateur3': 'Julie'
	  }

for i, (cle, valeur) in enumerate(dic.items(), 1): # index commence à 1
	print(i, cle, valeur)
    # 1 Utilisateur1 John

# ex. "Phrase en camel case" => "phraseEnCamelCase"
def toCamelCase(phrase):
    mots = phrase.lower().split()

    for i, mot in enumerate(mots):
        if i > 0:
            mots[i] = mot.capitalize()

    return print("".join(mots))

phrase = "Phrase en camel case"
toCamelCase(phrase) # phraseEnCamelCase

# autre solution
phrase = 'Phrase en camel case'
mots = phrase.lower().split(' ')
phrase_convertie = mots[0]
for i, mot in enumerate(mots):
    if i > 0:
        phrase_convertie += mot.capitalize()
print(phrase_convertie)

# solution optimisée
phrase = 'Phrase en camel case'
mots = phrase.lower().split(' ')
phrase_convertie = mots.pop(0) # enlève la valeur 0 du tableau et la renvoie
for mot in mots:
    phrase_convertie += mot.capitalize()
print(phrase_convertie)

# You can also create tuples containing the index and list item using a list. 
# Here is an example:
my_list = ['apple', 'banana', 'grapes', 'pear']
counter_list = list(enumerate(my_list, 1))
print(counter_list)
# Output: [(1, 'apple'), (2, 'banana'), (3, 'grapes'), (4, 'pear')]
```

### FORMATTING
```py
"Hello %s, my name is %s" % ('john', 'mike')  # Hello john, my name is mike
"My name is %s and i'm %d" % ('john', 12)  # My name is john and i'm 12
name = input("who are you? ")
print("hello %s" % (name,))
# %s % variable_a_formater_en_string
# %d % variable_a_formater_en_int

# (!) Note that this kind of string interpolation is deprecated 
# in favor of the more powerful str.format method

# the format method
"Hello {}, my name is {}".format('john', 'mike')
# 'Hello john, my name is mike'.
"{1}, {0}".format('world', 'Hello')
# 'Hello, world'
"{greeting}, {}".format('world', greeting='Hello')
# 'Hello, world'
'%s' % name
"{'s1': 'hello', 's2': 'sibal'}"
'%s' %name['s1']
# 'hello'
```

### <a name="list-comprehension"></a> LES COMPREHENSIONS DE LISTE
```py
# List compréhension : definition & syntaxe
boucle for sur une ligne

[-3, -2, -1, 0, 1, 2, 3] # début
[i for i in liste] # syntaxe
        ↓
[-3, -2, -1, 0, 1, 2, 3] # résultat

[-3, -2, -1, 0, 1, 2, 3]
[expression for i in liste]
    i + 1 # exemple
        ↓
[-2, -1, 0, 1, 2, 3, 4]

[-3, -2, -1, 0, 1, 2, 3]
[expression for i in liste if condition]
    i + 1                       i > 0
    ↓
[2, 3, 4]

[-3, -2, -1, 0, 1, 2, 3]
[expression if condition else expression for i in liste]
    i + 1       i >= 0          i-1
        ↓
[-4, -3, -2, 1, 2, 3, 4]

# Exemples
# 1. doubler les élements d'une liste
# 1.1 avec un for classique
liste = [1, 2, 3, 4, 5]
liste_double = []
for i in liste:
    liste_double.append(i*2)
liste = liste_double[:] # le slice permet de créer une nouvelle liste (nouvel objet dans la mémoire)
# et l'assigner à la variable liste
# sinon liste_double et liste auront le même id (chaque changement sur l'un se répercutera sur l'autre)
# aussi possible avec list(list_double)
# 1.2 avec une compréhension de liste
liste = [1, 2, 3, 4, 5]
liste = [i*2 for i in liste] # [2, 4, 6, 8, 10]
# (pas de variable intermediaire, on assigne directement le résultat à la variable)
# 1.2 avec un if
liste = [1, 2, 3, 4, 5]
liste = [i*2 for i in liste if i % 2 == 0] # [4, 8]
# 1.3 avec un if/else
liste = [1, 2, 3, 4, 5]
liste = [i*2 if i % 2 == 0 else i for i in liste] # [1, 4, 3, 8, 5]

# Map et Filter : l'ancienne façon de faire
liste = [1, 2, 3, 4, 5]

# Avec map
r = map(lambda x: x*x, liste) # applique une fonction sur chaque element de la liste
print(list(r))

# Avec les listes en compréhension
r = [i*i for i in liste]
print(r)

# Avec filter
r = filter(lambda x: x % 2 == 0, liste) # récupère les éléments selon la condition
print(list(r))

# Avec les listes en compréhension
r = [i for i in liste if i % 2 == 0]
print(r)

# boucles multiples
# Imagine that you need a list of coordinate pairs in an x/y plane. 
# Instead of writing nested for loops, like so:
xs = range(10)
ys = range(10)
pairs = 
for x in xs:
    for y in ys:
        pairs.append((x, y))

# You can write the more concise version :
xs = range(10)
ys = range(10)
pairs = [(x, y) for x in xs
                for y in ys]
```

### LES ITERATEURS
```py
# Définition et syntaxe
# itérable = sur lequel on peut faire une boucle
# itérer qqc = passer à travers chacun de ses élément
for i in [1, 2, 3, 4, 5]:
    print(i)
for l in "Udemy":
    print(l)
for key in {'user_1': 'Paul', 'user_2': 'Pierre'}:
    print(key)

iterateur = iter('Udemy')
print(iterateur) # <str_iterator object at 0x000001B466613940>
# iterateur = objet = version itérable de notre objet de base
print(next(iterateur)) # U (on commence à consumer notre itérateur)
print(next(iterateur)) # d (on peut faire : iterateur.__next__())

# Recréer la fonction range avec un iterateur
# iterateur = classe avec des méthodes à définir
# itérateur basique
class custom_range:
    def __init__(self, maximum):
        self.i = 0 
        # self.i = 1 si l'on veut que la liste commence à 1
        # self.max = maximum + 1 pour finir sur le maximum
        # custom_range(10) donnerait 1,2,3... 10
        self.max = maximum

    def __iter__(self): # permet de rendre l'objet itérable
        return self

    def __next__(self):
        if self.i < self.max:
            i = self.i # car i démarre à 0
            self.i += 1
            return i
        else:
            raise StopIteration()

a = custom_range(10)
print(a.__next__()) # 0
print(a.__next__()) # 1
for i in a:
    print(i) # 2, 3, ect, 9.

# Mélanger une chaine de caracteres avec un itérateur
from random import randint

class random_letter:
    def __init__(self, name):
        self.i = 0
        self.max = len(name)
        self.remaining_letters = list(name) # ['B', 'o', 'n', 'j', 'o', 'u', 'r']

    def __iter__(self): # permet de rendre l'objet itérable
        return self

    def __next__(self):
        if self.i < self.max:
            letter = self.remaining_letters.pop(randint(0, len(self.remaining_letters) - 1))
            # pop enlève et retourne un élément selon son index (randint(0, taille du tableau))
            self.i += 1
            return letter
        else:
            raise StopIteration()

name = "Bonjour"
random_name = random_letter(name)
print(random_name) # <__main__.random_letter object at 0x000002A8736B3940>
for letter in random_name:
    print(letter)
# j
# r
# u
# o
# B
# o
# n
# avec une compréhension de liste
random_name_2 = [l for l in random_name]
print(''.join(random_name_2)) # juoBron
```

### LES GENERATEURS
```py
# Définition et syntaxe
# générateur = itérateur simplifié (à préférer pour la simplicité du code)
def exemple_generateur():
    yield 1 # sorte de return
    yield 2 # retourne l'élément et met la fonction en pause
    yield 3 # permet de retourner plusieurs valeurs

generateur = exemple_generateur()
print(type(generateur)) # <class 'generator'>
print(next(generateur)) # retourne 1 (yield 1)
# se met en pause
print(generateur.__next__()) # retourne 2
print(generateur.__next__()) # retourne 3
print(generateur.__next__()) # StopIteration

# Recréer la fonction range avec un générateur
def custom_range(n):
    for i in range(1, n + 1):
        yield i

generateur = custom_range(10)
print(type(generateur)) # <class 'generator'>
for i in generateur:
    print(i)
# 1
# 2
# 3
# 4
# 5
# 6
# 7
# 8
# 9
# 10

# Mélanger une chaine de caractères avec un générateur
from random import randint

def random_letter(name):
    letters = list(name)
    for i in range(len(name)): # pour boucler autant de fois qu'il y a de lettres d'origine
        rand_index = randint(0, len(letters) - 1)
        yield letters.pop(rand_index)

for letter in random_letter("Bonjour"):
    print(letter)

# pour débuguer :
# a = random_letter("Bonjour")
# print(a.__next__())
# print(a.__next__())

mixed_name = "".join([letter for letter in random_letter("Bonjour")])
print(mixed_name.capitalize()) # Uoonbrj
```

### EXPRESSIONS GENERATRICES
```py
# une compréhension de liste :
>>> [2*x for x in range(3)]
[0, 2, 4]
# équivalent en générateur : les expressions génératrices
# même principe, sauf qu'au lieu de renvoyer une liste, 
# une expression génératrice renvoie un générateur :
# il suffit de remplacer les crochets par des parenthèses
>> > gen = (2*x for x in range(3))
>>> gen
<generator object <genexpr> at 0x7fa777055e60>

>>> sum(gen)
6 
```


### OPERATEURS TERNAIRES
```py
# structure conditionnelle sur une ligne

# syntaxe
if condition:
    expression
else: 
    expression
    ↓
expression if condition else expression

if age >= 18: 
    r = "Majeur"
else: r = "Mineur"
        ↓
r = "Majeur" if age >= 18 else "Mineur"

# sans les OT
a = 5
if a > 0:
	a_positif = True
elif a < 0:
	a_positif = False

print(a_positif)

# avec les OT
a = 5
a_positif = True if a > 0 else False
print(a_positif)

age = 20
majeur = True if age >= 18 else False
print(majeur)

# limitations
a = 19

if a >= 18:
	print('Vous etes majeur')
else:
	print('Vous etes mineur')

# Possible avec Python 3.x mais pas avec 2.x
print('Vous etes majeur') if a >= 18 else print('Vous etes mineur')

# Avec Python 2.x
majeur_ou_mineur = 'majeur' if a >= 18 else 'mineur'
print('Vous etes {}'.format(majeur_ou_mineur))

# avant Python 2.5
""" 
Avant la version 2.5 de Python, les opérateurs ternaires étaient inexistants.
Il était cependant possible de faire le même genre d'opération avec une syntaxe cependant plus complexe :
"""
    a = 5
    # associer la condition à un tuple, 
    # le premier élément du Tuple étant retourné si la condition est fausse et 
    # le deuxième élément étant retourné si la condition est vraie
    a_positif = (False, True)[a > 0]
    print(a_positif)

"Cette méthode gérait mal les erreurs :"
    a = 5
    a_positif = (1 / 0, True)[a > 0]
    print(a_positif)
    >>> ZeroDivisionError: integer division or modulo by zero
# cette méthode avec le Tuple exécute les deux expressions à l'intérieur du Tuple, 
# même si la condition ne nécessite pas l'exécution du premier élément du tuple

# Avec les opérateurs ternaires, l'exception ZeroDivisionError ne sera levée que si a est négatif.
    a_positif = True if a > 0 else 1 / 0
```

### LA FONCTION ZIP
```py
# explications
# crée une liste de tuple à partir de un ou plusieurs itérables
[1, 2, 3, 4]    ['un', 'deux', 'trois']
             ↓
[(1, 'un'), (2, 'deux'), (3, 'trois')] # le 4 est ignoré car on se base sur la liste la + courte

[1, 2, 3]   ['un', 'deux', 'trois']   ['Julien', 'Marie']
                        ↓
[(1, 'un', 'Julien'), (2, 'deux', 'Marie')]

# exemples
liste_01 = [1, 2, 3]
liste_02 = ['un', 'deux', 'trois']

# list(zip objet (generator)) pour convertir en liste
combinaison = list(zip(liste_01, liste_02))
print(combinaison)
# [(1, 'un'), (2, 'deux'), (3, 'trois')]


liste_01 = [1, 2, 3, 4]
liste_02 = ['un', 'deux', 'trois']

combinaison = list(zip(liste_01, liste_02))
print(combinaison)
```

### <a name="introspection"></a> L'INTROSPECTION
```py
# - la fonction Help => afficher la doc

# dans le module :
import random
help(random) # général = module
help(random.randint) # précis = fonction du module

# dans la commande :
$ python -i
>>> help
Type help() for interactive help, or help(object) for help about object.
>>> help()
"""
To get a list of available modules, keywords, symbols, or topics, type
"modules", "keywords", "symbols", or "topics".  Each module also comes
with a one-line summary of what it does; to list the modules whose name
or summary contain a given string such as "spam", type "modules spam".
"""
help> "modules" # recherche tous les modules
help> "modules time" # tous les modules sur le mot-clé time
help> "modules timeit" # recherche pour le module timeit
help> "keywords" # mots-clés réservés de Python

# - le module sys, pour inspecter le système d'exploitation

import sys

print(sys.version)
print(sys.version_info.major)
print(sys.version_info.minor)
print(sys.platform)
print(sys.path)
print(sys.getwindowsversion().major)
print(sys.executable)
print(sys.argv)

# - la fonction dir et __doc__

# dir: introspecter tous les attributs et méthodes disponibles sur un objet
import os
from pprint import pprint

pprint(dir()) # éléments contenus dans le scope local
pprint(dir(os)) # méthodes et attributs du module os
# je vois qu'il y a la méthode mkdir
help(os.mkdir) # je vais chercher la doc avec help
# on peut aussi appliquer dir sur des objets Python
pprint(dir([])) # méthodes et attributs de l'objet [] (liste vide)
# on aperçoit notamment la méthode append
pprint(dir("")) # pareil pour un string

# __doc__ permet de récupérer la documentation docstring
print([].append.__doc__) 
# réponse : Append object to the end of the list
# help est un peu plus exhaustif
help([].append)
"""
Help on built-in function append:

append(object, /) method of builtins.list instance
    Append object to the end of the list.
"""

# - la fonction type = savoir quel est le type d'un objet
import os
import json
import pprint
print(type(pprint)) # <class 'module'>
print(type(pprint.pprint)) # <class 'function'>
print(type(type)) # <class 'type'> (tout est objet en Python)

# exemple d'utilisation
# le fichier json contient "False"
# il est dans le même dossier que le fichier présent
fichier = os.path.join(os.path.dirname(__file__), 'variable.json')

with open(fichier, 'r') as f:
	variable = json.load(f) # je récupère le fichier

print(type(variable)) # <class 'str'>
variable = True if variable == 'True' else False
print(type(variable)) # <class 'bool'>

if type(variable) == bool:
	print('La variable est un boolean') # La variable est un boolean
elif type(variable) == str:
	print('La variable est une chaine de caractere')

# - la fonction id = retourne l'adresse en mémoire d'une variable

# exemple : dupliquer une liste de la mauvaise façon
liste_originale = [1, 2, 3, 4]
liste_duplique = liste_originale

liste_originale.append(5)

print(liste_duplique) # elle contient également 5 !

print(id(liste_originale)) # 2167383220872
print(id(liste_duplique)) # 2167383220872
# elles pointent en mémoire vers la même valeur = elles sont identiques

# bonne façon de faire : ajouter un slice
# crée une copie DIFFERENTE de la liste d'origine
liste_duplique_unique = liste_originale[:]

liste_originale.append(6)
print(liste_duplique_unique) # [1, 2, 3, 4, 5], les changements n'ont pas été appliqués
print(id(liste_originale)) # 2167383220872
print(id(liste_duplique)) # 2167383220872
print(id(liste_duplique_unique)) # 2167383719240
```

### <a name="any-et-all"></a> LES FONCTIONS ANY & ALL
```py
# but = vérfier si une ou toutes les variables sont vraies
# syntaxe
# any : au moins un élément dans un itérable est vrai
# all : tous les éléments sont vrais
exemple_any = any([False, False, True, False])
print(exemple_any) # True

exemple_any = any([False, False, False, False])
print(exemple_any) # False

exemple_all = all([True, True, True, True])
print(exemple_all) # True

exemple_all = all([True, False, True, True])
print(exemple_all) # False

# Avec Any
age_invites = [5, 15, 12, 16, 20, 17]

# En France
autorisation = any(a >= 18 for a in age_invites)
# la compréhension de liste renvoie une liste de True et/ou False
print(autorisation) # True

# Aux USA
autorisation = any(a >= 21 for a in age_invites)
print(autorisation) # False

# Avec All
autorisation = all(a >= 18 for a in age_invites)
print(autorisation) # False

age_invites = [19, 20, 22, 41, 18, 25]
autorisation = all(a >= 18 for a in age_invites)
print(autorisation) # True
```

### <a name="args-kwargs"></a> ARGS & KWARGS
```py
# - l'unpacking
import sys
from PySide import QtGui, QtCore

couleur_bouton = (255, 0, 0)
couleur_bouton_dict = {'rouge': 255, 'vert': 0, 'bleu': 0}

class InterfaceBasique(QtGui.QPushButton):
	def __init__(self, text='Clique!'):
		super(InterfaceBasique, self).__init__(text)

        # figuration basique = problème = c'est verbeux
		self.setStyleSheet('background-color: rgb({},{},{})'.format(couleur_bouton[0], 
            couleur_bouton[1], couleur_bouton[2]))
        # avec l'unpacking =  va prendre les valeurs et les associer aux accolades
		self.setStyleSheet('background-color: rgb({},{},{})'.format(*couleur_bouton))
        # avec un dictionnaire = unpacking + explicite
		self.setStyleSheet('background-color: rgb({rouge},{vert},{bleu})'.format(**couleur_bouton_dict))
		self.show()


app = QtGui.QApplication([])
bouton = InterfaceBasique()
bouton.show()
sys.exit(app.exec_())

# - définition et syntaxe

# args : arguments
# kwargs : keyword arguments

# basique et limité à 2 nombres
def addition(a, b):
    return a + b

print(addition(5, 2))

# avec args : arguments illimités et non nommés
def addition_arg(*args):
    # args = un tuple des arguments. ex. (5, 2, 6, 10)
    return sum(args)

print(addition_arg(5, 2, 6, 10))

# exemples approfondis
def liste_invites(invite_vip, *args):
    print("{} est un VIP".format(invite_vip))
    for invite in args:
        print("{} est un invité normal".format(invite))

liste_invites("Paul", "Pierre", "Marie", "Max")
# Paul est un VIP
# Pierre est un invité normal
# Marie est un invité normal
# Max est un invité normal

def liste_invites2(invite_vip, *args, **kwargs):
    print("{} est un VIP".format(invite_vip))
    for invite in args:
        print("{} est un invité normal".format(invite))

    # kwargs est un dictionnaire : {'indesirables': ['Simon', 'Jean', 'Julie']}
    print(kwargs)
    indesirables = kwargs.get('indesirables')
    if indesirables:
        print("Ces invités sont indésirables : {}".format(", ".join(indesirables)))

liste_invites2("Paul", "Pierre", "Marie", "Max", indesirables=["Simon", "Jean", "Julie"])
# Paul est un VIP
# Pierre est un invité normal
# Marie est un invité normal
# Max est un invité normal
# Ces invités sont indésirables: Simon, Jean, Julie

# dans l'autre sens = kwargs dans les arguments
import os

def chemin(dossier, fichier, extension='txt'):
    return os.path.join(dossier, '{}.{}'.format(fichier, extension))

data = {'dossier': 'chemin\du\dossier', 'fichier': 'tutoriel', 'extension': 'py'}
print(chemin(**data)) # chemin\du\dossier\tutoriel.py

data2 = {'dossier': 'chemin\du\dossier', 'fichier': 'tutoriel'}
print(chemin(**data2)) # chemin\du\dossier\tutoriel.txt
```

### EXPRESSIONS REGULIERES

Ressource > https://pythex.org/
```py
# regex : regular expression
# exemple : nombre de téléphone français valide ?
^[0]{1}[1-7]{1}(-[0-9]{2}){4}$
06-12-23-12-23
# 2 choses à savoir : 
# 1) quoi chercher
# 2) combien de fois

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
* https://regex101.com/
* https://regexr.com/


## <a name="erreurs-debutant"></a> 10 ERREURS DU DEBUTANT

### Récupérer une clé inexistant d'un dictionnaire
```py
dic = {'Pierre': 'Serveur',
       'Julien': 'Libraire',
       'Marie': 'Ingenieure'}

prenom = 'Paul'
# Mauvaise façon de faire
profession = dic[prenom] # KeyError: 'Paul'
# Bonne façon de faire
profession = dic.get(prenom)
print(profession) # None
profession = dic.get(prenom, "{} n'est pas dans le registre.".format(prenom))
# dict.get(key, default)
print(profession) # Paul n'est pas dans le registre (exécuté que si erreur)
```

### Utiliser une liste vide comme argument d'une fonction
```py
import random

def generateur_liste(liste=[]):
    # ajout à la liste de 5 nombres aléatoire entre 1 et 100
    liste.extend([random.randint(1, 100) for i in range(5)])
    return liste

# on veut créer 5 listes aléatoires
for i in range(5):
	print(generateur_liste())
# [80, 77, 75, 13, 9]
# [80, 77, 75, 13, 9, 38, 49, 98, 85, 84]
# [80, 77, 75, 13, 9, 38, 49, 98, 85, 84, 83, 17, 32, 51, 7]
# la liste n'est plus aléatoire, elle s'aggrandit !
# on utilise toujours la même liste (passée en argument) en mémoire

# solution
def generateur_liste(liste=None):
    if liste is None:
        liste = [] # redéfinie à chaque fois que l'on exécute la fonction
        # définie seulement dan le scope de la fonction
    liste.extend([random.randint(1, 100) for i in range(5)])
    return liste

for i in range(5):
    print(generateur_liste())
# [50, 18, 26, 13, 43]
# [95, 42, 74, 25, 4]
# [44, 32, 26, 97, 92]
# [26, 54, 4, 80, 89]
# [8, 17, 74, 47, 3]
```

### Mélanger espaces et tabulations

### Récupérer un élément inexistant d'une liste
```py
liste = range(10)

index = 10
print(liste[index]) # IndexError: range object index out of range

# 1ère façon de faire
try:
	r = liste[index]
	print(r)
except IndexError:
	print("L'index {} n'existe pas.".format(index))
    # L'index 10 n'existe pas

# 2ème façon de faire = opérateur ternaire
r = liste[index] if len(liste) > index else None
print(r) # None
```

### Modifier une liste en itérant dedans
```py
# exemple
prenoms = ['Pierre', 'Julien', 'Marie', 'Paul']
for i in range(len(prenoms)):
	if prenoms[i] == 'Julien': # IndexError: list index out of range
		del prenoms[i] # on itère sur un range(4) alors qu'il n'y a plus que 3 éléments

# solution : compréhension de liste
prenoms = ['Pierre', 'Julien', 'Marie', 'Paul']
prenoms_sans_julien = [p for p in prenoms if p != 'Julien']
print(prenoms_sans_julien) # ['Pierre', 'Marie', 'Paul']
```

### Copier une liste
```py
# mauvaise exemple : pointer vers l'ancienne liste
liste = [1, 2, 3]
liste_copie = liste

liste.append(5)

print(liste) # [1, 2, 3, 5]
print(liste_copie) # [1, 2, 3, 5]

print(id(liste)) # 1760289776264
print(id(liste_copie)) # 1760289776264 : ce sont les mêmes listes en mémoire

# bonnes solution :
liste = [1, 2, 3]
liste_copie = liste[:] # copier avec un slice vide
liste_copie = list(liste) # avec la fonction list
liste_copie = liste.copy() # avec la méthode copy

liste.append(5)

print(liste) # [1, 2, 3, 5]
print(liste_copie) # [1, 2, 3]

print(id(liste)) # 1760290274696
print(id(liste_copie)) # 1760290273864
```

### L'égalité avec is et ==
```py
# is vérifie si l'adresse en mémoire est la même
# == vérifie si la valeur des variables est la même
a = 5
b = 5
print(a == b) # True
# Juste fonctionnel de -5 à 256
# sont assigné à des objets internes
# qui ont la même adresse en mémoire pour optimisation
print(a is b) # True
print(id(a)) # 140708880868112
print(id(b)) # 140708880868112

# deux integers semblables pointent vers le même objet Python
a = -2364
b = -2364
print(a == b) # True
print(a is b) # True (!)
print(id(a)) # 1797946717680
print(id(b)) # 1797946717680

# pour une opération, on crée un nouvel objet combinant les 2 objets,
# et le résultat est différent :
>>> x = 1000
>>> y = 499 + 501 # objet1 + objet2 = objet3
>>> x is y
False

# si l'opération concerne des nombres entre -5 et 256, pas de soucis
# puisqu'ils ont tous le même objet en référence, qui pointe sur la même adresse :
>>> x = 20
>>> y = 19 + 1
>>> x is y
True

a = [1, 2, 3, 4, 5]
b = [1, 2, 3, 4, 5]
print(a == b) # True
print(a is b) # False
print(id(a)) # 2269659947656
print(id(b)) # 2269659947720

a = [1, 2, 3, 4, 5]
b = a
print(a == b) # True
print(a is b) # True 
print(id(a)) # 2101972066952
print(id(b)) # 2101972066952

# pour les strings, les objets internes existent aussi :
# Strings that are less than 20 characters and contain ASCII letters, digits, or underscores
# will be interned
>>> s1 = "realpython"
>>> id(s1)
140696485006960
>>> s2 = "realpython"
>>> id(s2)
140696485006960
>>> s1 is s2
True
>>> s1 = "Real Python!" # à cause du "!"
>>> s2 = "Real Python!"
>>> s1 is s2
False
```

### Utiliser des noms de variables réservés

### from module import * (tout importer)
```py
path = 'C:/mon_fichier.txt'

from os import *

print(path) # import avec * = pas besoin de préfixer la fonction avec le nom du module
# <module 'ntpath' from 'C:\\Program Files\\Python37\\lib\\ntpath.py'>
# mais du coup, ici, on print la fonction path, et non la variable !

# il est préférable d'importer le module directement
# pour éviter tout conflit
import os
print(path) # print la variable
print(os.path) # print la fonction path du module
```

### Les erreurs de scope
```py
variable = 'Bonjour'

def ma_fonction():
	print(variable) # pas de soucis
	variable += ' tout le monde'
    # on fait une opération sur la variable
    # elle devient donc considérée comme locale
    # Retourne une erreur car 'variable' n'a
	# jamais été déclarée à l'intérieur de 
	# la fonction

ma_fonction()
```

## ASTUCES

### Trouver le chemin vers un module
```py
import os
# où se trouve le module sur le disque ?
print(os.__file__) # C:\Program Files\Python37\lib\os.py
# quel est le chemin de mon script actuel ?
print(__file__) # d:/Documents/WEB DEV/PYTHON/exercices.py
# et le dossier associé ?
dossier_courant = os.path.dirname(__file__)
print(dossier_courant) # d:/Documents/WEB DEV/PYTHON
```

### La fonction join
```py
tags_photo = ['vacances', 'italie', 'juin', '2018']

nom_fichier = '_'.join(tags_photo)
print(nom_fichier) # vacances_italie_juin_2018

# erreur levée si on rajoute un élément de type None
tags_photo2 = ['vacances', 'italie', 'juin', '2018', None]
# solution : la fonction filter
# avec None en 1er paramètre, il retourne que les éléments True
nom_fichier2 = '_'.join(filter(None, tags_photo2))
# équivalent de '_'.join([i for i in tags_photo2 if i])
print(nom_fichier2) # vacances_italie_juin_2018
```

### Chaîner les comparateurs
```py
n = 25
if 1 < n < 50:
    print("Le nombre est compris entre 1 et 50.")

## -- For Else
invites = ['Julien', 'Marie', 'Pierre', 'Pascal']

for invite in invites:
    if invite == 'Pascal':
        print("Pascal a déjà été invité !")
        break # sort de la boucle et n'atteint pas le else
# on a épuisé la boucle
else:
    print("Pascal n'a pas été invité !")
```

### Ordoner le code : couper-coller dans VSCode

### Inverser les clés et valeurs d'un dictionnaire
```py
from pprint import pprint

# accéder à la définition longue via un raccourci
LONG_NAMES = {'anm_scn': 'Animation Scene',
              'anm_out': 'Animation Publish',
              'sim_scn': 'Simulation Scene',
              'sim_out': 'Simulation Publish'}

pprint(list(zip(LONG_NAMES.values(), LONG_NAMES.keys())))
# zip(values avant les clés, qui va crée une liste de tuple), 
# puis on en fait une liste :
# [('Animation Scene', 'anm_scn'),
#  ('Animation Publish', 'anm_out'),
#  ('Simulation Scene', 'sim_scn'),
#  ('Simulation Publish', 'sim_out')]
SHORT_NAMES = dict(zip(LONG_NAMES.values(), LONG_NAMES.keys()))
# dict(notre liste de tuple)
pprint(SHORT_NAMES)
# {'Animation Publish': 'anm_out',
#  'Animation Scene': 'anm_scn',
#  'Simulation Publish': 'sim_out',
#  'Simulation Scene': 'sim_scn'}
print(LONG_NAMES.get('anm_scn')) # Animation Scene
print(SHORT_NAMES.get('Animation Scene')) # anm_scn
```

### Aplatir une liste et enlever les doublons
```py
# faire une seule liste à partir de plusieurs listes
liste = [[1, 7, 3], [3, 4], [12, 1, 4, 8], [1, 3, 3]]

liste_aplatie = sum(liste, [])
# sum(liste, nombre de départ de la sommme (0 par défaut))
# ici, 0 est remplacé par [], et tous les nombres viennent s'y ajouter
print(liste_aplatie) # [1, 7, 3, 3, 4, 12, 1, 4, 8, 1, 3, 3] 

liste_aplatie_sans_doublons = sorted(list(set(liste_aplatie)))
# liste aplatie => set => liste => ordonnée
print(liste_aplatie_sans_doublons) # [1, 3, 4, 7, 8, 12]
```  

### Enlever certains éléments d'une liste
```py
prenom = "Pierre"
nom = "Dupont"
id_membre = "142352"

liste = [id_membre, nom, prenom]
nom_complet = '_'.join(liste) # s'attend à que des éléments True
print(nom_complet) # 142352_Dupont_Pierre

prenom2 = "Pierre"
nom2 = "Dupont"
id_membre2 = None

# liste2 = [id_membre2, nom2, prenom2]
# nom_complet2 = '_'.join(liste2) 
# # TypeError: sequence item 0: expected str instance, NoneType found
# print(nom_complet2)

# solution : trier les éléments de la liste
# avec filter
# retourne tous les éléments autres que None
liste3 = filter(None, [id_membre2, nom2, prenom2])
nom_complet3 = '_'.join(liste3)
print(nom_complet3) # Dupont_Pierre
# avec une compréhension de liste
liste4 = [e for e in [id_membre2, nom2, prenom2] if e]
nom_complet4 = '_'.join(liste4)
print(nom_complet4) # Dupont_Pierre 
```

### Utiliser les defaultdict et OrderedDict
```py
from collections import OrderedDict
from collections import defaultdict

# but : trouver le nombre de fois qu'une lettre apparait dans un string
# et associer la lettre à son nombre d'occurences

mot = 'anticonstitutionnellement'
# Retourne une erreur car la clé n'existe pas
d = {}
for lettre in mot:
	d[lettre] += 1

print(d.items())


# Fonctionne mais nécessite une structure conditionnelle
mot = 'anticonstitutionnellement'

d = {}
for lettre in mot:
	if not d.get(lettre): # si lettre non présente dans le dico
	    d[lettre] = 1
	else:
	    d[lettre] += 1

print(d.items())
# dict_items([('a', 1), ('n', 5), ('t', 5), ('i', 3), ('c', 1), ('o', 2), ('s', 1), 
# ('u', 1), ('e', 3), ('l', 2), ('m', 1)])

# Code allégé grâce au defaultdict()
mot = 'anticonstitutionnellement'
# quelle est le type de valeur attendue ?
# int = valeur crée par défaut si une clé n'existe pas
# si la lettre n'existe pas dans les clés,
# il va initialiser une valeur par défaut
# donc integer par défaut, soit 0
d = defaultdict(int)
for lettre in mot:
    d[lettre] += 1

print(d.items())
# dict_items([('a', 1), ('n', 5), ('t', 5), ('i', 3), ('c', 1), ('o', 2), 
# ('s', 1), ('u', 1), ('e', 3), ('l', 2), ('m', 1)])
 
# OrderedDict, pour faire des dictionnaires ordonnés
# depuis Python 3.7, le simple dictionnaire garde l'ordre

mon_dict = OrderedDict()
# mon_dict = {} = même effet pour Python 3.7+

mon_dict['Un'] = 'Pierre'
mon_dict['Deux'] = 'Paul'
mon_dict['Trois'] = 'Marie'
mon_dict['Quatre'] = 'Jacques'
mon_dict['Cinq'] = 'Julie'

print(mon_dict.items())
# dict_items([('Un', 'Pierre'), ('Deux', 'Paul'), ('Trois', 'Marie'), 
# ('Quatre', 'Jacques'), ('Cinq', 'Julie')])
```

### Pretty Print avec le module pprint
```py
# but : afficher des données longues de façon lisible
from pprint import pprint # ++
pprint(variable, indent=2)
```

### Utilisation avancée de la fonction format
```py
# Un site web qui répertorie toutes les utilisations avancées de la fonction format :
https://pyformat.info/ 
# exemples
text = "{} {}".format("Pierre", "Dupont")
print(text)
# Pierre Dupont

text = "{0} {1}".format("Pierre", "Dupont")
print(text)
# Pierre Dupont

text = "{1} {0}".format("Pierre", "Dupont")
print(text)
# Dupont Pierre

text = "{0} {0}".format("Pierre", "Dupont")
print(text)
# Pierre Pierre

text = "{} a {} ans".format("Pierre", 18)
print(text)
# Pierre a 18 ans

# espace réservé pour 10 caractères
# les remplit (à la fin) d'espace si vide
text = "{:10} {}".format("Début", "Fin")
print(text)
# Début      Fin

# espace réservé pour 10 caractères
# les remplit (au début) d'espace si vide
text = "{:>10} {}".format("Début", "Fin")
print(text)
#      Début Fin

# espace réservé pour 10 caractères
# les remplit (au début) avec "=" si vide
text = "{} {:=>10}".format("Début", " Fin")
print(text)
# Début ====== Fin

# espace réservé pour 25 caractères
# les remplit (au début) avec "+" si vide
# avant et après grâce au caractère ^
text = "{:+^25}".format(" Partie 01 ")
print(text)
# +++++++ Partie 01 +++++++

# tronquer le résultat
# :.nombre_caractères_voulus
text = "{:.3}".format("Pierre")
print(text)
# Pie

text = "{:.3}".format(2.51458)
print(text)
# 2.51

user = {'prenom': 'Pierre', 'nom': 'Dupont'}
text = "Bonjour, je m'appelle {d[prenom]} {d[nom]}".format(d=user)
print(text)
# Bonjour, je m'appelle Pierre Dupont

class MaVoiture(object):
    def __init__(self):
        self.couleur = "rouge"
        self.marque = "Mercedes"

text = "J'ai une {o.marque} de couleur {o.couleur}".format(o=MaVoiture())
print(text)
# J'ai une Mercedes de couleur rouge
```

### faire un join avec la fonction print avec Python 3+
```py
rangees = [1, None, 3, 4, 5, 12, 4, 3, 8]
# sep : string inserted between values
print(*rangees, sep=", ")
# 1, None, 3, 4, 5, 12, 4, 3, 8
# équivalent de print(", ".join([str(r) for r in rangees]))
```

### Eviter trop de niveaux de tabulation
```py
import os 

# trop d'imbrications
def verifier_fichier(fichier):
    if fichier.endswith(".py"):
        if len(fichier) > 3:
            if fichier.startswith("C:/"):
                return True 

print(verifier_fichier("C:/mon_programme/test.py"))

# solution : instructions chaînées
def verifier_fichier2(fichier):
    if fichier.startswith("C:/") and fichier.endswith(".py") and len(fichier) > 3:
        return True
    return False

print(verifier_fichier2("C:/mon_programme/test.py"))

# exemple 2

# le code décideur est identé, n'est pas au premier niveau de tabulation
def recuperer_extension(fichier):
    if fichier.startswith("C:/"):
        fichier, extension = os.path.splitext(fichier)
        extension = extension.replace(".", "")
        return extension
    return None

print(recuperer_extension("C:/mon_programme/test.py"))
# py

# bonne solution : inverser la condition
# mettre le moins conséquent au début
# mettre le code décideur au 1er niveau d'indentation
def recuperer_extension2(fichier):
    if not fichier.startswith("C:/"):
        return None

    fichier, extension = os.path.splitext(fichier)
    extension = extension.replace(".", "")
    return extension

print(recuperer_extension("C:/mon_programme/test.py")) 
# py
```

### Chronométrer des actions de module
```py
> time pip --version
0.34 seconds

> time virtualenv -p (which python3) venv
6.24 seconds

> time pytest  # in an EMPTY directory
0.32 seconds

> time pip install pytest  # already installed!!!
0.85 seconds

# https://kodare.net/2020/05/19/python-is-slow-does-not-have-to-be.html
```


## MES ASTUCES

### Find day by the given date in French and generate a calendar
```py
from calendar import monthrange
from collections import namedtuple
import locale
import datetime
import calendar

my_locale = locale.getlocale()
print(my_locale)

# ◘ Initialiser la langue locale
locale.setlocale(locale.LC_ALL, '')
# An empty string specifies the user’s default settings
help(locale.setlocale)

# ◘ Récupérer le jour d'un datetime en français
now = datetime.datetime.now()
# future = datetime.datetime(2022, 3, 24)
print(f"{now.strftime('%A').capitalize()} de la semaine n° {int(now.strftime('%W')) + 1}")
# Jeudi de la semaine n° 19

# ◘ Créer des calendrier avec le module calendar
# import calendar
my_calendar = calendar.TextCalendar(calendar.SUNDAY)
calendar_2022 = my_calendar.formatyear(2022)
print(calendar_2022)
#      janvier                   février                     mars
# di lu ma me je ve sa      di lu ma me je ve sa      di lu ma me je ve sa
#                    1             1  2  3  4  5             1  2  3  4  5
#  2  3  4  5  6  7  8       6  7  8  9 10 11 12       6  7  8  9 10 11 12
#  9 10 11 12 13 14 15      13 14 15 16 17 18 19      13 14 15 16 17 18 19
# 16 17 18 19 20 21 22      20 21 22 23 24 25 26      20 21 22 23 24 25 26
# 23 24 25 26 27 28 29      27 28                     27 28 29 30 31
# 30 31

# ◘ Génère un calendrier de datetime
generate_2022 = calendar.Calendar(calendar.MONDAY).yeardatescalendar(2022, 1)
# Calendar(firstweekday : 0 or calendar.MONDAY, 6 or calendar.SUNDAY, ect.)
# yeardatescalendar(YEAR, number of month / row)
first_month_2022 = generate_2022[0][0]
first_week_2022 = generate_2022[0][0][0]
first_day_2022 = generate_2022[0][0][0][0] # 2021-12-27
print(first_day_2022)
# Return the data for the specified year ready for formatting. 
# The return value is a list of month rows. 
# Each month row contains up to width months (defaulting to 3). 
# Each month contains between 4 and 6 weeks and each week contains 1–7 days. 
# Days are datetime.date objects.
# [[[[datetime.date(2021, 12, 27), datetime.date(2021, 12, 28), ...]]]]

# ◘ Génère toutes les dates d'une année (1er Janvier au 31 Décembre), associée à leur jour
# from calendar import monthrange
# from collections import namedtuple
Date = namedtuple("Date", ["datetime", "day"])

def all_dates_in_year(year):
    for month in range(1, 13):  # for month in 12 months
        for day in range(1, monthrange(year, month)[1] + 1):
            # for day in number of days in month
            # monthrange(year, month)[1] = number of days in month
            # monthrange(year, month)[0] = weekday of first day of the month
            yield Date(datetime.datetime(year, month, day), 
                datetime.datetime(year, month, day).strftime('%A').capitalize())

for date in all_dates_in_year(2020):
    print(date)
    # Date(datetime=datetime.datetime(2020, 1, 1, 0, 0), day='Mercredi')

# ◘ Génère toutes les dates d'une année, avec semaines complètes
# associée à une date en abréviation
# commence le 1er Lundi, si Lundi est choisi comme premier jour de l'année
abr_days = {
    'Lundi': 'L',
    'Mardi': 'M',
    'Mercredi': 'Me',
    'Jeudi': 'J',
    'Vendredi': 'V',
    'Samedi': 'S',
    'Dimanche': 'D'
}

def full_calendar(year):
    new_calendar = calendar.Calendar(calendar.MONDAY)
    for month in range(1, 13):
        for date in new_calendar.itermonthdates(year, month):
            yield (date, abr_days.get(date.strftime('%A').capitalize()))
            # (datetime.date(2019, 12, 30), abr_days.get('Lundi'))

for day in full_calendar(2020):
    print(day)
    # (datetime.date(2019, 12, 30), 'L')

# https://docs.python.org/3/library/calendar.html
# https://www.guru99.com/calendar-in-python.html
# https://ispycode.com/Python/Calendar/Iterate-Days-In-A-Month
# https://techoverflow.net/2019/05/16/how-to-iterate-all-days-of-year-using-python/
# https://realpython.com/python-time-module/
```

## LIBRAIRIES

* Matplotlib = faire des graphiques. 
* Numpy = manipuler des données, et plus précisément des séries de nombres. 
* Pandas = introduit un objet très pratique appelé le Dataframe. 
Ce dernier s'apparente beaucoup à ce qu'il est possible de faire dans des 
logiciels de type tableur: des tableaux avec plein de nombres dedans !


## <a name="python-html"></a> PYTHON & HTML

1. Il faut utiliser la CGI, une interface qui va servir d'intermédiaire' entre le serveur 
et le programme Python. C'est une vieille interface, prise en compte par la plupart des serveurs web.
```py
"""
L'interface CGI (pour Common Gateway Interface) est un composant de la plupart
des logiciels serveurs de pages web. 
Il s'agit d'une passerelle qui leur permet de communiquer avec d'autres logiciels 
tournant sur le même ordinateur. 
Avec CGI, vous pouvez écrire des scripts dans différents langages (Perl, C, Tcl, PHP, Python ...).
"""
```

* Pour utiliser la CGI il faut un serveur
* Ensuite, il faut mettre ce code dans le .htaccess 
situé à la racine du serveur pour faire fonctionner la CGI:
```apache
    AddHandler cgi-script .py
    Options +ExecCGI
```
* Puis par exemple tu peux créer ce fichier python (qui contient donc un formulaire) 
où ont peut mettre les algorithmes souhaités:
```py
#!/usr/bin/python
import cgi
 
print 'Content-type: text/html'
 
print
 
formulaire = cgi.FieldStorage()
 
if formulaire.getvalue('nom') == None:
 
    print '''
 
Veuillez remplir le formulaire :
 
<form action="formulaire.py" method="post">
 
<input type="text" name="nom" />
 
<input type="submit"></form>
 
    '''
 
else:
 
    print 'Ainsi, vous vous appelez',cgi.escape(formulaire.getvalue('nom')),' ?'<br><br>
```
* Ressources :
https://docs.python.org/2/howto/webservers.html
https://python.developpez.com/cours/TutoSwinnen/?page=Chapitre17
http://pub.phyks.me/sdz/sdz/apercu-de-la-cgi-avec-python.html
https://fr.wikibooks.org/wiki/Programmation_Python/L%27interface_CGI
