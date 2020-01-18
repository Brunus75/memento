/* MEMENTO JAVA */

// I) BASES

public class MyClass {
    public static void main(String... args) {
      System.out.println("Hello World !");
    }
}

// Code java => Compilation (javac.exe) => Interpretation (java.exe)
// Télécharger java : OpenJDK => AdoptOpenJDK => version LTS"
// Settings: "java.home": "C:\\Program Files\\AdoptOpenJDK\\jdk-11.0.5.10-hotspot"
// Télécharger IntelliJ IDEA (version Community)

// Create New Project => Project version = verifier la bonne version
// src/ => new Java Class
// pour exécuter => clic droit sur la classe (fenêtre gauche) => Run
// sauvegarde automatique

// raccourcis:
// sout pour System.out.println


// II) LES VARIABLES

// type variableEnCamelCase
// langage à typage fort : chaque variable est associée à un type immuable
// types primitifs (commencent par une minuscule)
int variableEntier;
long variableEntierImmense;
short variableEntierPetit;
byte variableEntierToutPetit;
char variableCaractere;
float variableVirgule;
double variableVirguleGrandeValeur;
boolean vraiOuFaux;
// affectation
int variable = 10;
variable = 11;
// forcer un nombre long
long longNumber = 14808205717371L; // ++ l ou L à la fin
float doubleNumber = 1.43F; // ++ f ou F
double number = 1.43;
char character = 'A' || '\uFF27';
boolean isJavaEasy = true;

public class HelloUniverse {
    
    public static void main(String... args){
        int numberPlanets = 8;
        System.out.println("Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de :");
        System.out.println(numberPlanets);
        System.out.println("Il y a quelques années cependant, elles étaient au nombre de :");
        System.out.println(numberPlanets + 1);
    }

}
// type dit "Objet" (commence par une MAJ)
String chaineDeCaracteres = "Hello World !"; 


// III) LES OPERATEURS

// les opérations s'effectuent de droite à gauche
// valeur affectée en deuxième = valeur affectée = valeur initiale;
int reste = 5 % 2; // 1, principe du modulo
int quotient = 5 / 2; // 2
float quotientF = 5f / 2; // 2.5, la première valeur indique un float
float quotientFF = 5 / 2; // 2.0, la première valeur oublie le float
// 1500€ à convertir en dollars, avec un taux de change de 1.22$/1€
short euros = 1500;
float txChangeDollars = 1.22f; // 1.22$ pour 1€
float dollars = 1500 * 1.22f / 1;
// operateurs relationnels
boolean isTrue = 20 < 30;
boolean isFalse = 20 >= 30;
boolean isTrueAgain = 20 == 20;
boolean isTrueAgainAgain = 20 != 30;
boolean yesItsTrue = 'a' <= 'b'; // caractères ordonnés
// operateurs logiques
boolean isTrue = true & true; // les 2 expression sont evaluees
boolean isTrue = false | true; // idem
boolean isFalse = true ^ true; // si les deux sont vrais, le résultat est faux
boolean isTrue = !false;
boolean isFalse = false && true; // pas besoin de vérifier la deuxième valeur
boolean isFalse = false || true; // && et || sont à privilégier (performance oblige)
// operateurs incrementation, decrementation
int number = 5;
number++;
number--;
// attention : placé à la fin, l'affectation à la priorité
number1 = number2++; // number1 = number2, puis number2 = number2++
number1 = ++number2 // priorité sur l'operateur d'affectation, number1 = number2++
// operateur de concatenation
String chaine1 = "Bonjour ";
String chaine2 = "Monsieur !";
chaine1 + chaine2; // Bonjour Monsieur !
chaine1 + 39; // Bonjour 39
chaine + (38 + 1); // idem

public class HelloUniverse {

    public static void main(String... args) {
        String sentence = "Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : ";
        int numberPlanets = 8;
        System.out.println(sentence + numberPlanets);
        sentence = "Il y a quelques années cependant, elles étaient au nombre de : ";
        numberPlanets++;
        System.out.println(sentence + numberPlanets);
    }
}


// IV) Les structures de contrôle

public class HelloUniverse {
    public static void main(String... args){
        int date = 2019;
        int nbPlanets = 8;
        String sentence;

        if (date >= 2018) {
            sentence = "Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : ";
            System.out.println(sentence + nbPlanets);
        }

        if (date < 2018) {
            sentence = "Il y a quelques années cependant, elles étaient au nombre de : ";
            nbPlanets++;
            System.out.println(sentence + nbPlanets);
        }
    }
}

// if else avec operateur ternaire
boolean conditionTrue;
conditionTrue ? 'La conditon est vraie' : 'La condition est fausse';

public class HelloUniverse {

    public static void main(String... args) {
        int nbPlanetes = 8;
        
        if (nbPlanetes == 8){
            System.out.println("Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : " + nbPlanetes);
        }
        else {
            System.out.println("Il y a quelques années cependant, elles étaient au nombre de : " + nbPlanetes);
        }
        
        nbPlanetes++;
        if (nbPlanetes == 8){
            System.out.println("Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : " + nbPlanetes);
        }
        else {
            System.out.println("Il y a quelques années cependant, elles étaient au nombre de : " + nbPlanetes);
        }
    }
}

if (true) {
    //
} 
else if (true && condition) {
    //
} 
else {
    //
}

public class HelloUniverse {

    public static void main(String... args) {
        
        int nbPlanetes = 8;
        
        if (nbPlanetes == 8) {
            System.out.println("Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : " + nbPlanetes);
        }
        else if (nbPlanetes == 9) {
            System.out.println("Il y a quelques années cependant, elles étaient au nombre de : " + nbPlanetes);
        }
        else {
            System.out.println("Au cours de l'ère moderne, le nombre de planètes n'a jamais été officiellement de : " + nbPlanetes);
        }
        
        nbPlanetes++;
        if (nbPlanetes == 8) {
            System.out.println("Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : " + nbPlanetes);
        }
        else if (nbPlanetes == 9) {
            System.out.println("Il y a quelques années cependant, elles étaient au nombre de : " + nbPlanetes);
        }
        else {
            System.out.println("Au cours de l'ère moderne, le nombre de planètes n'a jamais été officiellement de : " + nbPlanetes);
        }
        
        nbPlanetes++;
        if (nbPlanetes == 8) {
            System.out.println("Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : " + nbPlanetes);
        }
        else if (nbPlanetes == 9) {
            System.out.println("Il y a quelques années cependant, elles étaient au nombre de : " + nbPlanetes);
        }
        else {
            System.out.println("Au cours de l'ère moderne, le nombre de planètes n'a jamais été officiellement de : " + nbPlanetes);
        }
    }
}

// switch case : char, int, string
public class HelloUniverse {

    public static void main(String... args) {

        int nbPlanetes = 8;

        switch (nbPlanetes) {
            case 8 :
                System.out.println("Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : " + nbPlanetes);
                break;
            case 9 :
                System.out.println("Il y a quelques années cependant, elles étaient au nombre de : " + nbPlanetes);
                break;
            default :
                System.out.println("Au cours de l'ère moderne, le nombre de planètes n'a jamais été officiellement de : " + nbPlanetes);
        }

        nbPlanetes++;
        switch (nbPlanetes) {
            case 8 :
                System.out.println("Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : " + nbPlanetes);
                break;
            case 9 :
                System.out.println("Il y a quelques années cependant, elles étaient au nombre de : " + nbPlanetes);
                break;
            default :
                System.out.println("Au cours de l'ère moderne, le nombre de planètes n'a jamais été officiellement de : " + nbPlanetes);
        }

        nbPlanetes++;
        switch (nbPlanetes) {
            case 8 :
                System.out.println("Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : " + nbPlanetes);
                break;
            case 9 :
                System.out.println("Il y a quelques années cependant, elles étaient au nombre de : " + nbPlanetes);
                break;
            default :
                System.out.println("Au cours de l'ère moderne, le nombre de planètes n'a jamais été officiellement de : " + nbPlanetes);
        }
    }
}

// boucle for =  on connait le nombre d'itérations à réaliser
for (int i = 0; i < 3; i++) {
    System.out.println("Tour numéro " + i);
}
// for (variable; variable < 3; variable++) donne une erreur
// l'itérateur doit être annoncé via une opération
// ex. (truc = variable; truc < 3; truc++)

public class HelloUniverse {

    public static void main(String... args) {

        for (int nbPlanetes = 8; nbPlanetes <= 10; nbPlanetes++) {
            switch (nbPlanetes) {
                case 8 :
                    System.out.println("Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : " + nbPlanetes);
                    break;
                case 9 :
                    System.out.println("Il y a quelques années cependant, elles étaient au nombre de : " + nbPlanetes);
                    break;
                default :
                    System.out.println("Au cours de l'ère moderne, le nombre de planètes n'a jamais été officiellement de : " + nbPlanetes);
            }
        }
    }
}

// boucle while qui peut commencer à une expression fausse
isTrue = false;
do {
    System.out.println("Je suis affiché");
    isTrue = true;
}
while (isTrue);

public class HelloUniverse {

    public static void main(String... args) {

        int nbPlanetes = 8; 

        while (nbPlanetes <= 10) {
            switch (nbPlanetes) {
                case 8 :
                    System.out.println("Aux dernières nouvelles, le nombre total de planètes dans le système solaire est de : " + nbPlanetes);
                    break;
                case 9 :
                    System.out.println("Il y a quelques années cependant, elles étaient au nombre de : " + nbPlanetes);
                    break;
                default :
                    System.out.println("Au cours de l'ère moderne, le nombre de planètes n'a jamais été officiellement de : " + nbPlanetes);
            }
            nbPlanetes++;
        }
    }
}

// les mots clés break et continue dans les boucles
boolean jeContinue = true;
while (jeContinue) {
    System.out.println("Une itération");
    break; // stoppe dès la première itération
}

boolean jeContinue = true;
int nb = 0;
while (jeContinue) {
    System.out.println("Une itération");
    nb++;
    if (nb == 5) {
        continue; // stoppe l'itération courante pour passer à la suivante
    }
    System.out.println(nb + " ne vaut pas 5");
    if (nb == 10) {
        break; // ou jeContinue = false
    }
}
// 1 ne vaut pas 5
// ...
// 10 ne vaut pas 5


// V) CLASSE & OBJET

// Créer une classe => Source Packages (ou src) => Java Class
public class Voiture {
    // propriétés ou attributs
    boolean automatic; // faux par défaut
    int nbDoors; // 0 par défaut
    char firstLetter; // \u0000
    String color; // null
    String nom;
    String matiere = "Gazeuse";
    long diametre;
}

new Voiture(); // créé un objet dans la mémoire
Voiture voitureDeJean = new Voiture(); // cet objet est associé à une variable
// cette variable est un pointeur, qui contient sa référence
// modifier les attributs
voitureDeJean.nbDoors = 8;
voitureDeJean.automatic = true;
voitureDeJean.color = "Verte";
System.out.println(voitureDeJean.color); // Verte

public class HelloUniverse {

    public static void main(String... args) {

        Planete mercure = new Planete();
        mercure.nom = "Mercure";
        mercure.diametre = 4880;
        mercure.matiere = "tellurique";
        System.out.println(mercure.nom + " est une planète " + mercure.matiere +
                " avec un diamètre de " + mercure.diametre + " kilomètres");

        Planete jupiter = new Planete();
        jupiter.nom = "Jupiter";
        jupiter.diametre = 142984;
        jupiter.matiere = "gazeuse";
        System.out.println(jupiter.nom + " est une planète " + jupiter.matiere +
                " avec un diamètre de " + jupiter.diametre + " kilomètres");

    }
}

// null : pointe vers une adresse 0
// null : variable de type objet associée à aucun objet
public class Voiture {
    // propriétés ou attributs
    String color; // null
}

public class HelloUniverse {

    public static void main(String... args) {

        Planete jupiter = new Planete();
        jupiter.nom = "Jupiter";
        jupiter.diametre = 142984;
        jupiter.matiere = "gazeuse";
        
        System.out.println(jupiter.nom+" est une planète "+jupiter.matiere+" avec un diamètre de "+jupiter.diametre+" kilomètres.");
        
        Planete planeteX = new Planete();
        
        System.out.println(planeteX.nom+" est une planète "+planeteX.matiere+" avec un diamètre de "+planeteX.diametre+" kilomètres.");
        // null est une planète null avec un diamètre de 0 kilomètres.
    }

}

// méthodes

public class HelloWorld {

    public static void main(String... args) {
        Voiture voitureDeJean = new Voiture();
        voitureDeJean.klaxonner();
        // Tut tut !
    }
}

public class Voiture {
    boolean automatic; // faux par défaut
    int nbDoors; // 0 par défaut
    String color; // null

    void klaxonner() {
        // void car ne renvoie aucun résultat
        System.out.println("Tut tut !");
    }
}

// exemple with planets

public class Planete {
    String nom;
    String matiere;
    long diametre;

    void revolution() {
        System.out.println("Je suis la planète " + nom + " et je tourne autour de mon étoile.");
    }

    void rotation() {
        System.out.println("Je suis la planète " + nom + " et je tourne sur moi-même.");
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        Planete mars = new Planete();
        mars.nom = "Mars";
        mars.diametre = 6792;
        mars.matiere = "Tellurique";
        Planete neptune = new Planete();
        neptune.nom = "Neptune";
        neptune.diametre = 49532;
        neptune.matiere = "Gazeuse";

        neptune.revolution(); // Je suis la planète Neptune et je tourne autour de mon étoile.
        mars.rotation(); // Je suis la planète Mars et je tourne sur moi-même.
    }
}