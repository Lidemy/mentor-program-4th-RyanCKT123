## 請以自己的話解釋 API 是什麼
API是一種資料傳輸中的媒介或工具，透過它不管是資料傳遞方或是資料接收方都可以選擇或限制資料內容，資料傳遞方可以限制哪些資料是可以被傳輸的，而資料接收方可以選擇所需資料進行傳遞。


## 請找出三個課程沒教的 HTTP status code 並簡單介紹
```100 Continue``` - 目前為止的一切完好，用戶端應該繼續完成請求，或當請求已經完成的狀態下應忽略此訊息。

```403 Forbidden``` - 用戶端並無訪問權限，例如未被授權，所以伺服器拒絕給予應有的回應。

```451 Unavailable For Legal Reasons``` - 用戶端請求違法的資源，例如受政府審查的網頁。


## 假設你現在是個餐廳平台，需要提供 API 給別人串接並提供基本的 CRUD 功能，包括：回傳所有餐廳資料、回傳單一餐廳資料、刪除餐廳、新增餐廳、更改餐廳，你的 API 會長什麼樣子？請提供一份 API 文件。

Base URL: https://goodeat/cafe.com

| 說明     | Method | path       | 參數                   | 範例             |
|--------|--------|------------|----------------------|----------------|
| 獲取所有書籍 | GET    | /cafes     | _limit:限制回傳資料數量           | /cafes?_limit=5 |
| 獲取單一書籍 | GET    | /cafes/:id | 無                    | /cafes/10      |
| 新增書籍   | POST   | /cafes     | name: 店名 | 無              |
| 刪除書籍   | DELETE   | /cafes/:id     | 無 | 無              |
| 更改書籍資訊   | PATCH   | /cafes/:id     | name: 店名 | 無              |