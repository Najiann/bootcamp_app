<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'db.php';

$userId = $_SESSION['user_id'] ?? null;
$namaUser = $_SESSION['nama_user'] ?? 'User';
$userImage = $_SESSION['profile_image'] ?? 'default.png';

// Ambil data user dari database jika belum lengkap
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

$profilePath = file_exists("images/image_profil/" . $userImage) ? "images/image_profil/" . $userImage : "images/image_profil/default.png";
?>

<style>
    .sidebar {
        background-color: #fff;
        height: 100vh;
        border-right: 1px solid #dee2e6;
        padding-top: 20px;
        position: fixed;
        width: 220px;
        z-index: 1000;
    }
    .sidebar .nav-link {
        color: #333;
        font-weight: 500;
        padding: 12px 20px;
        display: flex;
        align-items: center;
        transition: background-color 0.2s, color 0.2s;
    }
    .sidebar .nav-link i {
        margin-right: 10px;
    }
    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        background-color: #e9ecef;
        color: #0d6efd;
    }
    .sidebar .user-info {
        text-align: center;
        margin-bottom: 20px;
    }
    .sidebar .user-info img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>

<div class="sidebar d-flex flex-column">
    <a href="dashboard.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
        <i class="fa-solid fa-gauge"></i> Dashboard
    </a>
    <a href="courses.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'courses.php' ? 'active' : ''; ?>">
        <i class="fa-solid fa-book"></i> Courses
    </a>
    <a href="testimoni.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'testimoni.php' ? 'active' : ''; ?>">
        <i class="fa-solid fa-star"></i> Testimoni
    </a>
    <a href="mentor.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'mentor.php' ? 'active' : ''; ?>">
        <i class="fa-solid fa-users"></i> Mentor
    </a>
    <a href="logout.php" class="nav-link text-danger mt-auto">
        <i class="fa-solid fa-sign-out-alt"></i> Logout
    </a>
</div>
