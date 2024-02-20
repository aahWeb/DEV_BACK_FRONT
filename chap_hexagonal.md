# Cours sur l'Architecture Hexagonale avec Node.js

## Introduction générale

L'architecture hexagonale, également connue sous le nom d'architecture en ports et adaptateurs, est un concept qui vise à séparer le cœur métier d'une application des détails techniques. 

Dans ce cours, nous explorerons l'application de l'architecture hexagonale à un projet Node.js d'API de pâtisseries avec opérations CRUD.

Il y a également un jeu basé sur YAMS pour gagner des pâtisseries que nous expliciterons dans un TP.

## Structure des fichiers du Projet 

Nous allons durant ce cours implémenter cette architecture, après le cours sur Node et Express.

```txt
- README.md
- package.json
- pnpm-lock.yaml
- src
  - app.ts
  - config
    - env.ts
  - domain
    - entities
      - Pastrie.ts
      - User.ts
    - services
      - authService.ts
      - gameService.ts
      - pastriesService.ts
  - infrastructure
    - data
      - pastries.json
      - users.json
    - repositories
      - pastrieRepository.ts
      - userRepository.ts
    - web
      - controllers
        - AuthController.ts
        - GameController.ts
        - PastrieController.ts
        - UserController.ts
      - routes
        - auth.ts
        - game.ts
        - index.ts
        - pastrie.ts
        - user.ts
  - middlewares
    - authentified.ts
  - types
    - customRequest.ts
    - envConfig.ts
  - utils
    - helpers.ts
- tsconfig.json
```

## Explication de la Structure

### Domain (Cœur Métier)
- **Entities (Entités) :** `Pastrie.ts` et `User.ts`.
- **Services (Services Métier) :** `authService.ts`, `gameService.ts`, et `pastriesService.ts`.

### Infrastructure (Adaptateurs Externes)
- **Data (Stockage de Données) :** `pastries.json` et `users.json`.
- **Repositories (Référentiels) :** `pastrieRepository.ts` et `userRepository.ts`.
- **Web (Interfaces Utilisateur ou API) :**
  - **Controllers (Contrôleurs) :** `AuthController.ts`, `GameController.ts`, `PastrieController.ts`, et `UserController.ts`.
  - **Routes (Routes) :** `auth.ts`, `game.ts`, `pastrie.ts`, et `user.ts`.

### Application (Adaptateurs Internes)
- **App.ts :** Point d'entrée de l'application.

### Middlewares (Middleware)
- **authentified.ts :** Middleware pour l'authentification.

### Types (Types)
- **customRequest.ts :** Types spécifiques pour les requêtes.
- **envConfig.ts :** Configuration de l'environnement.

### Utils (Utilitaires)
- **helpers.ts :** Utilitaires génériques.

## Principes de l'Architecture Hexagonale
1. Séparation des préoccupations.
2. Le cœur métier ne dépend pas des détails techniques.
3. Les détails techniques (adapteurs) dépendent du cœur métier.
4. Flexibilité, testabilité, et extensibilité.

## Conclusion

L'architecture hexagonale offre une approche structurée pour concevoir des applications robustes et flexibles. En l'appliquant à votre projet d'API de pâtisseries, vous pouvez bénéficier d'une meilleure isolation entre le cœur métier et les détails techniques, facilitant ainsi la maintenance et l'évolution de votre application.
