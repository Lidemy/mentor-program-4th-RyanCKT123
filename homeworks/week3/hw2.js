const readline = require('readline');

const lines = [];

const rl = readline.createInterface({
  input: process.stdin,
});

// 上面都不用管，只需要完成這個 function 就好，可以透過 lines[i] 拿取內容
function solve(input) {
  // console.log(input[0].split(' '))
  const Newline = input[0].split(' ');
  // console.log(Newline[0], Newline[1])
  for (let i = parseInt(Newline[0], 10); i <= parseInt(Newline[1], 10); i += 1) {
    //  console.log(i);
    const a = Math.floor(Math.log10(i) + 1);
    //  取出指數
    //  console.log(a)
    let str = [];
    str = i.toString().split('');
    // console.log(str);
    //  將數字先轉為文字，切割後再轉回數字
    let tem = 0;
    for (let j = 0; j < str.length; j += 1) {
      // console.log(j)
      tem += str[j] ** a;
      // console.log(Math.pow(str[j], a));
    }
    // console.log(tem)
    if (tem === i) {
      console.log(i);
    }
    //  下一個if函式判斷是否為水仙花數
    //  如果是，console.log出來
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
