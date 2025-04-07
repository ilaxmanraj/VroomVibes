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
    <h1 align="center";>SUV - Luxury</h1>
    <div class="car-grid">
      <!-- SUV - Luxury -->
      <div class="car-card">
        <img src="images/home/SUV.jpg" alt="SUV - Luxury">
        <h3>Lexus LX 600</h3>
      
        <a href="previewdetails.php?id=1" class="btn">Book Now</a>
      </div>
        <!-- SUV - Luxury -->
        <div class="car-card">
          <img src="images/home/rrc.jpg" alt="SUV - Luxury">
          <h3>Rolls Royce Cullinan</h3>
        
          <a href="previewdetails.php?id=2" class="btn">Book Now</a>
        </div>
          <!-- SUV - Luxury -->
          <div class="car-card">
            <img src="images/home/porce.jpg" alt="SUV - Luxury">
            <h3>Porsche Cayenne</h3>
          
            <a href="previewdetails.php?id=3" class="btn">Book Now</a>
          </div>
            <!-- SUV - Luxury -->
            <div class="car-card">
              <img src="images/home/bently.webp" alt="SUV - Luxury">
              <h3>Bentley Bentayga</h3>
            
              <a href="previewdetails.php?id=4" class="btn">Book Now</a>
            </div>
              <!-- SUV - Luxury -->
              <div class="car-card">
                <img src="images/home/urus.jpg" alt="SUV - Luxury">
                <h3>Lambhorghini Urus</h3>
              
                <a href="previewdetails.php?id=5" class="btn">Book Now</a>
              </div>
              <div class="car-card">
                <img src="images/home/volvo.jpeg" alt="SUV - Luxury">
                <h3>Volvo XC90</h3>
              
                <a href="previewdetails.php?id=6" class="btn">Book Now</a>
              </div>
            </div>
  <footer>
    <p>&copy; 2025 VroomVibes. All rights reserved.</p>
    <a href="Contact1.html">Contact Us</a>
  </footer>

  <script src="js1.js"></script>
</body>
</html>