(function() {
    var troutLengths = [12, 9, 14, 8, 4, 15];

    var arrayLength = troutLengths.length;
    var catchNumber = 0;
    var msg = '';

    //Loop
    for (var i = 0; i < arrayLength; i++) {
        catchNumber = (i + 1);

        msg += 'Trout #' + catchNumber + ': ';

        msg += troutLengths[i] + ' inches<br />';
    }

    document.getElementById('answer').innerHTML = msg;
})();