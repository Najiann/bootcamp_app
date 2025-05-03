<?php
require_once('fpdf/fpdf.php');
require_once('db.php');

session_start();
if (!isset($_SESSION['user_id'])) {
    header('HTTP/1.0 403 Forbidden');
    die('Error: Akses ditolak. Silakan login terlebih dahulu.');
}

$user_id = $_SESSION['user_id'];
$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;

if ($course_id <= 0) {
    die('Error: ID Kursus tidak valid');
}

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=db_bootcamp",
        "root",
        "",
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

try {
    $stmt = $pdo->prepare("
        SELECT 
            u.nama AS nama_peserta,
            c.judul AS nama_kursus,
            c.deskripsi AS deskripsi_kursus,
            u.profile_image,
            uc.status
        FROM users u
        JOIN user_courses uc ON u.user_id = uc.user_id
        JOIN courses c ON uc.course_id = c.course_id
        WHERE u.user_id = ? AND uc.course_id = ?
    ");
    $stmt->execute([$user_id, $course_id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) die('Data tidak ditemukan');
    if ($data['status'] !== 'completed') die('Kursus belum selesai');

} catch (PDOException $e) {
    die("Error database: " . $e->getMessage());
}

class CertificatePDF extends FPDF {
    private $data;

    public function __construct($data) {
        parent::__construct('L', 'mm', 'A4');
        $this->data = $data;
    }

    function Header() {
        $bgImage = 'images/esertifikat/esertifikat.png';
        if (file_exists($bgImage)) {
            $this->Image($bgImage, 0, 0, 297, 210);
        } else {
            $this->SetFillColor(255, 255, 255);
            $this->Rect(0, 0, 297, 210, 'F');
        }

        // Logo dan judul
        $this->SetXY(0, 38);
        $this->SetFont('Arial', 'B', 28);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 20, 'SERTIFIKAT KELULUSAN', 0, 1, 'C');
    }

    function Content() {
        $this->SetTextColor(0, 0, 0);

        // Nama Peserta
        $this->SetFont('Arial', 'B', 24);
        $this->SetXY(0, 65);
        $this->Cell(0, 10, strtoupper($this->data['nama_peserta']), 0, 1, 'C');

        // Kalimat pengantar
        $this->SetFont('Arial', '', 16);
        $this->SetXY(0, 80);
        $this->Cell(0, 10, 'Telah menyelesaikan kursus:', 0, 1, 'C');

        // Nama Kursus
        $this->SetFont('Arial', 'B', 18);
        $this->SetXY(15, 95);
        $this->MultiCell(267, 10, '"' . $this->data['nama_kursus'] . '"', 0, 'C');

        // Deskripsi Kursus
        $this->SetFont('Arial', '', 14);
        $this->SetXY(25, 115);
        $this->MultiCell(247, 8, $this->data['deskripsi_kursus'], 0, 'C');

        // Tanggal Sertifikat
        $this->SetFont('Arial', 'I', 12);
        $this->SetXY(0, 170);
        $this->Cell(0, 10, 'Diberikan pada: ' . date('d F Y'), 0, 1, 'C');

        // Foto profil jika ada
        if (!empty($this->data['profile_image']) && file_exists('images/image_profil/' . $this->data['profile_image'])) {
            $this->Image('images/image_profil/' . $this->data['profile_image'], 240, 10, 30, 30, 'JPG');
        }
    }
}

// Generate PDF
$pdf = new CertificatePDF($data);
$pdf->AddPage();
$pdf->Content();

$filename = 'Sertifikat_' . preg_replace('/[^a-zA-Z0-9]/', '_', $data['nama_peserta']) . '.pdf';
$pdf->Output('I', $filename);