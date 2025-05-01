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

// Path profil
$profile_path = (strpos($userImage, 'images/image_profil/') === 0) ? $userImage : "images/image_profil/default.png";
if (!file_exists($profile_path)) {
    $profile_path = "images/image_profil/default.png";
}
?>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">
            BYTEX
            Bootcamp
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">

                <?php if ($userId): ?>
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <img src="<?= htmlspecialchars($profile_path); ?>?v=<?= time(); ?>" class="rounded-circle" width="30" height="30" alt="Profile">
                            <span class="ms-2 d-none d-lg-inline"><?= htmlspecialchars($namaUser); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="profil.php"><i class="fa fa-user me-2"></i>Profil</a></li>
                            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out-alt me-2"></i>Logout</a></li>
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
