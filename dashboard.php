<?php
session_start();
require_once 'db.php'; 

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil nama user dari database
$sql_user = "SELECT nama FROM users WHERE user_id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
$user = $result_user->fetch_assoc();

$nama_user = $user['nama'] ?? 'User'; // Jika tidak ada nama, gunakan "User"
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Bootcamp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="main.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .dashboard-header {
            text-align: center;
            margin: 30px 0;
            font-weight: bold;
            color: #355592;
        }
        .card {
            border-color: #355592;
        }
        .card:hover {
            transform: scale(1.05);
            transition: 0.3s;
        }
        .progress-bar {
            background-color: #355592;
        }
        .btn-primary {
            background-color: #355592;
            border-color: #355592;
        }
        .btn-primary:hover {
            background-color: #2c467e;
            border-color: #2c467e;
        }
    </style>
</head>
<body>
    
    <?php require_once "header.php" ?>

    <section id="hero" class="text-white d-flex flex-column justify-content-center align-items-center text-center py-5" style="background-color: #0D3B66; height: 300px;">
    <div class="container">
        <h1 class="fw-bold display-4">Selamat Datang, <?= htmlspecialchars($nama_user); ?>!</h1>
        <p class="fs-5">Semoga aktivitas belajarmu menyenangkan.</p>
    </div>
</section>

    <div class="container mt-4">
        <h2 class="mb-4">Daftar Kursus Anda</h2>

        <?php
        $sql = "SELECT c.course_id, c.judul, c.deskripsi, uc.status, uc.progress
                FROM user_courses uc
                JOIN courses c ON uc.course_id = c.course_id
                WHERE uc.user_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <?php if ($result->num_rows > 0): ?>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary"> <?= ($row['judul'] ?? 'Tidak Ada Judul'); ?></h5>
                        <p class="card-text text-muted"><?= ($row['deskripsi'] ?? 'Tidak Ada Deskripsi'); ?></p>
                        <p class="badge bg-secondary text-white">Status: <?= ($row['status'] ?? 'Unknown'); ?></p>
                        <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" style="width: <?= $row['progress'] ?? 0; ?>%;" aria-valuenow="<?= $row['progress'] ?? 0; ?>" aria-valuemin="0" aria-valuemax="100">
                                <?= $row['progress'] ?? 0; ?>%
                            </div>
                        </div>
                        <a href="modul.php?course_id=<?= $row['course_id']; ?>" class="btn btn-primary mt-3 w-100">Lanjutkan Belajar</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
            <div class="alert alert-warning text-center" role="alert">
                Anda belum membeli kursus apapun. <a href="courses.php" class="alert-link">Lihat kursus yang tersedia</a>.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="text-white py-5">
    <div class="container">
      <!-- Logo - Sola hizalı -->
      <div class="mb-0">
        <img src="images/logoYGINI.png" alt="Powerfull" class="img-fluid" style="max-height: 60px;">
      </div>

      <!-- Açıklama Metni - Tam genişlik -->
      <div class="mb-4">
        <p class="text-white-50" style="font-size: 1rem; line-height: 1.8; font-weight: 600;">
          Empowering future developers through hands-on coding experience and industry-relevant skills. Join our bootcamp and transform your career in tech!
        </p>
      </div>

      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>
</html>
