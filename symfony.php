<!---------- // MÉMENTO SYMFONY // ---------->

Installer Composer > https://getcomposer.org/
Invite de commandes : taper composer
Cours : https://www.youtube.com/watch?v=UTusmVpwJXo
https://openclassrooms.com/fr/courses/3619856-developpez-votre-site-web-avec-le-framework-symfony/5066156-installer-symfony-grace-a-composer
composer create-project symfony/skeleton nomDuProjet
shift + clic droit > Ouvrir une fenêtre de commandes ici
Pour les commandes dans Visual Studio, installer PowerShell
Requires curl (extension pour interagir avec des url) dans l'installation > php.ini puis activer l'extension curl
"coud not find the driver" : activer pdo_mysql dans le php.ini
Extensions : PowerShell, Twig Language, PHP Intelephense, PHP Namespace Resolver
pb de timezone : modifier le timezone du php.ini
Commits : si fichier github ailleurs que le fichier source, créer deux fichiers vides var et vendor
(en plus du README), et ne jamais copier les fichiers var et vendor
Créer un .env.dist pour le repository 
Créer le .htaccess = https://symfony.com/doc/current/setup/web_server_configuration.html#adding-rewrite-rules
Déploiement sur FileZilla : tout envoyer, avec le var/ vide, le .htaccess créé, .env sur prod, debug=0 et database online, index.php debug =  false
Sur FileZilla, clic droit sur var/ => droits d'accès => 777 (pour que Symfony puisse écrire dedans)
Sur Filezilla, doctrine.yaml enlever ('resolve') de url: '%env(resolve:DATABASE_URL)%'
Mot de passe sans espaces et avec urlencode() si caractères spéciaux !
Déploiement SF 4 : faire diriger le site vers le dossier projet/public

php bin/console server:run 
php bin/console cache:clear

Considérations
    • Versions : une grosse version tous les 2 ans (S3, S4, S5) qui intègre beaucoup de changements
        Une version mineure tous les 6 mois (4.3, 4.4, ect.)
    • Versions majeures de Symfony : .4 = 3.4, 4.4
        Objectif = se mettre sur une LTS (Long Term Support, maintenue 4 ans) = .4 (composer update)
    • nom de classes, de tables au singulier (ex. la table article crée une classe Article)
    • new \PDO, new \DateTime : pour les classes qui se trouvent à la racine (dans le namespace global), pas besoin d'utiliser un use pour indiquer où se situe la classe dans le namespace
    • Article::class : évite de réécrire le chemin du use précédemment renseigné (i.e. App\Entity\Article)
    • injection de dépendances : ex. function get(classe1 $variable1, class2 $variable2) : intégrer des instanciations de classes automatiquement dans le processus, dans les constructeurs, méthodes, ect.
    • ajouter une valeur par défaut : private $step = 1;
    • fetch="EAGER" = la relation doit être chargée en même temps que l'entité qui la porte
    • dd($variable) = var_dump + die()
    • redirectToRoute('name_route')
    • concaténation Twig = id={{ "card-" ~ card.id }}
    • Rajout d'une table liée à une Entité : toujours faire le lien dans la table prioritaire + accepter les valeurs null dans un premier temps
    • changer le nom d'une propriété : changer le nom + setters/getters + migration
    • changer une classe = vérifier avant la migration, éventuellement accepter les valeurs nulles
    • À tout prix éviter les propriétés qui ont le même nom que leur table
    • Contraintes => maxlength = 180 (juste milieu)
    • persist() ne doit être appelé que lors de la création d'un NOUVEL objet. Ex. $manager->persist($article);
    • sprintf($format, $arg) renvoie une chaîne formatée. ex. sprintf('nombre = %s', 10) renvoie 'nombre = 10'.
    • supprimer le cache = var/cache => supprimer
    • "UPDATE daily_count SET count = 0 WHERE user_id = $id" pour une requête sans erreur, malgré un champ qui s'appelle count
    • Twig : possible de créer ses propres filtres (ex.htmlspecialchars_decode())
    • Repo Github : copier/coller le .env, le nommer .env.dist, rajouter le .env dans le .gitignore
    • Préférer EntityManager $manager (doctrine) à ObjectManager $manager
    • Un fichier CSS/page
    • dump(Request) : + = attributs publics
                      # = protected
                      - = private
    • Ordre d'apparition des use : ordre alphabétique (PCR1)

Bundles
    • Admin : easy admin bundle
    • Security : security bundle
    

I) INSTALLER SYMFONY 

◘ Composer + symfony/skeleton 

◘ Le fichier composer.json 

Chaque ligne de la section require correspond à une bibliothèque dont dépend votre projet, autrement dit, une dépendance.
{
    "type": "project",
    "license": "proprietary",
    "require": {
        "php": "^7.1.3",
        "ext-iconv": "*",
        "symfony/console": "^4.0",
        "symfony/flex": "^1.0",
        "symfony/framework-bundle": "^4.0",
        "symfony/lts": "^4@dev",
        "symfony/monolog-bundle": "^3.1",
        "symfony/yaml": "^4.0"
    },
    // ...
}

◘ Mettre à jour ses dépendances 

Exécuter la commande : C:\wamp\www> composer update

composer.lock : A chaque fois que Composer met à jour ou installe une bibliothèque, il stocke la version exacte qu'il vient d'installer dans le fichier composer.lock.
Sur un serveur de production, lorsqu'on y installe notre application, on veut utiliser les bibliothèques dans les versions exactes qu'on a testé préalablement, pas d'autres !
Sur un serveur de production, c'est donc la commande  composer install  qu'on va utiliser. Elle va lire le fichier  composer.lock , et réinstaller exactement les mêmes bibliothèques dans les mêmes versions.

II) SYMFONY

/bin : tous les exécutables, les commandes PHP
/config : configuration du site (symfony, plugins, ect.)
/public : fichiers destinés aux visiteurs : img, CSS, js, index.php 
/src : code source 
/template : tous les templates de l'appli
/var : contient tout ce que Symfony va écrire durant son exécution : logs, cache, ect.
/vendor : bibliothèques externes à l'appli (symfony, nouvelles bibliothèques installées par Composer, etc.)

• Le contrôleur frontal 

index.php : point d'entrée de l'appli (emplacement : public/index.php)
Il se limite à appeler le noyau (kernel) de Symfony en disant « On vient de recevoir une requête, transforme-la en réponse s'il-te-plaît. »

• Les environnements

Le Kernel est créé avec deux arguments :  $env  et  $debug . A quoi cela correspond ?
Attardons-nous sur le premier argument,  $env , pour environnement.
L'objectif de Symfony est de nous faciliter le développement. C'est pourquoi il propose deux « modes » d'accès à notre application : l'un pour nos visiteurs, et l'autre pour nous, lorsque nous développons. Ces deux modes définissent en fait deux environnements de travail.
L'objectif est de répondre au mieux suivant la personne qui visite le site :

    • Un développeur a besoin d'informations sur la page afin de l'aider à développer. En cas d'erreur, il veut tous les détails pour pouvoir déboguer facilement. Il n'a pas besoin de rapidité.

    • Un visiteur normal n'a pas besoin d'informations particulières sur la page. En cas d'erreur, l'origine de celle-ci ne l'intéresse pas du tout, il veut juste retourner d'où il vient. Par contre, il veut que le site soit le plus rapide possible à charger.

Vous voyez la différence ? À chacun ses besoins, et Symfony compte bien tous les remplir. C'est pourquoi il offre plusieurs environnements de travail :

    • L'environnement de développement, appelé « dev », c'est celui qui est configuré par défaut. C'est l'environnement que l'on utilisera toujours pour développer.

    • L'environnement de production, appelé « prod ».

Si l'application est exécutée sur notre propre PC de développeur, alors le mot de passe de la base de données sera différent de si l'application était exécutée sur un serveur dans un datacenter par exemple.
Pour changer d'environnement, ainsi que toutes les variables qui en dépendent (mot de passe de la base de données, etc.), rendez-vous dans le fichier  .env  à la racine du projet. C'est un fichier de configuration dans lequel on va définir ces valeurs qui dépendent de l'environnement.
Pour voir le comportement du mode « dev » en cas d'erreur, essayez aussi d'aller sur une page qui n'existe pas. Vous avez vu ce que donne une page introuvable en mode « prod », mais rechangez (définitivement) le paramètre  APP_DEV  à  dev  et allez sur /index.php/pagequinexistepas. 
La différence est claire : le mode « prod » nous dit juste « page introuvable » alors que le mode « dev » nous donne plein d'informations sur l'origine de l'erreur, indispensables pour la corriger.

◘ L'architecture conceptuelle 

• Architecture MVC

https://openclassrooms.com/fr/courses/1153831-adopter-un-style-de-programmation-clair-avec-le-modele-mvc
MVC signifie « Modèle / Vue / Contrôleur ». Le contrôleur ne contient que du code très simple, car il se contente d'utiliser des modèles et des vues en leur attribuant des tâches précises. Il agit un peu comme un chef d'orchestre, qui n'agite qu'une baguette alors que ses musiciens jouent des instruments complexes.

• Parcours d'une requête en Symfony 

    • Le visiteur demande la page/platform ;

    • Le contrôleur frontal reçoit la requête, charge le Kernel et la lui transmet ;

    • Le Kernel demande au Routeur quel contrôleur exécuter pour l'URL/platform. Le Routeur fait donc son travail, et dit au Kernel qu'il faut exécuter le contrôleur OCPlatform:Advert ;

    • Le Kernel exécute donc ce contrôleur. Le contrôleur demande au modèle Annonce la liste des annonces, puis la donne à la vue ListeAnnonces pour qu'elle construise la page HTML et la lui retourne. Une fois cela fini, le contrôleur envoie au visiteur la page HTML complète.

III) SYMFONY FLEX

La philosophie de Symfony en version 4 est de ne s'installer qu'avec le strict minimum pour exécuter une application web. Pour chaque besoin supplémentaire, c'est au développeur d'ajouter les briques supplémentaires dont il a éventuellement besoin.

◘ Symfony Flex

Flex est un outil Symfony qui permet d'ajouter des nouvelles briques en déployant le moins d'effort possible. Pour certaines bibliothèques (celles répertoriées sur https://flex.symfony.com/, et appelées recettes (recipes en anglais)) que vous ajoutez via Composer, Flex va venir s'exécuter en plus pour ajouter la configuration, copier les fichiers qui vont bien, etc.
Ces recettes correspondent donc à des bibliothèques standards disponibles via Composer (et donc listées sur packagist.org), mais qui comprennent ce petit plus qui indique la configuration à ajouter dans un projet Symfony. En effet une recette n'est utile que si vous travaillez avec Symfony, car la configuration d'un projet Symfony suit des conventions (nous en reparlerons). Si vous réalisez un projet sans Symfony, alors Flex n'a aucun moyen de savoir comment configurer votre projet tout seul !

◘ Installer la recette Loger

• Equivalence recette - bibliothèque

Nous allons installer la recette logger, qui permet d'écrire dans des fichiers log ce qu'il se passe dans votre application. Indispensable pour déboguer une application en production !
Le nom de la recette ( logger ,  log , ou encore  logging ) correspond à une bibliothèque, mais Composer et Packagist ne reconnaissent pas ce nom, seul symfony.sh le connait. Pour savoir à quelle bibliothèque correspond cette recette, Composer va donc d'abord demander à symfony.sh. Faites pareil, tapez simplement  logger  dans la barre de recherche de symfony.sh et vous verrez que la bibliothèque correspondante est  symfony/monolog-bundle. Ceci est un nom standard que Composer connaît. Vous pouvez même voir un lien  Package details  qui pointe vers Packagist.

• La commande composer require

Pour installer effectivement la recette, nous allons donc utiliser Composer, dont Flex est un plugin.
Dans le dossier, shift + clic droit > commande ici > C:\wamp\www\mooc-symfony4> composer require logger
Composer a appliqué la recette en elle-même. Comment ? Grâce au fichier de la recette, que vous pouvez trouver à l'adresse indiquée par Composer https://github.com/symfony/recipes puis dans symfony/monolog-bundle/3.1.

◘ Les bundles Symfony

Dans une application Symfony, un bundle est l'équivalent d'un plugin. C'est une bibliothèque qui, une fois enregistrée dans notre application, ajoute des fonctionnalités au framework.
Dans les bibliothèques qu'on vient d'installer, il faut donc distinguer :

    • monolog/monolog  est la bibliothèque qui contient effectivement le logger. C'est une bibliothèque qui permet de loguer... ce qu'on lui dit de loguer ! Elle ne prend pas d'initiative, et si vous n'ajoutez que celle-là, il ne se passera rien dans votre application. Cette bibliothèque fonctionne quel que soit le framework que vous utilisez, Symfony ou non.

    • symfony/monolog-bundle est la bibliothèque du bundle qui intègre Monolog dans une application Symfony. C'est le bundle qui va s'intégrer dans votre application, et dire à Monolog "Une nouvelle page est chargée, voici ce que tu dois loguer : blablabla".

La section  bundles  de la recette indique donc à Flex d'ajouter ce bundle précis à la liste des bundles que notre application Symfony charge. Si vous ouvrez le fichier  config/bundles.php, vous voyez que Flex a bien ajouté ce bundle à la fin de la liste, conformément à la recette.
C'est parce que le bundle est dans cette liste qu'il sera chargé par Symfony et pourra loguer des informations.
[!] Pour information, cette liste n'est pas magique. C'est en fait le kernel qui la récupère et enregistre chaque bundle. Vous pouvez le voir dans le fichier  src/Kernel.php , méthode  registerBundles().

◘ La configuration Symfony 

La configuration de notre application se trouve dans le répertoire /config.
• À la racine du répertoire pour nos propres fichiers (services, routes, etc.) ;
• Dans le répertoire packages pour la configuration des bundles tiers que nous utilisons.
Lors de l'installation de la recette, la section copy-from-recipe de celle-ci indique à Flex de copier les fichiers de configuration qui se trouvent dans son répertoire  config , et de les mettre dans le répertoire  %CONFIG_DIR% de notre application (à savoir le répertoire  config ). Flex a créé ces trois nouveaux fichiers dans notre application :  config/packages/dev/monolog.yaml ,  config/packages/prod/monolog.yaml  et  config/packages/test/monolog.yaml .
Vous avez peut-être remarqué que certains répertoires correspondent aux noms de nos environnements « dev », « prod » et « test ». En effet, Symfony va prendre soin de charger les fichiers de configuration se trouvant dans l'environnement courant. Cela nous permet d'avoir des valeurs de configuration différentes suivant l’environnement. 


IV) CREER UN BUNDLE

◘ Utilisation de la console

Symfony intègre des commandes disponibles non pas via le navigateur, mais via l'invite de commandes (sous Windows)
Placez-vous dans le répertoire où vous avez mis Symfony, en utilisant la commande Windows cd ou shift + ouvrir une fenêtre de commande ici.
On va exécuter des fichiers PHP depuis cette invite de commandes. En l'occurrence, c'est le fichier bin/console que nous allons exécuter. Pour cela, il faut lancer la commande PHP avec le nom du fichier en argument : php bin/console :
C:\wamp\www\Symfony>php bin/console

Symfony version 3.0.0 - app/dev/debug

Usage:
  [options] command [arguments]

Options:
 -h, --help           Display this help message
 -q, --quiet          Do not output any message
 -V, --version        Display this application version
 --ansi               Force ANSI output
 --no-ansi            Disable ANSI output
 -n, --no-interaction Do not ask any interactive question
 -e, --env=ENV        The Environment name. [default: "dev"]
 --no-debug           Switches off debug mode.
 -v|vv|vvv, --verbose Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

 Depuis cette console, on pourra par exemple créer une base de données, vider le cache, ajouter ou modifier des utilisateurs (sans passer par phpMyAdmin !), etc.

◘ Le fil rouge du tutoriel : la création d'une plateforme d'échange

◘ Création du Bundle

• Tout est bundle : chaque partie du site est un bundle

○ Exécuter la bonne commande
Comme on vient de l'apprendre, exécutez la commande php bin/console generate:bundle.
SYMFONY 4 : https://symfony.com/doc/current/bundles/SymfonyMakerBundle/index.html


---------- // SYMFONY 4 avec Lior CHAMLA // ----------

https://www.youtube.com/watch?v=UTusmVpwJXo


I) INSTALLATION

installer composer
clic droit sur l'espace destiné > ouvrir ligne de commande > composer create-project symfony/website-skeleton my-project
cliquer-glisser le dossier sur l'icône visual studio du bureau

• Installation d'un serveur personnalisé (pour le développement)
taper dans le terminal de Visual Studio : composer require server --dev (installer la libraire serveur en mode dev)
puis lancer l'application en tapant php bin/console server:run 
puis cliquer sur l'adresse (port 8000, spécialisé)


II) CREER DES FONCTIONNALITES DANS SYMFONY

• Doctrine : accès aux données
• Traitements : controllers
• Twig : langage de rendu 

◘ Les controllers

Rôle :
• écouter une adresse (une route dans symphony)
• écouter et analyser la requête http 
• fabriquer une réponse http 
• la renvoyer au navigateur pour l'afficher

Les dossiers :
/src : contient les codes php de notre application
/template : contient notre affichage

• Créer un controller 

cmd : php bin/console make:controller,
on le nomme comme une classe Controller : BlogController
dedans, on a une annotation (commentaire commençant par une arobase)
/**
* @Route("/blog", name="blog") : quand l'utilisateur appelle cet url, appeler la fonction ci-dessous
*/
vérifier sur http://127.0.0.1:8000/blog

• Créer l'ensemble des routes qui serviront à notre blog

<?php
class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]); // render(appel d'un fichier twig à afficher)
    }

    /**
     * @Route("/", name="home")
     */
    public function home() // page d'accueil
    {
        return $this->render('blog/home.html.twig');
    }
}
?>
/blog > nouveau fichier > home.html.twig

◘ Langage de rendu Twig 

Avantages : simplicité, abscence de PHP à l'affichage

• Les fonctionnalités 

<h1>{{ variable }}</h1>

{% commande %}

{% if age > 18 %}
    <p>Tu es majeur</p>
{% else %}
    <p>Tu es mineur</p>
{% endif %}

<?php
class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]); // render(appel d'un fichier twig à afficher, liste des variables)
    }

    /**
     * @Route("/", name="home") AVEC DES GUILLEMETS
     */
    public function home() // page d'accueil
    {
        return $this->render('blog/home.html.twig', [
            'title' => "Bienvenue ici les amis !",
            'age' => 31
        ]);
    }
}
?>


III) MISE EN PLACE : CREATION DE PAGES

◘ BOOTSWATCH

Thèmes Bootstrap préfabriqués > https://bootswatch.com/
Je choisis mon thème (ex. Flatly), puis je télécharge le bootstrap.min.css

base.template.twig : template de base (là ou les composants sont dupliqués sur les autres templates)
block : emplacements que toutes les autres pages pourront personnaliser
thème flatly : choisir sa navbar, cliquer sur les chevrons, puis dupliquer le code sous le body :

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{% block title %}Welcome!{% endblock %}</title>
    {% block stylesheets %}{% endblock %}
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <!-- on rajoute le lien bootstrap pour toutes les pages enfant -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/">SymBlog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/blog">Articles <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog/new">Créer un article</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container"> <!-- on met le contenu du body dans un container -->
        {% block body %}{% endblock %}
    </div>
    
    {% block javascripts %}{% endblock %}
</body>

</html>

Comment faire pour qu'une page s'inspire de la page de base ? 
Comme un héritage : fichier parent + contenu dans les blocks
Ex. home.html.twig
{% extends 'base.html.twig' %} // appel du fichier parent 

{% block body %} // on ouvre le block body

// contenu

{% endblock %} // on ferme le block body

• Création de la page d'articles (voir demo)
<img src="http://placehold.it/350x150" alt=""> // crée des emplacements d'image 

• Création d'une page d'article 

BlogController.php 
<?php 
class BlogController extends AbstractController
{
    /* contenu déjà présent */

    /**
     * @Route("/blog/12", name="blog_show")
     */
    public function show()
    {
        return $this->render('blog/show.html');
    }
}
?>

index.html.twig (page des articles)
en fin d'article :
<a href="{{ path('blog_show') }}" class="btn btn-primary">Lire la suite...</a>
path fait appel au nom d'une route, pas son addresse url 

création de show.html.twig
{% extends 'base.html.twig' %}

{% block body %}

    <article>
        // contenu de l'article
    </article>

{% endblock %}


IV) L'ORM DOCTRINE : GERER LES BASES DE DONNEES

◘ L'ORM de Symfony : DOCTRINE

ORM : application qui fait le lien et une BDD
Classes PHP > ORM > BDD
Outils de Doctrine :
• Entité : représente une table 
• Manager : permet de manipuler une ligne (CRUD)
• Repository : permet de faire des sélections de données (équivalent de SELECT de SQL)

◘ Les migrations dans Symfony

Symfony met avant les fichiers par rapport à la BDD
migration : script pour changer la BDD

◘ Les fixtures 

But : créer un faux jeux de BDD

◘ Créer une BDD

Se rendre dans le fichier .env 
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
devient DATABASE_URL=mysql://root:@127.0.0.1:3306/demo_symfony

Terminal > php bin/console doctrine:database:create
php bin/console make:entity (créer une entité, une table)
nommer la classe (en MajusculeCamelCase) ex. Article, Comment (au singulier, car cela créera une classe Article, Comment, etc.)
rentrer les champs/variables de la classe
Ex.
> title (nom du champ)
> ? (type du champ), ici string
> 255 (longueur)
> no (possibilité de null)

content>text>no
image>string>255>no
createdAt>datetime>no
[Enter] => création de l'entité Articles.php

Création d'une migration > php bin/console make:migration (l'ORM va faire la différence entre les entités existantes et la BDD pour que la BDD reflète l'ensemble des fichiers)
Les versions des migrations se retrouvent dans migrations/version+chiffre

Lancer la migration > php bin/console doctrine:migrations:migrate

◘ Lancer une fixture

composer require orm-fixtures --dev
php bin/console make:fixtures
> ArticlesFixtures
=> création d'un fichier src/DataFixtures/ArticlesFixtures
<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Articles; // la classe Articles est dans le namespace App\Entity 
// obligatoire à chaque instanciation, sorte de require once

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) // boucle créant 10 articles
        { 
            $article = new Articles(); // instanciation de la classe précédemment crée
            // on remplit l'article avec les setters, en les enchaînant
            $article->setTitle("Titre de l'article n°$i")
                    ->setContent("<p>Contenu de l'article n°$i</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime()); // DateTime est un objet + vient d'une classe qui fait partie du namespace global de PHP

                    $manager->persist($article); // demande au manager de rendre l'article permanent, qu'il dure dans le temps
        }

        $manager->flush(); // lance la requête SQL des manipulations précédentes
    }
}
?>

Terminal : php bin/console doctrine:fixtures:load
> y

◘ Utiliser Doctrine : accéder aux données dans Symfony

But : afficher les articles de la BDD dans la page /blog
Rappel : le repository permet de sélectionner des données dans la table

https://symfony.com/doc/current/doctrine.html#fetching-objects-from-the-database

BlogController.php 
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Articles; // rajout car on l'appel pour le repository

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class); // on appel Doctrine, puis on lui demande un repository, puis on précise lequel

        /* $article = $repo->find(12); // cherche l'article n°12
        $article = $repo->findOneByTitle('Titre de l\'article'); // cherche un article avec un titre précis
        $articles = $repo->findByTitle('Titre de l\'article'); // cherche tous les articles avec un titre précis */

        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]); // render(appel d'un fichier twig à afficher, liste des variables)
    }
?>

index.html.twig
<section class="articles">

    {% for article in articles %} <!-- for in pour twig -->
        <article>
            <h2>{{ article.title }}</h2> <!-- twig va tenter de trouver la variable par tous les moyens -->
            <div class="metadata">Écrit le {{ article.createdAt | date('d/m/Y') }} à {{ article.createdAt | date('H:i') }} dans la catégorie Politique</div> <!-- twig ne peut qu'afficher des données simples, ici on passe par un filtre, qui permet de formater une variable -->
            <div class="content">
                <img src="{{ article.image }}" alt="">
                {{ article.content | raw }} <!-- filtre pour afficher tel quel, sans htmlspecialchars -->
                <a href="{{ path('blog_show') }}" class="btn btn-primary">Lire la suite...</a>
            </div>
        </article>
    {% endfor %}

</section>

Les filtres Twig : https://twig.symfony.com/doc/2.x/filters/index.html


◘ Modifier la page Article (seul) 

BlogController.php
<?php
    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    // la route devient variable
    public function show($id) // variable renseignée dans l'url
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class);

        $article = $repo->find($id); // cherche l'article avec l'id rentrée en paramètre

        return $this->render('blog/show.html.twig', [
            'article' => $article // on renseigne la variable à récupérer
        ]);
    }
?>

show.html.twig (page de l'article)
<article>
    <h2>{{ article.title }}</h2>
    <div class="metadata">Écrit le {{ article.createdAt | date('d/m/Y') }} à {{ article.createdAt | date('H:i')}} dans la catégorie Politique</div>
    <div class="content">
        <img src="{{ article.image }}" alt="">
        {{ article.content | raw }}
    </div>
</article>

index.html.twig (liste des articles)
<div class="content">
    <img src="{{ article.image }}" alt="">
    {{ article.content | raw }} <!-- filtre pour afficher tel quel, sans htmlspecialchars -->
    <a href="{{ path('blog_show', {'id': article.id}) }}" class="btn btn-primary">Lire la suite...</a> <!-- path(nom de la route, paramètres à intégrer dans la route) -->
</div>


V) BONUS DE STYLE : L'INJECTION DE DEPENDANCES DANS SYMFONY

Service Container de Symfony : permet les instanciations automatiques de classe, etc : sorte d'intelligence artificielle qui facilite le travail.
Dépendance : quand une classe/fonction a besoin de quelque chose
PHP type hiting : on donne des indices sur le paramètre attendu

BlogController.php 
<?php 

    use App\Repository\ArticlesRepository; // on le rajoute car on demande la classe en paramètre

    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticlesRepository $repo) // on exige en paramètre une instanciation de la classe ArticlesRepository qui s'apellera $repo
    {
        /* $repo = $this->getDoctrine()->getRepository(Articles::class); // on supprime cette ligne qui est déjà effectuée en paramètre */
        
        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]); // render(appel d'un fichier twig à afficher, liste des variables)
    }

    // possible de faire la même manip' pour la méthode show

    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    // la route devient variable
    public function show(ArticlesRepository $repo, $id) // variable renseignée dans l'url
    {
       /* $repo = $this->getDoctrine()->getRepository(Articles::class); ligne supprimée */

        $article = $repo->find($id); // cherche l'article avec l'id rentrée en paramètre

        return $this->render('blog/show.html.twig', [
            'article' => $article // on renseigne la variable à récupérer
        ]);
    }

    // possible de simplifier encore plus !
    public function show(Articles $article)
    {
        return $this->render('blog/show.html.twig', [
            'article' => $article // on renseigne la variable à récupérer
        ]);
    }
    // ceci grâce au ParamConverter (convertit un paramètre en objet), qui comprend que l'on cherche un article, dont l'id est demandé en url 
?>


VI) SYMFONY ET LES FORMULAIRES

https://symfony.com/doc/current/forms.html

◘ Créer une page

3 pilliers pour une page : une fonction / une route / une réponse (affichage)

BlogController.php
<?php

    /**
     * @Route("/blog/new", name="blog_create") // la fonction passe avant celle du show pour éviter toute confusion dans le choix de la fonction à appeler (car les deux url sont blog/url)
     */
    public function create()
    {
        return $this->render('blog/create.html.twig');
    }

    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    // la route devient variable
    public function show(Articles $article) // variable renseignée dans l'url
    {
        return $this->render('blog/show.html.twig', [
            'article' => $article // on renseigne la variable à récupérer
        ]);
    }
?>

create.html.twig
{% extends "base.html.twig" %}

{% block body %}

    <h1>Création d'un article</h1>

{% endblock %}

base.html.twig
<div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ path('blog') }}">Articles <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ path('blog_create') }}">Créer un article</a> <!-- path() permet de trouver une url en fonction d'un nom de route -->
        </li>
    </ul>
</div>


◘ Créer un formulaire et gérer les données 

$this->redirectToRoute('nom de la page', 'variables');
Ex. $this->redirectToRoute('blog_show', ['id' => $article->getId()]);

https://symfony.com/doc/current/forms.html#creating-a-simple-form

BlogController.php
<?php
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType; // rajout du use pour forcer le type d'un élement

public function create()
    {
        $article = new Articles(); // je souhaite créer un nouvel article

        $form = $this->createFormBuilder($article) // je crée un form avec la tâche à effectuer en paramètres : création d'un form lié à mon article
                    ->add('title', TextType::class, [
                        'attr' => [
                            'placeholder' => "Titre de l'article"
                        ]
                    ]) // ajout d'un champ : add(nomChamp, type si nécessaire, [options])
                    ->add('content', TextareaType::class) // on peut forcer Symfony à choisir le type d'élément à afficher (par défaut Symfony fait le lien entre le nom des éléments et le type correspondant dans la BDD)
                    ->add('image')
                    ->getForm(); // résultat final


        return $this->render('blog/create.html.twig', [
            'formArticle' => $form->createView() // $form est un objet complexe, on le rend accessible + 'formArticle' pour éviter toute confusion avec la fonction form() de twig
        ]);
    }
?>

create.html.twig
{% extends "base.html.twig" %}

{% block body %}

    <h1>Création d'un article</h1>

    {{ form_start(formArticle) }} <!-- <form method="" action "" (en-tête du form) -->

    <div class="form-group">
        <label for="">Titre</label>
        {{ form_widget(formArticle.title) }} <!-- form_widget(champ) -->
    </div>

    <div class="form-group">
        <label for="">Contenu</label>
        {{ form_widget(formArticle.content) }}
    </div>

    <div class="form-group">
        <label for="">Image</label>
        {{ form_widget(formArticle.image) }}
    </div>

    {{ form_end(formArticle) }} <!-- twig affiche l'ensemble des champs, qu'ils soient personnalisés ou non -->

{% endblock %}

BlogController.php (rajout des classes bootstrap)
<?php
public function create()
{
    $article = new Articles(); // je souhaite créer un nouvel article

    $form = $this->createFormBuilder($article) // je crée un form avec la tâche à effectuer en paramètres : création d'un form lié à mon article
                ->add('title', TextType::class, [
                    'attr' => [
                        'placeholder' => "Titre de l'article",
                        'class' => 'form-control'
                    ]
                ]) // ajout d'un champ
                ->add('content', TextareaType::class, [
                    'attr' => [
                        'placeholder' => "Contenu de l'article",
                        'class' => 'form-control'
                    ]
                ])
                ->add('image', TextType::class, [
                    'attr' => [
                        'placeholder' => "Image de l'article",
                        'class'=> 'form-control'
                    ]
                ])
                ->getForm(); // résultat final


    return $this->render('blog/create.html.twig', [
        'formArticle' => $form->createView() // $form est un objet complexe, on le rend accessible
    ]);
}
?>

• Rendu plus fluide (moins de code)

Les templates de Twig : créer des templates de form pour décider de leur affichage

create.html.twig (supression du html)
{% extends "base.html.twig" %}

{% block body %}

    <h1>Création d'un article</h1>

    {{ form_start(formArticle) }} <!-- <form method="" action "" (en-tête du form) -->

    {{ form_widget(formArticle) }} <!-- utilisation du template bootstrap -->

    {{ form_end(formArticle) }} <!-- twig affiche l'ensemble des champs, qu'ils soient personnalisés ou non -->

{% endblock %}

BlogController.php (supression des classes bootstrap)
<?php
public function create()
{
    $article = new Articles(); // je souhaite créer un nouvel article

    $form = $this->createFormBuilder($article) // je crée un form avec la tâche à effectuer en paramètres : création d'un form lié à mon article
                ->add('title', TextType::class, [
                    'attr' => [
                        'placeholder' => "Titre de l'article"
                    ]
                ]) // ajout d'un champ
                ->add('content', TextareaType::class, [
                    'attr' => [
                        'placeholder' => "Contenu de l'article"
                    ]
                ])
                ->add('image', TextType::class, [
                    'attr' => [
                        'placeholder' => "Image de l'article"
                    ]
                ])
                ->getForm(); // résultat final


    return $this->render('blog/create.html.twig', [
        'formArticle' => $form->createView() // $form est un objet complexe, on le rend accessible
    ]);
}
?>

• Adopter un template pour un formulaire, via une extension : https://symfony.com/doc/current/form/bootstrap4.html

config/packages/twig.yaml
twig:
    default_path: '%kernel.project_dir%/templates'
    debug: '%kernel.debug%'
    strict_variables: '%kernel.debug%'
    form_themes: ['bootstrap_4_layout.html.twig'] // rajout de l'extension
    
create.html.twig (rajout du lien de l'extension)
{% extends "base.html.twig" %}

{% form_theme formArticle 'bootstrap_4_layout.html.twig' %} <!-- lien avec l'extension bootstrap -->

{% block body %}

    <h1>Création d'un article</h1>

    {{ form_start(formArticle) }} <!-- <form method="" action "" (en-tête du form) -->

    {{ form_widget(formArticle) }} <!-- utilisation du template bootstrap -->

    {{ form_end(formArticle) }} <!-- twig affiche l'ensemble des champs, qu'ils soient personnalisés ou non -->

{% endblock %}

• Grossir le formulaire (avec un bouton submit)

BlogController.php (rajout d'un bouton submit)
<?php

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

public function create()
{
    $article = new Articles(); // je souhaite créer un nouvel article

    $form = $this->createFormBuilder($article) // je crée un form avec la tâche à effectuer en paramètres : création d'un form lié à mon article
                ->add('title', TextType::class, [
                    'attr' => [
                        'placeholder' => "Titre de l'article"
                    ]
                ]) // ajout d'un champ
                ->add('content', TextareaType::class, [
                    'attr' => [
                        'placeholder' => "Contenu de l'article"
                    ]
                ])
                ->add('image', TextType::class, [
                    'attr' => [
                        'placeholder' => "Image de l'article"
                    ]
                ])
                ->add('save', SubmitType::class, [
                    'label' => "Enregistrer"
                ])
                ->getForm(); // résultat final


    return $this->render('blog/create.html.twig', [
        'formArticle' => $form->createView() // $form est un objet complexe, on le rend accessible
    ]);
}
?>

Problème : peu flexible
Solution : modifier directement dans le fichier twig 

create.html.twig
{% extends "base.html.twig" %}

{% form_theme formArticle 'bootstrap_4_layout.html.twig' %}

{% block body %}

    <h1>Création d'un article</h1>

    {{ form_start(formArticle) }} <!-- <form method="" action "" (en-tête du form) -->

    {{ form_widget(formArticle) }} <!-- utilisation du template bootstrap -->

    <button type="submit" class="btn btn-success">Ajouter l'article</button>

    {{ form_end(formArticle) }} <!-- twig affiche l'ensemble des champs, qu'ils soient personnalisés ou non -->

{% endblock %}


◘ BONNE PRATIQUE : SEPARATION DU CODE 

PHP : construction | HTML.TWIG : présentation

• Créer un formulaire simple dans le controller 

BlogController.php 
<?php
 public function create()
    {
        $article = new Articles(); // je souhaite créer un nouvel article

        $form = $this->createFormBuilder($article) // je crée un form avec la tâche à effectuer en paramètres : création d'un form lié à mon article
                    ->add('title') // ajout d'un champ
                    ->add('content')
                    ->add('image')
                    ->getForm(); // résultat final


        return $this->render('blog/create.html.twig', [
            'formArticle' => $form->createView() // $form est un objet complexe, on le rend accessible
        ]);
    }
?>

• Afficher les propriétés dans le twig, avec form_row()

create.html.twig
{% extends "base.html.twig" %}

{% form_theme formArticle 'bootstrap_4_layout.html.twig' %}

{% block body %}

    <h1>Création d'un article</h1>

    {{ form_start(formArticle) }} <!-- <form method="" action "" (en-tête du form) -->

    {{ form_row(formArticle.title, {'attr': {'placeholder': "Titre de l'article"}}) }} <!-- form_row : affiche tout ce qu'il faut pour un champ (label, champ, erreurs)-->
    {{ form_row(formArticle.content, {'attr': {'placeholder': "Contenu de l'article"}}) }} <!-- form_row(champ, {tableau d'options}) -->
    {{ form_row(formArticle.image, {'attr': {'placeholder': "URL de l'image"}}) }}

    <button type="submit" class="btn btn-success">Ajouter l'article</button>

    {{ form_end(formArticle) }} <!-- twig affiche l'ensemble des champs, qu'ils soient personnalisés ou non -->

{% endblock %}


◘ TRAITER LE FORMULAIRE

BlogController.php
<?php

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request; // rajout pour la requête
use Doctrine\Common\Persistence\ObjectManager; // rajout pour le manager
use App\Entity\Articles; // rajout car on l'appel pour le repository
use App\Repository\ArticlesRepository;

class BlogController extends AbstractController
{

    public function create(Request $request, ObjectManager $manager) // la classe Request permet d'analyser/manipuler la requête http, l'ObjectManager de Doctrine permet de gérer une ligne d'une table (insert, update, delete)
    {
        dump($request); // à quoi ressemble la classe Request

        $article = new Articles(); // je souhaite créer un nouvel article

        $form = $this->createFormBuilder($article) // je crée un form avec la tâche à effectuer en paramètres : création d'un form lié à mon article (chaque élément sera transféré dans l'article)
                    ->add('title') // ajout d'un champ
                    ->add('content')
                    ->add('image')
                    ->getForm(); // résultat final

        dump($article); // l'article est rempli, mais il manque la date
        
        $article->setCreatedAt(new \Datetime()); // on rajoute la date de création avant la vérification/soumission (sinon l'ensemble est invalide)

        $form->handleRequest($request); // analyse la requête http + transfère les données dans l'article

        if ($form->isSubmitted() && $form->isValid()) // si le form (valide) est soumis
        {
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('blog_show', ['id' => $article->getId()]); // redirection vers la page de l'article créé
        }

        return $this->render('blog/create.html.twig', [
            'formArticle' => $form->createView() // $form est un objet complexe, on le rend accessible
        ]);
    }
?>

◘ MODIFIER UN FORMULAIRE EXISTANT : une même page pour deux actions (newArticle et updateArticle)

BlogController.php (la fonction est renommée form() + création de deux routes)
<?php

    /**
     * @Route("/blog/new", name="blog_create")
     * @Route("/blog/{id}/edit", name="blog_edit") // création de la route pour le updateArticle
     */
    public function form(Articles $article = null, Request $request, ObjectManager $manager) // grâce au ParamConverter, pas besoin de renseigner l'id, car il convertit un paramètre en une entité | parfois, l'article est null
    {
        if (!$article)
        {
            $article = new Articles(); // s'il n'y a pas d'article, je créé un article vide
        }

        $form = $this->createFormBuilder($article) // je crée un form avec la tâche à effectuer en paramètres : création d'un form lié à mon article (chaque élément sera transféré dans l'article)
                    ->add('title') // ajout d'un champ
                    ->add('content')
                    ->add('image')
                    ->getForm(); // résultat final

        if (!$article->getId()) // seulement si l'article n'existe pas
        {
            $article->setCreatedAt(new \Datetime()); // on rajoute la date de création
        }

        $form->handleRequest($request); // analyse la requête http + transfère les données dans l'article

        if ($form->isSubmitted() && $form->isValid()) // si le form (valide) est soumis
        {
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('blog_show', ['id' => $article->getId()]); // redirection vers la page de l'article créé
        }

        return $this->render('blog/create.html.twig', [
            'formArticle' => $form->createView(), // $form est un objet complexe, on le rend accessible
            'editMode' => $article->getId() !== null // true = update, false = create
        ]);
    }
?>

create.html.twig
<button type="submit" class="btn btn-success">
    {% if editMode %}
        Enregistrer les modifications
    {% else %}
        Ajouter l'article
    {% endif %}
</button>

• Faire plus simple avec la CLI

Terminal : php bin/console make:form
> ArticleType (nom du formulaire en PascalCaseEtSeFinitParType)
> Articles (le nom de l'entité sur lequel se baser)

Pour retrouver le form > Form/ArticleType.php
<?php

namespace App\Form;

use App\Entity\Articles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('image')
            /* ->add('createdAt') on enlève ce champ qui nous intéresse pas */
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
?>

BlogController.php (on remplace createFormBuilder par createForm)
<?php

use App\Form\ArticleType; // rajout

    public function form(Articles $article = null, Request $request, ObjectManager $manager) // grâce au ParamConverter, pas besoin de renseigner l'id, car il convertit un paramètre en une entité | parfois, l'article est null
    {
        if (!$article)
        {
            $article = new Articles(); // s'il n'y a pas d'article, je créé un article vide
        }

        /* $form = $this->createFormBuilder($article)
                    ->add('title')
                    ->add('content')
                    ->add('image')
                    ->getForm(); */

        $form = $this->createForm(ArticleType::class, $article); // createForm(classe du formulaire, entité à laquelle le lier)

        if (!$article->getId()) // seulement si l'article n'existe pas
        {
            $article->setCreatedAt(new \Datetime()); // on rajoute la date de création
        }

        $form->handleRequest($request); // analyse la requête http + transfère les données dans l'article

        if ($form->isSubmitted() && $form->isValid()) // si le form (valide) est soumis
        {
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('blog_show', ['id' => $article->getId()]); // redirection vers la page de l'article créé
        }

        return $this->render('blog/create.html.twig', [
            'formArticle' => $form->createView(), // $form est un objet complexe, on le rend accessible
            'editMode' => $article->getId() !== null // true = update, false = create
        ]);
    }
}
?>


◘ LA VALIDATION DU FORMULAIRE

https://symfony.com/doc/current/validation.html

La validation se base sur le modèle, sur l'entité des articles, qui transmet son message au formulaire
On va rajouter les validations sur notre entité principale

src/Entity/Articles.php
<?php

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; // la classe Constraints permet de soumettre des données à des contraintes : on place @Assert suivi des contraintes devant les variables à valider

class Articles
{
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=10, max=255, minMessage="Votre titre est trop court !")
     */
    private $title;
?>

create.html.twig (rajout de style aux erreurs)
{{ form_start(formArticle) }} <!-- <form method="" action "" (en-tête du form) -->

    {{ form_errors(formArticle) }} <!-- rajouter du style aux erreurs -->

    {{ form_row(formArticle.title, {'attr': {'placeholder': "Titre de l'article"}}) }} <!-- form_row : affiche tout ce qu'il faut pour un champ (label, champ, erreurs)-->
    {{ form_row(formArticle.content, {'attr': {'placeholder': "Contenu de l'article"}}) }} <!-- form_row(champ, {tableau d'options}) -->
    {{ form_row(formArticle.image, {'attr': {'placeholder': "URL de l'image"}}) }}

    <button type="submit" class="btn btn-success">
        {% if editMode %}
            Enregistrer les modifications
        {% else %}
            Ajouter l'article
        {% endif %}
    </button>

{{ form_end(formArticle) }} <!-- twig affiche l'ensemble des champs, qu'ils soient personnalisés ou non -->

https://symfony.com/doc/current/form/form_customization.html


V) LES ENTITÉS ET LEURS RELATIONS

◘ Créer une table (Catégorie) liée à une autre table (Articles)

• Créer une entité (une table)

terminal : php bin/console make:entity
> Category
New property name (l'id se fait automatiquement) :
> title > ok > ok ok
> description > text (type) > yes
> articles > relation (type) > Articles (table liée) > OneToMany (une catégorie a plusieurs articles) > yes (ajoute le propriété category à la classe Articles) > no (pas d'articles sans categorie) > no (pas de supression automatique en cas d'article sans categorie)  // Ajout d'une relation

Articles.php
<?php
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;
?>

Category.php
<?php 
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Articles", mappedBy="category")
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection(); // un wrapper de tableaux
    }
?>

Faire la migration (Doctrine vérifie dans quel état se trouve nos fichiers, entités et si c'est conforme avec ce qu'il y a dans la base de données)
terminal : php bin/console make:migration

Problème : category_id ne peut être null et pourtant elle n'a aucune valeur d'assignée
astuce si la BDD est déjà remplie : accepter les valeurs null 
Ici on efface toutes les données de la table articles

terminal : php bin/console doctrine:migrations:migrate
> y

• Création de l'entité Commentaire

terminal : php bin/console make:entity
> Comment
> author > ok > ok > ok
> content > text > ok
> createdAt (camelCase car propriété d'une classe) > ok > ok
> article > relation (type) > Articles (la classe liée) > ManyToOne > no (pas de commentaire lié à aucun article) > ok (créé une propriété dans Articles liée au commentaires : $articles->getComments()) > ok (création de la propriété comments dans Articles) > yes (supprimer des commentaires orphelins : principe du FOREIGN KEY)

Comment.php
<?php
 /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Articles", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;
?>

Articles.php
<?php
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="article", orphanRemoval=true)
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }
?>

terminal : php bin/console make:migration
php bin/console doctrine:migrations:migrate


◘ FIXTURES & FAKER : créer des jeux de fausses données

Les scripts fixtures permettent de remplir les tables de fausses données

• La librairie Faker

https://github.com/fzaninotto/Faker

Installation : composer require fzaninotto/faker --dev

ArticlesFixtures.php
<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Articles;
use App\Entity\Category; // ++
use App\Entity\Comment; // ++

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR'); // instance de la classe Factory, qui appelle la méthode statique (reliée à la classe) create(parmètres local)

        // créer 3 catégories fakées
        for ($i = 1; $i <= 3 ; $i++) { 
            $category = new Category();
            $category->setTitle($faker->sentence())
                     ->setDescription($faker->paragraph());

            $manager->persist($category); // prépare le manager à intégrer le résultat dans la BDD

            // créer entre 4 et 6 articles
            for ($j = 1; $j <= mt_rand(4, 6); $j++) // changer la variable $i appelée précédemment
            {
                /* $content = '<p>';
                $content .= join($faker->paragraphs(5), '</p><p>'); // .= je prends ce qu'il y a dans la variable et je rajoute... join(éléments du tableau, liant des éléments)
                $content .= '</p>'; */

                $content = '<p>' . join($faker->paragraphs(5), '</p><p>') . '</p>';

                $article = new Articles();
                $article->setTitle($faker->sentence())
                        ->setContent($content) // attend une chaine de caractères (paragraphs() de faker renvoie un tableau)
                        ->setImage($faker->imageUrl())
                        ->setCreatedAt($faker->dateTimeBetween('-6 months')) // DateTime est un objet + vient d'une classe qui fait partie du namespace global de PHP
                        ->setCategory($category); // attribue la categorie sur laquelle on est en train de travailler

                        $manager->persist($article); // demande au manager de rendre l'article permanent, qu'il dure dans le temps

                // on attribue des commentaires à l'article
                for ($k = 1; $k <= mt_rand(4, 10); $k ++)
                { 
                    $comment = new Comment();

                    $content = '<p>' . join($faker->paragraphs(2), '</p><p>') . '</p>';

                    $now = new \DateTime();
                    $interval = $now->diff($article->getCreatedAt()); // DateTime::diff() : récupère la différence entre deux objets DateTime
                    $days = $interval->days;
                    $minimum = '-' . $days . ' days'; // ex. -100 days

                    /* $days = (new \DateTime())->diff($article->getCreatedAt())->days;
                    ->setCreatedAt($faker->dateTimeBetween('-' . $days . ' days')) */

                    $comment->setAuthor($faker->name)
                            ->setContent($content)
                            ->setCreatedAt($faker->dateTimeBetween($minimum))
                            ->setArticle($article);

                    $manager->persist($comment);
                }
            }
        }

        $manager->flush(); // lance la requête SQL des manipulations précédentes
    }
}
?>

[terminal] php bin/console doctrine:fixtures:load
> y
> message d'erreur => on met le \ devant \Faker\Factory::create('FR_fr');


◘ AFFICHER AVEC TWIG les entités liées entre elles 

show.html.twig (template qui affiche un article)
{% extends 'base.html.twig' %}

{% block body %}

    <article>
        <h2>{{ article.title }}</h2>
        <div class="metadata">Écrit le {{ article.createdAt | date('d/m/Y') }} à {{ article.createdAt | date('H:i')}} dans la catégorie {{ article.category.title }}</div> <!-- rajout de la catégorie -->
        <div class="content">
            <img src="{{ article.image }}" alt="">
            {{ article.content | raw }}
        </div>
    </article>

    <section id="commentaires"> <!-- rajout des commentaires -->
        {% for comment in article.comments %}
            <div class="comment">
                <div class="row">
                    <div class="col-3">
                        {{ comment.author }} (<small>{{ comment.createdAt | date('d/m/Y à H:i') }}</small>)
                    </div>
                    <div class="col">
                        {{ comment.content | raw }}
                    </div>
                </div>
            </div>
        {% endfor %}
    </section>

{% endblock %}


◘ Manipuler les relations dans les formulaires (rajout du champ obligatoire catégorie)

https://symfony.com/doc/current/forms.html
https://symfony.com/doc/current/forms.html#choice-fields
https://symfony.com/doc/current/reference/forms/types/entity.html (créer des éléments grâce aux objets présents dans la BDD)

ArticleType.php
<?php

namespace App\Form;

use App\Entity\Articles;
use App\Entity\Category; // ++
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // ++

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title'
            ]) // ++
            ->add('content')
            ->add('image')
            /* ->add('createdAt') */
        ;
    }
}
?>

create.html.twig
{{ form_row(formArticle.title, {'attr': {'placeholder': "Titre de l'article"}}) }}
{{ form_row(formArticle.category) }} <!-- ++ -->
{{ form_row(formArticle.content, {'attr': {'placeholder': "Contenu de l'article"}}) }}
{{ form_row(formArticle.image, {'attr': {'placeholder': "URL de l'image"}}) }}


VI) L'AUTHENTIFICATION

" Maintenant le CLI fait les 3/4 de ce qui est expliqué dans la vidéo ;)
https://symfony.com/doc/current/security.html
Après il y a même une fonction pour créer une page login et une page register basiques
qu'il faut améliorer en fonction de ses besoins mais ça fait gagner pas mal de temps :) "

• Le composant Security

Outils :
- Firewalls : protéger les points d'entrée : comment et où protéger ?
- Provider : où sont les données des utilisateurs ? fait le lien connexion/sécurité
- Encoders : comment sécuriser les données ? créer des hash, algorithmes, ect.

config/packages/security.yaml

◘ Créer l'entité User

[terminal] php bin/console make:entity User
email > ok > ok > ok (no)
username > ok > ok > ok (no)
password > ok > ok > ok (no)
> Enter (création de l'entité)

php bin/console make:migration
(la CLI créé un fichier de migration qui contient une requête SQL qui va créé la table)
php bin/console doctrine:migrations:migrate
> y

◘ Créer le formulaire d'inscription 

[terminal] php bin/console make:form RegistrationType
> User (entité liée)

RegistrationType.php
<?php

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('username')
            ->add('password')
            ->add('confirm_password') // ++
        ;
    }
?>

User.php
<?php
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public $confirm_password; // ++ dans l'idéal on le passe en privé avec setter et getter, pas de champ ORM car il n'existe pas dans la BDD
?>

• Créer une action dans un controller pour afficher le formulaire

Créer un controller de sécurité : formulaire d'inscription + de connexion

[terminal] php bin/console make:controller
> SecurityController

SecurityController.php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User; // ++
use App\Form\RegistrationType; // ++

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration()
    {
        // à quel objet on relie les champs du formulaire
        $user = new User();

        // instanciation du formulaire
        $form = $this->createForm(RegistrationType::class, $user); // la classe qui permet de construire le formulaire + l'objet qui va interférer avec (les deux champs sont "bindés", reliés)

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
?>

templates/security/registration.html.twig
{% extends "base.html.twig" %}

{% block body %}

    <h1>Bonjour à tous !</h1>

{% endblock %}

templates/security/registration.html.twig (V2)
{% extends "base.html.twig" %}

{% block body %}

    <h1>S'inscrire sur le site</h1>

    {{ form_start(form) }}
    {{ form_widget(form) }}
    <button type="submit" class="btn btn-success">Je m'inscris</button>
    {{ form_end(form) }}

{% endblock %}

templates/security/registration.html.twig (V3)
{% extends "base.html.twig" %}

{% block body %}

    <h1>S'inscrire sur le site</h1>

    {{ form_start(form) }}

    {{ form_row(form.username, {'label': "Votre nom d'utilisateur", 'attr': {'placeholder': 'Votre pseudo', 'novalidate': 'novalidate'}}) }} <!-- enlève la validation client -->
    {{ form_row(form.email, {'label': "Votre adresse mail", 'attr': {'placeholder': 'Votre adresse mail'}}) }}
    {{ form_row(form.password, {'label': "Votre mot de passe", 'attr': {'placeholder': '•••••'}}) }}
    {{ form_row(form.confirm_password, {'label': "Confirmez votre mot de passe", 'attr': {'placeholder': '•••••'}}) }}

    <button type="submit" class="btn btn-success">Je m'inscris</button>
    {{ form_end(form) }}

{% endblock %}

RegistrationType.php 
<?php

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('username')
            ->add('password', PasswordType::class) // ++, pour récupérer le namespace de la classe automatiquement : ctrl+alt+i de l'extension PHP Namespace Resolver 
            ->add('confirm_password', PasswordType::class) // ++
        ;
    }
}
?>

SecurityController.php
<?php

use Doctrine\Common\Persistence\ObjectManager; // ++
use Symfony\Component\HttpFoundation\Request; // ++

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager) // ++ rajout de la requête http + le manager de Doctrine (ctrl+alt+i pour retrouver les namespace)
    {
        // à quel objet on relie les champs du formulaire
        $user = new User();

        // instanciation du formulaire
        $form = $this->createForm(RegistrationType::class, $user); // la classe qui permet de construire le formulaire + l'objet qui va interférer avec (les deux champs sont "bindés", reliés)

        $form->handleRequest($request); // ++

        if ($form->isSubmitted() && $form->isValid()) // ++
        {
            $manager->persist($user);
            $manager->flush();

        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
?>

• Rajouter des validations (confirmer le MDP)

https://symfony.com/doc/current/validation.html
https://symfony.com/doc/current/validation.html#constraints

User.php
<?php

use Symfony\Component\Validator\Constraints as Assert; // ++ rajouter une contrainte

class User
{
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min = 8, minMessage = "Votre mdp doit faire plus de 8 caractères")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Veuillez confirmer le même mot de passe")
     */
    public $confirm_password; // ++ dans l'idéal on le passe en privé avec setter et getter
}
?>


◘ HASHER LES MDP

SYMFONY 4.3 > https://symfony.com/blog/new-in-symfony-4-3-native-password-encoder (algorithm: auto)

config/packages/security.yaml
security:
    encoders:
        App\Entity\User:
            algorithm: auto #changement depuis SF4.3
    # https://symfony.com/doc/current/security.html#where-do-users-come-from-user-providers
    providers: etc.

https://symfony.com/doc/4.0/security/password_encoding.html

SecurityController.php (encoder le mdp avant de persister)
<?php

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface; // ++

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder) // ++ rajout de la classe Encoder
    {
        // à quel objet on relie les champs du formulaire
        $user = new User();

        // instanciation du formulaire
        $form = $this->createForm(RegistrationType::class, $user); // la classe qui permet de construire le formulaire + l'objet qui va interférer avec (les deux champs sont "bindés", reliés)

        $form->handleRequest($request); // ++

        if ($form->isSubmitted() && $form->isValid())
        {
            $hash = $encoder->encodePassword($user, $user->getPassword()); // ++ dans les options précédentes, on a précisé quel encoder il fallait employer pour quelle classe // encodePassword($entity, champ à encoder)
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();

        }
    }
}
?>

Test : Error : Argument 1 passed to Symfony\Component\Security\Core\Encoder\UserPasswordEncoder::encodePassword() must be an instance of Symfony\Component\Security\Core\User\UserInterface, instance of App\Entity\User given, called in C:\Users\Pablo\Documents\WEB DEV\FORMATION\PROJET FINAL\demo\src\Controller\SecurityController.php on line 31

User.php
<?php

use Symfony\Component\Security\Core\User\UserInterface; // ++

class User implements UserInterface // UserInterface : l'interface qu'on doit implémenter si on veut créer des users. S'accompagne de méthodes que l'on doit obligatoirement implémenter
{

    public function eraseCredentials() {} // ++

    public function getSalt() {} // ++

    public function getRoles() // ++
    {
        return ['ROLE_USER'];
    }
}
?>


◘ DES USERS UNIQUES

• Demander un mail unique avec UniqueEntity

Symphony 4.3 : https://symfony.com/doc/current/reference/constraints/UniqueEntity.html

User.php
<?php

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity; // ++, permet d'assurer qu'un User est unique en fonction d'un champ

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *  fields={"email"},
 *  message="Le mail que vous avez indiqué est déjà pris"
 * ) // (rajout d'une contrainte directement sur la classe)
 */
class User implements UserInterface
{

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

}
?>

• Rediriger vers la page de connexion (après inscription)

SecurityController.php
<?php

class SecurityController extends AbstractController
{

    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid())
        {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('security_login'); // redirection après inscription
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/connexion", name="security_login")
     */
    public function login()
    {
        return $this->render('security/login.html.twig');
    }
}
?>

login.html.twig
{% extends "base.html.twig" %}

{% block body %}

    <h1>Connexion</h1>

{% endblock %}


◘ LOGIN FORM 

https://symfony.com/doc/current/security/form_login_setup.html (4.3)
https://symfony.com/doc/4.0/security/form_login_setup.html (4.0, exemple)

Expliquer à Symfony qu'on utilise ce formulaire pour se connecter
Pour ça, on utilise les providers (on peut en utiliser autant qu'on veut et les appeler comme on veut)

config/packages/security.yaml
security:
    encoders:
        App\Entity\User:
            algorithm: auto #changement depuis SF4.3
    # https://symfony.com/doc/current/security.html#where-do-users-come-from-user-providers
    providers:
        in_memory: { memory: ~ }
        in_database: #nouveau provider nommé in_database
            entity:
                class: App\Entity\User
                property: email #propriété par laquelle on va rechercher des utilisateurs
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            anonymous: true

            provider: in_database #rajout du provider

            form_login: #permet de préciser qu'on utilisera un formulaire de login
                login_path: security_login
                check_path: security_login #route pour vérifier le formulaire
            [...]


login.html.twig
{% extends "base.html.twig" %}

{% block body %}

    <h1>Connexion</h1>

    <form action="{{ path('security_login') }}" method="POST"> <!-- on envoie le formulaire sur la même page via le chemin défini pour la vérification du login -->
        <div class="form-group">
            <input type="text" placeholder="Adresse mail" name="_username" id="" class="form-control" required> <!-- Symfony demande _username et _password pour vérifier -->
        </div>
        <div class="form-group">
            <input type="password" placeholder="Mot de passe" name="_password" id="" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Connexion</button>
        </div>
    </form>

{% endblock %}


◘ LOG OUT - DECONNEXION

https://symfony.com/doc/current/security.html#logging-out

SecurityController.php
<?php
    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout() {}
?>

config/packages/security.yaml
[...]
firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            anonymous: true

            provider: in_database #rajout du provider

            form_login: #permet de préciser qu'on utilisera un formulaire de login
                login_path: security_login
                check_path: security_login #route pour vérifier le formulaire

            logout: #nouvelle propriété, logout
                path: security_logout
                target: blog #redirection après déconnexion

            [...]

• Rajouter des boutons Connexion/Déconnexion dans le nav

https://symfony.com/doc/current/templating/app_variable.html

templates/base.html.twig
<div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ path('blog') }}">Articles <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ path('blog_create') }}">Créer un article</a>
        </li>

        {% if not app.user %} <!-- grâce à la variable app de twig, on affiche le bon bouton selon la situation -->
            <liv class="nav-item">
                <a href="{{ path('security_login')}}" class="nav-link">Connexion</a>
            </liv>
        {% else %}
        <liv class="nav-item">
                <a href="{{ path('security_logout')}}" class="nav-link">Déconnexion</a>
            </liv> 
        {% endif %}
        
    </ul>
</div>

◘ Créer un formulaire de commentaires

[terminal] php bin/console make:form
> CommentType
> Comment (entité liée)

CommentType.php 
<?php

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author')
            ->add('content')
            /* ->add('createdAt')
            ->add('article') on ne demande pas à l'utilisateur ces données, qui se crééent automatiquement */
        ;
    }
?>

BlogController.php
<?php 
    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(Articles $article) // variable renseignée dans l'url
    {
        $comment = new Comment(); // + rajout en use (ctrl+alt+i)

        $form = $this->createForm(CommentType::class, $comment); // + rajout en use (ctrl+alt+i)

        return $this->render('blog/show.html.twig', [
            'article' => $article, // on renseigne la variable à récupérer
            'commentForm' => $form->createView() // ++ 
        ]);
    }
?>

templates/blog/show.html.twig
<section id="commentaires"> <!-- rajout des commentaires -->
        <h1>{{ article.comments | length }} commentaires :</h1>
        {% for comment in article.comments %}
            <div class="comment">
                <div class="row">
                    <div class="col-3">
                        {{ comment.author }} (<small>{{ comment.createdAt | date('d/m/Y à H:i') }}</small>)
                    </div>
                    <div class="col">
                        {{ comment.content | raw }}
                    </div>
                </div>
            </div>
        {% endfor %}
    </section>

    {{ form_start(commentForm) }}

    {{ form_row(commentForm.author, {'attr': {'placeholder': "Votre pseudo"}}) }}
    {{ form_row(commentForm.content, {'attr': {'placeholder': "Votre commentaire"}}) }}

    <button type="submit" class="btn btn-success">Envoyer</button>

    {{ form_end(commentForm) }}

{% endblock %}

• Inspecter la requête du formulaire

BlogController.php
<?php
    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(Articles $article, Request $request, ObjectManager $manager) // variable renseignée dans l'url
    {
        $comment = new Comment(); // + rajout en use (ctrl+alt+i)

        $form = $this->createForm(CommentType::class, $comment); // + rajout en use (ctrl+alt+i)
        $comment->setCreatedAt(new \DateTime())
                ->setArticle($article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($comment);
            $manager->flush();

            return $this->redirectToRoute('blog_show', [
                'id' => $article->getId()
            ]);
        }

        return $this->render('blog/show.html.twig', [
            'article' => $article, // on renseigne la variable à récupérer
            'commentForm' => $form->createView()
        ]);
    }
}
?>

• Un formulaire disponible seulement aux connectés

templates/blog/show.html.twig
    {% if app.user %}
    
        {{ form_start(commentForm) }}

        {{ form_row(commentForm.author, {'attr': {'placeholder': "Votre pseudo"}}) }}
        {{ form_row(commentForm.content, {'attr': {'placeholder': "Votre commentaire"}}) }}

        <button type="submit" class="btn btn-success">Envoyer</button>

        {{ form_end(commentForm) }}

    {% else %}

        <h2>Vous ne pouvez pas commenter si vous n'êtes pas connecté</h2>
        <a href="{{ path('security_login') }}" class="btn btn-primary">Connexion</a>
        
    {% endif %}

• Pistes d'améliorations :

- Un user qui se connecte à partir d'un article revient vers l'article 
https://symfony.com/doc/4.0/security/form_login.html (SF4)
https://symfony.com/doc/current/security/form_login.html#redirecting-after-success (SF4.3)

〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰 
😺 LIENS ET INFOS 
〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰〰 
🔗 Site officiel de Symfony (et sa documentation) : https://symfony.com/ 
🔗 Tutoriel officiel de présentation du composant Security : https://symfony.com/doc/current/secur... 
🔗 Mieux comprendre les Firewalls : https://symfony.com/doc/current/secur... 
🔗 Documentation sur l'option form_login : https://symfony.com/doc/current/secur... 
🔗 Comment charger les utilisateurs à partir de la base de données : https://symfony.com/doc/current/secur... 
🔗 Comment utiliser le UserPasswordEncoder : https://symfony.com/doc/current/secur... 
🔗 Créer un lien de déconnexion : https://symfony.com/doc/current/secur... 
🔗 Comment accéder à l'utilisateur connecté dans Twig : https://symfony.com/doc/current/templ... 
🔗 Documentation complète du fichier de configuration du package Security : https://symfony.com/doc/current/refer... 

💪🔥 BONUS : 
----------------------- 
🔗 Comment gérer une option "Se rappeler de moi" : https://symfony.com/doc/current/secur...
🔗 Comment gérer les accès dans le controller : https://symfony.com/doc/current/secur... 
🔗 Comment rediriger là où on veut après le login : https://symfony.com/doc/current/secur...
🔗 Comment utiliser les annotations pour sécuriser les controllers : https://symfony.com/doc/master/bundle...


◘ EASY ADMIN BUNDLE

Travailler avec des relations ManyToMany : utiliser le type_option by_reference
Ex. form:
        fields: 
            - { property: 'recto', label: 'Recto' }
            - { property: 'verso', label: 'Verso' }
            - { property: 'datePublication', label: 'Prochaine révision' }
            - { property: 'tags', label: 'Marqueurs', type_options: { 'by_reference': false } }
If you're using the CollectionType field where your underlying collection data is an object (like with Doctrine's ArrayCollection), 
then by_reference must be set to false if you need the adder and remover (e.g. addAuthor() and removeAuthor()) to be called.


    
