/* MEMENTO JAVA */

// INTELLIJ IDEA

    // CTRL + / ==> To comment/uncomment a line .
    /* CTRL + Shift + / ==> To comment/uncomment block of code. */
    // CTRL + Y ==> To delete a line.

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
float variableVirgule; // précision : 6 décimales
double variableVirguleGrandeValeur; // précision : 15 décimales
// type de données le plus couramment utilisé dans les langages de programmation
// pour attribuer des valeurs comportant un nombre réel ou décimal, telles que
// 3.14 pour pi
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

// • Créer une classe => Source Packages (ou src) => Java Class

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

// • méthodes

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

// • arguments et valeurs de retour

public class Voiture {

    // un seul type de retour
    int accelerer() {
        System.out.println("Vroum vroum !");
        return 100;
    }

    int passerRapport(boolean augmenter) {
        if (augmenter) {
            rapportCourant++;
        } else {
            rapportCourant--;
        }
        return rapportCourant;
    }

    void tourner(boolean droite, int angle) {
        String direction = null;

        if (droite) {
            direction = "droite";
        } else {
            direction = "gauche";
        }

        System.out.println("La voiture va tourner à " + direction +
                ", d'un angle de " + angle + " degrés.");
    }
}

public class HelloWorld {
    public static void main(String... args) {

        Voiture voitureDeJean = new Voiture();

        int nouvelleVitesse = voitureDeJean.accelerer();
        System.out.println(nouvelleVitesse); 
        // Vroum vroum ! 
        // 100

        int nouveauRapport = voitureDeJean.passerRapport(true);
        System.out.println("Le nouveau rapport est : " + nouveauRapport);
        // Le nouveau rapport est : 1

        voitureDeJean.tourner(false, 45);
        // La voiture va tourner à gauche, d'un angle de 45 degrés.
    }
}

// exemples avec les planètes
public class Planete {

    int revolution(int angle) {
        return angle / 360;
    }

    int rotation(int angle) {
        return angle / 360;
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        System.out.println("Neptune a effectué " +  neptune.revolution(-3542) + 
        " tours autour de son étoile.");
        System.out.println("Mars a effectué " + mars.rotation(-684) + 
        " tours sur elle-même.");
        System.out.println("Venus a effectué " + venus.rotation(1250) + 
        " tours sur elle-même.");

        // Neptune a effectué -9 tours autour de son étoile.
        // Mars a effectué -1 tours sur elle-même.
        // Venus a effectué 3 tours sur elle-même.
    }
}

// • comparer des types objet comme String

// Pas de new, Java stocke cette chaine de caractere dans un emplacement spécial
String chaine1 = "Il fait beau";
String chaine2 = "Il fait beau"; // même façon de procéder + même contenu => même emplacement
boolean equal = (chaine1 == chaine2);
System.out.println(equal); // true, là ou ça aurait donné false pour un autre objet
// car emplacements dans la mémoire différents

String chaine1 = new String("Il fait beau");
String chaine2 = new String("Il fait beau");
boolean equal = (chaine1 == chaine2);
System.out.println(equal); // false

// avec la méthode equals, qui vérifie caractère par caractère
// equalsIgnoreCase() pour ne pas être sensible à la casse
String chaine1 = new String("Il fait beau");
String chaine2 = new String("Il fait beau");
boolean equal = (chaine1.equals(chaine2));
System.out.println(equal); // true

// • surcharge de méthodes

    int accelerer() {
        System.out.println("Vroum vroum !");
        return 100;
    }

    // methode de même nom, avec des arguments différents
    int accelerer(int vitesseEnPlus) {
        System.out.println("Vroum vroum !");
        return vitesseCourante + vitesseEnPlus;
    }

// exemples avec planètes

public class Planete {

    int totalVisiteurs;

    void accueillirVaisseau(int arrivants) {
        totalVisiteurs += arrivants;
    }
    
    // surcharge de méthode
    void accueillirVaisseau(String vaisseau) {
        if (vaisseau.equals("CHASSEUR")) {
            totalVisiteurs += 3;
        } else if (vaisseau.equals("FREGATE")) {
            totalVisiteurs += 12;
        } else if (vaisseau.equals("CROISEUR")) {
            totalVisiteurs += 50;
        }
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        mars.accueillirVaisseau(8);
        mars.accueillirVaisseau("FREGATE");
        System.out.println("Le nombre d'humains ayant déjà séjourné sur Mars est actuellement de "
        + mars.totalVisiteurs + ".");
        // Le nombre d'humains ayant déjà séjourné sur Mars est actuellement de 20.
    }
}

// • this =  l'objet courant (utilisé pour éviter toute ambiguité)

int vitesse; // propriété de classe

int accelerer(int vitesse) {
    System.out.println("Vroum vroum !");
    return this.vitesse + vitesse;
}

// • propriétés sous forme d'objets

public class Moteur {
    // les propriétés sont encapsulées dans une nouvelle classe
    String carburation;
    int nbCylindres;
}

public class HelloWorld {
    public static void main(String... args) {

        Voiture voitureDeJean = new Voiture();

        Moteur moteur = new Moteur();
        moteur.carburation = "Diesel";
        moteur.nbCylindres = 6;
        voitureDeJean.moteur = moteur;

        System.out.println("Le nombre de cyclindres de la voiture de Jean est " +
                voitureDeJean.moteur.nbCylindres);

        Voiture voituredeMichel = new Voiture();
        voituredeMichel.moteur = moteur; // copie par référence
        // les deux possèdent un moteur qui a la même référence

        moteur.nbCylindres = 8; // le changement s'opère pour les 2 voiture
        // car associées au même moteur

        voituredeMichel.moteur = null; // le moteur existe toujours mais n'est plus associé
        // à la voiture de Michel
    }
}

// exemples planetes
public class Atmosphere {
    float tauxHydrogene;
    float tauxMethane;
    float tauxAzote;
    float tauxHelium;
    float tauxArgon;
    float tauxDioxydeCarbone;
    float tauxSodium;
}

public class Planete {

    Atmosphere atmosphere; // ++
}

public class HelloUniverse {

    public static void main(String... args) {

        Planete uranus = new Planete();
        uranus.nom = "Uranus";
        uranus.diametre = 51118;
        uranus.matiere = "Gazeuse";

        Atmosphere atmosphereUranus = new Atmosphere();
        atmosphereUranus.tauxHydrogene = 83;
        atmosphereUranus.tauxHelium = 15;
        atmosphereUranus.tauxMethane = (float) 2.5; // aussi 2.5f

        uranus.atmosphere = atmosphereUranus;

        System.out.println("L'atmosphère de Uranus est composée de : ");
        System.out.println("A " + uranus.atmosphere.tauxHydrogene + "% d'hydrogène");
        System.out.println("A " + uranus.atmosphere.tauxArgon + "% d'argon");
        System.out.println("A " + uranus.atmosphere.tauxDioxydeCarbone + "% de dioxyde de carbone");
        System.out.println("A " + uranus.atmosphere.tauxAzote + "% d'azote");
        System.out.println("A " + uranus.atmosphere.tauxHelium + "% d'hélium");
        System.out.println("A " + uranus.atmosphere.tauxMethane + "% de méthane");
        System.out.println("A " + uranus.atmosphere.tauxSodium + "% de sodium");
        // L'atmosphère de Uranus est composée de : 
        // A 83.0% d'hydrogène
        // A 0.0% d'argon
        // A 2.5% de méthane
    }
}

// • méthodes qui référencent des objets

public class Passager {
    String nom;
    String prenom;
}

public class Ville {
    String nom;
}

public class Voiture {

    Ville transporter(Passager passager, Ville villeDépart) {
        System.out.println("Je transporte un passager qui s'appelle "
                + passager.prenom + " " + passager.nom);
        System.out.println("Le passager est parti de la ville de " + villeDépart.nom);
        
        Ville villeDestination = new Ville();
        villeDestination.nom = "Wellington";

        return villeDestination;
    }
}

public class HelloWorld {

    public static void main(String... args) {

        Passager passager = new Passager();
        passager.nom = "Dupontel";
        passager.prenom = "Albert";

        Ville auckland = new Ville();
        auckland.nom = "Auckland";

        voituredeMichel.transporter(passager, auckland);
        // Je transporte un passager qui s'appelle Albert Dupontel
        // Le passager est parti de la ville de Auckland

        Ville villeDestination = voituredeMichel.transporter(passager, auckland);
        System.out.println("Le passager est arrivé dans la ville de " +  villeDestination.nom);
        // Le passager est arrivé dans la ville de Wellington
    }
}

// avec les planètes

public class Vaisseau {
    String type;
    int nbPassagers;
}

public class Planete {
    Vaisseau vaisseau; // vaisseau en stationnement

    Vaisseau accueillirVaisseau(Vaisseau vaisseau) {

        if (this.vaisseau == null) {
            System.out.println("Aucun vaisseau ne s'en va");
        } else {
            System.out.println("Un vaisseau de type " + this.vaisseau.type + " doit s'en aller.");
        }

        this.totalVisiteurs += vaisseau.nbPassagers;

        Vaisseau vaisseauEnPartance = this.vaisseau;
        this.vaisseau = vaisseau; // remplace le vaisseau en stationnement, qui part

        return vaisseauEnPartance;
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        Vaisseau fregate = new Vaisseau();
        fregate.nbPassagers = 9;
        fregate.type = "FREGATE";

        Vaisseau croiseur = new Vaisseau();
        croiseur.type = "CROISEUR";
        croiseur.nbPassagers = 42;

        mars.accueillirVaisseau(fregate);
        mars.accueillirVaisseau(croiseur);
        System.out.println("Le nombre d'humains ayant déjà séjourné sur Mars est actuellement de "
        + mars.totalVisiteurs + ".");
        // Aucun vaisseau ne s'en va
        // Un vaisseau de type FREGATE doit s'en aller.
        // Le nombre d'humains ayant déjà séjourné sur Mars est actuellement de 51.
    }
}


// • attribut (propriété) statique
// attribut dont la valeur (la référence à un objet) est la même pour toutes les instances
// valeur commune à toutes les instances ; la variable est définie par la classe
// autre nom : variable de classe

public class Voiture {
    static int nbRoues = 4;// ++
}

public class HelloWorld {

    public static void main(String... args) {

        System.out.println(voitureDeJean.nbRoues); // 4 roues pour cette voiture
        System.out.println(voituredeMichel.nbRoues); // 4 pour celle-là
        System.out.println(Voiture.nbRoues); // 4 en général

        Voiture.nbRoues = 5; // une valeur statique peut changer
        // ses changements se répercutent sur l'ensemble des instances

        System.out.println(voitureDeJean.nbRoues); // 5 roues pour cette voiture
        System.out.println(voituredeMichel.nbRoues); // 5
        System.out.println(Voiture.nbRoues); // 5
    }
}

// planètes

public class Planete {
    static String forme = "Sphérique"; // commun à toutes les planètes
}

public class HelloUniverse {

    public static void main(String... args) {

        System.out.println("La forme d'une planète est : " + Planete.forme);
        System.out.println("La forme de Mars est : " + mars.forme);
        // La forme d'une planète est : Sphérique
        // La forme de Mars est : Sphérique
    }
}

// • les méthodes statiques
// méthode de classe : se rapporte à la classe, ne manipule aucun attribut d'instance
public class Voiture {

    static int nbRoues = 4; // attribut statique, commun à toutes les instances

    static void klaxonner() {
        System.out.println("Tut tut !");
    }

    static void tourner(boolean droite, int angle) {
        String direction = null;
        if (droite) {
            direction = "droite";
        } else {
            direction = "gauche";
        }
        System.out.println("Les " + nbRoues + " roues de la voiture vont tourner à " + direction +
                ", d'un angle de " + angle + " degrés.");
    }
}

public class HelloWorld {

    public static void main(String... args) {

        Voiture.klaxonner(); // Tut tut !
        Voiture.tourner(true, 45);
        // Les 4 roues de la voiture vont tourner à droite, d'un angle de 45 degrés.
    }
}

// ex. planètes

public class Planete {

    static String expansion(double distance) {
        if (distance < 14) {
            return "Oh la la mais c'est super rapide !";
        } else {
            return "Je rêve ou c'est plus rapide que la lumière ?";
        }
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        System.out.println("La forme d'une planète est : " + Planete.forme);
        System.out.println("La forme de Mars est : " + mars.forme);

        System.out.println(Planete.expansion(10.5)); // nombres flottants considérés comme double
        System.out.println(Planete.expansion(14.2));
        // Oh la la mais c'est super rapide !
        // Je rêve ou c'est plus rapide que la lumière ?
    }
}

// • le constructeur

public class Voiture {
    
    Voiture() {
        // instructions à l'instanciation
    }
}

// ex. planètes

public class Planete {

    static int nbPlanetesDecouvertes; // ++

    Planete() {
        nbPlanetesDecouvertes++;
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        System.out.println("Le nombre de planètes découvertes est de : " 
            + Planete.nbPlanetesDecouvertes);
        // Le nombre de planètes découvertes est de : 8
}

// • le constructeur et ses paramètres + ordonner le tout

public class Voiture {

    static int nbRoues = 4; // attributs statiques en premier
    boolean automatic; // puis attributs d'instance

    // viennent ensuite les constructeurs, ordonnés par leur nombre de paramètres

    Voiture() { // 2) son ajout permet la cohabitation des 2 constructeurs
        System.out.println("Une voiture est construite sans paramètres.");
    }

    Voiture(String couleur) { // 1) remplace le constructeur par défaut
        // le paramètre est désormais obligatoire pour l'instanciation
        this.color = couleur;
        System.out.println("Une voiture est construite avec la couleur.");
    }

    Voiture(int nbPortes) { // 3) type de paramètres différent, c'est OK de rajouter
        this.nbDoors = nbPortes;
        System.out.println("Une voiture est construite avec un nombre de portes.");
    }

    Voiture(String couleur, int nbPortes) { // 4) avec plusieurs types
        this.color = couleur;
        this.nbDoors = nbPortes;
        System.out.println("Une voiture est construite avec  la couleur et un nombre de portes.");
    }

    Voiture(Moteur moteur) { // 5) avec un objet
        this.moteur = moteur;
        System.out.println("Une voiture est construite avec  un moteur.");
    }

    Voiture(String carburation, int nbCylindres) { // 6) créé une erreur car un constructeur semblable
        // plus haut
        Moteur moteur = new Moteur();
        moteur.carburation = carburation;
        moteur.nbCylindres = nbCylindres;
        this.moteur = moteur;
    }

    // les méthodes

    // les méthodes statiques

    static void klaxonner() {
        // void car ne renvoie aucun résultat
        System.out.println("Tut tut !");
    }

    // autres méthodes

    int accelerer() {
        System.out.println("Vroum vroum !");
        return 100;
    }

    // méthodes d'instance

    Ville transporter(Passager passager, Ville villeDépart) {
        System.out.println("Je transporte un passager qui s'appelle "
                + passager.prenom + " " + passager.nom);
        System.out.println("Le passager est parti de la ville de " + villeDépart.nom);
        Ville villeDestination = new Ville();
        villeDestination.nom = "Wellington";

        return villeDestination;
    }
}

public class HelloWorld {

    public static void main(String... args) {

        Voiture voitureDeJean = new Voiture("Jaune", 3);
        voitureDeJean.automatic = true;
        voitureDeJean.color = "Verte"; // la voiture est jaune, puis verte

    }
}

// ex. planètes

public class Planete {

    Planete(String nom) { // remplace le constructeur par défaut
        // le nom est désormais obligatoire
        this.nom = nom;
        nbPlanetesDecouvertes++;
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        Planete mercure = new Planete("Mercure");
        mercure.diametre = 4880;
        mercure.matiere = "Tellurique";

        System.out.println("Le nombre de planètes découvertes est de : " + Planete.nbPlanetesDecouvertes);
        // Le nombre de planètes découvertes est de : 8
    }
}


// VI) HERITAGE ET INTERFACES

// • héritage avec le mot clé extends

// par défaut, une classe hérite de la classe Object
// la classe mère définit la nature de son enfant (ex. Voiture avec Fiat Panda)

// une classe ne peut hériter que d'une seule classe
// pour régler ce probleme, on fait appel à la délégation (concept qui regroupe les 2 parents)
public class Personne extends Couple {
}
public class Couple {
    Personne pere;
    Personne mere;
}

// ex. planètes
public class Vaisseau {
    String type;
    int nbPassagers;
    int blindage; // capacité de résistance
    int resistanceDuBouclier; // nb minutes de résistance restantes

    void activerBouclier() {
        System.out.println("Activation du bouclier d'un vaisseau de type " + this.type);
    }

    void desactiverBouclier() {
        System.out.println("Désactivation du bouclier d'un vaisseau de type " + this.type);
    }
}

public class VaisseauCivil extends Vaisseau {}

public class VaisseauDeGuerre extends Vaisseau {

    void attaque(Vaisseau vaisseauCible, String arme, int duree) {
        System.out.println("Un vaisseau de type " + this.type + " attaque un vaisseau de type "
                + vaisseauCible.type + " en utilisant l'arme " + arme + " pendant " + duree + " minutes.");

        vaisseauCible.resistanceDuBouclier = 0;
        vaisseauCible.blindage = vaisseauCible.blindage / 2;
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        VaisseauDeGuerre chasseur = new VaisseauDeGuerre();
        chasseur.type = "CHASSEUR";
        chasseur.blindage = 156;
        chasseur.resistanceDuBouclier = 2;

        VaisseauCivil vaisseauMonde = new VaisseauCivil();
        vaisseauMonde.type = "VAISSEAU-MONDE";
        vaisseauMonde.blindage = 4784;
        vaisseauMonde.resistanceDuBouclier = 30;

        vaisseauMonde.activerBouclier(); // Activation du bouclier d'un vaisseau de type VAISSEAU-MONDE
        chasseur.activerBouclier(); // Activation du bouclier d'un vaisseau de type CHASSEUR

        chasseur.attaque(vaisseauMonde, "lasers photoniques", 3);
        // Un vaisseau de type CHASSEUR attaque un vaisseau de type VAISSEAU-MONDE en utilisant l'arme lasers photoniques pendant 3 minutes.
        vaisseauMonde.desactiverBouclier();
        // Désactivation du bouclier d'un vaisseau de type VAISSEAU-MONDE

        System.out.println("La durée de protection résiduelle du bouclier du Vaisseau-Monde est de : "
        + vaisseauMonde.resistanceDuBouclier);
        System.out.println("La valeur du blindage du Vaisseau-monde est de : " + vaisseauMonde.blindage);
        // La durée de protection résiduelle du bouclier du Vaisseau-Monde est de : 0
        // La valeur du blindage du Vaisseau-monde est de : 2392

    }
}

// • le transtypage 

VoitureAMoteur voitureDeJean = new Voiture("Jaune", 3);
// voituredeJean considérée comme une VoitureAMoteur (perd les attributs spécifiques de Voiture)
// solution 1 pour indiquer explicitement que voitureDeJean est une Voiture :
Voiture voitureDeJeanEnVoiture = (Voiture) voitureDeJean;
// voitureDeJean transtypée en Voiture
voitureDeJeanEnVoiture.nbRoues; 
// solution 2 : transtypage à la volée
((Voiture) voitureDeJean).nbRoues;

// • héritage et constructeurs : le mot clé super
// les constructeurs ne sont pas hérités
// bonne pratique de faire à appel à super si on ne veut pas modifier le constructeur
// bonne pratique comme 1ère opération dans un constructeur

public class VehiculeMoteur {

    VehiculeMoteur() {
        System.out.println("Une voiture est construite sans paramètres.");
    }

    VehiculeMoteur(Moteur moteur) {
        this.moteur = moteur;
        System.out.println("Une voiture est construite avec  un moteur.");
    }
}

public class Voiture extends VehiculeMoteur {

    Voiture() { 
        super(); // fait appel au constructeur parent par défaut
        super(new Moteur()); // chaque instanciation invoque le constructeur parent
        // qui prend Moteur en paramètres
    }

    Voiture(String couleur) {
        this(); // fait appel au constructeur sans paramètres de voiture
        // qui lui fait appel au constructeur parent avec Moteur en paramètres
        this.color = couleur;
        System.out.println("Une voiture est construite avec la couleur.");
    }

    Voiture(Moteur moteur) { // ++
        super(moteur); // invoque le constructeur parent
        // qui prend en paramètre un objet Moteur
        // remplace :
        // this.moteur = moteur;
        // System.out.println("Une voiture est construite avec un moteur.");
    }
}

// • covariance des méthodes : réécriture de la méthode parente
public class UsineAssemblage {

    VehiculeMoteur assemble() {
        Moteur moteur = new Moteur();
        VehiculeMoteur vam = new VehiculeMoteur(moteur);
        return vam;
    }
}

public class UsineAssemblageVoiture extends UsineAssemblage {
    // réécriture de la méthode parente
    // redéfinit son type de retour
    Voiture assemble() {
        Voiture v = new Voiture();
        return v;
    }
}

public class HelloWorld {

    public static void main(String... args) {

        UsineAssemblage ua = new UsineAssemblage();
        VehiculeMoteur vm = ua.assemble(); // renvoie un VéhiculeMoteur

        UsineAssemblageVoiture uav = new UsineAssemblageVoiture();
        Voiture v = uav.assemble(); // a redéfinit la méthode parente pour renvoyer une Voiture
    }
}

// • l'interface : le mot clé implements
// représente les capacités données à une classe
// se finit très souvent par -able

// une classe peut implémenter plusieurs interfaces
// ex. implements Vidangeable, Amarable

// une interface peut hériter d'une autre
// ex. Amarrable extends Mobile
// une interface peut hériter de plusieurs interface
// ex. Vidangeable extends Devissable, Revissable

// interface drapeau : interface qui ne bénificie d'aucune méthode
// juste là pour indiquer une capacité

// une interface peut avoir une propriété
// qui doit être définie
// et qui ne sera jamais modifiée

// IntelliJ => new Java Class => Interface

public interface Vidangeable {
    public void vidanger();
}

public class Voiture extends VehiculeMoteur implements Vidangeable {
    // la classe implémente l'interface Vidangeable

    // rajouté grâce à la correction de l'IDE (implement methods)
    @Override
    public void vidanger() {
        System.out.println("Dévisser le bouchon sous la culasse et attendre que ça coule.");
    }
}

// autre exemple
public interface Amarrable {
    public int combienDeCordes(int vitesseVent);
}

public class Bateau implements Amarrable {
    int masse;

    @Override
    public int combienDeCordes(int vitesseVent) {
        int nbCordes = masse / 10; // 1 corde pour 10 tonnes
        nbCordes = nbCordes + vitesseVent / 100;
        return nbCordes;
    }
}

public class Montgolfiere implements Amarrable {
    int surface;

    @Override
    public int combienDeCordes(int vitesseVent) {
        int nbCordes = surface / 50; // 1 corde pour 50 mètres carré
        nbCordes = nbCordes + vitesseVent / 100;
        return nbCordes;
    }
}

public class Port {

    void accueilleEngin(Amarrable amarrable) { // l'engin qui va s'amarrer au port
        // reçoit en paramètre un objet qui est amarrable,
        // qui implemente Amarrable
        int nbCordes = amarrable.combienDeCordes(50);
        System.out.println("Le nombre de cordes nécessaires est de : " + nbCordes);
    }
}

public class HelloWorld {

    public static void main(String... args) {

        Bateau bateau = new Bateau();
        bateau.masse = 60;

        Port port = new Port();
        port.accueilleEngin(bateau); // attend un amarrable
        // Le nombre de cordes nécessaires est de : 6
    }
}

// avec les planètes

public interface Habitable {
    public Vaisseau accueillirVaisseau(Vaisseau vaisseau);
}

public class Planete {

    Planete(String nom) {
        this.nom = nom;
        nbPlanetesDecouvertes++;
    }
}

public class PlaneteGazeuse extends Planete {

    String matiere = "Gazeuse";

    PlaneteGazeuse(String nom) {
        super(nom);
    }
}

public class PlaneteTellurique extends Planete implements Habitable {

    String matiere = "Tellurique";

    PlaneteTellurique(String nom) {
        super(nom);
    }

    // méthode supprimée de la classe Planete
    public Vaisseau accueillirVaisseau(Vaisseau vaisseau) { // rajouter public

        if (this.vaisseau == null) {
            System.out.println("Aucun vaisseau ne s'en va");
        } else {
            System.out.println("Un vaisseau de type " + this.vaisseau.type + " doit s'en aller.");
        }

        this.totalVisiteurs += vaisseau.nbPassagers;

        Vaisseau vaisseauEnPartance = this.vaisseau;
        this.vaisseau = vaisseau; // replace the actual spaceship

        return vaisseauEnPartance;
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        PlaneteTellurique mars = new PlaneteTellurique("Mars");
        mars.diametre = 6792;
        PlaneteGazeuse jupiter = new PlaneteGazeuse("Jupiter");
        jupiter.diametre = 142984;

        mars.accueillirVaisseau(vaisseauMonde); // ++
        // jupiter.accueillirVaisseau(vaisseauMonde); // impossible
        mars.accueillirVaisseau(chasseur);

    }
}

// • le mot clé instanceof : savoir si l'objet hérite d'un type précis

public class Port {

    void accueilleEngin(Amarrable amarrable) {

        if (amarrable instanceof Bateau) {
            System.out.println("Il s'agit d'un bateau.");
        }

        if (!(amarrable instanceof Bateau)) {
            System.out.println("Il ne s'agit pas d'un bateau.");
        }

        if (amarrable instanceof Amarrable) {
            System.out.println("Il s'agit d'un engin amarrable.");
        }
    }
}

// avec les planètes

public class VaisseauDeGuerre extends Vaisseau {

    boolean armesDesactivees; // ++

    void attaque(Vaisseau vaisseauCible, String arme, int duree) { // ++ contraintes

        if (armesDesactivees) {
            System.out.println("Attaque impossible, l'armement est désactivé.");
        } else {
            System.out.println("Un vaisseau de type " + this.type + " attaque un vaisseau de type "
                    + vaisseauCible.type + " en utilisant l'arme " + arme + " pendant " + duree + " minutes.");

            vaisseauCible.resistanceDuBouclier = 0;
            vaisseauCible.blindage = vaisseauCible.blindage / 2;
        }
    }

    void desactiverArmes() { // ++
        armesDesactivees = true;
        System.out.println("Désactivation des armes d'un vaisseau de type " + this.type);
    }
}

public class PlaneteTellurique extends Planete implements Habitable {

    public Vaisseau accueillirVaisseau(Vaisseau vaisseau) { // ajoute contrainte

        if (vaisseau instanceof VaisseauDeGuerre) {
            // transtypage pour activer la méthode
            ((VaisseauDeGuerre) vaisseau).desactiverArmes();
        }
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        VaisseauDeGuerre chasseur = new VaisseauDeGuerre();

        mars.accueillirVaisseau(chasseur);
        // Désactivation des armes d'un vaisseau de type CHASSEUR
    }
}

// • le polymorphisme (de sous-typage)
// l'objet est traité comme une instance de la classe fille, ou la classe mère
// grâce au polymorphisme, une méthode peut accepter un objet sous la forme de son type parent
// ou de l'une de ses interfaces associées
// il est parfois + simple d'accepter en paramètres le type parent ou interface
// que de créer autant de méthodes que de types acceptables

public Vaisseau accueillirVaisseau(Vaisseau vaisseau) { // type parent en paramètres

    if (vaisseau instanceof VaisseauDeGuerre) {
        // transtypage pour activer la méthode
        ((VaisseauDeGuerre) vaisseau).desactiverArmes();
    }
}

Voiture peugeot206 = new Voiture(); // classique
VehiculeMoteur peugeot307 = new Voiture(); // objet Voiture considéré comme un VM
Vidangeable peugeot508 = new Voiture(); // objet Voiture considéré comme vidangeable
// n'est que vidangeable, n'a accès qu'à la méthode vidanger
// permet de considérer nos objets d'une autre nature que voiture

// ex. planètes

public class Vaisseau {

    void activerBouclier() {
        System.out.println("Activation du bouclier d'un vaisseau de type " + this.type);
    }
}

public class VaisseauDeGuerre extends Vaisseau {

    // Clic-droit => Generate => Override methods
    @Override
    void activerBouclier() {
        this.desactiverArmes();
        super.activerBouclier();
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        Vaisseau chasseur = new VaisseauDeGuerre();
        Vaisseau vaisseauMonde = new VaisseauCivil();

        // transtypage
        ((VaisseauDeGuerre) chasseur).attaque(vaisseauMonde, "lasers photoniques", 3);
    }
}

// • méthodes et classes abstraites
// une classe qui ne peut être instanciée. Son but : générer d'autres classes
// une classe abstraite peut hériter d'une autre classe, qui doit être abstraite

public abstract class Vehicule {
    // peut avoir des propriétés,
    // des méthodes
    // et
    // des méthodes abstraites : n'ont pas d'implementation (bloc d'instruction)
    // comme les interfaces
    abstract void klaxonner();
}

public class Voiture extends Vehicule implements Vidangeable {

    // une classe qui hérite d'une classe abstraite doit
    // implémenter ses méthodes
    @Override
    void klaxonner() {
        System.out.println("Tut tut !");
    }
}

public class Velo extends Vehicule {
    @Override
    void klaxonner() {
        System.out.println("Dring dring !");
    }
}

// ex. planètes

public abstract class Vaisseau {

    int tonnageMax; // ++
    int tonnageActuel; // ++

    // ++
    abstract int emporterCargaison(int cargaison);
}

public class VaisseauDeGuerre extends Vaisseau {

    VaisseauDeGuerre(String type) {
        this.type = type;
        if (this.type.equals("FREGATE")) {
            this.tonnageMax = 50;
        }
        else if (this.type.equals("CROISEUR")) {
            this.tonnageMax = 100;
        }
        else if (this.type.equals("CHASSEUR")) {
            this.tonnageMax = 0;
        }
    }

    // ++
    @Override
    int emporterCargaison(int cargaison) {

        if (this.type.equals("CHASSEUR") || this.nbPassagers < 12) {
            return cargaison;
        } else {
            int tonnagePassager = 2 * this.nbPassagers;
            int tonnageRestant = this.tonnageMax - this.tonnageActuel;
            int tonnageRésultat = (tonnagePassager < tonnageRestant ? tonnagePassager : tonnageRestant);

            if (cargaison > tonnageRésultat) {
                this.tonnageActuel = this.tonnageMax;
                return cargaison - tonnageRésultat;
            } else {
                this.tonnageActuel += cargaison;
                return 0;
            }
        }
    }
}

public class VaisseauCivil extends Vaisseau {

    VaisseauCivil(String type) {
        this.type = type;
        if (this.type.equals("CARGO")) {
            this.tonnageMax = 500;
        }
        else if (this.type.equals("VAISSEAU-MONDE")) {
            this.tonnageMax = 2000;
        }
    }

    @Override
    int emporterCargaison(int cargaison) {
        int tonnageRestant = this.tonnageMax - this.tonnageActuel;

        if (cargaison > tonnageRestant) {
            this.tonnageActuel = this.tonnageMax;
            return cargaison - tonnageRestant;
        } else {
            this.tonnageActuel += cargaison;
            return 0;
        }
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        VaisseauDeGuerre chasseur2 = new VaisseauDeGuerre("CHASSEUR");
        terre.accueillirVaisseau(chasseur2);
        System.out.println("Le Chasseur a rejeté " + chasseur2.emporterCargaison(20) + " tonnes.");
        // Le Chasseur a rejeté 20 tonnes.

        VaisseauDeGuerre fregate = new VaisseauDeGuerre("FREGATE");
        fregate.nbPassagers = 100;
        terre.accueillirVaisseau(fregate);
        System.out.println("La frégate a rejeté " + fregate.emporterCargaison(45) + " tonnes.");
        System.out.println("Puis la frégate a rejeté " + fregate.emporterCargaison(12) + " tonnes.");
        // La frégate a rejeté 0 tonnes.
        // Puis la frégate a rejeté 7 tonnes.

        VaisseauDeGuerre fregate2 = new VaisseauDeGuerre("FREGATE");
        fregate2.nbPassagers = 14;
        terre.accueillirVaisseau(fregate2);
        System.out.println("La frégate a rejeté " + fregate2.emporterCargaison(30) + " tonnes.");
        // La frégate a rejeté 2 tonnes.

        Vaisseau vaisseauMonde2 = new VaisseauCivil("VAISSEAU-MONDE");
        terre.accueillirVaisseau(vaisseauMonde2);
        System.out.println("Le Vaisseau-Monde a rejeté " + vaisseauMonde2.emporterCargaison(1560) + " tonnes.");
        System.out.println("Puis le Vaisseau-Monde a rejeté " + vaisseauMonde2.emporterCargaison(600) + " tonnes.");
        // Le Vaisseau-Monde a rejeté 0 tonnes.
        // Puis le Vaisseau-Monde a rejeté 160 tonnes.

    }
}


// VII) Classes et techniques utilitaires

// • La classe System
// ne peut être instanciée
// méthodes et propriétés statiques
// System.out.println(""); // out est l'une de ces propriétés (représente le terminal)
System.err.println(""); // err : flux d'écriture en erreur
System.in; // in : ce qui est entré par l'utilisateur au clavier
System.exit(0); // en paramètre : un entier, un code erreur
// 0 : OK, tout s'est bien passé, le reste : erreur (à moi de définir ce que vaut 1)
// son appel stoppe le code (comme un exit en PHP)
long time = System.currentTimeMillis(); // nb de millisecondes écoulées depuis le 01/01/1970
long nanoTimeStart = System.nanoTime(); // pour mesurer un écart de temps précisément
System.out.println("Message");
long nanoTimeEnd = System.nanoTime();
// • La classe Scanner
// scanne le texte d'un canal d'entrée (comme System.in)
// utilisation

// import java.util.Scanner; ++ à ajouter (automatiquement)

public class HelloWorld {
    
    public static void main(String... args) {

        Scanner scanner = new Scanner(System.in); // le flux à étudier

        String nextLine = scanner.nextLine(); // enregistre ce qui est tapé dans la console
        System.out.println("la ligne suivante est : " + nextLine);

        // pour les char; il faudra faire un nextLine().chartAt(0)

        int nextInt = scanner.nextInt();
        System.out.println("L'entier entré est : " + nextInt);

        boolean trueOrFalse = scanner.nextBoolean();
        System.out.println("L'utilisateur a entré : " + trueOrFalse);
    }
}

// ex. planètes

// import java.util.Scanner; ++

public class HelloUniverse {

    public static void main(String... args) {

        PlaneteTellurique mercure = new PlaneteTellurique("Mercure");
        mercure.diametre = 4880;
        // ect.

        VaisseauDeGuerre chasseur3 = new VaisseauDeGuerre("CHASSEUR");
        chasseur3.nbPassagers = 20;
        VaisseauDeGuerre fregate3 = new VaisseauDeGuerre("FREGATE");
        fregate3.nbPassagers = 35;
        VaisseauDeGuerre croiseur = new VaisseauDeGuerre("CROISEUR");
        croiseur.nbPassagers = 50;
        VaisseauCivil cargo = new VaisseauCivil("CARGO");
        cargo.nbPassagers = 100;
        VaisseauCivil vaisseauMonde3 = new VaisseauCivil("VAISSEAU-MONDE");
        vaisseauMonde3.nbPassagers = 200;

        Scanner scanner = new Scanner(System.in);
        System.out.println("Quel type de VAISSEAU souhaitez-vous manipuler ?");
        String ship = scanner.nextLine();
        System.out.println("Sur quelle planète tellurique souhaitez-vous atterrir ?");
        String planet = scanner.nextLine();
        System.out.println("Quel tonnage de cargaison souhaitez-vous embarquer ?");
        int tonnage = scanner.nextInt();

        Vaisseau vaisseau = null;
        switch (ship) {
        case "CHASSEUR":
            vaisseau = chasseur3;
            break;
        case "FREGATE":
            vaisseau = fregate3;
            break;
        case "CROISEUR":
            vaisseau = croiseur;
            break;
        case "CARGO":
            vaisseau = cargo;
            break;
        case "VAISSEAU-MONDE":
            vaisseau = vaisseauMonde3;
            break;
        }

        PlaneteTellurique planete = null;
        switch (planet) {
        case "Terre":
            planete = terre;
            break;
        case "Mercure":
            planete = mercure;
            break;
        case "Venus":
            planete = venus;
            break;
        case "Mars":
            planete = mars;
            break;
        }

        planete.accueillirVaisseau(vaisseau);
        int rejet = vaisseau.emporterCargaison(tonnage);
        System.out.println("Le rejet est de " + rejet);

    }
}

// • les classes conteneurs ou wrapper (int, bool, etc.)
Integer number = new Integer(12); // entier qui vaut 12 encapsulé dans un objet Integer
// méthode dépréciée
Integer number = 12; // nouvelle norme
// Boolean, Long, Character, Float, Double, marche de la même manière.
Float number2 = new Float(12.6f); // Float number2 = 12.6f;
Float number3 = new Float("12.6"); // déprécié
// retrouver la valeur primitive
float number4 = number2.floatValue(); // préférer float number4 = number2;
int number5 = number2.intValue();
// méthode statique pour conversion
float number6 = Float.parseFloat("12.3");
boolean trueOrNot = Boolean.parseBoolean("true");
// avantage : jouer sur les valeurs par défaut + profiter des méthodes (equals) de la classe
public class Voiture extends Vehicule implements Vidangeable {
    // int rapportCourant; // 0 par défaut
    Integer rapportCourant; // null par défaut
}
        
public class HelloWorld {
    public static void main(String... args) {
        Voiture peugeot206 = new Voiture(); // classique
        peugeot206.rapportCourant = new Integer(0); // préférer peugeot206.rapportCourant = 0;
    }
}

// ex. planètes

public class Atmosphere {
    Float tauxHydrogene;
    Float tauxMethane;
    Float tauxAzote;
    Float tauxHelium;
    Float tauxArgon;
    Float tauxDioxydeCarbone;
    Float tauxSodium;
}

public class HelloUniverse {

    public static void main(String... args) {

        Atmosphere atmosphereUranus = new Atmosphere();
        atmosphereUranus.tauxHydrogene = 83f;
        // atmosphereUranus.tauxHydrogene = new Float(83f) est déprécié grâce à l'auto-boxing
        atmosphereUranus.tauxHelium = 15f;
        atmosphereUranus.tauxMethane = 2.5f;
        atmosphereUranus.tauxAzote = 0f;
        uranus.atmosphere = atmosphereUranus;

        System.out.println("L'atmosphère de Uranus est composée de : ");
        if (uranus.atmosphere.tauxHydrogene != null) {
            System.out.println("A " + uranus.atmosphere.tauxHydrogene + "% d'hydrogène");
        }
        if (uranus.atmosphere.tauxArgon != null) {
            System.out.println("A " + uranus.atmosphere.tauxArgon + "% d'argon");
        }
        if (uranus.atmosphere.tauxDioxydeCarbone != null) {
            System.out.println("A " + uranus.atmosphere.tauxDioxydeCarbone + "% de dioxyde de carbone");
        }
        if (uranus.atmosphere.tauxAzote != null) {
            System.out.println("A " + uranus.atmosphere.tauxAzote + "% d'azote");
        }
        if (uranus.atmosphere.tauxHelium != null) {
            System.out.println("A " + uranus.atmosphere.tauxHelium + "% d'hélium");
        }
        if (uranus.atmosphere.tauxMethane != null) {
            System.out.println("A " + uranus.atmosphere.tauxMethane + "% de méthane");
        }
        if (uranus.atmosphere.tauxSodium != null) {
            System.out.println("A " + uranus.atmosphere.tauxSodium + "% de sodium");
        }
    }
}

// • l'autoboxing permet de ne pas avoir à manipuler explicitement les classes conteneurs
// la conversion s'effectue automatiquement
peugeot206.rapportCourant = 0; // rapportCourant est un objet Integer de valeur 0
// peugeot206.rapportCourant++; // l'Integer repasse en primitif (à cause du calcul)
// principe d'auto-unboxing

// • les conversions de type
int number7 = Integer.parseInt("12"); // on évoque la méthode parse... de la classe
boolean trueOrNot = Boolean.parseBoolean("true");
// inverse est vrai
String word = String.valueOf(number7); // accepte une multitude de type
// "12"
// utiliser les méthodes des conteneurs
Integer number = 12;
long numberLong = number.longValue();

// • les types énumérés
// restreindre les valeurs possibles d'une variable à une gamme prédéterminée
// Avant sur JAVA :
public class Voiture extends Vehicule implements Vidangeable {r
    // boolean automatic;
    int typeBoite; // ++
}

public class TypeBoiteVitesse {
    // remplace la propriété boolean automatic de Voiture
    // car 3 choix à présent
    static final int AUTO = 1; // final : ne peut plus être changé
    static final int SEMI_AUTO = 2; // pb on peut attribuer les mêmes valeurs à toutes
    static final int MANUELLE = 3;
}

public class HelloWorld {
    Voiture peugeot206 = new Voiture(); // classique
    peugeot206.typeBoite=TypeBoiteVitesse.SEMI_AUTO; // ++
    // rien ne m'empêche aussi d'écrire peugeot206.typeBoite= 4 (correspond à rien);
}

// avec les types énumérés
public enum TypeBoiteVitesse {
    AUTO, // 0
    SEMI_AUTO, // 1
    MANUELLE // 2
}

public class Voiture extends Vehicule implements Vidangeable {
    TypeBoiteVitesse typeBoite; // ++
}

public class HelloWorld {

    Voiture peugeot206 = new Voiture();
    peugeot206.typeBoite = TypeBoiteVitesse.SEMI_AUTO;

    switch(peugeot206.typeBoite)
    {
        case AUTO:
            System.out.println("La boite est auto");
            break;
        case SEMI_AUTO:
            System.out.println("La boite est semi-auto");
            // La boite est semi-auto
            break;
        case MANUELLE:
            System.out.println("La boite est manuelle");
            break;
    }
}

// ajouter des attributs
public enum TypeBoiteVitesse {

    AUTO("Automatique"), // AUTO(nomTypeBoite: "Automatique")
    SEMI_AUTO("Semi-automatique"), // chaque valeur s'associe au constructeur
    MANUELLE("Manuelle"); // appelle le constructeur puis valorise nomTypeBoite

    String nomTypeBoite;

    TypeBoiteVitesse(String nomTypeBoite) {
        this.nomTypeBoite = nomTypeBoite;
    }
}

public class Voiture extends Vehicule implements Vidangeable {
    TypeBoiteVitesse typeBoite;
}

public class HelloWorld {

    Voiture peugeot206 = new Voiture();
    peugeot206.typeBoite = TypeBoiteVitesse.SEMI_AUTO;
    System.out.println("Le type de ma boite est " + peugeot206.typeBoite.nomTypeBoite);
    System.out.println("La valeur de ma boite est de " + peugeot206.typeBoite.ordinal());
    // Le type de ma boite est Semi-automatique
    // La valeur de ma boite est de 1 (SEMI-AUTO vaut 1)
    TypeBoiteVitesse semiAuto = TypeBoiteVitesse.valueOf("SEMI_AUTO");
    System.out.println("La boite récupérée par le biais de la chaine de caractères est : " + 
        semiAuto.nomTypeBoite);
    // La boite récupérée par le biais de la chaine de caractères est : Semi-automatique
}

// ex. planètes

public enum TypeVaisseau {
    CHASSEUR("Chasseur"),
    FREGATE("Frégate"),
    CROISEUR("Croiseur"),
    CARGO("Cargo"),
    VAISSEAUMONDE("Vaisseau-Monde");

    String nom;

    TypeVaisseau(String nom) {
        this.nom = nom;
    }
}

public abstract class Vaisseau {
    TypeVaisseau type;

    Vaisseau(TypeVaisseau type, int blindage, int resistanceBouclier) {
        this.type = type;
        this.blindage = blindage;
        this.resistanceDuBouclier = resistanceBouclier;
    }
}

public class VaisseauDeGuerre extends Vaisseau {

    VaisseauDeGuerre(TypeVaisseau type) {
        this.type = type;
        if (type == TypeVaisseau.FREGATE) {
            this.tonnageMax = 50;
        }
        else if (type == TypeVaisseau.CROISEUR) {
            this.tonnageMax = 100;
        }
        else if (type == TypeVaisseau.CHASSEUR) {
            this.tonnageMax = 0;
        }
    }
}

public class VaisseauCivil extends Vaisseau {

    VaisseauCivil(TypeVaisseau type) {
        this.type = type;
        if (type == TypeVaisseau.CARGO) {
            this.tonnageMax = 500;
        }
        else if (type == TypeVaisseau.VAISSEAUMONDE) {
            this.tonnageMax = 2000;
        }
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        VaisseauDeGuerre chasseur3 = new VaisseauDeGuerre(TypeVaisseau.CHASSEUR);
        chasseur3.nbPassagers = 20;
        VaisseauDeGuerre fregate3 = new VaisseauDeGuerre(TypeVaisseau.FREGATE);
        fregate3.nbPassagers = 35;
        VaisseauDeGuerre croiseur = new VaisseauDeGuerre(TypeVaisseau.CROISEUR);
        croiseur.nbPassagers = 50;
        VaisseauCivil cargo = new VaisseauCivil(TypeVaisseau.CARGO);
        cargo.nbPassagers = 100;
        VaisseauCivil vaisseauMonde3 = new VaisseauCivil(TypeVaisseau.VAISSEAUMONDE);
        vaisseauMonde3.nbPassagers = 200;

        Scanner scanner = new Scanner(System.in);
        System.out.println("Quel type de VAISSEAU souhaitez-vous manipuler ?");
        String ship = scanner.nextLine();
        System.out.println("Sur quelle planète tellurique souhaitez-vous atterrir ?");
        String planet = scanner.nextLine();
        System.out.println("Quel tonnage de cargaison souhaitez-vous embarquer ?");
        int tonnage = scanner.nextInt();

        TypeVaisseau typeVaisseau = TypeVaisseau.valueOf(ship);
        Vaisseau vaisseau = null;
        switch (typeVaisseau) {
            case CHASSEUR:
                vaisseau = chasseur3;
                break;
            case FREGATE:
                vaisseau = fregate3;
                break;
            case CROISEUR:
                vaisseau = croiseur;
                break;
            case CARGO:
                vaisseau = cargo;
                break;
            case VAISSEAUMONDE:
                vaisseau = vaisseauMonde3;
                break;
        }

        PlaneteTellurique planete = null;
        switch (planet) {
        case "Terre":
            planete = terre;
            break;
        case "Mercure":
            planete = mercure;
            break;
        case "Venus":
            planete = venus;
            break;
        case "Mars":
            planete = mars;
            break;
        }

        planete.accueillirVaisseau(vaisseau);
        int rejet = vaisseau.emporterCargaison(tonnage);
        System.out.println("Le rejet est de " + rejet);

        // Quel type de VAISSEAU souhaitez-vous manipuler ?
        // FREGATE
        // Sur quelle planète tellurique souhaitez-vous atterrir ?
        // Terre
        // Quel tonnage de cargaison souhaitez-vous embarquer ?
        // 60
        // Désactivation des armes d'un vaisseau de type FREGATE
        // Un vaisseau de type VAISSEAUMONDE doit s'en aller.
        // Le rejet est de 10
    }
}


// VIII) LES TABLEAUX ET LES COLLECTIONS

int[] tableauDeInt = new int[5]; // tableau unidimensionnel de 5 espaces vides [0,0,0,0,0]
tableauDeInt[1] = 15; // valorise le deuxième élément du tableau
char[] tableauDeChar = new char[5]; // ['','','','','']
tableauDeChar.length; // longueur du tableau
Voiture[] tableauDeVoiture = new Voiture[5]; // [null, null, null, null, null]
tableauDeVoiture[1] = new Voiture("rouge");
System.out.println("La couleur de la 2ème voiture du tableau est " + tableauDeVoiture[1].couleur);

// ex. planètes

public class PlaneteTellurique extends Planete implements Habitable {

    Vaisseau[] vaisseauxAccostes; // ++

    PlaneteTellurique(String nom, int tailleBaie) {
        super(nom);
        this.vaisseauxAccostes = new Vaisseau[tailleBaie]; // ++
    }

    public void accueillirVaisseau(Vaisseau vaisseau) {

        if (vaisseau instanceof VaisseauDeGuerre) {
            // transtypage
            ((VaisseauDeGuerre) vaisseau).desactiverArmes();
        }

        for (int i = 0; i < vaisseauxAccostes.length; i++) { // ++
            if (vaisseauxAccostes[i] == null) {
                vaisseauxAccostes[i] = vaisseau;
                break; // s'arrête à la première occurence trouvée
            }
        }
    }

    boolean restePlaceDisponible() { // ++
        for (Vaisseau element : vaisseauxAccostes) { // simple loop
            if (element == null) {
                return true;
            }
        }
        return false;
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        PlaneteTellurique mercure = new PlaneteTellurique("Mercure", 1);
        mercure.diametre = 4880;
        PlaneteTellurique venus = new PlaneteTellurique("Venus", 2);
        venus.diametre = 12100;
        PlaneteTellurique terre = new PlaneteTellurique("Terre", 10);
        terre.diametre = 12756;
        PlaneteTellurique mars = new PlaneteTellurique("Mars", 3);
        mars.diametre = 6792;

        String recommencer;

        do {
            Scanner scanner = new Scanner(System.in);
            System.out.println("Quel type de VAISSEAU souhaitez-vous manipuler ?");
            String ship = scanner.nextLine();
            System.out.println("Sur quelle planète tellurique souhaitez-vous atterrir ?");
            String planet = scanner.nextLine();
            System.out.println("Quel tonnage de cargaison souhaitez-vous embarquer ?");
            int tonnage = scanner.nextInt(); // n'effectue pas de saut de ligne
            scanner.nextLine(); // permet de considérer la prochaine valeur comme une chaine de caractère
            // car effectue au préalable le saut de ligne
            TypeVaisseau typeVaisseau = TypeVaisseau.valueOf(ship);
            Vaisseau vaisseau = null;
            switch (typeVaisseau) {
            case CHASSEUR:
                vaisseau = chasseur3;
                break;
            case FREGATE:
                vaisseau = fregate3;
                break;
            case CROISEUR:
                vaisseau = croiseur;
                break;
            case CARGO:
                vaisseau = cargo;
                break;
            case VAISSEAUMONDE:
                vaisseau = vaisseauMonde3;
                break;
            }

            PlaneteTellurique planete = null;
            switch (planet) {
            case "Terre":
                planete = terre;
                break;
            case "Mercure":
                planete = mercure;
                break;
            case "Venus":
                planete = venus;
                break;
            case "Mars":
                planete = mars;
                break;
            }

            if (!planete.restePlaceDisponible()) {
                System.out.println("Le vaisseau ne peut pas se poser sur la planète par manque de place dans la baie.");
            } else {
                planete.accueillirVaisseau(vaisseau);
                int rejet = vaisseau.emporterCargaison(tonnage);
                System.out.println("Le rejet est de " + rejet);
            }

            System.out.println("Voulez-vous recommencer ?");
            recommencer = scanner.nextLine();

        } while (recommencer.equalsIgnoreCase("oui"));
    }
}


// • les ellipses ou varargs

public class Voiture extends Vehicule implements Vidangeable {

    Ville transporter(Passager passager, Ville villeDepart, Ville... villesEtapes) { // rajout d'une varargs
        // après villeDépart, il peut y avoir un nom variable de villes étapes
        // le paramètre ellipse doit être le dernier argument
        System.out.println("La voiture transporte un passager qui s'appelle "
                + passager.prenom + " " + passager.nom);
        System.out.println("Le passager est parti de la ville de " + villeDepart.nom);

        System.out.println("La première ville étape est : " + villesEtapes[0].nom); // ++
        System.out.println("Il y a " + villesEtapes.length + " ville(s) étape(s)"); // ++

        Ville villeDestination = new Ville();
        villeDestination.nom = "Wellington";

        return villeDestination;
    }
}

public class HelloWorld {
    public static void main(String... args) {

        Passager passagerL = new Passager();
        passagerL.nom = "Lalanne";
        passagerL.prenom = "Francis";
        Ville depart = new Ville();
        depart.nom = "Auckland";
        Ville etape1 = new Ville();
        etape1.nom = "Hamilton";
        Ville etape2 = new Ville();
        etape1.nom = "Taupo";
        Ville etape3 = new Ville();
        etape1.nom = "Wellington";

        peugeot206.transporter(passagerL, depart, etape1, etape2, etape3);
        // La voiture transporte un passager qui s'appelle Francis Lalanne
        // Le passager est parti de la ville de Auckland
        // La première ville étape est : Wellington
        // Il y a 3 ville(s) étape(s)
    }
}

// ex. planètes

public interface Habitable {
    public void accueillirVaisseaux(Vaisseau... vaisseaux);
}

public class PlaneteTellurique extends Planete implements Habitable {

    public void accueillirVaisseaux(Vaisseau... vaisseaux) { // ++
        
        for (Vaisseau vaisseau : vaisseaux) {

            if (vaisseau instanceof VaisseauDeGuerre) {
                // transtypage
                ((VaisseauDeGuerre) vaisseau).desactiverArmes();
            }

            for (int i = 0; i < vaisseauxAccostes.length; i++) {
                if (vaisseauxAccostes[i] == null) {
                    vaisseauxAccostes[i] = vaisseau;
                    break; // s'arrête à la première occurence trouvée
                }
            }
        }
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        VaisseauDeGuerre chasseurA = new VaisseauDeGuerre(TypeVaisseau.CHASSEUR);
        VaisseauDeGuerre chasseurB = new VaisseauDeGuerre(TypeVaisseau.CHASSEUR);
        VaisseauCivil cargoA = new VaisseauCivil(TypeVaisseau.CARGO);
        terre.accueillirVaisseaux(chasseurA, chasseurB, cargoA); // ++
    }
}

// • la méthode main : point d'entrée du programme

// public static void main(String... args) : point d'entrée
public static void main(String... args) {}
// peut se trouver dans n'importe quelle classe
// Pour donner des args à ce main => Run => Edit Configurations => Program arguments
// pour les récupérer dans le code = args[0]

// • tableau multidimensionnel (tableau de tableaux)
int[][] tableauDeuxDimensions = new int[5][3]; // 5 : colonnes, 3 : lignes
System.out.println(Arrays.deepToString(tableauDeuxDimensions));
// rendu : [[0, 0, 0], [0, 0, 12], [0, 0, 0], [0, 0, 0], [0, 0, 0]]
tableauDeuxDimensions[1][2] = 12; // valorise la 2° colonne et la 3ème ligne
// deuxième tableau, 3ème valeur
// rendu : [[0, 0, 0], [0, 0, 12], [0, 0, 0], [0, 0, 0], [0, 0, 0]]
// boucle dans le tableau multi
public static void main(String... args) {

    for (int col = 0; col < tableauDeuxDimensions.length; col++) {

        for (int lines = 0; lines < tableauDeuxDimensions[col].length; lines++) {
            System.out.println("L'élément contenu à la position " + col + "," + lines + " vaut "
                    + tableauDeuxDimensions[col][lines]);
            // L'élément contenu à la position 1,2 vaut 12
        }
    }
}


// ex. planètes
public class PlaneteTellurique extends Planete implements Habitable {

    Vaisseau[][] vaisseauxAccostes; // ++

    PlaneteTellurique(String nom, int tailleBaie) {
        super(nom);
        this.vaisseauxAccostes = new Vaisseau[2][tailleBaie]; 
        // 2 tableaux pour un nombre de vaisseaux admis identique
        // ex [[0,0,0], [0,0,0]] : 3 vaisseaux de Guerre + 3 vaisseaux civils
    }

    public void accueillirVaisseaux(Vaisseau... vaisseaux) { // ++
        
        for (int i = 0; i < vaisseaux.length; i++) { // ++

            int indexType = 0;

            switch (vaisseaux[i].type) {
                case CARGO: // pas de break, on continue
                case VAISSEAUMONDE:
                    indexType = 1;
            }

            for (int index = 0; index < vaisseauxAccostes[indexType].length; index++) {
                if (vaisseauxAccostes[indexType][index] == null) {
                    vaisseauxAccostes[indexType][index] = vaisseaux[i];
                    break;
                }
            }

            if (vaisseaux[i] instanceof VaisseauDeGuerre) { // ++
                // transtypage
                ((VaisseauDeGuerre) vaisseaux[i]).desactiverArmes();
            }
        }
    }

    boolean restePlaceDisponible(Vaisseau vaisseau) { // ++
        
        int indexType = 0;

        // if (vaisseau instanceof VaisseauDeGuerre) // autre possibilité

        switch (vaisseau.type) {
            case CARGO: // pas de break, on continue
            case VAISSEAUMONDE:
                indexType = 1;
        }

        for (int index = 0; index < vaisseauxAccostes[indexType].length; index++) {
            if (vaisseauxAccostes[indexType][index] == null) {
                return true;
            }
        }
        return false;
    }
}


public class HelloUniverse {

    public static void main(String... args) {

        if (!planete.restePlaceDisponible(vaisseau)) { // ++
            System.out.println("Le vaisseau ne peut pas se poser sur la planète par manque de place dans la baie.");
        } else {
            planete.accueillirVaisseaux(vaisseau);
            int rejet = vaisseau.emporterCargaison(tonnage);
            System.out.println("Le rejet est de " + rejet);
        }
    }
}


// • Les collections
// ensemble d'éléments sous forme d'objets
// on fait appel à une classe pour ce genre de processus
// 4 types de classe : List, Set, Map, Queue

// • List 
// collections qui peuvent contenir plusieurs fois le même élément
// List est une interface

// import java.util.ArrayList; // ++
// import java.util.List; // ++

public class HelloWorld {
    public static void main(String... args) {

        Voiture peugeot206 = new Voiture();
        peugeot206.color = "rouge";
        Voiture peugeot207 = new Voiture();
        peugeot207.color = "verte";

        List list = new ArrayList(); // bonne pratique : utiliser le type de l'interface
        // list.add(/* rajout d'un objet*/);
        list.add(peugeot206); // index 0
        list.add(3); // rajout dans la liste d'un Integer grâce à l'auto-boxing, index 1
        list.add(peugeot206); // index 2
        list.remove(peugeot206); // supprime le premier élément rencontré, i.e index 0
        // les index sont réarrangés => 3 => index 0
        Object object = list.get(0); // récupère l'objet de l'index 0
        System.out.println("L'objet a l'index 0 est : " + object);
        // L'objet a l'index 0 est : 3
        Voiture voiture = (Voiture) list.get(1); // transtypage : Object => Voiture
        System.out.println("La voiture à l'index 1 est de couleur " + voiture.color);
        // La voiture à l'index 1 est de couleur rouge

        // En général un seul type nous intérésse pour une collection
        // collection de Voitures, d'entiers, etc.
        // l'opérateur <diamant> permet de préciser ce qui est attendu dans la
        // collection
        List<Voiture> listVoiture = new ArrayList();
        listVoiture.add(peugeot206);
        listVoiture.add(peugeot207);
        listVoiture.add(peugeot206);
        Voiture voiture2 = listVoiture.get(1); // plus besoin de transtypage
        // listVoiture.get() retournera obligatoirement un objet de type Voiture
    }
}

// ex. planètes

public class HelloUniverse {

    public static void main(String... args) {

        Galaxie systemeSolaire = new Galaxie(); // ++
        systemeSolaire.nom = "Système solaire";
        systemeSolaire.planetes.add(mercure);
        systemeSolaire.planetes.add(venus);
        systemeSolaire.planetes.add(terre);
        systemeSolaire.planetes.add(mars);
        systemeSolaire.planetes.add(jupiter);
        systemeSolaire.planetes.add(saturne);
        systemeSolaire.planetes.add(uranus);
        systemeSolaire.planetes.add(neptune);

        boolean recommencer = true; // ++

        while (recommencer) {
            Scanner scanner = new Scanner(System.in);
            System.out.println("Quel type de VAISSEAU souhaitez-vous manipuler ?");
            String ship = scanner.nextLine();
            System.out.println("Sur quelle planète (tapez l'index) souhaitez-vous atterrir ?");
            int planet = scanner.nextInt(); // ++
            scanner.nextLine(); // ++
            Planete p = systemeSolaire.planetes.get(planet);
            if (p instanceof PlaneteGazeuse) { // ++
                System.out.println("La planète choisie n'est pas tellurique !");
                continue; // retourne au début
            }
            
            // ...

            PlaneteTellurique planete = (PlaneteTellurique) p; // plus besoin de switch

            if (!planete.restePlaceDisponible(vaisseau)) { // ++
                System.out.println("Le vaisseau ne peut pas se poser sur la planète par manque de place dans la baie.");
            } else {
                planete.accueillirVaisseaux(vaisseau);
                int rejet = vaisseau.emporterCargaison(tonnage);
                System.out.println("Le rejet est de " + rejet);
            }

            System.out.println("Voulez-vous recommencer ?");
            recommencer = scanner.nextLine().equalsIgnoreCase("oui"); // ++
        }
    }
}

// • Set : collections qui ne PEUVENT PAS contenir 2x le même élément
// une collection de type HashSet n'est pas ordonnée
// la position des éléments est imprévisible

// import java.util.*; // ++

public class HelloWorld {

    public static void main(String... args) {

        Set<Voiture> set = new HashSet();
        set.add(peugeot206);
        set.add(peugeot206); // sera ignoré
        System.out.println(set.size()); // 1
        Voiture exemple = (Voiture) set.toArray()[0];
        // transtypage d'objet à Voiture
        // récupère le premier élement du Set sous forme de tableau
    }
}

// • foreach : itérer sur une collection

public class HelloWorld {

    public static void main(String... args) {

        set.add(peugeot207);

        for (Voiture voitureSet : set) {
            System.out.println(voitureSet.color);
            // on ne peut pas modifier la collection pendant son parcours
            // ex. ajouter ou retirer une voiture
        }

        // autre façon de faire une boucle :
        Iterator<Voiture> it = set.iterator();
        while (it.hasNext()) {
            Voiture voitureI = it.next();
            System.out.println(voitureI.color);
        }

    }
}


// ex. planètes

// import java.util.HashSet;
/// import java.util.Set;

public class Galaxie {

    String nom;
    Set<Planete> planetes = new HashSet();

}

public class HelloUniverse {

    public static void main(String... args) {

        while (recommencer){
            Scanner scanner = new Scanner(System.in);
            System.out.println("Quel type de VAISSEAU souhaitez-vous manipuler ?");
            String ship = scanner.nextLine();

            System.out.println("Sur quelle planète souhaitez-vous atterrir ?");
            String planet = scanner.nextLine(); // ++

            Planete p = null;

            for (Planete planete : systemeSolaire.planetes) { // cherche la planete dans la collection
                if (planete.nom.equals(planet)) {
                    p = planete;
                    break; // je sors de la boucle
                }
            }
        }
    }
}

// • Map : référence chaque élément par une clé

// import java.util.*;

public class HelloWorld {
    
    public static void main(String... args) {

        Voiture peugeot206 = new Voiture();
        peugeot206.color = "rouge";
        Voiture peugeot207 = new Voiture();
        peugeot207.color = "verte";

        Map map = new HashMap();
        map.put("206", peugeot206); // put(clé, valeur)
        map.put(6, "Hello");
        // en général, les clés sont du même type, comme les valeurs

        Map<String, Voiture> map2 = new HashMap(); // Map<type clé, type valeur>
        map2.put("206", peugeot206);
        map2.put("207", peugeot207);
        Voiture peugeot = (Voiture) map.get("206"); // récupère la peugeot 206
        System.out.println("Couleur de la voiture : " + peugeot.color); // rouge
        // foreach
        for (Map.Entry<String, Voiture> entry : map2.entrySet()) { // Map.Entry contient objets clé + objet valeur
            String key = entry.getKey();
            Voiture value = entry.getValue();
            System.out.println("La peugeot " + key + " est de couleur " + value.color);
            // La peugeot 206 est de couleur rouge
            // La peugeot 207 est de couleur verte
        }

        for (String key : map2.keySet()) { // pour n'itérer que sur les clés
            // renvoie un set (car les clés sont uniques)
            System.out.println("La peugeot " + key);
            // La peugeot 206
            // La peugeot 207
        }

        for (Voiture value : map2.values()) { // pour n'itérer que sur les valeurs
            // renvoie une List, car doublons possibles
            System.out.println("La peugeot sélectionnée est de couleur " + value.color);
            // La peugeot sélectionnée est de couleur rouge
            // La peugeot sélectionnée est de couleur verte
        }
    }
}

// ex. planètes

// import java.util.HashMap;
// import java.util.Map;

public class Atmosphere {
    Map<String, Float> constituants = new HashMap();
}

// import java.util.Map;
// import java.util.Scanner;

public class HelloUniverse {
    public static void main(String... args) {
        
        new PlaneteTellurique("Mars", 3);
        mars.diametre = 6792;

        Atmosphere atmosphereMars = new Atmosphere();
        mars.atmosphere = atmosphereMars;
        mars.atmosphere.constituants.put("C02", 95f);
        mars.atmosphere.constituants.put("N2", 3f);
        mars.atmosphere.constituants.put("AR", 1.5f);
        mars.atmosphere.constituants.put("NO", 0.013f);
        System.out.println("L'atmosphère de Mars est constituée de : ");
        for (Map.Entry<String, Float> entry : mars.atmosphere.constituants.entrySet()) {
            System.out.println(entry.getValue() + "% de " + entry.getKey());
            // 95.0% de C02, ect.
        }
    }
}

// l'interface collection et ses méthodes (remove, add, toArray)
// liste des méthodes :
// https://docs.oracle.com/javase/8/docs/api/java/util/Collections.html

// import java.util.*;

public class HelloWorld {

    public static void main(String... args) {

        Map<String, Voiture> map2 = new HashMap(); // Map<type clé, type valeur>
        map2.put("206", peugeot206);
        map2.put("207", peugeot207);

        System.out.println("Le nombre d'éléments contenus dans la map est de : " + map2.size());
        System.out.println("La map est-elle vide ? " + map2.isEmpty());
        // La map est-elle vide ? false
        System.out.println("La map contient-elle la clé 207 ? " + map2.containsKey("207"));
        // La map contient-elle la clé 207 ? true
        System.out.println("La map contient-elle une peugeot 206 ? " + map2.containsValue(peugeot206));
        // La map contient-elle une peugeot 206 ? true
        map2.clear();
        System.out.println("La map est-elle vide ? " + map2.isEmpty());
        // La map est-elle vide ? true

        // la classe utilitaire Collections permet des opérations classiques sur les collections
        // par le biais de méthodes statiques

        List<String> list2 = new ArrayList();
        list2.add("one");
        list2.add("two");
        list2.add("tree");

        Collections.replaceAll(list2, "two", "four");
        // Collections.replaceAll(List, a, b)
        // remplace les éléments a d'une liste par les éléments b

        for (String string : list2) {
            System.out.println(string);
            // one
            // four
            // tree
        }

        // marche aussi avec un objet

        List list3 = new ArrayList();
        list3.add("one");
        list3.add("two");
        list3.add("tree");

        Collections.replaceAll(list3, "two", 2);
        // Collections.replaceAll(List, a, b)
        // remplace les éléments a d'une liste par les éléments b

        for (Object object3 : list3) {
            System.out.println(object3);
            // one
            // 2
            // tree
        }

    }
}

// • Trier les collections

// Une classe (String, Integer) qui a un ordre naturel implémente la classe Comparable
// pour trier, par ex, des objets Voiture => la classe Voiture doit implémenter la classe Comparable
// puis réécrire la méthode compareTo

public class Carre implements Comparable {

    long cote;

    Carre(long cote) {
        this.cote = cote;
    }

    @Override // create comparator
    public int compareTo(Object o) {
        Carre autreCarre = (Carre) o;
        if (this.cote == autreCarre.cote) { return 0; } // equal
        if (this.cote > autreCarre.cote) { return 1; } // superior
        return - 1; // inferior
    }
}

public class HelloWorld {

    public static void main(String... args) {

        List<Integer> listEntier = new ArrayList();
        listEntier.add(6);
        listEntier.add(3);
        listEntier.add(12);
        listEntier.add(50);
        listEntier.add(2);

        Collections.sort(listEntier); // sort

        for (Integer number : listEntier) {
            System.out.println(number);
            // 2
            // 3
            // 6, ect.
            // possible car les Integer (classe) disposent d'un ordre naturel
        }

        List<Carre> listCarre = new ArrayList();
        listCarre.add(new Carre(10l));
        listCarre.add(new Carre(8l));
        listCarre.add(new Carre(50l));
        listCarre.add(new Carre(2l));

        Collections.sort(listCarre);

        for (Carre carre : listCarre) {
            System.out.println(carre.cote);
            // 2
            // 8
            // 10
        }
    }
}

// si la propriété était un Long (classe qui a un ordre naturel)

public class Carre implements Comparable {
    Long cote;

    Carre(long cote) {
        this.cote = cote;
    }

    @Override
    public int compareTo(Object o) {
        Carre autreCarre = (Carre) o;
        return this.cote.compareTo(autreCarre.cote);
    }
}


// • collections ordonnées pour Set et Map

public class HelloWorld {

    public static void main(String... args) {

        Set<Carre> setCarre = new TreeSet(); // ordonne les éléments
        setCarre.add(new Carre(10l));
        setCarre.add(new Carre(8l));
        setCarre.add(new Carre(50l));
        setCarre.add(new Carre(2l));

        for (Carre carre : setCarre) {
            System.out.println(carre.cote);
            // 2
            // 8
            // 10
        }

        Map<Integer, Carre> mapCarre = new TreeMap(); // ordonne les éléments par la clé
        mapCarre.put(3, new Carre(10l));
        mapCarre.put(2, new Carre(8l));
        mapCarre.put(4, new Carre(50l));
        mapCarre.put(1, new Carre(2l));

        for (Map.Entry<Integer, Carre> carre : mapCarre.entrySet()) {
            System.out.println(carre.getKey() + " est le clé de la valeur de côté " + carre.getValue().cote);
            // 1 est le clé de la valeur de côté 2
            // 2 est le clé de la valeur de côté 8
            // 3 est le clé de la valeur de côté 10
        }

        Map<Carre, Voiture> mapCarre2 = new TreeMap(); // ordonne les éléments par la clé
        mapCarre2.put(new Carre(10l), peugeot206);
        mapCarre2.put(new Carre(8l), peugeot206);
        mapCarre2.put(new Carre(50l), peugeot207);
        mapCarre2.put(new Carre(2l), peugeot207);

        for (Map.Entry<Carre, Voiture> carre : mapCarre2.entrySet()) {
            System.out.println(carre.getKey().cote + " est le clé de la valeur Voiture de couleur "
                    + carre.getValue().color);
            // 2 est le clé de la valeur Voiture de couleur verte
            // 8 est le clé de la valeur Voiture de couleur rouge
            // 10 est le clé de la valeur Voiture de couleur rouge
        }
    }
}

// ex. planètes : ordonner les planètes par ordre de distance avec le soleil

// import java.util.Set;
// import java.util.TreeSet;

public class Galaxie {

    String nom;
    Set<Planete> planetes = new TreeSet(); // créé un set ordonné

}

public abstract class Planete implements Comparable {

    float distanceEtoile; // ++

    // ordonne les planètes par ordre de distance avec le soleil

    // Code => implement methods in IntelliJ (n'affiche pas d'erreur car classe abstraite)
    @Override
    public int compareTo(Object o) {
        Planete planete2 = (Planete) o;
        if (this.distanceEtoile == planete2.distanceEtoile) { return 0; }
        if (this.distanceEtoile > planete2.distanceEtoile) {return 1; }
        return -1;

        // plus simple :
        // Float distanceEtoileF = (Float) this.distanceEtoile;
        // return distanceEtoileF.compareTo(planete2.distanceEtoile);
    }
}

public class HelloUniverse {

    public static void main(String... args) {

        PlaneteTellurique mars = new PlaneteTellurique("Mars", 3);
        mars.diametre = 6792;
        mars.distanceEtoile = 227.9f;
        // etc.

        Galaxie systemeSolaire = new Galaxie(); // ++
        systemeSolaire.nom = "Système solaire";
        systemeSolaire.planetes.add(mercure);
        // ect.

        for (Planete planete : systemeSolaire.planetes) {
            System.out.println(planete.nom + " " + planete.distanceEtoile);
            // Mercure 57.9
            // Venus 108.2
            // Terre 149.6
            // ordonnées par distance avec le soleil
        }
    }
}


// • L'équivalence d'objets : equals() et hashCode()
// il est conseillé de redéfinir la méthode equals() d'une classe qui implémente Comparable
// car equals() se base sur la méthode compareTo()
// pour des ordres plus poussés :
// https://docs.oracle.com/javase/8/docs/api/java/util/Comparator.html

public class Carre implements Comparable {
    Long cote;

    Carre(long cote) {
        this.cote = cote;
    }

    @Override
    public int compareTo(Object o) {
        Carre autreCarre = (Carre) o;
        if (this.cote == autreCarre.cote) { return 0; } // equal
        if (this.cote > autreCarre.cote) { return 1; } // superior
        return - 1; // inferior
    }

    // Code => Override Methods dans IntelliJ
    @Override
    public boolean equals(Object obj) {
        if (!(obj instanceof Carre)) {
            return false;
        }
        Carre carre2 = (Carre) obj;
        return this.cote == carre2.cote;
    }

    // redéfinir equals() oblige à redéfinir hashCode()
    // retourne un entier unique
    // sauf si équivalents
    // appelé avec equals()

    @Override
    public int hashCode() {
        return this.cote.hashCode(); // appelé sur un type objet
        // dépendant du hashCode du côté
        // deux côtés égaux auront le même hashCode
    }
}

// import java.util.Objects;

public class Bateau implements Amarrable {

    // les méthodes equals() et hashCode()
    // ont été générées grâce à Code => Generate de IntelliJ

    int masse;

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Bateau bateau = (Bateau) o;
        return masse == bateau.masse;
    }

    @Override
    public int hashCode() {
        return Objects.hash(masse);
    }

}


// IX) ORGANISER ET GERER L'ACCES AUX CLASSES

// les répertoires se nomment packages
// New => Package => nomdupackageenminuscule ex. transport
// faire les déplacements puis Refactor puis Do Refactor
// un package dans un autre package donne transport.terrestre

package transport.terrestre; // nom du repertoire
import transport.UsineAssemblage; // nom des classes utilisées dans le fichier

// il est recommandé que toute classe possède un répertoire
// pb du "..." is not public in demonstration.Ville
package demonstration;

public class Ville {

    public String nom; // rajout du public

}

// toute classe utilisée s'importe, sauf les interfaces
// import java.util.*; importe toutes les classes utilitaires
// a éviter pour ne pas tomber sur des pbs de compatibilité (plusieurs classes du même nom)
// utiliser deux List dans le code :
List<Voiture> listVoiture = new ArrayList();
java.awt.List awList = new java.awt.List();
// niveau de package :
com // nom de domaine internet de l'entreprise propriétaire du logiciel
    udemy
        nomduprojet // com.udemy.nomduprojet // après c'est comme bon nous semble

// ex. planètes 
com
    espcacex 
            decouverte 
                enginsspatiaux
                    // files
                objetsastro
                    // files
            HelloUniverse.java // main file

// message erreur : Error:(24, 34) java: an enum switch case label must be the
// unqualified name of an enumeration constant
switch(vaisseaux[i].type) {
    case CARGO: // remplace TypeVaisseau.CARGO
    case VAISSEAUMONDE: // remplace TypeVaisseau.VAISSEAUMONDE
        indexType = 1;
}

// • l'import statique
// (à n'utiliser que si les attributs/methodes statiques sont utilisées de façon intensive)

System.out.println("Le nombre PI vaut " + Math.PI);
// pour utiliser plusieurs fois Math.PI => import static java.lang.Math.PI;
System.out.println("Le nombre PI vaut " + PI);
// import static java.lang.Math.abs;
int absMoinsDouze = abs(-12);
System.out.println(absMoinsDouze); // 12

// ex. planetes 

// import com.espacex.decouverte.enginsspatiaux.TypeVaisseau;

// import static com.espacex.decouverte.enginsspatiaux.TypeVaisseau.VAISSEAUMONDE;
// import static com.espacex.decouverte.enginsspatiaux.TypeVaisseau.CARGO;
// import static com.espacex.decouverte.enginsspatiaux.TypeVaisseau.CHASSEUR;
// import static com.espacex.decouverte.enginsspatiaux.TypeVaisseau.FREGATE;
// import static com.espacex.decouverte.enginsspatiaux.TypeVaisseau.CROISEUR;

public class HelloUniverse {

    public static void main(String... args) {

        Vaisseau chasseur = new VaisseauDeGuerre();
        chasseur.type = CHASSEUR; // avant : chasseur.type = TypeVaisseau.CHASSEUR;
        }
    }
}

// • visibilité ou modificateur d'accès 

// 4 modificateurs d'accès : public, private, protected, package
// public : accessible depuis partout (par défaut pour les méthodes/attributs interfaces)
// package : par défaut : accessible pour n'importe classe présente dans le package
// private : réduit l'accès à la classe courante
// protected : accessible à la classe courante, à toute classe dans le même package,
// toute classe héritante de la classe courante
// chaque méthode réécrite doit être plus permissive

public class VaisseauDeGuerre extends Vaisseau {

    private boolean armesDesactivees; // ++

    public void desactiverArmes() {
        armesDesactivees = true;
        System.out.println("Désactivation des armes d'un vaisseau de type " + this.type);
    }

    public void activerArmes() {
        armesDesactivees = false;
        System.out.println("Activation des armes d'un vaisseau de type " + this.type);
    }
}

// • l'encapsulation des propriétés

// utiliser la convention JavaBeans : https://fr.wikipedia.org/wiki/JavaBeans
// tout attribut private, getters & setters, constructeur publique sans paramètres
// accesseur ou getter => lire la propriété en lecture seule
// mutateur ou setter => modifier la propriété
// IntelliJ => Generate => Getter & Setter

public class Voiture extends Vehicule implements Vidangeable {

    private String color;

    public String getColor() {
        return color;
    }

    public void setColor(String color) {
        this.color = color;
    }
}


Voiture peugeot206 = new Voiture();
peugeot206.setColor("rouge"); // ++ 

// • ajout de commentaire et javadoc
// https://docs.oracle.com/javase/8/docs/technotes/tools/windows/javadoc.html
// https://docs.oracle.com/javase/8/docs/api/

/*
comment
sur plusieurs
lignes
*/

// comment sur un ligne

/**
 * comment javadoc : devant la déclaration d'une classe, méthode, attribut
 */

// Tools => Generate Javadoc pour une vue d'ensemble

// • le mot clé final : ne pourra plus être modifié
// pour une propriété final, il faut déclarer la valeur lors de la déclaration
final static int NB_ROUES = 4; // constante car ne change pas

public final class UsineAssemblage { // classe ne peut être étendue

    public final VehiculeMoteur assemble() { // méthode ne peut être réécrite
        Moteur moteur = new Moteur();
        VehiculeMoteur vam = new VehiculeMoteur(moteur);
        return vam;
    }
}

// ex. planetes : rendre le type de vaisseau immuable (il ne changera jamais)

public abstract class Vaisseau {

    public final TypeVaisseau type;

    Vaisseau(TypeVaisseau type) { // indipensable pour donner une valeur à l'attribut type
        this.type = type;
    }
}

public class VaisseauCivil extends Vaisseau {

    public VaisseauCivil(TypeVaisseau type) {

        super(type); // fait appel au constructeur parent avec le type en paramètres

        if (type == CARGO) {
            this.tonnageMax = 500;
        }
        else if (type == VAISSEAUMONDE) {
            this.tonnageMax = 2000;
        }
    }
}


// XI) SCENARIOS ALTERNANTIFS

// • La classe Exception, le mot clé throws

// 1) créer son scénario
public class Voiture extends Vehicule implements Vidangeable {

    private String immatriculation; // ++

    // mot clé throws + classes d'exceptions susceptibles d'être appelées
    // throws Exception pour un cas simple
    public void immatriculer(String numeroImmatriculation) throws CaracteresInvalidesException, 
        ImmatriculationPresenteException { // ++
        if (numeroImmatriculation.length() != 9) {
            // cas d'exception
            // il faut choisir une classe qui se rapproche du cas d'exception
            // classe générique : java.lang.Exception
            // on peut aussi créer ses exceptions
            throw new CaracteresInvalidesException(
                    "Le numéro " + numeroImmatriculation + " a un nombre de caractères invalide");
            // tout est interrompu
        }
        if (this.immatriculation != null) {
            // deuxieme exception
        }
        this.immatriculation = numeroImmatriculation;
    }
}

// 2) créer sa classe d'exception
public class CaracteresInvalidesException extends Exception{

    // Generate => constructor with message in parameters

    public CaracteresInvalidesException(String message) {
        super(message);
    }
}

// • attraper une exception avec try et catch

public class Voiture extends Vehicule implements Vidangeable {

    public void immatriculer(String numeroImmatriculation) throws CaracteresInvalidesException {
        
        if (numeroImmatriculation.length() != 9) {
            throw new CaracteresInvalidesException(
                    "Le numéro " + numeroImmatriculation + " a un nombre de caractères invalide");
        }
        
        this.immatriculation = numeroImmatriculation;
    }
}

public class CaracteresInvalidesException extends Exception{

    // Generate => constructor with message in parameters
    public CaracteresInvalidesException(String message) {
        super(message);
    }
}

public class UsineAssemblageVoiture extends UsineAssemblage {

    public Voiture assemble() {

        Voiture v = new Voiture();
        // sélectionner la partie qui pose pb => Code
        // => Surrond With try/catch
        try {
            v.immatriculer("aaa"); // partie qui peut poser pb
            System.out.println("Tout s'est bien passé");
        } catch (CaracteresInvalidesException e) {
            System.out.println("Un problème est survenu");
            // e.printStackTrace();
            e.getMessage();
        }
}

public class HelloWorld {

    public static void main(String... args) {

        UsineAssemblageVoiture uav = new UsineAssemblageVoiture();
        uav.assemble();
        // Un problème est survenu
        // com.udemy.decouvertejava.demonstration.CaracteresInvalidesException: 
        // Le numéro aaa a un nombre de caractères invalide
    }
}

// ex. planetes : création d'une exception en cas de dépassement de tonnage

public class DepassementTonnageException extends Exception {

    public int tonnageEnExces; // stoque en mémoire l'excès

    public DepassementTonnageException(int tonnageEnExces) {
        super("La cargaison ne peut être chargée car elle présente un excès de " + tonnageEnExces);
        this.tonnageEnExces = tonnageEnExces;
    }
}

public abstract class Vaisseau {

    // la méthode qui accueille l'exception
    public abstract void emporterCargaison(int cargaison) throws DepassementTonnageException;
}

public class VaisseauDeGuerre extends Vaisseau {

    @Override
    public void emporterCargaison(int cargaison) throws DepassementTonnageException {

        if (this.type.equals("CHASSEUR") || this.nbPassagers < 12) {
            throw new DepassementTonnageException(cargaison); // ++
        } else {
            // ...
            if (cargaison > tonnageRésultat) {
                int tonnageEnExces = cargaison - tonnageRésultat; // ++
                throw new DepassementTonnageException(tonnageEnExces); // ++
            } else {
                this.tonnageActuel += cargaison;
            }
        }
    }
}

public class VaisseauCivil extends Vaisseau {

    @Override
    public void emporterCargaison(int cargaison) throws DepassementTonnageException {
        int tonnageRestant = this.tonnageMax - this.tonnageActuel;

        if (cargaison > tonnageRestant) {
            this.tonnageActuel = this.tonnageMax;
            int tonnageEnExces = cargaison - tonnageRestant; // ++
            throw new DepassementTonnageException(tonnageEnExces); // ++
        } else {
            this.tonnageActuel += cargaison;
        }
    }
}

public class HelloUniverse {

    public static void main(String... args) {

            if (!planete.restePlaceDisponible(vaisseau)) { // ++
                System.out.println("Le vaisseau ne peut pas se poser sur la planète par manque de place dans la baie.");
            } else {
                planete.accueillirVaisseaux(vaisseau);
                try {
                    vaisseau.emporterCargaison(tonnage); // erreur : on l'entoure d'un try/catch
                } catch (DepassementTonnageException depassement) {
                    System.out.println("Le vaisseau a rejeté " + depassement.tonnageEnExces + " tonnes");
                    System.out.println("Voulez-vous emporter un tonnage partiel à hauteur de "
                            + (tonnage - depassement.tonnageEnExces) + " (oui/non) ?");
                    String depassementPartiel = scanner.nextLine();
                    if (depassementPartiel.equals("oui")) {
                        try {
                            vaisseau.emporterCargaison(tonnage - depassement.tonnageEnExces);
                            // erreur : on l'entoure d'un nouveau try/catch
                        } catch (DepassementTonnageException e) {
                            System.out.println("Erreur inattendue lors de l'import de cargaison");
                        }
                    } else {
                        System.out.println("Opération annulée.");
                    }
                }
            }

            System.out.println("Voulez-vous recommencer ?");
            recommencer = scanner.nextLine().equalsIgnoreCase("oui"); // ++
        }
    }
}

// • le mot clé finally : toujours exécuté qu'une exception soit rejetée ou non

try {
    // exécute ce code si tout va bien
} catch (Exception e) {
    // exécute ce code si erreur
} finally {
    // exécute ce code dans tous les cas
    // même s'il y a un return plus haut
}

// • cas des exceptions multiples

public class Voiture extends Vehicule implements Vidangeable {

    public void immatriculer(String numeroImmatriculation) throws CaracteresInvalidesException,
            ImmatriculationPresenteException { // ++
        if (numeroImmatriculation.length() != 9) {
            throw new CaracteresInvalidesException("Le numéro " + numeroImmatriculation +
                    " a un nombre de caractères invalide");
        }
        if (this.immatriculation != null) {
            // deuxieme exception
            throw new ImmatriculationPresenteException("La voiture est déjà immatriculée : " + this.immatriculation);
        }
        this.immatriculation = numeroImmatriculation;
    }
}

public class UsineAssemblageVoiture extends UsineAssemblage {
    
    public Voiture assemble() {

        Voiture v = new Voiture();

        try {
            v.immatriculer("AAA111AAA");
            v.immatriculer("AAA111BBB"); // immatriculation déjà présente
            System.out.println("Tout s'est bien passé");
        } catch (CaracteresInvalidesException e) {
            System.out.println("Un problème est survenu");
            e.printStackTrace();
            System.out.println(e.getMessage());
        } catch (ImmatriculationPresenteException i) {
            System.out.println(i.getMessage());
        }
        finally {
            System.out.println("Ce message s'affiche dans tous les cas");
        }

        return v;
    }

}

public class HelloWorld {

    UsineAssemblageVoiture uav = new UsineAssemblageVoiture();
    uav.assemble();
    // La voiture est déjà immatriculée : AAA111AAA
    // Ce message s'affiche dans tous les cas
}

// 2ème solution
try {
    v.immatriculer("AAA111AAA");
    v.immatriculer("AAA111BBB");
    System.out.println("Tout s'est bien passé");
} catch (UneAutreException e) { // ++
    System.out.println("Une autre exception");
} catch (Exception i) { // ++
    System.out.println(i.getMessage());
    // Exception pour les 2 exceptions qui agissent de la même manière
}
finally {
    System.out.println("Ce message s'affiche dans tous les cas");
}

// 3ème solution, la plus intelligente : chainer les exceptions
try {
    v.immatriculer("AAA111AAA");
    v.immatriculer("AAA111BBB");
    System.out.println("Tout s'est bien passé");
} catch (CaracteresInvalidesException | ImmatriculationPresenteException i) { // ++
    System.out.println(i.getMessage());
}
finally {
    System.out.println("Ce message s'affiche dans tous les cas");
}


