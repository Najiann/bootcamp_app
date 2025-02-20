<?php
session_start();
require_once 'db.php'; 

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit();
}

$user_id = $_SESSION['user_id'];
$course_id = $_GET['course_id'] ?? 0;

// Ambil modul berdasarkan course_id
$sql_modul = "SELECT * FROM modules WHERE course_id = ?";
$stmt_modul = $conn->prepare($sql_modul);
$stmt_modul->bind_param("i", $course_id);
$stmt_modul->execute();
$result_modul = $stmt_modul->get_result();

// Ambil soal ujian berdasarkan course_id
$sql_quiz = "SELECT * FROM exams WHERE course_id = ?";
$stmt_quiz = $conn->prepare($sql_quiz);
$stmt_quiz->bind_param("i", $course_id);
$stmt_quiz->execute();
$result_quiz = $stmt_quiz->get_result();

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Materi dan Ujian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php require_once "header.php" ?>
    <div class="container mt-4">
        <h2 class="mb-4 text-primary">Materi Pembelajaran</h2>

        <?php if ($result_modul->num_rows > 0): ?>
            <?php while ($modul = $result_modul->fetch_assoc()): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-primary"> <?= htmlspecialchars($modul['judul']); ?></h5>
                        <p class="card-text"> <?= nl2br(htmlspecialchars($modul['konten'])); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert alert-warning">Belum ada modul untuk kursus ini.</div>
        <?php endif; ?>
    </div>

    <div class="container mt-4">
        <h2 class="mb-4 text-primary">Ujian</h2>
        <?php if ($result_quiz->num_rows > 0): ?>
            <a href="ujian.php?course_id=<?= $course_id; ?>" class="btn btn-success">Mulai Ujian</a>
        <?php else: ?>
            <div class="alert alert-warning">Belum ada ujian untuk kursus ini.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>