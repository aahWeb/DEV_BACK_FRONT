# Cours sur les Design Patterns en TypeScript

## Table des matières
1. Introduction
    - Qu'est-ce qu'un design pattern ?
    - L'importance des design patterns
1. Les Design Patterns Principaux
    -  Création
        - Singleton anti-pattern
        - Factory Method
        - Abstract Factory
    - Structure
        - Adapter
        - Decorator
    - Comportement
        - Observer
1. Middleware en TypeScript
    - Qu'est-ce qu'un Middleware ?
    -  Exemple d'utilisation de Middleware
        -  Middleware dans un serveur HTTP
        -  Middleware dans une application Redux
1. EventListener en TypeScript
    - Qu'est-ce qu'un EventListener ?
    - Exemple d'utilisation d'EventListener
        - Gestion des événements dans le DOM
        - Gestion des événements personnalisés
1. Observer en TypeScript
    - Qu'est-ce que le pattern Observer ?
    - Exemple d'utilisation de l'Observer
        - Mise en place d'un Observable
        - Création d'Observers
        - Notification des Observers
1. Conclusion

## 1. Introduction

### Qu'est-ce qu'un design pattern ?

Un design pattern est une solution générale à un problème récurrent rencontré lors de la conception de logiciels. 

:rocket:
Il représente une approche éprouvée pour résoudre un type spécifique de problème de conception logicielle.

### L'importance des design patterns en TypeScript

:rocket:
En utilisant des design patterns, les développeurs peuvent créer des solutions plus flexibles, évolutives et maintenables. 

TypeScript, avec son typage statique, offre un terrain propice à l'application efficace de ces patterns.

## Les Design Patterns Principaux

### Création

#### Singleton

Nous ne le verrons pas, car c'est un anti-pattern, non modulable et non testable. Il n'est plus utilisé dans les applications modernes. Nous lui préférons l'injection de dépendances.

#### Factory Method

Le Factory Method définit une interface pour la création d'objet, mais laisse aux sous-classes le soin de modifier le type d'objet créé.


```js
interface Product {
    operation(): string;
}

class ConcreteProduct implements Product {
    public operation(): string {
        return 'ConcreteProduct operation';
    }
}

abstract class Creator {
    abstract factoryMethod(): Product;

    public someOperation(): string {
        const product = this.factoryMethod();
        return `Creator: ${product.operation()}`;
    }
}

class ConcreteCreator extends Creator {
    public factoryMethod(): Product {
        return new ConcreteProduct();
    }
}

const creator = new ConcreteCreator();
console.log(creator.someOperation());
```

#### Abstract Factory

L'Abstract Factory fournit une interface pour créer des familles d'objets liés ou dépendants sans spécifier leurs classes concrètes.

```js
interface AbstractProductA {
    usefulFunctionA(): string;
}

interface AbstractProductB {
    usefulFunctionB(): string;
}

interface AbstractFactory {
    createProductA(): AbstractProductA;
    createProductB(): AbstractProductB;
}

class ConcreteProductA1 implements AbstractProductA {
    public usefulFunctionA(): string {
        return 'The result of the product A1.';
    }
}

class ConcreteProductB1 implements AbstractProductB {
    public usefulFunctionB(): string {
        return 'The result of the product B1.';
    }
}

class ConcreteFactory1 implements AbstractFactory {
    public createProductA(): AbstractProductA {
        return new ConcreteProductA1();
    }

    public createProductB(): AbstractProductB {
        return new ConcreteProductB1();
    }
}

const factory1 = new ConcreteFactory1();
const productA1 = factory1.createProductA();
const productB1 = factory1.createProductB();
```

### Structure

#### Adapter

L'Adapter permet à une interface existante d'être utilisée comme une autre interface.

:rocket:

```js
class Adaptee {
    public specificRequest(): string {
        return 'Adaptee specific request';
    }
}

interface Target {
    request(): string;
}

class Adapter implements Target {
    private adaptee: Adaptee;

    constructor(adaptee: Adaptee) {
        this.adaptee = adaptee;
    }

    public request(): string {
        return `Adapter: (TRANSLATED) ${this.adaptee.specificRequest()}`;
    }
}

const adaptee = new Adaptee();
const adapter = new Adapter(adaptee);
console.log(adapter.request());
```

#### Decorator

Le Decorator attache de nouvelles responsabilités à un objet en les enveloppant dans une classe décoratrice.

```js
interface Component {
    operation(): string;
}

class ConcreteComponent implements Component {
    public operation(): string {
        return 'ConcreteComponent operation';
    }
}

class Decorator implements Component {
    protected component: Component;

    constructor(component: Component) {
        this.component = component;
    }

    public operation(): string {
        return this.component.operation();
    }
}

class ConcreteDecoratorA extends Decorator {
    public operation(): string {
        return `ConcreteDecoratorA(${super.operation()})`;
    }
}

class ConcreteDecoratorB extends Decorator {
    public operation(): string {
        return `ConcreteDecoratorB(${super.operation()})`;
    }
}

const simple = new ConcreteComponent();
console.log(simple.operation());

const decoratorA = new ConcreteDecoratorA(simple);
const decoratorB = new ConcreteDecoratorB(decoratorA);
console.log(decoratorB.operation());
```

### Exercice texte décorée 

1. Créez une interface Text avec une méthode getText() qui retourne une chaîne de caractères.
1. Implémentez une classe ConcreteText qui implémente l'interface Text. Cette classe doit avoir un constructeur prenant une chaîne de caractères comme argument et stockant cette valeur.
1. Implémentez une classe UpperCaseDecorator qui implémente TextDecorator. Cette classe doit prendre un composant de texte en paramètre dans son constructeur et transformer le texte en majuscules dans la méthode getText(). La méthode decorate() doit retourner une description spécifique du décorateur, par exemple, "Upper Case Decorator".
1. Créez une instance de ConcreteText avec le texte "Bonjour, le monde!".
1. Créez une instance de UpperCaseDecorator en utilisant l'instance de ConcreteText comme composant de base.
1. Affichez le texte d'origine, le texte transformé avec le décorateur et la description du décorateur.

### Comportement

####  Observer

Le pattern Observer définit une dépendance un-à-plusieurs entre objets de manière à ce que lorsqu'un objet change d'état, tous ses dépendants soient notifiés et mis à jour automatiquement.


```js
// Interface pour le sujet (Subject)
interface Subject {
    attach(observer: Observer): void;
    detach(observer: Observer): void;
    notify(): void;
}

// Interface pour l'observateur (Observer)
interface Observer {
    update(subject: Subject): void;
}

// Classe concrète du sujet (ConcreteSubject)
class ConcreteSubject implements Subject {
    private observers: Observer[] = [];
    private state: number;

    attach(observer: Observer): void {
        this.observers.push(observer);
    }

    detach(observer: Observer): void {
        const index = this.observers.indexOf(observer);
        if (index !== -1) {
            this.observers.splice(index, 1);
        }
    }

    notify(): void {
        for (const observer of this.observers) {
            observer.update(this);
        }
    }

    getState(): number {
        return this.state;
    }

    setState(state: number): void {
        this.state = state;
        this.notify();
    }
}

// Classe concrète de l'observateur (ConcreteObserver)
class ConcreteObserver implements Observer {
    update(subject: Subject): void {
        if (subject instanceof ConcreteSubject) {
            console.log(`ConcreteObserver: Reacted to the state change of ConcreteSubject. New state: ${subject.getState()}`);
        }
    }
}

// Utilisation des classes
const subject = new ConcreteSubject();
const observer = new ConcreteObserver();
subject.attach(observer);
subject.setState(42);
```

## Middleware en TypeScript

### Qu'est-ce qu'un Middleware ?

Le middleware est un design pattern qui permet, par exemple, de traiter des requêtes dans une application sous forme de chaîne. 

>[!TIP]
> Chaque composant dans la chaîne a la possibilité de traiter la requête ou de la passer au composant suivant.

### Exemple d'utilisation de Middleware

#### Middleware dans un serveur HTTP
```js
// Middleware function 1
const middleware1 = (request: Request, response: Response, next: Function) => {
    console.log('Middleware 1: Processing request');
    next();
};

// Middleware function 2
const middleware2 = (request: Request, response: Response, next: Function) => {
    console.log('Middleware 2: Processing request');
    next();
};

// Actual route handler
const handleRequest = (request: Request, response: Response) => {
    console.log('Handling request');
    response.send('Hello, World!');
};

// Using middleware in an Express.js app
app.use(middleware1);
app.use(middleware2);
app.get('/api/hello', handleRequest);
```

## EventListener en TypeScript

### Qu'est-ce qu'un EventListener ?

Un EventListener est un design pattern qui permet à un objet (l'observable) de notifier à d'autres objets (les observers) les changements d'état ou d'événements.

### Exemple d'utilisation d'EventListener

#### Gestion des événements dans le DOM

```js
class Button {
    private clickListeners: Function[] = [];

    public addClickListener(listener: Function): void {
        this.clickListeners.push(listener);
    }

    public click(): void {
        console.log('Button clicked');
        this.notifyClickListeners();
    }

    private notifyClickListeners(): void {
        for (const listener of this.clickListeners) {
            listener();
        }
    }
}

const button = new Button();

const handleClick = () => {
    console.log('Button click handled');
};

button.addClickListener(handleClick);

// Simulating a button click
button.click();
```
