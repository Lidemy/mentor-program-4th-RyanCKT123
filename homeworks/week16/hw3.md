1. 進入global EC, 
global VO{
fn: func
a: undefined    
}
2. 執行第一行 ```var a = 1```
global VO{
fn: func
a: 1    
}
3. 跳過宣告, 執行```fn()```, 進入fn EC,
fn VO{
fn2: func
a: undefined    
}
4. 執行```console.log(a)```, **印出undefined**
fn VO{
fn2: func
a: undefined    
}
5. 執行```var a = 5```
fn VO{
fn2: func
a: 5    
}
6. 執行```console.log(a)```, **印出5**
fn VO{
fn2: func
a: 5    
}
7. 執行```a++```
fn VO{
fn2: func
a: 6    
}
8. 執行```var a```, 已宣告過, 無影響
fn VO{
fn2: func
a: 6    
}
9. 執行```fn2()```, 進入fn2 EC,
fn2 VO{
    } //no content
10. 執行```console.log(a)```, fn2 VO沒有, 往上一層fn VO找, **印出6**
11. 執行```a = 20```, fn2 VO沒有, 往上一層fn VO找
fn VO{
fn2: func
a: 20    
}
12. 執行```b = 100```, fn2 VO沒有, 往上一層fn VO找也沒有, 全域變數宣告
global VO{
fn: func
a: 1 
b : 100 
}
13. fn2 EC結束, 回fn EC, 執行```console.log(a)```, **印出20**
fn VO{
fn2: func
a: 20    
}
14. fn EC結束, 回global EC, 執行```console.log(a)```, **印出1**
global VO{
fn: func
a: 1 
b : 100 
}
15. 執行```a = 10```+
global VO{
fn: func,
a: 10, 
b: 100 
}
16. 執行```console.log(a)```, **印出10**
16. 執行```console.log(b)```, **印出100**