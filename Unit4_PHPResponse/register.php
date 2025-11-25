<?php
// Initialize variables to store form data and errors
$fullName = $username = $email = $age = "";
$errors = array();

// Function to sanitize user input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- 1. Sanitize and Validate Full Name ---
    $fullName = sanitize_input($_POST['fullName']);
    if (empty($fullName)) {
        $errors['fullName'] = "Full Name is required.";
    } elseif (strlen($fullName) < 3) {
        $errors['fullName'] = "Full Name must be at least 3 characters.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $fullName)) {
        $errors['fullName'] = "Only letters and spaces allowed in Full Name.";
    }

    // --- 2. Sanitize and Validate Username ---
    $username = sanitize_input($_POST['username']);
    $usernamePattern = '/^[a-zA-Z0-9_]{5,15}$/';
    if (empty($username)) {
        $errors['username'] = "Username is required.";
    } elseif (!preg_match($usernamePattern, $username)) {
        $errors['username'] = "Username must be 5-15 characters and contain only alphanumeric characters or underscore.";
    }

    // --- 3. Sanitize and Validate Email ---
    $email = sanitize_input($_POST['email']);
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    } elseif (strpos($email, ' ') !== false) {
        $errors['email'] = "Email must not contain spaces.";
    }
    
    // --- 4. Validate Password ---
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (!preg_match($passwordPattern, $password)) {
        $errors['password'] = "Password must be min 8 characters and contain at least one uppercase, one lowercase, and one number.";
    }
    
    // --- 5. Validate Confirm Password ---
    if (empty($confirmPassword)) {
        $errors['confirmPassword'] = "Confirm Password is required.";
    } elseif ($password !== $confirmPassword) {
        $errors['confirmPassword'] = "Passwords do not match.";
    }

    // --- 6. Sanitize and Validate Age ---
    $age = sanitize_input($_POST['age']);
    if (empty($age)) {
        $errors['age'] = "Age is required.";
    } elseif (!is_numeric($age)) {
        $errors['age'] = "Age must be a number.";
    } elseif ($age < 18 || $age > 100) {
        $errors['age'] = "Age must be between 18 and 100.";
    }
    
    // --- 7. If no errors, process the registration ---
    if (empty($errors)) {
        // IMPORTANT: In a real-world scenario, you MUST hash the password before storing it.
        // Example: $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // This is where database insertion logic would go using prepared statements.
        
        // For demonstration purposes:
        echo "Registration Successful!";
        
        // Clear variables after success
        $fullName = $username = $email = $age = ""; 
        
    } else {
        echo "Validation Errors Found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <style>
        .error { color: red; font-size: 0.9em; margin-top: 5px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; }
    </style>
</head>
<body>

    <h1>User Registration</h1>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" id="fullName" name="fullName" value="<?php echo htmlspecialchars($fullName); ?>" required>
            <?php if (isset($errors['fullName'])) echo '<div class="error">' . $errors['fullName'] . '</div>'; ?>
        </div>
        
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
            <?php if (isset($errors['username'])) echo '<div class="error">' . $errors['username'] . '</div>'; ?>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            <?php if (isset($errors['email'])) echo '<div class="error">' . $errors['email'] . '</div>'; ?>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <small>Min 8 characters, must contain at least one uppercase, one lowercase, and one number.</small>
            <?php if (isset($errors['password'])) echo '<div class="error">' . $errors['password'] . '</div>'; ?>
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
            <?php if (isset($errors['confirmPassword'])) echo '<div class="error">' . $errors['confirmPassword'] . '</div>'; ?>
        </div>
        
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" min="18" max="100" required>
            <?php if (isset($errors['age'])) echo '<div class="error">' . $errors['age'] . '</div>'; ?>
        </div>
        
        <div class="form-group">
            <input type="submit" value="Register">
        </div>
        
    </form>

</body>
</html>