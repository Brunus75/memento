# MEMENTO HTML

## CONTRAINTES 

* https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Constraint_validation
* L'attribut type pour les inputs : text, password, email, tel, URL, date et bien d'autres
* Les attributs de validation simples : en fonction du  type  de l'input , vous pouvez utiliser différents attributs pour perfectionner votre validation :   
   * min / max  : fonctionne avec des champs de type nombre ou date. Cela permet de définir une valeur minimum et une valeur maximum autorisées
   * required : fonctionne avec à peu près tous les types de champs. Cela rend obligatoire le remplissage de ce champ
   * step : fonctionne avec les dates ou les nombres. Cela permet de définir une valeur d'incrément lorsque vous changez la valeur du champ via les flèches
   * minlength / maxlength : fonctionne avec les champs textuels (text, url, tel, email...). Cela permet de définir un nombre de caractères minimum et maximum autorisé
* Les patterns imposés avec regex
```html
<input type="text" pattern="[0-9]{,3}" />
<!-- empêchera un utilisateur d'entrer autre chose que des chiffres, et limitera leur nombre à 3 chiffres -->
```

## <a name="lazy-loading"></a> HTML lazy loading for images (Firefox)

* Lazy loading is a common strategy to improve performance by identifying resources as non-blocking (non-critical) and loading them only when needed, rather than loading them all immediately.
* Setting the value to lazy will instruct the browser to defer loading of images that are off-screen until the user scrolls near them
* You can determine if a given image has finished loading by examining the value of its boolean complete property
```html
<img src="image.jpg" loading="lazy" alt="..." />
```