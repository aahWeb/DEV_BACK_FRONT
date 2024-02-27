function counter() {
    let count = 0;

    return function () {
        return ++count;
    };
}

// initialisation 
const c = counter();
c(); // Affiche 1
c(); // Affiche 2

console.log(c());
