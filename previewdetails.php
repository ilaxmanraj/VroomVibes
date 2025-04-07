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
  <title>Your Vehicle</title>
  <style>
    /* General Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      background-color: #f4f4f4;
      background-image: url("images/home/bg.webp");
      color: #333;
    }

    /* Header */
    header {
      background-color: #333;
      color: white;
      padding: 1rem;
      text-align: center;
    }

    nav a {
      color: white;
      margin: 0 1rem;
      text-decoration: none;
      font-weight: bold;
    }

    nav a:hover {
      text-decoration: underline;
    }

    /* Car Details Section */
    .car-details {
      padding: 2rem;
      text-align: center;
    }

    .car-details h2 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .car-details img {
      width: 100%;
      max-width: 600px;
      height: auto;
      border-radius: 10px;
      margin-bottom: 1rem;
    }

    .car-details p {
      font-size: 1.2rem;
      margin-bottom: 1rem;
    }

    /* Rental Form */
    #rental-form {
      max-width: 400px;
      margin: 0 auto;
      padding: 1rem;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #rental-form label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
    }

    #rental-form input {
      width: 100%;
      padding: 0.5rem;
      margin-bottom: 1rem;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    #rental-form button {
      width: 100%;
      padding: 0.5rem;
      background-color: #333;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    #rental-form button:hover {
      background-color: #555;
    }

    /* Footer */
    footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 1rem;
      margin-top: 2rem;
    }

    footer a {
      color: white;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: white;
      padding: 2rem;
      border-radius: 10px;
      width: 90%;
      max-width: 400px;
      text-align: center;
      position: relative;
    }

    .modal-content h2 {
      margin-bottom: 1rem;
    }

    .modal-content button {
      padding: 0.5rem 1rem;
      background-color: #333;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .modal-content button:hover {
      background-color: #555;
    }

    .close {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 1.5rem;
      cursor: pointer;
    }
  </style>
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
    <h2 id="car-name">Loading...</h2>
    <img id="car-image" src="" alt="Car Image">
    <p><strong>Price:</strong> <span id="car-price">Loading...</span></p>
    <p><strong>Description:</strong> <span id="car-description">Loading...</span></p>
    
    <!-- Rental Form -->
    <form id="rental-form" onsubmit="handleRental(event)">
      <label for="rental-date">Rental Date:</label>
      <input type="date" id="rental-date" name="rental-date" required>
      
      <label for="rental-time">Rental Time:</label>
      <input type="time" id="rental-time" name="rental-time" required>
      
      <button type="submit" class="btn">Rent Now</button>
    </form>
  </section>
  <footer>
    <p>&copy; 2025 VroomVibes. All rights reserved.</p>
    <a href="Contact1.html">Contact Us</a>
  </footer>

  <!-- Success Modal -->
  <div id="rental-success-modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Rental Successful!</h2>
    <p><strong>Car:</strong> <span id="modal-car-name"></span></p>
    <p><strong>Price:</strong> <span id="modal-car-price"></span></p>
    <p><strong>Rental Date:</strong> <span id="modal-rental-date"></span></p>
    <p>Your rental has been confirmed. Enjoy your trip!</p>
    <button id="close-rental-success">Close</button>
  </div>
</div>

  <script>
      // Display car details when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    displayCarDetails();
  });

  async function fetchCarDetails() {
    try {
      const response = await fetch('cars.json');
      if (!response.ok) throw new Error('Network response was not ok');
      return await response.json();
    } catch (error) {
      console.error('Error fetching car details:', error);
      return [];
    }
  }

  async function displayCarDetails() {
    const carId = parseInt(new URLSearchParams(window.location.search).get('id'));
    if (isNaN(carId)) {
      document.getElementById('car-name').textContent = 'Invalid car ID';
      return;
    }

    const cars = await fetchCarDetails();
    const car = cars.find(c => c.id === carId);

    if (car) {
      document.getElementById('car-name').textContent = car.name;
      
      const carImg = document.getElementById('car-image');
      carImg.src = car.image;
      carImg.alt = car.name;
      
      document.getElementById('car-price').textContent = car.price;
      document.getElementById('car-description').textContent = car.description;
    } else {
      document.getElementById('car-name').textContent = 'Car not found';
    }
  }
async function handleRental(event) {
  event.preventDefault();

  // Get car details from JSON
  const carId = parseInt(new URLSearchParams(window.location.search).get('id'));
  const response = await fetch('cars.json');
  const cars = await response.json();
  const car = cars.find(c => c.id === carId);

  if (!car) {
    alert('Car not found!');
    return;
  }

  // Get form data
  const rentalData = {
    car_id: carId,
    car_name: car.name,
    car_price: car.price,
    rental_date: document.getElementById('rental-date').value,
    rental_time: document.getElementById('rental-time').value,
    user_name: "<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?>"
  };

  // Validate date is in the future
  const today = new Date();
  const rentalDate = new Date(rentalData.rental_date);
  if (rentalDate < today) {
    alert('Please select a future date for rental');
    return;
  }

  // Send data to server
  fetch('submit_rental.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(rentalData),
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // Show success modal with car details
      const modal = document.getElementById('rental-success-modal');
      document.getElementById('modal-car-name').textContent = car.name;
      document.getElementById('modal-car-price').textContent = car.price;
      document.getElementById('modal-rental-date').textContent = rentalData.rental_date;
      modal.style.display = 'flex';
      
      // Close modal handlers
      const closeModal = document.querySelector('#rental-success-modal .close');
      closeModal.onclick = function() {
        modal.style.display = 'none';
      }

      const closeButton = document.getElementById('close-rental-success');
      closeButton.onclick = function() {
        modal.style.display = 'none';
        window.location.href = 'cars1.php'; // Redirect after close
      }

      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = 'none';
        }
      }
    } else {
      alert('Error: ' + data.message);
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert('An error occurred while processing your rental.');
  });
}
  </script>
</body>
</html>