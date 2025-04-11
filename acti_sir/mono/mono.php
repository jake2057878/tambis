<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monoalphabetic Cipher</title>
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

    <h2>Monoalphabetic Cipher Encrypt & Decrypt</h2>

    <form method="post">
        <input type="text" name="text" placeholder="Enter text" required>
        <input type="number" name="shift" placeholder="Shift Key" required>
        <br>
        <button type="submit" name="encrypt">Encrypt</button>
        <button type="submit" name="decrypt">Decrypt</button>
    </form>

    <?php
    function monoCipher($text, $shift, $mode) {
        $plainAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $shiftedAlphabet = substr($plainAlphabet, $shift) . substr($plainAlphabet, 0, $shift);

        if ($mode === "decrypt") {
            // Swap for decryption
            $temp = $plainAlphabet;
            $plainAlphabet = $shiftedAlphabet;
            $shiftedAlphabet = $temp;
        }

        $result = "";
        $text = strtoupper($text);

        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];

            if (ctype_alpha($char)) {
                $pos = strpos($plainAlphabet, $char);
                $result .= ($pos !== false) ? $shiftedAlphabet[$pos] : $char;
            } else {
                $result .= $char;
            }
        }
        return $result;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];
        $shift = intval($_POST["shift"]);

        if (isset($_POST["encrypt"])) {
            echo "<h3>Encrypted Text: " . monoCipher($text, $shift, "encrypt") . "</h3>";
        } elseif (isset($_POST["decrypt"])) {
            echo "<h3>Decrypted Text: " . monoCipher($text, $shift, "decrypt") . "</h3>";
        }
    }
    ?>

</body>
</html>
