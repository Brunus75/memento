// Calculate the amount of gallons needed to travel to the nearest pump
// mpg : mile per gallon

public class Kata {
    public static boolean zeroFuel(double distanceToPump, double mpg, double fuelLeft) {
        return distanceToPump <= mpg * fuelLeft;
    }
}