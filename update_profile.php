<?php
session_start();
require 'db.php'; // Pastikan koneksi database benar

$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    die("User tidak ditemukan.");
}

$uploadDir = "images/image_profil/"; // Folder penyimpanan

// Cek apakah file diunggah dengan benar
if (isset($_FILES["image_profil"]) && $_FILES["image_profil"]["error"] == 0) {
    $fileExt = strtolower(pathinfo($_FILES["image_profil"]["name"], PATHINFO_EXTENSION));
    $allowedExts = ["jpg", "jpeg", "png", "gif"];

    if (!in_array($fileExt, $allowedExts)) {
        die("Format file tidak diizinkan!");
    }

    // Buat nama file unik
    $newFileName = "user_{$userId}_" . time() . "." . $fileExt;
    $targetFilePath = $uploadDir . $newFileName;

    // Pindahkan file ke folder server
    if (move_uploaded_file($_FILES["image_profil"]["tmp_name"], $targetFilePath)) {
        // Simpan ke database
        $query = "UPDATE users SET profile_image = ? WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $targetFilePath, $userId);

        if ($stmt->execute()) {
            $_SESSION['profile_image'] = $targetFilePath; // Simpan di sesi
            header("Location: profil.php"); // Redirect ke profil
            exit;
        } else {
            echo "Gagal menyimpan ke database.";
        }
    } else {
        echo "Gagal mengunggah file.";
    }
} else {
    echo "Tidak ada file yang diunggah atau terjadi kesalahan.";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
}
?>
