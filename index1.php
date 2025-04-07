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
  <title>VroomVibes - Home</title>
  <link rel="stylesheet" href="Style1.css">
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
  <section class="hero">
    <h1>Find the Perfect Car for Your Trip</h1>
  
  </section>
  <section class="featured-cars">
    <h2>Featured Cars</h2>
    <div class="car-grid">
      <!-- SUV - Luxury -->
      <div class="car-card">
        <img src="images/home/SUV.jpg" alt="SUV - Luxury">
        <h3>SUV - Luxury</h3>
      
        <a href="SUVLuxuryCars.php" class="btn">View All</a>
      </div>
      <!-- Hatchback -->
      <div class="car-card">
        <img src="images/home/hatchback.jpg" alt="Hatchback">
        <h3>Hatchback - Compact</h3>
        
        <a href="HatchbackCars.php" class="btn">View All</a>
      </div>
      <!-- Off-Roading -->
      <div class="car-card">
        <img src="images/home/offroad.avif" alt="Off-Roading">
        <h3>Off-Roading - Adventure</h3>
       
        <a href="OffroadingCars.php" class="btn">View All</a>
      </div>
      <!-- Pickup Truck/Van -->
      <div class="car-card">
        <img src="images/home/pickup.webp" alt="Pickup Truck/Van">
        <h3>Pickup Truck/Van - Utility</h3>
      
        <a href="PickupvanCars.php" class="btn">View All</a>
      </div>
      <!-- Speed Car -->
      <div class="car-card">
        <img src="images/home/speed.jpg" alt="Speed Car">
        <h3>Speed Car - Thrill</h3>
       
        <a href="Speedcars.php" class="btn">View All</a>
      </div>
    </div>
  </section>
  <footer>
    <p>&copy; 2025 VroomVibes.All rights reserved.</p>
    <a href="Contact1.php">Contact Us</a>
  </footer>

  <!-- Back-to-Top Button -->
  <button id="back-to-top" title="Go to top">↑</button>

  <!-- Login Modal -->
  <div id="login-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Login</h2>
      <form id="login-form" onsubmit="handleLogin(event)">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
      </form>
      <p>Don't have an account? <a href="#" id="switch-to-signup">Sign up</a></p>
    </div>
  </div>

  <!-- Signup Modal -->
  <div id="signup-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Signup</h2>
      <form id="signup-form" onsubmit="handleSignup(event)">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="signup-email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="signup-password" name="password" required>
        <button type="submit">Signup</button>
      </form>
      <p>Already have an account? <a href="#" id="switch-to-login">Login</a></p>
    </div>
  </div>

  <!-- Login Success Modal -->
  <div id="login-success-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Login Successful!</h2>
      <p>Welcome back! You have successfully logged in.</p>
      <button id="close-login-success">Close</button>
    </div>
  </div>

  <!-- Signup Success Modal -->
  <div id="signup-success-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Signup Successful!</h2>
      <p>Welcome! Your account has been created successfully.</p>
      <button id="close-signup-success">Close</button>
    </div>
  </div>

  <!-- Contact Success Modal -->
  <div id="contact-success-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Message Sent!</h2>
      <p>Thank you for contacting us. We will get back to you soon.</p>
      <button id="close-contact-success">Close</button>
    </div>
  </div>

  <script src="js1.js"></script>
</body>
</html>