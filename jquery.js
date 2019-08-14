/* MEMOMENTO DES FONCTIONNALITÉS ET ASTUCES JQUERY */

##### BONNES PRATIQUES ######

# const pour pi (le code de la valeur ne change pas) | let par défaut;
# if (!array_key_exists('...')); // si la clé n'existe pas (if (!true) = if (false))
# éviter au maximum de faire des calculs, créer au maximum possible du html,
    créer des classes définies plutôt que les créer avec JS;
# let $element = $('monElement'); // '' plus performants
# confirmation.input pour contrôler la saisie d'un champ;
# pour les appels AJAX, écrire dans mon code la fonction ajax() plutôt que la fonction GET() ou POST();
# $('#selecteur').css('width', '30 px');
# Compileurs = WEBPACK, BABEL;

I) TRAVAILLER AVEC JQUERY

$(document).ready(function () {
    $('monElement').premiereMethode().deuxiemeMethode(); // les méthodes s'enclenchent à la suite
});

◘ LES SELECTEURS

$('p'); // sélectionne tous les paragraphes
$('p > .lien'); // sélectionne les éléments .lien descendants directement de paragraphe
$('.lien + .visite'); // sélectionne les éléments .visite directement précédés d'un élément .lien
$('lien ~ .visite'); // sélectionne les éléments .visite directement précédés ou non d'un élément .lien

◘ UNE SELECTION PLUS POUSSEE

• jQuery a mis en place des :filtres pour faciliter les sélections;
$('p:first'); // sélectionne le premier paragraphe trouvé
$('a:last'); // sélectionne le dernier lien sur la page
$('p:eq(2)'); // sélectionne les troisième paragraphe avec :eq(index)

• Sélection par attributs
$('p[id]'); // retourne seulement les paragraphes ayant un identifiant
$('input[name=pseudo]'); // cible seulement l'élément du formulaire ayant pseudo comme nom
$('input[name!=pseudo]'); // retourne les input n'ayant pas pseudo pour nom

• Le sélecteur :not
$('p:not(.rouge .bleu)'); // sélectionne tous les paragraphes, à l'exception de ceux ayant comme classe rouge et/ou bleu

• Sauver la sélection
let $element = $('monElement');

◘ LE CAS DES FORMULAIRES

$('input:button'); // sélectionne un input de type bouton
$('input:text input:password input:file input:checkbox input:radio input:button input:submit');
$('input:checked input:disabled input:enabled');

◘ LE SELECTEUR $(THIS)

$('p').each(function() {
    $(this).html('Hello World !'); // $(this) représente l'objet courant, ici le paragraphe courant
})

◘ PERFORMANCE DES SELECTEURS

Cibler un élément avec un #identifiant est plus rapide qu'avec une .classe (moins de trajets);
Pour optimiser une recherche par .classe, il faut mentionner un #idenfiant avant;
$('#menu .sections');
Ecourter les chaînes au maximum pour raccourcir le temps d'éxécution du code;
$('div p a'); // lent
$('#lien'); // rapide
Plus la chaine de sélecteurs est courte, plus sera rapide la sélection;


II) JQUERY ET LES EVENEMENTS

$('#uneDiv').click(function (e) { 
    e.preventDefault(); // annule l'action
    // code à exécuter
});

◘ LES EVENEMENTS INCONTOURNABLES

• L'écoute de la souris

$(selector).click.dblclick.hover.mouseenter.mouseleave.mousedown.mouseup.scroll(function (e) { 
    e.preventDefault();
    // code
});

• L'écoute sur le clavier

$(selector).keydown.keypress.keyup(function (e) { 
    // touche enfoncée, touche maintenue enfoncée, touche relevée
});
$(selector).keyup(function (e) { 
    let touche = touche.which || touche.keyCode; // compatible avec tous les navigateurs
    if (touche == 13) {
        alert("Vous venez d'appuyer sur la touche entrée");
    }
});
PROJET 3 :
$(document).keyup((touche) => { // événement touche clavier
    let saisie = touche.code || touche.key;

    if (saisie === "ArrowRight") {
        this.nextSlide();
    } else if (saisie === "ArrowLeft") {
        this.prevSlide();
    }
});

• Le cas des formulaires

$(selector).focus.select.change.submit(function (e) { 
    // focalisation, selection, changement de valeur, envoi de formulaire
});

• Le déclenchement virtuel

$('p').click(function (e) { 
    alert("Cliqué !");
});
$('p').trigger('click'); // déclenche l'action associée en début de script

• Annuler le comportement d'un événement par défaut

$('a').click(function (e) { 
    e.preventDefault(); // annule l'action du lien
});

◘ LES GESTIONNAIRES D'EVENEMENTS

• L'écoute en jQuery :

$('button').on('click dblclick', function () {
    alert('Ce code fonctionne !');
    // on écoute le clic et le double-clic, puis on exécute la fonction associée
});

• Objet en argument de méthode :

$('button').on({
    click: function () {
        alert('Vous avez cliqué !');
    },
    mouseup: function () {
        alert('Vous avez relâché la souris !');
    }
});

• La délégation d'événements (créer un événement pour plusieurs éléments) :

$('div').on('click', 'p', function () {
    alert('Les paragraphes crées dans la div peuvent être cliqués !');
});

Pour une question de performance, lancer du dynamique sur quelque chose de déjà présent dans le code (ici, la div);

• Les espaces de noms, pour désigner un événement précis :

Syntaxe : event.namespace;
$('button').on('click.nom', function () {
    alert('Premier événement');
});
$('button').on('click.prenom', function () {
    alert('Deuxième événement');
});
$('button').trigger('click.nom'); // exécute le clic, mais seulement la première alerte

• La supression en jQuery :

$('p').on('click', function () {
    // fonction
});
$('p').off('click'); // supprime tous les gestionnaires écoutant le clic
$('p').off(); // supprime tous les gestionnaires de tous les événements

• Annuler la délégation :

$('body').on('click', function () {
    // code
});
$('body').on('click', 'p'); // supprime tous les gestionnaires d'événements délégués sur les p
$('body').on('click', '**'); // supprimer tous les gestionnaires d'événements délégués


III) MANIPULER LE CODE CSS AVEC JQUERY

◘ UNE METHODE PUISSANTE : CSS()

$('p').css('color'); // ma méthode va chercher la valeur de la propriété "color"
$('p').css('color', 'red'); // modifie la propriété "color"
Un objet en argument :
$('p').css({
    color: 'red',
    width: '300px',
    height: '200px',
    'margin-left': '12px',
    marginRight: '12px',
    'float': 'left' // mot clé JS
});

◘ POSITIONNER DES ELEMENTS

