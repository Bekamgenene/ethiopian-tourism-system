<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM tour_packages WHERE id = ?");
    $stmt->execute([$id]);
    $package = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    die("Package not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Booking - <?php echo $package['name']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
</head>
<body class="font-roboto bg-gray-100">
    <header class="bg-blue-900 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Ethiopian Tourism</h1>
            <nav class="flex items-center space-x-4">
                <ul class="flex space-x-4">
                    <li><a class="hover:underline" href="index.html">Home</a></li>
                    <li><a class="hover:underline" href="destinations.html">Destinations</a></li>
                    <li><a class="hover:underline" href="About.html">About</a></li>
                    <li><a class="hover:underline" href="Contact.html">Contact</a></li>
                </ul>
                <div class="relative">
                    <input class="rounded-full py-2 px-4 text-black" placeholder="Search..." type="text"/>
                    <button class="absolute right-0 top-0 mt-2 mr-2 text-blue-900">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <a class="bg-white text-blue-900 py-2 px-4 rounded-full hover:bg-gray-200" href="register.html">Sign Up</a>
                <a class="bg-white text-blue-900 py-2 px-4 rounded-full hover:bg-gray-200" href="Login.html">Login</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4">
        <section class="mb-8">
            <h2 class="text-3xl font-bold mb-4"><?php echo $package['name']; ?></h2>
            <img alt="<?php echo $package['name']; ?>" class="w-full h-48 object-cover mb-4" src="<?php echo $package['image_url']; ?>"/>
            <p class="text-gray-700"><?php echo $package['description']; ?></p>
            <p class="text-gray-900 font-bold">Price: $<?php echo $package['price']; ?></p>
            <p class="text-gray-600">Duration: <?php echo $package['duration']; ?> days</p>
            <h3 class="text-2xl font-bold mt-4">Booking Form</h3>
            <form action="process_booking.php" method="POST">
                <input type="hidden" name="package_id" value="<?php echo $package ['id']; ?>">
                <div class="mb-4">
                    <label class="block text-gray-700" for="name">Name</label>
                    <input class="w-full px-3 py-2 border rounded-lg" id="name" name="name" type="text" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="email">Email</label>
                    <input class="w-full px-3 py-2 border rounded-lg" id="email" name="email" type="email" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="phone">Phone</label>
                    <input class="w-full px-3 py-2 border rounded-lg" id="phone" name="phone" type="tel" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="date">Preferred Date</label>
                    <input class="w-full px-3 py-2 border rounded-lg" id="date" name="date" type="date" required>
                </div>
                <button type="submit" class="bg-blue-900 text-white py-2 px-4 rounded-full hover:bg-blue-700">Confirm Booking</button>
            </form>
        </section>
    </main>
    <footer class="bg-blue-900 text-white p-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Ethiopian Tourism. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
