## ---------- MEMENTO DJANGO ---------- ##


## -- RESSOURCES -- ##

https://realpython.com/tutorials/django/



## -- GITHUB -- ##

1. initialiser le repo
2. cloner le repo
3. créer un environnement virtuel dans le repo
4. lancer l'environnement virtuel', installer django
dossier_projet/
    env/
    projet_django/
* le fichier settings.py renferme de nombreuses informations privées
+ créer settings.py.dist ou settings_public.py
+ créer un gitignore à la racine du projet
* un gitignore exhaustif : # https://github.com/github/gitignore/blob/master/Python.gitignore
* créer son gitignore:  # http://gitignore.io/api/django
*!* à ne jamais sauvegarder en clair :
- SECRET_KEY
- DATABASES
* Une bonne pratique consiste à avoir une clé secrète différente en développement et en production
+ créer un requirements.txt
"""
pour installer les dépendances listées dans requirements.txt :
pip install -r requirements.txt 
"""


## -- BONS PLANS -- ##

django-shortcuts: https://pypi.org/project/django-shortcuts/
python manage.py makemigrations
python manage.py migrate
python manage.py runserver


## -- BONNES PRATIQUES -- ##

* préférer timezone à datetime

* reverse() : préférer les noms de motifs d'URL' à l'objet' de la vue
# exemple :
from news import views
path('archive/', views.archive, name='news-archive')
# using the named URL
reverse('news-archive')
# passing a callable object
# (This is discouraged because you can't reverse namespaced views this way.)
from news import views
reverse(views.archive)
# avec des *args :
reverse('arch-summary', args=[1945])
# avec des **kwargs :
reverse('admin:app_list', kwargs={'app_label': 'auth'})

* """
PostgreSQL is the most capable of all the databases here in terms of schema support; 
the only caveat is that adding columns with default values will cause a full rewrite of the table, 
for a time proportional to its size.
For this reason, it’s recommended you always create new columns with null=True, 
as this way they will be added immediately.
"""

## -- LEXIQUE -- ##

# *args & **kwargs
**kwargs = les arguments nommés dans l’URL (arguments nominatifs)
**kwargs = pour faire passer une variable indéfinie, associée à une clé
**kwargs allows you to pass keyworded variable length of arguments to a function. 
You should use **kwargs if you want to handle named arguments in a function.
*args = faire passer une variable indéfinie, sans clé, dans une fonction

# HttpRequest & HttpResponse
Lorsqu’une page est demandée, Django crée un objet "HttpRequest" 
contenant des métadonnées au sujet de la requête. 
Puis, Django charge la vue appropriée, lui transmettant l’objet "HttpRequest" comme premier paramètre. 
Chaque vue est responsable de renvoyer un objet "HttpResponse"

# reverse_lazy()
une version de reverse() à exécution différée


## -- INSTALLATION -- ##

# créer un environnement virtuel
# se placer dans le dossier principal
py - 3.7 - m venv env  # -m pour module
aller dans env/Scripts/
dans le terminal: source activate
on est dans l'environnement virtuel'
which pip pour vérifier si on est dans un environnement virtuel
deactivate pour en sortir

# installer Django (en global et/ou dans le dossier qui compte le dossier env)
ouvrir en Administrateur
pip install Django==2.2 

# vérifier si l'install s'est bien passé
ouvrir une nouvelle fenêtre
python -i
>>> import django
>>> django.get_version()
'2.2'

# VS Code et les environnements virtuels
VS Code gère les environnements virtuels
il suffit de lancer le projet dans VS Code
se placer dans le projet + taper: code . dans git bash
ou copier-glisser le projet sur l'icône' VS du bureau


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

# INSTALLER POSTGRESQL
https: // www.digitalocean.com/community/tutorials/how-to-use-postgresql-with-your-django-application-on-ubuntu-14-04
+ pip install psycopg2
psycopg2 est le driver qui connecte à PostgreSQL depuis Python
+ télécharger postgreSQL
psql pour entrer dans la console postgreSQL
\q pour en sortir
* Si vous souhaitez utiliser une interface graphique, 
autrement dit un logiciel pour visualiser les tables, installez pgAdmin
https://www.pgadmin.org/download/

DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.postgresql_psycopg2', # on utilise l'adaptateur postgresql
        'NAME': 'crepes', # le nom de notre base de donnees creee precedemment
        'USER': 'postgres', # nom d'utilisateur, par défaut postgres
        'PASSWORD': '*****',
        'HOST': 'localhost',
        'PORT': '5432',
    }
}

+ python manage.py migrate

# FAIRE UNE MIGRATION SUR POSTGRES (AVEC DATA)
https://dev.to/coderasha/how-to-migrate-data-from-sqlite-to-postgresql-in-django-182h

0. Sauvegarder la BDD existante (en cas de problème)
0.1. Créer la Base de données équivalente sur PostgreSQL
1. Dump existing data :
python manage.py dumpdata > datadump.json
# enregistre toutes les données d’applications ou de modèles spécifiques contenues
# dans votre base de données dans un format texte sérialisé
# dans mon_projet/datadump.json
# équivalent d'un copier-coller (plutôt que couper-coller)
2. change settings.py :
DATABASES = {
    'default': {
        # on utilise l'adaptateur postgresql
        'ENGINE': 'django.db.backends.postgresql_psycopg2',
        'NAME': 'crepes',  # le nom de notre base de donnees creee precedemment
        'USER': 'postgres',  # nom d'utilisateur, par défaut postgres
        'PASSWORD': '*****',
        'HOST': 'localhost',
        'PORT': '5432',
    }
}
3. Lancer pgAdmin
4. python manage.py migrate --run-syncdb
# permet de créer les tables des applications sans migrations
5. python manage.py shell
>>> from django.contrib.contenttypes.models import ContentType
>>> ContentType.objects.all().delete()
>>> quit()
6. python manage.py loaddata datadump.json
# Enregistre dans la base de données les fixtures passées en argument
7. TADAM !

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

# as
Dans certains cas, il peut être souhaitable de se référer à la valeur actuelle du cycle 
sans passer à la valeur suivante. 
Pour cela, donnez un nom à la balise {% cycle %} via « as », comme ceci :
{% cycle 'row1' 'row2' as rowcolors %}

À partir de cet instance, vous pouvez insérer la valeur actuelle du cycle chaque fois 
que vous en avez besoin dans votre gabarit en vous référant au nom du cycle comme variable de contexte. 
Si vous souhaitez faire passer le cycle à la prochaine valeur indépendamment de la balise cycle d’origine, 
vous pouvez utiliser une autre balise cycle et indiquer le nom de la variable. 
Ainsi, le gabarit suivant :
<tr>
    <td class="{% cycle 'row1' 'row2' as rowcolors %}">...</td>
    <td class="{{ rowcolors }}">...</td>
</tr>
<tr>
    <td class="{% cycle rowcolors %}">...</td>
    <td class="{{ rowcolors }}">...</td>
</tr>

affichera :
<tr>
    <td class="row1">...</td>
    <td class="row1">...</td>
</tr>
<tr>
    <td class="row2">...</td>
    <td class="row2">...</td>
</tr>


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

{% url 'some-url-name' v1 v2 %} # paramètres positionnels
{% url 'some-url-name' arg1=v1 arg2=v2 %} # syntaxe par mot-clé

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
path('faq', views.faq, name='faq'),

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
from django.urls import path, re_path
from . import views  # N'oubliez pas d'importer les vues

urlpatterns = [
   re_path(r'^faq$', views.FAQView.as_view()), 
   # Nous demandons la vue correspondant à la classe FAQView
   # path('faq', TemplateView.as_view(template_name='blog/faq.html')) marche mieux !
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
from django.urls import path, re_path
from django.views.generic import TemplateView  # L'import a changé, attention !

urlpatterns = [
   re_path(r'^faq', TemplateView.as_view(template_name='blog/faq.html')),
   # path('faq', TemplateView.as_view(template_name='blog/faq.html')) marche mieux !
]

+ retirer FAQView, la classe ne sert plus à rien

## - Lister et afficher des données

* ex. : vous avez une liste d’objets (des articles, des images, etc.), 
et lorsque vous cliquez sur un élément, vous êtes redirigé vers une page présentant 
plus en détail ce même élément
* nous utiliserons deux nouvelles classes : ListView  et DetailView
* nous réutiliserons les deux modèles Article et Categorie

# Une liste d’objets en quelques lignes avec ListView
À l’instar de TemplateView, nous pouvons utiliser ListView
directement en lui passant en paramètre le modèle à traiter :
# crepes_bretonnes\blog\urls.py
from django.urls import path
from django.views.generic import TemplateView, ListView  # ++
from . import views
from .models import Article # ++

urlpatterns = [
    # Nous allons réécrire l'URL de l'accueil
    path('', ListView.as_view(model=Article,)),

    # path('', views.accueil, name='accueil'),
    path('article/<int:id>-<slug:slug>', views.lire, name='lire'),
    path('contact/', views.contact, name='contact'),
    path('nouveau-contact/', views.nouveau_contact, name='nouveau-contact'),
    path('voir_contacts/', views.voir_contacts, name='liste-contacts'),
    path('faq', TemplateView.as_view(
        template_name='blog/faq.html')),
]

* Avec cette méthode, Django impose quelques conventions :
- Le template devra s’appeler <app>/<model>_list.html. 
Dans notre cas, le template serait nommé blog/article_list.html.
- L’unique variable retournée par la vue générique et utilisable dans le template 
est appelée object_list, et contiendra ici tous nos articles.
* Il est possible de redéfinir ces valeurs en passant des arguments supplémentaires à notre ListView  :
urlpatterns = [
    path('', ListView.as_view(model=Article,
                    context_object_name="derniers_articles",
                    template_name="blog/accueil.html")),
    ...
]
+ supprimer la fonction accueil() dans views.py
# même résultat qu'avant !
* L’ordre d’affichage des articles est celui défini dans le modèle, 
via l’attribut ordering de la sous-classe Meta

# filter les articles affichés
* plusieurs attributs et méthodes de ListView étendent les possibilités de la vue
* Par souci de lisibilité, il est conseillé de renseigner les classes dans views.py
+ changeons notre urls.py pour appeler notre nouvelle classe :
# crepes_bretonnes\blog\urls.py
# l'appel se fait via la fonction as_view, comme vu tout à l'heure
    path('', views.ListeArticles.as_view(), name="blog_liste"),
+ créons notre classe qui reprendra les mêmes attributs que notre ListView  de tout à l’heure :
# crepes_bretonnes\blog\views.py
from django.views.generic import TemplateView, ListView # ++

class ListeArticles(ListView):
    model = Article
    context_object_name = "derniers_articles"
    template_name = "blog/accueil.html"

+ pour paginer nos résultats (afficher que 5 articles par page) :
class ListeArticles(ListView):
    model = Article
    context_object_name = "derniers_articles"
    template_name = "blog/accueil.html"
    paginate_by = 5

+ soumettre nos propres filtres :
class ListeArticles(ListView):
    model = Article
    context_object_name = "derniers_articles"
    template_name = "blog/accueil.html"
    paginate_by = 5
    queryset = Article.objects.filter(categorie__id=1)

+ il est également possible de passer des arguments pour rendre la sélection 
un peu plus dynamique en ajoutant l’ID souhaité dans l’URL.
# crepes_bretonnes\blog\urls.py
from django.urls import path
from django.views.generic import TemplateView, ListView  # ++
from . import views
from .models import Article # ++

urlpatterns = [
    # Nous allons réécrire l'URL de l'accueil
    path('', views.ListeArticles.as_view(), name="blog_liste"),
    # récupérer les articles par catégories
    path('categorie/<int:id>', views.ListeArticles.as_view(),
            name='blog_categorie'),
    ...
]

# crepes_bretonnes\blog\views.py
class ListeArticles(ListView):
    model = Article
    context_object_name = "derniers_articles"
    template_name = "blog/accueil.html"
    paginate_by = 5 # afficher que 5 articles par page
    # queryset = Article.objects.filter(categorie__id=1)
    # filtre les articles par catégorie
    def get_queryset(self):
        return Article.objects.filter(categorie__id=self.kwargs['id'])


+ ajouter des éléments au contexte, c’est-à-dire les variables qui sont renvoyées au template
* ex. : renvoyer l’ensemble des catégories, afin de faire une liste de liens vers celles-ci
+ ajouter au tableau context une clé categories qui contiendra notre liste :
# crepes_bretonnes\blog\views.py
from .models import Article, Contact, Categorie

class ListeArticles(ListView):
    model = Article
    context_object_name = "derniers_articles"
    template_name = "blog/accueil.html"
    paginate_by = 5 # afficher que 5 articles par page
    # queryset = Article.objects.filter(categorie__id=1)
    # filtre les articles par catégorie
    def get_queryset(self):
        return Article.objects.filter(categorie__id=self.kwargs['id'])

    def get_context_data(self, **kwargs):
        # Nous récupérons le contexte depuis la super-classe
        context = super(ListeArticles, self).get_context_data(**kwargs)
        # Nous ajoutons la liste des catégories, sans filtre particulier
        context['categories'] = Categorie.objects.all()
        return context

+ afficher la liste des catégories dans notre template :
# crepes_bretonnes\blog\templates\blog\accueil.html
<h3>Catégories disponibles</h3>
<ul>
    {% for categorie in categories %}
    <li><a href="{% url "blog_categorie" categorie.id %}">{{ categorie.nom }}</a></li>
    {% endfor %}
</ul>

## - Afficher un article via DetailView

+ but : afficher un article précis
* Le but de DetailView est de renvoyer un seul objet d’un modèle, et non une liste.
* Pour cela, il va falloir passer un paramètre bien précis dans notre URL : 
pk, qui représentera la clé primaire de l’objet à récupérer :
# crepes_bretonnes\blog\urls.py
from . import views

urlpatterns = [
    # Nous allons réécrire l'URL de l'accueil
    path('', views.ListeArticles.as_view(), name="blog_liste"),
    # récupérer les articles par catégories
    path('categorie/<int:id>', views.ListeArticles.as_view(),
            name='blog_categorie'),

    # path('', views.accueil, name='accueil'),
    # path('article/<int:id>-<slug:slug>', views.lire, name='lire'),
    # réupérer la vue détaillée d'un article
    path('article/<int:pk>-<slug:slug>',
         views.LireArticle.as_view(), name='blog_lire'),
    ...
]

+ écrire la classe qui va récupérer l’objet voulu et le renvoyer à un template précis :
# crepes_bretonnes\blog\views.py
from django.views.generic import TemplateView, ListView, DetailView

class LireArticle(DetailView):
    context_object_name = "article"
    model = Article
    template_name = "blog/lire.html"
+ supprimer la fonction lire()
+ corriger les urls 
# crepes_bretonnes\blog\templates\blog\accueil.html
<p><a href="{% url 'blog_lire' pk=article.id slug=article.slug %}">Lire la suite</a>

* Comme pour les ListView, il est possible de personnaliser la sélection avec get_queryset()
afin de ne sélectionner l’article que s’il est public, par exemple
* autre spécificité utile lorsque nous affichons un objet, 
c’est d’avoir la possibilité de modifier un de ses attributs
par exemple son nombre de vues ou sa date de dernier accès
* Pour faire cette opération, il est possible de surcharger la méthode get_object, 
qui renvoie l’objet à afficher :
class LireArticle(DetailView):
    context_object_name = "article"
    model = Article
    template_name = "blog/lire.html"

    def get_object(self):
        # Nous récupérons l'objet, via la super-classe
        article = super(LireArticle, self).get_object()
    
        article.nb_vues += 1  # Imaginons un attribut « Nombre de vues »
        article.save()
    
        return article  # Et nous retournons l'objet à afficher

*  variable request, qui contient les informations sur la requête et l’utilisateur, 
est également disponible dans les vues génériques
* C’est un attribut de la classe, 
que vous pouvez donc appeler dans n’importe quelle méthode via self.request

## - Agir sur les données

* nous reprendrons comme exemple notre application de raccourcissement d’URL 
que nous avons développée lors du chapitre précédent

# - CreateView -

but = création d’objets
+ Pour simplifier notre formulaire d’ajout de liens, nous allons surcharger la classe CreateView  :
# crepes_bretonnes\mini_url\views.py
from django.views.generic import CreateView # ++
from django.urls import reverse_lazy # ++

class URLCreate(CreateView):
    model = MiniURL
    template_name = 'mini_url/nouveau.html'
    form_class = MiniURLForm
    success_url = reverse_lazy(liste)

* reverse_lazy = fonction permet de récupérer l’URL d’une vue à l’exécution 
plutôt qu’à l’initialisation du code 
(nous souhaitons que la valorisation soit effectuée à l’exécution et non à la déclaration des classes,
lors de la validation des modèles par le serveur)
* reverse_lazy renvoie un objet qui ne récupérera l’URL demandée que lors d’un appel explicite, 
dans un template par exemple

* l’attribut model permet de spécifier avec quel modèle nous travaillons
* template_name permet de spécifier le chemin vers le template 
(par défaut, le chemin est <app>/<model>_create_form.html, avec le nom du modèle tout en minuscules)
* form_class, permet de spécifier quel ModelForm utiliser pour définir 
les champs disponibles à l’édition, et tout ce qui est propriété du formulaire
* success_url permet de spécifier vers où rediriger l’utilisateur quand le formulaire est validé et enregistré.
* Le comportement de cette classe est similaire à notre ancienne vue nouveau() : 
s’il n’y a pas eu de requêtes de type POST, 
elle affiche le formulaire, selon les propriétés de form_class, et dans le template fourni.
* Une fois validé et si, et seulement si, le formulaire est considéré comme correct 
(if form.is_valid(), dans notre ancienne vue), alors la méthode save() est appelée sur l’objet généré
par le formulaire, puis elle va rediriger l’utilisateur vers l’URL success_url

+ éditer le fichier urls.py  :
# crepes_bretonnes\mini_url\urls.py
from django.urls import path, re_path
from . import views

urlpatterns = [
    # Une string vide indique la racine
    path('', views.liste, name='url_liste'),
    path('nouveau', views.URLCreate.as_view(), name='url_nouveau'),
    # (?P<code>\w{6}) capturera 6 caractères alphanumériques.
    re_path(r'^(?P<code>\w{6})/$', views.redirection, name='url_redirection'),
]

* Si vous vous rendez sur http://127.0.0.1:8000/m/, 
vous remarquerez que le comportement de la page n’a pas changé. 
En réalité, notre nouvelle vue en fait autant que l’ancienne, mais nous avons écrit sensiblement moins.

# - UpdateView -

but = mise à jour des données
idée = pouvoir changer l’URL ou le pseudo entré
* Il nous faut une nouvelle vue qui va nous permettre de fournir de nouveau ces informations
# crepes_bretonnes\mini_url\views.py
from django.views.generic import CreateView, UpdateView # ++
from django.urls import reverse_lazy

class URLUpdate(UpdateView):
    model = MiniURL
    template_name = 'mini_url/nouveau.html'
    form_class = MiniURLForm
    success_url = reverse_lazy(liste)

* les attributs des classes CreateView et UpdateView sont les mêmes,
et leur fonctionnement est très proche
* entre la création d’un objet et sa mise à jour, la page n’a pas réellement besoin d’être modifiée
* Par défaut, le nom du template attribué à une vue générique de type UpdateView 
est <app>/<model>_update_form.html
+ pour rendre notre template totalement fonctionnel, il faut juste remplacer la ligne
# crepes_bretonnes\mini_url\templates\mini_url\nouveau.html
<form method="post" action="{% url 'url_nouveau' %}">
par 
<form method="post" action="">
* nous utiliserons cette page pour deux types d’actions, ayant deux URL distinctes
* pour soumettre la requête à la même adresse que la page actuelle

+ modifier notre urls.py
# crepes_bretonnes\mini_url\urls.py
* comme pour DetailView, il faut récupérer la clé primaire, appelée pk
re_path(r'^edition/(?P<pk>\d)$', views.URLUpdate.as_view(), name='url_update'),

+ accéder à l’édition d’un objet MiniURL. 
* Pour y accéder, cela se fait depuis les adresses suivantes : /m/edition/1 pour le premier objet, 
/m/edition/2  pour le deuxième, etc.

# Améliorons nos URL avec la méthode get_object()
* idée = prendre le code présent dans l’URL réduite et le rajouter à l'url'
(remplace le pk, primary key)
+ Surchargeons alors la méthode get_object(), qui s’occupe de récupérer l’objet à mettre à jour
# crepes_bretonnes\mini_url\views.py
class URLUpdate(UpdateView):
    model = MiniURL
    template_name = 'mini_url/nouveau.html'
    form_class = MiniURLForm
    success_url = reverse_lazy(liste)

    def get_object(self, queryset=None):
        code = self.kwargs.get('code', None)
        # le dictionnaire self.kwargs contient les arguments nommés dans l’URL
        return get_object_or_404(MiniURL, code=code)
        # renvoie une page d’erreur si jamais le code demandé n’existe pas

+ changer urls.py pour accepter l’argument code
# crepes_bretonnes\mini_url\urls.py
re_path(r'^edition/(?P<code>\w{6})$',
            views.URLUpdate.as_view(), name='url_update')

# Effectuer une action lorsque le formulaire est validé avec form_valid()
* idée = changer le comportement lorsque le formulaire est validé, 
en redéfinissant la méthode form_valid()
* par défaut, elle s’occupe d’enregistrer les modifications et de rediriger l’utilisateur
def form_valid(self, form):
    self.object = form.save()
    # Envoi d'un message à l'utilisateur
    messages.success(self.request, "Votre profil a été mis à jour avec succès.")
    return HttpResponseRedirect(self.get_success_url())

# - DeleteView -

* comme pour UpdateView, cette vue prend un objet et demande la confirmation de suppression
# crepes_bretonnes\mini_url\views.py
from django.views.generic import CreateView, UpdateView, DeleteView

class URLDelete(DeleteView):
    model = MiniURL
    context_object_name = "mini_url"
    template_name = 'mini_url/supprimer.html'
    success_url = reverse_lazy(liste)

    def get_object(self, queryset=None):
        code = self.kwargs.get('code', None)
        return get_object_or_404(MiniURL, code=code)

+ template supprimer.html, 
qui demandera juste à l’utilisateur s’il est sûr de vouloir supprimer, 
et le cas échéant, le redirigera vers la liste
# crepes_bretonnes\mini_url\templates\mini_url\supprimer.html
<h1>Êtes-vous sûr de vouloir supprimer cette URL ?</h1>

<p>{{ mini_url.code }} -&gt; {{ mini_url.url }} (créée le {{ mini_url.date|date:"DATE_FORMAT" }})</p>

<form method="post" action="">
   {% csrf_token %}  <!-- Nous prenons bien soin d'ajouter le csrf_token -->
   <input type="submit" value="Oui, supprime moi ça" /> - <a href="{% url "url_liste" %}">Pas trop chaud en fait</a>
</form>

+ notre ligne en plus dans le fichier urls.py
# crepes_bretonnes\mini_url\urls.py
re_path(r'^supprimer/(?P<code>\w{6})$', views.URLDelete.as_view(), name='url_delete'),

+ deux liens ont été ajoutés dans la liste définie dans le template liste.html, 
afin de pouvoir mettre à jour ou supprimer une URL rapidement :
# crepes_bretonnes\mini_url\templates\mini_url\liste.html
<h1>Le raccourcisseur d'URL spécial crêpes bretonnes !</h1>

<p><a href="{% url "url_nouveau" %}">Raccourcir une URL.</a></p>

<p>Liste des URL raccourcies :</p>
<ul>
    {% for mini in minis %}
    <li>
        <a href="{% url "url_update" mini.code %}">Mettre à jour</a> - 
        <a href="{% url "url_delete" mini.code %}">Supprimer</a>
        | {{ mini.url }} via <a href="http://{{ request.get_host }}{% url "url_redirection" mini.code %}">{{ request.get_host }}{% url "url_redirection" mini.code %}</a>
        {% if mini.pseudo %}par {{ mini.pseudo }}{% endif %} ({{ mini.nb_acces }} accès)</li>
    
    {% empty %}
    <li>Il n'y en a pas actuellement.</li>
    {% endfor %}
</ul>

# Aller plus loin
Le site http://ccbv.co.uk/ présente une documentation exhaustive sur les vues génériques de Django
Documentation officielle sur les vues génériques : https://docs.djangoproject.com/en/stable/ref/class-based-views/


## -- TECHNIQUES AVANCEES DANS LES MODELES -- ##

## - Les requêtes complexes avec Q

but = créer des requêtes complexes sur des modèles
sorte de queryBuilder
* un modèle simple pour illustrer nos exemples :
class Eleve(models.Model):
    nom = models.CharField(max_length=31)
    moyenne = models.IntegerField(default=10)

    def __str__(self):
        return "Élève {0} ({1}/20 de moyenne)".format(self.nom, self.moyenne)

Ajoutons quelques élèves dans la console interactive (manage.py shell) :
>>> from test.models import Eleve
>>> Eleve(nom="Mathieu", moyenne=18).save()
>>> Eleve(nom="Maxime", moyenne=7).save()
>>> Eleve(nom="Bastien", moyenne=10).save()
>>> Eleve(nom="Sofiane", moyenne=10).save()

+ créer une requête dynamique avec Q :
>>> from django.db.models import Q
>>> Q(nom="Maxime")
<Q: (AND: ('nom', 'Maxime'))> # réponse
# Nous voyons bien que nous possédons ici un objet de la classe Q
>>> Eleve.objects.filter(Q(nom="Maxime"))
<QuerySet [<Eleve: Élève Maxime (7/20 de moyenne)>]>
>>> Eleve.objects.filter(nom="Maxime")
<QuerySet [<Eleve: Élève Maxime (7/20 de moyenne)>]>
# les deux dernières requêtes sont équivalentes

# il est possible de construire une clause « OU » à partir de Q :
# Nous prenons les moyennes strictement au-dessus de 16 ou en dessous de 8
>>> Eleve.objects.filter(Q(moyenne__gt=16) | Q(moyenne__lt=8))
<QuerySet [<Eleve: Élève Mathieu (18/20 de moyenne)>, <Eleve: Élève Maxime (7/20 de moyenne)>]>

# il est également possible d’utiliser l’opérateur & pour signifier « ET » :
>>> Eleve.objects.filter(Q(moyenne=10) & Q(nom="Sofiane"))
<QuerySet [<Eleve: Élève Sofiane (10/20 de moyenne)>]>
# Néanmoins, cet opérateur n’est pas indispensable, 
# car il suffit de séparer les objets Q avec une virgule, le résultat est identique :
>>> Eleve.objects.filter(Q(moyenne=10), Q(nom="Sofiane"))
<QuerySet [<Eleve: Élève Sofiane (10/20 de moyenne)>]>

# Il est aussi possible de prendre la négation d’une condition avec la tilde
>>> Eleve.objects.filter(Q(moyenne=10), ~Q(nom="Sofiane"))
<QuerySet [<Eleve: Élève Bastien (10/20 de moyenne)>]>

# Aller plus loin 
* construisons quelques requêtes dynamiquement
un objet Q peut se construire de la façon suivante : Q(('moyenne',10)) , 
ce qui est identique à Q(moyenne=10)
* intérêt = renseigner des objets comme conditions
* pour obtenir les objets qui remplissent une des conditions dans la liste suivante :
conditions = [('moyenne', 15), ('nom', 'Bastien'), ('moyenne', 18)]
# Nous pouvons construire plusieurs objets Q de la manière suivante :
objets_q = [Q(x) for x in conditions]
et les incorporer dans une requête ainsi (avec une clause « OU ») :
>>> import operator
>>> from functools import reduce
>>> Eleve.objects.filter(reduce(operator.or_, objets_q))
<QuerySet [<Eleve: Élève Mathieu (18/20 de moyenne)>, <Eleve: Élève Bastien (10/20 de moyenne)>]>
* reduce est une fonction de functools qui permet d’appliquer une fonction à plusieurs valeurs
successivement
* ex. reduce(lambda x, y : x+y, [1, 2, 3, 4, 5]) va calculer ((((1+2)+3)+4)+5), donc 15
* La même chose sera faite ici, mais avec l’opérateur « OU » qui est accessible depuis operator.or_. 
* En réalité, Python va donc faire :
>>> Eleve.objects.filter(objets_q[0] | objets_q[1] | objets_q[2])

* C’est une méthode très puissante et très pratique qui vous permet de créer 
n’importe quelle requête dynamiquement !

## - L’agrégation

but = extraire une information spécifique à travers plusieurs entrées d’un seul et même modèle
* si nous voulons obtenir la moyenne des moyennes de nos élèves, 
nous pouvons procéder à partir de la méthode aggregate :
>>> from django.db.models import Avg
>>> Eleve.objects.aggregate(Avg('moyenne'))
{'moyenne__avg': 11.25}

* Cette méthode prend à chaque fois une fonction spécifique fournie par Django, 
comme Avg (pour Average, signifiant « moyenne » en anglais) et s’applique sur un champ du modèle
* la valeur retournée par la méthode est un dictionnaire, 
avec à chaque fois une clé générée automatiquement à partir du nom de la colonne utilisée 
et de la fonction appliquée (nous avons utilisé la fonction Avg  dans la colonne 'moyenne', 
Django renvoie donc 'moyenne__avg')
* Il existe d’autres fonctions comme Avg, également issues de django.db.models, dont notamment :
    **Max : prend la plus grande valeur ;
    **Min : prend la plus petite valeur ;
    **Count : compte le nombre d’entrées.

* Il est même possible d’utiliser plusieurs de ces fonctions en même temps :
>>> Eleve.objects.aggregate(Avg('moyenne'), Min('moyenne'), Max('moyenne'))
{'moyenne__max': 18, 'moyenne__avg': 11.25, 'moyenne__min': 7}

* pour préciser une clé spécifique, il suffit de la faire précéder de la fonction :
>>> Eleve.objects.aggregate(Moyenne=Avg('moyenne'), Minimum=Min('moyenne'), Maximum=Max('moyenne'))
{'Minimum': 7, 'Moyenne': 11.25, 'Maximum': 18}

* il est également possible d’appliquer une agrégation sur un QuerySet obtenu par la méthode filter, 
par exemple :
>>> Eleve.objects.filter(nom__startswith="Ma").aggregate(Avg('moyenne'), Count('moyenne'))
{'moyenne__count': 2, 'moyenne__avg': 12.5}
# la fonction Count est assez inutile ici, 
# d’autant plus qu’une méthode pour obtenir le nombre d’entrées dans un QuerySet existe déjà :
>>> Eleve.objects.filter(nom__startswith="Ma").count()
2

* La fonction count() peut se révéler bien plus intéressante 
lorsque nous l’utilisons avec des liaisons entre modèles. 
+ Pour ce faire, ajoutons un autre modèle :
class Cours(models.Model):
    nom = models.CharField(max_length=31)
    eleves = models.ManyToManyField(Eleve)

    def __str__(self):
        return self.nom

+ Créons deux cours :
>>> c1 = Cours(nom="Maths")
>>> c1.save()
>>> c1.eleves.add(*Eleve.objects.all())
>>> c2 = Cours(nom="Anglais")
>>> c2.save()
>>> c2.eleves.add(*Eleve.objects.filter(nom__startswith="Ma"))

* Il est tout à fait possible d’utiliser les agrégations depuis des liaisons comme une ForeignKey, 
ou comme ici avec un ManyToManyField :
>>> Cours.objects.aggregate(Max("eleves__moyenne"))
{'eleves__moyenne__max': 18}
# va chercher la meilleure moyenne parmi les élèves de tous les cours enregistrés

* Il est également possible de compter le nombre d’affiliations à des cours :
>>> Cours.objects.aggregate(Count("eleves"))
{'eleves__count': 6}

* Il est possible d’ajouter des attributs à un objet selon les objets auxquels il est lié. 
Nous parlons d’annotation. Exemple :
>>> Cours.objects.annotate(Avg("eleves__moyenne"))[0].eleves__moyenne__avg
11.25
* Un nouvel attribut a été créé. 
* Au lieu d’être retournées dans un dictionnaire, 
les valeurs sont désormais directement ajoutées à l’objet lui-même.
* Il est possible de redéfinir le nom de l’attribut, comme vu précédemment :
>>> Cours.objects.annotate(Moyenne=Avg("eleves__moyenne"))[1].Moyenne
12.5

* il est même possible d’utiliser l’attribut créé dans des méthodes du QuerySet, 
comme filter, exclude ou order_by
>>> Cours.objects.annotate(Moyenne=Avg("eleves__moyenne")).filter(Moyenne__gte=12)
<QuerySet [<Cours: Anglais>]>

## - L’héritage de modèles

Django propose trois méthodes principales pour gérer l’héritage de modèles

# - Les modèles parents abstraits -
* utiles lorsque vous souhaitez utiliser plusieurs méthodes et attributs dans différents modèles, 
sans devoir les réécrire à chaque fois
* Django ne l’utilisera pas comme représentation pour créer une table dans la base de données
* Afin de rendre un modèle abstrait, il suffit de lui assigner l’attribut abstract=True 
dans sa sous-classe Meta
* il est impossible de faire des requêtes sur un modèle abstrait
* ex. : 
class Document(models.Model):
    titre = models.CharField(max_length=255)
    date_ajout = models.DateTimeField(auto_now_add=True, 
                                      verbose_name="Date d'ajout du document")
    auteur = models.CharField(max_length=255, null=True, blank=True)
    
    class Meta:
        abstract = True

# deux tables seront créées dans la base de données : Article et Image
# les tables  Article et Image auront bien les champs de Document
    
class Article(Document):
    contenu = models.TextField()  
    
class Image(Document):
    image = models.ImageField(upload_to="images")


## - Les modèles parents classiques -
* il sera manipulable comme n’importe quel modèle
* Django créera une table pour le modèle parent et le modèle enfant
* exemple :
class Lieu(models.Model):
    nom = models.CharField(max_length=50)
    adresse = models.CharField(max_length=100)
    
    def __str__(self):
        return self.nom

class Restaurant(Lieu):
    menu = models.TextField()

* Django créera bien deux tables, une pour Lieu, l’autre pour Restaurant
* la table Restaurant ne contient pas les champs de Lieu (à savoir nom et adresse)
* elle contient bien le champ menu et une clé étrangère vers Lieu que le framework ajoutera tout seul
* l’héritage classique s’apparente à la liaison de deux classes avec une clé étrangère
* lorsque vous créez un objet Restaurant, vous créez aussi un objet Lieu tout à fait banal
* même si les attributs du modèle parent sont dans une autre table, 
le modèle fils a bien hérité de toutes ses méthodes et attributs :
>>> Restaurant(nom="La crêperie bretonne", adresse="42 Rue de la crêpe 35000 Rennes", menu="Des crêpes !").save()
>>> Restaurant.objects.all()
<QuerySet [<Restaurant: La crêperie bretonne>]>
>>> Lieu.objects.all()
<QuerySet [<Lieu: La crêperie bretonne>]>

* tous les attributs de Lieu sont directement accessibles depuis un objet Restaurant :
>>> resto = Restaurant.objects.all()[0]
>>> print(resto.nom + ", " + resto.menu)
"La crêperie bretonne, Des crêpes !"

* En revanche, il n’est pas possible d’accéder aux attributs spécifiques de Restaurant 
depuis une instance de Lieu :
>>> lieu = Lieu.objects.all()[0]
>>> print(lieu.nom)
La crêperie bretonne
>>> print(lieu.menu)
Traceback (most recent call last):
  File "<console>", line 1, in <module>
AttributeError: 'Lieu' object has no attribute 'menu'

* Pour accéder à l’instance de Restaurant associée à Lieu, 
Django crée tout seul une relation vers celle-ci qu’il nommera selon le nom de la classe fille :
>>> print(type(lieu.restaurant))
<class 'blog.models.Restaurant'>
>>> print(lieu.restaurant.menu)
Des crêpes !

## - Les modèles proxy

* un modèle proxy hérite de tous les attributs et méthodes du modèle parent, 
mais aucune table ne sera créée dans la base de données pour le modèle fils
* le modèle fils sera en quelque sorte une passerelle vers le modèle parent 
(tout objet créé avec le modèle parent sera accessible depuis le modèle fils, et vice-versa)
* but = nous pouvons ajouter des méthodes dans le modèle proxy, 
ou modifier des attributs de la sous-classe Meta sans que le modèle d’origine ne soit altéré, 
et continuer à utiliser les mêmes données
 
* exemple de modèle proxy qui hérite du modèle Restaurant que nous avons défini tout à l’heure :
class RestoProxy(Restaurant):
    class Meta:
        proxy = True  # Nous spécifions qu'il s'agit d'un proxy
        ordering = ["nom"]  # Nous changeons le tri par défaut

    def crepes(self):
        if "crêpe" in self.menu:  # Il y a des crêpes dans le menu
            return True
        return False

* Depuis ce modèle, il est donc possible d’accéder aux données enregistrées du modèle parent, 
tout en bénéficiant des méthodes et attributs supplémentaires :
>>> print(RestoProxy.objects.all())
<QuerySet [<RestoProxy: La crêperie bretonne>]>
>>> resto = RestoProxy.objects.all()[0]
>>> print(resto.adresse)
42 Rue de la crêpe 35000 Rennes
>>> print(resto.crepes())
True

## - L’application ContentType

idée = la liaison d’une entrée de modèle à un autre modèle en lui-même
* Dans les entrées de votre variable INSTALLED_APPS dans le fichier settings.py, 
il est toujours utile de vérifier si le tuple contient bien l’entrée 'django.contrib.contenttypes'
* Un ContentType est un modèle assez spécial
* Ce modèle permet de représenter un autre modèle installé
* Par exemple, nous avons déclaré plus haut le modèle Eleve. 
Voici sa représentation depuis un ContentType :
>>> from blog.models import Eleve
>>> from django.contrib.contenttypes.models import ContentType
>>> ct = ContentType.objects.get(app_label="blog", model="eleve")
>>> ct
<ContentType: eleve>
* la variable ct représente le modèle Eleve
* Le modèle ContentType possède deux méthodes :
    - model_class : renvoie la classe du modèle représenté ;
    - get_object_for_this_type : raccourci vers la méthode objects.get du modèle
    # évite de faire  ct.model_class().objects.get(attr=arg)
* Illustration :
>>> ct.model_class()
<class 'blog.models.Eleve'>
>>> ct.get_object_for_this_type(nom="Maxime")
<Eleve: Élève Maxime (7/20 de moyenne)>

* Idée = implémenter un système de commentaires, 
mais que ces commentaires ne se restreignent pas à un seul modèle. 
En effet, vous souhaitez que vos utilisateurs puissent commenter vos articles, 
vos images, vos vidéos, ou même des commentaires eux-mêmes
* Solution = les relations génériques des ContentTypes
* Une relation générique d’un modèle est une relation permettant de lier une entrée d’un modèle défini
à une autre entrée de n’importe quel modèle
* Ex. si notre modèle Commentaire possède une relation générique, 
nous pourrons le lier à un modèle Image, Video, Commentaire… 
ou n’importe quel autre modèle installé, sans la moindre restriction
* Voici une ébauche de ce modèle Commentaire avec une relation générique :
from django.contrib.contenttypes.models import ContentType
from django.contrib.contenttypes.fields import GenericForeignKey

class Commentaire(models.Model):
    auteur = models.CharField(max_length=255)
    contenu = models.TextField()
    content_type = models.ForeignKey(ContentType)
    # champ qui représente ce modèle
    object_id = models.PositiveIntegerField()
    # entier positif contenant l’ID de l’entrée
    content_object = GenericForeignKey('content_type', 'object_id')
    # La relation générique est ici l’attribut content_object, avec le champ GenericForeignKey
    # Il va aller chercher le type de modèle associé dans content_type , 
    # et l’ID de l’entrée associée dans object_id
    # la relation générique va aller dans la table liée au modèle obtenu, 
    # chercher l’entrée ayant l’ID obtenu, et renvoyer la bonne entrée

    def __str__(self):
        return "Commentaire de {0} sur {1}".format(self.auteur, self.content_object)

* exemple :
>>> from blog.models import Commentaire, Eleve
>>> e = Eleve.objects.get(nom="Sofiane")
>>> c = Commentaire.objects.create(auteur="Le professeur",contenu="Sofiane ne travaille pas assez.", content_object=e)
>>> c.content_object
<Eleve: Élève Sofiane (10/20 de moyenne)>
>>> c.object_id
4
>>> c.content_type.model_class()
<class 'blog.models.Eleve'>

* Lors de la création d’un commentaire, il n’y a pas besoin de remplir les champs object_id 
et content_type. Ceux-ci seront automatiquement déduits de la variable donnée à content_object
* il est également possible d’ajouter une relation générique « en sens inverse »
* Contrairement à une ForeignKey classique, aucune relation inverse n’est créée
* Pour en créer une sur un modèle bien précis, il suffit d’ajouter un champ nommé GenericRelation
* Si nous reprenons le modèle Eleve, cette fois modifié :
from django.contrib.contenttypes.fields import GenericRelation

class Eleve(models.Model):
    nom = models.CharField(max_length=31)
    moyenne = models.IntegerField(default=10)
    commentaires = GenericRelation('Commentaire')

    def __str__(self):
        return "Élève {0} ({1}/20 de moyenne)".format(self.nom, self.moyenne)

* Dès lors, le champ commentaires contient tous les commentaires adressés à l’élève :
>>> e.commentaires.all()
["Commentaire de Le professeur sur Élève Sofiane (10/20 de moyenne)"]

* si vous avez utilisé des noms différents de content_type et object_id 
pour construire votre GenericForeignKey, 
vous devrez également les spécifier lors de la création de la GenericRelation :
commentaires = GenericRelation(Commentaire,
    content_type_field="le_champ_du_content_type",
    object_id_field="le champ_de_l_id")


## -- SIMPLIFIONS NOS TEMPLATES : FILTRES, TAGS, ET CONTEXTES -- ##

Django permet également de créer nos propres filtres et tags, 
et même de générer des variables par défaut lors de la construction d’un template 
(ce que nous appelons le contexte du template)

## - Architecture des filtres et tags

* soit votre fonctionnalité est propre à une application 
(par exemple un filtre utilisé uniquement lors de l’affichage d’articles). 
Dans ce cas, vous pouvez directement le(s) placer au sein de l’application concernée 
(méthode préférée)
* soit vous créez une application à part, qui regroupe tous vos filtres et tags personnalisés
* l’application choisie doit contenir un dossier nommé templatetags, 
dans lequel il faut créer un fichier Python par groupe de filtres/tags
*!* Le dossier templatetags  doit en réalité être un module Python classique 
afin que les fichiers qu’il contient puissent être importés. 
Il est donc impératif de créer un fichier __init__.py  vide, sans quoi Django ne pourra rien faire.
* La nouvelle structure de l’application « blog » est donc la suivante :
blog/
    __init__.py
    migrations/
    models.py
    templatetags/
        __init__.py
        blog_extras.py
    views.py

+ il est nécessaire de spécifier une instance de classe qui nous permettra d’enregistrer nos filtres
et tags, de la même manière que dans nos fichiers admin.py avec admin.site.register()
# crepes_bretonnes\blog\templatetags\blog_extras.py
from django import template

register = template.Library()

* si vous avez décidé d’ajouter vos tags et filtres personnalisés dans une application spécifique,
l'application' incluant les templatetags doit être incluse dans le fameux INSTALLED_APPS 
de notre settings.py
* il sera possible d'intégrer' les tags dans n’importe quel template du projet via la ligne suivante :
{% load blog_extras %}
*!* Tous les dossiers templatetags de toutes les applications partagent le même espace de noms. 
Si vous utilisez des filtres et tags de plusieurs applications, 
veillez à ce que leurs noms de fichiers soient différents, afin qu’il n’y ait pas de conflit
* il est possible de charger plusieurs modules de filtres et tags par {% load %}, 
qui comprend un nombre illimité d’arguments :
{% load blog_extras static i18n %}

## - Personnaliser l’affichage de données avec nos propres filtres

* un filtre est une fonction classique qui prend 1 ou 2 arguments :
    - la variable à afficher, qui peut être n’importe quel objet en Python ;
    - et de façon facultative, un paramètre.
* ex. de deux filtres : l’un sans paramètre, le deuxième avec.
# Filtre upper sur la variable "texte" :
{{ texte|upper }}            
# Filtre truncatewords, avec comme argument "80" sur la variable "texte" :
{{ texte|truncatewords:80 }}
*!* Les fonctions Python associées à ces filtres ne sont appelées qu’au sein du template. 
Pour cette raison, il faut éviter de lancer des exceptions, 
et toujours renvoyer un résultat. 
En cas d’erreur, il est plus prudent de renvoyer l’entrée de départ ou une chaîne vide,
afin d’éviter des effets de bord lors du « chaînage » de filtres, par exemple.

# Un premier exemple de filtre sans argument

* but = nous allons encadrer la chaîne fournie par des guillemets français doubles.
Ainsi, si dans notre template, nous avons {{ "Bonjour le monde !"|citation }}, 
le résultat dans notre page sera « Bonjour le monde ! »
+ ajouter une fonction nommée citation dans blog_extras.py
# crepes_bretonnes\blog\templatetags\blog_extras.py
def citation(texte):   
    """
    Affiche le texte passé en paramètre, encadré de guillemets 
    français doubles
    """
    return "&laquo; {} &raquo;".format(texte)
    # entités HTML permettant d’afficher respectivement les guillemets gauches et droits

+ préciser au framework d’attacher cette méthode au filtre qui a pour nom citation
* il y a deux façons différentes de procéder :
    - soit en ajoutant la ligne @register.filter comme décorateur de la fonction. 
    L’argument name peut être indiqué pour choisir le nom du filtre ;
    - soit en appelant la méthode register.filter('citation', citation)
* avec ces deux méthodes le nom du filtre n’est donc pas directement lié au nom de la fonction, 
et cette dernière aurait pu s’appeler filtre_citation ou autre, 
cela n’aurait posé aucun souci tant qu’elle est correctement renseignée par la suite.
* Ainsi, ces trois fonctions sont équivalentes :
from django import template

register = template.Library()

# méthode 1 (préférée)
@register.filter
def citation(texte):   
    return "&laquo; {} &raquo;".format(texte)

# méthode 2 (préférée)
@register.filter(name='mon_filtre_citation')
def citation2(texte):
    return "&laquo; {} &raquo;".format(texte)

# méthode 3
def citation3(texte):
    return "&laquo; {} &raquo;".format(texte)

register.filter('un_autre_filtre_citation', citation3)

+ essayer le filtre dans le template :
# crepes_bretonnes\blog\templates\blog\accueil.html
{% load blog_extras %}
Un jour, une certaine personne m'a dit : {{ "Bonjour le monde !"|citation }}
# Un jour, une certaine personne m'a dit : &laquo; Bonjour le monde ! &raquo;

* Par défaut, Django échappe automatiquement tous les caractères spéciaux 
des chaînes de caractères affichées dans un template, ainsi que le résultat des filtres
* La méthode filter  peut prendre comme argument is_safe, 
qui permet de signaler au framework par la suite que notre chaîne est sûre :
@register.filter(is_safe=True)
def citation(texte):
    """
    Affiche le texte passé en paramètre, encadré de guillemets 
    français doubles et d'espaces insécables
    """
    return "&laquo; {} &raquo;".format(texte)

* un problème de sécurité se pose avec cette méthode. 
En effet, si du HTML est présent dans la chaîne donnée en paramètre, faut-il l’échapper ou pas ?
* Pour éviter cela, nous allons échapper les caractères spéciaux de notre argument de base 
et marquer notre résultat comme safe. 
* Cela peut être fait via la fonction espace du module django.utils.html. 
Au final, voici ce que nous obtenons :
from django import template
from django.utils.html import escape
from django.utils.safestring import mark_safe

register = template.Library()

@register.filter(is_safe=True)
def citation(texte):
    """
    Affiche le texte passé en paramètre, encadré de guillemets 
    français doubles et d'espaces insécables.
    """
    res = "&laquo; {} &raquo;".format(escape(texte))
    return mark_safe(res)

* notre chaîne est encadrée de guillemets corrects, 
mais l’intérieur du message est tout de même échappé

# Un filtre avec arguments

* ex. : troncature de texte
* but = réaliser un filtre qui va couper une chaîne après un certain nombre de caractères, 
mais sans couper en plein milieu d’un mot
* rappel = la forme d’un filtre avec un argument est la suivante :
{{ ma_chaine|smart_truncate:40 }}
# Nous souhaitons ici appeler un nouveau filtre smart_truncate sur la variable ma_chaine, 
# tout en lui passant en argument le nombre 40

* Voici un début de fonction :
# crepes_bretonnes\blog\templatetags\blog_extras.py
def smart_truncate(texte, nb_caracteres):
    # Nous vérifions tout d'abord que l'argument passé est bien un nombre
    try:
        nb_caracteres = int(nb_caracteres)
    except ValueError:
        return texte  # Retour de la chaîne originale sinon

    # Si la chaîne est plus petite que le nombre de caractères maximum voulus,
    # nous renvoyons directement la chaîne telle quelle.
    if len(texte) <= nb_caracteres:
        return texte

    # […]

* La suite de la fonction est tout aussi classique : 
nous coupons notre chaîne au nombre de caractères maximum voulu, 
et nous retirons la dernière suite de lettres, 
si jamais cette chaîne est coupée en plein milieu d’un mot :
@register.filter
def smart_truncate(texte, nb_caracteres):
    """
    Coupe la chaîne de caractères jusqu'au nombre de caractères souhaité,
    sans couper la nouvelle chaîne au milieu d'un mot.
    Si la chaîne est plus petite, elle est renvoyée sans points de suspension.
    ---
    Exemple d'utilisation :
    {{ "Bonjour tout le monde, c'est Diego"|smart_truncate:18 }} renvoie
    "Bonjour tout le..."
    """
    # Nous vérifions tout d'abord que l'argument passé est bien un nombre
    try:
        nb_caracteres = int(nb_caracteres)
    except ValueError:
        return texte  # Retour de la chaîne originale sinon

    # Si la chaîne est plus petite que le nombre de caractères maximum voulus,
    # nous renvoyons directement la chaîne telle quelle.
    if len(texte) <= nb_caracteres:
        return texte

    # Sinon, nous coupons au maximum, tout en gardant le caractère suivant
    # pour savoir si nous avons coupé à la fin d'un mot ou en plein milieu
    texte = texte[:nb_caracteres + 1]
    # slice [:nb] = garde tous les éléments, de 0 à nb

    # Nous vérifions d'abord que le dernier caractère n'est pas une espace,
    # autrement, il est inutile d'enlever le dernier mot !
    if texte[-1:] != ' ':
        mots = texte.split(' ')[:-1]
        # enlève le dernier mot du texte.split
        texte = ' '.join(mots)
    else:
        texte = texte[0:-1]
        # garde toutes les lettres sauf la dernière

    return texte + '…'

+ utiliser notre filtre :
# crepes_bretonnes\blog\templates\blog\accueil.html
{% load blog_extras %}
<p>
   {{ "Bonjour"|smart_truncate:14 }}<br />
   {{ "Bonjour tout le monde"|smart_truncate:15 }}<br />
   {{ "Bonjour tout le monde, c'est bientôt Noël"|smart_truncate:18 }}<br />
   {{ "To be or not to be, that's the question"|smart_truncate:16 }}<br />
</p>
# Bonjour
# Bonjour tout le…
# Bonjour tout le…
# To be or not to…

* il est possible de mixer les cas filtre sans argument et filtre avec un argument
* par exemple vouloir par défaut tronquer à partir du 20e caractère, si aucun argument n’est passé
* solution = indiquer qu’un argument est facultatif et lui donner une valeur par défaut. 
Il suffit de changer la déclaration de la fonction par :
def smart_truncate(texte, nb_caracteres=20):
Désormais, la syntaxe suivante est acceptée :
{{ "To be or not to be, that's the question"|smart_truncate }}
# « To be or not to be... »


## - Les contextes de templates

* sujet = template context processor (ou en français, des processeurs de contextes de templates)
* but = préremplir le contexte de la requête et 
ainsi de disposer de données dans tous les templates de notre projet
* contexte =  l’ensemble des variables disponibles dans votre template
* ex :
return render(request, 'blog/archives.html', {'news': news, 'date': date_actuelle})
# les variables news et date_actuelle seront incorporées au contexte

# Un exemple maladroit : afficher la date sur toutes nos pages
* l’exemple pris ici n’est pas réellement pertinent, 
puisque Django permet déjà par défaut d’afficher la date avec le tag {% now %}
* Une première idée serait de récupérer la date sur chacune des vues :
from django.shortcuts import render
from datetime import datetime

def accueil(request):
    date_actuelle = datetime.now()
    # […] Récupération d'autres données (exemple : une liste de news)
    return render(request, 'accueil.html', locals())

def contact(request):
    return render(request, 'contact.html', {'date_actuelle': datetime.now()})
* méthode est lourde et répétitive !

# Factorisons encore et toujours
* solution = créer une fonction qui sera appelée à chaque page, 
et qui se chargera d’incorporer la date dans les données disponibles de façon automatique
+ créer un fichier Python, que nous appellerons context_processors.py, par convention, 
dans une de vos applications
* Vu que cela concerne tout le projet, il est même conseillé de le créer dans le sous-dossier 
ayant le même nom que votre projet (crepes_bretonnes, dans le cas de ce cours)
# crepes_bretonnes\crepes_bretonnes\context_processors.py
from datetime import datetime

# récupère la date actuelle
def get_infos(request):
    date_actuelle = datetime.now()
    return {'date_actuelle': date_actuelle}
    # renvoie un/des dictionnaire(s) de données 
    # que le framework intégrera à tous nos templates

* Django exécute d’abord la vue et seulement après le contexte
* faire attention de prendre des noms de variables suffisamment explicites 
et qui ont peu de chance de se retrouver dans vos vues, et donc d’entrer en collision

+ indiquer au framework d’exécuter cette fonction à chaque page
+ le fichier settings.py et y modifier la variable TEMPLATES
* À chaque page, Django exécute et récupère les dictionnaires de plusieurs fonctions, 
listées dans l’option context_processors
TEMPLATES = [
    {
        'BACKEND': 'django.template.backends.django.DjangoTemplates',
        'DIRS': ['templates'],
        'APP_DIRS': True,
        'OPTIONS': {
            'context_processors': [
                'django.template.context_processors.debug',
                'django.template.context_processors.request',
                'django.contrib.auth.context_processors.auth',
                'django.contrib.messages.context_processors.messages',
                'crepes_bretonnes.context_processors.get_infos', ## ++
            ],
        },
    },
]

+ utiliser notre variable date_actuelle dans tous nos templates et
afficher fièrement la date sur notre blog :
# crepes_bretonnes\blog\templates\blog\accueil.html
<p>Bonjour à tous, nous sommes le {{ date_actuelle }} et il fait beau en Bretagne !</p>

# Petit point technique sur l’initialisation du contexte
* Faire attention à vos contextes si jamais vous vous écartez de la fonction render()
* la fonction render() est un « raccourci » effectuant plusieurs actions en interne, 
et nous évitant la réécriture de plusieurs lignes de code. 
Cette méthode prend notamment en charge le fait de charger le contexte !
* Cependant, toutes les fonctions de django.shortcut ne le font pas, comme render_to_response
* défaut, render_to_response ne prend pas en compte les fonctions de processeurs contenues 
dans TEMPLATES… Pour régler ce problème, il faut à chaque fois ajouter un argument :
return render_to_response('blog/archives.html', locals(), context_instance=RequestContext(request))


## - Des structures plus complexes : les custom tags

* Alors que les filtres peuvent être comparés à des fonctions, 
les tags doivent être décomposés en deux parties : la structuration du tag et son rendu
* Lorsque nous créons un nouveau tag, 
la fonction appelée à la compilation doit renvoyer un objet dont la classe hérite de Node, 
avec sa propre méthode render

# - Première étape : la fonction de compilation -

* exemple : afficher un nombre aléatoire compris entre deux arguments
* Notre tag pourra être utilisé de la façon suivante : {% random 0 42 %}; 
et renverra donc un nombre entier compris entre 0 et 42
* Contrairement au filtre, Django requiert que notre méthode prenne deux arguments précis : 
parser, qui est l’objet en charge de parser le template actuel (que nous n’utiliserons pas ici), 
et token, qui contient les informations sur le tag actuel, comme les paramètres passés
* token contient quelques méthodes qui vont nous simplifier le traitement des paramètres
    - la méthode split_contents() permet de séparer les arguments dans une liste
* Il est extrêmement déconseillé d’utiliser la méthode classique token.contents.split(' '), 
qui pourrait « casser » vos arguments si jamais il y a des chaînes de caractères avec des espaces

* un bref exemple de fonction de compilation :
+ la partie logique :
from django import template

def random(parser, token):
    """ Tag générant un nombre aléatoire, entre les bornes données en arguments """
    # Séparation des paramètres contenus dans l'objet token. 
    # Le premier élément du token est toujours le nom du tag en cours
    try:
        nom_tag, begin, end = token.split_contents()
    except ValueError:
        msg = 'Le tag %s doit prendre exactement deux arguments.' % token.split_contents()[0]
        raise template.TemplateSyntaxError(msg)

    # Nous vérifions ensuite que nos deux paramètres sont bien des entiers
    try:
        begin, end = int(begin), int(end)
    except ValueError:
        msg = 'Les arguments du tag %s sont obligatoirement des entiers.' % nom_tag
        raise template.TemplateSyntaxError(msg)

    # Nous vérifions si le premier est inférieur au second
    if begin > end:
        msg = 'L\'argument "begin" doit obligatoirement être inférieur à l\'argument "end" dans le tag %s.' % nom_tag
        raise template.TemplateSyntaxError(msg)

    return RandomNode(begin, end)
    # la partie rendu

+ écrire la classe RandomNode, qui est renvoyée par la méthode ci-dessus
* il semble évident que sa méthode __init__  prend trois arguments : self, begin  et end. 
* Comme nous l’avons vu tout à l’heure, cette classe doit également définir 
une méthode render(self, context), qui va renvoyer une chaîne de caractères et 
qui remplacera notre tag dans notre rendu HTML
* Cette méthode prend en paramètre le contexte du template, 
auquel nous pouvons accéder et que nous pouvons éditer
from random import randint

class RandomNode(template.Node):
    # souvenir des arguments
    def __init__(self, begin, end):
           self.begin = begin
           self.end = end
    # appeler le rendu en générant un nombre aléatoire
    def render(self, context):
           return str(randint(self.begin, self.end))

+ enregistrer notre tag
* Comme pour les filtres, il existe plusieurs méthodes :
    @register.tag() au début de notre fonction de compilation; # préféré
    @register.tag(name='nom_du_tag')  si jamais nous prenons un nom différent ;
    register.tag('nom_du_tag', random)  pour l’enregistrer après la déclaration de la fonction.

* Au final, notre tag complet ressemble à ceci :
# crepes_bretonnes\blog\templatetags\blog_extras.py
from django import template
from random import randint

register = template.Library()

@register.tag
def random(parser, token):
    """ Tag générant un nombre aléatoire, entre les bornes données en arguments """
    try:
        nom_tag, begin, end = token.split_contents()
    except ValueError:
        msg = 'Le tag %s doit prendre exactement deux arguments.' % token.split_contents()[0]
        raise template.TemplateSyntaxError(msg)

    # Nous vérifions que nos deux paramètres sont bien des entiers
    try:
        begin, end = int(begin), int(end)
    except ValueError:
        msg = 'Les arguments du tag %s sont obligatoirement des entiers.' % nom_tag
        raise template.TemplateSyntaxError(msg)

    # Nous vérifions si le premier est bien inférieur au second
    if begin > end:
        msg = 'L\'argument "begin" doit obligatoirement être inférieur à l\'argument "end" dans le tag %s.' % nom_tag
        raise template.TemplateSyntaxError(msg)

    return RandomNode(begin, end)


class RandomNode(template.Node):
    def __init__(self, begin, end):
        self.begin = begin
        self.end = end

    def render(self, context):
        return str(randint(self.begin, self.end))

+ utiliser le tag
# crepes_bretonnes\blog\templates\blog\accueil.html
{% random "a" 10 %}
# lève une erreur : Les arguments du tag random sont obligatoirement des entiers

# - Passage de variable dans notre tag -

idée = donner des variables en arguments
* Une variable est par définition indéterminée, 
il y a donc plusieurs tests que nous ne pourrons faire qu’au rendu, 
et non plus à la compilation du tag
* Nous allons continuer sur notre tag {% random %}, 
en lui passant en paramètres deux variables qui seront définies dans notre vue comme ceci :
def ma_vue(request):
    return render(request, 'template.html', {'begin': 1, 'end': 42})

{% random begin end %}

+ changer notre tag pour interpréter les variables 
et faire attention au cas où une des variables entrées n’existerait pas dans notre contexte 
(qui est l’ensemble des variables passées au template depuis la vue)
* problème = ce genre d’informations n’est disponible qu’au rendu. 
+ Il va donc falloir décaler la plupart de nos tests au rendu.

+ supprimer les tests sur le type et la comparaison entre begin et end de la méthode de compilation,
ce qui nous laisse uniquement :
@register.tag
def random(parser, token):
    """ Tag générant un nombre aléatoire, entre les bornes en arguments """
    try:
        nom_tag, begin, end = token.split_contents()
    except ValueError:
        msg = 'Le tag random doit prendre exactement deux arguments.'
        raise template.TemplateSyntaxError(msg)

    return RandomNode(begin, end)

* notre méthode render() dans la classe RandomNode sera un peu plus complexe. 
* Nous allons devoir vérifier dedans si la variable passée en paramètre existe et si oui, 
vérifier s’il s’agit bien d’un entier. 
* Pour ce faire, il existe dans le module template une classe Variable qui permet 
de récupérer le contenu d’une variable à partir de son nom dans le contexte. 
from django.template.base import VariableDoesNotExist

class RandomNode(template.Node):
    def __init__(self, begin, end):
        self.begin = begin
        self.end = end

    def render(self, context):
        not_exist = False

        try:
            begin = template.Variable(self.begin).resolve(context)
            self.begin = int(begin)
        except (VariableDoesNotExist, ValueError):
            not_exist = self.begin
        try:
            end = template.Variable(self.end).resolve(context)
            self.end = int(end)
        except (VariableDoesNotExist, ValueError):
            not_exist = self.end

        if not_exist:
            msg = 'L\'argument "%s" n\'existe pas, ou n\'est pas un entier.' % not_exist
            raise template.TemplateSyntaxError(msg)

        # Nous vérifions si le premier entier est bien inférieur au second
        if self.begin > self.end:
            msg = 'L\'argument "begin" doit obligatoirement être inférieur à l\'argument "end" dans le tag random.'
            raise template.TemplateSyntaxError(msg)

        return str(randint(self.begin, self.end))

+ tester votre tag dans n’importe quel sens :

{% random 0 42 %}
{% random begin end %}
{% random begin 42 %}

Mais aussi avec des cas qui ne marchent pas :
{% random a 42 %} avec a = "Bonjour"
{% random begin fin %} où 'fin' n'existe pas

# - Les simple tags -

* idée = coder des tags simples, qui prennent des arguments 
et dont la sortie ne dépend que de ces arguments
* C’est le cas de notre tag random, par exemple, 
qui renvoie un nombre en ne se basant que sur nos deux paramètres. 
Il est alors possible de simplifier tout notre tag par :
@register.simple_tag(name='random')  # L'argument name est encore une fois facultatif
def random(begin, end):
    try:
       return randint(int(begin), int(end))
    except ValueError:
       raise template.TemplateSyntaxError('Les arguments doivent nécessairement être des entiers')

* Il est aussi possible d’accéder au contexte depuis ce genre de tags, 
en le précisant à son enregistrement :
@register.simple_tag(takes_context=True)
def random(context, begin, end):
    # …

* il n’est pas possible de tout faire avec des simple tags
* Dès que vous avez besoin d’avoir un état interne, par exemple (comme pour cycle), 
il est plus facile de passer via une classe (notre nœud) qui stockera cet état
* les simple tags fonctionnent en réalité de la même façon que nos tags précédents : 
un objet SimpleNode est instancié et sa fonction render() ne fait qu’appeler notre fonction random.

* cas spécifiques de tags possibles :
    - les tags composés, par exemple {% if %} {% endif %}  ;
    - les tags incluant d’autres templates, et possédant leur propre contexte ;
    - et enfin, les tags agissant sur le contexte plutôt que de renvoyer une valeur

# - Quelques points à ne pas négliger -

* les tags renvoient toujours du texte considéré comme sécurisé, 
c’est-à-dire que le HTML y est interprété
* Il est donc important de penser à échapper le HTML quand il est nécessaire, 
via la fonction escape(), telle que nous l’avons vue avec les filtres


## -- LES SIGNAUX ET MIDDLEWARES -- ##

* comment effectuer une action précise à chaque fois qu’une entrée d’un modèle est supprimée, 
et ce depuis n’importe où dans le code ? 
* Ou comment analyser toutes les requêtes d’un visiteur pour s’assurer 
que son adresse IP n’est pas bannie ? 
* Pour ces situations un peu spéciales qui nécessitent de répéter la même action à plusieurs moments 
et endroits dans le code, Django intègre deux mécanismes différents qui permettent de résoudre 
ce genre de problèmes : les signaux et les middlewares.

## - Notifiez avec les signaux

* Un signal est une notification envoyée par une application à Django lorsqu’une action se déroule, 
et renvoyée par le framework à toutes les autres parties d’applications qui se sont enregistrées 
pour savoir quand ce type d’action se déroule, et comment
*!* Les signaux ne permettent pas d’interagir avec les templates.
* exemple de la suppression d’un modèle : 
imaginons que nous ayons plusieurs fichiers sur le disque dur, liés à une instance d’un modèle
Lorsque l’instance est supprimée, nous souhaitons que les fichiers associés soient également supprimés.
* solution = les signaux
* une fois que vous avez écrit la fonction de suppression des fichiers associés, 
vous n’avez qu’à indiquer à Django d’appeler cette fonction à chaque fois qu’une entrée de modèle 
est supprimée
* En pratique, cela se fait ainsi :
from django.db.models.signals import post_delete
# import du signal
# Le signal ici importé est post_delete, et comme son nom l’indique, 
# il est notifié à chaque fois qu’une instance a été supprimée

post_delete.connect(ma_fonction_de_suppression, sender=MonModele)
# utilise la méthode connect pour connecter une fonction à ce signal
# la méthode peut prendre plusieurs paramètres, comme par exemple ici sender, 
# qui permet de restreindre l’envoi de signaux à un seul modèle

* Une fonction appelée par un signal prend souvent plusieurs arguments.
* elle prend presque toujours un argument appelé sender
* Chaque type de signal possède ses propres arguments
* post_delete en prend trois :
    - sender : le modèle concerné, comme vu précédemment;
    - instance : l’instance du modèle supprimée (celle-ci étant supprimée, 
    il est très déconseillé de modifier ses données ou de tenter de la sauvegarder);
    - using : l’alias de la base de données utilisée 
    (si vous utilisez plusieurs bases de données, il s’agit d’un point particulier 
    et inutile la plupart du temps)

* Notre fonction ma_fonction_de_suppression pourrait donc s’écrire de la sorte :
def ma_fonction_de_suppression(sender, instance, **kwargs):
	# processus de suppression selon les données fournies par instance
* Pourquoi spécifier un **kwargs ?
- Vous ne pouvez jamais être certain qu’un signal renverra bien tous les arguments possibles
- il est toujours important de spécifier un dictionnaire pour récupérer les valeurs supplémentaires, 
et si vous avez éventuellement besoin d’une de ces valeurs, il suffit de vérifier 
si la clé est bien présente dans le dictionnaire

* Cette fonction et sa connexion peuvent être mises n’importe où, 
tant que Django charge le fichier afin qu’il puisse faire la connexion directement.
* Le framework charge déjà par défaut certains fichiers comme les models.py, urls.py, etc. 
Le meilleur endroit serait donc un de ces fichiers.
* Généralement, nous choisissons un models.py 
(étant donné que certains signaux agissent à partir d’actions sur des modèles, 
c’est plutôt un bon choix !)

* il est également possible d’enregistrer une fonction à un signal directement 
lors de sa déclaration avec un décorateur. En reprenant l’exemple ci-dessus :
from django.db.models.signals import post_delete
from django.dispatch import receiver

@receiver(post_delete, sender=MonModele)
def ma_fonction_de_suppression(sender, instance, **kwargs):
	# processus de suppression selon les données fournies par instance

* Les autres types de signaux : 
https://openclassrooms.com/fr/courses/1871271-developpez-votre-site-web-avec-le-framework-django/1873451-les-signaux-et-middlewares#/id/r-1876856
* Il existe d’autres signaux inclus par défaut. Ils sont expliqués dans la documentation officielle.
https://docs.djangoproject.com/en/stable/ref/signals/

* vous pouvez tester tous ces signaux simplement en créant une fonction 
affichant une ligne dans la console (avec print) et en liant cette fonction aux signaux désirés

# - créer ses propres signaux -

* Chaque signal est en fait une instance de django.dispatch.Signal. 
* Pour créer un nouveau signal, il suffit donc de créer une nouvelle instance, 
et de lui dire quels arguments le signal peut transmettre :
from django.dispatch import Signal

crepe_finie = Signal(providing_args=["adresse", "prix"])
# nous créons un nouveau signal nommé crepe_finie. 
# Nous lui indiquons une liste contenant les noms d’éventuels arguments qu’il peut transmettre
# (les arguments de signaux n’étant jamais fixes, vous pouvez la modifier à tout moment)

+ enregistrer une fonction sur ce signal, comme vu précédemment :
crepe_finie.connect(faire_livraison) # Quand crepe_finie est lancé, appeler 'faire_livraison'

* pour lancer une notification à toutes les fonctions enregistrées au signal, 
il suffit d’utiliser la méthode send(), et ceci depuis n’importe où.
Nous l’avons fait depuis un modèle :
class Crepe(models.Model):
	nom_recette = models.CharField(max_length=255)
	prix = models.IntegerField()
	# ...

	def preparer(self, adresse):
		# Nous préparons la crêpe pour l'expédier à l'adresse transmise
		crepe_finie.send(sender=self, adresse=adresse, prix=self.prix)
        # À chaque fois que la méthode preparer  d’une crêpe sera appelée, 
        # la fonction faire_livraison  le sera également avec les arguments adéquats
        # il est toujours obligatoire de préciser un argument sender
        # il est censé représenter l’entité qui est à l’origine du signal

* la fonction send() retourne une liste de paires de variables, 
chaque paire étant un tuple de type (receveur, retour) où le receveur est la fonction appelée, 
et le retour est la variable retournée par la fonction

* il est également possible de déconnecter une fonction d’un signal
* Pour ce faire, il faut utiliser la méthode disconnect  du signal. 
Cette dernière s’utilise comme connect  :
crepe_finie.disconnect(faire_livraison)
# crepe_finie n’appellera plus faire_livraison si une notification est envoyée
* si vous avez soumis un argument sender lors de la connexion, 
vous devrez également le préciser lors de la déconnexion

## - Contrôlez tout avec les middlewares

* juste avant et après l’appel de la vue, le framework va à ce moment exécuter certains bouts de code 
appelés des middlewares. 
* Il s’agit en quelque sorte de fonctions qui seront exécutées à chaque requête, 
en "enrobant" la vue Django appelée
* Un middleware est une classe avec plusieurs méthodes. 
Le nom de la méthode indique quand le middleware sera exécuté. 
Ainsi, la méthode process_view d’un middleware sera exécutée avant une vue, 
mais process_response sera appelé à la fin de la requête, juste avant l’envoi au client. 
* les middlewares se chargent de modifier certaines variables ou d’interrompre le processus de traitement 
de la requête, et cela aux différents moments que nous allons lister ci-dessous
* Par défaut, Django inclut plusieurs middlewares dans la configuration par défaut :
MIDDLEWARE = [
    'django.middleware.security.SecurityMiddleware',
    'django.contrib.sessions.middleware.SessionMiddleware',
    'django.middleware.common.CommonMiddleware',
    'django.middleware.csrf.CsrfViewMiddleware',
    'django.contrib.auth.middleware.AuthenticationMiddleware',
    'django.contrib.messages.middleware.MessageMiddleware',
    'django.middleware.clickjacking.XFrameOptionsMiddleware',
]
* Ils s’occupent de certaines tâches pratiques et permettent d’utiliser d’autres fonctionnalités 
du framework que nous verrons plus tard ou avons déjà vues 
(comme la sécurisation des formules contre les attaques CSRF, le système utilisateur, 
l’envoi de notifications aux visiteurs, etc.).
* Un middleware = une fonction qui retourne une fonction qui sera appelée à chaque fois 
qu’une requête est reçue par Django
* La fonction principale prend en paramètre une méthode, fournie par Django, 
qui va nous permettre de lancer l’appel de la vue demandée par l’utilisateur et 
ainsi de lui renvoyer la réponse.
def simple_middleware(get_response):
    # Le code ici est appelé une seule fois, pour l'initialisation
    # et la configuration

    def middleware(request):
        # Code qui sera exécuté à chaque requête, et avant
        # le traitement de la réponse

        response = get_response(request)
        # Code qui sera exécuté à chaque requête, une fois la
        # réponse calculée, mais pas encore servie

        return response

    return middleware

* Il est dès lors possible d’intercepter toute requête, d’en modifier ses paramètres 
puis de laisser continuer son exécution, 
ou même de décider de renvoyer une réponse tout à fait différente. 
De même, il est tout à fait possible de modifier une réponse calculée.
* les middlewares sont appelés dans l’ordre précisé dans le settings.py, de haut en bas, 
pour toutes les méthodes appelées avant l’appel de la vue. 
* Chaque fonction englobe donc la suivante. 
* Ainsi, avec le code suivant, et dans l’ordre (middleware1, middleware2) :
def middleware1(get_response):
    def middleware(request):
        print("J'ouvre le bal de la requête") # 1
        response = get_response(request)
        print("Et je clôture également le show.") # 5
        return response

    return middleware
    

def middleware2(get_response):
    def middleware(request):
        print("J'englobe également la vue, mais après") # 2
        response = get_response(request)
        print("Compris ?") # 4
        return response

    return middleware
    
    
def ma_vue(request):
    print("Enfin, nous arrivons dans la vue !") # 3
    return HttpResponse("Ma réponse")

* On obtient le résultat suivant dans la console :
J'ouvre le bal de la requête
J'englobe également la vue, mais après
Enfin, nous arrivons dans la vue !
Compris ?
Et je clôture également le show.

# - Créons notre propre middleware -

* exemple = coder un petit middleware simple, mais pratique, 
qui comptabilise le nombre de fois qu’une page est vue et affiche ce nombre à la fin de chaque page
* le middleware sera placé dans une nouvelle application nommée stats

+ créer notre application "stats"
python manage.py startapp stats

+ créer un nouveau modèle dans l’application qui permet de tenir compte 
du nombre de visites d’une page
* Chaque entrée du modèle correspondra à une page
# crepes_bretonnes\stats\models.py
from django.db import models

class Page(models.Model):
    url = models.URLField()
    nb_visites = models.IntegerField(default=1)

    def __str__(self):
        return self.url

+ ajouter l’application au settings.py
INSTALLED_APPS = [
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
    'blog',
    'mini_url',
    'stats', ## ++
]

+ lancer la migration
python manage.py makemigrations
python manage.py migrate

+ ajouter le middleware que nous avons enregistré dans stats/middleware.py :
from django.db.models import F
from .models import Page

def stats_middleware(get_response):
    def middleware(request):
        # Avant chaque exécution de la vue, on incrémente 
        # le nombre de page vues à chaque appel de vues
        try:
            # Le compteur lié à la page est récupéré et incrémenté
            p = Page.objects.get(url=request.path)  
            p.nb_visites = F('nb_visites') + 1
            # équivalent de UPDATE stats_page SET nb_visites=nb_visites+1
            p.save()
        except Page.DoesNotExist:
            # Un nouveau compteur à 1 par défaut est créé
            p = Page.objects.create(url=request.path)
        
        # Appel de la vue Django
        response = get_response(request)
        
        # Une fois la vue exécutée, on ajoute à la fin le nombre
        # de vues de la page 
        response.content += bytes(
            "Cette page a été vue {0} fois.".format(p.nb_visites),
            "utf8"
        )
        # Et on retourne le résultat
        return response

    return middleware

* l'objet' F sert à construire des requêtes SQL plus élaborées.
* Au lieu de récupérer la valeur en Python et de l’incrémenter de 1,  
F prend en compte l’opération "+ 1" auquel il a été associé 
et va directement faire ces opérations dans la base de données, si possible
* Un objet F() représente la valeur d’un champ de modèle ou d’une colonne annotée. 
Il permet de se référer à des valeurs de champs de modèles 
et d’effectuer avec elles des opérations en base de données sans avoir à les récupérer 
préalablement de la base de données vers la mémoire Python
* C’est un outil pratique pour optimiser de simples opérations numériques sur des champs.

+ mettons à jour MIDDLEWARE dans votre settings.py
MIDDLEWARE = [
    'django.middleware.security.SecurityMiddleware',
    'django.contrib.sessions.middleware.SessionMiddleware',
    'django.middleware.common.CommonMiddleware',
    'django.middleware.csrf.CsrfViewMiddleware',
    'django.contrib.auth.middleware.AuthenticationMiddleware',
    'django.contrib.messages.middleware.MessageMiddleware',
    'django.middleware.clickjacking.XFrameOptionsMiddleware',
    'stats.middleware.stats_middleware', ## ++ 
]

* avant chaque appel de vue, Django appelle la méthode process_view
qui se charge ici de déterminer si l’URL de la page a déjà été appelée ou non 
(l’URL est accessible à partir de l’attribut request.path)
* En fin de compte, sur toutes vos pages, vous verrez la phrase avec le nombre de visites 
qui se rajoute toute seule, sans devoir modifier toutes les vues une à une !

+ intégrer notre middleware à notre projet
+ ajouter un view
# crepes_bretonnes\stats\views.py
from django.shortcuts import render

def accueil(request):
    return render(request, 'stats/accueil.html', locals())

+ ajouter un template
# crepes_bretonnes\stats\templates\stats\accueil.html
<h1>Bienvenue sur la page des statistiques !</h1>
# le message s'affichera ici #

+ ajouter un url
# crepes_bretonnes\stats\urls.py
from django.urls import path
from . import views

urlpatterns = [
    # Une string vide indique la racine
    path('', views.accueil, name='accueil'),
]

+ ajouter l'url' aux url du projet
# crepes_bretonnes\crepes_bretonnes\urls.py
path('stats/', include('stats.urls')),

  
# A approfondir :
F et Django : https://docs.djangoproject.com/fr/3.0/ref/models/expressions/
HttpRequest : https://docs.djangoproject.com/fr/3.0/ref/request-response/#httprequest-objects
HttpResponse : https://docs.djangoproject.com/fr/3.0/ref/request-response/#django.http.HttpResponse


## -- LES UTILISATEURS -- ##

## - La Base

* Vérifier toujours que 'django.contrib.auth' et 'django.contrib.contenttypes' 
sont bien présents dans la variable INSTALLED_APPS de votre settings.py
les middlewares suivants sont nécessaires :
'django.contrib.sessions.middleware.SessionMiddleware';
'django.contrib.auth.middleware.AuthenticationMiddleware'.

# - L’utilisateur -

* Tout le système utilisateur tourne autour du modèle django.contrib.auth.models.User
* les principaux attributs de User  :
- username : nom d’utilisateur, 30 caractères maximum 
(lettres, chiffres et les caractères spéciaux _, @, +, . et -);
- first_name : prénom, optionnel, 30 caractères maximum ;
- last_name : nom de famille, optionnel, 30 caractères maximum ;
- email : adresse e-mail ;
- password : un hash du mot de passe. 
- is_staff : booléen, permet d’indiquer si l’utilisateur a accès à l’administration de Django
- is_active : booléen, par défaut mis à True. 
Si mis à False, l’utilisateur est considéré comme désactivé et ne peut plus se connecter. 
Au lieu de supprimer un utilisateur, il est conseillé de le désactiver 
afin de ne pas devoir supprimer d’éventuels modèles liés à l’utilisateur 
(avec une ForeignKey, par exemple) ;
- is_superuser : booléen, si mis à True, l’utilisateur obtient toutes les permissions
- last_login : datetime, représente la date/l’heure à laquelle l’utilisateur 
s’est connecté la dernière fois ;
- date_joined : datetime, représente la date/l’heure à laquelle l’utilisateur s’est inscrit ;
- user_permissions : une relation ManyToMany vers les permissions
- groups : une relation ManyToMany vers les groupes

* La façon la plus simple de créer un utilisateur est d’utiliser la fonction create_user  
fournie avec le modèle.
* Elle prend trois arguments : le nom de l’utilisateur, son adresse e-mail et son mot de passe 
(les trois attributs obligatoires du modèle). 
Elle enregistre ensuite directement l’utilisateur dans la base de données :
>>> from django.contrib.auth.models import User
>>> user = User.objects.create_user('Maxime', 'maxime@crepes-bretonnes.com', 'm0nsup3rm0td3p4ss3')
>>> user.id
2
* Tous les champs sont éditables classiquement, sauf un, password, qui possède ses propres fonctions.
>>> user.first_name, user.last_name = "Maxime", "Lorant"
>>> user.is_staff = True
>>> user.save()

# - Les mots de passe -

* Django hache automatiquement les mots de passe
* Tous les mots de passe sont enregistrés selon cette disposition :
algorithme$iterations$sel$empreinte
>>> user.password
'pbkdf2_sha256$10000$cRu9mKvGzMzW$DuQc3ZJ3cjT37g0TkiEYrfDRRj57LjuceDyapH/qjvQ='
* Django fournit quatre méthodes au modèle User  pour la gestion des mots de passe :
- set_password(mot_de_passe) : permet de modifier le mot de passe de l’utilisateur 
par celui donné en argument. Django va hacher ce dernier, comme vu précédemment. 
Cette méthode ne sauvegarde pas l’entrée dans la base de données, 
il faut faire un .save() par la suite.
- check_password(mot_de_passe) : vérifie si le mot de passe donné en argument correspond bien 
à l’empreinte enregistrée dans la base de données. 
Retourne True si les deux mots de passe correspondent, sinon False.
- set_unusable_password() : permet d’indiquer que l’utilisateur n’a pas de mot de passe défini. 
Dans ce cas, check_password retournera toujours False.
- has_usable_password() : retourne True  si le compte utilisateur a un mot de passe valide, 
False  si set_unusable_password a été utilisé.

Petit exemple pratique désormais, en reprenant notre utilisateur de tout à l’heure :
>>> user = User.objects.get(username="Maxime")
>>> user.set_password("coucou")    # Nous changeons le mot de passe
>>> user.check_password("salut")   # Nous essayons un mot de passe invalide
False
>>> user.check_password("coucou")  # Avec le bon mot de passe, ça marche !
True
>>> user.set_unusable_password()   # Nous désactivons le mot de passe
>>> user.check_password("coucou")  # Comme prévu, le mot de passe précédent n'est plus bon
False

# - Étendre le modèle User -

but = par exemple adjoindre un avatar à chaque utilisateur
solution = étendre le modèle avec un autre modèle contenant tous les champs 
que vous souhaitez ajouter à votre modèle utilisateur
* Une fois ce modèle spécifié, il faudra le lier au modèle User 
en ajoutant un OneToOneField  vers ce dernier
* ex. : donner la possibilité à un utilisateur d’avoir un avatar, une signature pour ses messages,
un lien vers son site web et de pouvoir s’inscrire à la newsletter de notre site. 
Notre modèle ressemblerait à ceci :
from django.contrib.auth.models import User

class Profil(models.Model):
    user = models.OneToOneField(User)  # La liaison OneToOne vers le modèle User
    site_web = models.URLField(blank=True)
    avatar = models.ImageField(null=True, blank=True, upload_to="avatars/")
    signature = models.TextField(blank=True)
    inscrit_newsletter = models.BooleanField(default=False)

    def __str__(self):
        return "Profil de {0}".format(self.user.username)

* vous pouvez accéder à l’instance Profil associée à une instance User depuis cette dernière
en utilisant la relation inverse créée automatiquement par le OneToOneField
Pour illustrer le fonctionnement de cette relation inverse, voici un petit exemple :
>>> from django.contrib.auth.models import User
>>> from blog.models import Profil
>>> user = User.objects.create_user('Mathieu', 'mathieu@crepes-bretonnes.com', 'sup3rp@ssw0rd')  # Nous créons un nouvel utilisateur
>>> profil = Profil(user=user, site_web="<a href="<a href="http://www.crepes-bretonnes.com">http://www.crepes-bretonnes.com</a>"><a href="http://www.crepes-bretonnes.com">http://www.crepes-bretonnes.com</a></a>", signature="Coucou ! C'est moi !")
>>> profil.save()
>>> profil
<Profil: Profil de Mathieu>
>>> user.profil
<Profil: Profil de Mathieu>
>>> user.profil.signature
"Coucou ! C'est moi !"

* pour avoir une méthode d’authentification personnelle 
(utiliser l’adresse e-mail comme identifiant ou passer par un serveur LDAP), 
c’est possible de redéfinir totalement le modèle User. 
Cependant, la décision de remplacer le modèle User doit être prise au début du projet, 
afin d’éviter de nombreux problèmes de dépendances au niveau de la base de données, 
avec les ForeignKey vers le modèle utilisateur.

## - Les vues 

# - La connexion -

* Nous avons désormais des utilisateurs, ils n’ont plus qu’à se connecter ! 
* Pour ce faire, nous aurons besoin des éléments suivants :
- un formulaire pour récupérer le nom d’utilisateur et le mot de passe ;
- un template pour afficher ce formulaire ;
- une vue pour récupérer les données, les vérifier, et connecter l’utilisateur.

* création de l'application' d'authentification'
python manage.py startapp secret

+ ajouter l’application au settings.py
INSTALLED_APPS = [
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
    'blog',
    'mini_url',
    'stats',
    'secret', ## ++
]

* Commençons par le formulaire. 
Il ne nous faut que deux choses : le nom d’utilisateur et le mot de passe. 
Autrement dit, le formulaire est très simple. 
+ Nous le plaçons dans un fichier forms.py :
# crepes_bretonnes\secret\forms.py
from django import forms

class ConnexionForm(forms.Form):
    username = forms.CharField(label="Nom d'utilisateur", max_length=30)
    password = forms.CharField(label="Mot de passe", widget=forms.PasswordInput)
    # permet d’avoir une boîte de saisie dont les caractères seront masqués

+ lancer la migration (pas utile car pas de création de modèles)
python manage.py makemigrations
python manage.py migrate

+ ajouter le template
# crepes_bretonnes\secret\templates\auth\connexion.html
<h1>Se connecter</h1>

{% if error %}
<p><strong>Utilisateur inconnu ou mauvais de mot de passe.</strong></p>
{% endif %}

{% if user.is_authenticated %}
Vous êtes connecté, {{ user.username }} !
{% else %}
<form method="post" action="">
    {% csrf_token %}
    {{ form.as_p }}
    <input type="submit" value="Se connecter" />
</form>
{% endif %}

* la variable user contient l’instance User de l’utilisateur s’il est connecté, 
ou une instance de la classe AnonymousUser. 
La classe AnonymousUser est utilisée pour indiquer que le visiteur n’est pas un utilisateur connecté
* La variable user dans les templates est ajoutée par un processeur de contexte inclus par défaut. 
* Le même objet est disponible via request.user dans les vues.

* Pour terminer, passons à la partie intéressante : la vue. 
Récapitulons auparavant tout ce qu’elle doit faire :
- afficher le formulaire ;
- après la saisie par l’utilisateur, récupérer les données ;
- vérifier si les données entrées correspondent bien à un utilisateur ;
- si c’est le cas, le connecter et le rediriger vers une autre page ;
- sinon, afficher un message d’erreur.
* Pour savoir comment vérifier si les données sont correctes, et si c’est le cas, 
connecter l’utilisateur. 
Pour cela, Django fournit deux fonctions, authenticate et login, 
toutes deux situées dans le module django.contrib.auth
Voici comment elles fonctionnent :
- authenticate(username=nom, password=mdp) : si la combinaison utilisateur/mot de passe est correcte, 
authenticate renvoie l’entrée du modèle User correspondante. 
Si ce n’est pas le cas, la fonction renvoie None.
- login(request, user) : permet de connecter l’utilisateur. 
La fonction prend l’objet HttpRequest passé à la vue par le framework,
et l’instance de User de l’utilisateur à connecter.
*!* Avant d’utiliser login avec un utilisateur, vous devez avant tout avoir utilisé authenticate
avec le nom d’utilisateur et le mot de passe correspondant

* Exemple de vue :
# crepes_bretonnes\secret\views.py
from django.shortcuts import render
from django.contrib.auth import authenticate, login
from secret.forms import ConnexionForm

def connexion(request):
    error = False

    if request.method == "POST":
        form = ConnexionForm(request.POST)
        if form.is_valid():
            username = form.cleaned_data["username"]
            password = form.cleaned_data["password"]
            user = authenticate(username=username, password=password)  
            # Nous vérifions si les données sont correctes
            if user:  # Si l'objet renvoyé n'est pas None
                login(request, user)  # nous connectons l'utilisateur
                return redirect(reverse(accueil))
            else: # sinon une erreur sera affichée
                error = True
    else:
        form = ConnexionForm()

    return render(request, 'secret/connexion.html', locals())

* Et finalement la directive de routage :
# crepes_bretonnes\secret\urls.py
from django.urls import path
from . import views

urlpatterns = [
    path('connexion', views.connexion, name='connexion')
]

* et l'ajout' aux url globales
# crepes_bretonnes\crepes_bretonnes\urls.py
path('secret/', include('secret.urls')),

# - La déconnexion - #

* il suffit d’appeler la fonction logout de django.contrib.auth. 
* il n’y a même pas besoin de vérifier si le visiteur est connecté ou non
# crepes_bretonnes\secret\views.py
from django.contrib.auth import logout # ++
from django.urls import reverse # ++
from django.shortcuts import redirect # ++

def deconnexion(request):
    logout(request)
    return redirect(reverse(connexion))
    # reverse crée une directive semblable à la balise de gabarit url
    # {% url 'some-url-name' arg1=v1 arg2=v2 %}

* le routage :
path('deconnexion', views.deconnexion, name='deconnexion'),

* créer la page d'accueil' (qui s'affiche' après connexion)
# crepes_bretonnes\secret\urls.py
path('', views.accueil, name='accueil'),
# crepes_bretonnes\secret\views.py
def accueil(request):
    return render(request, 'secret/accueil.html', locals())
# crepes_bretonnes\secret\templates\secret\accueil.html
<h1>Bienvenue sur votre compte secret !</h1>


# - Intéragir avec le profil utilisateur -

* un processeur de contexte se charge d’ajouter une variable reprenant l’instance User 
de l’utilisateur dans les templates. 
* Il en va de même pour les vues.
* l’objet HttpRequest passé à la vue contient également un attribut user 
qui renvoie l’objet utilisateur du visiteur
* il peut, encore une fois, être une instance User s’il est connecté, ou AnonymousUser 
si ce n’est pas le cas
* exemple :
from django.http import HttpResponse

def dire_bonjour(request):
    if request.user.is_authenticated():
        return HttpResponse("Salut, {0} !".format(request.user.username))
    return HttpResponse("Salut, anonyme.")

* pour autoriser l’accès de certaines vues uniquement aux utilisateurs connectés,
Django fournit un décorateur très pratique qui nous permet de nous assurer qu’uniquement
des visiteurs authentifiés accèdent à la vue = login_required 
(il se situe dans django.contrib.auth.decorators)
* exemple d’utilisation :
from django.contrib.auth.decorators import login_required

@login_required
def ma_vue(request):
    # …

* Si l’utilisateur n’est pas connecté, il sera redirigé vers l’URL de la vue de connexion. 
* Cette URL est normalement définie depuis la variable LOGIN_URL dans votre settings.py. 
* Si ce n’est pas fait, la valeur par défaut est '/accounts/login/'. 
* Comme nous avons utilisé l’URL 'secret/connexion' tout à l’heure, réindiquons-la ici :
LOGIN_URL = '/secret/connexion'
* si l’utilisateur n’est pas connecté, non seulement il sera redirigé vers 'secret/connexion', 
mais l’URL complète de la redirection sera "secret/connexion?next=/{url d'où vient redirection}/"
* vous pouvez également préciser le nom de ce paramètre (au lieu de next  par défaut), 
via l’argument redirect_field_name du décorateur :
from django.contrib.auth.decorators import login_required

@login_required(redirect_field_name='rediriger_vers')
def ma_vue(request):
    # …

Vous pouvez également spécifier une autre URL de redirection pour la connexion 
(au lieu de prendre LOGIN_URL  dans le settings.py) :
from django.contrib.auth.decorators import login_required

@login_required(login_url='/connexion_pour_concours/')
def jeu_concours(request):
    # …

* classe finale :
# crepes_bretonnes\secret\views.py
from django.urls import reverse
from django.shortcuts import render, redirect
from django.contrib.auth import authenticate, login, logout
from secret.forms import ConnexionForm
from django.contrib.auth.decorators import login_required

@login_required(login_url='/secret/connexion')
def accueil(request):
    user = request.user.username
    return render(request, 'secret/accueil.html', locals())

def connexion(request):
    error = False

    if request.method == "POST":
        form = ConnexionForm(request.POST)
        if form.is_valid():
            username = form.cleaned_data["username"]
            password = form.cleaned_data["password"]
            # Nous vérifions si les données sont correctes
            user = authenticate(username=username, password=password)
            if user:  # Si l'objet renvoyé n'est pas None
                login(request, user)  # nous connectons l'utilisateur
                return redirect(reverse(accueil))
            else:  # sinon une erreur sera affichée
                error = True
    else:
        form = ConnexionForm()

    return render(request, 'secret/connexion.html', locals())


def deconnexion(request):
    logout(request)
    return redirect(reverse(connexion))
    # reverse crée une directive semblable à la balise de gabarit url
    # {% url 'some-url-name' arg1=v1 arg2=v2 %}

# crepes_bretonnes\secret\templates\secret\accueil.html
<h1>Bienvenue, {{ user }}, sur votre compte secret !</h1>

* Enfin, comme pour les modèles, Django utilise des signaux pour certains événements utilisateurs :
- user_logged_in : envoyé quand un utilisateur se connecte, avec request et user en argument ;
- user_logged_out : envoyé quand un utilisateur se déconnecte, avec request et user en argument ;
- user_login_failed : envoyé quand une tentative de connexion a échoué, avec credentials en argument, 
contenant des informations sur la tentative.

## - Les vues génériques

* L’application django.contrib.auth contient certaines vues qui permettent de réaliser les tâches 
communes d’un système utilisateurs sans devoir écrire une seule vue : 
se connecter, 
se déconnecter, 
changer le mot de passe 
et récupérer un mot de passe perdu
* Utilisation des vues : https://docs.djangoproject.com/fr/3.0/topics/auth/default/#module-django.contrib.auth.views
* Pour utiliser ces vues, il suffit de leur assigner une URL 
et de passer les éventuels paramètres que vous souhaitez changer :
# On import les vues de Django, avec un nom spécifique
from django.contrib.auth import views as auth_views
path('connexion', auth_views.login, {'template_name': 'secret/connexion.html'})

Les vues génériques : https://docs.djangoproject.com/fr/3.0/topics/auth/default/#all-authentication-views
*!* les noms des vues ont changé depuis le cours, on fait désormais appel à des classes
# https://dev.to/stuartelimu/create-an-authentication-app-for-almost-any-django-project-9kc
# exemple plus récent :
from django.urls import path
from django.contrib.auth import views as auth_views
from . import views

urlpatterns = [
    path('login/', auth_views.LoginView.as_view(template_name='myapp/login.html'),
    {'arg1': 'valeur', 'arg2': 'valeur'} name='login'),
    path('logout/', auth_views.LogoutView.as_view(), name='logout'),
]

◘ Se connecter
* Vue :django.contrib.auth.views.login.
* Arguments optionnels :
    template_name : le nom du template à utiliser (par défaut 
    registration/login.html).
* Contexte du template :
    form : le formulaire à afficher ;
    next : l’URL vers laquelle l’utilisateur sera redirigé après la connexion.
* Affiche le formulaire et se charge de vérifier si les données saisies correspondent à un utilisateur. 
Si c’est le cas, la vue redirige l’utilisateur vers l’URL indiquée dans settings.LOGIN_REDIRECT_URL 
ou vers l’URL passée par le paramètre GET next  s’il y en a un, sinon il affiche le formulaire. 
Le template doit pouvoir afficher le formulaire et un bouton pour l’envoyer.

◘ Se déconnecter
* Vue : django.contrib.auth.views.logout.
* Arguments optionnels (un seul à utiliser) :
    next_page : l’URL vers laquelle le visiteur sera redirigé après la déconnexion ;
    template_name : le template à afficher en cas de déconnexion (par défaut registration/logged_out.html) ;
    redirect_field_name : utilise pour la redirection l’URL du paramètre GET passé en argument.
* Contexte du template :
    title : chaîne de caractères contenant « Déconnecté ».
* Déconnecte l’utilisateur et le redirige.

◘ Se déconnecter puis se connecter
* Vue : django.contrib.auth.views.logout_then_login.
* Arguments optionnels :
    login_url : l’URL de la page de connexion à utiliser (par défaut utilise settings.LOGIN_URL).
* Contexte du template : aucun.
* Déconnecte l’utilisateur, puis le redirige vers l’URL contenant la page de connexion.

◘ Changer le mot de passe
* Vue :django.contrib.auth.views.password_change.
* Arguments optionnels :
    template_name : le nom du template à utiliser (par défaut registration/password_change_form.html) ;
    post_change_redirect : l’URL vers laquelle rediriger l’utilisateur après le changement du mot de passe ;
    password_change_form : pour spécifier un autre formulaire que celui utilisé par défaut.
* Contexte du template :
    form : le formulaire à afficher
* Affiche un formulaire pour modifier le mot de passe de l’utilisateur,
puis le redirige si le changement s’est correctement déroulé. 
Le template doit contenir ce formulaire et un bouton pour l’envoyer.

◘ Confirmation du changement de mot de passe
* Vue :django.contrib.auth.views.password_change_done.
* Arguments optionnels :
    template_name : le nom du template à utiliser (par défaut registration/password_change_done.html).
* Contexte du template : aucun.
* Vous pouvez vous servir de cette vue pour afficher un message de confirmation 
après le changement de mot de passe. 
Il suffit de faire pointer la redirection de django.contrib.auth.views.password_change sur cette vue.

◘ Demande de réinitialisation du mot de passe
* Vue :django.contrib.auth.views.password_reset.
* Arguments optionnels :
    template_name : le nom du template à utiliser (par défaut registration/password_reset_form.html) ;
    email_template_name : le nom du template à utiliser pour générer l’e-mail qui sera envoyé 
    à l’utilisateur avec le lien pour réinitialiser le mot de passe 
    (par défaut registration/password_reset_email.html) ;
    html_email_template_name : le nom du template HTML à utiliser pour l’e-mail. 
    Par défaut, l’e-mail n’est envoyé qu’au format texte ;
    subject_template_name : le nom du template à utiliser pour générer le sujet de l’e-mail envoyé 
    à l’utilisateur (par défaut registration/password_reset_subject.txt) ;
    password_reset_form  : pour spécifier un autre formulaire à utiliser que celui par défaut ;
    post_reset_redirect  : l’URL vers laquelle rediriger le visiteur après la demande de réinitialisation ;
    from_email  : une adresse e-mail valide depuis laquelle sera envoyé l’e-mail 
    (par défaut, Django utilise settings.DEFAULT_FROM_EMAIL).
* Contexte du template :
    form : le formulaire à afficher.
* Contexte de l’e-mail et du sujet :
    user : l’utilisateur concerné par la réinitialisation du mot de passe ;
    email : un alias pour user.email ;
    domain : le domaine du site web à utiliser pour construire l’URL 
    (utilise request.get_host() pour obtenir la variable) ;
    protocol : http ou https ;
    uid : l’ID de l’utilisateur encodé en base 36 ;
    token : le token  unique de la demande de réinitialisation du mot de passe.
* La vue affiche un formulaire permettant d’indiquer l’adresse e-mail du compte à récupérer. 
L’utilisateur recevra alors un e-mail (il est important de configurer l’envoi d’e-mails ; 
référez-vous à l’annexe sur le déploiement en production pour davantage d’informations à ce sujet) 
avec un lien vers la vue de confirmation de réinitialisation du mot de passe.
* Voici un exemple du template pour générer l’e-mail :
Une demande de réinitialisation a été envoyée pour le compte {{ user.username }}. 
Veuillez suivre le lien ci-dessous :
{{ protocol }}://{{ domain }}{% url 'password_reset_confirm' uidb36=uid token=token %}

◘ Confirmation de demande de réinitialisation du mot de passe
* Vue :django.contrib.auth.views.password_reset_done.
* Arguments optionnels :
    template_name : le nom du template à utiliser (par défaut registration/password_reset_done.html).
* Contexte du template : vide.
* Vous pouvez vous servir de cette vue pour afficher un message de confirmation 
après la demande de réinitalisation du mot de passe. 
Il suffit de faire pointer la redirection de django.contrib.auth.views.password_reset sur cette vue.

◘ Réinitialiser le mot de passe
* Vue : django.contrib.auth.views.password_reset_confirm.
* Arguments optionnels :
    template_name : le nom du template à utiliser (par défaut registration/password_reset_confirm.html) ;
    set_password_form : pour spécifier un autre formulaire à utiliser que celui par défaut ;
    post_reset_redirect : l’URL vers laquelle sera redirigé l’utilisateur après la réinitialisation.
* Contexte du template :
    form  : le formulaire à afficher ;
    validlink  : booléen, mis à True  si l’URL actuelle représente bien une demande de réinitialisation valide.
* Cette vue affichera le formulaire pour saisir un nouveau mot de passe, 
et se chargera de la mise à jour de ce dernier.

◘ Confirmation de la réinitialisation du mot de passe
* Vue : django.contrib.auth.views.password_reset_complete.
* Arguments optionnels :
    template_name : le nom du template à utiliser (par défaut registration/password_reset_complete.html).
* Contexte du template : aucun.
* Vous pouvez vous servir de cette vue pour afficher un message de confirmation 
après la réinitialisation du mot de passe. 
Il suffit de faire pointer la redirection de django.contrib.auth.views.password_reset_confirm  
sur cette vue.

## - Les permissions et les groupes

* les permissions permettent de déterminer si un utilisateur a le droit d’effectuer 
une certaine action ou non. 
* Les groupes permettent de définir des permissions communes à un ensemble d’utilisateurs

# - les permissions -

* Une permission a la forme suivante : nom_application.nom_permission
* Django crée automatiquement trois permissions pour chaque modèle enregistré.
* Si nous reprenons par exemple le modèle Article  de l’application blog, 
trois permissions sont créées par Django :
    blog.add_article : la permission pour créer un article ;
    blog.change_article : la permission pour modifier un article ;
    blog.delete_article : la permission pour supprimer un article.
* Il est possible de créer ses propres permissions
* Chaque permission dépend d’un modèle et doit être renseignée dans sa sous-classe Meta. 
Petit exemple en reprenant notre modèle Article utilisé au début :
class Article(models.Model):
    titre = models.CharField(max_length=100)
    auteur = models.CharField(max_length=42)
    contenu = models.TextField()
    date = models.DateTimeField(auto_now_add=True, auto_now=False, verbose_name="Date de parution")
    categorie = models.ForeignKey(Categorie)

    def __str__(self):
        return self.titre

    class Meta:
        permissions = (
            ("commenter_article", "Commenter un article"),
            ("marquer_article", "Marquer un article comme lu"),
            # création d'un tuple contenant les paires de vos permissions, 
            # avec à chaque fois le nom de la permission et sa description
        )

* Après avoir mis à jour la base de données (makemigrations et migrate), 
il est ensuite possible d’assigner des permissions à un utilisateur dans l’administration 
(cela se fait depuis la fiche d’un utilisateur)
* pour vérifier si un utilisateur possède ou non une permission, 
il suffit de faire : user.has_perm("blog.commenter_article").
La fonction renvoie True  ou False, selon si l’utilisateur dispose de la permission ou non. 
Cette fonction est également accessible depuis les templates,
encore grâce à un context processor, perms :
{% if perms.blog.commenter_article %}
	<p><a href="/commenter/">Commenter</a></p>
{% endif %}
# Le lien ici ne sera affiché que si l’utilisateur dispose de la permission pour commenter

* De même que pour le décorateur login_required, il existe un décorateur 
permettant de s’assurer que l’utilisateur qui souhaite accéder à la vue dispose bien 
de la permission nécessaire. 
* Il s’agit de django.contrib.auth.decorators.permission_required
from django.contrib.auth.decorators import permission_required

@permission_required('blog.commenter_article')
def article_commenter(request, article):
    # …

* il est également possible de créer une permission dynamiquement. 
* Pour cela, il faut importer le modèle Permission, situé dans django.contrib.auth.models
* Ce modèle possède les attributs suivants :
    name : le nom de la permission, 50 caractères maximum ;
    content_type : un content_type pour désigner le modèle concerné ;
    codename : le nom de code de la permission.

* si nous souhaitons par exemple créer une permission « commenter un article » spécifique à chaque article, 
et ce à chaque fois que nous créons un nouvel article, voici comment procéder :
from django.contrib.auth.models import Permission
from blog.models import Article
from django.contrib.contenttypes.models import ContentType

…  # Récupération des données
article.save()

content_type = ContentType.objects.get(app_label='blog', model='Article')
permission = Permission.objects.create(
    codename='commenter_article_{0}'.format(article.id),
    name='Commenter l\'article "{0}"'.format(article.titre),
    content_type=content_type)

* Une fois que la permission est créée, 
il est possible de l’assigner à un utilisateur précis de cette façon :
user.user_permissions.add(permission)
* Pour rappel, user_permissions est une relation ManyToMany 
de l’utilisateur vers la table des permissions.

## - Les groupes

* groupe = regroupement d’utilisateurs auquel nous pouvons assigner des permissions
* Une fois qu’un groupe dispose d’une permission, 
tous ses utilisateurs en disposent automatiquement aussi
* Il s’agit donc d’un modèle, django.contrib.auth.models.Group, qui dispose des champs suivants :
    name : le nom du groupe (80 caractères maximum) ;
    permissions : une relation ManyToMany vers les permissions, 
    comme user_permissions pour les utilisateurs.
* Pour ajouter un utilisateur à un groupe, il faut utiliser la relation ManyToManygroups de User  :
>>> from django.contrib.auth.models import User, Group
>>> group = Group(name="Les gens géniaux")
>>> group.save()
>>> user = User.objects.get(username="Mathieu")
>>> user.groups.add(group)
* La méthode user.has_perm('app.nom_perm') vérifie donc si l’utilisateur a cette permission 
ou s’il appartient à un groupe ayant la permission app.nom_perm


## -- LES MESSAGES -- ##

## - Les bases

* s’assurer que l’application et ses dépendances sont bien installées. 
* dans settings.py, vous devez avoir :
    dans MIDDLEWARE, 'django.contrib.messages.middleware.MessageMiddleware' ;
    dans INSTALLED_APPS, 'django.contrib.messages' ;
    dans TEMPLATES,'django.contrib.messages.context_processors.messages' ;

* Django peut envoyer des notifications (aussi appelées messages) à tous les visiteurs, 
qu’ils soient connectés ou non. 
* Il existe plusieurs niveaux de messages par défaut (nous verrons comment en ajouter par la suite) :
    DEBUG : message destiné à la phase de développement uniquement. 
    Ces messages ne seront affichés que si DEBUG=True dans votre settings.py.
    INFO : message d’information pour l’utilisateur.
    SUCCESS : confirmation qu’une action s’est bien déroulée.
    WARNING : une erreur n’a pas été rencontrée, mais pourrait être imminente.
    ERROR : une action ne s’est pas déroulée correctement ou une erreur quelconque est apparue.
* Chaque niveau a son « tags » associé, qui est le niveau en minuscules (debug, info...)
* Ces tags sont notamment utilisés pour pouvoir définir un style CSS précis à chaque niveau, 
afin de pouvoir les différencier.

* Voici la fonction à appeler pour envoyer un message depuis une vue :
from django.contrib import messages
messages.add_message(request, messages.INFO, 'Bonjour visiteur !')
# Il est important de ne pas oublier le premier argument : request, l’objet HttpRequest donné à la vue

* Il existe également quelques raccourcis pour les niveaux par défaut :
messages.debug(request, '%s requêtes SQL ont été exécutées.' % compteur)
messages.info(request, 'Rebonjour !')
messages.success(request, 'Votre article a bien été mis à jour.')
messages.warning(request, 'Votre compte expire dans 3 jours.')
messages.error(request, 'Cette image n\'existe plus.')

* afficher les messages
* Django se charge de la majeure partie du travail : une variable messages
est incluse dans le contexte grâce au context_processors installé
+ choisir où afficher les notifications dans le template
* ébauche de code de template pour afficher les messages au visiteur :
{% if messages %}
<ul class="messages">
    {% for message in messages %}
    <li{% if message.tags %} class="{{ message.tags }}"{% endif %}>{{ message }}</li>
    # À l’itération de chaque message, ce dernier sera supprimé tout seul, 
    # ce qui assure que l’utilisateur ne verra pas deux fois la même notification
    {% endfor %}
</ul>
{% endif %}

*!* Ce code est de préférence à intégrer dans une base commune 
(appelée depuis {% extends %}) pour éviter de devoir le réécrire dans tous vos templates.

## - Dans les détails

* en réalité, les niveaux de messages ne sont que des entiers constants :
>>> from django.contrib import messages
>>> messages.INFO
20
* Voici la relation entre niveau et entier par défaut :
    DEBUG  : 10
    INFO  : 20
    SUCCESS  : 25
    WARNING  : 30
    ERROR  : 40
* ajouter un niveau = créer une nouvelle constante
Par exemple :
CRITICAL = 50
messages.add_message(request, CRITICAL, 'Une erreur critique est survenue.')
* Il est dès lors tout aussi possible d’ajouter des tags à un message. 
Ici, le tag « fail » sera ajouté :
messages.add_message(request, CRITICAL, 'Une erreur critique est survenue.', extra_tags="fail")

* il est posible de limiter l’affichage des messages à un certain niveau (égal ou supérieur)
* Cela peut se faire de deux manières différentes. 
* Soit depuis le settings.py, en mettant MESSAGE_LEVEL au niveau minimum des messages à afficher 
(par exemple 25, pour ne pas montrer les messages DEBUG  et INFO)
* soit en faisant cette requête dans la vue :
messages.set_level(request, messages.DEBUG)
# tous les messages dont le niveau est égal ou supérieur à 10 (la valeur de messages.DEBUG) 
# seront affichés
* On préfèrera la méthode globale avec le settings.py, 
qui permet d’afficher des informations supplémentaires lors du développement sans avoir à changer le code.
* En effet, il suffit de mettre le minimum à SUCCESS sur votre environnement de production 
pour cacher les messages de debug et d’info

* si vous souhaitez faire une application réutilisable, 
il se peut que les gens qui souhaitent l’intégrer n’utilisent pas le système de messages sur leur projet. 
Pour éviter de provoquer des erreurs, si vous pensez que le message est facultatif, 
vous pouvez spécifier à Django d’échouer silencieusement :
messages.info(request, 'Message à but informatif.', fail_silently=True)


## -- LA MISE EN CACHE -- ##

## - Le cache et ses systèmes

https://docs.djangoproject.com/fr/3.0/topics/cache/

* Mettre quelque chose « en cache » est le fait de sauvegarder le résultat d’une opération 
chère en temps de calcul, afin de ne pas avoir à ré-effectuer cette opération la fois suivante.
* Django enregistre les données dans un système de cache ; 
or, il dispose de plusieurs systèmes de caches différents à la base.
* Chacun de ces systèmes a ses avantages et désavantages, et tous fonctionnent un peu différemment. 
* Il s’agit donc de trouver le système de cache le plus adapté à vos besoins.
* La configuration du système de cache se fait grâce à la variable CACHES de votre settings.py

# Dans les fichiers

Un système de cache simple est celui enregistrant les données dans des fichiers sur 
le disque dur du serveur. 
Pour chaque valeur enregistrée dans le cache, 
le système va créer un fichier et y enregistrer le contenu de la donnée sauvegardée. 
Voici comment le configurer :
CACHES = {
    'default': {
        'BACKEND': 'django.core.cache.backends.filebased.FileBasedCache',
        # système de cache utilisé
        'LOCATION': '/var/tmp/django_cache',
        # doit pointer vers un dossier absolu, et non pas vers un fichier spécifique
        # 'c:/mon/dossier'
    }
}
Les fichiers sauvegardés seront « sérialisés » en utilisant le module pickle
pour y encoder les données à sauvegarder. 
Vous devez également vous assurer que votre serveur web a bien accès en écriture et
en lecture au dossier que vous avez indiqué.

# Dans la mémoire

Toutes vos données seront enregistrées dans la mémoire vive du serveur. 
Voici la configuration de ce système :
CACHES = {
    'default': {
        'BACKEND': 'django.core.cache.backends.locmem.LocMemCache',
        'LOCATION': 'cache_crepes'
        # identifiant de l’instance du cache, doit être unique
    }
}
Ce cache n’est pas très performant au niveau de la gestion mémoire, 
mais est pratique pour un environnement de développement. 
Il est par ailleurs le système utilisé par défaut si vous ne spécifiez pas de configuration.

# Dans la base de données

+ créer une table dans celle-ci pour y accueillir les données. 
* Cela se fait grâce à une commande spéciale de manage.py  :
python manage.py createcachetable [nom_table_cache]
+ l’indiquer dans le settings.py :
CACHES = {
    'default': {
        'BACKEND': 'django.core.cache.backends.db.DatabaseCache',
        'LOCATION': 'nom_table_cache',
    }
}
Ce système peut se révéler pratique et rapide si vous avez dédié tout un serveur physique 
à votre base de données ; néanmoins, il faut disposer de telles ressources pour arriver à 
quelque chose de convenable.

# En utilisant Memcached

* indépendant de Django, et le framework ne s’en charge pas lui-même
* Pour l’utiliser, il faut avant tout lancer un programme responsable lui-même du cache. 
* Django ne fera qu’envoyer les données à mettre en cache et les récupérer par la suite ; 
c’est au programme de sauvegarder et de gérer ces données.
* Si cela peut sembler assez pénible à déployer, le système est en revanche très rapide et 
probablement le plus efficace de tous. 
* Memcached va enregistrer les données dans la mémoire vive, comme le système vu précédemment 
qui utilisait la même technique, sauf qu’en comparaison de ce dernier, 
Memcached est bien plus efficace et utilise moins de mémoire. 
* Memcached est utile si vous comptez utiliser beaucoup de cache, sur un site à plutôt fort trafic.
* La configuration côté Django est encore une fois relativement simple :
CACHES = {
    'default': {
        'BACKEND': 'django.core.cache.backends.memcached.MemcachedCache',
        'LOCATION': '127.0.0.1:11211',
        # combinaison adresse IP:port depuis laquelle Memcached est accessible
    }
}

# Pour le développement

* Celui-ci ne fait rien (il n’enregistre aucune donnée et n’en renvoie aucune). 
* Il permet juste d’activer le système de cache, ce qui peut se révéler pratique 
si vous utilisez le cache en production, mais que vous n’en avez pas besoin en développement. 
* Voici sa configuration :
CACHES = {
    'default': {
        'BACKEND': 'django.core.cache.backends.dummy.DummyCache',
    }
}

# Quel système choisir ?

* développement => cache de développement ou cache mémoire (le simple, sans Memcached)
* production, si vous avez peu de données à mettre en cache, 
la solution la plus simple => système utilisant les fichiers
* lorsque le cache devient fortement utilisé, Memcached est probablement la meilleure solution
Sinon, utilisez le système utilisant la base de données. 

## - Les différentes techniques de mise en cache

https://docs.djangoproject.com/fr/3.0/topics/cache/#the-per-site-cache

# - Le cache « par site » -

* la manière la plus simple d’utiliser le cache est de mettre en cache tout le site
* Il s’agit alors d’ajouter 'django.middleware.cache.UpdateCacheMiddleware' et 
'django.middleware.cache.FetchFromCacheMiddleware' au réglage MIDDLEWARE, comme dans cet exemple :
MIDDLEWARE = [
    'django.middleware.cache.UpdateCacheMiddleware',
    'django.middleware.common.CommonMiddleware',
    'django.middleware.cache.FetchFromCacheMiddleware',
]
+ ajoutez les réglages obligatoires suivants dans votre fichier de réglages Django :
    CACHE_MIDDLEWARE_ALIAS – L’alias de cache à utiliser pour le stockage.
    CACHE_MIDDLEWARE_SECONDS – le nombre de secondes durant lequel chaque page doit être conservée en cache.
    CACHE_MIDDLEWARE_KEY_PREFIX – Si le cache est partagé par plusieurs sites utilisant la même installation de Django, 
    définissez cette valeur au nom du site ou à un nom unique de cette instance de Django, 
    afin d’éviter des collisions de clés. Indiquez une chaîne vide si cela ne vous concerne pas.

# - Cache par vue -

https://docs.djangoproject.com/fr/3.0/topics/cache/#the-per-view-cache
* méthode de cache pratique 
* Une manière plus fine d’utiliser l’infrastructure de cache
* Avec cette technique, dès que le rendu d’une vue est calculé, 
il sera directement enregistré dans le cache. Tant que celui-ci sera dans le cache, 
la vue ne sera plus appelée et la page sera directement cherchée dans le cache.
* Cette mise en cache se fait grâce à un décorateur : django.views.decorators.cache.cache_page. 
Voici son utilisation :
from django.views.decorators.cache import cache_page

@cache_page(60 * 15) # (durée en secondes après laquelle le rendu dans le cache aura expiré)
# Grâce à cet argument, vous êtes assuré que le cache restera à jour automatiquement
def lire_article(request, id):
    article = Article.objects.get(id=id)
    # ...

* Il est également possible de spécifier une mise en cache directement depuis les URLconf.
* Ex. : pour que les vues puissent être réutilisées pour un autre site sans cache, 
ou peut-être qu’à un moment donné les vues seront mises à disposition d’autres personnes 
qui voudront les utiliser sans cache 
Ainsi, la mise en cache de vues génériques est également possible :
from django.views.decorators.cache import cache_page
from . import views

urlpatterns = [
    path('foo/<int:code>/', cache_page(60 * 15)(views.lire_article)),
    # inclure la vue sous forme de référence, et non pas sous forme de chaîne de caractères
]

# - Dans les templates -

* Il est également possible de mettre en cache certaines parties d’un template. 
* Cela se fait grâce au tag {% cache %}
* Ce tag doit au préalable être inclus grâce à la directive {% load cache %}
* cache prend deux arguments au minimum : la durée d’expiration de la valeur (toujours en secondes), 
et le nom de cette valeur en cache (une sorte de clé que Django utilisera pour retrouver la bonne valeur
dans le cache) :
{% load cache %}
{% cache 500 carrousel %}
    /* mon carrousel */
{% endcache %}
# nous enregistrons dans le cache notre carrousel. 
# Celui-ci expirera dans 500 secondes et nous utilisons la clé carrousel

* il est également enregistrer plusieurs copies en cache d’une même partie de template 
dépendant de plusieurs variables.
* ex. : notre carrousel est différent pour chaque utilisateur
* solution = réutiliser une clé dynamique et différente pour chaque utilisateur :
{% load cache %}
{% cache 500 user.username %}
    /* mon carrousel adapté à l'utilisateur actuel */
{% endcache %}
# chaque utilisateur connecté aura dans le cache la copie du carrousel adaptée à son profil

# - La mise en cache de bas niveau -

https://docs.djangoproject.com/fr/3.0/topics/cache/#the-low-level-cache-api

* Pourquoi ? Il arrive parfois qu’enregistrer toute une vue ou 
une partie de template soit une solution exagérée et non adaptée
* solution = réaliser une mise en cache de variables bien précises
* Ces opérations sont réalisées grâce à plusieurs fonctions de l’objet cache
du module django.core.cache
* Cet objet cache se comporte un peu comme un dictionnaire. 
* Nous pouvons lui assigner des valeurs à travers des clés :
>>> from django.core.cache import cache
>>> cache.set('ma_cle', 'Coucou !', 30) # valeur enregistrée pendant 30 secondes dans le cache
>>> cache.get('ma_cle')
'Coucou !'

* il est possible de spécifier une valeur par défaut si la clé n’existe pas ou plus :
>>> cache.get('ma_cle', 'a expiré')
'a expiré'

* Pour essayer d’ajouter une clé si elle n’est pas déjà présente, 
il faut utiliser la méthode add. Si cette clé est déjà présente, rien ne se passe :
>>> cache.set('cle', 'Salut')
>>> cache.add('cle', 'Coucou')
>>> cache.get('cle')
'Salut'

* Pour ajouter et obtenir plusieurs clés à la fois, il existe deux fonctions adaptées, 
set_many et get_many :
>>> cache.set_many({'a': 1, 'b': 2, 'c': 3})
>>> cache.get_many(['a', 'b', 'c'])
{'a': 1, 'b': 2, 'c': 3}

* Vous pouvez également supprimer une clé du cache, voire plusieurs en même temps :
>>> cache.delete('a')
>>> cache.delete_many(['a', 'b', 'c'])

* Pour vider tout le cache, voici la méthode clear. 
Toutes les clés et leurs valeurs seront supprimées :
>>> cache.clear()

* il existe encore deux fonctions, incr et decr, qui permettent respectivement d’incrémenter 
et de décrémenter un nombre dans le cache, sans avoir à le récupérer pour le redéfinir :
>>> cache.set('num', 1)
>>> cache.incr('num')
2
>>> cache.incr('num', 10) # incrémente de 10
12
>>> cache.decr('num')
11
>>> cache.decr('num', 5) # décrémente de 5
6


## -- LA PAGINATION -- ##

https://docs.djangoproject.com/fr/3.0/topics/pagination/
https://docs.djangoproject.com/fr/3.0/ref/paginator/#django.core.paginator.Paginator

## - Exemples en console

* Django permet de répartir des ensembles d’objets sur plusieurs pages : des listes, des QuerySet, etc. 
En réalité, tous les objets ayant une méthode count ou __len__ sont acceptés.

* premier exemple = une simple liste et sera effectué dans l’interpréteur interactif. 
+ Ouvrez une console et tapez la commande python manage.py shell pour lancer l’interpréteur.
* Django fournit une classe nommée Paginator qui effectue la pagination. 
Elle se situe dans le module django.core.paginator
>>> from django.core.paginator import Paginator
>>> villes = ['Tokyo', 'Mexico', 'Seoul', 'New York', 'Bombay', 'Karachi', 
'Sao Paulo', 'Manille', 'Bangkok', 'New Delhi', 'Djakarta', 'Shanghai',
'Los Angeles', 'Kyoto', 'Le Caire', 'Calcutta', 'Moscou', 'Istanbul',
'Buenos Aires', 'Dacca', 'Gauteng', 'Teheran', 'Pekin']

* La classe Paginator est instanciable avec deux paramètres : la liste d’objets à répartir 
et le nombre maximum d’objets à afficher par page
# class Paginator(object_list, per_page, orphans=0, allow_empty_first_page=True)
* Imaginons que nous souhaitions afficher 5 villes par page :
>>> p = Paginator(villes, 5)
* Cet objet possède les attributs suivants :
>>> p.count      # Nombre d'objets au total, toutes pages confondues
23
>>> p.num_pages  # Nombre de pages nécessaires pour répartir toutes les villes
5                # En effet, 4 pages avec 5 villes et 1 page avec 3 villes

>>> p.page_range  # La liste des pages disponibles
[1, 2, 3, 4, 5]   # range(1, 6)

* Nous pouvons obtenir les villes d’une page précise grâce la méthode page(). 
Cette méthode renvoie un objet Page, dont voici les méthodes principales :
>>> page1 = p.page(1)  # Renvoie un objet Page pour notre première page
>>> page1
<Page 1 of 5>
>>> page1.object_list      # Le contenu de cette première page
['Tokyo', 'Mexico', 'Seoul', 'New York', 'Bombay']  
>>> p.page(5).object_list  # Même opération pour la cinquième page
['Gauteng', 'Teheran', 'Pekin']
>>> page1.has_next()      # Est-ce qu'il y a une page suivante ?
True   
>>> page1.has_previous()  # Est-ce qu'il y a une page précédente ?
False

*!* la numérotation des pages commence bien à 1

* La classe renvoie plusieurs types d’exceptions en cas d’erreur à la récupération d’une page :
>>> p.page(0)
Traceback (most recent call last):
   […]
django.core.paginator.EmptyPage: That page number is less than 1
>>> p.page(6)
Traceback (most recent call last):
   […]
django.core.paginator.EmptyPage: That page contains no results
>>> p.page('abc') 
Traceback (most recent call last):
  […]
django.core.paginator.PageNotAnInteger: That page number is not an integer

* deux autres situations permettant de compléter au mieux notre système de pagination
* le constructeur complet de Paginator  accepte deux paramètres optionnels

* le paramètre orphans permet de préciser le nombre minimum d’éléments qu’il faut 
pour afficher une dernière page
* Si le nombre d’éléments est inférieur au nombre requis, alors ces éléments sont déportés 
sur la page précédente (qui devient elle-même la dernière page), 
en plus des éléments qu’elle contient déjà. Prenons notre exemple précédent :
>>> p = Paginator(villes, 10, orphans=5)
>>> p.num_pages
2
>>> p.page(1).object_list
['Tokyo', 'Mexico', 'Seoul', 'New York', 'Bombay', 'Karachi', 'Sao Paulo', 'Manille', 'Bangkok', 
'New Delhi']
>>> p.page(2).object_list
['Djakarta', 'Shanghai', 'Los Angeles', 'Kyoto', 'Le Caire', 'Calcutta', 'Moscou', 'Istanbul', 
'Buenos Aires', 'Dacca', 'Gauteng', 'Teheran', 'Pekin']
# Nous voyons que la dernière page théorique (la 3e) aurait dû contenir 3 éléments 
# (Gauteng, Teheran  et Pekin), ce qui est inférieur à 5. 
# Ces éléments sont donc affichés à la page 2, qui devient la dernière, avec 13 éléments.

* Le dernier attribut, allow_empty_first_page, permet de lancer une exception 
si la première page est vide. 
Autrement dit, une exception est levée s’il n’y a aucun élément à afficher. 
Un exemple est encore une fois plus parlant :
# Nous initialisons deux Paginator avec une liste vide
>>> pagination_avec_vide = Paginator([], 42)  
>>> pagination_sans_vide = Paginator([], 42, allow_empty_first_page=False) 

>>> pagination_avec_vide.page(1)  # Comportement par défaut si la liste est vide
<Page 1 of 1>
>>> pagination_avec_vide.page(1).object_list
[]
>>> pagination_sans_vide.page(1) 
Traceback (most recent call last):
 […]
django.core.paginator.EmptyPage: That page contains no results

## - Utilisation concrète dans une vue

* Nous reprenons notre vue simple (pas celle utilisant les vues génériques) du TP 
sur la minification d’URL :
def liste(request):
    """Affichage des redirections"""
    minis = MiniURL.objects.order_by('-nb_acces')

    return render(request, 'mini_url/liste.html', locals())

+ ajouter un argument page  à notre vue, afin de savoir quelle page l’utilisateur souhaite voir. 
* Pour ce faire, il y a deux méthodes :
- passer le paramètre page  via un paramètre GET  (/url/?page=1) ;
ce cas se résume à un simple request.GET.get('page') dans la vue pour récupérer le numéro de page
- modifier la définition de l’URL et la vue pour prendre en compte un numéro de page
(/url/1 pour la première page)

* Nous modifions donc légèrement notre vue pour le paramètre page :
# crepes_bretonnes\mini_url\views.py
def liste(request, page=1):
   """ Affichage des redirections """
   minis = MiniURL.objects.order_by('-nb_acces')

   return render(request, 'mini_url/liste.html', locals())

* Et notre fichier urls.py :
# crepes_bretonnes\mini_url\urls.py
from django.urls import path, re_path
from . import views

urlpatterns = [
    # Pas d'argument page précisé -> vaudra 1 par défaut
    path('', views.liste, name='url_liste'),
    re_path(r'^(?P<page>\d+)$', views.liste, name='url_liste'),
    
    # . . .
]

+ créons donc un objet Paginator à partir de cette liste
from django.core.paginator import Paginator, EmptyPage

def liste(request, page=1):
    """ Affichage des redirections enregistrées """
    minis_list = MiniURL.objects.order_by('-nb_acces')
    paginator = Paginator(minis_list, 5)  # 5 liens par page

    try:
        # La définition de nos URL autorise comme argument « page » uniquement 
        # des entiers, nous n'avons pas à nous soucier de PageNotAnInteger
        minis = paginator.page(page)
    except EmptyPage:
        # Nous vérifions toutefois que nous ne dépassons pas la limite de page
        # Par convention, nous renvoyons la dernière page dans ce cas
        minis = paginator.page(paginator.num_pages)

    return render(request, 'mini_url/liste.html', locals())

* l’adresse http://127.0.0.1:8000/m/ renvoie les 5 premières URL,
http://127.0.0.1:8000/m/2 les 5 suivantes, etc.

+ améliorer le template : 
<h1>Le raccourcisseur d'URL spécial crêpes bretonnes !</h1>

<p><a href="{% url 'url_nouveau' %}">Raccourcir une URL.</a></p>

<p>Liste des URL raccourcies :</p>
<ul>
    {% for mini in minis %}
    <li> <a href="{% url 'url_update' mini.code %}">Mettre à jour</a> -  
        <a href="{% url 'url_delete' mini.code %}">Supprimer</a> | {{ mini.url }} via 
        <a href="http://{{ request.get_host }}{% url 'url_redirection' mini.code %}">
            {{ request.get_host }}{% url 'url_redirection' mini.code %}
        </a> 
        {% if mini.pseudo %}par {{ mini.pseudo }}{% endif %} ({{ mini.nb_acces }} accès)
    </li>
    {% empty %}
    <li>Il n'y en a pas actuellement.</li>
    {% endfor %}
</ul>

<div class="pagination">
   {% if minis.has_previous %}
       <a href="{% url 'url_liste' minis.previous_page_number %}">Précédente</a> -
   {% endif %}

   <span class="current">
       Page {{ minis.number }} sur {{ minis.paginator.num_pages }}
   </span>

   {% if minis.has_next %}
       - <a href="{% url 'url_liste' minis.next_page_number %}">Suivante</a>
   {% endif %}
</div>

*!* créer un template générique gérant la pagination et de l’appeler où vous en avez besoin,
via {% include "pagination.html" with liste=minis view="url_liste" %}

+ adapter la pagination comme vous voulez en modifiant la ligne appelant Paginator
# crepes_bretonnes\mini_url\views.py
+ Par exemple, on peut réutiliser le troisième argument optionnel orphans 
pour avoir un minimum de liens sur la dernière page :
paginator = Paginator(minis_list, 20, 5) # 20 liens par page, avec un minimum de 5 liens sur la dernière


## -- L'INTERNATIONALISATION (I18N) -- ##

https://openclassrooms.com/fr/courses/1871271-developpez-votre-site-web-avec-le-framework-django/1874201-linternationalisation
https://docs.djangoproject.com/fr/3.0/topics/i18n/

# settings.py

LANGUAGE_CODE = 'fr-fr'

TIME_ZONE = 'UTC'

USE_I18N = False # permet d’activer l’internationalisation

USE_L10N = True # permet de formater automatiquement certaines données 
# en fonction de la langue de l’utilisateur


## -- LES TESTS UNITAIRES -- ##

* opération qui vérifie une certaine partie de votre code
https://docs.djangoproject.com/fr/3.0/topics/testing/tools/
https://docs.djangoproject.com/fr/3.0/topics/testing/overview/
https://docs.python.org/3/library/unittest.html#module-unittest
* exemple :
from django.test import TestCase
from myapp.models import Animal

class AnimalTestCase(TestCase):
    def setUp(self):
        Animal.objects.create(name="lion", sound="roar")
        Animal.objects.create(name="cat", sound="meow")

    def test_animals_can_speak(self):
        """Animals that can speak are correctly identified"""
        lion = Animal.objects.get(name="lion")
        cat = Animal.objects.get(name="cat")
        self.assertEqual(lion.speak(), 'The lion says "roar"')
        self.assertEqual(cat.speak(), 'The cat says "meow"')

## - Tests de fonctions et méthodes

# - Écrire un test unitaire -

* Reprenons notre modèle Article introduit précédemment dans l’application « blog ». 
* Nous y avons adjoint une méthode est_recent qui renvoie True si la date de parution de l’article
est comprise dans les 30 derniers jours, sinon elle renvoie False :
# crepes_bretonnes\blog\models.py
from django.db import models
from django.utils import timezone

class Article(models.Model):
    titre = models.CharField(max_length=100)
    slug = models.SlugField(max_length=100)
    auteur = models.CharField(max_length=42)
    contenu = models.TextField(null=True)
    date = models.DateTimeField(default=timezone.now,
                                verbose_name="Date de parution")
    categorie = models.ForeignKey('Categorie', on_delete=models.CASCADE)  # ++

    class Meta:
        ordering = ['date']

    def est_recent(self):
        """ Retourne True si l'article a été publié dans
            les 30 derniers jours """
        return (timezone.now() - self.date).days < 30

    def __str__(self):
        return self.titre

* que se passe-t-il si la date de parution de l’article se situe dans le futur ? 
L’article ne peut pas être considéré comme récent, car il n’est pas encore sorti !
* Les tests sont répartis par application
* Chaque application possède par défaut un fichier nommé tests.py dans lequel 
vous devez insérer vos tests
* Django exécutera tous les tests contenus dans les fichiers commençant par test
* si votre application possède de nombreux tests, vous pouvez créer un répertoire tests/ 
(avec un __init__.py) et créer plusieurs fichiers dedans, commençant tous par test_
* dès que la suite de tests grandit, il devient préférable de restructurer ce fichier 
en un module Python afin de pouvoir séparer les tests en sous-modules tels que 
test_models.py, test_views.py, test_forms.py, etc. 

* Voici notre tests.py incluant le test pour vérifier si un article du futur est récent ou non :
# crepes_bretonnes\blog\tests.py
from django.test import TestCase
from django.utils import timezone
from datetime import timedelta
from .models import Article

# regroupe tous les tests concernant le modèle Article
class ArticleTests(TestCase):
    # chaque méthode de test commence par test_
    def test_est_recent_avec_futur_article(self):
        """
        Vérifie si la méthode est_recent d'un Article ne
        renvoie pas True si l'Article a sa date de publication
        dans le futur.
        """
        # crée un article censé être publié dans 20 jours 
        # et vérifie si sa méthode est_recent renvoie True ou False (espéré)
        futur_article = Article(date=timezone.now() + timedelta(days=20))
        # Il n'y a pas besoin de remplir tous les champs, ni de sauvegarder
        self.assertEqual(futur_article.est_recent(), False)

* La vérification même se fait grâce à une méthode de TestCase nommée assertEqual. 
* Cette méthode prend deux paramètres et vérifie s’ils sont identiques. 
* Il existe plusieurs méthodes assert* pour faire vos tests, notamment :
Méthode                | Test Python équivalent
assertEqual(a, b)      | a == b
assertTrue(x)          | bool(x) is True
assertFalse(x)         | bool(x) is False
assertIs(a, b)         | a is b
assertIsNone(x)        | x is None
assertIn(a, b)         | a in b
assertIsInstance(a, b) | isinstance(a, b)

# - Lancer le test en console -

* la méthode est_recent  devrait renvoyer False. 
Comme nous avons introduit une erreur dans notre modèle, 
elle est censée renvoyer True  pour le moment, et donc faire échouer le test

+ python manage.py test
# FAIL: test_est_recent_avec_futur_article (blog.tests.ArticleTests)
# AssertionError: True != False

* vous pouvez choisir les tests à lancer. 
* La commande test peut prendre en paramètre le chemin Python des tests à exécuter
* Si vous souhaitez juste tester l’application « blog », vous pouvez indiquer manage.py test blog
* Si vous avez plusieurs fichiers de tests, vous pouvez spécifier le fichier et
même la classe à exécuter :
python manage.py test blog.tests
python manage.py test blog.tests.ArticleTests
* Vous pouvez aller plus loin en spécifiant un seul test précis :
python manage.py test blog.tests.ArticleTests.test_est_recent_avec_futur_article

+ modifions la méthode est_recent afin de corriger le bug :
def est_recent(self):
        return (timezone.now() - self.date).days < 30 and self.date < timezone.now()

+ python manage.py test blog.tests.ArticleTests
# OK

# Initialisation de données pour nos tests

* Django n’utilise pas votre base de données de développement pour lancer les tests. 
* une base de test est créée à chaque fois que les tests sont lancés, puis détruite à la fin
* but = ne pas ruiner vos données lors de vos tests 
et d’être maître de l’état de la base lors des tests unitaires
* Vous pouvez préparer votre suite de tests en créant deux méthodes : 
- setUpTestData = appelée une seule fois au début de la suite de tests
- setUp = appelée avant chaque test
* permettront d’initialiser certaines variables à l’intérieur de votre classe 
pour les utiliser dans vos tests par la suite
* but = récupérer ou créer certains objets en base, plutôt que de le faire à chaque test
class UnTest(TestCase):
    
    @classmethod  # <- setUpClass doit être une méthode de classe, attention !
    def setUpTestData(cls):
        Categorie.objects.create(titre="Par défaut")
    
    def setUp(self):
        self.une_variable = "Salut !"

    def test_verification(self):
        self.assertEqual(self.une_variable, "Salut !")
        self.assertTrue(
            Categorie.objects.filter(titre="Par défaut").exists()
        )

# Tests avec avertissements actifs
Il est conseillé de lancer les tests en activant les avertissements de Python : 
python -Wa manage.py test. 
Le drapeau -Wa indique à Python d’afficher les avertissements d’obsolescence. 


## - Test de vues -

* il est également possible de tester des vues. 
* Cela se fait grâce à un serveur web intégré au système de test qui sera lancé tout seul 
lors de la vérification des tests
* Pour tester quelques vues, nous allons utiliser l’application mini_url
* Voici le début de notre mini_url/tests.py, incluant notre premier test :
from django.test import TestCase
from django.urls import reverse
from .models import MiniURL

# crée une redirection, l’enregistre et la retourne
def creer_url():
    mini = MiniURL(url="http://foo.bar", code=MiniURL.generer(MiniURL, 6), pseudo="Maxime")
    mini.save()
    return mini


class MiniURLTests(TestCase):
    # va s’assurer que lorsque nous créerons une redirection dans la base de données, 
    # celle-ci sera bien affichée par la vue views.liste
    def test_liste(self):
        """ Vérifie si une URL sauvegardée est bien affichée """
        # crée une redirecton
        mini = creer_url()
        # nous demandons ensuite au client intégré au système de test 
        # d’accéder à la vue liste grâce à la méthode get de self.client
        reponse = self.client.get(reverse('url_liste'))
        # Cette méthode prend une URL, c’est pourquoi 
        # nous utilisons la fonction reverse afin d’obtenir l’URL de la vue spécifiée

        # vérifier que notre vue s’est bien exécutée
        self.assertEqual(reponse.status_code, 200)
        # est-ce que l’URL qui vient d’être créée est bien affichée sur la page ?
        # La méthode renvoie une erreur si la chaîne de caractères n’est pas contenue dans la page
        self.assertContains(reponse, mini.url)
        # est-ce que le QuerySetminis contenant toutes les redirections dans notre vue 
        # (celui que nous avons passé à notre template et qui est accessible depuis reponse.context) 
        # est égal au QuerySet indiqué en deuxième paramètre ?
        self.assertQuerysetEqual(reponse.context['minis'], [repr(mini)])

* La classe django.test.Client permet de simuler des requêtes HTTP
* self.client.get retourne un objet Response dont les principaux attributs sont status_code, 
un entier représentant le code HTTP de la réponse, content, 
une chaîne de caractères contenant le contenu de la réponse, et context, 
le dictionnaire de variables passé au template si un dictionnaire a été utilisé
* la classe Response : https://docs.djangoproject.com/fr/3.0/topics/testing/tools/#django.test.Response
* self.client.get procède à une requête GET utilisant le chemin path indiqué et renvoie un objet Response
* en savoir plus sur client : https://docs.djangoproject.com/fr/3.0/topics/testing/tools/#making-requests
* Rappel : 200 correspond à une requête correctement déroulée, 302 à une redirection, 
404 à une page non trouvée et 500 à une erreur côté serveur
* le deuxième argument de la troisième vérification n’est pas un QuerySet, 
mais est censé correspondre à la représentation du premier argument grâce à la fonction repr. 
Autrement dit, il faut que repr(premier_argument) == deuxieme_argument. 
Voici à quoi ressemble le deuxième argument dans notre exemple : ['<MiniURL : [ALSWM0] http://foo.bar>']

+ python manage.py test mini_url.tests
# OK

* comment faire si nous souhaitons par exemple soumettre un formulaire ? 
* Une telle opération se fait grâce à la méthode post de self.client, 
dont voici un exemple à partir de la vue nouveau de notre application, 
qui permet d’ajouter une redirection :
# crepes_bretonnes\mini_url\tests.py
def test_nouveau_redirection(self):
        """ Vérifie la redirection d'un ajout d'URL """
        data = {
            'url': 'http://www.djangoproject.com',
            'pseudo': 'Jean Dupont',
        }

        reponse = self.client.post(reverse('url_nouveau'), data)
        self.assertEqual(reponse.status_code, 302)
        # vérifie que la réponse est bien une redirection vers l’URL passée en paramètre
        self.assertRedirects(reponse, reverse('url_liste'))

+ python manage.py test mini_url.tests
# Ran 2 tests in 0.207s
# OK

* La méthode post fonctionne comme get, si ce n’est qu’elle prend un deuxième argument, 
à savoir un dictionnaire contenant les informations du formulaire.
* nous avons utilisé ici une nouvelle méthode de vérification : assertRedirects, 
qui vérifie que la réponse est bien une redirection vers l’URL passée en paramètre

* si vous gérez des redirections, vous pouvez forcer Django à suivre la redirection directement 
en indiquant follow=True à get ou post, 
ce qui fait que la réponse ne contiendra pas la redirection en elle-même, 
mais la page ciblée par la redirection, comme le montre l’exemple suivant : 
# crepes_bretonnes\mini_url\tests.py
def test_nouveau_ajout(self):
    """
    Vérifie si après la redirection l'URL ajoutée est bien dans la liste
    """
    data = {
        'url': 'http://www.crepes-bretonnes.com',
        'pseudo': 'Amateur de crêpes',
    }

    # on force Django à suivre la redirection directement en indiquant follow=True
    reponse = self.client.post(reverse('url_nouveau'), data, follow=True)
    self.assertEqual(reponse.status_code, 200)
    self.assertContains(reponse, data['url'])

+ python manage.py test mini_url.tests
# Ran 3 tests in 0.111s
# OK

* si vous souhaitiez tester une vue pour laquelle il faut obligatoirement être connecté 
à partir d’un compte utilisateur, sachez que vous pouvez vous connecter 
et vous déconnecter de la façon suivante :
from django.test import Client
c = Client()
c.login(username='utilisateur', password='mot_de_passe')
reponse = c.get('/une/url/')
c.logout()  # La déconnexion n'est pas obligatoire
* en savoir plus sur le client de test : https://docs.djangoproject.com/fr/3.0/topics/testing/tools/#the-test-client


## -- DJANGO.CONTRIB -- ##

* Django inclut dans le framework un nombre de modules complémentaires très important

## - Les modules de django.contrib

* l’ensemble des fonctionnalités supplémentaires de Django est situé dans le module django.contrib
* ces fonctionnalités ne sont pas essentielles au bon déroulement global de Django
* liste reprenant tous les modules compris dans django.contrib :

Nom du module | Description

admin         | Système d’administration
auth          | Système utilisateurs
contenttypes  | Permet d’obtenir la représentation de n’importe quel modèle
flatpages     | Permet de gérer des pages HTML statiques au sein même de la base de données
formtools     | Ensemble d’outils pour compléter les formulaires 
                (par exemple la prévisualisation avant envoi)
gis           | Bibliothèque complète qui apporte le support de SIG 
                (système d’information géographique) pour stocker des données géographiques 
                et les exploiter. Voir http://www.geodjango.org pour plus d’informations
humanize      | Ensemble de filtres pour les templates,
                afin de rendre certaines données plus « naturelles », 
                notamment pour les nombres et les dates
messages      | Gestion de notifications qui peuvent être affichées au visiteur
redirects     | Gestion des redirections au sein du projet via une base de données. 
                Utile si vous changez le schéma de vos URL
sessions      | Gestion des sessions
sitemaps      | Génération de sitemaps XML
sites         | Permet la gestion de différents sites web avec la même base de données 
                et la même installation de Django
staticfiles   | Gestion de fichiers statiques dans les templates
syndication   | Génération de flux RSS et Atom
webdesign     | Intègre un outil de génération de Lorem ipsum via un unique tag : 
                {% lorem [nb] [methode] [random] %}

## - Dynamisons nos pages statiques avec flatpages

* Sur la quasi-totalité des sites web, il existe des pages statiques dont le contenu doit parfois 
être modifié. Nous pouvons citer comme exemples les pages avec des informations de contact, 
des conditions générales d’utilisation, des foires aux questions, etc.
* page statique = page visible telle qu'elle' a été conçue
* Une flatpage est un objet caractérisé par une URL, un titre et un contenu. 
* Tout cela sera inclus dans un template générique, ou bien dans un template que vous aurez adapté. 
* Ces informations sont enregistrées dans la base de données et sont éditables à tout moment 
par l’administration

# Installation du module

https://docs.djangoproject.com/fr/3.0/ref/contrib/flatpages/

* Pour utiliser le module flatpages, il faut l’activer grâce à ces quelques étapes :
* fichier settings.py :
- Ajoutez les lignes 'django.contrib.sites' et 'django.contrib.flatpages' dans la liste INSTALLED_APPS, 
si elles ne sont pas déjà présentes
- Vérifiez que votre settings.py contient bien une variable SITE_ID.
Django permet d’héberger plusieurs sites sur une même base de données via cette variable. 
Habituellement, cette valeur est mise à SITE_ID = 1, 
mais si vous développez plusieurs sites, cette valeur peut changer !

+ python manage.py migrate, pour créer les deux tables nécessaires

* 2 méthodes s’offrent ensuite à vous : 
- vous pouvez soit spécifier clairement comment accéder à ces pages, 
- soit activer un middleware, qui, en cas d’erreur 404 (page non trouvée), 
vérifie si une flatpage correspond à l’URL saisie par l’utilisateur

# - Le cas des URL explicites -

* 2 possibilités sont envisageables. 
* Vous devrez placer l’un des codes suivants dans le fichier urls.py principal du projet

1. Précisez un chemin précis vers les flatpages. 
Dans cet exemple, toutes les URL de nos pages statiques commenceront par /pages/  :
urlpatterns = [
    path('pages/', include('django.contrib.flatpages.urls')),
]

2. Vous pouvez également le configurer comme un motif « fourre-tout ». 
Dans ce cas, il est important de placer le motif à la fin des autres urlpatterns:

from django.contrib.flatpages import views

# Your other patterns here
urlpatterns += [
    path('<path:url>', views.flatpage),
]

3. Une autre configuration courante consiste à utiliser des pages statiques pour un nombre limité 
de pages connues à l’avance et à figer leurs URL, afin de pouvoir y faire référence 
avec la balise de gabarit url:

from django.contrib.flatpages import views

urlpatterns += [
    path('about-us/', views.flatpage, {'url': '/about-us/'}, name='about'),
    path('license/', views.flatpage, {'url': '/license/'}, name='license'),
]

# - Utilisation du middleware FlatpageFallbackMiddleware -

+ Ajoutez 'django.contrib.flatpages.middleware.FlatpageFallbackMiddleware' au réglage MIDDLEWARE

* laisse FlatpageFallbackMiddleware tout gérer. 
* Une fois activé et dès qu’une erreur 404 est levée, 
le middleware vérifie dans la base de données si une page correspond à l’URL qui est demandée
* Si une page est trouvée, alors il l’affiche, sinon il laisse l’erreur 404 se poursuivre
* l’ordre de MIDDLEWARE est important. 
Généralement, vous pouvez mettre FlatpageFallbackMiddleware à la fin de la liste. 
Cela signifie qu’il s’exécutera en premier lors du traitement de la réponse et 
garantira que tout autre intergiciel qui traite la réponse voit la réponse de la flatpage 
plutôt que la 404
* vérifiez que vos middlewares laissent bien l’erreur 404 arriver jusqu’au middleware de flatpage. 
Si un autre middleware traite l’erreur et renvoie une exception, 
la réponse HTTP obtient le code 500 et notre nouveau middleware ne tentera même pas de chercher
si une page existe
* solution simple mais qui peut comporter son lot de problèmes

# - Gestion et affichage des pages -

* Maintenant que le module est installé et les tables créées, 
une nouvelle catégorie est apparue dans votre panneau d’administration : 
il s’agit du module flatpages, qui contient comme seul lien la gestion des pages statiques
* l’administration des pages statiques se fait comme pour tout autre objet
https://docs.djangoproject.com/fr/2.2/ref/contrib/flatpages/#via-the-admin-interface

+ ajout d'une' page de contact
# crepes_bretonnes\crepes_bretonnes\urls.py
from django.contrib.flatpages import views
# . . .
urlpatterns += [
    path('contact/', views.flatpage, {'url': '/contact/'}, name='contact'),
]
# ajout de la flatpage depuis le tableau de bord
ULR = /contact/
TITLE = Contactez-nous !
CONTENT = <p>Pour nous <strong>contacter</strong>, adressez-nous votre demande via nos coordonnées ci-dessous :</p>
<ul>
    <li>email : exemple@exemple.com</li>
    <li>tel : 00.00.00.00.00</li>
    <li>courrier : adresse</li>
</ul>
SITE = example.com

* le champ contenu accepte du HTML pour mettre en forme votre page
* Puisqu’il est possible de saisir du contenu HTML brut dans la page d’administration d’une flatpage, 
flatpage.title et flatpage.content sont tous deux marqués comme ne requérant pas d’échappement HTML 
automatique dans le gabarit
* Par défaut, chaque page sera traitée avec le template flatpages/default.html de votre projet. 
Nous allons donc tout d’abord le créer, dans le dossier templates global :
# crepes_bretonnes\templates\flatpages\default.html
<!DOCTYPE html>
<html>
    
    <head>
        <title>{{ flatpage.title }}</title>
    </head>

    <body>
        <h1>{{ flatpage.title }}</h1>
        {{ flatpage.content }}
    </body>

</html>

* plusieurs options avancées existent :
- de n’autoriser que les utilisateurs connectés à voir la page (via le module django.contrib.auth) ;
- d’utiliser un template différent de flatpages/default.html
https://docs.djangoproject.com/fr/2.2/ref/contrib/flatpages/#via-the-admin-interface
The clean way to do it :
1. Set up django.contrib.flatpages as normal.
2. Create your own app. Name it something other than just flatpages to avoid confusion. 
Put a new admin.py module in there that replaces the original flatpages admin.
3. Add your own app to INSTALLED_APPS after the original flatpages. 
This way the original sets up its admin stuff first for you to replace.

from django.contrib import admin
from django.contrib.flatpages.admin import FlatPageAdmin
from django.contrib.flatpages.models import FlatPage
from django.utils.translation import gettext_lazy as _

# Define a new FlatPageAdmin
class FlatPageAdmin(FlatPageAdmin):
    fieldsets = (
        (None, {'fields': ('url', 'title', 'content', 'sites')}),
        (_('Advanced options'), {
            'classes': ('collapse',),
            'fields': (
                'enable_comments',
                'registration_required',
                'template_name',
            ),
        }),
    )

# Re-register FlatPageAdmin
admin.site.unregister(FlatPage)
admin.site.register(FlatPage, FlatPageAdmin)


# - Lister les pages statiques disponibles -

* Le module fournit plusieurs tags afin de récupérer ces listes
* Vous devez donc tout d’abord charger la bibliothèque, via {% load flatpages %}. 
Après, vous pouvez lister l’ensemble des pages visibles par tous, comme ceci :
{% load flatpages %}
{% get_flatpages as flatpages %}
<ul>
    {% for page in flatpages %}
        <li><a href="{{ page.url }}">{{ page.title }}</a></li>
    {% endfor %}
</ul>

* Pour afficher celles également disponibles uniquement pour les personnes connectées, 
il faut spécifier l’utilisateur en cours, grâce au mot-clé for :
{% get_flatpages for user as flatpages %}

* il est possible de lister les flatpages commençant par une certaine URL uniquement, 
via un argument optionnel, avant les mots-clés for  et as  :
{% get_flatpages '/contact/' as contact_pages %}
{% get_flatpages prefixe_contact as contact_pages %}
{% get_flatpages '/contact/' for request.user as contact_pages %}

## - Rendons nos données plus lisibles avec humanize

https://docs.djangoproject.com/fr/2.2/ref/contrib/humanize/

* les filtres du module humanize rendent la lecture d’une donnée plus agréable pour l’utilisateur
* il prend mieux en charge la localisation : 
la transformation des données s’adapte à la langue de votre projet !

+ ajoutez la ligne 'django.contrib.humanize' à votre variable INSTALLED_APPS 
dans le fichier settings.py
+ vérifier que USE_I18N = True dans settings.py
+ Pour intégrer les filtres présentés par la suite, il faut charger les templatetags du module, 
via la commande {% load humanize %}

◘ apnumber
Pour les nombres de 1 à 9, ce filtre va les traduire automatiquement en toutes lettres. 
Dans les autres cas (nombres supérieurs ou égaux à 10), ils seront affichés en chiffres. 
{{ 1|apnumber }}   renvoie "un"     <br />
{{ "2"|apnumber }} renvoie "deux"   <br />
{{ 10|apnumber }}  renvoie 10.

◘ intcomma
des séparateurs de milliers, afin de simplifier la lecture
le séparateur dépend de la langue courante
ici en français :
{{ 300|intcomma }}     renvoie 300       <br />
{{ "9000"|intcomma }}  renvoie 9 000     <br />
{{ 90000|intcomma }}   renvoie 90 000    <br />
{{ 9000000|intcomma }} renvoie 9 000 000

◘ intword
permet de convertir les grands entiers en leur représentation textuelle, 
de préférence avec des nombres supérieurs à un million
respecte également la localisation pour le séparateur décimal
{# Quelques cas classiques #}
{{ 1000000|intword }}    renvoie 1,0 million.     <br />
{{ "4525640"|intword }}  renvoie 4,5 millions.    <br />
{{ 20000000|intword }}   renvoie 20,0 millions.   <br />
{{ 999999999|intword }}  renvoie 1000,0 millions. <br />
{{ 5500000000|intword }} renvoie 5,5 milliards.   <br />

{% comment %}
Et des cas plus extrêmes. On suppose que mon_salaire = 9 * (10 ** 101), 
ce qui correspond à un 9 suivi de 101 zéros !
{% endcomment %}
{{ 1000000000000000000|intword }} renvoie 1,0 quintillion. <br />
{{ mon_salaire|intword }} renvoie 90,0 gogols.             <br />

{# Ce filtre ne supporte pas les « petits nombres » #}
{{ 90000|intword }} renvoie 90000.

◘ naturalday
retourne « aujourd’hui », « hier » ou « demain » si la date est appropriée
Dans les autres cas, la date sera affichée selon le format fourni en paramètre.
Par exemple, si la date actuelle est le 4 mars 2130 :
Portion de notre vue :
    date_avant_hier = datetime(2130, 3, 2)
    date_hier = datetime(2130, 3, 3)
    date_auj = datetime(2130, 3, 4)
    date_demain = datetime(2130, 3, 5)
Template associé :
    {{ date_avant_hier|naturalday:"DATE_FORMAT" }} renvoie "2 mars 2130" <br />
    {{ date_avant_hier|naturalday:"d/m/Y" }} renvoie "02/03/2130"<br />
    {{ date_hier|naturalday:"d/m/Y" }} renvoie "hier"            <br />
    {{ date_auj|naturalday:"d/m/Y" }} renvoie "aujourd'hui"      <br />
    {{ date_demain|naturalday:"d/m/Y" }} renvoie "demain"        <br />

◘ naturaltime
Retourne une chaîne de caractères précisant le nombre de secondes, minutes ou heures écoulées 
depuis la date (ou restantes dans le cas d’une date future)
Par exemple, en admettant que nous soyons le 4 mars 2130, à 14:20:00 :
Portion de notre vue :
    date1 = datetime(2130, 3, 4, 14, 20, 0)
    date2 = datetime(2130, 3, 4, 14, 19, 30)
    date3 = datetime(2130, 3, 4, 13, 15, 25)
    date4 = datetime(2130, 3, 4, 12, 20, 0)
    date5 = datetime(2130, 3, 3, 13, 10, 0)
    date6 = datetime(2130, 3, 5, 18, 20, 0)
Template associé :
    {{ date1|naturaltime }} renvoie "maintenant"            <br />
    {{ date2|naturaltime }} renvoie "il y a 29 secondes"    <br />
    {{ date3|naturaltime }} renvoie "il y a une heure"      <br />
    {{ date4|naturaltime }} renvoie "il y a une heure"      <br />
    {{ date5|naturaltime }} renvoie "il y a 1 jour, 1 heure"<br />
    {{ date6|naturaltime }} renvoie "dans 1 jour, 4 heures" <br />

◘ ordinal
convertit un entier en chaîne de caractères représentant une place dans un classement
exemple, encore une fois en français :
{{ 1|ordinal }}   renvoie 1<sup>er</sup><br />
{{ "2"|ordinal }} renvoie 2<sup>e</sup><br />
{{ 98|ordinal }}  renvoie 98<sup>e</sup><br />


## -- DEPLOYER EN PRODUCTION -- ##

https://openclassrooms.com/fr/courses/1871271-developpez-votre-site-web-avec-le-framework-django/1874623-deployer-votre-application-en-production
https://docs.djangoproject.com/fr/3.0/howto/deployment/checklist/
https://docs.djangoproject.com/fr/3.0/howto/deployment/

Voici les variables à modifier :
- Passez la variable DEBUG à False pour indiquer que le site est désormais en production. 
Il est très important de le faire, sans quoi les erreurs et des données sensibles seront affichées !
- Remplissez la variable ALLOWED_HOSTS qui doit contenir les différentes adresses depuis lesquelles 
il peut être accédé au site. 
Exemple : ALLOWED_HOSTS = ['www.crepes-bretonnes.com', '.super-crepes.fr']. 
Le point au début du deuxième élément de la liste permet d’indiquer que tous les sous-domaines 
sont acceptés, autrement dit, les domaines suivants seront accessibles : 
super-crepes.fr, www.super-crepes.fr, mobile.super-crepes.fr, etc.
- Adaptez la connexion à la base de données en fonction de ce que vous souhaitez utiliser en production. 
Nous vous conseillons d’utiliser PostgreSQL en production, MySQL le cas échéant. 
N’oubliez pas d’installer les extensions nécessaires si vous souhaitez utiliser autre chose que SQLite.
- Générez une nouvelle SECRET_KEY, via cet outil en ligne, par exemple. 
http://www.miniwebtool.com/django-secret-key-generator/
Cette clé sert à sécuriser plusieurs éléments de Django, il est important qu’elle soit unique et secrète.

ADMINS = (
    ('Maxime Lorant', 'maxime@crepes-bretonnes.com'),
    ('Mathieu Xhonneux', 'mathieu@crepes-bretonnes.com'),
)
SERVER_EMAIL = 'no-reply@crepes-bretonnes.com'


## -- L'UTILITAIRE MANAGE.PY -- ##

https://docs.djangoproject.com/fr/3.0/ref/django-admin/

## - Les commandes de base

* Un argument entre crochets […] indique qu’il est optionnel
* Certaines commandes possèdent également des options pour modifier leur fonctionnement. 
Celles-ci commencent généralement toutes par deux tirets -- 
et s’ajoutent avant ou après les arguments de la commande, s’il y en a.

# Liste des commandes
runserver [port ou adresse:port]
python manage.py runserver 9000 # le serveur écoutera sur le port 9000
python manage.py runserver 192.168.1.6:7000
python manage.py runserver [2001:0db8:1234:5678 ::9]:7000 # ipv6
python manage.py runserver -6 # remplace l’adresse locale IPv4 127.0.0.1 par l’adresse locale IPv6 ::1
python manage.py runserver --noreload 
# Empêche le serveur de développement de redémarrer à chaque modification du code
python manage.py runserver --nothreading

python manage.py shell # Lance un interpréteur interactif Python
python manage.py version # version de Django installée
python manage.py help <commande>

django-admin.py startproject <nom> [destination]
django-admin.py startproject crepes_bretonnes /home/crepes/projets/crepes
# les fichiers seront directement insérés dans le dossier /home/crepes/projets/crepes

django-admin.py startproject --template=/home/mathx/projets/modele_projet crepes_bretonnes
django-admin.py startproject --template=http://monsite.com/modele_projet.zip crepes_bretonnes

python manage.py startapp <nom> [destination]
python manage.py startapp --template=/home/mathx/projets/modele_app crepes_bretonnes/blog
python manage.py startapp --template=http://monsite.com/modele_app.zip crepes_bretonnes

python manage.py diffsettings
# Indique les variables de votre settings.py qui ne correspondent pas 
# à la configuration par défaut d’un projet neuf
python manage.py diffsettings --all

python manage.py check
# Vérifie votre projet Django pour détecter les problèmes courants

python manage.py test <application ou identifiant de test>
python manage.py test blog
python manage.py test blog.tests.BlogUnitTest
python manage.py test blog.tests.BlogUnitTest.test_lecture_article
python manage.py test --failfast
# Arrête le processus de vérification de tous les tests dès qu’un seul test a échoué

python manage.py testserver <fixture fixture …>
(avec python manage.py loaddata)
python manage.py testserver --addrport [port ou adresse:port]
python manage.py testserver --addrport 7000 fixture.json
python manage.py testserver --addrport 192.168.1.7:9000 fixture.json

## - La gestion de la base de données

* Toutes les commandes de cette section ont une option commune : --database  
qui permet de spécifier l’alias (indiqué dans votre settings.py) de la base de données 
sur laquelle la commande doit travailler si vous disposez de plusieurs bases de données. 
Exemple :
python manage.py migrate --database=master

python manage.py makemigrations [app1 app2...]
# Crée et versionne un ensemble de fichiers Python qui décrivent les changements 
# de la base de données en fonction des précédentes migrations et de l’état actuel de vos models.py
python manage.py makemigrations [app1 app2...] --empty
# créer une migration "vide", afin d’écrire soi-même le contenu
python manage.py makemigrations [app1 app2...] --dry-run
# visualiser les changements dans vos modèles, sans enregistrer le fichier de migration correspondant
# En combinant cette option avec  --verbosity 3, vous pouvez voir le fichier qui serait créé
python manage.py makemigrations [app1 app2...] --merge
# résoudre les conflits de mises à jour

python manage.py migrate [app1 [nom migraton]]
# Synchronise votre base de données avec l’état actuel de vos modèles
* migrate : applique toutes les modifications de toutes les applications installées
* migrate app : applique toutes les modifications pour l’application concernée et 
éventuellement ses dépendances en cas de clés étrangères
* migrate app migration : permet de retourner à l’état de la migration donnée en paramètre. 
La valeur zero pour ce paramètre permet de défaire toutes les migrations déjà faites
python manage.py migrate --fake
# Marque la migration comme appliquée, sans pour autant appliquer les changements SQL
# réservé aux utilisateurs avancés qui veulent appliquer manuellement les changements
python manage.py migrate --list, -l
# Liste les applications installées et marque les migrations, appliquées ou non, avec une croix

python manage.py dbshell
# Lance le client de gestion de votre base de données en ligne de commande, 
# selon les paramètres spécifiés dans votre settings.py
# Pour PostgreSQL, l’utilitaire psql sera lancé

python manage.py dumpdata [application application.Modele …]
# Affiche toutes les données d’applications ou de modèles spécifiques contenues 
# dans votre base de données dans un format texte sérialisé
python manage.py dumpdata blog.Article
[{"pk": 1, "model": "blog.article", "fields": {"date": "2012-07-11T15:51:08.607Z", "titre": "Les crêpes c’est trop bon", "categorie": 1,
 "auteur": "Maxime", "contenu": "Vous saviez que les crêpes bretonnes c’est trop bon ? La pêche c’est nul."}},
 {"pk": 2, "model": "blog.article", "fields": {"date": "2012-07-11T16:25:53.262Z", "titre": "Un super titre d’article !",
 "categorie": 1, "auteur": "Mathieu", "contenu": "Un super contenu ! (ou pas)"}}]
python manage.py dumpdata blog.Article blog.Categorie auth
# les modèles Article et Categorie de l’application blog 
# et tous les modèles de l’application django.contrib.auth seront sélectionnés 
# et leurs données affichées
python manage.py dumpdata --all
# Force l’affichage de tous les modèles, à utiliser si certains modèles sont filtrés
python manage.py dumpdata --format <fmt>
# Utilisez --format xml pour utiliser le format XML, par exemple
python manage.py dumpdata --indent <nombre d’espace>
python manage.py dumpdata --exclude
python manage.py dumpdata blog --exclude blog.Article
# affiche toutes les données de l’application blog, sauf celles du modèle blog.Article
python manage.py dumpdata --natural-foreign
# Utilise une représentation différente pour les relations ForeignKey et ManyToMany
python manage.py dumpdata --natural-primary
# Ne précisera pas les clés primaires (l’ID auto-incrémenté)
python manage.py dumpdata --pks 
# Permet de définir la liste des clés primaires à afficher, séparées par des virgules
# disponible uniquement pour l’affichage de modèles précis
python manage.py dumpdata blog.Article --pks=1 --indent 2
[
{
  "fields": {
    "date": "2014-07-03T18:53:49.743Z",
    "titre": "Exemple d'article",
    "categorie": 1,
    "auteur": "Maxime L.",
    "contenu": "Exemple de contenu"
  },
  "model": "blog.article",
  "pk": 1
}
]

python manage.py loaddata <fixture fixture …>
# Enregistre dans la base de données les fixtures passées en argument
La commande loaddata ira chercher les fixtures dans trois endroits différents :
- dans un dossier fixtures dans chaque application ;
- dans un dossier indiqué par la variable FIXTURE_DIRS dans votre settings.py  ;
- à partir du chemin vers le fichier donné en argument, absolu ou relatif.
python manage.py loaddata ma_fixture
# Django ira chercher dans tous les endroits susmentionnés et 
# prendra toutes les fixtures ayant une terminaison correspondant à un format de fixtures 
# (.json pour le JSON ou .xml pour le XML, par exemple). 
# Dès lors, si vous avez un fichier ma_fixture.json  dans un dossier fixtures d’une application, 
# celui-ci sera sélectionné
python manage.py loaddata ma_fixture.xml
# le fichier devra obligatoirement s’appeler ma_fixture.xml pour être sélectionné
Django peut également gérer des fixtures compressées. 
Si vous indiquez ma_fixture.json comme fixture à utiliser, 
Django cherchera ma_fixture.json, ma_fixture.json.zip, ma_fixture.json.gz ou ma_fixture.json.bz2. 
S’il tombe sur une fixture compressée, il la décompressera, puis lancera le processus de copie
python manage.py loaddata --app
# limiter la recherche de fixtures à une application précise via --app

python manage.py inspectdb
# Inspecte la base de données spécifiée dans votre settings.py 
# et crée à partir de sa structure un models.py. 
# Pour chaque table dans la base de données, un modèle correspondant sera créé. 
# Cette commande construit donc des modèles à partir de tables, 
# il s’agit de l’opération inverse des commandes makemigrations et migrate
Voici un extrait d’inspectdb, reprenant le modèle Article de notre application blog :
class BlogArticle(models.Model):
    id = models.IntegerField(primary_key=True)    # AutoField?
    titre = models.CharField(max_length=100) 
    auteur = models.CharField(max_length=42)
    contenu = models.TextField(blank=True)
    date = models.DateTimeField()
    categorie = models.ForeignKey('BlogCategorie')
    
    class Meta:
        managed = False
        # Par défaut, les modèles générés sont marqués avec managed = False. 
        # Cela signifie qu’ils seront ignorés par les commandes makemigrations et migrate. 
        # Vous pouvez enlever cette ligne si vous souhaitez appliquer des modifications 
        # à la base après modification de vos modèles.
        db_table = 'blog_article'

python manage.py flush
# Réinitialise la base de données et insère les fixtures initial_data. 
# Vous pouvez utiliser --no-initial-data pour avoir des tables totalement vides

python manage.py sql* application [application …]
De nombreuses commandes permettent d’afficher les requêtes SQL correspondant à des opérations précises :
- sql : requêtes de création de tables ;
- sqlall : requêtes de création de tables et d’ajout des données initiales ;
- sqlclear : requêtes de suppression des tables ;
- sqldropindexes : requêtes de suppression des index SQL ;
- sqlflush : ensemble des requêtes exécutées par la commande flush ;
- sqlindexes : requêtes de création des index SQL ;
- sqlmigrate : requêtes d’une migration précise. En plus du nom de l’application, 
il faut fournir un nom de migration en paramètre ;
- sqlsequencereset : requêtes pour réinitialiser les index de séquences de certains SGBD 
(les séquences permettent de déterminer l’index numérique à assigner à la prochaine entrée créée).
Seules les commandes sqlmigrate et sqlflush marchent avec les tables créées via les migrations Django.

python manage.py sqlcustom application [application …]
# Affiche des requêtes SQL contenues dans des fichiers. 
# Django affiche les requêtes contenues dans les fichiers <application>/sql/<modele>.sql  
# où <application> est le nom de l’application donnée en paramètre et <modele> un modèle quelconque 
# de l’application.
# Si nous avons l’application blog incluant le modèle Article, 
# la commande manage.py sqlcustom blog 
# affichera les requêtes du fichier blog/sql/article.sql s’il existe, 
# et y ajoutera toutes les autres requêtes des autres modèles de l’application.

## - Les commandes d’applications

python manage.py clearsessions
# supprime les sessions expirées de django.contrib.sessions

python manage.py changepassword [pseudo]
# permet de changer le mot de passe d’un utilisateur en spécifiant son pseudo :
python manage.py changepassword Mathieu

python manage.py createsuperuser
# permet de créer un super-utilisateur (un utilisateur avec tous les pouvoirs)
python manage.py createsuperuser --username  et --email
# permettent de spécifier directement le nom et l’adresse e-mail de l’utilisateur
# Si ces deux options sont indiquées, vous devrez spécifier le mot de passe manuellement 
# par la suite afin que l’utilisateur puisse se connecter

python manage.py makemessages
# Parcourt tous les fichiers de l’arborescence à partir du dossier actuel 
# pour déterminer les chaînes de caractères à traduire et crée ou met à jour les fichiers de traduction.
python manage.py makemessages --all, -a
# Met à jour les chaînes à traduire pour tous les langages
python manage.py makemessages --extensions
python manage.py makemessages --extension=html,txt # …ne prendra que les fichiers HTML et TXT
# Indique de ne sélectionner que les fichiers qui ont une extension spécifique
python manage.py makemessages --locale, -l
# Permet de ne mettre à jour qu’une ou plusieurs seule langue :
python manage.py makemessages -l fr_FR -l da-dk
python manage.py makemessages --locale fr_FR

python manage.py makemessages --symlinks
# Autorise Django à suivre les liens symboliques en explorant les fichiers
python manage.py makemessages --ignore, -i
# Permet d’ignorer certains fichiers :
python manage.py makemessages --ignore=blog/* --ignore=*.html
# tous les fichiers HTML et du dossier blog seront ignorés
python manage.py makemessages --no-wrap
# Empêche Django de répartir les longues chaînes de caractères 
# en plusieurs lignes dans les fichiers de traduction.
python manage.py makemessages --no-location
# Empêche Django d’indiquer la source de la chaîne de caractères dans les fichiers de traduction 
# (nom du fichier et ligne dans celui-ci)
python manage.py makemessages compilemessages
# Compile les fichiers de traduction .po  vers des fichiers .mo  afin que gettext puisse les utiliser
python manage.py makemessages --locale
# Permet de ne compiler qu’une seule langue :
python manage.py compilemessages --locale fr_FR

python manage.py createcachetable nom_de_table
# Crée une table de cache pour le système de cache


## -- MODULES COMPLEMENTAIRES -- ##

## - Django Debug Toolbar
https://django-debug-toolbar.readthedocs.io/en/latest/installation.html
pip install django-debug-toolbar
INSTALLED_APPS = [
    # ...
    'django.contrib.staticfiles',
    # ...
    'debug_toolbar',
]

STATIC_URL = '/static/'

MIDDLEWARE = [
    # ...
    'debug_toolbar.middleware.DebugToolbarMiddleware',
    # ...
]

INTERNAL_IPS = [
    # ...
    '127.0.0.1',
    # ...
]

# urls.py
from django.conf import settings
from django.conf.urls import include, url  # For django versions before 2.0
from django.urls import include, path  # For django versions from 2.0 and up

if settings.DEBUG:
    import debug_toolbar
    urlpatterns = [
        path('__debug__/', include(debug_toolbar.urls)),

        # For django versions before 2.0:
        # url(r'^__debug__/', include(debug_toolbar.urls)),

    ] + urlpatterns
