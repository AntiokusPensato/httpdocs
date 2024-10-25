<?php
include("../../includes/header.php");
?>
<main>
    <h1>PHP 8 New Features</h1>

    <h2>PHP 8.2 - Readonly Classes</h2>
    <p>When PHP version 8.2 was released it added readonly classes. This is a feature for creating immutable objects. So when a class is declared readonly, all of its properties are automatically readonly, and no new propertires can be dynamically added when ran. This makes it so that once an object is created it's state cannot be modified. This would be useful for value objects or data transfer objects. </p>

    <p>Example Value Object:</p>
    <pre><code class="language-php">
        class Money
{
    public readonly float $amount;
    public readonly string $currency;

    public function __construct(float $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }
}

$money = new Money(100.00, 'USD');
// $money->amount = 200.00; // Error: Cannot modify readonly property
    </code></pre>

    <p>Example Data Transfer Object:a</p>
    <pre><code class="language-php">
    class Product
{
    public readonly string $name;
    public readonly float $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

$product = new Product('Laptop', 999.99);
// Trying to change a property would result in an error
// $product->name = 'Tablet'; // Error: Cannot modify readonly property

    </code></pre>

    <h2>PHP 8.3 - Typed Class Constants</h2>
    <p>In PHP 8.3 they introduced the ability to specify types for class constants which increased code readability and type safety to saying this is the type of data expected in a constant. Useful in large codebases and working with teams since it shows clearly the intended use of the constant.</p>

    <p>Example:</p>
    <pre><code class="language-php">
    class Product
{
    // Typed constants
    public const string NAME = "Laptop"; // Explicitly typed as string
    public const float TAX_RATE = 0.2; // Explicitly typed as float
    public const int STOCK = 100; // Explicitly typed as integer

    public function getPriceWithTax(float $price): float
    {
        // Using the typed constant TAX_RATE
        return $price * (1 + self::TAX_RATE);
    }

    public function getStockInfo(): string
    {
        // Using the typed constant NAME and STOCK
        return self::NAME . " has " . self::STOCK . " units in stock.";
    }
}

// Instantiate the class and use its methods
$product = new Product();

echo $product->getPriceWithTax(1000); // Outputs 1200
echo $product->getStockInfo(); // Outputs "Laptop has 100 units in stock."
    </code></pre>

    <h2>PHP 8.3 - Anonymous Classes in Static Expressions</h2>
    <p>PHP 8.3 introduced anonymous class in static expressions. Which created a way to define and instantiate classes in contexts where only static expressions were previously allowed. Doing this enhances code flexibility.</p>

    <p><code>DEFAULT_SHIPPER</code> constant holds an anonymous class with a method <code>calculateShippingCost()</code>, this is used to calculate the shipping cost based on the weight of a product.</p>
    <p>Example:</p>
    <pre><code class="language-php">
    class Shipping
{
    // Using an anonymous class in a static constant
    public const DEFAULT_SHIPPER = new class {
        public function calculateShippingCost(float $weight): float
        {
            return $weight * 5; // Shipping cost $5 per kg
        }
    };

    private float $weight;

    public function __construct(float $weight)
    {
        $this->weight = $weight;
    }

    public function getShippingCost(): float
    {
        // Use the anonymous class from the constant to calculate shipping
        return self::DEFAULT_SHIPPER->calculateShippingCost($this->weight);
    }
}

$shipping = new Shipping(10); // 10 kg
echo $shipping->getShippingCost(); // Outputs 50 (10 kg * $5 per kg)
    </code></pre>

    <h2>Summary</h2>
    <p>There are many more new features added in PHP 8, but these are a few from 8.2 and 8.3 that enhance PHP's capabilities and code flexibility. PHP is clearly a very flexible and adaptive tool for developers. </p>
</main>
<?php
include("../../includes/sidebar.php");
include("../../includes/footer.php");
?>