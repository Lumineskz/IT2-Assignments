<?php
/**
 * Server Information Display
 * This script retrieves and displays key environment variables
 * from the $_SERVER superglobal array.
 */

// Define the requested variables
$clientIp = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$serverName = $_SERVER['SERVER_NAME'];

// Determine the HTTP protocol for display purposes
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$serverUrl = $protocol . '://' . $serverName;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server and Client Environment Info</title>
</head>
<body>

    <h1>Environment Diagnostics</h1>
    <p>
        This page displays essential information about the client accessing this page and the server hosting it.
    </p>

    <hr>

    <h2>Client Information</h2>

    <p>
        <strong>Client IP Address:</strong><br>
        <?php echo htmlspecialchars($clientIp); ?>
    </p>

    <p>
        <strong>Browser and OS (User Agent):</strong><br>
        <?php echo htmlspecialchars($userAgent); ?>
    </p>

    <hr>

    <h2>Server Information</h2>

    <p>
        <strong>Server Name:</strong><br>
        <?php echo htmlspecialchars($serverName); ?>
    </p>

    <div style="margin-top: 15px;">
        <p>Accessing this page via: <a href="<?php echo htmlspecialchars($serverUrl); ?>"><?php echo htmlspecialchars($serverUrl); ?></a></p>
    </div>

</body>
</html>