<?php
session_start();
header('Content-Type: application/json');

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);

// Validate data
$required_fields = ['car_id', 'car_name', 'car_price', 'rental_date', 'rental_time'];
foreach ($required_fields as $field) {
    if (empty($data[$field])) {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit;
    }
}

if (empty($_SESSION['user_name'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to rent a car']);
    exit;
}

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute SQL
    $stmt = $conn->prepare("INSERT INTO rentals 
                          (car_id, car_name, car_price, user_name, rental_date, rental_time, rental_status, created_at) 
                          VALUES (:car_id, :car_name, :car_price, :user_name, :rental_date, :rental_time, 'confirmed', NOW())");
    
    $stmt->bindParam(':car_id', $data['car_id']);
    $stmt->bindParam(':car_name', $data['car_name']);
    $stmt->bindParam(':car_price', $data['car_price']);
    $stmt->bindParam(':user_name', $_SESSION['user_name']);
    $stmt->bindParam(':rental_date', $data['rental_date']);
    $stmt->bindParam(':rental_time', $data['rental_time']);
    
    $stmt->execute();

    echo json_encode(['success' => true, 'message' => 'Rental successfully booked']);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}

$conn = null;
?>