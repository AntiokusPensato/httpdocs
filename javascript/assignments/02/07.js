(function() {
    //Variables for spacing plants
    var recommendedSpacing = 24;
    var actualSpacing = 25;

    //Comparison
    var isSpacingGood = actualSpacing >= recommendedSpacing;

    //Shows results
    var elSpacing = document.getElementById('spacing-check');

    //Displays result explanation
    if (isSpacingGood) {
        elSpacing.textContent = "Your tomato plants are good to go, spacing achieved!";
    } else {
        elSpacing.textContent = "Warning: You need to space your tomato plants more."
    }
})();