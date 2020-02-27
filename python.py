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
racine = math.sqrt(16) #calculer la racine carrée
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
False, 0, "" # false
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