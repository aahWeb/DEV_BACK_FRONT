Voici le cours corrigé et amélioré :

# Introduction à MongoDB dans Symfony

## Configuration et installation des données 

Si vous utilisez un Mac, assurez-vous d'avoir MongoDB (serveur Mongo) installé. Nous allons créer une base de données appelée `yams` et une collection `Pastry`.

```bash
# Ajouter les références aux objets MongoDB dans l'environnement Brew
brew tap mongodb/brew

# Installer MongoDB sur votre machine
brew install mongodb-community@7.0

# Installer le pilote MongoDB pour PHP
sudo pecl install mongodb

# Importer des données dans MongoDB depuis un fichier JSON, nommez bien Pastry la collection
mongoimport --host=localhost --port=27017 --db=yams --collection=Pastry --file=pastries.json --jsonArray

# Si vous avez installez Docker dans le conteneur et le dossier data/db
mongoimport --host localhost --port 27017 --username root --password example --authenticationDatabase admin --db yams --collection Pastry --file pastries.json --jsonArray
```

1. Vérifiez que Symfony peut être installé correctement sur votre machine et installez Symfony.

```bash
symfony check:requirements

# Pour créer une application web Symfony
symfony new yams
```

```bash
# Vos commandes CLI pour Symfony
php bin/console about
```

1. Lancez le serveur Symfony.

```bash
symfony server:start
```

1. Sécurité

```bash
symfony check:security
```

1. Le profiler

> [!WARNING]
> N'utilisez jamais le profiler en production.

```bash
composer require --dev symfony/profiler-pack
```

## Configuration de la base de données pour MongoDB - ODM (Object Document Model)

:rocket: [Documentation](https://www.doctrine-project.org/projects/doctrine-mongodb-bundle/en/current/index.html)

1. Pour une base de données de type **relationnel**, vous auriez besoin du package suivant :

:rocket: Cependant, nous n'allons pas l'installer dans ce projet.

```bash
# Ne pas installer pour notre projet
composer require symfony/orm-pack
```

1. Installation du package pour MongoDB dans Symfony.

> [!NOTE] Les makers sont utiles pour tous les projets Symfony. Ils ne sont pas spécifiques à MongoDB et sont destinés uniquement au développement.

:construction: Répondez **yes** aux options. Cela créera un dossier **Document**, des fichiers doctrine_mongodb.yaml, et ajoutera les lignes suivantes dans le fichier .env. N'oubliez pas de changer le nom de la base de données si nécessaire (voir ci-dessous).

```bash
composer require doctrine/mongodb-odm-bundle
```

Configuration en local sans Docker

```txt
###> doctrine/mongodb-odm-bundle ###
MONGODB_URL=mongodb://localhost:27017
MONGODB_DB=yams
###< doctrine/mongodb-odm-bundle ###
```

### Configuration pour créer des requêtes personnalisées

- Créez le dossier **Repository** et dans ce dossier, créez la classe **PastryRepository**. 
  
- La classe Repository nous permettra, par la suite, de faire des requêtes personnalisées.

:file_cabinet: La classe PastryRepository (configuration de base)

```php
namespace App\Repository;

use App\Document\Pastry;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceDocumentRepository;

class PastryRepository extends ServiceDocumentRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pastry::class);
    }
}
```

## ODM (Object Document Model)

:rocket: L'ODM (Object-Document Mapping) est un concept qui permet de faire correspondre les objets d'une application aux documents d'une base de données NoSQL, comme MongoDB. Il agit comme une couche intermédiaire, convertissant les objets de l'application en documents compréhensibles par la base de données et vice versa. L'ODM simplifie les opérations CRUD, offre une abstraction de la base de données, prend en charge les schémas dynamiques et facilite le développement en fournissant des fonctionnalités orientées objet. En Symfony avec **Doctrine MongoDB ODM**, vous définissez des **entités** avec des **annotations** pour le **mappage**, simplifiant ainsi les interactions avec MongoDB.

1. Création d'un contrôleur PastryController pour afficher les données.

```bash
php bin/console make:controller PastryController
```

1. Création d'une entité Pastry ODM qui sera mappée par Doctrine, dans le dossier Document.

```php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class Pastry
{
    #[MongoDB\Id]
    protected string $_id;

    #[MongoDB\Field(type: 'string')]
    protected string $name;

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->_id;
    }
}
```

## Affichez les données de la collection Pastry dans la base de données 

Nous allons afficher maintenant les données de la collection.

:pill: N'oubliez pas de lancer le serveur Symfony et de visiter la page /pastry pour afficher les données de la collection. Notez que nous n'affichons ici que ce que nous avons mappé dans le modèle Pastry : _id et name.

```php
namespace App\Controller;

use App\Document\Pastry;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class PastryController extends AbstractController
{
    #[Route('/pastry', name: 'app_pastry')]
    public function index(DocumentManager $dm): JsonResponse
    {
        $pastries=  $dm->getRepository(Pastry::class)
        ->findAll();
        
        return new JsonResponse($jsonContent, 200, [], true);
    }
}
```