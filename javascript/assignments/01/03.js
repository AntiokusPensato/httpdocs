// Fishing conditions
let isCloudy = true;
let hasFishingRod = true;
let temperature = 65;

// Check if conditions are good for fishing
if (isCloudy && hasFishingRod && temperature < 70) {
    alert("Perfect day for fishing! 🎣 Head to the river!");
} else { 
    alert("Sorry not today! 😭 Try again tomorrow.");
}
