<?php
session_start();
include "koneksi.php";

if (isset($_POST['username']) && isset($_POST['hidden_password'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $encryptedPassword = $_POST['hidden_password'];

    // Dekripsi password menggunakan OpenSSL dan kunci privat
    $privateKey = file_get_contents('./keys/private_key.pem');
    $decryptedPassword = '';
    openssl_private_decrypt(base64_decode($encryptedPassword), $decryptedPassword, $privateKey);

    // Query untuk mengecek apakah user ada di database
    $query = "SELECT * FROM tb_users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $decryptedPassword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Jika user ditemukan
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['notif'] = "Berhasil Login !!";
        header("Location: index.php");
        die();
    } else {
        // Jika gagal login
        $_SESSION['notif'] = "Gagal Login";
        header("Location: index.php");
        die();
    }
} else {
    $_SESSION['notif'] = "Form login belum lengkap!";
    header("Location: index.php");
    die();
}
