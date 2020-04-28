## FACTORIELLE

def fact(number):
    if number == 0:
        return 1
    result = 1
    for i in range(1, number + 1): # range est exclusif
        result *= i
    return result

print(fact(4)) # 24 (1*2*3*4)


## FACTORIELLE, DE FACON RECURSIVE

def factorielle(number):
    if number == 0 or number == 1:
       result = 1
    else:
       result = factorielle(number - 1) * number
    print(f"--- factorielle({number}) = {result}")
    return result

print(factorielle(6))
"""
--- factorielle(1) = 1
--- factorielle(2) = 2
--- factorielle(3) = 6
--- factorielle(4) = 24
--- factorielle(5) = 120
--- factorielle(6) = 720
720
"""

## MOT MIROIR, PALINDROME

def mirror(string):
    word = ""
    for character in string:
        word = character + word
    return word

print(mirror("épater")) # retapé


## EST-CE UN CARRÉ ?

# isSquare(-1) returns false
# isSquare(0) returns true
# isSquare(3) returns false
# isSquare(4) returns true
# isSquare(25) returns true  
# isSquare(26) returns false

import math

def is_square(n):
    if n < 0:
        return False
    square_root = math.sqrt(n) # racine carrée de n
    if (int(square_root) * int(square_root) == n):
        return True
    return False

# solution populaire
import math

def is_square(n):    
    if n < 0:
        return False

    root = math.sqrt(n)
    
    return root.is_integer()

# aussi
import math

def is_square(n):
    root = math.sqrt(n)
    return (root - int(root)) == 0


## ADDITIONNER LES DEUX PLUS FAIBLES VALEURS D'UN ARRAY

def sum_two_smallest_numbers(numbers):
    # sort array
    numbers.sort()
    # additionne les 2 premières valeurs
    return numbers[0] + numbers[1]

# solution populaire
def sum_two_smallest_numbers(numbers):
    return sum(sorted(numbers)[:2])


## Number of People in the Bus

# There is a bus moving in the city, and it takes and drop some people in each bus stop.
# Each integer array has two items which represent number of people get into bus(The first item) 
# and number of people get off the bus(The second item) in a bus stop.
# ex. test.assert_equals(number([[10,0],[3,5],[5,8]]),5)

def number(bus_stops):
    people = 0
    
    for stop in bus_stops:
        people += stop[0] # take people
        people -= stop[1] # drop people
        
    return people

# solution populaire 1
def number(bus_stops):
    return sum([stop[0] - stop[1] for stop in bus_stops])

# solution populaire 2
def number(bus_stops):
    total = 0
    for entered, out in bus_stops:
        total += entered - out 
    return total


## MUMBLING

# accum("abcd") -> "A-Bb-Ccc-Dddd"

def accum(s):
    letters = list(s) # "word" => ['w', 'o', 'r', 'd']

    for i in range(1, len(letters)):
        letters[i] = (letters[i] * (i + 1)).capitalize() # d = Dddd
    return "-".join(letters) # "W-Oo-Rrr-Dddd"


# solution populaire
def accum(s):
    return '-'.join(c.upper() + c.lower() * i for i, c in enumerate(s))


## UNE PHRASE => UN MOT EN CAMEL CASE

# "Phrase en camel case" => "phraseEnCamelCase"
def toCamelCase(phrase):
    mots = phrase.lower().split()

    for i, mot in enumerate(mots):
        if i > 0:
            mots[i] = mot.capitalize()

    return print("".join(mots))

phrase = "Phrase en camel case"
toCamelCase(phrase) # phraseEnCamelCase

# autre solution
phrase = 'Phrase en camel case'
mots = phrase.lower().split(' ')
phrase_convertie = mots[0]
for i, mot in enumerate(mots):
    if i > 0:
        phrase_convertie += mot.capitalize()
print(phrase_convertie)


## LE MOT LE PLUS COURT

# Simple, given a string of words, return the length of the shortest word(s)
# test.assert_equals(find_short("bitcoin take over the world maybe who knows perhaps"), 3)

def find_short(s):
    words = s.split() # ["bitcoin", "take", ect.]
    min_word = min(words, key=len)  # min by the length
    return len(min_word)


## Jaden Casing Strings

# Not Jaden-Cased: "How can mirrors be real if our eyes aren't real"
# Jaden-Cased: "How Can Mirrors Be Real If Our Eyes Aren't Real"

def to_jaden_case(string):
    words = string.split()
    jaden_words = [word.capitalize() for word in words]
    return " ".join(jaden_words)


# solution populaire
import string

def toJadenCase(NonJadenStrings):
    return string.capwords(NonJadenStrings)


## SOMME DES POSITIFS

# You get an array of numbers, return the sum of all of the positives ones.
# Example [1,-4,7,12] => 1 + 7 + 12 = 20
# Note: if there is nothing to sum, the sum is default to 0

def positive_sum(arr):
    positives = [number for number in arr if number > 0]
    return sum(positives)


## REPERER UN NOMBRE DIFFERENT (PAIR OU IMPAIR) DANS UN STRING

# create a program that among the given numbers finds one that is different in evenness, 
# and return a position of this number
# Examples :
# iq_test("2 4 7 8 10") => 3 // Third number is odd, while the rest of the numbers are even
# iq_test("1 2 1 1") => 2 // Second number is even, while the rest of the numbers are odd

def iq_test(numbers):
    listNumbers = [int(i) for i in numbers.split(" ")] # string => list of numbers
    pairNumbers = [i for i in listNumbers if i % 2 == 0]
    index = 0

    if len(pairNumbers) > (len(listNumbers) / 2):
        index = [i + 1 for i, x in enumerate(listNumbers) if x % 2 == 1]
    else:
        index = [i + 1 for i, x in enumerate(listNumbers) if x % 2 == 0]

    return int(index[0]) # result of list comprehension is a list


# solutions populaires

def iq_test(numbers):
    e = [int(i) % 2 == 0 for i in numbers.split()] # e = list de True ou False

    return e.index(True) + 1 if e.count(True) == 1 else e.index(False) + 1


def iq_test(n):
    n = [int(i) % 2 for i in n.split()] # n = list de 1 (True) et 0 (False)
    if n.count(0) > 1:
        return n.index(1)+1
    else:
        return n.index(0)+1


def iq_test(numbers):
    indexEven = 0
    indexOdd = 0
    numEven = 0
    numOdd = 0
    nums = numbers.split(" ")
    for i in range(len(nums)):
        if int(nums[i]) % 2 == 0:
            numEven += 1
            indexEven = i + 1
        else:
            numOdd += 1
            indexOdd = i + 1
    if numEven == 1:
        return indexEven
    else:
        return indexOdd


# RETOURNER LA PROCHAIN CARRE D'UN NOMBRE
# Return the next square if sq is a square, -1 otherwise
import math

def find_next_square(sq):
    square_root = math.sqrt(sq)
    if square_root == int(math.sqrt(sq)):
        return (square_root + 1) ** 2
    return -1

# solutions populaires :

def find_next_square(sq):
    root = sq ** 0.5
    if root.is_integer():
        return (root + 1) ** 2
    return -1


# Take every 2nd char from the string, then the other chars, 
# that are not every 2nd char, and concat them as new String.
# Do this n times!
# Examples :
# "This is a test!", 1 -> "hsi  etTi sats!"
# "This is a test!", 2 -> "hsi  etTi sats!" -> "s eT ashi tist!"

def decrypt(encrypted_text, n):
    if n <= 0:
        return encrypted_text
    result = encrypted_text
    for i in range(n):
        second_char = [x for i, x in enumerate(result) if i % 2]
        odd_char = [x for i, x in enumerate(result) if i % 2 == 0]
        result = "".join(second_char) + "".join(odd_char)
        print(result)
    return result

def encrypt(text, n):
    return "Hello"
