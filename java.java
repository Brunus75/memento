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
