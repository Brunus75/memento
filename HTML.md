# MEMENTO HTML

## RESSOURCES

* A Complete HTML5 Canvas Cheat Sheet – PDF Free Download : http://www.coding-dude.com/wp/html5/mastering-html5-canvas-with-this-free-cheat-sheet
* < pre > : l'élément de texte préformaté - HTML (HyperText Markup Language) | MDN : https://developer.mozilla.org/fr/docs/Web/HTML/Element/pre
* < hr > : l'élément de rupture thématique (règle horizontale) - HTML (HyperText Markup Language) | MDN : https://developer.mozilla.org/fr/docs/Web/HTML/Element/hr
* html - Creating a line with circle in the middle - Stack Overflow : https://stackoverflow.com/questions/34969341/creating-a-line-with-circle-in-the-middle
* html - CSS triangle :before element - Stack Overflow : https://stackoverflow.com/questions/20589780/css-triangle-before-element
* html - How to center a "position: absolute" element - Stack Overflow : https://stackoverflow.com/questions/8508275/how-to-center-a-position-absolute-element
* html - position:absolute in media query is overriding all other rules - Stack Overflow : https://stackoverflow.com/questions/34445409/positionabsolute-in-media-query-is-overriding-all-other-rules
* HTML Cheat Sheet : https://websitesetup.org/html5-cheat-sheet/

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

## Best way to lazy load images for maximum performance 
* https://dev.to/prototyp/best-way-to-lazy-load-images-for-maximum-performance-27o1?ref=webdesignernews.com

## Revenir en arrière
* HTML5 provides for a relatively straightforward solution: the HTML5 History API : http://diveintohtml5.info/history.html 
* More specifically, the history.pushState() function allows a site to invoke a URL change
without a page reload, meaning the site can align the browser “Back” button behavior
to match user expectations.
(The reverse is also possible: to change the URL without invoking an entry in the user’s history.)

## <a name="lazy-loading"></a> HTML lazy loading for images (Firefox)

* Lazy loading is a common strategy to improve performance by identifying resources as non-blocking (non-critical) and loading them only when needed, rather than loading them all immediately.
* Setting the value to lazy will instruct the browser to defer loading of images that are off-screen until the user scrolls near them
* You can determine if a given image has finished loading by examining the value of its boolean complete property
```html
<img src="image.jpg" loading="lazy" alt="..." />
```

## Afficher le mot de passe enregistré directement dans l'input de formulaire
* https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/password#Allowing_autocomplete
```
current-password
    Allow the browser or password manager to enter the current password for the site. 
	This provides more information than on does, since it lets the browser or password manager
	automatically enter currently-known password for the site in the field, but not to suggest a new one.
new-password
    Allow the browser or password manager to automatically enter a new password for the site; this is
	used on "change your password" and "new user" forms, on the field asking the user for a new
	password. 
	The new password may be generated in a variety of ways, depending on the password manager in use. 
	It may simply fill in a new suggested password, or it might show the user an interface for creating one.
```
```html
<label for="userPassword">Password:</label>
<input id="userPassword" type="password" autocomplete="current-password">
```


## L'élément ```<picture>```
* L'élément HTML ```<picture>``` est un conteneur utilisé afin de définir zéro ou plusieurs éléments ```<source>``` destinés à un élément ```<img>```
* Le navigateur choisira la source la plus pertinente selon la disposition de la page
* The ```<picture>``` element contains two tags: one or more ```<source>``` tags and one ```<img>``` tag
* https://developer.mozilla.org/fr/docs/Web/HTML/Element/picture
```html
 <picture>
  <source media="(min-width:650px)" srcset="img_pink_flowers.jpg">
  <source media="(min-width:465px)" srcset="img_white_flower.jpg">
  <img src="img_orange_flowers.jpg" alt="Flowers" style="width:auto;">
  <!-- The <img> element is required as the last child of the <picture> element, 
  as a fallback option if none of the source tags matches -->
</picture> 
```

<h1 id="memomento">MEMOMENTO</h1>

<p>Aller directement à la partie traitant de :
			<ul>
				<li>OUTILS</li>
				<li>REFERENCEMENT</li>
				<li><a href="#referencement" title="Aller à la partie Référencement">Les bonnes habitudes de référencement</a></li>
				<li>PHOTOSHOP</li>
				<li><a href="#ps_astuces" title="Aller à la partie Astuces de Photoshop">Astuces</a></li>
				<li>HTML & CSS</li>
				<li><a href="#considerations" title="Aller à la partie Considérations">Considérations</a></li>
				<li><a href="#liens" title="Aller à la partie Liens">Les Liens</a></li>
				<li><a href="#images" title="Aller à la partie Images">Les Images</a></li>
				<li><a href="#bases_html" title="Aller à la partie Bases HTML">Bases HTML</a></li>
				<li><a href="#bases_css" title="Aller à la partie Bases CSS">Bases CSS</a></li>
				<li><a href="#formatage_texte" title="Aller à la partie Texte">Formatage du texte</a></li>
				<li><a href="#couleurs_fond" title="Aller à la partie Couleurs & fonds">Couleurs & Fond</a></li>
				<li><a href="#bordures_ombres" title="Aller à la partie Bordures">Bordures & Ombres</a></li>
				<li><a href="#apparences_dynamiques" title="Aller à la partie Dynamiques">Apparences dynamiques</a></li>
				<li><a href="#effets_css" title="Aller à la partie Effets avancés">Effets avancés</a></li>
				<li><a href="#structure" title="Aller à la partie Structure">Structurer sa page</a></li>
				<li><a href="#boites" title="Aller à la partie Boites">Les Boites</a></li>
				<li><a href="#flexbox" title="Aller à la partie Flexbox">FLEXBOX</a></li>
				<li><a href="#obsoletes_pages" title="Aller à la partie Vieilles techniques de mise en page">Vieilles techniques de mise en page</a></li>
				<li><a href="#tableaux" title="Aller à la partie Tableau">Les Tableaux</a></li>
				<li><a href="#formulaires" title="Aller à la partie Formulaires">Les Formulaires</a></li>
				<li><a href="#audio_video" title="Aller à la partie Audio & Video">Audio & Video</a></li>
				<li><a href="#media_queries" title="Aller à la partie Media Queries">Media Queries</a></li>
				<li><a href="#memos" title="Aller à la partie Mémos">Mémos HTML & CSS</a></li>
				<li><a href="#formes" title="Aller à la partie formes CSS">Formes CSS</a></li>
				<li>DECOUPER ET INTEGRER UNE MAQUETTE</li>
				<li><a href="#maquette_fonctionnement" title="Aller à la partie Fonctionnement de maquette">Fonctionnement d'une maquette</a></li>
				<li><a href="#maquette_html" title="Aller à la partie traduction de la maquette">Mise en place du HTML & CSS</a></li>
			</ul>
		</p>
		<h1>OUTILS</h1>
		<ul>
			<li>JavaScript : Brackets + plug.Beautify ; </li>
			<li>JQuery : <a href="https://github.com/jquery/jquery-color" title="Ajouter des couleurs avec JQuery">fichier jquery.color.js à inclure dans la page html</a></li>
			<li>Visual Studio Code + auto close tag + beautify + canvas-snippet + javascript (es6) code snippets + jquery code snippet + sublime text keymap</li>
		</ul><br >
		<h1>REFERENCEMENT</h1>
		<h2 id="referencement">Les bonnes habitudes à prendre</h2>
		<ul>
			<li>Trouver un mot-clé principal : à quelle question répond pertinemment ma page ?</li>
			<li>Trouver les mots-clés secondaires, recherchés (Adwords) et à la concurrence peu élevée (Adwords)</li>
			<li>Le titre de la page contient le mot-clé principal, différent pour chaque page</li>
			<li>Un seul h1, plusieurs h2</li>
			<li>HEADER : logo + nav, en-tête, ce qui présente le site (sans forcément le nav)
				introduit le site ou un article, ou une section</li>
			<li>Les balises doivent se suivre de manière logique : un titre h1 ne peut pas être suivi par un h3 sans intercaler de h2, un h3 arrive après un h2 (et non un h4)</li>
			<li>Sélecteurs : ne pas dépasser les 3 niveaux (#id .class a)</li>
			<li>html lang=fr</li>
			<li>Responsive : valeur minimum : 320px (bloquer à 320px avec #bloc-page min-width: 320px)</li>
			<li>Taux de rebond : nombre de visiteurs retournant sur Google après être arrivés sur le site</li>
			<li>Éviter de dupliquer du contenu</li>
			<li>Personnaliser chaque meta-description pour chaque page</li>
			<li>Alt="" : titre de l'image, illustre son contexte, reprend les mots-clés du site, varier avec les synonymes</li>
			<li>Utiliser aria-label lorsque le texte d’un label n’est pas visible à l’écran.
				Ex. : <button aria-label="Fermer" onclick="myDialog.close()">X</button>
				<a href="https://a11y-guidelines.orange.com/web/exemples/masquage/index.html">Masquer des éléments de manière accessible (aria-hidden et sr-only)</a>
			</li>
			<li>Keep rel="nofollow" for paid links, user-generated content and sites you do not trust for some reason.
			</li>
		</ul><br />
		<h1>PHOTOSHOP</h1>
		<h2 id="ps_astuces">Astuces</h2>
		<ul>
			<li><strong>Exporter une image</strong> : clic droit sur l'image, Dupliquer le calque, Destination > Document : nouveau ;</li>
		</ul><br />
		<h1>HTML & CSS</h1>
		<h2 id="considerations">Considérations</h2>
		<ul>
			<li>La page d'accueil doit être nommée index.html</li>
			<li>Le html s'ouvre avec < html lang="fr" ></li>
			<li>Ordre d'appartion dans le <em>head</em> :
				<ul>
					<li>charset</li>
					<li>title</li>
					<li>description</li>
					<li>meta</li>
					<li>link</li>
				</ul>
			</li>
			<li>Trouver les breakpoint : <a href="https://getbootstrap.com/docs/4.0/layout/overview/">"Boostrap + Breakpoint"</a></li>
			<li>Nommer-les-images-avec-des-tirets.jpg</li>
			<li>Ordre des media queries : pc-tablette-smartphone (base : ordinateur), l'inverse si tu pars d'un smartphone</li>
			<li>Lexique HTML & CSS : <a href="http://41mag.fr/syntaxe-et-lexique-du-html5-et-du-css3.html">Lexique</a></li>
			<li>Comment définir le contenu de alt="" : <a href="http://www.pompage.net/traduction/Bien-utiliser-le-texte-alternatif">Bien utiliser le texte alternatif</a></li>
			<li>Alt="" : titre de l'image, illustre son contexte, reprend les mots-clés du site</li>
			<li>rel="nofollow"</li>
			<li>Image dégradée</li>
			<li>Deux div qui se superposent : deux div en absolute dans une grande div en relative, z-index 2 et z-index 1<br />
			Pour qu'elles soient de la même couleur : background-color: transparent</li>
			<li>class="exemple1 exemple2 exemple3"</li>
			<li>Respecter la hiérarchie : un h2 est toujours précédé d'un h3 (il n'est pas le h3 de la page mais le h3 du h2)</li>
			<li>Maquette : 2 lignes de lorem ipsum : 2 lignes de texte</li>
			<li>position: static; valeur par défault</li>
			<li>Réinitialiser des <a href="https://www.journaldunet.fr/web-tech/developpement/1202423-comment-enlever-ou-reinitialiser-des-styles-css-pour-un-element-particulier/" title="Réinitialiser styles CSS">styles CSS</a> pour un élément particulier</li>
		</ul>
		<h2 id="liens">Les Liens</h2>
		<ul>
			<li> < a href="www.site.com/&[amp]" > TEXTE < / a > </li>
			<li> < a href="../page2.html" title="Cliquez pour aller à la page 2" > LA PAGE 2 < / a ></li>
			<li> < a href="#ancre" > <br /> 
				 < h2 id="ancre" > </li>
			<li> < a href="page2.html#ancre" > </li>
			<li>title="bulle d'aide"</li>
			<li>target="_blank" <span class="commentaires_css">< !-- à ne pas abuser --></span></li>
			<li> < a href="mailto:mail@gmail.com" > Envoyez-moi un mail ! < / a > </li>
			<li> < a href="fichier.zip" > Télécharger le fichier < / a > </li>
		</ul>
		<h2 id="images">Les Images</h2>
		<ul>
			<li>Photo : JPEG / Graphique peu coloré : PNG 8 / Graphique très coloré (+256) : PNG 24</li>
			<li>< bloc >< img src="" alt="<span class="commentaires_css">obligatoire</span>" title="" / >< bloc ></li>
		</ul>
		<p><img src="images/images_lien.png" alt="" /></p>
		<ul>
			<li>Figures : tout ce qui vient illustrer le texte, qui apporte une information, qui a du sens, qui apporte une meilleure compréhension de l'ensemble</li>
			<li>< figure ></li>
				<ul>
					<li>< img src="" alt="" / ></li>
					<li>< figcaption ><span class="commentaires_css">La légende</span>< figcaption ></li>
				</ul>
			<li>< / figure ></li>
			<li>Si vous faites de votre image une figure, l'image peut être située en-dehors d'un paragraphe.</li>
		</ul>
		<p><img src="images/images_figures.png" alt="" /></p>
		<h2 id="bases_html">Bases HTML</h2>
		<ul>
			<li> < br / > </li>
			<li> < em > </li>
			<li> < strong > </li>
			<li> < mark > </li>
			<li> < ul >, < ol > + < li > </li>
			<li> <em>list-type</em> : none;</li>
			<li> < abbr > </li>
			<li> < blockquote > </li>
			<li> < address > </li>
			<li> < small > </li>
		</ul>
		<h2 id="bases_css">Bases CSS</h2>
		<p>.class (plusieurs), #id (une);</p>
		<p>Balises universelles:
			<ul>
				<li> < span > < / span > (inline) </li>
				<li> < div > < / div > (block) </li>
			</ul>
		</p>
		<p>Sélecteurs avancés:
			<ul>
				<li>h1</li>
				<li>h1, em</li>
				<li>* <span class="commentaires_css">/* (toutes les balises) */</span></li>
				<li>h3 em  <span class="commentaires_css">/* (les em dans les h3) */</span></li>
				<li>h3 + p  <span class="commentaires_css">/* (le premier p qui arrive après un h3) */</span></li>
				<li>h3 > p <span class="commentaires_css">/* (le premier p (et seulement lui, car c'est le fils) dans un h3) */</span></li>
				<li><a href="https://developer.mozilla.org/fr/docs/Apprendre/CSS/Introduction_%C3%A0_CSS/Combinators_and_multiple_selectors" title="Combinaisons et  groupes de sélecteurs">Combinaisons et  groupes de sélecteurs</a></li>
				<li>h3 p:last-child <span class="commentaires_css">/* (le dernier paragraphe dans un h3) */</span></li>
				<li>a[title] <span class="commentaires_css">/* (les a avec l'attribut title) */</span></li>
				<li>a[title="Cliquez ici"] <span class="commentaires_css">/* (les a avec l'attribut title et la valeur "Cliquez ici") */</span></li>
				<li>a[title*="ici"] <span class="commentaires_css">/* (les a avec l'attribut title et le mot "ici" dans la valeur) */</span></li>
			</ul>
		</p>
		<h2 id="formatage_texte">Formatage du texte CSS</h2>
		<p><em>font-size</em>: 1.2em;</p>
		<p><em>font-size</em>: 14px, xx-small, x-small, small, medium, large, x-large, xx-large;</p>
		<p><em>font-family</em>: Verdana, Arial, "Trebuchet MS", Georgia, sans-serif;</p>
		<p><em>@font-face</em>: .ttf (partout) .eot (internet explorer) .otf (sauf internet explorer) .svg (Apple) .woff (nouveau et partout)<br />
		<em>font-family</em>: police @font-face;</p>
		<p><em>font-style</em>: italic, oblique, normal;</p>
		<p><em>font-weight</em>: bold, normal;</p>
		<p><em>line-height</em>: 1.2em; <span class="commentaires_css">/* espacement des lignes, hauteur des rangées */</span></p>
		<p><em>text-decoration</em>: underline, overline, line-through, blink none;</p>
		<p><em>text-align</em>: right, left, center, justify;</p>
		<p><em>text-transform</em>: uppercase, lowercase;</p>
		<p><em>hyphens</em> : auto; <span class="commentaires_css">/* active la césure */</span></p>
		<p><img src="images/photo_cv_mini.png" alt="image flottante" class="mini_cv" /><em>float</em>: left;</p>
		<p class="clear_both"><em>clear</em>: both;</p>
		<h2 id="couleurs_fond">Couleurs & Fond CSS</h2>
		<p><em>color</em>: white, silver, gray, black, red, maroon, lime, green, yellow, olive, blue, navy, fuchsia, purple, aqua, teal, transparent, initial (par défaut);</p>
		<p><em>color</em>: #FFFFFF / rgb(255, 255, 255);</p>
		<p><em>background-color</em>: rgb(255; 255, 255);</p>
		<p><em>background</em>: url("soleil.png") fixed/scroll no-repeat/repeat-x/repeat-y/repeat top right (ou 30px 50px);</p>
		<p><em>background</em>: url("soleil.png") fixed no-repeat top right, url("decor.png") fixed;</p>
		<p><em>opacity</em>: 0.5;</p>
		<p><em>background-color</em>: rgb(255, 0,0);   <span class="commentaires_css">/* navigateurs anciens */</span><br />
			<em>background-color</em>: rgba(255,0,0,0.5)   <span class="commentaires_css">/* navigateurs à jour */</span></p>
		<p><strong>Les Filtres :</strong> <em>filter</em>: grayscale(1-0); sepia(1-0); blur(5px); drop-shadow(5px 5px 10px black); saturate(0-100%-1000%); invert(1-0); opacity(0%-100%); brightness(0%-100%); contrast(0%-100%);<br />
			<em>-webkit-filter</em>: grayscale(1-0), etc.;</p>
		<h2 id="bordures_ombres">Bordures & ombres CSS</h2>
		<p><em>border</em>: 2px black solid;</p>
		<p id="solid">Solid</p>
		<p id="dotted">Dotted</p>
		<p id="dashed">Dashed</p>
		<p id="double">Double</p>
		<p id="groove">Groove</p>
		<p id="ridge">Ridge</p>
		<p id="inset">Inset</p>
		<p id="outset">Outset</p>
		<p><em>border-left border-right border-top border-bottom</em></p>
		<p><em>border-radius</em>: 10px / <em>border-radius</em>: 10px 5px 5px 10px / <em>border-radius</em>: 10px / 20px</p>
		<p id="box_shadow"><em>box-shadow</em>: 6px 6px 6px black;</p>
		<p id="shadow_inset"><em>box-shadow</em>: inset</p>
		<p id="text_shadow">Text-shadow</p>
		<h2 id="apparences_dynamiques">Apparences dynamiques CSS</h2>
		<p>
			<ul>
				<li>a:hover</li>
				<li>a:active</li>
				<li>a:focus</li>
				<li>a:visited</li>
			</ul>
		</p>
		<h2 id="effets_css">Effets avancés</h2>
		<ul>
			<li>Multi-colonnes et césure : <a href="https://openclassrooms.com/fr/courses/2745636-utilisez-les-effets-avances-de-css-sur-votre-site/3296573-les-multi-colonnes">Chapitre 1 OC</a></li>
			<li>Les dégradés : <a href="https://openclassrooms.com/fr/courses/2745636-utilisez-les-effets-avances-de-css-sur-votre-site/3296725-les-degrades">Chapitre 2 OC</a></li>
			<li>Les transformations 2D : <a href="https://openclassrooms.com/fr/courses/2745636-utilisez-les-effets-avances-de-css-sur-votre-site/3296875-les-transformations-2d">Chapitre 3 OC</a></li>
			<li>Les transitions : <a href="https://openclassrooms.com/fr/courses/2745636-utilisez-les-effets-avances-de-css-sur-votre-site/3296979-les-transitions-css">Chapitre 4 OC</a></li>
			<li>Les animations : <a href="https://openclassrooms.com/fr/courses/2745636-utilisez-les-effets-avances-de-css-sur-votre-site/3297084-les-animations-css">Chapitre 5 OC</a></li>
			<li>Les animations 3D : <a href="https://openclassrooms.com/fr/courses/2745636-utilisez-les-effets-avances-de-css-sur-votre-site/3297256-les-transformations-3d">Chapitre 6 OC</a></li>
		</ul><br />
		<h2 id="structure">Structurer sa page</h2>
		<p><img src="images/structure_site.png" alt="schema de la structure d'une page web" title="structure d'une page web" /></p>
		<h2 id="boites">Les Boites</h2>
		<p>Dimensions :<br />
			<ul>
				<li><em>width</em>: 50%;</li>
				<li><em>height</em>: 250px;</li>
				<li><em>min-width, min-height, max-width, max-height;</em></li>
			</ul>
		</p>
		<p>Les Marges :<br />
			<ul>
				<li><em>padding</em>: 12px;</li>
				<li><em>margin</em>: 20px;</li>
				<li><em>padding-top, padding-right, padding-bottom, padding-left</em>;</li>
				<li><em>margin-top, margin-right, margin-bottom, margin-left;</em></li>
				<li><em>margin</em>: top right bottom left;</li>
				<li><em>margin</em>: auto; + <em>width</em>: 350px;</li>
			</ul>
		<p>Quand ça dépasse..<br />
			<ul>
				<li><em>overflow</em>: auto; <span class="commentaires_css">/* aussi : visible, hidden, scroll */</span></li>
				<li><em>word-wrap</em>: break-word; <span class="commentaires_css">/* à utiliser pour un bloc de texte saisi par les utilisateurs */</span></li>
			</ul>
		</p>
		<h2 id="flexbox">FLEXBOX</h2>
		<ul>
			<li><em>display</em>: flex;</li>
			<li><em>flex-direction</em>:
				<ul>
					<li>row;</li>
					<li>column;</li>
					<li>row-reverse;</li>
					<li>column-reverse;</li>
				</ul>
			</li>
			<li><em>flex-wrap</em>:
				<ul>
					<li>nowrap;</li>
					<li>wrap;</li>
					<li>wrap-reverse;</li>
				</ul>
			</li>
			<li><em>justify-content</em>:
				<ul>
					<li>flex-start;</li>
					<li>flex-end;</li>
					<li>center;</li>
					<li>space-between;</li>
					<li>space-around;</li>
				</ul>
			</li>
			<li><em>align-items</em>:
				<ul>
					<li>stretch;</li>
					<li>flex-start;</li>
					<li>flex-end;</li>
					<li>center;</li>
					<li>baseline;</li>
				</ul>
			</li>
			<li><p><span class="id_color">#conteneur</span><br />
				{<em>justify-content</em>: center;<br/>
				<em>align-tems</em>: center;}</p>
				<p><span class="id_color">#conteneur</span><br />
				{<em>display</em>: flex;}<br />
				<span class="class_color">.element</span><br />
				{<em>margin</em>: auto;}</p>
			</li>
			<li><p><span class="class_color">.element</span>:nth-child(2) <span class="commentaires_css">/* deuxième bloc élément */</span><br /> 
				<em>align-self</em>: flex-end;</p>
			</li>
			<li><em>align-content</em>:</li>
			<p><img id="align-content" src="images/align_content.png" alt="schema des valeurs align-content" title="align-content" /></p>
			<li><p><span class="class_color">.element</span>:nth-child(1)<br />
				<em>order</em>: 3;<br />
				<em>flex</em>: 1;</p>
				<span class="class_color">.element</span>:nth-child(2)<br />
				<em>order</em>: 1;<br />
				<em>flex</em>: 2; <span class="commentaires_css">/* peut grossir 2 fois plus que le premier élément */</span>
			</li>
		</ul>
		<h2 id="obsoletes_pages">Vieilles techniques de mise en page</h2>
		<ul>
			<li>float :</li>
			<li>nav</li>
				<ul>
					<li><em>float</em>: left;</li>
					<li><em>width</em>: 150px;</li>
				</ul>
			<li>section</li>
				<ul>
					<li><em>margin-left</em>: 170px;</li>
				</ul>
		</ul>
		<p><img id="float_left" src="images/float_left.png" /></p>
		<ul>
			<li><em>display</em>: inline, block, inline-block, none;</li>
			<li><em>vertical-align</em>: top, middle, bottom, baseline; <span class="commentaires_css">/* aussi en px ou % pour aligner à une certaine distance de la baseline */</span></li>
			<li>nav</li>
				<ul>
					<li><em>display</em>: inline-block;</li>
					<li><em>width</em>: 150px;</li>
					<li><em>vertical-align</em>: top;</li>
				</ul>
			<li>section</li>
				<ul>
					<li><em>display</em>: inline-block;</li>
					<li><em>vertical-align</em>: top;</li>
				</ul>
		</ul>
		<p><img id="inline_block" src="images/inline_block.png" /></p>
		<ul>
			<li><em>position</em>:
				<ul>
					<li>absolute; <span class="commentaires_css">/* immobile sur la page */</span></li> 
					<li>fixed; <span class="commentaires_css">/* immobile sur l'écran, toujours visible malgré le scroll */</span></li>
					<li>relative; <span class="commentaires_css">/* décalage par rapport à sa position initiale */</span></li>
					<li>static; <span class="commentaires_css">/* valeur par défault */</span></li>
				</ul>
			</li>
			<li>.element1
				<ul>
					<li><em>position</em>: absolute;</li>
					<li><em>right</em>: 0px;</li>
					<li><em>bottom</em>: 0px; <span class="commentaires_css">< !-- élément placé dans le coin droit du bas de l'écran --></span></li> 
					<li><em>z-index</em>: 1; <span class="commentaires_css">/* ordre des éléments en absolu : 4,3,2,1 */</span></li> 
				</ul>
			</li>
			<li>.element_relative
				<ul>
					<li><em>position</em>: relative;</li>
					<li><em>left</em>: 55px;</li>
					<li><em>top</em>: 10px;</li>
					<p><img id="position_left" src="images/position_left.jpg" /></p>
				</ul>
			</li>
			<li>Positionner précisément :
				<ul>
					<li>transform: translate(0, -50%);</li>
				</ul>
			</li>
		</ul><br />
		<h2 id="tableaux">Les Tableaux</h2>
		<ul>
			<li>< table ></li>
				<ul>
					<li>< caption > <span class="commentaires_css">Titre du tableau</span> < / caption ></li>
					<li>< tr ></li>
						<ul>
							<li>< th ><span class="commentaires_css">Nom</span>< / th ></li>
							<li>< th ><span class="commentaires_css">Age</span>< / th ></li>
							<li>< th ><span class="commentaires_css">Pays</span>< / th ></li>
						</ul>
					<li>< / tr ></li>
					<li>< tr ></li>
						<ul>
							<li>< td ><span class="commentaires_css">Carmen</span>< / td> </li>
							<li>< td ><span class="commentaires_css">33 ans</span>< / td ></li>
							<li>< td ><span class="commentaires_css">Espagne</span>< / td ></li>
						</ul>
					<li>< / tr ></li>
				</ul>
			<li>< / table ></li>
		</ul>
		<p><img src="images/tableaux1.png" alt="" /></p>
		<ul>
			<li>table</li>
				<ul>
					<li><em>border-collapse</em>: collapse; <span class="commentaires_css">(autre: separate)</span></li>
					<li><em>caption-side</em>: top / bottom;</li>
				</ul>
			<li>td, th</li>
				<ul>
					<li><em>border</em>: 1px solid black;</li>
					<li><em>vertical-align</em>: top, middle, bottom, baseline;</li>
					<li><em>text-align</em>: right, left, center, justify;</li>
				</ul>
		</ul>
		<p><img src="images/collapse.png" alt="" /></p>
		<h3>Diviser un gros tableau</h3>
		<p><img src="images/gros_tableau.png" alt="" /></p>
		<ul>
			<li>< thead ></li> <span class="commentaires_css">< !-- Ordre : head, foot, body -- ></span>
				<ul>
					<li>< tr ></li>
						<ul>
							<li>< th ><span class="commentaires_css">Nom</span>< / th></li>
							<li>< th ><span class="commentaires_css">Age</span>< / th></li>
							<li>< th ><span class="commentaires_css">Pays</span>< / th></li>
						</ul>
					<li>< / tr></li>
				</ul>
			<li>< / thead ></li>
			<li>< tfoot ></li>
				<ul>
					<li>< tr ></li>
						<ul>
							<li>< th ><span class="commentaires_css">Nom</span>< / th></li>
							<li>< th ><span class="commentaires_css">Age</span>< / th></li>
							<li>< th ><span class="commentaires_css">Pays</span>< / th></li>
						</ul>
					<li>< / tr></li>
				</ul>
			<li>< / tfoot></li>
			<li>< tbody ></li>
				<ul>
					<li>< tr ></li>
						<ul>
							<li>< td ><span class="commentaires_css">Carmen</span>< / td></li>
							<li>< td ><span class="commentaires_css">33 ans</span>< / td></li>
							<li>< td ><span class="commentaires_css">Espagne</span>< / td></li>
						</ul>
					<li>< / tr></li>
				</ul>
			<li>< / tbody ></li>
		</ul>
	<h3>Fusion</h3>
	<p><img src="images/fusion_row.png" id="fusion_row" alt="" /></p>
	<ul>
		<li>< tr ></li>
			<ul>
				<li>< td ><span class="commentaires_css">Lucky Luke</span>< / td ></li>
				<li>< td <span class="rowspan">rowspan="2"</span> ><span class="commentaires_css">Pour toute la famille !</span>< / td ></li>
			</ul>
		<li>< / tr ></li>
	</ul>
	<p><img src="images/fusion_col.png" id="fusion_col" alt="" /></p>
	<ul>
		<li>< tr ></li>
			<ul>
				<li>< th ><span class="commentaires_css">Pour enfants ?</span>< / th></li>
				<li>< td ><span class="commentaires_css">Non, trop violent</span>< / td ></li>
				<li>< td ><span class="commentaires_css">Oui, adapté</span>< / td ></li>
				<li>< td <span class="rowspan">colspan="2"</span> ><span class="commentaires_css">Pour toute la famille !</span>< / td ></li>
			</ul>
		<li>< / tr ></li>
	</ul>
	<h2 id="formulaires">Les Formulaires</h2>
	<h3>Formulaires monolignes</h3>
	<ul>
		<li>< form method="post" <span class="commentaires_css">("get" limité à 255 caractères)</span> action="traitement.php" ></li>
			<ul>
				<li>< p > <span class="commentaires_css">< !-- obligatoire pour faire figurer du texte --></span></li>
					<ul>
						<li>< label for="pseudo"><span class="commentaires_css">Votre pseudo</span>< / label ></li>
						<li>< <span class="green">input type="text"</span> name="pseudo" id="pseudo" size="<span class="commentaires_css">longueur du champ</span>" maxlength="<span class="commentaires_css">nombre de caractères max</span>" value="<span class="commentaires_css">pré-remplir</span>" placeholder="<span class="commentaires_css">indication de contenu</span>" / ></li>
					</ul>
				<li>< / p ></li>
			</ul>
		<li>< / form ></li>
	</ul>
	<p><img src="images/formulaires_1.png" alt="" /></p>
	<ul>
		<li>Zone mot de passe :</li>
		<li>< label for="pass"><span class="commentaires_css">Votre mot de passe :</span>< / label ></li>
		<li>< <span class="green">input type="password"</span> name="pass" id="pass" /></li>
	</ul>
	<p><img src="images/formulaires_2.png" alt="" /><br /><img src="images/formulaires_3.png" alt="" /></p>
	<h3>Formulaires multilignes</h3>
	<ul>
		<li>< <span class="green">textarea</span> name="<span class="commentaires_css">exemple</span>" id="<span class="commentaires_css">exemple</span>" rows="<span class="commentaires_css">lignes</span>" cols="<span class="commentaires_css">colonnes</span>" ></li>
		<li>< / <span class="green">textarea</span> ></li>
	</ul>
	<p><img src="images/formulaires_4.png" alt="" /><br /><img src="images/formulaires_5.png" alt="" /></p>
	<h3>Zones de saisies enrichies</h3>
	<ul>
		<li>< input type="email" / ></li>
		<li>< input type="url" / ></li>
		<li>< input type="tel" / > <span class="commentaires_css">< !-- saisie d'un numéro de tel --></span></li>
		<li>< input type="number" min="<span class="commentaires_css">0</span>" max="<span class="commentaires_css">999</span>" step="<span class="commentaires_css">pas de déplacement</span>" / ></li>
		<li>< input type="range" min="<span class="commentaires_css">0</span>" max="<span class="commentaires_css">999</span>" step="<span class="commentaires_css">pas de déplacement</span>" / > <span class="commentaires_css">< !-- curseur --></span></li>
		<li>< input type="color" / ></li>
		<li>< input type="search" /></li>
		<li>< input type=</li>
			<ul>
				<li>"date"</li>
				<li>"time"</li>
				<li>"week"</li>
				<li>"month"</li>
				<li>"datetime"</li>
				<li>"datetime-local"</li>
			</ul>
	</ul>
	<h3>Éléments d'options</h3>
	<ul>
		<li>Cases à cocher :</li>
		<li>< <span class="green">input type="checkbox"</span> name="choix" id="choix" <span class="green">checked</span> / > < label for="choix" ><span class="commentaires_css">Choix numéro 1</span>< / label ></li>
	</ul>
	<p><img src="images/formulaires_checkbox.png" alt="" /><br /><img src="images/formulaires_checkbox2.png" alt="" /></p>
	<ul>
		<li>Zones d'options :</li>
		<li>< <span class="green">input type="radio"</span> <span class="green">name=</span>"commun" value="propre" id="propre" /> < label for="propre" ><span class="commentaires_css">Choix numéro 1</span>< / label ></li>
	</ul>
	<p><img src="images/formulaires_radio.png" alt="" /><br /><img src="images/formulaires_radio2.png" alt="" /></p>
	<p>Pour une deuxième zone d'option, attribuez un deuxième name :</p>
	<p><img src="images/formulaires_radio3.png" alt="" /></p>
	<ul>
		<li>Listes déroulantes :</li>
		<li>< select ></li>
			<ul>
				<li>< option <span class="green">selected</span> ><span class="commentaires_css">Option 1</span>< / option ></li>
				<li>< option <span class="green">value=</span>"<span class="commentaires_css">différence</span>" ><span class="commentaires_css">Option 2</span>< / option ></li>
			</ul>
		<li>< / select ></li>
	</ul>
	<p><img src="images/formulaires_select1.png" alt="" /><br /><img src="images/formulaires_select2.png" alt="" /></p>
	<ul>
		<li>Grouper les options :</li>
		<li>< optgroup ></li>
			<ul>
				<li>< option >< / option ></li>
			</ul>
		<li>< / optgroup ></li>
	</ul>
	<p><img src="images/formulaires_select3.png" alt="" /><br /><img src="images/formulaires_select4.png" alt="" /></p>
	<ul>
		<li>Regrouper les champs :</li>
		<li>< fieldset ></li>
			<ul>
				<li>< legend ><span class="commentaires_css">Légende</span>< / legend ></li>
			</ul>
		<li>< / fieldset ></li>
	</ul>
	<p><img src="images/formulaires_fieldset1.png" id="fieldset" alt="" /><br /><img src="images/formulaires_fieldset2.png" alt="" /></p>
	<ul>
		<li>Sélectionner automatiquement un champ : <span class="green">autofocus<span class="green"></li>
		<li>Rendre un champ obligatoire : <span class="green">required<span class="green"></li>
	</ul>
	<p><img src="images/formulaires_autofocus.png" alt="" /><br /><img src="images/formulaires_required.png" alt="" /></p>
	<p><img src="images/formulaires_css.png" alt="" /></p>
	<h3>Le bouton d'envoi</h3>
	<ul>
		<li>< input type=</li>
		<li>"submit" <span class="commentaires_css">(principal bouton d'envoi)</span></li>
		<li>"reset"</li>
		<li>"image" <span class="commentaires_css">(submit en image)</span></li>
		<li>"button" <span class="commentaires_css">(javascript)</span></li>
		<li><span class="green">value=</span>"<span class="commentaires_css">texte</span>"</li>
	</ul>
	<p><img src="images/formulaires_envoyer.png" alt="" /></p>
	<h2>Audio & Video</h2>
	<h3>Les formats</h3>
	<ul>
		<li>Formats audio :</li>
			<ul>
				<li>MP3 <span class="commentaires_css">(compatible et populaire)</span></li>
				<li>AAC <span class="commentaires_css">(Apple, bonne qualité)</span></li>
				<li>OGG <span class="commentaires_css">(libre de droits)</span></li>
				<li>WAV <span class="commentaires_css">(a éviter, non compréssé)</span></li>
				<li><a href="https://caniuse.com/#feat=mp3">Utiliser CANIUSE</a></li>
			</ul>
		<li>Formats video :</li>
			<ul>
				<li>Format conteneur : AVI, MP4, MKV…</li>
				<li>Un codec audio : MP3, AAC, OGG…</li>
				<li>Un codec video</li>
					<ul>
						<li>H.264 <span class="commentaires_css">(puissant, populaire mais pas totalement gratuit)</span></li>
						<li>Ogg Theora <span class="commentaires_css">(gratuit, libre, moins puissant, demande l'installation de programmes pour le lire)</span></li>
						<li>WebM <span class="commentaires_css">(gratuit, libre de droit, récent, sérieux)</span></li>
					</ul>
				<li><a href="https://caniuse.com/#feat=mpeg4">Utiliser CANIUSE</a></li>
				<li>Convertisseur : <a href="http://www.mirovideoconverter.com/">MIRO VIDEO CONVERTER</a></li>
			</ul>
	</ul>
	<h3>Insertion de l'audio</h3>
	<ul>
		<li>< audio src="audio.mp3" ></li>
			<ul>
				<li><span class="green">controls</span></li>
				<li><span class="green">width</span></li>
				<li><span class="green">loop</span></li>
				<li><span class="green">autoplay</span> <span class="commentaires_css">(à éviter)</span></li>
				<li><span class="green">preload</span>="auto" / "metadata" <span class="commentaires_css">(durée, ect.)</span> / "none" <span class="commentaires_css">(éviter de gaspiller de bande passante)</span></li>
			</ul>
		<li>< / audio ></li>
		<li>< audio src="audio.mp3" <span class="green">controls</span> >Veuillez mettre à jour votre navigateur !< / audio ></li>
	</ul>
	<p><img src="images/audio_1.png" alt="" /><br /><img src="images/audio_2.png" alt="" /></p>
	<h3>Insertion de la vidéo</h3>
	<ul>
		<li>< video src="video.webm" ></li>
			<ul>
				<li><span class="green">poster</span>="photo.jpg"</li>
				<li><span class="green">controls</span></li>
				<li><span class="green">width</span></li>
				<li><span class="green">height</span></li>
				<li><span class="green">loop</span></li>
				<li><span class="green">autoplay</span></li>
				<li><span class="green">preload</span>="auto" / "metadata" / "none"</li>
			</ul>
		<li>< / video ></li>
	</ul>
	<p><img src="images/video_1.png" alt="" /><br />
		<img src="images/video_2.png" id="key_peele" alt="" /></p>
	<h2 id="media_queries">Media Queries</h2>
	<h3>Appliquer une media query</h3>
	<ul>
		<li>Soit dans une nouvelle feuille de style CSS</li>
			<ul>
				<li>< link rel="stylesheet" <span class="green">media</span>="nouvelles conditions" href="nouvelle_feuille.css" / ></li>
			</ul>
		<li>Soit directement dans le CSS</li>
			<ul>
				<li><span class="fuchsia">@media</span> conditions</li>
				<li>{</li>
				<li>}</li>
			</ul>
	</ul>
	<p><img src="images/media_query1.png" alt="" /><br /><img src="images/media_query2.png" alt="" /></p>
	<h3>Les règles disponibles</h3>
	<ul>
		<li>color <span class="commentaires_css">(bits/pixels</span></li>
		<li>height <span class="commentaires_css">(et min-height, max-height, ect.)</span></li>
		<li>width <span class="commentaires_css">(et min-width, max-width, etc.)</span></li>
		<li>device-height <span class="commentaires_css">(hauteur du périphérique)</span></li>
		<li>device-width <span class="commentaires_css">(largeur du périphérique)</span></li>
		<li>orientation <span class="commentaires_css">(portrait ou paysage)</span></li>
		<li>media <span class="commentaires_css">(type d'écran)</span></li>
			<ul>
				<li>screen <span class="commentaires_css">(écran classique)</span></li>
				<li>handheld <span class="commentaires_css">(mobile)</span></li>
				<li>print <span class="commentaires_css">(impression)</span></li>
				<li>tv</li>
				<li>projection <span class="commentaires_css">(projecteur)</span></li>
				<li>all <span class="commentaires_css">(tous types d'écrans)</span></li>
			</ul>
		<li>min- ou max- sur la plupart des règles</li>
		<li>combinaisons :</li>
			<ul>
				<li>only</li>
				<li>and</li>
				<li>not</li>
			</ul>
	</ul>
	<p><img src="images/media_query3.png" alt="" /></p>
	<p><img src="images/media_query4.png" alt="" /></p>
	<h3>Media Queries et navigateurs mobiles</h3>
	<p><img src="images/media_query5.png" alt="" /></p>
	<p><img src="images/media_query6.png" alt="" /></p>
	<p><img src="images/media_query7.png" alt="" /></p>
	<h2 id="memos">Mémos HTML & CSS</h2>
	<ul>
		<li><a href="https://openclassrooms.com/fr/courses/1603881-apprenez-a-creer-votre-site-web-avec-html5-et-css3/1608357-memento-des-balises-html">Mémo balises HTML</a></li>
		<li><a href="https://openclassrooms.com/fr/courses/1603881-apprenez-a-creer-votre-site-web-avec-html5-et-css3/1608902-memento-des-proprietes-css">Mémo des balises CSS</a></li>
	</ul><br />
	<h2 id="formes">Formes CSS</h2>
	<ul>
		<li><p>Demis-cercles à gauche et à droite :</p><p><img src="images/formes_1.png" alt="" /></p></li>
	</ul><br />
	<h1>DECOUPER ET INTEGRER UNE MAQUETTE</h1><br />
	<h2 id="maquette_fonctionnement">Fonctionnement d'une maquette</h2>
	<ul>
		<li>Format à privilégier pour logos et icônes : <strong>SVG</strong>;</li>
		<li>Traduire en CSS le maximum de design possible ;</li>
		<li>Traduire les éléments visuels en HTML :<br />
			<ul>
				<li><p>Faire des dossiers des différentes sections de la page (du header au footer) ;</p><p><img src="images/maquette_1.png" alt="" /></p></li>
				<li><p>Traduire en HTML tous les éléments de la maquette (double clic sur l'élément pour le modifier) ;</p><p><img src="images/maquette_2.gif" alt="" /></p></li>
				<li><p>Faire une esquisse de la maquette ;</p><p><img src="images/maquette_3.png" alt="" /></p></li>
			</ul>
		</li>
		<li>Dimensions et proportions :
			<ul>
				<li><p>Pensez responsive en adaptant l'interface avec son support :</p><p><img src="images/maquette_4.png" alt="" /><img src="images/maquette_5.png" alt="" /><img src="images/maquette_6.png" alt="" /></p></li>
				<li><p>Noter la largeur de la grille (en pixels) :</p><p><img src="images/maquette_7.png" alt="" /></p></li>
				<li><p>Dimensions verticales : relevez les mesures de tous les éléments :</p><p><img src="images/maquette_8.png" alt="" /></p></li>
				<li>Les éléments traduisibles en CSS :
					<ul>
						<li><p>Un Guide des couleurs (part 2 & 3 en fin d'article : <a href="https://www.smashingmagazine.com/2010/01/color-theory-for-designers-part-1-the-meaning-of-color/" title="Color Theory for Designers, Part 1: The Meaning of Color" />Color Theory for Designers, Part 1: The Meaning of Color</a></li></p>
						<li>Palettes de couleurs : COULEURS > Pipette > RGB ou #000000 ;<br /><img src="images/maquette_9.png" alt=""><img src="images/maquette_10.png" alt="" /></li><br />
						<li>Trouver la police de caractères en double-cliquant sur le texte :<br /><img src="images/maquette_11.png" alt="" /><img src="images/maquette_12.png" alt="" /><img src="images/maquette_13.png" alt="" /></li><br />
						<li>Effets spéciaux à relever :<br /><img src="images/maquette_14.png" alt="" /><img src="images/maquette_15.png" alt="" /><img src="images/maquette_16.png" alt="" /><img src="images/maquette_17.png" alt="" /></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul><br />
	<h2 id="maquette_html">Mise en place du HTML & CSS</h2>
	<ul>
		<li><p>Les metatags :</p><p><img src="images/maquette_meta1.png" alt="" /><img src="images/maquette_meta1_1.png" alt="" /></p>
			<ul>
				<li><p>L'<strong>Open Graph</strong> de Facebook :</p><p><img src="images/maquette_meta2.png" alt="" /><img src="images/maquette_meta3.png" alt="" /></p></li>
				<li><p>Les <strong>Twitter Cards</strong> :</p><p><img src="images/maquette_meta4.png" alt="" /></p></li>
				<li><p>Le Web sémantique avec <strong>schema.org</strong> :</p><p><img src="images/maquette_meta5.png" alt="" /></p></li>
				<li>Liens :
					<ul>
						<li><a href="https://github.com/celine-m-s/metatags-101" title="Ressources metatags">Ressources metatags</a></li>
						<li><a href="https://developers.facebook.com/tools/debug/" title="Débogueur de Facebook">Débogueur de Facebook</a></li>
						<li><a href="https://www.abondance.com/20140627-14046-faut-il-integrer-les-balises-semantiques-schema-org-ses-pages.html" title="Article sur schema.org">Article sur schema.org</a></li>
						<li><a href="https://search.google.com/structured-data/testing-tool/u/0/" title="Structured Data Testing Tool ">Structured Data Testing Tool</a> : cherchez une page contenant des balises sémantiques et laissez Google vous afficher ce qu’il en a compris ;</li>
						<li><a href="https://raventools.com/site-auditor/seo-guide/schema-structured-data" title="Schema creator">Schema creator</a>  : créez vos premières balises sémantiques grâce à un formulaire qui vous affichera le code HTML correspondant.</li>
					</ul>
				</li>
			</ul>
		</li><br />
		<li><p>Intégrer une <strong>grille Bootstrap</strong> (voir chapitre sur Bootstrap :</p><p><img src="images/maquette_bootstrap.png" alt="" /></p></li><br />
		<li><p>Organisation du <strong>CSS</strong> :</p><p><img src="images/maquette_css1.png" alt="" /><img src="images/maquette_css2.png" alt="" /></p></li><br />
		<li><p>Changer la <strong>largeur du container</strong> <span class="commentaires_css">(celui de Bootstrap vaut 1170px, contre 1230px pour notre exemple)</span> :</p><p><img src="images/maquette_container1.png" alt="" /><img src="images/maquette_container2.png" alt="" /><img src="images/maquette_container3.png" alt="" /><img src="images/maquette_container4.png" alt="" /></p></li><br />
		<li><p><strong>Couleurs de fond</strong> :</p><p><img src="images/maquette_couleurs.png" alt="" /></p></li><br />
		<li><p>Dernières <strong>retouches</strong> :</p><p><img src="images/maquette_retouches.png" alt="" /></p></li>
	</ul><br />
	<p><a href="#memomento">REVENIR EN HAUT</a></p>
	</body>
</html>