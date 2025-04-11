<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polyalphabetic Cipher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        input, button {
            padding: 10px;
            margin: 5px;
        }
    </style>
</head>
<body>

    <h2>Polyalphabetic Cipher (Vigenère) Encrypt & Decrypt</h2>

    <form method="post">
        <input type="text" name="text" placeholder="Enter text" required>
        <input type="text" name="keyword" placeholder="Enter keyword" required>
        <br>
        <button type="submit" name="encrypt">Encrypt</button>
        <button type="submit" name="decrypt">Decrypt</button>
    </form>

    <?php
    function vigenereCipher($text, $keyword, $mode) {
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $text = strtoupper($text);
        $keyword = strtoupper($keyword);
        $keywordRepeated = "";
        $result = "";

        // Repeat the keyword to match the length of the text
        for ($i = 0, $j = 0; $i < strlen($text); $i++) {
            if (ctype_alpha($text[$i])) {
                $keywordRepeated .= $keyword[$j % strlen($keyword)];
                $j++;
            } else {
                $keywordRepeated .= $text[$i];
            }
        }

        // Encryption & Decryption
        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];
            if (ctype_alpha($char)) {
                $textPos = strpos($alphabet, $char);
                $keyPos = strpos($alphabet, $keywordRepeated[$i]);

                if ($mode === "encrypt") {
                    $newPos = ($textPos + $keyPos) % 26;
                } else { // Decryption
                    $newPos = ($textPos - $keyPos + 26) % 26;
                }

                $result .= $alphabet[$newPos];
            } else {
                $result .= $char; // Keep non-letter characters
            }
        }
        return $result;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];
        $keyword = $_POST["keyword"];

        if (isset($_POST["encrypt"])) {
            echo "<h3>Encrypted Text: " . vigenereCipher($text, $keyword, "encrypt") . "</h3>";
        } elseif (isset($_POST["decrypt"])) {
            echo "<h3>Decrypted Text: " . vigenereCipher($text, $keyword, "decrypt") . "</h3>";
        }
    }
    ?>

</body>
</html>
