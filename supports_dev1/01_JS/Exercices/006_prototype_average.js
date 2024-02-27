'use strict';

const precision = 100;

function Container() {
    this.user = [];
    this.hydrate = function (user) {
        if (this.user.includes(user)) throw new Error("user exist");

        this.user.push(user)
        user.average = this.average(user.notes);
    };

    this.average = function (notes) {
        const sum = notes.reduce((acc, val) => acc + val, 0);

        return Math.round((sum / notes.length) * precision) / precision;
    };

    this.get = function(){
        return this.user;
    }
}

// Définition des utilisateurs avec leurs données
const usersData = [
    { id: 1, name: "Alan Phi", age: 45, notes: [15, 17, 13] },
    { id: 2, name: "Bernad Lu", age: 78, notes: [11, 12, 9] },
    { id: 3, name: "Sophie Boo", age: 56, notes: [10, 15, 11] },
    { id: 4, name: "Alice Car", age: 45, notes: [5, 18, 20] }
];

// Création d'une instance de Container pour chaque utilisateur
const container = new Container();
usersData.map(u => container.hydrate(u));

const users = container.get();

for (const user of users) {
    console.log(user)
}
