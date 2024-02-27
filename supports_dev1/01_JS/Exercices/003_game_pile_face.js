
// on définit les chances pour le jeu de pile ou face, ici c'est 50% pile 50% face
const game = (chance = .5) => Math.random() - chance > 0 ? 1 : 0;

// les messages sont des constantes
const messages = [
    "Vous offrez une pâtisserie",
    "Vous gagnez la moitié d'une pâtisserie",
    "Vous gagnez une pâtisserie"
];

// La logique du jeu avec un délai 
const coin = (alea, timer = 500) => (
    new Promise((resolve, reject) => {
        setTimeout(() => alea() ? resolve("pile") : resolve("face"))
    }, timer)
);

// On lance 3 fois de suite le hjeu et on calcule les gains
Promise.all([coin(game), coin(game), coin(game)]).then(
    res => {
        const combinations = res.filter(p => p === 'pile');

        if (combinations.length === 3) return 1;
        if (combinations.length === 1) return 0.5;

        return -1

    }).then(
        gain => {

            switch (gain) {
                case 1:
                    console.log(messages[0]);
                    break;
                case 0.5:
                    console.log(messages[1]);
                    break;
                case -1:
                    console.log(messages[2]);
                    break;

                default:
                    console.error("Something strange happened.")
            }

            return gain ;
        }
    );