const request = require('request');


const options = {
  url: 'https://api.twitch.tv/kraken/games/top',
  headers: {
    'Client-ID': 'rnlfn3zp206qq18fb8nrncvjqcq0uv',
    Accept: 'application/vnd.twitchtv.v5+json',
  },
};


function callback(error, response, body) {
  if (!error && response.statusCode === 200) {
    const info = JSON.parse(body);
    for (let i = 0; i < 10; i += 1) {
      console.log(info.top[i].viewers, info.top[i].game.name);
    }
  }
}

request(options, callback);
