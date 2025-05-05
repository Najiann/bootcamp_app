<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'db.php';

$userId = $_SESSION['user_id'] ?? null;
$namaUser = $_SESSION['nama_user'] ?? 'User';
$userImage = $_SESSION['profile_image'] ?? 'default.png';

// Jika data belum lengkap di session, ambil dari database
if ($userId && empty($_SESSION['profile_image'])) {
    $stmt = $conn->prepare("SELECT nama, profile_image FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($nama, $profileImage);
    $stmt->fetch();
    $stmt->close();

    $_SESSION['nama_user'] = $nama;
    $_SESSION['profile_image'] = $profileImage ?: 'default.png';
    $userImage = $_SESSION['profile_image'];
}

$profilePath = (strpos($userImage, 'images/image_profil/') === 0) ? $userImage : "images/image_profil/default.png";
if (!file_exists($profilePath)) {
    $profilePath = "images/image_profil/default.png";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/course.css">
    <link rel="stylesheet" href="css/mentor.css">
    <link rel="stylesheet" href="css/testimoni.css">
    <title>BYTEX Bootcamp</title>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="top-navbar navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container-fluid">
            <button class="navbar-toggler d-block d-lg-none me-2" type="button" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fw-bold" href="dashboard.php">
                BYTEX Bootcamp
            </a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <?php if ($userId): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <img src="<?= htmlspecialchars($profilePath); ?>?v=<?= time(); ?>" class="profile-img rounded-circle" alt="Profile">
                                <span><?= htmlspecialchars($namaUser); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="profil.php"><i class="fas fa-user me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-primary px-3" href="login.php">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar-container" id="sidebar">
        <div class="sidebar">
            <!-- User Info Section -->
            <div class="user-info">
                <img src="<?= htmlspecialchars($profilePath); ?>?v=<?= time(); ?>" alt="Profile Image">
                <h5><?= htmlspecialchars($namaUser); ?></h5>
                <p>MERGEO2020.4.79</p>
                <p>(Amount of Servedation)</p>
            </div>
            
            <!-- University Info -->
            <div class="nav-section-title">University</div>
            <div class="university-info">
                <p class="title">SIMAN I DEPOK</p>
                <p>Major</p>
                <p>Pengembangan Perangkat Lunak dan Gim (PF.G)</p>
                <p><small>[Member] Nabila Saisabila</small></p>
            </div>
            
            <hr>
            
            <!-- Learning Section -->
            <div class="nav-section-title">Learning</div>
            <a href="dashboard.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>    
            <a href="courses.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'sertifikat.php' ? 'active' : ''; ?>">
                <i class="fas fa-graduation-cap"></i> Course
            </a>
            
            <!-- Document Section -->
            <div class="nav-section-title">Document</div>
            <a href="mentor.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'mentor.php' ? 'active' : ''; ?>">
                <i class="fas fa-tasks"></i> Bytex Mentor
            </a>
            <a href="testimoni.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'testimoni.php' ? 'active' : ''; ?>">
                <i class="fas fa-newspaper"></i> Testimoni
            </a>
            
            <!-- Footer Note -->
            <div class="mt-auto p-3 small text-muted">
                If you found any discrepancies, please direct the questions to <a href="mailto:bytexcamp@gmail.com">bytexcamp@gmail.com</a>.
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">