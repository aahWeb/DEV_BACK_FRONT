function createCache() {
    const cache = {};
  
    return function(key, compute) {
      if (key in cache) {
        console.log(`Résultat pour la clé '${key}' récupéré depuis la cache.`);
        return cache[key];
      } else {
        const result = compute();
        cache[key] = result;
        console.log(`Résultat pour la clé '${key}' calculé et stocké dans la cache.`);
        return result;
      }
    };
  }
  
  const calculateSquare = createCache();
  console.log(calculateSquare(5, () => 5 * 5)); // Résultat: 25 (calculé)
  console.log(calculateSquare(5, () => 5 * 5)); // Résultat: 25 (récupéré depuis la cache)