# MEMENTO UML

## UML ?

**Phase d’analyse de besoins + analyse de la solution**
+ Comprendre et à décrire de façon précise les besoins des utilisateurs ou des clients.
+ Qui sont les utilisateurs ?
+ Que souhaitent-ils faire avec le logiciel ?
+ Quelles fonctionnalités veulent-ils ?
+ Pour quel usage ? 
+ Comment l’action devrait-elle fonctionner ?


## La démarche

### Les étapes

1. Décrire le contexte du logiciel à créer **[diagramme de contexte]**
* à qui le logiciel devra servir ?
* quels sont les acteurs et éléments environnants au système ?
* indiquera qui aura une utilité du futur logiciel
* personas
2. Décomposition en packages **[diagramme de packages]**
* réfléchir à des « familles » de fonctionnalités qui seraient nécessaires
* quelles sont les grandes parties qui doivent composer le logiciel ?
* pour une partie précise, qui, parmi les acteurs identifiés (ou utilisateurs) l’utilisera ?
* *ex. : la partie « Accueil », la partie « Mise en page », la partie « Publipostage », etc.*
* *la partie « Accueil » sera utilisé aussi bien par un rédacteur que par un vérificateur ou un lecteur.*
3. Définir les cas d’utilisation principaux **[diagramme de cas d’utilisation initial]**
* QUI devra pouvoir faire QUOI grâce à cette partie du logiciel ?
* met en évidence de quelle façon les acteurs utiliseront le logiciel
* illustrer ce que le logiciel doit permettre de faire
* les fonctionnalités ou lots d’actions que devront réaliser nos acteurs
* *ex. dans la partie «Accueil», le rédacteur peut écrire du texte, changer la police et la couleur du texte, aligner le texte, etc.*
4. Définir les cas d'utilisation internes **[diagramme de cas d'utilisation détaillé]**
* préciser les cas d'utilisation principaux
* établir des profils génériques
* *ex. Commercial ⇾ Acheteur ⇽ Client (Client est une spécialisation de Acheteur)*
* approfondir les branches des utilisations
* *ex. enregistrer un achat -- include -→ constituer un panier*
5. Décrire l’interaction entre les acteurs et le système **[diagramme d'activité]**
* procéder à la description textuelle d’un cas d’utilisation
* décrire la chronologie des actions qui devront être réalisées par les acteurs et par le système lui-même
* 1) l'identification : contexte et pré-conditions *(conditions qui doivent être vérifiées avant le démarrage du cas d'utilisation. ex. : authentification)*
* 2) description des scénarios : nominal *(scénario logique)*, alternatifs *(actions utilisateur)*, d'exception *(imprévus ou actions système)*
* 3) la fin *(situations d'arrêt)* et les post-conditions *(résultats tangibles)*
* 4) compléments : ergonomie, performance attendue, contraintes à respecter, problèmes non résolus, ect.
* 4) le transcrire visuellement avec un diagramme d'activité


## Les relations stéréotypées

> Elles définissent le type de lien entre les cas d’utilisation

### La relation de type « include »

* Le cas d’utilisation source (départ de la flèche) contient **TOUJOURS** le cas d’utilisation inclus
* Cas d’utilisation 1 -> inclut -> cas d’utilisation 2 (interne)
* *ex. le cas d’utilisation source « Enregistrer un achat » contiendra TOUJOURS le cas d’utilisation « Constituer un panier »*
```
Un include signifie que lorsque tu réalises une action, une autre doit se faire plus ou moins en même temps (quand je valide ma commande je dois payer => include)
```

### La relation « extend »

* Utilisée pour indiquer que le cas d’utilisation source (à l’origine de la flèche) n’est **pas toujours nécessaire** au cas d’utilisation principal, mais qu’il peut l’être dans certaines situations
* Cas d’utilisation 2 (interne) -> étend -> cas d’utilisation 1
* Cas d'utilisation 1 peut éventuellement avoir besoin de cas d'utilisation 2 (interne)
* *ex. le cas d’utilisation interne « Sélectionner le client » n’étant pas une action obligatoire au cas d’utilisation principal « Enregistrer un achat »*
* Dès lors qu’il y a une relation « extend », il faudra toujours définir la condition, c’est-à-dire : à quelle condition cette relation peut avoir lieu ?
* Pour indiquer cela, il faut ajouter une ligne « extension points » et définir la condition « EXT »
* *ex. EXT1 : Si acteur = commercial*
```
Un exclude signifie que lorsque tu réalises une action, une autre devient accessible
```

### La spécialisation des cas d’utilisation

* *ex. enregistrement règlement chèque ⇾ enregistrement règlement ⇽ enregistrement règlement CB*
* variantes du cas d’utilisation « Enregistrement règlement » → je crée donc deux nouveaux cas d’utilisation, qui sont des spécialisations de « enregistrement règlement »
* Dans une relation stéréotypée, un cas d’utilisation a besoin d’un autre cas d’utilisation, soit toujours (« include ») ou sous certaines conditions (« extend »)
* Dans une spécialisation, on indique que les cas d’utilisation spécialisés sont des versions différentes du cas d’utilisation générique
* Chacun des cas d’utilisation spécialisés nécessite plusieurs actions

## Diagramme de classes

* Chaque classe doit posséder une identité, attribut unique qui la caractérise
* Si une classe ne possède pas d'identité, on ne rajoute pas d'attribut id (qui n'est pas pertinent pour la classe, mais pour la base de données)
* Tout ce qui relève de la BDD (primary key, foreign key) n'appartient pas au diagramme de classe
* Il y a association lorsqu'une classe A se sert d'une classe B
```
A 1 ---- collecter ---→ 2..* B (A collecte entre 2 et une multitude de B)
(B est collecté par 1 A)
```
* Une agrégation est une association particulière : il y a agrégation entre A et B si l'objet A possède une ou plusieurs instances de B
```
Cours <>---- concerner ---- 5...* Etudiant
[si le cours est supprimé, l'étudiant continue sa vie]

Voiture <>---- posséder ---- 2...* Roue
[une roue peut exister indépendemment d'une Voiture : vélo, véhicule, balançoire, ect.]
```
* Une composition est une agrégation particulière : il y a composition entre A et B si toutes les instances de B contenues dans A sont supprimées lorsque A est supprimée.
```
Livre ◄--- contenir ---- 1..* Page (le livre contient entre 1 et une multitude de pages)
[si le livre est détruit, les pages aussi]

Dossier ◄--- contenir ---- * Fichier
[la destruction du dossier entraine la destruction des fichiers]
```


## Vocabulaire

+ **système** : ce qu’on doit analyser, concevoir et réaliser (ex. : site de vente en ligne)
+ **acteur** : entité (humain ou non) qui aura une interaction avec le système
+ **acteurs principaux** : agissent directement sur le système (ex. utilisateurs)
+ **acteurs secondaires** : n’ont pas de besoin direct d’utilisation (ex. un autre système (logiciel) avec lequel le nôtre doit échanger des informations, comme un système bancaire de type Paypal)
+ **lot d’actions** : fonctionnalité dont certains acteurs principaux ont besoin


## Ressources

+ https://openclassrooms.com/fr/courses/2035826-debutez-lanalyse-logicielle-avec-uml
+ https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/1667684-uml-presentation-1-2
+ http://uml.free.fr/cours/p15.html
+ http://staruml.io/
+ UML Use Case Diagram Tutorial : https://www.youtube.com/watch?v=zid-MVo7M-E&feature=emb_rel_end
+ UML Class Diagram Tutorial : https://www.youtube.com/watch?v=UI6lqHOVHic
+ tuto_ModelisationUML : https://github.com/iblasquez/tuto_ModelisationUML/blob/master/Modelio/Modelio_Classes.md
+ https://github.com/iblasquez/tuto_ModelisationUML/tree/master/Modelio


## MODELIO

* https://www.modelio.org/
* https://www.modelio.org/resources-menu/videos.html
* les projets sont stoqués dans : C:\Users\pablo\modelio\workspace
* on peut changer l'emplacement du workplace (au démarrage de l'appli > File > Switch workplace)
* mais on ne peut pas changer l'emplacement d'UN projet
* pour exporter le projet, tout fermer, revenir, cliquer sur le projet, puis exporter
* https://www.modelio.org/tutorials/how-to-create-uml-use-case-diagram.html
* La fenêtre "Symbol" pour modifier les éléments se déroule sur la droite de l'interface
* Créer un Système pour un Diagramme de contexte > créer un acteur > clic-droit > add sterotype > System > fenêtre Symbol > Representation > Image (or structured)
* Changer l'odre des attributs/méthodes dans une classe > Sélectionner la classe dans le Model Navigateur (barre de gauche) > sélectionner l'attribut > cliquer sur la flèche jaune ↓ ↑ du Model Navigateur