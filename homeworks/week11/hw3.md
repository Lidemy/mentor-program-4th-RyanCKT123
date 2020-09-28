## 請說明雜湊跟加密的差別在哪裡，為什麼密碼要雜湊過後才存入資料庫

#### 加密可逆 雜湊不可逆
兩者目的皆是**明碼**轉換**密碼**，加密是一對一，若知道(1.) 加密規則和(2.)輸出結果，即可回推，為**一對一**的關係；但雜湊(hash) 是**多對一**的關係，輸入經過雜湊處理後，有可能是一樣的結果(機率很低)，即使知道加密規則和密文，亦無法回推原本字串。

#### 為什麼密碼要雜湊過後才存入資料庫？？
如果使用者的密碼是以明文的形式記錄在資料庫裡，那當駭客駭進網站資料庫主機後，使用者的帳密資訊將被直接取得，甚至嘗試登入進使用者在其他網站的帳號。

## `include`、`require`、`include_once`、`require_once` 的差別
> 這四中語法之目的皆是將其他檔案引入並執行的函式

- ```include```: 試圖提取特定的檔案，並載入它的全部內容，即使該檔案沒有被找到，程式依舊會執行。

- ```require```: 必須提取特定的檔案，並載入它的全部內容，即使該檔案沒有被找到，程式就不會執行。

- ```有沒有once的差別```: 沒有once的話，每次使用引入指令時，都將請求的檔案匯入，即使此檔案已被匯入過，通過巢狀，檔案將被匯入多次，進而產生錯誤。

結論
> require_once啦 哪次不require_once

資料來源： [簡單談談PHP中的include、include_once、require以及require_once語句](https://codertw.com/%E7%A8%8B%E5%BC%8F%E8%AA%9E%E8%A8%80/213553/)

## 請說明 SQL Injection 的攻擊原理以及防範方法
>SQL Injection 是在輸入的字串中夾帶 SQL 的語法 意圖對資料庫下指令

未防禦時，通常以sprintf用字串拼接的方式與資料庫溝通，攻擊者可以將輸入的內容加上SQL語法的阻隔字符，藉由特殊字元，改變語法上的邏輯，進行資料庫操作，以達到目的。

防禦的方法(以php為例)：
- Prepared Statement(using bindParam())


##  請說明 XSS 的攻擊原理以及防範方法

##### ```跨網站指令碼攻擊(Cross-Site Scripting)```

> 利用可輸入欄位進行跨網站執行JavaScript 經常透過```<script>```標籤

##### 防範方法：字元跳脫

- 函式 ```htmlspecialchars()``` 可將 html 的特殊符號轉換成純文字。



## 請說明 CSRF 的攻擊原理以及防範方法

> 又稱作 one-click attack 在不同的 domain 底下偽造出「使用者本人發出的 request」

因為瀏覽器的機制，使用者只要發送 request 給某個網域，就會把關聯的 cookie 一起帶上去。如果使用者是登入狀態，那這個 request 就理所當然包含了他的資訊（例如說 session id），這 request 看起來就像是使用者本人發出的。像一些心理測驗的釣魚網站經常利用 HTML 元素```<form>```在未經使用者同意的情況下發送 POST request。

對使用者端來說，最簡單的就是隨時清空 SESSION。

對browser端來說，browser 本身的防禦，Google 在Chrome 51 版的時候正式加入了這個功能：SameSite cookie

對server端來說：
- 檢查 Referer: request 的 header 裡面會帶一個欄位叫做 referer，代表這個 request 是從哪個地方過來的，可以檢查這個欄位看是不是合法的 domain，不是的話直接 reject 掉即可。

- 加上圖形驗證碼、簡訊驗證碼等等

- 加上 CSRF token: 在 form 裡面加上一個 hidden 的欄位，叫做csrftoken，這裡面填的值由 server 隨機產生，並且存在 server 的 session 中。submit 之後，server 比對表單中的csrftoken與自己 session 裡面存的是不是一樣的，是的話就代表這的確是由使用者本人發出的 request。