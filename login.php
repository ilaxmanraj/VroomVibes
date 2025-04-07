<?php
session_start(); // Start the session

// Database connection
$host = 'localhost';
$dbname = 'car_rental'; // Replace with your database name
$username = 'root'; // Default XAMPP username
$password = ''; // Default XAMPP password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Login successful
        $_SESSION['user_name'] = $user['name']; // Store user's name in session
        header("Location: index1.php"); // Redirect to homepage
        exit();
    } else {
        // Login failed
        echo "Invalid email or password. <a href='login.html'>Try again</a>";
    }
} else {
    // No form data submitted
    echo "No form data submitted.<br>";
}
?>