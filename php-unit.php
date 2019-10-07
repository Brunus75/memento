// ---------- PHP UNIT ---------- //

https://openclassrooms.com/fr/courses/4087056-testez-et-suivez-letat-de-votre-application-php/4419436-mise-en-place-dun-outil-pour-implementer-ses-tests-unitaires

I) MISE EN PLACE

◘ Installer avec Composer

composer require phpunit/phpunit
/!\ Pour Symfony 4.3 : composer require --dev symfony/phpunit-bridge

Pour vérifier que PHPUnit est bien installé :
$ vendor/bin/phpunit --help
[S4.3] run all of your application's tests with the following command:
./bin/phpunit -- help

◘ Obtenir le rapport de couverture de code (code coverage report)

Concrètement, écrire un test, c'est exécuter le code à tester, c'est-à-dire :
• instancier une classe ;
• appeler une méthode en lui passant des paramètres (si besoin est) ;
• en vérifier la sortie.

Exécuter des tests :
$ vendor/bin/phpunit
[S4.3] ./bin/phpunit

• Génerer le rapport sous forme de couverture de code

$ vendor/bin/phpunit --coverage-html web/test-coverage
Demander à générer le rapport sous forme de pages HTML dans le dossier web/test-coverage
./bin/phpunit --coverage-html web/test-coverage
Installer xdebug : https://xdebug.org/docs/install
phpinfo(depuis le localhost)=>code source=>https://xdebug.org/wizard
(la version php doit provenir de WAMP ; sinon installe Composer et choisit
un php.exe de WAMP)

Créé un dossier web => cliquer sur le index.html
% de code écrit dans notre application couvert

(!) Dans un premier temps,
je vous conseille de vous concentrer sur le code qui constitue la logique centrale
et sensible de votre application qu'il faut absolument tester.

II) Premiers pas avec PHPUnit et les tests unitaires

But = vérifier que la valeur retournée est bien la valeur attendue
et/ou que certaines méthodes ont bien été appelées

◘ Premiers tests unitaires 

<?php

namespace App\Entity; // src/Entity/Product.php

class Product
{
    const FOOD_PRODUCT = 'food';
    private $name;
    private $type;
    private $price;

    public function __construct($name, $type, $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
    }

    public function computeTVA() // méthode sans point d'entrée (argument de méthode)
    {
        if (self::FOOD_PRODUCT == $this->type) { // il nous faut un type + un prix pour 
            return $this->price * 0.055; // que la méthode fonctionne
        }

        return $this->price * 0.196;
    }
?>
Une indication pour connaître le nombre de tests à écrire = les sorties possibles de la méthode. 
Dans le code présenté ci-dessus, vous voyez deux <?php return ?> :  
il va falloir deux tests pour faire en sorte que tous les cas soient couverts.

• Créer une classe de test 

Règles à respecter : 
○ Cette classe doit être contenue dans le dossier tests/ du projet.
○ Il faut reproduire l'arborescence de la classe que vous souhaitez tester.
○ La classe de test doit avoir le même nom que la classe à tester, suffixée par Test.
<?php

namespace App\Tests\Entity; // test/Entity/ProductTest.php

use PHPUnit\Framework\TestCase; // indispensable

class ProductTest extends TestCase // extension
{

}
?>

• Créer les méthodes de test 

Une règle à respecter : le nom de toutes vos méthodes de test doit être préfixé par test

○ TEST N°1
couvrir le cas permettant de faire en sorte d'atteindre la ligne 25 de la classe Product
lors de l'exécution de code de la méthode computeTVA.
Il faut donc que le produit ait un type "food"
<?php

namespace App\Tests\Entity; // test/Entity/ProductTest.php

use App\Entity\Product;
use PHPUnit\Framework\TestCase; // indispensable

class ProductTest extends TestCase // extension
{
    public function testcomputeTVATypeFood() // testnomDeMethodeExplicite
    {
        $product = new Product('name', Product::FOOD_PRODUCT, 10);
        // assertSame(valeur attendue, valeur actuelle)
        $this->assertSame(0.55, $product->computeTVA()); // assertion
    }
}
?>

○ TEST N°2
Cas dans lequel un produit a un type différent de "food"
<?php
    public function testcomputeTVAOtherType()
    {
        $product = new Product('truc', 'machin', 10);
        $this->assertSame(1.96, $product->computeTVA());
    }
?>

◘ Quand l'un des chemins de code (ou cas) lève une exception

Le nombre de <?php return ?> dans une méthode est une des indications pour connaître le nombre de tests à créer.
Ce n'est pas la seule manière de sortir d'une méthode. Ex. des exceptions
<?php

namespace AppBundle\Entity;

class Product
{
    // …

    public function computeTVA()
    {
        if ($this->price < 0) { // lorsqu'un prix est négatif, une exception est lancée
            throw new \LogicException('The TVA cannot be negative.');
        }

        //…
    }
}

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    // …

    public function testNegativePriceComputeTVA()
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, -20);

        // indiquer ce qui est attendu avant d'exécuter le code à tester + le namespace de la classe
        $this->expectException('LogicException'); // méthode PHPUNIT

        $product->computeTVA();
    }
}
?>

◘ Créer une suite de tests avec une suite de valeurs définies : les data providers

s'assurer que son code fonctionne avec une suite de valeurs en entrée différentes
sans pour autant avoir à créer une méthode de test différente.
<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @dataProvider pricesForFoodProduct
     */
    public function testcomputeTVAFoodProduct($price, $expectedTva)
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, $price);

        $this->assertSame($expectedTva, $product->computeTVA());
    }

    public function pricesForFoodProduct()
    {
        return [
            [0, 0.0],
            [20, 1.1],
            [100, 5.5]
        ];
    }
    
    // …
}
?>
Au moment où PHPUnit appelle la méthode testcomputeTVAFoodProduct lors du lancement des tests,
celle-ci sera en réalité appelée trois fois de suite en passant les paramètres suivants, tour à tour :
• $price = 0 et $expectedTva = 0.0 puis,
• $price = 20 et $expectedTva = 1.1 et enfin,
• $price = 100 et $expectedTva = 5.5

(!) L'option --filter permet de ne lancer qu'une méthode de test
https://phpunit.readthedocs.io/fr/latest/writing-tests-for-phpunit.html#fournisseur-de-donnees

◘ Configuration de PHPUNIT 

Dans un projet Symfony, 
le fichier responsable de la configuration est contenu à la racine du projet, 
dans le fichier phpunit.xml.dist

III) LES DOUBLURES (MOCKS)

◘ Ne pas dépendre d'un système externe dans le contexte des tests

Pour utiliser un système externe (connexion à Facebook, Github) dans un test,
il va falloir utiliser une doublure 

• Une doublure

Élément créé de toutes pièces pour maîtriser une dépendance externe.
Cela nous permet de ne pas du tout dépendre du bon fonctionnement de Github, par ex. 

• Un Mock 

Une doublure = un objet créé à partir d'un type de classe
dont vous maîtrisez entièrement le comportement

• Un Dummy 

Objet un peu particulier qui remplit un contrat
Ex. Le code à exécuter demande un objet de type GuzzleHttp\Client
<?php

namespace Tests\AppBundle;

use PHPUnit\Framework\TestCase;

class ClassTest extends TestCase
{
    public function testExemple()
    {
        $client = $this->getMock('GuzzleHttp\Client');
        // instance un peu particulière utilisable comme doublure d'un objet
    }
}
?>

• Stub 

Dummy auquel on ajoute un comportement = vous indiquez ce que la méthode d'un objet
doit toujours retourner lorsqu'elle est appelée
<?php

namespace Tests\AppBundle;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class ClassTest extends TestCase
{
    public function testExemple()
    {
        $request = new Request();
        
        $client = $this->getMock('GuzzleHttp\Client');
        $client->method('get')->willReturn($request);
        // lorsque la méthode get de la classe st appelée,
        // un objet de type Symfony\Component\HttpFoundation\Request devra toujours être retourné
    }
}
?>

• Mock et assertion

Un mock est un stub qui a des attentes ("expectations" en anglais).
Avec un mock, quand vous allez appeler une méthode,
vous pouvez préciser le comportement attendu lors de cet appel
(par exemple, vous allez appeler la méthode une seule fois).
<?php

namespace Tests\AppBundle;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class ClassTest extends TestCase
{
    public function testExemple()
    {
        $request = new Request();
        
        $client = $this->getMock('GuzzleHttp\Client');
        $client
            ->expects($this->once()) // je m'attends à ce que la méthode get soit appelée une fois
            // au moment où le code à tester sera exécuté (en plus de retourner un objet Request)
            ->method('get')
            ->willReturn($request);
        
        // …
    }
}
?>
Cette attente est considérée comme une assertion dans votre suite de tests. 
Si la méthode n'est pas appelée lorsque le code à tester est exécutée, la suite de tests échouera.

◘ Quelques cas requérant la création d'une doublure

• Un objet difficile à instancier 

<?php

namespace JMS\Serialiser;

// …

class Serializer
{
    //…
    public function __construct(
        MetadataFactoryInterface $factory,
        HandlerRegistryInterface $handlerRegistry,
        ObjectConstructorInterface $objectConstructor,
        MapInterface $serializationVisitors,
        MapInterface $deserializationVisitors,
        EventDispatcherInterface $dispatcher = null,
        TypeParser $typeParser = null,
        ExpressionEvaluatorInterface $expressionEvaluator = null
    )
    {
        //…
}
?>

Le constructeur de cette classe est compliqué !
Si vous avez besoin d'une instance du Serializer dans un test, 
ce serait plus facile de créer un dummy en demandant à PHPUnit de ne pas faire appel au constructeur original :

<?php

namespace Tests\AppBundle\Folder;

use PHPUnit\Framework\TestCase;

class ExempleClassTest extends TestCase
{
    public function testExemple()
    {
        $serializer = $this
            ->getMockBuilder('JMS\Serializer\Serializer')
            ->disableOriginalConstructor()
            ->getMock();
            
        $classToTest = new ExempleClass($serializer);
        // vous avez un serializer disponible et malléable à utiliser à l'envie dans vos tests.
    }
}
?>

◘ Raison n°2 : Maîtriser le retour d'une méthode appelée par le code original

<?php

namespace AppBundle\Security;

class GithubUserProvider extends UserProviderInterface
{
    private $client;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    
    public function loadUserByUsername($username)
    {
        $response = $this->client->get('https://api.github.com/user?access_token='.$username);
        // nous effectuons une requête HTTP GET auprès de Github (le service externe dans notre exemple).
        // Or, dans un test unitaire, vous devez faire attention de ne pas être tributaires
        // d'une communication auprès d'un service externe qui pourrait être défaillante.
    }
}
?>

La solution est de doubler l'objet $client : 
ainsi, lorsque le code exécuté atteindra la ligne 16, le contenu de la variable $response est maîtrisé :
<?php

namespace Tests\AppBundle\Folder;

use AppBundle\Security\GithubUserProvider;
use PHPUnit\Framework\TestCase;

class GithubUserProviderTest extends TestCase
{
    public function testLoadUserByUsername()
    {
        $response = …; // Ce que l'on souhaite recevoir.
        
        $client = $this->getMockBuilder('GuzzleHttp\Client')
            ->disableOriginalConstructor() // je désactive le constructeur
            ->setMethods(['get']) // j'indique quelle méthode existe dans cette classe
            ->getMock();
        $client
            ->method('get') // lorsque la méthode get() est appelée
            ->willReturn($response); // je précise bien ce qui doit être retourné, la variable $response
        // …
        
        $githubUserProvider = new GithubUserProvider($client);
        $githubUserProvider->loadUserByUsername('xxxxx');
        
        // Assertions du test
        // …
    }
}
?>

L'intérêt d'une doublure, c'est donc de maîtriser entièrement ce qu'il se passe dans à un moment (ou plusieurs)
du code à tester pour ne pas dépendre d'éléments susceptibles d'entraver le test unitaire.
(!) Plus le code à tester contient de dépendances, plus il sera difficile à tester.
Pensez-y dès l'écriture de votre code !
https://phpunit.readthedocs.io/fr/latest/test-doubles.html

◘ Une autre librairie de mock à expérimenter : Prophecy

Elle offre une manière différente (et selon moi, plus simple) d'appréhender les mocks dans ses tests.
https://github.com/phpspec/prophecy
https://phpunit.readthedocs.io/fr/latest/test-doubles.html#prophecy


IV) TP : tester une classe contenant de nombreuses dépendances

Contexte : application avec une authentification GitHub 

◘ Tester une méthode de classe complexe

<?php

namespace AppBundle\Security;

use AppBundle\Entity\User;
use GuzzleHttp\Client;
use JMS\Serializer\Serializer;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class GithubUserProvider implements UserProviderInterface
{
    private $client;
    private $serializer;

    public function __construct(Client $client, Serializer $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function loadUserByUsername($username)
    {
        $response = $this->client->get('https://api.github.com/user?access_token='.$username);
        $result = $response->getBody()->getContents();

        $userData = $this->serializer->deserialize($result, 'array', 'json');

        if (!$userData) {
            throw new \LogicException('Did not managed to get your user info from Github.');
        }

        $user = new User(
            $userData['login'],
            $userData['name'],
            $userData['email'],
            $userData['avatar_url'],
            $userData['html_url']
        );

        return $user;
    }

    // …
}
?>

◘ Première étape : Déterminer ce qu'il faut tester

• Determiner les dépendances 

○ une instance de GuzzleHttp\Client ;
○ une instance de JMS\Serializer\Serializer.

• Comprendre ce que la méthode à tester doit retourner

Pour déterminer le nombre de tests à écrire, 
indicateurs => sorties (return) ou encore les exceptions éventuellement levées (throw)
Dans le code de la méthode  loadUserByUsername ci-dessus, il y a deux issues possibles :
○ soit retourner un objet $user de type AppBundle\Entity\User ;
○ soit lancer une exception de type LogicException si la variable $userData est vide.
○ donc 2 tests à écrire 

◘ Deuxième étape : Initier le test en exécutant le code à tester retournant un objet User

créer le fichier test/AppBundle/Security/GithubUserProviderTest 
<?php

namespace Tests\AppBundle\Security;

use PHPUnit\Framework\TestCase;

class GithubUserProviderTest extends TestCase
{
    public function testLoadUserByUsernameReturningAUser()
    {

    }
}
?>

Dans un premier temps, il faut instancier la classe GithubUserProvider. 
Nous avons vu que le constructeur demande deux dépendances.

• Doublure ou pas doublure pour la dépendance GuzzleHttp\Client ?

La dépendance GuzzleHttp\Client est utilisée dans le code pour envoyer une requête à Github
dépendance externe => doublure;

• Doublure ou pas doublure pour la dépendance JMS\Serializer\Serializer ?

Lorsque l'on lit le constructeur de la classe Serializer, (https://github.com/schmittjoh/serializer/blob/master/src/Serializer.php)
on peut constater qu'il va être bien difficile de l'instancier nous-mêmes. => doublure;

• Executer le code à tester 

<?php

namespace Tests\AppBundle\Security;

use AppBundle\Entity\User;
use AppBundle\Security\GithubUserProvider;
use PHPUnit\Framework\TestCase;

class GithubUserProviderTest extends TestCase
{
    public function testLoadUserByUsernameReturningAUser()
    {
        $client = $this->getMockBuilder('GuzzleHttp\Client')
            ->disableOriginalConstructor() // PHPUnit ne fait pas appel au constructeur des classes
            // que vous cherchez à doubler
            ->getMock();

        $serializer = $this
            ->getMockBuilder('JMS\Serializer\Serializer')
            ->disableOriginalConstructor() // idem
            ->getMock();

        // on passe les doublures au constructeur de la classe à tester
        $githubUserProvider = new GithubUserProvider($client, $serializer);
        // On récupére le résultat de la méthode loadUserByUsername. 
        // C'est sur le contenu de la variable $user que l'on fait les assertions
        $user = $githubUserProvider->loadUserByUsername('an-access-token');
        // Peu importe ce que vous passez comme paramètre à la méthode loadUserByUsername 
        // (il s'agit de l'access token communiqué à Github). 
        // Étant donné que vous ne ferez pas appel à Github, cela n'a pas d'incidence
    }
}
?>

Error n°1 
1) Tests\AppBundle\Security\GithubUserProviderTest::testLoadUserByUsernameWithUserAlreadyInDatabase
Error: Call to a member function getBody() on null

<?php

namespace AppBundle\Security;

// …

class GithubUserProvider implements UserProviderInterface
{
    // …

    public function loadUserByUsername($username)
    {
        $response = $this->client->get('https://api.github.com/user?access_token='.$username);
        $result = $response->getBody()->getContents();
        // méthode getBody est appelée sur la variable $response
        // obtenu grâce à l'appel de la méthode get sur l'objet $client
        // mais $client est une doublure : il ne fait rien
        // quand une méthode est appelée depuis une doublure, cette méthode retourne null
    }
    
    // …
}
?>

Pour connaître le type que nous devons doubler, il vous suffit de lire le code de la classe GuzzleHttp\Client
https://github.com/guzzle/guzzle/blob/master/src/Client.php#L12
// @method ResponseInterface get(string|UriInterface $uri, array $options = []);
la méthode attend un objet de type UriInterface

<?php

namespace Tests\AppBundle\Security;

use AppBundle\Entity\User;
use AppBundle\Security\GithubUserProvider;
use PHPUnit\Framework\TestCase;

class GithubUserProviderTest extends TestCase
{
    public function testLoadUserByUsernameReturningAUser()
    {
        $client = $this->getMockBuilder('GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->setMethods(['get'])  // Nous indiquons qu'une méthode va être redéfinie.
            ->getMock();

        $serializer = $this
            ->getMockBuilder('JMS\Serializer\Serializer')
            ->disableOriginalConstructor()
            ->getMock();
            
        $response = $this
            ->getMockBuilder('Psr\Http\Message\ResponseInterface')
            ->getMock();
        $client->method('get')->willReturn($response);

        $githubUserProvider = new GithubUserProvider($client, $serializer);
        $user = $githubUserProvider->loadUserByUsername('an-access-token');
    }
}
?>

Error n°2
1) Tests\AppBundle\Security\GithubUserProviderTest::testLoadUserByUsernameReturningAUser
Error: Call to a member function getContents() on null
PHPUnit vous indique que la méthode getContents est appelée sur un élément null. 
En effet, nous n'avons pas indiqué le comportement que devrait avoir la méthode getBody.
D'après la documentation, la méthode getBody retourne un objet de type Psr\Http\Message\StreamInterface
https://github.com/php-fig/http-message/blob/master/src/MessageInterface.php#L169
/**
     * Gets the body of the message.
     *
     * @return StreamInterface Returns the body as a stream.
     */
    public function getBody();

<?php

namespace Tests\AppBundle\Security;

use AppBundle\Entity\User;
use AppBundle\Security\GithubUserProvider;
use PHPUnit\Framework\TestCase;

class GithubUserProviderTest extends TestCase
{
    public function testLoadUserByUsernameReturningAUser()
    {
        // …
        
        $streamedResponse = $this
            ->getMockBuilder('Psr\Http\Message\StreamInterface')
            // ajouter un double ayant pour type Psr\Http\Message\StreamInterface
            ->getMock();
        $response->method('getBody')->willReturn($streamedResponse);
        // indiquer à PHPUnit que lorsque la méthode getBody sera exécutée, 
        // il faut que ce soit cette doublure qui soit renvoyée

        $githubUserProvider = new GithubUserProvider($client, $serializer);
        $user = $githubUserProvider->loadUserByUsername('an-access-token');
    }
}
?>

Error n°3 
LogicException : Did not managed to get your user info from GitHub. 
cas où aucune information n'est contenue dans la variable $userData après désérialisation
La solution est de compléter le comportement de la doublure du serializer 
afin qu'il retourne un tableau avec des informations factices.
<?php

namespace Tests\AppBundle\Security;

use AppBundle\Entity\User;
use AppBundle\Security\GithubUserProvider;
use PHPUnit\Framework\TestCase;

class GithubUserProviderTest extends TestCase
{
    public function testLoadUserByUsernameReturningAUser()
    {
        // …

        $userData = ['login' => 'a login', 'name' => 'user name', 'email' => 'adress@mail.com', 'avatar_url' => 'url to the avatar', 'html_url' => 'url to profile'];
        $serializer->method('deserialize')->willReturn($userData);

        $githubUserProvider = new GithubUserProvider($client, $serializer);
        $user = $githubUserProvider->loadUserByUsername('an-access-token');
    }
}
?>

C'est good ! 

Néanmoins, pour l'instant, vous ne testez rien. 
Pour y remédier, vous pouvez commencer par ajouter des attentes (expectations) pour chacun des stubs créés :
<?php

namespace Tests\AppBundle\Security;

use AppBundle\Entity\User;
use AppBundle\Security\GithubUserProvider;
use PHPUnit\Framework\TestCase;

class GithubUserProviderTest extends TestCase
{
    public function testLoadUserByUsernameReturningAUser()
    {
        $client = $this->getMockBuilder('GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->setMethods(['get'])
            ->getMock();

        $serializer = $this
            ->getMockBuilder('JMS\Serializer\Serializer')
            ->disableOriginalConstructor()
            ->getMock();

        $response = $this
            ->getMockBuilder('Psr\Http\Message\ResponseInterface')
            ->getMock();
        $client
            ->expects($this->once()) // Nous nous attendons à ce que la méthode get soit appelée une fois
            ->method('get')
            ->willReturn($response)
            ;

        $streamedResponse = $this
            ->getMockBuilder('Psr\Http\Message\StreamInterface')
            ->getMock();
        $response
            ->expects($this->once()) // Nous nous attendons à ce que la méthode getBody soit appelée une fois
            ->method('getBody')
            ->willReturn($streamedResponse);

        $userData = ['login' => 'a login', 'name' => 'user name', 'email' => 'adress@mail.com', 'avatar_url' => 'url to the avatar', 'html_url' => 'url to profile'];
        $serializer
            ->expects($this->once()) // Nous nous attendons à ce que la méthode deserialize soit appelée une fois
            ->method('deserialize')
            ->willReturn($userData);

        $githubUserProvider = new GithubUserProvider($client, $serializer);
        $user = $githubUserProvider->loadUserByUsername('an-access-token');
    }
}
?>

Assurez-vous maintenant que l'objet retourné 
par la méthode testée contient bien toutes les informations attendues :
<?php

namespace Tests\AppBundle\Security;

use AppBundle\Entity\User;
use AppBundle\Security\GithubUserProvider;
use PHPUnit\Framework\TestCase;

class GithubUserProviderTest extends TestCase
{
    public function testLoadUserByUsernameReturningAUser()
    {
        // …
        
        $githubUserProvider = new GithubUserProvider($client, $serializer);
        $user = $githubUserProvider->loadUserByUsername('an-access-token');


        $expectedUser = new User($userData['login'], $userData['name'], $userData['email'], $userData['avatar_url'], $userData['html_url']);
        
        $this->assertEquals($expectedUser, $user);
        $this->assertEquals('AppBundle\Entity\User', get_class($user));
        // Les deux assertions s'assurent que les informations contenues dans l'objet retournées
        // par la méthode loadUserByUsername sont correctes 
        // et que le type de l'objet est bien AppBundle\Entity\User
    }
}
?>

◘ Troisième étape : Écrire le test couvrant le cas où aucune information ne serait récupérée après la requête http à Github

<?php

namespace Tests\AppBundle\Security;

// …
use AppBundle\Security\GithubUserProvider;

class GithubUserProviderTest extends TestCase
{
    // …
    public function testLoadUserByUsernameThrowingException()
    {
        $client = $this->getMockBuilder('GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->setMethods(['get'])
            ->getMock();

        $serializer = $this
            ->getMockBuilder('JMS\Serializer\Serializer')
            ->disableOriginalConstructor()
            ->getMock();

        $response = $this
            ->getMockBuilder('Psr\Http\Message\ResponseInterface')
            ->getMock();
        $client
            ->expects($this->once())
            ->method('get')
            ->willReturn($response)
        ;

        $streamedResponse = $this
            ->getMockBuilder('Psr\Http\Message\StreamInterface')
            ->getMock();
        $response
            ->expects($this->once())
            ->method('getBody')
            ->willReturn($streamedResponse);

        $serializer
            ->expects($this->once())
            ->method('deserialize')
            ->willReturn([]); // le double de serializer retourne un tableau vide

        $this->expectException('LogicException');

        $githubUserProvider = new GithubUserProvider($client, $serializer);
        $githubUserProvider->loadUserByUsername('an-access-token');
    }
}
?>

◘ Quatrième étape : Factoriser le code

Il est possible d'initialiser les doublures à chaque début de test grâce à la méthode setUp();
(méthode provenant de la classe PHPUnit_Framework_TestCase)
<?php

namespace Tests\AppBundle\Security;

use AppBundle\Entity\User;
use AppBundle\Security\GithubUserProvider;
use PHPUnit\Framework\TestCase;

class GithubUserProviderTest extends TestCase
{
    private $client;
    private $serializer;
    private $streamedResponse;
    private $response;

    public function setUp()
    {
        $this->client = $this->getMockBuilder('GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->setMethods(['get'])
            ->getMock();

        $this->serializer = $this
            ->getMockBuilder('JMS\Serializer\Serializer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->streamedResponse = $this
            ->getMockBuilder('Psr\Http\Message\StreamInterface')
            ->getMock();

        $this->response = $this
            ->getMockBuilder('Psr\Http\Message\ResponseInterface')
            ->getMock();
    }

    public function testLoadUserByUsernameReturningAUser()
    {
        $this->client
            ->expects($this->once())
            ->method('get')
            ->willReturn($this->response)
            ;

        $this->response
            ->expects($this->once())
            ->method('getBody')
            ->willReturn($this->streamedResponse);

        $userData = ['login' => 'a login', 'name' => 'user name', 'email' => 'adress@mail.com', 'avatar_url' => 'url to the avatar', 'html_url' => 'url to profile'];
        $this->serializer
            ->expects($this->once())
            ->method('deserialize')
            ->willReturn($userData);

        $githubUserProvider = new GithubUserProvider($this->client, $this->serializer);
        $user = $githubUserProvider->loadUserByUsername('an-access-token');


        $expectedUser = new User($userData['login'], $userData['name'], $userData['email'], $userData['avatar_url'], $userData['html_url']);
        $this->assertEquals($expectedUser, $user);
        $this->assertEquals('AppBundle\Entity\User', get_class($user));
    }

    public function testLoadUserByUsernameThrowingException()
    {
        $this->client
            ->expects($this->once())
            ->method('get')
            ->willReturn($this->response)
        ;

        $this->response
            ->expects($this->once())
            ->method('getBody')
            ->willReturn($this->streamedResponse);

        $this->serializer
            ->expects($this->once())
            ->method('deserialize')
            ->willReturn([]);

        $this->expectException('LogicException');

        $githubUserProvider = new GithubUserProvider($this->client, $this->serializer);
        $githubUserProvider->loadUserByUsername('an-access-token');
    }
}
?>

• tearDown 

Il est également possible d'intervenir à chaque fin de test
(après chaque méthode de test de la classe) grâce à la méthode tearDown().
Pour cela, il vous faut mettre les propriétés à null à nouveau :
<?php

namespace Tests\AppBundle\Security;

// …

class GithubUserProviderTest extends TestCase
{
    // …
    public function tearDown()
    {
        $this->client = null;
        $this->serializer = null;
        $this->streamedResponse = null;
        $this->response = null;
        // important de remettre l'ensemble des variables à null à chaque fin de test
        // pour éviter d'encombrer le mémoire du système
    }
}