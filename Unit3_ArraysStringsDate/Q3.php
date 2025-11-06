<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $studentProfile = [
        'name'        => 'Shulabh Shrestha',
        'roll_number' => 40,
        'faculty'     => 'BCSIT',
        'semester'    => 3,
        'email'       => 'shulabh@gmail.com'
        ];
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Student Profile</h2>
    <p><strong>Name:</strong>  <?= $studentProfile['name']; ?> </p>
    <p><strong>Roll Number: </strong><?= $studentProfile['roll_number']; ?></p>
    <p><strong>Faculty: </strong><?= $studentProfile['faculty']; ?></p>
    <p><strong>Semester: </strong><?= $studentProfile['semester']; ?></p>
    <p><strong>Email: </strong><?= $studentProfile['email']; ?></p>
</body>
</html>
