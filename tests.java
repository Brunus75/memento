// Calculate the amount of gallons needed to travel to the nearest pump
// mpg : mile per gallon

public class Kata {
    public static boolean zeroFuel(double distanceToPump, double mpg, double fuelLeft) {
        return distanceToPump <= mpg * fuelLeft;
    }
}

// calculer la moyenne de 3 notes et leur attribuer la lettre correspondante
public class GrassHopper {

    public static char getGrade(int s1, int s2, int s3) {
        int sum = s1 + s2 + s3;
        int mean = sum / 3;
        char grade = 'F';

        if (mean >= 90 && mean <= 100) {
            grade = 'A';
        } else if (mean >= 80 && mean < 90) {
            grade = 'B';
        } else if (mean >= 70 && mean < 80) {
            grade = 'C';
        } else if (mean >= 60 && mean < 70) {
            grade = 'D';
        }
        return grade;
    }
}

// autre solution
public class GrassHopper {

    public static char getGrade(int s1, int s2, int s3) {
        int mean = (s1 + s2 + s3) / 3;
        if (mean >= 90)
            return 'A';
        if (mean >= 80)
            return 'B';
        if (mean >= 70)
            return 'C';
        if (mean >= 60)
            return 'D';
        return 'F';
    }
}

// un tableau de nombre, retourner la somme des valeurs au carré
// for [1, 2, 2] it should return 9 because 1^2 + 2^2 + 2^2 = 9
public class Kata {

    public static int squareSum(int[] n) {
        int sum = 0;
        for (int i = 0; i < n.length; i++) {
            sum += (n[i] * n[i]);
        }
        return sum;
    }

}

// solution populaire
// import java.util.Arrays;

public class Kata {
    public static int squareSum(int[] xs) {
        return Arrays.stream(xs).map(x -> x * x).sum();
    }
}


// un String avec des mots contenant un chiffre
// réécrire le String avec les mots apparaissant dans l'ordre des chiffres
// "is2 Thi1s T4est 3a" --> "Thi1s is2 3a T4est"
// "4of Fo1r pe6ople g3ood th5e the2" --> "Fo1r the2 g3ood 4of th5e pe6ople"
// "" --> ""
public class Order {
    public static String order(String words) {

        if (words == "") {
            return "";
        }

        String[] arrayWords = words.split(" ");
        String[] arrayWordsSorted = new String[arrayWords.length]; // create array of N elements

        for (String value : arrayWords) {

            String number = value.replaceAll("\\D+", ""); // remove non-digits
            int index = Integer.parseInt(number); // index in word

            arrayWordsSorted[index - 1] = value; // - 1 'cause first index in words start to 1
        }

        return String.join(" ", arrayWordsSorted); // array join
    }
}

