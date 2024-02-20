# QCM sur les Design Patterns en TypeScript

## 1. Introduction

### Qu'est-ce qu'un design pattern ?
- [ ] Une solution spécifique à un problème unique
- [x] Une approche générique pour résoudre des problèmes courants de conception logicielle
- [ ] Une technologie de développement web

### L'importance des design patterns en TypeScript
- [ ] Ils rendent le code plus complexe et difficile à comprendre.
- [ ] Ils n'ont pas d'impact sur la flexibilité, la scalabilité et la maintenabilité du code.
- [x] Ils permettent aux développeurs de créer des solutions plus flexibles, évolutives et maintenables.

## 2. Les Design Patterns Principaux

### Création

#### Singleton anti-pattern
- [ ] Il est largement recommandé dans les applications modernes.
- [ ] Il est modulable, testable et largement utilisé.
- [x] Il est considéré comme un anti-pattern.

#### Factory Method
- [ ] Il définit une interface pour la création d'objets sans laisser aux sous-classes le soin de modifier le type d'objet créé.
- [x] Il est un anti-pattern.
- [ ] Il permet aux sous-classes de modifier le type d'objet créé.

#### Abstract Factory
- [ ] Elle ne fournit pas d'interface pour créer des familles d'objets liés ou dépendants.
- [x] Elle permet de créer des familles d'objets liés ou dépendants sans spécifier leurs classes concrètes.
- [ ] Elle ne prend pas en charge la création d'objets.

### Structure

#### Adapter
- [x] L'Adapter permet à une interface existante d'être utilisée comme une autre interface.
- [ ] L'Adapter ne modifie pas l'interface existante.
- [ ] L'Adapter n'est pas utilisé pour la traduction d'une interface.

#### Decorator
- [ ] Le Decorator n'attache pas de nouvelles responsabilités à un objet.
- [ ] Le Decorator ne permet pas d'envelopper un objet dans une classe décoratrice.
- [x] Le Decorator attache de nouvelles responsabilités à un objet en les enveloppant dans une classe décoratrice.

### Exercice texte décorée

1. Quelle est la première étape à réaliser dans l'exercice de texte décorée?
   - [ ] Créer une instance de ConcreteText.
   - [ ] Créer une instance de UpperCaseDecorator.
   - [x] Créer une interface Text avec une méthode getText().

## 3. Comportement

### Observer

#### Observer
- [ ] Le pattern Observer ne définit pas de dépendance un-à-plusieurs entre objets.
- [ ] Il n'est pas nécessaire que tous les dépendants soient notifiés lorsqu'un objet change d'état.
- [x] Il définit une dépendance un-à-plusieurs entre objets, permettant aux dépendants d'être notifiés et mis à jour automatiquement lorsqu'un objet change d'état.

## 4. Middleware en TypeScript

### Qu'est-ce qu'un Middleware ?
- [ ] Un design pattern qui ne traite pas les requêtes dans une application sous forme de chaîne.
- [ ] Un design pattern qui ne permet pas à chaque composant dans la chaîne de traiter la requête ou de la passer au composant suivant.
- [x] Un design pattern qui permet de traiter des requêtes dans une application sous forme de chaîne.

### Exemple d'utilisation de Middleware

#### Middleware dans un serveur HTTP
- [x] Les middlewares ne peuvent pas être utilisés dans un serveur HTTP.
- [ ] Chaque composant dans la chaîne a la possibilité de traiter la requête ou de la passer au composant suivant.
- [ ] Les middlewares ne sont pas utilisés dans la gestion des requêtes HTTP.

## 5. EventListener en TypeScript

### Qu'est-ce qu'un EventListener ?
- [ ] Un design pattern qui ne permet pas à un objet (l'observable) de notifier à d'autres objets (les observers) les changements d'état ou d'événements.
- [x] Un design pattern qui permet à un objet (l'observable) de notifier à d'autres objets (les observers) les changements d'état ou d'événements.
- [ ] Un design pattern qui ne concerne pas la gestion des événements.

### Exemple d'utilisation d'EventListener

#### Gestion des événements dans le DOM
- [ ] La classe Button ne peut pas avoir de listeners pour les clics.
- [ ] La méthode `notifyClickListeners` de la classe Button ne notifie pas les listeners correctement.
- [x] La classe Button permet d'ajouter des listeners pour les clics et de les notifier correctement.
