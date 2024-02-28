## Introduction

[Vite.js](https://vitejs.dev/) est un outil de développement rapide pour la création d'applications web modernes en JavaScript et TypeScript. 

Il est conçu pour être simple à utiliser, performant et évolutif. Vite se concentre sur la rapidité en offrant une expérience de développement proche de la production.

### Caractéristiques Principales

1. **Développement Rapide :** Vite offre un temps de rechargement ultra-rapide et un serveur de développement performant grâce à son utilisation de l'Esm (ECMAScript Modules) natif.

1. **React.js Préconfiguré :** Vite est souvent utilisé avec `React.js`, où il offre une configuration par défaut pour une expérience de développement rapide avec React.

1. **Importation Dynamique :** Vite prend en charge l'importation dynamique des modules, permettant le chargement à la demande pour une performance optimale.

1. **Construction Optimisée :** En production, Vite produit des bundles optimisés avec des dépendances minifiées, ce qui améliore les performances.

## Structure des fichier par défaut d'un projet vite

```txt
./my_vite_project
├── index.html
├── package.json
├── public
│   └── vite.svg
├── src
│   ├── counter.ts
│   ├── main.ts
│   ├── style.css
│   ├── typescript.svg
│   └── vite-env.d.ts
└── tsconfig.json
```

## Exemple de configuration du fichier tsconfig.json

```json
{
  "compilerOptions": {
    "target": "ES2020",
    "useDefineForClassFields": true,
    "module": "ESNext",
    "lib": ["ES2020", "DOM", "DOM.Iterable"],
    "skipLibCheck": true,

    /* Bundler mode */
    "moduleResolution": "bundler",
    "allowImportingTsExtensions": true,
    "resolveJsonModule": true,
    "isolatedModules": true,
    "noEmit": true,

    /* Linting */
    "strict": true,
    "noUnusedLocals": true,
    "noUnusedParameters": true,
    "noFallthroughCasesInSwitch": true
  },
  "include": ["src"]
}
```

<details>
<summary>Détails de l'exemple</summary>

<ins>compilerOptions :</ins>

- `target`: Spécifie la version **ECMAScript** cible pour laquelle **TypeScript** doit générer du code. Dans ce cas, le code cible est **ES2020**.
- `useDefineForClassFields`: Active l'émission de **defineProperty** pour les champs de classe, qui est une fonctionnalité **ECMAScript** récente.
- `module`: Indique le style de module à générer. **"ESNext"** est utilisé ici, ce qui signifie que **TypeScript** générera des modules **ECMAScript** conformes aux spécifications les plus récentes.
- `lib`: Spécifie les bibliothèques de déclarations de type incluses automatiquement. **"ES2020"**, **"DOM"**, et **"DOM.Iterable"** sont inclus ici.
- `skipLibCheck`: Désactive la vérification des fichiers de déclaration de type (fichiers `.d.ts`) pour améliorer les performances.

<ins>Bundler mode :</ins>

- `moduleResolution`: Détermine comment les modules sont résolus. "bundler" indique que le **bundler** (Vite dans ce cas) doit résoudre les modules.
- `allowImportingTsExtensions`: Autorise l'importation de fichiers **TypeScript** sans spécifier l'extension `.ts`.
resolveJsonModule: Active la résolution de module pour les fichiers JSON.
- `isolatedModules`: Assure que chaque fichier est traité comme une unité indépendante, améliorant l'efficacité de la compilation.
- `noEmit`: Empêche **TypeScript** de générer des fichiers de sortie (JavaScript). **Cela est utile lorsqu'on utilise un bundler externe comme Vite**.

<ins>Linting :</ins>

- `strict`: Active un ensemble strict d'options de compilation pour une meilleure qualité de code.
- `noUnusedLocals` et `noUnusedParameters`: Signale une erreur si des variables locales ou des paramètres de fonction sont déclarés mais non utilisés.
- `noFallthroughCasesInSwitch`: Signale une erreur si un cas switch tombe à travers sans utiliser un break, un return ou une autre instruction de fin.

<ins>include :<ins>

- `include`: Spécifie les fichiers ou les répertoires inclus dans la compilation. Ici, seul le répertoire **"src"** est inclus.
</details>

Pour en savoir plus sur le fichier de configuration **tsconfig.json**, vous pouvez vous rendre sur le lien suivant qui détail les différentes options que vous pourrais appliquer :  
https://www.typescriptlang.org/docs/handbook/compiler-options.html

# Création d'un projet vite avec typescript

Vous pouvez initialiser un projet vite avec une configuration par défaut de typescript en exécutant la commande suivant :

```bash
npm create vite@latest nom_projet
```

Vous aurez plusieurs questions. La CLI vous proposera l'installation de typescript à la deuxième questions.

# Installation de typescript sur un projet Vite existant

Au sein de votre projet entré la commande `npm install typescript --save-dev`: vous verez apparaitre **typescript** dans vos dépendences de développement.

Pour générer le fichier de configuration de typescript, tapé `npx tsc --init`.

Pensez à renomer les extentions de vos fichier en `.ts` ou `.tsx` et à mettre à jour votre script `"build":""` dans votre fichier **package.json** :

```json
{
  "scripts": {
    "dev": "vite",
    "build": "tsc && vite build",
    "preview": "vite preview"
  },
}
```