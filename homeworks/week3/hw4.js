const readline = require('readline');

const lines = [];

const rl = readline.createInterface({
  input: process.stdin,
});

// 上面都不用管，只需要完成這個 function 就好，可以透過 lines[i] 拿取內容
function solve(input) {
  // console.log(input[0].length)
  let str = '';
  for (let i = input[0].length - 1; i >= 0; i -= 1) {
    //  console.log('Num',i ,input[0][i])
    str += input[0][i];
  }
  // console.log(str)
  if (input[0] === str) {
    console.log('True');
  } else {
    console.log('False');
  }
}

// 讀取到一行，先把這一行加進去 lines 陣列，最後再一起處理
rl.on('line', (line) => {
  lines.push(line);
});

// 輸入結束，開始針對 lines 做處理
rl.on('close', () => {
  solve(lines);
});
