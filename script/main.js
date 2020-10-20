
function print(){
    var arr = [1, 2, 3];
    document.write(arr+"<br>");
    document.write(...arr);
    document.write("<br>");
    for (var i of arr)
        document.write(i + " ");
}

