<?php
require_once 'layout.php';

// Ambil data user dari session
$user_id = $_SESSION['user_id'] ?? null;
$nama_user = $_SESSION['nama_user'] ?? 'User';

// Query untuk mendapatkan kursus user
$sql = "SELECT c.course_id, c.judul, c.deskripsi, uc.status, uc.progress
        FROM user_courses uc
        JOIN courses c ON uc.course_id = c.course_id
        WHERE uc.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$on_going_courses = [];
$completed_courses = [];

while ($row = $result->fetch_assoc()) {
    if ($row['progress'] == 100) {
        $completed_courses[] = $row;
    } else {
        $on_going_courses[] = $row;
    }
}
?>

        <div class="container-fluid">
            <div class="row">
                <main class="col-md-12 px-md-4">
                    <div class="py-4">
                        <h2>Hai, <?= htmlspecialchars($nama_user); ?> 👋</h2>
                        <p class="text-muted">Selamat datang kembali! Lanjutkan belajar yuk~</p>

                        <!-- Tabs -->
                        <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="ongoing-tab" data-bs-toggle="tab" data-bs-target="#ongoing" type="button" role="tab">Kelas yang Dipelajari</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">Kelas yang Diselesaikan</button>
                            </li>
                        </ul>
                        
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="ongoing" role="tabpanel">
                                <?php if (!empty($on_going_courses)): ?>
                                    <div class="row mt-3">
                                        <?php foreach ($on_going_courses as $course): ?>
                                            <div class="col-md-4 mb-4">
                                                <div class="card p-3 h-100">
                                                    <h5 class="card-title text-primary fw-bold"><?= htmlspecialchars($course['judul']); ?></h5>
                                                    <p class="text-muted small"><?= htmlspecialchars($course['deskripsi']); ?></p>
                                                    <span class="badge bg-warning text-dark">Status: <?= htmlspecialchars($course['status']); ?></span>
                                                    <div class="progress mt-2">
                                                        <div class="progress-bar" role="progressbar" style="width: <?= $course['progress']; ?>%;"><?= $course['progress']; ?>%</div>
                                                    </div>
                                                    <a href="modul.php?course_id=<?= $course['course_id']; ?>" class="btn btn-primary btn-sm mt-3">Lanjutkan Belajar</a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-info mt-3">Belum ada kelas yang dipelajari.</div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="tab-pane fade" id="completed" role="tabpanel">
                                <?php if (!empty($completed_courses)): ?>
                                    <div class="row mt-3">
                                        <?php foreach ($completed_courses as $course): ?>
                                            <div class="col-md-4 mb-4">
                                                <div class="card p-3 h-100 border-success">
                                                    <h5 class="card-title text-success fw-bold"><?= htmlspecialchars($course['judul']); ?></h5>
                                                    <p class="text-muted small"><?= htmlspecialchars($course['deskripsi']); ?></p>
                                                    <span class="badge bg-success">Selesai</span>
                                                    <div class="progress mt-2">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;">100%</div>
                                                    </div>
                                                    <a href="sertifikat.php?course_id=<?= $course['course_id']; ?>" class="btn btn-success btn-sm mt-3">Lihat Sertifikat</a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-warning mt-3">Belum ada kelas yang diselesaikan.</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div> <!-- penutup main-content -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');
            
            if (window.innerWidth <= 768 && !sidebar.contains(event.target) && event.target !== toggleBtn) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>
</html>