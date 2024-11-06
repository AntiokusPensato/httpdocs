(function() {
    var soilPH = 6.5;
    var msg = '';

    function goodForTomatoes() {
        msg += 'Your soil ph is optimal for tomatoes! ';
    }

    if (soilPH >= 6.0 && soilPH <= 7.0) {
        goodForTomatoes();
        msg += 'Get those tomatoes in the ground!';
    }

    var el = document.getElementById('answer');
    el.textContent = msg;
})();