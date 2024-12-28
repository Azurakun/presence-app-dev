<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presence App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Presence App</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#features" class="hover:underline">Features</a></li>
                    <li><a href="#about" class="hover:underline">About</a></li>
                    <li><a href="#contact" class="hover:underline">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="bg-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4">Seamless Attendance Tracking</h2>
            <p class="text-lg text-gray-700 mb-8">Presence App simplifies the process of recording and managing attendance for teachers, students, and administrators.</p>
            <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-500">Get Started</a>
        </div>
    </section>

    <section id="features" class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-center mb-6">Features</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h4 class="text-xl font-semibold mb-2">QR Code Generation</h4>
                    <p class="text-gray-600">Admins can generate unique QR codes for each classroom.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h4 class="text-xl font-semibold mb-2">QR Code Scanning</h4>
                    <p class="text-gray-600">Students and teachers can scan the QR codes for quick attendance logging.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h4 class="text-xl font-semibold mb-2">Attendance History</h4>
                    <p class="text-gray-600">Admins can manage and review detailed attendance records.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-12 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-4">About Presence App</h3>
            <p class="text-gray-700">Presence App is a comprehensive attendance management system designed to streamline the process for teachers, students, and administrators. With QR code integration, it ensures accuracy and efficiency.</p>
        </div>
    </section>

    <section id="contact" class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-center mb-6">Contact Us</h3>
            <form action="#" method="POST" class="max-w-xl mx-auto">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-lg" required></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-500">Send Message</button>
            </form>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Presence App. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
