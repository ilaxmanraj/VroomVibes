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
  <title>VroomVibes - Contact</title>
  <link rel="stylesheet" href="Style1.css">
</head>
<body>
  <header>
  <h2 align ="left";>VroomVibes</h2>
    <nav>
      <a href="index1.php">Home</a>
      <a href="cars1.php">Cars</a>
      <a href="Contact1.html">Contact</a> 
      <?php if ($user_name): ?>
      <p style="display: inline; margin-left: 20px;">Welcome, <?php echo htmlspecialchars($user_name); ?>!</p>
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="login.html">Login</a>
      <a href="Signup.html">Signup</a>
    <?php endif; ?>
    </nav>
  </header>
  <section class="contact">
    <h2>Contact Us</h2>
    <form id="contact-form" onsubmit="handleContact(event)">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="5" required></textarea>
      <button type="submit">Send</button>
    </form>
  </section>
  <footer>
    <p>&copy; 2025 VroomVibes. All rights reserved.</p>
    <a href="Contact1.html">Contact Us</a>
  </footer>


  <button id="back-to-top" title="Go to top">↑</button>

  <!-- Contact Success Modal -->
  <div id="contact-success-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Message Sent!</h2>
      <p>Thank you for contacting us. We will get back to you soon.</p>
      <button id="close-contact-success">Close</button>
    </div>
  </div>

  <script>
  function handleContact(event) {
    event.preventDefault();
    
    // Get form data
    const formData = {
      name: document.getElementById('name').value,
      email: document.getElementById('email').value,
      message: document.getElementById('message').value
    };

    // Send data to server
    fetch('submit_contact.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(formData),
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Show success modal
        const modal = document.getElementById('contact-success-modal');
        modal.style.display = 'block';
        
        // Reset form
        document.getElementById('contact-form').reset();
        
        // Close modal handlers (same as before)
        const closeModal = document.querySelector('#contact-success-modal .close');
        closeModal.onclick = function() {
          modal.style.display = 'none';
        }
        
        const closeButton = document.getElementById('close-contact-success');
        closeButton.onclick = function() {
          modal.style.display = 'none';
        }
        
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = 'none';
          }
        }
      } else {
        alert('Error submitting form: ' + data.message);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while submitting the form.');
    });
  }
</script>
</body>
</html>