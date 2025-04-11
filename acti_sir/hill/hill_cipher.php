<?php
function mod($a, $b) {
    return ($a % $b + $b) % $b;
}

function textToNumbers($text) {
    return array_map(fn($char) => ord($char) - ord('A'), str_split($text));
}

function numbersToText($numbers) {
    return implode("", array_map(fn($num) => chr($num + ord('A')), $numbers));
}

function hillEncrypt($message) {
    $message = preg_replace('/[^A-Z]/', '', strtoupper($message)); // Remove spaces & non-letters
    while (strlen($message) % 3 !== 0) $message .= 'X'; // Padding if needed

    $keyMatrix = [[6, 24, 1], [13, 16, 10], [20, 17, 15]]; // 3x3 Encryption Key
    $messageNumbers = textToNumbers($message);
    $cipherText = "";

    for ($i = 0; $i < count($messageNumbers); $i += 3) {
        $a = $messageNumbers[$i];
        $b = $messageNumbers[$i + 1];
        $c = $messageNumbers[$i + 2];

        // Matrix multiplication
        $c1 = mod(($keyMatrix[0][0] * $a + $keyMatrix[0][1] * $b + $keyMatrix[0][2] * $c), 26);
        $c2 = mod(($keyMatrix[1][0] * $a + $keyMatrix[1][1] * $b + $keyMatrix[1][2] * $c), 26);
        $c3 = mod(($keyMatrix[2][0] * $a + $keyMatrix[2][1] * $b + $keyMatrix[2][2] * $c), 26);

        $cipherText .= numbersToText([$c1, $c2, $c3]);
    }

    return $cipherText;
}
?>
