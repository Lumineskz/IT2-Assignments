<!-- student_registration.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body style="font-family: Arial; margin: 40px;">
    <h2>Student Registration Form</h2>

    <form method="post" action="">
        Full Name: <input type="text" name="fullname" required><br><br>

        Gender:
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female"> Female
        <input type="radio" name="gender" value="Other"> Other
        <br><br>

        Hobbies:<br>
        <input type="checkbox" name="hobbies[]" value="Reading"> Reading<br>
        <input type="checkbox" name="hobbies[]" value="Sports"> Sports<br>
        <input type="checkbox" name="hobbies[]" value="Music"> Music<br>
        <input type="checkbox" name="hobbies[]" value="Traveling"> Traveling<br><br>

        Country:
        <select name="country" required>
            <option value="">--Select--</option>
            <option value="Nepal">Nepal</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="UK">UK</option>
        </select><br><br>

        Subjects (use Ctrl/Cmd to select multiple):<br>
        <select name="subjects[]" multiple size="5" required>
            <option value="PHP">PHP</option>
            <option value="Java">Java</option>
            <option value="Database">Database</option>
            <option value="Networking">Networking</option>
            <option value="AI">AI</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
        $country = $_POST['country'];
        $subjects = isset($_POST['subjects']) ? $_POST['subjects'] : [];

        echo "<hr>";
        echo "<h3>Student Registration Details</h3>";
        echo "Full Name: <strong>$fullname</strong><br>";
        echo "Gender: <strong>$gender</strong><br>";
        echo "Hobbies: <strong>" . implode(', ', $hobbies) . "</strong><br>";
        echo "Country: <strong>$country</strong><br>";
        echo "Subjects: <strong>" . implode(', ', $subjects) . "</strong><br>";
    }
    ?>
</body>
</html>
