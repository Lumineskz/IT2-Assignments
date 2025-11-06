<?php
    $comment = "This is a damn good product but the service is hell";
    $badWords = ["damn", "hell"];
    $replacements = ["****", "****"];

    $censoredComment = str_replace($badWords, $replacements, $comment, $censoredCount);

    echo "<h2>Comment Censorship Result 🚫</h2>";

    echo "Original: " . $comment . "<br>";
    echo "Censored: <span style=\"color: red; font-weight: bold;\">" . $censoredComment . "</span><br>";
    echo "Words censored: " . $censoredCount . "<br>";

?>