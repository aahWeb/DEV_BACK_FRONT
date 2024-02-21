

- composer require symfony/asset-mapper symfony/asset symfony/twig-pack
- php bin/console tailwind:build --watch
- composer require symfonycasts/tailwind-bundle
- php bin/console tailwind:init
- php bin/console tailwind:build --watch

# maker pour SF base de données
- composer require symfony/orm-pack
- composer require symfony/maker-bundle
- php bin/console doctrine:migrations:migrate
- composer require orm-fixtures --dev
- php bin/console doctrine:fixtures:load
- php bin/console doctrine:database:create
- composer require symfony/form
- composer require twig
- # Package de tests pour SF
- composer require --dev symfony/test-pack

- php bin/phpunit

Un utilisateur peut gagner plusieurs pâtisseries et une peut être gagner par un seul utilisateur.


# Features

1. Modélisation des données DONE
1. Entités & Migration DONE
1. Les pages intégration TODO 
1. Service lancé dé Yams avec les combinaisons gagnantes TODO  
1. Implémenter le service dans la page jeu avec la mise jour des données TODO 
1. Affichez les données sur la page résultat TODO 

## Partie facultative 

1. Connexion TODO
1. Intégration de nouvel utilisateur dans l'application vérifier que tout marche bien TODO