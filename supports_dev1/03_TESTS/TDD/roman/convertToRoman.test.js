const convertToRoman = require("./convertToRoman");

describe('Feature:  return roman number', () => {

    const dataTest =  {
        "I": 1,
        "II": 2,
        "III": 3,
        "V": 5,
        "VI": 6,
        "VII": 7,
        "VIII": 8,
        "X": 10,
        "XI": 11,
        "XII": 12,
        "XIII": 13,
        "L": 50,
        "LI": 51,
        "LII": 52,
        "LIII": 53,
        "C": 100,
        "CI": 101,
        "CII": 102,
        "CIII": 103,
        "D": 500,
        "DI": 501,
        "DII": 502,
        "DIII": 503,
        "M": 1000,
        "MI": 1001,
        "MII": 1002,
        "MIII": 1003
    }

    for(let [roman, number] of Object.entries(dataTest)) {
        it(`it should return ${roman}`, () => {
            expect(convertToRoman(number)).toEqual(roman);
        })
    }
});