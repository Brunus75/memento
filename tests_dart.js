// TESTS DART

// Form The Minimum
// Given a list of digits, return the smallest number that could be formed from
// these digits, using the digits only once (ignore duplicates)
// minValue ({1, 3, 1}) ==> return (13)
// minValue({1, 9, 3, 1, 7, 4, 6, 6, 7}) return  ==> (134679)

int minValue(arr) {
    Set setVal = Set();
    setVal.addAll(arr); // delete duplicates
    List listVal = setVal.toList(); // Set to List
    listVal.sort();
    return int.parse(listVal.join());
}

// réponse populaire
int minValue(List<int> arr) {
    arr.sort();
    return int.parse(arr.toSet().join());
}