# Installation MongoDB

```bash
# ref aux objets mongo dans l'env brew 
brew tap mongodb/brew

# installation de 
brew install mongodb-community@7.0

# response default installation du driver pour PHP sous Mac 
sudo pecl install mongodb 

# Import des données dans Mongo
mongoimport --host=localhost --port=27017 --db=yams --collection=pastries --file=pastries.json --jsonArray
```

