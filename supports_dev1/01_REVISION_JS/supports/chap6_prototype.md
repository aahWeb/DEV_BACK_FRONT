# Objets et Prototypes

## Fonction constructeur

En JavaScript, les fonctions constructeurs sont des fonctions spéciales qui servent à créer des objets. Elles sont souvent utilisées pour définir des modèles d'objets avec des propriétés et des méthodes communes. Voici un exemple de fonction constructeur :

```javascript
function Person(name, age) {
  this.name = name;
  this.age = age;
}

// Utilisation de la fonction constructeur pour créer des objets
const person1 = new Person("John", 30);
const person2 = new Person("Alice", 25);
```

La fonction `Person` agit comme un modèle pour créer des objets `Person`. Les objets créés auront des propriétés `name` et `age` avec les valeurs spécifiées.

## Exercice Effet de bord

Lorsque vous utilisez une fonction constructeur et que vous affectez des propriétés à `this`, il est important de faire attention à l'effet de bord. Le mot-clé `this` peut être imprévisible dans certaines situations. Considérez l'exemple suivant :

```javascript
function Counter() {
  this.value = 0;

  setInterval(function() {
    // Attention à l'effet de bord sur this
    this.value++;
    console.log(this.value);
  }, 1000);
}

const counter = new Counter();
```

Ici, le `this` à l'intérieur de la fonction de rappel `setInterval` ne fait pas référence à l'objet `Counter`, entraînant un comportement indésirable. Pour éviter cela, on peut utiliser `bind` ou une fonction fléchée.

## Introduction à la notion de prototype

Chaque objet en JavaScript a une propriété spéciale appelée `__proto__` qui pointe vers son prototype. Les prototypes permettent de partager des méthodes entre plusieurs objets. Voici comment utiliser la notion de prototype pour ajouter des méthodes à un objet :

```javascript
function Dog(name) {
  this.name = name;
}

// Ajout d'une méthode au prototype de Dog
Dog.prototype.bark = function() {
  console.log(`${this.name} says woof!`);
};

const dog1 = new Dog("Buddy");
dog1.bark(); // Affiche "Buddy says woof!"
```

## Exercice Prototype Average

Créez une fonction constructeur `User` avec les propriétés `name`, `grades`, et une méthode `calculateAverage` pour calculer la moyenne des notes. Utilisez la notion de prototype pour partager la méthode `calculateAverage` entre plusieurs instances de `User`.

```javascript
function User(name, grades) {
  this.name = name;
  this.grades = grades;
}

User.prototype.calculateAverage = function() {
  const sum = this.grades.reduce((acc, grade) => acc + grade, 0);
  return sum / this.grades.length;
};

const user1 = new User("Alice", [85, 90, 92]);
console.log(user1.calculateAverage()); // Affiche la moyenne des notes de Alice
```

Dans cet exercice, la méthode `calculateAverage` est ajoutée au prototype de `User`, permettant à toutes les instances de `User` d'y accéder sans duplication de code.

En comprenant ces concepts, vous serez mieux équipé pour travailler avec des objets et des prototypes en JavaScript. N'hésitez pas à pratiquer ces concepts avec des exemples concrets pour renforcer votre compréhension.