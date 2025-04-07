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
    <h1 align="center";>Speed - Thrill</h1>
    <div class="car-grid">
      <!-- SUV - Luxury -->
      <div class="car-card">
        <img src="images/home/mseries.jpg" alt="SUV - Luxury">
        <h3>BMW M series</h3>
      
        <a href="previewdetails.php?id=25" class="btn">Book Now</a>
      </div>
        <!-- SUV - Luxury -->
        <div class="car-card">
          <img src="images/home/supra.jpg" alt="SUV - Luxury">
          <h3>Toyota Supra</h3>
        
          <a href="previewdetails.php?id=26" class="btn">Book Now</a>
        </div>
          <!-- SUV - Luxury -->
          <div class="car-card">
            <img src="images/home/mustang.jpg" alt="SUV - Luxury">
            <h3>Mustang</h3>
          
            <a href="previewdetails.php?id=27" class="btn">Book Now</a>
          </div>
            <!-- SUV - Luxury -->
            <div class="car-card">
              <img src="images/home/dodge.jpg" alt="SUV - Luxury">
              <h3>Dodge Challenger</h3>
            
              <a href="previewdetails.php?id=28" class="btn">Book Now</a>
            </div>
              <!-- SUV - Luxury -->
              <div class="car-card">
                <img src="images/home/lambo.jpg" alt="SUV - Luxury">
                <h3>Lamborghini Aventador </h3>
              
                <a href="previewdetails.php?id=29" class="btn">Book Now</a>
              </div>
              <div class="car-card">
                <img src="images/home/vwgt.jpg" alt="SUV - Luxury">
                <h3>VW Virtus GT</h3>
              
                <a href="previewdetails.php?id=30" class="btn">Book Now</a>
              </div>
            </div>
  <footer>
    <p>&copy; 2025 VroomVibes. All rights reserved.</p>
    <a href="Contact1.html">Contact Us</a>
  </footer>

  <script src="js1.js"></script>
</body>
</html>