<?php
session_start();
session_destroy();
setcookie(session_name(), '', time() - 3600, '/'); // Hapus cookie sesi

// Redirect ke halaman utama
header("Location: index.php");
exit();
