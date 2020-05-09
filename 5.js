function createTriangle(a,b) {
    var totalNumberofRows = 8;
    var output = '';
    for (var i = 1; i <= totalNumberofRows; i++) {
        for (var j = a; j <= b; j++) {
            if (j <= (b-i)) {
                output += " "+" "
            } else {
                if (j%2 == 0) {
                    output += j +" "
                } else {
                    output += (j-1) + " "
                }
            }
        }
        console.log(output);
        output = '';
    }
}

createTriangle(2,10)