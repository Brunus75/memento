# MEMENTO CSS

## SOMMAIRE

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