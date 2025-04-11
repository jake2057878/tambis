<?php
include 'playfair.php'; // Include Playfair Cipher functions

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = strtoupper($_POST["keyword"]);
    $message = strtoupper($_POST["message"]);
    $cipherText = playfairEncrypt($message, $keyword);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playfair Cipher Encryptor</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        form { margin: 20px auto; width: 50%; }
        textarea { width: 100%; height: 100px; }
        input, button { margin-top: 10px; padding: 10px; width: 100%; }
    </style>
</head>
<body>
    <h2>Playfair Cipher Encryption</h2>
    <form method="POST">
        <label>Keyword:</label>
        <input type="text" name="keyword" required>
        <label>Message:</label>
        <textarea name="message" required></textarea>
        <button type="submit">Encrypt</button>
    </form>

    <?php if (!empty($cipherText)): ?>
        <h3>Encrypted Message:</h3>
        <textarea readonly><?= $cipherText ?></textarea>
    <?php endif; ?>
</body>
</html>
