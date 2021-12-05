function longestPalindrome(s) {
    var arr = s.split("");
    var endArr = [];

    for (var i = 0; i < arr.length; i++) {
        var temp = "";
        temp = arr[i];
        for (var j = i + 1; j < arr.length; j++) {
            temp += arr[j];
            if (temp.length > 2 && temp === temp.split("").reverse().join("")) {
                endArr.push(temp);
            }
        }
    }

    var count = 0;
    var longestPalindrome = "";
    for (var i = 0; i < endArr.length; i++) {
        if (count >= endArr[i].length) {
            longestPalindrome = endArr[i - 1];
        } else {
            count = endArr[i].length;
        }
    }
    return longestPalindrome;
}

longestPalindrome("babad");
