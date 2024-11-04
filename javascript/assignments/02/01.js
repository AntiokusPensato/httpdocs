(function() {
    // Get  the HTML elements
    const elYards = document.getElementById('yards');
    const elMeters = document.getElementById('meters');

    // Convert yards to meters
    function yardsToMeters(yards) {
        return yards * 0.9144; // 1 yard = 0.9144 meters
    }

    const yards = parseFloat(elYards.textContent);
    const meters = yardsToMeters(yards);

    // Return with Meters to span
    elMeters.textContent = meters;

})();