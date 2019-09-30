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
$('p:eq(2)'); // sélectionne le troisième paragraphe avec :eq(index)

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

$('body').on('click', 'p', function () {
    // code
});
$('body').off('click', 'p'); // supprime tous les gestionnaires d'événements délégués sur les p
$('body').off('click', '**'); // supprimer tous les gestionnaires d'événements délégués


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

$('p').offset().left;
// retourne la valeur "left" de l'élément (position absolue : position sur le document)
$('p').position().top;
// retourne la valeur "top" de l'élément (position relative : par rapport à son parent)

• Modifier la position d'un élément 

$('p').offset({
    left: 30,
    top: 200
});

$('p').position({
    left: 200
});

◘ GERER LES DIMENSIONS

$('p').height(); // retourne la hauteur stricte du paragraphe
$('p').width();

$('p').innerWidth(); // retourne la largeur (avec marges intérieures) du paragraphe
$('p').innerHeight();

$('p').outerWidth(); // retourne la largeur (avec marges intérieures + bordures) du paragraphe
$('p').outerHeight();

$('p').outerHeight(true); // retourne la hauteur (avec marges intérieures + bordures + marges extérieures) du paragraphe


IV) LES EFFETS JQUERY

◘ ANIMER LES ELEMENTS 

• Animations personnalisées avec animate()

$('p').animate({
    width: '150px',
    fontSize: '35px', // ne pas oublier la syntaxe de l'identifiant !
    marginTop: '50px'
});
// Lors du lancement de cette animation, mon paragraphe s'élargira,
// se déplacera par rapport à la hauteur du document, et verra sa taille de police se fixer à 35px

○ duration : le temps de déroulement 

$('p').animate({
    width: '150px'
}, 'fast'); // premier exemple avec la valeur fast (200ms)
// aussi 'slow' ou 'normal'

$('p').animate({
    width: '150px'
}, 1000); // second exemple avec 1000ms (= 1s)

○ easing : évolution de l'animation 

$('p').animate({
    width: '150px'
}, 'linear'); // l'animation se déroulera de façon linéaire
// aussi 'swing' => de plus en plus vite au cours du temps, et ralentit à la fin

○ complete : la fonction de retour (callback)

$('p').animate({
    width: '150px'
}, function () { // fonction anonyme lancée l'animation terminée
    alert('Animation terminée !');
});

• Deux arguments supplémentaires : step() et queue()

○ Passer un objet comme second argument 

$('p').animate({
    width: '150px'
}, 1000, 'linear', function () {
    alert('Animation terminée !');
});

// ce code est égal à celui-ci :

$('p').animate({
    width: '150px'
}, {
    duration: 1000,
    easing: 'linear',
    complete: function () {
        alert('Animation terminée !');
    }
});

// Ainsi, vous pourrez aussi agir sur les deux arguments step() et queue() :
• step() lancera une fonction à chaque étape de l'animation, cad à chaque propriété CSS traitée;
• queue() déterminera si une animation doit se terminer avant d'en lancer une seconde,
et prendra un booléen en tant que valeur

$('p')
    .animate({
        width: '150px'
    }, {
        duration: 1000,
        queue: false // pas de file d'attente
    })
    .animate({
        fontSize: '35px'
    }, 1000);
// les deux animations se lanceront en même temps

• Définition directe d'attributs

// attribuer une accélération différente à chaque propriété CSS animée

// Première méthode : tableau
$('p').animate({
    fontSize: ['50px', 'linear'], // cette propriété s'animera de façon linéaire
    width: '200px' // les autres s'animeront de la façon définie ensuite : swing
}, 'swing');

// Seconde méthode : objet
$('p').animate({
    fontSize: '50px',
    width: '200px'
},
{
    easing: 'swing'
    specialEasing: { // on définit la propriété
        fontSize: 'linear' // puis on liste toutes les propriétés CSS dans un objet en donnant leur évolution
    }
});

• Astuces et cas spéciaux 

○ Animer les couleurs

https://github.com/jquery/jquery-color (fichier jquery.color.js à inclure dans la page)

$('p').animate({
    color: 'red',
    backgroundColor: 'green'
});

○ Ajout de valeurs 

$('p').animate({
    width: '+=50px', // ajoute 50px à la largeur
    height: '-=20px' // enlève 20px à la hauteur
});

○ Animer les barres de défilement 

'scrollTop' // agit sur la barre de défilement verticale;
'scrollLeft' // qui agit sur la barre horizontale (si elle existe)

○ Les trois états additionnels

'show' // affiche la propriété;
'hide' // se charge de la cacher;
'toggle' // fait la navette entre les deux: si la propriété est cachée, il l'affiche, et vice versa

$('p').animate({
    width: 'show' // anime la largeur pour afficher le paragraphe
});

$('p').animate({
    width: 'hide' // anime la largeur pour cacher le paragraphe
});

$('p').animate({
    width: 'toggle' // anime la largeur pour cacher ou afficher le paragraphe
});

◘ LES EFFETS NATIFS

• Les trois états 

show();
hide();
toggle();

$('p').hide('slow'); // cache le paragraphe en 600ms

$('p').show('fast', function () {
    alert('Paragraphe affiché !');
}); // affiche le paragraphe en 200ms, et lance une alerte à la fin de l'animation

• Le cas de toggle()

s'il est caché, elle l'affiche, s'il est affiché, elle le cache
accepte un argument de condition: si on lui indique true, elle affichera l'élément, 
si on lui indique false, elle fera l'inverse

$('p').toggle(true); // aura le même rôle que show()

$('p').toggle(false); // aura le même rôle que hide()

• Des méthodes plus esthétiques

○ Dérouler/Enrouler

slideDown() // déroule l'élément pour l'afficher;
slideUp() // enroule l'élément pour le cacher ;
slideToggle() // enroule ou déroule selon l'état courant de l'élément.

○ Apparition/Disparition

fadeIn() // affiche l'élément progressivement ;
fadeOut() // cache l'élément, en ajustant l'opacité également.
fadeToggle() // affiche ou cache l'élément, grâce à l'opacité.

$('p').fadeTo('normal', 0.5); // ajuste l'opacité et la fixe à 0.5

◘ REPRENDRE LE CONTRÔLE DES EFFETS

• Le concept de file d'attente 

queue : file d'attente des animations (respecte un ordre chronologique);

○ Manipuler le tableau des fonctions (queue)

$('p').fadeOut();
$('p').fadeIn();
$('p').slideUp();
$('p').slideDown();

let fileAttente = $('p').queue('fx'); // je stocke la file d'attente, le tableau, dans une variable

alert(fileAttente.length); // renvoie 4

Pour rajouter une fonction dans la file d'attente, il suffit de passer ladite fonction en tant qu'argument :

$('p').fadeOut();
$('p').fadeIn();
$('p').slideUp();
$('p').slideDown();

$('p').queue(function () {
    alert('Nouvelle fonction dans la file !'); // alerte s'affichant à la fin de la file
});

Aussi possible à faire : remplacer le tableau par un nouveau, que vous aurez créé directement :

$('p').fadeOut();
$('p').fadeIn();
$('p').slideUp();
$('p').slideDown();

$('p').queue('fx', []); // fait disparaître le paragraphe, puis vide la file d'attente

○ Ordonner la file d'attente 

dequeue() // stoppe l'animation en cours de la file d'attente, et passe à la suivante

$('p')
    .animate({
        fontSize: '+=100px'
    })
    .queue(function () {
        alert('Bonjour !');
        $(this).dequeue();
    })
    .animate({
        fontSize: '-=50px'
    })
    .queue(function () {
        alert('Au revoir !');
        $(this).dequeue();
    });

1.la taille de la police augmente de 100 pixels,
2.une nouvelle fonction est ajoutée à la file,
3.une alerte affiche « Bonjour! »,
4.la méthode dequeue() permet de lancer l'animation suivante ;
5.la taille de la police baisse de 50 pixels,
6.une nouvelle fonction est ajoutée à la file,
7.une alerte affiche « Au revoir! »,
8.la méthode dequeue() permet de ne pas entraver les futures animations sur l'élément.

○ Suppression de fonctions non exécutées

clearQueue() // supprime toutes les fonctions de la file d'attente qui n'ont pas encore été exécutées

$('p').animate({
    fontSize: '100px'
})
.queue(function () { // on ajoute une fonction à la file d'attente
    alert('Bonjour !');
})
.clearQueue(); // empêche l'alerte de s'afficher

• Arrêter les animations 

stop() // stoppe une animation
// On l'utilisera le plus souvent pour éviter
// de lancer le même effet plusieurs fois de suite sans pouvoir l'arrêter
// ex. un utilisateur qui appuie plusieurs fois sur le bouton sans attendre la fin de l'animation
// (qui s'execute autant de fois que le bouton est appuyé)
Arrêter une animation est donc une sécurité,
l'assurance qu'elle ne se lancera pas des dizaines et des dizaines de fois sans pouvoir rien y faire.

// Le sélecteur :animated cible tous les objets jQuery actuellement animés

$('p:animated').stop(); // arrête l'animation courante

$('p:animated').stop(true) // annule toutes les animations suivantes, dont l'animation courante

$('p:animated').stop(false, true) // arrête l'animation courante, mais laisse l'élément aller à son état final

$('p:animated').stop(true, true) // annule toutes les animations suivantes, mais laisse l'élément courant aller à son état final.

○ Désactivation

une propriété permet de désactiver toutes les animations de la page
jQuery.fx.off = true;


V) MANIER LES ATTRIBUTS

◘ GESTION GENERALE DES ATTRIBUTS 

attributs = les options des balises, les complétent pour donner des informations supplémentaires
méthode : attr();

let cheminImage = $('img').attr('src'); // rentre le contenu de l'attribut src dans une variable
$('img').attr('src', 'nouveauChemin/photo.png'); // change l'attribut src en écrasant l'ancienne valeur
$('img').attr('title', 'Nouvelle photo'); // créé l'attribut title dans l'élément s'il n'existe pas

Par souci de performance,
on préféra passer par un objet si l'on a plusieurs attributs à influencer en même temps.
$('img').attr('src', 'nouveauChemin/photo.png');
$('img').attr('alt', 'Nouvelle photo');
$('img').attr('title', 'Nouvelle photo');
// mauvaise méthode

$('img').attr({
    src: 'nouveauChemin/photo.png',
    alt: 'Nouvelle photo',
    title: 'Nouvelle photo'
});
// bonne méthode

• Utilisation d'une fonction anonyme 

Une fonction anonyme peut être déclarée en tant que valeur de l'attribut, cad en second argument.
$('img').attr('alt', function (index, valeur) {
    return index + 'ème élément - ' + valeur;
});

• Supprimer un attribut 

$('img').removeAttr('title'); // supprime l'attribut title des images

◘ GERER LES CLASSES PROPREMENT

• Ajouter une classe 

$('.vert').attr('class', 'rouge'); // cet élément aura la classe .rouge
$('.vert').addClass('rouge'); // cet élément aura les classes .vert et .rouge
$('.vert').addClass('rouge bleu jaune'); // cet élément aura les classes .vert, .rouge, .bleu et .jaune

• Supprimer une classe 

$('p').removeClass('vert'); // supprime la classe .vert de l'élément
$('p').removeClass('vert rouge bleu'); // supprimer les classes .vert, .rouge et .bleu

• Présence d'une classe 

if ($('p').hasClass('vert')) { // si l'élément possède la classe .vert
    alert('Ce paragraphe est vert !'); // on affiche une alerte
}

• Switcher une classe 

$('p').toggleClass('vert'); // ajoute la classe .vert si elle n'existe pas, sinon, la supprime

// ces deux codes sont équivalents :
$('p').addClass('vert');
$('p').toggleClass('vert', true);

// ces deux codes sont équivalents :
$('p').removeClass('vert');
$('p').toggleClass('vert', false);


VI) PARCOURIR LES ELEMENTS DU DOM

◘ NAVIGUER DANS LE DOM

DOM = 'interface' de programmation, qui représente le HTML en orienté objet;

◘ LA DESCENDANCE

• Parents, enfants, et ancêtres

parent(); // accéder au bloc parent de l'élément actuellement ciblé
$('a').css('color', 'blue'); // rend le lien ciblé seulement de couleur bleue
$('a').parent().css('color', 'blue');
// ici, c'est le parent de l'enfant (un paragraphe, si l'on respecte la sémantique) qui verra son texte devenir bleu
$('a').parent('.texte'); // retourne seulement l'ensemble des blocs parents ayant la classe .texte

$('div').children(); // cible l'élément enfant direct du bloc div ( > )
$('div').children('p'); // cible seulement l'ensemble des paragraphes enfants du bloc div

// pour chercher parmi TOUS les enfants
$('body').find('p'); // cible l'ensemble des paragraphes contenus dans le corps du document, quelle que soit leur position !

// pour chercher parmi TOUS les parents (ancêtres)
$('a').parents(); // cible tous les éléments ancêtres du lien : paragraphe, bloc(s), balise <body>...

• La fraternité d'éléments 

prev() // qui sélectionne l'élément frère précédant directement l'objet ciblé;
next() // qui sélectionne l'élément frère suivant directement l'objet ciblé;
prevAll() // qui sélectionne tous les éléments frères précédant l'objet ciblé ;
nextAll() // qui sélectionne tous les éléments frères suivant l'objet ciblé.

◘ FILTRER ET BOUCLER LES ELEMENTS

• Filtrer les élements

○ Filtre par sélecteur 

$('p').filter('.texte'); // supprime de la sélection tous les paragraphes n'ayant pas la classe .texte
$('p').filter('.texte, #description');
// supprime de la sélection tous les paragraphes n'ayant pas la classe .texte ou l'identifiant #description
$('p').not('.texte'); // supprime de la sélection tous les paragraphes avec la classe .texte

○ Filtre par index 

$('p').eq(2); // cible le troisième paragraphe trouvé (l'index commence à 0)
Vous pouvez spécifier un nombre négatif: jQuery commencera alors à compter à partir du dernier index.
Si vous possédez quatre paragraphes et que vous donnez la valeur - 1 à la méthode, 
alors votre objet sera le quatrième paragraphe.
$('div').slice(1, 3); // garde seulement les blocs div ayant l'index 1 ou 2
// slice(position 1er element, position dernier element non pris en compte)

○ Vérifier le 'type' d'un élément 

let vrai = $('div').is('div');
let faux = $('div').is('p');

console.log(vrai); // affiche true
console.log(faux); // affiche false

• Boucler les éléments 

Rôle : traiter chaque occurrence trouvée et exécuter une fonction définie dessus.
$('p').each( function(){
    alert( $(this).text() ); // $(this) représente l'objet courant
} );
Si la fonction retourne false, alors la boucle s'arrête brutalement.
Si au contraire elle retourne true, alors la boucle passe directement à l'élément suivant.

