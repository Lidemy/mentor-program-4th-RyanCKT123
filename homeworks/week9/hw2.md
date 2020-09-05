## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼

###VARCHAR
可設定該欄位的字元長度(最大範圍是65535 characters)，可以有預設值用來，搭配限制長度來存取資料，預期資料有特定的長度時就可使用。

###TEXT
text 則不可設定最大長度，固定為65535 characters

## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又是怎麼把 Cookie 帶去 Server 的？
Cookie 是瀏覽器用來儲存使用者資訊的容器，Client 端透過瀏覽器發送Request 給Server，Server 端回傳Response 時，，透過Set-Cookie這個response header來讓瀏覽器儲存相對應的cookie。當瀏覽器再次發送request的同時，也會將相對應的cookie放在Cookie這個request header裡面，server就可以依據cookie的資訊來判斷達成識別、紀錄、追蹤使用者的狀態。


## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
- 沒有密碼強度辨識，使用者容易設定太簡單的密碼。
- 沒有判斷帳號是否被重覆註冊的機制。
- 資料庫的密碼以明碼儲存，安全性不足。
- 可以在browser上任意更改Cookie資料。



