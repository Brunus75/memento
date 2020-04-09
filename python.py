## ---------- MEMENTO PYTHON ---------- ##


## -- INSTALLATION -- #

https://www.python.org/downloads/
https://www.python.org/downloads/windows/
# Windows x86-64 executable installer
# Installation avec options, 
# install for all users, associate files, create shortcuts, 
# add Python to environment variables, precompile
# version 3.7.3 pour le cours Udemy
python -i (interactif) sur Git Bash

Télécharger cmder (émulateur de terminal)
https://cmder.net/
# pour éviter tout probleme, NE PAS placer le dossier extrait dans C:\Programmes
# le placer à la racine ex. C:\cmder
utiliser l'interface' de Bash
lancer python : python
lancer python en mode interactive : python -i
lancer une version précise de python : py -3.7
exit() pour en sortir


## -- RACCOURCIS VS CODE -- ##
Ctrl + : => commente une ligne/plusieurs lignes
Ctrl + Shift + : => commente plusieurs lignes
Ctrl + Shift + P : => montre les commandes disponibles (SQLite, par ex.)


## -- EXTENSIONS VS CODE -- ##
Python
autoDocstring
SQLite


## -- OUTILS -- ##
GitBash
Cmder
DB Browser


## -- SPECIFICITES PYTHON -- ##
* Le point-virgule n'est JAMAIS utilisé en Python'
* None # équivalent de Null
* un package peut parfois consister en une seul fichier (on parle donc dans ce cas de module), 
et le terme librairie quant à lui est souvent utilisé pour parler de packages
* rien n'est' privé en python, tout est public


## -- LEXIQUE -- ##

# - *args et **kwargs
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


## -- LE TERMINAL -- ##

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


## -- PREMIER SCRIPT
Cmder > print("Hello World !");

## -- PYTHON et VISUAL CODE
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

## -- SPECIFICITES -- ##
* Avec Python3, input renvoie systematiquement une "chaine de caractères"


## -- LES BASES -- ##

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


## -- LES OPERATEURS -- ##

+ - * /
print(6 / 2) # 3.0
print("Python" * 3)  # PythonPythonPython
% # modulo, récupère le reste de la division
print(10 % 2) # 0, car 2x5 = 10 tout round
print(6 % 4) # 2, car 4x1 = 4, il reste 2 pour arriver à 6
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


## -- LES STRUCTURES CONDITIONNELLES -- ##

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


## -- MODULES ET FONCTIONS -- ##

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


## -- LES LISTES -- ##

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

## -- LES SETS -- ##

liste qui n'accepte' que des valeurs uniques
set_exemple = {'FRA', 'GER', 'AUS', 'US'}


## -- METHODES ET FONCTIONS UTILES -- ##

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


## -- LES BOUCLES -- ##

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


## -- LES FICHIERS -- ## 

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


## -- LES DICTIONNAIRES -- ## 

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


## -- LA GESTION D'ERREURS AVEC LES EXCEPTIONS -- ##

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


## -- LES FONCTIONS -- ##

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


## -- LES MODULES -- ##

# fichier sur le disque qui contient du code Python
import random # import de module, méthode à privilégier
random.uniform(2,5) # module.function

from random import uniform # from module import function
uniform(2,5) # utilisation de la fonction seule
# problème : on peut écraser la fonction en créer une variable du même nom

# créer son propre module
++ mon_module.py 
++ script.py # les deux fichiers sont au même niveau

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


## -- PACKAGES -- ##

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


## -- DOCUMENTER SON CODE -- ##

# commentaire une ligne
"""
commentaire
plusieurs
lignes
"""
# docstring : documentation string : commentaires récupérés sous forme de documentation
# servent à documenter notre code à certains endroits spécifiques, 
# comme à l'intérieur d'une fonction ou au début d'un module.

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


## -- LE LOGGING -- ##

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


## -- INSTALLER DES PACKAGES SUPPLEMENTAIRES AVEC PIP -- ## 

# pip (Pip Installs Packages)
# petit utilitaire qu'on appelle 'gestionnaire de paquets' 
# et qui nous permet d'installer des 'paquets' (packages en anglais)
# On peut donc l'utiliser pour télécharger facilement en ligne de commande des packages
#  qui sont hébergés sur le site http://pypi.org

Ouvrir GitBash (ou Cmder)
taper pip3.7 (c'est un alias') # sinon utiliser le chemin .../Python/Scripts/pip3.7.exe

# Chercher des packages sur PyPI et avec pip
https: // pypi.org/search 
pip3.7 search requête(nom du module ou description)

# mettre à jour pip sur Windows
pip3.7 install --upgrade --user pip # NE PAS UTILISER CETTE SYNTAXE! 
# erreur
python -m pip lescriptaxecuter
python -m pip --version
# solution
To fix the PATH run Command Prompt as administrator:
pip install --upgrade --force-reinstall --ignore-installed pip

# installer un package avec pip
pip3.7 install requests
sudo pip3.7 install requests # si l'OS refuse de l'installer

# lister les packages avec pip
pip3.7 'list' # sans les apostrophes 

# désinstaller un package avec pip
pip3.7 uninstall nomDuPackage


## -- LES ENVIRONNEMENTS VIRTUELS -- ##

# autre version de Python, qui va être isolée du python installé sur l'ordinateur
# on crée généralement un environnement virtuel par projet 

# créer un environnement virtuel
# se placer dans le dossier principal
py -3.7 -m venv env # -m pour module
aller dans Scripts/
dans le terminal : source activate
on est dans l'environnement virtuel'
which pip pour vérifier si on est dans un environnement virtuel
deactivate pour en sortir

# VS Code et les environnements virtuels
VS Code gère les environnements virtuels
il suffit de lancer le projet dans VS Code
se placer dans le projet + taper : code . dans git bash
ou copier-glisser le projet sur l'icône' VS du bureau


## -- L'ORIENTÉ OBJET -- (partie 1) ##

# avec Python, tout est un objet
# avantages : organiser notre code, éviter les répétitions

# créer une classe
class Voiture:
    marque = "Lamborghini" # attribut
    couleur = "rouge"

print(Voiture.marque, Voiture.couleur) # Lamborghini rouge

# créer des instances
voiture_01 = Voiture()
print(voiture_01.marque) # Lamborghini

# attributs de classe et attributs d'instance
Voiture.marque = "Porsche" # modification de l'attribut de classe (se répercute sur toutes les instances)
print(Voiture.marque, voiture_01.marque) # Porsche Porsche
voiture_01.marque = "Fiat Panda" # modification de l'attribut d'instance (modification individuelle)
print(voiture_01.marque) # Fiat Panda

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


## -- REECRITURE DE LA LISTE DE COURSE EN POO -- ##

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


## -- L'ORIENTÉ OBJET -- (partie 2) ##

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

# l'héritage
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

# le méthodes privées
Rappel : rien n'est' privé en Python 
Il y a une convention pour les méthodes privées
class Classe:
    def _methode_privee(self):
        print("Je suis une méthode privée !")


## -- LES BASES DE DONNEES -- ##

# SQL
* fichiers non modifiables directement
* gestion de données complexes
# JSON
* fichiers modifiables directement
* gestion difficile de données complexes 
* utilisé pour stocker les paramètres logiciels
* utilisé pour stocker quelques valeurs

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

# ouvrir une Base de données avec DB Browser
https://sqlitebrowser.org/


## - POSTGRES

# Ressources
https://www.youtube.com/watch?v=2PDkXviEMD0
https://www.postgresqltutorial.com/postgresql-python/
https://pynative.com/python-postgresql-tutorial/

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


## -- ARCHITECTURE -- ##

projet/
    app/
        app.py
    env/
    README.md


## -- CREER UNE APP -- ##

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


## -- PROJET CONVERTISSEUR DE DEVISES avec PYSIDE -- ## 

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


## -- PROJET CINE CLUB avec PYSIDE et JSON (part.1 : en API) -- ##

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


## -- PROJET CINE CLUB avec PYSIDE et JSON (part.2 : avec l'interface graphique Pyside) -- ##

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


## ---------- PYTHON AVANCÉ ---------- ##

## -- OBJETS MUABLES & IMMUABLES -- ##

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


## -- LES FONCTIONS ANONYMES -- ##

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


## -- LA FONCTION ENUMERATE -- ## 

# sans enumerate
liste = ['Bonjour', 'tout', 'le', 'monde']
for i in range(len(liste)):
	if i > 0:
	    print(liste[i])

# avec enumerate
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


## -- FORMATTING -- ##

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


## ---------- PYTHON & HTML ---------- ##

1. Il faut utiliser la CGI, une interface qui va servir d'intermédiaire' entre le serveur 
et le programme Python. C'est' une vieille interface, prise en compte par la plupart des serveurs web.

"""
L'interface CGI (pour Common Gateway Interface) est un composant de la plupart
des logiciels serveurs de pages web. 
Il s'agit d'une passerelle qui leur permet de communiquer avec d'autres logiciels 
tournant sur le même ordinateur. 
Avec CGI, vous pouvez écrire des scripts dans différents langages (Perl, C, Tcl, PHP, Python ...).
"""

* Pour utiliser la CGI il faut un serveur
* Ensuite, il faut mettre ce code dans le .htaccess 
situé à la racine du serveur pour faire fonctionner la CGI:
    AddHandler cgi-script .py
    Options +ExecCGI
* Puis par exemple tu peux créer ce fichier python (qui contient donc un formulaire) 
où ont peut mettre les algorithmes souhaités:
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

# Ressources
https://docs.python.org/2/howto/webservers.html
https://python.developpez.com/cours/TutoSwinnen/?page=Chapitre17
http://pub.phyks.me/sdz/sdz/apercu-de-la-cgi-avec-python.html
https://fr.wikibooks.org/wiki/Programmation_Python/L%27interface_CGI
