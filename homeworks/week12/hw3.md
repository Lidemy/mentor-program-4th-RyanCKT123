## 請簡單解釋什麼是 Single Page Application
其相對應的概念是MPA（Mutiple Page Application），如同week11的留言板，登入頁負責登入、註冊頁負責註冊，在不同頁面之間是使用表格的方式交換資訊，在跳轉頁面時會有全白的等待時間，使用者體驗較不佳。

Single Page Application概念的產生即是基於**Ajax技術**的成熟，可以在同一個畫面做完所有的功能，以非同步的方式去傳送request，取得資料並在client端html中渲染畫面，因此不需在Server 端處理View的部分。

>Single Page Application:單頁式應用 - 一個頁面處理大小事



## SPA 的優缺點為何

#### 優點
- 有利於前後端分離，管理更優化
- 使用者體驗提升，不需要有reload中斷使用體驗

#### 缺點
- 伺服器抓取資料多時，運算負擔大，速度變慢。
- 不利SEO，空白的HTML內容空白
- 腳本禁用風險

## 這週這種後端負責提供只輸出資料的 API，前端一律都用 Ajax 串接的寫法，跟之前透過 PHP 直接輸出內容的留言板有什麼不同？
讓 php 跟 html 不會混在一起，這是這禮拜時最有感受度的地方。

PHP 直接輸出內容：

後端收到request 後，將html、css、javascript 在**Sever端處理**後傳回client-side，，並挑轉到指定頁面(網址變動)。

Ajax 串接寫法：

後端收到request 後，回傳資料回**前端透過JS** 將後端傳來的資料動態產生在畫面上，無重新載入頁面。