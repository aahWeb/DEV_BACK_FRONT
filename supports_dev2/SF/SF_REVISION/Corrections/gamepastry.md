

- composer require symfony/asset-mapper symfony/asset symfony/twig-pack
- php bin/console tailwind:build --watch
- composer require symfonycasts/tailwind-bundle
- php bin/console tailwind:init
- php bin/console tailwind:build --watch
- composer require symfony/orm-pack
# maker pour SF
- composer require symfony/maker-bundle
- php bin/console doctrine:migrations:migrate
- composer require orm-fixtures --dev
- php bin/console doctrine:fixtures:load
- php bin/console doctrine:database:create
- # Package de tests pour SF
composer require --dev symfony/test-pack
composer require symfony/form

# Lancer les tests
- php bin/phpunit

Un utilisateur peut gagner plusieurs pâtisseries et une peut être gagner par un seul utilisateur.