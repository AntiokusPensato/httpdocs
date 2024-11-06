(function() {
    var basePrice = 5;    
    var quality = 'premium';    
    var i = 1;                  
    var msg = '';              

    if (quality === 'premium') {
        // Premium leather pricing
        while (i < 8) {
            msg += i + ' sq ft of premium leather: $' + (basePrice * i) + ' + $' + (3 * i) + ' = $' + ((basePrice + 3) * i) + '<br />';
            i++;
        }
    } else {
        // Standard leather pricing
        while (i < 8) {
            msg += i + ' sq ft of standard leather: $' + basePrice + ' + $0 = $' + basePrice + '<br />';
            i++;
        }
    }

    // Write the message into the page
    var el = document.getElementById('pricing');
    el.innerHTML = msg;
})();