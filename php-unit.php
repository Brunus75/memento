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