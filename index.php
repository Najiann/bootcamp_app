<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';

// Ambil data kursus dari database
$sql = "SELECT * FROM courses"; // Sesuaikan dengan nama tabel kamu
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Site</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- ini CSS untuk bagian kelas2 -->
  <style>
        .product-card {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        .product-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }
        .price-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            font-size: 1.1rem;
            font-weight: bold;
        }
        .original-price {
            text-decoration: line-through;
            color: #888;
        }
        .discounted-price {
            color: #007bff;
        }
    </style>

</head>
<body>
<header id="header"> 
    <div class="container container-fluid">
      <nav class="navbar navbar-expand-lg">
        <div class="logo">
          <img src="images/logoYGINI.png" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#hero">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#classes">Classes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#trainers">Mentors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#reviews">Testimonials</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <?php if (isset($_SESSION['user_id'])): ?>
              <!-- Jika sudah login, tampilkan tombol Dashboard -->
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
              </li>
            <?php else: ?>
              <!-- Jika belum login, tampilkan Login & Register -->
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </nav>
    </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <section id="hero" class="text-white">
    <div class="container">
      <h5 class="fw-bold bg-primary d-inline-block px-3 py-1 rounded">POWERFULL</h5>
      <h1 class="display-1 fw-bold mb-4">Intensive <br> Coding <br> Bootcamp.</h1>
      <h5 class="mb-4">Tingkatkan keterampilan coding-mu dengan latihan kelompok bersama trainer profesional! Pelajari teknologi terkini dan bangun proyek nyata dalam lingkungan yang mendukung.</h5>
      
      <!-- Butonlar -->
      <div class="d-flex gap-5">
     <a href="#" class="btn btn-primary btn-lg px-4">Details</a>
      </div>
    </div>
  </section>

    <!-- Stats Section -->
  <section id="stats" class="py-5 ">
      <div class="container" style="max-width: 1000px;">
        <div class="row text-center g-4">
          <!-- Course Stats -->
          <div class="col-md-3">
            <div class="stats-item p-4 bg-white rounded shadow-sm">
              <h2 class="display-4 fw-bold text-primary mb-2">325</h2>
              <h5 class="fw-bold text-dark">Coding Courses</h5>
            </div>
          </div>
  
          <!-- Work Out Stats -->
          <div class="col-md-3">
            <div class="stats-item p-4 bg-white rounded shadow-sm">
              <h2 class="display-4 fw-bold text-primary mb-2">405</h2>
              <h5 class="fw-bold text-dark">Live Coding Sessions</h5>
            </div>
          </div>
  
          <!-- Working Hour Stats -->
          <div class="col-md-3">
            <div class="stats-item p-4 bg-white rounded shadow-sm">
              <h2 class="display-4 fw-bold text-primary mb-2">305</h2>
              <h5 class="fw-bold text-dark">Hours of Learning</h5>
            </div>
          </div>
  
          <!-- Happy Client Stats -->
          <div class="col-md-3">
            <div class="stats-item p-4 bg-white rounded shadow-sm">
              <h2 class="display-4 fw-bold text-primary mb-2">705</h2>
              <h5 class="fw-bold text-dark">Successful Graduates</h5>
            </div>
          </div>
        </div>
      </div>
    </section>

  <section id="classes" class="py-5">
    <div class="container">
      <!-- Başlık Kısmı -->
      <div class="text-center mb-5">
        <h2 class="display-4 fw-bold text-primary mb-3">OUR CODING PROGRAMS</h2>
        <div class="d-flex justify-content-center">
          <div class="bg-warning" style="height: 10px; width: 100px; border-radius: 100px ;"></div>
        </div>
        <p class="mt-4 text-secondary col-lg-8 mx-auto" style="font-weight: 800;">
          Tingkatkan karier di dunia teknologi dengan kursus coding dari mentor profesional. Mulai dari pemula hingga mahir,
           kami menyediakan program yang dirancang untuk membantumu sukses di industri IT.
        </p>
      </div>

      <!-- Sınıf Kategorileri -->
      <ul class="nav nav-pills justify-content-center gap-4 flex-wrap mb-5" id="classesTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active px-4 py-2" id="yoga-tab" data-bs-toggle="pill" href="#yoga-content" role="tab">Python</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link px-4 py-2" id="group-tab" data-bs-toggle="pill" href="#group-content" role="tab">HTML & CSS</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link px-4 py-2" id="solo-tab" data-bs-toggle="pill" href="#solo-content" role="tab">JavaScript</a>
        </li>
      </ul>

      <!-- İçerik Alanı -->
      <div class="tab-content">
        <!-- Yoga İçeriği -->
        <div class="tab-pane fade show active" id="yoga-content">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <h3 class="fw-bold mb-4">Apa itu Python?</h3>
              <p class="text-secondary mb-4">
                Python adalah bahasa pemrograman yang mudah dipahami dan serbaguna.
                Cocok untuk pengembangan web, data science, kecerdasan buatan, dan otomatisasi.
              </p>

              <h3 class="fw-bold mb-4">Apa yang akan dipelajari?</h3>
              <p class="text-secondary mb-4">
               1.Sintaks dasar Python
              </p>
              <p class="text-secondary mb-4">
                2.Variabel, tipe data, dan struktur kontrol
              </p>
              <p class="text-secondary mb-4">
                3.Pengenalan ke data science dan machine learning.
              </p>

              <h4 class="fw-bold mb-4">Jadwal Kelas:</h4>
              <div class="schedule">
                <p class="mb-2">Sabtu - Minggu: 08.00 - 10.00</p>
              </div>
            </div>
            <div class="col-lg-6">
              <img src="images/js.jpg" alt="Yoga Practice" class="img-fluid rounded">
            </div>
          </div>
        </div>

        <!-- Group İçeriği -->
        <div class="tab-pane fade" id="group-content">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <h3 class="fw-bold mb-4">Apa itu HTML & CSS?</h3>
              <p class="text-secondary mb-4">
                HTML digunakan untuk membangun struktur halaman web,
                 sementara CSS digunakan untuk mendesain tampilan agar lebih menarik dan responsif.
              </p>

              <h3 class="fw-bold mb-4">Apa yang akan dipelajari?</h3>
              <p class="text-secondary mb-4">
               1.Dasar-dasar HTML (tag, elemen, atribut)
              </p>
              <p class="text-secondary mb-4">
                2.CSS Styling dan Layouting
              </p>
              <p class="text-secondary mb-4">
                3.Membuat website yang responsif dengan Flexbox dan Grid
              </p>


              <h4 class="fw-bold mb-4">Jadwal Kelas</h4>
              <div class="schedule">
                <p class="mb-2">Senin - Selasa: 10.00 - 12.00
                </p>
              </div>
            </div>
            <div class="col-lg-6">
              <img src="images/html.jpg" alt="Group Training" class="img-fluid rounded">
            </div>
          </div>
        </div>

        <!-- Solo İçeriği -->
        <div class="tab-pane fade" id="solo-content">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <h3 class="fw-bold mb-4">Apa itu JavaScript?</h3>
              <p class="text-secondary mb-4">
                JavaScript adalah bahasa pemrograman yang digunakan untuk membuat website lebih interaktif dan dinamis.
              </p>

              <h3 class="fw-bold mb-4">Apa yang akan dipelajari?</h3>
              <p class="text-secondary mb-4">
               1.Sintaks dasar JavaScript
              </p>
              <p class="text-secondary mb-4">
                2.DOM Manipulation (interaksi dengan HTML dan CSS)
              </p>
              <p class="text-secondary mb-4">
                3.Event Handling dan Animasi
              </p>

              <h4 class="fw-bold mb-4">Jadwal Kelas</h4>
              <div class="schedule">
                <p class="mb-2">Rabu - Jumat: 15.00 - 18.00</p>
              </div>
            </div>
            <div class="col-lg-6">
              <img src="images/c++.jpg" alt="Personal Training" class="img-fluid rounded">
            </div>
          </div>
        </div>
    </div>
  </section>

  <section id="bmi-calculator" class="py-5 bg-light">
    <div class="container">
      <div class="row">
  <section id="trainers" class="py-5">
    <div class="container">
      <!-- Başlık -->
      <div class="text-center mb-5">
        <h2 class="display-4 fw-bold text-primary">🚀 LEARN FROM THE BEST INSTRUCTORS</h2>
        <div class="d-flex justify-content-center">
          <div class="bg-warning" style="height: 10px; width: 100px; border-radius: 100px;"></div>
        </div>
        <p class="mt-4 text-secondary col-lg-8 mx-auto" style="font-weight: 800;">
          Dapatkan pengalaman belajar dari instruktur berpengalaman di industri teknologi. 
          Dengan metode praktis dan studi kasus nyata, kami membimbing Anda menjadi profesional siap kerja!
        </p>
      </div>

      <!-- Trainer Cards -->
      <div class="row g-4">
        <!-- Trainer 1 -->
        <div class="col-lg-4">
          <div class="trainer-card">
            <div class="side-left"></div>
            <div class="side-right"></div>
            <div class="trainer-image">
              <img src="images/busis.jpeg" alt="Trainer">
              <div class="trainer-info">
                <h4 class="trainer-name">Siska Rahmadani,S.Kom</h4>
                <p class="trainer-title">guru cyber security</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Trainer 3 -->
        <div class="col-lg-4">
          <div class="trainer-card">
            <div class="side-left"></div>
            <div class="side-right"></div>
            <div class="trainer-image">
              <img src="images/paher.jpg" alt="Trainer">
              <div class="trainer-info">
                <h4 class="trainer-name">HERI SRI PURNOMO, S.Kom.</h4>
                <p class="trainer-title">pemrograman WEB</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Trainer 2 -->
        <div class="col-lg-4">
          <div class="trainer-card">
            <div class="side-left"></div>
            <div class="side-right"></div>
            <div class="trainer-image">
              <img src="images/bucic.jpg" alt="Trainer">
              <div class="trainer-info">
                <h4 class="trainer-name">CICIH SRI RAHAYU, S.Kom.</h4>
                <p class="trainer-title">kepala pemrograman</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="purchase" class="py-5">
    <div class="container">
      <!-- Başlık -->
      <div class="text-center mb-5">
        <h2 class="display-4 fw-bold text-primary">BUILD YOUR TECH CAREER WITH US</h2>
        <div class="d-flex justify-content-center">
          <div class="bg-warning" style="height: 10px; width: 100px; border-radius: 100px;"></div>
        </div>
        <p class="mt-4 text-secondary col-lg-8 mx-auto" style="font-weight: 800;">
          Pelajari keterampilan teknologi terbaru dengan kurikulum berbasis industri.
           Dari pemrograman hingga keamanan siber, kami menyediakan kursus lengkap untuk membangun karier impian Anda!
        </p>
      </div>
      <?php
// List gambar secara manual
$images = [
    "images/course1.jpg",
    "images/course2.jpg",
    "images/course3.jpg",
    "images/course4.jpg",
    "images/course5.jpg",
    "images/course6.jpg",
    "images/course7.jpg",
    "images/course8.jpg",
    "images/course9.jpg",
];

$i = 0;
?>

<div class="carousel-container">
    <div class="container py-5">
        <div class="row g-4">
            <?php while ($row = $result->fetch_assoc()) : 
                // Ambil data dari database
                $gambar = $images[$i % count($images)];
                $judul = $row['judul'];
                $deskripsi = $row['deskripsi'];
                $harga_awal = number_format($row['harga'], 0, ',', '.');
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="product-card">
                        <img src="<?= $gambar ?>" alt="<?= htmlspecialchars($judul) ?>" class="product-img">
                        <h3 class="product-title"><?= htmlspecialchars($judul) ?></h3>
                        <p class="product-desc"><?= htmlspecialchars($deskripsi) ?></p>
                        <div class="price-container">
                            <span class="price">Rp<?= $harga_awal ?></span>
                        </div>
                        <a href="transaksi.php?course_id=<?= $row['course_id'] ?>" class="btn btn-primary w-100">Daftar Sekarang</a>
                    </div>
                </div>
            <?php 
                $i++;
            endwhile;
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php $conn->close(); // Tutup koneksi ?>


  </section>

  <section id="reviews" class="py-5">
    <div class="container">
      <!-- Başlık -->
      <div class="text-center mb-5">
        <h2 class="display-4 fw-bold text-primary">BOOTCAMP ALUMNI TESTIMONIALS</h2>
        <div class="d-flex justify-content-center">
          <div class="bg-warning" style="height: 10px; width: 100px; border-radius: 100px;"></div>
        </div>
        <p class="mt-4 text-secondary col-lg-8 mx-auto" style="font-weight: 800;">
          Our graduates share their journey of transformation, from beginners to skilled developers, thanks to our hands-on coding bootcamp.
        </p>
      </div>

      <!-- Review Kartları -->
      <div class="row g-4">
        <!-- Review Card 1 -->
        <div class="col-lg-6">
          <div class="review-card">
            <div class="reviewer-info d-flex align-items-center gap-3 mb-3">
              <img src="images/arip3.jpeg" alt="Reviewer" class="reviewer-img">
              <div>
                <h4 class="reviewer-name mb-0">Ade Arip</h4>
                <p class="reviewer-title mb-0">Bapak Kondangan Yg Gabut</p>
              </div>
            </div>
            <div class="review-content">
              <p>The coding bootcamp was life-changing! In just a few months, I went from zero experience to landing my first job as a front-end developer.
                 The curriculum, mentors, and real-world projects truly prepared me for the tech industry.</p>
            </div>
          </div>
        </div>

        <!-- Review Card 2 -->
        <div class="col-lg-6">
          <div class="review-card">
            <div class="reviewer-info d-flex align-items-center gap-3 mb-3">
              <img src="images/bima.png" alt="Reviewer" class="reviewer-img">
              <div>
                <h4 class="reviewer-name mb-0">Alfiansyah Bima</h4>
                <p class="reviewer-title mb-0">Mas-Mas Kondangan </p>
              </div>
            </div>
            <div class="review-content">
              <p>I was skeptical at first, but this bootcamp exceeded my expectations. 
                The structured learning path, hands-on coding challenges, and supportive community made all the difference.
                 Now, I’m working as a full-stack engineer at a top company!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
                
  <footer class=" text-white py-5">
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

      <!-- Linkler - İki Kolon -->
      <div class="row justify-content-center">
        <!-- Information -->
        <div class="col-md-3 text-center">
          <h4 class="mb-3">Information</h4>
          <ul class="list-unstyled footer-links">
            <li><a href="#" class="text-white text-decoration-none mb-2 d-inline-block">About Us</a></li>
            <li><a href="#" class="text-white text-decoration-none mb-2 d-inline-block">Classes</a></li>
            <li><a href="#" class="text-white text-decoration-none mb-2 d-inline-block">Blog</a></li>
            <li><a href="#" class="text-white text-decoration-none mb-2 d-inline-block">Contact</a></li>
          </ul>
        </div>

        <!-- Helpful Links -->
        <div class="col-md-3 text-center">
          <h4 class="mb-3">Helpful Links</h4>
          <ul class="list-unstyled footer-links">
            <li><a href="#" class="text-white text-decoration-none mb-2 d-inline-block">Services</a></li>
            <li><a href="#" class="text-white text-decoration-none mb-2 d-inline-block">Supports</a></li>
            <li><a href="#" class="text-white text-decoration-none mb-2 d-inline-block">Terms & Condition</a></li>
            <li><a href="#" class="text-white text-decoration-none mb-2 d-inline-block">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>
</html>