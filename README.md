# 🧠 Bootcamp BYTEX - Sistem Manajemen Bootcamp

Bootcamp BYTEX adalah platform manajemen kursus berbasis web yang dibangun dengan PHP native, dirancang untuk memfasilitasi proses belajar mengajar secara daring. Platform ini mencakup fitur-fitur penting seperti pendaftaran pengguna, pengelolaan kursus, modul pembelajaran, sistem ujian, serta pembuatan sertifikat otomatis.

---

## 📚 Bootcamp yang Tersedia

Saat ini platform ini menyediakan bootcamp yang berfokus pada pengembangan skill digital dan teknologi, seperti:

* **Web Development Bootcamp**
* **Data Science & Analytics Bootcamp**
* **UI/UX Design Bootcamp**
* **Digital Marketing Bootcamp**

Admin dapat menambahkan jenis bootcamp lainnya dengan mudah melalui dashboard admin.

---

## 🌟 Fitur Utama

### ✅ User Side

* **Registrasi dan Login**: Pengguna bisa mendaftar dan masuk untuk mengakses kursus.
* **Dashboard User**: Menampilkan kursus yang diambil dan status belajar.
* **Modul Pembelajaran**: Tiap kursus terdiri dari beberapa modul yang dapat dipelajari.
* **Ujian Kursus**: Di akhir kursus, peserta wajib menyelesaikan ujian sebagai syarat kelulusan.
* **Sertifikat Otomatis**: Setelah menyelesaikan ujian, peserta bisa melihat *preview* dan mengunduh sertifikat dalam bentuk PDF.
* **Pembayaran**: Sistem validasi pembayaran terintegrasi untuk kursus berbayar.

### 🛠️ Admin Side

* **Manajemen Kursus**: Admin bisa menambah, mengedit, dan menghapus kursus.
* **Manajemen Modul dan Ujian**: Admin dapat mengelola konten pembelajaran dan soal ujian.
* **Manajemen Pengguna**: Melihat data peserta, status kelulusan, dan pembayaran.
* **Upload Sertifikat Template**: Admin dapat mengganti background sertifikat sesuai kebutuhan.

---

## 🧰 Teknologi yang Digunakan

* **Bahasa Pemrograman**: PHP native
* **Database**: MySQL
* **Library PDF**: FPDF (untuk pembuatan sertifikat)
* **Frontend**: HTML, CSS (dengan sedikit JS jika diperlukan)
* **Tool Tambahan**: AdminLTE (opsional), Bootstrap (jika digunakan)

---

## 🔧 Cara Menjalankan Proyek

### 1. Clone Repository

```bash
git clone https://github.com/username/bootcamp_sas.git
cd bootcamp_sas
```

### 2. Setup Database

* Import file `db_bootcamp.sql` ke dalam MySQL menggunakan phpMyAdmin atau tool sejenis.
* Pastikan koneksi database sesuai di file `db.php`:

```php
$pdo = new PDO("mysql:host=localhost;dbname=db_bootcamp", "root", "");
```

### 3. Jalankan Web Server

* Gunakan XAMPP, Laragon, atau server lokal lainnya.
* Arahkan ke folder `bootcamp_sas` di browser, misal:
  `http://localhost/bootcamp_sas`

---

## 📁 Struktur Folder Penting

```
bootcamp_sas/
├── admin/               <- Halaman dashboard admin
├── images/              <- Folder gambar termasuk template sertifikat
├── fpdf/                <- Library untuk membuat PDF
├── modul/               <- Konten pembelajaran per kursus
├── ujian/               <- Soal dan validasi ujian
├── sertifikat.php       <- Script untuk generate sertifikat
├── db.php               <- Koneksi ke database
├── login.php            <- Halaman login
├── register.php         <- Halaman registrasi
└── index.php            <- Beranda
```

---

## 📌 Catatan

* Setiap kursus memiliki status: `in_progress`, `completed`, atau `not_started`.
* Sertifikat hanya bisa diakses jika status kursus sudah `completed`.
* Semua data pengguna dan progres kursus disimpan secara aman di dalam database `db_bootcamp`.
---
