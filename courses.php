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