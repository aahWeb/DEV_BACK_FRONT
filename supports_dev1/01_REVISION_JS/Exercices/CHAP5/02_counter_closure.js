function counter() {
    let count = 0;
  
    return function() {
      count++;
      return count;
    };
  }
  
  const incr = counter();
  console.log(incr()); // Résultat: 1
  console.log(incr()); // Résultat: 2