# MEMENTO GIT & GITHUB


## RESSOURCES

* https://learngitbranching.js.org/?locale=fr_FR
---
* Cours OC > https://openclassrooms.com/fr/courses/2342361-gerez-votre-code-avec-git-et-github/2433596-installez-git
* https://www.webfx.com/blog/web-design/interactive-git-tutorials/
* https://git-school.github.io/visualizing-git/
* https://gitup.co/
---
* Comprendre Git (1/18) : Qu'est ce que git ? (Grafikart) : https://www.youtube.com/watch?v=rP3T0Ee6pLU&list=PLjwdMgw5TTLXuY5i7RW0QqGdW0NZntqiP
* Comprendre Git (11/18) : Créer clé SSH, Fork & Pull request : https://www.youtube.com/watch?v=D5QGiIM1j20&list=PLjwdMgw5TTLXuY5i7RW0QqGdW0NZntqiP&index=11
* Comprendre Git (13/18) : Nommer ses commits : https://www.youtube.com/watch?v=AlHohDBBAMY&list=PLjwdMgw5TTLXuY5i7RW0QqGdW0NZntqiP&index=16
* Comprendre Git (12/18) : Git Flow : https://www.youtube.com/watch?v=ZQAQ4HcskAY&list=PLjwdMgw5TTLXuY5i7RW0QqGdW0NZntqiP&index=14
---
* Débuter avec Git et Github : https://www.youtube.com/watch?v=V6Zo68uQPqE
* Débuter avec Git et Github en 30 min : https://www.youtube.com/watch?v=hPfgekYUKgk&feature=youtu.be
* Gérez vos codes source avec Git : https://openclassrooms.com/fr/courses/1233741-gerez-vos-codes-source-avec-git
* Git & GitHub : Le Cours Pour Les Débutants : https://www.youtube.com/watch?v=4o9qzbssfII
* LES BASES DE GIT (tuto débutant) : https://www.youtube.com/watch?v=gp_k0UVOYMw&feature=youtu.be
* https://www.jesuisundev.com/comprendre-git-en-7-minutes/
* https://git-scm.com/book/en/v2/Git-Branching-Rebasing
* Chapter 4. Undoing and Editing Commits : https://www.oreilly.com/library/view/git-pocket-guide/9781449327507/ch04.html
* https://git-scm.com/downloads/guis
* GitHub Desktop Quick Intro For Windows : https://www.youtube.com/watch?v=77W2JSL7-r8
* https://www.atlassian.com/git/tutorials/merging-vs-rebasing#the-golden-rule-of-rebasing
* https://www.atlassian.com/fr/git/tutorials/advanced-overview
* World's Easiest Guide to Git Reset : https://dev.to/nickbulljs/world-s-easiest-guide-to-git-reset-47mi
* Git: Cheat Sheet (advanced) : https://dev.to/maxpou/git-cheat-sheet-advanced-3a17
* A Visual Git Reference : https://marklodato.github.io/visual-git-guide/index-en.html
* LF will be replaced by CRLF in git - What is that and is it important? : https://stackoverflow.com/questions/5834014/lf-will-be-replaced-by-crlf-in-git-what-is-that-and-is-it-important
* https://dev.to/bartzalewski/learn-git-good-practices-3jp3
* Changing a commit message : https://docs.github.com/en/free-pro-team@latest/github/committing-changes-to-your-project/changing-a-commit-message

### TO READ

* How to resolve merge conflicts with git : https://dev.to/the_real_stacie/how-to-handle-merge-conflicts-with-git-1ked

## SOMMAIRE

* [Bonnes pratiques](#bonnes-pratiques)
* [GLOSSAIRE](#glossaire)
* [CHEATSHEET](#cheatsheet)
* [GERER LES CONFLITS](#-GERER-LES-CONFLITS)   
   * [CRLF](#crlf)
   * [REBASE](#rebase)
   * [ACK/NAK](#ACK-NAK)
* [Les commandes de base de la console](#commandes-base)
* [TELECHARGER GIT](#telecharger-git)
* [EDITEUR DE TEXTE](#editeur-de-texte)
* [PREMIER COMMIT](#premier-commit)
* [LIRE L'HISTORIQUE](#historique)
* [SE POSITIONNER SUR UN COMMIT DONNÉ](#se-positionner)
* [COMPRENDRE LES REMOTES](#comprendre-les-remotes)
* [GITHUB](#github)
* [RECUPERER DU CODE D'UN AUTRE REPOSITORY](#cloner-projet)
* [CREER UN PREMIER REPOSITORY](#creer-un-premier-repository)
* [ENVOYER LE CODE SUR GITHUB](#send-github)
* [RECUPERER DES MODIFICATIONS](#recuperer-des-modifications)
* [CREER UN REPOSITORY et L'ENVOYER SUR GITHUB](#create-repo)
* [CREER DES BRANCHES](#creer-des-branches)
* [FUSIONNER DES BRANCHES](#fusionner-des-branches)
* [RESOUDRE UN CONFLIT](#resoudre-un-conflit)
* [RETROUVER QUI A FAIT UNE MODIFICATION](#find-culprit)
* [IGNORER DES FICHIERS](#git-ignore)
* [EVITER DES COMMITS SUPERFLUS](#commits-superflus)
* [CONTRIBUER A DES PROJETS OPEN SOURCE](#open-source)
* [GITKRAKEN : UNLEASH THE KRAKENNN](#gitkraken)

## Bonnes pratiques

* Créer son repository + son readme sur Github puis cloner le projet sur son disque dur et ajouter progressivement ses fichiers
* Commit message = impératif + minuscule + pas de point

## GLOSSAIRE

* HEAD = commit sur lequel nous travaillons = référence (pointeur) de la branche courante, le parent du prochain commit
* Origin = le dépôt distant, là où a été crée le repo (ex. GitHub)
* Remote = le dépôt local (machine de l'utilisateur)
* Fork = miroir d'un projet

## CHEATSHEET

* https://github.github.com/training-kit/downloads/fr/github-git-cheat-sheet/
* http://www.ndpsoftware.com/git-cheatsheet.html#loc=local_repo;
---
* Bases : https://rogerdudler.github.io/git-guide/files/git_cheat_sheet.pdf
* Bases : https://github.github.com/training-kit/downloads/github-git-cheat-sheet.pdf
* Bases : https://github.com/godcrampy/cheat-sheets/blob/master/git/git-cheatsheet.pdf
* Les commandes GIT que vous devez absolument connaître ! : https://www.hostinger.fr/tutoriels/commandes-git/
* Cheatsheet complet : https://dev.to/zinox9/git-github-cheatsheet-22ok
* https://www.keycdn.com/blog/git-cheat-sheet
* https://scotch.io/bar-talk/git-cheat-sheet
* https://education.github.com/git-cheat-sheet-education.pdf
* Git cherry-pick : https://www.atlassian.com/fr/git/tutorials/cherry-pick
* Git Log Cheatsheet : https://elijahmanor.com/blog/git-log
* Git Flow cheatsheet : https://danielkummer.github.io/git-flow-cheatsheet/

### VIM
* Vim cheatsheet : https://devhints.io/vim
```shell
i # passer en mode insertion
:w # sauvegarder
:q # quitter
:wq # sauvegarder et quitter

## MODE INTERACTIF
* mode interactif, taper "i"
* en sortir, taper "esc"
* puis ":wq!" pour sauvegarder et sortir de la fenêtre interactive
```
### GIT
```shell
# CONSEILS
* commit avant pull ou modif sur branche principale
* commit avant de passer sur une autre branche
* It is specified in the git docs that rebase should not be used in public repos (collaboration) as it can cause major errors and conflicts, it can be used in private repos (https://dev.to/zinox9/git-github-cheatsheet-22ok)

# MISE A JOUR (WINDOWS)
git update-git-for-windows

# NAVIGATION
mkdir nouveauDossier # créer un dossier
cd nouveauDossier/ # entrer dans le repertoire
ls # lister les fichiers
touch fichierCréé

# CONFIG
git config --global user.name "[nom]" # le nom associé aux commit
git config --global user.email "[adresse email]" # le mail associé aux commit
git config --global color.ui auto # enables helpful colorization of command line output
git config --list # tous les paramètres de config
git config --global --list # tous les paramètres de config en global
git config --local --list # tous les paramètres de config en local

# INITIALISATION SUR LE DEPOT LOCAL
git init
git init -b develop # initialise le dépôt en créant et en se mettant sur une branche (ici develop)
# (par défaut la branche s'appelle master) (possible seulement avec la version 2.28 de Git)

# AJOUT D'UN DEPOT DISTANT
git remote add origin [url du dépôt distant]

# CLONE
git clone [url]

# INFOS
git help
git commit --help # ouvre la doc
git status # status des fichiers suivis
git log # historique de l'activité + ID des commits
git log --oneline
git log -n 2 # deux lignes d'historique seulement
git log -p readme.md # historique de readme.md
git log --oneline --decorate --graph # "pretty" log
git show # afficher des informations sur tout fichier git
git diff # énumère les changements depuis le dernier commit
git describe [commit ou branche(HEAD)] # donne : <tag>_<numCommitsWithTag>_g<hashOfCommit>
# v1_2_gC6

# RECUPERER LES CHANGEMENTS DU DEPOT
git fetch [nom-de-depot] # récupère tout l’historique/métadonnées du dépôt nommé
# ex. git fetch origin
git pull # récupère en local les modifications du dépôt (origin)
git pull origin brancheARecuperer # commande générique ex. git pull origin master
git pull --rebase origin brancheARecuperer # git pull + rebase (une ligne d'historique, sans commits de merge)

# AJOUT DE FICHIER A LA PILE DE STAGING
git add . # ajoute tous les fichiers modifiés à la pile du staging (sauf les fichiers supprimés)
git add *.html # ajoute tous les fichiers html
git add --all # ajoute tous les fichiers modifiés à la pile du staging
git add fichier.dart # ajoute SEULEMENT le fichier.dart à la pile
git add . :!path/to/file1 :!path/to/file2 :!path/to/folder1/*
# ajoute tous les fichiers sauf ceux précédés de :! (file1, file1, tous les fichiers dans folder1/)
git add --all -- ':!path/to/file1' ':!path/to/file2' ':!path/to/folder1/*' # version linux
git rm --cached fichier.dart # supprimer un fichier de la pile de staging
# pour le remettre dans la pile : git add fichier.dart
git reset HEAD fichier.dart # supprimer un fichier de la pile de staging

# STASH
git stash # enregistrer les changements qui ne doivent pas être commit immédiatement
# ex. une modification urgente doit être faite => mise en brouillon de l'avancement avec git stash
git stash save nomDuStash # enregistre de façon nominative
git stash list # liste les stash
git stash -p # stasher uniquement un ou plusieurs fichiers modifiés
git stash -u # stasher également les fichiers non suivis
git stash apply # réappliquer les changements stashés (stash toujours présent dans la liste)
git stash drop # supprime le dernier stash de la liste
git stash pop # réappliquer les changements stashés et supprime le stash (apply + drop)
git stash pop stash{1} # réappliquer les changements d'un stash en particulier (apply + drop)
git stash show # résumé d'un stash ex. git stash show stash@{1}, git stash show stash@{1} -p pour + d'infos
git stash drop # supprime le dernier stash de la liste
git stash clear # supprimer tous les stash de l'historique
git stash branch brancheCrééeAPartirDunStash

# COMMIT
git commit -m "mon message de commit" # commit
git commit -a -m "mon message de commit" # stage all files + commit
git commit --amend # envoie les nouvelles modification sur le commit précédent
# workflow = 
# git add .
# git commit --amend -m "A better message"
# si déjà présent sur le dépôt distant, git push -f ma_branche
git push # pousser le commit sur la branche d'origin
git push -f # push en force
git push -u origin develop # dépose la branche sur le dépôt distant,
# en spécifiant le dépôt comme la référence en amont (premier commit)
git push origin brancheADeposerSurDepotDistant

# SE DEPLACER DANS LES COMMITS
git checkout ma_branche^ # revient un commit en arrière
git checkout HEAD^ # same
git checkout HEAD^^ # deux commits en arrière
git checkout HEAD~4 # revient 4 commits en arrière

# ANNULATION
git revert [commitSha] # supprime les changements du commit sélectionné
# en créant un nouveau commit de suppression qui annule les derniers changements
# ex. git revert HEAD supprime les changements du dernier commit
git reset [commitSha] # annule tous les commits après [commitSha], en conservant les modifications localement
# ex. git reset HEAD~1 annule les changements du dernier commit
git reset --hard [commitSha] # supprime tout l’historique et les modifications effectuées après le commit spécifié
git reset --hard HEAD # réinitialiser l’index et le répertoire de travail à l’état du dernier commit
git reset HEAD^ --soft # revient un cran en arrière, avec les changements en staging
git reset HEAD^^ --mixed # revient deux crans en arrière, avec les changements absents du staging
git reset HEAD^^^ --hard # revient trois crans en arrière, et supprime tout ce qui a été fait par la suite
git checkout [commitSha] # revient à l'état du projet à ce moment, sans pouvoir le modifier
git checkout [commitSha] index.html # revient à l'état du fichier à ce moment, et pouvoir le modifier
# le fichier est directement placé en staging

# MERGE
git rebase [nom-branche-base] # git rebase = prendre une branche comme base et la prolonger
# rebase = prolonger ex. git rebase develop = je prolonge la branche develop avec ma branche
# crée une seule ligne d'historique (comme si les autres branches n'avaient jamais existé)
# git rebase [base] (OK pour les branches privées/locales (ex. feature), 
# à éviter pour les branches publiques/publiées (ex. master, develop) car rebase crée de nouveaux commits
# ex. sur branche feature = git rebase develop 
# => place ma branche feature au bout de la branche develop = develop -> feature
# pour que la branche develop reviennent en bout de branche = git checkout develop, git rebase feature
git rebase -i [nom-commit-base ou nom-branche-base] # git rebase interactif qui permet de modifier les commits qui prolongent la base
# git rebase -i HEAD~n command display a list of the last n commits in your default text editor
# ex. git rebase -i HEAD~4 va donner la possibilité de ré-arranger tous les commits qui prolongent HEAD~4
# ex.2 = sur la branche dev, je veux enlever des commits avant de merger avec la branche master
# git rebase master -i # je supprime les commits superflus créés dans ma branche
git rebase [nom-branche-base] [nom-branche-prolonge]
# ex. sur la branche feature*, "git rebase master" = "git rebase master feature" (même instruction)
# "git rebase master feature" = "git checkout feature" + "git rebase master"
git merge [nom-de-branche] # combine dans la branche courante l’historique de la branche spécifiée
# ex. sur branche master = git merge feature5, puis git branch -d feature5
git merge [nom-de-depot]/[branche] # fusionne la branche du dépôt dans la branche locale courante
git merge --squash # merge en "écrasant" ses commits en un seul
# ex. On veut merger la branche hotfix-001 dans la branche master en "écrasant" ses commits en un seul.
# $ git checkout master
# $ git merge --squash hotfix-001
# $ git commit
# Ces commandes vont prendre tous les commits de la branche hotfix-001, 
# les "écraser" en UN SEUL commit puis les fusionner dans la branche master.
# Le contenu des commits de hotfix-001 est aggrégé dans le commit effectué sur la branche master
git cherry-pick [commitSha] # sélectionne un commit d'une branche 
# et l'applique au début de notre branche actuelle
git cherry-pick [commitSha1] [commitSha2] # prolonge la branche par c1 puis c2

# BRANCHE
git checkout [nom-de-branche] # bascule sur la branche spécifiée
git checkout -b new-branch # créer une branche new-branch et se placer dessus
git branch -d [nom-de-branche] # supprime la branche spécifiée après une merge
git branch -D [nom-de-branche] # supprime la branche spécifiée
git branch # liste les branches, git branch -a pour les branches aussi distantes

# CONFLITS
git diff # énumérer les changements ou conflits depuis le dernier commit
git diff nom_du_fichier # voir les changements du fichier depuis le dernier commit
git diff --base [nom-fichier] # pour visualiser les conflits d’un fichier
git diff [source_branche] [target_branch] # voir les changements entre 2 branches
# + afficher les conflits entre les branches à fusionner avant de les fusionner

# TAG
git tag [mon_tag] [commitSha] # git tag v1.0.0 1b2e1d63ff
# sans commitSha, le tag pointera sur le HEAD
git push origin [mon_tag] # le pousser sur le dépôt distant

# LANCER L'INTERFACE GRAPHIQUE
gitk

## CREER NOUVELLE BRANCHE
git checkout develop # se placer sur la branche principale
git pull # récupérer les derniers changements de la branche principale
git checkout -b nouvelle-branche # créer une branche nouvelle-branche et se placer dessus + fetch + pull
git push --set-upstream origin nouvelle-branche # créer la branche sur la version distante 
# et assure le lien entre les 2 versions

## GIT PULL + REBASE DE LA BRANCHE PRINCIPALE (retard sur la branche principale)
git add + git commit + git push du travail en cours
git checkout develop # se placer sur la branche principale
git pull # récupérer les changements de la branche principale
git checkout ma_branche # se placer sur la branche feature
# il faut MAJ la branche develop car il y a eu des changements
git rebase develop # MAJ de la branche principale (notre passé, notre base), 
# prolongée par notre branche (notre présent)
git push -f # push en force
```

## GERER LES CONFLITS

### CRLF
* fatal: CRLF would be replaced by LF
```shell
git config --global core.autocrlf false # désactive l'auto-génération des retours à la ligne Windows et supprime l'interdiction
git config --global core.safecrlf false # si l'instruction ci-dessus ne marche pas
// ou warn, pour avoir simplement l'avertissement
```
### REBASE
* https://docs.github.com/en/free-pro-team@latest/github/collaborating-with-issues-and-pull-requests/resolving-a-merge-conflict-using-the-command-line
* ouvrir le fichier de conflit avec Editeur (ex. Android Studio)
* décider ce qu'il doit rester en supprimant aussi les indicateurs
```
If you have questions, please
<<<<<<< HEAD
open an issue
=======
ask your question in IRC.
>>>>>>> branch-a
```
* git add .
* git commit -m "Resolved merge conflict by incorporating both suggestions."
* git rebase --continue
* git push -f

### ACK NAK
```
fatal: git fetch-pack: expected ACK/NAK, got 'error: Internal server error'
fatal: the remote end hung up unexpectedly
```
* solution : git clone du projet

## <a name="commandes-base"></a> Les commandes de base de la console
```shell
○ La commande pwd vous permet de connaître votre répertoire courant (tapez pwd puis Entrée) :
pwd
/Users/marcgg

○ La commande ls vous permet de voir la liste des fichiers et répertoires dans le dossier courant :
ls
Applications Desktop Documents
Si vous souhaitez voir les éléments de votre répertoire courant sous forme de liste, vous pouvez ajouter l''option '-l' à la commande ls. Vous pouvez également afficher plus d''informations sur ces éléments en utilisant l''option '-a' :
ls -l -a
drwxr-xr-x 2 marcgg staff 68 Jan 10 2014 Applications
drwx------+ 44 marcgg staff 1496 Aug 29 12:11 Desktop
drwx------+ 21 marcgg staff 714 May 7 11:14 Documents

○ La commande cd vous permet de vous placer dans un répertoire.
cd Applications
Notez que pour revenir au répertoire parent, vous pouvez utiliser 'cd ..' , et pour revenir dans votre répertoire principal il suffit de taper 'cd ~'.

○ La commande touch vous permet de créer un fichier.
touch fichieracreer.txt

○ La commande mkdir vous permet de créer un dossier.
mkdir repertoireacreer

La commande cat vous permet d''afficher le contenu d’un fichier.

○ cat monfichier.txt
Chapitre 3 : Installer Git
C''est parti !
```

## TELECHARGER GIT

* https://gitforwindows.org/
```shell
Exécutez la commande suivante pour définir votre nom et l’email que vous utiliserez ensuite pour créer un compte gratuit sur Github:
git config --global user.name "Pablo Buisson"
git config --global user.email "pablo.buisson@gmail.com"
Pour vérifier que tout va bien, relancez votre console et tapez simplement 'git'. Si l’installation a fonctionné, vous devriez voir du texte en anglais expliquant l’utilisation de Git.
```

## EDITEUR DE TEXTE
```shell
Voici les quelques manipulations utiles pour Vim que j''utiliserais lors de ce cours :

○ Commande 'vim' pour ouvrir un fichier dans Vim. Par exemple :
vim mon fichier.txt

Commandes exécutables depuis Vim : ':w' pour sauvegarder le fichier, ':q' pour quitter Vim. Dans les vidéos du cours, j''utiliserai aussi souvent le raccourci ':x' qui permet de sauvegarder et quitter Vim.
```

## PREMIER COMMIT
```shell
Pour commencer, créez un nouveau dossier et positionnez vous dedans avec la console. Clic-droit > Git Bash Here
Créez un nouveau dossier 'monPremierRepo' en lançant la commande suivante :
mkdir monPremierRepo
Vous remarquerez que j''ai appelé ce dossier 'Repo', qui est le petit nom de repository.. car nous allons utiliser ce dossier comme repository, c''est-à-dire comme répertoire de travail géré par Git ! Voici un petit résumé des étapes à suivre : 

    Pour activer un dossier comme repository Git, il suffit de se placer dans ce dossier avec le Terminal puis d''utiliser la commande git init. 

    Pour gérer un repository, Git génère un index de tous les fichiers dont il doit faire le suivi. Lorsque vous créez un fichier dans un repository, vous devez donc l''ajouter à l''index Git à l''aide de la commande git add nomDeVotreFichier.extension. Par exemple :
    git add checklist-vacances.md

    Lorsque vous modifiez votre repository, vous devez demander à Git d''enregistrer vos modifications en faisant un git commit. L''option-m vous permet de lui envoyer un message décrivant les modifications effectuées, ce qui s''avèrera très utile pour vous par la suite, you''ll see! :) Par exemple :
    git commit -m "Ajouté ma checklist-vacances.md (woohoo!)"

EX.
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/monPremierRepo (master)
$ git init

Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/monPremierRepo (master)
$ touch premier_commit.md

Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/monPremierRepo (master)
$ git add premier_commit.md

Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/monPremierRepo (master)
$ git status
On branch master

No commits yet

Changes to be committed:
(use "git rm --cached <file>..." to unstage)

    new file: premier_commit.md


    Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/monPremierRepo (master)
    $ git commit -m "Ajouté premier commit"
    [master (root-commit) 1bdb1ed] Ajouté premier commit
    1 file changed, 0 insertions(+), 0 deletions(-)
    create mode 100644 monPremierRepo/premier_commit.md
```

## <a name="historique"></a> LIRE L'HISTORIQUE

* https://openclassrooms.com/fr/courses/2342361-gerez-votre-code-avec-git-et-github/2433606-lisez-lhistorique
```shell
git init
touch un_fichier.md
git add un_fichier.md
vim un_fichier.md
i + Premiere modification + escp + ZZ
git add un_fichier.md
git commit -m "Ajouté premieres informations"
git log => tous les fichiers, avec leur sha, date, auteur, etc. q pour sortir

Quitter et sauvegarder dans VIM : escape (plusieurs fois) + ZZ ;
i pour insérer un message ;
git log pour voir les modifications, q pour quitter ce mode ;
Pour ajouter un commit à un fichier déjà enregistré dans le repertoire (sans passer par git add + git commit) :
git commit -a -m "Dernière modification"
```

## <a name="se-positionner"></a> SE POSITIONNER SUR UN COMMIT DONNÉ

* https://openclassrooms.com/fr/courses/2342361-gerez-votre-code-avec-git-et-github/2433626-positionnez-vous-sur-un-commit-donne
```shell
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ git init
Initialized empty Git repository in C:/Users/Pablo/Documents/WEB DEV/GIT/se_positionner/.git/
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ touch script.js
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ vim script.js
i alert("Hello world !") escp ZZ
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ git add script.js
warning: LF will be replaced by CRLF in script.js.
The file will have its original line endings in your working directory
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ git commit -m "Script qui affiche Hello world !"
[master (root-commit) 6721899] Script qui affiche Hello world !
1 file changed, 1 insertion(+)
create mode 100644 script.js
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ git log
commit 672189938f1ac5019e6dad81eb12929aea99d5f4 (HEAD -> master)
Author: Pablo Buisson <pablo.buisson@gmail.com>
    Date: Mon Apr 15 15:47:19 2019 +0200
    Script qui affiche Hello world !
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ vim script.js
let hello = "Hello world !"
alert(hello)
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ git commit -am "Refactoring : utilisé une variable"
warning: LF will be replaced by CRLF in script.js.
The file will have its original line endings in your working directory
[master 9467427] Refactoring : utilisé une variable
1 file changed, 2 insertions(+), 1 deletion(-)
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ vim script.js
let hello = "Hello world !"
alert(hello # création d'une erreur
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ git commit -am "Petite modif, surement pas d'erreur"
warning: LF will be replaced by CRLF in script.js.
The file will have its original line endings in your working directory
[master b2d9ab3] Petite modif, surement pas d''erreur
 1 file changed, 1 insertion(+), 1 deletion(-)

Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ git log
commit b2d9ab353614a8706c9a14a9245163ccf3a94fcf (HEAD -> master) # ne fonctionne pas
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Mon Apr 15 15:56:19 2019 +0200

    Petite modif, surement pas d''erreur

commit 94674271f27275e1c7932aa774e5be663432c830 # fonctionne : version sûre
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Mon Apr 15 15:52:56 2019 +0200

    Refactoring : utilisé une variable

commit 672189938f1ac5019e6dad81eb12929aea99d5f4
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Mon Apr 15 15:47:19 2019 +0200

    Script qui affiche Hello world !
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ git checkout 672189938f1ac5019e6dad81eb12929aea99d5f4 # revient à la première version 
Note: checking out '672189938f1ac5019e6dad81eb12929aea99d5f4'.

You are in 'detached HEAD' state. You can look around, make experimental
changes and commit them, and you can discard any commits you make in this
state without impacting any branches by performing another checkout.

If you want to create a new branch to retain commits you create, you may
do so (now or later) by using -b with the checkout command again. Example:

  git checkout -b <new-branch-name>

HEAD is now at 6721899 Script qui affiche Hello world !
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner ((6721899...))
$ cat script.js
alert("Hello world !")
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner ((6721899...))
$ git checkout master # afficher le dernier commit
Previous HEAD position was 6721899 Script qui affiche Hello world !
Switched to branch 'master'
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master)
$ cat script.js
let hello = "Hello world !"
alert(hello
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner (master) # affiche commit du milieu pour voir s''il est bon ou pas
$ git checkout 94674271f27275e1c7932aa774e5be663432c830
Note: checking out '94674271f27275e1c7932aa774e5be663432c830'.

You are in 'detached HEAD' state. You can look around, make experimental
changes and commit them, and you can discard any commits you make in this
state without impacting any branches by performing another checkout.

If you want to create a new branch to retain commits you create, you may
do so (now or later) by using -b with the checkout command again. Example:

    git checkout -b <new-branch-name>

HEAD is now at 9467427 Refactoring : utilisé une variable
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/se_positionner ((9467427...))
$ cat script.js
let hello = "Hello world !"
alert(hello)

2 solutions
- git checkout master => vim script.js => correction de l''erreur
ou git checkout dernier SHA qui marche et supprimer le fichier bugué

On ne peut pas vraiment "supprimer" un commit, mais on a plusieurs options pour l''annuler. 
Je vous présente une de ces options : vous pouvez "revert" un commit, c''est-à-dire créer un nouveau commit qui fait l''inverse du précédent, avec la commande suivante :
git revert SHADuCommit
Attention, ça crée un nouveau commit dans l''historique du coup ! (le commit "inverse" du précédent)

Sinon, si vous voulez simplement modifier le message de votre dernier commit, vous pouvez utiliser la commande suivante :
git commit --amend -m "Votre nouveau message"

Pour annuler tous les changements que je n''ai pas encore commités.
Possible avec un reset !
git reset --hard‌
```

## COMPRENDRE LES REMOTES
```shell
Créer un backup délocalisé et ouvert aux collaborateurs
git remote pour envoyer le code sur le web
écriture du code => commit => envoi sur un remote (machine interne ou externe)
```

## GITHUB
```shell
Partager des morceaux de code en ligne avec Gist
Petite astuce pour mieux vous y retrouver dans votre code en ligne : appuyez sur la touche t, vous pourrez alors faire une recherche dans vos noms de fichiers en tapant un mot / des lettres clé !
```

## <a name="cloner-projet"></a> RECUPERER DU CODE D'UN AUTRE REPOSITORY
```shell
Aller sur le projet => Clone with HTTPS => copier l''url => GIT
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT (master)
$ mkdir demo
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT (master)
$ cd demo/ # rentrer dans le dossier crée
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo (master)
$ git clone https://github.com/facebook/react.git
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo (master)
$ ls # voir la liste des fichiers et répertoires dans le dossier courant
react/
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo (master)
$ cd react/
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/react (master)
$ ls
appveyor.yml CODE_OF_CONDUCT.md fixtures/ package.json scripts/
AUTHORS CONTRIBUTING.md LICENSE packages/
```

## CREER UN PREMIER REPOSITORY
```shell
+ => New repository => Initialize this repository with a README (qui vous permet de cloner votre repository sur votre machine. Cette option est à cocher uniquement dans le cas où vous
n''avez pas encore créé le repository en question sur votre machine)
Clone => copier l''url => 
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo (master)
$ git clone https://github.com/PabloBuisson/demo_git.git
```

## <a name="send-github"></a> ENVOYER LE CODE SUR GITHUB
```shell
Se placer dans le repository et lancer Git.
ls pour voir les fichiers présents
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/demo_git (master)
$ ls
README.md
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/demo_git (master)
$ vim README.md
i modifier le fichier ZZ
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/demo_git (master)
$ cat README.md
# demo_git
Une demo de git qui se passe bien
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/demo_git (master)
$ git commit -m "Ajouté des informations au readme"
[master 894df90] Ajouté des informations au readme
1 file changed, 1 insertion(+), 1 deletion(-)
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/demo_git (master)
$ git log
commit 894df909394ebc3144facba722b150452600dfd0 (HEAD -> master)
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 09:11:57 2019 +0200

    Ajouté des informations au readme

commit 54c714b369e56cdd2c2033edffe6013f0134c9b8 (origin/master, origin/HEAD)
Author: Pablo Buisson <41048008+PabloBuisson@users.noreply.github.com>
Date:   Tue Apr 16 08:56:25 2019 +0200

    Initial commit

Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/demo_git (master)
$ git push origin master # (Envoie mes modifs dans la branche master de mon remote origin.) COMMANDE POUR ENVOYER SUR GITHUB
Enumerating objects: 5, done.
Counting objects: 100% (5/5), done.
Writing objects: 100% (3/3), 305 bytes | 152.00 KiB/s, done.
Total 3 (delta 0), reused 0 (delta 0)
To https://github.com/PabloBuisson/demo_git.git
54c714b..894df90 master -> master

Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/demo_git (master)
$ touch autre.txt
$ vim autre.txt
$ git status
$ git add autre.txt
$ git commit -m "Autre fichier texte"
$ git push origin master
```

## RECUPERER DES MODIFICATIONS
```shell
Ex. sur Github, aller sur le README, puis modifier en cliquant sur le stylo, écrire une ligne, remplir le commit en bas (Modifié depuis Github)
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/demo_git (master)
$ git pull origin master # COMMANDE POUR RECUPERER LE CODE DEPUIS GITHUB
remote: Enumerating objects: 5, done.
remote: Counting objects: 100% (5/5), done.
remote: Compressing objects: 100% (3/3), done.
remote: Total 3 (delta 0), reused 0 (delta 0), pack-reused 0
Unpacking objects: 100% (3/3), done.
From https://github.com/PabloBuisson/demo_git
* branch master -> FETCH_HEAD
cc0e841..b662d22 master -> origin/master
Updating cc0e841..b662d22
Fast-forward
README.md | 1 +
1 file changed, 1 insertion(+)

Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/demo_git (master)
$ git log
commit b662d22a5d797b9a2726d7e47bf06a3ad0dbbd82 (HEAD -> master, origin/master, origin/HEAD)
Author: Pablo Buisson <41048008+PabloBuisson@users.noreply.github.com>
Date:   Tue Apr 16 09:34:52 2019 +0200

    Modifié depuis Github

commit cc0e841ef43a0a6fcabd6f29053d76aab813fee2
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 09:22:47 2019 +0200

    Autre fichier texte

commit 894df909394ebc3144facba722b150452600dfd0
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 09:11:57 2019 +0200

    Ajouté des informations au readme

commit 54c714b369e56cdd2c2033edffe6013f0134c9b8
Author: Pablo Buisson <41048008+PabloBuisson@users.noreply.github.com>
Date:   Tue Apr 16 08:56:25 2019 +0200

Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/demo_git (master)
$ vim README.md
$ git commit -am "Petite modif"
$ git push origin master


Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo/demo_git (master)
$ cat README.md
# demo_git
Une demo de git qui se passe bien
Et maintenant on modifie depuis Github
```

## <a name="create-repo"></a> CREER UN REPOSITORY et L'ENVOYER SUR GITHUB
```shell
Créer un dossier, rentrer dedans, faire un git init
Créer les fichiers, les modifier, ect.
Créer un nouveau repository sur Github > https://github.com/PabloBuisson/activite2_oc.git
git remote add origin https://github.com/PabloBuisson/activite2_oc.git
git push -u origin master
```

## CREER DES BRANCHES
```shell
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo (master)
$ mkdir branches
$ cd branches/
$ git init
$ touch hello.js
$ vim hello.js
alert ("Hello !")
$ git status
$ git add hello.js
$ git commit -m "Ajouté hello : début du projet"
$ git log
$ vim hello.js
alert("Hello !")
alert("Bonjour !")
$ git status
$ git commit -am "Deuxième message ajouté"
$ git branch # la branche sur laquelle on se trouve
* master
$ git branch mon-test # création d'une branche
$ git branch
* master # l'étoile renseigne ma position
mon-test
$ git checkout mon-test
Switched to branch 'mon-test'
$ git branch
master
* mon-test
$ vim hello.js
let message = "Hello !"
alert(message)
$ git commit -am "Utiliser des variables"
$ vim hello.js
let message = "Hello !";
alert(message);
$ git commit -am "Ajouté points virgules"
$ git log
$ git checkout master
Switched to branch 'master'
$ git log
commit 4ff8672a36653caa9d5e7a19568fb30b9666bce0 (HEAD -> master)
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 14:24:27 2019 +0200

    Deuxième message ajouté

commit b4567aa6d6872a3fdb594bad3ec034756314ddce
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 14:20:25 2019 +0200

    Ajouté hello : début du projet
$ vim hello.js
alert("Hello !")
alert("Bonjour !")

$ git checkout master
Switched to branch 'master'
$ vim hello.js
alert("Hello !")
alert("Bonjour !")
alert("Coucou !")
$ git commit -am "Ajouté coucou sur master"
$ git log
commit a8fffe136921a6be5020ae097df06cf359eb8d1e (HEAD -> master)
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 14:45:06 2019 +0200

    Ajouté coucou sur master

commit 4ff8672a36653caa9d5e7a19568fb30b9666bce0
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 14:24:27 2019 +0200

    Deuxième message ajouté

commit b4567aa6d6872a3fdb594bad3ec034756314ddce
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 14:20:25 2019 +0200

    Ajouté hello : début du projet

$ git checkout mon-test
Switched to branch 'mon-test'
$ git log
commit 22cda9a8d29a8fe698de318de837cf56c30d4ecc (HEAD -> mon-test)
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 14:36:02 2019 +0200

    Ajouté points virgules

commit 917aa6ee7b9500a7e441e0341ee124b4b9a2674f
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 14:33:14 2019 +0200

    Utiliser des variables

commit 4ff8672a36653caa9d5e7a19568fb30b9666bce0
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 14:24:27 2019 +0200

    Deuxième message ajouté

commit b4567aa6d6872a3fdb594bad3ec034756314ddce
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 14:20:25 2019 +0200

    Ajouté hello : début du projet
Petite astuce pour manipuler vos branches : vous pouvez utiliser la commande 'git checkout -b' pour créer une branche et vous y positionner. Ainsi, au lieu de taper la commande suivante pour créer votre branche :
Au lieu de : git branch ma-branche + git checkout ma-branche
=> git checkout -b ma-branche
```

## FUSIONNER DES BRANCHES
```shell
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo (master)
$ mkdir fusion
$ cd fusion/
$ git init
$ touch index.js
$ vim index.js
let i = 0;
alert(i +1);
$ git add index.js
$ git commit -m "Base d'addition de i"
$ vim index.js
let i = 2;
let j = 1;
alert(i + j);
$ git commit -am "additionner i et j"
$ git branch multiplication
$ git checkout multiplication
$ vim index.js
let i = 2;
let j = 1;
alert(i * j);
$ git commit -am "utiliser multiplication en lieu et place d'addition"
$ git vim index.js
$ vim index.js
$ git commit -am "supression d'espace blanc"
$ git checkout master
Switched to branch 'master'
$ git merge multiplication # fusion de la branche avec le master
Updating 2eb25e2..7409985
Fast-forward
index.js | 2 +-
1 file changed, 1 insertion(+), 1 deletion(-)
$ vim index.js
let i = 2;
let j = 1;
alert(i*j);
$ git log
commit 740998546d006486b637b840b4895bbc59735d8b (HEAD -> master, multiplication)
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 15:09:56 2019 +0200

    supression d''espace blanc

commit 67db985df1006b2a646d289d4189a612cd11250a
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 15:06:59 2019 +0200

    utiliser multiplication en lieu et place d''addition

commit 2eb25e25e8d377bbf11d61f35c59b5e64b70eb28
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 15:02:22 2019 +0200

    additionner i et j

commit 91a5291888ae9cb04d80d816ab31af1a8cc33956
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 14:58:54 2019 +0200

    Base d''addition de i
Si je veux faire une fusion depuis ma branche (pour rester dessus) :
git checkout ma_branche
git merge master
Fusionner des branches est une pratique courante lorsque vous travaillez sur un projet : vous devez toujours chercher à remettre les modifications faites sur vos différentes branches dans la branche principale master.
```  

## RESOUDRE UN CONFLIT
```shell
Quel cas génère systématiquement une situation de conflit dans Git ?
Si certains commits des deux branches que l''on fusionne affectent les mêmes lignes de code

Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo (master)
$ mkdir conflit
$ cd conflit/
$ git init
$ touch hello.md
$ vim hello.md
Hello !
$ git add hello.md
$ git commit -m "Ajouté Hello"
$ git branch modif
$ git checkout modif
$ vim hello.md
Hello tout le monde !
$ git commit -am "dire tout le monde"
$ git checkout master
$ vim hello.md
Hello les amis !
$ git commit -am "dire les amis"
$ git checkout master
Already on 'master'
$ git merge modif
Auto-merging hello.md
CONFLICT (content): Merge conflict in hello.md
Automatic merge failed; fix conflicts and then commit the result.
$ vim hello.md
<<<<<<< HEAD Hello les amis ! # endroit ou je me situe
=======
Hello tout le monde !>>>>>>> modif
Hello les amis ! # ce que je garde
$ git status
On branch master
You have unmerged paths. # le conflit n'a pas été réglé
  (fix conflicts and run "git commit")
  (use "git merge --abort" to abort the merge)

Unmerged paths:
  (use "git add <file>..." to mark resolution)

        both modified:   hello.md

no changes added to commit (use "git add" and/or "git commit -a")
$ git add hello.md
$ git commit # sans message (ou "fusionné, ect."), puis ZZ pour enregistrer
[master 362f587] Merge branch 'modif'
$ git log
commit 362f5877ebcf2aaa5093cff845f2a5870c5c3d2b (HEAD -> master)
Merge: 67eaa38 277d2d4
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 16:13:27 2019 +0200

    Merge branch 'modif'
```

## <a name="find-culprit"></a> RETROUVER QUI A FAIT UNE MODIFICATION
```shell
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT/demo (master)
$ mkdir auteur_modif
$ cd auteur_modif
$ git init
$ touch liste.md
$ vim liste.md
# une liste
- a
- b
- c
- d
$ git add liste.md
$ git commit -m "Premier commit"
$ vim liste.md
# une liste
- a
- c
- b
- d
$ git commit -am "inversé b et c"
$ vim liste.md
# une liste
## un sous-titre
- a
- c
- b
- d
- e
$ git commit -am "ajouté e et un sous-titre"
$ git log
commit 87c5804ae4d10107f3547792b8f75cca8656a114 (HEAD -> master)
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 16:54:19 2019 +0200

    ajouté e et un sous-titre

commit 91ade9bbbc5221d07a30186a92e9f58c682076af
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 16:51:14 2019 +0200

    inversé b et c

commit 1e0f9bf7e4b49a77f851d75792d2d2fcc5f34d70
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 16:48:15 2019 +0200

    Premier commit
$ vim liste.md => qui a inversé b et c ?
$ git blame liste.md
^1e0f9bf "# debut des SHA" (Pablo Buisson 2019-04-16 16:48:15 +0200 1) # (une liste) # le dernier commit fait sur cette ligne était 1e0f9bf
^1e0f9bf (Pablo Buisson 2019-04-16 16:48:15 +0200 2)
87c5804a (Pablo Buisson 2019-04-16 16:54:19 +0200 3) ## un sous-titre
87c5804a (Pablo Buisson 2019-04-16 16:54:19 +0200 4)
^1e0f9bf (Pablo Buisson 2019-04-16 16:48:15 +0200 5) - a
^1e0f9bf (Pablo Buisson 2019-04-16 16:48:15 +0200 6) - c
91ade9bb (Pablo Buisson 2019-04-16 16:51:14 +0200 7) - b # le coupable, faire git log + retrouver le SHA correspondant
^1e0f9bf (Pablo Buisson 2019-04-16 16:48:15 +0200 8) - d
87c5804a (Pablo Buisson 2019-04-16 16:54:19 +0200 9) - e
$ git show 91ade9bb
commit 91ade9bbbc5221d07a30186a92e9f58c682076af
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Tue Apr 16 16:51:14 2019 +0200

    inversé b et c

diff --git a/liste.md b/liste.md
index e85e78e..7ddafa3 100644
--- a/liste.md
+++ b/liste.md
@@ -1,6 +1,6 @@
 # une liste

 - a
-- b # a été supprimé ici (-)
 - c
+- b # a été rajouté ici (+)
 - d
```

## <a name="git-ignore"></a> IGNORER DES FICHIERS
```shell
○ Pour des raisons de sécurité et de clarté, il est important d''ignorer certains fichiers dans Git, tels que :

    Tous les fichiers de configuration (config.xml, databases.yml, .env...)

    Les fichiers et dossiers temporaires (tmp, temp/...)

    Les fichiers inutiles comme ceux créés par votre IDE ou votre OS (.DS_Store, .project...)

○ Le plus crucial est de ne JAMAIS versionner une variable de configuration, que ce soit un mot de passe, une clé secrète ou quoi que ce soit de ce type. Versionner une telle variable conduirait à une large faille de sécurité, surtout si vous mettez votre code en ligne sur GitHub !
○ Si vous avez ce type de variables de configuration dans votre code, déplacez-les dans un fichier de configuration et ignorez ce fichier dans Git : nous allons voir comment faire cela dans la vidéo ci-dessous en utilisant le fichier .gitignore.

Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT (master)
$ mkdir ignorer
$ cd ignorer/
$ git init
$ touch mon_fichier_a_ignorer
$ touch .gitignore
$ vim .gitignore
mon_fichier_a_ignorer
peut être aussi : dossier principal/autre dossier/fichier_a_ignorer.txt
$ git status
On branch master

No commits yet

Untracked files:
  (use "git add <file>..." to include in what will be committed)

        .gitignore

nothing added to commit but untracked files present (use "git add" to track)
Créez le fichier .gitignore pour y lister les fichiers que vous ne voulez pas versionner dans Git (les fichiers comprenant les variables de configuration, les clés d''APIs et autres clés secrètes, les mots de passe, etc.). Listez ces fichiers ligne par ligne dans .gitignore en indiquant leurs chemins complets, par exemple : 
motsdepasse.txt
config/application.yml
```

## <a name="commits-superflus"></a> EVITER DES COMMITS SUPERFLUS
```shell
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT (master)
$ mkdir superflu
$ cd superflu/
$ git init
$ touch script.js
$ vim script.js
function a() {
return "a";
}

function b() {
return "b";
}
$ git add script.js
$ git commit -m "Deux fonctions a et b"
$ vim script.js
function a() {
let lettre = "a";
return lettre;
}

function b() {
return "b";
}
# mon deuxième essai n''est pas fini */
LE COLLEGUE VEUT DES MODIFICATIONS SUR LA FONCTION B
$ git stash # enregistre temporairement */
$ git status
On branch master
nothing to commit, working tree clean
$ vim script.js
# état initial, avant le deuxième changement */
# je fais le changement demandé par le collègue */
$ git commit -am "Retourner un B au lieu de b"
$ git push origin master pour envoyer les modifications sur Github
$ git stash pop # je reprends mon travail */
$ git status
On branch master
Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git checkout -- <file>..." to discard changes in working directory)

        modified:   script.js

no changes added to commit (use "git add" and/or "git commit -a")
$ vim script.js
function a() {
let lettre = "A";
return lettre;
}

function b() {
return "B";
}
$ git commit -am "Utiliser variable et retourner A majuscule"
$ git log
commit 6f0250e1e8b9bd0052cc0029abec12c081896121 (HEAD -> master)
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Wed Apr 17 09:20:06 2019 +0200

    Utiliser variable et retourner A majuscule

commit f0be07839c4ecd70dc710e61abd04f29a13c33d9
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Wed Apr 17 09:15:20 2019 +0200

    Retourner un B au lieu de b

commit a9718bda1fdfdb3a45c2c9e7f03688fdb7241fb2
Author: Pablo Buisson <pablo.buisson@gmail.com>
Date:   Wed Apr 17 09:06:28 2019 +0200

    Deux fonctions a et b

$ git checkout -b fonctionC # crée une branche fonctionC et se place dessus */
Switched to a new branch 'fonctionC'
$ vim script.js
function a() {
let lettre = "A";
return lettre;
}

function b() {
return "B";
}

function c() {
return
# LE COLLEGUE (LE MÊME) ME DEMANDE DES MODIFICATIONS SUR LA FONCTION A */
$ git stash
$ git checkout master
Switched to branch 'master'
$ vim script.js
function a() {
let lettre = "AAA";
return lettre;
}

function b() {
return "B";
}
$ git commit -am "renvoie plusieurs A"
$ git push origin master pour envoyer les modifications sur Github
$ git checkout fonctionC
Switched to branch 'fonctionC'
$ git stash pop # supprime les fichiers du stash */
$ vim script.js
Attention, pop vide votre stash des modifications que vous aviez rangées dedans. Donc une fois que vous avez récupéré ces modifications dans votre branche, il vous faut finir votre tâche et les committer ! (ou bien les remettre de côté en exécutant à nouveau la commande git stash).
Si vous voulez garder les modifications dans votre stash, vous pouvez utiliser apply à la place de pop : git stash apply
```

## <a name="open-source"></a> CONTRIBUER A DES PROJETS OPEN SOURCE
```shell
Aller sur le projet > Fork (prend ce repository et fais-en une copie sur mon compte) > Clone with HTTPS
Pablo@PC-Pablo MINGW64 ~/Documents/WEB DEV/GIT (master)
$ git clone https://github.com/PabloBuisson/redisse.git
$ cd redisse/
Avant de faire les modifications, lire le README.md > Contributing
Ex. :
Contributing 
    Fork it
    Create your feature branch (git checkout -b my-new-feature)
    Commit your changes (git commit -am 'Add some feature')
    Push to the branch (git push origin my-new-feature)
    Create new Pull Request
$ git checkout -b readme-update
Switched to a new branch 'readme-update'
$ vim README.md
$ git commit -am "Modifié le README pour une démo"
$ git push origin readme-update # on propose sa version de branche (envoie sur le projet Github ma branche) */
Sur mon projet, création automatique d''une branche => readme-update (less than a minute ago) => Compare et Pull request 
```

# <a name="gitkraken"></a> GITKRAKEN : UNLEASH THE KRAKENNN

* Connexion avec compte GitHub
* Retrouver le fichier .exe => C:\Users\Pablo\AppData\Local\gitkraken
