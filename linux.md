----------** MEMENTO LINUX **----------

I) LA COMMANDE

Mode (vraie) Console = ctrl+alt+f2 = ouvrir / ctrl+alt+f1 = sortir
pour taper des chiffres dans la console : shift+chiffres au-dessus des lettres
(ne pas utiliser le pavé numérique)
(!) login en minuscule

Un « fichier caché » sous Linux est un fichier qui commence par un point.
Ce sont en général des fichiers de configuration de programmes.

Autocomplétion de commande : taper le début de la commande puis taper 2 fois Tab (->| à gauche du clavier)
ou s'il n'y a qu'une commande associée, le mot + 1 fois Tab (ex. dat => date)

Quelques raccourcis à connaître quand une liste s'affiche page par page :
• tapez Espace pour passer à la page suivante ;
• tapez Entrée pour aller à la ligne suivante ;
• tapez q pour arrêter la liste ;

Historique des commandes avec la flèche haut du pavé numérique ou la commande history
Ctrl + R : rechercher une commande tapée avec quelques lettres

◘ Raccourcis claviers pratiques

• Ctrl + L : efface le contenu de la console (comme la commande clear)
• Ctrl + D : envoie le message EOF (fin de fichier) à la console (commande exit)
• Shift + PgUp (flèche haut barrée de 3 barres) : vous permet de « remonter » dans les messages envoyés par la console. En mode graphique, la molette de la souris accomplit aussi très bien cette action
• Shift + PgDown : pareil, mais pour redescendre

Longue commande
• Ctrl + A : ramène le curseur au début de la commande (comme touche Origin, flèche à droite du bouton Fin)
• Ctrl + E : ramène le curseur à la fin de la ligne de commandes (comme touche Fin)
• Ctrl + U : supprime tout ce qui se trouve à gauche du curseur. Si celui-ci est situé à la fin de la ligne, cette dernière sera donc supprimée.
• Ctrl + K : supprime tout ce qui se trouve à droite du curseur. S'il est situé au début de la ligne, celle-ci sera donc totalement supprimée.
• Ctrl + W : supprime le premier mot situé à gauche du curseur. Un « mot » est séparé par des espaces ; on s'en sert en général pour supprimer le paramètre situé à gauche du curseur.
• Ctrl + Y : si vous avez supprimé du texte avec une des commandes Ctrl + U, Ctrl + K ou Ctrl + W qu'on vient de voir, alors le raccourci Ctrl + Y « collera » le texte que vous venez de supprimer. C'est donc un peu comme un couper-coller.


II) La structure des dossiers et fichiers

◘ Organisation des dossiers

Au lieu de séparer chaque disque dur, lecteur CD, lecteur de disquettes, lecteur de carte mémoire… Linux place en gros tout au même endroit.
Deux types de fichiers :
• classiques (.txt)
• spéciaux (représentent qqc : ex. lecteur CD)
Sous Linux, il n'y a qu'une et une seule racine : « / ».
Architecture des dossiers :
• C:\Program Files\Winzip (Windows)
• /usr/bin/ (linux)

◘ pwd & which : où… où suis-je ?

• pwd : afficher le dossier actuel
mateo21@mateo21-desktop:~$ = /home/mateo21 (~ = home, dossier perso)
mateo21@mateo21-desktop:~$ pwd
/home/mateo21

• which : connaître l'emplacement d'une commande
chaque commande sous Linux correspond à un programme. Ainsi, pwd est un programme.
Une commande n'est rien d'autre qu'un programme qu'on peut appeler n'importe quand et n'importe où dans la console.
La commande which prend un paramètre : le nom de la commande dont vous voulez connaître l'emplacement.
mateo21@mateo21-desktop:~$ which pwd
/bin/pwd
(!) les programmes sous Linux ne possèdent en général pas d'extension (contrairement à Windows où l'extension utilisée est en général .exe)

◘ ls : lister les fichiers et dossiers

Les dossiers apparaissent en bleu foncé. En bleu clair : raccourci vers un dossier qui se trouve en fait ailleurs sur le disque.

• -a : afficher tous les fichiers et dossiers cachés
mateo21@mateo21-desktop:~$ ls -a

• -F : indique le type d'élément
mateo21@mateo21-desktop:~$ ls -F
Desktop/  Examples@  images/  log/  tutos/

• -l : liste détaillée
mateo21@mateo21-desktop:~$ ls -l
total 16
drwxr-xr-x 2 mateo21 mateo21 4096 2007-09-24 17:22 Desktop

• -h : afficher la taille en Ko, Mo, Go…

• -t : trier par date de dernière modification
En pratique, je combine -t avec -r qui renverse l'ordre d'affichage des fichiers.
Je combine un peu tous les paramètres que l'on vient de voir, ce qui donne un beau ls -larth

◘ cd: changer de dossier

la commande cd (Change Directory) ne prend pas plein de paramètres mais juste un seul : le nom du dossier dans lequel vous souhaitez aller.
Si on veut aller à la racine, il suffit de taper cd / :
mateo21@mateo21-desktop:~$ cd /
mateo21@mateo21-desktop:/$ pwd
/
Allons dans le sous-dossier usr :
mateo21@mateo21-desktop:/$ cd usr
mateo21@mateo21-desktop:/usr$ ls -F
bin/  games/  include/  lib/  local/  sbin/  share/  src/  X11R6/
mateo21@mateo21-desktop:/usr$ cd games
mateo21@mateo21-desktop:/usr/games$
Pour revenir au dossier précédent, aussi appelé dossier parent, c'est-à-dire /usr :
mateo21@mateo21-desktop:/usr/games$ cd ..
mateo21@mateo21-desktop:/usr$
Si on avait voulu reculer de deux dossiers parents, on aurait écrit../..(« reviens en arrière, puis reviens en arrière »). Cela nous aurait ramené à la racine :
mateo21@mateo21-desktop:/usr/games$ cd ../..
mateo21@mateo21-desktop:/$

Il y a en fait deux façons de changer de dossier : en indiquant un chemin relatif, ou en indiquant un chemin absolu.

• chemin relatif 
on utilise un chemin relatif, c'est-à-dire relatif au dossier actuel

• chemin absolu
Un chemin absolu commence toujours par la racine (/). Vous devez ensuite faire la liste des dossiers dans lesquels vous voulez entrer. Par exemple, supposons que je sois dans/home/mateo21et que je souhaite aller dans/usr/games. Avec un chemin absolu :
mateo21@mateo21-desktop:~$ cd /usr/games
mateo21@mateo21-desktop:/usr/games$
Si on avait voulu faire la même chose à coup de chemin relatif, il aurait fallu écrire :
mateo21@mateo21-desktop:~$ cd ../../usr/games/
mateo21@mateo21-desktop:/usr/games$
Ce qui signifie « reviens en arrière (donc dans/home) puis reviens en arrière (donc dans/), puis va en avant dans usr, puis va en avant dans games ».

• retour au répertoire home/
mateo21@mateo21-desktop:/usr/games$ cd /home/mateo21/ (brutale)
mateo21@mateo21-desktop:/usr/games$ cd ~ (maligne)
mateo21@mateo21-desktop:/usr/games$ cd (super maligne : cd sans rien)

• Autocomplétion du chemin
L'autocomplétion de chemin fonctionne de la même manière que l'autocomplétion de commande qu'on a vue dans le chapitre précédent : avec la touche Tab
mateo21@mateo21-desktop:~$ cd /usr
mateo21@mateo21-desktop:/usr$ cd ga(+ Tab)
mateo21@mateo21-desktop:/usr$ cd games/
Appuyer 2 fois sur Tab s'il y a plusieurs éléments proposés
mateo21@mateo21-desktop:/usr$ cd l
lib/   local/
mateo21@mateo21-desktop:/usr$ cd l(o + Tab)cal/

◘ du: taille occupée par les dossiers

• -h : la taille pour les humains
mateo21@mateo21-desktop:~$ du -h
400K    ./.Trash
4,0K    ./.themes

• -a : afficher la taille des dossiers ET des fichiers
mateo21@mateo21-desktop:~$ du -ah
...
8,0K    ./.jedit/settings-backup/abbrevs~5~
24K     ./.jedit/settings-backup/history~1~

• -s : avoir juste le grand total
Pour n'avoir que l'espace total occupé par le dossier et donc ne pas afficher le détail des sous-dossiers, utilisez -s
mateo21@mateo21-desktop:~$ du -sh
81M     .


III) MANIPULER DES FICHIERS

◘ cat & less : afficher un fichier

mateo21@mateo21-desktop:~$ cd /var/log

• cat : afficher tout le fichier
mateo21@mateo21-desktop:/var/log$ cat syslog
Elle est plus adaptée lorsque l'on travaille sur de petits fichiers que sur des gros, car dans un cas comme celui-là, on n'a pas le temps de lire tout ce qui s'affiche à l'écran.
On notera quand même le paramètre -n qui permet d'afficher les numéros de ligne :
mateo21@mateo21-desktop:/var/log$ cat -n syslog

• less : afficher le fichier page par page
La grosse différence entre less et cat, c'est que less affiche progressivement le contenu du fichier, page par page. Ça laisse le temps de le lire dans la console.
mateo21@mateo21-desktop:/var/log$ less syslog
Comment lire la suite ?

• Les raccourcis basiques indispensables
○ Espace : affiche la suite du fichier. fait défiler le fichier vers le bas d'un « écran » de console.
○ Entrée : affiche la ligne suivante. 
○ d : affiche les onze lignes suivantes (soit une moitié d'écran). 
○ b : retourne en arrière d'un écran. (ou touche Page Up)
○ y : retourne d'une ligne en arrière (ou flèche haut)
○ u : retourne en arrière d'une moitié d'écran (onze lignes).
○ q : arrête la lecture du fichier. Cela met fin à la commande less.

• Quelques raccourcis plus avancés
○ = : indique où vous en êtes dans le fichier (numéro des lignes affichées et pourcentage)
○ h : affiche l'aide (toutes les commandes que je vous apprends ici, je les tire de là). Tapez q pour sortir de l'aide.
○ / : tapez / suivi du texte que vous recherchez pour lancer le mode recherche. Faites Entrée pour valider.
Expressions régulières acceptées.
○ n : après avoir fait une recherche avec/, la touche n vous permet d'aller à la prochaine occurrence de votre recherche. 
○ N : pareil que n, mais pour revenir en arrière.