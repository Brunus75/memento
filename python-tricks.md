# PYTHON TRICKS (BY REAL PYTHON)

## Merging two dicts in Python 3.5+ with a single expression

```py
# How to merge two dictionaries
# in Python 3.5+

>>> x = {'a': 1, 'b': 2}
>>> y = {'b': 3, 'c': 4}

>>> z = {**x, **y}

>>> z
{'c': 4, 'a': 1, 'b': 3}

# In Python 2.x you could
# use this:
>>> z = dict(x, **y)
>>> z
{'a': 1, 'c': 4, 'b': 3}

# In these examples, Python merges dictionary keys
# in the order listed in the expression, overwriting 
# duplicates from left to right.
#
# See: https://www.youtube.com/watch?v=Duexw08KaC8
```

## Different ways to test multiple flags at once in Python

```py
# Different ways to test multiple
# flags at once in Python
x, y, z = 0, 1, 0

if x == 1 or y == 1 or z == 1:
    print('passed')

if 1 in (x, y, z):
    print('passed')

# These only test for truthiness:
if x or y or z:
    print('passed')

if any((x, y, z)):
    print('passed')
```

## How to sort a Python dict by value

```py
# How to sort a Python dict by value
# (== get a representation sorted by value)

>>> xs = {'a': 4, 'b': 3, 'c': 2, 'd': 1}

>>> sorted(xs.items(), key=lambda x: x[1])
[('d', 1), ('c', 2), ('b', 3), ('a', 4)]

# Or:

>>> import operator
>>> sorted(xs.items(), key=operator.itemgetter(1))
[('d', 1), ('c', 2), ('b', 3), ('a', 4)]
```

## The get() method on Python dicts and its "default" arg

```py
# The get() method on dicts
# and its "default" argument

name_for_userid = {
    382: "Alice",
    590: "Bob",
    951: "Dilbert",
}

def greeting(userid):
    return "Hi %s!" % name_for_userid.get(userid, "there")

>>> greeting(382)
"Hi Alice!"

>>> greeting(333333)
"Hi there!"

# When "get()" is called it checks if the given key exists in the dict.
# If it does exist, the value for that key is returned.
# If it does not exist then the value of the default argument is returned instead
```

## Python's namedtuples can be a great alternative to defining a class manually

```py
# Why Python is Great: Namedtuples
# Using namedtuple is way shorter than
# defining a class manually:
>>> from collections import namedtuple
>>> Car = namedtuple('Car', 'color mileage')

# Our new "Car" class works as expected:
>>> my_car = Car('red', 3812.4)
>>> my_car.color
'red'
>>> my_car.mileage
3812.4

# We get a nice string repr for free:
>>> my_car
Car(color='red' , mileage=3812.4)

# Like tuples, namedtuples are immutable:
>>> my_car.color = 'blue'
AttributeError: "can't set attribute"
```

## Try running "import this" inside a Python REPL ...

```py
>>> import this
The Zen of Python, by Tim Peters

Beautiful is better than ugly.
Explicit is better than implicit.
Simple is better than complex.
Complex is better than complicated.
Flat is better than nested.
Sparse is better than dense.
Readability counts.
Special cases aren't special enough to break the rules.
Although practicality beats purity.
Errors should never pass silently.
Unless explicitly silenced.
In the face of ambiguity, refuse the temptation to guess.
There should be one-- and preferably only one --obvious way to do it.
Although that way may not be obvious at first unless you're Dutch.
Now is better than never.
Although never is often better than *right* now.
If the implementation is hard to explain, it's a bad idea.
If the implementation is easy to explain, it may be a good idea.
Namespaces are one honking great idea -- let's do more of those!
```

## You can use "json.dumps()" to pretty-print Python dicts

* ... (as an alternative to the "pprint" module)

```py
# The standard string repr for dicts is hard to read:
>>> my_mapping = {'a': 23, 'b': 42, 'c': 0xc0ffee}
>>> my_mapping
{'b': 42, 'c': 12648430. 'a': 23}  # 😞

# The "json" module can do a much better job:
>>> import json
>>> print(json.dumps(my_mapping, indent=4, sort_keys=True))
{
    "a": 23,
    "b": 42,
    "c": 12648430
}

# Note this only works with dicts containing
# primitive types (check out the "pprint" module):
>>> json.dumps({all: 'yup'})
TypeError: keys must be a string
```

## Function argument unpacking in Python

```py
def myfunc(x, y, z):
    print(x, y, z)

tuple_vec = (1, 0, 1)
dict_vec = {'x': 1, 'y': 0, 'z': 1}

>>> myfunc(*tuple_vec)
1, 0, 1

>>> myfunc(**dict_vec)
1, 0, 1
```

## Measure the execution time of small bits of Python code with the "timeit" module

```py
# The "timeit" module lets you measure the execution
# time of small bits of Python code

>>> import timeit
>>> timeit.timeit('"-".join(str(n) for n in range(100))',
                  number=10000)

0.3412662749997253

>>> timeit.timeit('"-".join([str(n) for n in range(100)])',
                  number=10000)

0.2996307989997149

>>> timeit.timeit('"-".join(map(str, range(100)))',
                  number=10000)

0.24581470699922647
```

## Python's shorthand for in-place value swapping

```py
# In-place value swapping

# Let's say we want to swap
# the values of a and b...
a = 23
b = 42

# The "classic" way to do it
# with a temporary variable:
tmp = a
a = b
b = tmp

# Python also lets us
# use this short-hand:
a, b = b, a
```

## "is" vs "=="

```py

>>> a = [1, 2, 3]
>>> b = a

>>> a is b
True
>>> a == b
True

>>> c = list(a)

>>> a == c
True
>>> a is c
False

# • "is" expressions evaluate to True if two 
#   variables point to the same object

# • "==" evaluates to True if the objects 
#   referred to by the variables are equal
```

## Functions are first-class citizens in Python

```py
# Functions are first-class citizens in Python:

# They can be passed as arguments to other functions,
# returned as values from other functions, and
# assigned to variables and stored in data structures.

>>> def myfunc(a, b):
...     return a + b
...
>>> funcs = [myfunc]
>>> funcs[0]
<function myfunc at 0x107012230>
>>> funcs[0](2, 3)
5
```

## Dicts can be used to emulate switch/case statements

```py
# Because Python has first-class functions they can
# be used to emulate switch/case statements

def dispatch_if(operator, x, y):
    if operator == 'add':
        return x + y
    elif operator == 'sub':
        return x - y
    elif operator == 'mul':
        return x * y
    elif operator == 'div':
        return x / y
    else:
        return None


def dispatch_dict(operator, x, y):
    return {
        'add': lambda: x + y,
        'sub': lambda: x - y,
        'mul': lambda: x * y,
        'div': lambda: x / y,
    }.get(operator, lambda: None)()
    # get(operateur, message d'erreur)


>>> dispatch_if('mul', 2, 8)
16

>>> dispatch_dict('mul', 2, 8)
16

>>> dispatch_if('unknown', 2, 8)
None

>>> dispatch_dict('unknown', 2, 8)
None
```

## Python's built-in HTTP server
```py
# Python has a HTTP server built into the
# standard library. This is super handy for
# previewing websites.

# Python 3.x
$ python3 -m http.server

# Python 2.x
$ python -m SimpleHTTPServer 8000

# (This will serve the current directory at
#  http://localhost:8000)
```

## Convert String to Int
```py
# All integer prefixes are in the form 0?, in which you replace ? with a character that refers to the number system:
    # b: binary (base 2)
    # o: octal (base 8)
    # d: decimal (base 10)
    # x: hexadecimal (base 16)
>>> decimal = 303
>>> hexadecimal_with_prefix = 0x12F

# The string representation of an integer is more flexible because 
# a string holds arbitrary text data:
>>> decimal = "303"
>>> hexadecimal_with_prefix = "0x12F"
>>> hexadecimal_no_prefix = "12F"
# Each of these strings represent the same integer.

>>> int("10")
10
# When you pass a string to int(), you can specify the number system 
# that you’re using to represent the integer. 
# The way to specify the number system is to use base:
>>> int("0x12F", base=16)
303
# The argument that you pass to base is not limited to 2, 8, 10, and 16:
>>> int("10", base=3)
3

# Converting a Python int to a String
>>> str(10)
'10'
# str() behaves like int() in that it results in a decimal representation:
>>> str(0b11010010)
'210'
# If you want a string to represent an integer in another number system, then you use a formatted string, such as an f-string (in Python 3.6+), and an option that specifies the base:
>>> octal = 0o1073
>>> f"{octal}"  # Decimal
'571'
>>> f"{octal:x}"  # Hexadecimal
'23b'
>>> f"{octal:b}"  # Binary
'1000111011'
```

## Python's list comprehensions are awesome
```py
# Python's list comprehensions are awesome.

vals = [expression 
        for value in collection 
        if condition]

# This is equivalent to:

vals = []
for value in collection:
    if condition:
        vals.append(expression)

# Example:

>>> even_squares = [x * x for x in range(10) if not x % 2]
>>> even_squares
[0, 4, 16, 36, 64]
```

## Python 3.5+ type annotations
```py
# Python 3.5+ supports 'type annotations' that can be
# used with tools like Mypy to write statically typed Python:

def my_add(a: int, b: int) -> int:
    return a + b
```

## Python list slice syntax fun
```py
# Python's list slice syntax can be used without indices
# for a few fun and useful things:

# You can clear all elements from a list:
>>> lst = [1, 2, 3, 4, 5]
>>> del lst[:]
>>> lst
[]

# You can replace all elements of a list
# without creating a new list object:
>>> a = lst
>>> lst[:] = [7, 8, 9]
>>> lst
[7, 8, 9]
>>> a
[7, 8, 9]
>>> a is lst
True

# You can also create a (shallow) copy of a list:
>>> b = lst[:]
>>> b
[7, 8, 9]
>>> b is lst
False
```

## CPython easter egg
```py
# Here's a fun little CPython easter egg.
# Just run the following in a Python 2.7+ 
# interpreter session:
>>> import antigravity
```

## Finding the most common elements in an iterable
```py
# collections.Counter lets you find the most common
# elements in an iterable:

>>> import collections
>>> c = collections.Counter('helloworld')

>>> c
Counter({'l': 3, 'o': 2, 'e': 1, 'd': 1, 'h': 1, 'r': 1, 'w': 1})

>>> c.most_common(3)
[('l', 3), ('o', 2), ('e', 1)]
```

## itertools.permutations()
```py
# itertools.permutations() generates permutations 
# for an iterable. Time to brute-force those passwords ;-)

>>> import itertools
>>> for p in itertools.permutations('ABCD'):
...     print(p)

('A', 'B', 'C', 'D')
('A', 'B', 'D', 'C')
('A', 'C', 'B', 'D')
('A', 'C', 'D', 'B')
('A', 'D', 'B', 'C')
('A', 'D', 'C', 'B')
('B', 'A', 'C', 'D')
('B', 'A', 'D', 'C')
('B', 'C', 'A', 'D')
('B', 'C', 'D', 'A')
('B', 'D', 'A', 'C')
('B', 'D', 'C', 'A')
('C', 'A', 'B', 'D')
('C', 'A', 'D', 'B')
('C', 'B', 'A', 'D')
('C', 'B', 'D', 'A')
('C', 'D', 'A', 'B')
('C', 'D', 'B', 'A')
('D', 'A', 'B', 'C')
('D', 'A', 'C', 'B')
('D', 'B', 'A', 'C')
('D', 'B', 'C', 'A')
('D', 'C', 'A', 'B')
('D', 'C', 'B', 'A')
```

## When To Use __repr__ vs __str__?
```py
# Emulate what the std lib does:
>>> import datetime
>>> today = datetime.date.today()

# Result of __str__ should be readable:
>>> str(today)
'2017-02-02'

# Result of __repr__ should be unambiguous:
>>> repr(today)
'datetime.date(2017, 2, 2)'

# Python interpreter sessions use 
# __repr__ to inspect objects:
>>> today
datetime.date(2017, 2, 2)
```

## @classmethod vs @staticmethod vs "plain" methods
```py
# @classmethod vs @staticmethod vs "plain" methods
# What's the difference?

class MyClass:
    def method(self):
        """
        Instance methods need a class instance and
        can access the instance through `self`.
        """
        return 'instance method called', self

    @classmethod
    def classmethod(cls):
        """
        Class methods don't need a class instance.
        They can't access the instance (self) but
        they have access to the class itself via `cls`.
        """
        return 'class method called', cls

    @staticmethod
    def staticmethod():
        """
        Static methods don't have access to `cls` or `self`.
        They work like regular functions but belong to
        the class's namespace.
        """
        return 'static method called'

# All methods types can be
# called on a class instance:
>>> obj = MyClass()
>>> obj.method()
('instance method called', <MyClass instance at 0x1019381b8>)
>>> obj.classmethod()
('class method called', <class MyClass at 0x101a2f4c8>)
>>> obj.staticmethod()
'static method called'

# Calling instance methods fails
# if we only have the class object:
>>> MyClass.classmethod()
('class method called', <class MyClass at 0x101a2f4c8>)
>>> MyClass.staticmethod()
'static method called'
>>> MyClass.method()
TypeError: 
    "unbound method method() must be called with MyClass "
    "instance as first argument (got nothing instead)"
```

## Lambda Functions
```py
# The lambda keyword in Python provides a
# shortcut for declaring small and 
# anonymous functions:

>>> add = lambda x, y: x + y
>>> add(5, 3)
8

# You could declare the same add() 
# function with the def keyword:

>>> def add(x, y):
...     return x + y
>>> add(5, 3)
8

# So what's the big fuss about?
# Lambdas are *function expressions*:
>>> (lambda x, y: x + y)(5, 3)
8

# • Lambda functions are single-expression 
# functions that are not necessarily bound
# to a name (they can be anonymous).

# • Lambda functions can't use regular 
# Python statements and always include an
# implicit `return` statement.
```

## Working with IP addresses in Python 3
```py
# Python 3 has a std lib
# module for working with
# IP addresses:

>>> import ipaddress

>>> ipaddress.ip_address('192.168.1.2')
IPv4Address('192.168.1.2')

>>> ipaddress.ip_address('2001:af3::')
IPv6Address('2001:af3::')

# Learn more here:
# https://docs.python.org/3/library/ipaddress.html
```