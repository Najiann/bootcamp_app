<?php
require_once "User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = new User();
    if ($user->login($email, $password)) {
        echo "Login berhasil!";
        header("Location: index.php"); // Redirect ke halaman dashboard
        exit();
    } else {
        echo "Login gagal! Periksa email dan password.";
    }
}
?>
