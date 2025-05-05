<?php
require_once 'db.php';
require_once 'layout.php';
?>

<div class="content-card">
  <section class="mentor-header text-center">
    <div class="container">
      <h1>Belajar dari Mentor Profesional</h1>
      <p>Platform mentoring BYTEX didesain untuk menghubungkan mentor dan mentee, membangun koneksi yang berkesinambungan untuk mengembangkan karir pengembang terbaik.</p>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <div class="row">
        <!-- Mentor 1 -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="mentor-card">
            <div class="mentor-image">
              <img src="images/busis.jpeg" alt="Siska Rahmadani">
            </div>
            <div class="mentor-body">
              <h5 class="mentor-name">Siska Rahmadani, S.Kom</h5>
              <div class="mentor-company">
                <i class="fas fa-building"></i> Cyber Security Expert
              </div>
              <div class="mentor-skills">
                <span class="skill-tag">Cyber Security</span>
                <span class="skill-tag">Ethical Hacking</span>
                <span class="skill-tag">Network Security</span>
              </div>
              <div class="mentor-exp">
                <i class="fas fa-briefcase"></i> 5+ Tahun pengalaman di industri
              </div>
              <div class="mentor-actions">
                <button class="btn btn-book btn-mentor">Book mentoring</button>
                <button class="btn btn-profile btn-mentor">Profile Lengkap</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Mentor 2 -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="mentor-card">
            <div class="mentor-image">
              <img src="images/paher.jpg" alt="Heri Sri Purnomo">
            </div>
            <div class="mentor-body">
              <h5 class="mentor-name">HERI SRI PURNOMO, S.Kom.</h5>
              <div class="mentor-company">
                <i class="fas fa-building"></i> Web Development Specialist
              </div>
              <div class="mentor-skills">
                <span class="skill-tag">Front-End</span>
                <span class="skill-tag">Back-End</span>
                <span class="skill-tag">Project Management</span>
              </div>
              <div class="mentor-exp">
                <i class="fas fa-briefcase"></i> 4 Tahun pengalaman di industri
              </div>
              <div class="mentor-actions">
                <button class="btn btn-book btn-mentor">Book mentoring</button>
                <button class="btn btn-profile btn-mentor">Profile Lengkap</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Mentor 3 -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="mentor-card">
            <div class="mentor-image">
              <img src="images/bucic.jpg" alt="Cicih Sri Rahayu">
            </div>
            <div class="mentor-body">
              <h5 class="mentor-name">CICIH SRI RAHAYU, S.Kom.</h5>
              <div class="mentor-company">
                <i class="fas fa-building"></i> Head of Programming
              </div>
              <div class="mentor-skills">
                <span class="skill-tag">Full-Stack</span>
                <span class="skill-tag">Mobile Dev</span>
                <span class="skill-tag">UI/UX</span>
              </div>
              <div class="mentor-exp">
                <i class="fas fa-briefcase"></i> 6 Tahun pengalaman di industri
              </div>
              <div class="mentor-actions">
                <button class="btn btn-book btn-mentor">Book mentoring</button>
                <button class="btn btn-profile btn-mentor">Profile Lengkap</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Mentor 4 -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="mentor-card">
            <div class="mentor-image">
              <img src="images/fiki.png" alt="Sample Mentor">
            </div>
            <div class="mentor-body">
              <h5 class="mentor-name">ALFIKI DIASTAMA AFAN FIRDAUS</h5>
              <div class="mentor-company">
                <i class="fas fa-building"></i> Machine Learning Mentor At Dicoding
              </div>
              <div class="mentor-skills">
                <span class="skill-tag">Computer Vision</span>
                <span class="skill-tag">Machine Learning</span>
              </div>
              <div class="mentor-exp">
                <i class="fas fa-briefcase"></i> 4 Tahun pengalaman di industri
              </div>
              <div class="mentor-actions">
                <button class="btn btn-book btn-mentor">Book mentoring</button>
                <button class="btn btn-profile btn-mentor">Profile Lengkap</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Premium Mentoring Section -->
      <div class="premium-section text-center">
        <h3 class="premium-title">Premium Mentoring Session</h3>
        <p>BYTEX telah melakukan kurasi terhadap orang-orang terbaik di industrinya untuk berbagi pengetahuan dengan Anda.</p>
        <div class="premium-price">Rp200.000 <small>Per 30 menit sesi mentoring</small></div>
        <p>Dapatkan potongan harga menarik dengan mengunjungi tautan berikut</p>
        
        <ul class="premium-features text-start mx-auto" style="max-width: 300px;">
          <li><i class="fas fa-check-circle"></i> Knowledge sharing premium</li>
          <li><i class="fas fa-check-circle"></i> Problem solving</li>
          <li><i class="fas fa-check-circle"></i> Networking dengan practitioner</li>
          <li><i class="fas fa-check-circle"></i> Career advice</li>
        </ul>
      </div>
    </div>
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// JavaScript khusus untuk halaman mentors bisa ditambahkan di sini
document.addEventListener('DOMContentLoaded', function() {
  // Contoh: Tambahkan event listener untuk tombol book mentoring
  document.querySelectorAll('.btn-book').forEach(button => {
    button.addEventListener('click', function() {
      alert('Fitur booking mentor akan segera tersedia!');
    });
  });
});
</script>

<?php $conn->close(); ?>