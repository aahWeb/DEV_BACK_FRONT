function wait(number, delay) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            const result = number + 1;

            if (typeof result !== 'number') {
                reject(new Error("La valeur incrémentée n'est pas un nombre."));

                return;
            }
            resolve(result);

        }, delay);
    });
}

let number = 0;

wait(number, 1000)
    .then((result) => {
        console.log("Résolution 1 - Valeur de départ :", number, "Valeur d'arrivée :", result);
        number = result;
        return wait(number, 1000);
    })
    .then((result) => {
        console.log("Résolution 2 - Valeur de départ :", number, "Valeur d'arrivée :", result);
    })
    .catch((error) => {
        console.error("Une erreur s'est produite :", error);
    })
    .finally(() => {
        console.log("Exécution terminée. Valeur finale :", number);
    });


(function () {

    function wait(startValue, delay) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                const result = startValue + 1;

                if (typeof result !== 'number') {
                    reject(new Error("La valeur incrémentée n'est pas un nombre."));
                } else {
                    resolve(result);
                }
            }, delay);
        });
    }

    let startValue = 0;

    Promise.all([
        wait(startValue, 1000),
        wait(startValue, 2000)
    ])
        .then((results) => {
            const [result1, result2] = results;
            console.log("Résolution 1 - Valeur de départ :", startValue, "Valeur d'arrivée :", result1);
            console.log("Résolution 2 - Valeur de départ :", result1, "Valeur d'arrivée :", result2);
        })
        .catch((error) => {
            console.error("Une erreur s'est produite :", error.message);
        })
        .finally(() => {
            console.log("Exécution terminée. Valeur finale :", startValue);
        });
})()