<?php
$inventory = [
    ["id" => 101, "name" => "Laptop", "price" => 75000, "stock" => 10],
    ["id" => 102, "name" => "Mouse", "price" => 500, "stock" => 50],
    ["id" => 103, "name" => "Keyboard", "price" => 1200, "stock" => 0],
    ["id" => 104, "name" => "Monitor", "price" => 25000, "stock" => 5]
];
$outOfStock = [];
$lowStock = [];
$totalValue = 0;
echo "ID | Name     | Price     | Stock <br>";
echo "---+--------+-------+------<br>";
foreach($inventory as $item){
    echo $item['id'] . "| " . $item['name'] . "  | " .$item["price"]."    | ".$item["stock"] ."<br>";

    if($item["stock"]==0){
        $outOfStock[] = $item;
    }elseif($item["stock"]>0 && $item["stock"]<10){
        $lowStock[] = $item;
    }
    $totalValue +=($item['price'] * $item['stock']);
}
echo "<br> OUT OF STOCK: <br>";
foreach($outOfStock as $product){
    echo "-". $product["name"] . "(ID:".$product["id"].")<br>";
}
echo "<br> LOW STOCK (Need reorder): <br>";
foreach($lowStock as $product){
    echo "-".$product["name"]." (Only ". $product["stock"]." remaining)<br>";
}

echo "<br>Total Inventory Value: ". $totalValue;
?> 