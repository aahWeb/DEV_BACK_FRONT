function multiplyBy(x) {
    return function(y) {
      return x * y;
    };
  }
  
  const multiplyByFive = multiplyBy(5);
  console.log(multiplyByFive(3)); // Résultat: 15
  console.log(multiplyByFive(7)); // Résultat: 35