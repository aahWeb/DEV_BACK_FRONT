function createCounter() {
    let count = 0;
  
    return {
      set: function(number = 1) {
        count += number;
      },
      get: function() {
        return count;
      }
    };
  }
  
  const counter = createCounter();
  counter.set(10);
  counter.set(15);
  console.log(counter.get()); //25
  