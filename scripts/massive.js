var mainArray2 = document.getElementById("mainArray2");
var summaryPaired = document.getElementById("summaryPaired");
var negativeMultiply = document.getElementById("negativeMultiply");
var maxNumber = document.getElementById("maxNumber");
var minNumber = document.getElementById("minNumber");
var sortedArray2 = document.getElementById("sortedArray");

function main(){
    const size = parseInt(document.getElementById("size2").value);
    let arr = new Array(size);
    for (let i = 0; i < size; i++){
        arr[i] = getRndInteger(-50, 50);
    }
    mainArray2.innerHTML = "Вихідний масив: " + arr.join(", ");
    summaryPaired.innerHTML = "Сума елементів з парними індексами: " + summary(arr);
    negativeMultiply.innerHTML = "Добуток від'ємних чисел: " + multiply(arr);
    maxNumber.innerHTML = max(arr);
    minNumber.innerHTML = min(arr);
    sortedArray2.innerHTML = "Відсортований масив: " + arr.sort().join(", ");
}

function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min) ) + min;
}

function summary(arr){
    let sum = 0;
    for (let i = 0; i < arr.length; i+=2){
        sum+=arr[i];
    }
    return sum;
}

function multiply(arr){
    let mult = 1;
    for (let i = 0; i < arr.length; i++){
        if (arr[i] < 0){
            mult *= arr[i];
        }
    }
    return mult;
}

function max(arr){
    let elem = null;
    let index = null;
    for (let i = 0; i < arr.length; i++){
        if (arr[i] > elem){
            elem = arr[i];
            index = i;
        }
    }
    return "Максимальний елемент: " +elem + " та його індекс: " + index;
}

function min(arr){
    let elem = null;
    let index = null;
    for (let i = 1; i < arr.length; i+=2){
        if (arr[i] < elem) {
            elem = arr[i];
            index = i;
        }
    }
    return "Мінімальний елемент серед елементів з непарними <br> індексами: " +elem +
        " та його індекс: " + index;
}