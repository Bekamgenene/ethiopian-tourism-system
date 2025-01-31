<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_id = $_POST['package_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];

    // Insert booking into the database
    $stmt = $pdo->prepare("INSERT INTO bookings (package_id, name, email, phone, date) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$package_id, $name, $email, $phone, $date])) {
        echo "Booking confirmed! A confirmation email has been sent to $email.";
        // Here you can add code to send a confirmation email
    } else {
        echo "Error: Could not confirm booking.";
    }
} else {
    echo "Invalid request.";
}
?>
