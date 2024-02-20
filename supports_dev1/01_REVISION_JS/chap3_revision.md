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
- SyntaxError
- TypeError
- ReferenceError
- RangeError
- Création d'erreurs personnalisées avec `class` et `extends`.

## Configuration et installation

Reprenez l'environement de travail déjà vu en cours.

## Portée des variables

JS cherche la définition de ses variables dans le scope courant et sinon il remonte les scopes. Si la variable n'est définie dans aucun des scopes, alors une erreur **ReferenceError** est levée.

```js
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

```js
function tdz() {
  console.log(tdz_val);

  let tdz_val = "Temporal Dead Zone";
}

tdz();
```

>[!NOTE] 
> Attention à la portée des variables, dans l'exemple suivant j après la boucle n'est pas définie.

```js
for (let j = 0; j < 10; j++) {}
console.log(j); // ReferenceError: j is not defined
```

>[!WARING]
> Rappelons la portée de var, son utilisation est obsolète.

```js
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

```js
console.log(x); // Affiche "undefined"
var x = 5;
console.log(x); // Affiche 5
```

 - Pour les constantes 

Le mot réservé du langage JS **const** permet de définir une constante à assignation unique. Notez que vous êtes obligé de lui donner une valeur lors de sa définition. Une constante ne peut être re-définie.

```js

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

```js
// Utilisation de fonctions fléchées
const add = (a, b) => a + b;

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

## Exercice Deep copy

Soit le données suivantes faites à l'aide d'une fonction fléchée une copie profonde de students.

:rocket:

```js
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

## Exercice Reduce

En utilisant reduce et une fonction fléchée calculer la somme TTC suivante à partir des données ci-dessous en créant une nouvelle clé dans le littérale.

1. Calculez la somme.
1. Affichez le résultat en console. 

```js

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

## Exercice counter reduce

Soit la chaîne de caractères suivantes à l'aide de la fonction reduce en JS compter le nombre d'occurence de chaque lettre :

```js
const message = "  aaasldkqldqaaaa  dkkdjfkdfjaaaa  ";
```

>[!NOTE]
> Contrairement aux fonctions classiques, les fonctions fléchées ne re-définissent pas de this. Si vous > vous référez dans une fonction fléchée au mot clé this, la fonction fléchée **récupérera le this du contexte** dans lequel elle a été définie.

- Exemple

```js
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

1. Les Promesses pour gérer les opérations asynchrones.

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

```js
myPromise
  .then(r => {
    return r;
  })
  .then(r => {
   
   return r
  })
  .catch(console.error);

```

La promesse **Promise.all** permet de traiter, dans l'ordre dans lequel on les définit, un ensemble de promesses. Si une échoue, Promise.all sera dans l'état reject, vous pouvez dès lors catcher l'erreur.

```js
const promises = [p1, p2, p3];
Promise.all(promises).then(console.log).catch(console.error)
```

1. Utilisation de `async/await` pour simplifier la gestion des promesses.

L'Async/Await est une syntaxe plus récente et plus lisible pour travailler avec les promesses. 

>[!TIP]
>Les fonctions marquées comme async retournent automatiquement une promesse.

## Exercice pile ou face

Définissez une Promesse ( avec une fonction fléchée) qui affiche pile ou face (resolve), utilisez la fonction Math.random() de JS pour un lancer de pile/face. 

Ils se feront avec un décalage de 500ms (setTimeout) fonction asynchrone.

Faites 3 lancers et définssez les paris suivants :

1. 3 piles vous gagnez 1 pâtisserie.

1. Une fois pile exactement vous gagnez un morceau de 0.5  pâtisserie.

1. Le reste des combinaisons vous perdez et devez offrir à chaque fois 1 pâtisserie.


>[!NOTE]
> Utilisez tout ce que l'on a vu déjà en cours.


# Closures :

1. Encapsuler des variables et créer des environnements lexicaux.

>[!TIP]
> En JavaScript, une closure (fermeture) est un concept qui se produit lorsque la fonction interne a accès aux variables de sa fonction externe, même après que la fonction externe ait terminé son exécution.
> Nous pouvons donc créer des variables privées.

```js
function outer(x) {
  // Inner function with access to the variable 'x' from the outer function
  function inner(y) {
    console.log(x + y);
  }

  // Returns the inner function
  return inner;
}

// Creates a closure
const closure = outer(10);

closure(5); // Displays 15 (10 + 5)
```

## Exercice counter

Créez un compteur à l'aide de ce principe de closure, chaque appel de la fonction incrémentera sa valeur de retour. 

Les closures sont utilies également pour la création de fonction à la volée. Elle accède à leur environnement lexical eu moment de la création.

```js
function generate(factor) {
  return function(number) {
    return number * factor;
  };
}

const double = generate(2);
console.log(double(5)); // Affiche 10
```

## Exercice gestion l'état 

Créez une closure pour gérer les états d'une application. Créez un counter qui gère l'état du counter avec un setter et un getter.

>[!NOTE]
>En résumé, les closures fournissent un mécanisme puissant pour la gestion de la portée des variables, l'encapsulation des données, la création de fonctions dynamiques, et la gestion d'états, contribuant ainsi à la modularité et à la robustesse du code JavaScript.

## Objets et Prototypes :

### Fonction constructeur  

Une fonction classique peut définir un constructeur, **pas une fonction flèchée**. Par convention le nom de la fonction commencera par une majuscule.

>[!NOTE]
> Notez qu'en JS une classe est un sucre syntaxique, ce n'est rien d'autre qu'une fonction construteur.

```js

function User(name){
  // constructeur
  this.name = name;

  console.log(this.name);
}

const u1 = new user("Alan");
const u2 = new user("Alan");

// Le code qui suit produira une erreur 
// pas de constructeur dans ce cas
/*const userArrow = name => {
  this.name = name;

  console.log(this.name);
}

const uA1 = new userArrow("Alan");
const uA2 = new userArrow("Alan");
*/
```

Remarque : si vous appelez la fonction constructeur comme une fonction classique, alors le this sera de type "undefined" en mode strict.

```js
'use strict';

function User(name){
  console.log(this);
  this.name = name;
}

User('Alan'); // this undefined
```

:rocket:
Lorsque vous définissez une méthode dans un objet littéral, le this est l'objet littéral lui-même.

```js

const Model = {
    table : "Model",

    subModel:function(){
        console.log(this); // Objet model
    },

    // de manière totalement équivalente vous pour écrire ceci
    // pour définir une méthode/fonction
    subModel2(){
      console.log(this); // Objet model
    }
}

Model.subModel(); // this objet Model
```

### Exercice corrigé l'effet de bord 

Comment éviter l'effet de bord sur la propriété this (undefined) dans le code suivant? Proposez une solution.

```js
const log = {
    count : 100,
    save: function () {
        'use strict';
        console.log(this.count);
    }
}
setTimeout(log.save, 500);
```

### Introduction à la notion de prototype pour une fonction

```js

const Student = {
  name : '',
  average : 17.5,
  situation: function(){
    console.log(`Name ${this.name} average : ${this.average}`);
  }
}
```

Cet objet possède une propriété **prototype**, elle listera l'ensemble des propriétés héritées depuis l'objet Student. La quasi-totalité des objets JS héritent de l'objet **Object** de JS.

```js
Student.__proto__
```

Vous pouvez dès lors appeler des méthodes, qui ne sont pas directement héritées dans l'objet Student.

- Par exemple ajoutons une propriété à User.

Reprenons l'exemple précédent, nous allons voir comment ajouter une propriété au constructeur User qui sera partagée par toutes ses instances :

```js
'use strict';

function User(name, lastname){
  this.name = name;
  this.lastname = lastname;
}

let u1 = new User('Alan', 'Phi'); 

// On ajoute sur le constructeur lui-même la propriété
User.prototype.fullName = function (){

  return this.name + ' ' + this.lastname;
}

console.log(u1.fullName()); // Alan Phi
```

#### Exercice prototype average pour la fonction User

1. Créez une fonction **Container**, elle prends un User l'hydrate et permet de calculer la moyenne d'un utilisateur donnée. 

```js 
const usersData = [
  { id: 1,  name: "Alan Phi", age: 45, notes: [15, 17, 13] },
  { id: 2, name: "Bernad Lu", age: 78, notes: [11, 12, 9] },
  { id : 3 , name: "Sophie Boo", age: 56, notes: [10, 15, 11] },
  { id : 4, name: "Alice Car", age: 45, notes: [5, 18, 20] }
];
```

## Introduction aux Erreurs :

1. Utilisation de l'objet `Error` pour créer des erreurs personnalisées.
1. Utilisation de `try/catch` pour gérer les erreurs de manière efficace.

Pour lever une erreur c'est relativement simple et surtout pour la capturer ( catch )

```js
try {
  throw new Error("Whoops!");
} catch (e) {
  console.error(`${e.name}: ${e.message}`);
}
```

>[!NOTE]
>Mais une erreur est typée, voyez l'exemple suivant, instanceof compare le type de l'erreur levée par la fonction foo qui n'est clairement pas définie dans le script.

```js
try {
  foo.bar();
} catch (e) {
  if (e instanceof EvalError) {
    console.error(`${e.name}: ${e.message}`);
  } else if (e instanceof RangeError) {
    console.error(`${e.name}: ${e.message}`);
  }
  // etc.
  else {
    // If none of our cases matched leave the Error unhandled
    throw e;
  }
}

```

### Types d'Erreurs en JavaScript

En JavaScript, les erreurs sont généralement des objets de type `Error` ou l'un de ses sous-types. Les sous-types d'erreurs prédéfinis sont également appelés des classes d'erreurs. Voici quelques-uns des sous-types d'erreurs courants en JavaScript :

1. **SyntaxError :** Erreur de syntaxe dans le code.

    ```javascript
    try {
      // Code avec une erreur de syntaxe
      eval('alert("Hello World"');
    } catch (error) {
      console.error(error instanceof SyntaxError); // true
    }
    ```

2. **TypeError :** Erreur liée à des types de données.

    ```javascript
    try {
      // Tentative d'appeler une méthode sur une variable qui n'est pas une fonction
      null();
    } catch (error) {
      console.error(error instanceof TypeError); // true
    }
    ```

3. **ReferenceError :** Erreur liée à une référence non définie.

    ```javascript
    try {
      // Tentative d'accéder à une variable non définie
      console.log(undefinedVariable);
    } catch (error) {
      console.error(error instanceof ReferenceError); // true
    }
    ```

4. **RangeError :** Erreur liée à des valeurs hors de la plage autorisée.

    ```javascript
    try {
      // Tentative de créer un tableau avec une longueur négative
      new Array(-1);
    } catch (error) {
      console.error(error instanceof RangeError); // true
    }
    ```

💊 Il est possible de créer des erreurs personnalisées en étendant la classe `Error` ou l'une de ses sous-classes. Par exemple :

```javascript
class CustomError extends Error {
  constructor(message) {
    super(message);
    this.name = 'CustomError';
  }
}

try {
  throw new CustomError('Une erreur personnalisée.');
} catch (error) {
  console.error(error instanceof CustomError); // true
}
```