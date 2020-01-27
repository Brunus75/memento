/* ---------- SMALLEST INTEGER ---------- */
// Given an array of integers your solution should find the smallest integer. 
class SmallestIntegerFinder {
  findSmallestInt(args) {
    let arrayNumbers = args;
    return Math.min(...arrayNumbers); // return min value of array
  }
}

/* ---------- FIND EVEN INDEX ---------- */
// You are going to be given an array of integers. ex. [1,2,3,4,3,2,1]
// Your job is to take that array and find an index N where the sum of the integers 
// to the left of N is equal to the sum of the integers to the right of N. 
// If there is no index that would make this happen, return -1

function findEvenIndex(arr) {
    let iterator = arr.keys(); // return object with the keys of every value
    // same value had previously the same key (1 and 1 had the same key)
    let index = -1; // return this by default
    let sumLeft = 0;
    let sumRight = arr.reduce((a, b) => a + b, 0); // calculate the sum of array

    for (let key of iterator) {
        sumRight -= arr[key]; // focus on this value to compare both sides
        // the value can't be on either side

        if (sumLeft == sumRight) {
            index = key; // array.indexOf(array[key]);
        }

        sumLeft += arr[key]; // we go to the next value, 
        // so the actual is added to the left side
    }
    return index;
}

/* ---------- Disemvowel Trolls ---------- */
// Your task is to write a function that takes a string 
// and return a new string with all vowels removed.
// "This website is for losers LOL!" would become "Ths wbst s fr lsrs LL!".

function disemvowel(str) {

  let result = [];

  let array = [...str]; // str to [a, r, r, a, y]

  // loop on each letter of the array
  for (let i = 0; i < array.length; i++) {

    if (array[i].toLowerCase() == "a" || array[i].toLowerCase() == "e" ||
      array[i].toLowerCase() == "i" || array[i].toLowerCase() == "o" ||
      array[i].toLowerCase() == "u") {

      array[i] = "";
    }

    result.push(array[i]); // add each letter to the new array
  }
  return result.join(''); // [a, r, r, a, y] to 'String'
}

// best solution :
function disemvowel(str) {
  return str.replace(/[aeiou]/gi, '');
}
// g tells to find all matches, not just the first.
// i tells to be case insensitive.
// What goes inside the // is the pattern.
// [] tells to match any character in a set.
// aeiou are the characters in the set.


/* ---------- FIND NUMBER CLOSEST TO ZERO ---------- */
// one array => find the closest number to zero
// if two numbers are close (2 et -2) return the positive one

let array = [-18, 7, 24, 2, -3, -7, -2, 6, 3];

function findValueCloseToZero(array) {

  array.sort(function (a, b) { return a - b }); // sort array

  let gap; // gap between number and zero
  let closestNumber = array[0]; // 1st number of array by default

  if (array[0] > 0) { // if 1st number = postive
    gap = array[0];
  } else { // if 1rst number = negative
    gap = array[0] * - 1;
  }

  for (let i = 0; i < array.length; i++) { // loop on array

    if ((array[i] > 0) && (array[i] < gap)) {
      closestNumber = array[i];
      gap = array[i];
    } else if ((array[i] < 0) && ((array[i] * - 1) < gap)) {
      closestNumber = array[i];
      gap = array[i] * - 1;
    }
  }

  return Math.abs(closestNumber); // return absolute number
}

console.log(findValueCloseToZero(array));


/* ---------- FIND LOWER INTERVAL BETWEEN NUMBERS ---------- */
// one array => find the lower interval between numbers

let array = [-18, 7, 24, 2, -3, -7, -2, 6, 3];

function findLowerInterval(array) {

  array.sort(function (a, b) { return a - b }); // sort array

  let interval;
  let firstNumber = array[0]; // 1st number of array by default
  let secondNumber = array[1];

  if (array[1] < 0) { // negative numbers
    interval = Math.abs(array[0]) - Math.abs(array[1]);
  } else if (array[0] < 0 && array[1] > 0) { // negative and positive numbers
    interval = Math.abs(array[0]) + array[1];
  } else if (array[0] > 0) { // postive numbers
    interval = array[1] - array[0];
  }

  for (let i = 0; i < array.length; i++) { // loop on array

    if ((array[i + 1] < 0) && (Math.abs(array[i]) - Math.abs(array[i + 1]) < interval)) { // negative numbers
      firstNumber = array[i];
      secondNumber = array[i + 1];
      interval = Math.abs(array[i]) - Math.abs(array[i + 1]);
    } else if (array[i] < 0 && array[i + 1] > 0 && Math.abs(array[i]) + array[i + 1] < interval) { // negative and postive numbers
      firstNumber = array[i];
      secondNumber = array[i + 1];
      interval = Math.abs(array[i]) + array[i + 1];
    } else if ((array[i] > 0) && (array[i + 1] - array[i]) < interval) { // positive numbers
      firstNumber = array[i];
      secondNumber = array[i + 1]
      interval = array[i + 1] - array[i];
    }
  }

  return "Le nombre " + firstNumber + " a un intervalle de " + interval + " avec le nombre " + secondNumber;
}

console.log(findLowerInterval(array));
// 'Le nombre -3 a un intervalle de 1 avec le nombre -2'


/* ---------- Descending Order ---------- */
// Your task is to make a function that can take any non-negative integer 
// as a argument and return it with its digits in descending order
// Input: 1254859723 Output: 9875543221

function descendingOrder(n) {
  let array = Array.from(String(n), Number); // number to array of n,u,m,b,e,r
  array.sort().reverse(); // 987654321, .sort() then .reverse()
  return Number(array.join('')); // array to number
}

// meilleure solution :
function descendingOrder(n) {
  return parseInt(String(n).split('').sort().reverse().join(''))
}


/* ---------- FIND SUM OF VALUES IN ARRAY BETWEEN TWO INDEX ---------- */
// one array, number1, number2 (> number1) => find the sum of values between numbers

function sumIndexs(array, n1, n2) {
  let sum = 0; 
  for (i = n1; i <= n2; i++) { // for strict values (in interval), i = (n1 + 1); n < 2
    sum += array[i];
  } 
  return sum;
}
console.log(sumIndexs([1, 2, 3, 4, 5], 0, 3)); // 10


/* ---------- COUNT PAIRS OF PLAYERS ---------- */
// one number of players (ex. 4) => find all the possible duo (ex.6)
// with A, B, C, D (4) we can get 6 pairs : AB, AC, AD + BC, BD + CD (6)

function count(n) {
  
  let pairs = 0; // number of pairs

  for (let i = 1; i <= n; i++) { // first player, ex. A, then B, ect.

    let j = i++; // second player, ex. B, then C, ect.
    
    for (j; j <= n; j++) { // what comes next the first player, ex. B, C, D, then C, D, ect.
      pairs++;
    }
  }
  return pairs;
}

console.log(count(4)); // 6
console.log(count(20000));


/* ---------- REPLACE A STRING ---------- */
// change string : replace capitals and punctuation (by lowercase et nothing)
Test.describe("Example tests", _ => {
  Test.assertEquals(borrow('WhAt! FiCK! DaMn CAke?'), 'whatfickdamncake');
  Test.assertEquals(borrow('THE big PeOpLE Here!!'), 'thebigpeoplehere');
  Test.assertEquals(borrow('i AM a TINY BoY!!'), 'iamatinyboy');
});

function borrow(s) {
  const word = s.replace(/[!?;:,. ]+/g, '');
  return word.toLowerCase();
}

// autre solution 
function borrow(s) {
  return s.replace(/[^\w]/g, '').toLowerCase(); // regex : not matching with word characters
}


/* ---------- Replace With Alphabet Position ---------- */
// Replace every letter with its position in the alphabet
// If anything in the text isn't a letter, ignore it and don't return it.
// alphabetPosition("The sunset sets at twelve o' clock.")
// "20 8 5 19 21 14 19 5 20 19 5 20 19 1 20 20 23 5 12 22 5 15 3 12 15 3 11"(as a string)

function alphabetPosition(text) {

  const alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];

  const letters = text.replace(/[^a-zA-Z]+/g, '').toLowerCase().split('');

  const numbers = letters.map(letter => {
    return alphabet.indexOf(letter) + 1;
  });

  return numbers.join(" ");
}

// solution populaire :
function alphabetPosition(text) {
  return text
    .toUpperCase()
    .match(/[a-z]/gi)
    .map((c) => c.charCodeAt() - 64)
    .join(' ');
}


/* ---------- RENVERSER LES MOTS D'UN STRING ---------- */
// Un string, renverser ses mots
// "This is an example!" ==> "sihT si na !elpmaxe"

Test.describe('Sample Tests', _ => {
  Test.it('Should pass Sample tests', _ => {
    Test.assertEquals(reverseWords('The quick brown fox jumps over the lazy dog.'), 'ehT kciuq nworb xof spmuj revo eht yzal .god');
    Test.assertEquals(reverseWords('apple'), 'elppa');
    Test.assertEquals(reverseWords('a b c d'), 'a b c d');
    Test.assertEquals(reverseWords('double  spaced  words'), 'elbuod  decaps  sdrow');
  });
});

function reverseWords(str) {
  const arr = str.split(" ");
  const arrReverse = arr.map(word => {
    return word.split("").reverse().join("");
  });

  return arrReverse.join(" ");
}

// version condensée
function reverseWords(str) {
  return str.split(' ').map(function (word) {
    return word.split('').reverse().join('');
  }).join(' ');
}


/* ---------- DETECT PANGRAM ---------- */
// Un string, vérifier si c'est un "pangram" : contient toutes les lettres de l'alphabet
// "The quick brown fox jumps over the lazy dog" is a pangram, 
// because it uses the letters A-Z at least once (case is irrelevant)

var string = "The quick brown fox jumps over the lazy dog."
Test.assertEquals(isPangram(string), true)
var string = "This is not a pangram."
Test.assertEquals(isPangram(string), false)

function isPangram(string) {
  const alphabet = ['a', 'b', 'c', 'd', 'e', 'f','g', 'h', 'i', 'j', 'k', 'l', 'm', 
  'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

  const arr = string.replace(/^(?=.*\d)[\d ]+$/g, '').toLowerCase().split("");
  // string => remove white space and numbers, uppercase => array
  // const arrUnique = [... new Set(arr)]; enlève les lettres dupliquées

  return alphabet.every(letter => arr.includes(letter));
  // vérifie si chaque entrée du tableau alphabet est incluse dans le tableau arr
}

// solution populaire
function isPangram(string) {
  return 'abcdefghijklmnopqrstuvwxyz'
    .split('')
    .every((value) => string.toLowerCase().includes(value));
}


/* ---------- Extract the domain name from a URL ---------- */
// Un string, retourner seulement le nom de domaine
// domainName("http://github.com/carbonfive/raygun") == "github" 
// domainName("http://www.zombie-bites.com") == "zombie-bites"
// domainName("https://www.cnet.com") == "cnet"

function domainName(url) {
  // remove everything that start with http://, optionally https://, 
  // optionally https://www., or start with www., in case insensitive
  const urlRaw = url.replace(/^(https?\:\/\/(www\.)?|(www\.))/i, "");
  return urlRaw.split('.')[0]; // ex. [google, com] => google
}

// solution populaire
function domainName(url) {
  url = url.replace("https://", '');
  url = url.replace("http://", '');
  url = url.replace("www.", '');
  return url.split('.')[0];
};


/* ---------- UN STRING SE FINIT PAR ? ---------- */
// Un string, retourner s'il finit par le string proposé
// solution('abc', 'bc') // returns true
// solution('abc', 'd') // returns false

function solution(str, ending) {
  return str.includes(ending, (str.length - ending.length));
  // includes(mot, début du mot dans la phrase)
}

// solution populaire
function solution(str, ending) {
  return str.endsWith(ending);
}

/* ---------- TROUVER LA VALEUR MOYENNE D'UN TABLEAU DE 3 ---------- */
// Un tableau de 3 valeurs, retourner l'index de la valeur moyenne
// gimme([2, 3, 1]) => 0
// gimme([5, 10, 14]) => 1

var gimme = function (inputArray) {
  let middle = inputArray[0];
  if ((inputArray[1] > middle && inputArray[1] < inputArray[2]) ||
    (inputArray[1] < middle && inputArray[1] > inputArray[2])) {
    middle = inputArray[1];
  }
  else if ((inputArray[2] > middle && inputArray[2] < inputArray[1]) ||
    (inputArray[2] < middle && inputArray[2] > inputArray[1])) {
    middle = inputArray[2];
  }
  return inputArray.indexOf(middle);
};

// autre solution
var gimme = function (inputArray) {
  if ((inputArray[0] < inputArray[1] && inputArray[0] > inputArray[2])
    || (inputArray[0] > inputArray[1] && inputArray[0] < inputArray[2]))
    return 0;

  if ((inputArray[1] < inputArray[0] && inputArray[1] > inputArray[2])
    || (inputArray[1] > inputArray[0] && inputArray[1] < inputArray[2]))
    return 1;

  if ((inputArray[2] < inputArray[0] && inputArray[2] > inputArray[1])
    || (inputArray[2] > inputArray[0] && inputArray[2] < inputArray[1]))
    return 2;
};


