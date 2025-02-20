<?php
// Pastikan koneksi menggunakan MySQLi
require 'db.php';

$transaksi_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($transaksi_id <= 0) {
    die("ID transaksi tidak valid!");
}

// Ambil data transaksi
$query = $conn->prepare("
    SELECT transactions.*, 
           users.nama AS user_nama, 
           courses.judul AS course_nama
    FROM transactions 
    JOIN users ON transactions.user_id = users.user_id  -- Perbaikan di sini
    JOIN courses ON transactions.course_id = courses.course_id   -- Perbaikan di sini
    WHERE transactions.id = ?
");

$query->bind_param("i", $transaksi_id);
$query->execute();
$result = $query->get_result();
$transaksi = $result->fetch_assoc();

if (!$transaksi) {
    die("Data transaksi tidak ditemukan!");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-box {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        h2 { text-align: center; }
        .details { margin-bottom: 20px; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; }
        .print-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <script>
        function printInvoice() {
            window.print();
        }
    </script>
</head>
<body>
    <div class="invoice-box">
        <h2>Invoice <?= $transaksi['course_nama'] ?></h2>
        <p><strong>Nama:</strong> <?= $transaksi['user_nama'] ?></p>
        <p><strong>Kursus:</strong> <?= $transaksi['course_nama'] ?></p>
        <p><strong>Total Harga:</strong> Rp<?= number_format($transaksi['jumlah'], 0, ',', '.') ?></p>
        <p><strong>Status:</strong> <?= ucfirst($transaksi['status']) ?></p>
        <hr>
        <button onclick="printInvoice()" class="print-button">Cetak Invoice</button>
        <button onclick="window.location.href='dashboard.php'" class="print-button" style="background:#007bff;">Kembali ke Dashboard</button>
        <p class="footer">Terima kasih telah membeli kursus di Bootcamp Coding!</p>
    </div>
</body>
</html>

