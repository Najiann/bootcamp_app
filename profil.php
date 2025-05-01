<?php
session_start();
require 'db.php'; // Koneksi database

$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    die("User tidak ditemukan.");
}

// Ambil data user dari database
$query = "SELECT nama, email, no_telepon, alamat, profile_image FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Ambil kelas yang sudah selesai
$sql = "SELECT c.course_id, c.judul, c.deskripsi, uc.status, uc.progress
        FROM user_courses uc
        JOIN courses c ON uc.course_id = c.course_id
        WHERE uc.user_id = ? AND uc.progress = 100";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$completed_courses = [];
while ($row = $result->fetch_assoc()) {
    $completed_courses[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logoYGINI.png">
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
        }

        .card-title {
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background-color: #0A74DA;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .card-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .readonly-field {
            cursor: not-allowed; /* Mengubah cursor menjadi tanda larangan */
            background-color: #e9ecef; /* Memberikan latar belakang yang lebih terang untuk menunjukkan bahwa elemen tidak bisa diubah */
        }
    </style>
</head>
<body>
    <?php require_once "header.php" ?>

    <div class="container mt-5">
        <h2 class="mb-4">Profil Saya</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="text-center mb-4">
                    <img src="<?= htmlspecialchars($user['profile_image'] ?? '') ?: 'images/default.png'; ?>" alt="Foto Profil" class="profile-image mb-3">
                </div>
            </div>
            <div class="col-md-8">
                <form action="update_profil.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($user['nama']); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control readonly-field" name="email" value="<?= htmlspecialchars($user['email']); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control readonly-field" name="no_telepon" value="<?= htmlspecialchars($user['no_telepon']); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat"><?= htmlspecialchars($user['alamat'] ?? ''); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" class="form-control" name="image_profil">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>

        <!-- Kelas yang Sudah Selesai -->
        <div class="mt-5">
            <h2 class="mb-4">Kelas yang Sudah Selesai</h2>
            <?php if (!empty($completed_courses)): ?>
                <div class="row">
                    <?php foreach ($completed_courses as $course): ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card card-shadow border-0 rounded">
                                <div class="card-body">
                                    <h6 class="text-success">
                                        <i class="bi bi-check-circle-fill"></i> Lulus
                                    </h6>
                                    <h5 class="card-title"><?= htmlspecialchars($course['judul']); ?></h5>
                                    <p class="card-text text-muted"><?= htmlspecialchars($course['deskripsi']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-warning text-center">Anda belum menyelesaikan kursus apapun.</div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>