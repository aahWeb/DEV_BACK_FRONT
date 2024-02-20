import axios from 'axios'

// Exemple d'utilisation d'Axios
axios.get('https://jsonplaceholder.typicode.com/users')
.then(response => {
    console.log('Données récupérées avec Axios:', response.data);
})
.catch(error => {
    console.error('Erreur de récupération des données avec Axios', error);
});

function fetchDataPromise(d, timer = 1000) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        resolve(d);
      }, timer);
    });
  }
  
  // Utilisation de async/await
  const fetchAsyncData = async (d) =>  {
    try {
      const data = await fetchDataPromise(d);
      console.log(data);
    } catch (error) {
      console.error('Erreur de récupération des données', error);
    }
  }
  
  fetchAsyncData("Data");
