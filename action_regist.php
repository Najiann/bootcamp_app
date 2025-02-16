<?php
require_once "User.php";

$user = new User();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($user->register($_POST["email"], $_POST["no_telepon"], $_POST["password"])) {
        // Auto login setelah registrasi
        session_start();
        $_SESSION["user_id"] = $user->getLastInsertedId(); // Simpan user ID

        header("Location: index.php"); // Redirect ke home setelah register
        exit;
    } else {
        echo "Registrasi gagal!";
    }
}
?>
