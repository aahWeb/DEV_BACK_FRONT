# TDD (Test Driven Developpement)

Le TDD (Test Driven Developpement) est une approche de développement logiciel qui consiste à écrire les tests avant d'écrire le code. C'est une approche qui permet de garantir que le code est fonctionnel, et qu'il est testé.

## Table des matières
- [Introduction](#introduction)
- [Mise en place de l'environnement de test](#mise-en-place-de-l'environnement-de-test)
- [Nos premiers tests](#nos-premiers-tests)


Livres à Lire sur le TDD
- Test-Driven Development By example - Kent Deck
- Modern C++ Programming with Test-Driven Development - Jeff Langr
- Growing Object-Oriented Software, guided by Test - Steve Freeman et Nat Pryce

## Introduction

Si on veut tester une fonction `f`, qui prend en paramètres a et b et qui retourne la somme des 2, on utiliserai un `console.log()`, pour vérifier le résultat attendu

```javascript
function f(a, b) {
  return a + b;
}
```
Le souci avec cette méthode, c'est que si j'introduit un bug par inadvertance dans ma fonction (car je la modifie pour qu'elle est le comportement voulue), on oublie que cette fonction est utilisée ailleurs, par répercussion cela va générer des bugs dans le programme 

```javascript
function f(a, b) {
  return a + b + 1; // bug
}
```

C'est la qu'entre en jeu les tests unitaires
On va importer dans un premier temps les outils qui vont nous permettre de tester notre fonction

## Mise en place de l'environnement de test

On va mettre en place la structure de dossier suivante:
```
roman/
    convertToRoman.js
    convertToRoman.test.js
```

Dans le dossier `roman`, on va créer un fichier `package.json` avec la commande suivante:
```bash
$ npm init -y
```

On va installer `jest` avec la commande suivante:
```bash
$ npm install --save-dev jest
```

A la racine, on va créer un fichier `jest.config.js` avec le contenu suivant:
```javascript
// jest.config.js
module.exports = {
  testEnvironment: 'node'
};
```

Et on va mettre en place le script suivant dans le fichier `package.json`:
```json
// package.json
{
  "scripts": {
    "test": "jest"
  }
}
```

## Nos premiers tests

Dans le fichier `convertToRoman.js`, on va écrire notre fonction `convertToRoman` qui prend en paramètre un nombre et qui retourne sa représentation en chiffre romain

```javascript
// convertToRoman.js
function convertToRoman(num) {
  return num;
}

module.exports = convertToRoman;
```

Et dans le fichier `convertToRoman.test.js`, on va écrire notre test

```javascript
// convertToRoman.test.js
const convertToRoman = require("./convertToRoman");

describe('Feature:  return roman number', () => {
    it('it should I', () => {
        expect(convertToRoman(1)).toEqual("I");
    })
});
```
Litérallement, on a écrit un test qui dit que: 
Si on passe `1` en paramètre à la fonction `convertToRoman`, on s'attend à que ce soit égale à "I"

Le principe TDD est de commencer par écrire le test avant d'écrire le code.
Si on lance le test avec la commande suivante:
```bash
$ npm test
```

On aura le message suivant:
```bash
> roman@1.0.0 test
> jest

 FAIL  ./convertToRoman.test.js
  Feature:  return roman number
    ✕ it should I (2 ms)

  ● Feature:  return roman number › it should I

    expect(received).toEqual(expected) // deep equality

    Expected: "I"
    Received: 1

      3 | describe('Feature:  return roman number', () => {
      4 |     it('it should I', () => {
    > 5 |         expect(convertToRoman(1)).toEqual("I");
        |                                   ^
      6 |     })
      7 | });

      at Object.toEqual (convertToRoman.test.js:5:35)

Test Suites: 1 failed, 1 total
Tests:       1 failed, 1 total
Snapshots:   0 total
Time:        0.234 s, estimated 1 s
Ran all test suites.
```

C'est exactement ce qu'on attendait, car on a pas encore implémenté la fonction `convertToRoman`, et c'est le principe même du TDD, on écrit un test qui échoue, et on va écrire le code pour que le test passe

![alt TDD](https://marsner.com/wp-content/uploads/test-driven-development-TDD.png)

1/ Ecrire un test qui échoue
2/ Ecrire un test qui passe
3/ Refactoriser le code (réécrire le code pour le rendre plus joli, plus structurer, plus évolutif)

La première étape nous venons de la faire, en effet nous avons écrire un test avant que la fonction ou la classe n'existe, du coup le test a échouer.
Cette phase est très importante, car on commence a réfléchir a la structure du code avant même qu'il existe.

On a fait des choix architecturaux, on a choisi une fonction au lieu d'une classe, on a définit le nombre de paramètres (type d'entrée) et on a définit le type de retour

Maintenant, il faut écrire notre fonction pour faire en sorte que notre test passe

```javascript
// convertToRoman.js
function convertToRoman(num) {
  return 'I';
}
```

C'est tout? Oui, c'est tout, car on a écrit le code le plus simple pour que le test passe, et c'est le principe même du TDD!

On va maintenant relancer notre test avec la commande suivante:
```bash
$ npm test
```

Et on aura le message suivant:
```bash
> roman@1.0.0 test
> jest

 PASS  ./convertToRoman.test.js
  Feature:  return roman number
    ✓ it should I (1 ms)

Test Suites: 1 passed, 1 total
Tests:       1 passed, 1 total
Snapshots:   0 total
Time:        0.143 s, estimated 1 s
Ran all test suites.
```
Notre test passe !

On va ajouter un autre test pour le chiffre 2
```javascript
// convertToRoman.test.js
describe('Feature:  return roman number', () => {
    it('it should I', () => {
        expect(convertToRoman(1)).toEqual("I");
    })

    it('it should II', () => {
        expect(convertToRoman(2)).toEqual("II");
    })
});
```

Si on lance le test, celui-ci va échouer (❌ <span style="color:red;font-weight:bold">RED STEP</span>), car on a pas encore implémenté le code pour que le test passe

Du coup, on va écrire le code pour que le test passe
```javascript
// convertToRoman.js
function convertToRoman(num) {
  if (num === 1) return 'I';
  return 'II';
}
```

Et si on relance le test, celui-ci va passer (✅ <span style="color:green;font-weight:bold">GREEN STEP</span>)
On ne peut pas le refactoriser plus que ce qu'on a déjà fait, car on a que 2 cas de test, et on a déjà fait le code le plus simple pour que le test passe

On va ajouter un autre test pour le chiffre 3
```javascript
// convertToRoman.test.js
describe('Feature:  return roman number', () => {
    it('it should I', () => {
        expect(convertToRoman(1)).toEqual("I");
    })

    it('it should II', () => {
        expect(convertToRoman(2)).toEqual("II");
    })

    it('it should III', () => {
        expect(convertToRoman(3)).toEqual("III");
    })
});
```

Déjà, sachez que l'on peut (et l'on doit) refactoriser (🦺 <span style="color:blue;font-weight:bold">BLUE STEP</span>) le test, car on a 3 cas de test qui se ressemble, et on aura un jeu de données qu'on alimentera au fur et à mesure que l'on ajoute des cas de test

```javascript
// convertToRoman.test.js
const convertToRoman = require("./convertToRoman");

describe('Feature:  return roman number', () => {

    const dataTest =  {
        "I": 1,
        "II": 2,
        "III": 3
    }

    for(let [roman, number] of Object.entries(dataTest)) {
        it(`it should return ${roman}`, () => {
            expect(convertToRoman(number)).toEqual(roman);
        })
    }
});
```

Du coup, il nous faut écrire la fonction pour que notre jeu de test passe. On peut voir que `I` `II` et `III` c'est un `I` qui se répète, du coup on peut écrire le code suivant :

```javascript
// convertToRoman.js
function convertToRoman(num) {
    return "I".repeat(num);
}

module.exports = convertToRoman;
```

Et nos tests passent:
```bash
> roman@1.0.0 test
> jest

 PASS  ./convertToRoman.test.js
  Feature:  return roman number
    ✓ it should return I (1 ms)
    ✓ it should return II
    ✓ it should return III

Test Suites: 1 passed, 1 total
Tests:       3 passed, 3 total
Snapshots:   0 total
Time:        0.228 s, estimated 1 s
Ran all test suites.
```

Maintenant on doit se poser la question, quel est le prochain test à écrire? On penserait à écrire le test pour le chiffre 4, mais dans l'approche TDD, on commence par les tests simples, et on va complexifier au fur et à mesure. On sait que 5, 10, 50, 100, 500 et 1000 sont des chiffres simples à écrire en chiffre romain, du coup on va écrire les tests pour ces chiffres.

Il suffit d'alimenter notre jeu de données pour que le test passe

```javascript
// convertToRoman.test.js
const dataTest =  {
    "I": 1,
    "II": 2,
    "III": 3,
    "V": 5,
    "X": 10,
    "L": 50,
    "C": 100,
    "D": 500,
    "M": 1000
}
```

En lançant le test, celui-ci va échouer, car on a pas encore implémenté le code pour que le test passe.

On va écrire le code pour que le test passe. 
On va créer un objet de mapping dans lequel on va stocker les chiffres romains et leur équivalent en chiffre.

```javascript
// convertToRoman.js
const romaMapping =  {
    "I": 1,
    "V": 5,
    "X": 10,
    "L": 50,
    "C": 100,
    "D": 500,
    "M": 1000
}

function convertToRoman(num) {
    if (num <= 3) return "I".repeat(num);
    return romaMapping[num];
}

module.exports = convertToRoman;
```

Si le nombre est inférieur ou égale à 3, on retourne `I` répété `num` fois, sinon on retourne la valeur du mapping.

Maintenant on peut tester 6, 7 et 8, et on sait que c'est `V` suivi de `I` répété `num` fois, du coup on peut écrire le test suivant:

```javascript
// convertToRoman.test.js
describe('Feature:  return roman number', () => {

    const dataTest =  {
        "I": 1,
        "II": 2,
        "III": 3,
        "V": 5,
        "VI": 6,
        "VII": 7,
        "VIII": 8,
        "X": 10,
        "L": 50,
        "C": 100,
        "D": 500,
        "M": 1000
    }

    for(let [roman, number] of Object.entries(dataTest)) {
        it(`it should return ${roman}`, () => {
            expect(convertToRoman(number)).toEqual(roman);
        })
    }
});
```

On implémente le code pour que le test passe

```javascript
// convertToRoman.js
function convertToRoman(num) {
    if (num <= 3) return "I".repeat(num);
    if (num >= 6 && num <= 8) return "V" + "I".repeat(num - 5);
    return romaMapping[num];
}
```

On voit que `"I".repeat(num - 5)` apparait 2 fois, du coup on peut le refactoriser en utilisant la récursivité

```javascript
// convertToRoman.js
function convertToRoman(num) {
    if (num <= 3) return "I".repeat(num);
    if (num >= 6 && num <= 8) return convertToRoman(num - 5);
    return romaMapping[num];
}
```

Mais on peut utiliser cette logique pour 11, 12 et 13, de même pour 51, 52 et 53, et pour 101, 102 et 103 etc... notre jeu de tests devient:

```javascript
// convertToRoman.test.js
const dataTest =  {
        "I": 1,
        "II": 2,
        "III": 3,
        "V": 5,
        "VI": 6,
        "VII": 7,
        "VIII": 8,
        "X": 10,
        "XI": 11,
        "XII": 12,
        "XIII": 13,
        "L": 50,
        "LI": 51,
        "LII": 52,
        "LIII": 53,
        "C": 100,
        "CI": 101,
        "CII": 102,
        "CIII": 103,
        "D": 500,
        "DI": 501,
        "DII": 502,
        "DIII": 503,
        "M": 1000,
        "MI": 1001,
        "MII": 1002,
        "MIII": 1003
    }
```

Et on peut écrire le code pour que les tests passent

```javascript
// convertToRoman.js
function convertToRoman(num) {
    if (num <= 3) return "I".repeat(num);
    
    for (let [roman, value] of Object.entries(romaMapping)) {
        if (value === num) return roman;
        if (num >= value + 1 && num <= value + 3) return roman + convertToRoman(num - value);
    }
}
```

Voilà, on a implémenté notre fonction `convertToRoman` en utilisant l'approche TDD, on a écrit un test qui échoue, on a écrit le code le plus simple pour que le test passe, et on a refactorisé le code pour le rendre plus structuré, plus évolutif.

Le but ici n'est pas de vous apprendre à écrire une fonction qui convertit un nombre en chiffre romain, mais de vous montrer l'approche TDD.

Ca peut être un bon exercice à finir, en ajoutant des tests pour les nombres se terminant par 4, 9, 40, 90, 400 et 900, et en refactorisant le code pour que les tests passent.