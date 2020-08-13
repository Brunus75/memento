# JAVA EE MEMENTO

## SOMMAIRE
* [COMPATIBILITE](#COMPATIBILITE)
* [ECLIPSE POUR JAVA EE](#ECLIPSE-POUR-JAVA-EE)
* [ECLIPSE RACCOURCIS](#ECLIPSE-RACCOURCIS)
* [CREER NOTRE PROJET](#CREER-NOTRE-PROJET)

## COMPATIBILITE

* Java 11 (et toute version supérieure à 8) est modulaire, ce qui fait que certains packages intégrés d'office sont désormais absents, ce qui peut poser des problèmes de compatibilité
* Java 1.8 fonctionnera dans tous les cas (il intègre les packages par défaut)

## ECLIPSE POUR JAVA EE

1. https://www.eclipse.org/downloads/
2. https://www.eclipse.org/downloads/packages/
3. Eclipse IDE for Enterprise Java Developers (fichier zip)
4. Help > Eclipse Marketplace > chercher "Moonrise" > Color IDE Pack
5. https://github.com/guari/eclipse-ui-theme
6. https://stackoverflow.com/questions/5053834/eclipse-ide-for-java-full-dark-theme
6. Window > Preference > General > Appareance > Dark Theme (or Moonrise, Dark Theme est très bien) + round tabs
7. Window → Preferences → General → Appearance → Colors and Fonts → Java → Java Editor Text Font) → 16
8. Window > Preferences > chercher "Content Assist" > Auto Activation > Auto activation triggers for Java > abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ._ : https://stackoverflow.com/questions/6912169/eclipse-enable-autocomplete-content-assist

## ECLIPSE RACCOURCIS

* Clic-droit > Source > Getters & setters, constructor, format, ect.
* Ctrl + espace = autocomplétion

## CREER NOTRE PROJET

* Création d'un projet complet au format MAVEN
* But = créer une application Web nommée OnlineStore, dont l'interface Web permet aux clients de trouver le film / l’album de leur choix, accéder à leurs informations détaillées, ajouter ces derniers dans un caddie d'achat
* Le site devra être capable d'authentifier l'administrateur du magasin via un compte utilisateur, permettant à celui-ci de gérer la liste des œuvres au catalogue et les informations concernant chaque œuvre proposée
* Create Maven Project > Create simple projet (skip archetype selection)
```java
Group Id: com.directmedia.onlinestore // identité de l'application soit com,fr,ect.site.projet
Artifact Id: core // nom du module, soit ici le coeur de l'application
Name: core // name of artifact
Version: 1.0
```
* src/main/java > add package > com.directmedia.onlinestore.core
* structure du projet
```py
/core
    src/main/java # nos classes métier
        com.directmedia.onlinestore.core # package du projet (racine du projet)
            Startup.java
        com.directmedia.onlinestore.core.entity # package des modèles
            Artist.java
            Catalogue.java
            Work.java
    src/main/resources/
    src/test/java/
    src/test/resources/
    JRE System Library/ # classes JAVA
    src/
    target/
pom.xml # maven
```
* Startup.java
```java
package com.directmedia.onlinestore.core;

import com.directmedia.onlinestore.core.entity.Artist;
import com.directmedia.onlinestore.core.entity.Catalogue;
import com.directmedia.onlinestore.core.entity.Work;

public class Startup {

	public static void main(String[] args) {
		Artist tomCruise = new Artist("Tom Cruise");
		Artist michaelJackson = new Artist("Michael Jackson");
		Artist louisDeFunes = new Artist("Louis De Funès");
		
		Work minorityReport = new Work("Minority Report");
		Work bad = new Work("Bad");
		Work leGendarmeDeSaintTropez = new Work("Le Gendarme de Saint-Tropez");
		
		minorityReport.setMainArtist(tomCruise);
		bad.setMainArtist(michaelJackson);
		leGendarmeDeSaintTropez.setMainArtist(louisDeFunes);
		
		minorityReport.setRelease(2002);
		bad.setRelease(1987);
		leGendarmeDeSaintTropez.setRelease(1964);
		
		minorityReport.setSummary("Film de Science-Fiction");
		bad.setSummary("Album de musique");
		leGendarmeDeSaintTropez.setSummary("Comédie française");
		
		minorityReport.setGenre("Science Fiction");
		bad.setGenre("Pop");
		leGendarmeDeSaintTropez.setSummary("Comédie");
		
		Catalogue.listOfWorks.add(leGendarmeDeSaintTropez);
		Catalogue.listOfWorks.add(bad);
		Catalogue.listOfWorks.add(minorityReport);
		
		for (Work work : Catalogue.listOfWorks) {
			System.out.println(work.getTitle() + " (" + work.getRelease() + ")");
			//	Le Gendarme de Saint-Tropez (1964)
			// Bad (1987)
			// Minority Report (2002)
		}
	}

}
```
* Artist.java
```java
package com.directmedia.onlinestore.core.entity;

public class Artist {
	// recommandation JavaBean (propriétés privées)
	private String name;

	public Artist() {
	}

	public Artist(String name) {
		this.name = name;
	}

	public String getName() {
		return name;
	}

	// recommandation Java Bean (getters + setters publics)
	public void setName(String name) {
		this.name = name;
	}
}
```
* Work.java
```java
package com.directmedia.onlinestore.core.entity;

public class Work {

	private String title;
	private String genre;
	private int release;
	private String summary;
	// dans le même package = j'y ai accès
	private Artist mainArtist;

	public Work() {
	}

	public Work(String title) {
		this.title = title;
	}

	public String getTitle() {
		return title;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	public String getGenre() {
		return genre;
	}

	public void setGenre(String genre) {
		this.genre = genre;
	}

	public int getRelease() {
		return release;
	}

	public void setRelease(int release) {
		this.release = release;
	}

	public String getSummary() {
		return summary;
	}

	public void setSummary(String summary) {
		this.summary = summary;
	}

	public Artist getMainArtist() {
		return mainArtist;
	}

	public void setMainArtist(Artist mainArtist) {
		this.mainArtist = mainArtist;
	}

}
```
* Catalogue.java
```java
package com.directmedia.onlinestore.core.entity;

import java.util.HashSet;

public class Catalogue {

	public static HashSet<Work> listOfWorks = new HashSet();
}
```