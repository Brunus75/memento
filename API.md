# MEMENTO API

## SOMMAIRE
* [RESSOURCES](#ressources)
* [GLOSSAIRE](#glossaire)
* [REST](#rest)
* [MOCKOON](#mockoon)

## RESSOURCES

### DOCS
* Introduction to APIs : https://blog.alexdevero.com/introduction-to-apis
---
* TO READ :   
   * https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS

### TOOLS
* https://mockoon.com/
* https://medium.com/@alicealdaine/top-10-api-testing-tools-rest-soap-services-5395cb03cfa9
* https://swagger.io/


## GLOSSAIRE
* **API** : interface qui permet de communiquer avec un service distant depuis notre appli
* **REST** = Representational State Transfer = l'architecture REST impose des méthodes à des actions spécifiques (ex. ajout d'un objet via un formulaire doit employer la méthode POST)

## REST
* HTTP Methods   
   We have four basic types of HTTP request:   
   1. GET – retrieves information
   2. POST – sends new information
   3. PUT – updates existing information
   4. DELETE – removes existing information
* Considérations sur POST vs PUT
```md
The **PUT** type of request is most often used to update an existing data or resources.
**PUT** is used to update the old version with new version. Meaning, you update everything. 
Use **PATCH** if request updates part of the resource.

* en général :
Always use **PUT** for **UPDATE** operations
Always use **POST** for **CREATE** operations

* url requête : 
• PUT => /questions/{question-id}
• POST => /questions

* multiples requêtes
• PUT method is idempotent. 
So if you send retry a request multiple times, that should be equivalent to single request modification
• POST is NOT idempotent. 
So if you retry the request N times, you will end up having N resources with N different 
URIs created on server.

* exemples
GET 	/device-management/devices : Get all devices
POST 	/device-management/devices : Create a new device

GET 	/device-management/devices/{id} : Get the device information identified by "id"
PUT 	/device-management/devices/{id} : Update the device information identified by "id"
DELETE	/device-management/devices/{id} : Delete device by "id"
```
* https://restfulapi.net/rest-put-vs-post/
* Les différents codes status
```js
{
    '1XX': 'les informations',
    '2XX': 'les succès',
    '3XX': 'les redirections',
    '304': 'le contenu n\'a pas changé, dans un contexte de cache'
    '4XX': 'les erreurs clients',
    '5XX': 'les erreurs serveur'
}
```
* Les plus courants
```js
{
    200 : "succès de la requête",
    301 et 302 : "redirection, respectivement permanente et temporaire",
    401 : "utilisateur non authentifié",
    403 : "accès refusé",
    404 : "page non trouvée",
    500 et 503 : "erreur serveur",
    504 : "le serveur n'a pas répondu",
}
```
* La liste complète : https://fr.wikipedia.org/wiki/Liste_des_codes_HTTP


## MOCKOON

* https://mockoon.com/
* Simulateur d'API
* Facile à utiliser
* Ergonomique
* Léger

### RAJOUTER DES PARAMETRES A LA REQUETE
* https://github.com/mockoon/mockoon/wiki/%E2%9D%94-Use-query-params
```js
GET /menu

body
{
  "param1": "{{queryParam 'date'}}",
  "param2": "{{queryParam 'type'}}"
}

requête : http://localhost:3001/menu?date=2019-05-14&type=vegetarien
Rules : Query String | date | 2019-05-14 // paramètre obligatoire
AND
Rules : Query String | type | vegetarien // paramètre optionnel
OR
Rules : Query String | type | vegan // paramètre optionnel

mettre une route par défaut si les paramètres ne correspondent pas
400 => renvoie une erreur
200 => renvoie un message
```

### APPEL MOCKOON DEPUIS FLUTTER
```js
http.get("http://10.0.2.2:3001/menu"); // http.get("http://10.0.2.2:port/url");
```
