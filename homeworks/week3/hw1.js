const readline = require('readline');

const lines = [];

const rl = readline.createInterface({
  input: process.stdin,
});

// 上面都不用管，只需要完成這個 function 就好，可以透過 lines[i] 拿取內容
function solve(input) {
  for (let j = 1; j <= input; j += 1) {
    let tem = '';
    for (let i = 1; i <= j; i += 1) {
      tem += '*';
    }
    console.log(tem);
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
