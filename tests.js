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


