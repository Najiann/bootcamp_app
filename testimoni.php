<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logoYGINI.png">
  <title>BYTEX - Testimonials</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome@6.5.1/css/all.min.css">
  <style>
    .testimonial-header {
      background: linear-gradient(135deg, #f093fb, #f5576c);
      padding: 80px 0;
      color: white;
      margin-bottom: 50px;
    }
    .review-card {
      background: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      height: 100%;
    }
    .review-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    .reviewer-img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #007bff;
    }
    .reviewer-name {
      font-weight: 700;
      color: #2c3e50;
    }
    .reviewer-title {
      color: #7f8c8d;
      font-style: italic;
    }
    .review-content {
      color: #34495e;
      line-height: 1.8;
      position: relative;
      padding-top: 20px;
    }
    .review-content:before {
      content: '"';
      font-size: 60px;
      color: #007bff;
      opacity: 0.2;
      position: absolute;
      top: -20px;
      left: -10px;
      font-family: serif;
    }
    .rating {
      color: #f39c12;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <?php include 'header.php'; ?>

  <section class="testimonial-header text-center">
    <div class="container">
      <h1 class="display-4 fw-bold mb-4">Success Stories</h1>
      <p class="lead">Hear from our graduates about their journey in tech</p>
    </div>
  </section>

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

        <!-- Testimonial 3 - Added new testimonial -->
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

        <!-- Testimonial 4 - Added new testimonial -->
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

  <?php include 'footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>