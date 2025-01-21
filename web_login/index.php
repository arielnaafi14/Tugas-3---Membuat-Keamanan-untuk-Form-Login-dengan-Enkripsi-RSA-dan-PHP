<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?<?= time(); ?>">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        <?php if (isset($_SESSION['notif'])) { ?>
            <div class="notif">
                <p><?= $_SESSION['notif']; ?></p>
            </div>
            <?php unset($_SESSION['notif']); // Hapus pesan setelah ditampilkan ?>
        <?php } ?>

        <!-- Form Login -->
        <form action="proses.php" method="post" autocomplete="off">
            <label for="">Username</label>
            <input name="username" type="text" required>

            <label>Password</label>
            <input id="password" name="password" type="password" required>
            
            <input id="hidden_password" name="hidden_password" type="hidden">
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- RSA Encryption Script -->
    <script src="https://cdn.jsdelivr.net/npm/node-forge@1.3.1/dist/forge.min.js"></script>
    <script>
        const passwordInput = document.getElementById("password");
        const passwordHidden = document.getElementById("hidden_password");

        document.querySelector("form").addEventListener("submit", async function (event) {
            event.preventDefault();

            const publicKeyPEM = await fetch('./keys/public_key.pem').then(res => res.text());
            const publicKey = forge.pki.publicKeyFromPem(publicKeyPEM);
            const encryptedPassword = forge.util.encode64(publicKey.encrypt(passwordInput.value));

            passwordHidden.value = encryptedPassword; // Set encrypted password
            this.submit();
        });
    </script>
</body>
</html>
