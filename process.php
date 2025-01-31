<?php
require 'config.php';

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Handle Email Subscription
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subscribe'])) {
    $email = sanitizeInput($_POST['email']);

    // Insert email into subscriptions table
    $stmt = $pdo->prepare("INSERT INTO subscriptions (email) VALUES (:email)");
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        echo "Thank you for subscribing with the email: " . $email;
    } else {
        echo "Error: Email already subscribed or invalid.";
    }
}

// Handle Registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $fullName = sanitizeInput($_POST['full-name']);
    $email = sanitizeInput($_POST['email']);
    $password = password_hash(sanitizeInput($_POST['password']), PASSWORD_DEFAULT);

    // Insert user data into users table
    $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password) VALUES (:full_name, :email, :password)");
    $stmt->bindParam(':full_name', $fullName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo "Registration successful for: " . $fullName . " with email: " . $email;
    } else {
        echo "Error: Email already registered or invalid.";
    }
}

// Handle Booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book'])) {
    $tourPackage = sanitizeInput($_POST['tour-package']);
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $phone = sanitizeInput($_POST['phone']);
    $date = sanitizeInput($_POST['date']);

    // Insert booking data into bookings table
    $stmt = $pdo->prepare("INSERT INTO bookings (tour_package, name, email, phone, date) VALUES (:tour_package, :name, :email, :phone, :date)");
    $stmt->bindParam(':tour_package', $tourPackage);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt-> bindParam(':phone', $phone);
    $stmt->bindParam(':date', $date);

    if ($stmt->execute()) {
        echo "Booking successful for " . $name . " on " . $date . " for the package: " . $tourPackage;
    } else {
        echo "Error: Could not complete the booking.";
    }
}
?>
