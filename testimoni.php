<?php
require_once 'db.php';
require_once 'layout.php';
?>

<div class="content-card">
  <section id="reviews" class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-4 fw-bold text-primary">BOOTCAMP ALUMNI TESTIMONIALS</h2>
        <div class="d-flex justify-content-center">
          <div class="bg-warning" style="height: 10px; width: 100px; border-radius: 100px;"></div>
        </div>
        <p class="mt-4 text-secondary col-lg-8 mx-auto" style="font-weight: 800;">
          Our graduates share their journey of transformation, from beginners to skilled developers, thanks to our hands-on coding bootcamp.
        </p>
      </div>

      <div class="row g-4">
        <!-- Testimonial 1 -->
        <div class="col-lg-6">
          <div class="review-card">
            <div class="reviewer-info d-flex align-items-center gap-3 mb-3">
              <img src="images/arip3.jpeg" alt="Reviewer" class="reviewer-img">
              <div>
                <h4 class="reviewer-name mb-0">Ade Arip</h4>
                <p class="reviewer-title mb-0">Frontend Developer</p>
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
            <div class="review-content">
              <p>The coding bootcamp was life-changing! In just a few months, I went from zero experience to landing my first job as a front-end developer.
                The curriculum, mentors, and real-world projects truly prepared me for the tech industry.</p>
            </div>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="col-lg-6">
          <div class="review-card">
            <div class="reviewer-info d-flex align-items-center gap-3 mb-3">
              <img src="images/bima.png" alt="Reviewer" class="reviewer-img">
              <div>
                <h4 class="reviewer-name mb-0">Alfiansyah Bima</h4>
                <p class="reviewer-title mb-0">Fullstack Developer</p>
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
            <div class="review-content">
              <p>I was skeptical at first, but this bootcamp exceeded my expectations. 
                The structured learning path, hands-on coding challenges, and supportive community made all the difference.
                Now, I'm working as a full-stack engineer at a top company!</p>
            </div>
          </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="col-lg-6">
          <div class="review-card">
            <div class="reviewer-info d-flex align-items-center gap-3 mb-3">
              <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Reviewer" class="reviewer-img">
              <div>
                <h4 class="reviewer-name mb-0">Sarah Johnson</h4>
                <p class="reviewer-title mb-0">Data Scientist</p>
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
            <div class="review-content">
              <p>As a career switcher, I was nervous about breaking into tech. The bootcamp gave me the skills and confidence I needed. 
                The Python and data science courses were exceptional, and I landed a data scientist role within 2 months of graduating!</p>
            </div>
          </div>
        </div>

        <!-- Testimonial 4 -->
        <div class="col-lg-6">
          <div class="review-card">
            <div class="reviewer-info d-flex align-items-center gap-3 mb-3">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Reviewer" class="reviewer-img">
              <div>
                <h4 class="reviewer-name mb-0">Michael Chen</h4>
                <p class="reviewer-title mb-0">DevOps Engineer</p>
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
              </div>
            </div>
            <div class="review-content">
              <p>The comprehensive curriculum covered everything from frontend to backend and even DevOps. 
                The career support team helped me polish my resume and prepare for interviews. 
                I received multiple job offers before graduation!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// JavaScript khusus untuk halaman testimonials bisa ditambahkan di sini
document.addEventListener('DOMContentLoaded', function() {
  console.log('Testimonials page loaded');
});
</script>

<?php $conn->close(); ?>