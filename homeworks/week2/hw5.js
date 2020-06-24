 function join(arr, concatStr) {
    var Joinstr = ""
    for(var i = 0; i < arr.length; i++){
        Joinstr += arr[i];
        if(i < arr.length - 1 ){
            Joinstr = Joinstr + concatStr
        }
    };
    return Joinstr;    
 }

var Newstr=''
function repeat(str, times) {
    for(var i = 0; i < times; i++){
        Newstr += str;
        // console.log(Newstr);
    };
    return Newstr;
}

console.log(join(["a"], '!'));
console.log(repeat('abb', 5));
