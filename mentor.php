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
  <title>BYTEX - Mentors</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome@6.5.1/css/all.min.css">
  <style>
    .trainer-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
      height: 100%;
    }
    .trainer-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .trainer-image {
      position: relative;
      height: 300px;
      overflow: hidden;
    }
    .trainer-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }
    .trainer-card:hover .trainer-image img {
      transform: scale(1.05);
    }
    .trainer-info {
      padding: 20px;
      background: linear-gradient(135deg, #007bff, #00bfff);
      color: white;
    }
    .trainer-name {
      font-weight: 700;
      margin-bottom: 5px;
    }
    .trainer-title {
      font-style: italic;
      opacity: 0.9;
    }
    .mentor-header {
      background: linear-gradient(135deg, #007bff, #00bfff);
      padding: 50px 0;
      color: white;
      margin-bottom: 50px;
    }
  </style>
</head>
<body>
  <?php include 'header.php'; ?>

  <section id="trainers" class="py-5">
    <div class="container">
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

      <div class="row g-4">
        <!-- Mentor 1 -->
        <div class="col-lg-4 col-md-6">
          <div class="trainer-card">
            <div class="trainer-image">
              <img src="images/busis.jpeg" alt="Trainer">
            </div>
            <div class="trainer-info">
              <h4 class="trainer-name">Siska Rahmadani, S.Kom</h4>
              <p class="trainer-title">Cyber Security Expert</p>
            </div>
          </div>
        </div>
        
        <!-- Mentor 2 -->
        <div class="col-lg-4 col-md-6">
          <div class="trainer-card">
            <div class="trainer-image">
              <img src="images/paher.jpg" alt="Trainer">
            </div>
            <div class="trainer-info">
              <h4 class="trainer-name">HERI SRI PURNOMO, S.Kom.</h4>
              <p class="trainer-title">Web Development Specialist</p>
            </div>
          </div>
        </div>
        
        <!-- Mentor 3 -->
        <div class="col-lg-4 col-md-6">
          <div class="trainer-card">
            <div class="trainer-image">
              <img src="images/bucic.jpg" alt="Trainer">
            </div>
            <div class="trainer-info">
              <h4 class="trainer-name">CICIH SRI RAHAYU, S.Kom.</h4>
              <p class="trainer-title">Head of Programming</p>
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