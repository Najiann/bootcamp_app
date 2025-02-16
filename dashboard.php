<?php
session_start();
include 'db.php'; 

$user_id = $_SESSION['user_id']; 

$sql = "SELECT c.course_id, c.judul, c.deskripsi, uc.status, uc.progress 
        FROM user_courses uc 
        JOIN courses c ON uc.course_id = c.course_id 
        WHERE uc.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Bootcamp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require "header.php"; ?>

    <div class="container mt-4">
        <h2 class="mb-4">Daftar Kursus Anda</h2>

        <?php if ($result->num_rows > 0): ?>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= ($row['judul'] ?? 'Tidak Ada Judul'); ?></h5>
                        <p class="card-text"><?= ($row['deskripsi'] ?? 'Tidak Ada Deskripsi'); ?></p>
                        <p class="badge bg-secondary"><?= ($row['status'] ?? 'Unknown'); ?></p>
                        <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" style="width: <?= $row['progress'] ?? 0; ?>%;" aria-valuenow="<?= $row['progress'] ?? 0; ?>" aria-valuemin="0" aria-valuemax="100"><?= $row['progress'] ?? 0; ?>%</div>
                        </div>
                        <a href="course.php?course_id=<?= $row['course_id']; ?>" class="btn btn-primary mt-3">Lanjutkan Belajar</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                Anda belum membeli kursus apapun. <a href="courses.php" class="alert-link">Lihat kursus yang tersedia</a>.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
