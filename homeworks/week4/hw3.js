const request = require('request');
const process = require('process');

const ConName = process.argv[2];


function listCountry(Country) {
  request(`https://restcountries.eu/rest/v2/name/${Country}`, (error, response, body) => {
    if (error) {
      return console.log('抓取失敗', error);
    }
    if (response.statusCode === 404) {
      return console.log('找不到國家資訊');
    }
    const RawDate = JSON.parse(body);
    for (let i = 0; i < RawDate.length; i += 1) {
      console.log('============');
      console.log(`國家：${RawDate[i].name}
首都：${RawDate[i].capital}
貨幣：${RawDate[i].currencies[0].code}
國碼：${RawDate[i].callingCodes[0]}`);
    }
    return null;
  });
}

listCountry(ConName);
