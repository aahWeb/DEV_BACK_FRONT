const romaMapping =  {
    "I": 1,
    "V": 5,
    "X": 10,
    "L": 50,
    "C": 100,
    "D": 500,
    "M": 1000
}

function convertToRoman(num) {
    if (num <= 3) return "I".repeat(num);
    
    for (let [roman, value] of Object.entries(romaMapping)) {
        if (value === num) return roman;
        if (num >= value + 1 && num <= value + 3) return roman + convertToRoman(num - value);
    }
}

module.exports = convertToRoman;