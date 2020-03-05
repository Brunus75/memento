// ASTUCES JAVASCRIPT

◘ Nullish coalescing operator

// The nullish coalescing operator, ??, returns its right-hand side operand 
// when its left-hand side operand is null or undefined. 
// Otherwise, it returns its left-hand side operand.
let value;
value = value ?? 'default';

◘ Trouver un élément dans un tableau

// la méthode find retourne la valeur du premier élément
// qui justifie la condition
// ex.
const pokemons = [
    {
        id: 1,
        name: "Bulbizarre"
    },
    {
        id: 2,
        name: "Salamèche"
    },
    {
        id: 3,
        name: "Carapuce"
    }
];

let id = 2; // le pokemon à trouver

const pokemon = pokemons.find(
    (pokemon) => { return pokemon.id === id }
    // retourne le pokemon à l'id indiqué
)

console.log(pokemon.name) // Salamèche

◘ Caster une chaine de caractères en nombre

number = "8";
console.log(+number); // 8
console.log(+number + 8); // 16