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
