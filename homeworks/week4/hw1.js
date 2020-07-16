const request = require('request');
// const process = require('process');


function Pick(data) {
  for (let i = 0; i < 10; i += 1) {
    console.log(data[i].id, data[i].name);
  }
}


request('https://lidemy-book-store.herokuapp.com/books', (error, response, body) => {
  const RawDate = JSON.parse(body);
  Pick(RawDate);
});
