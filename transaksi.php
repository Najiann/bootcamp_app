<?php
session_start();
require 'db.php'; // Koneksi database

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

if ($course_id <= 0) {
    die("ID Course tidak valid!");
}

// Ambil harga dan nama course
$query = $conn->prepare("SELECT judul, harga FROM courses WHERE course_id = ?");
$query->bind_param("i", $course_id);
$query->execute();
$result = $query->get_result();
$course = $result->fetch_assoc();

if (!$course) {
    die("Course tidak ditemukan!");
}

$total_harga = $course['harga'];
$course_nama = $course['judul'];

// Jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_method = $_POST['payment_method'];

    // Validasi metode pembayaran
    $allowed_methods = ['debit', 'credit', 'ewallet', 'transfer'];
    if (!in_array($payment_method, $allowed_methods)) {
        die("Metode pembayaran tidak valid!");
    }

    // Simpan transaksi
    $insert = $conn->prepare("INSERT INTO transactions (user_id, course_id, jumlah, status, payment_method, created_at) VALUES (?, ?, ?, 'paid', ?, NOW())");
    $insert->bind_param("iiss", $user_id, $course_id, $total_harga, $payment_method);
    
    if (!$insert->execute()) {
        die("Error dalam menyimpan transaksi: " . $insert->error);
    }

    // Tambahkan kursus ke user_courses
    $add_course = $conn->prepare("INSERT INTO user_courses (user_id, course_id, status, progress) VALUES (?, ?, 'ongoing', 0)");
    $add_course->bind_param("ii", $user_id, $course_id);
    
    
    if (!$add_course->execute()) {
        die("Error dalam menambahkan kursus ke user_courses: " . $add_course->error);
    }

    // Redirect ke halaman invoice
    header("Location: invoice.php?id=" . $insert->insert_id);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Kursus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .header {
            text-align: center;
            font-weight: bold;
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="header">Pembelian Kursus</h2>
        <p class="text-center">Kursus: <strong><?php echo htmlspecialchars($course_nama); ?></strong></p>
        <p class="text-center">Harga: <strong>Rp<?php echo number_format($total_harga, 0, ',', '.'); ?></strong></p>

        <form method="post">
            <div class="mb-3">
                <label for="payment_method" class="form-label">Metode Pembayaran:</label>
                <select name="payment_method" id="payment_method" class="form-select" required>
                    <option value="debit">Debit</option>
                    <option value="credit">Credit</option>
                    <option value="ewallet">E-Wallet</option>
                    <option value="transfer">Transfer</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Bayar Sekarang</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>