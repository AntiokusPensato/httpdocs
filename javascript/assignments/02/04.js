(function() {
    function Tomos(color, price, tax) {
        this.color = color;
        this.price = price;
        this.tax = tax;
        this.calculateTotal = function() {
            return this.price + (this.price * this.tax);
        }
    }

    // The Objects
    let redTomos = new Tomos('Red', 1200, 0.05);
    let blueTomos = new Tomos('Blue', 1100, 0.05);

    // First Model
    document.getElementById('model1').textContent = redTomos.color;
    document.getElementById('price1').textContent = '$' + redTomos.price;
    document.getElementById('total1').textContent = '$' + redTomos.calculateTotal();

    // Second Model
    document.getElementById('model2').textContent = blueTomos.color;
    document.getElementById('price2').textContent = '$' + blueTomos.price;
    document.getElementById('total2').textContent = '$' + blueTomos.calculateTotal();

})();
