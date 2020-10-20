var mainArray6 = document.getElementById("mainArray6")
var sumArray = document.getElementById("sum")
var maxArray = document.getElementById("max")
var minArray = document.getElementById("min")
var sortedArray6 = document.getElementById("sorted")

function main6() {
    var size = parseInt(document.getElementById("size6").value)
    let arrayMain = new Array(size)
    for (let i = 0; i < size; i++) {
        arrayMain[i] = Math.floor(Math.random() * 210)
    }
    var max = Math.max.apply(null, arrayMain)
    var min = Math.min.apply(null, arrayMain)
    var sum1 = sum(min, max, arrayMain)
    mainArray6.innerHTML = "Вхідний масив:  " + arrayMain.join(", ")
    maxArray.innerHTML = "Найбільший елемент " + max
    minArray.innerHTML = "Найменший елемент " + min
    sumArray.innerHTML = "Cума між найбільшим і найменшим елементами: " + sum1
    let arraySorted = quickSort(arrayMain, 0, size - 1)
    sortedArray6.innerHTML = "Відсортований масив:  " + arraySorted.join(", ")
}

function sum(min, max, array) {
    var min_i
    var max_i
    var sum = 0
    for (let i = 0; i < array.length; i++) {
        if (array[i] === min) {
            min_i = i
            break
        }
    }
    for (let i = 0; i < array.length; i++) {
        if (array[i] === max) {
            max_i = i
        }
    }
    for (let i = 0; i < array.length; i++) {
        if (min_i < max_i) {
            if (i > min_i && i < max_i) {
                sum += array[i]
            }
        } else {
            if (i > max_i && i < min_i) {
                sum += array[i]
            }
        }
    }
        return sum

}

    function quickSort(items, left, right) {
        var index;
        if (items.length > 1) {
            index = partition(items, left, right);
            if (left < index - 1) {
                quickSort(items, left, index - 1);
            }
            if (index < right) {
                quickSort(items, index, right);
            }
        }
        return items;
    }

    function partition(items, left, right) {
        var pivot = items[Math.floor((right + left) / 2)],
            i = left,
            j = right;
        while (i <= j) {
            while (items[i] < pivot) {
                i++;
            }
            while (items[j] > pivot) {
                j--;
            }
            if (i <= j) {
                swap(items, i, j);
                i++;
                j--;
            }
        }
        return i;
    }

    function swap(items, firstIndex, secondIndex) {
        const temp = items[firstIndex];
        items[firstIndex] = items[secondIndex];
        items[secondIndex] = temp;
    }
