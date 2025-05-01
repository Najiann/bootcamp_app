<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql_user = "SELECT nama, profile_image FROM users WHERE user_id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
$user = $result_user->fetch_assoc();
$nama_user = $user['nama'] ?? 'User';
$profile_image = $user['profile_image'] ?? 'default.png';
$profile_path = file_exists("images/image_profil/" . $profile_image) ? "images/image_profil/" . $profile_image : "images/image_profil/default.png";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/logoYGINI.png">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="main.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f9;
        }
        .content {
            padding: 30px;
        }
        .tab-pane .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        .progress-bar {
            background-color: #0d6efd;
        }
    </style>
</head>
<body>

<?php require 'header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php require_once 'side_bar.php'; ?>

        <!-- Main Content -->
        <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
            <div class="py-4">
                <h2>Hai, <?= htmlspecialchars($nama_user); ?> 👋</h2>
                <p class="text-muted">Selamat datang kembali! Lanjutkan belajar yuk~</p>

                <?php
                $sql = "SELECT c.course_id, c.judul, c.deskripsi, uc.status, uc.progress
                        FROM user_courses uc
                        JOIN courses c ON uc.course_id = c.course_id
                        WHERE uc.user_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $on_going_courses = [];
                $completed_courses = [];
                while ($row = $result->fetch_assoc()) {
                    if ($row['progress'] == 100) {
                        $completed_courses[] = $row;
                    } else {
                        $on_going_courses[] = $row;
                    }
                }
                ?>

                <!-- Tabs -->
                <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="ongoing-tab" data-bs-toggle="tab" data-bs-target="#ongoing" type="button" role="tab">Kelas yang Dipelajari</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">Kelas yang Diselesaikan</button>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="ongoing" role="tabpanel">
                        <?php if (!empty($on_going_courses)): ?>
                            <div class="row">
                                <?php foreach ($on_going_courses as $course): ?>
                                    <div class="col-md-4 mb-4">
                                        <div class="card p-3">
                                            <h5 class="card-title text-primary fw-bold"><?= $course['judul']; ?></h5>
                                            <p class="text-muted small"><?= $course['deskripsi']; ?></p>
                                            <span class="badge bg-warning text-dark">Status: <?= $course['status']; ?></span>
                                            <div class="progress mt-2">
                                                <div class="progress-bar" role="progressbar" style="width: <?= $course['progress']; ?>%;"><?= $course['progress']; ?>%</div>
                                            </div>
                                            <a href="modul.php?course_id=<?= $course['course_id']; ?>" class="btn btn-primary btn-sm mt-3">Lanjutkan Belajar</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info">Belum ada kelas yang dipelajari.</div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="completed" role="tabpanel">
                        <?php if (!empty($completed_courses)): ?>
                            <div class="row">
                                <?php foreach ($completed_courses as $course): ?>
                                    <div class="col-md-4 mb-4">
                                        <div class="card p-3 border-success">
                                            <h5 class="card-title text-success fw-bold"><?= $course['judul']; ?></h5>
                                            <p class="text-muted small"><?= $course['deskripsi']; ?></p>
                                            <span class="badge bg-success">Selesai</span>
                                            <div class="progress mt-2">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;">100%</div>
                                            </div>
                                            <a href="sertifikat.php?course_id=<?= $course['course_id']; ?>" class="btn btn-success btn-sm mt-3">Lihat Sertifikat</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning">Belum ada kelas yang diselesaikan.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>
</body>
</html>
