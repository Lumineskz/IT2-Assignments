<?php
// Initialize variables
$errors = [];
$success = false;
$fullname = $username = $email = $age = "";
$passwordStrength = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $age = htmlspecialchars(trim($_POST['age']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation
    if (empty($fullname) || strlen($fullname) < 3 || !preg_match("/^[a-zA-Z ]+$/", $fullname)) {
        $errors['fullname'] = "Full Name must be at least 3 characters and contain only letters and spaces.";
    }

    if (empty($username) || !preg_match('/^[a-zA-Z0-9_]{5,15}$/', $username)) {
        $errors['username'] = "Username must be 5-15 characters, alphanumeric or underscore only.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, ' ') !== false) {
        $errors['email'] = "Please enter a valid email address without spaces.";
    }

    if (empty($password) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
        $errors['password'] = "Password must be at least 8 characters and include upper, lower, and a number.";
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }

    if (empty($age) || !is_numeric($age) || $age < 18 || $age > 100) {
        $errors['age'] = "Age must be a number between 18 and 100.";
    }

    // Password Strength
    if (!empty($password)) {
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{12,}$/', $password)) {
            $passwordStrength = "Strong";
        } elseif (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{10,}$/', $password)) {
            $passwordStrength = "Medium";
        } else {
            $passwordStrength = "Weak";
        }
    }

    if (empty($errors)) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Registration Form</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .error { color: red; }
        .success { color: green; font-weight: bold; }
    </style>
</head>
<body>
<h2>Registration Form</h2>
<form method="POST">
    Full Name: <input type="text" name="fullname" value="<?= $fullname ?>"> <br>
    <span class="error"><?= $errors['fullname'] ?? '' ?></span><br><br>

    Username: <input type="text" name="username" value="<?= $username ?>"> <br>
    <span class="error"><?= $errors['username'] ?? '' ?></span><br><br>

    Email: <input type="email" name="email" value="<?= $email ?>"> <br>
    <span class="error"><?= $errors['email'] ?? '' ?></span><br><br>

    Password: <input type="password" name="password"> <br>
    <span class="error"><?= $errors['password'] ?? '' ?></span><br><br>

    Confirm Password: <input type="password" name="confirm_password"> <br>
    <span class="error"><?= $errors['confirm_password'] ?? '' ?></span><br><br>

    Age: <input type="number" name="age" value="<?= $age ?>"> <br>
    <span class="error"><?= $errors['age'] ?? '' ?></span><br><br>

    Password Strength: <strong><?= $passwordStrength ?></strong><br><br>

    <button type="submit">Register</button>
</form>

<?php if ($success): ?>
    <div class="success">
        <h3>Registration Successful!</h3>
        <p><strong>Full Name:</strong> <?= $fullname ?></p>
        <p><strong>Username:</strong> <?= $username ?></p>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>Age:</strong> <?= $age ?></p>
    </div>
<?php elseif (!empty($errors)): ?>
    <div class="error"><strong>Please fix the errors above and try again.</strong></div>
<?php endif; ?>
</body>
</html>
