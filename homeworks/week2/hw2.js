/*eslint-disable*/
function capitalize(str) {
    arr = []
    arr = str.split("")
  //   console.log(arr)
    if(96 < arr[0].charCodeAt() && arr[0].charCodeAt() < 123){
          arr[0] = arr[0].toUpperCase()}
    arr = arr.join("");
    return arr
  };
  
  
  console.log(capitalize('hello'));
  