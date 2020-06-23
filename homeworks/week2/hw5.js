function join(arr, concatStr) {
  
}

var Newstr=''
function repeat(str, times) {
    for(var i = 0; i < times; i++){
        Newstr += str;
        // console.log(Newstr);
    };
    return Newstr;
}

console.log(join(['a'], '!'));
console.log(repeat('abb', 5));
