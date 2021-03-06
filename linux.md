# MEMENTO LINUX

## SOMMAIRE

* [RAPPELS](#rappels)
* [LA COMMANDE](#la-commande)
* [La structure des dossiers et fichiers](#structure-fichiers)
* [MANIPULER DES FICHIERS](#manipuler-des-fichiers)
* [UTILISATEURS & DROITS](#users-droits)
* [Nano, l'éditeur de texte du débutant](#nano)
* [Installer des programmes avec apt-get](#apt-get)
* [RTFM : lisez le manuel !](#rtfm)
* [Rechercher des fichiers](#rechercher-des-fichiers)
* [Extraire, trier et filtrer des données](#extraire-data)
* [Les flux de direction](#flux-direction)
* [Surveiller l'activité du système](#surveiller-systeme)
* [Exécuter des programmes en arrière-plan](#programmes-arriere)
* [Exécuter un programme à une heure différée](#programme-heure-diff)
* [ARCHIVER ET COMPRESSER](#archiver-et-compresser)
* [La connexion sécurisée à distance avec SSH](#ssh)
* [Transférer des fichiers](#transfert-fichiers)
* [Analyser le réseau et filtrer le trafic avec un pare-feu](#analyser-reseau)
* [Compiler un programme depuis les sources](#compiler-programme)

## RAPPELS

* .. signifie « dossier précédent »
* . signifie « dossier dans lequel je me trouve »
* Tab pour l'autocomplétion ! 
* remonter un résultat : maj + pageUp

## LA COMMANDE
```
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
```

## <a name="structure-fichiers"></a> La structure des dossiers et fichiers
```
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
```

## MANIPULER DES FICHIERS
```
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

◘ head & tail : afficher le début et la fin d'un fichier

• head : afficher le début du fichier
La commande head affiche seulement les premières lignes du fichier. Elle ne permet pas de se déplacer dans le fichier comme less, mais juste de récupérer les premières lignes.

mateo21@mateo21-desktop:/var/log$ head syslog
Nov 14 00:44:23 mateo21-desktop syslogd 1.4.1#21ubuntu3: restart.

Paramètres : -n, suivi d'un nombre. Il permet d'afficher le nombre de lignes que vous voulez. Par exemple, si vous ne voulez que les trois premières lignes, tapez :
mateo21@mateo21-desktop:/var/log$ head -n 3 syslog
Nov 14 00:44:23 mateo21-desktop syslogd 1.4.1#21ubuntu3: restart.
Nov 14 00:44:23 mateo21-desktop anacron[6725]: Job `cron.daily' terminated
Nov 14 00:44:23 mateo21-desktop anacron[6725]: Normal exit (1 job 

• tail : afficher la fin du fichier
la commande tail vous renvoie la fin du fichier, donc les dernières lignes.
mateo21@mateo21-desktop:/var/log$ tail syslog
On peut là encore utiliser -n suivi d'un nombre pour afficher les $x$ dernières lignes :
mateo21@mateo21-desktop:/var/log$ tail -n 3 syslog
Autre paramètre : -f
Ce paramètre magique ordonne à tail de « suivre » la fin du fichier au fur et à mesure de son évolution.
Ctrl + C pour arrêter la commande tail

(!) Ctrl + C est utilisable dans la plupart des programmes console pour demander leur arrêt.

Par défaut, tail -f recherche les nouveaux changements dans le fichier toutes les secondes. Si vous voulez, vous pouvez rajouter le paramètre -s suivi d'un nombre. Par exemple,tail -f -s 3 syslog recherchera les changements toutes les trois secondes (plutôt que toutes les secondes)

◘ touch & mkdir : créer des fichiers et dossiers

• touch : créer un fichier
La commande attend un paramètre : le nom du fichier à créer.
mateo21@mateo21-desktop:/var/log$ cd
mateo21@mateo21-desktop:~$
mateo21@mateo21-desktop:~$ touch fichierbidon
mateo21@mateo21-desktop:~$ ls -F
Desktop/    Examples@     images/  log/      Musique/  tutos/
Documents/  fichierbidon  Images/  Modèles/  Public/   Vidéos/
Vous pouvez créer un fichier de l'extension que vous voulez :
mateo21@mateo21-desktop:~$ touch autrefichierbidon.txt
Vous pouvez créer plusieurs fichiers en une seule commande :
touch fichierbidon autrefichierbidon.txt
Et si je veux que mon fichier contienne un espace, je fais comment ?
touch "Fichier bidon"

• mkdir : créer un dossier
mkdir mondossier autredossier
Il y a un paramètre utile avec mkdir : -p. Il sert à créer tous les dossiers intermédiaires. 
mkdir -p animaux/vertebres/chat
… créera le dossier animaux, puis à l'intérieur le sous-dossier vertebres, puis à l'intérieur encore le sous-dossier chat !

◘ cp & mv : copier et déplacer un fichier

• cp : copier un fichier
cp fichierbidon fichiercopie
Le premier paramètre est le nom du fichier à copier, le second le nom de la copie du fichier à créer.
En faisant cela, on aura donc deux fichiers identiques dans le même répertoire : fichierbidon et fichiercopie.

○ Copier dans un autre dossier :
si je veux copier fichierbidon dans le sous-dossier mondossier que j'ai créé tout à l'heure :
cp fichierbidon mondossier/
Le fichier fichierbidon sera copié dans mondossier sous le même nom
Si vous voulez copier fichierbidon dans mondossier sous un autre nom, faites comme ceci :
cp fichierbidon mondossier/fichiercopie
cp fichierbidon /var/log/
… copierafichierbidondans le dossier/var/log.

○ Copier des dossiers :
Avec l'option-R, vous pouvez copier un dossier, ainsi que tous les sous-dossiers et fichiers qu'il
contient !
cp -R animaux autresanimaux
… cela aura pour effet de copier animaux ainsi que tous ses sous-dossiers sous le nom autresanimaux.

○ Utiliser le joker*
Le symbole * est appelé joker, ou encore wildcard en anglais sous Linux.
Il vous permet de copier par exemple tous les fichiers image .jpg dans un sous-dossier :
cp *.jpg mondossier/
Pour copier tous les fichiers dont le nom commence par « so » :
cp so* mondossier/

• mv : déplacer un fichier
2 utilités :
- déplacer un fichier (ou un dossier) ;
- renommer un fichier (ou un dossier).

○ Déplacer un fichier 
mv fichierbidon mondossier/
Vous pouvez déplacer des dossiers aussi simplement :
mv animaux/ mondossier/
Vous pouvez aussi utiliser les jokers :
mv *.jpg mondossier/

○ Renommer un fichier 
mv fichierbidon superfichier
… renommera fichierbidon en superfichier. Après cette commande, fichierbidon n'existe plus, il a été renommé.

○ Déplacer et renommer un fichier à la fois
Vous pouvez aussi déplacer fichierbidon dans mondossier tout en lui affectant un nouveau nom :
mv fichierbidon mondossier/superfichier

◘ rm : supprimer des fichiers et dossiers

(!) il n'existe pas de corbeille dans la console de Linux :
le fichier est directement supprimé sans possibilité de récupération !

• rm : supprimer un fichier
rm fichierbidon
rm fichierbidon fichiercopie

○ -i : demander confirmation
mateo21@mateo21-desktop:~$ rm -i fichierbidon
rm: détruire fichier régulier vide `fichierbidon'?
o/y ou n + Entrée

○ -f : forcer la suppression, quoi qu'il arrive (à utiliser le plus rarement possible)
rm -f fichierbidon

○ -v : dis-moi ce que tu fais, petit cachotier
Le paramètre -v (Verbose, verbeux en anglais, c'est-à-dire « parler beaucoup »)
est un paramètre que l'on retrouve dans beaucoup de commandes sous Linux.
Il permet de demander à la commande de dire ce qu'elle est en train de faire.
mateo21@mateo21-desktop:~$ rm -v fichierbidon fichiercopie
détruit `fichierbidon'
détruit `fichiercopie'

○ -r : supprimer un dossier et son contenu
rm -r animaux/
… supprime le dossier animaux ainsi que tout ce qu'il contenait (sous-dossiers vertebres et chat)
Aussi : rmdir. La grosse différence avec rm -r, c'est que rmdir ne peut supprimer un dossier que s'il est vide

○ rm et le joker de la mort (qui tue)
NON NON NON NE FAITES JAMAIS CA !!! => rm -rf /*
rm : commande la suppression ;
-r : supprime de manière récursive tous les fichiers et dossiers ;
-f : force la suppression sans demander la moindre confirmation ;
/* : supprime tous les fichiers et dossiers qui se trouvent à la racine (/) quel que soit leur nom (joker *)

◘ ln : créer des liens entre fichiers

Elle permet de créer des raccourcis. On peut créer deux types de liens :
- des liens physiques ;
- des liens symboliques.

○ Créer des liens physiques 
Plus rarement utilisé que le lien symbolique
Un lien physique permet d'avoir deux noms de fichiers qui partagent exactement le même contenu,
c'est-à-dire le même inode
Ainsi, que vous passiez par fichier1 ou par fichier2, vous modifiez exactement le même contenu.
mkdir tests
cd tests
touch fichier1
ln fichier1 fichier2
mateo21@mateo21-desktop:~/tests$ ls -l
total 0
-rw-r--r-- 2 mateo21 mateo21 0 2008-07-31 13:55 fichier1
-rw-r--r-- 2 mateo21 mateo21 0 2008-07-31 13:55 fichier2
La seconde colonne de la liste (qui indique « 2 » pour chacun des fichiers) correspond au nombre de fichiers qui
partagent le même inode.
Le seul moyen de vérifier que ces fichiers partagent le même contenu, c'est de faire ls -i pour afficher les numéros
d'inode correspondants et de vérifier que ces deux fichiers sont associés au même inode.

○ Créer des liens symboliques 
Le principe du lien symbolique est que l'on crée un lien vers un autre nom de fichier. 
Cette fois, on pointe vers le nom de fichier et non vers l'inode directement (figure suivante).
rm fichier2
Créons maintenant un nouveau fichier2, cette fois sous forme de lien symbolique.
On utilise là encore la commande ln, mais avec le paramètre -s (s comme symbolique) :
ln -s fichier1 fichier2
mateo21@mateo21-desktop:~/tests$ ls -l
total 0
-rw-r--r-- 1 mateo21 mateo21 0 2008-07-31 13:55 fichier1
lrwxrwxrwx 1 mateo21 mateo21 8 2008-07-31 14:15 fichier2 -> fichier1
-> la toute première lettre de la seconde ligne est un l (comme link, c'est-à-dire lien) ;
-> tout à la fin de la seconde ligne, une flèche montre clairement que fichier2 pointe vers fichier1.

Si vous supprimez fichier2, il ne se passe rien de mal. 
Par contre, si vous supprimez fichier1, fichier2 pointera vers un
fichier qui n'existe plus. 
Le lien symbolique sera cassé et ne servira donc plus à rien. On parle de « lien mort » ;
D'autre part, l'avantage des liens symboliques est qu'ils fonctionnent aussi sur des répertoires,
contrairement aux liens physiques.
```

## <a name="users-droits"></a> UTILISATEURS & DROITS
```
Linux est un système multi-utilisateurs. 
Cela signifie que plusieurs personnes peuvent travailler simultanément sur le même OS, 
en s'y connectant à distance notamment.

◘ sudo: exécuter une commande en root

Il y a un utilisateur « spécial », root, aussi appelé superutilisateur. 
Celui-ci a tous les droits sur la machine.

• sudo : devenir root un instant
Cette commande signifie « Faire en se substituant à l'utilisateur » : Substitute User DO.
sudo commande
mateo21@mateo21-desktop:/home$ sudo ls
[sudo] password for mateo21:
autredossier Desktop Examples Images Modèles Musique tutos
autresanimaux Documents images log mondossier Public Vidéos

• sudo su : devenir root et le rester
mateo21@mateo21-desktop:/home$ sudo su
[sudo] password for mateo21:
root@mateo21-desktop:/home#
Le symbole # à la fin de l'invite de commandes vous indique que vous êtes devenus superutilisateur.
Pour quitter le « mode root », tapez exit (ou faites la combinaison Ctrl + D).
root@mateo21-desktop:/home/mateo21# exit
exit
mateo21@mateo21-desktop:~$

◘ adduser : gestion des utilisateurs

• adduser : ajouter un utilisateur
Vous devez au minimum fournir un paramètre : le nom de l'utilisateur à créer.
root@mateo21-desktop:/home# adduser patrick
Ajout de l'utilisateur « patrick »...
Ajout du nouveau groupe « patrick » (1001)...
Ajout du nouvel utilisateur « patrick » (1001) avec le groupe « patrick »...
Création du répertoire personnel « /home/patrick »...
Copie des fichiers depuis « /etc/skel »...
Rajouter un sudo devant la commande si vous n'êtes pas déjà root ; pour cela, tapez sudo adduser patrick
Le répertoire personnel de patrick est automatiquement créé (/home/patrick) et son compte est préconfiguré.
On vous demande ensuite de taper son mot de passe :
Entrez le nouveau mot de passe UNIX :
Retapez le nouveau mot de passe UNIX :
passwd : le mot de passe a été mis à jour avec succès

• passwd : changer le mot de passe
S'il était nécessaire de changer le mot de passe de patrick par la suite,
utilisez la commande passwd en indiquant en paramètre le nom du compte à modifier.
root@mateo21-desktop:/home# passwd patrick
Entrez le nouveau mot de passe UNIX :
Retapez le nouveau mot de passe UNIX :
passwd : le mot de passe a été mis à jour avec succès
(!) sans compte en paramètre, vous modifiez le password du compte connecté (peut-être root)

• deluser : supprimer un compte
deluser patrick
(!) Ne jamais supprimer son compte utilisateur 
Si vous voulez supprimer aussi son home et tous ses fichiers personnels, utilisez le paramètre --remove-home :
deluser --remove-home patrick

◘ addgroup : gestion des groupes

Si vous ne définissez rien, un groupe du même nom que l'utilisateur sera automatiquement créé :
ainsi, mateo21 appartient au groupe mateo21 et patrick au groupe patrick.
root@mateo21-desktop:~# cd /home
root@mateo21-desktop:/home# ls -l
total 24
drwx------ 2 root root 16384 2007-09-19 18:22 lost+found
drwxr-xr-x 65 mateo21 mateo21 4096 2007-11-15 22:40 mateo21
drwxr-xr-x 2 patrick patrick 4096 2007-11-15 23:00 patrick
=> la 3ème colonne indique le propriétaire du fichier ou dossier ;
=> la 4ème indique le groupe qui possède ce fichier ou dossier.

• addgroup : créer un groupe
Vous avez juste besoin de spécifier le nom de celui-ci en paramètre :
root@mateo21-desktop:/home# addgroup amis
Ajout du groupe « amis » (identifiant 1002)...
Terminé.

• usermod : modifier un utilisateur
Possède plusieurs paramètres, dont :
-l : renomme l'utilisateur (le nom de son répertoire personnel ne sera pas changé par contre) ;
-g : change de groupe.
Si je veux mettre patrick dans le groupe amis, je ferai donc comme ceci :
usermod -g amis patrick
Et pour remettre patrick dans le groupe patrick comme il l'était avant :
usermod -g patrick patrick
(!) Il est aussi possible de faire en sorte qu'un utilisateur appartienne à plusieurs groupes. 
Pour ce faire, utilisez le paramètre -G (majuscule).
Exemple : usermod -G amis,paris,collegues patrick.
Séparez les noms des groupes par une virgule, sans espace entre chaque nom de groupe.
(!!) Lorsque vous avez recours à -G, l'utilisateur change de groupe et ce peu importe les groupes auxquels il
appartenait auparavant.
Si vous voulez ajouter des groupes à un utilisateur (sans perdre les groupes auxquels il appartenait avant cela),
utilisez -a :
usermod -aG amis patrick

• delgroup : supprimer un groupe
Si vous voulez supprimer un groupe, c'est tout simple :
delgroup amis

◘ chown : : gestion des propriétaires d'un fichier

Seul l'utilisateur root peut changer le propriétaire d'un fichier.
mateo21@mateo21-desktop:~$ ls -l rapport.txt (fichier à donner à Patrick)
-rw-r--r-- 1 mateo21 mateo21 0 2007-11-15 23:14 rapport.txt
(!) ls -l +fichier n'affiche que le fichier (ls -l *.jpg afficherait uniquement les images JPEG contenues dans ce
dossier)

• chown : changer le propriétaire d'un fichier
La commande chown, qui doit être utilisée en tant que root, attend deux paramètres au moins :
le nom du nouveau propriétaire ;
le nom du fichier à modifier.
chown patrick rapport.txt
On peut voir ensuite que patrick est bien le nouveau propriétaire du fichier :
root@mateo21-desktop:/home/mateo21# ls -l rapport.txt
-rw-r--r-- 1 patrick mateo21 0 2007-11-15 23:14 rapport.txt
Seulement… il appartient toujours au groupe mateo21 !

• chgrp : changer le groupe propriétaire d'un fichier
chgrp s'utilise exactement de la même manière que chown à la différence près qu'il affecte cette fois le groupe
propriétaire d'un fichier.
chgrp amis rapport.txt
root@mateo21-desktop:/home/mateo21# ls -l rapport.txt
-rw-r--r-- 1 patrick amis 0 2007-11-15 23:14 rapport.txt

• chown peut aussi changer le groupe propriétaire d'un fichier !
chown patrick:amis rapport.txt
Cela affectera le fichier à l'utilisateur patrick et au groupe amis.
Il suffit de séparer par un symbole deux points (« : ») le nom du nouvel utilisateur (à gauche)
et le nom du nouveau groupe (à droite).

• -R : affecter récursivement les sous-dossiers
L'option -R de chown modifie tous les sous-dossiers et fichiers contenus dans un dossier pour y affecter un nouvel
utilisateur (et un nouveau groupe si on utilise la technique du deux points que l'on vient de voir).
Par exemple, si je veux donner tout le contenu du dossier personnel de patrick à mateo21 (et au
groupe mateo21), c'est très simple :
chown -R mateo21:mateo21 /home/patrick/

◘ chmod : modifier les droits d'accès

• Le fonctionnement des droits 
1ère colonne :
drwxr-xr-x 2 mateo21 mateo21 4096 2007-11-13 21:53 Desktop
On peut voir cinq lettres différentes. Voici leur signification :
- d (Directory) : indique si l'élément est un dossier ;
- l (Link) : indique si l'élément est un lien (raccourci) ;
- r (Read) : indique si on peut lire l'élément ;
- w (Write) : indique si on peut modifier l'élément ;
- x (eXecute) : si c'est un fichier, « x » indique qu'on peut l'exécuter. 
Ce n'est utile que pour les fichiers exécutables (programmes et scripts).
Si c'est un dossier, « x » indique qu'on peut le « traverser », c'est-à-dire qu'on peut voir les sous-dossiers qu'il
contient si on a le droit de lecture dessus.
Si la lettre apparaît, c'est que le droit existe. S'il y a un tiret à la place, c'est qu'il n'y a aucun droit.
Le premier élément d mis à part, on constate que r, w et x sont répétés trois fois en fonction des utilisateurs :
- le premier triplet rwx indique les droits que possède le propriétaire du fichier sur ce dernier ;
- le second triplet rwx indique les droits que possèdent les autres membres du groupe sur ce fichier ;
- enfin, le dernier triplet rwx indique les droits que possèdent tous les autres utilisateurs de la machine sur le
fichier.

• chmod : modifier les droits d'accès
Vous n'avez pas besoin d'être root pour utiliser chmod. 
Vous devez juste être propriétaires du fichier dont vous voulez modifier les droits d'accès.

• Attribuer des droits avec des chiffres (chmod absolu)
on attribue un chiffre à chaque droit :
Droit Chiffre
r        4
w        2
x        1
Si vous voulez combiner ces droits, il va falloir additionner les chiffres correspondants.
Ainsi, pour attribuer le droit de lecture et de modification, il faut additionner $4+2$, ce qui donne 6.
Le chiffre 6 signifie donc « Droit de lecture et d'écriture ».
Droit  Chiffre     Calcul
---       0      0 + 0 + 0
-w-       2      0 + 2 + 0
rwx       7      4 + 2 + 1
Avec ça, on peut calculer la valeur d'un triplet de droits. Il faut faire le même calcul pour les droits que l'on veut
attribuer au propriétaire, au groupe et aux autres.
Par exemple, « 640 » indique les droits du propriétaire, du groupe et des autres (dans l'ordre).
6 : droit de lecture et d'écriture pour le propriétaire.
4 : droit de lecture pour le groupe.
0 : aucun droit pour les autres.
Le droit maximal que l'on puisse donner à tout le monde est 777 : droit de lecture, d'écriture et d'exécution pour le
propriétaire, pour son groupe et pour tous les autres.
Au contraire, avec un droit de 000, personne ne peut rien faire… à part root, bien sûr.
Pour changer les droits sur le fichier rapport.txt, et être le seul autorisé à le lire et l'éditer, je dois exécuter
cette commande :
chmod 600 rapport.txt

• Attribuer des droits avec des lettres (chmod relatif)
Dans ce mode, il faut savoir que :
u = user (propriétaire) ;
g = group (groupe) ;
o = other (autres).
… et que :
+ signifie : « Ajouter le droit » ;
- signifie : « Supprimer le droit » ;
= signifie : « Affecter le droit ».

chmod g+w rapport.txt
Signification : « Ajouter le droit d'écriture au groupe ».

chmod o-r rapport.txt
Signification : « Enlever le droit de lecture aux autres ».

chmod u+rx rapport.txt
Signification : « Ajouter les droits de lecture et d'exécution au propriétaire ».

chmod g+w,o-w rapport.txt
Signification : « Ajouter le droit d'écriture au groupe et l'enlever aux autres ».

chmod go-r rapport.txt
Signification : « Enlever le droit de lecture au groupe et aux autres ».

chmod +x rapport.txt
Signification : « Ajouter le droit d'exécution à tout le monde ».

chmod u=rwx,g=r,o=- rapport.txt
Signification : « Affecter tous les droits au propriétaire, juste la lecture au groupe, rien aux autres ».

• Et toujours… -R pour affecter récursivement
Le paramètre -R existe aussi pour chmod. Si vous affectez des droits sur un dossier avec -R, tous ses fichiers et
sous-dossiers récupèreront le même droit.
Si je veux être le seul à pouvoir lire, éditer et exécuter les fichiers de mon répertoire personnel et de tous ses
fichiers, j'ai juste besoin d'écrire :
chmod -R 700 /home/mateo21
```

## <a name="nano"></a> Nano, l'éditeur de texte du débutant
```
Parmi les plus célèbres éditeurs de texte console de Linux, il faut connaître : Nano, Vim et Emacs.

◘ Premiers pas avec Nano

Pour démarrer le logiciel, il vous suffit simplement de taper nano dans la console :
nano
Le symbole ^ signifie Ctrl. Ainsi, pour quitter Nano, il suffit de taper Ctrl + X.
Ctrl + G : afficher l'aide ;
Ctrl + K : couper la ligne de texte (et la mettre dans le presse-papier) ;
Ctrl + U : coller la ligne de texte que vous venez de couper ;
Ctrl + C : afficher à quel endroit du fichier votre curseur est positionné (numéro de ligne…) ;
Ctrl + W : rechercher dans le fichier ;
Ctrl + O : enregistrer le fichier (écrire) ;
Ctrl + X : quitter Nano.
Si vous voulez sortir du mode recherche, tapez Ctrl + C (Annuler).

Si vous souhaitez aller au résultat suivant (au « deux » suivant), faites à nouveau Ctrl + W
pour lancer une recherche.
La recherche précédente est sauvegardée et apparaît entre crochets. 
Si vous voulez rechercher le même mot (et donc aller au résultat suivant),
tapez juste Entrée sans écrire de mot à rechercher (figure suivante).

Pour enregistrer à tout moment, faites Ctrl + O
Tapez juste le nom du fichier que vous voulez créer puis pressez Entrée.

• Les paramètres de la commande Nano
Le plus courant est d'indiquer en paramètre le nom du fichier qu'on veut ouvrir. Ainsi :
nano salut.txt
… ouvrira le fichier salut.txt.
○ -m : autorise l'utilisation de la souris sous Nano. 
○ -i : indentation automatique.
○ -A : active le retour intelligent au début de la ligne.
Si je veux lancer Nano avec toutes ces options à la fois, je peux donc écrire :
nano -miA salut.txt

◘ Configurer Nano avec .nanorc

Il existe un fichier de configuration de Nano qui indique toutes vos préférences. Celui-ci s'appelle .nanorc.

• Pourquoi .nanorc ?
La plupart des fichiers de configuration commencent par un point.
Cela permet de « cacher » le fichier quand on fait un ls (sauf ls -a)
il se peut que le fichier .nanorc n'existe pas chez home. 
Si tel est le cas, Nano sera chargé avec les options par défaut.

• Création du .nanorc
Pas de .nanorc ? Pas de problème, il suffit de le créer. On peut par exemple faire ceci :
nano .nanorc
Dans ce fichier, vous devez écrire une commande par ligne.
Chaque commande commence par un set (pour activer) ou un unset (pour désactiver) suivi de l'option qui vous intéresse.
Par exemple, pour activer la souris, écrivez :
set mouse
On peut faire de même pour éviter d'avoir à taper à chaque fois les paramètres-iet-Aavec d'autres séries deset. Au
final, on écrira ceci :
set mouse
set autoindent
set smarthome
Enregistrez le fichier avec Ctrl + O. Comme vous avez déjà mentionné le nom du fichier en paramètre lors de l'ouverture
de Nano, celui-ci sera automatiquement écrit pour vous. 
Vous pouvez ensuite faire Ctrl + X pour quitter Nano. Démarrer une nouvelle session Nano pour que
les changements soient pris en compte. 

• Le nanorc global et la coloration syntaxique
Il existe un fichier nanorc « global » qui est pris en compte pour tout le monde. Celui-ci est situé
dans/etc/nanorc (attention : il n'y a pas de point devant, cette fois.)
Ce fichier ne peut être modifié que par root. Je vous conseille donc de l'ouvrir avec un sudo
(ou dans une console en root si vous avez fait sudo su avant) :
sudo nano /etc/nanorc
# set autoindent
Supprimez juste le # pour décommenter la ligne
et donc pour activer l'indentation automatique pour tous les utilisateurs.
Vers la fin, vous verrez une section appelée « color setup », qui commence par ces lignes-là :
## Nanorc files
# include "/usr/share/nano/nanorc.nanorc"
## C/C++
# include "/usr/share/nano/c.nanorc"
## HTML
# include "/usr/share/nano/html.nanorc"
Décommenter toutes les lignes d'include. Cela permettra d'activer la coloration « intelligente » de vos
fichiers selon leur type. Vous pourrez ainsi avoir des fichiers HTML colorés, des fichiers C colorés, des
fichiers nanorc colorés, etc.

◘ Configurer sa console avec .bashrc

il existe un fichier de configuration de l'ensemble de la console : le.bashrc. Il se situe dans votre répertoire
personnel et celui-ci existe déjà normalement.
mateo21@mateo21-desktop:/usr/share/nano$ cd
mateo21@mateo21-desktop:~$ nano .bashrc

• Édition du .bashrc personnel
○ Personnaliser l'invite de commandes
Rendez-vous plus bas dans le fichier, jusqu'à ce que vous tombiez sur ces lignes :
# set a fancy prompt (non-color, unless we know we "want" color)
case "$TERM" in
xterm-color)
PS1='${debian_chroot:+($debian_chroot)}\[\033[01;32m\]\u@\h\[\033[00m\]:\[\033[01;34m\]\w\[\033[00m\]\$ '
;;
*)
PS1='${debian_chroot:+($debian_chroot)}\u@\h:\w\$ '
;;
esac
# Comment in the above and uncomment this below for a color prompt
# PS1='${debian_chroot:+($debian_chroot)}\[\033[01;32m\]\u@\h\[\033
Décommenter pour activer l'invite de commandes colorée + Enregistrer (ctrl + o)

○ Créer des alias 
alias = commandes que vous créez et qui sont automatiquement transformées en d'autres commandes
Descendez un peu plus bas dans le fichier, vous trouverez des lignes commentées commençant par « alias ».
Je vous invite à les personnaliser comme moi pour commencer :
# enable color support of ls and also add handy aliases
if [ "$TERM" != "dumb" ]; then
eval "`dircolors -b`"
alias ls='ls --color=auto'
#alias dir='ls --color=auto --format=vertical'
#alias vdir='ls --color=auto --format=long'
fi
# some more ls aliases
#alias ll='ls -l'
#alias la='ls -A'
#alias l='ls -CF'

alias ls='ls --color=auto'
Celui-ci active la coloration des résultats d'un ls à chaque fois que vous tapez ls.
En fait, ls est systématiquement et automatiquement transformé par la console en ls --color=auto

Compléter l'alias ll pour utiliser plus d'options à la fois :
alias ll='ls -lArth'
… signifie que la commande ll fera appel à ls avec les options qui permettent d'afficher le détail de chaque fichier,
d'afficher les fichiers cachés, d'afficher les fichiers dans l'ordre inverse de dernière modification (le fichier le
plus récent sera en bas) et d'afficher des tailles de fichiers lisibles pour un humain (-h)

La commandelsappellera automatiquement l'alias ls --color=auto, ce qui fait qu'un ll sera aussi coloré.
Bref, c'est un peu un alias en chaîne.

(!) Pour voir tous les alias : alias dans la console 

Pour créer son propre alias : alias nom='commande'
Ex. : sécuriser nos rm pour éviter que l'on puisse supprimer tout le système depuis la racine /.
Il y a en effet un paramètre de sécurité disponible avec rm:--preserve-root.
En définissant un alias surrm, vous ne pourrez pas oublier :
alias rm='rm --preserve-root'

• Édition du bashrc global
Si vous voulez définir des alias ou modifier l'invite de commandes pour tous vos utilisateurs,
vous pouvez le faire en une seule fois en éditant le fichier bashrc global situé dans : /etc/bash.bashrc
Ce bashrc doit être édité en root.
(!) Les éléments du bashrc personnel ont la priorité sur ceux du bashrc global.
Si un même alias est défini dans les deux, c'est celui du bashrc personnel qui sera pris en compte.

• Et aussi… le .profile
Il existe un ~/.profile et un /etc/profile. Quelle est la différence ?
En gros, le .profile est lu à chaque nouvelle console dans laquelle vous vous loggez.
C'est le cas des consoles que vous ouvrez avec Ctrl + Alt + F1 à F6 (tty1 à tty6).
Le .bashrc est lu lorsque vous ouvrez une console dans laquelle vous ne vous loggez pas.
C'est le cas des consoles que vous ouvrez en mode graphique (Terminal sous Unity, Konsole sous KDE)
Dans la pratique, le .profile fait par défaut appel au .bashrc… 
Donc il suffit d'éditer votre.bashrcet vous modifierez ainsi les options de toutes vos consoles :
celles avec et sans login.

(!) Le shell est le programme qui interprète les commandes que vous tapez (synonyme de « console »)
```

## <a name="apt-get"></a> Installer des programmes avec apt-get
```
◘ Les dépôts 

L'endroit où tous les paquets se trouvent est appelé dépôt (repository en anglais).
En France, par défaut, Ubuntu utilise le dépôt fr.archive.ubuntu.com.
Ce n'est pas toujours une bonne idée de garder le dépôt par défaut car en cas de nouvelle version d'Ubuntu
et de ses logiciels, celui-ci est surchargé et devient alors très lent.
Si vous êtes chez Wanadoo / Orange, je vous recommande d'utiliser le dépôt Oleane (appartenant à Orange).

• Gérer ses dépôts
la liste des dépôts que votre ordinateur utilise est stockée dans un fichier.
Pour éditer ce fichier, il faut utiliser un éditeur de texte comme… Nano
sudo nano /etc/apt/sources.list
chaque ligne du fichier commence par une de ces deux directives :
○ deb : pour télécharger la version compilée (binaire) des programmes. C'est ce que vous voudrez faire dans la plupart des
cas car c'est la version « prête à l'emploi » ;
○ deb-src : permet de récupérer le code source du programme. Généralement, vous n'en avez pas besoin, sauf si vous êtes
curieux et que vous voulez voir la source d'un programme. C'est l'avantage des logiciels libres de pouvoir consulter la
source des programmes !
Voici une ligne « type » :
deb http://fr.archive.ubuntu.com/ubuntu/ hardy universe
En premier paramètre, on a l'adresse du dépôt. Ici, le dépôt français par défaut est
http://fr.archive.ubuntu.com/ubuntu/.
Ensuite, on a le nom de la version de la distribution qu'on utilise, « hardy » dans ce cas.
Enfin, le dernier paramètre (et tous les paramètres suivants s'il y en a) correspond à la « section » du dépôt dans
laquelle vous voulez regarder.
la seule chose que vous devriez avoir à faire, c'est remplacer toutes les adresses (http…) par celle du nouveau dépôt
que vous voulez utiliser.

• Utiliser l'outil graphique

Ubuntu : allez dans Système → Administration → Sources de logiciels ;
2019 : Application Logiciels et mises à jour 
Télécharger depuis : Autre → choisir son dépôt (avant : cliquer sir Sélectionner le meilleur serveur)
Cliquez sur « Actualiser » pour mettre à jour la liste des logiciels disponibles

◘ Les outils de gestion des paquets

○ paquet : c'est un programme « prêt à l'emploi », l'équivalent des programmes d'installation sous Windows;
○ dépendance : un paquet peut avoir besoin de plusieurs autres paquets pour fonctionner, on dit qu'il a des
    dépendances ;
○ dépôt : c'est le serveur sur lequel on va télécharger nos paquets.

Nous devons généralement suivre trois étapes pour télécharger un paquet :
○ apt-get update (optionnel) : pour mettre notre cache à jour si ce n'est pas déjà fait ;
○ apt-cache search monpaquet (optionnel) : pour rechercher le paquet que nous voulons télécharger si nous ne connaissons
pas son nom exact ;
○ apt-get install monpaquet : pour télécharger et installer notre paquet.

◘ apt-get update : mettre à jour le cache des paquets

Il y a deux cas où vous avez besoin de le mettre à jour :
○ quand vous changez ou ajoutez un dépôt à votre liste de dépôts ;
○ quand vous n'avez pas mis à jour votre cache depuis un moment (quelques semaines).
sudo apt-get update

◘ apt-cache search : rechercher un paquet

On utilise pour cela la commande suivante :
sudo apt-cache search votrerecherche
(!) Si vous voulez une plus ample description d'un paquet, utilisez apt-cache show nomdupaquet. Exemple :
apt-cache show lbreakout2.

◘ apt-get install : installer un paquet

sudo apt-get install lbreakout2
Répondez par un « O » majuscule (comme « Oui ») et tapez Entrée pour que l'installation se poursuive.
(!) Astuce : vous pouvez installer plusieurs paquets d'un coup en les listant un à un :
apt-get install paquet1 paquet2 paquet3

◘ apt-get autoremove : supprimer un paquet

sudo apt-get remove lbreakout2
Toutefois, cela ne supprime pas les dépendances du paquet devenues inutiles.
Pour demander à apt-get de supprimer aussi les dépendances inutiles, on utilise autoremove :
apt-get autoremove lbreakout2

◘ apt-get upgrade : mettre à jour tous les paquets

sudo apt-get upgrade
(!) Pensez à faire un apt-get update pour mettre à jour le cache des paquets
sur votre machine avant de lancer un upgrade.
(!!) Il est conseillé de faire un apt-get upgrade régulièrement pour avoir le système le plus à jour possible. 
Cela vous permet de bénéficier des dernières fonctionnalités des logiciels, 
mais cela corrige aussi les failles de sécurité qui auraient pu être découvertes dans les programmes
(et on en trouve tous les jours, même dans les logiciels libres !).
```

## <a name="rtfm"></a> RTFM : lisez le manuel !
```
◘ man : afficher le manuel d'une commande

La commande man (manual) s'utilise très simplement : elle prend en paramètre 
le nom de la commande dont vous voulez lire la doc
man mkdir

• Se déplacer dans le manuel :
- Utilisez les touches fléchées du clavier pour vous déplacer ligne par ligne.
- les touches Page Up et Page Down (ou Espace) pour vous déplacer de page en page.
- la touche Home (aussi appelée Origine) pour revenir au début du manuel, et sur Fin pour aller à la fin.
- la touche / (slash) pour effectuer une recherche ; Tapez ensuite le mot que vous
recherchez dans le manuel puis appuyez sur Entrée. 
Pour passer au résultat suivant, tapez à nouveau / puis directement sur Entrée (sans
retaper votre recherche).
- la touche Q pour quitter le manuel à tout moment, comme vous le faisiez avec less.

• Les principales sections du manuel
- NAME : le nom de la commande + courte description 
- SYNOPSIS : c'est la liste de toutes les façons d'utiliser la commande. 
- DESCRIPTION : une description plus approfondie de ce que fait la commande + liste des paramètres et
leur signification. 
- AUTHOR : l'auteur du programme. 
- REPORTING BUGS : si vous rencontrez un bug dans le logiciel, on vous donne l'adresse de la personne à contacter pour le
rapporter.
- COPYRIGHT : le copyright, c'est-à-dire la licence d'utilisation de la commande. 
- SEE ALSO : cette section vous propose de « voir aussi » d'autres commandes en rapport avec celle que vous êtes en train
de regarder. C'est une section parfois intéressante.

◘ Comprendre le SYNOPSIS

rôle = lister toutes les façons possibles d'utiliser la commande

• Exemple de man mkdir 
SYNOPSIS
mkdir [OPTION] DIRECTORY... 
pour utiliser mkdir :
mkdir [option entre crochet] nom du repertoire à créer (plusieurs repertoires possibles : ...)
Les mots du SYNOPSIS écrits en gras sont des mots à taper tels quels. 
Les mots soulignés, eux, doivent être remplacés par le nom approprié.

• Autres exemples 
mkdir images videos musiques
… ce qui aura pour effet de créer trois dossiers : images, videos et musiques

DESCRIPTION
Create the DIRECTORY(ies), if they do not already exist.
Mandatory arguments to long options are mandatory for short options
too.
-v, --verbose
print a message for each created directory

mkdir -v images videos musiques

Résultat :
mateo21@mateo21-desktop:~/tests$ mkdir -v images videos musiques
mkdir: création du répertoire `images'
mkdir: création du répertoire `videos'
mkdir: création du répertoire `musiques'

• man cp 
SYNOPSIS (plusieurs choix)
    cp [OPTION]… [-T] SOURCE DEST
La seule chose obligatoire ici ce sont les paramètres SOURCE (le nom du fichier à copier) et DEST
(le nom de la copie à créer).
Ces fichiers peuvent être précédés d'une ou plusieurs options (remarquez les points de suspension) 
ainsi que de l'option -T
    cp [OPTION]… SOURCE… DIRECTORY
on peut copier un ou plusieurs fichiers (SOURCE…) vers un répertoire (DIRECTORY).
Tout cela peut encore une fois être précédé d'une ou plusieurs options.
    cp [OPTION]… -t DIRECTORY SOURCE…
on peut aussi écrire le répertoire (DIRECTORY) dans un premier temps,
suivi d'un ou plusieurs fichiers (SOURCE…).
Attention, il est obligatoire d'utiliser le paramètre -t qui n'est plus entre crochets.

• Exemples d'utilisation 
Si on se base sur la première ligne, on peut juste écrire :
cp photo.jpg photo_copie.jpg
… ce qui aura pour effet de créer la copie photo_copie.jpg
Pour connaître toutes les options disponibles, vous devrez lire la section DESCRIPTION. 
On retrouve notre mode -v (verbeux) qui demande à la commande de détailler ce qu'elle fait. 
On pourrait aussi ajouter -i qui demande confirmation si le fichier de destination existe déjà.
On peut donc faire :
cp -vi photo.jpg photo_copie.jpg
Essayons un peu ce que propose la seconde ligne : copier un ou plusieurs fichiers dans un dossier.
cp photo.jpg photo_copie.jpg images/

• man apt-get 
SYNOPSIS très long, avec beaucoup d'options, parmi elles : 
{[update] | [upgrade] | [dselect-upgrade] | [install paquet…] | [remove paquet…] | [source paquet…] | [build-dep
paquet…] | [check] | [clean] | [autoclean]}
Ces barres verticales signifient « OU » , 
ce qui veut dire que vous devez mettre une et une seule option issue de la liste entre accolades.
update : met à jour le cache des paquets disponibles sur votre ordinateur ;
upgrade : met à jour tous les paquets installés si une nouvelle version est disponible ;
install paquet… : installe le ou les paquets demandés.
On peut donc écrire :
apt-get install monpaquet
Ou encore :
apt-get update
Ou encore :
apt-get autoclean

• Résumé de la syntaxe du SYNOPSIS
    ○ gras : tapez le mot exactement comme indiqué ;
    ○ souligne : remplacez le mot souligné par la valeur qui convient dans votre cas ;
    ○ [-hvc] : toutes les options -h, -v et -c sont facultatives ;
    ○ a|b : vous pouvez écrire l'option « a » OU « b », mais pas les deux à la fois ;
    ○ option… : les points de suspension indiquent que l'option peut être répétée autant de fois que vous voulez.

◘ apropos : trouver une commande

Vous lui donnez en paramètre un mot clé et elle va le rechercher dans les descriptions 
de toutes les pages du manuel.
La commande apropos est donc un peu l'inverse de man : elle vous permet de retrouver une commande.
Ex. Vous recherchez une commande en rapport avec le son :
Vous pouvez taper :
apropos sound
… ce qui va rechercher toutes les commandes qui parlent de son (sound) dans leur page du manuel.
man alsamixer

◘ D'autres façons de lire le manuel

• Le paramètre -h (et --help)
Par exemple :
apt-get 
(!) Parfois, il n'y a pas de page de manuel pour une commande (man ne fonctionne pas pour cette dernière)
mais le -h ou le --help fonctionne.

• La commande whatis
La commande whatis est une sorte de man très allégé.
whatis mkdir
mkdir (1) - make directories

• Rechercher man sur le web 
vous pouvez taper la recherche : man mkdir.
```

## Rechercher des fichiers 
```
◘ locate : une recherche rapide

• Utiliser locate
il suffit d'indiquer le nom du fichier que vous voulez retrouver :
mateo21@mateo21-desktop:~$ locate notes.txt
/home/mateo21/notes.txt
mateo21@mateo21-desktop:/var/log$ locate australie
/home/mateo21/photos/australie1.jpg
/home/mateo21/photos/australie2.jpg
/home/mateo21/photos/australie3.jpg

• La base de données des fichiers
la commande ne fait pas la recherche sur votre disque dur entier, 
mais seulement sur une base de données de vos fichiers
Une fois par jour, votre système mettra à jour la base de données, avec les nouveaux fichiers 
Vous pouvez forcer la commande locate à reconstruire la base de données des fichiers du disque dur. 
Cela se fait avec la commande updatedb, à exécuter en root (avec sudo) :
sudo updatedb
Cependant, locate donne parfois trop de résultats car elle recherche dans tous les répertoires du disque dur, 
elle n'est donc pas très précise.

◘ find : une recherche approfondie

• find recherche les fichiers actuellement présents
• Fonctionnement de la commande find
find « où » « quoi (obligatoire) » « que faire avec »
○ Où : c'est le nom du dossier dans lequel la commande va faire la recherche.
Par défaut, la recherche s'effectuera dans le dossier courant et ses sous-dossiers.
○ Quoi : c'est le fichier à rechercher.
○ Que faire avec : il est possible d'effectuer des actions automatiquement sur chacun des fichiers trouvés
(on parle de « post-traitement »)

• Utilisation basique de la commande find
○ Recherche à partir du nom
find -name "logo.png" (pour retrouver un fichier qui s'appelle très exactement logo.png.)
si je veux retrouver tous les fichiers qui s'appellent syslog situés dans/var/log (et ses sous-répertoires) :
find /var/log/ -name "syslog"
(!) contrairement à locate, find récupère uniquement la liste des fichiers qui s'appellent exactement comme demandé. 
Ainsi, s'il existe un fichier nommé syslog2, il ne sera pas listé dans les résultats.
Pour qu'il le soit, il faut utiliser le joker : l'étoile « * » !
(!!) Si on avait voulu avoir la liste des fichiers qui se terminent par « syslog », on aurait écrit "*syslog".
find / -name "syslog" (recherche sur tout le disque dur)
(!!!) En général, à moins d'être très patient (ou désespéré), on ne fait pas de recherche depuis la racine

○ Recherche à partir de la taille 
mateo21@mateo21-desktop:/var$ find ~ -size +10M
/home/mateo21/souvenirs.avi
/home/mateo21/backups/backup_mai.gz
/home/mateo21/backups/backup_juin.gz
(!) Rappel : le tilde « ~ » signifie « rechercher dans mon home »
Vous pouvez aussi utiliser un moins « - » à la place du « + » pour les fichiers de moins de 10 Mo.
Et sans « + », la commande cherchera des fichiers de 10 Mo exactement

○ Recherche à partir de la date de dernier accès
Avec -atime, vous pouvez indiquer le nombre de jours qui vous séparent du dernier accès à un fichier.
mateo21@mateo21-desktop:~$ find -name "*.odt" -atime 6
/home/mateo21/ecriture/resume_infos_juin.odt
J'utilise ici 6 et non 7 car la numérotation commence à 0 ! 
Ainsi, si nous sommes le mardi 29 août, j'écrirais :
Hier, le lundi 28 août, il y a 1 jour → 0 ;
Avant-hier, le 27 août, il y a 2 jours → 1.

○ Rechercher uniquement des répertoires ou des fichiers
    -type d : pour rechercher uniquement des répertoires (directories) ;
    -type f : pour rechercher uniquement des fichiers (files)
Par défaut, find cherche des répertoires ET des fichiers.
Pour obtenir uniquement les répertoires qui s'appellentsyslog(et non pas les fichiers), tapez donc :
find /var/log -name "syslog" -type d

• Utilisation avancée avec manipulation des résultats

find -name "*.jpg"
… est équivalent à :
find -name "*.jpg" -print
-print signifie « afficher les résultats trouvés ».
Si le -print n'est pas écrit, la commande comprend toute seule qu'elle doit afficher la liste des fichiers.

○ Afficher les fichiers de façon formatée
Par défaut, on liste juste les noms des fichiers trouvés.
On peut cependant avec l'option -printf, manipuler un peu ce qui est affiché.
mateo21@mateo21-desktop:~$ find . -name "*.jpg" -printf "%p - %u\n"
./photos/australie1.jpg - mateo21
./photos/australie2.jpg - mateo21
./photos/australie3.jpg - mateo21
Ici, j'affiche le nom du fichier, un tiret et le nom du propriétaire de ce fichier. 
Le \n permet d'aller à la ligne.
man find pour avoir tous les paramètres 

○ Supprimer les fichiers trouvés
Pour faire le ménage dans mon home et par exemple supprimer tous mes fichiers « jpg », je vais écrire ceci :
find -name "*.jpg" -delete
(!) pas de confirmation, tout est effacé ! 

○ Appeler une commande
Avec -exec, vous pouvez appeler une commande qui effectuera une action sur chacun des fichiers trouvés.
Je souhaite mettre un chmod à 600 pour chacun de mes fichiers « jpg », pour que je sois le seul à pouvoir
les lire :
find -name "*.jpg" -exec chmod 600 {} \;
Pour chaque fichier .jpg trouvé, on exécute la commande qui suit -exec :
    - cette commande ne doit PAS être entre guillemets ;
    - les accolades {} seront remplacées par le nom du fichier ;
    - la commande doit finir par un \; obligatoirement.
(!) Si le fait que la commande ne vous demande pas de confirmation vous ennuie, 
vous pouvez utiliser -ok à la place de -exec. 
Le principe est le même, mais on vous demandera une confirmation pour chaque fichier rencontré.
```

## <a name="extraire-data"></a> Extraire, trier et filtrer des données
```
◘ grep : filtrer des données

rechercher un mot dans un fichier et d'afficher les lignes dans lesquelles ce mot a été trouvé

• Utiliser grep simplement
grep texte nomfichier
grep alias .bashrc
grep est davantage un outil de filtre qu'un outil de recherche.
Son objectif est de vous afficher uniquement les lignes qui contiennent le mot que vous avez demandé
mettre des guillemets autour du mot à trouver si vous recherchez une suite de plusieurs mots séparés par des
espaces :
grep "Site du Zéro" monfichier
○ -i : ne pas tenir compte de la casse (majuscules / minuscules)
$ grep -i alias .bashrc
○ -n : connaître les numéros des lignes
$ grep -n alias .bashrc
○ -v : inverser la recherche : ignorer un mot
$ grep -v alias .bashrc
○ -r : rechercher dans tous les fichiers et sous-dossiers
il faudra indiquer en dernier paramètre le nom du répertoire dans lequel la recherche doit être faite
grep -r "Site du Zéro" code/
… recherchera la chaîne « Site du Zéro » dans tous les fichiers du répertoirecode,
y compris dans les sous-dossiers.

• Utiliser grep avec des expressions régulières
Caractère spécial       Signification
.                       Caractère quelconque
^                       Début de ligne
$                       Fin de ligne
[]                      Un des caractères entre les crochets
?                       L'élément précédent est optionnel (peut être présent 0 ou 1 fois)
*                       L'élément précédent peut être présent 0, 1 ou plusieurs fois
+                       L'élément précédent doit être présent 1 ou plusieurs fois
|                       Ou
()                      Groupement d'expressions
on doit utiliser l'option -E pour faire comprendre à grep que l'on utilise une expression régulière.
$ grep -E Alias .bashrc
# Alias definitions.
demande de rechercher le mot « Alias » (avec un A majuscule)
précéder « Alias » d'un accent circonflexe qui signifie que le mot doit être placé au début de la ligne :
$ grep -E ^Alias .bashrc
grep -E [Aa]lias .bashrc
… renvoie toutes les lignes qui contiennent « alias » ou « Alias ».
grep -E [0-4] .bashrc
… renvoie toutes les lignes qui contiennent un nombre compris entre 0 et 4.
grep -E [a-zA-Z] .bashrc
… renvoie toutes les lignes qui contiennent un caractère alphabétique compris entre « a » et « z » 
ou entre « A » et « Z ».

◘ sort : trier les lignes

$ sort noms.txt

Albert
François
Jean
jonathan
Marcel
patrice
Stéphane
Vincent

Le contenu du fichier est trié alphabétiquement et le résultat est affiché dans la console.
sort ne fait pas attention à la casse (majuscules / minuscules).
○ -o : écrire le résultat dans un fichier
faire en sorte que le fichier soit modifié en précisant un nom de fichier avec l'option -o :
sort -o noms_tries.txt noms.txt
… écrira la liste de noms triés dans noms_tries.txt.
○ -r : trier en ordre inverse
L'option -r permet d'inverser le tri
○ -R : trier aléatoirement
$ sort -R noms.txt
-n : trier des nombres
$ sort -n nombres.txt
16
27
36
42
129
364

◘ wc (word count) : compter le nombre de lignes

$ wc noms.txt
8 (nb lignes) 8 (nb mots) 64 (nb octets) noms.txt
○ -l : compter le nombre de lignes
$ wc -l noms.txt
8 noms.txt
○ -w : compter le nombre de mots
$ wc -w noms.txt
8 noms.txt
○ -c : compter le nombre d'octets
$ wc -c noms.txt
64 noms.txt
○ -m : compter le nombre de caractères
$ wc -m noms.txt
62 noms.txt

◘ uniq : supprimer les doublons

Nous devons travailler sur un fichier trié.
La commande uniq ne repère que les lignes successives qui sont identiques.
Albert
François
François
François
Jean
jonathan
Marcel
Marcel
patrice
Stéphane
Vincent

$ uniq doublons.txt

Albert
François
Jean
jonathan
Marcel
patrice
Stéphane
Vincent

La liste de noms sans les doublons s'affiche alors dans la console !

demander à ce que sort + uniq soit pris en compte dans le même fichier :
sort -u -o file file
demander à ce que le résultat sans doublons soit écrit dans un autre fichier :
uniq doublons.txt sans_doublons.txt
○ -c : compter le nombre d'occurrences
$ uniq -c doublons.txt
1 Albert
3 François
... 
○ -d : afficher uniquement les lignes présentes en double
$ uniq -d doublons.txt
François
Marcel
man uniq pour le reste des options 

◘ cut : couper une partie du fichier

• Couper selon le nombre de caractères
conserver uniquement les caractères 2 à 5 de chaque ligne du fichier :
$ cut -c 2-5 noms.txt
ran
arce
lber
Pour conserver du 1er au 3ème caractère :
$ cut -c -3 noms.txt
Fra
Mar
Alb
De même, pour conserver du 3ème au dernier caractère :
$ cut -c 3- noms.txt
ançois
rcel
bert

• Couper selon un délimiteur
un joli tableur et enregistré le document au format CSV.
Le fichier de base :
Fabrice,18 / 20,Excellent travail
Mathieu,3 / 20,Nul comme d'hab
Sophie,14 / 20,En nette progression
... 
Comme le nom CSV l'indique, les virgules servent à séparer les colonnes. 
Ces dernières contiennent, dans l'ordre :
le prénom ;
la note ;
un commentaire.
Pour extraire la liste des prénoms, on a besoin d'utiliser deux paramètres :
-d : indique quel est le délimiteur dans le fichier ;
-f : indique le numéro du ou des champs à couper.
Dans notre cas, le délimiteur qui sépare les champs est la virgule.
Le numéro du champ à couper est 1 (c'est le premier).
$ cut -d , -f 1 notes.csv
Fabrice
Vincent
Sophie
Si nous voulons juste les commentaires :
$ cut -d , -f 3 notes.csv
Excellent travail
Nul comme d'hab
En nette progression
Pour avoir les champs n°1 et n°3 (le prénom et le commentaire) :
$ cut -d , -f 1,3 notes.csv
Fabrice,Excellent travail
Vincent,Nul comme d'hab
Sophie,En nette progression
(!) il est possible de conserver toute une série de champs avec le tiret :
cut -d , -f 2-4 notes.csv
a pour effet de conserver les champs n°2, 3 et 4
(!!) cut -d , -f 3- notes.csv conserve les champs du n°3 jusqu'à la fin
```

## <a name="flux-direction"></a> Les flux de direction 
```
◘ > et >> : rediriger le résultat dans un fichier

permet d'écrire le résultat d'une commande dans un fichier

• > : rediriger dans un nouveau fichier
Ce symbole permet de rediriger le résultat de la commande dans le fichier de votre choix.
cut -d , -f 1 notes.csv > eleves.txt
Comme vous pouvez le voir, un fichier vient bien d'être créé !
Vous pouvez l'ouvrir avec Nano ou encore l'afficher dans la console avec la commande cat 
(pour afficher tout d'un coup s'il est court) ou less (pour afficher page par page s'il est long).
(!) si le fichier existait déjà il sera écrasé sans demande de confirmation !
(!!) Vous ne voulez ni voir le résultat d'une commande ni le stocker dans un fichier. 
Dans ce cas, l'astuce consiste à rediriger le résultat dans /dev/null. 
C'est un peu le « trou noir » de Linux : tout ce qui va là-dedans disparaît immédiatement.
Par exemple : commande_bavarde > /dev/null

• >> : rediriger à la fin d'un fichier
Avantage : vous ne risquez pas d'écraser le fichier s'il existe déjà. 
Si le fichier n'existe pas, il sera créé automatiquement.
cut -d , -f 1 notes.csv >> eleves.txt
… les noms seront ajoutés à la fin du fichier, sans écraser le résultat précédent.

◘ 2>, 2>> et 2>&1 : rediriger les erreurs

Par défaut, tout s'affiche dans la console : la sortie standard comme la sortie d'erreurs.
cut -d , -f 1 fichier_inexistant.csv > eleves.txt
cut: fichier_inexistant.csv: Aucun fichier ou répertoire de ce type
Le fichier fichier_inexistant.csv n'existe pas (comme son nom l'indique).
L'erreur s'est affichée dans la console au lieu d'avoir été envoyée dans eleves.txt.

• Rediriger les erreurs dans un fichier à part
Pour cela, on utilise l'opérateur 2>
cut -d , -f 1 fichier_inexistant.csv > eleves.txt 2> erreurs.log
(!) il est aussi possible d'utiliser 2>>
pour ajouter les erreurs à la fin du fichier

• Fusionner les sorties 
il est possible de fusionner les sorties dans un seul et même fichier. Comment ?
Il faut utiliser le code suivant : 2>&1
Cela a pour effet de rediriger toute la sortie d'erreurs dans la sortie standard. 
Traduction pour l'ordinateur : « envoie les erreurs au même endroit que le reste ».
cut -d , -f 1 fichier_inexistant.csv > eleves.txt 2>&1
Tout ira désormais dans eleves.txt : le résultat (si cela a fonctionné),
de même que les erreurs (s'il y a eu un problème).
(!) il n'est pas possible d'écrire 2>>&1
(!!) le symbole 2>&1 va envoyer les erreurs dans le même fichier et de la même façon que la sortie standard.
Donc, si vous écrivez :
cut -d , -f 1 fichier_inexistant.csv >> eleves.txt 2>&1
… les erreurs seront ajoutées à la fin du fichier eleves.txt comme le reste des messages.

• Résumé
    ○ 2> : redirige les erreurs dans un fichier (s'il existe déjà, il sera écrasé) ;
    ○ 2>> : redirige les erreurs à la fin d'un fichier (s'il n'existe pas, il sera créé) ;
    ○ 2>&1 : redirige les erreurs au même endroit et de la même façon que la sortie standard.

◘ < et << : lire depuis un fichier ou le clavier

• < : lire depuis un fichier
cat < notes.csv
Cela aura pour effet d'afficher le contenu du fichier envoyé en entrée : 
$ cat < notes.csv
Fabrice,18 / 20,Excellent travail
○ Si vous écrivez cat notes.csv, la commande cat reçoit en entrée le NOM du fichier notes.csv
qu'elle doit ensuite se charger d'ouvrir pour afficher son contenu.
○ Si vous écrivez cat < notes.csv, la commande cat reçoit le CONTENU de notes.csv
qu'elle se contente simplement d'afficher dans la console.
C'est le shell (le programme qui gère la console) qui se charge d'envoyer le contenu
de notes.csv à la commande cat.

• << : lire depuis le clavier progressivement
permet d'envoyer un contenu à une commande avec votre clavier
sort -n << FIN
La console vous propose alors de taper du texte. 
$ sort -n << FIN
>
sort -n sert à trier des nombres, on va écrire des nombres, un par ligne
(en appuyant sur la touche Entrée à chaque fois).
$ sort -n << FIN
> 13
> 132
> 10
> 131
> FIN
Tout le texte que vous avez écrit est alors envoyé à la commande (ici sort)
qui traite cela en entrée. La commande sort nous trie nos nombres !
Exemple 2 :
$ wc -m << FIN
> Combien de caractères dans cette phrase ?
> FIN
42
Exemple 3 :
$ wc -m << STOP
> Combien de caractères dans cette phrase ?
> STOP
42

On peut combiner ces symboles avec ceux vus précédemment. Par exemple :
$ sort -n << FIN > nombres_tries.txt 2>&1
> 18
> 27
> 1
> FIN
Les nombres saisis au clavier seront envoyés à nombres_tries.txt, de même que les erreurs éventuelles.

◘ | (le pipe) : chaîner les commandes

En gros, tout ce qui sort de la commande1 est immédiatement envoyé à la commande2

• Trier les élèves par nom 
Fabrice,18 / 20,Excellent travail
Mathieu,3 / 20,Nul comme d'hab'
Sophie,14 / 20,En nette progression
etc.
Avec cut, on peut récupérer les noms.
Avec sort, on peut les trier par ordre alphabétique.
Idée : connecter cut à sort pour avoir la liste des noms triés :
$ cut -d , -f 1 notes.csv | sort
Albert
Benoît
Corentin
On peut même aller plus loin et écrire cette liste triée dans un fichier :
cut -d , -f 1 notes.csv | sort > noms_tries.txt

• Trier les répertoires par taille
La commande du permet d'obtenir la taille de chacun des sous-répertoires du répertoire courant
on aimerait avoir cette même liste dans l'ordre décroissant
Pour avoir cette liste du plus grand au plus petit, il nous suffit d'écrire :
du | sort -nr
Problème : comme les plus gros répertoires ont été affichés en premier,
je dois remonter très haut dans la console pour retrouver les plus gros d'entre eux.
Idée : connecter cette sortie à head. 
Cette commande permet de filtrer uniquement les premières lignes qu'elle reçoit :
$ du | sort -nr | head
...et on peut paramétrer le nombre de résultats affichés avec l'option -n de head
Pour naviguer à travers tous les résultats, vous pouvez connecter la sortie à less.
Cette commande permet d'afficher des résultats page par page ;
ça nous est justement utile dans le cas présent où nous avons beaucoup de résultats !
du | sort -nr | less

• Lister les fichiers contenant un mot
Avec grep, on peut connaître la liste des fichiers contenant un mot dans tout un répertoire (option -r). 
Le problème est que cette sortie est un peu trop verbeuse :
/var/log/installer/syslog:Apr 6 15:14:43 ubuntu NetworkManager: <debug> [1207494883.004888]
Heureusement, le nom du fichier et le contenu de la ligne sont séparés par un deux-points.
On connaît cut, qui permet de récupérer uniquement une partie de la ligne. 
Il nous permettrait de conserver uniquement le nom du fichier.
Problème : si le même mot a été trouvé plusieurs fois dans un fichier, le fichier apparaîtra en double ! 
Pour supprimer les doublons, on peut utiliser uniq, à condition d'avoir bien trié les lignes avec sort auparavant.
Ex : rechercher les fichiers qui contiennent le mot « log » dans le dossier /var/log. 
Notez qu'il faudra passer root avec sudo pour avoir accès à tout le contenu de ce répertoire.
La commande :
sudo grep log -Ir /var/log | cut -d : -f 1 | sort | uniq
Que fait cette commande ?
- Elle liste tous les fichiers contenant le mot « log » dans /var/log (-I permettant d'exclure les fichiers binaires).
- Elle extrait de ce résultat uniquement les noms des fichiers.
- Elle trie ces noms de fichiers.
- Elle supprime les doublons.
```

## <a name="surveiller-systeme"></a> Surveiller l'activité du système
```
◘ w : qui fait quoi ?

$ w
 16:50:30 up  8:50,  2 users,  load average: 0,08, 0,34, 0,31
USER     TTY      FROM            LOGIN@   IDLE   JCPU   PCPU WHAT
mateo21  :0       -              19Apr08 ?xdm?   3:38m  1.18s /usr/bin/gnome-
mateo21  pts/0    :0.0           16:49    0.00s  0.33s  0.03s w

• L'heure (aussi accessible via date)
$ date
samedi 16 octobre 2010, 17:26:27 (UTC+0200)

• L'uptime (aussi accessible via uptime)
la durée de fonctionnement de l'ordinateur

• La charge (aussi accessible via uptime et tload)
indice de l'activité de l'ordinateur. Il y a trois valeurs :
la première correspond à la charge moyenne depuis 1 minute (0,08) ;
la seconde à la charge moyenne depuis 5 minutes (0,34) ;
la dernière à la charge moyenne depuis 15 minutes (0,31).
lorsqu'il dépasse 1 (si vous avez un processeur), 2 ou 4, alors votre ordinateur est surchargé

• La liste des connectés (aussi accessible via who)
USER (UTIL.) : le nom de l'utilisateur (son login) ;
TTY : le nom de la console dans laquelle se trouve l'utilisateur.
FROM (DE) : c'est l'adresse IP (ou le nom d'hôte) depuis laquelle il se connecte.
LOGIN@ : l'heure à laquelle cet utilisateur s'est connecté ;
IDLE : depuis combien de temps cet utilisateur est inactif
WHAT : la commande qu'il est en train d'exécuter en ce moment.

◘ ps & top : lister les processus (Ctl Alt Supr de WS)

un processus est un programme qui tourne en mémoire
La plupart des programmes ne font tourner qu'un processus en mémoire (une seule version d'eux-mêmes). 
C'est le cas d'OpenOffice par exemple. D'autres lancent des copies d'eux-mêmes, 
c'est le cas du navigateur Google Chrome qui crée autant de processus en mémoire que d'onglets ouverts.

• ps : liste statique des processus
$ ps
PID TTY TIME CMD
23720 pts/0 00:00:01 bash
29941 pts/0 00:00:00 ps
PID : c'est le numéro d'identification du processus.
TTY : c'est le nom de la console depuis laquelle a été lancé le processus.
TIME : la durée d'exécution du processus.
CMD : le programme qui a généré ce processus. Si vous voyez plusieurs fois le même programme, 
c'est que celui-ci s'est dupliqué en plusieurs processus (c'est le cas de MySQL, par exemple).
quand on utilise ps sans argument comme on vient de le faire, il affiche seulement les processus lancés par le même
utilisateur (ici « mateo21 ») dans la même console (ici « pts/0 »)

○ ps -ef : lister tous les processus
○ ps -ejH : afficher les processus en arbre
regrouper les processus sous forme d'arborescence
○ ps -u UTILISATEUR : lister les processus lancés par un utilisateur

• top : liste dynamique des processus
Les processus en haut de cette liste sont donc actuellement les plus gourmands en processeur. 
Ce sont peut-être eux que vous devriez cibler en premier si vous sentez que votre système est surchargé.
○ q : ferme top ;
○ h : affiche l'aide, et donc la liste des touches utilisables.
○ B : met en gras certains éléments.
○ f : ajoute ou supprime des colonnes dans la liste.
○ F : change la colonne selon laquelle les processus sont triés. En général, laisser le tri par défaut en fonction de
    %CPU est suffisant.
○ u : filtre en fonction de l'utilisateur que vous voulez.
○ k : tue un processus, c'est-à-dire arrête ce processus. On vous demandera le numéro (PID) du processus que vous voulez tuer. Nous reviendrons sur l'arrêt des processus
    un peu plus loin.
○ s : change l'intervalle de temps entre chaque rafraîchissement de la liste (par défaut, c'est toutes les trois
    secondes).

◘ Ctrl + C & kill : arrêter un processus

• Ctrl + C : arrêter un processus lancé en console
demande (en console) l'arrêt du programme console en cours d'exécution à l'écran
Prenez une commande qui n'en finit plus, comme par exemple un find sur l'ensemble du disque.
Si vous trouvez cela trop long et que vous voulez arrêter le programme en cours de route,
il vous suffit de taper Ctrl + C :

• kill : tuer un processus
Ctrl + C ne fonctionne que sur un programme actuellement ouvert dans la console.
De nombreux programmes tournent pourtant en arrière-plan : utilisation de "kill"
il faudra auparavant récupérer le PID du ou des processus que vous voulez tuer. 
Pour cela, deux solutions :
ps ou top
$ ps -u mateo21
PID TTY TIME CMD
5012 ? 00:00:01 gnome-session
Supposons qu'on souhaite arrêter Firefox.
On peut filtrer cette longue liste avec grep et un pipe :
$ ps -u mateo21 | grep firefox
32678 ? 00:00:03 firefox-bin
Il ne nous reste plus qu'à le tuer, avec la commande suivante :
kill 32678
Pour tuer plusieurs processus d'un seul coup : en indiquant plusieurs PID à la suite :
kill 32678 2768 33071
Vous voulez tuer un processus sans lui laisser le choix ?
à n'utiliser que dans le cas d'un programme complètement planté que vous voulez
vraiment arrêter !
kill -9 32678

• killall : tuer plusieurs processus
Contrairement à kill, killall attend le nom du processus à tuer et non son PID
nous ayons trois processus find en cours d'exécution que nous souhaitions arrêter.
$ ps -u mateo21 | grep find
675 pts/1 00:00:01 find
678 pts/2 00:00:00 find
679 pts/3 00:00:01 find
Pour tous les tuer, il faudra donc taper :
$ killall find

◘ halt & reboot : arrêter et redémarrer l'ordinateur

• halt : arrêter l'ordinateur
$ sudo halt

• reboot : redémarrer l'ordinateur
$ sudo reboot
```

## <a name="programmes-arriere"></a> Exécuter des programmes en arrière-plan
```
◘ "&" & nohup : lancer un processus en arrière-plan

plusieurs programmes peuvent tourner en même temps au sein d'une même console

• & : lancer un processus en arrière-plan
rajouter le petit symbole & à la fin de la commande que vous voulez envoyer en arrière-plan
(!) Le symbole & s'appelle le « et commercial » ou encore l'« esperluette »
copier un gros fichier vidéo (ce qui prend en général du temps) :
$ cp video.avi copie_video.avi &
[1] (numéro du processus en arrière-plan dans cette console) 16504 (numéro d'identification général du processus)
Si vous essayez de faire la même chose avec d'autres commandes, par exemple sur un find,
vous risquez d'être surpris : les messages renvoyés par la commande s'affichent toujours dans la console !
solution : rediriger la sortie pour ne pas être importuné :
$ find / -name "*log" > sortiefind &
[1] 18191
pour ne pas être dérangés du tout, vous devrez aussi rediriger les erreurs (par exemple avec 2>&1), 
ce qui donne :
$ find / -name "*log" > sortiefind 2>&1 &
[1] 18231

• nohup : détacher le processus de la console
L'option & a ce défaut non négligeable : le processus reste attaché à la console, ce
qui veut dire que si la console est fermée ou que l'utilisateur se déconnecte, 
le processus sera automatiquement arrêté.
solution : il faut lancer la commande via nohup
Par exemple, voici ce que ça donne si on lance la copie via unnohup :
$ nohup cp video.avi copie_video.avi
nohup: ajout à la sortie de `nohup.out'

◘ Ctrl + Z, jobs, bg & fg : passer un processus en arrière-plan

vous avez lancé la commande sans penser à rajouter un petit & à la fin

• Ctrl + Z : mettre en pause l'exécution du programme
Tapez Ctrl + Z pendant l'exécution du programme. 
Celui-ci va s'arrêter et vous allez immédiatement reprendre la
main sur l'invite de commandes.
Le processus est maintenant dans un état de pause. 
Il ne s'exécute pas mais reste en mémoire.

• bg : passer le processus en arrière-plan (background)
Maintenant que le processus est en « pause » et qu'on a récupéré l'invite de commandes, 
tapez :
$ bg
[1]+ top &
commande la reprise du processus, mais cette fois en arrière-plan

• en résumé, si on a lancé une commande par erreur en avant-plan et 
que l'on souhaite récupérer l'invite de commandes :
    ○ Ctrl + Z : pour mettre en pause le programme et récupérer l'invite de commandes ;
    ○ bg : pour que le processus continue à tourner mais en arrière-plan

• jobs : connaître les processus qui tournent en arrière-plan
$ jobs
[1]- Stopped top
[2]+ Stopped find / -name "*log*" > sortiefind 2>&1

• fg : reprendre un processus au premier plan (foreground)
Si vous avez plusieurs processus en arrière-plan, il faudra préciser lequel vous voulez
récupérer. Par exemple, voici comment reprendre le find qui était le job n° 2 :
$ fg %2

◘ screen : plusieurs consoles en une

Si vous êtes les maîtres de la machine (ce qui est votre cas si vous avez installé Linux chez vous),
je peux vous recommander d'installer le programme screen.
$ sudo apt-get install screen
screen est un multiplicateur de terminal : 
programme capable de gérer plusieurs consoles au sein d'une seule, un peu
comme si chaque console était une fenêtre
programme qui permet entre autres de faire une mise en veille prolongée de votre console
$ screen
nous nous trouvons dans une console « émulée », non pas dans la « vraie » console où nous étions tout à l'heure. 
Vous pouvez en sortir en tapant Ctrl + D ou exit, comme si vous quittiez une console normalement

sous screen, tout se fait à partir de combinaisons de touches de la forme suivante :
Ctrl + a + autre touche.
En fait, vous devez taper Ctrl + a, relâcher ces touches (lever les mains du clavier) 
et ensuite appuyer sur une autre touche.

• Ctrl + a puis ? : afficher l'aide
Toutes les touches que vous voyez là doivent impérativement être précédées d'un Ctrl + a.
Notez par ailleurs que l'accent circonflexe ^ signifie ici Ctrl

• Les principales commandes de screen

    ○ Ctrl + a puis c : créer une nouvelle « fenêtre ».

    ○ Ctrl + a puis w : afficher la liste des « fenêtres » actuellement ouvertes. 
    En bas de l'écran vous verrez par exemple apparaître : 0-$ bash 1*$ bash. 
    Cela signifie que vous avez deux fenêtres ouvertes, l'une numérotée 0, l'autre 1. 
    Celle sur laquelle vous vous trouvez actuellement contient une étoile * (on se trouve donc ici dans la fenêtre n° 1).

    Ctrl + a puis A : renommer la fenêtre actuelle. 
    Ce nom apparaît lorsque vous affichez la liste des fenêtres avec Ctrl + a puis w.

    Ctrl + a puis n : passer à la fenêtre suivante (next).

    Ctrl + a puis p : passer à la fenêtre précédente (previous).

    Ctrl + a puis Ctrl + a : revenir à la dernière fenêtre utilisée.

    Ctrl + a puis un chiffre de 0 à 9 : passer à la fenêtre n° X.

    Ctrl + a puis " : choisir la fenêtre dans laquelle on veut aller.

    Ctrl + a puis k : fermer la fenêtre actuelle (kill)

• Ctrl + a puis S : découper screen en plusieurs parties (split)
Il est possible de répéter l'opération plusieurs fois pour couper en trois, quatre, ou plus 
(dans la mesure du possible, parce qu'après les consoles sont toutes petites).
Pour passer d'une fenêtre à une autre, faites Ctrl + a puis Tab
Une fois le curseur placé dans la fenêtre du bas, 
vous pouvez soit créer une nouvelle fenêtre (Ctrl + a puis c) soit
appeler une autre fenêtre que vous avez déjà ouverte (avec Ctrl + a puis un chiffre, par exemple)
pour fermer une fenêtre que vous avez splittée, il faudra taper Ctrl + a puis X

Pour écrire dans une deuxième console :
CTRL+a, | # create a new pane
CTRL+a, <TAB> # goto the new pane
CTRL+a, c # start a new shell in the pane

• Ctrl + a puis d : détacher screen
permet de retrouver l'invite de commandes « normale » sans arrêter screen
L'information [detached] apparaît pour signaler que screen tourne toujours 
et qu'il est détaché de la console actuelle.
Il continuera donc à tourner quoi qu'il arrive, 
même si vous fermez la console dans laquelle vous vous trouvez

screense comporte comme un nohup. 
La différence est qu'une session screen vous permet d'ouvrir plusieurs fenêtres de
console à la fois, contrairement à nohup qui ne peut lancer qu'un programme à la fois.

Vous pouvez donc partir, quitter la console et revenir récupérer votre session screen plus tard. 
Il faudra simplement taper :
$ screen -r
… pour retrouver votre session screen dans l'état où vous l'avez laissée
(si plusieurs sessions) Pour récupérer la session n° 20930, tapez simplement :
$ screen -r 20930

screen -ls affiche la liste des screens actuellement ouverts

• Un fichier personnalisé de configuration de screen
il est possible de personnaliser screen avec un fichier de configuration,
comme la plupart des autres programmes sous Linux
Ce fichier s'appelle .screenrc et doit être placé dans votre home (/home/mateo21par exemple)
fichier recommandé > www.siteduzero.com/codeweb/901904
```

## <a name="programme-heure-diff"></a> Exécuter un programme à une heure différée
```
◘ date : régler l'heure

• Personnaliser l'affichage de la date
Pour spécifier un affichage personnalisé, vous devez utiliser un symbole + 
suivi d'une série de symboles qui indiquent l'information que vous désirez.
Je vous recommande de mettre le tout entre guillemets.
Prenons quelques exemples pour bien comprendre :
$ date "+%H"
12
%H signifie « le numéro de l'heure actuelle »
$ date "+%H:%M:%S"
12:36:15
$ date "+%Hh%Mm%Ss"
12h41m01s
Seule la lettre qui suit le % est interprétée
$ date "+Bienvenue en %Y"
Bienvenue en 2010
man date pour l'ensemble des options 

• Modifier la date 
(!) il faudra être root pour faire cela
Il faut préciser les informations sous la forme suivante : MMDDhhmmYYYY
    MM : mois ;
    DD : jour ;
    hh : heure ;
    mm : minutes ;
    YYYY : année ;
Notez qu'il n'est pas obligatoire de préciser l'année. On peut donc écrire :
$ sudo date 11101250
mercredi 10 novembre 2010, 12:50:00 (UTC+0100)
La nouvelle date s'affiche automatiquement et elle est mise à jour sur le système.
Attention à bien respecter l'ordre des nombres : Mois - Jour - Heure - Minutes.

◘ at : exécuter une commande plus tard

(!) avec at, le programme ne sera exécuté qu'une seule fois

• Exécuter une commande à une heure précise
Il faut donc d'abord indiquer à quelle heure vous voulez exécuter votre commande, 
sous la forme HH:MM :
$ at 14:17
nous allons demander de créer un fichier à 14 h 17 :
$ at 14:17
warning: commands will be executed using /bin/sh
at> touch fichier.txt
at> <EOT>
job 5 at Mon Nov 10 14:17:00 2010
Après avoir écrit la commande touch, at affiche à nouveau un prompt et vous demande une autre commande. 
Vous pouvez indiquer une autre commande à exécuter à la même heure… ou bien arrêter là.
Dans ce cas, tapez Ctrl + D (comme si vous cherchiez à sortir d'un terminal)
Et si je veux exécuter la commande demain à 14 h 17 et non pas aujourd'hui ?
$ at 14:17 tomorrow
Et si je veux exécuter la commande le 15 novembre à 14 h 17 ?
$ at 14:17 11/15/10 (date américaine : MM/JJ/YY)

• Exécuter une commande après un certain délai
pour exécuter la commande dans 5 minutes :
$ at now +5 minutes
Les mots-clés utilisables sont les suivants :
minutes ;
hours (heures) ;
days (jours) ;
weeks (semaines) ;
months (mois) ;
years (années) ;
$ at now +2 weeks

• atq et atrm : lister et supprimer les jobs en attente
Il est possible d'avoir la liste des jobs en attente avec la commande atq :
$ atq
13 Mon Nov 10 14:44:00 2010 a mateo21
12 Mon Nov 10 14:42:00 2010 a mateo21
Pour supprimer le job n° 13, utilisez atrm :
$ atrm 13

◘ sleep : faire une pause

Il est possible d'enchaîner plusieurs commandes en les séparant par des points-virgules :
$ touch fichier.txt; rm fichier.txt
touch est d'abord exécuté, puis une fois qu'il a fini ce sera le tour de rm (qui supprimera le fichier que nous venons
de créer)

sleep : cette commande permet de faire une pause.
$ touch fichier.txt; sleep 10; rm fichier.txt
Cette fois, il va se passer les choses suivantes :
fichier.txt est créé ;
sleep fait une pause de 10 secondes (secondes par défaut) ;
rm supprime ensuite le fichier.
Il est aussi possible d'utiliser d'autres symboles pour changer l'unité :
m : minutes ;
h : heures ;
d : jours.
Pour faire une pause d'une minute :
$ touch fichier.txt; sleep 1m; rm fichier.txt
il est parfois bien pratique de faire une pause,
par exemple pour s'assurer que la première commande a bien eu le temps de se terminer

(!) On peut aussi remplacer les points-virgules par des &&, comme ceci :
touch fichier.txt && sleep 10 && rm fichier.txt
Dans ce cas, les instructions ne s'enchaîneront que si elles se sont correctement exécutées.
Par exemple, si touch renvoie une erreur, 
les commandes qui suivent (sleep, rm) ne seront pas exécutées

◘ crontab : exécuter une commande régulièrement

Contrairement à at qui n'exécutera le programme qu'une seule fois, 
crontab permet de faire en sorte que l'exécution soit répétée : 
toutes les heures, toutes les minutes, tous les jours, tous les trois jours, etc.

• Un peu de configuration…
nous devons modifier notre configuration (notre fichier .bashrc)
pour demander à ce que Nano soit l'éditeur par défaut.
rajoutez la ligne suivante à la fin de votre fichier .bashrc :
export EDITOR=nano
Fermez ensuite votre console et 
rouvrez-la pour que cette nouvelle configuration soit bien prise en compte.

• La « crontab », qu'est-ce que c'est ?
crontab = commande qui permet de lire et de modifier un fichier appelé la « crontab »
Ce fichier contient la liste des programmes que vous souhaitez exécuter régulièrement, 
et à quelle heure vous souhaitez qu'ils soient exécutés.
(!) crontab permet donc de changer la liste des programmes régulièrement exécutés. 
C'est toutefois le programme cron qui se charge d'exécuter ces programmes aux heures demandées
Il y a trois paramètres différents à connaître :
-e : modifier la crontab ;
-l : afficher la crontab actuelle ;
-r : supprimer votre crontab. Attention, la suppression est immédiate et sans confirmation !

$ crontab -l
no crontab for mateo21
modification de la crontab :
$ crontab -e

• Modifier la crontab

○ Les champs
Le fichier ne contient qu'une seule ligne :
# m h dom mon dow command
m : minutes (0 - 59) ;
h : heures (0 - 23) ;
dom (day of month) : jour du mois (1 - 31) ;
mon (month) : mois (1 - 12) ;
dow (day of week) : jour de la semaine (0 - 6, 0 étant le dimanche) ;
command : c'est la commande à exécuter ;
* : tous les nombres possibles
exécuter une commande tous les jours à 15 h 47 :
47 15 * * * touch /home/mateo21/fichier.txt
Seules les deux premières valeurs sont précisées : les minutes et les heures. 
Chaque fois qu'il est 15 h 47, la commande indiquée à la fin sera exécutée.
(!) vous ne pouvez pas être sûrs que le cron s'exécutera dans le répertoire que vous voulez. 
Il est donc toujours préférable d'écrire le chemin du fichier en absolu

Crontab                 Signification
47 * * * * commande     Toutes les heures à 47 minutes exactement.> & Donc à 00 h 47, 01 h 47, 02 h 47, etc.
0 0 * * 1 commande      Tous les lundis à minuit (dans la nuit de dimanche à lundi).
0 4 1 * * commande      Tous les premiers du mois à 4 h du matin
0 4 * 12 * commande     Tous les jours du mois de décembre à 4 h du matin.
0 * 4 12 * commande     Toutes les heures les 4 décembre
* * * * * commande      Toutes les minutes !

○ Les différentes notations possibles
Pour chaque champ, on a le droit à différentes notations :
5 (un nombre) : exécuté lorsque le champ prend la valeur 5 ;
* : exécuté tout le temps (toutes les valeurs sont bonnes) ;
3,5,10 : exécuté lorsque le champ prend la valeur 3, 5 ou 10. Ne pas mettre d'espace après la virgule ;
3-7 : exécuté pour les valeurs 3 à 7 ;
*/3 : exécuté tous les multiples de 3 (par exemple à 0 h, 3 h, 6 h, 9 h…).

Crontab                     Signification
30 5 1-15 * * commande      À 5 h 30 du matin du 1er au 15 de chaque mois
0 0 * * 1,3,4 commande      À minuit le lundi, le mercredi et le jeudi
0 */2 * * * commande        Toutes les 2 heures (00 h 00, 02 h 00, 04 h 00…)
*/10 * * * 1-5 commande     Toutes les 10 minutes du lundi au vendredi.

○ Rediriger la sortie
si la commande renvoie un message, le résultat de la commande vous est envoyé par e-mail
rediriger une sortie, avec les erreurs :
47 15 * * * touch /home/mateo21/fichier.txt >> /home/mateo21/cron.log 2>&1
si je ne veux pas du tout récupérer ce qui est affiché :
Il suffit de rediriger dans /dev/null (le fameux « trou noir » du système).
Tout ce qui est envoyé là-dedans est immédiatement supprimé
47 15 * * * touch /home/mateo21/fichier.txt > /dev/null 2>&1

Je souhaite exécuter une commande toutes les 5 minutes le week-end :
*/5 * * * 0,6 commande
```

## ARCHIVER ET COMPRESSER
```
.zip et .rar = alternatives libres (et souvent plus puissantes) gzip et le bzip2. 
gzip et le bzip2 ne sont capables de compresser qu'un seul fichier à la fois
solution = tar 

◘ tar : assembler des fichiers dans une archive

Sous Linux, on a depuis longtemps pris l'habitude de procéder en deux étapes :
 - réunir les fichiers dans un seul gros fichier appelé archive. 
On utilise pour cela le programme tar ;
 - compresser le gros fichier ainsi obtenu à l'aide de gzip ou de bzip2

• Regrouper d'abord les fichiers dans un même dossier
Mes fichiers .tuto que je souhaite archiver sont pour le moment placés en vrac dans mon home :
$ ls
Bureau Images l-heritage.tuto Public
Documents la-surcharge-d-operateurs.tuto Modèles Vidéos
Examples les-principaux-widgets.tuto Musique

Il est recommandé de placer d'abord les fichiers à archiver dans un seul et même dossier. 
Créons-le et déplaçons-y tous nos .tuto :
$ mkdir tutoriels
$ mv *.tuto tutoriels/
$ ls
Bureau Examples Modèles Public Vidéos
Documents Images Musique tutoriels

• -cvf : créer une archive tar
Nous allons maintenant créer une archive tar de ce dossier et de ses fichiers. 
La procédure à suivre pour créer une archive est :
tar -cvf nom_archive.tar nom_dossier/
-c : signifie créer une archive tar ;
-v : signifie afficher le détail des opérations ;
-f : signifie assembler l'archive dans un fichier.
$ tar -cvf tutoriels.tar tutoriels/
tutoriels/
tutoriels/les-principaux-widgets.tuto
tutoriels/la-surcharge-d-operateurs.tuto
tutoriels/l-heritage.tuto

• -tf : afficher le contenu de l'archive sans l'extraire
$ tar -tf tutoriels.tar
tutoriels/
tutoriels/les-principaux-widgets.tuto
tutoriels/la-surcharge-d-operateurs.tuto
tutoriels/l-heritage.tuto

• -rvf : ajouter un fichier
$ tar -rvf tutoriels.tar fichier_supplementaire.tuto
tutoriels/fichier_supplementaire.tuto

• -xvf : extraire les fichiers de l'archive
$ tar -xvf tutoriels.tar
tutoriels/
tutoriels/les-principaux-widgets.tuto
tutoriels/la-surcharge-d-operateurs.tuto
tutoriels/l-heritage.tuto
Les fichiers s'extraient dans le répertoire dans lequel vous vous trouvez
(!) Bien vérifier auparavant avec -tf si tous les fichiers sont dans un même dossier 

◘ gzip & bzip2 : compresser une archive

gzip : c'est le plus connu et le plus utilisé ;
bzip2 : il est un peu moins fréquemment utilisé. 
Il compresse mieux mais plus lentement que gzip
ils ajoutent un suffixe pour indiquer que l'archive a été compressée :
.tar.gz : si l'archive a été compressée avec gzip ;
.tar.bz2 : si l'archive a été compressée avec bzip2

• gzip : la compression la plus courante
gzip tutoriels.tar
L'archive est compressée et gagne ensuite le suffixe .gz
Pour décompresser l'archive ensuite, il suffit d'utiliser gunzip :
gunzip tutoriels.tar.gz
L'archive retrouve son état non compressé en .tar. 
Pour  extraire les fichiers de l'archive : tar -xvf

• bzip2 : la compression la plus puissante
bzip2 tutoriels.tar
Une archive compressée tutoriels.tar.bz2 sera alors créée. Pour la décompresser :
bunzip2 tutoriels.tar.bz2
Vous retrouvez un .tar que vous pouvez extraire avec tar -xvf

• Archiver et compresser en même temps avec tar

le programme tar est capable d'appeler lui-même 
gzip ou bzip2 si vous lui donnez les bons paramètres

• -zcvf : archiver et compresser en gzip
tar -zcvf tutoriels.tar.gz tutoriels/
Pour décompresser, le -c est remplacé par un -x :
tar -zxvf tutoriels.tar.gz

• -jcvf : archiver et compresser en bzip2
tar -jcvf tutoriels.tar.bz2 tutoriels/
Et pour extraire :
tar -jxvf tutoriels.tar.bz2 tutoriels/

(!) Vous pouvez toujours analyser le contenu de l'archive avant de la décompresser. 
Avec -ztf, vous regarderez à l'intérieur d'une archive « gzippée » 
et avec -jtf, vous regarderez à l'intérieur d'une archive « bzippée-deux »

• zcat, zmore & zless : afficher directement un fichier compressé
Parfois, on compresse directement un fichier.
Par exemple, je peux compresser un fichier .tuto directement :
gzip l-heritage.tuto (devient l-heritage.tuto.gz)
zcat : équivalent de cat, capable de lire un fichier compressé (gzippé).
zmore : équivalent de more, capable de lire un fichier compressé (gzippé).
zless : équivalent de less, capable de lire un fichier compressé (gzippé)
$ zcat l-heritage.tuto.gz

◘ unzip & unrar : décompresser les .zip et .rar

• unzip : décompresser un .zip
(si non installé) sudo apt-get install unzip
unzip archive.zip
Les fichiers vont s'extraire dans le dossier dans lequel vous vous trouvez 
Le problème est le même qu'avec les .tar.gz et .tar.bz2. 
Avant de décompresser, vérifiez si les fichiers sont réunis dans un même dossier
Pour voir le contenu d'une archive zip sans l'extraire, utilisez -l :
$ unzip -l tutoriels.zip
Pour créer un zip, installez le programme zip puis basez-vous sur la commande suivante :
zip -r tutoriels.zip tutoriels/
Le -r demande à compresser tous les fichiers contenus dans le dossier tutoriels 
(sans ce paramètre, seul le dossier, vide, sera compressé !)

• unrar : décompresser un .rar
sudo apt-get install unrar
Ensuite, pour extraire :
unrar e tutoriels.rar
Pour lister le contenu avant décompression, utilisez l'option l :
$ unrar l tutoriels.rar
```

## <a name="ssh"></a> La connexion sécurisée à distance avec SSH
```
◘ Comment sont chiffrés les échanges avec SSH ?

SSH utilise les deux chiffrements : asymétrique et symétrique. Cela fonctionne dans cet ordre.
    1. On utilise d'abord le chiffrement asymétrique pour s'échanger discrètement 
    une clé secrète de chiffrement symétrique.
    2. Ensuite, on utilise tout le temps la clé de chiffrement symétrique pour chiffrer les échanges.
Le chiffrement asymétrique est donc utilisé seulement au début de la communication, 
afin que les ordinateurs s'échangent la clé de chiffrement symétrique de manière sécurisée. 
Ensuite, ils ne communiquent que par chiffrement symétrique.

◘ Se connecter avec SSH et PuTTY

• Transformer sa machine en serveur

Si vous voulez accéder à votre PC depuis un autre lieu, vous devez le transformer en serveur au préalable.
Il faut tout simplement installer le paquet openssh-server :
sudo apt-get install openssh-server
RSA et DSA sont deux algorithmes de chiffrement asymétrique.
Normalement, le serveur SSH sera lancé à chaque démarrage. 
Si ce n'est pas le cas, vous pouvez le lancer à tout moment avec la commande suivante :
sudo /etc/init.d/ssh start
Et vous pouvez l'arrêter avec cette commande :
sudo /etc/init.d/ssh stop
le fichier de configuration se trouve dans/etc/ssh/ssh_config. 
Il faudra recharger SSH avec la commande sudo /etc/init.d/ssh reload 
pour que les changements soient pris en compte

• Se connecter via SSH à partir d'une machine Linux
Ouvrez une console sur le second PC et utilisez la commande ssh comme ceci :
ssh login@ip
Il faut remplacer login par votre login (mateo21, dans mon cas) et ip par l'adresse IP de votre ordinateur.
Si je suis chez un ami et que l'IP internet de mon ordinateur est 87.112.13.165, je vais taper :
ssh mateo21@87.112.13.165
Si, faute de mieux, vous voulez tester en vous connectant chez vous depuis chez vous, vous pouvez taper :
ssh mateo21@localhost
Si aucune erreur ne s'affiche, c'est que vous êtes bien connectés et que vous travaillez 
désormais à distance sur votre machine ! 
Vous pouvez effectuer toutes les opérations que vous voulez comme si vous étiez chez vous.
Pour vous déconnecter, tapez logout ou son équivalent : la combinaison de touches Ctrl+D.

• Se connecter via SSH à partir d'une machine Windows
Le plus connu d'entre eux s'appelle PuTTY
https://www.chiark.greenend.org.uk/~sgtatham/putty/latest.html
vous avez juste besoin de remplir le champ en haut « Host Name (or IP address) ». 
Entrez-y l'adresse IP de votre ordinateur sous Linux.
Vous pouvez changer le numéro du port si ce n'est pas 22, mais normalement c'est 22 par défaut.
Cliquer sur "Open".
Pour vous déconnecter, tapez logout ou son équivalent, la combinaison de touches Ctrl+D.

◘ L'identification automatique par clé

Il y a plusieurs façons de s'authentifier sur le serveur, pour qu'il sache que c'est bien vous. Les deux plus utilisées
sont :
* l'authentification par mot de passe ;
* l'authentification par clés publique et privée du client. (+ complexe a mettre en place, mais + pratique)
Avec cette nouvelle méthode d'authentification, 
c'est le client qui va générer une clé publique et une clé privée.
Les rôles sont un peu inversés.
L'avantage, c'est que l'on ne vous demandera pas votre mot de passe à chaque fois pour vous connecter.

• Authentification par clé depuis Linux
https://openclassrooms.com/fr/courses/43538-reprenez-le-controle-a-laide-de-linux/41773-la-connexion-securisee-a-distance-avec-ssh#/id/r-2282999
```

## <a name="transfert-fichiers"></a> Transférer des fichiers 
```
◘ wget : téléchargement de fichiers

permet de télécharger des fichiers directement depuis la console.
Il suffit d'indiquer l’adresse HTTP ou FTP d'un fichier à télécharger :
$ wget http://cdimage.debian.org/debian-cd/4.0_r5/i386/iso-cd/ debian-40r5-i386-businesscard.iso
Vous pouvez arrêter le téléchargement à tout moment en utilisant la combinaison Ctrl + C
Pour récupérer l'adresse du fichier à télécharger : faire un clic droit sur le lien du fichier, 
pour enfin sélectionner « Copier l'adresse du lien »
Notez qu'il existe aussi des navigateurs en console tels que lynx(plutôt basique) et
links (assez complet)

• Reprendre un téléchargement arrêté avec -c
$ wget -c http://cdimage.debian.org/debian-cd/4.0_r5/i386/iso-cd/ debian-40r5-i386-businesscard.iso

• Lancer un téléchargement en tâche de fond avec --background 
$ wget --background -c http://cdimage.debian.org/debian-cd/4.0_r5/ i386/iso-cd/debian-40r5-i386-businesscard.iso
Poursuite à l'arrière plan, pid 8422.
La sortie sera écrite vers « wget-log ».
man wget pour en savoir plus 

◘ scp : copier des fichiers sur le réseau

permet de copier des fichiers d'un ordinateur à un autre à travers le réseau
scp s'utilise quasiment comme ssh
scp fichier_origine copie_destination
Chacun de ces éléments peut s'écrire sous la forme suivante : login@ip:nom_fichier. 
Le login et l'IP sont facultatifs.
Si vous n'écrivez ni login ni IP, scp considérera que le fichier se trouve sur votre ordinateur.

• Copier un fichier de votre ordinateur vers un autre
scp image.png mateo21@85.123.10.201:/home/mateo21/images/
Sur cet autre ordinateur, le fichier image.png sera placé dans le dossier/home/mateo21/images/
alternative simplifée :
scp image.png mateo21@lisa.simple-it.fr:~/images/

• Copier un fichier d'un autre ordinateur vers le vôtre
scp mateo21@85.123.10.201:image.png copie_image_sur_mon_pc.png
Je copie le fichier image.png qui se trouve sur le serveur dont l'IP est85.123.10.201 
et place cette copie sur mon propre ordinateur sous le nomcopie_image_sur_mon_pc.png
Si je veux, je peux aussi copier le fichier sans en changer le nom :
scp mateo21@85.123.10.201:image.png .
Notez le point à la fin. Il signifie « copier dans le répertoire dans lequel je me trouve ».

• Le piège du port
Si le serveur SSH auquel vous essayez de vous connecter n'est pas sur le port standard (22),
il faudra indiquer le numéro du port avec l'option -P :
scp -P 16296 mateo21@85.123.10.201:image.png .

◘ ftp & sftp : transférer des fichiers

• Connexion à un serveur FTP
Essayons de nous connecter au serveur FTP de Debian, accessible à l'adresse suivante :ftp://ftp.debian.org.
$ ftp ftp.debian.org
Pour les serveurs FTP publics, le login à utiliser est toujours anonymous et mdp : peu importe 

• Se déplacer au sein du serveur FTP
les commandes que vous pouvez utiliser sont pour la plupart les mêmes que celles connues 
    ○ ls : affiche le contenu du répertoire actuel ;
    ○ pwd : affiche le chemin du répertoire actuel ;
    ○ cd : change de répertoire.
ftp> ls
ftp> cd debian
250 Directory successfully changed.

• Le transfert de fichiers
    ○ put : envoie un fichier vers le serveur (impossible pour les serveurs FTP publics) ;
    ○ get : télécharge un fichier depuis le serveur.
ftp> get README
Pour savoir dans quel dossier vous êtes chez vous, tapez !pwd :
ftp> !pwd
/home/mateo21
Si vous voulez changer de dossier chez vous, utilisez !cd.
Pour lister les fichiers chez vous, utilisez !ls

man ftp pour obtenir un aperçu des commandes disponibles
quitter : Ctrl + D ou exit 

• sftp : un FTP sécurisé (données cryptées)
sftp repose sur SSH pour sécuriser la connexion :
sftp login@ip
Par exemple :
sftp mateo21@lisa.simple-it.fr
le manuel pour plus d'informations : man sftp
Pour se connecter en SFTP, on utilise le même port que SSH (soit 22 par défaut).
Si votre serveur SSH fonctionne sur un autre port, vous devrez le préciser comme ceci :
sftp -oPort=27401 mateo21@serveur

◘ rsync : synchroniser des fichiers pour une sauvegarde

effectuer une synchronisation entre deux répertoires, 
que ce soit sur le même PC ou entre deux ordinateurs reliés en réseau
C'est une sorte de scp intelligent : il compare et analyse les différences entre deux dossiers 
puis copie uniquement les changements. C'est ce que veut dire le mot « incrémentiel »
rsync peut être utilisé pour effectuer une sauvegarde entre deux dossiers sur le même ordinateur 
ou bien entre deux dossiers sur deux ordinateurs différents

• Sauvegarder dans un autre dossier du même ordinateur
on souhaite sauvegarder le dossier Imagesdans un dossier backups
$ rsync -arv Images/ backups/
sending incremental file list
created directory backups
./
espagne1.jpg
italie1.jpg
italie2.jpg
italie3.jpg
    -a : conserve toutes les informations sur les fichiers, comme les droits (chmod), la date de modification, etc. ;
    -r : sauvegarde aussi tous les sous-dossiers qui se trouvent dans le dossier à sauvegarder ;
    -v : mode verbeux, affiche des informations détaillées sur la copie en cours.
On lance la commande une 2ème fois : aucun fichier n'a été envoyé
Testons un peu ce qui se passe si l'on ajoute un fichier :
$ touch Images/espagne2.jpg
$ rsync -arv Images/ backups/
sending incremental file list
./
espagne2.jpg => Le nouveau fichier espagne2.jpg a bien été copié

• Supprimer les fichiers
Par défaut, rsync ne supprime pas les fichiers dans le répertoire de copie. 
Si vous voulez lui demander de le faire, pour que le contenu soit strictement identique, rajoutez --delete.
Par exemple, si je supprime le fichier italie3.jpg :
$ rm Images/italie3.jpg
$ rsync -arv --delete Images/ backups/
sending incremental file list
deleting italie3.jpg => supprime mon fichier italie3.jpg

• Sauvegarder les fichiers supprimés
il est possible de garder de côté les fichiers que l'on a supprimés avec --backup
Vous pouvez aussi, pour éviter que ça ne fasse désordre, déplacer les fichiers supprimés 
dans un dossier qui leur est dédié. Rajoutez --backup-dir=/chemin/vers/le/repertoire (chemin absolu)
$ rsync -arv --delete --backup --backup-dir=/home/mateo21/backups_supprimes Images/ backups/
exclure un dossier de la sauvegarde (option --exclude)

• Sauvegarder sur un autre ordinateur
$ rsync -arv --delete --backup --backup-dir=/home/mateo21/fichiers_supprimes Images/ mateo21@IP_du_serveur:mes_backups/
Si votre serveur SSH écoute sur un autre port que celui par défaut, il faudra rajouter-e "ssh -p port" :
$ rsync -arv --delete --backup --backup-dir=/home/mateo21/fichiers_supprimes Images/ mateo21@IP_du_serveur:mes_backups/
-e "ssh -p 12473"
```

## <a name="analyser-reseau"></a> Analyser le réseau et filtrer le trafic avec un pare-feu

## <a name="compiler-programme"></a> Compiler un programme depuis les sources

il arrive parfois qu'il soit nécessaire d'installer un programme manuellement car il n'apparaît pas dans apt-get. 
Dans ce cas, il faut récupérer les sources du programme et les compiler soi-même pour créer un exécutable

◘ Essayez d'abord de trouver un paquet .deb

certains programmes récents, peu connus ou encore en développement ne sont pas disponibles via apt-get
Quand apt-get ne propose pas le programme que l'on recherche, 
il est parfois possible de trouver sur le site web du logiciel un paquetage .deb
équivalent du programme d'installation, spécifique à Debian et à ses distributions dérivées (dont fait
partie Ubuntu)
téléchargez-le et double-cliquez dessus

◘ Quand il n'y a pas d'autre solution : la compilation

la compilation permet de transformer le code source d'un programme en un exécutable que l'on peut utiliser

• Compilation d'un programme pas à pas
installer les outils de compilation
sudo apt-get install build-essential
Ex. : compiler un petit programme assez simple : htop
La première étape consiste à se rendre sur le site web du logiciel htop
Recherchez sur le site la section « Downloads », puis, sur la page des téléchargements, recherchez les sources
télécharger les dernières sources du programme
Vous allez télécharger une archive compressée .tar.gz
tar zxvf htop-0.8.3.tar.gz
On peut maintenant se rendre dans le dossier où les fichiers sources ont été décompressés :
cd htop-0.8.3
un seul programme nous intéresse : configure. Exécutez-le comme suit :
./configure
configure est un programme qui analyse votre ordinateur et 
qui vérifie si tous les outils nécessaires à la compilation du logiciel que vous souhaitez installer 
sont bien présents
Malheureusement, il arrivera fréquemment que configure affiche une erreur en raison d’un manque de dépendances.
Dans notre cas, il devrait afficher une erreur comme celle-ci :
checking curses.h usability... no
checking curses.h presence... no
checking for curses.h... no
configure: error: missing headers: curses.h
il faut installer l'élément manquant, en l'occurrence ces fameux headers de curses.h
La technique la plus efficace consiste à effectuer une recherche de la ligne d’erreur sur le web,
accompagnée de préférence du mot-clé « ubuntu »
« configure: error: missing headers: curses.h ubuntu »
L'information à chercher est le nom du paquet manquant que vous devez installer.
En lisant les forums, vous devriez finir par trouver le nom du paquet que vous recherchez : libncurses5-dev.
En l'occurrence, il suffit d'installer ce paquet via apt-get pour ne plus avoir l'erreur indiquée dans configure.
sudo apt-get install libncurses5-dev
(peut-être qu'il faut redémarrer pour que les changements soient pris en compte)
(pour mon cas, j'ai tapé, comme conseillé : ./configure --disable-unicode)
Le programme est prêt à être compilé ! 
Il suffit maintenant de lancer la compilation à l’aide d’une commande toute simple :
make
Une fois la compilation terminée, l'exécutable devrait avoir été créé.
Exécutez la commande suivante :
sudo make install
Une fois que cela est fait, le programme est installé !
Nous pouvons à présent exécuter htop en tapant le nom de la commande :
htop
Si vous souhaitez désinstaller le programme,
il suffit d'exécuter cette commande depuis le répertoire où vous l'avez compilé :
sudo make uninstall