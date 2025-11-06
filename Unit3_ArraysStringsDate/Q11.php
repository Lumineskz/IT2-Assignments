<?php
$items = [
    ["name" => "Laptop", "price" => 75000],
    ["name" => "Mouse", "price" => 500],
    ["name" => "Keyboard", "price" => 1200]
];
$subtotal = 0;
$vat = 0;
echo "SHOPPING BILL <br>";
echo "----------------------<br>";
foreach($items as $item){
    echo $item["name"].": ". number_format($item["price"], 2, '.', '') ."<br>";
    $subtotal += $item["price"];
}
$vat = (13/100)*$subtotal;
echo "-----------------------<br>";
echo "Subtotal: ".number_format($subtotal, 2, '.', '') ."<br>";
echo "VAT(13%): ".number_format($vat, 2, '.', '') ."<br>";
$total = $subtotal + $vat;
echo "------------------------<br>";
echo "TOTAL: ".number_format($total, 2, '.', '') ."<br>";
echo "==============<br>";
?>