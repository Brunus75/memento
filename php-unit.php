// ---------- PHP UNIT ---------- //

https://openclassrooms.com/fr/courses/4087056-testez-et-suivez-letat-de-votre-application-php/4419436-mise-en-place-dun-outil-pour-implementer-ses-tests-unitaires

I) MISE EN PLACE

◘ Installer avec Composer

composer require phpunit/phpunit
/!\ Pour Symfony actuel : composer require --dev phpunit

Pour vérifier que PHPUnit est bien installé :
$ vendor/bin/phpunit --help

◘ Obtenir le rapport de couverture de code (code coverage report)

Concrètement, écrire un test, c'est exécuter le code à tester, c'est-à-dire :
• instancier une classe ;
• appeler une méthode en lui passant des paramètres (si besoin est) ;
• en vérifier la sortie.