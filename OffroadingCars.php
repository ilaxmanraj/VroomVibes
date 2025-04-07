<?php
// Start the session
session_start();

// Check if the user is logged in
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SUV - Luxury</title>
  <link rel="stylesheet" href="SUVLuxury1.css">
</head>
<body>
  <header>
  <h2 align ="left";>VroomVibes</h2>
    <nav>
      <a href="index1.php">Home</a>
      <a href="cars1.php">Cars</a>
      <a href="Contact1.php">Contact</a>
      <?php if ($user_name): ?>
      <p style="display: inline; margin-left: 20px;">Welcome, <?php echo htmlspecialchars($user_name); ?>!</p>
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="login.html">Login</a>
      <a href="Signup.html">Signup</a>
    <?php endif; ?>
    </nav>
  </header>
  <section class="car-details">
    <h1 align="center";>Off-Roading - Adventure</h1>
    <div class="car-grid">
      <!-- SUV - Luxury -->
      <div class="car-card">
        <img src="images/home/offroad.avif" alt="SUV - Luxury">
        <h3>Jeep Wrangler</h3>
      
        <a href="previewdetails.php?id=13" class="btn">Book Now</a>
      </div>
        <!-- SUV - Luxury -->
        <div class="car-card">
          <img src="images/home/forcegurka.webp" alt="SUV - Luxury">
          <h3>Force Gurka</h3>
        
          <a href="previewdetails.php?id=14" class="btn">Book Now</a>
        </div>
          <!-- SUV - Luxury -->
          <div class="car-card">
            <img src="images/home/gwagon.avif" alt="SUV - Luxury">
            <h3>G Wagon</h3>
          
            <a href="previewdetails.php?id=15" class="btn">Book Now</a>
          </div>
            <!-- SUV - Luxury -->
            <div class="car-card">
              <img src="images/home/bronco.avif" alt="SUV - Luxury">
              <h3>Ford Bronco</h3>
            
              <a href="previewdetails.php?id=16" class="btn">Book Now</a>
            </div>
              <!-- SUV - Luxury -->
              <div class="car-card">
                <img src="images/home/defender.avif" alt="SUV - Luxury">
                <h3>Defender</h3>
              
                <a href="previewdetails.php?id=17" class="btn">Book Now</a>
              </div>
              <div class="car-card">
                <img src="images/home/landc.jpg" alt="SUV - Luxury">
                <h3>Toyota Land Crusier</h3>
              
                <a href="previewdetails.php?id=18" class="btn">Book Now</a>
              </div>
            </div>
  <footer>
    <p>&copy; 2025 VroomVibes. All rights reserved.</p>
    <a href="Contact1.html">Contact Us</a>
  </footer>

  <script src="js1.js"></script>
</body>
</html>