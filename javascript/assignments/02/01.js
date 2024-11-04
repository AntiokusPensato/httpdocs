(function() {
    // Get HTML elements
    const elYards = document.getElementById('yards');
    const elMeters = document.getElementById('meters');

    // Named function to convert yards to meters
    function yardsToMeters(yards) {
        return yards * 0.9144; // 1 yard = 0.9144 meters
    }

    // Event listener for input changes
    elYards.addEventListener('input', function() {
        const yards = parseFloat(elYards.value) || 0;
        const meters = yardsToMeters(yards);
        elMeters.textContent = meters.toFixed(2);
    });
})();