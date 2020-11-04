## 什麼是 DNS？Google 有提供的公開的 DNS，對 Google 的好處以及對一般大眾的好處是什麼？
DNS(Domain Name System/Service)，能夠作領域名稱(Domain name)與位址(IP address)相互之間的轉換。因為在實際使用情形中，通常使用者會以網域名稱(Domain name)作為入口點，而不是以IP address，因此透過DNS可以進行Domain name＆IP address之間的轉換。

Google 提供 DNS 伺服器，對於一般大眾的好處是可以通過 Google 的 DNS 更快的取得需要的 IP 地址。而對於 Google 而言在他們的DNS 伺服器上就會有大家的流量數據，透過收集使用者數據，在這個大數據時代都是無價之寶，可以做很多商業運用。


## 什麼是資料庫的 lock？為什麼我們需要 lock？
因為多筆Transaction進行時，彼此會相互影響，因此為了concurrency與 isolation ，所有關聯該次Transaction的tables皆會被鎖定，這就是所謂的Lock，在Lock狀態下的tables無法再被其他Transaction進行讀寫，需等待至狀態解除。
舉例：常見購物網站，當商品剩餘資料剩下一個，但有多位User同時發出了購買的request這時候Lock就可以確保一次只有一個Transaction在進行，避免造成超賣的情形。

## NoSQL 跟 SQL 的差別在哪裡？
|  | SQL | NoSQL |
| :--- | :--- | :--- |
| Documents Type | data tables 來儲存相關連的資料 | 類似 JSON, 欄位與數值成對(JSON-like, field-value pair) 的 document 儲存資料 |
| Schema    | Schema      | Schemaless     |
| Normalization    | Normalization      | Denormalization     |
| JOIN    | Ｖ      | Ｘ     |
| Data Integrity    | foreign key 是一個 (或多個) 指向其它資料表中主鍵的欄位，它限制欄位值只能來自另一個資料表的主鍵欄位多數的 SQL databases 使用 foreign key constraints 來確保資料參考的完整性| NoSQL 中則沒有強制要求 data integrity，我們可以在不理會其他 document 下任意的儲存資料理想情況下是能將一筆資料的所有相關訊息都放在一個 document 中，不與其他 document 相關聯|
| Transactions    | Ｖ      | Ｘ     |
| Scaling    | Hard      | Easy     |
| Performance    | 慢      | 快 ， NoSQL 採用 denormalized 的儲存方式可以讓我們再一次請求間取回所有相關的資訊而不需要額外 JOIN 或是做複雜的 SQL queries |

## 資料庫的 ACID 是什麼？
關聯式資料庫採用的交易（Transaction）的設計來確保ACID的特型，讓資料存取或異動過程中不會受到干擾。
#### Atomicity: 確保有交易作為最小運作單位
交易若非全部完成(commit)，就是全部不完成(rollback)。
#### Consistency: 交易過程確保整體資料庫的一致性
在交易開始和完成之後，資料庫皆必須維持合法的狀態。然而當錯誤發生，所有已更改的資料或狀態將會恢復至交易之前。
#### Isolation: 執行多筆交易時能隔離交易中的資料不受其他交易影響
在交易執行期間，未完成的交易資料並不會被其他交易使用。只有當交易獲得認可之後才能看到變更。
#### Durability: 以及交易過程不會變動原始資料的持久性
當交易獲得認可之後，其變動是永久性的，資料不會因為系統重啟或錯誤而改變。列如，不可立刻移除剛加入的資料，同時被移除的資料也不會突然出現。
[[ref](https://www.ithome.com.tw/news/92506)]