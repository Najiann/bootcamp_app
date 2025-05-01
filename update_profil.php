<?php
session_start();
require 'db.php'; // Koneksi database

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    die("User tidak ditemukan.");
}

$userId = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari POST
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $no_telepon = trim($_POST['no_telepon'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');

    // Ambil data user dari database
    $stmt = $conn->prepare("SELECT email, profile_image, nama, no_telepon, alamat FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();

    $existingEmail = $userData['email'];
    $oldPhoto = $userData['profile_image'];
    $existingNama = $userData['nama'];
    $existingNoTelepon = $userData['no_telepon'];
    $existingAlamat = $userData['alamat'];

    // Jika nama, no_telepon, atau alamat kosong, gunakan nilai yang sudah ada di database
    $nama = !empty($nama) ? $nama : $existingNama;
    $no_telepon = !empty($no_telepon) ? $no_telepon : $existingNoTelepon;
    $alamat = !empty($alamat) ? $alamat : $existingAlamat;

    // Cek apakah email sudah digunakan oleh user lain (hanya jika email diisi dan berbeda dengan yang lama)
    if (!empty($email) && $email !== $existingEmail) {
        $checkEmail = $conn->prepare("SELECT user_id FROM users WHERE email = ? AND user_id != ?");
        $checkEmail->bind_param("si", $email, $userId);
        $checkEmail->execute();
        $checkEmail->store_result();

        if ($checkEmail->num_rows > 0) {
            die("Email sudah digunakan oleh pengguna lain.");
        }
    } else {
        // Jika email kosong, gunakan email lama
        $email = $existingEmail;
    }

    // Update data profil
    $stmt = $conn->prepare("UPDATE users SET nama = ?, email = ?, no_telepon = ?, alamat = ? WHERE user_id = ?");
    $stmt->bind_param("ssssi", $nama, $email, $no_telepon, $alamat, $userId);
    if (!$stmt->execute()) {
        die("Gagal mengupdate profil: " . $stmt->error);
    }

    // Proses upload foto profil jika ada
    if (isset($_FILES["image_profil"]) && $_FILES["image_profil"]["error"] == 0) {
        $uploadDir = "images/image_profil/";
        $fileExt = strtolower(pathinfo($_FILES["image_profil"]["name"], PATHINFO_EXTENSION));
        $allowedExts = ["jpg", "jpeg", "png", "gif"];

        if (in_array($fileExt, $allowedExts)) {
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Buat nama file unik
            $newFileName = "user_{$userId}_" . time() . "." . $fileExt;
            $targetFilePath = $uploadDir . $newFileName;

            // Hapus foto lama jika ada
            if ($oldPhoto && file_exists($oldPhoto)) {
                unlink($oldPhoto);
            }

            // Upload foto baru
            if (move_uploaded_file($_FILES["image_profil"]["tmp_name"], $targetFilePath)) {
                // Simpan path foto baru ke database
                $stmt = $conn->prepare("UPDATE users SET profile_image = ? WHERE user_id = ?");
                $stmt->bind_param("si", $targetFilePath, $userId);
                if (!$stmt->execute()) {
                    die("Gagal menyimpan path foto: " . $stmt->error);
                }
                $_SESSION['profile_image'] = $targetFilePath;
            } else {
                die("Gagal mengupload foto.");
            }
        } else {
            die("Format file tidak didukung.");
        }
    }

    header("Location: profil.php");
    exit;
} else {
    die("Metode tidak diizinkan.");
}
?>