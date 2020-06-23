function capitalize(str) {
  arr = []
  arr = str.split("")
//   console.log(arr)
  for (var i=0; i<arr.length; i++){
      if(96 < arr[i].charCodeAt() && arr[i].charCodeAt() < 123){
        arr[i] = arr[i].toUpperCase()
        break;
      };
  };
  arr = arr.join("");
  console.log(arr)
};


console.log(capitalize(',hello'));
