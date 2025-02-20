<?php
require_once "user.php";

$user = new User();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $no_telepon = $_POST["no_telepon"];
    $password = $_POST["password"];

    if ($user->register($nama, $email, $no_telepon, $password)) {
        session_start();
        $_SESSION["user_id"] = $user->getLastInsertedId(); 

        header("Location: index.php"); 
        exit;
    } else {
        echo "Registrasi gagal!";
    }
    
}

