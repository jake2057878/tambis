<?php
include 'hill_cipher.php'; // Import encryption logic

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = strtoupper($_POST["message"]);
    $cipherText = hillEncrypt($message);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hill Cipher 3x3 Encryption</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        form { margin: 20px auto; width: 50%; }
        textarea, button { width: 100%; padding: 10px; margin-top: 10px; }
    </style>
</head>
<body>
    <h2>Hill Cipher 3×3 Encryption</h2>
    <form method="POST">
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
