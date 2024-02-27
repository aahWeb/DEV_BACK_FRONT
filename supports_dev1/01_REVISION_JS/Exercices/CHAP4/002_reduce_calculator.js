const numbers = [
    {
        name : "byke",
        priceInfo : {
            priceHT : 120,
            code : "001"
        }
    },
    {
        name: "car",
        priceInfo: {
            priceHT: 20000,
            code: "002"
        }
    },
    {
        name: "phone",
        priceInfo: {
            priceHT: 800,
            code: "003"
        }
    },
    {
        name: "laptop",
        priceInfo: {
            priceHT: 1200,
            code: "004"
        }
    },
    {
        name: "watch",
        priceInfo: {
            priceHT: 150,
            code: "005"
        }
    },
    {
        name: "tablet",
        priceInfo: {
            priceHT: 500,
            code: "006"
        }
    },
    {
        name: "headphones",
        priceInfo: {
            priceHT: 80,
            code: "007"
        }
    },
    {
        name: "television",
        priceInfo: {
            priceHT: 1000,
            code: "008"
        }
    },
    {
        name: "speaker",
        priceInfo: {
            priceHT: 300,
            code: "009"
        }
    },
    {
        name: "camera",
        priceInfo: {
            priceHT: 700,
            code: "010"
        }
    }
];

const sum =  (tva = .2) =>  numbers.reduce((acc, current) => {
    current.priceInfo.priceTTC = current.priceInfo.priceHT*(1+tva)

    return current.priceInfo.priceHT + acc 
}, 0)

console.log(sum())

numbers.map(p => 
    {
        const name = p.name;
        const {  priceHT, priceTTC } = p.priceInfo;
        
        console.log(`Price HT :${priceHT}, priceTTC: ${priceTTC} Name : ${name} `)
    }
)
