``` js
function isValid(arr) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] <= 0) return 'invalid'
  }
  for(var i=2; i<arr.length; i++) {
    if (arr[i] !== arr[i-1] + arr[i-2]) return 'invalid'
  }
  return 'valid'
}

isValid([3, 5, 8, 13, 22, 35])
```

## 執行流程
1. 進入第一個for迴圈，執行第一圈，i = 0
2. 進入if判斷式，arr[０] = ３，大於０，不執行
3. 進入第一個for迴圈，執行第2圈，i = 1
4. 進入if判斷式，arr[1] = 5，大於０，不執行
5. 進入第一個for迴圈，執行第3圈，i = 2
6. 進入if判斷式，arr[2] = 8，大於０，不執行
7. 進入第一個for迴圈，執行第4圈，i = 3
8. 進入if判斷式，arr[3] = 13，大於０，不執行
9. 進入第一個for迴圈，執行第5圈，i = 4
10. 進入if判斷式，arr[4] = 22，大於０，不執行
11. 進入第一個for迴圈，執行第6圈，i = 5
12. 進入if判斷式，arr[5] = 35，大於０，不執行
13.
14.
15.