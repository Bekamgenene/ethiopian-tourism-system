<?php
$host = 'localhost'; // Database host
$db = 'ethiopian_tourism'; // Database name
$user = 'root'; // Database username
$pass = 'root'; // Database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
