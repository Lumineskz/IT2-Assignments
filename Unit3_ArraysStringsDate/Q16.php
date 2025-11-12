<?php
// Given prices
$prices = [
    "Amazon" => 5000,
    "Flipkart" => 4500,
    "eBay" => 4800,
    "Snapdeal" => 5200
];

echo "<h2>PRICE COMPARISON</h2>";

// Display each seller and price
foreach ($prices as $seller => $price) {
    echo "$seller: Rs. " . number_format($price) . "<br>";
}

// Calculate highest, lowest, and average
$highestPrice = max($prices);
$lowestPrice = min($prices);
$averagePrice = array_sum($prices) / count($prices);

// Find which seller has highest and lowest
$highestSeller = array_search($highestPrice, $prices);
$lowestSeller = array_search($lowestPrice, $prices);

// Calculate savings
$savings = $highestPrice - $lowestPrice;

echo "<br><b>Statistics:</b><br>";
echo "Highest Price: Rs. " . number_format($highestPrice) . " ($highestSeller)<br>";
echo "Lowest Price: Rs. " . number_format($lowestPrice) . " ($lowestSeller)<br>";
echo "Average Price: Rs. " . number_format($averagePrice) . "<br>";
echo "Savings: Rs. " . number_format($savings) . " (if you buy from $lowestSeller)<br>";

// Sort by price (ascending)
asort($prices);

echo "<br><b>Sorted by Price (Low to High):</b><br>";
foreach ($prices as $seller => $price) {
    echo "$seller: Rs. " . number_format($price) . "<br>";
}
?>
