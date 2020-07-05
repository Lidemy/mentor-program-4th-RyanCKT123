const readline = require('readline');

const lines = [];

const rl = readline.createInterface({
  input: process.stdin,
});

// 上面都不用管，只需要完成這個 function 就好，可以透過 lines[i] 拿取內容
function solve(input) {
  // console.log(input)
  for (let i = 1; i <= parseInt(input[0], 10); i += 1) {
    let num = 0;
    // console.log('Nownum:', input[i])
    for (let j = 1; j <= input[i]; j += 1) {
      if (input[i] % j === 0) {
        num += 1;
      }
    }
    // console.log(num)
    if (num === 1) {
      console.log('Composite');
    } else if (num > 2) {
      console.log('Composite');
    } else {
      console.log('Prime');
    }
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
