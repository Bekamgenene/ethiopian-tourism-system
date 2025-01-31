<?php
require 'config.php';

// Fetch tour packages from the database
$stmt = $pdo->prepare("SELECT * FROM tour_packages");
$stmt->execute();
$tourPackages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Tour Packages - Ethiopian Tourism</title>
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
            <h2 class="text-3xl font-bold mb-4">Available Tour Packages</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach ($tourPackages as $package): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img alt="<?php echo $package['name']; ?>" class="w-full h-48 object-cover" src="<?php echo $package['image_url']; ?>"/>
                    <div class="p-4">
                        <h3 class="text-xl font-bold"><?php echo $package['name']; ?></h3>
                        <p class="text-gray-700"><?php echo $package['description']; ?></p>
                        <p class="text-gray-900 font-bold">Price: $<?php echo $package['price']; ?></p>
                        <p class="text-gray-600">Duration: <?php echo $package['duration']; ?> days</p>
                        <a href="booking.php?id=<?php echo $package['id']; ?>" class="bg-blue-900 text-white py-2 px-4 rounded-full hover:bg-blue-700">Book Now</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <footer class="bg-blue-900 text-white p-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Ethiopian Tourism. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
