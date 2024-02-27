# Scope

La portée des variables en JavaScript fait référence à la visibilité d'une variable dans différentes parties du code. 

:rocket: Il existe différents types de portées, notamment la portée globale, la portée locale et la portée de bloc. Comprendre la portée des variables est essentiel pour écrire un code JavaScript robuste et éviter les erreurs.

## Portée des variables

JavaSript cherche la définition de ses variables dans le scope courant et sinon il remonte les scopes. Si la variable n'est définie dans aucun des scopes, alors une erreur **ReferenceError** est levée.

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


>[!NOTE] 
> Attention à la portée des variables, dans l'exemple suivant `j`, après la boucle n'est pas définie.

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

### Pour les constantes 

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

## Portée Globale

La portée globale est la portée de niveau supérieur dans un programme JavaScript. Les variables déclarées à ce niveau sont accessibles de partout dans le code.

```javascript
// Variable avec une portée globale
let globalVar = "Je suis globale";

function afficherGlobalVar() {
  console.log(globalVar);
}

afficherGlobalVar(); // Affiche "Je suis globale"
```

## Portée Locale (Fonction)

Les variables déclarées à l'intérieur d'une fonction ont une portée locale. Elles ne sont accessibles qu'à l'intérieur de la fonction où elles sont déclarées.

```javascript
function exemplePorteeLocale() {
  // Variable avec une portée locale
  let localVar = "Je suis locale";
  console.log(localVar);
}

exemplePorteeLocale(); // Affiche "Je suis locale"

// Tentative d'accéder à localVar en dehors de la fonction (provoque une erreur)
console.log(localVar); // ReferenceError: localVar is not defined
```

## Portée de Bloc (let et const)

Avec l'introduction de `let` et `const` dans ECMAScript 6 (ES6), JavaScript a introduit la portée de bloc. Les variables déclarées avec `let` et `const` ont une portée limitée au bloc dans lequel elles sont déclarées.

```javascript
if (true) {
  // Bloc avec une portée de bloc
  let blockVar = "Je suis dans un bloc";
  console.log(blockVar);
}

// Tentative d'accéder à blockVar en dehors du bloc (provoque une erreur)
console.log(blockVar); // ReferenceError: blockVar is not defined
```

## Temporal Dead Zone (TDZ)

La Temporal Dead Zone (TDZ) fait référence à la période entre le début d'une portée (par exemple, le début d'une fonction ou d'un bloc) et la déclaration effective de la variable. Durant cette période, la variable existe, mais toute tentative d'accès à celle-ci provoque une `ReferenceError`.

```javascript
console.log(tdVar); // ReferenceError: Cannot access 'tdVar' before initialization
let tdVar = "Je suis dans la Temporal Dead Zone";
```

## Utilisation de `var`

Avant l'introduction de `let` et `const`, la déclaration de variables se faisait avec `var`. Les variables déclarées avec `var` ont une portée de fonction et peuvent être sujettes à des comportements inattendus.

```javascript
function exempleVar() {
  if (true) {
    var localVar = "Je suis déclarée avec var";
  }
  console.log(localVar); // Affiche "Je suis déclarée avec var"
}

exempleVar();
console.log(localVar); // Pas d'erreur, affiche "Je suis déclarée avec var"
```

## Conclusion

La compréhension de la portée des variables en JavaScript est essentielle pour écrire un code clair, éviter les erreurs de portée et adopter les meilleures pratiques de programmation. L'utilisation de `let` et `const` permet de mieux contrôler la portée des variables et d'éviter des comportements inattendus.