1. obj.inner.hello() 可視為obj.inner.hello.call(obj.inner), 此時this會是傳入的第一個參數, 即```obj.inner```, ```console.log(this.value)``` 會印出 2

2. obj2.hello() 可視為obj2.hello.call(obj2), 此時this會是傳入的第一個參數, 即```obj2```,又```obj2 = obj.inner```, 因此```console.log(this.value)``` 會印出 2

3. hello()可視為hello.call(), 未傳入任何參數, 執行後會是預設綁定，在非嚴格模式底下，瀏覽器預設是window（node.js預設是global)。