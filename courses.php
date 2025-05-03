<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

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

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logoYGINI.png">
  <title>BYTEX - Courses</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome@6.5.1/css/all.min.css">
  <style>
    .course-header {
      background: linear-gradient(135deg, #6366F1, #3B82F6); /* soft elegant gradient */
      padding: 80px 0;
      color: white;
      margin-bottom: 50px;
    }
    .course-card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      height: 100%;
    }
    .course-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    .course-img {
      height: 200px;
      object-fit: cover;
      width: 100%;
    }
    .course-body {
      padding: 20px;
    }
    .course-title {
      font-weight: 700;
      margin-bottom: 15px;
      color: #1E293B; /* navy-gray */
    }
    .course-desc {
      color: #64748B; /* gray soft */
      margin-bottom: 20px;
    }
    .price {
      font-weight: 700;
      color: #F97316; /* orange aksen */
      font-size: 1.2rem;
    }
    .category-badge {
      position: absolute;
      top: 10px;
      right: 10px;
      background: #F97316;
      color: white;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
    }
    .filter-buttons {
      margin-bottom: 30px;
    }
    .filter-btn {
      margin: 0 5px;
      border-radius: 20px;
      color: #2563EB;
      border-color: #2563EB;
    }
    .filter-btn.active,
    .filter-btn:hover {
      background-color: #2563EB;
      color: white;
      border-color: #2563EB;
    }

  </style>
</head>
<body>
  <?php include 'header.php'; ?>

  <section id="courses" class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-4 fw-bold text-primary">OUR CODING PROGRAMS</h2>
        <div class="d-flex justify-content-center">
          <div class="bg-warning" style="height: 10px; width: 100px; border-radius: 100px;"></div>
        </div>
      </div>

      <div class="filter-buttons text-center">
        <button class="filter-btn btn btn-outline-primary active" data-filter="all">All Courses</button>
        <button class="filter-btn btn btn-outline-primary" data-filter="python">Python</button>
        <button class="filter-btn btn btn-outline-primary" data-filter="web">Web Development</button>
        <button class="filter-btn btn btn-outline-primary" data-filter="javascript">JavaScript</button>
      </div>

      <div class="row g-4">
        <?php while ($row = $result->fetch_assoc()) : 
          $gambar = $images[$i % count($images)];
          $judul = $row['judul'];
          $deskripsi = $row['deskripsi'];
          $harga_awal = number_format($row['harga'], 0, ',', '.');
          $category = strtolower(explode(' ', $judul)[0]);
        ?>
          <div class="col-lg-4 col-md-6 course-item" data-category="<?= $category ?>">
            <div class="course-card">
              <img src="<?= $gambar ?>" class="course-img" alt="<?= htmlspecialchars($judul) ?>">
              <div class="course-body">
                <h3 class="course-title"><?= htmlspecialchars($judul) ?></h3>
                <p class="course-desc"><?= htmlspecialchars($deskripsi) ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">Rp<?= $harga_awal ?></span>
                  <a href="transaksi.php?course_id=<?= $row['course_id'] ?>" class="btn btn-primary">Enroll Now</a>
                </div>
              </div>
            </div>
          </div>
        <?php 
          $i++;
        endwhile;
        ?>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const filterButtons = document.querySelectorAll('.filter-btn');
      
      filterButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Remove active class from all buttons
          filterButtons.forEach(btn => btn.classList.remove('active'));
          // Add active class to clicked button
          this.classList.add('active');
          
          const filterValue = this.getAttribute('data-filter');
          const courseItems = document.querySelectorAll('.course-item');
          
          courseItems.forEach(item => {
            if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
              item.style.display = 'block';
            } else {
              item.style.display = 'none';
            }
          });
        });
      });
    });
  </script>
</body>
</html>
<?php $conn->close(); ?>