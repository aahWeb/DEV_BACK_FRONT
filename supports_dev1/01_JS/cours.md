# Révision JS

## Configuration et installation
- Reprenez l'environnement de travail déjà vu en cours.

## Portée des variables
- JS cherche la définition de ses variables dans le scope courant et remonte les scopes en cas de non-définition.
- Exemple de temporal Dead Zone
- Utilisation de `let`, `const`, et `var` pour déclarer des variables.

## Fonctions Avancées
- Utilisation de fonctions fléchées.
  - Exemples d'utilisation.
- Exercice Deep copy
  - Copie profonde d'un tableau d'objets.
- Exercice Reduce
  - Utilisation de `reduce` pour calculer la somme TTC.

## Closures
- Encapsulation des variables et création d'environnements lexicaux.
- Exercice Counter
  - Création d'un compteur avec une closure.
- Exercice Gestion de l'état
  - Gestion de l'état d'une application avec une closure.

## Objets et Prototypes
- Fonction constructeur
  - Création d'objets avec une fonction constructeur.
- Exercice Effet de bord
  - Éviter l'effet de bord sur la propriété `this` avec `bind` ou une fonction fléchée.
- Introduction à la notion de prototype
  - Utilisation de `prototype` pour ajouter des méthodes à un objet.
- Exercice Prototype Average
  - Création d'une fonction Container pour hydrater un utilisateur et calculer sa moyenne.

## Gestion des Erreurs
- Utilisation de l'objet `Error` pour créer des erreurs personnalisées.
- Utilisation de `try/catch` pour gérer les erreurs de manière efficace.

## Types d'Erreurs en JavaScript
1. SyntaxError
2. TypeError
3. ReferenceError
4. RangeError
5. Création d'erreurs personnalisées avec `class` et `extends`.

## Configuration et installation

Reprenez l'environnement de travail déjà vu en cours.

## Portée des variables

JS cherche la définition de ses variables dans le scope courant et sinon il remonte les scopes. Si la variable n'est définie dans aucun des scopes, alors une erreur **ReferenceError** est levée.

```javascript
// bloc courant pour b
let b = 11;

function baz() {
  // bloc courant pour c
  let c = 9;

  // JS ne trouve pas b dans le bloc courant => il remonte les scopes
  console.log(b, c);
}

// affiche 11 9
baz();

```

- Exemple de temporal Dead Zone

```javascript
function tdz() {
  console.log(tdz_val);

  let tdz_val = "Temporal Dead Zone";
}

tdz();
```

>[!NOTE] 
> Attention à la portée des variables, dans l'exemple suivant j après la boucle n'est pas définie.

```javascript
for (let j = 0; j < 10; j++) {}
console.log(j); // ReferenceError: j is not defined
```

>[!WARING]
> Rappelons la portée de var, son utilisation est obsolète.

```javascript
function foo() {
  var x = 10; 
  if (true) {
    var x = 2;  
    console.log(x);  // 2
  }
  console.log(x);   // 2
}
foo(); 
```
>[!WARNING]
> L'effet de hoisting peut parfois entraîner des comportements inattendus, donc il est recommandé de déclarer les variables avant leur utilisation pour éviter toute confusion.

```javascript
console.log(x); // Affiche "undefined"
var x = 5;
console.log(x); // Affiche 5
```

 - Pour les constantes 

Le mot réservé du langage JS **const** permet de définir une constante à assignation unique. Notez que vous êtes obligé de lui donner une valeur lors de sa définition. Une constante ne peut être re-définie.

```javascript

const STUDENTS = ["Alan", "Bernard", "Jean"];

STUDENTS.push("Sophie");

console.log(STUDENTS);
//["Alan", "Bernard", "Jean", "Sophie"]

STUDENTS.pop();

console.log(STUDENTS);
// ["Alan", "Bernard", "Jean"]

```

## Fonctions Avancées :

1. Utilisation de fonctions fléchées.  

:rocket: Quelques exemples 

```javascript
// Utilisation de fonctions fléchées
const add = (a, b

) => a + b;

// Fonction de rappel
function fetchData(func, timer = 1000) {
  setTimeout(() => {
    func('Données récupérées !');
  }, timer);
}


function fetchDataPromise(d, timer = 1000) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        resolve(d);
      }, timer);
    });
  }
  
  // Utilisation de async/await
  const fetchAsyncData = async (d) =>  {
    try {
      const data = await fetchDataPromise(d);
      console.log(data);
    } catch (error) {
      console.error('Erreur de récupération des données', error);
    }
  }
  
  fetchAsyncData("Data");

```

## 01 Exercice Deep copy

Soit le données suivantes faites à l'aide d'une fonction fléchée une copie profonde de students.

:rocket:

```javascript
const students = [
  {
    name: "Alan",
    family: {
      mother: "Yvette",
      father: "Paul",
      sister: "Sylvie",
    },
    age: 35,
  },
  {
    name: "Bernard",
    family: {
      mother: "Martine",
      father: "Cécile",
      sister: "Sophie",
    },
    age: 55,
  },
];
```

## 02 Exercice Reduce calculator

En utilisant reduce et une fonction fléchée calculer la somme TTC suivante à partir des données ci-dessous en créant une nouvelle clé dans le littérale.

1. Calculez la somme.
1. Affichez le résultat en console. 

```javascript

const numbers = [
    {
        name : "byke",
        priceInfo : {
            priceHT : 120,
            code : "001"
        }
    },
    {
        name: "car",
        priceInfo: {
            priceHT: 20000,
            code: "002"
        }
    },
    {
        name: "phone",
        priceInfo: {
            priceHT: 800,
            code: "003"
        }
    },
    {
        name: "laptop",
        priceInfo: {
            priceHT: 1200,
            code: "004"
        }
    },
    {
        name: "watch",
        priceInfo: {
            priceHT: 150,
            code: "005"
        }
    },
    {
        name: "tablet",
        priceInfo: {
            priceHT: 500,
            code: "006"
        }
    },
    {
        name: "headphones",
        priceInfo: {
            priceHT: 80,
            code: "007"
        }
    },
    {
        name: "television",
        priceInfo: {
            priceHT: 1000,
            code: "008"
        }
    },
    {
        name: "speaker",
        priceInfo: {
            priceHT: 300,
            code: "009"
        }
    },
    {
        name: "camera",
        priceInfo: {
            priceHT: 700,
            code: "010"
        }
    }
];
```

## 03 Exercice counter reduce

Soit la chaîne de caractères suivantes à l'aide de la fonction reduce en JS compter le nombre d'occurence de chaque lettre :

```javascript
const message = "  aaasldkqldqaaaa  dkkdjfkdfjaaaa  ";
```

>[!NOTE]
> Contrairement aux fonctions classiques, les fonctions fléchées ne re-définissent pas de this. Si vous > vous référez dans une fonction fléchée au mot clé this, la fonction fléchée **récupérera le this du contexte** dans lequel elle a été définie.

- Exemple

```javascript
const School = {
    name: "Alan",
    sayHello() {
        // récupérer le this du context
        const that = this;
        function getName() {
            console.log(that.name); // Alan
            console.log(this.name); // undefined
        }
        getName();
    },

    sayHelloArrowFunc(){
        // La fonction fléchée récupère le context de l'objet courant School
        let func = () => {
            console.log(this.name); // Alan
        }
        func();
    }
}
School.sayHello();
School.sayHelloArrowFunc();
```

## Les Promesses pour gérer les opérations asynchrones.

JavaScript utilise des promesses pour gérer des opérations asynchrones de manière plus lisible et plus performante.

Une promesse est un objet représentant la résolution ou le rejet ultérieur d'une valeur.

Elle permet de gérer des opérations asynchrones de manière efficace, tandis que, à l'inverse, les callbacks, souvent critiqués, sont appelés callback hell ou pyramide de la mort.

:rocket:

- Une promesse peut être dans l'un des trois états suivants et une fois exécutée se termine :

- Pending (en attente) : État initial, ni résolue ni rejetée.
  
- Fulfilled (réalisée) : L'opération asynchrone a réussi, et la promesse a été résolue avec une valeur.
  
- Rejected (rejetée) : L'opération asynchrone a échoué, et la promesse a été rejetée avec une raison.


>[!NOTE]
> Les promesses peuvent être chaînées pour séquencer des opérations asynchrones. 
> On utilise les méthodes `then` et `catch` pour gérer la résolution et le rejet d'une promesse.
> `finally` s'exécute quoi qu'il arrive

```javascript
myPromise
  .then(r => {
    return r;
  })
  .then(r => {
   
   return r
  })
  .catch(console.error)
  .finally(() => console.log("Quoi qu'il arrive, je m'affiche ! "))

```

La promesse **Promise.all** permet de traiter, dans l'ordre dans lequel on les définit, un ensemble de promesses. Si une échoue, Promise.all sera dans l'état reject, vous pouvez dès lors catcher l'erreur.

```javascript
const promises = [p1, p2, p3];
Promise.all(promises).then(console.log).catch(console.error)
```

1. Utilisation de `async/await` pour simplifier la gestion des promesses.

L'Async/Await est une syntaxe plus récente et plus lisible pour travailler avec les promesses. 

>[!TIP]
>Les fonctions marquées comme async retournent automatiquement une promesse.

## 04 Exercice wait

Créez une promesse qui utilise un setTimeout paramétrable et qui s'exécute deux fois en affichant une valeur de départ incrémentée à chaque résolution. Utilisez finally pour afficher l'ensemble des résultats, comprenant la valeur de départ et la valeur d'arrêt, quelle que soit l'issue.

## Rappel sur l'Event Loop

:rocket: L'Event Loop est un concept clé pour comprendre le fonctionnement asynchrone en JavaScript. Il permet d'assurer que les opérations asynchrones, comme les callbacks, les promesses et les fonctions async/await, soient bien traitées dans un environnement mono-threaded.


>[!TIP]
> Dans JavaScript, l'Event Loop garantit qu'une seule opération est en cours d'exécution à la fois, même si l'environnement d'exécution est mono-threaded.

- Boucle d'événement (Event Loop) :

L'Event Loop est un mécanisme qui gère l'exécution des tâches asynchrones et des événements dans un programme JavaScript. Il assure une exécution non bloquante des opérations, permettant au programme de rester réactif.

:rocket:

Le cycle de vie de l'Event Loop se déroule en plusieurs phases :

1. **Phase de récupération des tâches en attente (macrotâches) :** Cette phase récupère les tâches en attente, comme les callbacks de la pile d'appels, les timers expirés, et d'autres événements de l'environnement d'exécution.

1. **Phase de traitement des tâches en attente (macrotâches) :** Les tâches récupérées sont traitées séquentiellement, en commençant par la plus ancienne. Chaque tâche est exécutée de manière complète avant de passer à la suivante.

1. **Phase de récupération des microtâches :** Après avoir traité toutes les macrotâches, l'Event Loop récupère les microtâches en attente. Les microtâches sont généralement des promesses résolues ou rejetées, des mutations de l'interface utilisateur (UI) et d'autres opérations asynchrones de priorité élevée.

1. **Phase de traitement des microtâches :** Les microtâches sont traitées séquentiellement, en commençant par la plus ancienne. Chaque microtâche est exécutée de manière complète avant de passer à la suivante.

1. **Répétition du cycle :** Les phases de récupération et de traitement se répètent en boucle, permettant au programme JavaScript de continuer à fonctionner de manière réactive et non bloquante.

>[!NOTE]
> Les microtâches sont généralement prioritaires par rapport aux macrotâches dans l'Event Loop. Cela signifie que les microtâches sont traitées avant le passage à la phase suivante, assurant ainsi une réactivité accrue.

1. **Introduction à la gestion des événements**

- Les événements sont des occurrences qui se produisent pendant l'exécution d'un programme, souvent déclenchées par des interactions utilisateur ou d'autres sources externes.

- JavaScript offre un modèle de gestion des événements qui permet aux développeurs d'écouter et de répondre à des événements spécifiques.

:rocket:

- Ajout d'un écouteur d'événements :

```javascript
const button = document.getElementById("myButton");

button.addEventListener("click", () => {
  console.log("Le bouton a été cliqué !");
});
```

1. **Gestion des formulaires**

- Les formulaires HTML sont utilisés pour collecter des données auprès des utilisateurs. JavaScript permet de manipuler et de valider ces données en réponse aux événements du formulaire.

:rocket:

- Exemple de gestion d'événements de formulaire :

```html
<form id="myForm">
  <label for="username">Nom d'utilisateur :</label>
  <input type="text" id="username" name="username">

  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password">

  <input type="submit" value="Se connecter">
</form>

<script>
  const form = document.getElementById("myForm");

  form.addEventListener("submit", (event) => {
    event.preventDefault(); // Empêche le rechargement de la page par défaut

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Effectuez ici la gestion des données du formulaire
    console.log("Nom d'utilisateur :", username);
    console.log("Mot de passe :", password);
  });
</script>
```

1. **Manipulation du DOM**

- Le Document Object Model (DOM) est une interface de programmation qui représente la structure hiérarchique d'un document HTML ou XML en tant qu'arbre d'objets.

- JavaScript permet de manipuler le DOM, c'est-à-dire d'ajouter, de supprimer ou de modifier des éléments dans la page web en réponse à des événements ou à des actions utilisateur.

:rocket:

- Exemple de création d'éléments et de modification du DOM :

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manipulation du DOM</title>
</head>
<body>

  <h1 id="myTitle">Titre principal</h1>
  <ul id="myList">
    <li>Élément 1</li>
    <li>Élément 2</li>
    <li>Élément 3</li>
  </ul>

  <script>
    // Modification du texte d'un élément
    const title = document.getElementById("myTitle");
    title.textContent = "Nouveau titre principal";

    // Ajout d'un nouvel élément à la liste
    const list = document.getElementById("myList");
    const newItem = document.createElement("li");
    newItem.textContent = "Nouvel élément";
    list.appendChild(newItem);
  </script>

</body>
</html>
```

1. **Notions de base sur les classes CSS en JavaScript**

- JavaScript peut être utilisé pour ajouter, supprimer ou modifier les classes CSS d'éléments HTML. Cela permet de dynamiquement changer le style d'un élément en réponse à des événements ou à des

 actions utilisateur.

:rocket:

- Exemple d'ajout et de suppression de classes CSS :

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des classes CSS</title>
  <style>
    .highlight {
      background-color: yellow;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <p id="myParagraph">Ceci est un paragraphe.</p>

  <script>
    const paragraph = document.getElementById("myParagraph");

    // Ajout de la classe "highlight"
    paragraph.classList.add("highlight");

    // Suppression de la classe "highlight" après un délai
    setTimeout(() => {
      paragraph.classList.remove("highlight");
    }, 2000);
  </script>

</body>
</html>
```

>[!WARNING]
> La modification directe du style d'un élément en utilisant `element.style` n'est généralement pas recommandée, car elle mélange le code JavaScript et le style, ce qui peut entraîner une maintenance difficile. Il est préférable d'utiliser des classes CSS pour définir le style et de manipuler ces classes avec JavaScript.

>[!TIP]
> La gestion des classes avec `classList` offre des méthodes utiles telles que `add`, `remove`, `toggle` et `contains` pour manipuler les classes d'un élément de manière plus pratique.


1. **Les API en JavaScript**

- Les API (Interfaces de Programmation d'Applications) permettent à des logiciels distincts de communiquer entre eux. En JavaScript, les API peuvent fournir des fonctionnalités telles que l'accès aux données, la gestion des fichiers, la géolocalisation, etc.

- Les API peuvent être intégrées dans des applications web pour enrichir leur fonctionnalité et accéder à des services externes.

:rocket:

- Exemple d'utilisation de l'API Fetch pour effectuer une requête HTTP :

```javascript
// Exemple d'utilisation de l'API Fetch pour effectuer une requête HTTP
fetch('https://api.example.com/data')
  .then(response => {
    if (!response.ok) {
      throw new Error('Erreur de réseau : ' + response.statusText);
    }
    return response.json();
  })
  .then(data => {
    console.log('Données récupérées avec succès :', data);
  })
  .catch(error => {
    console.error('Erreur de récupération des données :', error);
  });
```

1. **Introduction aux Services Web**

- Les services web permettent à des applications de communiquer entre elles via le protocole HTTP. Ils peuvent fournir des fonctionnalités telles que la récupération de données, l'envoi de données, l'authentification, etc.

- Les services web peuvent être mis en œuvre à l'aide d'architectures RESTful (Representational State Transfer) ou d'autres architectures.

:rocket:

- Exemple d'utilisation de l'API Fetch pour envoyer des données à un service web :

```javascript
// Exemple d'utilisation de l'API Fetch pour envoyer des données à un service web
const userData = {
  username: 'john_doe',
  email: 'john.doe@example.com'
};

fetch('https://api.example.com/user',

 {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(userData)
})
  .then(response => {
    if (!response.ok) {
      throw new Error('Erreur de réseau : ' + response.statusText);
    }
    return response.json();
  })
  .then(data => {
    console.log('Données envoyées avec succès :', data);
  })
  .catch(error => {
    console.error('Erreur d'envoi des données :', error);
  });
```

>[!NOTE]
> Il est important de comprendre les concepts liés aux API, aux services web et aux requêtes HTTP pour développer des applications web modernes et interconnectées.

1. **Conclusion et Ressources Supplémentaires**

- La maîtrise de JavaScript est essentielle pour le développement web front-end et peut également être utilisée côté serveur avec des environnements tels que Node.js.

- Continuer à explorer et à pratiquer JavaScript à travers des projets personnels, des exercices et des tutoriels.

- Les ressources supplémentaires incluent des livres, des cours en ligne, des communautés de développeurs et la documentation officielle de JavaScript.

:rocket:

- Ressources supplémentaires :

  - [Mozilla Developer Network (MDN) - JavaScript Guide](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide)
  - [JavaScript.info - The Modern JavaScript Tutorial](https://javascript.info/)
  - [Eloquent JavaScript by Marijn Haverbeke](https://eloquentjavascript.net/)
  - [You Don't Know JS (book series) by Kyle Simpson](https://github.com/getify/You-Dont-Know-JS)
  - [W3Schools - JavaScript Tutorial](https://www.w3schools.com/js/)

  - [Node.js Documentation](https://nodejs.org/en/docs/)
  - [Express.js Documentation](https://expressjs.com/)
  - [React Documentation](https://reactjs.org/docs/getting-started.html)
  - [Vue.js Documentation](https://vuejs.org/v2/guide/)

  - [GitHub - Explore JavaScript Projects](https://github.com/topics/javascript)
  - [Stack Overflow - JavaScript Questions](https://stackoverflow.com/questions/tagged/javascript)
  - [DEV Community - JavaScript](https://dev.to/t/javascript)


:rocket: **Happy Coding!** :rocket:
