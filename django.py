## ---------- MEMENTO DJANGO ---------- ##

## -- GITHUB -- ##

le fichier settings.py renferme de nombreuses informations privées
créer settings.py.dist ou settings_public.py
créer un gitignore à la racine du projet
un gitignore exhaustif : # https://github.com/github/gitignore/blob/master/Python.gitignore
créer son gitignore:  # http://gitignore.io/api/django


## -- BONS PLANS -- ##

django-shortcuts: https://pypi.org/project/django-shortcuts/
python manage.py makemigrations
python manage.py migrate
python manage.py runserver


## -- INSTALLATION -- ##

ouvrir en Administrateur
pip install Django==2.2 

# vérifier si l'install s'est bien passé
ouvrir une nouvelle fenêtre
python -i
>>> import django
>>> django.get_version()
'2.2'


## -- SQLITE -- ##

# visualiser une BDD dans VS Code
extension SQLite
Ctrl Shift P
SQLite Open Database
SQLite explorer se rajoute en bas à gauche
Show Table => execute commande SQL pour afficher la table


## -- DJANGO -- ##

Architecture MVT: Modèle-Vue-Template
Django gère de façon autonome la réception des requêtes 
et l’envoi des réponses au client (partie contrôleur)
Chaque site web conçu avec Django est considéré comme un projet, composé de plusieurs applications. 
Une application consiste en un dossier contenant plusieurs fichiers de code
chaque bloc du site web est isolé dans un dossier avec ses vues, ses modèles et ses schémas d’URL
Ex. d'applications' : un forum, une galerie de photos ; modules réutilisables


## -- GESTION DE PROJET -- ##

# Création de projet
outil de commande Django : django-admin
se déplacer dans le dossier où le projet sera créé
django-admin startproject nom_projet

crepes_bretonnes/
├── crepes_bretonnes
│   ├── __init__.py # non modifiable
│   ├── settings.py # configuration
│   ├── urls.py # routing
│   └── wsgi.py # non modifiable, relie le projet à un serveur web, pour le mettre en production
└── manage.py # non modifiable : raccourci de django-admin

# lancer le serveur de développement
python manage.py runserver

# les autres commandes
python manage.py help

## Configuration avec settings.py

# utiliser une base de données autre que SQLite
# ex. MySQL
DATABASES = {
    'default': {
        # Backends disponibles : 'postgresql', 'mysql', 'sqlite3' et 'oracle'.
        'ENGINE': 'django.db.backends.mysql',
        'NAME': 'crepes_bretonnes', # Nom de la base de données
        'USER': '<nom d\'utilisateur>',
        'PASSWORD': '<mot de passe MySQL>',
        # Utile si votre base de données est sur une autre machine
        'HOST': '127.0.0.1',
        # ... et si elle utilise un autre port que celui par défaut
        'PORT': '3306',
    }
}

# changer la langue et le fuseau horaire
# Langage utilisé au sein de Django, pour afficher les messages
# d'information et d'erreurs notamment
LANGUAGE_CODE = 'fr-FR'
# Fuseau horaire, pour l'enregistrement et l'affichage des dates
# Laissez UTC dans le cas de l'Europe de l'Ouest, c'est notre fuseau ;)
TIME_ZONE = 'UTC'

# Création d'une application
Un projet : plusieurs applications
python manage.py startapp nom_application

crepes_bretonnes/
├── blog # application
│   ├── admin.py # afficher/modifier les modèles de l'administration
│   ├── apps.py # configurer propriétés (ex. nom)
│   ├── __init__.py
│   ├── migrations # modifications de notre BDD
│   │   └── __init__.py
│   ├── models.py # les modèles
│   ├── tests.py # les tests unitaires
│   └── views.py # les vues
├── crepes_bretonnes
│   ├── __init__.py
│   ├── settings.py
│   ├── urls.py
│   └── wsgi.py
└── manage.py

# ajouter l'application au projet 
# settings.py 
INSTALLED_APPS = [
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
    'blog', # ++
]


## -- LES BASE DE DONNEES -- ##

# LES SGBD
SQLite3 pour le développement, MySQL ou PostgreSQL en production

# ORM
Lorsque vous créez un modèle dans votre application Django, 
le framework va automatiquement créer une table adaptée dans la base de données 
qui permettra d’enregistrer les données relatives au modèle

class Article(models.Model):
    titre = models.CharField(max_length=100)
    auteur = models.CharField(max_length=42)
    contenu = models.TextField(null=True)
    date = models.DateTimeField(default=timezone.now, verbose_name="Date de parution")

À partir de ce modèle, Django va créer une table blog_article
dont les champs seront titre, auteur, contenu  et date.

La manipulation de données est tout aussi simple, puisque le code suivant…
Article.objects.create(titre="Bonjour", auteur="Maxime", contenu="Salut")
… créera une nouvelle entrée dans la base de données.

De la même façon, il est possible d’obtenir toutes les entrées de la table. Ainsi le code suivant…
Article.objects.all()
… renverra des instances d’Article, une pour chaque entrée dans la table

Toute manipulation des données dans la base se fait depuis des objets Python
Cela nous donne également la possibilité de migrer d’un système de base de données 
à un autre sans toucher à notre code

L’ORM n’est ni un langage ni un pont entre votre code et la base de données, 
mais une véritable couche d’abstraction. 
Cette couche permet de rendre invisible la gestion de la base de données dans votre code, 
et ainsi de passer de MySQL à PostgreSQL sans soucis par exemple. 
Cette abstraction permet également de manipuler des objets, 
ce qui est plus pratique la majorité du temps.


## -- ORGANISER SES VUES -- ##

## - La gestion des vues

chaque application compte son views.py
# application/views.py
# exemple temporaire
from django.http import HttpResponse ## la classe HttpResponse permet de retourner une reponse
# depuis un string
from django.shortcuts import render

def home(request): # paramètre request : instance de HttpResponse (contient des infos sur
    # la méthode de requête, les données, ect.)
    """ Exemple de page non valide au niveau HTML pour que l'exemple soit concis """
    return HttpResponse("""
        <h1>Bienvenue sur mon blog !</h1>
        <p>Les crêpes bretonnes ça tue des mouettes en plein vol !</p>
    """)

Toutes les fonctions prendront comme premier argument un objet du type HttpRequest. 
Toutes les vues doivent forcément retourner une instance de HttpResponse
On renvoie le code HTML en passant par des templates

## - Routage d'URL

modifier mon_projet/urls.py
# crepes_bretonnes/urls.py
from django.urls import path
from blog import views # ++

urlpatterns = [
    path('admin/', admin.site.urls),
    path('accueil', views.home), # ++
    # path('url', package.module_views.fonction)
    # path('', views.home) pour une page d'accueil à la racine
]

## - Organiser proprement vos URL

idée : fragmenter le codes des URLS pour rendre les applications modulables
en pratique : ajouter un urls.py à chaque application, puis l'inclure' dans le fichier global 
# blog/urls.py ++
from django.urls import path
from . import views

urlpatterns = [
    path('accueil', views.home),
]
# crepes_bretonnes/urls.py
from django.contrib import admin
from django.urls import path, include # include pour lier des urls à un path

urlpatterns = [
    path('admin/', admin.site.urls),
    path('blog/', include('blog.urls')),
    # tous les urls de l'application blog commenceront par blog/
    # bonne solution pour structurer les URL et éviter les conflits entre les applications
]

## - Passer des arguments aux vues

Pour passer des arguments dans une URL, 
il faut capturer ces arguments directement depuis l’écriture de nos URL

# pour accéder à un article avec un id :
urlpatterns = [
    path('accueil', views.home),
    path('article/<id_article>', views.view_article),
]

# views
def view_article(request, id_article):
    """ 
    Vue qui affiche un article selon son identifiant (ou ID, ici un numéro)
    Son ID est le second paramètre de la fonction (pour rappel, le premier
    paramètre est TOUJOURS la requête de l'utilisateur)
    """
    return HttpResponse(
        "Vous avez demandé l'article n° {0} !".format(id_article)    
    )

# il est possible de capturer plusieurs paramètres dans une même URL et de forcer son type :
urlpatterns = [
    path('accueil', views.home),
    path('article/<id_article>', views.view_article), 
    path('articles/<str:tag>', views.list_articles_by_tag), 
    path('articles/<int:year>/<int:month>', views.list_articles),
    # la vue recevra directement un entier de la part de Django
]

# 5 types de données identifiables par ce système de routage :
    str # string non vide, sauf "/"
    int  # entier
    slug  # mon-1er-article-de-blog ;
    uuid  # format standardisé de données, souvent utilisé pour avoir des identifiants uniques
    path  # similaire à str, mais accepte également le "/"

# écrire des urls plus avancés
ancienne méthode: se base sur les expressions régulières
hic: tous les paramètres de vue seront ici passés comme des chaînes de caractères
# en reprenant l'exemple ci-dessus
from django.urls import path, re_path
from . import views

urlpatterns = [
    re_path(r'^accueil', views.home),
    re_path(r'^article/(?P<id_article>.+)', views.view_article), 
    re_path(r'^articles/(?P<tag>.+)', views.list_articles_by_tag), 
    re_path(r'^articles/(?P<year>\d{4})/(?P<month>\d{2})', views.list_articles),
    # URL visitée par l’utilisateur doit commencer par articles/
    # être suivie d’un nombre à quatre chiffres (\d{4})
    # et suivie d’un nombre à deux chiffres, qui s’appellera "month"
]

# arguments optionnels
donne la possibilité d’avoir plusieurs URL qui pointent vers la même vue
# urls.py
urlpatterns = [
    path('articles/<int:year>/', views.list_articles),
    path('articles/<int:year>/<int:month>', views.list_articles),
]
# views.py
def list_articles(request, year, month=1): # month = 1 par défaut
    return HttpResponse('Articles de %s/%s' % (year, month))

# passer des paramètres GET
http://www.crepes-bretonnes.com/blog/article/1337?ref=twitte
# Django tentera de trouver le pattern correspondant en ne prenant en compte 
# que ce qui est avant les paramètres GET, c’est-à-dire /blog/article/1337
# Les paramètres passés par la méthode GET sont bien évidemment récupérables, 
# via le dictionnaire request.GET dans la vue
# Ici, request.GET['ref'] retournerait 'twitter'

## - Des réponses spéciales

# Simuler une page non trouvée
# la page 404 ne marche que si DEBUG = False (en production donc)
from django.http import HttpResponse, Http404 # ++

def view_article(request, id_article):
    # Si l'ID est supérieur à 100, nous considérons que l'article n'existe pas
    if id_article > 100:
        raise Http404

    return HttpResponse('<h1>Mon article ici</h1>')


# Rediriger l’utilisateur
Une redirection est réalisable avec Django via la méthode redirect 
qui renvoie un objet HttpResponseRedirect (classe héritant de HttpResponse), 
qui redirigera l’utilisateur vers une autre URL
La méthode redirect peut prendre en paramètres plusieurs types d’arguments, 
dont notamment une URL brute (chaîne de caractères) ou le nom d’une vue.

# ex. avec une url brute
from django.shortcuts import redirect

def list_articles(request, year, month):
    # Il veut des articles ? Soyons fourbe et redirigeons-le vers djangoproject.com
    return redirect("https://www.djangoproject.com")

# ex. avec une vue (plus pertinent)
from django.http import HttpResponse, Http404
from django.shortcuts import redirect

def view_article(request, id_article):
    if id_article > 100:
        raise Http404

    return redirect(view_redirection) # redirection vers la seconde vue

def view_redirection(request):
    return HttpResponse("Vous avez été redirigé.")
# dans les urls.py
path('redirection', views.view_redirection)

Il est également possible de préciser si la redirection est temporaire ou définitive 
en ajoutant le paramètre permanent = True

Si nous souhaitions rediriger un visiteur vers la vue view_article
définie précédemment par un ID d’article spécifique, 
il suffirait d’utiliser la méthode redirect ainsi:
return redirect(view_article, id_article=42)

# Meilleure pratique :

la fonction redirect agit en deux temps.
Elle va tout d’abord construire l’URL vers la vue selon le routage indiqué dans urls.py. 
Ici, elle va donc générer l’URL /blog/article/42 
et ensuite rediriger l’utilisateur vers cette URL

Il est possible d’indiquer une vue à redirect à l’aide d’une nouvelle manière: 
en indiquant le nom de la vue tel que renseigné dans urls.py.
# en nommant la vue :
path('article/<int:id_article>$', views.view_article, name='afficher_article'),
# appel de la vue en reidrection :
return redirect('afficher_article', id_article=42)

(!) Il ne faut donc jamais écrire d’URL en dur dans les vues

# générer l'URL avec reverse (django.urls.reverse)
retourne une chaîne de caractères contenant l’URL vers la vue selon les éventuels arguments donnés


## -- TEMPLATES -- ## 

Les templates sont écrits dans un mini-langage de programmation propre à Django 
qui possède des expressions et des structures de contrôle basiques (if/else, boucle for, etc.) 
que nous appelons des tags

## - Lier template et vue

la vue se charge de transmettre l’information de la requête au template, 
puis de retourner le HTML généré au client
la fonction render génère un objet HttpResponse après avoir traité notre template.
# ex. une vue qui renvoie juste la date actuelle à l’utilisateur
from datetime import datetime
from django.shortcuts import render

def date_actuelle(request):
    return render(request, 'blog/date.html', {'date': datetime.now()})

def addition(request, nombre1, nombre2):    
    total = nombre1 + nombre2
    # Retourne nombre1, nombre2 et la somme des deux au template
    return render(request, 'blog/addition.html', locals())
    # la fonction locals() va retourner un dictionnaire 
    # contenant toutes les variables locales de la fonction 
    # depuis laquelle locals() a été appelée
    # {"total": 8, "nombre1": 5, "nombre2": 3, "request": <WSGIRequest ...>}

# son fichier urls.py associé :
from django.urls import path
from . import views

urlpatterns = [
    path('date', views.date_actuelle),
    path('addition/<int:nombre1>/<int:nombre2>/', views.addition)
]

# la fonction render
render('requête HTTP initiale (request)', 
       'chemin vers le template dans un des dossiers de templates donnés dans settings.py',
       'dictionnaire reprenant les variables qui seront accessibles dans le template')

# emplacement des templates
Par défaut, Django va chercher les templates aux endroits suivants:
* dans la liste des dossiers fournis du paramètre DIR de la variable de configuration TEMPLATES
* s’il ne l’a pas trouvé, dans un sous-dossier "templates" de l’application.

# settings.py 
TEMPLATES = [
    {
        'BACKEND': 'django.template.backends.django.DjangoTemplates',
        'DIRS': [
            # Cette ligne ajoute le dossier templates/ à la racine du projet
            os.path.join(BASE_DIR, 'templates'),
        ],
        'APP_DIRS': True,
        'OPTIONS': {
            'context_processors': [
                'django.template.context_processors.debug',
                'django.template.context_processors.request',
                'django.contrib.auth.context_processors.auth',
                'django.contrib.messages.context_processors.messages',
            ],
        },
    },
]

(!) Il est conseillé de créer un dossier templates/ à la racine du projet. 
Vous pourrez y déposer des templates plutôt propres à votre projet 
(erreurs 404, squelette de votre design, pages statiques...). 
Django va par ailleurs piocher en priorité dans ce répertoire.

(!) Pour nos applications, nous allons utiliser la deuxième catégorie : 
le dossier templates de l’application actuelle, pour une question de réutilisabilité

(!) Pour éviter les conflits, 
l’usage est de créer un dossier du nom de l’application au sein du dossier templates. 
On obtient alors la hiérarchie suivante:

crepes_bretonnes/
    blog/
        __init__.py
        admin.py
        apps.py
        migrations/
            __init__.py
        models.py
        templates/
            blog/
                addition.html
                date.html
        tests.py
        urls.py
        views.py
    crepes_bretonnes/
        __init__.py
        settings.py
        urls.py
        wsgi.py
    templates/
    db.sqlite3
    manage.py

# Application dans le projet
blog/templates/blog/date.html ++
<h1>Bienvenue sur mon blog</h1>
<p>La date actuelle est : {{ date }}</p>
# en tapant blog/date, date est remplacée par la date actuelle

template addition.html # blog/templates/blog/addition.html
<h1>Ma super calculatrice</h1>
<p>{{ nombre1 }} + {{ nombre2 }}, ça fait <strong>{{ total }}</strong> !<br />
Nous pouvons également calculer la somme dans le template : {{ nombre1|add:nombre2 }}.</p>

## - Afficher nos variables à l’utilisateur

# Affichage d’une variable
Bonjour {{pseudo}}, nous sommes le {{date}}.
(!) Si jamais la variable n’est pas une chaîne de caractères, 
le moteur de templates utilisera la méthode __str__  de l’objet pour l’afficher
# Supposons que notre vue a fourni un objet nommé article contenant 
# les attributs titre, auteur et contenu #
<h2>{{ article.titre }}</h2>
<p><em>Article publié par {{ article.auteur }}</em></p>
<p>{{ article.contenu }}</p>
(!) Si jamais une variable n’existe pas, ou n’a pas été envoyée au template, 
Django n’affiche rien par défaut. 
Il est possible de forcer l’affichage d’une erreur en spécifiant l’option 'string_if_invalid' 
dans les options du backend de templates.

# les filtres
{{texte | truncatewords: 80}}
Vous avez {{nb_messages}} message{{nb_messages | pluralize}}. # ajoute un "s" si plusieurs messages
Il y a {{nb_chevaux}} chev{{nb_chevaux | pluralize: "al,aux"}} dans l'écurie.
# « cheval » si nb_chevaux  est égal à 1 et « chevaux » pour le reste
Bienvenue {{pseudo | default: "visiteur"}}
Il existe des dizaines de filtres par défaut:  date, safe, length, etc. 
https://docs.djangoproject.com/en/stable/ref/templates/builtins/#built-in-filter-reference

## - Manipulons nos données avec les tags

# Les conditions : {% if %}
Bonjour
{% if sexe == "Femme" %}
   Madame
{% else %}
   Monsieur
{% endif %} !

{% if age > 25 %}
    Bienvenue Monsieur, passez un excellent moment dans nos locaux.
{% elif age > 16 %}
    Vas-y, tu peux passer.
{% else %}
    Tu ne peux pas rentrer petit, tu es trop jeune !
{% endif %}

# Les boucles : {% for %}
couleurs = ['rouge', 'orange', 'jaune', 'vert', 'bleu', 'indigo', 'violet']

Les couleurs de l'arc-en-ciel sont :
<ul>
{% for couleur in couleurs %}
    <li>{{ couleur }}</li>
{% endfor %}
</ul>

# ex. parcourir un dictionnaire :
# en passant par la directive {% for cle, valeur in dictionnaire.items %}  :
couleurs = {
    'FF0000': 'rouge',
    'ED7F10': 'orange',
    'FFFF00': 'jaune',
    '00FF00': 'vert',
    '0000FF': 'bleu',
    '4B0082': 'indigo',
    '660099': 'violet',
}

Les couleurs de l'arc-en-ciel sont :
<ul>
{% for code, nom in couleurs.items %}
    <li style="color: #{{ code }}">{{ nom }}</li>
{% endfor %}
</ul>

(!) Rappelez-vous que la manipulation de données doit être faite au maximum dans les vues. 
Ces tags doivent juste servir à l’affichage !

La directive {% empty %} permet d’afficher un message par défaut si la liste parcourue est vide :
<h3>Commentaires de l'article</h3>
{% for commentaire in commentaires %}
    <p>{{ commentaire }}</p>
{% empty %}
    <p class="empty">Pas de commentaires pour le moment.</p>
{% endfor %}

# Le tag {% block %}
nous pouvons créer un fichier, appelé usuellement base.html, 
qui va définir la structure globale de la page, autrement dit son squelette. 
Par exemple:
<!DOCTYPE html>
<html lang="fr">
<head>
   <link rel="stylesheet" href="/media/css/style.css" />
   <title>{% block title %}Mon blog sur les crêpes bretonnes{% endblock %}</title>
</head>
<body>
<header>Crêpes bretonnes</header>
    <nav>
       {% block nav %}
       <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/blog/">Blog</a></li>
            <li><a href="/contact/">Contact</a></li>
       </ul>
       {% endblock %}
   </nav>
   <section id="content">
       {% block content %}{% endblock %}
   </section>
<footer>&copy; Crêpes bretonnes</footer>
</body>
</html>

ajouter base.html au dossier templates/ racine 
(!) tout ce qui est relatif au projet va dans un des dossiers de la liste DIRS 
de la variable de configuration TEMPLATES ; 
pour ce cours, il s’agit du dossier templates à la racine du projet
# mapage.html 
{% extends "base.html" %} # hérite du template parent
{% block title %}Ma page d'accueil{% endblock %}
{% block content %}
    <h2>Bienvenue !</h2>
    <p>
       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus 
       massa non tortor. Vestibulum diam diam, posuere in viverra in, 
       ullamcorper et libero. Donec eget libero quis risus congue imperdiet ac 
       id lectus. Nam euismod cursus arcu, et consequat libero ullamcorper sit 
       amet.
    </p>
{% endblock %}

# Les liens vers les vues : {% url %} 
<a href="{% url "afficher_article" 42 %}">
    Lien vers mon super article N° 42
</a>
… générera le code HTML suivant :
<a href="/blog/article/42">
    Lien vers mon super article n° 42
</a>
Ce tag construit donc l’URL vers la vue dont le nom est donné comme premier paramètre,
entre guillemets. 
Les arguments qui suivent seront ceux de la vue (à condition de respecter le nombre et l’ordre 
des paramètres selon la déclaration de la vue, bien entendu). 
Il est donc important d’assigner un nom à chacune de vos vues dans les fichiers d’URL !

On peut également utiliser une variable comme paramètre pour la construction de l’URL, 
que ce soit pour le nom de la vue ou les arguments :
<a href="{% url "afficher_article" ID_article %}">
    Lien vers mon super article n° {{ ID_article }}
</a>

# Les commentaires : {% comment %}
ils n’apparaîtront pas dans la page HTML
<p>Ma page HTML</p>
<!-- Ce commentaire HTML sera visible dans le code source. -->
#    {# Ce commentaire Django ne sera pas visible dans le code source. #}
{% comment %}
    Commentaire sur plusieurs lignes :
    Ceci est une page d'exemple. Elle est composée de 3 tableaux :
    - tableau des ventes
    - locations
    - retours en garantie
{% endcomment %}
<table>...

## - Ajoutons des fichiers statiques

Comme pour les templates, les fichiers statiques peuvent se trouver à deux endroits : 
au sein du dossier static/ de l’application courante 
ou alors dans un ou plusieurs dossiers définis dans la configuration du projet.

créons un dossier static/ à la racine du projet, dans lequel vous enregistrerez 
les fichiers liés globalement au projet : CSS et JavaScript global, images du design...

Il faut ensuite renseigner ce dossier et lui assigner un préfixe d’URL dans votre settings.py
STATIC_URL = '/static/' # Qui devrait déjà être la configuration par défaut
# indique l’URL du dossier depuis lequel vos fichiers seront accessibles

STATICFILES_DIRS = (
    os.path.join(BASE_DIR, "static"),
)
# à rajouter
# renseigne le chemin vers ces fichiers sur votre disque dur à partir de la racine du projet

De façon analogue aux templates, chaque application peut également avoir son static 
afin de conserver les médias propres à chaque application

(!) On suit la convention du dossier du nom de l’application au sein du dossier static, 
afin d’éviter les conflits. On obtient la structure de projet suivante :
crepes_bretonnes/
    blog/
        static/
            blog/
                crepes.jpg
        templates/
            blog/
                addition.html
                date.html
    crepes_bretonnes/
        __init__.py
        settings.py
        urls.py
        wsgi.py
    static/
        css/
        img/
            header.png
        js/
    templates/
        base.html

Vous pouvez ainsi inclure l’image de crêpes de l’application blog dans votre template de la façon suivante :
{% load static %} # à appeler une fois au début du template 
# afin de charger la librairie de gestion des médias
<img src="{% static 'blog/crepes.jpg' %}" alt="Mon image" />

(!) Cette méthode n’est pas considérée comme efficace et sécurisée 
donc elle ne doit pas être utilisée en production !


## -- LES MODELES -- ##

## - Créer un modèle

Un modèle s’écrit sous la forme d’une classe
Il représente une table dans la base de données, dont les attributs correspondent aux champs de la table. 
Ceux-ci se rédigent dans le fichier models.py de chaque application.

from django.db import models
from django.utils import timezone

class Article(models.Model): # tout modèle hérite de la classe Model de Django
    titre = models.CharField(max_length=100) # précise le champ à créer + contraintes
    auteur = models.CharField(max_length=42)
    contenu = models.TextField(null=True) # pas de limite de taille (pour enregistrer des longs textes)
    # ici, champ optionnel
    date = models.DateTimeField(default=timezone.now, 
                                verbose_name="Date de parution") # donne précision sur le nom du champ
    
    class Meta:
        verbose_name = "article"
        ordering = ['date']
    
    def __str__(self):
        """ 
        Cette méthode que nous définirons dans tous les modèles
        nous permettra de reconnaître facilement les différents objets que 
        nous traiterons plus tard dans l'administration
        """
        return self.titre

La liste des champs disponibles : https://docs.djangoproject.com/en/stable/ref/models/fields/#field-types

# Personnaliser le comportement du modèle avec la classe Meta
Classe optionnelle
Celle-ci permet de préciser des comportements propres au modèle lui-même :
    • verbose_name : permet de dire à Django ce que représente le modèle.
    # commentaire d’article" pour ArticleComment
    # utilisé dans l'administration
    • ordering : définit l’ordre par défaut lors de la sélection des données avec ce modèle.

# Créer la table SQL correspondante
python manage.py makemigrations 
# détermine quelles modifications ont été apportées aux modèles 
# et va détecter quels changements il faut opérer en conséquence sur la structure de la BDD
python manage.py migrate # réalise ces changements dans la base de données

## - Vérifier les données avec shell

python manage.py shell
>>> from blog.models import Article
Chaque instance d’un modèle correspond à une entrée dans la base de données
>>> article = Article(titre="Bonjour", auteur="Maxime")
>>> article.contenu = "Les crêpes bretonnes sont trop bonnes !"
>>> article.auteur
Maxime
>>> article.save() # sauvegarde l'objet/l'entrée dans la BDD
il est toujours possible de modifier l’objet par la suite :
>>> article.titre = "Salut !"
>>> article.auteur = "Mathieu"
>>> article.save() # obligatoire
>>> article.delete() # supprime l'instance
Chaque modèle (la classe, et non l’instance, attention !), 
possède plusieurs méthodes dans la sous-classe objects :
>>> Article.objects.all() # obtenir toutes les données enregistrées d'un modèle
<QuerySet []>
# conteneur itérable
>>> Article(auteur="Mathieu", titre="Les crêpes", contenu="Les crêpes c'est cool").save()
>>> Article(auteur="Maxime", titre="La Bretagne", contenu="La Bretagne c'est trop bien").save()
>>> Article.objects.all()
<QuerySet [<Article: Les crêpes>, <Article: La Bretagne>]>

afficher les différents titres de nos articles :
>>> for article in Article.objects.all():
...     print(article.titre)
...
Les crêpes
La Bretagne
>>>

sélectionner tous les articles d’un seul auteur uniquement :
>>> for article in Article.objects.filter(auteur="Maxime"):
... print(article.titre, "par", article.auteur)
...
La Bretagne par Maxime

sélectionner tous les articles SAUF ceux rédigés par un auteur :
>>> for article in Article.objects.exclude(auteur="Maxime"):
... print(article.titre, "par", article.auteur)
...
Les crêpes par Mathieu

filtrer ou exclure des entrées à partir de plusieurs champs : 
Article.objects.filter(titre="La Bretagne", auteur="Mathieu")

filtrer les articles dont le titre doit contenir certains caractères :
>>> Article.objects.filter(titre__contains="crêpe")
<QuerySet [<Article: Les crêpes>]>

prendre des valeurs du champ (strictement) inférieures ou (strictement) 
supérieures à l’argument passé, grâce à la méthode lt (less than, plus petit que) 
et gt (greater than, plus grand que) :
>>> from django.utils import timezone
>>> Article.objects.filter(date__lt=timezone.now())
<QuerySet [<Article: Les crêpes>, <Article: La Bretagne>]>
# Les deux articles ont été sélectionnés, 
# car ils remplissent tous deux la condition (leur date de parution est dans le passé)

(!) il existe lte et gte qui opèrent de la même façon,
la différence réside juste dans le fait que ceux-ci prendront tout élément inférieur/supérieur ou égal 
(lte  : less than or equal, plus petit ou égal, idem pour gte)

organiser les articles par date de parution, du plus récent au plus ancien :
>>> Article.objects.order_by('date')
<QuerySet [<Article: Les crêpes>, <Article: La Bretagne>]>

organiser les articles par date de parution, du plus récent au plus ancien
+ ordre descendant :
>>> Article.objects.order_by('-date')
<QuerySet [<Article: La Bretagne>, <Article: Les crêpes>]>

(!) Il est possible de passer plusieurs noms d’attributs à order_by. 
La priorité de chaque attribut dans le tri est déterminée par sa position dans la liste d’arguments. 
Ainsi, si nous trions les articles par nom et que deux d’entre eux ont le même nom, 
Django les départagera selon le deuxième attribut, 
et ainsi de suite tant que des attributs comparés seront identiques.

Pour inverser les éléments d’un QuerySet : la méthode reverse().
Les méthodes de QuerySet sont cumulables, ce qui garantit une grande souplesse dans vos requêtes :
>>> Article.objects.filter(date__lt=timezone.now()).order_by('date','titre').reverse()
<QuerySet [<Article: La Bretagne>, <Article: Les crêpes>]>

# méthodes qui retournent un objet (et non un QuerySet)
# get
>>> Article.objects.get(titre="Je n'existe pas")
...
blog.models.DoesNotExist: Article matching query does not exist.
>>> Article.objects.get(auteur="Mathieu").titre
Les crêpes
>>> Article.objects.get(auteur__startswith="M")
...
blog.models.MultipleObjectsReturned: get() returned more than one Article -- it returned 2!
# get_or_create
crée une entrée si aucune autre n’existe avec les conditions spécifiées:
renvoie un tuple contenant l’objet désiré et un booléen 
qui indique si une nouvelle entrée a été créée ou non :
Article.objects.get_or_create(auteur="Mathieu")
>>> (<Article: Les crêpes>, False)

Article.objects.get_or_create(auteur="Zozor", titre="Hi han")
>>> (<Article: Hi han>, True)

## - Les liaisons entre modèles

Django propose tout un système permettant de simplifier grandement les différents types de liaison
ex. des catégories pour Articles (1 Article = 1 catégorie, 1 catégorie = * Article(s))
1) créer un autre modèle représentant les catégories
class Categorie(models.Model):
    nom = models.CharField(max_length=30)

    def __str__(self):
        return self.nom
2) créer la liaison depuis notre modèle Article, avec un nouveau champ :
class Article(models.Model):
    titre = models.CharField(max_length=100)
    auteur = models.CharField(max_length=42)
    contenu = models.TextField(null=True)
    date = models.DateTimeField(default=timezone.now, 
                                verbose_name="Date de parution")
    categorie = models.ForeignKey('Categorie', on_delete=models.CASCADE) # ++
    
    class Meta:
        ordering = ['date']
        
    def __str__(self):
        return self.titre

Le champ ForeignKey va enregistrer une clé, 
un identifiant propre à chaque catégorie enregistrée (il s’agit la plupart du temps d’un nombre) 
qui permettra donc de retrouver la catégorie associée

2 options obligatoires : le modèle vers lequel pointer et 
que faire en cas de suppression de la clé étrangère :
    - CASACADE : tous les articles ayant cette catégorie seront également supprimés 
    (provoquant une cascade de suppression)
    - SET_NULL : vide le champ categorie de chaque objet
    - PROTECT : empêche de supprimer une valeur si elle est utilisée, via une exception Python

python manage.py makemigrations
python manage.py migrate

# ici, problème de migration, car on rajoute une foreign key qui n'a pas été crée
# solution : supprimer la bdd et relancer la migration

# vérifier les changements avec shell
python manage.py shell
>>> from blog.models import Categorie, Article

>>> cat = Categorie(nom="Crêpes")
>>> cat.save()

>>> art = Article()
>>> art.titre = "Les nouvelles crêpes"
>>> art.auteur = "Maxime"
>>> art.contenu = "On a fait de nouvelles crêpes avec du trop bon rhum"
>>> art.categorie = cat
>>> art.save()

# Pour accéder aux attributs et méthodes de la catégorie associée à l’article :
>>> art.categorie.nom
'Crêpes'

# une catégorie peut avoir plusieurs articles
# pour voir tous les articles liés au modele Categorie :
>>> cat.article_set.all()
<QuerySet [<Article: Les nouvelles crêpes>]>

Le nom que prendra une relation en sens inverse est composé du nom du modèle source 
(qui a la ForeignKey comme attribut), « _ » et finalement du mot set
Nous pouvons aussi utiliser les méthodes que nous avons vues précédemment : 
all, filter, exclude, order_by...

(!) il est possible d’accéder aux attributs du modèle lié par une clé étrangère 
depuis un filter, exclude, order_by…
# ex. filtrer tous les articles dont le titre de la catégorie possède un certain mot :
>>> Article.objects.filter(categorie__nom__contains="crêpes")
<QuerySet [<Article: Les nouvelles crêpes>]>

# OneToOneField
autre type de liaison, très similaire au principe des clés étrangères
permet de lier un modèle à un autre tout aussi facilement, 
et garantit qu’une fois la liaison effectuée, 
plus aucun autre objet ne pourra être associé à ceux déjà associés
(!) La relation devient unique
# ex.
class Moteur(models.Model):
    nom = models.CharField(max_length=25)

    def __str__(self):
        return self.nom

class Voiture(models.Model):
    nom = models.CharField(max_length=25)
    moteur = models.OneToOneField(Moteur, on_delete=models.CASCADE)

    def __str__(self):
        return self.nom

python manage.py shell

>>> from blog.models import Moteur, Voiture
>>> moteur = Moteur.objects.create(nom="Vroum") # crée directement l'objet et l'enregistre
>>> voiture = Voiture.objects.create(nom="Crêpes-mobile", moteur=moteur)

>>> moteur.voiture
<Voiture: Crêpes-mobile>
>>> voiture.moteur
<Moteur: Vroum>
# ne renvoie olus un QuerySet, 
# mais directement l’élément concerné (ce qui est logique, celui-ci étant unique)

# changer le nom de la variable créée par la relation inverse
# ex. moteur de la classe Voiture
utiliser l’argument related_name du ForeignKey ou OneToOneField
et lui passer une chaîne de caractères désignant le nouveau nom de l’attribut
désactiver la relation inverse en donnant related_name='+'

# ManyToManyField
ManyToManyField va toujours créer une table intermédiaire qui enregistrera les clés étrangères 
des différents objets des modèles associés. 
Nous pouvons soit laisser Django s’en occuper tout seul, 
soit la créer nous-mêmes pour y ajouter des attributs supplémentaires.
Dans ce deuxième cas, il faut spécifier le modèle faisant la liaison via l’argument through
du champ et ne surtout pas oublier d’ajouter des ForeignKey vers les deux modèles qui seront liés

ex. comparateur de prix pour les ingrédients nécessaires à la réalisation de crêpes
Plusieurs vendeurs proposent plusieurs produits, parfois identiques, à des prix différents
Il nous faudra trois modèles :

class Produit(models.Model):
    nom = models.CharField(max_length=30)

    def __str__(self):
        return self.nom

class Vendeur(models.Model):
    nom = models.CharField(max_length=30)
    produits = models.ManyToManyField(Produit, through='Offre', related_name='+')
    # Offre est le modèle intermédiaire, qui fait le lien entre Produit et Vendeur
    # permet d’ajouter des informations supplémentaires sur la liaison 
    # (ici, le prix, caractérisé par un PositiveIntegerField)
    produits_sans_prix = models.ManyToManyField(Produit, related_name="vendeurs")
    # permet d’associer plusieurs produits à un vendeur, et vice-versa

    def __str__(self):
        return self.nom

class Offre(models.Model):
    prix = models.IntegerField()
    produit = models.ForeignKey(Produit, on_delete=models.CASCADE)
    vendeur = models.ForeignKey(Vendeur, on_delete=models.CASCADE)

    def __str__(self):
        return "{0} vendu par {1}".format(self.produit, self.vendeur)

python manage.py shell
>>> from blog.models import Vendeur, Produit, Offre
>>> vendeur = Vendeur.objects.create(nom="Carouf")
>>> p1 = Produit.objects.create(nom="Lait") 
>>> p2 = Produit.objects.create(nom="Farine")

la gestion du ManyToMany se fait de deux manières différentes :
Dans le cas de la relation avec le modèle intermédiaire, 
Django nous laisse gérer le modèle Offre comme un modèle classique, 
où l’on peut créer, modifier et supprimer des relations :
>>> o1 = Offre.objects.create(vendeur=vendeur, produit=p1, prix=10)
>>> o2 = Offre.objects.create(vendeur=vendeur, produit=p2, prix=42)
>>> o1.prix = 15
>>> o1.delete()

Dans le cas de la relation sans modèle intermédiaire, 
on gère les éléments liés à notre vendeur via l’attribut produits_sans_prix, 
qui se gère tel un ensemble où l’on peut ajouter, supprimer et lister les objets :
>>> vendeur.produits_sans_prix.add(p1, p1, p2)
>>> vendeur.produits_sans_prix.all()
<QuerySet [<Produit: Lait>, <Produit: Farine>]>
>>> vendeur.produits_sans_prix.remove(p2)

Les relations ManyToMany se comportent également comme un QuerySet, 
et il est donc possible de manier les produits avec les critères habituels
(filter, exclude, order_by, reverse...)
>>> vendeur.produits_sans_prix.filter(nom="Farine")
<QuerySet [<Produit: Farine>]>
>>> vendeur.produits.order_by('-offre__prix')
<QuerySet [<Produit: Farine>, <Produit: Lait>]>

Comme pour les ForeignKey, une relation inverse s’est créée, 
seulement pour notre relation produits_sans_prix, vu que l’on a désactivé l’autre via le related_name  :
>>> p1.vendeurs.all()
<QuerySet [<Vendeur: Carouf>]>

accéder aux valeurs du modèle intermédiaire (ici Offre) :
>>> Offre.objects.get(vendeur=vendeur, produit=p1).prix
10

supprimer toutes les liaisons d’un ManyToManyField, 
que la table intermédiaire soit générée automatiquement ou manuellement :
>>> vendeur.produits.clear()
>>> vendeur.produits_sans_prix.clear()
# toute relation entre les produits et les vendeurs a disparu !

## - Les modèles dans les vues

# Afficher les articles du blog
Exemple d’application :

# blog/views.py -----------
from django.http import Http404
from django.shortcuts import render
from blog.models import Article

def accueil(request):
    """ Afficher tous les articles de notre blog """
    articles = Article.objects.all() # Nous sélectionnons tous nos articles
    return render(request, 'blog/accueil.html', {'derniers_articles': articles})

def lire(request, id):
    """ Afficher un article complet """
    pass # Le code de cette fonction est donné un peu plus loin.

# blog/urls.py -----------
from django.urls import path
from . import views

urlpatterns = [
    path('', views.accueil, name='accueil'),
    path('article/<int:id>', views.lire, name='lire')
]

# blog/templates/blog/accueil.html -----------
<h1>Bienvenue sur le blog des crêpes bretonnes !</h1>

{% for article in derniers_articles %}
    <div class="article">
    	<h3>{{ article.titre }}</h3>
    	<p>{{ article.contenu|truncatewords_html:80 }}</p>
        <p><a href="{% url 'lire' article.id %}">Lire la suite</a></p>
    </div>
{% empty %}
    <p>Aucun article.</p>
{% endfor %}

# Afficher un article précis
il n’y a pas besoin de vérifier si l’ID précisé est bel et bien un nombre, 
cela est déjà spécifié dans urls.py
Une vue possible est la suivante :
def lire(request, id):
    try:
        article = Article.objects.get(id=id)
    except Article.DoesNotExist:
        raise Http404

    return render(request, 'blog/lire.html', {'article': article})
Qui peut être simplifié grâce au raccourci get_object_or_404 :
# Il faut ajouter l'import get_object_or_404, attention !
from django.shortcuts import render, get_object_or_404

def lire(request, id):
    article = get_object_or_404(Article, id=id)
    return render(request, 'blog/lire.html', {'article':article})

# blog/templates/blog/lire.html
<h1>{{ article.titre }} <span class="small">dans {{ article.categorie.nom }}</span></h1>
<p class="infos">Rédigé par {{ article.auteur }}, le {{ article.date|date:"DATE_FORMAT" }}</p>
<div class="contenu">{{ article.contenu|linebreaks }}</div>

(!) Le même raccourci existe pour obtenir une liste d’objets : get_list_or_404

# des URL plus esthétiques
Un slug est en journalisme un label court donné à un article publié, 
ou en cours d’écriture. 
Il permet d’identifier l’article tout au long de sa production et dans les archives. 
Il peut contenir des informations sur l’état de l’article, afin de les catégoriser.
# ex. developpez-votre-site-web-avec-le-framework-django
+ ajout d'un' type de champ dans les modèles : le SlugField

class Article(models.Model):
    titre = models.CharField(max_length=100)
    slug = models.SlugField(max_length=100) # permet de stocker une chaîne de caractères, d’une certaine taille maximale
    auteur = models.CharField(max_length=42)
    contenu = models.TextField(null=True)
    date = models.DateTimeField(default=timezone.now, 
                                verbose_name="Date de parution")

    def __str__(self):
        return self.titre

# ajouter notre slug dans l'url
# Pensez aux imports que nous avons dans l'exemple précédent
urlpatterns = [
    path('', views.accueil, name='accueil'),
    path('article/<int:id>-<slug:slug>', views.lire, name='lire'),
]

snippet pour créer des slugs uniques : https://djangosnippets.org/snippets/690/

(!) il est possible d’automatiser le remplissage d'un' slug 


# Ajout/Modification d'article via le terminal
python manage.py shell
>>> from blog.models import Categorie, Article

>>> art = Article.objects.get(auteur="Maxime") # get article by Maxime
>>> art.slug = "crepes-rhum"
>>> print(art.slug)
crepes-rhum
>>> art.save()

>>> art2 = Article()
>>> art2.titre = "Les crêpes au cidre"
>>> art2.auteur = "Pablo"
>>> art2.contenu = "On a fait des crêpes au cidre !"
>>> cat = Categorie.objects.get(nom="Crêpes") # get Catégorie Crêpes
>>> art2.categorie = cat
>>> art2.slug = "crepes-cidre"
>>> art2.save()


## -- L'ADMINISTRATION -- ##

Un des gros points forts de Django est que celui-ci génère de façon automatique 
l’administration en fonction de vos modèles.

## - Mise en place de l'administration

# Les modules django.contrib
ensemble d’extensions fournies par Django, réutilisables dans n’importe quel projet
le module django.contrib.admin génère l’administration
django.contrib.messages = gestion de messages destinés aux visiteurs
django.contrib.auth = système d’authentification et de gestion des utilisateurs

# Accéder à l'administration
+ avoir dans la liste INSTALLED_APPS de settings.py les applications suivantes, 
déjà présentes au début de la liste par défaut :
'django.contrib.admin',
'django.contrib.auth',
'django.contrib.contenttypes',
'django.contrib.sessions',
'django.contrib.messages',
+ dans l’import de middlewares :
'django.contrib.sessions.middleware.SessionMiddleware',
'django.middleware.common.CommonMiddleware',
'django.contrib.auth.middleware.AuthenticationMiddleware',

# Mise à jour de la base de données
+ créer de nouvelles tables dans la base de données, 
qui serviront à enregistrer les actions des administrateurs, définir les droits de chacun, etc.
python manage.py migrate
+ créer un compte super-utilisateur
python manage.py createsuperuser

# Intégration à notre projet : définissons-lui une adresse
se rendre à http://127.0.0.1:8000/admin/

## - Première prise en main

Affiche la liste des modèles que vous pouvez gérer. 
Pour le moment, seuls 2 modèles, Groupes et Utilisateurs, 
sont disponibles, par défaut. 
Ce sont les modèles de l’application django.contrib.auth

+ Possibilité de créer un utilisateur

## - Administrons nos propres modèles

Dans le fichier blog/admin.py, insérez ces lignes :
from django.contrib import admin
from .models import Categorie, Article

admin.site.register(Categorie)
admin.site.register(Article)


# comment ça marche ?
Au lancement du serveur, le framework va chercher, 
dans chaque application installée (celles qui sont listées dans INSTALLED_APPS), 
le fichier admin.py, et si celui-ci existe, exécutera son contenu.
Pour activer l’administration pour toutes nos applications, 
il suffit de créer un fichier admin.py dans chacune, 
et d’appeler la méthode admin.site.register() sur chacun de nos modèles.

## - Personnaliser l'administration

# Modifier l’aspect des listes
Le tableau ne contient qu’une colonne (méthode __string__() du modèle)
contenant le titre de notre article.
class Article(models.Model):
    titre = models.CharField(max_length=100)
    auteur = models.CharField(max_length=42)
    slug = models.SlugField(max_length=100)
    contenu = models.TextField()
    date = models.DateTimeField(auto_now_add=True, auto_now=False, 
                                verbose_name="Date de parution")
    categorie = models.ForeignKey(Categorie)
    
    class Meta:
        verbose_name = "article" # on le retrouve partout dans le tableau de bord
        # ex. Sélectionnez l'article à changer | 4 article, ect.
        ordering = ['date']

    def __str__(self):
        return self.titre # le titre de la colonne

+ créer une nouvelle classe dans notre fichier admin.py :
+ créer une nouvelle classe pour chaque modèle
* Notre classe héritera de admin.ModelAdmin
* et aura principalement 5 attributs, listés dans le tableau suivant :
{
    'list_display': 'Liste des champs du modèle à afficher dans le tableau',
    'list_filter': 'Liste des champs à partir desquels nous pourrons filtrer les entrées',
    'date_hierarchy': 'Permet de filtrer par date de façon intuitive',
    'ordering': 'Tri par défaut du tableau',
    'search_fields': 'Configuration du champ de recherche'
}

+ rédiger notre première classe adaptée au modèle Article  :
class ArticleAdmin(admin.ModelAdmin):
   list_display   = ('titre', 'auteur', 'date') # affiche les champs
   list_filter    = ('auteur','categorie',) # filtre par
   date_hierarchy = 'date' # ordre par défaut est la date de parution
   ordering       = ('date', ) # par odre croissant
   search_fields  = ('titre', 'contenu') # possible de chercher les articles contenant un mot, 
   # soit dans leur titre, soit dans leur contenu

blog/admin.py 
from django.contrib import admin
from .models import Categorie, Article

class ArticleAdmin(admin.ModelAdmin):
    list_display   = ('titre', 'auteur', 'date')
    list_filter    = ('auteur', 'categorie',)
    date_hierarchy = 'date'
    ordering       = ('date', )
    search_fields  = ('titre', 'contenu')

admin.site.register(Categorie)
admin.site.register(Article, ArticleAdmin)

# Créer des colonnes plus complexes
+ afficher les 40 premiers caractères de notre article
+ créer une méthode dans notre ModelAdmin, qui va se charger de renvoyer ce que nous souhaitons, 
et la lier à notre list_display

from django.utils.text import Truncator

def apercu_contenu(self, article):
    """ 
    Retourne les 40 premiers caractères du contenu de l'article, 
    suivi de points de suspension si le texte est plus long. 
    
    On pourrait le coder nous même, mais Django fournit déjà la 
    fonction qui le fait pour nous !
    """
    return Truncator(article.contenu).chars(40, truncate='...')

+ Pour l’utiliser dans list_display, on peut traiter la fonction comme un champ :

from django.contrib import admin
from django.utils.text import Truncator

from blog.models import Categorie, Article

class ArticleAdmin(admin.ModelAdmin):
    list_display   = ('titre', 'categorie', 'auteur', 'date', 'apercu_contenu') ## ++
    list_filter    = ('auteur','categorie', )
    date_hierarchy = 'date'
    ordering       = ('date', )
    search_fields  = ('titre', 'contenu')

    def apercu_contenu(self, article):
        """ 
        Retourne les 40 premiers caractères du contenu de l'article, 
        suivi de points de suspension si le texte est plus long. 
        """
        return Truncator(article.contenu).chars(40, truncate='...')

    # En-tête de notre colonne
    apercu_contenu.short_description = 'Aperçu du contenu'

admin.site.register(Categorie)
admin.site.register(Article, ArticleAdmin)

# modifier le formulaire d'édition
L’ordre d’apparition des champs dépend actuellement de l’ordre de déclaration dans notre modèle
+ modifions l’ordre via un nouvel attribut dans notre ModelAdmin : fields
fields = ('titre', 'auteur', 'categorie', 'contenu')
# prend une liste de champs qui seront affichés dans l’ordre souhaité
problème = notre formulaire est dans un unique fieldset (ensemble de champs)
conséquence = tous les champs sont les uns à la suite des autres, sans distinction
fieldsets = (
    # Fieldset 1 : meta-info (titre, auteur…)
   ('Général', { # nom du fieldset
        'classes': ['collapse',], # informations sur son contenu, sous forme de dictionnaire *
        'fields': ('titre', 'auteur', 'categorie')
    }),
    # Fieldset 2 : contenu de l'article
    ('Contenu de l\'article', {
       'description': 'Le formulaire accepte les balises HTML. Utilisez-les à bon escient !',
       'fields': ('contenu', )
    }),
)

* Ce dictionnaire contient trois types de données :
 - fields  : liste des champs à afficher dans le fieldset ;
 - description  : une description qui sera affichée en haut du fieldset, avant le premier champ ;
 - classes  : des classes CSS supplémentaires à appliquer sur le fieldset 
 (par défaut, il en existe trois : wide, extrapretty  et collapse)

* Nous avons donc séparé les champs en deux fieldsets et 
affiché quelques informations supplémentaires pour aider à la saisie. 
En fin de compte, nous avons le fichier blog/admin.py suivant :
from django.contrib import admin
from django.utils.text import Truncator

from blog.models import Categorie, Article

class ArticleAdmin(admin.ModelAdmin):

    # Configuration de la liste d'articles
    list_display = ('titre', 'categorie', 'auteur', 'date', 'apercu_contenu')
    list_filter = ('auteur', 'categorie', )
    date_hierarchy = 'date'
    ordering = ('date', )
    search_fields = ('titre', 'contenu')

    # Configuration du formulaire d'édition
    fieldsets = (
        # Fieldset 1 : meta-info (titre, auteur…)
        ('Général', {
            'classes': ['collapse', ], # rend l'ensemble masqué (à dérouler)
            'fields': ('titre', 'auteur', 'categorie')
        }),
        # Fieldset 2 : contenu de l'article
        ('Contenu de l\'article', {
            'description': 'Le formulaire accepte les balises HTML. Utilisez-les à bon escient !',
            'fields': ('contenu', )
        }),
    )

    # Colonnes personnalisées
    def apercu_contenu(self, article):
        """ 
        Retourne les 40 premiers caractères du contenu de l'article, 
        suivi de points de suspension si le texte est plus long. 
        """
        return Truncator(article.contenu).chars(40, truncate='...')
        # text = article.contenu[0:40]
        # if len(article.contenu) > 40:
        #    return '%s…' % text
        # else:
        #    return text

    # En-tête de notre colonne
    apercu_contenu.short_description = 'Aperçu du contenu'

admin.site.register(Categorie)
admin.site.register(Article, ArticleAdmin)

# Retour sur notre problème de slug
Dans notre zone d’administration, ce champ est actuellement ignoré… 
Nous souhaitons toutefois le remplir, mais aussi que cela se fasse automatiquement !
+ ajouter une option qui remplit instantanément ce champ grâce à un script JavaScript
* il existe un attribut aux classes ModelAdmin nommé prepopulated_fields. 
Ce champ a pour principal usage de remplir les champs de type SlugField
en fonction d’un ou plusieurs autres champs :
prepopulated_fields = {'slug': ('titre', ), } 
# notre champ slug est rempli automatiquement en fonction du champ titre
code final :

from django.contrib import admin
from django.utils.text import Truncator

from blog.models import Categorie, Article

class ArticleAdmin(admin.ModelAdmin):

    # Configuration de la liste d'articles
    list_display = ('titre', 'categorie', 'auteur', 'date', 'apercu_contenu')
    list_filter = ('auteur', 'categorie', )
    date_hierarchy = 'date'
    ordering = ('date', )
    search_fields = ('titre', 'contenu')
    prepopulated_fields = {'slug': ('titre',)} ## ++

    # Configuration du formulaire d'édition
    fieldsets = (
        # Fieldset 1 : meta-info (titre, auteur…)
        ('Général', {
            'classes': ['collapse', ], # rend l'ensemble masqué (à dérouler)
            'fields': ('titre', 'slug', 'auteur', 'categorie') # ++ ajout de slug
        }),
        # Fieldset 2 : contenu de l'article
        ('Contenu de l\'article', {
            'description': 'Le formulaire accepte les balises HTML. Utilisez-les à bon escient !',
            'fields': ('contenu', )
        }),
    )

    # Colonnes personnalisées
    def apercu_contenu(self, article):
        """ 
        Retourne les 40 premiers caractères du contenu de l'article, 
        suivi de points de suspension si le texte est plus long. 
        """
        return Truncator(article.contenu).chars(40, truncate='...')

    # En-tête de notre colonne
    apercu_contenu.short_description = 'Aperçu du contenu'

admin.site.register(Categorie)
admin.site.register(Article, ArticleAdmin)


## -- LES FORMULAIRES -- ##

## - Créer un formulaire

+ créer, dans chaque application, un fichier forms.py dans lequel nous écrirons nos formulaires
+ Un formulaire hérite de la classe mère Form  du module django.forms
+ champs et options : https://docs.djangoproject.com/en/stable/ref/forms/fields/#built-in-field-classes
# forms.py
from django import forms

class ContactForm(forms.Form):
    sujet = forms.CharField(max_length=100) # enregistre toujours du texte, remplace TextField
    message = forms.CharField(widget=forms.Textarea)
    # les widgets * transforment le code HTML pour le rendre plus adapté à la situation actuelle
    envoyeur = forms.EmailField(label="Votre adresse e-mail")
    # label permet de modifier le nom de la boîte de saisie
    renvoi = forms.BooleanField(help_text="Cochez si vous souhaitez obtenir une copie du mail envoyé.", 
                                required=False) # case à cocher
    # help_text permet d’ajouter un petit texte d’aide concernant le champ

* autres widgets (tous également dans django.forms) : 
    - PasswordInput  (pour cacher le mot de passe)
    - DateInput  (pour entrer une date)
    - CheckboxInput  (pour avoir une case à cocher), etc.
    - https://docs.djangoproject.com/en/stable/ref/forms/widgets/#built-in-widgets
* Le champ s’assurera que ce qu’a entré l’utilisateur est valide. 
* En revanche, tout ce qui se rapporte à l’apparence du champ concerne les widgets

## - Utiliser un formulaire dans une vue

+ L’attribut method de l’objet request passé à la vue indique le type de requête
+ Les données envoyées par l’utilisateur via une requête POST sont accessibles
sous forme d’un dictionnaire depuis request.POST
+ Une vue qui utilise un formulaire suit la plupart du temps une certaine procédure :
# views.py
from .forms import ContactForm # correspond à forms.py

def contact(request):
    # Construire le formulaire, soit avec les données postées,
    # soit vide si l'utilisateur accède pour la première fois
    # à la page.
    form = ContactForm(request.POST or None)
    # Nous vérifions que les données envoyées sont valides
    # Cette méthode renvoie False s'il n'y a pas de données 
    # dans le formulaire ou qu'il contient des erreurs.
    if form.is_valid(): 
        # Ici nous pouvons traiter les données du formulaire
        sujet = form.cleaned_data['sujet']
        message = form.cleaned_data['message']
        envoyeur = form.cleaned_data['envoyeur']
        renvoi = form.cleaned_data['renvoi']

        # Nous pourrions ici envoyer l'e-mail grâce aux données 
        # que nous venons de récupérer
        envoi = True
    
    # Quoiqu'il arrive, on affiche la page du formulaire.
    return render(request, 'blog/contact.html', locals())

# urls.py
path('contact/', views.contact, name='contact'),

+ Si le formulaire est valide, un nouvel attribut de l’objet form est apparu, 
pour accéder aux données : cleaned_data
+ Ce dernier va renvoyer un dictionnaire contenant comme clés les noms de vos différents champs 
et comme valeurs les données validées de chaque champ.
>>> form.cleaned_data["sujet"]
"Le super sujet qui a été envoyé"
+ si le formulaire est faux, il n’est pas remis à zéro par Django ! 
Si les données sont fausses, nous retournons encore une fois le template avec le formulaire invalide

# création du template :
{% if envoi %}Votre message a bien été envoyé !{% endif %}

<form action="{% url "contact" %}" method="post">
    {% csrf_token %} # empêche les attaques de type CSRF (Cross-site request forgery)
    {{ form.as_p }} # form retranscrit sous la forme d’une suite de paragraphes (as <p></p>) *
    <input type="submit" value="Submit" />
</form>

* il pourrait tout aussi bien le générer sous la forme d’un tableau grâce à la méthode as_table,  
ou sous la forme d’une liste grâce à as_ul
+ ces méthodes ajoutent aussi les messages d’erreur lorsqu’un champ n’est pas correct !

## - Créer ses propres règles de validation

+ deux méthodes : soit le filtre ne s’applique qu’à un seul champ et ne dépend pas des autres, 
soit le filtre dépend des données des autres champs
+ Pour la première méthode, il faut ajouter une méthode à la classe ContactForm
du formulaire dont le nom doit obligatoirement commencer par clean_, 
puis être suivi par le nom de la variable du champ.
+ Pour filtrer le champ message, il faut ajouter une méthode semblable à celle-ci :
def clean_message(self):
    message = self.cleaned_data['message']
    if "pizza" in message:
        raise forms.ValidationError("On ne veut pas entendre parler de pizza !")
        # il est important d’utiliser l’exception forms.ValidationError
    return message  # Ne pas oublier de renvoyer le contenu du champ traité

+ rejeter que les messages qui possèdent le mot « pizza » dans le message ET dans le sujet
+ Étant donné que la validation dépend de plusieurs champs en même temps, 
nous devons écraser la méthode clean héritée de la classe mère Form :
def clean(self):
    cleaned_data = super(ContactForm, self).clean() # appelle la méthode clean héritée de Form
    # Appeler la méthode mère permet au framework de vérifier tous les champs comme d’habitude 
    # pour s’assurer que ceux-ci sont corrects
    # La méthode mère clean va également renvoyer un dictionnaire avec toutes les données valides
    sujet = cleaned_data.get('sujet') # renvoie la valeur d’une clé si elle existe, et renvoie None sinon
    message = cleaned_data.get('message')

    if sujet and message:  # Est-ce que sujet et message sont valides ?
        if "pizza" in sujet and "pizza" in message:
            raise forms.ValidationError(
                "Vous parlez de pizzas dans le sujet ET le message ? Non mais ho !"
            )

    return cleaned_data  # N'oublions pas de renvoyer les données si tout est OK

Pb : le message d’erreur est tout en haut et n’est plus lié aux champs qui n’ont pas passé la vérification. 
Si sujet et message étaient les derniers champs du formulaire, 
le message d’erreur serait tout de même tout en haut. 
Pour éviter cela, il est possible d’assigner une erreur à un champ précis :
def clean(self):
    cleaned_data = super(ContactForm, self).clean()
    sujet = cleaned_data.get('sujet')
    message = cleaned_data.get('message')

    if sujet and message:  # Est-ce que sujet et message sont valides ?
        if "pizza" in sujet and "pizza" in message:
            # si les deux champs contiennent le mot « pizza », 
            # nous ne renvoyons plus une exception, mais nous ajoutons une erreur
            # l’appel à cette méthode a pour effet de supprimer le message des données "valide" 
            # et donc d’empêcher toute nouvelle validation de ce champ
            self.add_error("message", 
                "Vous parlez déjà de pizzas dans le sujet, "
                "n'en parlez plus dans le message !"
            )
            # on peut également spécifier comme deuxième paramètre de la méthode 
            # une instance de forms.ValidationError, comme utilisé précédemment
    return cleaned_data


## - Des formulaires à partir de modèles

ModelForm = formulaires générés automatiquement à partir d’un modèle
Dans le chapitre sur les modèles, nous avons créé une classe Article :
class Article(models.Model):
    titre = models.CharField(max_length=100)
    auteur = models.CharField(max_length=42)
    slug = models.SlugField(max_length=100)
    contenu = models.TextField(null=True)
    date = models.DateTimeField(default=timezone.now, verbose_name="Date de parution")
    categorie = models.ForeignKey(Categorie)
    
    def __str__(self):
        return self.titre

Pour faire un formulaire à partir de ce modèle, c’est très simple :
from django import forms
from .models import Article

class ArticleForm(forms.ModelForm):
    class Meta:
        model = Article
        fields = '__all__' # permet de spécifier des informations supplémentaires

Une fonctionnalité très pratique des ModelForm est qu’il n’y a pas besoin d’extraire 
les données une à une pour créer ou mettre à jour un modèle. 
En effet, il fournit directement une méthode save() qui va mettre à jour la base de données toute seule.
Petit exemple via la console :
>>> from blog.models import Article, Categorie
>>> from blog.forms import ArticleForm
>>> donnees = {
... 'titre': "Les crêpes c'est trop bon",
... 'slug': "les-crepes-cest-trop-bon",
... 'auteur': "Maxime",
... 'contenu': "Vous saviez que les crêpes bretonnes c'est trop bon ? La pêche c'est nul à côté.",
... 'categorie': Categorie.objects.all()[0].id  # Nous prenons l'identifiant de la première catégorie disponible
... }
>>> form = ArticleForm(donnees)
>>> Article.objects.all()
[]
>>> form.save()
<Article: Les crêpes c est trop bon>
>>> Article.objects.all()
<QuerySet [<Article: Les crêpes c est trop bon>]>

* De la même façon, il est possible de mettre à jour une entrée très simplement. 
En donnant un objet du modèle sur lequel le ModelForm  est basé, 
il peut directement remplir les champs du formulaire 
et mettre l’entrée à jour selon les modifications de l’utilisateur.
Pour ce faire, dans une vue, il suffit d’appeler le formulaire ainsi :
form = ArticleForm(instance=article)  
# article est bien entendu un objet d'Article quelconque dans la base de données

* Une fois les modifications du formulaire envoyées depuis une requête POST, 
il suffit de reconstruire un ArticleForm à partir de l’article 
et de la requête et d’enregistrer les changements si le formulaire est valide :
form = ArticleForm(request.POST, instance=article)
if form.is_valid():
    form.save() # l’entrée est désormais à jour

* Pour que certains champs ne soient pas éditables par vos utilisateurs, 
il est possible d’en sélectionner ou d’en exclure certains, toujours grâce à la sous-classe Meta  :
class ArticleForm(forms.ModelForm):
    class Meta:
        model = Article
        exclude = ('auteur','categorie','slug')  
        # Exclura les champs nommés « auteur », « categorie » et « slug »
* Cela revient à sélectionner uniquement les champs titre  et contenu, comme ceci, avec fields  :
class ArticleForm(forms.ModelForm):
    class Meta:
        model = Article
        fields = ('titre','contenu',)
        # permet également de déterminer l’ordre des champs

* lors de la création d’une nouvelle entrée, 
si certains champs obligatoires du modèle (ceux qui n’ont pas null=True  comme argument) 
ont été exclus, il ne faut pas oublier de les rajouter par la suite. 
* Il ne faut donc pas appeler la méthode save() telle quelle sur un ModelForm avec des champs exclus,
sinon Django lèvera une exception. 
Un paramètre spécial de la méthode save() a été prévu pour cette situation :
>>> from blog.models import Article, Categorie
>>> from blog.forms import ArticleForm
>>> donnees = {
... 'titre':"Un super titre d'article !",
... 'contenu':"Un super contenu ! (ou pas)"
... }
>>> form = ArticleForm(donnees)  # Pas besoin de spécifier les autres champs, ils ont été exclus
>>> article = form.save(commit=False)  # Ne sauvegarde pas directement l'article dans la base de données
>>> article.categorie = Categorie.objects.all()[0]  # Nous ajoutons les attributs manquants
>>> article.auteur = "Mathieu"
>>> article.save()


## -- LA GESTION DES FICHIERS -- ##

## - Enregistrer une image

+ installer la bibliothèque Pillow
+ pip install pillow
* ex. : un répertoire de contacts dans lequel les contacts ont trois caractéristiques : 
leur nom, leur adresse et une photo
+ créer un nouveau modèle dans une application 
# ici blog/models
class Contact(models.Model):
    nom = models.CharField(max_length=255)
    adresse = models.TextField()
    photo = models.ImageField(upload_to="photos/") # contiendra une image
    # enregistrera l'image dans le dossier enregistré dans MEDIA_ROOT + / photos
    # ex. mon_projet/media/photos/mon_fichier.jpeg
    
    def __str__(self):
           return self.nom

* ImageField prend en outre l’argument : upload_to. 
Ce paramètre permet de désigner l’endroit où seront enregistrées sur le disque dur 
les images assignées à l’attribut photo pour toutes les instances du modèle.
* le répertoire indiqué depuis le paramètre sera ajouté au chemin absolu 
fourni par la variable MEDIA_ROOT dans votre settings.py
* Il est impératif de configurer correctement cette variable
avant de commencer à jouer avec des fichiers, 
avec par exemple MEDIA_ROOT = os.path.join(BASE_DIR, 'media/')
# Cette ligne ajoute le dossier media/ à la racine du projet
# Si vous ne spécifiez pas de valeur à upload_to, 
# les images seront enregistrées à la racine de MEDIA_ROOT

+ Afin d’avoir une vue permettant de créer un nouveau contact, il faudra créer un formulaire adapté
# blog/forms
class NouveauContactForm(forms.Form):
    nom = forms.CharField()
    adresse = forms.CharField(widget=forms.Textarea)
    photo = forms.ImageField()

# blog/views.py
from .forms import ContactForm, NouveauContactForm # ++
from .models import Article, Contact # ++

def nouveau_contact(request):
    sauvegarde = False
    form = NouveauContactForm(request.POST or None, request.FILES)
    # tous tous les fichiers sélectionnés sont envoyés dans
    # le dictionnaire request.FILES
    if form.is_valid():
        contact = Contact()
        contact.nom = form.cleaned_data["nom"]
        contact.adresse = form.cleaned_data["adresse"]
        contact.photo = form.cleaned_data["photo"]
        contact.save()
        sauvegarde = True

    return render(request, 'blog/nouveau-contact.html', {
        'form': form,
        'sauvegarde': sauvegarde
    })

# blog/urls.py
path('nouveau-contact/', views.nouveau_contact, name='nouveau-contact')

* Le champ ImageField renvoie une variable du type UploadedFile, 
qui est une classe définie par Django
* Si vous souhaitez créer une entrée en utilisant une photo sur votre disque dur, 
vous devrez créer un objet File, prenant un fichier ouvert classiquement, et le passer à votre modèle.
Exemple depuis la console :
>>> from blog.models import Contact
>>> from django.core.files import File
>>> c = Contact(nom="Jean Dupont", adresse="Rue Neuve 34, Paris")
>>> c.photo = File(open('/mon/projet/media/photos/dupont.jpg', 'rb'))
>>> c.save()

+ le template contenant le formulaire : 
# blog/template/blog/nouveau-contact.html
<h1>Ajouter un nouveau contact</h1>

{% if sauvegarde %}
    <p>Ce contact a bien été enregistré.</p>
{% endif %}
   
<p>
    <form method="post" enctype="multipart/form-data" action=".">
    # ne pas oublier enctype !
       {% csrf_token %}
       {{ form.as_p }}
       <input type="submit"/>
    </form>
</p>

+ pour utiliser le nouveau modèle :
python manage.py makemigrations
python manage.py migrate
python manage.py runserver

+ le dossier mon_projet/media/photos vient d'être' créé !

## - Afficher une image

Par défaut, Django ne s’occupe pas du service de fichiers média (images, musiques, vidéos…), 
et généralement, il est conseillé de laisser un autre serveur s’en occuper 
(voir l’annexe sur le déploiement du projet en production)

* pour la phase de développement, 
il est tout de même possible de laisser le serveur de développement s’en charger
+ compléter la variable MEDIA_URL dans settings.py
# mon_projet/mon_projet/settings.py
MEDIA_URL = '/media/'
+ ajouter cette directive dans votre urls.py global :
# mon_projet/mon_projet/urls.py
from django.conf.urls.static import static
from django.conf import settings

urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
# tous les fichiers consignés dans le répertoire MEDIA_ROOT
# (dans lequel Django place les fichiers enregistrés) 
# seront accessibles depuis l’adresse, comme indiquée depuis MEDIA_URL

+ rajouter une vue
# crepes_bretonnes\blog\views.py
def voir_contacts(request):
    return render(
        request,
        'blog/voir_contacts.html',
        {'contacts': Contact.objects.all()}
    )

# crepes_bretonnes\blog\templates\blog\voir_contacts.html
<h1>Liste des contacts</h1>
{% for contact in contacts %}
    <h2>{{ contact.nom }}</h2>
    Adresse : {{ contact.adresse|linebreaks }}<br/>
    <img src="{{ contact.photo.url }}"/>
{% endfor %}

* le tag linebreaks = autorise l’ajout de retours à la ligne en HTML
* Chaque fichier dans Django a un attribut url, 
en lecture seule, renvoyant l’URL complète vers le fichier
* la variable ImageField possède deux attributs supplémentaires = width et height

# crepes_bretonnes\blog\urls.py
path('voir_contacts/', views.voir_contacts, name='liste-contacts'),

## - Aller plus loin

* Pour uploader un fichier, au lieu d’utiliser ImageField dans les formulaires 
et modèles, il faut utiliser le champ plus générique FileField :
* FileField retournera toujours un objet de type django.core.files.File
* possède les attributs :
>>> from blog.models import Contact
>>> c = Contact.objects.get(nom="Chuck Norris")
>>> c.photo.name
'photos/chuck_norris.jpg'  # Chemin relatif vers le fichier à partir de MEDIA_ROOT
>>> c.photo.path
'/home/user/crepes_bretonnes/media/photos/chuck_norris.jpg'  # Chemin absolu
>>> c.photo.url
'http://media.crepes-bretonnes.com/photos/chuck_norris.jpg'  
# URL telle que construite à partir de MEDIA_URL
>>> c.photo.size
45300  # Taille du fichier en bytes

* un objet File possède également des méthodes read() et write()
* il est possible de renommer les noms de fichier à notre guise, 
et de ne pas garder le nom que l’utilisateur avait sur son disque dur
* Au lieu de passer une chaîne de caractères comme paramètre upload_to dans le modèle, 
il faut lui passer une fonction qui retournera le nouveau nom du fichier
* Cette fonction prend deux arguments : 
    - l’instance du modèle où le FileField est défini, 
    - et le nom d’origine du fichier
Un exemple de fonction serait donc simplement :
def renommage(instance, nom_fichier):
    return "{}-{}".format(instance.id, nom_fichier)
# notre fonction préfixe le nom de fichier par l’identifiant unique de l’instance de modèle en cours
Un exemple de modèle utilisant cette fonction serait donc simplement :
class Document(models.Model):
    nom = models.CharField(max_length=100)
    doc = models.FileField(upload_to=renommage, verbose_name="Document")


## -- TP: UN RACCOURCISSEUR D'URL -- ##

## - Cahier des charges

+ créer une nouvelle application nommée mini_url
+ Cette application ne contiendra qu’un modèle appelé MiniURL ; 
c’est lui qui enregistrera les raccourcis
Il comportera les champs suivants :
- l’URL longue : URLField ; # paramètre unique=True
- le code qui permet d’identifier le raccourci ; # paramètre unique=True
- la date de création du raccourci ;
- le pseudo du créateur du raccourci (optionnel) ;
- le nombre d’accès au raccourci (une redirection = un accès)
# le nombre d’accès sera par défaut mis à 0 grâce au paramètre default=0
+ créer un formulaire, plus spécialement un ModelForm basé sur le modèle MiniURL
+ Il ne contiendra que les champs URL et pseudo, 
le reste sera soit initialisé selon les valeurs par défaut, 
soit généré par la suite (le code notamment)
* la fonction qui permet de générer le code :
import random
import string

def generer(nb_caracteres):
    caracteres = string.ascii_letters + string.digits
    aleatoire = [random.choice(caracteres) for _ in range(nb_caracteres)]
    
    return ''.join(aleatoire)
+ Vous aurez ensuite trois vues :
- une vue affichant toutes les redirections créées et leurs informations, 
triées par ordre descendant, de la redirection avec le plus d’accès vers celle en ayant le moins ;
- une vue avec le formulaire pour créer une redirection ;
- une vue qui prend comme paramètre dans l’URL le code et redirige l’utilisateur vers l’URL longue.
+ il ne faudra que 2 templates (la redirection n’en ayant pas besoin), et 3 routages d’URL
+ L’administration devra être activée, et le modèle accessible depuis celle-ci
+ Il devra être possible de rechercher des redirections depuis la longue URL via une barre de recherche,
tous les champs devront être affichés dans une catégorie, 
et le tri par défaut sera fait selon la date de création du raccourci

## - Réalisation 

1) python manage.py startapp mini_url

2) ajouter l''application au projet 
# settings.py 
INSTALLED_APPS = [
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
    'blog', 
    'mini_url', # ++
]

3) crepes_bretonnes\mini_url\models.py
from django.db import models
import random
import string

class MiniURL(models.Model):
    url = models.URLField(verbose_name="URL à réduire", unique=True)
    code = models.CharField(max_length=6, unique=True)
    date = models.DateTimeField(auto_now_add=True, 
                                verbose_name="Date d'enregistrement")
    pseudo = models.CharField(max_length=255, blank=True, null=True)
    nb_acces = models.IntegerField(default=0, 
                                   verbose_name="Nombre d'accès à l'URL")

    def __str__(self):
        return "[{0}] {1}".format(self.code, self.url)

    # surcharge de la méthode save(), 
    # afin de générer automatiquement le code de notre URL
    def save(self, *args, **kwargs):
        if self.pk is None:
            self.generer(6)
        # la ligne qui appelle le save() parent
        # primordiale pour sauvegarder !
        super(MiniURL, self).save(*args, **kwargs)

    def generer(self, nb_caracteres):
        caracteres = string.ascii_letters + string.digits
        aleatoire = [random.choice(caracteres) for _ in range(nb_caracteres)]

        self.code = ''.join(aleatoire)

    # indiquer des métadonnées concernant le modèle
    # sera utile pour la partie Admin
    class Meta:
        verbose_name = "Mini URL"
        verbose_name_plural = "Minis URL"

4) ajouter les nouveaux modèles dans la base de données 
+ python manage.py makemigrations
+ python manage.py migrate

5) ajouter forms.py 
+ crepes_bretonnes\mini_url\forms.py
from django import forms
from .models import MiniURL

class MiniURLForm(forms.ModelForm):
    class Meta:
        model = MiniURL
        fields = ('url', 'pseudo')

6) crepes_bretonnes\mini_url\admin.py
from django.contrib import admin
from .models import MiniURL

class MiniURLAdmin(admin.ModelAdmin):
    list_display = ('url', 'code', 'date', 'pseudo', 'nb_acces')
    list_filter = ('pseudo', )
    date_hierarchy = 'date'
    ordering = ('date', )
    search_fields = ('url', )

admin.site.register(MiniURL, MiniURLAdmin)

7) ajouter urls.py 
crepes_bretonnes\mini_url\urls.py
from django.conf.urls import url
from . import views

urlpatterns = [
    # Une string vide indique la racine
    url(r'^$', views.liste, name='url_liste'),
    url(r'^nouveau$', views.nouveau, name='url_nouveau'),
    # (?P<code>\w{6}) capturera 6 caractères alphanumériques. 
    url(r'^(?P<code>\w{6})/$', views.redirection, name='url_redirection'),
]

8) l'importer dans urls.py
from django.conf.urls import url
url(r'^m/', include('mini_url.urls')),

9) crepes_bretonnes\mini_url\views.py
from django.shortcuts import redirect, get_object_or_404, render
from mini_url.models import MiniURL
from mini_url.forms import MiniURLForm


def liste(request):
    """ Affichage des redirections """
    minis = MiniURL.objects.order_by('-nb_acces')
    # listé par ordre descendant

    return render(request, 'mini_url/liste.html', locals())


def nouveau(request):
    """ Ajout d'une redirection """
    if request.method == "POST":
        form = MiniURLForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect(liste)
    else:
        form = MiniURLForm()

    return render(request, 'mini_url/nouveau.html', {'form': form})


def redirection(request, code):
    """ Redirection vers l'URL enregistrée """
    mini = get_object_or_404(MiniURL, code=code)
    mini.nb_acces += 1
    mini.save()

    return redirect(mini.url, permanent=True)

10) créer les templates
+ créer le dossier templates\mini_url\
+ crepes_bretonnes\mini_url\templates\mini_url\liste.html
<h1>Le raccourcisseur d'URL spécial crêpes bretonnes !</h1>

<p><a href="{% url 'url_nouveau' %}">Raccourcir une URL.</a></p>

<p>Liste des URL raccourcies :</p>
<ul>
    {% for mini in minis %}
    <li> {{ mini.url }} via <a href="http://{{ request.get_host }}{% url 'url_redirection' 
    mini.code %}">{{ request.get_host }}{% url 'url_redirection' mini.code %}</a>
    # url_redirection réfère au path de mini_url/urls.py
    {% if mini.pseudo %}par {{ mini.pseudo }}{% endif %} ({{ mini.nb_acces }} accès)</li>
    {% empty %}
    <li>Il n'y en a pas actuellement.</li>
    {% endfor %}
</ul>

+ crepes_bretonnes\mini_url\templates\mini_url\nouveau.html
<h1>Raccourcir une URL</h1>

<form method="post" action="{% url 'url_nouveau' %}">
    {% csrf_token %}
    {{ form.as_p }} # form retranscrit sous la forme d’une suite de paragraphes
    <input type="submit"/>
</form>


## -- LES VUES GENERIQUES -- ##

* Sur la plupart des sites web, il existe certains types de pages où créer une vue, 
est lourd et presque inutile : pour une page statique sans informations dynamiques, 
ou encore de simples listes d’objets sans traitements particuliers.

## - Premiers pas avec des pages statiques

* exemple de vue classique, qui ne s’occupe que d’afficher un template à l’utilisateur, 
sans utiliser de variables :
# views
from django.shortcuts import render

def faq(request):
    return render(request, 'blog/faq.html', {})

# urls
url('faq', views.faq, name='faq'),

* Une première caractéristique des vues génériques = ce ne sont pas des fonctions, 
comme la vue que nous venons de présenter, mais des classes.
* Il existe deux méthodes principales d’utilisation pour les vues génériques :
    - soit nous créons une classe, héritant d’un type de vue générique dont nous surchargerons 
    les attributs ;
    - soit nous appelons directement la classe générique, 
    en passant en arguments les différentes informations à utiliser.
* Toutes les classes de vues génériques sont situées dans django.views.generic
* premier type de vue générique = TemplateView
# permet, comme son nom l’indique, de créer une vue qui s’occupera du rendu d’un template

+ créer une classe héritant de TemplateView, et surchargeons ses attributs :
# \crepes_bretonnes\blog\views.py
from django.views.generic import TemplateView

class FAQView(TemplateView):
   template_name = "blog/faq.html" # chemin vers le template à afficher

+ router notre URL vers une méthode héritée de la classe TemplateView, 
nommée as_view  :
# crepes_bretonnes\blog\urls.py
from django.conf.urls import patterns, url, include
from . import views  # N'oubliez pas d'importer les vues

urlpatterns = [
   url(r'^faq$', views.FAQView.as_view()), 
   # Nous demandons la vue correspondant à la classe FAQView
]

+ crepes_bretonnes\blog\templates\blog\faq.html
<h1>FAQ</h1>
# s'affiche à http://127.0.0.1:8000/blog/faq

* la méthode as_view  de FAQView  retourne une vue (il s’agit d’une fonction classique) 
qui se basera sur ses attributs pour déterminer son fonctionnement
# ici, cette vue est remplacé par faq.html 

* Seconde méthode = instancier directement TemplateView dans le fichier urls.py, 
en lui passant en argument notre template_name
# crepes_bretonnes\blog\urls.py
from django.conf.urls import patterns, url, include
from django.views.generic import TemplateView  # L'import a changé, attention !

urlpatterns = [
   url(r'^faq', TemplateView.as_view(template_name='blog/faq.html')),
]

+ retirer FAQView, la classe ne sert plus à rien
