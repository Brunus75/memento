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