const message = "  aaasldkqldqaaaa  dkkdjfkdfjaaaa  ";

const charCount = message
  .split("") // Convertit la chaîne en tableau de caractères
  .reduce((acc, char) => {
    // Utilise la fonction reduce pour compter les occurrences de chaque lettre
    char = char.toLowerCase(); // Convertit en minuscule pour considérer la casse
    acc[char] = (acc[char] || 0) + 1; // Incrémente le compteur pour le caractère actuel
    return acc;
  }, {});

console.log(charCount);