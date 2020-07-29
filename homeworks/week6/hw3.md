## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。

### ```<textarea>```
提供多行文本输入。輸入區域可以包含無限字數，通过cols和rows属性指定輸入之區域寬高，甚至更好; 亦可藉由CSS属性調整。不支持任何事件属性。

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Textarea示範</title>
</head>
<body>

<textarea rows="4" cols="50">
Textarea示範Textarea示範Textarea示範Textarea示範Textarea示範Textarea示範Textarea示範Textarea示範Textarea示範Textarea示範Textarea示範Textarea示範Textarea示範Textarea示範
</textarea>

</body>
</html>
```

### ```<video>```
利用此標籤可嵌入媒體播放器，用於支持文檔內的視頻播放。亦可將 ```<video>```  標籤用於音頻內容，但```<audio>```元素可能在用戶體驗上更合適。
常見屬性：
* ```autoplay``` : 指定後，視頻會馬上自動開始播放，不會停下來等著數據載入結束。
* ```autobuffer``` : 指定後，視頻會自動開始緩存，即使沒有設置自動播放。該屬性適用於視頻被認為可能會播放（比如，用戶導航到專門播放視頻的頁面，而不是那種嵌入視頻還有其它內容的頁面）。視頻會一直緩存到媒體緩存滿。
* ```buffered``` : 這個屬性可以讀取到哪段時間範圍內的媒體被緩存了。該屬性包含了一個```TimeRanges```對象。


### ```<select>```
搭配```<option>```可用來創建單選或多選菜單 [[LINK](https://www.w3cschool.cn/htmltags/tag-select.html)]
 ```html
 <select>
  <option value ="volvo">Volvo</option>
  <option value ="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select>
 ```


## 請問什麼是盒模型（box model）
在html中的每個元素都可被視作為一個盒子，可以透過CSS的操控進行排版。常見的四大元素有：
1. 內容區塊
2. Border
3. Paddong
4. Margin

假設今天想要一個 box 是 200*100，但又想要加個外框等等的，卻不想要這個 box 因此而變大，就可以使用另外一個屬性：```box-sizing```，

```content-box``` - 這個是預設屬性，就是我們一般作用得模式。
```border-box``` - 用這個屬性的話，就會把 padding 等地考慮進來，而自動做內縮調整。

## 請問 display: inline, block 跟 inline-block 的差別是什麼？


## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？