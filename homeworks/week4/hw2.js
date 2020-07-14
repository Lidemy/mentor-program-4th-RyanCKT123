const request = require('request');
const process = require('process');


const Action = process.argv[2];
const Param = process.argv[3];
const Param1 = process.argv[4];


function list() {
  request('https://lidemy-book-store.herokuapp.com/books?_limit=20', (error, response, body) => {
    const RawDate = JSON.parse(body);
    for (let i = 0; i < RawDate.length; i += 1) {
      console.log(`${RawDate[i].id} ${RawDate[i].name}`);
    }
  });
}

function read(id) {
  request(`https://lidemy-book-store.herokuapp.com/books/${id}`, (error, response, body) => {
    const RawDate = JSON.parse(body);
    console.log(`${RawDate.id} ${RawDate.name}`);
  });
}

function deleteBook(id) {
  request.delete(
    `https://lidemy-book-store.herokuapp.com/books/${id}`,
    (error, response) => {
      console.log(response.statusCode);
    },
  );
}

function createBook(name) {
  request.post(
    {
      url:
        'https://lidemy-book-store.herokuapp.com/books',
      form: {
        name,
      },
    },
    (error, response) => {
      console.log(response.statusCode);
    },
  );
}

function newBook(id, name) {
  request.patch(
    {
      url: `https://lidemy-book-store.herokuapp.com/books/${id}`,
      form: {
        name,
      },
    },
    (error, response) => {
      console.log(response.statusCode);
    },
  );
}


switch (Action) {
  case 'list':
    list();
    break;
  case 'read':
    read(Param);
    break;
  case 'delete':
    deleteBook(Param);
    break;
  case 'create':
    createBook(Param);
    break;
  case 'update':
    newBook(Param, Param1);
    break;
  default:
    console.log(`Sorry, we are out of ${Action}.`);
}
