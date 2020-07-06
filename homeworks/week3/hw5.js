const readline = require('readline');

const lines = [];

const rl = readline.createInterface({
  input: process.stdin,
});

// 上面都不用管，只需要完成這個 function 就好，可以透過 lines[i] 拿取內容
/* eslint-disable  no-undef */
// function solve(input) {
//   for (let i = 1; i <= parseInt(lines[0], 10); i += 1) {
//     const Newline = input[i].split(' ');
//     if (BigInt(Newline[2]) === 1 && BigInt(Newline[0]) > BigInt(Newline[1])) {
//       console.log('A');
//     } else if (BigInt(Newline[2]) === 1 && BigInt(Newline[0]) < BigInt(Newline[1])) {
//       console.log('B');
//     } else if (BigInt(Newline[2]) === -1 && BigInt(Newline[0]) > BigInt(Newline[1])) {
//       console.log('B');
//     } else if (BigInt(Newline[2]) === -1 && BigInt(Newline[0]) < BigInt(Newline[1])) {
//       console.log('A');
//     } else { console.log('Draw'); }
//   }
// }

/* eslint-disable  eqeqeq */
function solve(input) {
  const m = Number(input[0]);
  for (let i = 1; i <= m; i += 1) {
    const [a, b, p] = input[i].split(' ');
    if (BigInt(a) === BigInt(b)) {
      console.log('DRAW');
    } else if ((BigInt(a) > BigInt(b) && p == 1) || (BigInt(a) < BigInt(b) && p == -1)) {
      console.log('A');
    } else {
      console.log('B');
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
