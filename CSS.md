# MEMENTO CSS

## SOMMAIRE

## RESSOURCES

### DOC
* CSS Selectors Reference : https://www.w3schools.com/cssref/css_selectors.asp
* Combinaisons et groupes de sélecteurs | MDN : https://developer.mozilla.org/fr/docs/Apprendre/CSS/Introduction_%C3%A0_CSS/Combinators_and_multiple_selectors
* CSS font-display et le chargement des polices web - Alsacreations : https://www.alsacreations.com/article/lire/1779-CSS-font-display-et-le-chargement-des-polices-web.html
* box-sizing - CSS : Feuilles de style en cascade | MDN : https://developer.mozilla.org/fr/docs/Web/CSS/box-sizing
* text-overflow - CSS : Feuilles de style en cascade | MDN : https://developer.mozilla.org/fr/docs/Web/CSS/text-overflow
* ::before (:before) - CSS : Feuilles de style en cascade | MDN : https://developer.mozilla.org/fr/docs/Web/CSS/::before
* inherit - CSS : Feuilles de style en cascade | MDN : https://developer.mozilla.org/fr/docs/Web/CSS/inherit
* transform - CSS : Feuilles de style en cascade | MDN : https://developer.mozilla.org/fr/docs/Web/CSS/transform
* Disable CSS transitions and animations… temporarily or permanently! – onezeronull.com : http://onezeronull.com/2016/10/06/disable-css-transitions-and-animations-temporarily-or-permanently/
* When to use margin vs padding in CSS - Stack Overflow : https://stackoverflow.com/questions/2189452/when-to-use-margin-vs-padding-in-css
* Create Shapes Using Pure CSS : http://www.webtutorialsource.com/tutorial/shapes-using-pure-css/
* 8 simple CSS3 transitions that will wow your users | Webdesigner Depot : https://www.webdesignerdepot.com/2014/05/8-simple-css3-transitions-that-will-wow-your-users/
* css - How to write :hover condition for a:before and a:after? - Stack Overflow : https://stackoverflow.com/questions/5777210/how-to-write-hover-condition-for-abefore-and-aafter
* CSS Flexbox Inspector: Examine Flexbox layouts - Firefox Developer Tools | MDN : https://developer.mozilla.org/en-US/docs/Tools/Page_Inspector/How_to/Examine_Flexbox_layouts
* CSS Tip: Fixed Headers and Section Anchors | Caktus Group : https://www.caktusgroup.com/blog/2017/10/23/css-tip-fixed-headers-and-section-anchors/
* CSS hue-rotate() Function : https://www.quackit.com/css/functions/css_hue-rotate_function.cfm
* filter - CSS : Feuilles de style en cascade | MDN : https://developer.mozilla.org/fr/docs/Web/CSS/filter
* css - How to make a image center in a div? - Stack Overflow : https://stackoverflow.com/questions/16818192/how-to-make-a-image-center-in-a-div
* Implementing a variable font with fallback web fonts – Zeichenschatz : https://www.zeichenschatz.net/typografie/implementing-a-variable-font-with-fallback-web-fonts.html
* Pourquoi j'utilise l'unité Rem et non l'unité Pixel : https://blog.lesieur.name/pourquoi-j-utilise-l-unite-rem-et-non-l-unite-pixel/
* HTML CSS - Désactiver un lien href par CSS - INFORMATUX Développements PHP JQUERY Mobile Cross-platform Sécurité Web : https://informatux.com/news/article/7/desactiver-un-lien-href-par-css
* SVG Path : https://www.w3schools.com/graphics/svg_path.asp
* The CSS Working Group At TPAC: What’s New In CSS? — Smashing Magazine : https://www.smashingmagazine.com/2018/10/tpac-css-working-group-new
* CSS Frameworks Or CSS Grid: What Should I Use For My Project? — Smashing Magazine : https://www.smashingmagazine.com/2018/11/css-frameworks-css-grid
* Animated CSS burgers (HTML/CSS + React) : https://march08.github.io/animated-burgers
### NEW
* "CSS font-size-adjust property provides the developers with honest management of the font size by allowing them to modify the font size of a part when the primarily selected font-type is not available" : https://www.lambdatest.com/blog/css-font-size-adjust/

### TO READ
* A Complete Guide to CSS Media Queries : https://css-tricks.com/a-complete-guide-to-css-media-queries
* Working with JavaScript Media Queries : https://css-tricks.com/working-with-javascript-media-queries
* Beyond Media Queries: Using Newer HTML & CSS Features for Responsive Designs : https://css-tricks.com/beyond-media-queries-using-newer-html-css-features-for-responsive-designs/
* 3 things about CSS variables you might not know : https://patrickbrosset.com/articles/2020-09-21-3-things-about-css-variables-you-might-not-know/



## CSS min(), max(), and clamp()

* min() — accepts one or more possible values or calculations to choose from, and ensures that the value used in all situations will be the smallest of the possibilities. In effect, this provides a range of values for responsive designs, along with a maximum allowed value
* max() — accepts one or more possible values or calculations to choose from, and ensures that the value used in all situations will be the largest of the possibilities. In effect, this provides a range of values for responsive designs, along with a minimum allowed value.
* clamp() — accepts three values or calculations: a minimum, preferred, and a maximum. The minimum or maximum will be used if the computed value falls below the minimum or above the maximum. The preferred value will be used if the computed value falls between the two. This allows the property value to adapt to changes in the element or page it is assigned to, while remaining between the minimum and maximum values.
* Everything I Learned About min(), max(), clamp() In CSS : https://ishadeed.com/article/css-min-max-clamp/

```css
html {
  font-family: sans-serif;
}

body {
  margin: 0 auto;
  width: min(1000px, calc(70% + 100px));
  /* 1000px for wider viewports, 
  70% of the viewport width plus 100px for narrower viewports
  (up until this calculation’s result becomes 1000px or more) */
}

h1 {
  letter-spacing: 2px;
  font-size: clamp(1.8rem, 2.5vw, 2.8rem)
  /* clamp(min, preferred, max) */
}

p {
  line-height: 1.5;
  font-size: max(1.2rem, 1.2vw);
  /* it will be a minimum of 1.2rem
  it will start to grow at the point that 1.2vw’s 
  computed value is larger than 1.2rems’ computed value */
}
```

## CSS Variable
```css
/* The var() function is used to reference a custom property declared earlier in the document. */
html {
  --color: orange;
}

p {
  color: var(--color);
}

/* It is incredibly powerful when combined with calc(). */
html {
  --scale: 1.2;
  --size: 0.8rem;
}

.size-2 {
  font-size: calc(var(--size) * var(--scale));
}
.size-2 {
  font-size: calc(var(--size) * var(--scale) * var(--scale));
}
```

## content-visibilty
* content-visibility: the new CSS property that boosts your rendering performance : https://web.dev/content-visibility/
* permet, avec la valeur auto, de considérer des parties d'une page comme des boîtes vides qui se rempliront seulement quand l'utilisateur scrollera dessus :
```css
.element {
  content-visibility: auto;
  contain-intrinsic-size: 1000px; /* permet de préciser la taille de la boîte */
}
```
* permet, avec la valeur hidden, de cacher une ou plusieurs parties de la page sans impacter la performance (au contraire de display:none et visibility:hidden)
```css
.element {
  content-visibility: hidden; /* boîte vide cachée, qui mettra à jour son state seulement quand elle sera affichée */
  display: none: /* hides the element and destroys its rendering state. This means unhiding the element is as expensive as rendering a new element with the same contents */
  visibility: hidden: /* hides the element and keeps its rendering state. This doesn't truly remove the element from the document, as it (and it's subtree) still takes up geometric space on the page and can still be clicked on. It also updates the rendering state any time it is needed even when hidden */
}
```

##  Dark Mode with only 1 CSS PROPERTY 
* https://dev.to/dip15739/dark-mode-with-only-1-css-property-17fl
```css
/* The <html> element with an attribute theme whose value is dark-mode */
html[theme='dark-mode'] {
    filter: invert(1) hue-rotate(180deg);
}

html[theme='dark-mode'] img,
picture,
video{
    filter: invert(1) hue-rotate(180deg);
}

.invert {
    filter: invert(1) hue-rotate(180deg);
}
```