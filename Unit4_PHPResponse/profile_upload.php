<?php
// Initialize variables
$errors = [];
$success = false;
$uploadedFilePath = '';
$fileInfo = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // -------------------------------
    // 1. Validate User Name
    // -------------------------------
    $name = trim($_POST['username']);

    if (empty($name)) {
        $errors[] = "Name is required";
    } elseif (strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters long";
    }

    // -------------------------------
    // 2. Validate File Upload
    // -------------------------------
    if (!isset($_FILES['profile_pic']) || $_FILES['profile_pic']['error'] == UPLOAD_ERR_NO_FILE) {
        $errors[] = "Profile picture is required";
    } else {
        $file = $_FILES['profile_pic'];

        // Check upload errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "File upload error code: " . $file['error'];
        } else {
            $fileName = $file['name'];
            $fileTmp  = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileType = mime_content_type($fileTmp);

            // Allowed file types
            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

            if (!in_array($fileType, $allowedTypes)) {
                $errors[] = "Invalid file type. Only JPG, PNG, GIF allowed";
            }

            // Check file size - max 2MB
            if ($fileSize > 2 * 1024 * 1024) {
                $errors[] = "File size exceeds 2MB limit";
            }
        }
    }

    // -------------------------------
    // 3. If No Errors → Process Upload
    // -------------------------------
    if (empty($errors)) {

        // Create uploads folder if needed
        if (!is_dir("uploads")) {
            mkdir("uploads", 0777, true);
        }

        // Save file with original name
        $uploadedFilePath = "uploads/" . basename($fileName);

        if (move_uploaded_file($fileTmp, $uploadedFilePath)) {
            $success = true;

            // Prepare file info
            $fileInfo = [
                "name" => $fileName,
                "size" => round($fileSize / 1024 / 1024, 2) . " MB",
                "type" => $fileType,
                "location" => $uploadedFilePath
            ];
        } else {
            $errors[] = "Failed to save uploaded file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Picture Upload</title>
</head>
<body>

<h2>Upload Profile Picture</h2>

<form action="" method="post" enctype="multipart/form-data">
    <label>User Name:</label><br>
    <input type="text" name="username" value=""><br><br>

    <label>Profile Picture:</label><br>
    <input type="file" name="profile_pic"><br><br>

    <button type="submit">Upload</button>
</form>

<hr>

<?php if (!empty($errors)): ?>
    <h3>Upload Errors:</h3>
    <ul style="color:red;">
        <?php foreach ($errors as $e): ?>
            <li><?= $e ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($success): ?>
    <h2 style="color:green;">Profile Picture Uploaded Successfully!</h2>
    <p><strong>User Name:</strong> <?= htmlspecialchars($name) ?></p>

    <h3>File Information:</h3>
    <ul>
        <li><strong>File Name:</strong> <?= $fileInfo['name'] ?></li>
        <li><strong>File Size:</strong> <?= $fileInfo['size'] ?></li>
        <li><strong>File Type:</strong> <?= $fileInfo['type'] ?></li>
        <li><strong>Saved Location:</strong> <?= $fileInfo['location'] ?></li>
    </ul>

    <p><img src="<?= $uploadedFilePath ?>" width="200"></p>
<?php endif; ?>

</body>
</html>
