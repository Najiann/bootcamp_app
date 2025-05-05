<?php
require_once 'db.php';
require_once 'layout.php';

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

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
?>

<div class="content-card">
    <!-- Courses Section -->
    <section id="courses" class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Find Your Perfect Course</h2>
                <p class="text-muted">Choose from our wide range of programming courses</p>
                <div class="divider"></div>
            </div>

            <!-- Filter Buttons -->
            <div class="filter-buttons text-center mb-5">
                <button class="filter-btn btn btn-outline-primary active" data-filter="all">All Courses</button>
                <button class="filter-btn btn btn-outline-primary" data-filter="python">Python</button>
                <button class="filter-btn btn btn-outline-primary" data-filter="web">Web Dev</button>
                <button class="filter-btn btn btn-outline-primary" data-filter="data">Data Science</button>
                <button class="filter-btn btn btn-outline-primary" data-filter="mobile">Mobile</button>
            </div>

            <!-- Courses Grid -->
            <div class="row g-4">
                <?php 
                $i = 0;
                while ($row = $result->fetch_assoc()) : 
                    $gambar = $images[$i % count($images)];
                    $judul = $row['judul'];
                    $deskripsi = $row['deskripsi'];
                    $harga_awal = number_format($row['harga'], 0, ',', '.');
                    $category = strtolower(explode(' ', $judul)[0]);
                    $isNew = ($i % 3 == 0);
                ?>
                    <div class="col-lg-4 col-md-6 course-item" data-category="<?= $category ?>">
                        <div class="course-card">
                            <img src="<?= $gambar ?>" class="course-img" alt="<?= htmlspecialchars($judul) ?>">
                            <div class="course-body">
                                <h3 class="course-title"><?= htmlspecialchars($judul) ?></h3>
                                <p class="course-desc"><?= htmlspecialchars($deskripsi) ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price-tag">Rp<?= $harga_awal ?></span>
                                    <a href="transaksi.php?course_id=<?= $row['course_id'] ?>" class="btn btn-enroll">
                                        <i class="fas fa-arrow-right me-1"></i> Enroll
                                    </a>
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
</div>

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
                if (filterValue === 'all' || item.getAttribute('data-category').includes(filterValue)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>

<?php $conn->close(); ?>