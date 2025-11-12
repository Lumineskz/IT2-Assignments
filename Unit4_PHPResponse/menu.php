<!-- menu.php -->
<?php
// Detect the current page
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Menu Page</title>
</head>
<body style="font-family: Arial; margin: 40px;">
    <h2>Dynamic Menu Page</h2>

    <!-- Navigation Links -->
    <nav>
        <a href="?page=home">Home</a> |
        <a href="?page=about">About</a> |
        <a href="?page=contact">Contact</a>
    </nav>
    <hr>

    <!-- Dynamic Page Content -->
    <div>
        <?php
        if ($page == 'home') {
            echo "<h3>Welcome to the Home Page</h3><p>This is the home section.</p>";
        } elseif ($page == 'about') {
            echo "<h3>About Us</h3><p>This is the about section.</p>";
        } elseif ($page == 'contact') {
            echo "<h3>Contact Us</h3><p>This is the contact section.</p>";
        } else {
            echo "<h3>Page not found!</h3>";
        }
        ?>
    </div>

    <hr>
    <h3>Feedback Form</h3>
    <form method="post" action="">
        Name: <input type="text" name="name" required><br><br>
        Rating (1–5): 
        <input type="number" name="rating" min="1" max="5" required><br><br>
        Comment:<br>
        <textarea name="comment" rows="4" cols="40" required></textarea><br><br>
        <input type="submit" value="Submit Feedback">
    </form>

    <?php
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];

        echo "<hr><h3>Submitted Feedback:</h3>";
        echo "Name: <strong>$name</strong><br>";
        echo "Rating: <strong>$rating</strong><br>";
        echo "Comment: <strong>$comment</strong><br><br>";

        echo "<h4>Client & Server Info</h4>";
        echo "Client IP: " . $_SERVER['REMOTE_ADDR'] . "<br>";
        echo "Browser & OS: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
        echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
    }
    ?>
</body>
</html>
