function reverse(str) {
    arr = []
    arr = str.split("")
    // console.log(arr);
    var Newarr = []
    for (var i=0; i < arr.length; i++){
        Newarr[i] = arr[arr.length - 1 - i];
        // console.log(Newarr);
    };
    Newarr = Newarr.join("");
    console.log(Newarr);
}

reverse('hello');
