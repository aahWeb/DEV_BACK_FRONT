# TP  Router Express 

1. **Installer les dépendances nécessaires** :

```bash
npm install express body-parser
npm install --save-dev jest supertest
```

2. **Créer la structure du projet** :

```plaintext
project-root
|-- src
|   |-- controllers
|   |   |-- userController.js
|   |-- services
|   |   |-- userService.js
|   |-- routers
|   |   |-- userRouter.js
|   |-- app.js
|-- tests
|   |-- user.test.js
|-- package.json
|-- jest.config.js
```

3. **Mettre en place Express dans `app.js`** :

```javascript
// src/app.js
const express = require('express');
const bodyParser = require('body-parser');
const userRouter = require('./routers/userRouter');

const app = express();

app.use(bodyParser.json());
app.use('/users', userRouter);

module.exports = app;
```

4. **Créer le service `userService.js`** :

```javascript
// src/services/userService.js
class UserService {
    constructor() {
        this.users = [];
    }

    getAllUsers() {
        return this.users;
    }

    addUser(user) {
        this.users.push(user);
    }
}

module.exports = UserService;
```

5. **Créer le controller `userController.js`** :

```javascript
// src/controllers/userController.js
const UserService = require('../services/userService');

const userService = new UserService();

const getAllUsers = (req, res) => {
    const users = userService.getAllUsers();
    res.json(users);
};

const addUser = (req, res) => {
    const user = req.body;
    userService.addUser(user);
    res.json(user);
};

module.exports = { getAllUsers, addUser };
```

6. **Créer le routeur `userRouter.js`** :

```javascript
// src/routers/userRouter.js
const express = require('express');
const { getAllUsers, addUser } = require('../controllers/userController');

const router = express.Router();

router.get('/', getAllUsers);
router.post('/', addUser);

module.exports = router;
```

7. **Créer un test unitaire avec Jest (`user.test.js`)** :

```javascript
// tests/user.test.js
const request = require('supertest');
const app = require('../src/app');

describe('User API', () => {
    it('should get all users', async () => {
        const response = await request(app).get('/users');
        expect(response.statusCode).toBe(200);
        expect(response.body).toEqual([]);
    });

    it('should add a new user', async () => {
        const user = { name: 'John Doe', age: 30 };

        const response = await request(app)
            .post('/users')
            .send(user);

        expect(response.statusCode).toBe(200);
        expect(response.body).toEqual(user);
    });
});
```

8. **Configurer Jest (`jest.config.js`)** :

```javascript
// jest.config.js
module.exports = {
    testEnvironment: 'node',
};
```

9. **Ajouter des scripts au fichier `package.json`** :

```json
"scripts": {
  "start": "node src/app.js",
  "test": "jest"
}
```

10. **Exécuter les tests** :

```bash
npm test
```

Ceci est un exemple simple de configuration d'un routeur avec Express, avec une structure modulaire utilisant un service et un contrôleur, ainsi qu'un exemple de test unitaire avec Jest et Supertest. Vous pouvez étendre cette structure pour des projets plus complexes en ajoutant des fonctionnalités, des middlewares, etc.