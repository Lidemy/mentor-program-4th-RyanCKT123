#### 部屬 AWS EC2 雲端主機 + LAMP Server + phpMyAdmin
基本上都是看著[這一篇](https://mtr04-note.coderbridge.io/2020/09/15/-%E7%B4%80%E9%8C%84-%08-%E9%83%A8%E5%B1%AC-aws-ec2-%E9%9B%B2%E7%AB%AF%E4%B8%BB%E6%A9%9F-/)完成的，過程中照著做沒什麼太大的問題，出了從本機cmd要連線到遠端server時，要下的指令有一點出入。
```
chmod 400 <私鑰檔案路徑>
ssh -i "<私鑰檔案路徑>" ubuntu@ec2-< IPv4 位置>.us-east-2.compute.amazonaws.com
```
在< IPv4 位置>這個部分一開始就會很直覺的把xxx.xxx.xxx給貼上，但我自己這樣子貼是失敗的，要把dot .換成-，即可順利連上。

最後紀錄一下一些名詞解釋：
[LAMP](https://www.itread01.com/fleyl.html) -是Linux  Apache  SQL/">MySQL  PHP的縮寫，即把Apache、MySQL以及PHP安裝在Linux系統上，組成一個環境來執行PHP的指令碼語言。Apache是最常用的Web服務軟體，而MySQL是比較小型的資料庫軟體。三個角色可以安裝在一臺機器上，也可以分開

[tasksel](http://skyroxas.tw/ubuntu-%E4%BD%BF%E7%94%A8-tasksel-%E5%BF%AB%E9%80%9F%E9%85%8D%E7%BD%AElamp%E7%92%B0%E5%A2%83/) 是一款可以讓我們快速安裝 dns server、lamp，等等應用的軟體包

[VPS vs shared web hosting](https://gordon168.net/shared-hosting-and-vps-and-delicated-hosting.html)

- **虛擬主機 Web hosting, Shared Hosting**
對實體硬體端來說，原理即為將一台實體伺服器的某項或者全部服務內容(像是容量、記憶體、CPU等)，依照切割的概念，來劃分為多個虛擬的Web Hosting單位來提供服務，來充分利用伺服器硬體資源。舉例，Web hosting就像是旅館的「大通舖」。價格必定低廉，但因為住的是同一個空間，必然會互相影饗，如果其中一個用戶的流量過大，就會影響到其他用戶的穩定性，而這中間不僅只是影響到頻寬，像是CPU、硬碟等等也會有資源佔用的問題。

- **VPS 虛擬專用伺服器(Virtual private server)**
是將一台實體伺服器分割成多個虛擬專享伺服器的服務。每個VPS都可分配獨立公網IP位址、獨立作業系統、記憶體、CPU資源，等等，也可以做獨立的排程來和其他系統做到實際上的隔離。舉例，VPS就像是旅館的「獨立套房」。有自己的衛浴設備、冷氣，價格必然比「大通舖」稍高，但彼此之間相互影響性低。

參考完上面兩種房型自然就會想到，「那我自己買一間房子可以嗎？」，當然可以。**專屬主機(Dedicated Server)**，但費用就相當高。
也有另一種選擇：主機代管。準備一台主機放到主機商的機房，用他們的或是你自己申請的網路線路，而機房的MIS人員會照顧這一台主機的硬體或是必要時幫你重開機，其他則由遠端連線進入主機管理。