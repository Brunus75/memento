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


## Les relations stéréotypées

> Elles définissent le type de lien entre les cas d’utilisation

### La relation de type « include »

* Le cas d’utilisation source (départ de la flèche) contient **TOUJOURS** le cas d’utilisation inclus
* Cas d’utilisation 1 -> inclut -> cas d’utilisation 2 (interne)
* *ex. le cas d’utilisation source « Enregistrer un achat » contiendra TOUJOURS le cas d’utilisation « Constituer un panier »*

### La relation « extend »

* Utilisée pour indiquer que le cas d’utilisation source (à l’origine de la flèche) n’est **pas toujours nécessaire** au cas d’utilisation principal, mais qu’il peut l’être dans certaines situations
* Cas d’utilisation 2 (interne) -> étend -> cas d’utilisation 1
* Cas d'utilisation 1 peut éventuellement avoir besoin de cas d'utilisation 2 (interne)
* *ex. le cas d’utilisation interne « Sélectionner le client » n’étant pas une action obligatoire au cas d’utilisation principal « Enregistrer un achat »*
* Dès lors qu’il y a une relation « extend », il faudra toujours définir la condition, c’est-à-dire : à quelle condition cette relation peut avoir lieu ?
* Pour indiquer cela, il faut ajouter une ligne « extension points » et définir la condition « EXT »
* *ex. EXT1 : Si acteur = commercial*

### La spécialisation des cas d’utilisation

* *ex. enregistrement règlement chèque ⇾ enregistrement règlement ⇽ enregistrement règlement CB*
* variantes du cas d’utilisation « Enregistrement règlement » → je crée donc deux nouveaux cas d’utilisation, qui sont des spécialisations de « enregistrement règlement »
* Dans une relation stéréotypée, un cas d’utilisation a besoin d’un autre cas d’utilisation, soit toujours (« include ») ou sous certaines conditions (« extend »)
* Dans une spécialisation, on indique que les cas d’utilisation spécialisés sont des versions différentes du cas d’utilisation générique
* Chacun des cas d’utilisation spécialisés nécessite plusieurs actions


## Vocabulaire

+ **système** : ce qu’on doit analyser, concevoir et réaliser (ex. : site de vente en ligne)
+ **acteur** : entité (humain ou non) qui aura une interaction avec le système
+ **acteurs principaux** : agissent directement sur le système (ex. utilisateurs)
+ **acteurs secondaires** : n’ont pas de besoin direct d’utilisation (ex. un autre système (logiciel) avec lequel le nôtre doit échanger des informations, comme un système bancaire de type Paypal)
+ **lot d’actions** : fonctionnalité dont certains acteurs principaux ont besoin