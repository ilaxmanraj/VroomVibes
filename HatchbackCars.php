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
    <h1 align="center";>Hatchbacks - Compact</h1>
    <div class="car-grid">
      <!-- SUV - Luxury -->
      <div class="car-card">
        <img src="images/home/hatchback.jpg" alt="SUV - Luxury">
        <h3>Mini Cooper</h3>
      
        <a href="previewdetails.php?id=7" class="btn">Book Now</a>
      </div>
        <!-- SUV - Luxury -->
        <div class="car-card">
          <img src="images/home/vologolf.avif" alt="SUV - Luxury">
          <h3>VW Golf</h3>
          <a href="previewdetails.php?id=8" class="btn">Book Now</a>
        </div>
          <!-- SUV - Luxury -->
          <div class="car-card">
            <img src="images/home/volvo60.jpg" alt="SUV - Luxury">
            <h3>Volvo XC60</h3>
          
            <a href="previewdetails.php?id=9" class="btn">Book Now</a>
          </div>
            <!-- SUV - Luxury -->
            <div class="car-card">
              <img src="images/home/bmwx3.jpg" alt="SUV - Luxury">
              <h3>BMW X3</h3>
            
              <a href="previewdetails.php?id=10" class="btn">Book Now</a>
            </div>
              <!-- SUV - Luxury -->
              <div class="car-card">
                <img src="images/home/audiq3.jpg" alt="SUV - Luxury">
                <h3>Audi Q3</h3>
              
                <a href="previewdetails.php?id=11" class="btn">Book Now</a>
              </div>
              <div class="car-card">
                <img src="images/home/cydly.jpg" alt="SUV - Luxury">
                <h3>Cadillac Lyriq</h3>
              
                <a href="previewdetails.php?id=12" class="btn">Book Now</a>
              </div>
            </div>
  <footer>
    <p>&copy; 2025 VroomVibes. All rights reserved.</p>
    <a href="Contact1.php">Contact Us</a>
  </footer>

  <script src="js1.js"></script>
</body>
</html>