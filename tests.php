<?php

// THE MOUNTAINS
/**
 * The while loop represents the game.
 * Each iteration represents a turn of the game
 * where you are given inputs (the heights of the mountains)
 * and where you have to print an output (the index of the mountain to fire on)
 * The inputs you are given are automatically updated according to your last actions.
 **/

// game loop
while (TRUE)
{
    $arrayMountain = [];
    
    for ($i = 0; $i < 8; $i++)
    {
        fscanf(STDIN, "%d",
            $mountainH // represents the height of one mountain.
        );
        
        $arrayMountain[$i] = $mountainH;
        // add key and value to array
    }

    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug (equivalent to var_dump): error_log(var_export($var, true));
    
    $topMountain = array_search(max($arrayMountain),$arrayMountain);
    // find highest value in array and key associated

    echo("$topMountain\n"); // The index of the mountain to fire on.
}

// THOR AND THE COORDINATES
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 * ---
 * Hint: You can use the debug stream to print initialTX and initialTY, if Thor seems not follow your orders.
 **/

fscanf(STDIN, "%d %d %d %d",
    $lightX, // the X position of the light of power
    $lightY, // the Y position of the light of power
    $initialTx, // Thor's starting X position
    $initialTy // Thor's starting Y position
);

// game loop
while (TRUE)
{
    fscanf(STDIN, "%d",
        $remainingTurns // The remaining amount of turns Thor can move. Do not remove this line.
    );
    
    $directionY; // horizontal direction
    $directionX; // vertical direction
    
    for ($i = 0; $i <= $remainingTurns; $i++) {
            
        if ($lightY < $initialTy) {
            $directionY = "N";
            $initialTy--; // change Y coordinates
        } elseif ($lightY > $initialTy) {
            $directionY = "S";
            $initialTy++; // change Y coordinates
        } elseif ($initialTy >= 17 || $lightY == $initialTy) {
            $directionY = "";
        }
        
        if ($lightX > $initialTx) {
            $directionX = "E";
            $initialTx++; // change X coordinates
        } elseif ($lightX < $initialTx) {
            $directionX = "W";
            $initialTx--; // change X coordinates
        } elseif ($lightX == $initialTx || $initialTx >= 39) {
            $directionX = "";
        }
    
        // Write an action using echo(). DON'T FORGET THE TRAILING \n
        // To debug (equivalent to var_dump): error_log(var_export($var, true));
    
        // A single line providing the move to be made: N NE E SE S SW W or NW
        echo($directionY . $directionX . "\n");
    }
}

/**
 * Duplicate Encoder
 * 
 * @description Converts a string to a new string where each character in 
 *              the new string is "(" if that character appears only once 
 *              in the original string, or ")" if that character appears 
 *              more than once in the original string.
 */

function duplicate_encode($word)
{
    
  $convertedWord = ""; 
  
  $arrayWord = str_split(strtolower($word)); // word converted to lower array
    
  foreach ($arrayWord as $key1 => $value1) { // first loop on array
      
    $letter = "("; // by default, the letter is unique
      
    foreach ($arrayWord as $key2 => $value2) { // second loop, check all letters
      
      if ($value1 == $value2 && $key1 !== $key2) {
          $letter = ")"; // the letter is not unique
      }
      
    }
    
    $convertedWord .= $letter; // add each letter to the converted word
  }
  
  return $convertedWord;
}

/**
 * Highest and Lowest
 * 
 * @description You are given a string of space separated numbers, 
 *              and have to return the highest and lowest number
 */

class MyTestCases extends TestCase
{
    public function testSampleTests()
    {
        $this->assertEquals("42 -9", highAndLow("8 3 -5 42 -1 0 0 -9 4 7 4 -4"));
    }
}

function highAndLow($numbers)
{
  $arrayNumbers = explode(" ", $numbers); // create array without spaces
  $maxAndMin = ""; // result to return (ex. "42 -9")
  $maxAndMin .= max($arrayNumbers) . " "; // add max of array to result
  $maxAndMin .= min($arrayNumbers); // add min of array to result
  return $maxAndMin;
}

// variante plus courte
function highAndLow($numbers)
{
    $a = explode(' ', $numbers);
    return max($a) . " " . min($a);
}


/**
 * Roman Numerals Encoder
 * 
 * @description Create a function taking a positive integer as its parameter 
 *              and returning a string containing the Roman Numeral
 *              representation of that integer.
 */
class MyTestCases extends TestCase
{
    public function test_static_operations()
    {
        $this->assertEquals("M", solution(1000));
        $this->assertEquals("IV", solution(4));
        $this->assertEquals("I", solution(1));
        $this->assertEquals("MCMXC", solution(1990));
        $this->assertEquals("MMVIII", solution(2008));
    }
}

function solution($number)
{
    $decimal = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];
    $roman = ["M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"];

    $result = "";

    foreach ($decimal as $key => $value) { // compare number with each decimal (value)

        while ($number % $value < $number) { // while $value <= $number
            $result .= $roman[$key];
            $number -= $value;
        }
    }

    return $result;
}


/**
 * Discount on highest price
 * 
 * @description Apply a discount on highest price of products 
 *              and return the total price with discount
 */

$array = array(9, 8, 6, -4, 12, 33, 20, 7); // exemple
$discount = 20;

sort($array);

echo $totalPrice = array_sum($array); // 91 (total price of products)

$highestNumber = $array[count($array) - 1]; // last value of array

$highestNumberDiscount = $highestNumber - ($highestNumber * $discount / 100);

$array[count($array) - 1] = (int) $highestNumberDiscount; // new value (integer)

$totalPriceDiscount = array_sum($array);

echo $totalPriceDiscount; // 84 (new total price after discount)


/**
 * Highest Scoring Word
 * 
 * @description Given a string of words, you need to find the highest scoring word 
 *              Each letter of a word scores points according to its position 
 *              in the alphabet: a = 1, b = 2, c = 3 etc.
 *              You need to return the highest scoring word as a string.
 *              If two words score the same, return the word that appears earliest in the original string
 */

class MyTestCases extends TestCase
{
    public function testSampleTests()
    {
        $this->assertEquals('taxi', high('man i need a taxi up to ubud'));
        $this->assertEquals('volcano', high('what time are we climbing up the volcano'));
        $this->assertEquals('semynak', high('take me to semynak'));
    }
}

function high($x)
{
    $words = explode(" ", $x); // each word in array ['man', 'i', 'need', ...]
    $alphabet = range('a', 'z'); // ['a', 'b', 'c', ... , 'z']
    $highestCount = 0;

    foreach ($words as $key => $value) {

        $wordCount = 0;
        $letters = str_split($value); // word become array of letters

        foreach ($letters as $key2 => $value2) {

            $letterCount = (array_search($value2, $alphabet) + 1); // array begin to 0
            $wordCount += $letterCount;
        }

        if ($wordCount > $highestCount) {

            $highestWord = $value;
            $highestCount = $wordCount;

        } else if ($wordCount == $highestCount) { // if two words score the same

            $highestCount = $highestCount; // priority to the word that appears earliest

        }
    }

    return $highestWord;
}



/**
 * Sum of numbers from 0 to N
 * 
 * @description We want to generate a function that computes the series starting from 0 
 *              and ending until the given number following the sequence:
 *              0 1 3 6 10 15 21 28 36 45 55 ....
*               Input: 6
*               Output: "0+1+2+3+4+5+6 = 21"
*               Input: -15
*               Output: "-15<0"
*               Input: 0
*               Output: "0=0"
*/

class BrokenGreetingsTestCases extends TestCase
{
    public function testShowSequence()
    {
        $sum = new SequenceSum();

        $this->assertEquals("0+1+2+3+4+5+6 = 21", $sum->showSequence(6));
        $this->assertEquals("0=0", $sum->showSequence(0));
        $this->assertEquals("-15<0", $sum->showSequence(-15));
    }
}

class SequenceSum
{
    public function showSequence($count)
    {

        $answer = $count; // ex. -15
        $equal = "<"; // -15<
        $sum = 0; // -15<0 (message by default for negative numbers)

        for ($i = 0; $i <= $count; $i++) { // if count = 0

            $equal = "=";
            $answer = "0";

            while ($i > 0 && $i <= $count) { // if count > 0
                $answer .= "+" . $i;
                $sum += $i;
                $equal = " = ";
                $i++;
            }
        }

        return $answer .= $equal . $sum;
    }
}

// bonne astuce :
class SequenceSum
{
    public function showSequence($count)
    {
        if ($count == 0) {
            return "0=0";
        }
        if ($count < 0) {
            return "$count<0";
        }
        $r = range(0, $count);
        return implode("+", $r) . " = " . array_sum($r);
    }
}

/**
 * Two to One
 * 
 * @description Take 2 strings s1 and s2 including only letters from a to z. 
 *              Return a new sorted string, the longest possible, containing distinct letters
 *              a = "xyaabbbccccdefww"
 *              b = "xxxxyyyyabklmopq"
 *              longest(a, b) -> "abcdefklmopqwxy"
 */

class LongestTestCases extends TestCase
{
    private function revTest($actual, $expected)
    {
        $this->assertEquals($expected, $actual);
    }
    public function testBasics()
    {
        $this->revTest(longest("aretheyhere", "yestheyarehere"), "aehrsty");
        $this->revTest(longest("loopingisfunbutdangerous", "lessdangerousthancoding"), "abcdefghilnoprstu");
        $this->revTest(longest("inmanylanguages", "theresapairoffunctions"), "acefghilmnoprstuy");
        $this->revTest(longest("lordsofthefallen", "gamekult"), "adefghklmnorstu");
    }
}

function longest($a, $b)
{
    $array = str_split($a . $b); // a+b in array
    sort($array); // [a, a, b, b, b, c, ...]
    return implode("", array_unique($array)); // "a, b, c,..."
}


/**
 * Fix string case
 * 
 * @description you will be given a string 
 *              that may have mixed uppercase and lowercase letters 
 *              and your task is to convert that string to either lowercase 
 *              only or uppercase only based on :
 *              • make as few changes as possible
 *              • if the string contains equal number of uppercase and lowercase letters, 
 *              convert the string to lowercase
 */

class MyTestCases extends TestCase
{
    public function testSampleTests()
    {
        $this->assertEquals("code", solve("code"));
        $this->assertEquals("CODE", solve("CODe"));
        $this->assertEquals("code", solve("COde"));
        $this->assertEquals("code", solve("Code"));
    }
}

function solve($s)
{
    $array = str_split($s);
    $lowerLetters = 0;
    $count = count($array); // number of values in array

    foreach ($array as $value) {
        if (ctype_lower($value)) {
            $lowerLetters++;
        }
    }

    if ($lowerLetters >= ($count / 2)) {
        return strtolower($s);
    } else {
        return strtoupper($s);
    }
}

// aussi :
function solve($s)
{
    $upper = preg_match_all("/[A-Z]/", $s);
    $lower = preg_match_all("/[a-z]/", $s);
    return ($upper > $lower) ? strtoupper($s) : strtolower($s);
}


/**
 * Statistics for an Athletic Association
 * 
 * @description Each time you get a string of all race results of every team who has run. 
 *              For example here is a string showing the individual results of a team of 5 runners:
 *              "01|15|59, 1|47|6, 01|17|20, 1|32|34, 2|3|17" 
 *              To compare the results of the teams you are asked for giving three statistics; 
 *              range (difference between the lowest and highest values), 
 *              average (all of the numbers divided the sum by the total count of numbers)
 *              and median (number separating the higher half of a data sample from the lower half).
 *              If there is an even number of observations, then there is no single middle value; 
 *              the median is then defined to be the mean of the two middle values 
 *              (the median of {3, 5, 6, 9} is (5 + 6) / 2 = 5.5).
 *              For the example given above, the string result will be
 *              "Range: 00|47|18 Average: 01|35|15 Median: 01|32|34"
 */

class StatAssocTestCases extends TestCase
{
    private function dotest($actual, $expected)
    {
        $this->assertEquals($expected, $actual);
    }
    public function testrankBasics()
    {
        $this->dotest(
            statAssoc("01|15|59, 1|47|16, 01|17|20, 1|32|34, 2|17|17"),
            "Range: 01|01|18 Average: 01|38|05 Median: 01|32|34"
        );
        $this->dotest(
            statAssoc("02|15|59, 2|47|16, 02|17|20, 2|32|34, 2|17|17, 2|22|00, 2|31|41"),
            "Range: 00|31|17 Average: 02|26|18 Median: 02|22|00"
        );
    }
}

function statAssoc($strg)
{

    if (empty($strg)) {
        return '';
    }

    $i = $max = $median = $sum = 0;
    $min = 24 * 60 * 60; // min chrono is set to 24 hours

    $arrayResults = explode(",", $strg); // array with each chrono
    $arrayDetailedResults = []; // array with arrays of h, m, s

    foreach ($arrayResults as $result) { // chrono is ex. " 01|15|59"

        $arrayDetailedResults[] = explode("|", str_replace(" ", "", $result));

        $timeSeconds = (int) ($arrayDetailedResults[$i][0] * 60 * 60)
            + (int) ($arrayDetailedResults[$i][1] * 60)
            + (int) $arrayDetailedResults[$i][2];

        if ($timeSeconds > $max) {
            $max = $timeSeconds;
        }
        if ($timeSeconds < $min) {
            $min = $timeSeconds;
        }

        $i++;
        $sum += $timeSeconds;
    }

    sort($arrayDetailedResults);

    if (count($arrayDetailedResults) % 2 > 0) { // if the number of chronos is odd
        $median = (int) ($arrayDetailedResults[ceil(count($arrayDetailedResults)) / 2][0] * 60 * 60)
            + (int) ($arrayDetailedResults[ceil(count($arrayDetailedResults)) / 2][1] * 60)
            + (int) $arrayDetailedResults[ceil(count($arrayDetailedResults)) / 2][2];
    } else {
        $median1 = (int) ($arrayDetailedResults[(count($arrayDetailedResults) / 2) - 1][0] * 60 * 60)
            + (int) ($arrayDetailedResults[(count($arrayDetailedResults) / 2) - 1][1] * 60)
            + (int) $arrayDetailedResults[(count($arrayDetailedResults) / 2) - 1][2];
        $median2 = (int) ($arrayDetailedResults[(count($arrayDetailedResults) / 2)][0] * 60 * 60)
            + (int) ($arrayDetailedResults[(count($arrayDetailedResults) / 2)][1] * 60)
            + (int) $arrayDetailedResults[(count($arrayDetailedResults) / 2)][2];
        $median = ($median1 + $median2) / 2;
    }

    return "Range: " . gmdate("H|i|s", ($max - $min)) .
        " Average: " . gmdate("H|i|s", ($sum / count($arrayResults))) .
        " Median: " . gmdate("H|i|s", $median);
}

/**
 * Row Weights
 * 
 * @description Several people are standing in a row divided into two teams.
 *              The first person goes into team 1, the second goes into team 2, the third goes into team 1, 
 *              and so on.. 
 *              rowWeights([50, 60, 70, 80])  ==>  return (120, 140)
 *              Explanation:
 *              The first element 120 is the total weight of team 1, 
 *              and the second element 140 is the total weight of team 2.
 *              rowWeights([80])  ==>  return (80, 0)
 *              Explanation:
 *              The first element 80 is the total weight of team 1, 
 *              and the second element 0 is the total weight of team 2.
 */

class MyTestCases extends TestCase
{
    public function testFixedTests()
    {
        $this->assertEquals([80, 0], rowWeights([80]));
        $this->assertEquals([100, 50], rowWeights([100, 50]));
        $this->assertEquals([120, 140], rowWeights([50, 60, 70, 80]));
        $this->assertEquals([62, 27], rowWeights([13, 27, 49]));
        $this->assertEquals([236, 92], rowWeights([70, 58, 75, 34, 91]));
        $this->assertEquals([211, 164], rowWeights([29, 83, 67, 53, 19, 28, 96]));
        $this->assertEquals([0, 0], rowWeights([0]));
        $this->assertEquals([150, 151], rowWeights([100, 51, 50, 100]));
        $this->assertEquals([207, 235], rowWeights([39, 84, 74, 18, 59, 72, 35, 61]));
        $this->assertEquals([0, 1], rowWeights([0, 1, 0]));
    }
}

function rowWeights($arr)
{
    $team1 = $team2 = 0;

    foreach ($arr as $key => $value) {
        if ($key % 2 == 0) {
            $team1 += (int) $value;
        } else {
            $team2 += (int) $value;
        }
    }

    $arrayFinal = [];
    $arrayFinal[] = $team1;
    $arrayFinal[] = $team2;

    return $arrayFinal;
}


/* ---------- FIND THE TWIN ---------- */
// two words, find if they are twins (same letters in the first name)

function is_twin($a, $b)
{
    $arrayA = str_split(strtolower($a)); // strtolower pour que les lettres se placent dans l'ordre
    sort($arrayA);
    $wordA = implode($arrayA);

    $arrayB = str_split(strtolower($b)); // sinon, les MAJUSCULES sont placées au début
    sort($arrayB);
    $wordB = implode($arrayB);

    if ($wordA == $wordB) {
        return true;
    }

    return false;
}

var_dump((is_twin("Hello", "world"))); // false
var_dump((is_twin("abc", "bca"))); // true
var_dump((is_twin("Lookout", "Outlook"))); // true
