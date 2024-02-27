# Closures

#### Introduction

Les closures sont l'un des concepts fondamentaux en JavaScript, offrant une puissante capacité à gérer l'encapsulation, la persistance des variables, et la création de fonctions dynamiques. 

Comprendre les closures est essentiel pour écrire un code JavaScript robuste et efficace.

#### Définition

:pill: Une closure se produit en JavaScript lorsque la fonction interne a accès à des variables de la fonction externe, même après que la fonction externe ait terminé son exécution. 

:rocket: En d'autres termes, la closure "ferme" l'environnement dans lequel elle a été créée, capturant les variables locales, les paramètres et même la fonction elle-même.

#### Création de Closures

```js
function externe(x) {
  // Fonction interne avec accès à la variable externe
  function interne(y) {
    return x + y;
  }
  return interne;
}

const closure = externe(10);
console.log(closure(5)); // Résultat: 15
```

Ici, `externe` renvoie la fonction `interne`, créant une closure autour de la variable `x`. Lorsque `closure` est appelé avec `5`, elle utilise toujours la valeur de `x` de la fonction externe, même si `externe` a déjà été exécutée.

#### Utilisation des Closures

##### Encapsulation

Les closures permettent l'encapsulation, car les variables internes sont inaccessibles depuis l'extérieur de la fonction. Cela aide à éviter les collisions de noms de variables dans des environnements complexes.

```javascript
function compteur() {
  let count = 0;

  return {
    increment: function () {
      count++;
    },
    get: function () {
      return count;
    }
  };
}

const counter = compteur();
counter.increment();
console.log(counter.get()); // Résultat: 1
```

##### Création de Fonctions Partielles

Les closures sont souvent utilisées pour créer des fonctions partielles, où certaines valeurs sont pré-définies dans la closure.

```js
function mult(x) {
  return function (y) {
    return x * y;
  };
}

const double = mult(2);
console.log(double(5)); // Résultat: 10
```

Ici, `mult` crée une closure autour de la variable `x`, et la fonction interne retournée agit comme une fonction de multiplication par `x`.

#### Gestion de la Mémoire

Les closures ont également un impact sur la gestion de la mémoire. 

:pill: Les variables utilisées dans une closure ne sont pas éligibles à la collecte des **déchets** (garbage collection, ramasses miettes) tant que la closure existe, car elles sont toujours référencées par la fonction interne.

```js
function createCounter() {
  let count = 0;

  return function () {
    count++;
    console.log(count);
  };
}

const counter = createCounter();
counter(); // Résultat: 1
counter(); // Résultat: 2
```

### Exercices 

###  Closure basique

Créez une fonction `multiplyBy` qui prend un paramètre `x` et renvoie une fonction qui prend un paramètre `y` et retourne le produit de `x` et `y`. Ensuite, utilisez cette fonction pour créer une nouvelle fonction `multiplyByFive` qui multiplie un nombre par 5.

#### Exemple

```javascript
const multiplyBy = multiplyBy(5);
console.log(multiplyBy(3)); // Résultat: 15
console.log(multiplyBy(7)); // Résultat: 35
```

### Counter Closure

Créez une fonction `counter` qui renvoie une fonction qui, à chaque appel, incrémente un compteur et renvoie la nouvelle valeur. Utilisez cette fonction pour créer une instance de compteur et testez son comportement.

```js
const incr = counter();
console.log(incr()); // Résultat: 1
console.log(incr()); // Résultat: 2
```

### Task closure

Créez une fonction `createTaskList` qui renvoie un objet avec deux méthodes : `addTask` pour ajouter une tâche à la liste et `getTasks` pour obtenir la liste des tâches actuelles. Testez votre fonction en ajoutant des tâches et en récupérant la liste.

```js
const taskList = createTaskList();
taskList.addTask('Faire les courses');
taskList.addTask('Répondre aux emails');
console.log(taskList.getTasks()); // Résultat: ['Faire les courses', 'Répondre aux emails']
```

### Cach closure

:rocket: Créez une fonction `createCache` qui renvoie une fonction. Cette fonction doit accepter une clé et une fonction de calcul. Si la clé existe dans la cache, retournez la valeur associée. Sinon, calculez la valeur à l'aide de la fonction de calcul, stockez-la dans la cache et retournez-la. Testez votre fonction avec une fonction de calcul simple.

```js
const calculateSquare = createCache();
console.log(calculateSquare(5, () => 5 * 5)); // Résultat: 25 (calculé)
console.log(calculateSquare(5, () => 5 * 5)); // Résultat: 25 (récupéré depuis la cache)
```
