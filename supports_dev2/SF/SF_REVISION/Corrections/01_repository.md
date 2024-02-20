# TP 

- Création des entités

Assurez vous dans le fichier .env que l'url pour se connecter à la base de données est bien créé :

`DATABASE_URL="mysql://root:antoine@127.0.0.1:3306/yams?charset=utf8mb4"`

- Structure des données

- `User` (username, email, score)
- `Question`(content, choices, created_at)
- `Answer`(content, created_at)
- `Pastry`(name, origin, calory, price)

relations

-  `OneToMany`  : un utilisateur (`User`) peut poser plusieurs questions (`Question`), mais chaque question est posée par un seul utilisateur.

-  `OneToMany` : un utilisateur peut également fournir plusieurs réponses (`Answer`), et chaque réponse est fournie par un seul utilisateur.
  
-  `ManyToMany` une question peut avoir plusieurs réponses, et chaque réponse peut être associée à plusieurs questions, ce qui représente une relation Many-to-Many entre `Question` et `Answer`.

:shell:

```bash
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle

# Création des entités
php bin/console make:entity User
php bin/console make:entity Question
php bin/console make:entity Answer
php bin/console make:entity Pastry

# création de la base de données
php bin/console doctrine:database:create

# migration
php bin/console make:migration

# création des tables
php bin/console doctrine:migrations:migrate
```

