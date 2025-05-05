<!-- File: footer.php -->
<footer class="bg-dark text-white py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 text-center text-md-start">
        <p class="mb-0 text-white-50">&copy; 2023 BYTEX. All rights reserved.</p>
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