# Les Fonctions en JavaScript

## Fonctions Nomées et Expressions de Fonction

En JavaScript, les fonctions sont des éléments fondamentaux qui permettent de structurer le code, d'encapsuler la logique, et de créer des blocs réutilisables. Les fonctions peuvent être déclarées de différentes manières, notamment en tant que fonctions nommées et expressions de fonction.

### Fonctions Nomées

Une fonction nommée est une fonction qui a un nom spécifié lors de sa déclaration. Elle peut être utilisée avant sa déclaration dans le code.

```javascript
// Déclaration d'une fonction nommée
function add(a, b) {
  return a + b;
}

// Appel de la fonction nommée
const res = add(3, 4);
console.log(res); // Affiche 7
```

### Expressions de Fonction

Une expression de fonction est une fonction qui est assignée à une variable ou à une propriété d'objet. Elle peut être anonyme ou nommée.

```javascript
// Expression de fonction anonyme
const sub = function(a, b) {
  return a - b;
};

// Appel de la fonction anonyme
const resSub = sub(8, 3);
console.log(resSub); // Affiche 5

// Expression de fonction nommée
const mult = function mult(a, b) {
  return a * b;
};

// Appel de la fonction nommée
const resMult = mult(2, 6);
console.log(resMult); // Affiche 12
```

## Fonctions Fléchées

Les fonctions fléchées sont une syntaxe plus **concise** et plus moderne introduite dans ECMAScript 6 (ES6). 

>[!NOTE] Elles offrent une manière plus concise de déclarer des fonctions et ont des comportements spécifiques.

### Syntaxe de Base

```javascript
// Fonction fléchée pour l'addition
const add = (a, b) => a + b;

// Appel de la fonction fléchée
const res = add(5, 3);
console.log(res); // Affiche 8
```

### Utilisation avec un seul Paramètre

:pill: Si la fonction prend un seul paramètre, les parenthèses autour du paramètre peuvent être omises.

```js
// Fonction fléchée pour le carré d'un nombre
const carre = x => x * x;

// Appel de la fonction fléchée
const resultatCarre = carre(4);
console.log(resultatCarre); // Affiche 16
```

### Utilisation avec `this`

:rocket: Les fonctions fléchées n'ont pas leur propre `this`. 

Elles héritent du `this` du contexte dans lequel elles sont définies.

```js
const o = {
  name: "o",
  f: function() {
    console.log(this.name); // Affiche "o"
  },
  g: () => {
    console.log(this.name); // Affiche undefined (pas le this de l'objet)
  }
};

o.f();
o.g();
```

## Exercice School

soit le code suivant corrigez le pour éviter la valeur de retour undefined 

```js
const School = {
    name: "Alan",
    sayHello() {
        // Dans le contexte de la fonction sayHello le this de l'objet School est accessible
        function getName() {
            console.log(this.name); // undefined
        }
        getName();
    }
}
School.sayHello(); // undefined 
```

:rocket: Remarque, un autre exemple du comportement des fonctions fléchées est donné plus bas.

## Avantages des Fonctions Fléchées

### Syntaxe concise

Les fonctions fléchées permettent de déclarer des fonctions de manière plus concise, ce qui rend le code plus lisible.

```javascript
// Fonction normale
const add = function(a, b) {
  return a + b;
};

// Fonction fléchée
const addArrow = (a, b) => a + b;
```

### `this` Lexical

>[!NOTE] Les fonctions fléchées héritent du `this` du contexte dans lequel elles sont définies, éliminant ainsi la confusion associée aux fonctions classiques.

```js
function A() {
  this.val = 42;

  // Fonction classique
  this.f = function() {
    setTimeout(function() {
      console.log(this.val); // Affiche undefined (pas le this de l'instance)
    }, 1000);
  };

  // Fonction fléchée
  this.g = function() {
    setTimeout(() => {
      console.log(this.val); // Affiche 42 (this lexical)
    }, 1000);
  };
}

const a = new A();
a.f();
a.g();
```

## Hoisting avec les Fonctions

:pill: Le hoisting est un comportement particulier de JavaScript où les déclarations de variables et de fonctions sont déplacées vers le haut de leur contexte avant l'exécution du code. 

:pill: Cela signifie que vous pouvez appeler une fonction avant de la déclarer dans votre code.

### Hoisting avec les Fonctions Nomées

```javascript
// Appel de la fonction nommée avant sa déclaration
hoistedFunction(); // Affiche "Je suis hoistée !"

// Déclaration de la fonction nommée
function hoistedFunction() {
  console.log("Je suis hoistée !");
}
```

### Hoisting avec les Expressions de Fonction

:rocket:

```js
// Appel de la fonction avant sa déclaration
// Ceci provoquera une erreur car la variable n'est pas accessible avant sa déclaration et non plus la fonction elle-même.
// g(); // TypeError: g is not a function

// Déclaration de la variable avec une expression de fonction
const g = function() {
  console.log("Je suis une expression de fonction !");
};

// Appel de la fonction après sa déclaration
g(); // Affiche "Je suis une expression de fonction !"
```

### Hoisting avec les Fonctions Fléchées

:pill: Les fonctions fléchées ne sont pas soumises au hoisting de la même manière que les fonctions nommées et les expressions de fonction. 

>[!NOTE] Elles ne sont pas hoistées en haut de leur contexte.

```js
// Appel de la fonction fléchée avant sa déclaration
// Ceci provoquera une erreur car la variable n'est pas hoistée
// h(); // TypeError: h is not a function

// Déclaration de la variable avec une fonction fléchée
const h = () => {
  console.log("Je ne suis pas hoistée !");
};

// Appel de la fonction fléchée après sa déclaration
h(); // Affiche "Je ne suis pas hoistée !"
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
