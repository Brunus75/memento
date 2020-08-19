# JAVA EE MEMENTO

## RESSOURCES

* https://stackoverflow.com/a/45108378

## SOMMAIRE
* [GLOSSAIRE](#glossaire)
* [COMPATIBILITE](#COMPATIBILITE)
* [ECLIPSE POUR JAVA EE](#ECLIPSE-POUR-JAVA-EE)
* [ECLIPSE RACCOURCIS](#ECLIPSE-RACCOURCIS)
* [ECLIPSE DEBUG](#ECLIPSE-DEBUG)
* [CREER NOTRE PROJET](#CREER-NOTRE-PROJET)
* [ENVIRONNEMENT](#ENVIRONNEMENT)
* [CREER UNE APPLICATION WEB JAVA SANS MAVEN](#CREER-UNE-APPLICATION-WEB-JAVA-SANS-MAVEN)
* [CREER UNE APPLICATION WEB JAVA AVEC MAVEN](#CREER-UNE-APPLICATION-WEB-JAVA-AVEC-MAVEN)
* [SERVLET](#servlet)
* [SERVLET AVEC CODE JAVA ET HTML](#SERVLET-AVEC-CODE-JAVA-ET-HTML)
* [SERVLET : LES BASES](#servlet-les-bases)

## GLOSSAIRE

* Serveur d'applications = utilise un langage de programmation pour créer du contenu à la volée
* Serveur d'applications web JAVA = conteneur de Servlet
```
Un conteneur de servlet ou moteur de servlet est une forme de serveur applicatif Java
qui permet grâce à une technologie / API nommée Servlet d'aider le développeur à écrire
du code Java capable de servir du contenu dynamique
```
* Application web JAVA = JAVA + librairies spécificiques (servlet/jsp)
* Servlet = petit programme serveur
* .war = web archive = application web JAVA zippée
* JAVA EE = Entreprise Edition, pour créer des applications web et des applications d'entreprise = surcouche de JAVA SE (Standard Edition) avec des librairies pour exécuter des requêtes web, pour ajouter un serveur applicatif, accès Base de données, web services, messagerie, ect.
* ```xml
<scope>provided</scope> <!-- librairie seulement nécessaire pour la compilation, fournie par le serveur lors de l'execution -->
<packaging>jar, war</packaging> <!-- définit le format du livrable>
```

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
* Problème de JRE introuvable (Eclipse ne reconnaît pas la variable JAVA_HOME) :
```shell
-vm # ++
C:\Program Files\AdoptOpenJDK\jdk-11.0.5.10-hotspot\bin # ++
-vmargs
```
* Ouvrir l'application sur Firefox = Window > Web Browser > Firefox
* Clic-droit sur le projet > Properties > Resource > Other > UTF-8

## ECLIPSE RACCOURCIS

* Clic-droit > Source > Getters & setters, constructor, format, ect.
* Ctrl + espace = autocomplétion

## ECLIPSE DEBUG

* https://stackoverflow.com/questions/34938056/maven-clean-update-install-and-eclipse-clean-refresh-build-a-generally-co

* Clic-droit > Maven > Clean
* Clic-droit > Maven > Build > Clean verify
* Clic-droit > Maven > Update Project
* Select all projects, Refresh F5
* Clic-droit > Maven > Install

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

## ENVIRONNEMENT

* Tomcat Apache > http://tomcat.apache.org/ > placer à la racine C:/
* Définir la variable JAVA_HOME (C:\Program Files\AdoptOpenJDK\jdk-11.0.5.10-hotspot)
* Définir la variable Path (%JAVA_HOME%\bin)
* Lancer C:\apache-tomcat-9.0.37\bin startup.bat
* Se rendre sur http://localhost:8080/
* Tomcat est écrit en JAVA
* Tomcat est un conteneur servlet (héberge les applications web JAVA)
* http://localhost:8080/docs, /examples, /host-manager, /manager (web apps retrouvable sur C:\apache-tomcat-9.0.37\webapps)

## CREER UNE APPLICATION WEB JAVA SANS MAVEN

* Eclipse > New > Dynamic Web Project
* Project name : firstapp
* Location : D:\Documents\DEV\eclipse-workspace-first-app
01.     Download and install http://tomcat.apache.org/ 
02.     Download and install Eclipse IDE for Java EE Developers 
03.     Start     Eclipse     
04.     Window -> Preferences -> Web -> CSS+HTML+JSP -> Encoding: ISO 10646/Unicode(UTF-8) 
05.     Window -> Open Perspective -> Other -> Java EE 
06.     File -> New -> Dynamic Web Project 
07.     Enter Project name 
08.     Target Runtime -> [New...] -> Apache -> Apache Tomcat vX.X -> Next -> Tomcat installation directory -> [Browse...] -> <Path to tomcat>\Tomcat X.X -> Finish 
09.     Finish     
10.     Right click on WebContent -> New -> JSP (index.html / index.jsp as startfile) -> Next -> Use JSP template -> New JSP File(xhtml) -> Finish 
11.     Right click on project -> Run As -> Run on Server -> Finish 
12.     Project is available under http://localhost:8080/projectname 
13.     To change the context root/URI in eclipse : Right click on project -> Properties ->Web Project Settings -> "New Context root" -> Apply -> OK -> OK 
14.     Right click project -> Export -> WAR file -> Destination: ->  [Browse...] -> <Path to tomcat>\Tomcat X.X\webapps (write name in small letters) -> Save -> Finish 
15.     To change the context root/URI for tomcat just rename the WAR file 
16.     Stop     Eclipse-tomcat-server by pressing STRG+ALT+S 
17.     Start tomcat ("<Path to tomcat>\Tomcat X.X\bin\tomcatXw.exe") 
18.     Now Project is deployed in tomcat and can be used without eclipse
* Structure
```py
firstapp/
	Deployment descriptor/
	JAX-WS Web Services/
	Java Resources/ # classes JAVA
	build/
	Web Content/ # nos fichiers
		META-INF
		WEB-INF
		index.html # New > HTML File
```

## CREER UNE APPLICATION WEB JAVA AVEC MAVEN

* http://websystique.com/maven/create-a-maven-web-project-with-eclipse/
* https://crunchify.com/how-to-create-dynamic-web-project-using-maven-in-eclipse/
* New Maven Project > Workspace location > Next > choisir 'maven-archetype-webapp' de 'apache'
```shell
GroupId: com.directmedia.onlinestore # com.site.projet_global
ArtifactId: frontoffice # nom du module
Version: 1.0
```
* Properties > Target Runtimes > Tomcat 9
* Problème de dossiers absents :
```In case you do not see the src/main/java and src/test/java folder in your project structure,
go to Project>Properties>Java BuildPath>Libraries, select/change-to appropriate Java version, click OK,
you should see those folders now. You may also perform a maven-update on your project.
```
* Structure
```py
frontoffice/
	Deployment descriptor/
	Java Resources/ # classes JAVA
		src/main/java
			com.mediastore.onlinestore.frontoffice # package à créer
		src/test/java
		Libraries
	Deployed Resources/
	target/ # classes compilées
	src/ # nos fichiers
		main/
			webapp/
				WEB-INF/
				index.jsp
	pom.xml
```

## SERVLET

* Petit programme serveur
* Une servlet est un "petit programme serveur" qui répond à une requête d'un client, sur HTTP entre autres, effectue un traitement et retourne une réponse. Une servlet permet entre autre de retourner une page web mais ce n'est pas son unique fonction.
* Classe qui hérite de la classe HttpServlet
* https://docs.oracle.com/javaee/7/api/javax/servlet/http/HttpServlet.html
* * Structure
```py
backoffice/
	Deployment descriptor/
	Java Resources/ 
		src/main/java
			com.mediastore.onlinestore.backoffice.controller
				HomeServlet # notre servlet ici
		src/test/java
		Libraries
	Deployed Resources/
	target/ 
	src/ 
		main/
			webapp/
				WEB-INF/
					web.xml # tous les paramètres de nos Servlet (routes, mappings, etc.)
				index.jsp
	pom.xml
frontoffice/
	Deployment descriptor/
	Java Resources/ 
		src/main/java
			com.mediastore.onlinestore.frontoffice.controller
				HomeServlet # notre servlet ici
		src/test/java
		Libraries
	Deployed Resources/
	target/ 
	src/ 
		main/
			webapp/
				WEB-INF/
					web.xml # tous les paramètres de nos Servlet (routes, mappings, etc.)
				index.jsp
	pom.xml
```
* HomeServlet.java
```java
package com.mediastore.onlinestore.frontoffice.controller;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class HomeServlet
 */
// annotation de route
// url : http://localhost:8080/frontoffice/home
@WebServlet(name="HomeServlet", urlPatterns={"/home"})
public class HomeServlet extends HttpServlet {
	
	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	// en allant sur monprojet/hello, je reçois la réponse du Servlet
	// soit "Bonjour de la Servlet"
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		
		PrintWriter out = response.getWriter();
		out.print("<HTML><BODY><h1>OnlineStore, votre boutique multimédia en ligne</h1></BODY></HTML>");
	}
}
```
* HomeServlet (backoffice)
```java
package com.mediastore.onlinestore.backoffice.controller;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class HomeServlet
 */
// url : http://localhost:8080/backoffice/home
@WebServlet(name="HomeServlet", urlPatterns={"/home"})
public class HomeServlet extends HttpServlet {

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		PrintWriter out = response.getWriter();
		out.print("<HTML><BODY><h1>OnlineStore, gestion de la boutique</h1></BODY></HTML>");
	}

}
```

## SERVLET AVEC CODE JAVA ET HTML

* Suite de l'application
* But = afficher la liste des oeuvres (package core, classes JAVA), sur la page de l'application
* Structure
```py
/core # notre module core, nos classes métier JAVA (notre data)
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
backoffice/ # module réservé aux admins
	Deployment descriptor/
	Java Resources/ 
		src/main/java
			com.mediastore.onlinestore.backoffice.controller
				CatalogueServlet.java # servlet qui affiche les oeuvres
				HomeServlet.java # notre servlet d'accueil ici
		src/test/java
		Libraries
	Deployed Resources/
	target/ 
	src/ 
		main/
			webapp/
				WEB-INF/
					web.xml # tous les paramètres de nos Servlet (routes, mappings, etc.)
				index.jsp
	pom.xml
frontoffice/
	Deployment descriptor/
	Java Resources/ 
		src/main/java
			com.mediastore.onlinestore.frontoffice.controller
				CatalogueServlet.java # servlet qui affiche les oeuvres
				HomeServlet.java # notre servlet d'accueil ici
		src/test/java
		Libraries
	Deployed Resources/
	target/ 
	src/ 
		main/
			webapp/
				WEB-INF/
					web.xml # tous les paramètres de nos Servlet (routes, mappings, etc.)
				index.jsp
	pom.xml
```
* HomeServlet.java (backoffice)
```java
package com.mediastore.onlinestore.backoffice.controller;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class HomeServlet
 */
@WebServlet(name="HomeServlet", urlPatterns={"/home"})
public class HomeServlet extends HttpServlet {

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		PrintWriter out = response.getWriter();
		out.print("<HTML><BODY><h1>OnlineStore, gestion de la boutique</h1>");
		out.print("<a href=\"catalogue\">Accès au catalogue des oeuvres</a>"); // lien vers CatalogueServlet.java
		out.print("</BODY></HTML>");
	}

}
```
* CatalogueServlet.java (backoffice)
```java
package com.mediastore.onlinestore.backoffice.controller;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.directmedia.onlinestore.core.entity.Artist;
// ajouté par clic-droit sur le module > Maven > Add dependency
import com.directmedia.onlinestore.core.entity.Catalogue;
import com.directmedia.onlinestore.core.entity.Work;

/**
 * Servlet implementation class CatalogueServlet
 */
@WebServlet(name="CatalogueServlet", urlPatterns={"/catalogue"})
public class CatalogueServlet extends HttpServlet {

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
PrintWriter out = response.getWriter();
		
		if (Catalogue.listOfWorks.isEmpty()) {
			
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
		}
		
		
		out.print("<HTML><BODY><h1>Oeuvres du catalogue</h1>");
		
		for (Work work : Catalogue.listOfWorks) {
			out.println(work.getTitle() + " (" + work.getRelease() + ") <br/>");
			//	Le Gendarme de Saint-Tropez (1964)
			// Bad (1987)
			// Minority Report (2002)
		}
		
		out.print("</BODY></HTML>");
	}

}
```
* pom.xml (core)
```xml
<project xmlns="http://maven.apache.org/POM/4.0.0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://maven.apache.org/POM/4.0.0 https://maven.apache.org/xsd/maven-4.0.0.xsd">
  <modelVersion>4.0.0</modelVersion>
  <groupId>com.directmedia.onlinestore</groupId>
  <artifactId>core</artifactId>
  <version>1.0</version>
  <name>core</name>
  <packaging>jar</packaging> <!-- java archive -->
  <!-- Pour régler les problèmes de type "Source option 5 is no longer supported" -->
  <properties>
        <project.build.sourceEncoding>UTF-8</project.build.sourceEncoding>
        <maven.compiler.source>1.8</maven.compiler.source>
        <maven.compiler.target>1.8</maven.compiler.target>
    </properties>
</project>
```
* pom.xml (backoffice)
```xml
<?xml version="1.0" encoding="UTF-8"?>

<project xmlns="http://maven.apache.org/POM/4.0.0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://maven.apache.org/POM/4.0.0 http://maven.apache.org/xsd/maven-4.0.0.xsd">
  <modelVersion>4.0.0</modelVersion>

  <groupId>com.directmedia.onlinestore</groupId>
  <artifactId>backoffice</artifactId>
  <version>1.0</version>
  <packaging>war</packaging> <!-- web archive -->

  <name>backoffice Maven Webapp</name>
  <!-- FIXME change it to the project's website -->
  <url>http://www.example.com</url>

  <properties>
    <project.build.sourceEncoding>UTF-8</project.build.sourceEncoding>
    <maven.compiler.source>1.7</maven.compiler.source>
    <maven.compiler.target>1.7</maven.compiler.target>
  </properties>

  <dependencies>
    <dependency>
      <groupId>junit</groupId>
      <artifactId>junit</artifactId>
      <version>4.11</version>
      <scope>test</scope>
    </dependency>
    <dependency>
    	<groupId>com.directmedia.onlinestore</groupId>
    	<artifactId>core</artifactId>
    	<version>1.0</version>
    </dependency>
  </dependencies>

  <build>
    <finalName>backoffice</finalName>
    <pluginManagement><!-- lock down plugins versions to avoid using Maven defaults (may be moved to parent pom) -->
      <plugins>
        <plugin>
          <artifactId>maven-clean-plugin</artifactId>
          <version>3.1.0</version>
        </plugin>
        <!-- see http://maven.apache.org/ref/current/maven-core/default-bindings.html#Plugin_bindings_for_war_packaging -->
        <plugin>
          <artifactId>maven-resources-plugin</artifactId>
          <version>3.0.2</version>
        </plugin>
        <plugin>
          <artifactId>maven-compiler-plugin</artifactId>
          <version>3.8.0</version>
        </plugin>
        <plugin>
          <artifactId>maven-surefire-plugin</artifactId>
          <version>2.22.1</version>
        </plugin>
        <plugin>
          <artifactId>maven-war-plugin</artifactId>
          <version>3.2.2</version>
        </plugin>
        <plugin>
          <artifactId>maven-install-plugin</artifactId>
          <version>2.5.2</version>
        </plugin>
        <plugin>
          <artifactId>maven-deploy-plugin</artifactId>
          <version>2.8.2</version>
        </plugin>
      </plugins>
    </pluginManagement>
  </build>
</project>
```

## SERVLET LES BASES

### CONTENT TYPE

* En-tête permet de préciser le contenu au client
* Liste des types MIME communs : https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types
* MIME Type = identifiant qui indique de quoi est fait le contenu
* 
```java
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html", "image/gif", ect.) // MIME Type
		PrintWriter out = response.getWriter();
		out.print("<HTML><BODY>Bonjour de la Servlet</BODY></HTML>");
	}
```

### CHARSET

* Permet de préciser le nombre de caractères acceptés
* UTF-8 : convention internationale (russe, caractères spéciaux français, ect., compris par tous les OS)
* 
```java
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html; charset=UTF-8") // ajout du charset
		PrintWriter out = response.getWriter();
		out.print("<HTML><BODY>Bonjour de la Servlet</BODY></HTML>");
	}
```

### SERVEUR DE DEPLOIEMENT WEB.XML

* 
```xml
<!DOCTYPE web-app PUBLIC
 "-//Sun Microsystems, Inc.//DTD Web Application 2.3//EN"
 "http://java.sun.com/dtd/web-app_2_3.dtd" >

<web-app>
  <display-name>Archetype Created Web Application</display-name>
  <servlet>
  	<servlet-name>HomeServlet</servlet-name>
  	<display-name>HomeServlet</display-name>
  	<description></description>
  	<servlet-class>com.mediastore.onlinestore.backoffice.controller.HomeServlet</servlet-class>
  </servlet>
  <servlet>
  	<servlet-name>HelloServlet</servlet-name>
  	<display-name>HelloServlet</display-name>
  	<description></description>
  	<servlet-class>com.mediastore.onlinestore.backoffice.controller.HelloServlet</servlet-class>
  </servlet>
  <servlet>
  	<servlet-name>CatalogueServlet</servlet-name>
  	<display-name>CatalogueServlet</display-name>
  	<description></description>
  	<servlet-class>com.mediastore.onlinestore.backoffice.controller.CatalogueServlet</servlet-class>
  </servlet>
  <servlet-mapping>
  	<servlet-name>HomeServlet</servlet-name>
  	<url-pattern>/home</url-pattern>
  </servlet-mapping>
  <servlet-mapping>
  	<servlet-name>HelloServlet</servlet-name>
  	<url-pattern>/hello</url-pattern>
  </servlet-mapping>
  <servlet-mapping>
  	<servlet-name>CatalogueServlet</servlet-name>
  	<url-pattern>/catalogue</url-pattern>
  </servlet-mapping>
  <welcome-file-list> <!-- les fichiers racines par défaut, quand l'url est incomplète -->
	<welcome-file>index.html</welcome-file> <!-- fichier affiché lorsque l'utilisateur lance l'appli ou ne renseigne pas d'url complète -->
	<welcome-file>home.html</welcome-file> <!-- marche également pour toute la hierarchie de l'appli -->
	<!-- Ex. l'utilisateur rentre .../new-file/, le serveur va chercher new-file/index.html
	et new-file/home.html -->
  </welcome-file-list>
</web-app>
```