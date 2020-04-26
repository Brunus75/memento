# MEMENTO CSS

## SOMMAIRE

## CSS min(), max(), and clamp()

* min() — accepts one or more possible values or calculations to choose from, and ensures that the value used in all situations will be the smallest of the possibilities. In effect, this provides a range of values for responsive designs, along with a maximum allowed value
* max() — accepts one or more possible values or calculations to choose from, and ensures that the value used in all situations will be the largest of the possibilities. In effect, this provides a range of values for responsive designs, along with a minimum allowed value.
* clamp() — accepts three values or calculations: a minimum, preferred, and a maximum. The minimum or maximum will be used if the computed value falls below the minimum or above the maximum. The preferred value will be used if the computed value falls between the two. This allows the property value to adapt to changes in the element or page it is assigned to, while remaining between the minimum and maximum values.

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