<!-- File: footer.php -->
<footer class="bg-dark text-white py-5">
  <div class="container">
    <div class="row">
      <!-- Logo dan Deskripsi -->
      <div class="col-lg-4 mb-4 mb-lg-0">
        <img src="images/logoYGINI.png" alt="BYTEX Logo" class="mb-3" style="max-height: 60px;">
        <p class="text-white-50" style="font-weight: 500;">
          Empowering future developers through hands-on coding experience and industry-relevant skills. 
          Join our bootcamp and transform your career in tech!
        </p>
        <div class="social-icons mt-4">
          <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-4" style="color: #00bfff;">Quick Links</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="index.php" class="text-white-50 text-decoration-none">Home</a></li>
          <li class="mb-2"><a href="courses.php" class="text-white-50 text-decoration-none">Courses</a></li>
          <li class="mb-2"><a href="mentors.php" class="text-white-50 text-decoration-none">Mentors</a></li>
          <li class="mb-2"><a href="testimonials.php" class="text-white-50 text-decoration-none">Testimonials</a></li>
          <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Blog</a></li>
        </ul>
      </div>

      <!-- Support -->
      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-4" style="color: #00bfff;">Support</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">FAQ</a></li>
          <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a></li>
          <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Terms of Service</a></li>
          <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Careers</a></li>
          <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Contact Us</a></li>
        </ul>
      </div>

      <!-- Newsletter -->
      <div class="col-lg-4">
        <h5 class="text-uppercase mb-4" style="color: #00bfff;">Newsletter</h5>
        <p class="text-white-50 mb-4" style="font-weight: 500;">
          Subscribe to our newsletter for the latest updates on courses and tech trends.
        </p>
        <form class="mb-3">
          <div class="input-group">
            <input type="email" class="form-control" placeholder="Your Email" aria-label="Your Email">
            <button class="btn btn-primary" type="submit">Subscribe</button>
          </div>
        </form>
        <div class="contact-info">
          <p class="mb-2 text-white-50"><i class="fas fa-envelope me-2"></i> info@bytex.com</p>
          <p class="mb-2 text-white-50"><i class="fas fa-phone me-2"></i> +62 123 4567 890</p>
          <p class="mb-0 text-white-50"><i class="fas fa-map-marker-alt me-2"></i> Jakarta, Indonesia</p>
        </div>
      </div>
    </div>

    <hr class="my-4 bg-secondary">

    <div class="row align-items-center">
      <div class="col-md-6 text-center text-md-start">
        <p class="mb-0 text-white-50">&copy; 2023 BYTEX. All rights reserved.</p>
      </div>
      <div class="col-md-6 text-center text-md-end">
        <div class="payment-methods">
          <img src="https://via.placeholder.com/40x25?text=VISA" alt="Visa" class="me-2">
          <img src="https://via.placeholder.com/40x25?text=MC" alt="Mastercard" class="me-2">
          <img src="https://via.placeholder.com/40x25?text=PP" alt="PayPal" class="me-2">
          <img src="https://via.placeholder.com/40x25?text=BCA" alt="Bank Transfer">
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Back to Top Button -->
<a href="#" class="btn btn-primary btn-lg back-to-top" style="position: fixed; bottom: 20px; right: 20px; display: none;">
  <i class="fas fa-arrow-up"></i>
</a>

<script>
  // Back to top button
  window.addEventListener('scroll', function() {
    var backToTop = document.querySelector('.back-to-top');
    if (window.pageYOffset > 300) {
      backToTop.style.display = 'block';
    } else {
      backToTop.style.display = 'none';
    }
  });

  document.querySelector('.back-to-top').addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({top: 0, behavior: 'smooth'});
  });
</script>