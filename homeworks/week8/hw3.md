## 什麼是 Ajax？
Ajax，全名為「Asynchronous JavaScript and XML」，重點為**非同步處理的技術**，javascript 是單一執行緒，程式會一行一行執行，稱為同步，又因不能確保server端何時完成資料回傳，因此這段期間，其餘JavaScript中的功能皆無法執行。因此透過Ajax，可避免等待過程等待造成程式阻塞。
常見的資料格式為：JSON、XML、HTML

## 用 Ajax 與我們用表單送出資料的差別在哪？
 - ```Form```: 透過 http 發送 request，同時附帶input value，當 server 接收並回傳 response 的時候，瀏覽器重新 render ，換頁。

 - ```Ajax```: 在拿取資料的時候，response透過Javascript 來處理並顯示於頁面，不需直接渲染更新整個頁面。達到不換頁的效果。提升使用者體驗。

## JSONP 是什麼？
**JSON with padding**
瀏覽器基於安全性的考量，定義了「同源政策」(CORS）這項規範。也就是非同源就無法拿到response。
JSONP則利用不受CORS影響的html標籤，如```<scropt>```或```<img>```。

應用：在Server端利用```<script>```裡面放API的資料（callback參數），client端就可將這個參數當作函式名稱，拿到回傳的資料。


## 要如何存取跨網域的 API？
符合CORS 規範，Server 必須**開啟允許跨來源請求**，做法是在response 的header 加上```Access-Control-Allow-Origin```，當瀏覽器收到response 後會檢查Access-Control-Allow-Origin，通過後即完成存取跨網域的 API。

## 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？
因為透過 node.js 這個 runtime 繞過了 CORS 同源政策的規範，可以直接存取跨網域 API。
但透過瀏覽器，就必須符合 CORS 。
