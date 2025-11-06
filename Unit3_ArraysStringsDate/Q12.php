<?php
$numOtpsToGenerate = 4;
$otpLength = 6;
$otps = []; 
$chars = '0123456789';
$charLength = strlen($chars);

for ($j = 0; $j < $numOtpsToGenerate; $j++) {
    $currentOtp = '';
    for ($i = 0; $i < $otpLength; $i++) {
        $currentOtp .= $chars[rand(0, $charLength - 1)];
    }
    $otps[] = $currentOtp;
}

echo "OTP Generator<br>";

foreach ($otps as $index => $otp) {
    echo "OTP " . ($index + 1) . ": " . $otp . "<br>";
}

?>