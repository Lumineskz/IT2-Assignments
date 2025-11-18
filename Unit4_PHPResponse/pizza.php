<?php
$errors = [];
$size = "";
$crust = "";
$toppings = [];
$submitted = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $submitted = true;

    // Retrieve inputs
    $size = $_POST["size"] ?? "";
    $crust = $_POST["crust"] ?? "";
    $toppings = $_POST["toppings"] ?? [];

    // Validation
    if (empty($size)) {
        $errors['size'] = "Please select a pizza size.";
    }

    if (empty($toppings)) {
        $errors['toppings'] = "Please select at least one topping.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pizza Order</title>
    <style>
        .error { color: red; }
        body { font-family: Arial; margin: 20px; }
    </style>
</head>
<body>

<h2>Pizza Order Form</h2>

<form method="POST">

    <h3>Select Size:</h3>
    <label>
        <input type="radio" name="size" value="Small" <?= ($size == "Small") ? "checked" : "" ?>> Small
    </label><br>
    <label>
        <input type="radio" name="size" value="Medium" <?= ($size == "Medium") ? "checked" : "" ?>> Medium
    </label><br>
    <label>
        <input type="radio" name="size" value="Large" <?= ($size == "Large") ? "checked" : "" ?>> Large
    </label><br>
    <span class="error"><?= $errors['size'] ?? '' ?></span>

    <h3>Select Toppings:</h3>
    <label>
        <input type="checkbox" name="toppings[]" value="Cheese" 
            <?= in_array("Cheese", $toppings) ? "checked" : "" ?>> Cheese
    </label><br>
    <label>
        <input type="checkbox" name="toppings[]" value="Mushroom" 
            <?= in_array("Mushroom", $toppings) ? "checked" : "" ?>> Mushroom
    </label><br>
    <label>
        <input type="checkbox" name="toppings[]" value="Onion" 
            <?= in_array("Onion", $toppings) ? "checked" : "" ?>> Onion
    </label><br>
    <label>
        <input type="checkbox" name="toppings[]" value="Olive" 
            <?= in_array("Olive", $toppings) ? "checked" : "" ?>> Olive
    </label><br>
    <span class="error"><?= $errors['toppings'] ?? '' ?></span>

    <h3>Select Crust Type:</h3>
    <select name="crust">
        <option value="">-- Select Crust --</option>
        <option value="Thin" <?= ($crust == "Thin") ? "selected" : "" ?>>Thin</option>
        <option value="Regular" <?= ($crust == "Regular") ? "selected" : "" ?>>Regular</option>
        <option value="Thick" <?= ($crust == "Thick") ? "selected" : "" ?>>Thick</option>
    </select><br><br>

    <button type="submit">Order Pizza</button>
</form>

<?php if ($submitted && empty($errors)): ?>
    <h3>Your Order Summary</h3>
    <p><strong>Size:</strong> <?= $size ?></p>
    <p><strong>Crust:</strong> <?= $crust ?></p>
    <p><strong>Toppings:</strong> <?= implode(", ", $toppings) ?></p>
<?php endif; ?>

</body>
</html>
