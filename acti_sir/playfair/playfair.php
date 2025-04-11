<?php
function generateKeySquare($keyword) {
    $keyword = str_replace("J", "I", $keyword); // Merge 'I' and 'J'
    $alphabet = "ABCDEFGHIKLMNOPQRSTUVWXYZ";
    $keyString = $keyword . $alphabet;
    $keyString = implode("", array_unique(str_split($keyString))); // Remove duplicates

    $keySquare = [];
    for ($i = 0; $i < 25; $i += 5) {
        $keySquare[] = str_split(substr($keyString, $i, 5));
    }
    return $keySquare;
}

function prepareMessage($message) {
    $message = str_replace("J", "I", preg_replace("/[^A-Z]/", "", strtoupper($message)));
    $pairs = [];
    for ($i = 0; $i < strlen($message); $i += 2) {
        $a = $message[$i];
        $b = isset($message[$i + 1]) ? $message[$i + 1] : 'X';
        if ($a == $b) {
            $b = 'X'; // Insert 'X' if duplicate
            $i--;
        }
        $pairs[] = [$a, $b];
    }
    return $pairs;
}

function findPosition($keySquare, $letter) {
    for ($row = 0; $row < 5; $row++) {
        for ($col = 0; $col < 5; $col++) {
            if ($keySquare[$row][$col] == $letter) {
                return [$row, $col];
            }
        }
    }
    return [-1, -1];
}

function playfairEncrypt($message, $keyword) {
    $keySquare = generateKeySquare($keyword);
    $pairs = prepareMessage($message);
    $cipherText = "";

    foreach ($pairs as [$a, $b]) {
        list($rowA, $colA) = findPosition($keySquare, $a);
        list($rowB, $colB) = findPosition($keySquare, $b);

        if ($rowA == $rowB) { // Same row
            $cipherText .= $keySquare[$rowA][($colA + 1) % 5] . $keySquare[$rowB][($colB + 1) % 5];
        } elseif ($colA == $colB) { // Same column
            $cipherText .= $keySquare[($rowA + 1) % 5][$colA] . $keySquare[($rowB + 1) % 5][$colB];
        } else { // Form rectangle
            $cipherText .= $keySquare[$rowA][$colB] . $keySquare[$rowB][$colA];
        }
    }
    return $cipherText;
}
?>
