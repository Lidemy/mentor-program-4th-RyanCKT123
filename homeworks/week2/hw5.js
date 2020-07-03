/*eslint-disable*/
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

function repeat(str, times) {
    var Newstr=''
    for(var i = 0; i < times; i++){
        Newstr += str;
        // console.log(Newstr);
    };
    return Newstr;
}

console.log(join(["a"], '!'));
console.log(repeat('abb', 5));
