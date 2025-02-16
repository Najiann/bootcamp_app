<?php
require_once "User.php";

$user = new User();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($user->login($_POST["email"], $_POST["password"])) {
        header("Location: index.php");
    } else {
        echo "Login gagal!";
    }
}
?>
